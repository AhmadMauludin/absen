  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Input data siswa
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-simpan.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIS</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nis" maxlength="6" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Santri</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-4">
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kelas Mengaji</label>
              <div class="col-sm-3">
                <select class="form-control" name="kelas" placeholder="Pilih Kelas" required>
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
              <label class="col-sm-2 control-label">Kelas Sekolah</label>
              <div class="col-sm-3">
                <select class="form-control" name="kelsek" placeholder="Pilih Kelas Sekolah" required>
                  <option value=""></option>
                  <option value="7A">7A</option>
                  <option value="7B">7B</option>
                  <option value="7C">7C</option>
                  <option value="7D">7D</option>
                  <option value="8A">8A</option>
                  <option value="8B">8B</option>
                  <option value="8C">8C</option>
                  <option value="8D">8D</option>
                  <option value="9A">9A</option>
                  <option value="9B">9B</option>
                  <option value="9C">9C</option>
                  <option value="9D">9D</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12A">12A</option>
                  <option value="12B">12B</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asrama</label>
              <div class="col-sm-3">
                <select class="form-control" name="asrama" placeholder="Pilih Asrama" required>
                  <option value=""></option>
                  <option value="Abu Bakar 1">Abu Bakar 1</option>
                  <option value="Abu Bakar 2">Abu Bakar 2</option>
                  <option value="Abu Bakar 3">Abu Bakar 3</option>
                  <option value="Abu Bakar 4">Abu Bakar 4</option>
                  <option value="Abu Bakar 5">Abu Bakar 5</option>
                  <option value="Umar Bin Khottob 1">Umar Bin Khottob 1</option>
                  <option value="Umar Bin Khottob 2">Umar Bin Khottob 2</option>
                  <option value="Umar Bin Khottob 3">Umar Bin Khottob 3</option>
                  <option value="Umar Bin Khottob 4">Umar Bin Khottob 4</option>
                  <option value="Umar Bin Khottob 5">Umar Bin Khottob 5</option>
                  <option value="Utsman Bin Affan 1">Utsman Bin Affan 1</option>
                  <option value="Utsman Bin Affan 2">Utsman Bin Affan 2</option>
                  <option value="Utsman Bin Affan 3">Utsman Bin Affan 3</option>
                  <option value="Utsman Bin Affan 4">Utsman Bin Affan 4</option>
                  <option value="Utsman Bin Affan 5">Utsman Bin Affan 5</option>
                  <option value="Aisyah 1">Aisyah 1</option>
                  <option value="Aisyah 2">Aisyah 2</option>
                  <option value="Aisyah 3">Aisyah 3</option>
                  <option value="Aisyah 4">Aisyah 4</option>
                  <option value="Aisyah 5">Aisyah 5</option>
                  <option value="Khodijah 1">Khodijah 1</option>
                  <option value="Khodijah 2">Khodijah 2</option>
                  <option value="Khodijah 3">Khodijah 3</option>
                  <option value="Khodijah 4">Khodijah 4</option>
                  <option value="Khodijah 5">Khodijah 5</option>
                  <option value="Khodijah 6">Khodijah 6</option>
                  <option value="Khodijah 7">Khodijah 7</option>
                  <option value="Khodijah 8">Khodijah 8</option>
                  <option value="Khodijah 9">Khodijah 9</option>
                  <option value="Khodijah 10">Khodijah 10</option>
                  <option value="Khodijah 11">Khodijah 11</option>
                  <option value="Fatimah 1">Fatimah 1</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-3">
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telepon</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="foto" autocomplete="off" required>
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