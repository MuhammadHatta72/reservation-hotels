<?php
include './koneksi.php';
session_start();

if(isset($_POST['pesanKamar'])){
    $room_id = $_POST['room_id'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $pembayaran = $_POST['pembayaran'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $cek_user = "";

    // hapus tulisan di $pembayaran
    $pembayaran = str_replace('Rp. ', '', $pembayaran);
    
    if($_SESSION['id'] == ''){
        $cek_user = "Belum Login";
        $nama_pengguna = rand(100, 999).rand(100, 999).rand(100, 999).rand(100, 999);
        $password = password_hash('password', PASSWORD_DEFAULT); // Enkripsi password
        $email = $nama_pengguna.'@gmail.com';
        
        $query_user_baru = mysqli_query($conn, "INSERT INTO users (username, password, role, nama, no_telp, email, status_verifikasi_admin)
              VALUES ('$nama_pengguna', '$password', 'user', '$nama_pengguna', '-', '$email', 'sudah_verifikasi')");
        $user_id = mysqli_insert_id($conn);
    }else{
        $cek_user = "Sudah Login";
        //potong 5% dari pembayaran
        $user_id_session = $_SESSION['id'];
        $pembayaran = $pembayaran*0.95;
        $result_user_lama = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id_session'");
        $row = mysqli_fetch_assoc($result_user_lama);
        $user_id = $row['id'];
    }

    $query = mysqli_query($conn, "INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, pembayaran, metode_pembayaran, status) VALUES ('$user_id', '$room_id', '$check_in', '$check_out', '$pembayaran', '$metode_pembayaran', 'Booking')");

    if($query){
        $query_kamar = mysqli_query($conn, "UPDATE rooms SET status = 'not_available' WHERE id = '$room_id'");
    }

    if($query){
        if($cek_user == 'Belum Login'){
            echo 'Kamar Berhasil DiBooking, Informasi Akun : Username : '.$nama_pengguna.', Password : password, Email : '.$email;
            return true;
        }else{
            echo 'Kamar Berhasil DiBooking';
            return true;
        }
    }else{
        echo 'Kamar Gagal DiBooking';
        return false;
    }
}else{
    echo 'Kamar Gagal DiBooking';
    return false;
}