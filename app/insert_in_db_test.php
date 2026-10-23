<?php
	$service_availability = $_SESSION['service_availability'];
    $date = $_SESSION['date'];
    $today = date("j-M-Y");
	$current_time = date("h:i");
	$by = $_SESSION['id'];
	$code = rand(1000000, 9999999);

	$queque = "INSERT INTO booking_tests (bt_ref_user,bt_ref_test,bt_booking_code,bt_requested_date,bt_requested_time,bt_appointment_date,bt_appointment_time) VALUES ('{$by}','{$service_availability}','{$code}','{$today}','{$current_time}','{$date}','')";
	$giz = mysqli_query($con,$queque);
	if($giz){
		$quw = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
		$re = mysqli_query($con,$quw);
		$vop = mysqli_fetch_assoc($re);
		$user_number = $vop['phone_number'];

		$quw1 = "SELECT * FROM test_institution_location_concatination_new where ti_id = '{$service_availability}'";
		$re1 = mysqli_query($con,$quw1);
		$vop1 = mysqli_fetch_assoc($re1);
		$hospital_name = $vop1['hi_institute'];
		$test_name = $vop1['test_name'];
		

		// here we will now send the SMS

		// here we will call the Alan's function

		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date." is your appointment date for ". $test_name. " at ".$hospital_name.". Appointement code number is ".$code);



		//AioNem_Net_API_SMS_Send_Net("+250".$institution_number," A new Vaccine booking");

		unset($_SESSION['service_availability']);
		unset($_SESSION['date']);
		unset($_SESSION['appointment_type']);
		unset($_SESSION['appointment']);
		
		echo "<script>alert('Saved Successfully');window.location='../medical-tests/';</script>";
		exit();
	} 

	else{
		echo "<script>alert('Error while inserting in Database');window.location='../vaccinations/';</script>";
		exit();
	}
?>