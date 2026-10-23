<?php
include '../includes/config.php';
require_role(ROLE_DOCTOR, ROLE_ADMIN);

$patient = (int)($_POST['patient'] ?? 0);
$code = $_POST['code'] ?? '';

if (empty($_SESSION['access_otp'])) {
	alert_redirect('Wrong access code. Please request access code first', '../appointments/');
}

$otp = &$_SESSION['access_otp'];
// A code only unlocks the patient it was sent to
if ((int)$otp['patient'] !== $patient) {
	alert_redirect('This access code was not requested for this patient. Please request a new code', '../appointments/');
}

$check = otp_check($otp, $code);
if ($check === 'ok') {
	unset($otp);
	unset($_SESSION['access_otp']);
	$_SESSION['patient'] = $patient;
	alert_redirect('You have been granted access to view the medical history of the patient. Click ok to proceed', '../patients/history.php');
}
if ($check === 'wrong') {
	alert_redirect('Wrong access code. Please review the code with the patient and try again', '../appointments/');
}
unset($otp);
unset($_SESSION['access_otp']);
alert_redirect('This access code has expired or too many wrong codes were entered. Please request a new code', '../appointments/');
