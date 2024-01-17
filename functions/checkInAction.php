<?php
include './koneksi.php';
session_start();

if(isset($_POST['checkIn'])){
    $id_booking = $_POST['id_booking'];
    $id_room = $_POST['id_room'];

    //cek kamar masih available
    $query_cek = "SELECT * FROM rooms WHERE id = '$id_room'";
    $result_cek = mysqli_query($conn, $query_cek);
    $row_cek = mysqli_fetch_assoc($result_cek);

    if($row_cek["status"] == 'not_available'){
        echo "<script>alert('Kamar Masih Dipakai, silahkan ubah tanggal atau batalkan pesanan!');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    $query = "UPDATE bookings SET status = 'Disetujui' WHERE id = '$id_booking'";
    $result = mysqli_query($conn, $query);

    $query_kamar = "UPDATE rooms SET status = 'not_available' WHERE id = '$id_room'";
    $result_kamar = mysqli_query($conn, $query_kamar);

    if(!$result){
        echo "<script>alert('Data Pemesanan gagal dicheck in.');
        window.location='../pemesanan.php';
        </script>";
    } else {
        echo "<script>alert('Data Pemesanan berhasil dicheck in.');
        window.location='../pemesanan.php';
        </script>";
    }
}else{
    header("location:../pemesanan.php");
}