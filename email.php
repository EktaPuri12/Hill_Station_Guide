<?php
$To='ektapuri131@gmail.com';
$Subject='Query';
$body ="My name is " .$_POST["Name"]." My query is regarding " . $_POST["message"];
$header = "From: ". $_POST["Email"] ."\r\n"; 
$header .= "MIME-Version: 1.0\ssssssr\n";
$header .= "Content-type: text/html\r\n";
$check=mail($To, $Subject, $body,$header);
if($check==True)
{
header("Location:contact.php?id3=Message Sent Successfully");
}
else
{
	header("Location:contact.php?id1=Unable to Sent");
}
?>