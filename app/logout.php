<?php
require '../includes/config.php';

unset($_SESSION['id']);
unset($_SESSION['role']);
session_destroy();
header("location: ../login");    
exit();
 ?>