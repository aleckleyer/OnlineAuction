<?php	
		session_start();
		require('dbconnect.php');
		// If the values are posted, insert them into the database.
		$password = $_POST['SignUpPassword'];
		$cpassword = $_POST['SignUpCPassword'];

		if ($cpassword != $password){
			echo "<b>ERROR:</b> Passwords do not match</br>";
			echo "Please follow this link to return to registration: "."<a href=\"http://localhost:8888/PowerliftingHub/register.php\">Registration</a>";
			exit;
		}
		if ((strlen($password) < 8) && (strlen($password) > 15)){
			echo "<b>ERROR:</b> Password must be at least 8 characters and less than 15 characters";
			echo "Please follow this link to return to registration: "."<a href=\"http://localhost:8888/PowerliftingHub/register.php\">Registration</a>";
			exit;
		}
		if (isset($_POST['SignUpSubmit'])){
			$email = $_POST['SignUpEmail'];
			$password = $_POST['SignUpPassword'];
			$firstname = $_POST['SignUpFirstName'];
			$lastname = $_POST['SignUpLastName'];
			$country = $_POST['SignUpCountry'];
			
			$query = "
			INSERT INTO `user` (Email, Password, FirstName, LastName, COUNTRY) VALUES('$email', '$password', '$firstname', '$lastname', '$country');";

			$result = mysqli_query($conn,$query);

			if($result){
				header("Location:products.php");
				$query_getID = "SELECT UserID FROM User WHERE Email=$email";
				$result_getID = mysqli_query($query);
				if ($result->num_rows > 0){
					while($row = mysqli_fetch_array($result)){
						$_SESSION['valid_user_id'] = $row['UserID'];
					}
				}
				$_SESSION['valid_user'] = $email;
				$_SESSION['SignUpCodeValue'] = 1;
			} else{
				$_SESSION['SignUpCodeValue'] = 2;
				header("Location:index.php");
			}
		}
?>

