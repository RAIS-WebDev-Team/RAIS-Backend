<?php
// config.php - Database Connection

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raisdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, stop the script and display an error.
    die("Connection failed: " . $conn->connect_error);
}
?>
