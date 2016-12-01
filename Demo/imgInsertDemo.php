<?php
	//connect to database
	include 'config/database.php';
	
	
	//insert img
	if(isset($_POST['btnsave'])){
		
		$productname = $_POST['product_name'];
		
		$imgFile = $_FILES['product_image']['name'];
		$tmp_dir = $_FILES['product_image']['tmp_name'];
		$imgSize = $_FILES['product_image']['size'];
		if(empty($productname)){
			$errMSG = "Please enter product's name!";
		} else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		} else{
			$upload_dir = 'user_images/'; //directory
			
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
				$stmt = $con->prepare("INSERT INTO product(Name, Img) VALUES (:pname, :pimg)");
				$stmt->bindParam(':pname',$productname);
				$stmt->bindParam(':pimg',$img);
				
				if($stmt->execute()){
					$successMSG = "New record inserted!";
				} else{
					$errMSG = "ERROR!!!";
				}
			}
		}
	}
	
	
	//$con->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>List products</title>
	<link href="OnlineAuction/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="OnlineAuction/css/profile.css">
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
	<form method="POST" enctype="multipart/form-data" class = "form-horizontal">
		<table class="table table-bordered table-responsive" style="border:1">
			
			<tr>
			<td><label class="control-label">Productname.</label></td>
			<td><input class="form-control" type="text" name="product_name" placeholder="Enter Productname" value="" /></td> <!--?php echo $productname; ?>-->
			</tr>
			
			<tr>
			<td><label class="control-label">Product Img.</label></td>
			<td><input class="input-group" type="file" name="product_image" accept="image/*" /></td>
			</tr>
    
			<tr>
			<td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; save
			</button>
			</td>
			</tr>
    
    </table>
    
</form>
</body>
</html>