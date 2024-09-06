<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {

	$tanggalm       = $_POST['tgm'];
	$tglm           = explode('-', $tanggalm);
	$tgm = $tglm[2] . "-" . $tglm[1] . "-" . $tglm[0];

	$tanggals       = $_POST['tgs'];
	$tgls           = explode('-', $tanggals);
	$tgs = $tgls[2] . "-" . $tgls[1] . "-" . $tgls[0];

	$tanggall       = $_POST['tgl'];
	$tgll           = explode('-', $tanggall);
	$tgl = $tgll[2] . "-" . $tgll[1] . "-" . $tgll[0];

	$wtm       	= $_POST['wtm'];
	$wts       	= $_POST['wts'];
	$wtl       	= $_POST['wtl'];

	$nis       	= $_POST['nis'];
	$jenis      = $_POST['jenis'];
	$ket       	= mysqli_real_escape_string($db, trim($_POST['ket']));
	$iduser   = mysqli_real_escape_string($db, trim($_POST['iduser']));
	$stat       = $_POST['stat'];
	$lapor      = $_POST['lapor'];

	// perintah query untuk menyimpan data ke tabel tanggal
	$query = mysqli_query($db, "INSERT INTO hsp(nis,
													 jenis,
													 ket,
													 tgm,
													 wtm,
													 iduser,
													 stat,
													 tgs,
													 wts,
													 lapor,
													 tgl,
													 wtl)	
											  VALUES('$nis',
													 '$jenis',
													 '$ket',
													 '$tgm',
													 '$wtm',
													 '$iduser',
													 '$stat',
													 '$tgs',
													 '$wts',												'$lapor',
													 '$tgl',	 
													 '$wtl')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
