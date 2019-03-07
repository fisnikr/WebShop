<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation-with-button</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Basic-Header.css">
</head>



<body>
    <div>
        <nav class="navbar navbar-default navigation-clean-button">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="index.php">Game2Play</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation"><a href="index.php">Home</a></li>
                        <li role="presentation"><a href="shoppingcartdetails.php">Shopping Cart</a></li>


                    </ul>
                    <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="loginform.php" >Log In</a> <a class="btn btn-default action-button" role="button" href="registerform.php">Sign Up</a></p>
                      <form action="search.php" method="GET">
                    <div class="col-md-6 col-sm-offset-3">
                      <div id="imaginary_container">
                        <div class="input-group stylish-input-group">
                          <input name="name" type="text" class="form-control"  placeholder="Search" >
                          <span class="input-group-addon">
                            <input type="submit" name="submit" value=" " style="background-image: url('images/search.jpg');background-size:100%;width:20px; height:20px; " />
                      </input>
                    </span>

                  </div>
                </div>
              </div>
             </div>
           </div>
                </div>
            </div>
        </nav>
    </div>
  </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
