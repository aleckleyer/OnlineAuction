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
			$Country = $_POST['Country'];
			
			if ($count > 0){
				echo "Username already exists!";
			} 

			$query = "INSERT INTO User(Email, password, FirstName, LastName, Country) VALUES('$email', '$password', '$firstname', '$lastname', '$Country')";

			$result = mysql_query($query);

			if($result){
				$_SESSION['SignUpCodeValue'] = 1;
				header("Location:products.php");
			} else{
				$_SESSION['SignUpCodeValue'] = 2;
				header("Location:index.php");
			}
		}
?>