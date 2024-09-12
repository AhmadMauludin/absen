<?php
$query = mysqli_query($db, "SELECT user.*, staf.* FROM user JOIN staf ON staf.nis = user.nis WHERE iduser='$_SESSION[iduser];'") or die('Query Error : ' . mysqli_error($db));
while ($data    = mysqli_fetch_assoc($query)) {
    $iduser     = $data['iduser'];
    $username   = $data['username'];
    $password   = $data['password'];
    $level      = $data['level'];
    $nis        = $data['nis'];
    $nama       = $data['nama'];
}

?>


<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Buat PTM - <?php echo $nama; ?>

            </h4>
        </div> <!-- /.page-header -->

        <!-- idjadwal, tanggal, materi, metode -->


        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="?page=simpan-ptm">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Id Jadwal</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="idjadwal" placeholder="Pilih" required>
                                <option value="">Pilih jadwal</option>

                                <?php
                                $nis1 = $nis;

                                $query1 = "SELECT jadwal.*, staf.* FROM jadwal JOIN staf ON staf.nis = jadwal.nis";
                                $result1 = mysqli_query($db, $query1);
                                foreach ($result1 as $data1) {
                                ?>

                                    <option value=" <?php echo $data1["idjadwal"]; ?> "> <?php echo $data1["mapel"] ?> Kelas <?php echo  $data1["kelas"]; ?> - <?php echo  $data1["hari"]; ?> <?php echo  $data1["jam_mulai"]; ?> s.d <?php echo  $data1["jam_selesai"]; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-2">
                            <input type="date" name="tanggal" class="form-control" value="<?php echo $tgl; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Metode</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="metode" placeholder="Pilih Hari" required>
                                <option value="Tatap Muka">Tatap Muka</option>
                                <option value="Daring">Daring</option>
                                <option value="Tugas">Tugas</option>
                                <option value="Libur">Libur</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Materi</label>
                        <div class="col-sm-3">
                            <textarea class="form-control" name="materi" rows="3" required></textarea>
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
                            <a href="?page=tampil-ptm" class="btn btn-default btn-reset">Batal</a>
                        </div>
                    </div>
                </form>
            </div> <!-- /.panel-body -->
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->