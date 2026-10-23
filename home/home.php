<?php defined('MENZICARE_APP') || exit; ?>
<div class="">


          <div class="row">
            

                   <div class="animated flipInY col-md-4 col-sm-12">
                    <a href="../doctor-appointments/">
                      <div class="tile-stats" style="background: #2a3f54; color: #fdffe8;  padding-top:20px" width="100%">
                        <div class="icon" style="width: 10px;"><i class="fa fa-caret-square-o-right"></i></div>
                        
                        <h3 style="text-align: left; max-width: 78%; font-size: 20px;">Doctor Appointments</h3>
                         <p style="text-align: left; max-width: 78%; font-size: 13px;">Search specialists and general doctors.</p>
                      </div>
                    </a>
                  </div>


                  <div class="animated flipInY col-md-4 col-sm-12">
                    <a href="../medical-tests/">
                      <div class="tile-stats" style="background: #2a3f54; color: #fdffe8; padding-top:20px" width="100%">
                        <div class="icon" style="width: 10px;"><i class="fa fa-caret-square-o-right"></i></div>
                        
                        <h3 style="text-align: left; max-width: 78%; font-size: 20px;">Medical Tests</h3>
                         <p style="text-align: left; max-width: 78%; font-size: 13px;">Search medical tests service providers </p>
                      </div>
                   </a>
                  </div>


                  <div class="animated flipInY col-md-4 col-sm-12" style="width:100%;">
                    <a href="../vaccinations/">
                      <div class="tile-stats" style="background: #2a3f54; color: #fdffe8;  padding-top:20px" width="100%">
                        <div class="icon" style="width: 10px;"><i class="fa fa-caret-square-o-right"></i></div>
                        <h3 style="text-align: left; max-width: 78%; font-size: 20px;">Immmunization & Vaccination</h3>

                         <p style="text-align: left; max-width: 78%; font-size: 13px;">Search vaccination service providers.</p>
                      </div>
                    </a>
                  </div>

          </div>

          



<div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Find local doctor and book an appointment online<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="#">Settings 1</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
                      <div class="col-md-3 col-sm-2 text-right align-right">
                        <h2><i class="fa fa-search"></i>  Search : </h2>
                      </div>
                      <div class="col-md-4 col-sm-6 ">
                        <input type="text" id="search-item" required="required" class="form-control" placeholder="Doctors, Specialties, or Hospital Name" onkeyup="search_all()">
                      </div>
                      <div class="col-md-3 col-sm-4 ">
                        <input type="text" id="search-location" required="required" class="form-control" placeholder="Location" onkeyup="search_all()">
                      </div>
                      
                    </div>
                    
                    

                  </form>
                </div>
              </div>
            </div>
          </div>

          <div id="content-id">
            <?php include "doctors_list.php"; ?>
          </div>
          




</div>