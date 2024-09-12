<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['idabsen'])) {
		$idabsen    = mysqli_real_escape_string($db, trim($_POST['idabsen']));
		$s		= $_POST['s'];
		$d		= $_POST['d'];
		$a		= $_POST['a'];
		$m		= $_POST['m'];
		$i		= $_POST['i'];
		$hadir	= $s + $d + $a + $m + $i;
		$izin	= $_POST['izin'];
		$alfa	= 5 - ($hadir + $izin);
		$tazir  = $_POST['tazir'];

		// perintah query untuk mengubah data pada tabel 
		$query = mysqli_query($db, "UPDATE absen SET s = '$s', d = '$d', a = '$a', m = '$m', i = '$i', hadir = '$hadir', izin = '$izin', alfa = '$alfa', tazir = '$tazir' WHERE idabsen = '$idabsen'");

		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: ?page=tampil-data-absen&alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: ?page=tampil-data-absen&alert=1');
		}
	}
}
