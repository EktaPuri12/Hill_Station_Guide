<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">   
	<link rel="stylesheet" type="text/css" href="style1.css">
	<style type="text/css">
		*
	{
		margin: 0px;
		padding: 0px;
	}
		.form{
		   text-align:center;
		   margin-top:50px;
		   font-family: sans-serif;
		   font-size: 30px;
		   
		}
}
        .dropdown {
  position: relative;
  display: inline;
  color: white;
}
.dropdown ul
{
    color:white;
    list-style: none;
    margin-left:20px;
    background: black;
    margin-left: 0px;

}
.dropdown ul li{
   padding: 20px;
}



.dropdown-content {
  display: none;
  position: absolute;
  min-width: 60%;
  margin:0px;
  z-index: 1;
}

.dropdown-content ul
{
    list-style: none;
    background-color: snow;
    box-shadow: 15px 15px rgba(0,0,0,0.2);
    width:250px;
    height: 50%;


}
.dropdown-content ul li a
{
   text-decoration: none;
   color:black;
   font-family: sans-serif;
}


.dropdown:hover .dropdown-content {
  display: block;
}

	</style>
</head>
<body>
     <div class="dropdown">
  <ul>
<li><i class="fa fa-list" aria-hidden="true" style="font-size: 40px"></i></li>
<ul>
  <div class="dropdown-content">
  <ul>
<li><a href="list.php">LIST</a></li>
<li><a href="contact.php">CONTACT</a></li>
<li><a href="update.php">UPDATE PASSWORD</a></li>
<li><a href="delete.php">DELETE ACCOUNT</a></li>
<li><a href="logout.php">LOG OUT</a></li>
  </ul>
  </div>
</div>

        <div style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size: 200%">
       <h1><p style="color:white">CONTACT US</p></h1>
        </div>
        </nav>
</div>
</
<div style="height:50vh;width:100%">
<div style="height:50vh;width:50%;margin:0px;position:relative;float:left;padding-top:5%">
	<h1 class="heading">GET IN TOUCH</h1>	
</div>
<div style="height:40vh;width:30%;background-color:snow;float:right;margin-top:120px;margin-right:30px">
<form action="email.php" method="POST" style="margin-top:30px;margin-left:20px">
	<input type="text" name="Name" placeholder="Name" style="width:90%" required>
	<br>
	<br>
	<input type="email" name="Email" placeholder="Email" style="width:90%" required>
	<br>
	<br>
	<textarea style="height:100px;width:90%" name="message" >
	Write a message..
	</textarea>
	<br>
	<br>
	<input type="submit" name="submit" style="background-color:black;color:white;width:90%">
	<?php
	if (isset($_GET['id']))
{
	echo $_GET['id']; 
}
if (isset($_GET['id1']))
{
	echo $_GET['id1']; 
}
	?>
</form>

</div>
</div>
<div style="background-color:#E75480;height:40vh;width:100%">
</div>
</body>
</html>