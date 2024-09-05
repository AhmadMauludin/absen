<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	$id			= mysqli_real_escape_string($db, trim($_POST['id']));
	$nis		= mysqli_real_escape_string($db, trim($_POST['nis']));
	$alfa		= $_POST['alfa'];
	$tazir		= $_POST['tazir'];

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO absen(id,
													 nis,
													 alfa,
													 tazir)	
											  VALUES('$id',
													 '$nis',
													 '$alfa',
													 '$tazir')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
