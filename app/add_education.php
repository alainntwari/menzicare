<?php
include "../includes/config.php";
$service = $_POST['education_service'];
$type = $_POST['education_type'];
$certificate = $_POST['certificate'];
$institute = $_POST['institute'];

$qui = "INSERT into education (e_certificate,e_type,e_ref_service,e_institute) values ('{$certificate}','{$type}','{$service}','{$institute}')";
$res = mysqli_query($con,$qui);
if($res){
	echo "<script>alert('added');window.location='../users/';</script>";
			exit();
}
exit();
?>