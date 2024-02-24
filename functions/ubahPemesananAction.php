<?php
include './koneksi.php';
session_start();

if(isset($_POST['ubahPemesanan'])){
    $id_room = $_POST['kamar'];
    $id_pemesanan = $_POST['id_pemesanan'];
    $check_in = $_POST['checkin'];
    $check_out = $_POST['checkout'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $pembayaran = str_replace('Rp. ', '', $_POST['pembayaran']);

    $query = "UPDATE bookings SET room_id = '$id_room', check_in_date = '$check_in', check_out_date = '$check_out', metode_pembayaran = '$metode_pembayaran', pembayaran = '$pembayaran' WHERE id = '$id_pemesanan'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Pemesanan berhasil diubah!'); window.location = '../pemesanan.php'</script>";
    }else{
        echo "<script>alert('Pemesanan gagal diubah!'); window.location = '../pemesanan.php'</script>";
    }
}else{
    echo "<script>alert('Pemesanan gagal diubah!'); window.location = '../pemesanan.php'</script>";
}