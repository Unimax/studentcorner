<!DOCTYPE html>
<html>
<head>
	
	<title>Register</title>
	
	
  	
</head>
<body>


<?php	
//	echo "he";
	require("./config.php");
	require("./utility.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['register']))
		{
			echo "hello";
			header( "refresh:15;url=../index.html" );
			//input validation and register user
			$email= addslashes($_POST['email']);
			$sql = "SELECT email FROM users WHERE email='$email'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$count = mysql_num_rows($result);
			if($count == 0)
			{
				$username = addslashes($_POST['username']);
				$password = addslashes($_POST['password']);
				$fullname = addslashes($_POST['Fullname']);
				$Department = addslashes($_POST['Department']);
				$yoj = addslashes($_POST['Year_of_Joining']);
				$password = md5($password);
				$confirmationcode = MakeConfirmationMd5($myemailid);
				mysql_query("INSERT INTO users(email, username, password, fullname ,dept , year, extra) VALUES('$email', '$username', '$password', '$fullname', '$Department','$yoj','$confirmationcode')") or die(mysql_error());
				echo "inserted";
				
				// registered successfully
				SendUserConfirmationEmail($myemailid, $myusername, $confirmationcode);
				$message = "<div id=\"register-login-text\"><p>You have registered successfully. Please check your mail for the activation link.</p><p>In case you don't receive the mail, contact us at <a href=\"mailto:sunilkumarsheoran@gmail.com\" text-decoration:none>sunilkumarsheoran@gmail.com</a>.</p><br /><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $message;
			}
			else
			{
				$error = "<div id=\"register-login-text\"><br /><p>This email has already been registered.</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else if(isset($_POST['signin']))
		{
			//check login credentials
			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);
			$password = md5($password);
			//$sql = "SELECT email, username FROM registered_users WHERE email_id='$myemailid' and password='$mypassword' and confirmation_code='y'";
			$sql = "SELECT email, username FROM users WHERE email='$email' and password='$password' ";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$username = $row['username'];
			$count = mysql_num_rows($result);
		//	echo $count."hkjh";
			if($count == 1)
			{   echo "yoyo";
				$_SESSION['login_email_id'] = $email;
				$_SESSION['login_name'] = $username;
				?>
                <script>
window.location.href='./../index.php';
</script>
                <?php
			}
			else
			{
				header( "refresh:15;url=../index.html" );
				$error = "<div id=\"register-login-text\"><p>Invalid username/password</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else 
		{
			header( "refresh:15;url=../index.html" );
			$error = "<div id=\"register-login-text\"><p>Invalid Page Requested</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
			echo $error;
		}
	}
	else if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['code']))
		{
			//check validity of activation code
			$confirmationcode = $_GET['code'];
			$sql = "SELECT email_id, username, id FROM registered_users WHERE confirmation_code='$confirmationcode'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$myusername = $row['username'];
			$count = mysql_num_rows($result);

			if($count == 1)
			{
				$sql = "UPDATE registered_users SET confirmation_code='y' WHERE confirmation_code='$confirmationcode'";
				$result = mysql_query($sql) or die(mysql_error());
				$_SESSION['login_email_id'] = $myemailid;
				$_SESSION['login_name'] = $myname;
				$_SESSION['user_id'] = $userid;
				header("location: ../index.html");
			}
			else
			{
				header( "refresh:15;url=../index.html" );	
				$error = "<div id=\"register-login-text\"><p>Invalid/Expired confirmation code.</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else
		{
			header( "refresh:15;url=../index.html" );
			$error = "<div id=\"register-login-text\"><p>Invalid Page Requested</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
			echo $error;
		}
	}
	else
	{
		header( "refresh:15;url=../index.html" );
		$error = "<div id=\"register-login-text\"><p>Invalid Page Requested.</p><br /><p>This page will automatically redirect to the <a href=\"../index.html\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
		echo $error;
	}
	?>
	
</body>
</html>
