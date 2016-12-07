<?php
session_start();
include 'dbconnect.php';
include 'validate.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$searchInput = validate_input($_POST['searchInput']);
	$searchInput = strtolower($searchInput);

	$query="SELECT * FROM `product`";

	$result = $conn -> query($query);

	$temp = [];
	if ($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)){

			if(strpos(strtolower($row["Name"]), $searchInput) !== False || strpos(strtolower($row["Description"]), $searchInput) !== False){
				array_push($temp, $row["ProductID"]);
			}
			
    	}
    	$_SESSION["searchedProducts"] = $temp;
    }
	else if(!$result){
		$_SESSION["NoResults"] = 1;
	}
}

header('Location:products.php');
?>