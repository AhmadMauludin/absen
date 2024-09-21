<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require_once "config/database.php";

// menangkap data yang dikirim dari form login
$iduser = $_POST['iduser'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db, "select * from user where iduser='$iduser' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['iduser'] = $iduser;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:index.php");

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "pengurus") {
        // buat session login dan username
        $_SESSION['iduser'] = $iduser;
        $_SESSION['level'] = "pengurus";
        // alihkan ke halaman dashboard pegawai
        header("location:index_pengurus.php");

        // cek jika user login sebagai pengurus
    } else if ($data['level'] == "santri") {
        // buat session login dan username
        $_SESSION['iduser'] = $iduser;
        $_SESSION['level'] = "santri";
        // alihkan ke halaman dashboard pengurus
        header("location:index.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}
