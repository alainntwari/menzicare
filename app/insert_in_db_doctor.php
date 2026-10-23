<?php
	$service_availability = $_SESSION['service_availability'];
    $date = $_SESSION['date'];
    $time = $_SESSION['time'];

	// here we are going to insert
	$today = date("j-M-Y");
	$current_time = date("h:i");
	$by = $_SESSION['id'];
	$code = rand(1000000, 9999999);

	$queque = "INSERT INTO bookings (b_ref_user,b_ref_doctor_availability,b_booking_code,b_requested_date,b_requested_time,b_appointment_date,b_appointment_time) VALUES ('{$by}','{$service_availability}','{$code}','{$today}','{$current_time}','{$date}','{$time}')";
	$giz = mysqli_query($con,$queque);
	if($giz){
		$quw = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
		$re = mysqli_query($con,$quw);
		$vop = mysqli_fetch_assoc($re);
		$user_number = $vop['phone_number'];

		$quw1 = "SELECT * FROM bookings_third_view order by b_id desc limit 1";
		$re1 = mysqli_query($con,$quw1);
		$vop1 = mysqli_fetch_assoc($re1);
		$institution_number = $vop1['pl_phone'];


		// here we will now send the SMS

		// here we will call the Alan's function

		$date_time = $date.' at '.$time;
		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date_time." is your appointment. Appointement code number is ".$code);



		AioNem_Net_API_SMS_Send_Net("+250".$institution_number," A new doctor booking");


		unset($_SESSION['service_availability']);
		unset($_SESSION['date']);
		unset($_SESSION['time']);
		unset($_SESSION['appointment_type']);
		unset($_SESSION['appointment']);
		echo "<script>alert('Saved Successfully');window.location='../doctor-appointments/';</script>";
		exit();
	} 
	else{
		echo "<script>alert('Error while inserting in Database');window.location='../doctor-appointments/';</script>";
		exit();
	}

   
?>