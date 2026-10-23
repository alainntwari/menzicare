<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['education_service'] ?? 0);
$type = $_POST['education_type'] ?? '';
$certificate = $_POST['certificate'] ?? '';
$institute = $_POST['institute'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}

$res = db_query("INSERT into education (e_certificate,e_type,e_ref_service,e_institute) values (?,?,?,?)", [$certificate, $type, $service, $institute]);
if($res){
	flash_redirect('Added successfully', '../users/', 'success');
}
flash_redirect('Error, please contact super admin', '../users/');
