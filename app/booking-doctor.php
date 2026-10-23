<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');


$service_availability = $con->real_escape_string($_POST['service_availability']);
$time = $con->real_escape_string($_POST['time']);
$date = $con->real_escape_string($_POST['date']);
if(isset($_SESSION['id'])){
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


		echo "<script>alert('Saved Successfully');window.location='../doctor-appointments/';</script>";
		exit();
	} 
	else{
		echo "<script>alert('Error while inserting in Database');window.location='../doctor-appointments/';</script>";
		exit();
	}
}
else{

$_SESSION['service_availability'] = $service_availability;
$_SESSION['time'] = $time;
$_SESSION['date'] = $date;
$_SESSION['appointment'] = 'YES';
$_SESSION['appointment_type'] = 'DOCTOR';

echo "<script>alert('To make this appointment you must be logged in in your account first, Click OK to proceed with login');window.location='../login/';</script>";
		exit();
}
?>