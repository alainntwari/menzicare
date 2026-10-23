<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Village <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<?php
require '../includes/config.php';
$cell = $_GET["cell"];
if($cell !="")
{
	$query = "SELECT * FROM villages where parent_id = $cell";
	$res = mysqli_query($con,$query);
	echo '<select id="celldd" class="form-control" required="required" name="village" onChange="change_village()">
	<option value="">Village</option>';
	while($row=mysqli_fetch_assoc($res)){
		
		echo " <option value='{$row['village_id']}'>{$row['village_name']}</option>";
	}
	echo"</select>";
}
?>
</div>
</div>