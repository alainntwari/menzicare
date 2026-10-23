<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">District <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<?php
require '../includes/config.php';
require_role(ROLE_SUPER_ADMIN);
$province = (int)($_GET["province"] ?? 0);
if($province > 0)
{
	$query = "SELECT * FROM districts where parent_id = ?";
	$res = db_query($query, [$province]);
	echo '<select id="districtdd" class="form-control" required="required" name="district" onChange="change_district()">
	<option value="">District</option>';
	while($row=mysqli_fetch_assoc($res)){

		echo " <option value='" . e($row['district_id']) . "'>" . e($row['district_name']) . "</option>";
	}
	echo"</select>";
}

?>
</div>
</div>