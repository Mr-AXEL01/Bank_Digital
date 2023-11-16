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

// Creating a database if not exist.
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Let's close the connection.
$conn->close();
?>
