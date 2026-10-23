<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');
require_role(ROLE_DOCTOR, ROLE_ADMIN);

$booking_id = (int)($_POST['booking_id'] ?? 0);
$order_number = trim($_POST['order_number'] ?? '');
$by = (int)$_SESSION['id'];
$today = date("j-M-Y");
$current_time = date("h:i a");

if (!can_manage_booking($booking_id)) {
	deny_access('You can only approve appointments of your own patients');
}

$res = db_query(
	"UPDATE bookings set b_status = 'PAYMENT PENDING', given_order_number = ?, b_modified_by = ?, b_modified_date = ?, b_modified_time = ? where b_id = ?",
	[$order_number, $by, $today, $current_time, $booking_id]
);
if ($res) {
	audit('appointment_approved', ['booking_id' => $booking_id]);
		// SMS the patient of THIS booking (it used to pick the latest booking in the system)
		$vop1 = db_row("SELECT * FROM bookings_third_view where b_id = ?", [$booking_id]);
		$vop = $vop1 ? db_row("SELECT * FROM users where user_id = ?", [$vop1['b_ref_user']]) : null;

		if ($vop) {
			$date_time = $vop1['b_appointment_date'].' at '.$vop1['b_appointment_time'];
			AioNem_Net_API_SMS_Send_Net("+250".$vop['phone_number'], $date_time." is your appointment. Order number is ".$order_number);
		}

	flash_redirect('Appointment approved. Now waiting for the client to make payment', '../appointments/', 'success');
}
flash_redirect('Error, please contact super admin', '../appointments/');
