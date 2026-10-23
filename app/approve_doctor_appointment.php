<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');

$booking_id = $_POST['booking_id'];
$order_number = $_POST['order_number'];
$by = $_SESSION['id'];
$today = date("j-M-Y"); 
$current_time = date("h:i a");


$query = "UPDATE bookings set b_status = 'PAYMENT PENDING', given_order_number = '{$order_number}', b_modified_by = {$by}, b_modified_date = '{$today}', b_modified_time = '{$current_time}' where b_id = {$booking_id}";

$res = mysqli_query($con,$query);
if($res){
    


		$quw1 = "SELECT * FROM bookings_third_view order by b_id desc limit 1";
		$re1 = mysqli_query($con,$quw1);
		$vop1 = mysqli_fetch_assoc($re1);

		$quw = "SELECT * FROM users where user_id = '{$vop1['b_ref_user']}'";
		$re = mysqli_query($con,$quw);
		$vop = mysqli_fetch_assoc($re);
		$user_number = $vop['phone_number'];


		$institution_number = $vop1['pl_phone'];


		// here we will now send the SMS

		// here we will call the Alan's function

		$date_time = $vop1['b_appointment_date'].' at '.$vop1['b_appointment_time'];
		AioNem_Net_API_SMS_Send_Net("+250".$user_number, $date_time." is your appointment. Order number is ".$order_number);

	echo "<script>alert('Appointment approved. Now waiting for the client to make payment');window.location='../appointments/';</script>";
			exit();
}
else{
	echo "<script>alert('Error, please contact super admin');window.location='../appointments/';</script>";
	exit();
	
}
exit();
?>