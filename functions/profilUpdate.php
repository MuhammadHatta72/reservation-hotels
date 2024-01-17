<?php
include './koneksi.php';
session_start();

if(isset($_POST['updateProfil'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //cek password1 dan password2 apakah sama
    if($password != $password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        window.location.href='../profil.php';
        </script>";
        return false;
    }

    // cek email sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND id != '$id'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Email sudah terdaftar!');
        window.location.href='../profil.php';
        </script>";
        return false;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET nama = '$nama', username = '$username', no_telp = '$no_telp', email = '$email', password = '$password_hash' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>
        alert('Profil berhasil diupdate!');
        window.location.href='../profil.php';
        </script>";
    }else{
        echo "<script>
        alert('Profil gagal diupdate!');
        window.location.href='../profil.php';
        </script>";
    }
}else{
    header('Location: ../dashboard.php');
}