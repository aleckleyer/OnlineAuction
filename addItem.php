<?php
	session_start();
	//connect to database
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();
	
	
	//insert img
	if(isset($_POST['btnsave'])){
		
		$productname = $_POST['product_name'];
		$productdescription = $_POST['product_description'];
		$productprice = $_POST['product_price'];
		$producttime = $_POST['product_time'];
		
		$imgFile = $_FILES['product_image']['name'];
		$tmp_dir = $_FILES['product_image']['tmp_name'];
		$imgSize = $_FILES['product_image']['size'];
		if(empty($productname)){
			$errMSG = "Please enter product's name!";
		}else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		} else{
			$upload_dir = 'product-img/'; //directory
			
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
			
			//if no error
			if(!isset($errMSG)){
				$stmt_add = $db_handle->runQuery("INSERT INTO product(SellerID, Price, Name, Img, Description, TimeLeft) VALUES ('".$_SESSION['valid_user_id']."','".$productprice."','".$productname."','".$img."','".$productdescription."','".$producttime."')");
				
					$successMSG = "New record inserted!";
					header("Location: userProfile.php");
			}
		}
	}
	
	
	//$con->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>List products</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/profile.css">
	<link rel="stylesheet" href="css/addItem.css">
</head>
<body>
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>  
<!-- 	<form method="POST" enctype="multipart/form-data" class = "form-horizontal">
		<table class="table table-bordered table-responsive" style="border:1">
			
			<tr>
			<td><label class="control-label">Productname</label></td>
			<td><input class="form-control" type="text" name="product_name" placeholder="Enter Productname" value="" /></td>
			</tr>
			<tr>
			<td><label class="control-label">Description</label></td>
			<td><input class="form-control" type="text" name="product_description" placeholder="Description" value="" /></td> 
			</tr>
			<tr>
			<td><label class="control-label">Price</label></td>
			<td><input class="form-control" type="text" name="product_price" placeholder="Enter Price" value="" /></td>
			</tr>
			<tr>
			<td><label class="control-label">Product Img.</label></td>
			<td><input class="input-group" type="file" name="product_image" accept="image/*" /></td>
			</tr>
    
			<tr>
			<td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; save
			</button>
			
			<a class="btn btn-default" href="userProfile.php">
		<span class = "glyphicon glyphicon-backward"></span>Cancel</a>
        </td>
			
			</td>
			</tr>
    
    </table>
    
</form> -->

<div class="container">
    <div class="row">
		<form role="form" enctype="multipart/form-data" class="col-md-9 go-right" method="POST">
			<h2>Add An Item</h2>
            <p>Please, use the form below if you'd like to list an item for auction.</p>
			<div class="form-group">
			<input id="product_name" name="product_name" type="text" class="form-control" value="" required>
			<label for="product_name">Product Name</label>
		</div>
		<div class="form-group">
			<textarea id="description" name="product_description" class="form-control" value="" required></textarea> 
			<label for="product_description">Description</label>
		</div>
		<div class="form-group">
			<input id="product_time" class="form-control" type="num" name="product_time" required/>
			<label for="product_time">How Long Would You Like To List The Item For? (Seconds)</label>
		</div>
		<div class="form-group">
			<input id="product_price" class="form-control" type="num" name="product_price" required/>
			<label for="product_price">Price</label>
		</div>
		<div class="form-group">
			<input class="input-group" type="file" name="product_image" />
		</div>
		<div class="form-group">
			<button type="submit" name="btnsave" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; save
			</button>
			<a class="btn btn-default" href="userProfile.php">Cancel</a>
		</div>

		</form>
        
	</div>
</div>
</body>
</html>