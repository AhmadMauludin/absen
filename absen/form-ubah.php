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
        $query = mysqli_query($db, "SELECT absen.*, santri.nis, santri.nama , tanggal.hari, tanggal.tanggal FROM absen JOIN santri ON santri.nis = absen.nis JOIN tanggal ON tanggal.id = absen.id WHERE idabsen='$idabsen'") or die('Query Error : ' . mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $idabsen    = $data['idabsen'];
          $id         = $data['id'];
          $hari       = $data['hari'];
          $tanggal    = $data['tanggal'];
          $nis        = $data['nis'];
          $nama       = $data['nama'];
          $s       = $data['s'];
          $d       = $data['d'];
          $a       = $data['s'];
          $m       = $data['m'];
          $i       = $data['i'];
          $hadir      = $data['hadir'];
          $izin       = $data['izin'];
          $alfa       = $data['alfa'];
          $tazir      = $data['tazir'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="?page=perbaharui-absen">
            <div class="form-group">
              <label class="col-sm-2 control-label">idabsen</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="idabsen" value="<?php echo $idabsen; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Hari, Tanggal</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="harita" autocomplete="off" value="<?php echo $hari . ", " . $tanggal; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Shubuh</label>
              <div class="col-sm-1">
                <select class="form-control" name="s" placeholder="Shubuh" required>
                  <option value="<?php echo $s; ?>">
                    <?php
                    if ($s == "1") {
                      echo "Hadir";
                    } else {
                      echo "Tidak";
                    }
                    ?>
                  </option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Dzuhur</label>
              <div class="col-sm-1">
                <select class="form-control" name="d" placeholder="Dzuhur" required>
                  <option value="<?php echo $d; ?>">
                    <?php
                    if ($d == "1") {
                      echo "Hadir";
                    } else {
                      echo "Tidak";
                    }
                    ?>
                  </option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Ashar</label>
              <div class="col-sm-1">
                <select class="form-control" name="a" placeholder="Ashar" required>
                  <option value="<?php echo $a; ?>">
                    <?php
                    if ($a == "1") {
                      echo "Hadir";
                    } else {
                      echo "Tidak";
                    }
                    ?>
                  </option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Maghrib</label>
              <div class="col-sm-1">
                <select class="form-control" name="m" placeholder="Maghrib" required>
                  <option value="<?php echo $m; ?>">
                    <?php
                    if ($m == "1") {
                      echo "Hadir";
                    } else {
                      echo "Tidak";
                    }
                    ?>
                  </option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Isya</label>
              <div class="col-sm-1">
                <select class="form-control" name="i" placeholder="Isya" required>
                  <option value="<?php echo $i; ?>">
                    <?php
                    if ($i == "1") {
                      echo "Hadir";
                    } else {
                      echo "Tidak";
                    }
                    ?>
                  </option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Hadir</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="hadir" autocomplete="off" value="<?php echo $hadir; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Izin</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="izin" autocomplete="off" value="<?php echo $izin; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alfa</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="alfa" autocomplete="off" value="<?php echo $alfa; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tazir</label>
              <div class="col-sm-1">
                <select class="form-control" name="tazir" placeholder="Satatus taziran" required>
                  <option value="<?php echo $tazir; ?>"><?php echo $tazir; ?></option>
                  <option value="Belum">Belum</option>
                  <option value="Sudah">Sudah</option>
                  <option value="Tidak">Tidak</option>
                </select>
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