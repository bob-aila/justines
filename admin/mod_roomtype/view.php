
<?php

$_SESSION['id']=$_GET['id'];
require_once '../config.php';
$query = $conn->query("SELECT * FROM `roomtype` WHERE `typeID` =".$_SESSION['id']) or die(mysqli_error());
$fetch = $query->fetch_array();
?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover">
			<caption><h3 align="left">Roomtype Details</h3></caption>

		<td width="30"><strong>Name </strong></td>
		<td><?php echo ': '.$fetch['typename']; ?></td>
		</tr>
		<tr>
		<td width="30"><strong>Descrption </strong></td>
		<td><?php echo ': '.$fetch['Desp']; ?></td>
		</tr>
		<tr>
		<td> <input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" ></td>
		</tr>
		</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  