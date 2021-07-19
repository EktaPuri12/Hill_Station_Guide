<?php
session_start();
?>
<?php
include 'database.php';

	$code=$_POST['code'];

	if ($code!=$_SESSION['random_code'])
	{

		$accept=header("Location:sign_up.php?id=Invalid Captcha Code");
		exit;
	}

$s=$conn->prepare("Select * from Register_users where Username = ?");
$s->bind_param("s",$username);
$username=$_POST['user'];
$s->execute();
$result =$s->fetch(); 



if($result==1)
{
	
	header("Location:sign_up.php?id1=Already Registered!");
	$s->close();
	$conn->close();
	exit;
}

else
{
	if(!isset($c))
	{
$stmt = $conn->prepare("INSERT INTO Register_users(Username, Password, Email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);

$Username = $_POST['user'];
$pass = $_POST['Password'];
$password=password_hash($pass,PASSWORD_DEFAULT);
$email = $_POST['email'];
$stmt->execute();
$stmt->close();
header("Location:sign_up.php?id3=Successfully Registered!");
}
}
$s->close();
$conn->close();


?>