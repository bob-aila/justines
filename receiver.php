<?php
if(isset($_POST['login'])){
	$email = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($email == '' OR $pass == '') {
         	die("Empty Username and Password!");
         
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
		header('location: index.php#home.php');
        }else{
            die("Username or Password Not Registered! Contact Your administrator");
			header('location: index.php#home');
}

}
}	
if(isset($_POST['btnbook'])){
	  if(!isset($_SESSION)) 
        { 
	      session_start(); 
       } 
	if ($_SESSION['from'] == '' AND $_SESSION['to'] == ''){
		die("Please Choose check in Date and Check out Out date to continue reservation!");
		header("location: index.php?page=5#index.php?page=5");
	}
		 if(isset($_POST['roomid'])){
    	 $_SESSION['roomid']=$_POST['roomid'];
    	 header('location: index2.php#index.php?pages=1');
   
	}
}
if(isset($_POST['avail'])){
	if ($_POST['from'] == '' OR $_POST['to'] == '') {
		die("Please Choose check in Date and Check out Out date to continue reservation!");
	    
	  }else{
	session_start();	  
	$_SESSION['from'] = $_POST['from'];
	$_SESSION['to']  = $_POST['to'];
	header('location: index.php?page=5#index.php?page=5');
	  }
	}
?>
