<?php
require '../includes/config.php';

$name = $con->real_escape_string($_POST['name']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$role = 4;
$password = $con->real_escape_string($_POST['password']);
$_SESSION['confirmation'];


$today_date = date('d-M-Y');

$code = rand(10000,99999);
$code = $role.''.$code;


// here we are going to insert
$query = "INSERT INTO users (name,ref_healthcare_providers,role,joined_date,email,phone_number,code,password) values ('{$name}','0','{$role}','{$today_date}','{$email}','{$phone}','{$code}','{$password}')";
$res = mysqli_query($con,$query);
if($res){
	echo "<script>alert('You account has been Successfully created. Please login with your phone number and password');window.location='../login/';</script>";
	exit();
}
else{
	echo $name.'<br>';
	//echo "<script>alert('Error while inserting in Database');window.location='../users/';</script>";
	exit();
}

exit();
 ?>