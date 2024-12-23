<?php
require_once 'DatabaseHandler.php';

$db = new DatabaseHandler("localhost", "root", "", "perpustakaan_fti");
$users = $db->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-400 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-7xl bg-white rounded-lg shadow-md p-8">
        <a href="index.php" class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Kembali</a>
        <h2 class="text-3xl font-bold text-center mb-6">Data Pendaftaran</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">NIM</th>
                        <th class="border border-gray-300 px-4 py-2">Program Studi</th>
                        <th class="border border-gray-300 px-4 py-2">Username</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Password</th>
                        <th class="border border-gray-300 px-4 py-2">Alamat IP</th>
                        <th class="border border-gray-300 px-4 py-2">Jenis Browser</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['nama']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['nim']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['programStudi']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['username']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['password']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['ip']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['browser']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center border border-gray-300 px-4 py-2 text-red-500">
                                Tidak ada data yang tersedia.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
