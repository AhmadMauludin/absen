  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Ubah data perizinan
        </h4>
      </div> <!-- /.page-header -->
      <?php
      if (isset($_GET['idhsp'])) {
        $idhsp   = $_GET['idhsp'];
        $query = mysqli_query($db, "SELECT hsp.*, santri.*, user.* FROM hsp JOIN santri ON santri.nis = hsp.nis JOIN user ON user.iduser = hsp.iduser WHERE idhsp='$idhsp'") or die('Query Error : ' . mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $idhsp          = $data['idhsp'];
          $nis            = $data['nis'];
          $nama           = $data['nama'];
          $jenis_kelamin  = $data['jenis_kelamin'];
          $kelas          = $data['kelas'];
          $jenis          = $data['jenis'];
          $ket            = $data['ket'];
          $tgm            = $data['tgm'];
          $wtm            = $data['wtm'];
          $iduser       = $data['iduser'];
          $stat           = $data['stat'];
          $tgs            = $data['tgs'];
          $wts            = $data['wts'];
          $lapor          = $data['lapor'];
          $tgl            = $data['tgl'];
          $wtl            = $data['wtl'];

          $username       = $data['username'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="?page=perbaharui-hsp">

            <div class="form-group">
              <label class="col-sm-2 control-label">Id HSP</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="nis" value="<?php echo $idhsp; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-3">
                <select class="form-control" name="nis" placeholder="Pilih" required>
                  <option value="$nis"><?php echo $nama; ?></option>

                  <?php
                  $query1 = "SELECT * FROM santri";
                  $result1 = mysqli_query($db, $query1);
                  foreach ($result1 as $data1) {
                  ?>

                    <option value=" <?php echo $data1["nis"]; ?> "> <?php echo $data1["nama"]; ?> </option>

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
                  <option value="$jenis"><?php echo $jenis; ?></option>
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
                <textarea class="form-control" name="ket" rows="3" required><?php echo $ket; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Perizinan</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="tgm" value="<?php echo $tgm; ?>" autocomplete="off">
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
                  <input type="time" class="form-control time-picker" name="wtm" value="<?php echo $wtm; ?>" autocomplete="off">
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
                  <option value="<?php echo $stat; ?>"><?php echo $stat; ?></option>
                  <option value="Belum Selesai">Belum Selesai</option>
                  <option value="Sudah Selesai">Selesai</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgs" autocomplete="off" value="<?php echo $tgs; ?>" required>
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
                  <input type="time" class="form-control time-picker" name="wts" value="<?php echo $wts; ?>" autocomplete="off">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-time"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Lapor</label>
              <div class="col-sm-2">
                <select class="form-control" name="lapor" placeholder="Lapor" required>
                  <option value="<?php echo $lapor; ?>"><?php echo $lapor; ?></option>
                  <option value="Belum Lapor">Belum Lapor</option>
                  <option value="Sudah Lapor">Sudah Lapor</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lapor</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl" autocomplete="off" value="<?php echo $tgl; ?>" required>
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
                  <input type="time" class="form-control time-picker" name="wtl" value="<?php echo $wtl; ?>" autocomplete="off">
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
                <a href="?page=tampil-data-hsp" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->