<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input Perizinan
      </h4>
    </div> <!-- /.page-header -->

    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="?page=simpan-hsp">

          <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser']; ?>">

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
              <select class="form-control" name="stat" placeholder="Status Perizinan" required>
                <option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
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

          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
              <a href=" ?page=tampil-data-hsp" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->