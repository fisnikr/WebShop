<html>
<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<?php

include("dbconnect.php");
$categoryid = $_POST['category'];
$query=" SELECT DISTINCT product.productid,product.productname , product.productdescription , price.price
          FROM product,category ,productcategory,price
          WHERE productcategory.catid='$categoryid'
          AND productcategory.productid=product.productid AND product.productid=price.productid" ;

$result = mysqli_query($conn,$query);

echo "<table class=table table-hover>" ;
echo "<thead class=thead-default>";
echo "<th>Product name:</th>";
echo "<th>Description: </th>";
echo "<th>Price: </th>";
echo "<th><a class='btn btn-danger'  href='adminindex.php'> Cancel </a></th>";

while($row=mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>";
	echo $row ['productname'];
	echo "</td>";
	echo "<td>";
	echo $row ['productdescription'];
	echo "</td>";
	echo "<td>";
	echo $row ['price'];
	echo "</td>";

	echo "<td width=100px>";
	echo "<a class='btn btn-info' href=editproductform.php?id=".$row['productid']."> Edit </a>";
	echo "</td>";
	echo "</tr>";

}
echo "</thead>";
echo "</table>";

  ?>
</body>
  </html>
