<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BANK APP</title>
</head>
<body class="m-0 p-0 box-border">
    <nav class="flex justify-around items-center h-20 bg-slate-800 text-white">
        <a href="index.php" class="navbar-logo text-4xl font-bold">A-Bank</a>
        <ul class="flex justify-around items-center h-full w-[30%]">
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="#" class="text-xl flex items-center h-full">Customers</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="#" class="text-xl flex items-center h-full">Account</a>
            </li>
            <li class="hover:bg-slate-600 p-2 h-full">
                <a href="#" class="text-xl flex items-center h-full">Transaction</a>
            </li>
        </ul>
    </nav>
    <section class="container mx-auto my-8 min-h-[75vh]">
        <h2 class="text-4xl font-semibold text-slate-800 mb-4">Customer List</h2>
        <!-- Add button -->
        <button class="bg-blue-500 text-white py-2 px-4 mb-4">Add Customer</button>
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
        <!-- Loop through customers and display rows -->
        <?php
            // You need to fetch and loop through your customer data here
            // For now, I'll provide a sample row
        ?>
        <tr>
            <td class="py-2 px-4 border-b text-center">1</td>
            <td class="py-2 px-4 border-b text-center">John Doe</td>
            <td class="py-2 px-4 border-b text-center">john@example.com</td>
            <td class="py-2 px-4 border-b text-center">USA</td>
            <td class="py-2 px-4 border-b text-center">Male</td>
            <td class="py-2 px-4 border-b text-center">
                <button class="bg-green-500 text-white py-1 px-2 mx-1">Update</button>
                <button class="bg-blue-500 text-white py-1 px-2 mx-1">See More</button>
            </td>
        </tr>
    </tbody>
</table>

    </section>
    <footer class="text-center p-4 bg-slate-800 text-white">
        <p>&copy; 2023 Bank App</p>
    </footer>
</body>
</html>
