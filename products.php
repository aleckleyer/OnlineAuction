<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Products Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Online Auction</a>
        </div>
        <div>
        <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav navbar-right">
            <li>
              <button type="button" class="btn btn-default navBtn" id="userButton">
                <a href="userProfile.php">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </a>
              </button>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container" id="AuctionsList">
      <div class="row-fluid">
        <div class="col-md-2 product">
          <div class="row productImg">

          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
        <div class="col-md-2 product"></div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>