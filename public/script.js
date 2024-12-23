document.getElementById("registrationForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Mencegah form terkirim sebelum validasi
    const nama = document.getElementById("nama").value.trim();
    const nim = document.getElementById("nim").value.trim();
    const programStudi = document.getElementById("programStudi").value;
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // Validasi Nama
    if (nama.length <= 5) {
        alert("Nama harus lebih dari 5 huruf.");
        return;
    }

    // Validasi NIM
    if (!/^\d{9}$/.test(nim)) {
        alert("NIM harus terdiri dari 9 angka.");
        return;
    }

    // Validasi Program Studi
    if (!programStudi) {
        alert("Program Studi harus dipilih.");
        return;
    }

    // Validasi Username
    if (!/^[a-zA-Z0-9]{9,}$/.test(username)) {
        alert(
            "Username harus menggunakan huruf dan angka, tidak boleh ada spasi, dan harus lebih dari 8 karakter."
        );
        return;
    }

    // Validasi Email
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Email harus menggunakan format yang valid.");
        return;
    }

    // Validasi Password
    if (!/^(?=.*[a-zA-Z])(?=.*\d).{9,}$/.test(password)) {
        alert("Password harus terdiri dari huruf dan angka, serta lebih dari 8 karakter.");
        return;
    }

    // Validasi Konfirmasi Password
    if (password !== confirmPassword) {
        alert("Konfirmasi Password tidak sesuai dengan Password.");
        return;
    }

    // Jika semua validasi lolos
    alert("Formulir berhasil divalidasi dan siap untuk dikirim.");
    e.target.submit(); // Kirim form jika validasi sukses
});
