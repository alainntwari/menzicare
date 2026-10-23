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
                  <form class="form-horizontal form-label-left">

                    <div class="item form-group">
                      <div class="col-sm-12 col-md-1"></div>
                      <div class="col-md-5 col-sm-6 ">
                        <select required="required" id="search-test" class="form-control" onchange="search_test()">
                          <option value="">Select Medical Test</option>
                          <?php
                          $query = "SELECT * FROM tests where test_status = 'ACTIVE'";
                          $re = mysqli_query($con,$query);
                          while($rop=mysqli_fetch_assoc($re)){
                            ?>
                            <option value="<?php echo $rop['test_id']; ?>"><?php echo $rop['test_name']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div> 
                      <div class="col-md-3 col-sm-4 ">
                        <input type="text" id="search-location" required="required" class="form-control" placeholder="Location">
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <a href="#" onclick="search_test()" class="btn btn-success"><i class="fa fa-search"></i>  Search
                        </a>
                      </div>
                    </div>
                    
                    

                  </form>
                </div>
              </div>
            </div>
          </div>