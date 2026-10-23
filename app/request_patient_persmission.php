<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');


$patient = $_GET['id'];
$doctor = $_SESSION['id'];

$que = "SELECT * from users where user_id = {$patient}";
$re = mysqli_query($con,$que);
$fow = mysqli_fetch_assoc($re);
$phone = $fow['phone_number'];

$que1 = "SELECT * from users where user_id = {$doctor}";
$re1 = mysqli_query($con,$que1);
$fowa = mysqli_fetch_assoc($re1);
$doctor_name = $fowa['name'];


$code = rand(100000,999999);
$code_number = $code;

$_SESSION['access_code'] = $code;
AioNem_Net_API_SMS_Send_Net('+250'.$phone,'Doctor '.$doctor_name.' wants to view your medical history. Use code '.$code_number." to grant access");

?>

