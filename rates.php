<?php
$arrival= '';
$departure= '';
if (isset($_SESSION['from'])){
$arrival = $_SESSION['from']; 
$departure = $_SESSION['to'];
}
if(isset($_POST['btnbook'])){

	if (!isset($_SESSION['from']) || !isset($_SESSION['to'])){
		die("Please Choose check in Date and Check out Out date to continue reservation!");
		header("location: index.php?page=5#index.php?page=5");
	}
		 if(isset($_POST['roomid'])){
    	 $_SESSION['roomid']=$_POST['roomid'];
    	 header('location: booking/');
   
	}
}
 /*if(!isset($_POST['adults'])){
   die("Choose from Adults!");	
    header("location:booking/");
   	//exit;
 }*/
 /* if(isset($_POST['adults'])&&isset($_POST['child'])){
    $_SESSION['roomid']=$_POST['roomid'];
	$_SESSION['adults'] = $_POST['adults'];
	$_SESSION['child']  = $_POST['child'];
   */
//	$_SESSION['roomid']=$_POST['roomid'];

    //exit;
   //} 
  //}

?>
<!--End of Header-->
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default">
						<div class="panel-body">	
							<fieldset>
								<p class="bg-warning">
							
									<?php 
									echo '<div class="alert alert-info" ><strong>From:'.$arrival. ' To: ' .$departure.'</strong>  </div>';
									?></p>
					

								<legend><h2 class="text-left">Room and Rates</h2></legend>
								<?php 
							require_once 'includes/config.php';
							$query = $conn->query("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID") or die(mysql_error());
							while($fetch = $query->fetch_array()){				
							       $mydb= $conn->query("SELECT status FROM reservation
												WHERE ((
												'$arrival' >= arrival
												AND  '$arrival' <= departure
												)
												OR (
												'$departure' >= arrival
												AND  '$departure' <= departure
												)
												OR (
												arrival >=  '$arrival'
												AND arrival <=  '$departure'
												)
												)
												AND roomNo =". $fetch['roomNo']);

							$image ='admin/mod_room/'.$fetch['roomImage'];
						echo '<div style="float:left; width:370px; margin:10px; border-width: 0.5px;
						border-style: solid;
						border-color: #428bca;
						border-radius: 5px;">';
							echo '<div style="float:left; margin-bottom:20px;">';				
					  			echo '<img src="'.$image .'" width="180px" height="180px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" title="'. $fetch['roomName'].'"/>';
							echo '</div>';	
				
						echo '<div style="float: left;width: 185px; padding-left:3px; margin:0px; color:#6a0707;">';
						echo '<form name="book"  method="POST" action="'.'index.php?page=5">';
						//'.  $fetch['typeName'].'<br/>'.  $fetch['price'].'<br/>'.  $fetch['Adults'].'<br/>
						echo '<input type="hidden" name="roomid" value="'. $fetch['roomNo'].'"/>';
				  		echo '<p><strong>Room Type: '. $fetch['typeName'].'<br/><strong>Room No: '. $fetch['roomName'].'<br/> 
		  						<strong>Max Adults: '. $fetch['Adults'].'<br/>  Max Children: '. $fetch['Children'].'<br/>
		  						<strong>Location: </strong>'. $fetch['location'].'<br/><strong>Rate per Night: </strong> '.  $fetch['price'].' </p>';
		                  
	            			//echo $stats->status;
							// if($status=='pending'){
							//   	echo '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Reserve!</strong></div><br>';
							// }elseif($status=='Confirmed'){
							// 	echo '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Book!</strong></div><br>';
							// }else{
								echo '
								  	 <div class="form-group">
							            	<div class="row">
						            			<div class="col-xs-12 col-sm-12">
						            				<input type="submit" class="btn btn-primary btn-sm" name="btnbook" onclick="return validateBook();" value="Book Now!"/>
																           				     
							           			 </div>
							            	</div>
							            </div>';
							//}
	            			
            			
				  		 echo '</form>';
				  		echo '</div>';
						echo '</div>';
				  	
					  	}
					   
					  	?>

				  	
								
							</fieldset>	
						</div>
					</div>	
					
				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
	<!--/row-->
