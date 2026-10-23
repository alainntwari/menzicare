<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');

$_SESSION['service_availability'] = (int)($_POST['service_availability'] ?? 0);
$_SESSION['date'] = trim($_POST['date'] ?? '');
$_SESSION['appointment'] = 'YES';
$_SESSION['appointment_type'] = 'VACCINE';

if(is_logged_in()){
	include 'insert_in_db_vaccine.php';
}
alert_redirect('To make this appointment you must be logged in in your account first, Click OK to proceed with login', '../login/');
