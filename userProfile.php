<?php
	session_start();
	if(!$_SESSION['valid_user_id']){
		header("Location: index.php");
	}
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Profile</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="css/main.css">
    	<link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
    
	<style>
	.modal-backdrop{
		z-index:1030!important;
	}
	.modal{
		z-index:1040!important;
	}
	</style>
	</head>
    <body>

    <nav class="navbar navbar-default">
        <div class="container-fluid" style="background-color: rgb(43, 45, 48);">
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
    			<li>
    				<?php
    				$user_array = $db_handle->runQuery("SELECT FirstName FROM user where UserID='".$_SESSION['valid_user_id']."'");
    				if(!empty($user_array)){
    					foreach($user_array as $key=>$value){
    					echo "<p style='color:white; padding-top: 16px;'>";
    					echo "Welcome back, ".$user_array[$key]["FirstName"]."!";
    					echo "</p>";
    				}} 
    				?>	
    			</li>
    			<li>
    				<form class="form-horizontal" action="logout.php" method="POST">
    					<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default navBtn">Log Out</button>
                            </div>
                        </div>
                    </form>
    			</li>
    			<li>
					<a href="#" data-toggle="modal" data-target="#myModal"><span type=" glyphicon glyphicon-search"></span>Search</a>
    			</li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
	<!--search box-->
	<div class="container">
  <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		<div class="modal-content" style=" width: 974px; background-color:rgb(43, 45, 48); left:148px; margin:0; bottom:171px;">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">X</button>
			  <h4 class="modal-title">Search Section</h4>
			</div>
			<div class="modal-body">
				<section class="search-box1" id="panel" >
					<div class="container" style="padding:0">
						<form class="form-inline" role="form" style="margin-bottom:0px;" action="search.php" method="POST">
							<div class="col-sm-8 col-xs-8 form-group top_search" style="padding-right:0px;">
								<div class="row">
									<input type="text" name="searchInput" class="form-control search-wrap" id="search" placeholder="Search here..." style="height:40px; padding-left:10px">
								</div>
							</div>
							<div class="row" style="width: 378px; float: right;">
								<div class="col-sm-4 col-xs-4 form-group top_search" style="padding:0px; margin:0px;">
									<button type="submit" class="btn btn-default search-btn" value="Search" style="height: 41px">SEARCH</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
		</div>
      
    </div>
	</div>
    <br><br><br><br><br>

    <section>

        <div class="container" style="margin-top: 30px;">
            <div class="profile-head">
                <?php
    	           $user_array = $db_handle->runQuery("SELECT Email, FirstName, LastName, COUNTRY, PhoneNumber FROM user where UserID='".$_SESSION['valid_user_id']."'");
    	           if(!empty($user_array)){
    		          foreach($user_array as $key=>$value){
                ?>
                <div class="col-md- col-sm-4 col-xs-12">
                    <img src="img/smileface.jpg" class="img-responsive" />
                    <?php
                        echo "<h6>";
                        echo $user_array[$key]["FirstName"]." ".$user_array[$key]["LastName"]; 
                        echo "</h6>";?>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <h5><?php echo $user_array[$key]["FirstName"]." ".$user_array[$key]["LastName"]; ?></h5>
                    <!--p>Web Designer / Develpor </p-->
                    <ul>
                        <li><span class="glyphicon glyphicon-map-marker"></span><?php echo $user_array[$key]["COUNTRY"];?></li>
                        <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call" style="padding-left: 0px;">

                        <?php   
                                $number = $user_array[$key]["PhoneNumber"];
                                $number = str_split($number);
                                $index = 0;
                                
                                foreach($number as &$char){
                                	if($index == 0){
                                		echo "(";
                                		echo $char;
                                	}else if($index == 3){
                                		echo ") ";
                                		echo $char;
                                	}else if($index == 6){
                                		echo " - ";
                                		echo $char;
                                	}else{
                                		echo $char;
                                	}
                                	$index+=1;
                                }

                        ?>
    
                        </a></li>
                        <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"><?php echo $user_array[$key]["Email"];?></a></li>

                    </ul>


                </div><!--col-md-8 col-sm-8 col-xs-12 close-->
                    	<?php }}?>
            </div><!--profile-head close-->
        </div><!--container close-->
        <div id="sticky" class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-menu" role="tablist">
                <li class="active">
                    <a href="#profile" role="tab" data-toggle="tab">
                        <i class="fa fa-male"></i> Products
                    </a>
                </li>
                <li>
                    <a href="#change" role="tab" data-toggle="tab">
                        <i class="fa fa-key"></i> Edit Profile
                    </a>
                </li>
    	        <li>
                    <a href="#message"  role="tab" data-toggle="tab">
                        <i class="fa fa-key"></i> Messages
                    </a>
                </li>
            </ul><!--nav-tabs close-->
        <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade active in" id="profile">
    		          <div class="container" style="padding-right:58px; padding-left:8px;">
    		              <div class = "row">
    		                  <h2>Your Current bids<h2>
    		              </div>
    	                  <div class="row">
        	               <!-- BEGIN PRODUCTS -->
      		            <div class="col-md-3 col-sm-6">
    			             <?php
    			                 $product_array = $db_handle->runQuery("SELECT * FROM product WHERE BuyerID = '".$_SESSION['valid_user_id']."' ORDER by ProductID ASC");
    			                 if(!empty($product_array)){
    				                foreach($product_array as $key=>$value){
    			
    		                  ?>
        		              <span class="thumbnail">
          			
                      			<h5><?php echo $product_array[$key]["Name"]; ?></h5>
                				<img class="img-responsive" src="product-img/<?php echo $product_array[$key]["Img"]; ?>" alt="...">
                				<p class="lead"><?php echo $product_array[$key]["TimeLeft"];?></p>
                      			<p><?php echo $product_array[$key]["Description"]; ?></p>
                      			<hr class="line">
                      			<div class="row productBtn">
                					<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#product<?php echo $product_array[$key]['ProductID'];?>"> <?php echo "$".$product_array[$key]["Price"];?> BID
                					</button>
          			            </div>
        		              </span>
    			             <?php
    			                     } 
                                 } else {
    				         ?>
    				        <div class = "col-md-3 col-sm-6">
    					       <span class="thumbnail">
    						      &nbsp; You have not bid anything!
    					       </span>
    				        </div>
    		              <?php
    			             }
    		                  ?>
      	                 </div>
    	           </div>
    	
    	       <div class = "row">
    		      <h2>Your Listed Products<h2>
    		      <button class="btn btn-success right" onclick="location.href='imgInsertDemo.php?user_id=<?php echo $_SESSION['valid_user_id'];?>'" > ADD ITEMS</button>
    		  </div>
    		
    	       <div class="row">
                	<!-- BEGIN PRODUCTS -->
            		<?php
            			$product_array = $db_handle->runQuery("SELECT * FROM product WHERE SellerID = '".$_SESSION['valid_user_id']."' ORDER by ProductID ASC");
            			if(!empty($product_array)){
            				foreach($product_array as $key=>$value){
            			
            		?>
              		<div class="col-md-3 col-sm-6">
                		<span class="thumbnail">
                  			<img src="product-img/<?php echo $product_array[$key]["Img"]; ?>" alt="...">
                  			<h4><?php echo $product_array[$key]["Name"]; ?></h4>
                  			<p><?php echo $product_array[$key]["Description"]; ?></p>
                  			<hr class="line">
                  			<div class="row">
                  				<div class="col-md-6 col-sm-6">
                  					<p class="price"><?php echo "$".$product_array[$key]["Price"];?></p>
                  				</div>
                  				<div class="col-md-6 col-sm-6" style="text-allign: left; padding: 0px;">
            						<button class="btn btn-success right" onclick="location.href=' editProductDemo.php?edit_product_id=<?php echo $product_array[$key]['ProductID']; ?>'" > EDIT</button>
            						<!--button-->
            						
    						<?php
    						if(isset($_GET['delete_product_id'])){
    		$stmt_select = $db_handle->runQuery("SELECT Img FROM product WHERE ProductID = '".$_GET['delete_product_id']."' AND SellerID = '".$_SESSION['valid_user_id']."'");
    		if(!empty($stmt_select)){
    			foreach($stmt_select as $k=>$v){
    				$del_img = $stmt_select[$k]['Img'];
    			}
    		}
    		unlink("product-img/".$del_img);
    		$stmt_delete = $db_handle->runQuery("DELETE FROM product WHERE ProductID = '".$_GET['delete_product_id']."' AND SellerID = '".$_SESSION['valid_user_id']."'");
    		
    		header("Location: userProfile.php");
    	}
    						?>
    						
    						<a style=" width:56px;" class="btn btn-success right" href="?delete_product_id=<?php echo $product_array[$key]['ProductID']; ?>" onclick="return confirm('Are You Sure?')" >DELE</a><!--/button-->
    						
          				</div>
          				
          			</div>
        		</span>
      		</div>
    		<?php
    			}} else{
    				?>
    				<div class = "col-md-3 col-sm-6">
    					<span class="thumbnail">
    						&nbsp; You have not listed any products!
    					</span>
    				</div>
    		<?php
    			}
    		?>
    		</div>
      		
        </div><!--container close-->
    </div><!--tab-pane close-->
          
      
    <div class="tab-pane fade" id="change">

    <div class="container fom-main">
    <div class="row">
    <div class="col-sm-12">
    <h2 class="register">Edit Your Profile</h2>
    </div><!--col-sm-12 close-->
    </div><!--row close-->
    <?php
    if(isset($_SESSION['valid_user_id'])){
    	$userid = $_SESSION['valid_user_id'];
    	$stmt_edit = $db_handle->runQuery("SELECT * FROM user where UserID= '".$userid."'");
    }

    if(isset($_POST['btn_save_updates'])){
    	$firstname = $_POST['user_fname'];
    	$lastname = $_POST['user_lname'];
    	$email = $_POST['user_mail'];
    	$phonenumber = $_POST['phone_number'];
    	$country = $_POST['country'];

    	$imgFile = $_FILES['user_image']['name'];
    	$tmp_dir = $_FILES['user_image']['tmp_name'];
    	$imgSize = $_FILES['user_image']['size'];
    	
    			if($imgFile){
    			$upload_dir = 'user-img/'; //directory
    			
    			//Img extension
    			$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    			
    			//valid img extensions
    			$valid_extension = array('jpeg','jpg','png','gif');
    			
    			//rename uploading image
    			$img = rand(1000,1000000).".".$imgExt;
    			//move_uploaded_file($tmp_dir,$upload_dir.$img);
    			//img file format
    			if(in_array($imgExt, $valid_extension)){
    				//check file size '5MB'
    				if($imgSize<5000000){
    					move_uploaded_file($tmp_dir, $upload_dir.$img);
    				} else{
    					$errMSG = "Sorry, your file is too large.";
    				}
    			} else{
    				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are valid.";
    			}
    		}else{
    			//if no image selected, get the old one from db
    			foreach($stmt_edit as $key => $value){
    					$img = $stmt_edit[$key]['Image'];
    			}
    		}
    		if(!isset($errMSG)){
    			
    		$stmt_array = $db_handle->runQuery("UPDATE user Set Email= '".$email."', FirstName='".$firstname."', LastName='".$lastname."', COUNTRY='".$country."', Image='".$img."', PhoneNumber='".$phonenumber."' WHERE UserID= '".$userid."'");

    ?>
    <script>
    	alert('Successfully Updated!');
    	window.location.href='userProfile.php';
    </script>
    <?php }} ?>

    <br />
    <div class="row">

    <form class="form-horizontal main_form text-left" action=" " method="post"  id="contact_form">
    <?php
    	if(!empty($stmt_edit)){
    		foreach($stmt_edit as $key=>$value){
    			
    ?>
    <fieldset>


    <div class="form-group col-md-12">
      <label class="col-md-10 control-label">First Name</label>  
      <div class="col-md-12 inputGroupContainer">
      <div class="input-group">
      <input  name="user_fname" placeholder="First Name" class="form-control" value ="<?php echo $stmt_edit[$key]['FirstName']; ?>"  type="text">
        </div>
      </div>
    </div>

    <!-- Text input-->

    <div class="form-group col-md-12">
      <label class="col-md-10 control-label" >Last Name</label> 
        <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
      <input name="user_lname" placeholder="Last Name" class="form-control"  type="text" value = "<?php echo $stmt_edit[$key]['LastName']; ?>">
        </div>
      </div>
    </div>

    <!-- Text input-->
           <div class="form-group col-md-12">
      <label class="col-md-10 control-label">E-Mail</label>  
        <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
      <input name="user_mail" placeholder="E-Mail Address" class="form-control" value="<?php echo $stmt_edit[$key]['Email']; ?>" type="text">
        </div>
      </div>
    </div>


    <!-- Text input-->
           
    <div class="form-group col-md-12">
      <label class="col-md-10 control-label">Phone #</label>  
        <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
      <input name="phone_number" placeholder="(123)456-7890" class="form-control" value="<?php echo $stmt_edit[$key]['PhoneNumber']; ?>" type="text">
        </div>
      </div>
    </div>

    <!-- Text input-->
          
     <div class="form-group col-md-12">
      <label class="col-md-10 control-label">Country</label>
        <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
                <input class="form-control" name="country" placeholder="Country" value="<?php echo $stmt_edit[$key]['COUNTRY']; ?>" type="text">
      </div>
      </div>
    </div>

    <!-- upload profile picture -->
    <div class="col-md-12 text-left">
    <div class="uplod-picture">
    <span class="btn btn-default upload-file">
    	<p><img src="user-img/<?php echo $stmt_edit[$key]['Image']; ?>" height="150" width = "150" /></p>
        <input class="input-group" type="file" name="user_image" accept="image/*"/>
    </span>

    </div><!--uplod-picture close-->
    </div><!--col-md-12 close-->
    <!-- Button -->
    <div class="form-group col-md-10">
      <div class="col-md-6">
        <button type="submit" name = "btn_save_updates" class="btn btn-warning submit-button" >Save</button>
        <button type="submit" class="btn btn-warning submit-button" >Cancel</button>

      </div>
    </div>
    <?php
    		}
    	}
    ?>
    </fieldset>
    </form>
    </div><!--row close-->
    </div><!--container close -->          
    </div><!--tab-pane close-->

    <div class="tab-pane fade ib" id="message">

    <div class="container fom-main">
    	<div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>

                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="btn-compose pull-left">
                    <a type="button" class="btn btn-danger navbar-btn" href="#compose" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-pencil"></span> Compose</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#inbox" role="tab" data-toggle="tab">
                            Inbox <!--span class="label label-success">10</span-->
                        </a>
                    </li>
                    <li><a href="#sent-mail" role="tab" data-toggle="tab">Sent mail</a>

                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>




    <div class="tab-content">
      <div class="tab-pane active" id="inbox">
         
          <div class="container"  style="padding-right: 70px;">
               <div class="content-container clearfix">
                   <div class="col-md-12">
                       <h1 class="content-title">Inbox</h1>
                                       
                       <ul class="mail-list">
    				   <?php
    	$inbox_array = $db_handle->runQuery("SELECT * FROM messages WHERE RecipientID = '".$_SESSION['valid_user_id']."' ORDER by Time DESC");
    	if(!empty($inbox_array)){
    		
    		foreach($inbox_array as $k=>$v){
    		$sender_id = $inbox_array[$k]["SenderID"];
    		$sender_array = $db_handle->runQuery("SELECT Email From user WHERE UserID = '".$sender_id."'");
    		foreach($sender_array as $ka=>$va){
    			$sender_mail = $sender_array[$ka]['Email'];
    		}
    	?>
                           <li>
                               <a href="#">
                                   <span class="mail-sender"><?php echo $sender_mail;?></span>
                                   <span class="mail-subject"><?php echo $inbox_array[$k]["Subject"]; ?></span>
                                   <span class="mail-message-preview"><?php echo $inbox_array[$k]["Text"]; ?></span>
                               </a>
                           </li>
    		<?php
    	 }
    	}
    	 ?> 
                       </ul>
                   </div>
               </div>
           </div>
         
      </div>
      <div class="tab-pane" id="compose">
      <form method="post" enctype="multipart/form-data">
        <?php
    	if(isset($_POST["btn_send_message"])){
    		if(!isset($_POST['email_to']) || !isset($_POST['email_subject']) ){
    			died("We are sorry, but these are some errors from your mail!");
    		}
    		date_default_timezone_set("America/New_York");
    		$date = date("Y-m-d h:i:sa");
    		$to = $_POST['email_to'];
    		$find_recipientid = $db_handle->runQuery("SELECT UserID FROM user WHERE Email= '".$to."'");
    		if(!empty($find_recipientid)){
    			foreach($find_recipientid as $ke=>$ve){
    				$reid = $find_recipientid[$ke]["UserID"];
    			}
    		} else{
    		?>
    			<script>
    				alert("Sorry. The email is wrong or not registerd in the system");
    			</script>
    		<?php
    			}
    		$sbj = $_POST['email_subject'];
    		$message = $_POST['email_mesage'];
    					
    		$sending_message = $db_handle->runQuery("INSERT INTO messages(RecipientID, SenderID, Text, Subject, Time) VALUES ('".$reid."','".$_SESSION['valid_user_id']."','".$message."','".$sbj."','".$date."') ");
    		?>
    			<script>
    			alert('The message is sent!');
    			</script>
    		<?php
    				
    		}
    	?>  
          <div class="container" style="padding-right: 70px;">
        <div class="content-container clearfix">
            <h1 class="content-title" >Compose</h1>
            <div class="col-md-12">
                <div class="form-group">
                    <input id="tokenfield" type="text" name="email_to" class="form-control" placeholder="To" required/>
                </div>
                <div class="form-group">
                    <input name="email_subject" type="text" class="form-control" placeholder="Subject"  required/>
                </div>
                <textarea class="form-control" name="email_mesage" placeholder="message" required></textarea>
                <div class="btn-send" style="padding-top:12px;">
                <button name="btn_send_message" type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-send"></span> Send</button>
                </div>
            </div>
        </div>
    </div>
       </form>   
      </div>
      <div class="tab-pane" id="sent-mail">
          
          <div class="container" style="padding-right: 70px;">
               <div class="content-container clearfix">
                   <div class="col-md-12" >
                       <h1 class="content-title">Sent Mail</h1>
                       
                       <ul class="mail-list">
    				   <?php
    	$sent_array = $db_handle->runQuery("SELECT * FROM messages WHERE SenderID = '".$_SESSION['valid_user_id']."' ORDER by Time DESC");
    	if(!empty($sent_array)){
    		
    		foreach($sent_array as $k=>$v){
    		$recipient_id = $sent_array[$k]["RecipientID"];
    		$recipient_array = $db_handle->runQuery("SELECT Email From user WHERE UserID = '".$recipient_id."'");
    		foreach($recipient_array as $ka=>$va){
    			$recipient_mail = $recipient_array[$ka]['Email'];
    		}
    	?>
                           <li>
                               <a href="">
                                   <span class="mail-sender"><?php echo $recipient_mail;?></span>
                                   <span class="mail-subject"><?php echo $sent_array[$k]["Subject"];?></span>
                                   <span class="mail-message-preview"><?php echo $sent_array[$k]["Text"];?></span>
                               </a>
                           </li>
    	<?php } } ?>
                       </ul>
                   </div>
               </div>
           </div>
          
      </div>
      
      
    </div><!--tab-pane close-->

    </div><!--tab-content close-->
    </div><!--container close-->
    </div>
    </section><!--section close-->
	
	<?php
		 $product_array = $db_handle->runQuery("SELECT * FROM product WHERE BuyerID = '".$_SESSION['valid_user_id']."' ORDER by ProductID ASC");
		 if(!empty($product_array)){
			foreach($product_array as $key=>$value){

	  ?>
	 <div class="modal fade" id="product<?php echo $product_array[$key]['ProductID'];?>" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	   <!--div class="modal-dialog" role="document"-->
		  <div class="modal-content">
			  <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <h4 class="modal-title" id="gridSystemModalLabel">Make A Bid</h4>
			  </div>
			  <div class="modal-body">
				 <form class="form-horizontal" action="makeBid.php?productID=<?php echo $product_array[$key]['ProductID']; ?>" method="POST">
					<div class="form-group">
					   <label for="inputEmail3" class="col-sm-2 control-label">Bid:
					   </label>
					   <div class="col-sm-10">
						  <input type="text" class="form-control" id="product<?php echo $product_array[$key]["ProductID"]; ?>" placeholder="$<?php echo $product_array[$key]["Price"]; ?>" name="productBidAmount">
					   </div>
					</div>
					<div class="form-group">
					   <div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Bid</button>
					   </div>
					</div>
				 </form>
			  </div>
		  </div>
	</div>
	 <?php
			 } 
		 }
    ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    		
      </body>
</html>