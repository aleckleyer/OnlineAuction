<?php
//session_start();
include 'dbconnect.php';
include 'validate.php';

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {/*server array - it is looking for a form with a request method of post, post is another form of array
New value will be $searchInput = */
	
	$searchInput = validate_input($_POST['searchInput']);
	echo $searchInput;

	/*$query="SELECT * FROM Users WHERE Email='$email' AND Password='$password'";

	$result = $conn->query($query);

	if ($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)){
			$_SESSION['valid_user'] = $row['Email'];
            $_SESSION['valid_user_priv'] = $row['AdminPriv'];
            $_SESSION['valid_user_id'] = $row['UserID'];
    	}
    }
	else if(!$result)
		echo "<div class='alert alert-danger'>Could not log you in.</div>";
*/}	

//header('Location:index.php');
?>