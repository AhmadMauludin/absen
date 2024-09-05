  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Ubah data santri
        </h4>
      </div> <!-- /.page-header -->
      <?php
      if (isset($_GET['id'])) {
        $nis   = $_GET['id'];
        $query = mysqli_query($db, "SELECT * FROM santri WHERE nis='$nis'") or die('Query Error : ' . mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $nis           = $data['nis'];
          $nama          = $data['nama'];
          $username  = $data['username'];
          $password  = $data['password'];
          $jenis_kelamin = $data['jenis_kelamin'];
          $kelas         = $data['kelas'];
          $alamat        = $data['alamat'];
          $no_telepon    = $data['no_telepon'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-ubah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIS</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nis" value="<?php echo $nis; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $username; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-3">
                <input type="password" class="form-control" name="password" autocomplete="off" value="<?php echo $password; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-4">
                <?php
                if ($jenis_kelamin == 'Laki-laki') { ?>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                  </label>

                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                  </label>
                <?php
                } else { ?>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                  </label>

                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                  </label>
                <?php
                }
                ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kelas</label>
              <div class="col-sm-3">
                <select class="form-control" name="kelas" placeholder="Pilih kelas" required>
                  <option value="<?php echo $kelas; ?>"><?php echo $kelas; ?></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value="1A">1A</option>
                  <option value="1B">1B</option>
                  <option value="1C">1C</option>
                  <option value="2A">2A</option>
                  <option value="2B">2B</option>
                  <option value="2C">2C</option>
                  <option value="2D">2D</option>
                  <option value="3A">3A</option>
                  <option value="3B">3B</option>
                  <option value="3C">3C</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-3">
                <textarea class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telepon</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $no_telepon; ?>" required>
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