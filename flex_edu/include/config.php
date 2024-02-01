<?php
// Define your database connection parameters
$servername = "localhost"; // Change this to your database server hostname or IP address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "flex_edu";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>