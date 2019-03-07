<?php

include_once("dbconnect.php");

	$email=$_POST['email'];
	$username=$_POST['username'];
  $password=$_POST['password'];

	$query="INSERT INTO user
						VALUES(NULL,'$username','$password','$email',0)";

	mysqli_query($conn,$query);

  echo "<script>";
  echo "alert('Register Sucessful !')";
  echo "</script>";

include("loginform.php");


 ?>
