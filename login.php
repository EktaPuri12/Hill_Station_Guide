<?php
session_start();
?>
<! DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<title> SIGN IN </title>
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style5.css">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php
/*
if (isset($_POST['submit']))
{
	
	$code=$_POST['code'];

	if ($code==$_SESSION['random_code'])
	{

		$_SESSION['user']=$_POST['user'];
		$_SESSION['password']=$_POST['Password'];

		$accept=header("Location:to_verify.php");


	}
	else
	{
		$error="Invalid Captcha Code";
	}
}*/
?>

<div class="backdrop">
<nav style="float: left;background-color:black;height:10vh;width:30%">
<br>
   <a class="links" href="index.php">Home</a>
</nav>
<nav style="background-color:black;height:10vh;width:70%;text-align: right;float: right">
<br>
 
 	<a class="links" href="login.php">Login</a>
	<a class="links" href="Sign_up.php">Register</a>

</nav>

<div class="box"> 
<layout>
Sign In!
</layout>
<div class="icon">
<!--<img src="/Users/apple/Desktop/internship/facbookicon.png" style=" padding-left:30px">
<img src="/Users/apple/Desktop/internship/googleicon.png">
</div>
-->
<br>
<form action="to_verify.php" method="POST" class="user-data" style="padding-left:75px">
<input type="text" class="field" name="user" placeholder="Username" required style="padding-left: 4px">
<br>
<div>
<input type="password" class="field" name="Password" id="Password" placeholder="Password" required style="padding-left: 4px">
<i class="fa fa-eye-slash" aria-hidden="true" id="togglepassword" style="margin-top:-32px;padding-left: 90%;font-size: 18px"></i>
<i class="fa fa-eye" aria-hidden="true" id="togglepassword1" style="margin-top:-32px;padding-left: 90%;font-size: 18px"></i>
<br>	
<input type="submit" name="submit" class="login" value="Login" style="padding-left: 3.25px" >

<br>
<center><img src="captcha.php" style="margin-left:auto;margin-right: auto">
	Code <input type="text" name="code" required></center>

<?php
			if (isset($_GET['id']))
			{
				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id'] . "</span>";
				header( "refresh:5;url=login.php" );
			}
			if (isset($_GET['id1']))
			{
				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id1'] . "</span>";
				header( "refresh:5;url=login.php" );
			}
			if (isset($_GET['id2']))
			{
				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id2'] . "</span>";
				header( "refresh:5;url=login.php" );
			}

			?>
</form>

<?php

if (isset($accept))
{
	echo $accept;
}

if (isset($error))
{
	echo $error;
}

?>
<!--
<h3>Don't Have An Account yet ?</h3>
<button type="submit"> SIGNUP!</button>
</div>
-->
<script type="text/javascript" src="toggle.js"></script>
   </body>
</html>