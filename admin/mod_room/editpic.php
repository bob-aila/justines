<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
$_SESSION['id']=$_GET['id'];
require_once '../../includes/config.php';
$query = $conn->query("SELECT * FROM room where roomNo=".$_SESSION['id']) or die(mysql_error());
$fetch = $query->fetch_array();
?>
<div class="panel panel-primary">
	<div class="panel-body">
		<form class="form-horizontal well span6" action="controller.php?action=editimage" enctype="multipart/form-data" method="POST">
		<table class="table table-hover" border="0" width="50">
			<caption><h3 align="left">Modify Image</h3></caption>
		<tr>
		<td width="80">
			<input name="id" type="hidden" value="<?php echo $_SESSION['id']; ?>">
			<img src="<?php echo $fetch['roomImage']; ?>" width="300" height="300" /></td>
		</tr>

		<tr>
		<td width="80">
			<input id="image" name="image" type="file"></td>
		</tr>
		<tr>
		<td width="80"><input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >  
		 <button class="btn btn-primary" name="save" type="submit" >Save</button>

		</td>
		</tr>
	
		</table>
	</form>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
