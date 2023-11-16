<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bank_Digital";

// Creating a connection for our database
$conn = new mysqli($servername, $username, $password);

// Checking our connection.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// select our database 
$conn->select_db($dbname);

// Create customers table if not exists
$sql = "CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nationality VARCHAR(50),
    gender VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


?>
