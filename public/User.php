<?php
class User {
    private $nama;
    private $nim;
    private $programStudi;
    private $username;
    private $email;
    private $passwordHash;
    private $ip;
    private $browser;

    // Konstruktor untuk mendefinisikan objek pengguna
    public function __construct($nama, $nim, $programStudi, $username, $email, $passwordHash, $ip, $browser) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->programStudi = $programStudi;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->ip = $ip;
        $this->browser = $browser;
    }

    // Getter untuk setiap atribut
    public function getNama() {
        return $this->nama;
    }

    public function getNim() {
        return $this->nim;
    }

    public function getProgramStudi() {
        return $this->programStudi;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function getIp() {
        return $this->ip;
    }

    public function getBrowser() {
        return $this->browser;
    }
}
?>
