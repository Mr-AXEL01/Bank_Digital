<?php
require_once('db_connection.php');

// Fetch all transactions data from the database
$transactionsResult = $conn->query("SELECT * FROM transactions");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BANK APP - All Transactions</title>
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

    <!-- All Transactions Section -->
    <section class="container mx-auto my-8 min-h-[80vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">All Transactions</h2>

        <!-- Display all transactions information -->
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
                while ($transaction = $transactionsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['id'] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['amount'] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $transaction['type'] . "</td>";
                    echo "</tr>";
                }
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
