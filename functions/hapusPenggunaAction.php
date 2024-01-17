<?php
include './koneksi.php';
session_start();

if(isset($_POST['hapus'])){
    $id = $_POST['id'];
    
    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Pengguna berhasil dihapus');
        window.location='../pengguna.php'
        </script>";
    }else{
        echo "<script>alert('Pengguna gagal dihapus');
        window.location='../pengguna.php'
        </script>";
    }
}else{
    echo "<script>alert('Pengguna gagal dihapus');
    window.location='../pengguna.php'
    </script>";
}