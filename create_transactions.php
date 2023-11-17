<?php
require_once('db_connection.php');

// Check if the transactions table exists
$tableCheckSql = "SHOW TABLES LIKE 'transactions'";
$tableCheckResult = $conn->query($tableCheckSql);

if ($tableCheckResult->num_rows === 0) {
    // Create transactions table if it doesn't exist
    $createTableSql = "CREATE TABLE transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        amount DECIMAL(10,2) NOT NULL,
        type VARCHAR(10) NOT NULL,
        account_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (account_id) REFERENCES accounts(id)
    )";

    if ($conn->query($createTableSql) === TRUE) {
        echo "Transactions table created successfully";
    } else {
        echo "Error creating transactions table: " . $conn->error;
    }
}

try {
    // Insert sample transaction data into the transactions table
    $insertTransactionSql = "INSERT INTO transactions (amount, type, account_id) VALUES
        -- (120.00, 'debit', 10),
        (200.00, 'credit', 1)";// dont forget to change the id in the update balace bellow 

    if ($conn->query($insertTransactionSql) === TRUE) {
        echo "Sample transaction data inserted successfully";

        // Update account balances based on transactions
        // $updateBalancesSql = "UPDATE accounts 
        //                       SET balance = balance - (SELECT amount FROM transactions WHERE type = 'debit' AND account_id = 3)
        //                       WHERE id = 3";

        // if ($conn->query($updateBalancesSql) === TRUE) {
        //     echo "Account balances updated successfully";
        // } else {
        //     throw new Exception("Error updating account balances: " . $conn->error);
        // }

        $updateBalancesSql = "UPDATE accounts 
                              SET balance = balance + (SELECT amount FROM transactions WHERE type = 'credit' AND account_id = 1)
                              WHERE id = 1";

        if ($conn->query($updateBalancesSql) === TRUE) {
            echo "Account balances updated successfully";
        } else {
            throw new Exception("Error updating account balances: " . $conn->error);
        }
    } else {
        throw new Exception("Error inserting sample transaction data: " . $conn->error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
