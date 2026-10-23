<?php
include "../includes/config.php";

$type = $con->real_escape_string($_GET['aty']);
$service_availability = $con->real_escape_string($_GET['dahd']);
$time = $con->real_escape_string($_GET['cbh']);
$date = $con->real_escape_string($_GET['ddf']);

if($type == 1){
	$active_page = 'doctor-appointments';
}
elseif($type == 2){
	$active_page = 'medical-tests';
}
elseif($type == 3){
	$active_page = 'vaccinations';
}

?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../includes/head.php"; ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

        <!-- sidebar menu -->
       <?php include "../includes/sidebar.php"; ?>
        <!-- /sidebar menu -->
          

        <!-- top navigation -->
        
       <?php include "../includes/top-navigation.php"; ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" id="content_here">
          <div class="">

            <?php 

              if($type == 1){
					include "doctor.php";
				}
				elseif($type == 2){
					include "medical-test.php";
				}
				elseif($type == 3){
					include "vaccination.php";
				}

           ?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "../includes/footer.php"; ?>
        <!-- /footer content -->
      </div>
    </div>

    <?php include "../includes/scripts.php"; ?>
	
  </body>
</html>
