<?php
if(isset($_POST['login'])){
	$email = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($email == '' OR $pass == '') {
		echo "<script> alert('Empty Username and Password!')</script>";         
    } else {
		require_once 'includes/config.php';
		$query = $conn->query("SELECT * FROM guest WHERE email = '$email' AND password = '$pass' ") or die(mysqli_error());
        $fetch = $query->fetch_array();
        if(isset($fetch)){
		session_start();
		$_SESSION['guest_id']	= $fetch['guest_id'];
		$_SESSION['name'] 		= $fetch['firstname'];
		$_SESSION['last']		= $fetch['lastname'];
		$_SESSION['country']	= $fetch['country'];
		$_SESSION['city'] 		= $fetch['city'];
		$_SESSION['address'] 	= $fetch['address'];
		$_SESSION['zip'] 		= $fetch['zip'];
		$_SESSION['phone'] 		= $fetch['phone'];
		$_SESSION['email'] 		= $fetch['email'];
		$_SESSION['pass'] 		= $fetch['password'];
		//echo $_SESSION['guest_id'];
		header('location: index.php');
        }else{
			header('location: index.php');
			echo '<script> alert("Username or Password Not Registered! Contact Your administrator")</script>';         

}

}
}	
if(isset($_POST['btnbook'])){
	  if(!isset($_SESSION)) 
        { 
	      session_start(); 
       } 
	if (!isset($_SESSION['from'])){
		echo "<script> alert('Please Choose check in Date and Check out Out date to continue reservation!')</script>";
		header('location: index.php?view=3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y63');
	} elseif (!isset($_SESSION['to'])){
		echo "<script> alert('Please Choose check in Date and Check out Out date to continue reservation!')</script>";
		header('location: index.php?view=3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y63');
	} elseif(isset($_POST['roomid'])){
    	 $_SESSION['roomid']=$_POST['roomid'];
    	 header('location: index2.php#index.php?pages=1');
   
	}
}
if(isset($_POST['avail'])){
	if ($_POST['from'] == '' OR $_POST['to'] == '') {
		echo "<script> alert('Please Choose check in Date and Check out Out date to continue reservation!')</script>";
	    
	  }else{
	session_start();	  
	$_SESSION['from'] = $_POST['from'];
	$_SESSION['to']  = $_POST['to'];
	header('location: index.php?view=3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y63');
	  }
	}
?>
