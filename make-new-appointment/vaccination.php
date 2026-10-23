<?php defined('MENZICARE_APP') || exit; ?>
<?php

$service_availability = $service_availability;


$que = "SELECT * FROM vaccine_institution_location_concatination_new where vi_id = ?";
$res = db_query($que, [$service_availability]);
$row = mysqli_fetch_assoc($res);
$service = $row['vaccine_name'];
$hospital = $row['hi_institute'];
$hospital_id = $row['hi_id'];


?> 
  <div class="page-title">
    <div class="title_left">
      <h4>
      </h4>
    </div>
  </div>
  <div class="col-md-12">
  <div class="col-md-5 col-sm-12">
  	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2 style="font-size: 16px;">Book Appointment of <b> <?php echo e($service); ?> </b>at <b><?php echo e($hospital); ?></b> </h2>
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
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/booking-vaccine.php">
<?php echo csrf_field(); ?>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Appointment Date<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                        <input type="date" name="date"  class="form-control" required="required">
                        <input type="test" name="service_availability" value="<?php echo e($service_availability); ?>"  class="form-control" style="display: none;" required="required">
											
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Make Appointment</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
  </div>
 <?php
  include "hospital-details.php";
 ?>

</div>