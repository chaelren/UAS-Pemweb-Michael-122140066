<?php
session_start();
require_once 'UserController.php';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buat objek UserController dan coba login sebagai admin
    $userController = new UserController();
    $status = $userController->handleAdminLogin($username, $password);

    // Jika login berhasil
    if ($status === 'success') {
        $loginStatus = 'success';
    } else {
        $loginStatus = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Perpustakaan FTI ITERA</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-400 flex items-center justify-center min-h-screen relative">
    <nav class="absolute top-4 right-3 py-4 my-0">
        <ul class="flex justify-end space-x-6">
            <li><a href="login.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Login</a></li>
            <li><a href="login_admin.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Login Admin</a></li>
        </ul>
    </nav>

    <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-md m-10">
        <?php if (isset($loginStatus)): ?>
            <div class="mb-4">
                <?php if ($loginStatus === 'success'): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Login Berhasil!</strong>
                        <span class="block sm:inline">Anda berhasil login sebagai Admin.</span>
                    </div>
                <?php else: ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Login Gagal!</strong>
                        <span class="block sm:inline">Username atau password salah.</span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-center text-2xl font-bold mb-6">Login Admin</h2>
        <form action="login_admin.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg">Login</button>
        </form>
    </div>
</body>
</html>
