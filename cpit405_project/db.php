<?php

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cpit";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

