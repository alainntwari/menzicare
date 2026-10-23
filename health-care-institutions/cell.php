<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Village <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<?php
require '../includes/config.php';
require_role(ROLE_SUPER_ADMIN);
$cell = (int)($_GET["cell"] ?? 0);
if($cell > 0)
{
	$query = "SELECT * FROM villages where parent_id = ?";
	$res = db_query($query, [$cell]);
	echo '<select id="celldd" class="form-control" required="required" name="village" onChange="change_village()">
	<option value="">Village</option>';
	while($row=mysqli_fetch_assoc($res)){
		
		echo " <option value='" . e($row['village_id']) . "'>" . e($row['village_name']) . "</option>";
	}
	echo"</select>";
}
?>
</div>
</div>