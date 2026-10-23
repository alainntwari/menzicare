<?php
include "../includes/config.php";
$active_page = 'users';
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
        <div class="right_col" role="main" id="main-content">
          
         <?php 
            include "users_list.php";
         ?>
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
