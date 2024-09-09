<div class="row">
    <div class="col-md-12">
        <BR>
        <?php
        if (isset($_GET['id'])) {
            $nis   = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM santri WHERE nis='$nis'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $nis           = $data['nis'];
                $nama          = $data['nama'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">
                <center><b>Detail Absensi</b> <?php echo $nis . " - " . $nama; ?></center>
            </li>
            <li class="list-group-item">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class='center'>No.</th>
                                <th>Hari, Tanggal</th>
                                <th class='center'>S</th>
                                <th class='center'>D</th>
                                <th class='center'>A</th>
                                <th class='center'>M</th>
                                <th class='center'>I</th>
                                <th class='center'>Hadir</th>
                                <th class='center'>Izin</th>
                                <th class='center'>Alfa</th>
                                <th class='center'>Tazir</th>
                                <th class='kirim'>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $nis = $nis;
                            $query = mysqli_query($db, "SELECT absen.*, santri.nis, santri.nama , tanggal.hari, tanggal.tanggal FROM absen JOIN santri ON santri.nis = absen.nis JOIN tanggal ON tanggal.id = absen.id WHERE absen.nis = $nis  ORDER BY tanggal")
                                or die('Ada kesalahan pada query absen: ' . mysqli_error($db));

                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "  <tr>
                      <td width='20' class='center'>$no</td>
                      <td width='100'>$data[hari], $data[tanggal]</td>
                      <td width='20' class='center'>$data[s]</td>
                      <td width='20' class='center'>$data[d]</td>
                      <td width='20' class='center'>$data[a]</td>
                      <td width='20' class='center'>$data[m]</td>
                      <td width='20' class='center'>$data[i]</td>
                      <td width='25' class='center'>$data[hadir]</td>
                      <td width='25' class='center'>$data[izin]</td>
                      <td width='25' class='center'>$data[alfa]</td>
                      <td width='50' class='center'>$data[tazir]</td>
                      <td width='50' class='kirim'><a data-toggle='tooltip' data-placement='top' title='Kirim' style='margin-right:5px' class='btn btn-warning btn-sm' href='?page=kirim-absen-santri&idabsen=$data[idabsen]'><i class='glyphicon glyphicon-share'></i></a></td>
                    </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
        </ul>

        <div class="form-group">
            <a href="?page=tampil-data-santri" class="btn btn-default btn-reset">Kembali</a>
        </div>
    </div>
    </form>
</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->