<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Auction</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>
    <div class="background"></div>
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

        <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav navbar-right">
            <li>
              <button type="button" class="btn btn-default navBtn" data-toggle="modal" data-target="#signIn" id="signInBtn">
                Sign In
              </button>
            </li>
            <li>
              <button type="button" class="btn btn-default navBtn" data-toggle="modal" data-target="#signUp" id="signUpBtn">
                Sign Up
              </button>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container-fluid">
      <div class="row" id="search">
        <div class="col-md-offset-2 col-md-8">
          <form action="search.php" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." id="searchInput">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
          </form>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>