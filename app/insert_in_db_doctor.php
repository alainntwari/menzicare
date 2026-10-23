<?php
// Included by app/login.php and app/booking-doctor.php once the user is logged in
defined('MENZICARE_APP') || exit;
require_login();

	$service_availability = (int)$_SESSION['service_availability'];
	$date = $_SESSION['date'];
	$time = $_SESSION['time'];

	// here we are going to insert
	$today = date("j-M-Y");
	$current_time = date("h:i");
	$by = (int)$_SESSION['id'];
	$code = random_int(1000000, 9999999);

	unset($_SESSION['service_availability'], $_SESSION['date'], $_SESSION['time'], $_SESSION['appointment_type'], $_SESSION['appointment']);

	$giz = db_query(
		"INSERT INTO bookings (b_ref_user,b_ref_doctor_availability,b_booking_code,b_requested_date,b_requested_time,b_appointment_date,b_appointment_time) VALUES (?,?,?,?,?,?,?)",
		[$by, $service_availability, $code, $today, $current_time, $date, $time]
	);
	if($giz){
		$booking_id = mysqli_insert_id($con);
		$vop = current_user();
		$user_number = $vop['phone_number'];

		$vop1 = db_row("SELECT * FROM bookings_third_view where b_id = ?", [$booking_id]);
		$institution_number = $vop1 ? $vop1['pl_phone'] : '';

		// here we will now send the SMS

		// here we will call the Alan's function

		$date_time = $date.' at '.$time;
		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date_time." is your appointment. Appointment code number is ".$code);

		if($institution_number !== ''){
			AioNem_Net_API_SMS_Send_Net("+250".$institution_number," A new doctor booking");
		}

		alert_redirect('Saved Successfully', '../doctor-appointments/');
	} 
	alert_redirect('Error while inserting in Database', '../doctor-appointments/');
