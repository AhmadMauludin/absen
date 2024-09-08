<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <center>
                <h4>
                    <b>K I R I M - L A P O R A N</b>
                </h4>
            </center>
        </div> <!-- /.page-header -->
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
                $iduser         = $data['iduser'];
                $stat           = $data['stat'];
                $tgs            = $data['tgs'];
                $wts            = $data['wts'];
                $lapor          = $data['lapor'];
                $tgl            = $data['tgl'];
                $wtl            = $data['wtl'];
                $no_telepon     = $data['no_telepon'];
                $username       = $data['username'];
            }
        }
        ?>


        <div class="form-group">
            <center>

                <a href="https://api.whatsapp.com/send?phone=6289508722030&text=<?php echo "*DETAIL PERIZINAN SANTRI*" . "%0Akode : " . $idhsp . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AJenis Kelamin : " . $jenis_kelamin . "%0AKelas : " . $kelas . "%0APerizinan : " . $jenis . "%0AKeterangan : " . $ket . "%0ATanggal Mulai : " . $tgm . "%0AWaktu Mulai : " . $wtm . "%0APemberi Izin : " . $username . "%0AStatus : " . $stat . "%0ATanggal Selesai : " . $tgs . "%0AWaktu Selesai : " . $wts . "%0ALaporan : " . $lapor . "%0ATanggal Lapor : " . $tgl . "%0AWaktu Lapor : " . $wtl; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> Admin</a>

                <a href="https://api.whatsapp.com/send?phone=<?php echo $no_telepon; ?>&text=<?php echo "*DETAIL PERIZINAN SANTRI*" . "%0Akode : " . $idhsp . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AJenis Kelamin : " . $jenis_kelamin . "%0AKelas : " . $kelas . "%0APerizinan : " . $jenis . "%0AKeterangan : " . $ket . "%0ATanggal Mulai : " . $tgm . "%0AWaktu Mulai : " . $wtm . "%0APemberi Izin : " . $username . "%0AStatus : " . $stat . "%0ATanggal Selesai : " . $tgs . "%0AWaktu Selesai : " . $wts . "%0ALaporan : " . $lapor . "%0ATanggal Lapor : " . $tgl . "%0AWaktu Lapor : " . $wtl; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> Orangtua </a>


                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default">
                        atau ke : </button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">

                        <?php
                        $query = "SELECT * FROM staf";
                        $result = mysqli_query($db, $query);
                        foreach ($result as $data1) {
                        ?>
                            <li><a href="https://api.whatsapp.com/send?phone=<?php echo $data1["telp"]; ?>&text=<?php echo "*DETAIL PERIZINAN SANTRI*" . "%0Akode : " . $idhsp . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AJenis Kelamin : " . $jenis_kelamin . "%0AKelas : " . $kelas . "%0APerizinan : " . $jenis . "%0AKeterangan : " . $ket . "%0ATanggal Mulai : " . $tgm . "%0AWaktu Mulai : " . $wtm . "%0APemberi Izin : " . $username . "%0AStatus : " . $stat . "%0ATanggal Selesai : " . $tgs . "%0AWaktu Selesai : " . $wts . "%0ALaporan : " . $lapor . "%0ATanggal Lapor : " . $tgl . "%0AWaktu Lapor : " . $wtl; ?>" target="_blank"><?php echo $data1["nama"] . " - " . $data1["jabatan"]; ?></a></li>

                        <?php
                        }
                        ?>



                    </ul>
                </div>
            </center>
        </div>

        <div class="form-group">
            <center>
                <a href="index.php" class="btn btn-default">Kembali</a>
            </center>
        </div>


    </div>
    </form>


</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->