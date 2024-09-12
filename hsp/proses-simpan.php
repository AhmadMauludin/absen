<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {

	$tanggalm       = $_POST['tgm'];
	$tglm           = explode('-', $tanggalm);
	$tgm = $tglm[2] . "-" . $tglm[1] . "-" . $tglm[0];

	$tanggals       = $_POST['tgs'];
	$tgls           = explode('-', $tanggals);
	$tgs = $tgls[2] . "-" . $tgls[1] . "-" . $tgls[0];

	$wtm       	= $_POST['wtm'];
	$wts       	= $_POST['wts'];

	$nis       	= $_POST['nis'];
	$jenis      = $_POST['jenis'];
	$ket       	= mysqli_real_escape_string($db, trim($_POST['ket']));
	$iduser     = mysqli_real_escape_string($db, trim($_POST['iduser']));
	$stat       = $_POST['stat'];

	// perintah query untuk menyimpan data ke tabel tanggal
	$query = mysqli_query($db, "INSERT INTO hsp(nis,
													 jenis,
													 ket,
													 tgm,
													 wtm,
													 iduser,
													 stat,
													 tgs,
													 wts)	
											  VALUES('$nis',
													 '$jenis',
													 '$ket',
													 '$tgm',
													 '$wtm',
													 '$iduser',
													 '$stat',
													 '$tgs',
													 '$wts')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: ?page=tampil-data-hsp&alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: ?page=tampil-data-hsp&alert=1');
	}
}
