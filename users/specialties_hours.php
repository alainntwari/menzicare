<?php
include "../includes/config.php";
require_role(ROLE_SUPER_ADMIN, ROLE_ADMIN);
$ds_id = (int)($_GET['id'] ?? 0);
if (!can_manage_service($ds_id)) {
  deny_access();
}
?>
<div class="row">
  <div class="col-sm-12 text-right"><button class="btn btn-danger">Back</button></div>


  <div class="col-md-7 col-sm-6" style="background: #f7f7f7;">

  	<h4>Available Schedule</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Day</th>
          <th>From</th>
          <th>To</th>
          <th>Max</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $cer = "SELECT * FROM users_doctors_specialities_names_availability where ds_id = ? and da_status = 'ACTIVE'";
        $br = db_query($cer, [$ds_id]);
        while($xow = mysqli_fetch_assoc($br)){
          ?>
          <tr>
            <td><?php echo e($xow['da_day']); ?></td>
            <td><?php echo e($xow['da_start_time']); ?></td>
            <td><?php echo e($xow['da_end_time']); ?></td>
            <td><button class="btn btn-outline-info" onclick="(<?php echo e($xow['ds_id']); ?>)">Edit</button></td>
          </tr>
          <?php
        }
        ?>
        
      </tbody>
    </table>
  </div>
  <div class="col-md-5 col-sm-6">
  	<h4>Add Schedule</h4>
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../app/save_doctor_working_hour.php">
<?php echo csrf_field(); ?>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Day <span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="ds_id" value="<?php echo e($ds_id); ?>" readonly="readonly" style="display: none;">
				<select class="form-control" required="required" name="day" id="day">
					<option value="">Select Day</option>
					<option value="Monday">Monday</option>
					<option value="Tuesday">Tuesday</option>
					<option value="Wednesday">Wednesday</option>
					<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
					<option value="Saturday">Saturday</option>
					<option value="Sunday">Sunday</option>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="start_time">Start Time<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="time" name="start_time" id="start_time" class="form-control">
				
			</div>
		</div>
		
	
		
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="end_time">End Time<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 ">
				
				<input type="time" name="end_time" id="end_time" class="form-control">
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="max">Max Patients<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="number" id="max" name="max" required="required" class="form-control ">
			</div>
		</div>
		<div class="ln_solid"></div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>

	</form>
  </div>
</div>