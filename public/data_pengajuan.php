<?php
// Mengimpor file koneksi
require_once 'DatabaseHandler.php';
session_start();

// Pastikan user login terlebih dahulu
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Konfigurasi koneksi database
$host = 'localhost';  // Ganti dengan host Anda
$user = 'root';       // Ganti dengan username database Anda
$password = '';       // Ganti dengan password database Anda
$dbname = 'perpustakaan_fti';  // Nama database Anda

// Membuat objek DatabaseHandler untuk koneksi
$dbHandler = new DatabaseHandler($host, $user, $password, $dbname);

// Koneksi database
$conn = $dbHandler->getConnection();

// Query untuk mengambil data pengajuan
$query = "SELECT pengajuan.id, pengajuan.judul_buku, pengajuan.durasi, pengajuan.tanggal_pengajuan, pengajuan.status, pengajuan.pesan_admin
          FROM pengajuan";
$result = $conn->query($query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan Peminjaman Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-400">
    
    <div class="max-w-7xl mx-auto p-6 mt-10 relative bg-white rounded-lg shadow-lg">
        <div class="absolute right-4">
            <a href="dashboard.php" class=" bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Dashboard</a>
            <a href="login_admin.php" class=" bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Login Admin</a>
        </div>
        <h1 class="text-2xl font-semibold mb-6">Data Pengajuan Peminjaman Buku</h1>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="px-4 py-2 text-left">Judul Buku</th>
                    <th class="px-4 py-2 text-left">Durasi (hari)</th>
                    <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Pesan Admin</th>
                    <th class="px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='border-b'>";
                        echo "<td class='px-4 py-2'>" . htmlspecialchars($row['judul_buku']) . "</td>";
                        echo "<td class='px-4 py-2'>" . htmlspecialchars($row['durasi']) . "</td>";
                        echo "<td class='px-4 py-2'>" . htmlspecialchars($row['tanggal_pengajuan']) . "</td>";
                        echo "<td class='px-4 py-2'>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td class='px-4 py-2'>" . htmlspecialchars($row['pesan_admin']) . "</td>";
                        echo "<td class='px-4 py-2'>
                                <a href='edit_pengajuan.php?id=" . $row['id'] . "' class='text-blue-600 hover:text-blue-800'>Edit</a> | 
                                <a href='hapus_pengajuan.php?id=" . $row['id'] . "' class='text-red-600 hover:text-red-800' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='px-4 py-2 text-center'>Tidak ada pengajuan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
