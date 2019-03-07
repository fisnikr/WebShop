<html>
<head>
<title>Insert product</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
   <div class="col-md-offset-4">
     <form method="POST" action="actinsertprod.php" enctype="multipart/form-data">
       <h2>Add new product </h2>
       <br />
   <div class="form-group">
     <div class="col-xs-4">
      <label for="product">Product name:</label>
       <input type="text" class="form-control" name="productname" id="product" required/>
       <br />
       <label for="product">Product description:</label>
       <textarea rows="3" class="form-control" name="productdescription" id="product" required></textarea>
       <br />
       <label for="product">Select picture/s:</label>
       <input type="file"  name="productpicture[]"  multiple required />

       <label for="product">Select logo:</label>
       <input type="file"  name="productpicture[1]"  required />
        <div class=" form-groupcol-xs-4 col-md-6">
             <label for="product">Price:</label>
          <input type="text-sm" class="form-control"  name="productprice" id="product" placeholder="$" required >
          </div>
          <div class=" form-groupcol-xs-4 col-md-6">
          <label for="product">Quantity:</label>
          <input type="text-sm" class="form-control"  name="quantity" placeholder="Default:1" required >
        </div>
        <br /><br /><br /><br />
          <label for="product">Select category/ies of the product: </label>
          <div class="col-xs-6">
            <?php
            include_once("dbconnect.php");
            $result = $conn->query("SELECT catid, catname FROM category");
            while( $row = mysqli_fetch_array($result))
            {
              $category = $row['catname'];
              $catid = $row['catid'];
              echo "<input type=\"checkbox\" name=q1[] value=\"$catid\"> $category:";
              echo "<br>";
            }
            ?>
            <br/>
           <input class="btn btn-info" type="submit" name="submit" value="Add">
         </div>
         </div>
     </form>
     <a class='btn btn-danger'  href='adminindex.php'> Cancel </a>
   </div>
 </div>
</body>
</html>
