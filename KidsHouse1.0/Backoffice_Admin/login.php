<?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "tp_db";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     session_start();
     if(isset($_SESSION["email"]))
     echo " bonjour mr   ".$_SESSION["email"];
else
	header("location: index.php");
?>
<a href="deconnection.php">deconnection</a>