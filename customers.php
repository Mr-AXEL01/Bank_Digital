<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BANK APP - Customer List</title>
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

    <!-- Customer List Section -->
    <section class="container mx-auto my-8 min-h-[75vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">Customer List</h2>
        
        <!-- Add button to navigate to add customer page -->
        <a href="add_customer.php" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Add Customer</a>
        
        <!-- Customer table -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">ID</th>
                    <th class="py-2 px-4 border-b text-center">Name</th>
                    <th class="py-2 px-4 border-b text-center">Email</th>
                    <th class="py-2 px-4 border-b text-center">Nationality</th>
                    <th class="py-2 px-4 border-b text-center">Gender</th>
                    <th class="py-2 px-4 border-b text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch and loop through your customer data from the database
                    $result = $conn->query("SELECT * FROM customers");

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['id'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['name'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['email'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['nationality'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['gender'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>
                                <a href='update_customer.php?id=" . $row['id'] . "' class='bg-green-500 text-white py-1 px-2 mx-1'>Update</a>
                                <a href='account.php?id=" . $row['id'] . "' class='bg-blue-500 text-white py-1 px-2 mx-1'>See More</a>
                              </td>";
                        echo "</tr>";
                    }

                    // Close the result set
                    $result->close();
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
