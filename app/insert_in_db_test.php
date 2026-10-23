<?php
// Included by app/login.php and app/booking-test.php once the user is logged in
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
		"INSERT INTO booking_tests (bt_ref_user,bt_ref_test,bt_booking_code,bt_requested_date,bt_requested_time,bt_appointment_date,bt_appointment_time) VALUES (?,?,?,?,?,?,'')",
		[$by, $service_availability, $code, $today, $current_time, $date]
	);
	if($giz){
		$vop = current_user();
		$user_number = $vop['phone_number'];

		$vop1 = db_row("SELECT * FROM test_institution_location_concatination_new where ti_id = ?", [$service_availability]);
		$hospital_name = $vop1 ? $vop1['hi_institute'] : '';
		$item_name = $vop1 ? $vop1['test_name'] : '';

		// here we will now send the SMS

		// here we will call the Alan's function

		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date." is your appointment date for ". $item_name. " at ".$hospital_name.". Appointement code number is ".$code);

		alert_redirect('Saved Successfully', '../medical-tests/');
	} 
	alert_redirect('Error while inserting in Database', '../medical-tests/');
