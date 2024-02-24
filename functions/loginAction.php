<?php

include '../functions/koneksi.php';
session_start();


if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['email'] == $email){
        if(password_verify($password, $row['password'])){
            if($row['status_verifikasi_admin'] == 'sudah_verifikasi'){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['no_telp'] = $row['no_telp'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                echo "<script>
                alert('Login berhasil!');
                window.location.href='../dashboard.php';
                </script>";
            }else{
                echo "<script>
                alert('Akun anda belum diverifikasi oleh admin!');
                window.location.href='../login.php';
                </script>";
            }
        }else{
            // display alert lalu redirect ke login.php
            echo "<script>
                alert('Gagal login, silahkan ulangi lagi!');
                window.location.href='../login.php';
                </script>";
        }
    }
    echo "<script>
        alert('Gagal login, silahkan ulangi lagi!');
        window.location.href='../login.php';
        </script>";
}

