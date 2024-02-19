<?php
include './koneksi.php';
session_start();

if(isset($_POST['pesanKamar'])){
    echo "Pesan Kamar";
}else{
    echo "Pesan Kamar Gagal";
}