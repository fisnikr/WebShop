<html>
<head>
<title>Edit Category</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<?php
   include_once("dbconnect.php");
?>
</head>
<body >
  <br/>
  <div class="col-md-offset-4" >
    <form method="POST" action="editcatproducts.php">
      <h2>Category of the product/s you want to edit: </h2><br/>
      <div class="col-xs-4">
      <select name="category" class="form-control " value="<?php echo $row['catid'];?>" title="Choose one of the following..."  >

       <?php


       $result = $conn->query("SELECT catid, catname FROM category");

       while ($row = $result->fetch_assoc())
       {
         unset($catid, $name);
         $catid = $row['catid'];
         $catname = $row['catname'];
         echo '<option style=cellspacing:30px value="'.$catid.'">'.$catname.'</option>';

       }
       echo "</select>";
       echo "<br />";
       echo "<br />";
         ?>

         <input class="btn btn-info" type="submit" name="sumit" value="Update">
         <a class='btn btn-danger'  href='adminindex.php'> Cancel </a>

</div>
</div>

  </form>



</body>
</html>
