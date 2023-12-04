<?php
// Setting connection
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "yasheshkumar200522600";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
