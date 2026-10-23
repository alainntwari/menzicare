<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sector <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
	<?php
require '../includes/config.php';
$district = $_GET["district"];
if($district !="")
{
	$query = "SELECT * FROM sectors where parent_id = $district";
	$res = mysqli_query($con,$query);
	echo '<select id="sectordd" class="form-control" required="required" name="sector" onChange="change_sector()">
	<option value="">Sector</option>';
	while($row=mysqli_fetch_assoc($res)){
		
		echo " <option value='{$row['sector_id']}'>{$row['sector_name']}</option>";
	}
	echo"</select>";
}
?>
</div>
</div>