<?php
session_start();
require_once 'UserController.php';

$userController = new UserController();
$userController->handleLogin(); // Panggil handleLogin untuk menangani login saat form disubmit
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan FTI ITERA</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-400 flex items-center justify-center min-h-screen relative">
    <nav class="absolute top-4 right-3 py-4 my-0">
        <ul class="flex justify-end space-x-6">
            <li><a href="index.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Kembali</a></li>
            <li><a href="login_admin.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Login Admin</a></li>
        </ul>
    </nav>
    <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-md m-10">
        <?php if (isset($_GET['status'])): ?>
            <div class="mb-4">
                <?php if ($_GET['status'] === 'success'): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Selamat Datang!</strong>
                        <span class="block sm:inline">Login berhasil.</span>
                    </div>
                <?php elseif ($_GET['status'] === 'error'): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">Username atau password salah.</span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-center text-2xl font-bold mb-6">Login Pengguna Perpustakaan FTI ITERA</h2>

        <form id="loginForm" action="login.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg">Login</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
