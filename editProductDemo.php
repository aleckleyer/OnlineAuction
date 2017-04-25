<?php
	include 'config/dbcontroller.php';
	$db_handle = new DBController();
	
	if(isset($_GET['edit_product_id']) && !empty($_GET['edit_product_id'])){
		$id = $_GET['edit_product_id'];
		$stmt_edit = $db_handle->runQuery("SELECT * FROM product WHERE ProductID = '".$id."'");
		$productArray = array($stmt_edit[0]["ProductID"]=>array('product_name'=>$stmt_edit[0]["Name"],'product_image'=>$stmt_edit[0]['Img'],'product_des'=>$stmt_edit[0]['Description']));
	}
	else{
		header("Location: userProfile.php");
	}
	
	if(isset($_POST['btn_save_updates'])){
		$productname = $_POST['product_name'];
		$productdes = $_POST['product_des'];
		
		$imgFile = $_FILES['product_image']['name'];
		$tmp_dir = $_FILES['product_image']['tmp_name'];
		$imgSize = $_FILES['product_image']['size'];
		
		if($imgFile){
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
		}else{
			//if no image selected, get the old one from db
			foreach($stmt_edit as $key => $value){
					$img = $stmt_edit[$key]['Img'];
			}
		}
		
		if(!isset($errMSG)){
			$stmt_array = $db_handle->runQuery("UPDATE product SET Name = '".$productname."', Img = '".$img."', Description = '".$productdes."' WHERE ProductID= '".$id."'");
			
				?>
				<script>
				alert('Seccessfully Updated ...');
				window.location.href='userProfile.php';
				</script>
				<?php
		/*	} else{
				$errMSG = "Error!";
			}*/
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit product</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/profile.css">
</head>
<body>
	<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    <?php
			if(isset($errMSG)){
				?>
				<div class="alert alert-danger">
				<span class = "glyphicon glyphicon-info-sign"></span>
				&nbsp;<?php echo $errMSG; ?>
				</div>
				<?php
			}
		?>
	<table class="table table-bordered table-responsive">
	<?php
		if(!empty($stmt_edit)){
			foreach($stmt_edit as $key=>$value){
				
	?>
    <tr>
    	<td><label class="control-label">Productname.</label></td>
        <td><input class="form-control" type="text" name="product_name" placeholder="Enter Productname" value="<?php echo $stmt_edit[$key]['Name']; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="product_des" placeholder="Product Description" value="<?php echo $stmt_edit[$key]['Description']; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Product Img.</label></td>
        <td>
		<p><img src="product-img/<?php echo $stmt_edit[$key]['Img']; ?>" height="150" width = "150" /></p>
		<input class="input-group" type="file" name="product_image" accept="image/*" />
		</td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Update
        </button>
		
		<a class="btn btn-default" href="userProfile.php">
		<span class = "glyphicon glyphicon-backward"></span>Cancel</a>
        </td>
    </tr>
    <?php
	}
		}
	?>
    </table>
    
</form>
</body>
</html>