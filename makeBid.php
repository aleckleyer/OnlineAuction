<?php
	session_start();
	require('dbconnect.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// print_r($_GET);
		// print_r($_POST);
		// print_r($_SESSION);

		$product = $_GET['productID'];
		$newPrice = $_POST['productBidAmount'];
		$bidder = $_SESSION['valid_user_id'];

		// echo $product."<br>";
		// echo $newPrice."<br>";
		// echo $bidder."<br>";

		$query = "UPDATE product SET Price='$newPrice', BuyerID='$bidder' WHERE ProductID='$product'";
		$result = mysqli_query($conn,$query);

		header('Location:products.php');

	}

?>