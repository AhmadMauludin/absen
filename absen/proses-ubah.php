
<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['idabsen'])) {
		$idabsen    = mysqli_real_escape_string($db, trim($_POST['idabsen']));
		$alfa		= $_POST['alfa'];
		$tazir      = $_POST['tazir'];

		// perintah query untuk mengubah data pada tabel is_siswa
		$query = mysqli_query($db, "UPDATE absen SET alfa 			= '$alfa',
														tazir 	= '$tazir'
												  WHERE idabsen 			= '$idabsen'");

		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}
	}
}
?>