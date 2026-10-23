<?php
include "../includes/config.php";
$service = $_POST['price_service'];
$type = $_POST['price_type'];
$price = $_POST['price'];

$sql = "SELECT count(*) from prices where price_service_type = '{$type}' and price_ref_service = '{$service}'";
$re = mysqli_query($con,$sql);
$vop = mysqli_fetch_assoc($re);
if($vop['count(*)'] > 0){	
    $qui = "UPDATE prices set price_amount = '{$price}' where price_service_type = '{$type}' and price_ref_service = '{$service}'";
}
else{
	$qui = "INSERT into prices (price_amount,price_service_type,price_ref_service) values ('{$price}','{$type}','{$service}')";
}


$res = mysqli_query($con,$qui);
if($res){
	echo "<script>alert('Updated');window.location='../users/';</script>";
			exit();
}
else{
	echo "<script>alert('Error, please contact super admin');window.location='../users/';</script>";
	exit();
	
}
exit();
?>