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
<link rel="stylesheet" href="../css/reset.css">   
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
<?php
require("./../include/config.php");
$user=$_POST['user']; 
$title=$_POST['Title'];
$cat2=$_POST['fcat'];
$cat1=$_POST['Year'];
$Content=$_POST['Content'];
$date1=date('Y-m-d H:i:s');
//sql_query("INSERT INTO posts VALUES ( title, date&time, userby ,category1, category2,content)") ;
$res=mysql_query("select max(post_id) from post;");
$row=mysql_fetch_array($res);
$post_id=$row['post_id']+1;
mysql_query("INSERT INTO posts VALUES ('default','$title', '$date1' ,'$user','$cat1','$cat2', '$Content')") or die(mysql_error()); 


?>
  <p>Clink the image below to return back to home page. </p>
  <p>OR</p>
  <p>Clink the image above to return to the admin page.</p>
</div>
<script src="../scripts/jquery-1.8.3.min.js"></script>
<script src="../scripts/jquery-ui-1.8.23.custom.min.js"></script>
<script src="../scripts/script.js"></script>
<script src="../scripts/jquery.mousewheel.min.js"></script>
<script src="../scripts/jquery.mCustomScrollbar.js"></script>
<div id="logo2"><a href="../index.php"><img src="../images/logo.png" width="470" height="50" alt="logo student corner" /></a></div>
<script type="text/javascript">
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
