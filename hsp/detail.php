<div class="row">
    <div class="col-md-12">
        <br>
        <?php
        if (isset($_GET['idhsp'])) {
            $idhsp   = $_GET['idhsp'];
            $query = mysqli_query($db, "SELECT hsp.*, santri.*, user.* FROM hsp JOIN santri ON santri.nis = hsp.nis JOIN user ON user.iduser = hsp.iduser WHERE idhsp='$idhsp'") or die('Query Error : ' . mysqli_error($db));
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
                $iduser       = $data['iduser'];
                $stat           = $data['stat'];
                $tgs            = $data['tgs'];
                $wts            = $data['wts'];
                $lapor          = $data['lapor'];
                $tgl            = $data['tgl'];
                $wtl            = $data['wtl'];

                $username       = $data['username'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">
                <center><b>DETAIL DATA PERIZINAN</b></center>
            </li>
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

            <li class="list-group-item active kirim">LAPOR</li>
            <li class="list-group-item kirim">Lapor : <?php echo $lapor; ?></li>
            <li class="list-group-item kirim">Tanggal Lapor : <?php echo $tgl; ?></li>
            <li class="list-group-item kirim">Waktu Lapor : <?php echo $wtl; ?></li>
        </ul>

        <div class="form-group">
            <a href="?page=tampil-data-hsp" class="btn btn-default btn-reset kirim">Kembali</a>
            <a href='?page=kirim-hsp&idhsp=$data[idhsp]' class=" btn btn-default btn-reset"><i class="glyphicon glyphicon-share"></i> Kirim</a>
        </div>
    </div>
    </form>


</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->