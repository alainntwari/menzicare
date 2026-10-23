<?php
/**
 * Shared security helpers: output escaping, auth guards, CSRF, OTPs,
 * prepared queries and encryption of medical notes.
 * Loaded by includes/config.php - do not include directly.
 */
defined('MENZICARE_APP') || exit;

// Session inactivity timeout, in seconds
define('SESSION_TIMEOUT', 1800);
// One-time codes (signup + patient access) expire after this many seconds
define('OTP_TTL', 600);
// Wrong guesses allowed per one-time code
define('OTP_MAX_ATTEMPTS', 5);
// Minimum wait before another SMS code can be requested
define('OTP_RESEND_WAIT', 60);

/* ---------------------------------------------------------------------
 * Output escaping
 * ------------------------------------------------------------------- */

// Escape any value for HTML text or a quoted attribute.
function e($value)
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

// Escape a URL for href/src, allowing only http(s) links.
function e_url($url)
{
    $url = trim((string)($url ?? ''));
    if ($url === '' || !preg_match('#^https?://#i', $url)) {
        return '';
    }
    return e($url);
}

// Escape a value as a JS string literal for an inline <script>.
function js_str($value)
{
    return json_encode((string)$value, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
}

/* ---------------------------------------------------------------------
 * Flash messages
 * ------------------------------------------------------------------- */

// True for requests made by assets/js/menzicare.js (fetch with X-Requested-With).
function is_ajax()
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']);
}

// Queue a message to show on the next page. $type: success, error, warning or info.
function flash($message, $type = 'info')
{
    $_SESSION['flash'][] = ['type' => $type, 'message' => (string)$message];
}

function flash_html($message, $type)
{
    $classes = ['success' => 'success', 'error' => 'danger', 'warning' => 'warning', 'info' => 'info'];
    $class = $classes[$type] ?? 'info';
    $role = $type === 'error' ? 'alert' : 'status';
    return '<div class="alert alert-' . $class . ' alert-dismissible menzi-flash" role="' . $role . '">'
        . e($message)
        . '<button type="button" class="close" aria-label="Close" onclick="this.parentNode.remove()"><span aria-hidden="true">&times;</span></button>'
        . '</div>';
}

/**
 * Show a message and send the user to another page.
 * AJAX requests get the message as HTML instead (shown where the content would load).
 */
function flash_redirect($message, $location, $type = 'error')
{
    if (is_ajax()) {
        echo flash_html($message, $type);
        exit();
    }
    flash($message, $type);
    if (!headers_sent()) {
        header('Location: ' . $location);
    } else {
        echo '<script>window.location=' . js_str($location) . ';</script>';
    }
    exit();
}

// Print queued messages (called from the page layout and the login pages).
function render_flash()
{
    if (empty($_SESSION['flash'])) {
        return '';
    }
    $html = '<div class="menzi-flash-stack">';
    foreach ($_SESSION['flash'] as $f) {
        $html .= flash_html($f['message'], $f['type']);
    }
    unset($_SESSION['flash']);
    // Success / info messages fade away by themselves; errors stay until closed
    return $html . '</div><script>setTimeout(function(){document.querySelectorAll(".menzi-flash.alert-success,.menzi-flash.alert-info").forEach(function(el){el.remove();});},6000);</script>';
}

/* ---------------------------------------------------------------------
 * Database
 * ------------------------------------------------------------------- */

/**
 * Run a prepared statement. All params are bound as strings (MySQL casts them).
 * Returns a mysqli_result for SELECTs, true for successful writes, false on error.
 */
function db_query($sql, array $params = [])
{
    global $con;
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        error_log('MenziCare SQL prepare failed: ' . mysqli_error($con));
        return false;
    }
    if ($params) {
        $values = array_values($params);
        $stmt->bind_param(str_repeat('s', count($values)), ...$values);
    }
    if (!$stmt->execute()) {
        error_log('MenziCare SQL execute failed: ' . $stmt->error);
        return false;
    }
    $result = $stmt->get_result();
    return $result === false ? true : $result;
}

// First row of a prepared SELECT, or null.
function db_row($sql, array $params = [])
{
    $res = db_query($sql, $params);
    if (!($res instanceof mysqli_result)) {
        return null;
    }
    $row = mysqli_fetch_assoc($res);
    return $row ?: null;
}

/* ---------------------------------------------------------------------
 * Authentication / authorization
 * ------------------------------------------------------------------- */

define('ROLE_SUPER_ADMIN', 1);
define('ROLE_DOCTOR', 2);
define('ROLE_ADMIN', 3);
define('ROLE_PATIENT', 4);

function is_logged_in()
{
    return !empty($_SESSION['id']);
}

function current_role()
{
    return isset($_SESSION['role']) ? (int)$_SESSION['role'] : 0;
}

// The logged-in user's row (cached per request).
function current_user()
{
    static $user = false;
    if ($user === false) {
        $user = is_logged_in() ? db_row("SELECT * FROM users WHERE user_id = ?", [(int)$_SESSION['id']]) : null;
    }
    return $user;
}

