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

// Drop the existing database
$dropDatabaseSql = "DROP DATABASE IF EXISTS $dbname";
if ($conn->query($dropDatabaseSql) === TRUE) {
    // echo "Database dropped successfully";
} else {
    // echo "Error dropping database: " . $conn->error;
}

// Create a new database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully";
} else {
    // echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Check if the customers table exists
$tableCheckSql = "SHOW TABLES LIKE 'customers'";
$tableCheckResult = $conn->query($tableCheckSql);

if ($tableCheckResult->num_rows == 0) {
    // Create customers table if it doesn't exist
    $createTableSql = "CREATE TABLE customers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        nationality VARCHAR(50),
        gender VARCHAR(10),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSql) === TRUE) {
        // echo "Customers table created successfully";
        
        // Insert sample data into the customers table (only if the table is created for the first time)
        $insertDataSql = "INSERT INTO customers (name, email, nationality, gender) VALUES
            ('Rayan Fiache', 'rayan@example.com', 'Morocco', 'Male'),
            ('Jane Doe', 'jane@example.com', 'Canada', 'Female')";

        if ($conn->query($insertDataSql) === TRUE) {
            // echo "Sample data inserted successfully";
        } else {
            echo "Error inserting sample data: " . $conn->error;
        }
    } else {
        echo "Error creating customers table: " . $conn->error;
    }
}

// Do not close the connection here; let the including script close it.
// $conn->close();
?>
