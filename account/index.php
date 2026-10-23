<?php
include "../includes/config.php";
require_login();
$active_page = 'account';
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../includes/head.php"; ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

       <?php include "../includes/sidebar.php"; ?>

       <?php include "../includes/top-navigation.php"; ?>

        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>My Account</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Change Password</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <p>Your login code is <b><?php echo e(current_user()['code']); ?></b>. You can also login with your phone number.</p>
                  <form method="POST" action="../app/change_password.php" class="form-horizontal form-label-left">
                    <?php echo csrf_field(); ?>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="current_password">Current password</label>
                      <div class="col-md-8 col-sm-8">
                        <input type="password" id="current_password" name="current_password" class="form-control" required="required" autocomplete="current-password">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="password">New password</label>
                      <div class="col-md-8 col-sm-8">
                        <input type="password" id="password" name="password" class="form-control" required="required" minlength="8" autocomplete="new-password" placeholder="At least 8 characters">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="password-repeat">Repeat new password</label>
                      <div class="col-md-8 col-sm-8">
                        <input type="password" id="password-repeat" name="password-repeat" class="form-control" required="required" minlength="8" autocomplete="new-password">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-8 col-sm-8 offset-md-4">
                        <button type="submit" class="btn btn-success">Change password</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include "../includes/footer.php"; ?>
      </div>
    </div>

    <?php include "../includes/scripts.php"; ?>
  </body>
</html>
