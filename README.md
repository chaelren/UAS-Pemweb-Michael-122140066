# UAS-Pemweb-Michael-122140066
- Nama : Michael Caren Sihombing
- NIM  : 122140066
- KELAS: RA
---

# NB: Akun untuk login admin yaitu usernamae = admin dan password = admin.

---
# Penilaian dalam UAS Pemograman Web
- Client-side Programming (Bobot: 30%)
- Server-side Programming (Bobot: 30%)
- Database Management (Bobot: 20%)
- State Management (Bobot: 20%)
- Hosting Aplikasi Web (Bobot: 20%)
---

# Bagian 1: Client-side Programming
Gambar di bawah ini adalah tampilan register untuk pengguna yang belum memiliki akun:
![image](https://github.com/user-attachments/assets/3c5cb6a2-0302-4f71-b199-f03cd0059158)

Gambar dibawah ini adalah tampilan ketika pengguna berhasil mendaftar
![image](https://github.com/user-attachments/assets/f60c001e-3325-473d-8f4a-d25bf3954f90)

Gamabar Dibawah adalah contoh tampilan peringatan jika pengguna mengisi kolom tidak sesuai dengan ketentuan
![image](https://github.com/user-attachments/assets/c8ca8154-5fce-4c7e-9c69-85bd15ad5e48)

Gambar berikut adalah tampilan untuk login pengguna
![image](https://github.com/user-attachments/assets/3223ec8b-4159-4a4a-938b-3f55fae19e5d)

Gambar Berikut adalah tampilan untuk login admin
![image](https://github.com/user-attachments/assets/907f86b6-3e4f-46b1-a58a-ff81f678ce12)

Gambar berikut adalah tampilan ketika pengguna salah memasukkan username atau apassword
![image](https://github.com/user-attachments/assets/bf242949-dbea-40d5-84a9-254a7f67011b)

Gamabar dibawah ini merupakan tampilan jika pengguna ingin mengajukan peminjaman buku
![image](https://github.com/user-attachments/assets/5e1aa07b-b286-4a36-b5b8-65c0a4e007d0)

---

# Bagian 2: Server-side Programming
Gambar dibawah ini adalah untuk data peminjaman oleh user, pada bagian ini user dapat mengedit pengajuan peminjaman atau menghapus pengajuannya, disini juga akan terlihat statusnya jika admin telah memverifikasinya
![image](https://github.com/user-attachments/assets/c2b877ae-696b-474d-bf26-53192aaaa73d)

Pada bagian gambar dibawah ini merupakan tampilan dari admin, dimana pada halaman ini admin dapat menyetujui ataupun menolak pengajuan peminjaman buku oleh pengguna, disini admin juga dapat memberikan pesan kepada pengguna.
![image](https://github.com/user-attachments/assets/1aa20a96-50bd-4afb-a7d1-0c08b61d458a)

# Bagian 3: Database Management
Gambar berikut merupakan, database yang saya gunakan, yang dimana di dalamnya terdapat dua tabel yaitu pendaftaran dan pengajuan
![image](https://github.com/user-attachments/assets/2e2c32c4-f76f-4fb5-ac5b-2d3d6484392c)
![image](https://github.com/user-attachments/assets/446190ba-d2da-4537-9512-d72e65596e85)
![image](https://github.com/user-attachments/assets/63737bf8-808b-47f6-a296-d7a1dd484a97)

Gambar berikut untuk memanipulasi data
![image](https://github.com/user-attachments/assets/bb190489-3c02-4d84-8ea3-f4e681804427)

---

# Bagian 4: State Management
Staete Management dengan session_start()
![image](https://github.com/user-attachments/assets/1ca8edb2-5097-4d9a-92a5-993f776523bf)

Pengelolaan state dengan Cookie
![image](https://github.com/user-attachments/assets/c2bf29a5-96da-4262-841c-419e82b6edb2)
![image](https://github.com/user-attachments/assets/1fa5cd8c-bea4-4d05-b6ca-272f040cb20f)

---

# Bagian Bonus: Hosting Aplikasi Web
Pada bagain ini, saya melakukan hosting dengan website penyedia hosting gratis yaitu InfinityFree
![image](https://github.com/user-attachments/assets/30d12e38-ea2f-4660-a045-e4eaf9482992)

#(5%) Langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda:
1. Persiapan File Aplikasi Web: Pastikan semua file aplikasi web, seperti file PHP, CSS, JavaScript, dan lainnya, telah siap dan diuji secara lokal. Kompres file menjadi satu folder jika perlu.
2. Mendaftar ke InfinityFree: Buat akun di www.infinityfree.com dengan menyediakan email yang valid.
3. Membuat Domain/Subdomain: Pilih domain gratis yang tersedia atau hubungkan dengan domain yang sudah dimiliki.
4. Mengunggah File Aplikasi Web: Akses file manager dari InfinityFree atau gunakan aplikasi FTP seperti FileZilla untuk mengunggah file aplikasi ke direktori htdocs.
5. Mengatur Database: Jika aplikasi membutuhkan database, buat database melalui cPanel di InfinityFree dan sesuaikan konfigurasi website yang sudah dibuat.
6. Testing dan Verifikasi: Pastikan aplikasi berjalan dengan baik melalui URL yang disediakan oleh InfinityFree.

#(5%) Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda:
Saya memilih InfinityFree karena:
1. Gratis: Sangat cocok untuk proyek kecil, tugas akademik, atau portofolio pribadi.
2. Fitur Memadai: Menyediakan bandwidth tak terbatas dan penyimpanan yang cukup besar.
3. User-Friendly: Mudah digunakan oleh pemula dengan antarmuka cPanel sederhana.
4. Dukungan PHP dan MySQL: Mendukung pengembangan aplikasi web dinamis dengan basis data.

#(5%) Bagaimana Anda memastikan keamanan aplikasi web yang Anda host:
1. Memastikan setiap form di website perpustakaan, seperti form login atau pendaftaran, memiliki validasi input di sisi klien (JavaScript) dan server (PHP).
2. Menggunakan fungsi sanitasi (seperti htmlspecialchars() di PHP) untuk menghindari serangan XSS (Cross-Site Scripting), terutama jika menampilkan input pengguna di halaman web.

#(5%) Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda:
1. Saya menggunakan InfinityFree sebagai penyedia hosting gratis. Fitur utama yang saya manfaatkan meliputi: Subdomain gratis: http://michael122140066perpustakaan.freesite.online/, Database MySQL dengan hostname server spesifik, Dukungan PHP hingga versi terbaru
2. Saya membuat database MySQL melalui cPanel InfinityFree, yang sebelumnya saya sudah buat dalam localhost. Konfigurasi koneksi database disesuaikan dalam setiap file dengan detail hostname, username, password, dan database name.
3. Saya mengaktifkan caching untuk meningkatkan kecepatan loading aplikasi.
