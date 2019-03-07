
	<?php

	include_once("dbconnect.php");
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query=" SELECT * FROM user WHERE username='$username' AND password='$password' AND admin=0";
	$adminQuery=" SELECT * FROM user WHERE username='$username' AND password='$password' AND admin=1 ";
	$result=mysqli_query($conn,$query);
	$result2=mysqli_query($conn,$adminQuery);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['user'] = $username;
		include("index.php");

	}
	else if(mysqli_num_rows($result2)==1)
	{
		$_SESSION['admin'] = $username;
		include("adminIndex.php");

	}
	else{
		echo "<script>";
		echo "alert('Wrong username or password! ')";
		echo "</script>";
		include("loginform.php");
	}

	?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<?php
	echo "<h3 style=margin-top:-300px;margin-left:40px;>Welcome, $username !</h3>";
	?>
</head>
<body>

</body>
</html>
