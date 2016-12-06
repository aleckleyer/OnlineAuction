<?php
session_start();
include 'dbconnect.php';
include 'validate.php';

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   
    $email = validate_input($_POST['logInEmail']);
    $password = validate_input($_POST['logInPassword']);
    
	$query="SELECT * FROM user WHERE Email='$email' AND Password='$password'";
		
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
}

header('Location:index.php');
?>