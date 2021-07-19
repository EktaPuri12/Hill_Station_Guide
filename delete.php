<?php
session_start();
include "database.php";
$qry=$conn->prepare("DELETE from register_users where Username=?");
$qry->bind_param("s",$username);
$username=$_SESSION['admin'];
echo $username;
$qry->execute();
unset($_SESSION["admin"]);
unset($_SESSION["random_code"]);
session_destroy();
header("Location:index.php");
?>

