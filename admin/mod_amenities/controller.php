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

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}

function doInsert(){
	if ($_POST['name'] == "" OR $_POST['description'] == "") {
				
		echo "<script> alert('All fields required!')</script>";
		redirect("index.php?view=add");
		
	}
	            $amen_name = $_POST['name'];
				$description = $_POST['description'];

		if (!isset($_FILES['image']['tmp_name'])) {
			echo "<script> alert('NO image selected!')</script>";
		    //redirect("index.php?view=add");
		    	}else{
				$file=$_FILES['image']['tmp_name'];
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);
				if ($image_size==FALSE) {
					echo "<script> alert('That's not an image!')</script>";
			        redirect("index.php?view=add");
				}else{
			$location="pics/".$_FILES["image"]["name"];
			$amen_image = $location;
			    if(file_exists($location)){
			
				echo "<script> message('There is such an image. Please select another one!')</script>";
				redirect("index.php?view=add");	
			   }
			require_once '../config.php';
	        $sql = "INSERT INTO `amenities` (`amen_name`, `amen_desp`, `amen_image`) VALUES('$amen_name','$description','$location')";
            if ($conn->query($sql) === TRUE) {
	        //insert the image
			move_uploaded_file($_FILES["image"]["tmp_name"],"pics/".$_FILES["image"]["name"]);
			redirect("index.php");	
		} else{
			echo ('<script> alert("Failed")</script>');
			redirect("index.php");
  
	}
   }
  
  }
  }
//function to modify rooms

 function doEdit(){
	if(!isset($_SESSION)) { 
		session_start(); 
	 } 
          		$rm_id			= $_POST['amen_id'];
				$rm_name		= $_POST['name'];
				$rm_description = $_POST['description'];
	
			require_once '../config.php';
		    $sql = $conn->query("UPDATE amenities SET amen_name = '$rm_name', amen_desp = '$rm_description' WHERE amen_id='$rm_id'");
			echo ('<script> alert('.$rm_name.'"Updated successfully.")</script>');
			 	unset($_SESSION['id']);
			 	redirect('index.php');
}

function doDelete(){
 $id=$_POST['selector'];
 foreach($id as $val){
  require_once '../config.php';
  $query = $conn->query("SELECT * FROM amenities WHERE amen_id=".$val);
  $fetch = $query->fetch_array();
  $img = $fetch['amen_image'];
  unlink($img);
  $sql =  $conn->query("DELETE FROM amenities WHERE amen_id=".$val);  
 }
 redirect("index.php");
}


 //function to modify picture
 
function editImg (){
	if(!isset($_SESSION)) { 
			  session_start(); 
		   } 
		if (!isset($_FILES['image']['tmp_name'])) {
			echo "<script> alert('No Image Selected!')</script>";
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				echo "<script> alert('That's not an image!')</script>";
				redirect("index.php?view=list");
		   }else{
			
		
				$location="pics/".$_FILES["image"]["name"];
	          		$rm_id		= $_POST['id'];
					  include_once '../config.php';
					  $query = $conn->query("SELECT * FROM amenities WHERE amen_id=".$rm_id);
					  $fetch = $query->fetch_array();
					  $img = $fetch['amen_image'];
					  if(file_exists($img)){
						unlink($img);
					  }
					
					  move_uploaded_file($_FILES["image"]["tmp_name"],"pics/".$_FILES["image"]["name"]);
					$query = $conn->query("UPDATE amenities SET amen_image = '$location' WHERE amen_id=".$rm_id);
					unset($_SESSION['id']);
					redirect('index.php');

 			}
 		}		 
}

function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql = "SELECT * 
            FROM amenities
            WHERE amen_id ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}
global $mydb;
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
foreach ($cur as $value) {
	$deleted = @unlink($value->amen_image);

}
    
    /*if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($amen_image);
		}	
    }
    */
return $deleted;
}
?>