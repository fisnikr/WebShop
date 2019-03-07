<?php
session_start();
include_once("dbconnect.php");
$productid = $_GET['productid'];
$quantity = $_GET['quantity'];
$stockquantity = " SELECT * FROM stock, product WHERE product.productid='$productid' AND stock.productid='$productid'";
$result2=mysqli_query($conn,$stockquantity);
$row = mysqli_fetch_array($result2);
  if($quantity <= $row['quantity'])
  {
    $pid=$_GET['productid'];
    $query3="SELECT *
    FROM product ,price
    WHERE product.productid='$pid' AND price.productid='$pid' AND price.productid=product.productid ";
    $result=mysqli_query($conn,$query3);
    $row3=mysqli_fetch_assoc($result);
    $price=$row3['activeprice'];
    $sid=session_id();

    $query="INSERT INTO shoppingcart VALUES(NULL,'$pid','$sid')";
    mysqli_query($conn,$query);
    echo "<script>";
    echo "alert('Product Added to CART !')";
    echo "</script>";

    $updatequantity = "UPDATE stock SET quantity = quantity - '$quantity'  WHERE productid='$productid'";
    mysqli_query($conn,$updatequantity);

  }
  else {
    echo "<script>";
    echo "alert('We are sorry, we have not that much products in the stock !')";
    echo "</script>";
  }

  include("index.php");


 ?>
