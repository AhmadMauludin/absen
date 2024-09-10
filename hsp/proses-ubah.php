
<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['idhsp'])) {

		$idhsp          = mysqli_real_escape_string($db, trim($_POST['idhsp']));

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
		$iduser     = mysqli_real_escape_string($db, trim($_POST['iduser']));
		$stat       = $_POST['stat'];
		$lapor      = $_POST['lapor'];

		// perintah query untuk mengubah data pada tabel is_siswa
		$query = mysqli_query($db, "UPDATE santri SET idhsp = '$idhsp',									
													 jenis	= '$jenis',
													 ket	= '$ket',
													 tgm	= '$tgm',
													 wtm	= '$wtm',
													 iduser	= '$iduser',
													 stat	= '$stat',
													 tgs	= '$tgs',
													 wts	= '$wts',
													 lapor	= '$lapor',
													 tgl	= '$tgl',
													 wtl	= '$wtl')	
											 WHERE	idhsp	= '$idhsp'");

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
?>