<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$id=$_GET['id'];
require_once '../config.php';
$query = $conn->query("SELECT * , roomName, firstname, lastname
FROM reservation re, room ro, guest gu, roomtype rt
WHERE re.roomNo = ro.roomName
AND ro.typeID = rt.typeID
AND re.guest_id = gu.guest_id
AND re.reservation_id=".$id) or die(mysql_error());
$fetch = $query->fetch_array();
?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Room Details</h3></caption>
			<tr>
				<td width="80"><img src="<?php echo "../mod_room/".$fetch['roomImage']; ?>" width="300" height="300" title="<?php echo $fetch['roomName']; ?>"/></td>
<td>
<p>
<strong>FIRSTNAME: </strong><?php echo $fetch['firstname']; ?><br/>

<strong>LAST NAME: </strong><?php echo $fetch['lastname'];?><br/>

 <strong>PHONE: </strong><?php echo $fetch['phone'];?><br/>

<strong>E-MAIL: </strong><?php echo $fetch['email'];?><br/>

<strong>ARRIVAL: </strong><?php echo $fetch['arrival'];?><br/>

<strong>DEPARTURE: </strong><?php echo $fetch['departure']; ?><br/>

<b><h4>Status: </h4></b><h4><i><?php echo $fetch['status'];?></i></h4>
</p>
<?php 
	$stat = $fetch['status'];
	if($stat == 'pending'){?>
		 <a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
		  <a href="controller.php?action=confirm&res_id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>  Confirm</a>
<?php 
	}elseif($stat == 'Confirmed'){
?>
	<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
	    <a href="controller.php?action=cancel&res_id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus-sign"></span>  Cancel</a>
	  
<?php
}else{
	?>

<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
<?php
}

?>
 
</td>
</tr>




			</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
