<?php
include '../includes/config.php';
require_role(ROLE_DOCTOR, ROLE_ADMIN);

$patient = (int)($_POST['patient'] ?? 0);
$code = $_POST['code'] ?? '';

if (empty($_SESSION['access_otp'])) {
	flash_redirect('Wrong access code. Please request access code first', '../appointments/');
}

$otp = &$_SESSION['access_otp'];
// A code only unlocks the patient it was sent to
if ((int)$otp['patient'] !== $patient) {
	flash_redirect('This access code was not requested for this patient. Please request a new code', '../appointments/');
}

$check = otp_check($otp, $code);
if ($check === 'ok') {
	unset($otp);
	unset($_SESSION['access_otp']);
	$_SESSION['patient_access'] = ['patient' => $patient, 'expires' => time() + 1800];
	audit('patient_access_granted', ['patient_id' => $patient]);
	flash_redirect('Access granted. You can now view the medical history of this patient for 30 minutes.', '../patients/history.php', 'success');
}
if ($check === 'wrong') {
	audit('patient_access_wrong_code', ['patient_id' => $patient]);
	flash_redirect('Wrong access code. Please review the code with the patient and try again', '../appointments/');
}
unset($otp);
unset($_SESSION['access_otp']);
flash_redirect('This access code has expired or too many wrong codes were entered. Please request a new code', '../appointments/');
