<?php
require_once 'db_connection.php';

// Check if the accounts table exists
$tableCheckSql = "SHOW TABLES LIKE 'accounts'";
$tableCheckResult = $conn->query($tableCheckSql);


if ($tableCheckResult->num_rows == 0) {
    // Create accounts table if it doesn't exist
    $createTableSql = "CREATE TABLE accounts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        rib VARCHAR(16) UNIQUE NOT NULL,
        balance DECIMAL(10,2) DEFAULT 0.0,
        currency VARCHAR(10),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        customer_id INT NOT NULL,  -- Add this line
        FOREIGN KEY (customer_id) REFERENCES customers(id)
    )";    


}


   
        // Insert sample account data into the accounts table
        $insertAccountSql = "INSERT INTO accounts (rib, balance, currency, customer_id) VALUES
        ('1234567890123338', 1000.00, 'USD', 8),
        ('1234567890123498', 9000.00, 'MAD', 9)";
        
        
        if ($conn->query($insertAccountSql) === TRUE) {
            echo "Sample account data inserted successfully";
        } else {
            echo "Error inserting sample account data: " . $conn->error;
        }
        
 

?>