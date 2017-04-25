<?php
	$host = "localhost";
	$db_name = "cl19-main-27r";
	$username = "cl19-main-27r";
	$password = "swcTVnk-H";
	
	/*$host = "localhost";
	$db_name = "testdb";
	$username = "root";
	$password = "";*/
 
	try {
		$txt = "connected";
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
		//echo $txt;
	}
 
	//to handle connection error
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
	}
?>