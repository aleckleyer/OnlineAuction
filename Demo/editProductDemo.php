<?php
	include 'config/database.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
		$id = $_GET['edit_id'];
		$stmt_edit = $con->prepare('SELECT Name, Img, Description FROM product WHERE ProductID = :pid');
		$stmt_edit->execute(array(':pid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else{
		header("Location: product.php");
	}
	
	if(isset($_POST['btn_save_updates'])){
		$productname = $_POST['product_name'];
		$productdes = $_POST['product_des'];
		
		$imgFile = $_FILES['product_image']['name'];
		$tmp_dir = $_FILES['product_image']['tmp_name'];
		$imgSize = $_FILES['product_image']['size'];
		
		if($imgFile){
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
		}else{
			//if no image selected, get the old one from db
			$img = $edit_row['Img'];
		}
		
		if(!isset($errMSG)){
			$stmt = $con->prepare('UPDATE product SET Name = :pname, Img = :pimg, Description = :pdes WHERE ProductID= :pid');
			$stmt->bindParam(':pname',$productname);
			$stmt->bindParam(':pimg',$img);
			$stmt->bindParam(':pdes',$productdes);
			$stmt->bindParam(':pid',$id);
			
			if($stmt->execute()){
				?>
				<script>
				alert('Seccessfully Updated ...');
				window.location.href='product.php';
				</script>
				<?php
			} else{
				$errMSG = "Error!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit product</title>
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
	
    <tr>
    	<td><label class="control-label">Productname.</label></td>
        <td><input class="form-control" type="text" name="product_name" placeholder="Enter Productname" value="<?php echo $Name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="product_des" placeholder="Product Description" value="<?php echo $Description; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Product Img.</label></td>
        <td>
		<p><img src="user_images/<?php echo $Img; ?>" height="150" width = "150" /></p>
		<input class="input-group" type="file" name="product_image" accept="image/*" />
		</td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Update
        </button>
		
		<a class="btn btn-default" href="product.php">
		<span class = "glyphicon glyphicon-backward"></span>Cancel</a>
        </td>
    </tr>
    
    </table>
    
</form>
</body>
</html>