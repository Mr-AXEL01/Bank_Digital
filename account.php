<?php
require_once('db_connection.php');


// Check if the customer ID is provided in the URL
if (isset($_GET['id'])) {
    $customerId = $_GET['id'];

    // Fetch customer data from the database
    $customerResult = $conn->query("SELECT * FROM customers WHERE id = $customerId");

    if ($customerResult->num_rows > 0) {
        $customerData = $customerResult->fetch_assoc();

        // Fetch accounts associated with the customer
        $accountsResult = $conn->query("SELECT * FROM accounts WHERE customer_id = $customerId");
    } else {
        // Redirect to the customers page if the customer with the given ID is not found
        header("Location: customers.php");
        exit();
    }

    // Close the result sets
    $customerResult->close();
} else {
    // Redirect to the customers page if no customer ID is provided
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
    <title>BANK APP - Customer Account</title>
</head>
<body class="m-0 p-0 box-border">

    <nav class="flex justify-around items-center h-20 bg-slate-800 text-white">
        <a href="index.php" class="navbar-logo text-4xl font-bold">A-Bank</a>
        <ul class="flex justify-around items-center h-full w-[30%]">
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="./customers.php" class="text-xl flex items-center h-full">Customers</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="#" class="text-xl flex items-center h-full">Account</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="#" class="text-xl flex items-center h-full">Transaction</a>
            </li>
        </ul>
    </nav>

    <!-- Customer Account Details Section -->
    <section class="container mx-auto my-8 min-h-[80vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">Customer Accounts</h2>
        <div class="sub_container flex justify-between">
            <div class="btn flex items-center">
                <!-- Add button to add a new account -->
                <a href="add_account.php?customerId=<?php echo $customerId; ?>" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Add Account</a>
            </div>
            
            <!-- Display customer information -->
            <div class="bg-white py-4 px-4 w-[30%] h-25 flex flex-wrap border border-gray-300">
                <p class="m-2"><strong>ID:</strong> <?php echo $customerData['id']; ?></p>
                <p class="m-2"><strong>Name:</strong> <?php echo $customerData['name']; ?></p>
                <p class="m-2"><strong>Email:</strong> <?php echo $customerData['email']; ?></p>
                <p class="m-2"><strong>Nationality:</strong> <?php echo $customerData['nationality']; ?></p>
                <p class="m-2"><strong>Gender:</strong> <?php echo $customerData['gender']; ?></p>
            </div>
        </div>
        <!-- Display accounts associated with the customer -->
        <table class="min-w-full mt-7 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Account ID</th>
                    <th class="py-2 px-4 border-b text-center">RIB</th>
                    <th class="py-2 px-4 border-b text-center">Balance</th>
                    <th class="py-2 px-4 border-b text-center">Currency</th>
                    <th class="py-2 px-4 border-b text-center">Action</th>
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
                    echo "<td class='py-2 px-4 border-b text-center'>
                                <a href='update_account.php?id=" . $account['id'] . "' class='bg-green-500 text-white py-1 px-2 mx-1'>Update</a>
                                <a href='transaction.php?id=" . $account['id'] . "' class='bg-blue-500 text-white py-1 px-2 mx-1'>See More</a>
                              </td>";
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
