<?php

include_once("dbconnect.php");

$productid=$_GET['productid'];

$query="DELETE FROM product WHERE productid='$productid' ";

$result = mysqli_query($conn,$query);
include_once("adminIndex.php");

?>
