<?php defined('MENZICARE_APP') || exit; ?>
<div class="row">
<?php
$que = "SELECT * FROM vaccines where vaccine_status = 'ACTIVE'";
$res = mysqli_query($con,$que);
while($row=mysqli_fetch_assoc($res)){
	?> 
	
     <div class="animated flipInY col-md-4 col-sm-12">
        <a href="#" onclick="search_vaccine_id(<?php echo e($row['vaccine_id']); ?>)">
          <div class="tile-stats" style="background: #2a3f54; color: #fdffe8;  padding-top:20px" width="100%">
            <div class="icon" style="width: 10px;"><i class="fa fa-caret-square-o-right"></i></div>
            
            <h3 style="text-align: left; max-width: 78%; font-size: 20px;"><?php echo e($row['vaccine_name']); ?></h3>
            <br>
            <p style="text-align: left; max-width: 78%; font-size: 12px;">
             	<?php echo e($row['vaccine_details']); ?></p>
          </div>
        </a>
      </div>
	<?php

}
?>
</div>
