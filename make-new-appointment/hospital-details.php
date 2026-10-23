<?php defined('MENZICARE_APP') || exit; ?>
<div class="col-md-7 col-sm-12">
    <?php
    $hospital_name = $hospital;
    $hospital_id = $hospital_id;

    $fer = "SELECT * FROM hospital_details where hd_ref_hospital = ?";
    $bo = db_query($fer, [$hospital_id]);
    $cow = mysqli_fetch_assoc($bo);
    $website = $cow['hd_website'];
    $presentation = $cow['hd_presentation'];
    $insurances = $cow['hd_insurances'];
    $payment = $cow['hd_payment'];
    $schedule = $cow['hd_schedule'];
    $prices = $cow['hd_prices'];
    $logo = $cow['hd_logo'];


    $fer2 = "SELECT * FROM providers_location where pl_ref_provider = ?";
    $bo2= db_query($fer2, [$hospital_id]);
    $cow2 = mysqli_fetch_assoc($bo2);
    $map = $cow2['map'];
    $contact = '+250'.$cow2['pl_phone'];
    $address = e($cow2['pl_street'].' , '.$cow2['pl_sector']).' <br>'.e($cow2['pl_district'].', '.$cow2['pl_province']);
    ?>
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> <?php echo e($hospital_name); ?> <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-sm-4">
        <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Access Information</a>
            <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Presentation of the hospital</a>
            <a class="nav-link" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Insurances</a>
            <a class="nav-link" id="education-tab" data-toggle="pill" href="#education" role="tab" aria-controls="education" aria-selected="true">Prices & Payments</a>
            <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab" aria-controls="social" aria-selected="true">Schedule</a>
            <a class="nav-link" id="payment-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Team</a>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
             <div class="col-md-6 col-sm-12" style="background: #f7f7f7;">
               <h3>Payments</h3>
                <span style="font-size: 16px;"><?php echo nl2br(e($payment)); ?></span>
              </div>
             <div class="col-md-6 col-sm-12" style="background: #f7f7f7;">
               <h3>Prices</h3>
                <span style="font-size: 16px;"><?php echo nl2br(e($prices)); ?></span>
              </div>
              
          </div>

          <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
            <div class="row">

              <div class="col-md-12 col-sm-12" style="background: #f7f7f7;">
                <h3>Schedule</h3>
                <span style="font-size: 16px;"><?php echo nl2br(e($schedule)); ?></span>
              </div>
             
            </div>
          </div>


          <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
            <div class="row">

              <div class="col-md-12 col-sm-12" style="background: #f7f7f7;">
                <h3>Team</h3>
              </div>
              <?php
              $sp_name = 'none';
              $gery = "SELECT * FROM users_doctors_specialities_names where ref_healthcare_providers = ? order by sp_name";
              $fer = db_query($gery, [$hospital_id]);
              while($gow = mysqli_fetch_assoc($fer)){
                if($sp_name != $gow['sp_name']){
                    if($gow['image'] == 'no_user.png'){
                      if($gow['gender'] == 1){
                        $image = "../assets/images/male.png";
                      }
                      else{
                        $image = "../assets/images/female.png";
                      }
                    }
                    else{
                      $image = '../assets/images/'.$gow['image'];
                    }
                    ?>
                    <hr>
                    </div>
                    <br>
                    <div class="row" style="background: #f7f7f7;">
                     <div class="col-md-12 col-sm-12">
                        <hr>
                        <h4><?php echo e($gow['sp_name']); ?></h4>
                        
                     </div>
                    


                     <div class="col-md-6">
                         <div class="profile clearfix">
                        <div class="profile_pic">
                          <img src="<?php echo e($image); ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                          <span><?php echo e($gow['name']); ?></span>
                        </div>
                      </div>
                     </div>
                    <?php
                }

                else{
                    ?>
                    <div class="col-md-6">
                         <div class="profile clearfix">
                        <div class="profile_pic">
                          <img src="<?php echo e($image); ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                          <span><?php echo e($gow['name']); ?></span>
                        </div>
                      </div>
                     </div>
                    <?php
                }
                $sp_name = $gow['sp_name'];
              }
              ?>
            </div>
          </div>




    


          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">

              <div class="col-md-12 col-sm-12" style="background: #f7f7f7;">
              <h3>Insurances</h3>
                <span style="font-size: 16px;"><?php echo nl2br(e($insurances)); ?></span>
              </div>
            </div>
            
          </div>
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             <div class="row">
                <div class="col-md-12 col-sm-12" style="background: #f7f7f7;">
              <h3>Location & Access Information</h3>
              </div>
              <div class="col-md-6" style="background: #f7f7f7;">
                  <br><br><b>Address</b> <br><?php echo $address; ?><br><br>
                  <b>Contact Number</b> <br><?php echo e($contact); ?><br><br>
                  <b>Website</b> <br> <a href="<?php echo e_url($website); ?>" target="_blank">Visit Website</a>
              </div>
              <div class="col-md-6" style="background: #f7f7f7;">
                   <iframe style="border: 0;" src="<?php echo e_url($map); ?>"></iframe>
              </div>

            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
              <div class="col-md-12 col-sm-12" style="background: #f7f7f7;">
              <h3>Hospital Presentation</h3>
                <span style="font-size: 16px;"><?php echo nl2br(e($presentation)); ?></span>
              </div>
            </div>
          </div>
         </div>
        </div>
       
        
      </div>
    </div>    
</div>