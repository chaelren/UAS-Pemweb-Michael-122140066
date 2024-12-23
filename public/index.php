<?php
session_start();
require_once 'UserController.php';

$userController = new UserController();
$userController->handleFormSubmission();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Perpustakaan FTI ITERA</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-400 flex items-center justify-center min-h-screen relative px-6">
    <nav class="absolute top-5 right-3 py-0 mb-12">
        <ul class="flex justify-end space-x-6">
            <li><a href="login.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Login</a></li>
            <li><a href="login_admin.php" class="hover:bg-blue-800 px-4 py-2 rounded transition bg-blue-600">Login Admin</a></li>
        </ul>
    </nav>
    <div class="w-full max-w-md px-6 py-8 my-10 inline-block bg-white rounded-lg shadow-md m-10 mt-20">
        <?php if (isset($_GET['status'])): ?>
            <div class="mb-4">
                <?php if ($_GET['status'] === 'success'): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">Pendaftaran Anda telah berhasil.</span>
                    </div>
                <?php elseif ($_GET['status'] === 'error'): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">Terjadi kesalahan. Silakan coba lagi.</span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-center text-2xl font-bold mb-6">Formulir Pendaftaran Perpustakaan FTI ITERA</h2>
        <div class="bg-blue-500 text-white text-center py-2 rounded mb-6">
            <marquee><p class="mb-0">Selamat Datang di Formulir Pendaftaran Perpustakaan FTI ITERA</p></marquee>
        </div>
        <form id="registrationForm" action="index.php" method="POST">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700 font-medium mb-2">NIM</label>
                <input type="text" id="nim" name="nim" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="programStudi" class="block text-gray-700 font-medium mb-2">Program Studi</label>
                <select id="programStudi" name="programStudi" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="" disabled selected>Pilih Program Studi</option>
                    <option>Rekayasa Instrumentasi dan Automasi</option>
                    <option>Rekayasa Kehutanan</option>
                    <option>Rekayasa Keolahragaan</option>
                    <option>Rekayasa Kosmetik</option>
                    <option>Rekayasa Minyak dan Gas</option>
                    <option>Teknik Biomedis</option>
                    <option>Teknik Biosistem</option>
                    <option>Teknik Elektro</option>
                    <option>Teknik Fisika</option>
                    <option>Teknik Geofisika</option>
                    <option>Teknologi Industri Pertanian</option>
                    <option>Teknik Telekomunikasi</option>
                    <option>Teknik Sistem Energi</option>
                    <option>Teknik Pertambangan</option>
                    <option>Teknik Mesin</option>
                    <option>Teknik Material</option>
                    <option>Teknik Kimia</option>
                    <option>Teknik Informatika</option>
                    <option>Teknik Industri</option>
                    <option>Teknik Geologi</option>
                    <option>Teknologi Pangan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg">Daftar</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
