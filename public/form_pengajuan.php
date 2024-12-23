<?php
require_once 'DatabaseHandler.php';
session_start();

// Pastikan user login terlebih dahulu
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['username'];

// Koneksi database
$host = 'localhost';  // Ganti dengan host Anda
$user = 'root';       // Ganti dengan username database Anda
$password = '';       // Ganti dengan password database Anda
$dbname = 'perpustakaan_fti';  // Nama database Anda

$dbHandler = new DatabaseHandler($host, $user, $password, $dbname);

// Proses pengajuan jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $judul_buku = $_POST['judul_buku'];
    $durasi = $_POST['durasi_peminjaman'];
    $tanggal_pengajuan = $_POST['tanggal_pengajuan'];

    // Query SQL untuk menyimpan data ke dalam tabel pengajuan
    $query = "INSERT INTO pengajuan (id, judul_buku, durasi, tanggal_pengajuan) VALUES (?, ?, ?, ?)";

    // Persiapkan query
    $stmt = $dbHandler->getConnection()->prepare($query);

    // Cek apakah query berhasil dipersiapkan
    if ($stmt === false) {
        // Menampilkan error jika gagal mempersiapkan query
        die('Error preparing the query: ' . $dbHandler->getConnection()->error);
    }

    // Mengikat parameter
    $stmt->bind_param("ssss", $user_id, $judul_buku, $durasi, $tanggal_pengajuan);

    // Eksekusi query
    if ($stmt->execute()) {
        header("Location: data_pengajuan.php");
        exit;
    } else {
        // Menampilkan error jika gagal mengeksekusi query
        echo "Gagal menyimpan data: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Peminjaman Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-400">
    <a href="dashboard.php" class="absolute top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Dashboard</a>
    <div class="max-w-lg mx-auto p-6 mt-10 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Ajukan Peminjaman Buku</h1>

        <form method="POST">
            <div class="mb-4">
                <label for="judul_buku" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="durasi_peminjaman" class="block text-sm font-medium text-gray-700">Durasi Peminjaman (hari)</label>
                <input type="number" id="durasi_peminjaman" name="durasi_peminjaman" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="tanggal_pengajuan" class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">Ajukan Peminjaman</button>
        </form>
    </div>

</body>

</html>
