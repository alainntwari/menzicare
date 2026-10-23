<?php defined('MENZICARE_APP') || exit; ?>
  <div class="page-title">
    <div class="title_left">
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bookings List List<small>Below is the list of all bookings in your hospital</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="create_new_user()">Create New</a>
              </div>
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
              <th class="menzi-col-wide">User</th>
              <th class="menzi-col-wide">Code</th>
              
              <th>Date & Time</th>
              <th class="menzi-col-wide">Service</th>

              <th>status</th>
              <?php
              if($_SESSION['role'] == 2 || $_SESSION['role'] == 4){
                ?>
              <th class="menzi-col-form">Medical Records</th>
              <th class="menzi-col-form">Medecines schedule</th>
                <?php
              }
              ?>
            </tr>
          </thead>


          <tbody>
            <?php
            require "../includes/user_role.php";

            if($_SESSION['role'] == 3){
              $quer = "SELECT * FROM bookings_view where ref_healthcare_providers = ? and b_status in ('PAYMENT PENDING','APPROVED') order by b_id desc";
              $quer_params = [$user_institution];
            }
            elseif($_SESSION['role'] == 2){
              $quer = "SELECT * FROM bookings_view where user_id = ? and b_status in ('PAYMENT PENDING','APPROVED') order by b_id desc";
              $quer_params = [$_SESSION['id']];
            }
            elseif($_SESSION['role'] == 1){
              $quer = "SELECT * FROM bookings_view where b_status in ('PAYMENT PENDING','APPROVED') order by b_id desc";
              $quer_params = [];
            }
            elseif($_SESSION['role'] == 4){
              $quer = "SELECT * FROM bookings_view where b_ref_user = ? and b_status in ('PAYMENT PENDING','APPROVED') order by b_id desc";
              $quer_params = [$_SESSION['id']];
            }
            $rep = db_query($quer, $quer_params);
            while($row=mysqli_fetch_assoc($rep)){
              $qu = "SELECT * FROM users where user_id = ?";
              $rfa = db_query($qu, [$row['b_ref_user']]);
              $voro = mysqli_fetch_assoc($rfa);
              $user_name = $voro['name'];              
              ?>

              <tr>
                <td><?php echo e($user_name); ?></td>
                <td><?php echo e($row['b_booking_code']); ?></td>
                <td><?php echo e($row['b_appointment_date']); ?> <br>at  <?php echo e($row['b_appointment_time']); ?></td>
                <td><b> <?php echo e($row['sp_name']); ?></b></td>
                <td><?php echo e($row['b_status']); ?></td>
                <?php 
                if($_SESSION['role'] == 2){
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