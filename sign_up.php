<?php
session_start();
?>
<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<! DOCTYPE html>
<html>
<head>
<title> SIGN IN </title>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="style5.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
<div class="box" style="height: 400px"> 
<layout>
Sign up!
</layout>
<div class="icon">
<!--<img src="/Users/apple/Desktop/internship/facbookicon.png" style=" padding-left:30px">
<img src="/Users/apple/Desktop/internship/googleicon.png">
</div>
-->
<br>
<form action="insert.php" method="POST" class="user-data" style="padding-left:75px">
<input type="text" class="field" name="user" placeholder="Username" required style="padding-left: 4px">
<br>
<input type="password" class="field" name="Password" placeholder="Password" required style="padding-left: 4px">	
<br>
<input type="email" class="field" name="email" placeholder="Email" required style="padding-left: 4px">
<br>
<button type="submit" class="login" name="submit">
SIGN UP

 <br>
 <br>
 <br>
<img src="captcha.php">
	Code <input type="text" name="code" required>
</form>

<?php


			if (isset($_GET['id']))
			{
				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id'] . "</span>";
				header( "refresh:5;url=sign_up.php" );
			
			}


			if(isset($_GET['id1']))
			{

				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id1'] . "</span>";
				header( "refresh:5;url=sign_up.php" );
			
				unset($_GET['id1']);
			}
			if(isset($_GET['id3']))
			{

				echo "<span style='color:red ; font-size:20px ; font-family:forte'>" . $_GET['id3'] . "</span>";
				header( "refresh:5;url=sign_up.php" );
			
				unset($_GET['id3']);
			}
		
?>






<!--
<h2>Forgot password ?</h2>
<h3>Don't Have An Account yet ?</h3>
<button type="submit"> SIGNUP!</button>
</div>
-->

   </body>
</html>