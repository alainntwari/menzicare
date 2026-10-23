<?php
include '../includes/config.php';
$d = (int)($_GET['day'] ?? 0);
$div_id = (int)($_GET['div'] ?? 0);
$ds_id = (int)($_GET['ds_id'] ?? 0);

//echo $ds_id;
//exit();
$prevclick = 'prev_day('.$div_id.')';
?> 

<div class="col-sm-1 col-xs-1" style="text-align: center; cursor: pointer;" onclick="<?php echo e($prevclick); ?>">
  <h6><b><</b></h6>
  <font>Prev</font>
  <hr style="margin-top: 0px">
</div>
  <?php
  
  $d=strtotime("-10 days", $d);
  $a = 0;
  while($a<5){
    $a++;
    ?>
    <div class="col-sm-2 col-xs-2" style="text-align: center;">
      <?php
      $d=strtotime("+1 day", $d);
      $day = date("D", $d);
      $day_date = date("j M", $d);
      ?>
      <h6><b><?php echo e($day); ?></b></h6>
      <font><?php echo e($day_date); ?></font>
      <hr style="margin-top: 0px">
    </div>
    <?php
      $que = "SELECT * FROM users_doctors_specialities_names_and_location_concatinations where ds_id = ?";
      $res = db_query($que, [$ds_id]);
      $row=mysqli_fetch_assoc($res);
        if($row['ds_status'] == 'ACTIVE'){
            $a = 1;
            while($a<5){
                $a++;
                ?> 
                <div class="col-sm-2 col-xs-2" style="text-align: center;">
                    <?php include '../doctor-appointments/booking_button.php'; ?>
                </div>
                <?php
              }

              $onclick = 'next_day('.$div_id.')';
          }
      }

      ?> 
 
<div class="col-sm-1 col-xs-1" style="text-align: center; cursor: pointer;" onclick="<?php echo e($onclick); ?>">
      <input id="<?php echo e('day'.$div_id); ?>" type="text" value="<?php echo e($d); ?>" style="display: none;">
      <input id="<?php echo e('div'.$div_id); ?>" type="text" value="<?php echo e($div_id); ?>" style="display: none;">
      <input id="<?php echo e('ds_id'.$div_id); ?>" type="text" value="<?php echo e($row['ds_id']); ?>" style="display: none;">
      <h6><b>></b></h6>
      <font>Next</font>
      <hr style="margin-top: 0px">
    </div> 
</div> 