<?php
require_once('db_connection.php');

// Check if the account ID is provided in the URL
if (isset($_GET['id'])) {
    $accountId = $_GET['id'];

    // Fetch account data from the database
    $accountResult = $conn->query("SELECT * FROM accounts WHERE id = $accountId");

    if ($accountResult->num_rows > 0) {
        $accountData = $accountResult->fetch_assoc();

        // Fetch customer data associated with the account
        $customerResult = $conn->query("SELECT * FROM customers WHERE id = {$accountData['customer_id']}");
        $customerData = $customerResult->fetch_assoc();

        // Fetch transactions associated with the account
        $transactionsResult = $conn->query("SELECT * FROM transactions WHERE account_id = $accountId");

        // Check if the query was successful
        if ($transactionsResult === false) {
            echo "Error fetching transactions: " . $conn->error;
        }
    } else {
        // Redirect to the customers page if the account with the given ID is not found
        header("Location: customers.php");
        exit();
    }

    // Close the result sets
    $accountResult->close();
    $customerResult->close();
} else {
    // Redirect to the customers page if no account ID is provided
    header("Location: customers.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BANK APP - Account Transactions</title>
</head>
<body class="m-0 p-0 box-border">

    <nav class="flex justify-around items-center h-20 bg-slate-800 text-white">
        <a href="index.php" class="navbar-logo text-4xl font-bold">A-Bank</a>
        <ul class="flex justify-around items-center h-full w-[30%]">
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="./customers.php" class="text-xl flex items-center h-full">Customers</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="view_account.php" class="text-xl flex items-center h-full">Account</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="view_transaction.php" class="text-xl flex items-center h-full">Transaction</a>
            </li>
        </ul>
    </nav>

    <!-- Account Transactions Section -->
    <section class="container mx-auto my-8 min-h-[80vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">Account Transactions</h2>
        <div class="sub_container flex justify-between">
            <div class="btn flex items-center">
                <!-- Add button to add a new transaction -->
                <a href="add_transaction.php?accountId=<?php echo $accountId; ?>" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Add Transaction</a>
            </div>
            
            <!-- Display account and customer information -->
            <div class="bg-white py-4 px-4 w-[30%] h-25 flex flex-wrap border border-gray-300">
                <p class="m-2"><strong>Account ID:</strong> <?php echo $accountData['id']; ?></p>
                <p class="m-2"><strong>RIB:</strong> <?php echo $accountData['rib']; ?></p>
                <p class="m-2"><strong>Balance:</strong> <?php echo $accountData['balance']; ?></p>
                <p class="m-2"><strong>Currency:</strong> <?php echo $accountData['currency']; ?></p>
                
                <!-- Display customer information -->
                <p class="m-2"><strong>Customer ID:</strong> <?php echo $customerData['id']; ?></p>
                <p class="m-2"><strong>Name:</strong> <?php echo $customerData['name']; ?></p>
                <p class="m-2"><strong>Email:</strong> <?php echo $customerData['email']; ?></p>
                <p class="m-2"><strong>Nationality:</strong> <?php echo $customerData['nationality']; ?></p>
                <p class="m-2"><strong>Gender:</strong> <?php echo $customerData['gender']; ?></p>
            </div>
        </div>
        <!-- Display transactions associated with the account -->
        <table class="min-w-full mt-7 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Transaction ID</th>
                    <th class="py-2 px-4 border-b text-center">Amount</th>
                    <th class="py-2 px-4 border-b text-center">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are transaction
                    while ($transaction = $transactionsResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['id'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['amount'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['type'] . "</td>";
                        echo "</tr>";
                    }

                // Close the result set
                $transactionsResult->close();
                ?>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer class="text-center p-4 bg-slate-800 text-white">
        <p>&copy; 2023 Bank App</p>
    </footer>
</body>
</html>
