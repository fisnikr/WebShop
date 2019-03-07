<html>
<head>
<title>Delete Category</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body >
  <script>
  function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete this category?")) {
     document.location = delUrl;
    }
  }
  </script>
  <br/>
  <div class="col-md-offset-4" >
    <form method="GET" action="actdeletecat.php">
      <h2>Select category to delete: </h2><br/>
      <div class="col-xs-4">
      <select class="form-control " title="Choose one of the following..."  >

       <?php

       include_once("dbconnect.php");
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
       echo  "<a class='btn btn-info'  href=javascript:confirmDelete('actdeleteCat.php?catid=".$catid."')> Delete </a>";
         ?>

         <a class='btn btn-danger'  href='adminindex.php'> Cancel </a>

</div>
</div>
</div>

  </form>



</body>
</html>
