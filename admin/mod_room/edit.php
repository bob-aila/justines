
<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$_SESSION['id']=$_GET['id'];
require_once '../../includes/config.php';
$query = $conn->query("SELECT * FROM room where roomNo=".$_SESSION['id']) or die(mysql_error());
$fetch = $query->fetch_array();
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>Edit Room</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="rmNo" type="hidden" value="<?php echo $fetch['roomNo']; ?>">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Room Name" type="text" value="<?php echo $fetch['roomName']; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "rmtype">Room Type:</label>

              <div class="col-md-8">
              <select class="form-control input-sm" name="rmtype" id="rmtype"> 
                  	<option value="None">None</option>
                  	<?php
                    require_once '../../includes/config.php';
                    $query2 = $conn->query("SELECT * FROM roomtype ") or die(mysql_error());
                    while($cur = $query2->fetch_array()){
                  		echo '<option value='.$cur['typeID'].'>'.$cur['typename'].'</OPTION>';
                  	}

                  	?>
                  </select>	
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "price">Price:</label>

              <div class="col-md-8"> 
                <input class="form-control input-sm" id="price" name="price" placeholder=
									  "Price" type="text" value="<?php echo $fetch['price']; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "adult">Adults:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="adult" name="adult" placeholder=
									  "Adult" type="text" value="<?php echo $fetch['Adults']; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "children">Children:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="children" name="children" placeholder=
									  "Children" type="text" value="<?php echo $fetch['Children']; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "location">Location:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="location" name="location" placeholder=
									  "Location" type="text" value="<?php echo $fetch['location']; ?>" onkeyup="javascript:checkNumber(this);" readonly>
              </div>
            </div>
          </div>
	
		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	
	
</form>


</div><!--End of container-->
			
