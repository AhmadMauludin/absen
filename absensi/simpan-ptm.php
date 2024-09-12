<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {

    $idjadwal  = $_POST['idjadwal'];
    $tanggal   = $_POST['tanggal'];
    $metode    = $_POST['metode'];
    $materi    = mysqli_real_escape_string($db, trim($_POST['materi']));

    // perintah query untuk menyimpan data ke tabel tanggal
    $query = mysqli_query($db, "INSERT INTO ptm (idjadwal, tanggal, metode, materi)	VALUES('$idjadwal', '$tanggal',  '$metode', '$materi')");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil insert data
        header('location: ?page=tampil-ptm&alert=2');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: ?page=tampil-ptm&alert=1');
    }
}
