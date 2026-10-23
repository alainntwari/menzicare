<?php
include "../includes/config.php";
?>
<div class="page-title">
<div class="title_left">
  <h3>Health Care Institutions</h3>
</div>


</div>
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Create New <small>Fill this form to create new</small></h2>
				<ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="heathcare_institutions_list()">List of Providers</a>
              </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/new-healthcare-institutions.php">

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Institution Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="name" name="name" required="required" class="form-control ">
						</div>
					</div>
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
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Province <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<select id="provincedd" class="form-control" required="required" name="province" onChange="change_province()">
								<option value="">Select Province</option>
								<?php
									$bery = "SELECT * FROM provinces";
									$ger = mysqli_query($con,$bery);
									while($gow = mysqli_fetch_assoc($ger)){
										?>
								<option value="<?php echo $gow['province_id']; ?>"><?php echo $gow['province_name']; ?></option>
										<?php
									}
								?>
							</select>
						</div>
					</div>
					<div id="district"></div>
              
	                <div id="sector"></div>
	              
	                <div id="cell"></div>
	              
	                <div id="village"></div>
				 	
				
				
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