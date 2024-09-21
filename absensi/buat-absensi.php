<form class="form-inline" method="POST" action="?page=input-absensi">
    <div class="row">
        <div class="col-md-12">
            <br>
            <?php
            if (isset($_GET['id'])) {
                $idptm   = $_GET['id'];
                $query = mysqli_query($db, "SELECT ptm.*, jadwal.*, staf.* 
                                FROM ptm JOIN jadwal ON jadwal.idjadwal = ptm.idjadwal JOIN staf ON staf.nis = jadwal.nis WHERE idptm='$idptm'") or die('Query Error : ' . mysqli_error($db));
                while ($data  = mysqli_fetch_assoc($query)) {
                    $idptm    = $data['idptm'];
                    $idjadwal = $data['idjadwal'];
                    $tanggal  = $data['tanggal'];
                    $materi   = $data['materi'];
                    $metode   = $data['metode'];

                    $hari  = $data['hari'];
                    $mapel = $data['mapel'];
                    $nis   = $data['nis'];
                    $nama  = $data['nama'];
                    $kelas = $data['kelas'];
                    $jam_mulai = $data['jam_mulai'];
                    $jam_selesai = $data['jam_selesai'];
                }
            }
            ?>

            <ul class="list-group">
                <li class="list-group-item active">
                    <center><b>DETAIL PERTEMUAN</b></center>
                </li>
                <li class="list-group-item">
                    Hari, Tanggal : <b><?php echo $hari ?>, <?php echo $tanggal ?></b>
                </li>
                <li class="list-group-item">
                    Kelas - Mapel - Materi : <b> <?php echo $kelas; ?> - <?php echo $mapel; ?> - <?php echo $materi; ?></b>
                </li>
                <li class="list-group-item">
                    NIS - Nama Guru : <b><?php echo $nis; ?> - <?php echo $nama; ?></b>
                </li>
                <li class="list-group-item">
                    Waktu : <b><?php echo $jam_mulai; ?> - <?php echo $jam_selesai; ?> WIB</b>
                </li>

</form>

<li class="list-group-item active">
    <b>
        <center>ABSEN
        </center>
    </b>
</li>
<li class="list-group-item">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class='center'>No</th>
                    <th class='center'>NIS</th>
                    <th class='center'>Nama</th>
                    <th class='center'>Hadir</th>
                    <th class='center'>Sakit</th>
                    <th class='center'>Izin</th>
                    <th class='center'>Alfa</th>

                </tr>
            </thead>

            <form method="post" action="simpan-absensi.php">

                <tbody>
                    <?php
                    $no2 = 1;
                    $idptm = $idptm;
                    $kelas = $kelas;
                    $query2 = mysqli_query($db, "SELECT * FROM santri WHERE kelas = '$kelas' ")
                        or die('Ada kesalahan pada query absensi: ' . mysqli_error($db));

                    while ($data2 = mysqli_fetch_assoc($query2)) {
                        echo "  <tr>
                      <td width='20' class='center'>$no2</td>
                      <td width='50'class='center'>$data2[nis]</td>
                      <td width='150'class='center'>$data2[nama] - $idptm</td>
                      <td width='10'class='center'>
<input type='radio' name='khd$data2[nis][]' value='Hadir'/></td>
                      <td width='10'class='center'>
<input type='radio' name='khd$data2[nis][]' value='Sakit'/></td>
                      <td width='10'class='center'>
<input type='radio' name='khd$data2[nis][]' value='Izin'/></td>
                      <td width='10'class='center'>
<input type='radio' name='khd$data2[nis][]' value='Alfa'/></td>



                      </tr>";
                        $no2++;
                    }
                    ?>
        </table>
        </form>

</li>


</ul>

<div class="form-group">
    <a href="?page=tampil-ptm" class="btn btn-default btn-reset">Kembali</a>
</div>
</div>
</form>
</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->