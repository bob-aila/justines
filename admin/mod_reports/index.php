<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
}
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['name'])){
 	redirect("../login.php");
 }
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'search' :
		$content    = 'search.php';		
		break;
	case 'list' :
		$content    = 'list.php';		
		break;	
			
	default :
		$content    = 'search.php';		
}
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
