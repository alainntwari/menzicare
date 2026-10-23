<?php
$q = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
$rf = mysqli_query($con,$q);
$vor = mysqli_fetch_assoc($rf);
$user_institution = $vor['ref_healthcare_providers'];
$user_name = $vor['name'];
?>