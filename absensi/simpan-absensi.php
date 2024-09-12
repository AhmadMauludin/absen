<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {

    $idptm  = $_POST['idptm'];
    $nis    = $_POST['nis'];
    $khd    = $_POST['khd'];
    $ket    = mysqli_real_escape_string($db, trim($_POST['ket']));

    // perintah query untuk menyimpan data ke tabel tanggal
    $query = mysqli_query($db, "INSERT INTO absensi (idptm, nis, khd, ket) VALUES ('$idptm', '$nis',  '$khd', '$ket')");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil insert data

        header('location: ?page=tampil-ptm&alert=2');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: ?page=tampil-ptm&alert=1');
    }
}
