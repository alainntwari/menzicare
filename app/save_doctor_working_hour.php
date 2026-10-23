<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$ds_id = (int)($_POST['ds_id'] ?? 0);
$day = $_POST['day'] ?? '';
$start_time = $_POST['start_time'] ?? '';
$end_time = $_POST['end_time'] ?? '';
$max = (int)($_POST['max'] ?? 0);

if (!can_manage_service($ds_id)) {
	deny_access();
}

$cow = db_row("SELECT count(*) AS total from doctors_availability where da_ref_ds_id = ? and da_day = ? and da_start_time = ?", [$ds_id, $day, $start_time]);

if($cow['total'] == 0){
 	$res = db_query("INSERT INTO doctors_availability (da_ref_ds_id,da_day,da_start_time,da_end_time,da_max_patients) VALUES (?,?,?,?,?)", [$ds_id, $day, $start_time, $end_time, $max]);
 	if($res){
 		alert_redirect('Successfully saved', '../users/');
 	}
 	alert_redirect('Failed to isnert into database', '../users/');
}
// arleady exists
alert_redirect('Schedule Arleady saved in database', '../users/');
