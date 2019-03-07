<html>
<head>
<title>Edit product</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
  <?php


  include_once("dbconnect.php");
  $id=$_GET['id'];
  $query=" SELECT product.productname,product.productdescription,price.price,price.activeprice
            FROM product,price WHERE product.productid='$id' AND product.productid=price.productid  ";


  $result=mysqli_query($conn,$query);

  $row=mysqli_fetch_array($result);

  ?>
   <div class="col-md-offset-4">
     <form method="POST" action="acteditproduct.php">
       <h2>Edit Product: </h2>
       <br />
   <div class="form-group">
     <div class="col-xs-4">
       <input type="hidden" name="productid" value="<?php echo $id ?>" />
      <label for="product">Product name:</label>
       <input type="text" class="form-control" name="productname" id="product" value="<?php echo $row['productname'];?>" />
       <br />
       <label for="product">Product description:</label>
       <input type="text-lg" class="form-control" name="productdescription" id="product" value="<?php echo $row['productdescription'];?>" />
       <br />
        <div class="col-xs-6">
             <label for="product">Price:</label>
          <input type="text-sm" class="form-control"  name="productprice" id="product" value="<?php echo $row['price'];?>" />
              <label for="product">Active price:</label>
          <input type="text-sm" class="form-control"  name="discountprice" id="product" value="<?php echo $row['activeprice'];?>" />
          </div>
          <div class="col-xs-6">
          <label for="product">Discount:</label>
       <input type="text-sm" class="form-control" name="activeprice" id="act" placeholder="%" />
        </div>
        <br /><br /><br /><br />
            <br/>
            <div class="row">
           <input class="btn btn-info" type="submit" name="submit" value="Update">
         </div>
         </div>
     </form>
     <a class='btn btn-danger'  href='adminindex.php'> Cancel </a>
   </div>
 </div>
</body>
</html>
