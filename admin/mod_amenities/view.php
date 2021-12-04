<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$_SESSION['id']=$_GET['id'];
require_once '../../includes/config.php';
$query = $conn->query("SELECT * FROM `amenities` where `amen_id`=".$_SESSION['id']) or die(mysql_error());
$fetch = $query->fetch_array();

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Amenity Details</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $fetch['amen_image']; ?>" width="300" height="300" /></td>
		<td align="left" align="left"><p><strong>Name </strong>
		<?php echo ': '.$fetch['amen_name']; ?><br/>
		<strong>Descrption </strong>
		<?php echo ': '.$fetch['amen_desp']; ?><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
