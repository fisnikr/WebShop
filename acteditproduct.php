<?php

include_once("dbconnect.php");
$productid=$_POST['productid'];
$productname=$_POST['productname'];
$description=$_POST['productdescription'];
$productprice=$_POST['productprice'];
$date=date("Y-m-d h:i:s");

$activeprice=$productprice-($productprice* ((float)($_POST['activeprice'])/100));


$query="UPDATE product,price SET product.productname='$productname',product.productdescription='$description',
        price.price='$productprice',price.activeprice='$activeprice'
        WHERE product.productid='$productid' AND product.productid=price.productid";

mysqli_query($conn,$query);

include_once("adminIndex.php");
?>
