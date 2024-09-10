<?php
// Load file koneksi.php
include "../config/database.php";

// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['import'])) { // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
	$path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
	$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach ($sheet as $row) {
		// Ambil data pada excel sesuai Kolom
		$idabsen = $row['A'];
		$id = $row['B'];
		$nis = $row['C'];
		$shubuh = $row['D'];
		$dzuhur = $row['E'];
		$ashar = $row['F'];
		$maghrib = $row['G'];
		$isya = $row['H'];
		$hadir = $row['I'];
		$izin = $row['J'];
		$alfa = $row['K'];
		$tazir = $row['L'];

		// Cek jika semua data tidak diisi
		if ($idabsen == "" && $id == "" && $nis == "" && $shubuh == "" && $dzuhur == "" && $ashar == "" && $maghrib == "" && $isya == "" && $hadir == "" && $izin == "" && $alfa == "" && $tazir == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if ($numrow > 1) {
			// Buat query Insert
			$query = "INSERT INTO absen(idabsen, id, nis, s, d, a, m, i, hadir, izin, alfa, tazir) VALUES('$idabsen','$id','$nis','$shubuh','$dzuhur','$ashar','$maghrib','$isya','$hadir','$izin','$alfa','$tazir')";

			// Eksekusi $query
			mysqli_query($db, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

	unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

header('location: ../?page=tampil-data-absen'); // Redirect ke halaman awal
