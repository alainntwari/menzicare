<?php
include "../includes/config.php";

$active_page = 'medical-tests';
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


              include "search.php";
              //include "../home/doctors_list.php";
           ?>
            <div id="content-id">
              <?php
              if(isset($_SESSION['id'])){
                 include "../appointments/test_bookings_list.php";
              }
              else{
                 include "../medical-tests/tests_list.php";

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
