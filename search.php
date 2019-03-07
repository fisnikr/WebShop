<html>
<head>
<title>eCommerce</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="nav.js"></script>
<?php
include("basic-header.php");
?>
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="col-lg-4">
    <div class="navbar-header">
      <a id="menu-toggle" href="#" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
      </a>
    </div>
    <div id="sidebar-wrapper" class="sidebar-toggle">
      <?php
      include("dbconnect.php");


      $query = " SELECT * FROM category" ;
      $result = mysqli_query($conn, $query);
        echo "<ul class='sidebar-nav'>";
        echo "<li>Select category</li>";
        while ( $row = mysqli_fetch_array($result))
        {
          echo "<li>";
          echo "<a href = index.php?catid=".$row['catid'].">";
          echo $row['catname'];
          echo "</li>";
        }

        echo "</ul>";
        ?>
    </div>
</nav>
    </div>


</div>
<div class="col-lg-4 col-lg-offset-4">

<?php
include("dbconnect.php");
//include("functions.php");
//search code
//error_reporting(0);
if($_REQUEST['submit']){
  $name = $_GET['name'];
  if(empty($name)){
	   $make = '<h4>You must type a word to search!</h4>';
  }
  else
  {
	   $make = '<h4>No match found!</h4>';
	   $query = "SELECT DISTINCT product.productid,product.productname,product.logo,picture.picture, price.activeprice FROM product,picture,price
      WHERE product.productid=picture.productid AND product.productid=price.productid AND product.productname LIKE '%$name%' ORDER BY CASE WHEN product.productname like '$name%' THEN 0
               WHEN product.productname like '%%$name%%' THEN 1
               WHEN product.productname like '%$name' THEN 2
               ELSE 3
          END,product.productname";
     $result = mysqli_query($conn,$query);

     echo "<div class=row>";
	    if($mak = mysqli_num_rows($result) > 0)
      {
		      while($row = mysqli_fetch_assoc($result))
          {

              echo "<div class=col-xs-12>";
              echo "<div class=card>";
              echo "<img class=img-card src=images/".$row['logo'].". />";
              echo "<br />";
              echo "<div class=card-content>";
                      echo "<h4 class=text-center>";
                      echo $row['productname'];
                      echo "</h4>";
                    ?>
                </div>
                <div class="card-read-more">
                  <?php
                  echo "<h4 class=text-center>$";
                  echo $row['activeprice'];
                  echo "</h4>";
                  echo "<br />";
                ?>
                </div>
            </div>
            <?php
        echo "</div>";

	        }
        echo "</div>";

      }

      else
      {
        echo'<h2> Search Result</h2>';
        print ($make);
      }
  mysqli_close($conn);
  }
}
?>
</div>
</div>
</body>
</html>
