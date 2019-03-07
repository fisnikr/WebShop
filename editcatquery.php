<?php

include_once("dbconnect.php");
$categoryid=$_POST['categoryid'];
$catname=$_POST['catname'];
$query="UPDATE category SET catname='$catname' WHERE catid='$categoryid'";

mysqli_query($conn,$query);

echo "<script>";
echo "alert('Category Updated !')";
echo "</script>";
include_once("adminIndex.php");
?>
