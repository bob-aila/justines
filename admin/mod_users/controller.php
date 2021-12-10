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
		
	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
			echo "<script> alert('Empty Username and Password!')</script>";
			redirect("index.php?view=add");        
		}
	else{
		$acc_name		= $_POST['name'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];
        require_once '../config.php';
		$query = $conn->query("SELECT * 
			FROM  useraccounts 
			WHERE  `ACCOUNT_NAME` ='{$acc_name}' OR ACCOUNT_USERNAME='{$acc_username}'");	
		$fetch = $query->fetch_array();
        if(isset($fetch)){
			echo "<script> alert('Account name already exist!')</script>";
			redirect("index.php?view=add");
		}else{
			$shapassword = sha1($acc_password);
			$sql = "INSERT INTO `useraccounts` (`ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`) VALUES('$acc_name','$acc_username','$shapassword','$acc_type')";
			if ($conn->query($sql) === TRUE) {
				redirect("index.php");
				//echo '<script> die("SUCCESS");</script>';
			}
		}	 

		
	}	
}
function doEdit(){	
	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
		echo "<script> alert('Empty Username and Password!')</script>";
		redirect("index.php");       
	}
else{
	$acc_name		= $_POST['name'];
	$acc_username   = $_POST['username'];
	$acc_password 	= $_POST['pass'];
	$acc_type 		= $_POST['type'];

	    require_once '../config.php';
		$shapassword = sha1($acc_password);
		$query = $conn->query("UPDATE useraccounts SET ACCOUNT_NAME ='$acc_name', ACCOUNT_PASSWORD='$shapassword', ACCOUNT_TYPE='$acc_type' WHERE ACCOUNT_USERNAME='$acc_username'" );
			redirect("index.php");
		//echo '<script> die("SUCCESS");</script>';
		}
	}	 

	
	

function doDelete(){
	 $id=$_POST['selector'];
       foreach($id as $val){
		require_once '../config.php';
		$sql =  $conn->query("DELETE FROM useraccounts WHERE ACCOUNT_ID=".$val);  
	   }
	   redirect("index.php");
	}

?>