<?php
require '../includes/config.php';

// Step 2 of signup: check the SMS code, then create the patient account
// from the details saved in the session by app/register.php.
if (empty($_SESSION['pending_registration'])) {
	alert_redirect('Please fill in the registration form first', '../login/#signup');
}

$pending = &$_SESSION['pending_registration'];
$check = otp_check($pending, $_POST['code'] ?? '');
if ($check === 'expired' || $check === 'locked') {
	unset($_SESSION['pending_registration']);
	alert_redirect('Your verification code has expired or too many wrong codes were entered. Please register again', '../login/#signup');
}
if ($check === 'wrong') {
	alert_redirect('Wrong verification code. Please check the SMS and try again', 'register.php');
}

$ro = db_row("SELECT count(*) AS total FROM users WHERE phone_number = ?", [$pending['phone']]);
if ($ro && $ro['total'] > 0) {
	unset($_SESSION['pending_registration']);
	alert_redirect('User already exists, please login into your account', '../login/');
}

$role = ROLE_PATIENT;
$today_date = date('d-M-Y');
$code = $role . random_int(10000, 99999);

// Hashes need users.password VARCHAR(255) - see database/migrations/001_security.sql
if (!password_column_ready()) {
	error_log('MenziCare: run database/migrations/001_security.sql (users.password too short for hashes)');
	alert_redirect('Accounts cannot be created right now. Please contact the system admin', '../login/');
}

$res = db_query(
	"INSERT INTO users (name,ref_healthcare_providers,role,joined_date,email,phone_number,code,password) VALUES (?,?,?,?,?,?,?,?)",
	[$pending['name'], '0', $role, $today_date, $pending['email'], $pending['phone'], $code, $pending['password_hash']]
);
unset($pending);
unset($_SESSION['pending_registration']);

if ($res) {
	alert_redirect('You account has been Successfully created. Your login code is ' . $code . '. Please login with this code and your password', '../login/');
}
alert_redirect('Error while creating your account. Please try again or contact the system admin', '../login/');
