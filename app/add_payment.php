<?php
include "../includes/config.php";
$service = $_POST['payment_service'];
$type = $_POST['payment_type'];
$payemnt_method = $_POST['payemnt_method'];

$qui = "INSERT into payments (p_payment,p_type,p_ref_service) values ('{$payemnt_method}','{$type}','{$service}')";
$res = mysqli_query($con,$qui);
if($res){
	echo "<script>alert('added');window.location='../users/';</script>";
			exit();
}
else{
	echo "<script>alert('Error, please contact super admin');window.location='../users/';</script>";
			exit();
}
exit();
?>