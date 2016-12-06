<?php session_start(); ?>

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
    <div class="background"></div>
    <nav class="navbar navbar-default otherNavbar">
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
        <?php
        require('dbconnect.php');

        $query="SELECT * FROM `product`";
    
        $result = $conn->query($query);
        
        if ($result->num_rows > 0){
          while($row = mysqli_fetch_array($result)){
            echo '<div class="col-md-2 product">'.
                    '<div class="row productName text-center">'.
                      '<h5>'.$row["Name"].'</h5>'.
                    '</div>'.
                    '<div class="row productImg">'.
                      '<img class="img-responsive" src="product-img/'.$row["Img"].'"/>'.
                    '</div>'.
                    '<div class="row productTime text-center">'.
                      '<p class="lead">'.$row["TimeLeft"].'</p>'.
                    '</div>'.
                    '<div class="row productBtn">'.
                      '<button class="btn btn-default btn-block">$'.$row["Price"].' Bid Now</button>'.
                    '</div>'.
                  '</div>';
          }
        }

        ?>
        <!-- <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div>
        <div class="col-md-2 product">
          <div class="row productName text-center">
            <h5>Product Name</h5>
          </div>
          <div class="row productImg">
            <img src="http://placehold.it/155x150"/>
          </div>
          <div class="row productTime text-center">
            <p class="lead">0:00</p>
          </div>
          <div class="row productBtn">
            <button class="btn btn-default btn-block">$4 Bid Now</button>
          </div>
        </div> -->
      </div>
    </div>

    <div style="margin-top:60px;"></div>

    <div class="navbar navbar-default navbar-fixed-bottom otherNavbar">
      <div class="container">
        <p class="navbar-text text-center" id="footerText">© 2016 - OnlineAuction
        </p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>