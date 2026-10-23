<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Cell <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<?php
require '../includes/config.php';
$sector = $_GET["sector"];
if($sector !="")
{
	$query = "SELECT * FROM cells where parent_id = $sector";
	$res = mysqli_query($con,$query);
	echo '<select id="celldd" class="form-control" required="required" name="cell" onChange="change_cell()">
	<option value="">Cell</option>';
	while($row=mysqli_fetch_assoc($res)){
		
		echo " <option value='{$row['cell_id']}'>{$row['cell_name']}</option>";
	}
	echo"</select>";
}
?>
</div>
</div>