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

                <br>

                <li class="list-group-item active">
                    <b>
                        <center>KEHADIRAN
                        </center>
                    </b>
                </li>
</form>

<li class="list-group-item">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class='center'>No</th>
                    <th class='center'>NIS</th>
                    <th class='center'>Nama</th>
                    <th class='center'>Kehadiran</th>
                    <th class='center'>Ket</th>
                    <th class='center'>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $idptm = $idptm;
                $query = mysqli_query($db, "SELECT absensi.*, santri.* FROM absensi JOIN santri ON santri.nis = absensi.nis  WHERE absensi.idptm = $idptm  ORDER BY santri.nis")
                    or die('Ada kesalahan pada query absensi: ' . mysqli_error($db));

                while ($data = mysqli_fetch_assoc($query)) {
                    echo "  <tr>
                      <td width='20' class='center'>$no</td>
                      <td width='50'class='center'>$data[nis]</td>
                      <td width='100'class='center'>$data[nama]</td>
                      <td width='50' class='center'>$data[khd]</td>
                      <td width='75' class='center'>$data[ket]</td>
                      <td width='100'class='center'>
                      <a data-toggle='tooltip' data-placement='top' title='Edit' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=edit-absensi&id=$data[nis]&idptm=$idptm'><i class='glyphicon glyphicon-edit'></i> </a>
                      
                      <a data-toggle='tooltip' data-placement='top' title='Hapus' class='btn btn-danger btn-sm' href='?page=hapus-absensi&id=$data[idabsensi]' onclick='return confirm('Anda yakin ingin menghapus absen ini?')'>
                  <i class='glyphicon glyphicon-trash'></i>
                </a>

                    </tr>";
                    $no++;
                }
                ?>

            <tbody>
                <?php
                $idptm = $idptm;

                $jhadir = mysqli_query($db, "SELECT * FROM absensi WHERE khd='Hadir' AND idptm=$idptm; ");
                $jumhadir  = mysqli_num_rows($jhadir);

                $jsakit = mysqli_query($db, "SELECT * FROM absensi WHERE khd='Sakit' AND idptm=$idptm; ");
                $jumsakit  = mysqli_num_rows($jsakit);

                $jizin = mysqli_query($db, "SELECT * FROM absensi WHERE khd='izin' AND idptm=$idptm; ");
                $jumizin  = mysqli_num_rows($jizin);

                $jalfa = mysqli_query($db, "SELECT * FROM absensi WHERE khd='alfa' AND idptm=$idptm; ");
                $jumalfa  = mysqli_num_rows($jalfa);

                $jumsantri  = $jumhadir + $jumsakit + $jumizin + $jumalfa;

                ?>
            </tbody>
        </table>
    </div>
</li>
<br>
<li class="list-group-item active">
    <center><b>REKAPITULASI</b></center>
</li>
<li class="list-group-item">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td class="center"> Jumlah</td>
                    <td class="center"> Hadir</td>
                    <td class="center"> Sakit</td>
                    <td class="center"> Izin</td>
                    <td class="center"> Alfa</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width='20' class='center'><b><?php echo $jumsantri; ?></b></td>
                    <td width='20' class='center'><b><?php echo $jumhadir; ?></b></td>
                    <td width='20' class='center'><b><?php echo  $jumsakit; ?></b></td>
                    <td width='20' class='center'><b><?php echo  $jumizin; ?></b></td>
                    <td width='20' class='center'><b><?php echo  $jumalfa; ?></b></td>

                </tr>
            <tbody>
        </table>

        </ul>
    </div>
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