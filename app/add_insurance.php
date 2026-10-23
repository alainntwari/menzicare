<?php
include "../includes/config.php";
$service = $_POST['service'];
$type = $_POST['type'];
$insurance = $_POST['insurance'];

$qui = "INSERT into insurances (i_insurance,i_type,i_ref_service) values ('{$insurance}','{$type}','{$service}')";
$res = mysqli_query($con,$qui);
if($res){
	echo "<script>alert('added');window.location='../users/';</script>";
			exit();
}
exit();
?>