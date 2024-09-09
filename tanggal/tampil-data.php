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
        <form class="form-inline" method="POST" action="index.php">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <b>Tanggal Absen</b>
              </div>
              <div class="input-group-addon">
                <a href="?page=tambah"><i class="glyphicon glyphicon-plus"></i></a>
              </div>

              <input type="text" class="form-control" name="cari" placeholder="Masukan tanggal" autocomplete="off" value="<?php echo $cari; ?>">
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data tanggal berhasil disimpan.
          </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data tanggal berhasil diubah.
          </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data tanggal berhasil dihapus.
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
                <th>Hari, Tanggal</th>
                <th class='center'>Shubuh</th>
                <th class='center'>Dzuhur</th>
                <th class='center'>Ashar</th>
                <th class='center'>Maghrib</th>
                <th class='center'>Isya</th>
                <th class='center kirim'>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              /* Pagination */
              $batas = 5;

              if (isset($cari)) {
                $jumlah_record = mysqli_query($db, "SELECT * FROM tanggal
                                                    WHERE tanggal LIKE '%$cari%' OR hari LIKE '%$cari%'")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              } else {
                $jumlah_record = mysqli_query($db, "SELECT * FROM tanggal")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              }

              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;




              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($cari)) {
                $query = mysqli_query($db, "SELECT * FROM tanggal
                                            WHERE tanggal LIKE '%$cari%' OR hari LIKE '%$cari%' 
                                            ORDER BY id DESC LIMIT $mulai, $batas")
                  or die('Ada kesalahan pada query tanggal: ' . mysqli_error($db));
              } else {
                $query = mysqli_query($db, "SELECT * FROM tanggal
                                            ORDER BY id DESC LIMIT $mulai, $batas")
                  or die('Ada kesalahan pada query tanggal: ' . mysqli_error($db));
              }

              while ($data = mysqli_fetch_assoc($query)) {
                $js = mysqli_query($db, "SELECT * FROM absen WHERE s='1' AND id= $data[id] ");
                $jums  = mysqli_num_rows($js);

                $jd = mysqli_query($db, "SELECT * FROM absen WHERE d='1' AND id= $data[id] ");
                $jumd  = mysqli_num_rows($jd);

                $ja = mysqli_query($db, "SELECT * FROM absen WHERE a='1' AND id= $data[id] ");
                $juma  = mysqli_num_rows($ja);

                $jm = mysqli_query($db, "SELECT * FROM absen WHERE m='1' AND id= $data[id] ");
                $jumm  = mysqli_num_rows($jm);

                $ji = mysqli_query($db, "SELECT * FROM absen WHERE i='1' AND id= $data[id] ");
                $jumi  = mysqli_num_rows($ji);

                echo "  <tr>
                      <td width='10' >$no</td>
                      <td width='75'>$data[hari], $data[tanggal]</td>
                      <td width='15' class='center'>$jums </td>
                      <td width='15' class='center'>$jumd </td>
                      <td width='15' class='center'>$juma </td>
                      <td width='15' class='center'>$jumm </td>
                      <td width='15' class='center'>$jumi </td>

                      <td width='50' class='center kirim'>
                        <div class=''>
                        <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=detail&id=$data[id]'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                          </a>  
                        <a data-toggle='tooltip' data-placement='top' title='Input' style='margin-right:5px' class='btn btn-info btn-sm' href='../absen/form-tambah&id=$data[id]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus tanggal <?php echo $data['tanggal']; ?>?');">
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

          <a class="kirim">
            Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
            Total <?php echo $jumlah; ?> data
          </a>

          <nav>
            <ul class="pagination pull-right kirim">
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