<div class="row">
                <div class="x_panel">
                  <div class="x_title">
                  
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
                    <!--
                      <div class="col-md-12 col-sm-12  text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="#">A</a></li>
                          <li><a href="#">B</a></li>
                          <li><a href="#">C</a></li>
                          <li><a href="#">D</a></li>
                          <li><a href="#">E</a></li>
                          <li>...</li>
                          <li><a href="#">W</a></li>
                          <li><a href="#">X</a></li>
                          <li><a href="#">Y</a></li>
                          <li><a href="#">Z</a></li>
                        </ul>
                      </div>
                    -->
                      <div class="clearfix"></div>
                      <div class="row">
                      <?php
                        $div_id = 0;
                        $que = "SELECT * FROM users_doctors_specialities_names where ds_status = 'ACTIVE'";
                        $res = mysqli_query($con,$que);
                        while($row=mysqli_fetch_assoc($res)){
                          $div_id++;

                          

                          $kery1 = "SELECT * from providers_location where pl_ref_provider = {$row['ref_healthcare_providers']}";
                          $f1 = mysqli_query($con,$kery1);
                          $b1 = mysqli_fetch_assoc($f1);
                          $location = $b1['pl_province'].', '.$b1['pl_district'].', '.$b1['pl_sector'].'<br>'.$b1['pl_street'];
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

                            <div class="col-md-4 col-sm-4  profile_details">
                              <div class="well profile_view">
                                <div class="col-sm-12">
                                  <h4 class="brief"><b><?php echo $row['sp_name']; ?></b></h4>
                                  <div class="left col-md-7 col-sm-7">
                                    <h2><?php echo $row['name']; ?></h2>
                                    <p><?php echo $provider; ?></p>
                                    <br>
                                    <ul class="list-unstyled">
                                      <li><i class="fa fa-phone"></i> <?php echo $row['phone_number']; ?></li>
                                      <li><i class="fa fa-map-marker"></i> <?php echo $location; ?> </li>
                                    </ul>
                                  </div>
                                  <div class="right col-md-5 col-sm-5 text-center">
                                    <img src="../assets/images/<?php echo $image; ?>" width="80%" alt="" class="img-circle img-fluid">
                                  </div>
                                </div>
                                <div class=" profile-bottom text-center">
                                  <div class=" col-sm-3 emphasis text-left" >
                                     
                                    
                                    <!--<p class="ratings">

                                      <a>4.0</a>
                                      <a href="#"><span class="fa fa-star"></span></a>
                                      <a href="#"><span class="fa fa-star"></span></a>
                                      <a href="#"><span class="fa fa-star"></span></a>
                                      <a href="#"><span class="fa fa-star"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                    
                                    </p>-->
                                  </div>
                                  <div class="col-sm-6 emphasis"><a href="<?php echo '#a'.$div_id; ?>">
                                    <button type="button" class="btn btn-primary btn-sm" id="<?php echo 'd'.$div_id; ?>">
                                      <i class="fa fa-eye"> </i> More Details
                                    </button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div id="<?php echo 'a'.$div_id; ?>" style="display: none;" class="col-md-10">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 x_panel">
                                  
                                    <div class="x_title">
                                      <h2><?php echo $row['name']; ?><small><b><?php echo $row['sp_name']; ?></b> </small></h2>
                                      
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <div class="row" style="background: #f2f5f7;">
                                        <div class="col-md-3 col-sm-12">
                                         <div class="x_panel" style="background: #f2f5f7; border-width: 0px; padding-top: 140px;">
                                           <div class="x_content">
                                            
                                              <h2><?php echo $row['name']; ?></h2>
                                              <p><?php echo $provider; ?></p>
                                              <ul class="list-unstyled">
                                                <li><i class="fa fa-phone"></i> <?php echo $row['phone_number']; ?></li>
                                                <li><i class="fa fa-map-marker"></i> <?php echo $location; ?> </li>
                                              </ul>
                                              <button onclick="doctor_details(<?php echo $row['user_id']; ?>)" class="btn btn-outline-info">More Info</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12" style="padding-top: 15px;">
                                          <div class='row' id="<?php echo 'bo'.$div_id; ?>">
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
                                          
                                          
                                          <div class="col-sm-1 col-xs-1" style="text-align: center; cursor: pointer;" onclick="<?php echo $onclick; ?>">
                                            <input id="<?php echo 'day'.$div_id; ?>" type="text" value="<?php echo $d; ?>" style="display: none;">
                                            <input id="<?php echo 'div'.$div_id; ?>" type="text" value="<?php echo $div_id; ?>" style="display: none;">
                                            <input id="<?php echo 'ds_id'.$div_id; ?>" type="text" value="<?php echo $row['ds_id']; ?>" style="display: none;">
                                            <h6><b>></b></h6>
                                            <font>Next</font>
                                            <hr style="margin-top: 0px">
                                          </div> 
                                        </div>



                                        </div>

                                        <div class="col-md-4 col-sm-12"> 
                                          <div class="x_panel" style="background: #f2f5f7; border-width: 0px; ">
                                           <div class="x_content">
                                            <iframe style="border: 0;" src="<?php echo $map;?>"></iframe>
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
                  
                      ?>
                    </div>
                      <!--
                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-sm-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-sm-5 text-center">
                              <img src="../assets/images/male.png" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" bottom text-center">
                            <div class=" col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class=" col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      -->
                  </div>
                </div>
            </div>