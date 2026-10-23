<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN);
$active_page = 'audit-log';

// Optional filters: ?patient=ID or ?user=ID
$where = [];
$params = [];
if (!empty($_GET['patient'])) {
  $where[] = 'a.al_patient_id = ?';
  $params[] = (int)$_GET['patient'];
}
if (!empty($_GET['user'])) {
  $where[] = 'a.al_user_id = ?';
  $params[] = (int)$_GET['user'];
}
$sql = "SELECT a.*, u.name AS user_name, p.name AS patient_name
        FROM audit_log a
        LEFT JOIN users u ON u.user_id = a.al_user_id
        LEFT JOIN users p ON p.user_id = a.al_patient_id"
     . ($where ? ' WHERE ' . implode(' AND ', $where) : '')
     . " ORDER BY a.al_id DESC LIMIT 500";
$res = db_query($sql, $params);
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
              <h3>Audit Log</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="x_panel">
            <div class="x_title">
              <h2>Latest 500 events <small>logins, access to patient history, notes, approvals, accounts</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php if (!($res instanceof mysqli_result)) { ?>
                <div class="alert alert-warning">The audit log table does not exist yet. Run <code>database/migrations/002_audit_and_reminders.sql</code>.</div>
              <?php } else { ?>
              <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>When</th>
                      <th>User</th>
                      <th>Action</th>
                      <th>Patient</th>
                      <th>Booking</th>
                      <th>Details</th>
                      <th>IP</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                      <td><?php echo e($row['al_created_at']); ?></td>
                      <td>
                        <?php if ($row['al_user_id']) { ?>
                          <a href="?user=<?php echo e($row['al_user_id']); ?>"><?php echo e($row['user_name'] ?: '#' . $row['al_user_id']); ?></a>
                        <?php } else { echo '-'; } ?>
                      </td>
                      <td><?php echo e(str_replace('_', ' ', $row['al_action'])); ?></td>
                      <td>
                        <?php if ($row['al_patient_id']) { ?>
                          <a href="?patient=<?php echo e($row['al_patient_id']); ?>"><?php echo e($row['patient_name'] ?: '#' . $row['al_patient_id']); ?></a>
                        <?php } else { echo '-'; } ?>
                      </td>
                      <td><?php echo e($row['al_booking_id'] ?: '-'); ?></td>
                      <td><?php echo e($row['al_details']); ?></td>
                      <td><?php echo e($row['al_ip']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php include "../includes/footer.php"; ?>
      </div>
    </div>

    <?php include "../includes/scripts.php"; ?>
  </body>
</html>
