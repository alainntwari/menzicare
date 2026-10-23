<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');

// Doctor asks a patient (by SMS) for a code to view their medical history.
// POST only (CSRF-checked in config), and only for patients who booked with this doctor/institution.
require_role(ROLE_DOCTOR, ROLE_ADMIN);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	exit('Invalid request');
}

$patient = (int)($_POST['id'] ?? 0);
if (!can_request_patient_access($patient)) {
	http_response_code(403);
	exit('You can only request access for your own patients');
}

$wait = otp_resend_wait($_SESSION['access_otp'] ?? null);
if ($wait > 0 && (int)$_SESSION['access_otp']['patient'] === $patient) {
	exit('A code was just sent. Please wait ' . $wait . ' seconds before requesting another one');
}

$fow = db_row("SELECT phone_number FROM users WHERE user_id = ?", [$patient]);
$doctor = current_user();
if (!$fow || !$doctor) {
	http_response_code(404);
	exit('Patient not found');
}

$code = otp_generate();
// The code is tied to this patient: it cannot be used to open anyone else's history
$_SESSION['access_otp'] = otp_record($code, ['patient' => $patient]);
audit('patient_access_requested', ['patient_id' => $patient]);
AioNem_Net_API_SMS_Send_Net('+250' . $fow['phone_number'], 'Doctor ' . $doctor['name'] . ' wants to view your medical history. Use code ' . $code . " to grant access");

echo e('Code sent to the patient\'s phone. It is valid for ' . (OTP_TTL / 60) . ' minutes.');
