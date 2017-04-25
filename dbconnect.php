<?php

$servername = "localhost";
$username = "cl19-main-27r";
$password = "swcTVnk-H";
$database = "cl19-main-27r";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// make the current db
$db_selected = mysqli_select_db($conn, $database);
if (!$db_selected) {
    die ('Can\'t use that database : ' . mysql_error());
}

?>