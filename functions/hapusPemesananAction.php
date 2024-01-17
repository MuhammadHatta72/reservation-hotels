<?php
include './koneksi.php';
session_start();

if(isset($_POST['hapusPesanan'])){
    $id = $_POST['id_booking'];
    $query = mysqli_query($conn, "DELETE FROM bookings WHERE id='$id'");
    if($query){
        echo "<script>alert('Pemesanan berhasil dihapus!'); window.location = '../pemesanan.php'</script>";
    }else{
        echo "<script>alert('Pemesanan gagal dihapus!'); window.location = '../pemesanan.php'</script>";
    }
}else{
    echo "<script>alert('Pemesanan gagal dihapus!'); window.location = '../pemesanan.php'</script>";
}