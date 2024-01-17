<?php
include '../functions/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir registrasi
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $username = "Username";

    if($_POST['password'] != $_POST['password2']){
        echo "<script>
        alert('Password tidak sama!');
        window.location.href='../register.php';
        </script>";
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] == $email) {
        echo "<script>
        alert('Email sudah terdaftar!');
        window.location.href='../register.php';
        </script>";
        exit;
    }

    // Query untuk menambahkan pengguna baru
    $query = "INSERT INTO users (username, password, role, nama, no_telp, email, status_verifikasi_admin)
              VALUES ('$username', '$password', 'user', '$nama', '$no_telp', '$email', 'belum_verifikasi')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('Registrasi berhasil! Silakan login.');
        window.location.href='../login.php';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('Registrasi gagal! Silakan ulangi lagi.');
        window.location.href='../register.php';
        </script>";
        exit;
    }
}

// Jangan lupa tutup koneksi ke database jika sudah selesai digunakan
mysqli_close($conn);
?>
