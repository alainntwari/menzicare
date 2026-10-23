<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

$name = $con->real_escape_string($_POST['name']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$extension = $con->real_escape_string($_POST['extension']);
$password = $con->real_escape_string($_POST['password']);


$today_date = date('d-M-Y');

$code = rand(100000,999999);
$code_number = $code;


$qu = "SELECT count(*) from users where phone_number = '{$phone}'";
$re = mysqli_query($con,$qu);
$ro = mysqli_fetch_assoc($re);
if($ro['count(*)'] == 0){
	// here we are going to insert
	
		$_SESSION['confirmation'] = $code;
		AioNem_Net_API_SMS_Send_Net($extension.$phone,$code_number." is your verification code for MenziCare account");	
	
}
else{
	echo "<script>alert('User already exists, please lpgin into your account');window.location='../login/';</script>";
			//exit();
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MenziCare</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper" id="login_wrapper">
        
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../app/new_user.php" method="POST" validate>
              <h1>Confirmation</h1>
              We have sent you a 6 digits confirmation code to your phone number , Enter it in the below verification field to proceed

                <div class="clearfix"></div>
                <br />
              <div>
                <input id="code" class="form-control" name="code" required="required" placeholder="Enter Verification Code Here" type="number" onkeyup="check_confirmations()">
              </div>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Your Full Name" required="required" value="<?php echo $name; ?>" readonly="readonly" />
              </div>
              <div>
                <input type="email" value="<?php echo $email; ?>" id="email" name="email" style="display: none;" class="form-control">
              </div>

              <div>
                <input id="name" class="form-control" name="phone" required="required" value="<?php echo $phone; ?>" readonly="readonly" type="text" style="display: none;">
              </div>
              <div>
                <input id="name" class="form-control" name="password" required="required" value="<?php echo $password; ?>" readonly="readonly" type="text" style="display: none;">
              </div>

              <div class="col-sm-12 text-center">
              	<div id="submit-area" style="margin-right: 80px;">
                <input type="submit" class="btn btn-danger disabled" name="submit" value="Submit"> 
               </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"><b> Log in</b> </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="../assets/images/logo2.png" width="100px" /></h1>
                  <p>©2021 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
 <script type="text/javascript">  

function check_confirmations()
{
 var xmlhttp = new XMLHttpRequest();
 xmlhttp.open("GET","check_confirmations.php?code="+encodeURIComponent(document.getElementById("code").value),false);
 xmlhttp.send(null);
 document.getElementById("submit-area").innerHTML=xmlhttp.responseText;

}
 
 </script>
