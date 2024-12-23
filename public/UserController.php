<?php
require_once 'DatabaseHandler.php';
require_once 'User.php';

class UserController {
    private $db;

    // Konstruktor untuk membuat objek pengendali
    public function __construct() {
        $this->db = new DatabaseHandler("localhost", "root", "", "perpustakaan_fti");
    }

    // Fungsi untuk menangani login pengguna
    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Set cookie dengan data form
            setcookie('username', $username, time() + (86400 * 7), "/"); // Cookie berlaku 7 hari
            // Ambil data pengguna dari database berdasarkan username
            $users = $this->db->getAllUsers();
            foreach ($users as $userData) {
                // Jika username ditemukan, periksa password
                if ($userData['username'] === $username && password_verify($password, $userData['password'])) {
                    // Set session pengguna
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $userData['role']; // Simpan role

                    // Redirect berdasarkan role pengguna
                    if ($_SESSION['role'] === 'admin') {
                        header("Location: admin_dashboard.php");
                    } else {
                        header("Location: dashboard.php");
                    }
                    exit();
                }
            }

            // Gagal login jika username atau password tidak cocok
            header('Location: login.php?status=error');
            exit();
        }
    }

   // Fungsi untuk menangani login admin
   public function handleAdminLogin($username, $password) {
    // Tentukan username dan password untuk admin
    $adminUsername = 'admin';
    $adminPassword = 'admin'; // Ganti dengan password yang sudah di-hash jika diperlukan

    // Periksa apakah username dan password sesuai dengan admin
    if ($username === $adminUsername && $password === $adminPassword) {
        // Jika login berhasil, simpan username dalam session
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    }

    // Jika login gagal
    return 'error'; // Login gagal
}

    // Fungsi untuk menangani pengiriman formulir
    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama']);
            $nim = trim($_POST['nim']);
            $programStudi = trim($_POST['programStudi']);
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);

            // Validasi password
            if ($password !== $confirmPassword) {
                header("Location: index.php?status=error");
                exit;
            }

            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Mendapatkan IP dan Browser
            $ip = $_SERVER['REMOTE_ADDR'];
            $browser = $_SERVER['HTTP_USER_AGENT'];

            // Default role untuk pengguna biasa
            $role = 'user'; // Anda dapat menambahkan opsi untuk memilih role di formulir registrasi jika diperlukan

            // Membuat objek User
            $user = new User($nama, $nim, $programStudi, $username, $email, $passwordHash, $ip, $browser);

            // Simpan data pengguna ke database
            if ($this->db->saveUser($user)) {
                header("Location: index.php?status=success");
            } else {
                header("Location: index.php?status=error");
            }

            // Set cookie dengan data form
            setcookie('nama', $nama, time() + (86400 * 7), "/"); // Cookie berlaku 7 hari
            setcookie('programStudi', $programStudi, time() + (86400 * 7), "/");

            exit;
        }
    }

    // Fungsi untuk logout pengguna
    public function handleLogout() {
        // Hancurkan session yang ada
        session_start(); // Memastikan session dimulai sebelum dihapus
        session_unset(); // Menghapus semua data session
        session_destroy(); // Menghancurkan session

        // Redirect pengguna ke halaman login
        header("Location: login.php");
        exit();
    }

    public function handleLogoutAdmin() {
        // Hancurkan session yang ada
        session_start(); // Memastikan session dimulai sebelum dihapus
        session_unset(); // Menghapus semua data session
        session_destroy(); // Menghancurkan session

        // Redirect pengguna ke halaman login
        header("Location: login_admin.php");
        exit();
    }

    // Fungsi untuk menyimpan cookie
    private function setCookieCustom($name, $value, $expiry = 3600) {
        setcookie($name, $value, time() + $expiry, "/");
    }

    // Fungsi untuk membaca cookie
    public function getCookieCustom($name) {
        return isset($_COOKIE[$name]) ? json_decode($_COOKIE[$name], true) : null;
    }

    // Fungsi untuk menghapus cookie
    public function deleteCookieCustom($name) {
        setcookie($name, '', time() - 3600, "/");
    }

    // Fungsi untuk membaca data pengguna dari cookie
    public function displayUserDataFromCookie() {
        $userData = $this->getCookieCustom('user');
        if ($userData) {
            echo "<h3>Data Pengguna dari Cookie:</h3>";
            echo "<p>Nama: " . htmlspecialchars($userData['nama']) . "</p>";
            echo "<p>NIM: " . htmlspecialchars($userData['nim']) . "</p>";
            echo "<p>Program Studi: " . htmlspecialchars($userData['programStudi']) . "</p>";
            echo "<p>Username: " . htmlspecialchars($userData['username']) . "</p>";
            echo "<p>Email: " . htmlspecialchars($userData['email']) . "</p>";
            echo "<p>IP Address: " . htmlspecialchars($userData['ip']) . "</p>";
            echo "<p>Browser: " . htmlspecialchars($userData['browser']) . "</p>";
        } else {
            echo "<p>Data pengguna belum tersedia di cookie.</p>";
        }
    }
}
?>
