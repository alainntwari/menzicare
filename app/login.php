<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

$login = trim($_POST['code'] ?? '');
$password = (string)($_POST['password'] ?? '');

$row = $login !== '' ? db_row("SELECT * FROM users WHERE code = ?", [$login]) : null;

$valid = false;
if ($row && $password !== '') {
  $stored = (string)$row['password'];
  if (password_verify($password, $stored)) {
    $valid = true;
    if (password_needs_rehash($stored, PASSWORD_DEFAULT)) {
      db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $row['user_id']]);
    }
  }
  elseif (!password_get_info($stored)['algo']) {
    // Old plain-text password: accept once, then upgrade it to a hash
    if (hash_equals($stored, $password)) {
      $valid = true;
      if (password_column_ready()) {
        db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $row['user_id']]);
      }
    }
  }
}

if (!$valid) {
  alert_redirect('Invalid login credentials', '../login');
}

// New session id on login (prevents session fixation); pending booking data is kept
session_regenerate_id(true);
unset($_SESSION['csrf_token']);
$_SESSION['id'] = $row['user_id'];
$_SESSION['role'] = $row['role'];
$_SESSION['LAST_ACTIVITY'] = time();

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
