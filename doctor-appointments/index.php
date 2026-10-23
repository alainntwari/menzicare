<?php
include "../includes/config.php";

$active_page = 'doctor-appointments';
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


              include "../home/search_bar.php";
              ?>
              <div id="content-id">
              <?php
              if(isset($_SESSION['id'])){
                 include "../appointments/bookings_list.php";
              }
              else{
                 include "../home/doctors_list.php";

              }
           ?>
           </div>
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
