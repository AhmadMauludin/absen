
<?php
// Panggil koneksi database
require_once "../config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['nis'])) {
		$nis           = mysqli_real_escape_string($db, trim($_POST['nis']));
		$nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
		$username	  = mysqli_real_escape_string($db, trim($_POST['username']));
		$password	  = mysqli_real_escape_string($db, trim($_POST['password']));
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$kelas         = $_POST['kelas'];
		$alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
		$no_telepon    = $_POST['no_telepon'];

		// perintah query untuk mengubah data pada tabel is_siswa
		$query = mysqli_query($db, "UPDATE santri SET nama 			= '$nama',
														username 	= '$username',
														password 	= '$password',
														jenis_kelamin 	= '$jenis_kelamin',
														kelas 			= '$kelas',
														alamat 			= '$alamat',
														no_telepon 		= '$no_telepon'
												  WHERE nis 			= '$nis'");

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