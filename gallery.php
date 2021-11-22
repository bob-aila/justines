
<!--End of Header-->
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default">
				
							<div class="panel-body">	
								<div class="col-xs-12 col-sm-12">
									<fieldset>
										<legend><h2 class="text-left">List of Amenities</h2></legend>
										<?php 

											require_once 'includes/config.php';
											$query = $conn->query("SELECT * FROM amenities ORDER BY `amen_id` ASC") or die(mysql_error());
											while($fetch = $query->fetch_array()){

												$image = 'admin/mod_amenities/'.$fetch['amen_image'];
												echo '<div style=" float:left;  margin:7px;">';		
												echo '<a href="'.$image.'" rel="prettyPhoto[mwaura]"><img src="'.$image.'" width="100px" height="120px" 
												style="-webkit-border-radius:5px; -moz-border-radius:5px;"  title="'.$fetch['amen_name'].'" alt="'.$fetch['amen_name'].'" >
												<br>'.$fetch['amen_name'].'</a>';
												echo'</div>';
												
											}
										
										?>


									</fieldset>	
								</div>
							</div>
						</div>	
				
					
				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
	<!--/row-->
