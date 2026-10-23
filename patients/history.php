<?php
include "../includes/config.php";
require_role(ROLE_DOCTOR, ROLE_ADMIN);

// Access is granted by app/check_access_otp.php after the patient shares their SMS code
$access = $_SESSION['patient_access'] ?? null;
if (!$access || time() > $access['expires'] || !can_request_patient_access($access['patient'])) {
  unset($_SESSION['patient_access']);
  flash_redirect('Your access to this patient\'s history has expired. Please request a new code from the patient', '../appointments/', 'warning');
}
$patient_id = (int)$access['patient'];
$patient = db_row("SELECT name FROM users WHERE user_id = ?", [$patient_id]);
audit('view_patient_history', ['patient_id' => $patient_id]);
$active_page = 'patients';
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
          <div class="alert alert-info" role="status">
            Medical history of <b><?php echo e($patient['name'] ?? 'patient'); ?></b>.
            Access ends at <?php echo e(date('H:i', $access['expires'])); ?>.
          </div>
          <?php include "../medical-records/medical_records.php"; ?>
        </div>

        <?php include "../includes/footer.php"; ?>
      </div>
    </div>

    <?php include "../includes/scripts.php"; ?>
  </body>
</html>
