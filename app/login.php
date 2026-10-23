<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

$login = trim($_POST['code'] ?? '');
$password = (string)($_POST['password'] ?? '');

// Check the password against one user row; upgrades old/plain-text passwords to a fresh hash
function login_password_matches($row, $password)
{
  $stored = (string)$row['password'];
  if (password_verify($password, $stored)) {
    if (password_needs_rehash($stored, PASSWORD_DEFAULT)) {
      db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $row['user_id']]);
    }
    return true;
  }
  // Old plain-text password: accept once, then upgrade it to a hash
  if (!password_get_info($stored)['algo'] && hash_equals($stored, $password)) {
    if (password_column_ready()) {
      db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $row['user_id']]);
    }
    return true;
  }
  return false;
}

// Login code or phone number; a phone shared by several accounts tries each one
$row = null;
if ($password !== '') {
  foreach (find_users_by_login($login) as $candidate) {
    if (login_password_matches($candidate, $password)) {
      $row = $candidate;
      break;
    }
  }
}

if (!$row) {
  audit('login_failed', ['user_id' => null, 'details' => ['login' => $login]]);
  flash_redirect('Invalid login code / phone number or password', '../login');
}

// New session id on login (prevents session fixation); pending booking data is kept
session_regenerate_id(true);
unset($_SESSION['csrf_token']);
$_SESSION['id'] = $row['user_id'];
$_SESSION['role'] = $row['role'];
$_SESSION['LAST_ACTIVITY'] = time();
audit('login');

if (($_SESSION['appointment'] ?? '') == 'YES') {
  // aha tura checking appointment iyo ari yo then tu redirecting to the right page
  if ($_SESSION['appointment_type'] == 'DOCTOR') {
    include 'insert_in_db_doctor.php';
  }
  if ($_SESSION['appointment_type'] == 'TEST') {
    include 'insert_in_db_test.php';
  }
  if ($_SESSION['appointment_type'] == 'VACCINE') {
    include 'insert_in_db_vaccine.php';
  }
}
header("location: ../home");
exit();
