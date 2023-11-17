<?php
require_once('db_connection.php');

// Fetch all accounts data from the database
$accountsResult = $conn->query("SELECT * FROM accounts");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BANK APP - All Accounts</title>
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

    <!-- All Accounts Section -->
    <section class="container mx-auto my-8 min-h-[80vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">All Accounts</h2>

        <!-- Display all accounts information -->
        <table class="min-w-full mt-7 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Account ID</th>
                    <th class="py-2 px-4 border-b text-center">RIB</th>
                    <th class="py-2 px-4 border-b text-center">Balance</th>
                    <th class="py-2 px-4 border-b text-center">Currency</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($account = $accountsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $account['id'] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $account['rib'] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $account['balance'] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-center'>" . $account['currency'] . "</td>";
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
