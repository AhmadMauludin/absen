<?php
// set the default timezone to use.
date_default_timezone_set('UTC');

$today =  date("Y-m-d")
?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input absensi <?php echo $today ?>
      </h4>
    </div> <!-- /.page-header -->

    <div class="panel panel-default">
      <div class="panel-body">



        <form class="form-horizontal" method="POST" action="proses-simpan.php">

          <div class="form-group">

            <div class="form-group">
              <label class="col-sm-2 control-label">Hari, Tanggal</label>
              <div class="col-sm-3">
                <select class="form-control" name="id" placeholder="Pilih" required>

                  <?php
                  $query = "SELECT * FROM tanggal";
                  $result = mysqli_query($db, $query);
                  foreach ($result as $data) {
                  ?>

                    <option value=" <?php echo $data["id"]; ?> "> <?php echo $data["hari"] . ", " . $data["tanggal"]; ?></option>

                  <?php
                  }
                  ?>
                </select>

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-3">
                <select class="form-control" name="nis" placeholder="Pilih" required>
                  <option value="">Nama Santri</option>

                  <?php
                  $query = "SELECT * FROM santri";
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
              <label class="col-sm-2 control-label">Shubuh</label>
              <div class="col-sm-1">
                <select class="form-control" name="s" placeholder="Pilih" required>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Dzuhur</label>
              <div class="col-sm-1">
                <select class="form-control" name="d" placeholder="Pilih" required>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Ashar</label>
              <div class="col-sm-1">
                <select class="form-control" name="a" placeholder="Pilih" required>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Maghrib</label>
              <div class="col-sm-1">
                <select class="form-control" name="m" placeholder="Pilih" required>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Isya</label>
              <div class="col-sm-1">
                <select class="form-control" name="i" placeholder="Pilih" required>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>

            <div class=" form-group">
              <label class="col-sm-2 control-label">Izin</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="izin" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tazir</label>
              <div class="col-sm-1">
                <select class="form-control" name="tazir" placeholder="Pilih" required>
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
                <a href="index.php" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->