<?php
include "../includes/config.php";
$service = $_POST['link_service'];
$type = $_POST['link_type'];
$link = $_POST['link'];
$social_type = $_POST['social_type'];

$qui = "INSERT into social_media_links (sml_link,sml_service_type,sml_service,sml_link_type) values ('{$link}','{$type}','{$service}','{$social_type}')";
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