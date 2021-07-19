<!DOCTYPE html>
<html>
<head>
	<title>Hill Station Guide</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
    <style>
        a.links:hover, a.links:active
        {background-color: red;}
        .foot{
            text-align: center;
        background-color: black;
       color: white;
      margin: 0px;
       height:10vh;
       float: left;
       width:100%;
}
    </style>
	</head>
<body>
<nav style="float: left;background-color:black;height:10vh;width:30%">
<br>
   <a class="links" href="index.php">Home</a>
</nav>
<nav style="background-color:black;height:10vh;width:70%;text-align: right;float: right">
<br>
 
 	<a class="links" href="login.php">Login</a>
	<a class="links" href="Sign_up.php">Register</a>

</nav>
<div style="margin:0px;padding: 0px">
    <img src="shimla_2.jpg" alt="shimla" style="width: 100%;height:80vh" class="mySlides">
    <img src="hill_station2.jpg" alt="nanital" style="width: 100%;height:80vh" class="mySlides">
    <img src="MANALI.jpg" alt="hill_station" style="width:100%;height:80vh" class="mySlides">
    <div style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size: 200%">
        <p style="color:white"><b>LIFE IS A JOURNEY NOT A DESTINATION</b></p>
    </div>
</div>
<div class="foot">
  <p>Website Designed by Ekta Puri</p>
  <a href="mailto:ektapuri131@gmail.com">Gmail</a>
  </div>
<script>
var myIndex = 0;
summon();

function summon() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(summon, 3000);
}
</script>

</body>
</html>