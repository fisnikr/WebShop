<html>
<head>
<title>eCommerce</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="nav.js"></script>
<?php
include("basic-header.php");
include("functions.php");
?>
</head>
<body>

  <nav class="navbar navbar-default" role="navigation">
	<div class="container">
<div class="col-lg-4 ">
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

<div class="col-lg-6 col-lg-offset-3">

  <?php
  if(isset($_GET['catid']))
  {
				productsbyCat($_GET['catid']);
      }
      else newProducts();
        ?>
</div>
</div>
</body>
</html>
