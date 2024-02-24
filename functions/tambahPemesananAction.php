<?php
include './koneksi.php';
session_start();

if(isset($_POST['tambahPemesanan'])){
    $id_user = $_POST['nama'];
    $id_room = $_POST['kamar'];
    $tanggal_mulai = $_POST['checkin'];
    $tanggal_selesai = $_POST['checkout'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $pembayaran = str_replace('Rp. ', '', $_POST['pembayaran']);

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
    $query_cek = "SELECT * FROM bookings WHERE user_id = '$id_user' AND (status = 'Disetujui' OR status = 'Booking')";
    $result_cek = mysqli_query($conn, $query_cek);
    $row_cek = mysqli_fetch_assoc($result_cek);

    if($row_cek > 0){
        echo "<script>alert('Anda masih memiliki pemesanan yang belum selesai.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    //cek kamar
    $query_kamar = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$id_room'");
    $row_kamar = mysqli_fetch_assoc($query_kamar);
    if($row_kamar['status'] == 'not_available'){
        echo "<script>alert('Kamar ini tidak tersedia.');
        window.location='../pemesanan.php';
        </script>";
        exit;
    }

    $query = "INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, pembayaran, metode_pembayaran, status) VALUES ('$id_user', '$id_room', '$tanggal_mulai', '$tanggal_selesai', '$pembayaran', '$metode_pembayaran', 'Disetujui')";
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