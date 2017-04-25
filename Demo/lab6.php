<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	include 'config/database.php';
	
	$var = $_POST['product_name'];
	if(isset($var)){
		$sql = "Select ProductID, Price, Name, Img, Description FROM product where Name = :pname";
	$stmt = $con->prepare($sql);
	$stmt->execute(array(':pname'=>$var));
	
	$products = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$products[] = $row;
	}
	
	echo json_encode($products);
	}
	
?>
