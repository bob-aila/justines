<div class="container">
		<div class="panel panel-primary">
			<div class="panel-body">
			<h3 align="left">List of Amenities</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example"class="table table-hover">
					
				  <thead>
				  	<tr  >
				  		<th>No.</th>
				  		<th align="center"  width="120">
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		Amenity Name</th>
				  		<th align="center"  width="200">Image</th>
				  		<th align="center" width="120">Description</th>
				  		
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
					  require_once '../../includes/config.php';
					  $query = $conn->query("SELECT *  FROM `amenities`") or die(mysql_error());
					  while($fetch = $query->fetch_array()){
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$fetch['amen_id']. '"/>
				  				<a  href="index.php?view=edit&id='.$fetch['amen_id'].'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=view&id='.$fetch['amen_id'].'">' . ' '.$fetch['amen_name'].'</a></td>';
				  		echo '<td><a href="index.php?view=editpic&id='.$fetch['amen_id'].'"" title="Click here to Change Image."><img src="'. $fetch['amen_image'].'" width="60" height="60" title="'.$fetch['amen_name'].'"/></a></td>';
						echo '<td>'. $fetch['amen_desp'].'</td>';
				  		echo '</tr>';
				  	}
				  
				  	?>


				  </tbody>
				  <tfoot>
				  	<tr><td></td><td></td><td></td></tr>
				  </tfoot>	
				</table>

				
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	</div><!--End of Main Panel-->

</div><!--End of container-->

