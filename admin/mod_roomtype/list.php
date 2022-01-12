<div class="container">
		<div class="panel panel-primary">
			<div class="panel-body">
			<h3 align="left">List of Room Types</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr >
				  		<th>No.</th>
				  		<th>  
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  
				  		 Roomt Type</th>
				  		<th>Description</th>
							 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
					    require_once '../config.php';
					    $query = $conn->query("SELECT *  FROM `roomtype`") or die(mysql_error());
					    while($fetch = $query->fetch_array()){
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td width="20%" align="left"><input type="checkbox" name="selector[]" id="selector[]" value="'.$fetch['typeID']. '"/>
				  				<a  href="index.php?view=edit&id='.$fetch['typeID'].'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=view&id='.$fetch['typeID'].'">' . ' '.$fetch['typename'].'</a></td>';
				  		echo '<td>'. $fetch['Desp'].'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	</div><!--End of Main Panel-->

</div><!--End of container-->

