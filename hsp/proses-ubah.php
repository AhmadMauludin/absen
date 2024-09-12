<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['idhsp'])) {

		$idhsp          = mysqli_real_escape_string($db, trim($_POST['idhsp']));
		$stat       = $_POST['stat'];

		$tgm       	= $_POST['tgm'];
		$tgs       	= $_POST['tgs'];
		$tgl       	= $_POST['tgl'];

		$wtm       	= $_POST['wtm'];
		$wts       	= $_POST['wts'];
		$wtl       	= $_POST['wtl'];


		$lapor      = $_POST['lapor'];

		// perintah query untuk mengubah data pada tabel
		$query = mysqli_query($db, "UPDATE hsp SET stat = '$stat', tgs = '$tgs', wts = '$wts', lapor = '$lapor', tgl = '$tgl', wtl = '$wtl' WHERE idhsp = '$idhsp'");


		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: ?page=tampil-data-hsp&alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: ?page=tampil-data-hsp&alert=1');
		}
	}
}
