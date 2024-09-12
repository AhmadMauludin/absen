<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['idhsp'])) {

	$idhsp = $_GET['idhsp'];

	// perintah query untuk menghapus data pada tabel tanggal
	$query = mysqli_query($db, "DELETE FROM hsp WHERE idhsp='$idhsp'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: ?page=tampil-data-hsp&alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: ?page=tampil-data-hsp&alert=1');
	}
}
