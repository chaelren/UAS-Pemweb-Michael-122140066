<?php
session_start();
require_once 'UserController.php';
$userController = new UserController();

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari sesi (misalnya nama pengguna)
$username = $_SESSION['username'];

if (isset($_POST['logout'])) {
    $userController->handleLogout();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan FTI ITERA</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-400">
    <div class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <nav class="bg-blue-600 p-4 text-white">
            <div class="container mx-auto flex justify-between items-center">
                <span class="text-xl font-bold">Perpustakaan FTI ITERA</span>
            </div>
            <form method="POST" class="absolute top-4 right-4">
                <button type="submit" name="logout" class="bg-red-600 text-black py-2 px-4 rounded-lg hover:bg-red-700">Logout</button>
            </form>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-semibold mb-6">Selamat datang di Perpustakaan FTI ITERA, <?php echo $username; ?>!</h1>

            <!-- Tombol Ajukan Peminjaman dan Data Pengajuan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Tombol Ajukan Peminjaman -->
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Ajukan Peminjaman Buku</h2>
                    <a href="form_pengajuan.php" class="text-white bg-blue-600 p-3 rounded-lg hover:bg-blue-700">
                        Ajukan Peminjaman
                    </a>
                </div>

                <!-- Tombol Data Pengajuan -->
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Data Pengajuan</h2>
                    <a href="data_pengajuan.php" class="text-white bg-green-600 p-3 rounded-lg hover:bg-green-700">
                        Lihat Data Pengajuan
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
