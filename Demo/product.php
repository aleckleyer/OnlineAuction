<?php
	//connect to database
	include 'config/database.php';
	
	if(isset($_GET['delete_id'])){
		// select img
		$stmt_select = $con->prepare('SELECT Img FROM product WHERE ProductID =:pid');
		$stmt_select->execute(array(':pid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['Img']);
		
		$stmt_delete = $con->prepare('DELETE FROM product WHERE ProductID=:pid');
		$stmt_delete->bindParam(':pid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: product.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>List products</title>
	<link href="OnlineAuction/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="OnlineAuction/css/profile.css">
</head>
<body>
<div class="container">
<?php
	
	//select profucts from database
	$query = "Select ProductID, Price, Name, Img, Description
			  FROM product";
	$stmt = $con->prepare($query);
	$stmt->execute();
	
	//count number of products returned
	$num_row =  $stmt->rowCount();
	if($num_row>0){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			?>
			<div class="col-xs-3">
				<img src="user_images/<?php echo $row['Img'];?>" class="img-rounded" width="250px" height="250px"/>
				<p><?php echo $row['Name']; ?></p>
				<p><?php echo $row['Price']; ?></p>
				<p><?php echo $row['Description']; ?></p>
				<a class="btn btn-info" href="editProductDemo.php?edit_id=<?php echo $row['ProductID'];?>" title="click to edit">
				<span class="glyphicon glyphicon-edit"></span>Edit</a>
				
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['ProductID']; ?>" title = "click to delete" onclick="return confirm('Are You SURE?')">
				<span class="glyphicon glyphicon-remove-circle"></span>Delete</a>
				
			</div>
		<?php
		}
	}else{
		?>
		<div class="col-xs-12">
			<div class="alert alert-warning">
				<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found!
			</div>
		</div>
		<?php
	}
		?>
</div>
</body>
</html>