<?php
// set the default timezone to use.
date_default_timezone_set('UTC');

$today =  date("Y-m-d");
?>
<br>

<?php
if (isset($_GET['idptm'])) {
    $idptm   = $_GET['idptm'];
    $query0 = mysqli_query($db, "SELECT ptm.*, jadwal.*, staf.* FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis WHERE idptm='$idptm'") or die('Query Error : ' . mysqli_error($db));
    while ($data0  = mysqli_fetch_assoc($query0)) {
        $idptm    = $data0['idptm'];
        $mapel    = $data0['mapel'];
        $nama    = $data0['nama'];
        $kelas    = $data0['kelas'];
        $materi    = $data0['materi'];
        $tanggal    = $data0['tanggal'];
        $hari    = $data0['hari'];
        $jam_mulai    = $data0['jam_mulai'];
    }
}
?>


<?php
if (isset($_GET['id'])) {
    $nis   = $_GET['id'];
    $query1 = mysqli_query($db, "SELECT * FROM santri WHERE nis='$nis'") or die('Query Error : ' . mysqli_error($db));
    while ($data1  = mysqli_fetch_assoc($query1)) {
        $nis    = $data1['nis'];
        $nama    = $data1['nama'];
    }
}
?>

<center><b> <?php echo $mapel . ' - ' . $kelas . ' (' . $tanggal . ' Pukul ' . $jam_mulai . ')' ?> </b></center>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">



                <form class="form-horizontal" method="POST" action="?page=simpan-absensi">

                    <div class="form-group">

                        <?php
                        $idptm = $idptm;
                        $nis = $nis;
                        $query2 = "SELECT * FROM ptm where ptm.idptm = $idptm";
                        $result2 = mysqli_query($db, $query2);
                        foreach ($result2 as $data2) {
                        }
                        ?>

                        <input type="hidden" class="form-control" name="idptm" autocomplete="off" value="<?php echo $data2["idptm"]; ?>">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Santri</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="nis" placeholder="Pilih" required>
                                    <?php
                                    $idptm = $idptm;
                                    $nis = $nis;
                                    $query = "SELECT * FROM santri where santri.nis = $nis";
                                    $result = mysqli_query($db, $query);
                                    foreach ($result as $data) {
                                    ?>

                                        <option value=" <?php echo $data["nis"]; ?> "> <?php echo $data["nama"]; ?> </option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kehadiran</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="khd" placeholder="Pilih" required>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Alfa">Alfa</option>
                                </select>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="ket" autocomplete="off">
                            </div>
                        </div>

                        <hr />
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
                                <a href="?page=tampil-data-absen" class="btn btn-default btn-reset">Batal</a>
                            </div>
                        </div>
                </form>
            </div> <!-- /.panel-body -->
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->