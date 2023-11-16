<?php
include 'db_connection.php';

// Check if the customer ID is provided in the URL
if(isset($_GET['id'])) {
    $customerId = $_GET['id'];

    // Fetch customer data from the database
    $result = $conn->query("SELECT * FROM customers WHERE id = $customerId");

    if ($result->num_rows > 0) {
        $customerData = $result->fetch_assoc();
    } else {
        // Redirect to the customers page if the customer with the given ID is not found
        header("Location: customers.php");
        exit();
    }

    // Close the result set
    $result->close();
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
    <section class="container mx-auto my-8 min-h-[75vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">Customer Accounts</h2>
        
        <!-- Display customer information -->
        <div class="bg-white p-4 border border-gray-300">
            <p><strong>ID:</strong> <?php echo $customerData['id']; ?></p>
            <p><strong>Name:</strong> <?php echo $customerData['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $customerData['email']; ?></p>
            <p><strong>Nationality:</strong> <?php echo $customerData['nationality']; ?></p>
            <p><strong>Gender:</strong> <?php echo $customerData['gender']; ?></p>
        </div>

        <!-- Add button to add a new account -->
        <a href="add_account.php?customerId=<?php echo $customerId; ?>" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Add Account</a>

    </section>

    <!-- Footer -->
    <footer class="text-center p-4 bg-slate-800 text-white">
        <p>&copy; 2023 Bank App</p>
    </footer>
</body>
</html>
