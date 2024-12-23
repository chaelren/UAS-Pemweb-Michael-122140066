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
![image](https://github.com/user-attachments/assets/3c5cb6a2-0302-4f71-b199-f03cd0059158)




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
