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

    if ($conn->query($createTableSql) === TRUE) {
        // Insert sample account data into the accounts table
        $insertAccountSql = "INSERT INTO accounts (rib, balance, currency, customer_id) VALUES
    ('1234567890123456', 1000.00, 'USD', 1),
    ('2345678901234567', 500.50, 'EUR', 1),
    ('3456789012345678', 200.00, 'USD', 2)";


        if ($conn->query($insertAccountSql) === TRUE) {
            // echo "Sample account data inserted successfully";
        } else {
            echo "Error inserting sample account data: " . $conn->error;
        }
    } else {
        echo "Error creating accounts table: " . $conn->error;
    }
}

// Check if the transactions table exists
$tableCheckSql = "SHOW TABLES LIKE 'transactions'";
$tableCheckResult = $conn->query($tableCheckSql);

if ($tableCheckResult->num_rows == 0) {
    // Create transactions table if it doesn't exist
    $createTableSql = "CREATE TABLE transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        account_id INT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        type VARCHAR(10) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (account_id) REFERENCES accounts(id)
    )";

    if ($conn->query($createTableSql) === TRUE) {
        // Insert sample transaction data into the transactions table
        $insertTransactionSql = "INSERT INTO transactions (account_id, amount, type) VALUES
            (1, 500.00, 'Deposit'),
            (2, 200.50, 'Withdrawal'),
            (3, 100.00, 'Deposit')";

        if ($conn->query($insertTransactionSql) === TRUE) {
            // echo "Sample transaction data inserted successfully";
        } else {
            echo "Error inserting sample transaction data: " . $conn->error;
        }
    } else {
        echo "Error creating transactions table: " . $conn->error;
    }
}

// Do not close the connection here; let the including script close it.
// $conn->close();
?>
