<?php
include "../includes/config.php";
$user = $con->real_escape_string($_POST['user']);
$specialty = $con->real_escape_string($_POST['specialty']);

$der = "SELECT count(*) from doctors_specialities where ds_ref_user = '{$user}' and ds_ref_sp_id = '{$specialty}'";
$ver = mysqli_query($con,$der);
$cow = mysqli_fetch_assoc($ver);

if($cow['count(*)'] == 0){
 	$wery = "INSERT INTO doctors_specialities (ds_ref_user,ds_ref_sp_id) VALUES ('{$user}','{$specialty}')";
 	$res = mysqli_query($con,$wery);
 	if($res){
 		echo "<script>alert('Successfully saved');window.location='../users/';</script>";
			exit();
 	}
 	else{
 		echo "<script>alert('Failed to isnert into database');window.location='../users/';</script>";
			exit();
 	}
}
else{
	// arleady exists
	echo "<script>alert('user arleady exists');window.location='../users/';</script>";
			exit();
}
exit();
?>