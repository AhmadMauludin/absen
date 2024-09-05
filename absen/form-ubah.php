  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Ubah data absen
        </h4>
      </div> <!-- /.page-header -->
      <?php
      if (isset($_GET['id'])) {
        $idabsen   = $_GET['id'];
        $query = mysqli_query($db, "SELECT absen.idabsen, absen.id, absen.alfa, absen.tazir, santri.nis, santri.nama , tanggal.hari, tanggal.tanggal FROM absen JOIN santri ON santri.nis = absen.nis JOIN tanggal ON tanggal.id = absen.id WHERE idabsen='$idabsen'") or die('Query Error : ' . mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $idabsen    = $data['idabsen'];
          $id         = $data['id'];
          $hari       = $data['hari'];
          $tanggal    = $data['tanggal'];
          $nis        = $data['nis'];
          $nama       = $data['nama'];
          $alfa       = $data['alfa'];
          $tazir      = $data['tazir'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-ubah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">idabsen</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="idabsen" value="<?php echo $idabsen; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Hari, Tanggal</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="harita" autocomplete="off" value="<?php echo $hari . ", " . $tanggal; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alfa</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" name="alfa" autocomplete="off" value="<?php echo $alfa; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tazir</label>
              <div class="col-sm-3">
                <select class="form-control" name="tazir" placeholder="Satatus taziran" required>
                  <option value="<?php echo $tazir; ?>"><?php echo $tazir; ?></option>
                  <option value="Belum">Belum</option>
                  <option value="Sudah">Sudah</option>
                </select>
              </div>
            </div>

            <hr />
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
                <a href="index.php" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->