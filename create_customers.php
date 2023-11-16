<?php

require_once 'db_connection.php';
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
        // Insert sample data into the customers table (only if the table is created for the first time)
        $insertDataSql = "INSERT INTO customers (name, email, nationality, gender) VALUES
            ('yassine', 'rayan@example.com', 'Morocco', 'Male'),
            ('sina Doe', 'jane@example.com', 'Canada', 'Female')";

        if ($conn->query($insertDataSql) === TRUE) {
            // echo "Sample data inserted successfully";
        } else {
            echo "Error inserting sample data: " . $conn->error;
        }
    } else {
        echo "Error creating customers table: " . $conn->error;
    }
}else{
    $insertDataSql = "INSERT INTO customers (name, email, nationality, gender) VALUES
    ('Rayan Fiache', 'rayan@example.com', 'Morocco', 'Male'),
    ('Jane Doe', 'jane@example.com', 'Canada', 'Female')";

if ($conn->query($insertDataSql) === TRUE) {
    echo "Sample data inserted successfully";
} else {
    echo "Error inserting sample data: " . $conn->error;
}
}   
?>