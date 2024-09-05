<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Detail Perizinan
            </h4>
        </div> <!-- /.page-header -->
        <?php
        if (isset($_GET['idhsp'])) {
            $idhsp   = $_GET['idhsp'];
            $query = mysqli_query($db, "SELECT hsp.*, santri.nama, santri.jenis_kelamin, santri.kelas FROM hsp JOIN santri ON santri.nis = hsp.nis WHERE idhsp='$idhsp'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $idhsp          = $data['idhsp'];
                $nis            = $data['nis'];
                $nama           = $data['nama'];
                $jenis_kelamin  = $data['jenis_kelamin'];
                $kelas          = $data['kelas'];
                $jenis          = $data['jenis'];
                $ket            = $data['ket'];
                $tgm            = $data['tgm'];
                $wtm            = $data['wtm'];
                $username       = $data['username'];
                $stat           = $data['stat'];
                $tgs            = $data['tgs'];
                $wts            = $data['wts'];
                $lapor          = $data['lapor'];
                $tgl            = $data['tgl'];
                $wtl            = $data['wtl'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">DETAIL DATA PERIZINAN</li>
            <li class="list-group-item">Kode Perizinan : <?php echo $idhsp; ?></li>
            <li class="list-group-item">NIS : <?php echo $nis; ?></li>
            <li class="list-group-item">Nama : <?php echo $nama; ?></li>
            <li class="list-group-item">Jenis Kelamin : <?php echo $jenis_kelamin; ?></li>
            <li class="list-group-item">Kelas : <?php echo $kelas; ?></li>
            <li class="list-group-item">Jenis : <?php echo $jenis; ?></li>
            <li class="list-group-item">Keterangan : <?php echo $ket; ?>
            <li class="list-group-item">Pemberi Izin : <?php echo $username; ?>
            <li class="list-group-item">Tanggal Mulai : <?php echo $tgm; ?>
            <li class="list-group-item">Waktu Mulai : <?php echo $wtm; ?>
            <li class="list-group-item">Status : <?php echo $stat; ?>
            <li class="list-group-item">Tanggal Selesai : <?php echo $tgs; ?>
            <li class="list-group-item">Waktu Selesai : <?php echo $wts; ?></li>

            <li class="list-group-item active">LAPOR</li>
            <li class="list-group-item">Lapor : <?php echo $lapor; ?></li>
            <li class="list-group-item">Tanggal Lapor : <?php echo $tgl; ?></li>
            <li class="list-group-item">Waktu Lapor : <?php echo $wtl; ?></li>
        </ul>

        <div class="form-group">
            <a href="index.php" class="btn btn-default btn-reset">Kembali</a>
            <a href='?page=kirim&idhsp=$data[idhsp]' class=" btn btn-default btn-reset"><i class="glyphicon glyphicon-share"></i> Kirim</a>
        </div>
    </div>
    </form>


</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->