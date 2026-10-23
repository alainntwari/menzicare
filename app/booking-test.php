<?php
include "../includes/config.php";
require('../aionem.net/api/aionem.net.php');

$_SESSION['service_availability'] = (int)($_POST['service_availability'] ?? 0);
$_SESSION['date'] = trim($_POST['date'] ?? '');
$_SESSION['appointment'] = 'YES';
$_SESSION['appointment_type'] = 'TEST';

if(is_logged_in()){
	include 'insert_in_db_test.php';
}
flash_redirect('To make this appointment, please login to your account first. Your booking will be saved right after you login.', '../login/', 'info');
