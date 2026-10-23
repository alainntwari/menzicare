<?php defined('MENZICARE_APP') || exit; ?>
  <?php
  // Whose records: set $patient_id before including (patients/history.php), defaults to the logged-in patient
  $patient_id = (int)($patient_id ?? $_SESSION['id']);
  ?>
  <div class="page-title">
    <div class="title_left">
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Medical Records<small></small></h2>
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
			           		<th>Appointment Details</th>
			           		<th>Patient History</th>
			           		<th>Physical Examination</th>
			           		<th>Investigation</th>
			           		<th>Diagnosis</th>
			           		<th>Treatment</th>
			           	</tr>
			           </thead>
			           <tbody>
			           	<?php 
			           	$query = "SELECT * FROM medical_records where user_id = ? order by dn_id desc";
			           	$res = db_query($query, [$patient_id]);
			           	while($row = mysqli_fetch_assoc($res)){
			           		$query2 = "SELECT * FROM doctors_institutions where user_id = ?";
			           		$res2 = db_query($query2, [$row['dn_updated_by']]);
			           		$row2 = mysqli_fetch_assoc($res2);
			           		$doctor = $row2['name'];
			           		$hospital = $row2['hi_institute']
			           	 ?>
			           	 <tr>
			           		<td>Doctor:<b><?php echo e($doctor); ?></b> <br> Hospital: <b><?php echo e($hospital); ?></b><br> Date: <?php echo e($row['dn_updated_date']); ?></td>
			           		<td><?php echo nl2br(e(menzi_decrypt($row['dn_patient_history']))); ?></td>
			           		<td><?php echo nl2br(e(menzi_decrypt($row['dn_physical_examination']))); ?></td>
			           		<td><?php echo nl2br(e(menzi_decrypt($row['dn_investigation']))); ?></td>
			           		<td><?php echo nl2br(e(menzi_decrypt($row['dn_diagonisis']))); ?></td>
			           		<td><?php echo nl2br(e(menzi_decrypt($row['dn_treatment']))); ?></td>
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