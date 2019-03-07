<?php

	include_once("dbconnect.php");
	$catname=$_POST['catname'];

	$query="INSERT INTO category VALUES(NULL,'$catname')";

	mysqli_query($conn,$query);



	echo "<script>";
  echo "alert('Category Added !')";
  echo "</script>";
	include("adminIndex.php");

?>
