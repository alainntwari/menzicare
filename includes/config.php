<?php
// Safe to include more than once
if (defined('MENZICARE_APP')) {
    return;
}
define('MENZICARE_APP', true);

if (!file_exists(__DIR__ . '/secrets.php')) {
    http_response_code(500);
    exit('Missing includes/secrets.php - copy includes/secrets.sample.php and fill it in.');
}
require_once __DIR__ . '/secrets.php';

if (defined('APP_DEBUG') && APP_DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}
ini_set('log_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Africa/Kigali');

// Session cookie hardening
$is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Lax');
if ($is_https) {
    ini_set('session.cookie_secure', 1);
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/connection.php';
mysqli_set_charset($con, 'utf8mb4');
require_once __DIR__ . '/security.php';

/**
 * Log the user out after 30 minutes of inactivity.
 */
if (is_logged_in() && isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > SESSION_TIMEOUT) {
    $_SESSION = [];
    session_regenerate_id(true);
    alert_redirect('Your session has ended due to 30 minutes of inactivity, please login to your account again', '../login/');
}
$_SESSION['LAST_ACTIVITY'] = time();

// Every POST must carry the CSRF token from csrf_field()
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    csrf_verify();
}
