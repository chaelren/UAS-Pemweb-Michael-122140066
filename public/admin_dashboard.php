<?php
session_start();
require_once 'UserController.php';
$userController = new UserController();

if (isset($_POST['logout'])) {
    $userController->handleLogoutAdmin();
}

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Koneksi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "perpustakaan_fti";
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses aksi admin (Setujui/Tolak)
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $action = $_POST['action'];
    $pesan_admin = $conn->real_escape_string($_POST['pesan_admin'] ?? '');

    // Tentukan status berdasarkan tombol yang ditekan
    if ($action === 'approve') {
        $status = 'Verified';
    } elseif ($action === 'reject') {
        $status = 'Rejected';
    } else {
        $status = 'Pending';
    }

    // Query update
    $query = "UPDATE pengajuan SET status = '$status', pesan_admin = '$pesan_admin' WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Query Error: " . $conn->error;
        die();
    }
}

// Ambil data pengajuan
$query = "SELECT id, judul_buku, durasi, tanggal_pengajuan, status, pesan_admin FROM pengajuan";
$result = $conn->query($query);

if (!$result) {
    die("Query Gagal: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-400 font-sans leading-normal tracking-normal">
    <div class="container relative mx-auto p-4">
        <div class="absolute right-4">
            <a href="login.php" class=" bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Login User</a>
            <a href="display.php" class=" bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">Data Pendaftar</a>
        </div>
        <div>
            <form method="POST">
                <button type="submit" name="logout" class="bg-red-600 text-black py-2 px-4 rounded-lg hover:bg-red-700">Logout</button>
            </form>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Panel Admin</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Judul Buku</th>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Durasi</th>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Tanggal Pengajuan</th>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Status</th>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Pesan Admin</th>
                        <th class="px-5 py-3 bg-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($row['judul_buku']); ?></td>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($row['durasi']); ?> hari</td>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($row['tanggal_pengajuan']); ?></td>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($row['status']); ?></td>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?php echo htmlspecialchars($row['pesan_admin']); ?></td>
                                <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <textarea name="pesan_admin" placeholder="Pesan admin..." class="border rounded px-2 py-1 w-full"></textarea>
                                        <button name="action" value="approve" class="bg-green-500 text-white px-3 py-1 rounded">Setujui</button>
                                        <button name="action" value="reject" class="bg-red-500 text-white px-3 py-1 rounded">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
