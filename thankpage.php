<?php 

	session_start();
	if(!$_SESSION['valid_user_id']){
		header("Location: index.php");
	}

?>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Auction</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="css/main.css">
    	<link rel="stylesheet" href="css/profile.css">
    	<link rel="stylesheet" href="css/checkout.css">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
</head>
<body>
	<div class="background"></div>
	<nav class="navbar navbar-default">
      <div class="container-fluid" style="background-color: #101928;">
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
		<div class="row">
			<div class="col-xs-6 col-sm-4"></div>
			<div class="col-xs-6 col-sm-4">
				<p style="text-align: center;">
					<img src="img/checked.png" />
				</p>
			</div>
			<div class="col-xs-6 col-sm-4"></div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-4"></div>
			<div class="col-xs-6 col-sm-4">
				<p>
					<h1 style="text-align: center;" class="text-capitalize"><strong>Thank you so much!</strong></h1>
				</p>
			</div>
			<div class="col-xs-6 col-sm-4"></div>
		</div>
	</div>
</body>
</html>