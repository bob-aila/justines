
<div class="container">
<div class="panel panel-primary">
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
	<table id="example" class="table table-striped" cellspacing="0">
<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Name</strong></td>
<td width="80"><strong>Confirmation</strong></td>
<td width="80"><strong>Arrival</strong></td>
<td width="70"><strong>Departure</strong></td>
<td width="70"><strong>Room</strong></td>
<td width="80"><strong>Type</strong></td>
<td width="80"><strong>Nights</strong></td>
<td width="80"><strong>Status</strong></td>
<td width="100"><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php
require_once '../config.php';
//$query = $conn->query("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomName AND re.guest_id=gu.guest_id");
$query = $conn->query("SELECT * , roomName, firstname, lastname
FROM reservation re, room ro, guest gu, roomtype rt
WHERE re.roomNo = ro.roomName
AND ro.typeID = rt.typeID
AND re.guest_id = gu.guest_id") or die(mysql_error());
while($fetch = $query->fetch_array()){
?>
<tr>
<td width="5%" align="center"></td>
<td><?php echo $fetch['firstname']." ".$fetch['lastname']; ?></td>
<td><?php echo $fetch['confirmation']; ?></td>
<td><?php echo $fetch['arrival']; ?></td>
<td><?php echo $fetch['departure']; ?></td>
<td><?php echo $fetch['roomName']; ?></td>
<td><?php echo $fetch['typename']; ?></td>
<td><?php echo dateDiff($fetch['arrival'],$fetch['departure']); ?></td>
<td><?php echo $fetch['status']; ?></td> 

<!--<td><a class="btn btn-default toggle-modal-reserve" href="#reservationr<?php echo $fetch['reservation_id']; ?>" role="button" >View</a></td>-->
<td >
	<?php 
		if($fetch['status'] == 'Confirmed'){ ?>
		<a class="cls_btn" id="<?php echo $fetch['reservation_id']; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." ><i class="icon-edit">test</a>
			<a href="index.php?view=view&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkin&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-success btn-xs" ><i class="icon-edit">Check in</a>
		<?php
		}elseif($fetch['status'] == 'Checkedin'){
	?>
			<a href="index.php?view=view&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkout&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Check out</a>
	<?php
		}else{
			?>
			<a href="index.php?view=view&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="index.php?view=view&id=<?php echo $fetch['reservation_id']; ?>" class="btn btn-success btn-xs" disabled="disabled"><i class="icon-edit">Check in</a>
	<?php
		}

	?>
	
	
</td>

<?php }
?>
  
		<div class="modal fade" id="profile" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						

						<div class="alert alert-info">Profile:</div>
					</div>

					<form action="#"  method=
					"post">
						<div class="modal-body">
					
												
								<div id="display">
									
										<p>ID : <div id="infoid"></div></p><br/>
											Name : <div id="infoname"></div><br/>
											Email Address : <div id="Email"></div><br/>
											Gender : <div id="Gender"></div><br/>
											Birthday : <div id="bday"></div>
										</p>
										
								</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type=
							"button">Close</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</table>

</form>
</div>
</div>