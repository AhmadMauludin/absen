<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

    $idabsensi = $_GET['id'];

    // perintah query untuk menghapus data pada tabel is_siswa
    $query = mysqli_query($db, "DELETE FROM absensi WHERE idabsensi='$idabsensi'");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil delete data
        header('location: ?page=tampil-ptm&alert=4');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location: ?page=tampil-ptm&alert=1');
    }
}
