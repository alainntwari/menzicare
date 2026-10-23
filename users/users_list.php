  <div class="page-title">
    <div class="title_left">
      <h3>Users</h3>
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Users List<small>Below is the list of all Offline Users of the system</small></h2>
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
        <p class="text-muted font-13 m-b-30">
          Below is the list of all registered users from registered institutions
        </p>
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
          <thead>

            <tr>
              <th>User</th>
              <?php if($_SESSION['role'] == 1){
                ?>
              <th>Institution</th>
                <?php
              } ?>
              <th>Joined Date</th>
              <th>Role</th>
              <th>Status</th>
              <th>Details</th>
            </tr>
          </thead>


          <tbody>
            <?php
            if($_SESSION['role'] == 3){
              $q = "SELECT * FROM users where user_id = '{$_SESSION['id']}'";
              $rf = mysqli_query($con,$q);
              $vor = mysqli_fetch_assoc($rf);
              $quer = "SELECT * FROM users where ref_healthcare_providers = '{$vor['ref_healthcare_providers']}'";  
            }
            else{
                $quer = "SELECT * FROM users where role <> 4";
            }
            $res = mysqli_query($con,$quer);
            while($row=mysqli_fetch_assoc($res)){
            	$user = $row['name'];
            	$joined_date = $row['joined_date'];
            	$status = $row['status'];

            	$hu1 = "SELECT * FROM roles where role_id = {$row['role']}";
        		$g1= mysqli_query($con,$hu1);
        		$bh1 = mysqli_fetch_assoc($g1);
        		$role = $bh1['role_name'];

            	if($row['ref_healthcare_providers'] == 0){
            		$institution = '-';

            	}
            	else{
            		$hu = "SELECT * FROM healthcare_institutions where hi_id = {$row['ref_healthcare_providers']}";
            		$g = mysqli_query($con,$hu);
            		$bh = mysqli_fetch_assoc($g);
            		$institution = $bh['hi_institute'];
            	}

            	
              
              ?>

              <tr>
                <td><?php echo $user; ?></td>
                <?php if($_SESSION['role'] == 1){ ?>
                    <td><?php echo $institution; ?></td>
                <?php } ?>
                <td><?php echo $joined_date; ?></td>
                <td><?php echo $role; ?></td>
                <td><?php echo $status; ?></td>
                <td><button class="btn btn-success" onclick="view_user_details(<?php echo $row['user_id']; ?>)">View</button></td>
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