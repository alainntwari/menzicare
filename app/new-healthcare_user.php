<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

// Only super admins and institution admins can create staff accounts
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);

$name = trim($_POST['name'] ?? '');
$phone = preg_replace('/\D/', '', $_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$id_number = trim($_POST['id_number'] ?? '');
$role = (int)($_POST['role'] ?? 0);

// Staff accounts can only be doctors or institution admins - never super admins
if (!in_array($role, [ROLE_DOCTOR, ROLE_ADMIN], true)) {
	flash_redirect('Invalid role selected', '../users/');
}
if ($name === '' || $phone === '' || $id_number === '') {
	flash_redirect('Please fill in all required fields', '../users/');
}

// Institution admins can only add users to their own institution
if (current_role() === ROLE_ADMIN) {
	$institution = current_institution();
}
else {
	$institution = (int)($_POST['institution'] ?? 0);
}
if ($institution <= 0 || !db_row("SELECT hi_id FROM healthcare_institutions WHERE hi_id = ?", [$institution])) {
	flash_redirect('Please select a valid institution', '../users/');
}

$today_date = date('d-M-Y');
$code = $role . random_int(10000, 99999);

// Random first password, sent to the new user by SMS (no more shared default password)
$password = random_password();

$ro = db_row("SELECT count(*) AS total FROM users WHERE id_number = ?", [$id_number]);
if ($ro && $ro['total'] > 0) {
	flash_redirect('User already exists', '../users/');
}

// Hashes need users.password VARCHAR(255) - see database/migrations/001_security.sql
if (!password_column_ready()) {
	error_log('MenziCare: run database/migrations/001_security.sql (users.password too short for hashes)');
	flash_redirect('Accounts cannot be created right now. Please contact the system admin', '../users/');
}

$res = db_query(
	"INSERT INTO users (name,ref_healthcare_providers,role,joined_date,email,phone_number,id_number,code,password) VALUES (?,?,?,?,?,?,?,?,?)",
	[$name, $institution, $role, $today_date, $email, $phone, $id_number, $code, password_hash($password, PASSWORD_DEFAULT)]
);
if (!$res) {
	flash_redirect('Error while saving the user. Please contact the system admin', '../users/');
}

audit('staff_user_created', ['details' => ['user_id' => mysqli_insert_id($con), 'role' => $role, 'institution' => $institution]]);
AioNem_Net_API_SMS_Send_Net('+250' . $phone, 'Your MenziCare account is ready. Login code: ' . $code . ', password: ' . $password);
flash_redirect('Saved Successfully. The login code and password were sent to the user by SMS', '../users/', 'success');
