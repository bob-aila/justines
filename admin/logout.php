<?php
require_once("../includes/initialize.php");
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();

// 2. Unset all the session variables
unset( $_SESSION['name'] );
unset( $_SESSION['admin_ACCOUNT_NAME'] );
unset( $_SESSION['admin_ACCOUNT_USERNAME'] );
unset( $_SESSION['admin_ACCOUNT_PASSWORD'] );
unset( $_SESSION['admin_ACCOUNT_TYPE'] );

 	
// 4. Destroy the session
header('location: ../index.php');
//redirect(WEB_ROOT ."\\index.php");
?>