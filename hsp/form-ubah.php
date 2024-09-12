  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Verifikasi Perizinan
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
          $iduser         = $data['iduser'];
          $stat           = $data['stat'];
          $tgs            = $data['tgs'];
          $wts            = $data['wts'];
          $lapor          = $data['lapor'];
          $tgl            = $data['tgl'];
          $wtl            = $data['wtl'];
          $username         = $data['username'];
        }
      }
      ?>
      <div class="panel panel-default">

        <ul class="list-group">
          <li class="list-group-item active">
            <center><b>DETAIL DATA PERIZINAN</b></center>
          </li>
          <li class="list-group-item">Kode Perizinan : <?php echo $idhsp; ?></li>
          <li class="list-group-item">NIS : <?php echo $nis; ?></li>
          <li class="list-group-item">Nama : <?php echo $nama; ?></li>
          <li class="list-group-item">Jenis Kelamin : <?php echo $jenis_kelamin; ?></li>
          <li class="list-group-item">Kelas : <?php echo $kelas; ?></li>
          <li class="list-group-item">Jenis : <?php echo $jenis; ?></li>
          <li class="list-group-item">Keterangan : <?php echo $ket; ?>
          <li class="list-group-item">Pemberi Izin : <?php echo $username; ?>
          <li class="list-group-item">Tanggal Mulai : <?php echo $tgm; ?>
          <li class="list-group-item">Waktu Mulai : <?php echo $wtm; ?>
        </ul>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="?page=perbaharui-hsp">

            <input type="hidden" name="idhsp" value="<?php echo $idhsp; ?>">

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-2">
                <select class="form-control" name="stat" placeholder="Pilih">
                  <option value="<?php echo $stat; ?>"><?php echo $stat; ?></option>
                  <option value="Diizinkan">Diizinkan</option>
                  <option value="Ditolak">Ditolak</option>
                  <option value="Berlangsung">Berlangsung</option>
                  <option value="Selesai">Selesai</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-2">
                <input type="date" name="tgs" class="form-control" value="<?php echo $tgs; ?>">
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
                <select class="form-control" name="lapor" placeholder="Lapor">
                  <option value="<?php echo $lapor; ?>"><?php echo $lapor; ?></option>
                  <option value="Belum Lapor">Belum Lapor</option>
                  <option value="Sudah Lapor">Sudah Lapor</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lapor</label>
              <div class="col-sm-2">
                <input type="date" name="tgl" class="form-control" value="<?php echo $tgl; ?>">
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