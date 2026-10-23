<?php
require '../includes/config.php';
require_role(ROLE_SUPER_ADMIN);

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');

$upper_name = strtoupper($name);

$today_date = date('d-M-Y');
$by = (int)$_SESSION['id'];

// Turn the selected location ids into names
$row_province = db_row("SELECT province_name FROM provinces where province_id = ?", [(int)($_POST['province'] ?? 0)]);
$row_district = db_row("SELECT district_name FROM districts where district_id = ?", [(int)($_POST['district'] ?? 0)]);
$row_sector = db_row("SELECT sector_name FROM sectors where sector_id = ?", [(int)($_POST['sector'] ?? 0)]);
$row_cell = db_row("SELECT cell_name FROM cells where cell_id = ?", [(int)($_POST['cell'] ?? 0)]);
$row_village = db_row("SELECT village_name FROM villages where village_id = ?", [(int)($_POST['village'] ?? 0)]);
if ($name === '' || !$row_province || !$row_district || !$row_sector || !$row_cell || !$row_village) {
	alert_redirect('Please fill in the institution name and its full location', '../health-care-institutions/');
}
$province = $row_province['province_name'];
$district = $row_district['district_name'];
$sector = $row_sector['sector_name'];
$cell = $row_cell['cell_name'];
$village = $row_village['village_name'];

$ro = db_row("SELECT count(*) AS total from healthcare_institutions where upper(hi_institute) = ?", [$upper_name]);
if($ro['total'] == 0){
	// here we are going to insert
	$res = db_query("INSERT INTO healthcare_institutions (hi_user,hi_institute,hi_created_date) values (?,?,?)", [$by, $name, $today_date]);
	if($res){
		$hi_id = mysqli_insert_id($con);

		$b = db_query(
			"INSERT INTO providers_location (pl_ref_provider,pl_province,pl_district,pl_sector,pl_cell,pl_village,pl_phone,pl_email) values (?,?,?,?,?,?,?,?)",
			[$hi_id, $province, $district, $sector, $cell, $village, $phone, $email]
		);
		if($b){
			alert_redirect('Saved Successfully', '../health-care-institutions/');
		}
		alert_redirect('Error while inserting in providers_location', '../health-care-institutions/');
	}
	alert_redirect('Error while inserting in healthcare_institutions', '../health-care-institutions/');
}
alert_redirect('Institution already exists', '../health-care-institutions/');
