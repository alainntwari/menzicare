<?php
include "../includes/config.php";
require_role(ROLE_DOCTOR, ROLE_ADMIN);

$booking_id = (int)($_POST['booking_id'] ?? 0);
if (!can_manage_booking($booking_id)) {
	deny_access('You can only write notes for your own appointments');
}

// Each note is encrypted with its own random IV (see menzi_encrypt in includes/security.php)
$patient_history = menzi_encrypt($_POST['patient_history'] ?? '');
$physical_examination = menzi_encrypt($_POST['physical_examination'] ?? '');
$investigation = menzi_encrypt($_POST['investigation'] ?? '');
$today = date("j-M-Y");
$by = (int)$_SESSION['id'];

$ro = db_row("SELECT count(*) AS total from doctors_narrations where dn_ref_b_id = ?", [$booking_id]);
if ($ro['total'] == 0) {
	$res = db_query(
		"INSERT INTO doctors_narrations (dn_ref_b_id,dn_patient_history,dn_physical_examination,dn_investigation,dn_updated_date,dn_updated_by) values (?,?,?,?,?,?)",
		[$booking_id, $patient_history, $physical_examination, $investigation, $today, $by]
	);
}
else {
	$res = db_query(
		"UPDATE doctors_narrations set dn_patient_history = ?, dn_physical_examination = ?, dn_investigation = ?, dn_updated_by = ?, dn_updated_date = ? where dn_ref_b_id = ?",
		[$patient_history, $physical_examination, $investigation, $by, $today, $booking_id]
	);
}
if ($res) {
	audit('notes_saved', ['booking_id' => $booking_id, 'details' => 'history/examination/investigation']);
	flash_redirect('Saved Successfully', '../appointments/', 'success');
}
flash_redirect('An error while saving. Please contact system admin', '../appointments/');
