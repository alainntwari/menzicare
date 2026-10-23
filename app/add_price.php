<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['price_service'] ?? 0);
$type = $_POST['price_type'] ?? '';
$price = $_POST['price'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}

$vop = db_row("SELECT count(*) AS total from prices where price_service_type = ? and price_ref_service = ?", [$type, $service]);
if($vop['total'] > 0){	
	$res = db_query("UPDATE prices set price_amount = ? where price_service_type = ? and price_ref_service = ?", [$price, $type, $service]);
}
else{
	$res = db_query("INSERT into prices (price_amount,price_service_type,price_ref_service) values (?,?,?)", [$price, $type, $service]);
}

if($res){
	flash_redirect('Updated', '../users/', 'success');
}
flash_redirect('Error, please contact super admin', '../users/');
