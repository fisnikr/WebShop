
<html>
<head>
  <link rel="stylesheet" href="css/productdetails.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
<?php
function productsbyCat($cat)
{
  include("dbconnect.php");
  echo '<link rel="stylesheet" type="text/css" href="style.css" />';
  $query = "SELECT DISTINCT product.productid, product.productname, product.logo, price.activeprice
  FROM product , productcategory , picture ,price
  WHERE product.productid=productcategory.productid AND picture.productid=product.productid AND product.productid=price.productid AND productcategory.catid =" . $cat  ;

  $result = mysqli_query($conn,$query);


  while($row = mysqli_fetch_array($result))
  {
    echo "<div class=col-lg-4 column productbox>";
   echo  "<span class=border border-dark>";



    echo "<img width=230px height=280px src=images/".$row['logo'].". />";
    echo "<br />";
    echo " <a href=productdetails.php";
    echo "?id=".$row['productid'].">";
    echo " <div class=producttitle>";
    echo $row['productname'];
    echo "</div>";

    echo "<div class=productprice><div class=pull-right></div><div class=pricetext>";
    echo"$";  echo $row['activeprice'];
    echo "<br />";
    echo "<br />";
    echo "</div>";
    echo "</div>";
    echo "</a>";

    echo "</span>";
    echo "</div>";

  }

}

