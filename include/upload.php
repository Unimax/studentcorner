<?php 
 
 //This is the directory where images will be saved 
  $fcat=$_POST['fcat'];
 $target = "./../upload/";
 $target = $target . basename( $_FILES['file1']['name']); 
 $b = trim(str_replace(" ","_", $_FILES['file1']['name']));
 
 //$b=basename( $_FILES['file1']['name']);
$mmd5 = md5(file_get_contents($b));
echo $mmd5;
 // Connects to your Database 
 require("./config.php");
 mysql_query("INSERT INTO file2 VALUES ('$fcat', '$b')") ; 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['file1']['tmp_name'],$target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 