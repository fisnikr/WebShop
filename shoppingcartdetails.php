<html lang="en">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopping Cart Detail</title>
    <link rel="stylesheet" href="css/productdetails.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <?php
    session_start();
    include("basic-header.php");
    include("functions.php");
    ?>

  </head>

  <body>

	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">

          <?php
         $sid = session_id();
            cartDetails($sid);
            ?>

					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
