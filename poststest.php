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
<link href="css/style.css" rel="stylesheet" type="text/css" />
  
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
	left: 257px;
	top: 74px;
	width: 271px;
	height: 40px;
	z-index: 7;
	background-color: rgba(0,0,0,.8);
	font-family: "sks1";
	font-size: 36px;
	background-color: rgba(154,158,78,1);
	border-radius: 15px;
	text-decoration: underline;
}
#scat {
	position: absolute;
	left: 93px;
	top: 166px;
	width: 254px;
	height: 27px;
	z-index: 5;
	font-family: "Lucida Console", Monaco, monospace;
	font-size: 24px;
	background-color: #336699;
	border-top-right-radius: 10px;
}
#year {
	position: absolute;
	left: 364px;
	top: 194px;
	width: 188px;
	height: 25px;
	z-index: 10;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	background-color: rgba(37,124,167,1);
	border-bottom-style: groove;
	border-bottom-left-radius: 10px;
	border-top-right-radius: 10px;
}
#cat {
	position: absolute;
	left: 94px;
	top: 194px;
	width: 254px;
	height: 25px;
	z-index: 9;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	background-color: rgba(37,124,167,1);
	border-bottom-style: groove;
	border-bottom-left-radius: 10px;
}
</style>
<style type="text/css">
posts {
	position: absolute;
	left: 85px;
	top: 200px;
	width: 90%;
	z-index: 11;
	height: 100%;
}
#apDiv3 {
	position: absolute;
	left: 80%;
	top: 0px;
	width: 340px;
	height: 107px;
	z-index: 9;
	background-color: #000099;
}
#apDiv4 {
	position: absolute;
	left: 571px;
	top: 191px;
	width: 152px;
	height: 29px;
	z-index: 12;
}
#apDiv5 {
	position: absolute;
	left: 771px;
	top: 113px;
	width: 280px;
	height: 43px;
	z-index: 11;
}
</style>
</head>

<body>
<div id="logo"><a href="index.php"><img src="images/logo.png" width="430" height="50" alt="logo student corner" /></a></div>

<div id="apDiv2"> Students Posts: </div>
<div id="scat">Select category:	 </div>
<?php
echo'<posts>';
  
 // Connects to your Database 
require("./include/config.php"); 
   $cat1=$_GET['fcat'];
   $cat2=$_GET['Year'];

  // echo $cat1.' '.$cat2;
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM posts where category2='$cat1' and category1='$cat2'") or die(mysql_error()); 
while($row = mysql_fetch_array( $data )) 
{ 
	
  $a=$row['post_ID'];
 echo '<table width="100%" height="145" border="1" bgcolor="#336699">
  <tr>
    <td width="20%" align="center">	&nbsp;Title:-&nbsp;&nbsp;</td>
    <td align="left">'; echo $row['title']; echo '</td>
  </tr>
  <tr>
    <td align="center" >&nbsp;User By:-&nbsp;&nbsp;'; echo $row['userby']; echo '</td>
    <td align="right">&nbsp;Date and Time:-&nbsp;&nbsp;'; echo $row['date']; echo '</td>
  </tr>';echo '
   <tr>
    <td align="center" >&nbsp;&nbsp;</td>
    <td align="left">'; echo $row['content']; echo '</br></td>
  </tr><br> </br></br> </br> ';echo '
   <tr>
    <td align="center" >&nbsp;&nbsp;COMMENTS:</td>
    <td align="left"></br></td>
  </tr><br> </br></br> </br> ';
  // <table width="100%" height="145" border="1" bgcolor="#336699">';
 //  echo 'hello';
    $data12 = mysql_query("SELECT * FROM comments where post_ID='$a'") or die(mysql_error()); 
$count = mysql_num_rows($data12);

while($row12 = mysql_fetch_array( $data12 )) 
{  
	echo '<tr> <td> ';echo $row12['username'];echo '</td><td>
	 '; echo $row12['comment']; echo '</td></tr>';
  }
  if(isset($_SESSION['login_name'])){
	 
	  echo '<tr> <td> ';echo $_SESSION['login_name'];echo '</td><td> '; echo '<form method="get" action="comment.php">
	  <input name="A" value='; echo $a; echo' " /> <input name="comment" type="text" id="comment" placeholder="comment" />   <input type="submit" name="Submit" id="Submit" value="Submit" /></form>'; echo '</td></tr>';
  }
  }
