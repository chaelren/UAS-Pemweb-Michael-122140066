<?php
require_once 'DatabaseHandler.php';
session_start();

// Pastikan user login terlebih dahulu
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Pastikan ID diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Koneksi ke database
    $host = 'localhost';  // Ganti dengan host Anda
    $user = 'root';       // Ganti dengan username database Anda
    $password = '';       // Ganti dengan password database Anda
    $dbname = 'perpustakaan_fti';  // Nama database Anda

    $dbHandler = new DatabaseHandler($host, $user, $password, $dbname);
    $conn = $dbHandler->getConnection();

    // Query untuk menghapus data pengajuan berdasarkan ID
    $query = "DELETE FROM pengajuan WHERE id = ?";
    
    // Menyiapkan statement untuk mencegah SQL Injection
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);  // "i" untuk integer
        if ($stmt->execute()) {
            // Redirect setelah penghapusan berhasil
            header("Location: data_pengajuan.php");
        } else {
            echo "Gagal menghapus data.";
        }
    } else {
        echo "Query tidak valid.";
    }
}
?>
