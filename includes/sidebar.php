<?php defined('MENZICARE_APP') || exit; ?>
<?php
if(isset($_SESSION['id'])){
$dw = "SELECT * FROM users where user_id = ?";
$bg = db_query($dw, [$_SESSION['id']]);
$vow = mysqli_fetch_assoc($bg);
$user_name = $vow['name'];
if($vow['role']==2){
  $menu_title = "Doctor's Menu";
  $ro = 'Doctor';
}
if($vow['role']==3){
  $menu_title = "Admin's Menu";
  $ro = 'Admin';
}
if($vow['role']==4){
  $menu_title = "Menu";
  $ro = 'Patient';
}
if($vow['role']==1){
  $menu_title = "Super Admin Menu";
  $ro = 'Super Admin';
}

if($vow['image'] == 'no_user.png'){
  if($vow['gender'] == 1){
    $image = "../assets/images/male.png";
  }
  else{
    $image = "../assets/images/female.png";
  }
}
else{
  $image = '../assets/images/'.$vow['image'];
}
}
else{
  $menu_title = 'Menu';
  $ro = 'Visitor';
}

?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title4" style="border: 0;" style="height: 300px;">
        <a href="index.html" class="site_title4" style="z-index: 100;" style="height: 300px;"><img src="../assets/images/logo2.png" style="width: 100%;"></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <?php
        if(isset($_SESSION['id'])){
      ?>
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="<?php echo e($image); ?>" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2><?php echo e($ro.', '.$user_name); ?></h2>
        </div>
      </div>
      <?php
    }
      ?>
      <!-- /menu profile quick info -->

      <br />

       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">

          <ul class="nav side-menu">
            <?php
            if($active_page == 'home'){
                $class = 'active';
              }
              else{
                $class = '';
              }
            ?>
            <!--<li class="<?php //echo $class; ?>"><a><i class="fa fa-home"></i> Dashboard</a></li>-->

          </ul>
        </div>
        <div class="menu_section">

          <h3><?php echo e($menu_title); ?></h3>
          <ul class="nav side-menu">

            <?php
          if(isset($_SESSION['id'])){
            if($vow['role']==2){
              if($active_page == 'appointments'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
            <li class="<?php echo e($class); ?>"><a href="../appointments"><i class="fa fa-clock"></i> Appointments</a></li>
            <?php
            if($active_page == 'patients'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
            <li class="<?php echo e($class); ?>"><a href="../patients"><i class="fa fa-users"></i> My Patients</a></li>
              <?php
            }
            if($vow['role']==3){
               if($active_page == 'appointments'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
            <li class="<?php echo e($class); ?>"><a href="../appointments"><i class="fa fa-users"></i> Appointments</a></li>
            <?php
            if($active_page == 'users'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
              <li class="<?php echo e($class); ?>"><a href="../users/"><i class="fa fa-user"></i>User Management</a></li>
              
              <?php
            }
            if($vow['role']==4){
              ?>
              <?php
                  if($active_page == 'home'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                  <?php
                  if($active_page == 'doctor-appointments'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../doctor-appointments/"><i class="fa fa-home"></i> Doctor Appointments</a></li>
                  <?php
                  if($active_page == 'medical-tests'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../medical-tests/"><i class="fa fa-home"></i> Medical Tests</a></li>
                  <?php
                  if($active_page == 'vaccinations'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../vaccinations/"><i class="fa fa-home"></i> Vaccinations</a></li>

                   <?php
                  if($active_page == 'medical-records'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>

                  <li class="<?php echo e($class); ?>"><a href="../medical-records/"><i class="fa fa-home"></i> Medical Records</a></li>
            
            <?php
            }
            if($vow['role']==1){
              if($active_page == 'health-care-institutions'){
                $class = 'active';
              }
              else{
                $class = '';
              }
            ?>
            <li class="<?php echo e($class); ?>"><a href="../health-care-institutions/"><i class="fa fa-user"></i> Health Care Institutions</a></li>
            <?php
              if($active_page == 'users'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
              <li class="<?php echo e($class); ?>"><a href="../users/"><i class="fa fa-user"></i>Healthcare Users</a></li>
              <?php
              if($active_page == 'online-users'){
                $class = 'active';
              }
              else{
                $class = '';
              }
              ?>
              <li class="<?php echo e($class); ?>"><a href="../online-users/"><i class="fa fa-user"></i>Registered Patients</a></li>
              <?php
            }
          }
          else{
            ?>
                <?php
                  if($active_page == 'home'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                  <?php
                  if($active_page == 'doctor-appointments'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../doctor-appointments/"><i class="fa fa-home"></i> Doctor Appointments</a></li>
                  <?php
                  if($active_page == 'medical-tests'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../medical-tests/"><i class="fa fa-home"></i> Medical Tests</a></li>
                  <?php
                  if($active_page == 'vaccinations'){
                    $class = 'active';
                  }
                  else{
                    $class = '';
                  }
                  ?>
                  <li class="<?php echo e($class); ?>"><a href="../vaccinations/"><i class="fa fa-home"></i> Vaccinations</a></li>

            <?php
          }
            ?>

            <!--
            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="form.html">General Form</a></li>
                <li><a href="form_advanced.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="form_wizards.html">Form Wizard</a></li>
                <li><a href="form_upload.html">Form Upload</a></li>
                <li><a href="form_buttons.html">Form Buttons</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="general_elements.html">General Elements</a></li>
                <li><a href="media_gallery.html">Media Gallery</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="glyphicons.html">Glyphicons</a></li>
                <li><a href="widgets.html">Widgets</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="inbox.html">Inbox</a></li>
                <li><a href="calendar.html">Calendar</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tables.html">Tables</a></li>
                <li><a href="tables_dynamic.html">Table Dynamic</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="chartjs.html">Chart JS</a></li>
                <li><a href="chartjs2.html">Chart JS2</a></li>
                <li><a href="morisjs.html">Moris JS</a></li>
                <li><a href="echarts.html">ECharts</a></li>
                <li><a href="other_charts.html">Other Charts</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
              </ul>
            </li>
          -->
          </ul>
        </div>
        <div class="menu_section">
          <h3>Live On</h3>
          <ul class="nav side-menu">
            
            <li><a><i class="fa fa-user"></i> Articles</a></li>
            <li><a><i class="fa fa-home"></i> Health Care tips</a></li>
          </ul>
        </div>

      </div>




        <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="../app/logout.php">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>

      </div>
    </div>