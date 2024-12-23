# UAS-Pemweb-Michael-122140066
---

NB: Akun untuk login admin yaitu usernamae = admin dan password = admin.

---
# Penilaian dalam UAS Pemograman Web
- Client-side Programming (Bobot: 30%)
- Server-side Programming (Bobot: 30%)
- Database Management (Bobot: 20%)
- State Management (Bobot: 20%)
- Hosting Aplikasi Web (Bobot: 20%)
---

# Client-side Programming
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
