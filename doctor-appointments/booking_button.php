<?php defined('MENZICARE_APP') || exit; ?>
                                                <?php
                                                $d=strtotime("+1 day", $d);
                                                $day = date("D", $d);
                                                $day_date = date("j M", $d);
                                                $day_date_full = date("j-M-Y", $d);
                                                ?>
                                                <h6><b><?php echo e($day); ?></b></h6>
                                                <font><?php echo e($day_date); ?></font>
                                                <hr style="margin-top: 0px">

                                                <?php 

                                                $today_date = date('d-M-Y');
                                                $check_day = date('l',$d);
                                                
                                                $quer = "SELECT * FROM doctors_availability where da_ref_ds_id = '{$row['ds_id']}' and da_day = '{$check_day}'";
                                                $sq = mysqli_query($con,$quer);
                                                while($vop=mysqli_fetch_assoc($sq)){
                                                   
                                                  $start_time = strtotime($vop['da_start_time']);
                                                  $end_time = strtotime($vop['da_end_time']);
                                                  $current_time = $start_time;
                                                  while($current_time < $end_time){
                                                 
                                                    $print_time = date("h:i A",$current_time);
                                                    ?>
                                                    <div style="padding: 3px;">
                                                      <!-- Aha tugiye gushaka time ya nonaha -->
                                                      <?php
                                                      $nonaha = date("h:i A");
                                                      $nonaha = strtotime($nonaha);
                                                      $current_date_to_print = strtotime($day_date_full);

                                                      $current_today_date_to_compare = strtotime($today_date);
                                                      $time_igezweho = strtotime($print_time);
                                                      $print_time = date("h:i",$current_time);
                                                      if($current_date_to_print <= $current_today_date_to_compare){
                                                        if($time_igezweho <= $nonaha){
                                                        ?>
                                                        <div class="text-center timer add_player_list" style="padding: 3px; cursor: not-allowed; background: #acb7c4;"><?php echo e($print_time); ?></div>
                                                      
                                                        <?php
                                                      }
                                                      else{
                                                          //here we are going to check niba muri DB iyi date itari already booked.
                                                          $que = "SELECT count(*) from bookings where b_ref_doctor_availability = {$vop['da_id']} and b_status in ('APPROVED','PAYMENT PENDING') and b_appointment_date = '{$day_date_full}' and b_appointment_time = '{$print_time}'";
                                                          $re = mysqli_query($con,$que);
                                                          $bop = mysqli_fetch_assoc($re);
                                                          $count_yes = $bop['count(*)'];


                                                          if($count_yes > 0){
                                                            ?>
                                                            <div class="text-center timer add_player_list" style="padding: 3px; cursor: not-allowed; background: #acb7c4;"><?php echo e($print_time); ?></div>
                                                            <?php
                                                          }
                                                          else{
                                                            ?>
                                                              <a href="../make-new-appointment/?dahd=<?php echo e($vop['da_id']); ?>&cbh=<?php echo e($print_time); ?>&aty=1&ddf=<?php echo e($day_date_full); ?>">
                                                              <div class="text-center timer add_player_list" style="padding: 3px; cursor: pointer;"><?php echo e($print_time); ?></div>
                                                            </a>
                                                            <?php
                                                          }
                                                      }
                                                    }
                                                  else{
                                                     //here we are going to check niba muri DB iyi date itari already booked.
                                                      $que = "SELECT count(*) from bookings where b_ref_doctor_availability = {$vop['da_id']} and b_status in ('APPROVED','PAYMENT PENDING') and b_appointment_date = '{$day_date_full}' and b_appointment_time = '{$print_time}'";
                                                      $re = mysqli_query($con,$que);
                                                      $bop = mysqli_fetch_assoc($re);
                                                      $count_yes = $bop['count(*)'];


                                                      if($count_yes > 0){
                                                        ?>
                                                        <div class="text-center timer add_player_list" style="padding: 3px; padding-right: 3px; cursor: not-allowed; background: #acb7c4;"><?php echo e($print_time.' '); ?></div>
                                                        <?php
                                                      }
                                                      else{
                                                        ?>
                                                          <a href="../make-new-appointment/?dahd=<?php echo e($vop['da_id']); ?>&cbh=<?php echo e($print_time); ?>&aty=1&ddf=<?php echo e($day_date_full); ?>">
                                                          <div class="text-center timer add_player_list" style="padding: 3px; padding-right: 3px; cursor: pointer;"><?php echo e($print_time.' '); ?></div>
                                                        </a>
                                                        <?php
                                                      }
                                                    }

                                                      
                                                      ?>
                                                      
                                                    </div>
                                                    <?php
                                                    $current_time = $current_time + (30 * 60);
                                                  }
                                                }
                                                ?>
                                              