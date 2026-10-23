<?php
	$service_availability = $_SESSION['service_availability'];
    $date = $_SESSION['date'];
    $today = date("j-M-Y");
	$current_time = date("h:i");
	$by = $_SESSION['id'];
	$code = rand(1000000, 9999999);

	$queque = "INSERT INTO booking_vaccines (bv_ref_user,bv_ref_vaccine,bv_booking_code,bv_requested_date,bv_requested_time,bv_appointment_date,bv_appointment_time) VALUES ('{$by}','{$service_availability}','{$code}','{$today}','{$current_time}','{$date}','')";
	$giz = mysqli_query($con,$queque);
	if($giz){
		$quw = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
		$re = mysqli_query($con,$quw);
		$vop = mysqli_fetch_assoc($re);
		$user_number = $vop['phone_number'];

		$quw1 = "SELECT * FROM vaccine_institution_location_concatination_new where vi_id = '{$service_availability}'";
		$re1 = mysqli_query($con,$quw1);
		$vop1 = mysqli_fetch_assoc($re1);
		$hospital_name = $vop1['hi_institute'];
		$vaccine_name = $vop1['vaccine_name'];
		

		// here we will now send the SMS

		// here we will call the Alan's function

		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date." is your appointment date for ". $vaccine_name. " vaccine at ".$hospital_name.". Appointement code number is ".$code);



		//AioNem_Net_API_SMS_Send_Net("+250".$institution_number," A new Vaccine booking");

		unset($_SESSION['service_availability']);
		unset($_SESSION['date']);
		unset($_SESSION['appointment_type']);
		unset($_SESSION['appointment']);
		echo "<script>alert('Saved Successfully');window.location='../vaccinations/';</script>";
		exit();
	} 
	else{
		echo "<script>alert('Error while inserting in Database');window.location='../vaccinations/';</script>";
		exit();
	}
?>