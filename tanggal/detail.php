<div class="row">
    <div class="col-md-12">
        <br>
        <?php
        if (isset($_GET['id'])) {
            $id   = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM tanggal WHERE id='$id'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $id         = $data['id'];
                $hari       = $data['hari'];
                $tanggal    = $data['tanggal'];
                $ket        = $data['ket'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">
                <center><b>DETAIL KEHADIRAN</b>
                    <br>
                    <?php echo $hari ?>, <?php echo $tanggal; ?>
                </center>
            </li>

            <li class="list-group-item">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class='center'>No.</th>
                                <th>Nama</th>
                                <th class='center'>S</th>
                                <th class='center'>D</th>
                                <th class='center'>A</th>
                                <th class='center'>M</th>
                                <th class='center'>I</th>
                                <th class='center'>Hadir</th>
                                <th class='center'>Izin</th>
                                <th class='center'>Alfa</th>
                                <th class='center'>Tazir</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $idtanggal = $id;
                            $query = mysqli_query($db, "SELECT absen.*, santri.nis, santri.nama , tanggal.hari, tanggal.tanggal FROM absen JOIN santri ON santri.nis = absen.nis JOIN tanggal ON tanggal.id = absen.id WHERE absen.id = $idtanggal  ORDER BY santri.nis")
                                or die('Ada kesalahan pada query absen: ' . mysqli_error($db));

                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "  <tr>
                      <td width='20' class='center'>$no</td>
                      <td width='150'>$data[nama]</td>
                      <td width='20' class='center'>$data[s]</td>
                      <td width='20' class='center'>$data[d]</td>
                      <td width='20' class='center'>$data[a]</td>
                      <td width='20' class='center'>$data[m]</td>
                      <td width='20' class='center'>$data[i]</td>
                      <td width='25' class='center'>$data[hadir]</td>
                      <td width='25' class='center'>$data[izin]</td>
                      <td width='25' class='center'>$data[alfa]</td>
                      <td width='50' class='center'>$data[tazir]</td>
                    </tr>";
                                $no++;
                            }
                            ?>

                        <tbody>
                            <?php
                            $idtanggal = $id;
                            $js = mysqli_query($db, "SELECT * FROM absen WHERE s='1' AND id=$idtanggal; ");
                            $jums  = mysqli_num_rows($js);

                            $jd = mysqli_query($db, "SELECT * FROM absen WHERE d='1' AND id=$idtanggal; ");
                            $jumd  = mysqli_num_rows($jd);

                            $ja = mysqli_query($db, "SELECT * FROM absen WHERE a='1' AND id=$idtanggal; ");
                            $juma  = mysqli_num_rows($ja);

                            $jm = mysqli_query($db, "SELECT * FROM absen WHERE m='1' AND id=$idtanggal; ");
                            $jumm  = mysqli_num_rows($jm);

                            $ji = mysqli_query($db, "SELECT * FROM absen WHERE i='1' AND id=$idtanggal; ");
                            $jumi  = mysqli_num_rows($ji);

                            $jtazirb = mysqli_query($db, "SELECT * FROM absen WHERE tazir='Belum' AND id=$idtanggal; ");
                            $jumtazirb  = mysqli_num_rows($jtazirb);

                            $jtazirs = mysqli_query($db, "SELECT * FROM absen WHERE tazir='Sudah' AND id=$idtanggal; ");
                            $jumtazirs  = mysqli_num_rows($jtazirs);

                            $jtazirt = mysqli_query($db, "SELECT * FROM absen WHERE tazir='Tidak' AND id=$idtanggal; ");
                            $jumtazirt  = mysqli_num_rows($jtazirt);

                            $ditazir  = $jumtazirb + $jumtazirs;



                            echo "  <tr>
                      <td width='20' class='center'></td>
                      <td width='150'><b>Jumlah</b></td>
                      <td width='20' class='center'><b>$jums</b></td>
                      <td width='20' class='center'><b>$jumd</b></td>
                      <td width='20' class='center'><b>$juma</b></td>
                      <td width='20' class='center'><b>$jumm</b></td>
                      <td width='20' class='center'><b>$jumi</b></td>

                    </tr>";

                            ?>
                        </tbody>
                    </table>
                </div>
                </option>
            </li>
        </ul>

        <ul class="list-group">
            <li class="list-group-item active">TAZIRAN</li>
            <li class="list-group-item">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td class="center"> Ditazir</td>
                                <td class="center"> Sudah</td>
                                <td class="center"> Belum</td>
                                <td class="center"> Selamat</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width='20' class='center'><b><?php echo $ditazir; ?></b></td>
                                <td width='20' class='center'><b><?php echo $jumtazirs; ?></b></td>
                                <td width='20' class='center'><b><?php echo $jumtazirb; ?></b></td>
                                <td width='20' class='center'><b><?php echo $jumtazirt; ?></b></td>

                            </tr>
                        <tbody>
                    </table>
            <li class="list-group-item"><b>Ket :</b> <?php echo $ket; ?></li>

        </ul>
    </div>
    </option>
    </li>
    </ul>

    <div class="form-group">
        <a href="?page=tampil-data-tanggal" class="btn btn-default btn-reset">Kembali</a>
    </div>
</div>
</form>
</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->