// Institution of the logged-in user (0 for patients / super admin).
function current_institution()
{
    $user = current_user();
    return $user ? (int)$user['ref_healthcare_providers'] : 0;
}

function deny_access($message = 'You do not have permission to access this page')
{
    http_response_code(403);
    flash_redirect($message, is_logged_in() ? '../home/' : '../login/');
}

function require_login()
{
    if (!is_logged_in()) {
        http_response_code(401);
        flash_redirect('Please login to your account first', '../login/', 'info');
    }
}

// require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN) - allows any of the given roles.
function require_role(...$roles)
{
    require_login();
    if (!in_array(current_role(), array_map('intval', $roles), true)) {
        deny_access();
    }
}

/**
 * Can the logged-in user manage this healthcare user (doctor/admin)?
 * Super admin: anyone. Institution admin: only users of their own institution.
 */
function can_manage_user($user_id)
{
    if (current_role() === ROLE_SUPER_ADMIN) {
        return true;
    }
    if (current_role() !== ROLE_ADMIN) {
        return false;
    }
    $target = db_row("SELECT ref_healthcare_providers FROM users WHERE user_id = ?", [(int)$user_id]);
    return $target && (int)$target['ref_healthcare_providers'] === current_institution() && current_institution() > 0;
}

// Same check, starting from a doctors_specialities id (the "service" used by many forms).
function can_manage_service($ds_id)
{
    $ds = db_row("SELECT ds_ref_user FROM doctors_specialities WHERE ds_id = ?", [(int)$ds_id]);
    return $ds && can_manage_user($ds['ds_ref_user']);
}

/**
 * Can the logged-in doctor/admin act on this doctor booking?
 * Doctor: only their own bookings. Admin: only their institution's bookings.
 */
function can_manage_booking($booking_id)
{
    if (current_role() === ROLE_DOCTOR) {
        return (bool)db_row("SELECT b_id FROM bookings_view WHERE b_id = ? AND user_id = ?", [(int)$booking_id, (int)$_SESSION['id']]);
    }
    if (current_role() === ROLE_ADMIN && current_institution() > 0) {
        return (bool)db_row("SELECT b_id FROM bookings_view WHERE b_id = ? AND ref_healthcare_providers = ?", [(int)$booking_id, current_institution()]);
    }
    return false;
}

// Does this patient have a booking with the logged-in doctor (or their institution)?
function can_request_patient_access($patient_id)
{
    if (current_role() === ROLE_DOCTOR) {
        return (bool)db_row("SELECT b_id FROM bookings_view WHERE b_ref_user = ? AND user_id = ? LIMIT 1", [(int)$patient_id, (int)$_SESSION['id']]);
    }
    if (current_role() === ROLE_ADMIN && current_institution() > 0) {
        return (bool)db_row("SELECT b_id FROM bookings_view WHERE b_ref_user = ? AND ref_healthcare_providers = ? LIMIT 1", [(int)$patient_id, current_institution()]);
    }
    return false;
}

/**
 * Users matching a login: their login code, or their phone number
 * (with or without a leading 0 / +250). Exact code matches come first.
 */
function find_users_by_login($login)
{
    $login = trim((string)$login);
    if ($login === '') {
        return [];
    }
    $users = [];
    $res = db_query("SELECT * FROM users WHERE code = ?", [$login]);
    while ($res instanceof mysqli_result && ($row = mysqli_fetch_assoc($res))) {
        $users[$row['user_id']] = $row;
    }
    $digits = preg_replace('/\D/', '', $login);
    if (strlen($digits) >= 9) {
        $local = preg_replace('/^(250|0)/', '', $digits);
        $res = db_query("SELECT * FROM users WHERE phone_number IN (?, ?, ?)", [$local, '0' . $local, $digits]);
        while ($res instanceof mysqli_result && ($row = mysqli_fetch_assoc($res))) {
            $users[$row['user_id']] = $row;
        }
    }
    return array_values($users);
}

function find_user_by_login($login)
{
    $users = find_users_by_login($login);
    return $users ? $users[0] : null;
}

/* ---------------------------------------------------------------------
 * Audit log (see database/migrations/002_audit_and_reminders.sql)
 * ------------------------------------------------------------------- */

/**
 * Record who did what to which patient/booking. Never breaks the page:
 * if the audit table is missing the entry goes to the PHP error log instead.
 * $context keys: user_id (defaults to the logged-in user), patient_id, booking_id, details.
 */
function audit($action, array $context = [])
{
    $user_id = $context['user_id'] ?? ($_SESSION['id'] ?? null);
    $details = $context['details'] ?? null;
    if (is_array($details)) {
        $details = json_encode($details);
    }
    $ok = db_query(
        "INSERT INTO audit_log (al_user_id, al_action, al_patient_id, al_booking_id, al_details, al_ip, al_created_at) VALUES (?,?,?,?,?,?,NOW())",
        [$user_id, $action, $context['patient_id'] ?? null, $context['booking_id'] ?? null, $details, $_SERVER['REMOTE_ADDR'] ?? 'cli']
    );
    if (!$ok) {
        error_log('MenziCare audit: ' . json_encode(['action' => $action, 'user' => $user_id] + $context));
    }
}

