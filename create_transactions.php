<?php
require_once('db_connection.php');



// Check if the transactions table exists
$tableCheckSql = "SHOW TABLES LIKE 'transactions'";
$tableCheckResult = $conn->query($tableCheckSql);

if ($tableCheckResult->num_rows === 0) {
    // Create transactions table if it doesn't exist
    $createTableSql = "CREATE TABLE transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        account_id INT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        type VARCHAR(10) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (account_id) REFERENCES accounts(id)
    )";

    
}

     // Insert sample transaction data into the transactions table
     $insertTransactionSql = "INSERT INTO transactions (account_id, amount, type) VALUES
     (1, 500.00, 'Deposit'),
     (2, 200.50, 'Withdrawal'),
     (3, 100.00, 'Deposit')";

 if ($conn->query($insertTransactionSql) === TRUE) {
     echo "Sample transaction data inserted successfully";
 } else {
     echo "Error inserting sample transaction data: " . $conn->error;
 }
?>