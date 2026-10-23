<?php
include "../includes/config.php";
$ds_id = $con->real_escape_string($_POST['ds_id']);
$day = $con->real_escape_string($_POST['day']);
$start_time = $con->real_escape_string($_POST['start_time']);
$end_time = $con->real_escape_string($_POST['end_time']);
$max = $con->real_escape_string($_POST['max']);

$der = "SELECT count(*) from doctors_availability where da_ref_ds_id = '{$ds_id}' and da_day = '{$day}' and da_start_time = '{$start_time}'";
$ver = mysqli_query($con,$der);
$cow = mysqli_fetch_assoc($ver);

if($cow['count(*)'] == 0){
 	$wery = "INSERT INTO doctors_availability (da_ref_ds_id,da_day,da_start_time,da_end_time,da_max_patients) VALUES ('{$ds_id}','{$day}','{$start_time}','{$end_time}','{$max}')";
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
	echo "<script>alert('Schedule Arleady saved in database');window.location='../users/';</script>";
			exit();
}
exit();
?>