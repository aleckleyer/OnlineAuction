<?php 

session_start();

if(!$_SESSION['valid_user_id']){
  header("Location:index.php");
}

?>

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
          <a class="navbar-brand" href="index.php">Online Auction</a>
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

        if($_SESSION['searchedProducts']){
          $searchString = implode(',',$_SESSION['searchedProducts']);
          $query="SELECT * FROM `product` WHERE `ProductID` IN (".$searchString.")";
        } else {
          $query="SELECT * FROM `product`";
        }

        // $tempString = "";
        // $index = 0;

        // foreach($_SESSION['searchedProducts'] as $productID){
        //   if(index == 0){
        //     $tempString = 
        //   $tempString = $tempString + $productID

        // }

        
		
        $result = $conn->query($query);
        
        if ($result->num_rows > 0){
          while($row = mysqli_fetch_array($result)){
			date_default_timezone_set("America/New_York");
			$current = date('Y-m-d H:i:s');
			$timeclose = date('Y-m-d H:i:s', strtotime($row["TimePlaced"]) + $row["TimeLeft"]);
			if($timeclose <= $current){
				
			echo '<div class="col-md-2 product">'.
                    '<div class="row productName text-center">'.
                      '<h5>'.$row["Name"].'</h5>'.
                    '</div>'.
                    '<div class="row productImg">'.
                      '<img class="img-thumbnail" src="product-img/'.$row["Img"].'"/>'.
                    '</div>'.
                    '<div class="row productTime text-center">'.
                      '<p class="small" style="padding-bottom:12px;">Deadline: '.$timeclose.'</p>'.
                    '</div>'.
                    '<div class="row productBtn">'.
                      '<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#product'.$row["ProductID"].'" disabled >$'.$row["Price"].' SOLD OUT</button>'.
                    '</div>'.
                  '</div>'.
                  '<div class="modal fade" id="product'.$row["ProductID"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'.
                    '<div class="modal-dialog" role="document">'.
                      '<div class="modal-content">'.
                        '<div class="modal-header">'.
                          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
                          '<h4 class="modal-title" id="myModalLabel">Make A Bid</h4>'.
                        '</div>'.
                        '<div class="modal-body">'.
                          '<form class="form-horizontal" action="makeBid.php?productID='.$row["ProductID"].'" method="POST">'.
                            '<div class="form-group">'.
                              '<label for="inputEmail3" class="col-sm-2 control-label">Bid: </label>'.
                              '<div class="col-sm-10">'.
                                '<input type="text" class="form-control" id="product'.$row["ProductID"].'" placeholder="$'.$row["Price"].'" name="productBidAmount">'.
                              '</div>'.
                            '</div>'.
                            '<div class="form-group">'.
                              '<div class="col-sm-offset-2 col-sm-10">'.
                                '<button type="submit" class="btn btn-default" disabled>SOLD</button>'.
                              '</div>'.
                            '</div>'.
                          '</form>'.
                        '</div>'.
                      '</div>'.
                    '</div>'.
                  '</div>';}else{
            echo '<div class="col-md-2 product">'.
                    '<div class="row productName text-center">'.
                      '<h5>'.$row["Name"].'</h5>'.
                    '</div>'.
                    '<div class="row productImg">'.
                      '<img class="img-thumbnail" src="product-img/'.$row["Img"].'"/>'.
                    '</div>'.
                    '<div class="row productTime text-center">'.
                      '<p class="small" style="padding-bottom:12px;">Deadline: '.$timeclose.'</p>'.
                    '</div>'.
                    '<div class="row productBtn">'.
                      '<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#product'.$row["ProductID"].'">$'.$row["Price"].' Bid Now</button>'.
                    '</div>'.
                  '</div>'.
                  '<div class="modal fade" id="product'.$row["ProductID"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'.
                    '<div class="modal-dialog" role="document">'.
                      '<div class="modal-content">'.
                        '<div class="modal-header">'.
                          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
                          '<h4 class="modal-title" id="myModalLabel">Make A Bid</h4>'.
                        '</div>'.
                        '<div class="modal-body">'.
                          '<form class="form-horizontal" action="makeBid.php?productID='.$row["ProductID"].'" method="POST">'.
                            '<div class="form-group">'.
                              '<label for="inputEmail3" class="col-sm-2 control-label">Bid: </label>'.
                              '<div class="col-sm-10">'.
                                '<input type="text" class="form-control" id="product'.$row["ProductID"].'" placeholder="$'.$row["Price"].'" name="productBidAmount">'.
                              '</div>'.
                            '</div>'.
                            '<div class="form-group">'.
                              '<div class="col-sm-offset-2 col-sm-10">'.
                                '<button type="submit" class="btn btn-default">Bid</button>'.
                              '</div>'.
                            '</div>'.
                          '</form>'.
                        '</div>'.
                      '</div>'.
                    '</div>'.
                  '</div>';
			}
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