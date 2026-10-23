<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['payment_service'] ?? 0);
$type = $_POST['payment_type'] ?? '';
$payemnt_method = $_POST['payemnt_method'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}

$res = db_query("INSERT into payments (p_payment,p_type,p_ref_service) values (?,?,?)", [$payemnt_method, $type, $service]);
if($res){
	alert_redirect('added', '../users/');
}
alert_redirect('Error, please contact super admin', '../users/');
