<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guest-house";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

//INSERT INTO users (username, password, role, nama, no_telp, email, status_verifikasi_admin) VALUES ('admin', '$2y$10$.tzdJy.sKrnZ4L7yZ4AGpuZlsU/W7nkD37QNQ8S/MtXF.WckUylvO', 'admin', 'Admin', '081554073742', 'admin@example.com', 'sudah_verifikasi');
?>