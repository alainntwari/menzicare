<?php
include "../includes/config.php";
require_role(ROLE_DOCTOR, ROLE_ADMIN);

$booking_id = (int)($_POST['booking_id'] ?? 0);
if (!can_manage_booking($booking_id)) {
	deny_access('You can only write results for your own appointments');
}

// Each note is encrypted with its own random IV (see menzi_encrypt in includes/security.php)
$diagonisis = menzi_encrypt($_POST['diagonisis'] ?? '');
$treatment = menzi_encrypt($_POST['treatment'] ?? '');
$today = date("j-M-Y");
$by = (int)$_SESSION['id'];

$ro = db_row("SELECT count(*) AS total from doctors_narrations where dn_ref_b_id = ?", [$booking_id]);
if ($ro['total'] == 0) {
	$res = db_query(
		"INSERT INTO doctors_narrations (dn_ref_b_id,dn_diagonisis,dn_treatment,dn_updated_date,dn_updated_by) values (?,?,?,?,?)",
		[$booking_id, $diagonisis, $treatment, $today, $by]
	);
}
else {
	$res = db_query(
		"UPDATE doctors_narrations set dn_diagonisis = ?, dn_treatment = ?, dn_updated_by = ?, dn_updated_date = ? where dn_ref_b_id = ?",
		[$diagonisis, $treatment, $by, $today, $booking_id]
	);
}

if ($res) {
	alert_redirect('Saved Successfully', '../appointments/');
}
alert_redirect('An error while saving. Please contact system admin', '../appointments/');
