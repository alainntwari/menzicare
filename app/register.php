<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

// Step 1 of signup: validate the form, text a code to the phone, and keep the
// pending account in the session (never in the page). app/new_user.php checks the code.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['name'] ?? '');
	$phone = preg_replace('/\D/', '', $_POST['phone'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$extension = '+' . preg_replace('/\D/', '', $_POST['extension'] ?? '250');
	$password = (string)($_POST['password'] ?? '');
	$password_repeat = (string)($_POST['password-repeat'] ?? '');

	if ($name === '' || $phone === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		alert_redirect('Please fill in your name, a valid email and phone number', '../login/#signup');
	}
	if (strlen($password) < 8) {
		alert_redirect('Your password must be at least 8 characters long', '../login/#signup');
	}
	if (!hash_equals($password, $password_repeat)) {
		alert_redirect('The two passwords do not match', '../login/#signup');
	}

	$wait = otp_resend_wait($_SESSION['pending_registration'] ?? null);
	if ($wait > 0) {
		alert_redirect('Please wait ' . $wait . ' seconds before requesting a new code', 'register.php');
	}

	$ro = db_row("SELECT count(*) AS total FROM users WHERE phone_number = ?", [$phone]);
	if ($ro && $ro['total'] > 0) {
		alert_redirect('User already exists, please login into your account', '../login/');
	}

	$code = otp_generate();
	$_SESSION['pending_registration'] = otp_record($code, [
		'name' => $name,
		'phone' => $phone,
		'email' => $email,
		'password_hash' => password_hash($password, PASSWORD_DEFAULT),
	]);
	AioNem_Net_API_SMS_Send_Net($extension . $phone, $code . " is your verification code for MenziCare account");
}
elseif (empty($_SESSION['pending_registration'])) {
	header("location: ../login/#signup");
	exit();
}

$name = $_SESSION['pending_registration']['name'];
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
              <?php echo csrf_field(); ?>
              <h1>Confirmation</h1>
              We have sent you a 6 digits confirmation code to your phone number , Enter it in the below verification field to proceed

                <div class="clearfix"></div>
                <br />
              <div>
                <input id="code" class="form-control" name="code" required="required" placeholder="Enter Verification Code Here" type="text" inputmode="numeric" autocomplete="one-time-code" maxlength="6">
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Your Full Name" value="<?php echo e($name); ?>" readonly="readonly" />
              </div>

              <div class="col-sm-12 text-center">
              	<div id="submit-area" style="margin-right: 80px;">
                <input type="submit" class="btn btn-success" name="submit" value="Submit"> 
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
