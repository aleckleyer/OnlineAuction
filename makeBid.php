<?php
	session_start();
	require('dbconnect.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$product = $_GET['productID'];
		$newPrice = $_POST['productBidAmount'];
		$bidder = $_SESSION['valid_user_id'];
		
		$sql = "SELECT Price From product WHERE ProductID = '$product'";
		$rs = $conn -> query($sql);
		if($rs->num_rows >0){
			while($row = mysqli_fetch_array($rs)){
				if($newPrice <= $row["Price"]){
					echo "Sorry";
				} else{
					$query = "UPDATE product SET Price='$newPrice', BuyerID='$bidder' WHERE ProductID='$product'";
		$result = mysqli_query($conn,$query);
				}
			}
		}

		

		header('Location:products.php');

	}

?>