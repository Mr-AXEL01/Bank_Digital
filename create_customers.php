<?php

require_once('db_connection.php');

// Check if the customers table exists
$tableCheckSql = "SHOW TABLES LIKE 'customers'";
$tableCheckResult = $conn->query($tableCheckSql);

if ($tableCheckResult->num_rows === 0) {
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
        echo "Customers table created successfully";
    } else {
        echo "Error creating customers table: " . $conn->error;
    }
}

try {
    $insertDataSql = "INSERT INTO customers (name, email, nationality, gender) VALUES
        ('yassine walid', 'walid@example.com', 'Morocco', 'Male')";
    $response = $conn->query($insertDataSql);

    if ($response === TRUE) {
        $newCustomerId = $conn->insert_id;
        echo $newCustomerId;
        echo "Sample data inserted successfully";
        require_once('create_accounts.php');
    } else {
        echo "Error inserting sample data: " . $conn->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
