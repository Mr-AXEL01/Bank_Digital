<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bankDigital";

// Creating a connection for our database
$conn = new mysqli($servername, $username, $password);

// Checking our connection.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Select the database
$conn->select_db($dbname);

// Do not close the connection here; let the including script close it.
// $conn->close();
?>
