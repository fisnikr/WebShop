<?php
include_once("dbconnect.php");
if(isset($_POST['submit'])){
$productname = $_POST['productname'];
$productdescription = $_POST['productdescription'];
$productprice = $_POST['productprice'];
$date=date("Y-m-d h:i:s");

$quantity=$_POST['quantity'];

	$query = " INSERT INTO product VALUES(NULL, '$productname','$productdescription','$date',NULL) ";
	mysqli_query($conn,$query);

	$last_row = mysqli_insert_id($conn);

for($i=0 ; $i < count($_FILES["productpicture"]["name"]); $i++)
{
	$productpicture = $_FILES['productpicture']["name"][$i];
	$logo = $_FILES['productpicture']["name"][1];
	$query1 = " INSERT INTO picture VALUES(NULL, '$productpicture','$last_row')";
	mysqli_query($conn,$query1);
}
	$querylogo = " UPDATE product SET logo='$logo' WHERE productid='$last_row'"; 
	$resultlogo = mysqli_query($conn,$querylogo) or die(mysqli_error($conn)."<br />\n$querylogo");
	if(mysqli_affected_rows($resultlogo) == 0)
	{
  	user_error("No rows updated<br />\n$query");
	}

	$price = $productprice + ($productprice * 0.20);
	$query2 = " INSERT INTO price VALUES(NULL, '$price','$price','$last_row','$productprice')";
	mysqli_query($conn,$query2);

	$last_row1 = mysqli_insert_id($conn);
	$query3 = " INSERT INTO stock VALUES(NULL, '$quantity', '$last_row1','$last_row' )";
	$result = mysqli_query($conn,$query3) or die(mysqli_error($conn)."<br />\n$query");
	if(mysqli_affected_rows($result) == 0)
	{
  	user_error("No rows updated<br />\n$query");
	}
		if(isset($_POST['q1']))
		{
			foreach($_POST['q1'] as $value){
				$insert=mysqli_query($conn,"INSERT INTO productcategory VALUES ('$value' ,'$last_row')");
			}
		}


		if($query && $query1 && $query2)
		{
			include_once("adminIndex.php");
			echo "Product succesfully added!";
		}
		else echo "Product was not added";
	}
 ?>
