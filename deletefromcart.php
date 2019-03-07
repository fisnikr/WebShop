<?php

include_once("dbconnect.php");

$cartid = $_GET['cartid'];
$prod = $_GET['productid'];

$query = "DELETE FROM shoppingcart WHERE cartid='$cartid' AND productid='$prod'";

mysqli_query($conn,$query);
include("shoppingcartdetails.php");
 ?>
