<html>
<head>
  <title>Edit Category</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
  <br/>
  <div class="col-md-offset-4" >



<?php

include_once("dbconnect.php");
$categoryid=$_POST['select'];
$query="SELECT * FROM category WHERE catid='$categoryid' ";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_array($result);
?>

<form class="form" method="POST" action="editcatquery.php">

<div class="form-group">
  <div class="col-xs-4">
    <h3 for="category">Category name:</h3>
<input type="hidden" name="categoryid" value="<?php echo $row['catid']?>" />

<br /><br />

<input class="form-control" type="text" name="catname" value="<?php echo $row['catname'];?>" />
<br /><br /><br />
<input class="btn btn-info" type="submit" value="Update">
<a class='btn btn-danger'  href='adminindex.php'> Cancel </a>

</form>
</div>
</div>
</div>
</body>
</html>
