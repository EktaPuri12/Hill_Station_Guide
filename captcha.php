<?php
session_start();
 
$string = "";
 
for ($i = 0; $i < 5; $i++) 
{
    // this numbers refer to numbers of the ascii table (lower case)
    $string .= chr(rand(97, 122));
}

$_SESSION['random_code'] = $string;
 
$dir = 'fonts/';
 
$image = imagecreatetruecolor(200, 60);

$c = imagecolorallocate($image,	231	,84	,128);

$color2 = imagecolorallocate($image, 255, 255, 255);
 
imagefilledrectangle($image,0,0,200,60,$c);

imagettftext ($image, 35,10,50,50, $color2, $dir."arial.ttf", $_SESSION['random_code']);

header("Content-type: image/png");

imagepng($image);

?>sss