<?php
// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Import Data</title>

    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
        });
    </script>
</head>

<body>
    <center>
        <form method="post" action="form.php" enctype="multipart/form-data">

            <br><br>

            <div class="input-group col-lg-3">
                <input type="file" class="form-control" name="file" placeholder="file anda" aria-describedby="basic-addon2">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="preview">Preview</button>
                </span>
            </div>
        </form>
        <br>
        <p><a href="index.php"><button class="btn btn-default">Kembali</button></a></p>





        <?php
        // Jika user telah mengklik tombol Preview
        if (isset($_POST['preview'])) {
            $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
            $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

            // Cek apakah terdapat file data.xlsx pada folder tmp
            if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
                unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $tmp_file = $_FILES['file']['tmp_name'];

            // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
            if ($ext == "xlsx") {
                // Upload file yang dipilih ke folder tmp
                // dan rename file tersebut menjadi data{tglsekarang}.xlsx
                // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
                // Contoh nama file setelah di rename : data20210814192500.xlsx
                move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
                $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='import.php'>";

                // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
                // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
                echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

                echo "<table border='1' cellpadding='12'>
					<tr>
						<th colspan='12' class='text-center'>Preview Data</th>
					</tr>
					<tr>
                    	<th>idabsen</th>
						<th>Id</th>
						<th>NIS</th>
						<th>Shubuh</th>
						<th>Dzuhur</th>
						<th>Ashar</th>
                        <th>Maghrib</th>
                        <th>Isya</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Alfa</th>
                        <th>Tazir</th>
					</tr>";

                $numrow = 1;
                $kosong = 0;
                foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
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
                    if ($idabsen == ""  && $id == "" && $nis == "" && $shubuh == "" && $dzuhur == "" && $ashar == "" && $maghrib == "" && $isya == "" && $hadir == "" && $izin == "" && $alfa == "" && $tazir == "")
                        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah diimport
                    if ($numrow > 1) {
                        // Validasi apakah semua data telah diisi
                        $idabsen_td = (!empty($idabsen)) ? "" : " style='background: #E07171;'";
                        $id_td = (!empty($id)) ? "" : " style='background: #E07171;'";
                        $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'";
                        $shubuh_td = (!empty($shubuh)) ? "" : " style='background: #E07171;'";
                        $dzuhur_td = (!empty($dzuhur)) ? "" : " style='background: #E07171;'";
                        $ashar_td = (!empty($ashar)) ? "" : " style='background: #E07171;'";
                        $maghrib_td = (!empty($maghrib)) ? "" : " style='background: #E07171;'";
                        $isya_td = (!empty($isya)) ? "" : " style='background: #E07171;'";
                        $hadir_td = (!empty($hadir)) ? "" : " style='background: #E07171;'";
                        $izin_td = (!empty($izin)) ? "" : " style='background: #E07171;'";
                        $alfa_td = (!empty($alfa)) ? "" : " style='background: #E07171;'";
                        $tazir_td = (!empty($tazir)) ? "" : " style='background: #E07171;'";

                        // Jika salah satu data ada yang kosong
                        if ($idabsen == ""  or $id == "" or $nis == "" or $shubuh == "" or $dzuhur == "" or $ashar == "" or $maghrib == "" or $isya == "" or $hadir == "" or $izin == "" or $alfa == "" or $tazir == "") {
                            $kosong++; // Tambah 1 variabel $kosong
                        }

                        echo "<tr>";
                        echo "<td" . $idabsen_td . ">" . $idabsen . "</td>";
                        echo "<td" . $id_td . ">" . $id . "</td>";
                        echo "<td" . $nis_td . ">" . $nis . "</td>";
                        echo "<td" . $shubuh_td . ">" . $shubuh . "</td>";
                        echo "<td" . $dzuhur_td . ">" . $dzuhur . "</td>";
                        echo "<td" . $ashar_td . ">" . $ashar . "</td>";
                        echo "<td" . $maghrib_td . ">" . $maghrib . "</td>";
                        echo "<td" . $isya_td . ">" . $isya . "</td>";
                        echo "<td" . $hadir_td . ">" . $hadir . "</td>";
                        echo "<td" . $izin_td . ">" . $izin . "</td>";
                        echo "<td" . $alfa_td . ">" . $alfa . "</td>";
                        echo "<td" . $tazir_td . ">" . $tazir . "</td>";
                        echo "</tr>";
                    }

                    $numrow++; // Tambah 1 setiap kali looping
                }

                echo "</table>";

                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if ($kosong > 0) {
        ?>
                    <script>
                        $(document).ready(function() {
                            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                            $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                            $("#kosong").show(); // Munculkan alert validasi kosong
                        });
                    </script>
        <?php
                } else { // Jika semua data sudah diisi
                    echo "<hr>";

                    // Buat sebuah tombol untuk mengimport data ke database
                    echo "<button type='submit' name='import'>Import</button>";
                }

                echo "</form>";
            } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
                // Munculkan pesan validasi
                echo "<div style='color: red;margin-bottom: 10px;'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                </div>";
            }
        }
        ?>
    </center>
</body>

</html>