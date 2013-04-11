<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>File portal</title>
<style type="text/css">
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/reset.css"> 
<!-- mobile -->
<link href="CSS/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:800px)" />
<style type="text/css">
#banner {
position: absolute;
left: 10%;
top: 110px;
width: 950px;
height: 300px;
z-index: 6;
}
h3 {
color: #C06;
font-size: x-large;
}
h4 {
font-size: xx-large;
color: #60F;
}
#apDiv2 {
	position: absolute;
	left: 0;
	top: 61px;
	width: 298px;
	height: 40px;
	z-index: 7;
	background-color: rgba(0,0,0,.8);
	font-family: "sks1";
	font-size: 36px;
	border-radius: 15px;
	text-decoration: underline;
}
</style>
<style type="text/css">
#upload {
	position: absolute;
	left: 42px;
	top: 127px;
	width: 719px;
	height: 159px;
	z-index: 8;
	background-color: rgba(38,128,217,1);
}
#apDiv4 {
position: absolute;
left: 10%;
top: 115px;
width: 350px;
height: 41px;
z-index: 9;
}
#apDiv5 {
position: absolute;
left: 65%;
top: 115px;
width: 350px;
height: 41px;
z-index: 10;
}
#filelist {
position: absolute;
left: 38px;
top: 174px;
width: 1088px;
height: 245px;
z-index: 11;
background-color: rgba(60,90,196,1);
}
body,td,th {
	color: rgba(255,255,255,1);
}
#apDiv3 {
	position: absolute;
	left: 43px;
	top: 287px;
	width: 719px;
	height: 100%;
	z-index: 9;
	background-color: rgba(0,0,0,0.8);
}
a:link {
	color: #FFF;
}
a:visited {
	color: #CFC;
}
body {
	background-color: #9F6;
}
</style>
</head>

<body>
<div id="logo"><a href="index.php"><img src="images/logo.png" width="430" height="50" alt="logo student corner" /></a></div>

<div id="apDiv2">FILE PORTAL: </div>
<div id="upload"><h4> View Files </h4>
<form enctype="multipart/form-data" action="./showfile.php" method="post">

<label for="fcat">Category</label>
<select name="fcat" id="fcat">
<option value="CSE &amp; IT">CSE &amp; IT</option>
<option value="ECE &amp; EE">ECE &amp; EE</option>
<option value="CIV">CIV</option>
<option value="CHE">CHE</option>
<option value="BT">BT</option>
<option value="MME">MME</option>
<option value="ME">ME</option>
<option value="NOTES">NOTES</option>
<option value="Others">OTHER</option>
<option value="Q_bank">Q_Bank</option>
</select>

<input type="submit" value="Show"> 
</form>
</div>

<div id="apDiv3">
<?php 
 // Connects to your Database 
require("./include/config.php"); 
   $fcat=$_POST['fcat'];
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM file2 where fcat='$fcat'") or die(mysql_error()); 

while($info = mysql_fetch_array( $data )) { 
//Outputs the image and other data
	//Echo <a$info['address'] ."> <br>";
	Echo '&nbsp;&nbsp;<a href='."./upload/".$info['address'].' >'.$info['address'].'</a></br></br>';
 } 
 ?> 
</div>
</p>

</body>
</html>


