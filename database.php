<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataname="cms_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dataname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>