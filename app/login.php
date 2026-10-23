<?php 
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

$login = $con->real_escape_string($_POST['code']);
$password = $con->real_escape_string($_POST['password']);
$query="SELECT * from users where code ='{$login}' and password = '{$password}'";
$res = mysqli_query($con,$query);
if(mysqli_num_rows($res) > 0) 
{
  $row = mysqli_fetch_assoc($res);
  $_SESSION['id'] = $row['user_id'];
  $_SESSION['role'] = $row['role'];
  if($_SESSION['role']){
    if($_SESSION['appointment'] == 'YES'){
      // aha tura checking appointment iyo ari yo then tu redirecting to the right page

      if($_SESSION['appointment_type'] == 'DOCTOR'){
        // test
        include 'insert_in_db_doctor.php';
        
      }
      if($_SESSION['appointment_type'] == 'TEST'){
        // test
        include 'insert_in_db_test.php';
        
      }
      if($_SESSION['appointment_type'] == 'VACCINE'){
        // vaccine
        include 'insert_in_db_vaccine.php';


      }
    }
    else{
      header("location: ../home");
    }
	exit();
  }
}
else
{
echo "<script>alert('Invalid login credentials');window.location='../login';</script>";

}
exit();

 ?>