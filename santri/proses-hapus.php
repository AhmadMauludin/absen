<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

	$nis = $_GET['id'];

	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($db, "DELETE FROM santri WHERE nis='$nis'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: ?page=tampil-data-santri&alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: ?page=tampil-data-santri&alert=1');
	}
}
