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
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;

	case 'editpic' :
	$content    = 'editpic.php';		
	break;
    case 'view' :
		$content    = 'view.php';		
		break;

	default :
		$content    = 'list.php';		
}
  //include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
