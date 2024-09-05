<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input Halangan
      </h4>
    </div> <!-- /.page-header -->

    <!-- 
      idhsp
      nis
      jenis
      ket
      tgm
      wtm
      idstaf
      status
      tgs
      wts
      lapor
      tgl
      wtl
      -->



    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="proses-simpan.php">

          <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

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
            <label class="col-sm-2 control-label">Perizinan</label>
            <div class="col-sm-2">
              <select class="form-control" name="jenis" placeholder="Pilih Perizinan" required>
                <option value="">Jenis Perijinan</option>
                <option value="Haid">Haid</option>
                <option value="Sakit">Sakit</option>
                <option value="Pulang">Pulang</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Rincian</label>
            <div class="col-sm-2">
              <textarea class="form-control" name="ket" rows="3" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Perizinan</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgm" autocomplete="off" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Waktu Perizinan</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="time" class="form-control time-picker" name="wtm" autocomplete="off">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-time"></i>
                </span>
              </div>
            </div>
          </div>



          <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-2">
              <select class="form-control" name="stat" placeholder="Pilih Perizinan" required>
                <option value="Belum Selesai">Belum Selesai</option>
                <option value="Sudah Selesai">Selesai</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Selesai</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgs" autocomplete="off" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Waktu Selesai</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="time" class="form-control time-picker" name="wts" autocomplete="off">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-time"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Lapor</label>
            <div class="col-sm-2">
              <select class="form-control" name="lapor" placeholder="Pilih Jenis Perizinan" required>
                <option value="Belum Lapor">Belum Lapor</option>
                <option value="Sudah Lapor">Sudah Lapor</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Lapor</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl" autocomplete="off">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Waktu Lapor</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="time" class="form-control time-picker" name="wtl" autocomplete="off">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-time"></i>
                </span>
              </div>
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