function newProducts()
{
  include("dbconnect.php");

    $query = "SELECT DISTINCT product.productid, product.productname, product.logo, price.activeprice
    FROM product , price , picture
    WHERE product.productid=price.productid AND product.productid=picture.productid
    order by datecreated desc limit 0,6";

    $result = mysqli_query($conn,$query);


    while($row = mysqli_fetch_array($result))
    {
      echo "<div class=col-lg-4 column productbox>";
     echo  "<span class=border border-dark>";



      echo "<img width=230px height=280px src=images/".$row['logo'].". />";
      echo "<br />";
      echo " <a href=productdetails.php";
      echo "?id=".$row['productid'].">";
      echo " <div class=producttitle>";
      echo $row['productname'];
      echo "</div>";

      echo "<div class=productprice><div class=pull-right></div><div class=pricetext>";
      echo"$";  echo $row['activeprice'];
      echo "<br />";
      echo "<br />";
      echo "</div>";
      echo "</div>";
      echo "</a>";

      echo "</span>";
      echo "</div>";

    }

  }

  function productDetails($prod)
  {
    echo "<link rel=stylesheet href=css/productdetails.css>";
    echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css integrity=sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u crossorigin=anonymous>";
    echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css integrity=sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp crossorigin=anonymous>";
    echo "<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js integrity=sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa crossorigin=anonymous></script>";
    echo "<link href=https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css rel=stylesheet>";
    echo "<link href=https://fonts.googleapis.com/css?family=Open+Sans:400,700 rel=stylesheet>";

    include("dbconnect.php");

    $query = "SELECT *
              FROM product,price
              WHERE product.productid='$prod' AND price.productid='$prod'";

    $result= mysqli_query($conn,$query);

    $query2="SELECT DISTINCT picture.picture
             FROM product, picture
             WHERE product.productid=picture.productid AND product.productid='$prod'";

        $result2= mysqli_query($conn,$query2);
    while($row = mysqli_fetch_array($result))
    {
      echo "<div class=preview col-md-6>";

      echo "<div class=preview-pic tab-content>";

      echo "<div class='tab-pane' ><img  width=650px height=450px src=images/".$row['logo']." /></div>";

      echo"</div>";

      echo "<ul class='preview-thumbnail nav nav-tabs'>";
      while($row2 = mysqli_fetch_array($result2))
      {

        echo  "<li><img width=100px height=100px data-target=#pic-2 data-toggle=tab src=images/".$row2['picture']." />";
        echo "</li>";
      }

    echo "</ul>";

      echo"</div>";
      echo "<br />";
      echo "<div class=details col-md-6 id=test >";
      echo "<h3 class='product-title'>".$row['productname']." </h3>";
          echo "<br />";
      echo "<div class=rating>";
      echo "<div class=stars>";
      echo "<span class='fa fa-star checked'></span>";
      echo "<span class='fa fa-star checked'></span>";
      echo "<span class='fa fa-star checked'></span>";
      echo "<span class='fa fa-star checked'></span>";
      echo "<span class='fa fa-star'></span>";
      echo "</div>";
          echo "<br />";
      echo "<span class=review-no>4193295 reviews</span>";
      echo "</div>";

      echo "<p class=product-description>".$row['productdescription']."</p>";
          echo "<br />";
      echo "<h4 class=price>current price: <span>".$row['activeprice']."</span></h4>";
          echo "<br />";
      echo "<p class=vote><strong>91%</strong> of buyers enjoyed this product! <strong>(8997 votes)</strong></p>";
          echo "<br />";

          echo "<form action=addtocart.php method=GET>";
          echo "<input type=hidden name=productid value=".$row['productid']." />";
          echo"<div class=action align=right>";
          echo "<input class=form-control type=text name=quantity placeholder=Quantity.. />";
          echo "<br />";    echo "<br />";    echo "<br />";    echo "<br />";
              echo "<br />";    echo "<br />";    echo "<br />";    echo "<br />";
                  echo "<br />";    echo "<br />";    echo "<br />";    echo "<br />";
                      echo "<br />";    echo "<br />";     echo "<br />";    echo "<br />";

      //echo "<a class='add-to-cart btn btn-default' href=addtocart.php?id=".$row['productid']."> ADD TO CART </a>";
      echo "<input class='add-to-cart btn btn-default' type=submit name=sumit value='ADD TO CART'>";
      echo "<button class='like btn btn-default' type=button><span class='fa fa-heart'></span></button>";
      echo "</div>";
      echo "</form>";

      echo"</div>";


    }

  }

  function cartDetails($sid)
{

  include("dbconnect.php");


  $query = "SELECT *
            FROM shoppingcart,price,product
            WHERE shoppingcart.sessionid='$sid' AND product.productid=shoppingcart.productid AND product.productid=price.productid";

  $result = mysqli_query($conn,$query);
  $total = 0;
  $ship = 5;
  $sid = session_id();
  echo "<ul class=list-group style='width:100%;'>";
  echo "<h2 style='text-align:center; padding-bottom:25px;'>Order Details</h2>";;
  while($row = mysqli_fetch_array($result))
  {
    $prod = $row['productid'];
    $productname = $row['productname'];

    echo "<li class=list-group-item >";
    echo $row['productname'];
    echo "<span>";
    echo "<span class=badge style='margin-left:890px;'>";
    echo " $";
    echo $row['activeprice'];
    echo "</span>";

    echo "<a class='btn btn-danger btn-sm' style='float:right; padding:2.3px;' href=deletefromcart.php?productid=$prod&cartid=";
    echo $row['cartid'];
    echo">Delete </a>";
    echo "</span>";
    echo "</li>";
    $total += $row['activeprice'] + $ship;
    echo "<br>";
  }

    echo "<br>";
      echo "<br>";
  echo "<li class='list-group-item' style='text-align:center; font-weight:bold;'>Total to pay + $5 for shipping :$$total</li>";
  echo "<br>";
  ?>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">


    <!-- Saved buttons are identified by their button IDs -->
     <input type="hidden" name="business" value="fa24841@seeu.edu.mk">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="<?php echo $productname; ?>">
    <input type="hidden" name="amount" value="<?php echo $total; ?>">
    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="return" value="http://localhost:85/eCommerce/order.php">
    <!-- Saved buttons display an appropriate button image. -->
    <input type="image" name="submit"
      src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
      alt="PayPal - The safer, easier way to pay online">
    <img alt="" width="1" height="1"
      src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >


  <?php
  echo "</ul>";
  echo "</div>";
  echo "</form> ";
}
?>
</body>
</html>
