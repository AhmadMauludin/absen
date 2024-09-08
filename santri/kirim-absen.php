<div class="row">
    <div class="col-md-12">

        <br>
        <center>
            <h4>
                <b>Kirim Laporan Absen</b>
            </h4>
        </center>
        <?php
        if (isset($_GET['idabsen'])) {
            $idabsen   = $_GET['idabsen'];
            $query = mysqli_query($db, "SELECT absen.*, santri.*, tanggal.* FROM absen JOIN santri ON santri.nis = absen.nis JOIN tanggal ON tanggal.id = absen.id WHERE idabsen='$idabsen'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $idabsen      = $data['idabsen'];
                $id           = $data['id'];
                $nis          = $data['nis'];
                $s            = $data['s'];
                $d            = $data['d'];
                $a            = $data['a'];
                $m            = $data['m'];
                $i            = $data['i'];
                $hadir        = $data['hadir'];
                $izin         = $data['izin'];
                $alfa         = $data['alfa'];
                $tazir        = $data['tazir'];

                $nama         = $data['nama'];
                $no_telepon   = $data['no_telepon'];

                $tanggal      = $data['tanggal'];
                $hari         = $data['hari'];
            }
        }
        ?>




        <div class="form-group">
            <center>

                <a href="https://api.whatsapp.com/send?phone=6289508722030&text=<?php echo "*DETAIL ABSEN SANTRI*" . "%0Akode : " . $idabsen . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AHari, Tanggal : " . $hari . ", " . $tanggal . "%0AShubuh : " . $s . "%0ADzuhur : " . $d . "%0AAshar : " . $a . "%0AMaghrib : " . $m . "%0AIsya : " . $i . "%0AHadir : " . $hadir . "%0AIzin : " . $izin . "%0AAlfa : " . $alfa . "%0ATazir : " . $tazir; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> Admin</a>

                <a href="https://api.whatsapp.com/send?phone=<?php echo $no_telepon; ?>&text=<?php echo "*DETAIL ABSEN SANTRI*" . "%0Akode : " . $idabsen . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AHari, Tanggal : " . $hari . ", " . $tanggal . "%0AShubuh : " . $s . "%0ADzuhur : " . $d . "%0AAshar : " . $a . "%0AMaghrib : " . $m . "%0AIsya : " . $i . "%0AHadir : " . $hadir . "%0AIzin : " . $izin . "%0AAlfa : " . $alfa . "%0ATazir : " . $tazir; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> Orangtua </a>


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
                            <li><a href="https://api.whatsapp.com/send?phone=<?php echo $data1["telp"]; ?>&text=<?php echo "*DETAIL ABSEN SANTRI*" . "%0Akode : " . $idabsen . "%0ANIS : " . $nis . "%0ANama Santri : " . $nama . "%0AHari, Tanggal : " . $hari . ", " . $tanggal . "%0AShubuh : " . $s . "%0ADzuhur : " . $d . "%0AAshar : " . $a . "%0AMaghrib : " . $m . "%0AIsya : " . $i . "%0AHadir : " . $hadir . "%0AIzin : " . $izin . "%0AAlfa : " . $alfa . "%0ATazir : " . $tazir; ?>" target="_blank"><?php echo $data1["nama"] . " - " . $data1["jabatan"]; ?></a></li>

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