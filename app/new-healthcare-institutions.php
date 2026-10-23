<?php
require '../includes/config.php';

$name = $con->real_escape_string($_POST['name']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$province = $con->real_escape_string($_POST['province']);
$district = $con->real_escape_string($_POST['district']);
$sector = $con->real_escape_string($_POST['sector']);
$cell = $con->real_escape_string($_POST['cell']);
$village = $con->real_escape_string($_POST['village']);

$upper_name = strtoupper($name);

$today_date = date('d-M-Y');
$by = $_SESSION['id'];

$query_province = "SELECT * FROM provinces where province_id = {$province}";
$res_province = mysqli_query($con,$query_province);
$row_province = mysqli_fetch_assoc($res_province);
$province = $row_province['province_name'];

$query_district = "SELECT * FROM districts where district_id = {$district}";
$res_district = mysqli_query($con,$query_district);
$row_district = mysqli_fetch_assoc($res_district);
$district = $row_district['district_name'];

$query_sector = "SELECT * FROM sectors where sector_id = {$sector}";
$res_sector = mysqli_query($con,$query_sector);
$row_sector = mysqli_fetch_assoc($res_sector);
$sector = $row_sector['sector_name'];

$query_cell = "SELECT * FROM cells where cell_id = {$cell}";
$res_cell = mysqli_query($con,$query_cell);
$row_cell = mysqli_fetch_assoc($res_cell);
$cell = $row_cell['cell_name'];

$query_village = "SELECT * FROM villages where village_id = {$village}";
$res_village = mysqli_query($con,$query_village);
$row_village = mysqli_fetch_assoc($res_village);
$village = $row_village['village_name'];

$qu = "SELECT count(*) from healthcare_institutions where upper(hi_institute) like '{$upper_name}'";
$re = mysqli_query($con,$qu);
$ro = mysqli_fetch_assoc($re);
if($ro['count(*)'] == 0){
	// here we are going to insert
	$query = "INSERT INTO healthcare_institutions (hi_user,hi_institute,hi_created_date) values ('{$by}','{$name}','$today_date')";
	$res = mysqli_query($con,$query);
	if($res){
		$fe = "SELECT * FROM healthcare_institutions order by hi_id desc limit 1";
		$fr = mysqli_query($con,$fe);
		$fo = mysqli_fetch_assoc($fr);
		$hi_id = $fo['hi_id'];

		$sql = "INSERT INTO providers_location (pl_ref_provider,pl_province,pl_district,pl_sector,pl_cell,pl_village,pl_phone,pl_email) values ('{$hi_id}','{$province}','{$district}','{$sector}','{$cell}','{$village}','{$phone}','{$email}')";
		$b = mysqli_query($con,$sql);
		if($b){
			echo "<script>alert('Saved Successfully');window.location='../health-care-institutions/';</script>";
			exit();
		}
		else{
			
			echo "<script>alert('Error while inserting in providers_location');window.location='../health-care-institutions/';</script>";
			exit();
		}
	}
	else{
		echo "<script>alert('Error while inserting in healthcare_institutions');window.location='../health-care-institutions/';</script>";
			exit();
	}
}
else{
   echo "<script>alert('Institution already exists');window.location='../health-care-institutions/';</script>";
			exit();
}
exit();
 ?>