echo '</table></posts>';

?> 
<div id="cat">
  <form id="form" name="form" method="get" action="./Posts.php">
    <label>Category
    <select name="fcat" id="fcat">
      <option value="CSE">CSE</option>
      <option value="IT">IT</option>
      <option value="ECE">ECE</option>
      <option value="EE">EE</option>
      <option value="CIV">CIV</option>
      <option value="CHE">CHE</option>
      <option value="BT">BT</option>
      <option value="MME">MME</option>
      <option value="ME">ME</option>
      <option value="NOTES">NOTES</option>
      <option value="Others">OTHER</option>
      <option value="Q_bank">Q_Bank</option>
      <option value="Recent_News">Recent News</option>
      <option value="Notice_Board">Notice Board</option>
      <option value="Placement">Placement</option>
    </select>
</label>
  
</div>
<div id="year">
    <label>Year
      <select name="Year" id="Year">
        <option value="1">1st year</option>
        <option value="2">2nd year</option>
        <option value="3">3rd year</option>
        <option value="4">4th year</option>
        <option value="5">Others category</option>
      </select>
    </label>
</div>
<div id="apDiv4"> <input type="submit" name="Submit" id="Submit" value="Submit" />
  </form> </div>	
  
  <?php
					if (!isset($_SESSION['login_name'])) {
					
echo '

<div id="loginwrapper"></div>
           <div id="login-button"><img src="images/login-button-blue-hi.png" width="260" height="100" alt="login" /></div>
              <div id="login-dialog">
                  
				    <form method="post" action="./include/dologin.php" id="loginForm">
				        <div><input name="email" id="lemail" type="text" placeholder="Email"/></div>
				        <div><input name="password" id="lpassword" type="password" placeholder="Password"/></div>
				        <div><input name="signin" type="submit" value="Log In"/></div>
					    <div><a href="#" style="text-decoration: none; font-size: 12pt; color: blue;">Forgot Password</a></div> 
				    </form>
				</div>
                
            <div id="Registor-button"><img src="images/register_now_button.png" width="120" height="100" alt="Registor" /></div>   
                <div id="register-dialog">
                  
                    	<form method="post" action="./include/dologin.php" id="registerForm">
                        <div><input name="Fullname" id="fullname" type="text" placeholder="Fullname"/></div>
                        	<div><input name="username" id="username" type="text" placeholder="Username"/></div>
                        	<div><input name="email" id="email" type="text" placeholder="Email"/></div>
                            <div><input name="password" id="password" type="password" placeholder="Password"/></div>
                       		<div><input name="confirmpassword" id="confirmpassword" type="password" placeholder="Confirm Password"/></div>
                        	
                            <div> <label>Department
                                    <select name="Department" id="Department">
                              		   	    <option value="CHE">CHE</option>
      									    <option value="MME">MME</option>
    									    <option value="CSE">CSE</option>
     									    <option value="ME">ME</option>
   									        <option value="IT">IT</option>
      									    <option value="ECE">ECE</option>
      									    <option value="EE">EE</option>
     								        <option value="CIV">CIV</option>
    									    <option value="BT">BT</option>
                              </select></label></div> 
                            <div> <label>Year Of Joining
                                    <select name="Year_of_Joining" id="yoj">
                              		   	    <option value="2008">2008</option>
      									    <option value="2009">2009</option>
    									    <option value="2010">2010</option>
     									    <option value="2011">2011</option>
   									        <option value="2012">2012</option>
      									    <option value="2013">2013</option>
      									    <option value="2014">2014</option>
     								        <option value="2015">2015</option>
    									    
                              </select></label></div> 
                            <div><input name="register" type="submit" value="Register"/></div>
		          </form>
</div>';}
                

					 else { 
				echo '
                <div id="apDiv3">Hello'; echo '   '.$_SESSION['login_name']; echo '
    <form method="post" action="./include/session.php" ><input name="log_out" type="submit" value="Log Out" /></form><br>
	<a href="cam.html">view ur cam</a>
	</div>' ;
                
                
                
                
}
?>
</body>
</html>
