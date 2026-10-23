<?php
include "../includes/config.php";

$item = strtoupper($con->real_escape_string($_GET['item'] ?? ''));
$location = strtoupper($con->real_escape_string($_GET['location'] ?? ''));

	// aha bivuze ko ari ug searchinga bakoresheje doctor name cg speciality cg hospital name gusa + examin na test

 
                        $div_id = 0;
                        $availability = '<i class="fa fa-map-marker"></i>';
                        //$que = "SELECT * FROM users_doctors_specialities_names_and_location where upper(name) like '%{$item}%' or upper(sp_name) like '%{$item}%'";

                        $que = "SELECT * FROM users_doctors_specialities_names_and_location_concatinations where upper(name) like '%{$item}%' or upper(sp_name) like '%{$item}%' and upper(plc_concatination) like '%{$location}%'";
                        $res = mysqli_query($con,$que);
                        while($row=mysqli_fetch_assoc($res)){
                        	if($row['ds_status'] == 'ACTIVE'){

                          $div_id++;

                          $kery11 = "SELECT da_day from doctors_availability where da_ref_ds_id = {$row['ds_id']} group by da_day";
                          $f11 = mysqli_query($con,$kery11);
                          while($b11 = mysqli_fetch_assoc($f11)){
                            $availability = $availability.', '.e($b11['da_day']);
                          }

                          $kery1 = "SELECT * from providers_location where pl_ref_provider = {$row['ref_healthcare_providers']}";
                          $f1 = mysqli_query($con,$kery1);
                          $b1 = mysqli_fetch_assoc($f1);
                          $location = e($b1['pl_province'].', '.$b1['pl_district'].', '.$b1['pl_sector']).'<br>'.e($b1['pl_street']);
                          $map=$b1['map'];


                          $kery = "SELECT * from healthcare_institutions where hi_id = {$row['ref_healthcare_providers']}";
                          $f = mysqli_query($con,$kery);
                          $b = mysqli_fetch_assoc($f);
                          $provider = $b['hi_institute'];


                          if($row['image'] == 'no_user.png'){
                            if($row['gender'] == 1){
                               $image = 'male.png';
                            }
                            else{
                                $image = 'female.png';
                            }
                          }
                          else{
                            $image = $row['image'];
                          }
                          ?>
                            <div class="row">
                            <div class="col-sm-1"></div>
                            <div id="<?php echo e('a'.$div_id); ?>" style="" class="col-md-10">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 x_panel">
                                  
                                    <div class="x_title">
                                      <h2><?php echo e($row['name']); ?><small><b><?php echo e($row['sp_name']); ?></b> </small></h2>
                                      
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <div class="row" style="background: #f2f5f7;">
                                        <div class="col-md-3 col-sm-12">
                                         <div class="x_panel" style="background: #f2f5f7; border-width: 0px; padding-top: 140px;">
                                           <div class="x_content">
                                            
                                              <h2><?php echo e($row['name']); ?></h2>
                                              <p><?php echo e($provider); ?></p>
                                              <ul class="list-unstyled">
                                                <li><i class="fa fa-phone"></i> <?php echo e($row['phone_number']); ?></li>
                                                <li><i class="fa fa-map-marker"></i> <?php echo $location; ?> </li>
                                              </ul>
                                              <button onclick="doctor_details(<?php echo e($row['user_id']); ?>)" class="btn btn-outline-info">More Info</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12" style="padding-top: 15px;">
                                          <div class='row' id="<?php echo e('bo'.$div_id); ?>">
                                           <div class="col-sm-1 col-xs-1" style="text-align: center;">
                                            <h6><b><</b></h6>
                                            <font>Prev</font>
                                            <hr style="margin-top: 0px">
                                          </div>
                                          <?php
                                            $d = strtotime("-1 day");

                                            $a = 0;
                                            while($a<5){
                                              $a++;
                                              ?> 
                                              <div class="col-sm-2 col-xs-2" style="text-align: center;">
                                                <?php

                                                include "../doctor-appointments/booking_button.php";
                                                ?>
                                              </div>
                                              <?php
                                            }

                                            $onclick = 'next_day_'.$div_id.'()';
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



                                        </div>

                                        <div class="col-md-4 col-sm-12"> 
                                          <div class="x_panel" style="background: #f2f5f7; border-width: 0px; ">
                                           <div class="x_content">
                                            <iframe style="border: 0;" src="<?php echo e_url($map); ?>"></iframe>
                                           </div>
                                         </div>


                                        </div>
                                        
                                      </div>
                                    </div>
                                </div>
                              </div> 
                          </div>
                        </div>
                          <?php
                        
                        }
                    }
                  


?>