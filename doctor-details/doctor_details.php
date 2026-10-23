<?php
include "../includes/config.php";
$user_id = (int)($_GET['id'] ?? 0);
$div_id = 1;
$que = "SELECT * FROM users_doctors_specialities_names where user_id = ?";
$res = db_query($que, [$user_id]);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];

$que1 = "SELECT * FROM doctors_specialities where ds_ref_user = ?";
$res1 = db_query($que1, [$user_id]);
$row1 = mysqli_fetch_assoc($res1);
$service = $row1['ds_id'];


$que2 = "SELECT * FROM providers_location where pl_ref_provider = ?";
$res2 = db_query($que2, [$row['ref_healthcare_providers']]);
$row2 = mysqli_fetch_assoc($res2);
$map = $row2['map'];

?> 
  <div class="page-title">
    <div class="title_left">
      <h3>
        <?php
        echo e($name);
        ?>
      </h3>
    </div>
  </div>
  <div class="col-md-12">
  <div class="col-md-5 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> <?php echo e($name); ?> <small>Profile</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" onclick="create_new_user()">Create New User</a>
                            <a class="dropdown-item" onclick="users_list()">Users List</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-sm-4">
                    <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Address</a>
                        <a class="nav-link" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Specialities</a>
                        <a class="nav-link" id="education-tab" data-toggle="pill" href="#education" role="tab" aria-controls="education" aria-selected="true">Education</a>
                        <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab" aria-controls="social" aria-selected="true">Social media</a>
                        <a class="nav-link" id="payment-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Payment Methods</a>
                        <a class="nav-link" id="insurance-tab" data-toggle="pill" href="#insurance" role="tab" aria-controls="insurance" aria-selected="true">Insuarances</a>
                        <a class="nav-link" id="price-tab" data-toggle="pill" href="#price" role="tab" aria-controls="price" aria-selected="true">Price</a>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                         <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Added Education</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer5 = "SELECT * FROM education where e_ref_service = ? and e_type = 'DOCTOR'";
                                $br5 = db_query($cer5, [$service]);
                                while($xow5 = mysqli_fetch_assoc($br5)){
                                  ?>
                                  <tr>
                                    <td><?php echo e($xow5['e_certificate']); ?></td>
                                    <td><button class="btn btn-outline-danger" onclick="delete_education(<?php echo e($xow5['e_id']); ?>)"><b>X</b></button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                      </div>

                      <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <div class="row">

                          <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Social Media Links</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer3 = "SELECT * FROM social_media_links where sml_service = ? and sml_service_type = 'DOCTOR'";
                                $br3 = db_query($cer3, [$service]);
                                while($xow3 = mysqli_fetch_assoc($br3)){
                                  ?>
                                  <tr>
                                    <td><a href="<?php echo e_url($xow3['sml_link']); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($xow3['sml_link_type']); ?></a></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                         
                        </div>
                      </div>


                      <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="row">

                          <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Payment Methods</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer2 = "SELECT * FROM payments where p_ref_service = ? and p_status = 'ACTIVE' and p_type = 'DOCTOR'";
                                $br2 = db_query($cer2, [$service]);
                                while($xow2 = mysqli_fetch_assoc($br2)){
                                  ?>
                                  <tr>
                                    <td><?php echo e($xow2['p_payment']); ?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
                        <div class="row">

                          <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Insurances</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer1 = "SELECT * FROM insurances where i_ref_service = ? and i_status = 'ACTIVE' and i_type = 'DOCTOR'";
                                $br1 = db_query($cer1, [$service]);
                                while($xow1 = mysqli_fetch_assoc($br1)){
                                  ?>
                                  <tr>
                                    <td><?php echo e($xow1['i_insurance']); ?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                       <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                        <div class="row">

                          <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Service Price</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer4 = "SELECT * FROM prices where price_ref_service = ? and price_service_type = 'DOCTOR'";
                                $br4 = db_query($cer4, [$service]);
                                while($xow4 = mysqli_fetch_assoc($br4)){
                                  ?>
                                  <tr>
                                    <td><?php echo e($xow4['price_amount'].' '.$xow4['price_currency']); ?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">

                          <div class="col-md-12 col-sm-12" style="background: #f7f7f7;" id="added-specialities">
                            <table>
                              <thead>
                                <tr>
                                  <th>Specialists</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer = "SELECT * FROM users_doctors_specialities_names where user_id = ? and ds_status = 'ACTIVE'";
                                $br = db_query($cer, [$user_id]);
                                while($xow = mysqli_fetch_assoc($br)){
                                  ?>
                                  <tr>
                                    <td><?php echo e($xow['sp_name']); ?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                        
                      </div>
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-3 col-sm-3">
                            <img src="../assets/images/male.png" width="100%">
                          </div>
                          <div class="col-md-5">
                            <br><br><br>
                            Names: <?php echo e($name); ?><br>
                            Role : Doctor<br>
                            Phone Number:<br>
                            Email : 
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                          <div class="col-md-3"></div>
                          
                          <div class="col-md-4">
                            <br>
                            Province: <?php echo e($name); ?><br>
                            District : Doctor<br>
                            Sector:<br>
                            Cell : <br>
                            Village : 
                          </div>
                        </div>
                      </div>
                     </div>
                    </div>
                   
                    
                  </div>
                </div>
  </div>

  <div class="col-md-7 col-sm-12">
    <div class="row">
                                <div class="col-md-12 col-sm-12 x_panel">
                                  
                                    <div class="x_title">
                                      <h2><?php echo e($row['name']); ?><small>Avalability, Map location, Appointment scheduling</small></h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="#">Settings 1</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Settings 2</a>
                                            </li>
                                          </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                      </ul>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <div class="row" style="background: #f2f5f7;">
                                        <div class="col-md-7 col-sm-12 col-xs-12" style="padding-top: 15px;">
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
                                                $d=strtotime("+1 day", $d);
                                                $day = date("D", $d);
                                                $day_date = date("j M", $d);
                                                ?>
                                                <h6><b><?php echo e($day); ?></b></h6>
                                                <font><?php echo e($day_date); ?></font>
                                                <hr style="margin-top: 0px">

                                                <?php 

                                                $today_date = date('d-M-Y');
                                                $check_day = date('l',$d);
                                                $quer = "SELECT * FROM doctors_availability where da_ref_ds_id = ? and da_day = ?";
                                                $sq = db_query($quer, [$row['ds_id'], $check_day]);
                                                while($vop=mysqli_fetch_assoc($sq)){
                                                  $start_time = strtotime($vop['da_start_time']);
                                                  $end_time = strtotime($vop['da_end_time']);
                                                  $current_time = $start_time;
                                                  while($current_time < $end_time){
                                                    $print_time = date("h:i",$current_time);
                                                    ?>
                                                    <div style="padding: 3px;">
                                                      <div class="text-center timer" style="padding: 3px;"><?php echo e($print_time); ?></div>
                                                    </div>
                                                    <?php
                                                    $current_time = $current_time + (30 * 60);
                                                  }
                                                }
                                                ?>
                                              </div>
                                              <?php
                                            }

                                            $onclick = 'next_day_'.$div_id.'()';
                                          ?> 
                                          
                                          
                                          <div class="col-sm-1 col-xs-1" style="text-align: center; cursor: pointer;" onclick="<?php echo e($onclick); ?>">
                                            <input id="<?php echo e('day'.$div_id); ?>" type="text" value="<?php echo e($d); ?>" style="display: none;">
                                            <input id="<?php echo e('div'.$div_id); ?>" type="text" value="<?php echo e($div_id); ?>" style="display: none;">
                                            <h6><b>></b></h6>
                                            <font>Next</font>
                                            <hr style="margin-top: 0px">
                                          </div> 
                                        </div>


                                        

                                        </div> 

                                        <div class="col-md-5 col-sm-12"> 
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