<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['payment_service'] ?? 0);
$type = $_POST['payment_type'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}

$res = db_query("INSERT into payments (p_payment,p_type,p_ref_service) values (?,?,?)", [$payment_method, $type, $service]);
if($res){
	flash_redirect('Added successfully', '../users/', 'success');
}
flash_redirect('Error, please contact super admin', '../users/');
