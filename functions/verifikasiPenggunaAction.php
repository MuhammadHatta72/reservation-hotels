<?php
include './koneksi.php';
session_start();

if(isset($_POST['verifikasi'])){
    $id = $_POST['id'];
    
    $query = "UPDATE users SET status_verifikasi_admin = 'sudah_verifikasi' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Pengguna berhasil diverifikasi');
        window.location='../pengguna.php'
        </script>";
    }else{
        echo "<script>alert('Pengguna gagal diverifikasi');
        window.location='../pengguna.php'
        </script>";
    }
}else{
    echo "<script>alert('Pengguna gagal diverifikasi');
    window.location='../pengguna.php'
    </script>";
}