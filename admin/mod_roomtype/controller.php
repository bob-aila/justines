<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
	if ($_POST['name'] == "" OR $_POST['description'] == "") {
		    echo "<script> alert('All fields required!')</script>";
			redirect("index.php?view=add");
				
	}else{
		$rm_name = $_POST['name'];
		$rm_desc = $_POST['description'];
		require_once '../config.php';
		$query = $conn->query("SELECT * 
			FROM  roomtype 
			WHERE  `typename` ='{$rm_name}'");	
		$fetch = $query->fetch_array();
        if(isset($fetch)){
			echo "<script> alert('Room type already exist!')</script>";
			redirect("index.php?view=add");
		}else{
			$sql = "INSERT INTO `roomtype` (`tpyename`, `Desp`) VALUES('$rm_name','$rm_desc')";
			if ($conn->query($sql) === TRUE) {
				redirect("index.php");
				//echo '<script> die("SUCCESS");</script>';
			}
		}	 

		
	}	
}
function doEdit(){
	if ($_POST['name'] == "" OR $_POST['description'] == "") {
		echo "<script> alert('All fields were required!')</script>";
			redirect("index.php");
		
	}else{
		$rm_id		= $_POST['rmtype_id'];
		$rm_name	= $_POST['name'];
		$rm_desc    = $_POST['description'];
		require_once '../config.php';
		$query = $conn->query("UPDATE roomtype SET typeID ='$rm_id', Desp='$rm_desc' WHERE typename='$rm_name'" );
			redirect("index.php");
			 	
	
		
	}	
		
}

function doDelete(){
	$id=$_POST['selector'];
	foreach($id as $val){
	 require_once '../config.php';
	 $sql =  $conn->query("DELETE FROM roomtype WHERE typeID=".$val);  
	}
	redirect("index.php");
 }

?>