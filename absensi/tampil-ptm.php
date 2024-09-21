<?php
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
} else {
    $cari = "";
}
?>



<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <div>
                <form class="form-inline" method="POST" action="?page=tampil-ptm">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <b>Pertemuan</b>
                            </div>
                            <div class="input-group-addon">
                                <a href="?page=tambah-ptm"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>

                            <input type="text" class="form-control" name="cari" placeholder="Nama/tanggal" autocomplete="off" value="<?php echo $cari; ?>">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-search"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 1) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pertemuan berhasil disimpan.
          </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pertemuan berhasil diubah.
          </div>";
        } elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pertemuan berhasil dihapus.
          </div>";
        }
        ?>


        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>IdPtm</th>
                                <th>Hari, Tanggal</th>
                                <th>Mapel - Guru</th>
                                <th>Kelas</th>
                                <th>Materi</th>
                                <th>Metode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            /* Pagination */
                            $batas = 25;
                            if (isset($cari)) {
                                $jumlah_record = mysqli_query($db, "SELECT ptm.*, jadwal.*, staf.* 
                                FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis WHERE mapel LIKE '%$cari%' OR tanggal LIKE '%$cari%' OR nama LIKE '%$cari%'")
                                    or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
                            } else {
                                $jumlah_record = mysqli_query($db, "SELECT ptm.*, jadwal.nis, staf.* 
                                FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis ")

                                    or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
                            }

                            $jumlah  = mysqli_num_rows($jumlah_record);
                            $halaman = ceil($jumlah / $batas);
                            $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                            $mulai   = ($page - 1) * $batas;
                            /*-------------------------------------------------------------------*/
                            $no = 1;
                            if (isset($cari)) {
                                $query = mysqli_query($db, "SELECT ptm.*, jadwal.*, staf.* 
                                FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis  WHERE mapel LIKE '%$cari%' OR tanggal LIKE '%$cari%' OR nama LIKE '%$cari%' ORDER BY tanggal DESC LIMIT $mulai, $batas") or die('Ada kesalahan pada query absen: ' . mysqli_error($db));
                            } else {
                                $query = mysqli_query($db, "SELECT ptm.*, jadwal.*, staf.* 
                                FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis WHERE ORDER BY tanggal DESC LIMIT $mulai, $batas") or die('Ada kesalahan pada query absen: ' . mysqli_error($db));
                            }

                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "  <tr>
                      <td width='20'>$no</td>
                      <td width='20'>$data[idptm]</td>
                      <td width='50'>$data[hari], $data[tanggal]</td>
                      <td width='125'><b>$data[mapel]</b> - $data[nis] $data[nama]</td>
                      <td width='25'>$data[kelas]</td>
                      <td width='50'>$data[materi]</td>
                      <td width='50'>$data[metode]</td>
                      <td width='75'>
                        <div class=''>
                        <a data-toggle='tooltip' data-placement='top' title='Absen' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=buat-absensi&id=$data[idptm]'>
                        <i class='glyphicon glyphicon-plus'></i></a>
                        
                        <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=tampil-absensi&id=$data[idptm]'>
                        <i class='glyphicon glyphicon-eye-open'></i></a>";

                            ?>
                                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="?page=hapus-ptm&id=<?php echo $data['idptm']; ?>" onclick="return confirm('Anda yakin ingin menghapus pertemuan ini?');">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            <?php
                                echo "
                        </div>
                      </td>
                    </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if (empty($_GET['hal'])) {
                        $halaman_aktif = '1';
                    } else {
                        $halaman_aktif = $_GET['hal'];
                    }
                    ?>

                    <a>
                        Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
                        Total <?php echo $jumlah; ?> data
                    </a>

                    <nav>
                        <ul class="pagination pull-right">
                            <!-- Button untuk halaman sebelumnya -->
                            <?php
                            if ($halaman_aktif <= '1') { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            } else { ?>
                                <li>
                                    <a href="?hal=<?php echo $page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                            <!-- Link halaman 1 2 3 ... -->
                            <?php
                            for ($x = 1; $x <= $halaman; $x++) { ?>
                                <li class="">
                                    <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                                </li>
                            <?php
                            }
                            ?>

                            <!-- Button untuk halaman selanjutnya -->
                            <?php
                            if ($halaman_aktif >= $halaman) { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php
                            } else { ?>
                                <li>
                                    <a href="?hal=<?php echo $page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->