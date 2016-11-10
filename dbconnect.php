<?php
$servername = "localhost";
$username = "cl19-main-27r";
$password = "swcTVnk-H";
$database = "cl19-main-27r";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>