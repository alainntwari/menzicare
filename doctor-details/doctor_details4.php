<?php
include "../includes/config.php";
$user_id = $_GET['id'];
$que = "SELECT * FROM users where user_id = {$user_id}";
$res = mysqli_query($con,$que);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];

$que1 = "SELECT * FROM doctors_specialities where ds_ref_user = {$user_id}";
$res1 = mysqli_query($con,$que1);
$row1 = mysqli_fetch_assoc($res1);
$service = $row1['ds_id'];
?> 
  <div class="page-title">
    <div class="title_left">
      <h3>
        <?php
        echo $name;
        ?>
      </h3>
    </div>
  </div>
  <div class="col-md-12">
  <div class="col-md-6 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> <?php echo $name; ?> <small>Profile</small></h2>
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
                        Education
                      </div>

                      <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <div class="row">
                          <div class="col-md-2"></div>

                          <div class="col-md-4 col-sm-6" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Added Social Media Links</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer3 = "SELECT * FROM social_media_links where sml_service = '{$service}' and sml_service_type = 'DOCTOR'";
                                $br3 = mysqli_query($con,$cer3);
                                while($xow3 = mysqli_fetch_assoc($br3)){
                                  ?>
                                  <tr>
                                    <td><a href="<?php echo $xow3['sml_link']; ?>" target="_blanck"><?php echo $xow3['sml_link_type']; ?></a></td>
                                    <td><button class="btn btn-outline-danger" onclick="delete_link(<?php echo $xow3['sml_id']; ?>)"><b>X</b></button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <form class="form-horizontal form-label-left" method="POST" action="../app/add_social_media.php" validate>

                              <div class="item row form-group">
                                <label class="col-md-12 col-sm-12" for="name">Add Social Media Link
                                <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 ">
                                  <input type="text" name="link_service" id="link_service" value="<?php echo $service; ?>" readonly="readonly" style="display: none;">
                                  <input type="text" name="link_type" id="link_type" value="DOCTOR" readonly="readonly" style="display: none;">
                                  <select class="form-control" required="required" name="social_type" id="social_type">
                                   <option value="">Select Social Media</option>
                                   <option value="FACEBOOK">Facebook</option>
                                   <option value="TWITTER">Twitter</option> 
                                   <option value="WHATSAPP">Whatsapp</option> 
                                  </select>
                                  <input class="form-control" required="required" type="text" name="link" id="link" placeholder="Paste link here ">
                                  
                                </div>
                              </div>
                              <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="row">
                          <div class="col-md-2"></div>

                          <div class="col-md-4 col-sm-6" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Added Payment Methods</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer2 = "SELECT * FROM payments where p_ref_service = '{$service}' and p_status = 'ACTIVE' and p_type = 'DOCTOR'";
                                $br2 = mysqli_query($con,$cer2);
                                while($xow2 = mysqli_fetch_assoc($br2)){
                                  ?>
                                  <tr>
                                    <td><?php echo $xow2['p_payment']; ?></td>
                                    <td><button class="btn btn-outline-danger" onclick="delete_payment(<?php echo $xow2['p_id']; ?>)"><b>X</b></button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <form class="form-horizontal form-label-left" method="POST" action="../app/add_payment.php" validate>

                              <div class="item row form-group">
                                <label class="col-md-12 col-sm-12" for="name">Add Payment method <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 ">
                                  <input type="text" name="payment_service" id="payment_service" value="<?php echo $service; ?>" readonly="readonly" style="display: none;">
                                  <input type="text" name="payment_type" id="payment_type" value="DOCTOR" readonly="readonly" style="display: none;">
                                  <input class="form-control" required="required" type="text" name="payemnt_method" id="payemnt_method" placeholder="Type payment method here ">
                                  
                                </div>
                              </div>
                              <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
                        <div class="row">
                          <div class="col-md-2"></div>

                          <div class="col-md-4 col-sm-6" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Added Insurances</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer1 = "SELECT * FROM insurances where i_ref_service = '{$service}' and i_status = 'ACTIVE' and i_type = 'DOCTOR'";
                                $br1 = mysqli_query($con,$cer1);
                                while($xow1 = mysqli_fetch_assoc($br1)){
                                  ?>
                                  <tr>
                                    <td><?php echo $xow1['i_insurance']; ?></td>
                                    <td><button class="btn btn-outline-danger" onclick="delete_insurance(<?php echo $xow1['i_id']; ?>)"><b>X</b></button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <form class="form-horizontal form-label-left" method="POST" action="../app/add_insurance.php" validate>

                              <div class="item row form-group">
                                <label class="col-md-12 col-sm-12" for="name">Add Insurance <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 ">
                                  <input type="text" name="service" id="service" value="<?php echo $service; ?>" readonly="readonly" style="display: none;">
                                  <input type="text" name="type" id="type" value="DOCTOR" readonly="readonly" style="display: none;">
                                  <input class="form-control" required="required" type="text" name="insurance" id="insurance" placeholder="Type insurance here ">
                                  
                                </div>
                              </div>
                              <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                       <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                        <div class="row">
                          <div class="col-md-2"></div>

                          <div class="col-md-4 col-sm-6" style="background: #f7f7f7;" id="added_insurances">
                            <table>
                              <thead>
                                <tr>
                                  <th>Service Price</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer4 = "SELECT * FROM prices where price_ref_service = '{$service}' and price_service_type = 'DOCTOR'";
                                $br4 = mysqli_query($con,$cer4);
                                while($xow4 = mysqli_fetch_assoc($br4)){
                                  ?>
                                  <tr>
                                    <td><?php echo $xow4['price_amount'].' '.$xow4['price_currency']; ?></td>
                                    <td><button class="btn btn-outline-danger" onclick="delete_price(<?php echo $xow4['price_id']; ?>)"><b>X</b></button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <form class="form-horizontal form-label-left" method="POST" action="../app/add_price.php" validate>

                              <div class="item row form-group">
                                <label class="col-md-12 col-sm-12" for="name">Update service price
                                <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 ">
                                  <input type="text" name="price_service" id="price_service" value="<?php echo $service; ?>" readonly="readonly" style="display: none;">
                                  <input type="text" name="price_type" id="price_type" value="DOCTOR" readonly="readonly" style="display: none;">
                                 
                                  <input class="form-control" required="required" type="number" name="price" id="price" placeholder="Enter price amount here">
                                  
                                </div>
                              </div>
                              <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                          <div class="col-md-2"></div>

                          <div class="col-md-4 col-sm-6" style="background: #f7f7f7;" id="added-specialities">
                            <table>
                              <thead>
                                <tr>
                                  <th>Added Specialists</th>
                                  <th></th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $cer = "SELECT * FROM users_doctors_specialities_names where user_id = '{$user_id}' and ds_status = 'ACTIVE'";
                                $br = mysqli_query($con,$cer);
                                while($xow = mysqli_fetch_assoc($br)){
                                  ?>
                                  <tr>
                                    <td><?php echo $xow['sp_name']; ?></td>
                                    <td><button class="btn btn-outline-info" onclick="specialties_hours(<?php echo $xow['ds_id']; ?>)">More Details</button></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <form class="form-horizontal form-label-left" id="special" method="POST" action="../app/save_doctor_specialities.php"  validate>

                              <div class="item row form-group">
                                <label class="col-md-12 col-sm-12" for="name">Add Doctor's Specialization <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 ">
                                  <input type="text" name="user" value="<?php echo $user_id; ?>" style="display: none;">
                                  <select class="form-control" required="required" id="specialty" name="specialty">
                                    <?php
                                      $bery = "SELECT * FROM specialties where sp_status = 'ACTIVE'";
                                      $h = mysqli_query($con,$bery);
                                      while($tow = mysqli_fetch_assoc($h)){
                                        ?>
                                        <option value="<?php echo $tow['sp_id']; ?>"><?php echo $tow['sp_name']; ?></option>
                                        <?php
                                      }
                                    ?>
                                 </select>
                                </div>
                              </div>
                              <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <button type="submit" id="br" class="btn btn-success">Add</button>
                                </div>
                              </div>
                            </form>
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
                            Names: <?php echo $name; ?><br>
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
                            Province: <?php echo $name; ?><br>
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

  <div class="col-md-6">
    Here i will put booking option
  </div>
</div>