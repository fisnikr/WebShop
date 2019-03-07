<?php

include_once("dbconnect.php");
$categoryid=$_GET['catid'];

$query="DELETE FROM category WHERE catid='$categoryid'";

mysqli_query($conn,$query);

echo "<script>";
echo "alert('Category deleted !')";
echo "</script>";
include_once("adminIndex.php");
?>