/* ---------------------------------------------------------------------
 * Passwords
 * ------------------------------------------------------------------- */

function random_password($length = 10)
{
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
    $out = '';
    for ($i = 0; $i < $length; $i++) {
        $out .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $out;
}

// True when users.password can hold a bcrypt hash (see database/migrations/001_security.sql).
function password_column_ready()
{
    static $ready = null;
    if ($ready === null) {
        $row = db_row(
            "SELECT CHARACTER_MAXIMUM_LENGTH AS len FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'users' AND COLUMN_NAME = 'password'"
        );
        $ready = $row && (int)$row['len'] >= 255;
    }
    return $ready;
}

/* ---------------------------------------------------------------------
 * CSRF
 * ------------------------------------------------------------------- */

function csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field()
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

// Called for every POST request from includes/config.php.
function csrf_verify()
{
    $sent = isset($_POST['csrf_token']) ? (string)$_POST['csrf_token'] : '';
    if ($sent === '' || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $sent)) {
        http_response_code(419);
        flash_redirect('Your session has expired or the form is invalid. Please try again.', '../home/');
    }
}

/* ---------------------------------------------------------------------
 * One-time codes (SMS)
 * ------------------------------------------------------------------- */

function otp_generate()
{
    return (string)random_int(100000, 999999);
}

// Build the session record for a freshly sent code.
function otp_record($code, array $extra = [])
{
    return $extra + [
        'code_hash' => password_hash($code, PASSWORD_DEFAULT),
        'expires'   => time() + OTP_TTL,
        'attempts'  => 0,
        'sent_at'   => time(),
    ];
}

// Seconds left before another code may be sent for this record (0 = allowed).
function otp_resend_wait($record)
{
    if (empty($record['sent_at'])) {
        return 0;
    }
    return max(0, $record['sent_at'] + OTP_RESEND_WAIT - time());
}

/**
 * Check a code against a session record (by reference: counts attempts).
 * Returns 'ok', 'expired', 'locked' or 'wrong'.
 */
function otp_check(&$record, $code)
{
    if (empty($record['code_hash']) || time() > $record['expires']) {
        return 'expired';
    }
    if ($record['attempts'] >= OTP_MAX_ATTEMPTS) {
        return 'locked';
    }
    $record['attempts']++;
    return password_verify(trim((string)$code), $record['code_hash']) ? 'ok' : 'wrong';
}

/* ---------------------------------------------------------------------
 * Encryption of medical notes
 *
 * New format: "v2:" . base64(iv[12] . tag[16] . ciphertext), AES-256-GCM,
 * random IV per value, key from MENZI_ENCRYPTION_KEY.
 * Old rows (AES-128-CTR, fixed IV) are still readable, and get re-encrypted
 * on the next save or by running tools/reencrypt_notes.php.
 * ------------------------------------------------------------------- */

function menzi_encryption_key()
{
    if (!defined('MENZI_ENCRYPTION_KEY') || strlen(base64_decode(MENZI_ENCRYPTION_KEY, true) ?: '') !== 32) {
        error_log('MenziCare: MENZI_ENCRYPTION_KEY missing or invalid in includes/secrets.php');
        http_response_code(500);
        exit('Server configuration error. Please contact the system admin.');
    }
    return base64_decode(MENZI_ENCRYPTION_KEY, true);
}

function menzi_encrypt($plain)
{
    $plain = (string)($plain ?? '');
    if ($plain === '') {
        return '';
    }
    $iv = random_bytes(12);
    $tag = '';
    $cipher = openssl_encrypt($plain, 'aes-256-gcm', menzi_encryption_key(), OPENSSL_RAW_DATA, $iv, $tag);
    return 'v2:' . base64_encode($iv . $tag . $cipher);
}

function menzi_decrypt($stored)
{
    $stored = (string)($stored ?? '');
    if ($stored === '') {
        return '';
    }
    if (strpos($stored, 'v2:') === 0) {
        $raw = base64_decode(substr($stored, 3), true);
        if ($raw === false || strlen($raw) < 28) {
            return '';
        }
        $plain = openssl_decrypt(substr($raw, 28), 'aes-256-gcm', menzi_encryption_key(), OPENSSL_RAW_DATA, substr($raw, 0, 12), substr($raw, 12, 16));
        return $plain === false ? '' : $plain;
    }
    // Legacy rows written before the security fixes
    if (!defined('MENZI_LEGACY_ENCRYPTION_KEY')) {
        return '';
    }
    $plain = openssl_decrypt($stored, 'AES-128-CTR', MENZI_LEGACY_ENCRYPTION_KEY, 0, MENZI_LEGACY_ENCRYPTION_IV);
    return $plain === false ? '' : $plain;
}
