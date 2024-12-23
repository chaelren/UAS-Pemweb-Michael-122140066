<?php
require_once 'DatabaseHandler.php';
session_start();

// Pastikan user login terlebih dahulu
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Cek apakah ID diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Koneksi ke database
    $host = 'localhost';  // Ganti dengan host Anda
    $user = 'root';       // Ganti dengan username database Anda
    $password = '';       // Ganti dengan password database Anda
    $dbname = 'perpustakaan_fti';  // Nama database Anda

    $dbHandler = new DatabaseHandler($host, $user, $password, $dbname);
    $conn = $dbHandler->getConnection();

    // Query untuk mengambil data pengajuan berdasarkan ID
    $query = "SELECT * FROM pengajuan WHERE id = ?";
    
    // Menyiapkan statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Jika data ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $judul_buku = $row['judul_buku'];
            $durasi = $row['durasi'];
            $tanggal_pengajuan = $row['tanggal_pengajuan'];
        } else {
            // Jika data tidak ditemukan
            die("Data tidak ditemukan.");
        }
    } else {
        die("Query gagal.");
    }

    // Proses pembaruan data pengajuan
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul_buku = $_POST['judul_buku'];
        $durasi = $_POST['durasi'];
        $tanggal_pengajuan = $_POST['tanggal_pengajuan'];

        // Query untuk memperbarui data pengajuan
        $update_query = "UPDATE pengajuan SET judul_buku = ?, durasi = ?, tanggal_pengajuan = ? WHERE id = ?";
        
        if ($stmt = $conn->prepare($update_query)) {
            $stmt->bind_param("sssi", $judul_buku, $durasi, $tanggal_pengajuan, $id);
            if ($stmt->execute()) {
                // Redirect ke halaman data_pengajuan setelah berhasil update
                header("Location: data_pengajuan.php");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        }
    }
} else {
    echo "ID tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan Peminjaman Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100">
    <a href="data_pengajuan.php" class="flex top-4 left-4 m-2 bg-blue-500 text-white p-2 w-32 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Data Pengajuan</a>
    <div class="max-w-7xl mx-auto p-6 mt-10 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Edit Pengajuan Peminjaman Buku</h1>

        <form method="POST" action="" class="space-y-4">
            <div class="mb-4">
                <label for="judul_buku" class="block text-sm font-semibold text-gray-700">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" value="<?= htmlspecialchars($judul_buku) ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="durasi" class="block text-sm font-semibold text-gray-700">Durasi (hari)</label>
                <input type="number" id="durasi" name="durasi" value="<?= htmlspecialchars($durasi) ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_pengajuan" class="block text-sm font-semibold text-gray-700">Tanggal Pengajuan</label>
                <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" value="<?= htmlspecialchars($tanggal_pengajuan) ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div>
                <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Pengajuan</button>
            </div>
        </form>
    </div>

</body>

</html>
