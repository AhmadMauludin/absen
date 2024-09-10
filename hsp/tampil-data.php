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
        <form class="form-inline" method="POST" action="?page=tampil-data-hsp">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <b>Perizinan</b>
              </div>
              <div class="input-group-addon">
                <a href="?page=tambah-hsp"><i class="glyphicon glyphicon-plus"></i></a>
              </div>

              <input type="text" class="form-control" name="cari" placeholder="Nama / tanggal" autocomplete="off" value="<?php echo $cari; ?>">
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Perizinan berhasil disimpan.
          </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Perizinan berhasil diubah.
          </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Perizinan berhasil dihapus.
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
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nama Santri</th>
                <th>Perizinan</th>
                <th>Status</th>
                <th class='aksi'>
                  Aksi
                </th>
              </tr>
            </thead>

            <tbody>
              <?php
              /* Pagination */
              $batas = 5;

              if (isset($cari)) {
                $jumlah_record = mysqli_query($db, "SELECT hsp.idhsp, hsp.nis, hsp.jenis, hsp.stat, santri.nis, santri.nama, hsp.iduser, hsp.tgm, hsp.wtm FROM hsp JOIN santri ON santri.nis = hsp.nis WHERE nama LIKE '%$cari%' OR tgm LIKE '%$cari%'")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              } else {
                $jumlah_record = mysqli_query($db, "SELECT hsp.idhsp, hsp.nis, hsp.jenis, hsp.stat, santri.nis, santri.nama, hsp.iduser, hsp.tgm, hsp.wtm FROM hsp JOIN santri ON santri.nis = hsp.nis")
                  or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
              }

              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($cari)) {
                $query = mysqli_query($db, "SELECT hsp.idhsp, hsp.nis, hsp.jenis, hsp.stat, santri.nis, santri.nama, hsp.iduser, hsp.tgm, hsp.wtm FROM hsp JOIN santri ON santri.nis = hsp.nis WHERE nama LIKE '%$cari%' OR tgm LIKE '%$cari%' ORDER BY tgm DESC LIMIT $mulai, $batas") or die('Ada kesalahan pada query tanggal: ' . mysqli_error($db));
              } else {
                $query = mysqli_query($db, "SELECT hsp.idhsp, hsp.nis, hsp.jenis, hsp.stat, santri.nis, santri.nama, hsp.iduser, hsp.tgm, hsp.wtm FROM hsp JOIN santri ON santri.nis = hsp.nis ORDER BY tgm DESC LIMIT $mulai, $batas") or die('Ada kesalahan pada query tanggal: ' . mysqli_error($db));
              }

              while ($data = mysqli_fetch_assoc($query)) {

                echo "  <tr>
                      <td width='20' >$no</td>
                      <td width='75'>$data[tgm]</td>
                      <td width='50'>$data[wtm]</td>
                      <td width='100'>$data[nama]</td>
                      <td width='50'>$data[jenis]</td>
                      <td width='75'>$data[stat]</td>
                      <td width='150' class='aksi'>
                        <div class='aksi'>

                        <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=detail-hsp&idhsp=$data[idhsp]'> <i class='glyphicon glyphicon-eye-open'></i></a>  

                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=ubah-hsp&idhsp=$data[idhsp]'><i class='glyphicon glyphicon-edit'></i></a>

                        <a data-toggle='tooltip' data-placement='top' title='Verifikasi' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=verifikasi-hsp&idhsp=$data[idhsp]'><i class='glyphicon glyphicon-ok'></i></a>
                       
                        <a data-toggle='tooltip' data-placement='top' title='lapor' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=lapor-hsp&idhsp=$data[idhsp]'><i class='glyphicon glyphicon-hand-up'></i></a>

                        <a data-toggle='tooltip' data-placement='top' title='Kirim' style='margin-right:5px' class='btn btn-warning btn-sm' href='?page=kirim-hsp&idhsp=$data[idhsp]'><i class='glyphicon glyphicon-share'></i></a>  

                          "; ?>

                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="?page=hapus-hsp&idhsp=<?php echo $data['idhsp']; ?>" onclick="return confirm('Anda yakin ingin menghapus perizinan <?php echo $data['nama']; ?>?');"> <i class="glyphicon glyphicon-trash"></i></a>

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
            <ul class="pagination pull-right" class="kirim">
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
                <li class="kirim">
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