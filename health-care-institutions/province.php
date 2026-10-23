<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">District <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<?php
require '../includes/config.php';
$province = $_GET["province"];
if($province !="")
{
	$query = "SELECT * FROM districts where parent_id = $province";
	$res = mysqli_query($con,$query);
	echo '<select id="districtdd" class="form-control" required="required" name="district" onChange="change_district()">
	<option value="">District</option>';
	while($row=mysqli_fetch_assoc($res)){

		echo " <option value='{$row['district_id']}'>{$row['district_name']}</option>";
	}
	echo"</select>";
}

?>
</div>
</div>