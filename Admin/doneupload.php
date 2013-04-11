<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Untitled Document</title>
<style type="text/css">
</style>  
<!-- mobile -->
<link href="../CSS/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:800px)" />
<style type="text/css">
</style>
<style type="text/css">
</style>
<link href="style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>

<body link="#CC6666">

<div id="admin"><a href="./post.html"><img src="../images/administrator.jpg" width="200" height="252" alt="admin" /></a></div>
<div id="done">Posted Successfully!!!</div>
<div id="message">
  <p>
    <?php 
 
 //This is the directory where images will be saved 
  $fcat=$_POST['fcat'];
 $target = "./../upload/";
 $target = $target . basename( $_FILES['file1']['name']); 
 $b = trim(str_replace(" ","_", $_FILES['file1']['name']));
 
 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['file1']['tmp_name'],$target)) 
 { 
 //$b=basename( $_FILES['file1']['name']);
 $mmd5 = md5_file($target);
 // Connects to your Database 
 require("./../include/config.php");
 mysql_query("INSERT INTO file2 VALUES ('$fcat', '$b' ,'$mmd5')") ; 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 
    </p>
  <p>Clink the image below to return back to home page OR above to return to admin page</p>
</div>

<div id="logo2"><a href="../index.php"><img src="../images/logo.png" width="470" height="50" alt="logo student corner" /></a></div>
</body>
</html>
