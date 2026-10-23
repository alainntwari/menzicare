<?php
require '../includes/config.php';

$name = $con->real_escape_string($_POST['name']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$id_number = $con->real_escape_string($_POST['id_number']);
$institution = $con->real_escape_string($_POST['institution']);
$role = $con->real_escape_string($_POST['role']);


$today_date = date('d-M-Y');
$by = $_SESSION['id'];

$code = rand(10000,99999);
$code = $role.''.$code;

$password = '12345';

$qu = "SELECT count(*) from users where id_number = '{$id_number}'";
$re = mysqli_query($con,$qu);
$ro = mysqli_fetch_assoc($re);
if($ro['count(*)'] == 0){
	// here we are going to insert
	$query = "INSERT INTO users (name,ref_healthcare_providers,role,joined_date,email,phone_number,id_number,code,password) values ('{$name}','{$institution}','{$role}','{$today_date}','{$email}','{$phone}','{$id_number}','{$code}','{$password}')";
	$res = mysqli_query($con,$query);
	if($res){
		echo "<script>alert('Saved Successfully');window.location='../users/';</script>";
		exit();
	}
	else{
		echo $name.'<br>';
		echo $institution.'<br>';
		echo $role.'<br>';
		echo $today_date.'<br>';
		echo $email.'<br>';
		echo $phone.'<br>';
		echo $id_number.'<br>';
		echo $code.'<br>';
		echo $password.'<br>';
		//echo "<script>alert('Error while inserting in Database');window.location='../users/';</script>";
		exit();
	}
	
}
else{
   echo "<script>alert('User already exists');window.location='../users/';</script>";
			exit();
}
exit();
 ?>