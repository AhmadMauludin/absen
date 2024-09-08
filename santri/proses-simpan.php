<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	$nis           = mysqli_real_escape_string($db, trim($_POST['nis']));
	$nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kelsek         = $_POST['kelsek'];
	$kelas         = $_POST['kelas'];
	$asrama         = $_POST['asrama'];
	$alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
	$no_telepon    = $_POST['no_telepon'];
	$foto        = mysqli_real_escape_string($db, trim($_POST['foto']));

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO santri(nis,
													 nama,
													 jenis_kelamin,
													 kelas,
													 alamat,
													 no_telepon,
													 asrama,
													 kelsek,
													 foto)	
											  VALUES('$nis',
													 '$nama',
													 '$jenis_kelamin',
													 '$kelas',
													 '$alamat',
													 '$no_telepon',
													 '$asrama',
													 '$kelsek',
													 '$foto')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
