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
	if ($_POST['name'] == "" OR $_POST['rmtype'] == "" OR $_POST['price'] == "") {
		echo "<script> alert('All fields required!')</script>";
			redirect("index.php?view=add");
		
	}
	$rm_name =$_POST['name'];
	$rm_type =$_POST['rmtype'];
	$rm_price =$_POST['price'];
	$rm_adult =$_POST['adult'];
	$rm_children =$_POST['children'];
	$rm_location =$_POST['loc'];
	//test and insert image
	if (!isset($_FILES['image']['tmp_name'])) {
		echo "<script> alert('No Image Selected!')</script>";
		redirect("index.php?view=add");
			}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			if ($image_size==FALSE) {
				echo "<script> alert('That's not an image!')</script>";
				//redirect("index.php?view=add");
			}else{
		$location="rooms/".$_FILES["image"]["name"];
		$rm_image = $location;
		if(file_exists($location)){
			echo "<script> message('There is such an image. Please select another one!')</script>";
			redirect("index.php?view=add");	
		}
		require_once '../config.php';
		$sql = "INSERT INTO `room` (`typeID`, `roomName`, `price`, `Adults`,`Children`,`location`,`roomImage`) VALUES('$rm_type','$rm_name','$rm_price','$rm_adult','$rm_children','$rm_location','$rm_image')";
	   if ($conn->query($sql) === TRUE) {
		//insert the image
	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
	//echo "<script> alert('SUCCESS')</script>";
	rediect("index.php");
	  } else{
			  echo ('<script> alert("Failed")</script>');
			  redirect("index.php");

	  }
	///////////////////////////////////////////////////////////////////////////////
	}
}
}
 function doEdit(){
          		$rm_no			= $_POST['rmNo'];
				$rm_name		= $_POST['name'];
				$rm_type	    = $_POST['rmtype'];
				$rm_price 		= $_POST['price'];
				$rm_adult 		= $_POST['adult'];
				$rm_children 	= $_POST['children'];
				$rm_location    = $_POST['location'];
    
				require_once '../config.php';
		    $sql = $conn->query("UPDATE room SET typeID = '$rm_type', roomName = '$rm_name', price = '$rm_price', Adults = '$rm_adult', Children = '$rm_children' WHERE roomNo='$rm_no'");
			redirect('index.php');
				 
}

function doDelete(){
	$id=$_POST['selector'];
	foreach($id as $val){
	 require_once '../config.php';
	 $query = $conn->query("SELECT * FROM room WHERE roomNo=".$val);
	 $fetch = $query->fetch_array();
	 $img = $fetch['roomImage'];
	 unlink($img);
	 $sql =  $conn->query("DELETE FROM room WHERE roomNo=".$val);  
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
			      require_once '../config.php';
				$location="rooms/".$_FILES["image"]["name"];
				
	          		$rm_id		= $_POST['id'];
					  $query = $conn->query("SELECT * FROM room WHERE roomNo=".$rm_id);
					  $fetch = $query->fetch_array();
					  $img = $fetch['roomImage'];
					  if(file_exists($img)){
						unlink($img);
					  }
					
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
					$query = $conn->query("UPDATE room SET roomImage = '$location' WHERE roomNo=".$rm_id);
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
            FROM room
            WHERE roomNo ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}	

    $result = dbQuery($sql);
    
    if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($roomImage);
		}	
    }
    
return $deleted;
}
?>