<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	$id			= mysqli_real_escape_string($db, trim($_POST['id']));
	$nis		= mysqli_real_escape_string($db, trim($_POST['nis']));
	$s		= $_POST['s'];
	$d		= $_POST['d'];
	$a		= $_POST['a'];
	$m		= $_POST['m'];
	$i		= $_POST['i'];
	$hadir	= $s + $d + $a + $m + $i;
	$izin	= $_POST['izin'];
	$alfa	= 5 - ($hadir + $izin);
	$tazir	= $_POST['tazir'];

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO absen(id,
													 nis,
													 s,
													 d,
													 a,
													 m,
													 i,
													 hadir,
													 izin,
													 alfa,
													 tazir)	
											  VALUES('$id',
													 '$nis',
													 '$s',
													 '$d',
													 '$a',
													 '$m',
													 '$i',
													 '$hadir',
													 '$izin',
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
