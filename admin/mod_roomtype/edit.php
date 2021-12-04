
<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$_SESSION['id']=$_GET['id'];
require_once '../../includes/config.php';
$query = $conn->query("SELECT * FROM roomtype where typeID=".$_SESSION['id']) or die(mysql_error());
$fetch = $query->fetch_array();
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>New Roomtype</legend>
											
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              		<input name="rmtype_id" type="hidden" value="<?php echo $fetch['typeID']; ?>">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Account Name" type="text" value="<?php echo $fetch['typename']; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "description">Description:</label>

              <div class="col-md-8">
                   <input class="form-control input-sm" id="description" name="description" placeholder=
									  "Description" type="text" value="<?php echo $fetch['Desp']; ?>">
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
			

