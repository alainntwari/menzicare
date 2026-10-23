<?php
require '../includes/config.php';
require_login();

$user = current_user();
$current = (string)($_POST['current_password'] ?? '');
$password = (string)($_POST['password'] ?? '');

$stored = (string)$user['password'];
$current_ok = password_verify($current, $stored) || (!password_get_info($stored)['algo'] && hash_equals($stored, $current));
if (!$current_ok) {
	audit('password_change_failed');
	flash_redirect('Your current password is not correct', '../account/');
}
if (strlen($password) < 8) {
	flash_redirect('Your new password must be at least 8 characters long', '../account/');
}
if (!hash_equals($password, (string)($_POST['password-repeat'] ?? ''))) {
	flash_redirect('The two new passwords do not match', '../account/');
}
if (!password_column_ready()) {
	error_log('MenziCare: run database/migrations/001_security.sql (users.password too short for hashes)');
	flash_redirect('Passwords cannot be changed right now. Please contact the system admin', '../account/');
}

db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $user['user_id']]);
session_regenerate_id(true);
audit('password_changed');
flash_redirect('Your password has been changed', '../account/', 'success');
