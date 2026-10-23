<?php
include "../includes/config.php";

$test = strtoupper((string)($_GET['test'] ?? ''));
$location = strtoupper((string)($_GET['location'] ?? ''));
?>
<div class="row">
<?php
$que = "SELECT * FROM test_institution_location_concatination_new where test_id = ? and upper(plc_concatination) like ?";
$res = db_query($que, [$test, '%'.$location.'%']);
while($row=mysqli_fetch_assoc($res)){
	?>

     <div class="animated flipInY col-md-4 col-sm-12">
        <a href="../make-new-appointment/?dahd=<?php echo e($row['ti_id']); ?>&cbh=1&aty=2&ddf=1">
          <div class="tile-stats" style="background: #2a3f54; color: #fdffe8;  padding-top:20px" width="100%">
            <div class="icon" style="width: 10px;"><i class="fa fa-caret-square-o-right"></i></div>
            
            <h3 style="text-align: left; max-width: 78%; font-size: 20px;"><?php echo e($row['hi_institute']); ?></h3>
             <p style="text-align: left; max-width: 78%; font-size: 12px;">
             	<?php echo e($row['pl_province']); ?> - <?php echo e($row['pl_district']); ?> - <?php echo e($row['pl_sector']); ?>, <?php echo e($row['pl_street']); ?></p>
             	<br>
             	<p style="text-align: left; max-width: 78%; font-size: 12px;">
             	Test: <b><?php echo e($row['test_name']); ?> </b></p>
          </div>
        </a>
      </div>
	<?php

}
?>
</div>
