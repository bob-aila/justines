<?php
 $host="localhost";
 $username="root";
 $password="";
 $databasename="reservation";
 $errors = array(); 
 $conn = new mysqli($host, $username, $password, $databasename);
// Check connection
if ($conn->connect_error) {
    echo("Connection failed");
  }
?>