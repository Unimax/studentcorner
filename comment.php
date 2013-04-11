<?php

	require("./include/config.php");
	
	session_start();
	$a=$_GET['comment'];
	$b=$_SESSION['login_name'];
	$c=$_GET['A'];	
	echo 'hello';
	echo $a.' '.$b.' ' .$c;
	$sql=mysql_query("insert into comments values ('$c', '$b','$a')");
	?>
                <script>
window.location.href='./index.php';
</script>
