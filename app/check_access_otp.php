<?php
include '../includes/config.php';
$patient = $_POST['patient'];
$code = $_POST['code'];
if(isset($_SESSION['access_code'])){
	
	if($_SESSION['access_code'] == $code){
		//Here okk
		unset($_SESSION['code']);
		$_SESSION['patient'] = $patient;
		echo "<script>alert('You have been granted access to view the medical history of the patient. Click ok to proceed');window.location='../patients/history.php';</script>";
		exit();

	}
	else{
		// Wrong access code. enter correct code\
		echo "<script>alert('Wrong access code. Please review the code with the patient and try again');window.location='../appointments/';</script>";
		exit();
	}
}
else{
   // here please request access code first
		echo "<script>alert('Wrong access code. Please request access code first');window.location='../appointments/';</script>";
		exit();
}
exit();
?>