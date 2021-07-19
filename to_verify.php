<?php
session_start();
include "database.php";

$_SESSION['admin']=$_POST['user'];
	$code=$_POST['code'];

	if ($code!=$_SESSION['random_code'])
	{
		header("Location:login.php?id=Invalid Captcha Code");
		exit;
	}
	

$qry=$conn->prepare("Select * from Register_users where Username = ?");
$qry->bind_param("s",$username);
$username=$_POST['user'];
$qry->execute();
$result=$qry->get_result();
print_r($result);
$row = $result->fetch_array(MYSQLI_NUM);
$user=$row[1];
$pass=$_POST['Password'];
if($result!=NULL)
{
if(password_verify($pass,$user))
{
   
	header("Location:list.php");
   $qry->close();
	$conn->close();
	exit;
}
else 
{
	header("Location:login.php?id1=Wrong Password");
	$qry->close();
	$conn->close();
	exit;

}
}
else
{
	header("Location:login.php?id2=User doesn't exist");
	$qry->close();
	$conn->close();
	exit;
   
}


?>