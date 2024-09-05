<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	$nis           = mysqli_real_escape_string($db, trim($_POST['nis']));
	$nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
	$username		= mysqli_real_escape_string($db, trim($_POST['username']));
	$password		= mysqli_real_escape_string($db, trim($_POST['password']));
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kelas         = $_POST['kelas'];
	$alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
	$no_telepon    = $_POST['no_telepon'];

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO santri(nis,
													 nama,
													 username,
													 password,
													 jenis_kelamin,
													 kelas,
													 alamat,
													 no_telepon)	
											  VALUES('$nis',
													 '$nama',
													 '$username',
													 '$password',
													 '$jenis_kelamin',
													 '$kelas',
													 '$alamat',
													 '$no_telepon')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
