<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$user = (int)($_POST['user'] ?? 0);
$specialty = (int)($_POST['specialty'] ?? 0);

if (!can_manage_user($user)) {
	deny_access();
}

$cow = db_row("SELECT count(*) AS total from doctors_specialities where ds_ref_user = ? and ds_ref_sp_id = ?", [$user, $specialty]);

if($cow['total'] == 0){
 	$res = db_query("INSERT INTO doctors_specialities (ds_ref_user,ds_ref_sp_id) VALUES (?,?)", [$user, $specialty]);
 	if($res){
 		alert_redirect('Successfully saved', '../users/');
 	}
 	alert_redirect('Failed to isnert into database', '../users/');
}
// arleady exists
alert_redirect('user arleady exists', '../users/');
