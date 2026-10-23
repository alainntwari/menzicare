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
                        $availability = '<i class="fa fa-map-marker"></i>';
                        $que = "SELECT * FROM users_doctors_specialities_names where ds_status = 'ACTIVE'";
                        $res = mysqli_query($con,$que);
                        while($row=mysqli_fetch_assoc($res)){
                          $div_id++;

                          $kery11 = "SELECT da_day from doctors_availability where da_ref_ds_id = {$row['ds_id']} group by da_day";
                          $f11 = mysqli_query($con,$kery11);
                          while($b11 = mysqli_fetch_assoc($f11)){
                            $availability = $availability.', '.$b11['da_day'];
                          }

                          $kery1 = "SELECT * from providers_location where pl_ref_provider = {$row['ref_healthcare_providers']}";
                          $f1 = mysqli_query($con,$kery1);
                          $b1 = mysqli_fetch_assoc($f1);
                          $location = $b1['pl_province'].', '.$b1['pl_district'].', '.$b1['pl_sector'].'<br>'.$b1['pl_street'];


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
                                  <div class=" col-sm-6 emphasis text-left" >
                                     <ul class="list-unstyled">
                                      <li><?php echo $availability; ?> </li>
                                    </ul>
                                      
                                    
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
                            <div id="<?php echo 'a'.$div_id; ?>" style="display: none;">
                            <div class="col-md-12 col-sm-12 x_panel">
                              
                                <div class="x_title">
                                  <h2><?php echo $row['name']; ?><small>Avalability, Map location, Appointment scheduling</small></h2>
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
                                    <div class="col-md-3 col-sm-12">
                                     <div class="x_panel" style="background: #f2f5f7; border-width: 0px; padding-top: 140px;">
                                       <div class="x_content">
                                        <div class="row">
                                         <div class="col-sm-3" style="padding-top: 8px;">
                                          <img src="../assets/images/<?php echo $image; ?>" alt="" class="img-circle img-fluid">
                                        </div>
                                        <div class="col-sm-9"> 
                                          <h2><?php echo $row['name']; ?></h2>
                                          <p><?php echo $provider; ?></p>
                                        </div>
                                      </div>
                                          <ul class="list-unstyled">
                                            <li><i class="fa fa-phone"></i> <?php echo $row['phone_number']; ?></li>
                                            <li><i class="fa fa-map-marker"></i> <?php echo $location; ?> </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5 col-sm-12"> 
                                      <table class="table table-responsive text-center" width="100%">
                                        <thead>
                                          <tr>
                                            <th width="80px">Mon</th>
                                            <th width="80px">Tue</th>
                                            <th width="80px">Wed</th>
                                            <th width="80px">Thu</th>
                                            <th width="80px">Fri</th>
                                            <th width="80px">Sat</th>
                                            <th width="80px">Sun</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td><div class="text-center timer">8:00</div></td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                          <tr>
                                            <td>8:00</td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                            <td>9:00</td>
                                            <td> - </td>
                                            <td>8:00</td>
                                            <td>8:30</td>
                                          </tr>
                                        </tbody>
                                      </table>

                                    </div>

                                    <div class="col-md-4 col-sm-12"> 
                                      <div class="x_panel" style="background: #f2f5f7; border-width: 0px; ">
                                       <div class="x_content">
                                        <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.3376531994036!2d29.97426631450713!3d-1.9818846373388448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwNTgnNTQuOCJTIDI5wrA1OCczNS4yIkU!5e1!3m2!1sen!2srw!4v1614790496455!5m2!1sen!2srw" width="100%" height="400" allowfullscreen="allowfullscreen"></iframe>
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