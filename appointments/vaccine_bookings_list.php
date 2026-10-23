<?php defined('MENZICARE_APP') || exit; ?>
  <div class="page-title">
    <div class="title_left">
    </div>

    
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Vaccination<small> Booking List</small></h2>
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


              <th>Vaccine <font style="opacity:0.0; color:white;">RejectRejectRejectRejectRejec</font></th>
              
               <?php if($_SESSION['role'] != 4) {
                ?>
                 <th>User <font style="opacity:0.0; color:white;">RejectRejectRejectRejectReject</font></th>
                <?php
                  }
                  else{
                    ?>
                   <th>Hospital / Clinic <font style="opacity:0.0; color:white;">RejectRejectRejectRejectReject</font></th>
                    <?php
                  }
               ?>
             
 
             <th>Application Date</th>
              <th>Date & Time</th>
              <th>Code <font style="opacity:0.0; color:white;">RejectRejectRejectRejectReject</font></th>
              <th>status</th>
              <?php
              if($_SESSION['role'] == 2 || $_SESSION['role'] == 3){
                ?>
              <th>Approve <font style="opacity:0.0; color:white;">ApproveApproveApproveApproveApproveApproveApproveApproveApproveApproveApproveApproveApprove </font></th>
              <th>Request to Change date or Time</th>
              <th>Reject <font style="opacity:0.0; color:white;">RejectRejectRejectRejectRejectRejectRejectRejectRejectRejectRejectRejectRejectRejectReject</font></th>
                <?php
              }
              ?>
            </tr>
          </thead>


          <tbody>
            <?php
            require "../includes/user_role.php";

            if($_SESSION['role'] == 3 || $_SESSION['role'] == 2 ){
              $quer = "SELECT * FROM booking_vaccines_view  where vi_ref_institute = '{$user_institution}' order by bv_id desc";  
            }
            elseif($_SESSION['role'] == 1){
              $quer = "SELECT * FROM booking_vaccines_view order by bv_id desc";  
            }
            elseif($_SESSION['role'] == 4){
              $quer = "SELECT * FROM booking_vaccines_view where bv_ref_user = {$_SESSION['id']} order by bv_id desc";  
            }
            $rep = mysqli_query($con,$quer);
            while($row=mysqli_fetch_assoc($rep)){
              $qu1 = "SELECT * FROM healthcare_institutions where hi_id = '{$row['vi_ref_institute']}'";
              $rfa1 = mysqli_query($con,$qu1);
              $voro1 = mysqli_fetch_assoc($rfa1);
              $hospital = $voro1['hi_institute'];              
              ?>

              <tr>

                <td><b> <?php echo e($row['vaccine_name']); ?></b></td>
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
                <td><?php echo e($row['bv_requested_date']); ?> at  <?php echo e($row['bv_requested_time']); ?></td>
               
                <td><?php echo e($row['bv_appointment_date']); ?> </td>
                <td><?php echo e($row['bv_booking_code']); ?></td>
                <td><?php echo e($row['bv_status']); ?></td>
                <?php 
                if($_SESSION['role'] == 2 || $_SESSION['role'] == 3){
                ?>
                  <td>
                    <div class="row">
                      <div class="col-md-12">
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/approve_doctor_appointment.php">
<?php echo csrf_field(); ?>

                              <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Order number<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                  <input type="text" name="booking_id" style="display: none;" value="<?php echo e($row['bv_id']); ?>" readonly>
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