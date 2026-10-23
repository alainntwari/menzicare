<?php defined('MENZICARE_APP') || exit; ?>
  <div class="page-title">
    <div class="title_left">
      <h3>Patients</h3>
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Patients<small>Below is the list of all patients who created an account in the system</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!--<a class="dropdown-item" onclick="create_new_user()">Create New</a>-->
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
        <p class="text-muted font-13 m-b-30">
          Below is the list of all registered Patients
        </p>
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
          <thead>

            <tr>
              <th>User</th>
              <th>Joined Date</th>
              <th>Province</th>
              <th>District</th>
              <th>Sector</th>
              <th>Cell</th>
              <th>Village</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $quer = "SELECT * FROM users where role <> 4";
            $res = db_query($quer);
            while($row=mysqli_fetch_assoc($res)){
            	$user = $row['name'];
            	$joined_date = $row['joined_date'];
            	$status = $row['status'];

            	$hu1 = "SELECT * FROM roles where role_id = ?";
        		$g1= db_query($hu1, [$row['role']]);
        		$bh1 = mysqli_fetch_assoc($g1);
        		$role = $bh1['role_name'];

            	if($row['ref_healthcare_providers'] == 0){
            		$institution = '-';

            	}
            	else{
            		$hu = "SELECT * FROM healthcare_institutions where hi_id = ?";
            		$g = db_query($hu, [$row['ref_healthcare_providers']]);
            		$bh = mysqli_fetch_assoc($g);
            		$institution = $bh['hi_institute'];
            	}

            	
              
              ?>

              <tr>
                <td><?php echo e($user); ?></td>
                <td><?php echo e($institution); ?></td>
                <td><?php echo e($joined_date); ?></td>
                <td><?php echo e($role); ?></td>
                <td><?php echo e($status); ?></td>
                <td><button class="btn btn-success" onclick="view_user_details(<?php echo e($row['user_id']); ?>)">View</button></td>
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