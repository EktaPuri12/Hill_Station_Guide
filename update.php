<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">   
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
	<title>UPDATE PASSWORD</title>
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
  <h1 style="margin-top:-4%;text-align: center">UPDATE PASSWORD</h1>
</div>


<div class="form">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<input type="PASSWORD" name="OLD_PASSWORD" placeholder="OLD PASSWORD" required>
	<br>
	<br>
	<input type="PASSWORD" name="NEW_PASSWORD" placeholder="NEW PASSWORD" required>
	<br>
	<br>
	<input type="submit" name="confirm" value="confirm">
	<br>
	<br>
</form>
</div>
<?php
include "database.php";
if(isset($_POST['confirm']))
{
	$oldpassword=$_POST['OLD_PASSWORD'];
	$newpassword=$_POST['NEW_PASSWORD'];
    $qry=$conn->prepare("SELECT * from Register_users where Username=?");
    $qry->bind_param("s", $username);
    $username=$_SESSION['admin'];
    $qry->execute();
    $result=$qry->get_result();
    $row = $result->fetch_array(MYSQLI_NUM);
    $user=$row[1];
    $pass=$_POST['OLD_PASSWORD'];
    if(password_verify($pass,$user))
    { 
    	$qry1=$conn->prepare("update Register_users set Password=? where Username=?");
    	$qry1->bind_param("ss",$password,$username);
    	$pass=$_POST['NEW_PASSWORD'];
    	$password=password_hash($pass,PASSWORD_DEFAULT);
    	$username=$_SESSION['admin'];
    	$qry1->execute();;
        echo("Password successfully changed");
           $qry1->close();
    }
    else
    {

       echo"WRONG PASSWORD";
    }  

    $qry->close();
    $conn->close(); 
}
?>
</body>
</html>

