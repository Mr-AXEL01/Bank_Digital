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
    <section class="hero flex flex-col justify-around items-center h-[86vh] bg-[url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/First_Bank_of_the_United_States%2C_Philadelphia%2C_Pennsylvania_LCCN2011633532_%28edited%29.jpg/800px-First_Bank_of_the_United_States%2C_Philadelphia%2C_Pennsylvania_LCCN2011633532_%28edited%29.jpg')] bg-no-repeat bg-cover bg-center">
        <h1 class="text-8xl pb-6  font-bold text-blue-100">Welcome to Bank Digital</h1>
        <div class="text_cont bg-black bg-opacity-40 rounded-3xl font-semibold flex justify-center w-1/2">
        <p class="welcome_text text-center w-full text-3xl p-2 text-slate-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, fugit, tenetur, id dolore repudiandae quis expedita soluta amet aliquam rerum quidem! Quis maiores, dolorem natus error atque ullam alias labore!</p>
        </div>
    </section>
    <footer class="text-center p-4 bg-slate-800 text-white">
        <p>&copy; 2023 Bank App</p>
    </footer>
</body>
</html>