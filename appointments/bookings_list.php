<?php defined('MENZICARE_APP') || exit; ?>
  <div class="page-title">
    <div class="title_left">
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Doctor Appointments<small> List</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
          <thead>

            <tr>
              <?php if($_SESSION['role'] != 4) {
                ?>
                 <th class="menzi-col-wide">User</th>
                <?php
                  }
                  else{
                    ?>
                   <th class="menzi-col-wide">Hospital / Clinic</th>
                    <?php
                  }
               ?>
             

              <th>Application Date</th>
              <th class="menzi-col-wide">Service</th>
              <th>Date & Time</th>
              <th class="menzi-col-wide">Code</th>
              <th>status</th>
              <?php
              if($_SESSION['role'] == 2 || $_SESSION['role'] == 3){
                ?>
              <th class="menzi-col-form"></th>
              <th></th>
              <th class="menzi-col-form"></th>
                <?php
              }
              ?>
            </tr>
          </thead>


          <tbody>
            <?php
            require "../includes/user_role.php";

            if($_SESSION['role'] == 3){
              $quer = "SELECT * FROM bookings_view where ref_healthcare_providers = ? order by b_id desc";
              $quer_params = [$user_institution];
            }
            elseif($_SESSION['role'] == 2){
              $quer = "SELECT * FROM bookings_view where user_id = ? order by b_id desc";
              $quer_params = [$_SESSION['id']];
            }
            elseif($_SESSION['role'] == 1){
              $quer = "SELECT * FROM bookings_view order by b_id desc";
              $quer_params = [];
            }
            elseif($_SESSION['role'] == 4){
              $quer = "SELECT * FROM bookings_view where b_ref_user = ? order by b_id desc";
              $quer_params = [$_SESSION['id']];
            }
            $rep = db_query($quer, $quer_params);
            while($row=mysqli_fetch_assoc($rep)){
              $qu = "SELECT * FROM users where user_id = ?";
              $rfa = db_query($qu, [$row['b_ref_user']]);
              $voro = mysqli_fetch_assoc($rfa);
              $user_name = $voro['name'];   

              $qu1 = "SELECT * FROM healthcare_institutions where hi_id = ?";
              $rfa1 = db_query($qu1, [$row['ref_healthcare_providers']]);
              $voro1 = mysqli_fetch_assoc($rfa1);
              $hospital = $voro1['hi_institute'];              
              ?>

              <tr>
                <?php if($_SESSION['role'] != 4) {
                ?>
                <td><?php echo e($user_name); ?></td>
                <?php 
                }
                else{
                  ?>
                <td><?php echo e($hospital); ?></td>
                  <?php
                }
                ?> 
                <td><?php echo e($row['b_requested_date']); ?> <br>at  <?php echo e($row['b_requested_time']); ?></td>
               
                <td>Doctor: <b><?php echo e($row['name']); ?></b> <br>Service:<b> <?php echo e($row['sp_name']); ?></b></td>
                <td><?php echo e($row['b_appointment_date']); ?> <br>at  <?php echo e($row['b_appointment_time']); ?></td>
                <td><?php echo e($row['b_booking_code']); ?></td>
                <td><?php echo e($row['b_status']); ?></td>
                <?php 
                if($_SESSION['role'] == 2 || $_SESSION['role'] == 3){
                  if($row['b_status'] == 'PAYMENT PENDING' || $row['b_status'] =='APPROVED'){
                    $patient_history='';
                    $physical_examination='';
                    $investigation='';
                    $diagnosis='';
                    $treatment='';
                    $fer = "SELECT * FROM doctors_narrations where dn_ref_b_id = ?";
                    $ges = db_query($fer, [$row['b_id']]);
                    while($bow=mysqli_fetch_assoc($ges)){
                      $patient_history=menzi_decrypt($bow['dn_patient_history']);
                      $physical_examination=menzi_decrypt($bow['dn_physical_examination']);
                      $investigation=menzi_decrypt($bow['dn_investigation']);
                      $diagnosis=menzi_decrypt($bow['dn_diagonisis']);
                      $treatment=menzi_decrypt($bow['dn_treatment']);
                    }
                    ?>
                    <td>
                      <div class="row">
                        <div class="col-md-12">
                           <div class="item form-group">
                                  <label class="col-form-label col-md-9 col-sm-9 label-align">Patient's medical history available in the system<span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 ">
                                    <button type="button" class="btn btn-success" onclick="request_permission_to_patient(<?php echo e($row['b_ref_user']); ?>, <?php echo e($row['b_id']); ?>)">Request access</button>
                                    <div id="otp_area_<?php echo e($row['b_id']); ?>" class="small text-muted" aria-live="polite"></div>
                                  </div>
                                </div>
                                <form action="../app/check_access_otp.php" method="POST">
<?php echo csrf_field(); ?>
                                  <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="code">Access Code<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
                                    <input type="text" value="<?php echo e($row['b_ref_user']); ?>" name="patient" style="display: none;" readonly="readonly">
                                    <input type="text" name="code" class="form-control" placeholder="Enter code sent to patient's phone" required="required">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="submit" name="submit" class="form-control" value="Submit">
                                  </div>
                                </div>
                              </form>
                       

                          <h6>Narration</h6>
                            <form id="narration-form" action="../app/save_narrations.php" data-parsley-validate class="form-horizontal form-label-left" method="POST">
<?php echo csrf_field(); ?>

                                <input type="text" value="<?php echo e($row['b_id']); ?>" name="booking_id" style="display: none;" readonly="readonly">

                                <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Patient History<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 ">
                                    <textarea id="patient_history" cols="50" rows="5" name="patient_history" required="required" class="form-control" placeholder="Enter Patient history here"><?php echo e($patient_history); ?></textarea>
                                  </div>
                                </div>


                                <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Physical examination<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 ">
                                    <textarea id="physical_examination" cols="50" rows="5" name="physical_examination" class="form-control" placeholder="Enter Physical examination here"><?php echo e($physical_examination); ?></textarea>
                                  </div>
                                </div>

                                 <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Investigation<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 ">
                                    <textarea id="investigation" cols="50" rows="5" name="investigation" class="form-control" placeholder="Enter Investigation here"><?php echo e($investigation); ?></textarea>
                                  </div>
                                </div>
                               
                  
                              
                                <div class="item form-group">
                                  <div class="col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                  </div>
                                </div>

                              </form>
                            </div>
                          </div>
                    </td>

                    <td>
                      <div class="row">
                        <div class="col-md-12">
                          <h6>Results</h6>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/save_narrations_results.php">
<?php echo csrf_field(); ?>

                                <input type="text" value="<?php echo e($row['b_id']); ?>" name="booking_id" style="display: none;" readonly="readonly">
                                <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Diagnosis<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 ">
                                    <textarea id="diagnosis" cols="50" rows="5" name="diagnosis" required="required" class="form-control" placeholder="Enter Diagnosis here"><?php echo e($diagnosis); ?></textarea>
                                  </div>
                                </div>

                                 <div class="item form-group">
                                  <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Treatment<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-8 ">
                                    <textarea id="treatment" cols="50" rows="5" name="treatment" class="form-control" placeholder="Enter Treatment here"><?php echo e($treatment); ?></textarea>
                                  </div>
                                </div>

                              

                               
                  
                              
                                <div class="item form-group">
                                  <div class="col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-info">Save</button>
                                  </div>
                                </div>

                              </form>
                            </div>
                          </div>
                    </td>

                    <td>
                      
                    </td>
                    <?php 
                  }
                  else{
                  ?>
                  <td>
                    <div class="row">
                      <div class="col-md-12">
                        <h6>Approve</h6>
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/approve_doctor_appointment.php">
<?php echo csrf_field(); ?>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Order number<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <input type="text" name="booking_id" style="display: none;" value="<?php echo e($row['b_id']); ?>" readonly>
                                  <input type="number" id="order_number" name="order_number" required="required" class="form-control">
                                </div>
                              </div>

                             
                
                            
                              <div class="item form-group">
                                <div class="col-md-12 col-sm-12 text-right">
                                  <button type="submit" class="btn btn-success">Approve</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                  </td>


                  <td>
                    <div class="row">
                      <div class="col-md-12">
                        <h6>Request to change Date or Time</h6>
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/new-healthcare_user.php">
<?php echo csrf_field(); ?>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Reason<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <textarea id="reason" cols="50" rows="4" name="reason" required="required" class="form-control" placeholder="In summary, give the applicant some explanation of the changes"></textarea>
                                </div>
                              </div>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Proposed Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <input type="date" id="name" name="name" required="required" class="form-control">
                                </div>
                              </div>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Proposed Time<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <input type="time" id="name" name="name" required="required" class="form-control">
                                </div>
                              </div>

                             
                
                            
                              <div class="item form-group">
                                <div class="col-md-12 col-sm-12 text-right">
                                  <button type="submit" class="btn btn-info">Approve</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                  </td>

                  <td>
                    <div class="row">
                      <div class="col-md-12">
                        <h6>Reject</h6>
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/new-healthcare_user.php">
<?php echo csrf_field(); ?>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Reason for rejection<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <textarea id="reason" cols="50" rows="4" name="reason" required="required" class="form-control" placeholder="In summary, give the applicant some explanation of the rejection"></textarea>
                                </div>
                              </div>

                             
                
                            
                              <div class="item form-group">
                                <div class="col-md-12 col-sm-12 text-right">
                                  <button type="submit" class="btn btn-danger">Reject</button>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                  </td>
                    <?php
                  }
                  }
                ?>
              </tr>
              <?php
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>