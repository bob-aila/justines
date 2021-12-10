<?php 
require_once("../../includes/initialize.php");	
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
$reservation_id = $_POST['id'];
$query = $conn->query("SELECT * 
FROM reservation WHERE reservation_id =".$reservation_id );
$fetch = $query->fetch_array();

die(json_encode($fetch));
?>