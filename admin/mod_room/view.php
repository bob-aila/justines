<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
$_SESSION['id']=$_GET['id'];
require_once '../config.php';
$query = $conn->query("SELECT * FROM `room`,`roomtype` WHERE roomNo=".$_SESSION['id']) or die(mysqli_error());
$fetch = $query->fetch_array();
?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Room Details</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $fetch['roomImage']; ?>" width="300" height="300" title="<?php echo $roomName; ?>"/></td>
		<td align="left" align="left"><p><strong>Name </strong>
		<?php echo ': '.$fetch['typename']; ?><br/>
		<strong>Descrption </strong>
		<?php echo ': '.$fetch['Desp']; ?><br/>
		<strong>Price </strong>
		<?php echo ': '.$fetch['price']; ?><br/>
		<strong>Adults </strong>
		<?php echo ': '.$fetch['Adults']; ?><br/>
		<strong>Children </strong>
		<?php echo ': '.$fetch['Children']; ?><br/>
		<strong>Location</strong>
		<?php echo ': '.$fetch['location']; ?><br/><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
