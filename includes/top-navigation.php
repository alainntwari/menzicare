<?php defined('MENZICARE_APP') || exit; ?>
<?php
if(isset($_SESSION['id'])){
$sery = "SELECT * FROM users where user_id = ?";
$fo = db_query($sery, [$_SESSION['id']]);
$c = mysqli_fetch_assoc($fo);
$fullname = $c['name'];
if($c['image'] == 'no_user.png'){
  if($c['gender'] == 1){
    $image = "../assets/images/male.png";
  }
  else{
    $image = "../assets/images/female.png";
  }
}
else{
  $image = '../assets/images/'.$c['image'];
}
}
?>
<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">

              <ul class=" navbar-right">

                <?php if(isset($_SESSION['id'])){ ?>
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e($image); ?>" alt=""><?php echo e($fullname); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        Change Password
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="../app/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <?php 
                  if($_SESSION['role'] == 2){
                    $kweri = "SELECT count(*) FROM bookings_third_view where ds_ref_user = ? and  b_status in ('SUBMITTED','PAYMENT PENDING','APPROVED')";
                    $resi = db_query($kweri, [$_SESSION['id']]);
                    $ros = mysqli_fetch_assoc($resi);
                    if($ros['count(*)'] > 0){
                      ?>
                        <li role="presentation" class="nav-item dropdown open">
                          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            
                            <span class="badge bg-green"><?php echo e($row['count(*)']); ?></span>
                          </a>
                          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">

                            <?php 
                            $kweria = "SELECT count(*) FROM bookings_third_view where ds_ref_user = ? and  b_status in ('SUBMITTED')";
                            $resia = db_query($kweria, [$_SESSION['id']]);
                            $rosa = mysqli_fetch_assoc($resia);
                            if($rosa['count(*)'] > 0){
                              ?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  
                                  <span>
                                    <span>Submitted Bookings</span>
                                    <span class="time"><?php echo e($rosa['count(*)']); ?></span>
                                  </span>
                                  <span class="message">
                                    Patients who submitted their booking application waiting for approval
                                  </span>
                                </a>
                              </li>
                              <?php
                            }
                            ?>

                            <?php 
                            $kwerias = "SELECT count(*) FROM bookings_third_view where ds_ref_user = ? and  b_status in ('PAYMENT PENDING')";
                            $resias = db_query($kwerias, [$_SESSION['id']]);
                            $rosas = mysqli_fetch_assoc($resias);
                            if($rosas['count(*)'] > 0){
                              ?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  
                                  <span>
                                    <span>Submitted Bookings</span>
                                    <span class="time"><?php echo e($rosas['count(*)']); ?></span>
                                  </span>
                                  <span class="message">
                                    Patients whose booking application is pending for Payment
                                  </span>
                                </a>
                              </li>
                              <?php
                            }
                            ?>

                            <?php 
                            $kweriaa = "SELECT count(*) FROM bookings_third_view where ds_ref_user = ? and  b_status in ('APPROVED')";
                            $resiaa = db_query($kweriaa, [$_SESSION['id']]);
                            $rosaa = mysqli_fetch_assoc($resiaa);
                            if($rosaa['count(*)'] > 0){
                              ?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  
                                  <span>
                                    <span>Submitted Bookings</span>
                                    <span class="time"><?php echo e($rosaa['count(*)']); ?></span>
                                  </span>
                                  <span class="message">
                                    Patients whose booking application have been Approved
                                  </span>
                                </a>
                              </li>
                              <?php
                            }
                            ?>
                            
                            
                          
                            <li class="nav-item">
                              <div class="text-center">
                                <a class="../appointments">
                                  <strong>See All Appointment bookings</strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                            </li>
                          </ul>
                        </li>
                      <?php
                    }
                  }
                ?>

                
              <?php }
              else{
                ?>
                <li class="nav-item" style="padding-left: 15px;">
                  <a href="../login">
                    Login
                  </a>
                <?php
              } ?>
              </ul>
            </nav>
          </div>
        </div>