<?php
include "../includes/config.php";
?>
<div class="page-title">
<div class="title_left">
  <h3>Users</h3>
</div>


</div>
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Create New <small>Fill this form to create new user of a registered HealthCare Institution</small></h2>
				<ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="users_list()">Users List</a>
              </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/new-healthcare_user.php">

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">User Full Names <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="name" name="name" required="required" class="form-control">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="id_number">User ID number <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="id_number" name="id_number" required="required" class="form-control">
						</div>
					</div>
					<?php 
					if($_SESSION['role'] == 1){
					?>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="institution">Institution Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<select class="form-control" required="required" id="institution" name="institution">
									<option value="">Select Institution</option>
								<?php 
								$dery = "SELECT * FROM healthcare_institutions where is_valid = 'YES' order by hi_institute asc";
								$fer = mysqli_query($con,$dery);
								while($drow=mysqli_fetch_assoc($fer)){
									?>
									<option value="<?php echo $drow['hi_id']; ?>"><?php echo $drow['hi_institute']; ?></option>
									<?php
								}
								?>
								</select>
							</div>
						</div>
					<?php }

					elseif($_SESSION['role'] == 3){
					?>
						<div class="item form-group" style="display: none;">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="institution">Institution Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<select class="form-control" required="required" id="institution" name="institution">
								<?php 
								 $q = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
					              $rf = mysqli_query($con,$q);
					              $vor = mysqli_fetch_assoc($rf);
								?>
									<option value="<?php echo $vor['ref_healthcare_providers']; ?>">1</option>
									
								</select>
							</div>
						</div>
					<?php } ?>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="phone" name="phone" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="email" name="email" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<select id="role" class="form-control" required="required" name="role">
								<option value="">Select Role</option>
								<option value="3">Admin</option>
								<option value="2">Doctor</option>
								
							</select>
						</div>
					</div>
					<div id="doctor"></div>
              
				
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>