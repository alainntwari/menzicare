<?php
include "../includes/config.php";
$booking_id = $con->real_escape_string($_POST['booking_id']);
$patient_history = $_POST['patient_history'];
$physical_examination = $_POST['physical_examination'];
$investigation = $_POST['investigation'];
$today = date("j-M-Y");

// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';
  
// Store the encryption key
$encryption_key = "yann_vladimir_bajeneza";

// Use openssl_encrypt() function to encrypt the data
$patient_history = openssl_encrypt($patient_history, $ciphering,
            $encryption_key, $options, $encryption_iv);
$physical_examination = openssl_encrypt($physical_examination, $ciphering,
            $encryption_key, $options, $encryption_iv);
$investigation = openssl_encrypt($investigation, $ciphering,
            $encryption_key, $options, $encryption_iv);

$que = "SELECT count(*) from doctors_narrations where dn_ref_b_id = '{$booking_id}'";
$r = mysqli_query($con,$que);
$ro = mysqli_fetch_assoc($r);
if($ro['count(*)'] == 0){
	$query = "INSERT INTO doctors_narrations (dn_ref_b_id,dn_patient_history,dn_physical_examination,dn_investigation,dn_updated_date,dn_updated_by) values ('{$booking_id}','{$patient_history}','{$physical_examination}','{$investigation}','{$today}','{$_SESSION['id']}')";
}
else{
	$query = "UPDATE doctors_narrations set dn_patient_history = '{$patient_history}',dn_physical_examination = '{$physical_examination}',dn_investigation = '{$investigation}',dn_updated_by = '{$_SESSION['id']}', dn_updated_date = '{$today}' where dn_ref_b_id = '{$booking_id}'";
}

$res = mysqli_query($con,$query);
if($res){
	echo "<script>alert('Saved Successfully');window.location='../appointments/';</script>";
		exit();
}
else{
	echo "<script>alert('An error while saving. Please contact system admin');window.location='../appointments/';</script>";
		exit();
}
