<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$id=$_GET['id'];
require_once '../../includes/config.php';
$query = $conn->query("SELECT * FROM `comments` WHERE `comment_id`=".$id) or die(mysql_error());
$fetch = $query->fetch_array();

?>

<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">DETAILS</h3></caption>
			<tr>
				<td>
			<p>
<strong>Name :</strong><?php echo $fetch['firstname']." ".$fetch['lastname']; ?></br>
<strong>E-Mail :</strong><?php echo $fetch['email']; ?></br>
<strong>Comment :</strong><?php echo $fetch['comment']; ?></br>
<br/>
<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a></p>
</td>
</tr>

		</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
