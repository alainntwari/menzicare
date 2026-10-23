<?php
session_start();
$code = $_GET['code'];
if($code == $_SESSION['confirmation']){
	?>
		<input type="submit" class="btn btn-success" name="submit" value="Submit"> 
	<?php
}
else{
	?>

<input type="submit" class="btn btn-danger disabled" name="submit" value="Submit"> 
	<?php
}
?>