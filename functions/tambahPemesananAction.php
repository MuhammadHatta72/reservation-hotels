<?php
include './koneksi.php';
session_start();

if(isset($_POST['tambahPemesanan'])){
    $id_user = $_POST['nama'];
    $id_room = $_POST['kamar'];
    $tanggal_mulai = $_POST['tanggal_check_in'];
    $tanggal_selesai = $_POST['tanggal_check_out'];

    if($tanggal_mulai > $tanggal_selesai){
        echo "<script>alert('Tanggal Check In tidak boleh lebih besar dari tanggal Check Out.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    if($tanggal_mulai < date("Y-m-d")){
        echo "<script>alert('Tanggal Check In tidak boleh lebih kecil dari tanggal hari ini.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    //cek user masih punya pemesanan yang belum selesai
    $query_cek = "SELECT * FROM bookings WHERE user_id = '$id_user' AND (status = 'Disetujui' OR status = 'Pending')";
    $result_cek = mysqli_query($conn, $query_cek);
    $row_cek = mysqli_fetch_assoc($result_cek);

    if($row_cek > 0){
        echo "<script>alert('Anda masih memiliki pemesanan yang belum selesai.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    $query = "INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, status) VALUES ('$id_user', '$id_room', '$tanggal_mulai', '$tanggal_selesai', 'Disetujui')";
    $result = mysqli_query($conn, $query);

    $query_kamar = "UPDATE rooms SET status = 'not_available' WHERE id = '$id_room'";
    $result_kamar = mysqli_query($conn, $query_kamar);

    if(!$result){
        echo "<script>alert('Data Pemesanan gagal ditambah.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Data Pemesanan berhasil ditambah.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }
}else{
    header("location:../pemesanan.php");
}