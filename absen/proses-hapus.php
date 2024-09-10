<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

	$idabsen = $_GET['id'];

	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($db, "DELETE FROM absen WHERE idabsen='$idabsen'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: ?page=tampil-data-absen&alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: ?page=tampil-data-absen&alert=1');
	}
}
