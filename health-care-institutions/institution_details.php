<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN);
$hi_id = (int)($_GET['id'] ?? 0);
$inst = db_row("SELECT * FROM institutions_location_view WHERE hi_id = ?", [$hi_id]);
if (!$inst) {
  flash_redirect('Institution not found', '../health-care-institutions/');
}
$loc = db_row("SELECT * FROM providers_location WHERE pl_ref_provider = ?", [$hi_id]);
$staff = db_query("SELECT u.user_id, u.name, u.phone_number, u.status, r.role_name FROM users u LEFT JOIN roles r ON r.role_id = u.role WHERE u.ref_healthcare_providers = ? ORDER BY u.role, u.name", [$hi_id]);
?>
<div class="page-title">
  <div class="title_left">
    <h3><?php echo e($inst['hi_institute']); ?></h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-5 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Details</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a href="#" onclick="healthcare_institutions_list(); return false;"><i class="fa fa-arrow-left"></i> Back</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p><b>Location</b><br>
          <?php echo e($inst['pl_village'] . ', ' . $inst['pl_cell'] . ', ' . $inst['pl_sector']); ?><br>
          <?php echo e($inst['pl_district'] . ', ' . $inst['pl_province']); ?>
        </p>
        <p><b>Phone</b><br><?php echo e($loc['pl_phone'] ?? '-'); ?></p>
        <p><b>Email</b><br><?php echo e($loc['pl_email'] ?? '-'); ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-7 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Staff</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table class="table table-striped">
          <thead>
            <tr><th>Name</th><th>Role</th><th>Phone</th><th>Status</th><th></th></tr>
          </thead>
          <tbody>
            <?php while ($staff instanceof mysqli_result && ($row = mysqli_fetch_assoc($staff))) { ?>
            <tr>
              <td><?php echo e($row['name']); ?></td>
              <td><?php echo e($row['role_name']); ?></td>
              <td><?php echo e($row['phone_number']); ?></td>
              <td><?php echo e($row['status']); ?></td>
              <td><a class="btn btn-sm btn-outline-info" href="../users/">Manage</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
