<!-- creating a php connecting database file (ok so explain it for me to handl database connection from one separate file)  -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bank_Digital";

// creating a connection for our database
$conn = new mysqli($servername, $username, $password);

// ckecking our connectin .
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_eroor);
}



?>