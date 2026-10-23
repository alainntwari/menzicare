<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['service'] ?? 0);
$type = $_POST['type'] ?? '';
$insurance = $_POST['insurance'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}

$res = db_query("INSERT into insurances (i_insurance,i_type,i_ref_service) values (?,?,?)", [$insurance, $type, $service]);
if($res){
	flash_redirect('Added successfully', '../users/', 'success');
}
flash_redirect('Error, please contact super admin', '../users/');
