<?php
// Included by app/login.php and app/booking-vaccine.php once the user is logged in
defined('MENZICARE_APP') || exit;
require_login();

	$service_availability = (int)$_SESSION['service_availability'];
	$date = $_SESSION['date'];
	$today = date("j-M-Y");
	$current_time = date("h:i");
	$by = (int)$_SESSION['id'];
	$code = random_int(1000000, 9999999);

	unset($_SESSION['service_availability'], $_SESSION['date'], $_SESSION['appointment_type'], $_SESSION['appointment']);

	$giz = db_query(
		"INSERT INTO booking_vaccines (bv_ref_user,bv_ref_vaccine,bv_booking_code,bv_requested_date,bv_requested_time,bv_appointment_date,bv_appointment_time) VALUES (?,?,?,?,?,?,'')",
		[$by, $service_availability, $code, $today, $current_time, $date]
	);
	if($giz){
		$vop = current_user();
		$user_number = $vop['phone_number'];

		$vop1 = db_row("SELECT * FROM vaccine_institution_location_concatination_new where vi_id = ?", [$service_availability]);
		$hospital_name = $vop1 ? $vop1['hi_institute'] : '';
		$item_name = $vop1 ? $vop1['vaccine_name'] : '';

		// here we will now send the SMS

		// here we will call the Alan's function

		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date." is your appointment date for ". $item_name. " vaccine at ".$hospital_name.". Appointment code number is ".$code);

		alert_redirect('Saved Successfully', '../vaccinations/');
	} 
	alert_redirect('Error while inserting in Database', '../vaccinations/');
