<?php
	session_start();
	require('dbconnect.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$product = $_GET['productID'];
		$newPrice = $_POST['productBidAmount'];
		$bidder = $_SESSION['valid_user_id'];

		$query = "UPDATE product SET Price='$newPrice', BuyerID='$bidder' WHERE ProductID='$product'";
		$result = mysqli_query($conn,$query);

		header('Location:products.php');

	}

?>