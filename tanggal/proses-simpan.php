<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {

	$tanggal    = $_POST['tanggal'];
	$tgl        = explode('-', $tanggal);
	$tanggal 	= $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

	$hari       = $_POST['hari'];
	$ket       	= mysqli_real_escape_string($db, trim($_POST['ket']));

	$id    = $_POST['tanggal'];
	$ide        = explode('-', $id);
	$id 	= $ide[2] . "" . $ide[1] . "" . $ide[0];

	// perintah query untuk menyimpan data ke tabel tanggal
	$query = mysqli_query($db, "INSERT INTO tanggal(id,
													 tanggal,
													 hari,
													 ket)	
											  VALUES('$id',
													 '$tanggal',
													 '$hari',
													 '$ket')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
