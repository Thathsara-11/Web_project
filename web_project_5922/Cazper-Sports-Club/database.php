<?php
// Database connection parameters
$servername = "localhost";  // Change to your server name
$username = "root";  // Change to your database username
$password = "";  // Change to your database password
$dbname = "cazper_sports_club";  // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>