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

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../app/login.php" method="POST" validate>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="code" required="required" id="code" name="code" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password" />
              </div>
              <div>
                <input type="submit" name="submit" class="btn btn-success submit" value="Log in">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to system ?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="../assets/images/logo2.png" width="100px" />
                  <!--<p>©2021 All rights reserved</p>-->
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="../app/register.php" method="POST">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Your Full Name" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <input type="text" name="extension" class="form-control" value="+250" required="" />
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                  <input type="text" name="phone" class="form-control" placeholder="Phone Number (7....)" required="" />
                </div>
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" name="password-repeat" class="form-control" placeholder="Repeat Password" required="" />
              </div>
              <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                <input type="submit" class="btn btn-success" value="Create Account">
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="../assets/images/logo2.png" width="100px" />
                  <p>©2021 All rights reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
