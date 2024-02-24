<?php
include './koneksi.php';
session_start();

if(isset($_POST['checkOut'])){
    $id_booking = $_POST['id_booking'];
    $id_room = $_POST['id_room'];
    
    $query = "UPDATE bookings SET status = 'Selesai' WHERE id = '$id_booking'";
    $result = mysqli_query($conn, $query);

    $query_kamar = "UPDATE rooms SET status = 'available' WHERE id = '$id_room'";
    $result_kamar = mysqli_query($conn, $query_kamar);

    if(!$result){
        echo "<script>alert('Data Pemesanan gagal dicheck out.');
        window.location='../pemesanan.php';
        </script>";
    } else {
        echo "<script>alert('Data Pemesanan berhasil dicheck out.');
        window.location='../pemesanan.php';
        </script>";
    }
}else{
    header("location:../pemesanan.php");
}