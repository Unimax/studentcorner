<?php 
 // Connects to your Database 
require("./config.php"); 
   $fcat=$_POST['fcat'];
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM file2 where fcat='$fcat'") or die(mysql_error()); 

while($info = mysql_fetch_array( $data )) { 
//Outputs the image and other data
	//Echo <a$info['address'] ."> <br>";
	Echo '<a href='."./../upload/".$info['address'].' >'.$info['address'].'</a></br>';
 } 
 ?> 