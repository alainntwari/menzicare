<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$service = (int)($_POST['link_service'] ?? 0);
$type = $_POST['link_type'] ?? '';
$link = trim($_POST['link'] ?? '');
$social_type = $_POST['social_type'] ?? '';

if (!can_manage_service($service)) {
	deny_access();
}
// Links are shown as <a href>, so only web links are allowed (no javascript: etc.)
if (!preg_match('#^https?://#i', $link)) {
	alert_redirect('Please enter a full link starting with https://', '../users/');
}

$res = db_query("INSERT into social_media_links (sml_link,sml_service_type,sml_service,sml_link_type) values (?,?,?,?)", [$link, $type, $service, $social_type]);
if($res){
	alert_redirect('added', '../users/');
}
alert_redirect('Error, please contact super admin', '../users/');
