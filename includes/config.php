<?php
session_start();
include 'connection.php';
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);
date_default_timezone_set('Africa/Kigali');
//$timee = $_SERVER['REQUEST_TIME'];
 
/**
* for a 30 minute timeout, specified in seconds
*/
//$timeout_duration = 1800;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
/*if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($timee - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    unset($_SESSION['id']);
	unset($_SESSION['role']);
	unset($_SESSION['cooperative']);
	unset($_SESSION['LAST_ACTIVITY']); 
	session_destroy();
    echo "<script>alert('Your session has ended due to 30 minutes of inactivity, please login to your account again');window.location='../';</script>";  
	exit();
}
*/
/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
//$_SESSION['LAST_ACTIVITY'] = $timee;


?>