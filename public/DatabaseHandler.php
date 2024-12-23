<?php
class DatabaseHandler {
    private $conn;

    // Konstruktor untuk membuat koneksi ke database
    public function __construct($host, $user, $password, $dbname) {
        $this->conn = new mysqli($host, $user, $password, $dbname);
        
        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    // Fungsi untuk menyimpan data pengguna ke dalam database
    public function saveUser($user) {
        $stmt = $this->conn->prepare("INSERT INTO pendaftaran (nama, nim, programStudi, username, email, password, ip, browser) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", 
            $user->getNama(), 
            $user->getNim(), 
            $user->getProgramStudi(), 
            $user->getUsername(), 
            $user->getEmail(), 
            $user->getPasswordHash(), 
            $user->getIp(), 
            $user->getBrowser()
        );

        return $stmt->execute();
    }

    // Fungsi untuk memeriksa login
    public function checkLogin($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM pendaftaran WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Cek apakah user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Fungsi untuk memeriksa login admin
    // Fungsi untuk memeriksa login admin
    public function checkAdminLogin($username, $password) {
        // Query untuk memeriksa login admin di tabel admin_login
        $stmt = $this->conn->prepare("SELECT * FROM admin_login WHERE username = ? AND password = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Cek apakah user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Menambahkan fungsi untuk mendapatkan data pengajuan dari tabel pengajuan
    public function getAllPengajuan() {
        $result = $this->conn->query("SELECT * FROM pengajuan");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi untuk mendapatkan semua pengguna dari database
    public function getAllUsers() {
        $result = $this->conn->query("SELECT * FROM pendaftaran");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Menutup koneksi database saat objek dihancurkan
    public function __destruct() {
        $this->conn->close();
    }
}
?>
