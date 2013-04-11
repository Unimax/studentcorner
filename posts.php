<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Student's corner</title>
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
	color: #666;
}
#Menu {
	position: absolute;
	left: 0;
	top: 61px;
	width: 70%;
	height: 40px;
	z-index: 7;
	background-color: rgba(0,0,0,.8);
}
posts {
	position: absolute;
	top: 133px;
	width: 90%;
	height: auto;
	z-index: 3;
	color: #FFF;
	border-radius: 0px 30px 0px 30px;
	float: right;
	left: 69px;
}
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	color: #FFF;
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
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body link="#CC6666">
<div id="logo"><a href="index.php"><img src="images/logo.png" width="430" height="50" alt="logo student corner" /></a></div>

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
 echo '<table width="100%" border="0" bgcolor="#336699">
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
  </tr><br> ';echo '
   <tr>
    <td align="center" ></td>
    <td align="center">&nbsp;&nbsp;COMMENTS:</td>
  </tr> ';
  // <table width="100%" height="145" border="1" bgcolor="#336699">';
 //  echo 'hello';
    $data12 = mysql_query("SELECT * FROM comments where post_ID='$a'") or die(mysql_error()); 
$count = mysql_num_rows($data12);
echo '<tr> <td> &nbsp;</td> <td>';

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

<div id="Menu">
  <ul id="MenuBar1" class="MenuBarHorizontal">
<li><a class="MenuBarItemSubmenu" href="Posts.php?Submit=Submit">Notice Board</a>
      <ul>
        <li><a href="Posts.php?fcat=News&amp;Year=5&amp;Submit=Submit">Recent News</a></li>
        <li><a href="#">Placement</a></li>
</ul>
    </li>
    <li><a href="Posts.php?Submit=Submit" class="MenuBarItemSubmenu">Student Post</a>
      <ul>
        <li><a href="Posts.php?Year=1&amp;Submit=Submit">1st Year</a></li>
        <li><a href="Posts.php?Year=2&amp;Submit=Submit" class="MenuBarItemSubmenu">2nd Year</a>
          <ul>
            <li><a href="Posts.php?fcat=EE&amp;Year=2&amp;Submit=Submit">EE</a></li>
            <li><a href="Posts.php?fcat=ECE&amp;Year=2&amp;Submit=Submit">ECE</a></li>
            <li><a href="Posts.php?fcat=ME&amp;Year=2&amp;Submit=Submit">ME</a></li>
            <li><a href="Posts.php?fcat=MME&amp;Year=2&amp;Submit=Submit">MME</a></li>
            <li><a href="Posts.php?fcat=BT&amp;Year=2&amp;Submit=Submit">BT</a></li>
            <li><a href="Posts.php?fcat=IT&amp;Year=2&amp;Submit=Submit">IT</a></li>
            <li><a href="Posts.php?fcat=CSE&amp;Year=2&amp;Submit=Submit">CSE</a></li>
            <li><a href="Posts.php?fcat=CHE&amp;Year=2&amp;Submit=Submit">CHE</a></li>
            <li><a href="Posts.php?fcat=CIV&amp;Year=2&amp;Submit=Submit">CIV</a></li>
          </ul>
        </li>
        <li><a href="Posts.php?Year=3&amp;Submit=Submit" class="MenuBarItemSubmenu">3rd Year</a>
          <ul>
            <li><a href="Posts.php?fcat=EE&amp;Year=3&amp;Submit=Submit">EE</a></li>
            <li><a href="Posts.php?fcat=ECE&amp;Year=3&amp;Submit=Submit">ECE</a></li>
            <li><a href="Posts.php?fcat=ME&amp;Year=3&amp;Submit=Submit">ME</a></li>
            <li><a href="Posts.php?fcat=MME&amp;Year=3&amp;Submit=Submit">MME</a></li>
            <li><a href="Posts.php?fcat=BT&amp;Year=3&amp;Submit=Submit">BT</a></li>
            <li><a href="Posts.php?fcat=IT&amp;Year=3&amp;Submit=Submit">IT</a></li>
            <li><a href="Posts.php?fcat=CSE&amp;Year=3&amp;Submit=Submit">CSE</a></li>
            <li><a href="Posts.php?fcat=CHE&amp;Year=3&amp;Submit=Submit">CHE</a></li>
            <li><a href="Posts.php?fcat=CIV&amp;Year=3&amp;Submit=Submit">CIV</a></li>
          </ul>
        </li>
        <li><a href="Posts.php?Year=4&amp;Submit=Submit" class="MenuBarItemSubmenu">4th Year</a>
          <ul>
            <li><a href="Posts.php?fcat=EE&amp;Year=4&amp;Submit=Submit">EE</a></li>
            <li><a href="Posts.php?fcat=ECE&amp;Year=4&amp;Submit=Submit">ECE</a></li>
            <li><a href="Posts.php?fcat=ME&amp;Year=4&amp;Submit=Submit">ME</a></li>
            <li><a href="Posts.php?fcat=MME&amp;Year=4&amp;Submit=Submit">MME</a></li>
            <li><a href="Posts.php?fcat=BT&amp;Year=4&amp;Submit=Submit">BT</a></li>
            <li><a href="Posts.php?fcat=IT&amp;Year=4&amp;Submit=Submit">IT</a></li>
            <li><a href="Posts.php?fcat=CSE&amp;Year=4&amp;Submit=Submit">CSE</a></li>
            <li><a href="Posts.php?fcat=CHE&amp;Year=4&amp;Submit=Submit">CHE</a></li>
            <li><a href="Posts.php?fcat=CIV&amp;Year=4&amp;Submit=Submit">CIV</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a class="MenuBarItemSubmenu" href="#">Co-curricular</a>
      <ul>
        <li><a class="MenuBarItemSubmenu" href="#">Clubs</a>
          <ul>
            <li><a href="pages/arhn.html">AAROHAN</a></li>
            <li><a href="nss.html">NSS</a></li>
            <li><a href="pages/mntc.html">MNTC</a></li>
            <li><a href="pages/GLUG.html">GLUG</a></li>
            <li><a href="pages/lc.html">LC</a></li>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Sports</a>
          <ul>
            <li><a href="pages/foot.html">football</a></li>
            <li><a href="pages/OTHERS.html">others</a></li>
          </ul>
        </li>
        <li><a href="pages/OTHERS.html">Others</a></li>
      </ul>
    </li>
    <li><a href="showfile.html">Study Matrial</a>    </li>
    <li><a href="#" class="MenuBarItemSubmenu">Misc</a>
      <ul>
        <li><a href="complaint.html">Complaint Box</a></li>
        <li><a href="tips.html">Tips &amp; Pics</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </li>
   </li>
  </ul>
</div>
<div id="admin"><a href="adminsignin.html">ADMINISTRATOR</a></div>
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
    	 
         <script src="scripts/jquery-1.8.3.min.js"></script>
  <script src="scripts/jquery-ui-1.8.23.custom.min.js"></script>
	<script src="scripts/script.js"></script>
    <script src="scripts/jquery.mousewheel.min.js"></script>
    <script src="scripts/jquery.mCustomScrollbar.js"></script>
    
<script type="text/javascript">
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>	
</body>
</html>
