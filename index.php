<?php session_start() ?>
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
          <a class="navbar-brand" href="index.php">Online Auction</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav navbar-right">
            <?php if($_SESSION['valid_user_id']){ ?>
            <li>
              <button type="button" class="btn btn-default navBtn">
                <a href="products.php" class="antiLink">Products</a>
              </button>
            </li>
            <li>
              <button type="button" class="btn btn-default navBtn">
                <a href="userProfile.php" class="antiLink">Profile</a>
              </button>
            </li>
            <li>
              <button type="button" class="btn btn-default navBtn" data-toggle="modal" data-target="#logOut" id="logOutBtn">
                Log Out
              </button>
            </li>
            <?php } else { ?>
            <li>
              <button type="button" class="btn btn-default navBtn" data-toggle="modal" data-target="#signIn" id="signInBtn">
                Sign In
              </button>
            </li>
            <li>
              <button type="button" class="btn btn-default navBtn" data-toggle="modal" data-target="#signUp" id="signUpBtn">
                Sign Up
              </button>
              
              <?php if($_SESSION['SignUpCodeValue'] == 2){ ?>
              <div class="alert alert-danger" role="alert">
                <strong>Couldn't Register.. You beat</strong>
              </div>
              <?php } ?>
            
            </li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container-fluid">
      <div class="row" id="search">
        <div class="col-md-offset-2 col-md-8">
          <form action="search.php" method="POST">
          <label id="inputLabel">Want something? We might have it.</label>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." name="searchInput">
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Search" id="searchBtn"/>
            </span>
          </div><!-- /input-group -->
          <?php 

          if($_SESSION["NoResults"] == 1){
          ?>
          <div class="alert alert-danger" role="alert">
            <strong>Lol!</strong> We don't have that.
          </div>
          <?php } ?>
          </form>
      </div>
    </div>

    <div class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="navbar-text text-center" id="footerText">© 2016 - OnlineAuction
        </p>
      </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="logOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
          </div>
          <div class="modal-footer">
            <form class="form-horizontal" action="logout.php" method="POST">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Log Out</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Welcome Back</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="login.php" method="POST">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="logInEmail">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="logInPassword">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Join the party!</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="register.php" method="POST">
              <div class="form-group">
                <label for="SignUpFirstName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="SignUpFirstName" name="SignUpFirstName" placeholder="First">
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="SignUpLastName" name="SignUpLastName" placeholder="Last">
                </div>
              </div>
              <div class="form-group">
                <label for="SignUpEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="SignUpEmail" name="SignUpEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="SignUpCountry" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="SignUpCountry" name="SignUpCountry" placeholder="Country">
                </div>
              </div>
              <div class="form-group">
                <label for="SignUpPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="SignUpPassword" name="SignUpPassword" placeholder="Password">
                </div>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="SignUpCPassword" name="SignUpCPassword" placeholder="Confirm Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" id="SignUpSubmit" name="SignUpSubmit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modals End -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>