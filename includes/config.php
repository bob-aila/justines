<?php
 $host="MYSQL5037.site4now.net";
 $username="a7cc25_reserva";
 $password="mt00268018";
 $databasename="db_a7cc25_reserva";
 $errors = array(); 
 $conn = new mysqli($host, $username, $password, $databasename);
// Check connection "Server=MYSQL5037.site4now.net;Database=db_a7cc25_reserva;Uid=a7cc25_reserva;Pwd=YOUR_DB_PASSWORD"
if ($conn->connect_error) {
    echo("Connection failed");
  }
?>
