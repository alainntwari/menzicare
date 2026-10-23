<?php defined('MENZICARE_APP') || exit; ?>
  <div class="page-title">
    <div class="title_left">
      <h3>Health Care Institutions</h3>
    </div>

   
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Health Care Institutions<small>Registered partner healthcare institutions</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="create_new_healthcare_institution()">Create New</a>
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
          Below is the list of all registered Institutions
        </p>
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
          <thead>

            <tr>
              <th>Institution</th>
              <th>Province</th>
              <th>District</th>
              <th>Sector</th>
              <th>Cell</th>
              <th>Village</th>
              <th>Details</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $quer = "SELECT * FROM institutions_location_view";
            $res = db_query($quer);
            while($row=mysqli_fetch_assoc($res)){
              
              ?>

              <tr>
                <td><?php echo e($row['hi_institute']); ?></td>
                <td><?php echo e($row['pl_province']); ?></td>
                <td><?php echo e($row['pl_district']); ?></td>
                <td><?php echo e($row['pl_sector']); ?></td>
                <td><?php echo e($row['pl_cell']); ?></td>
                <td><?php echo e($row['pl_village']); ?></td>
                <td><button class="btn btn-success" onclick="view_institution_details(<?php echo e($row['hi_id']); ?>)">View</button></td>
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