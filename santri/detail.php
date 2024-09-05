<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Detail data siswa
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

        <ul class="list-group">
            <li class="list-group-item active">DETAIL DATA</li>
            <li class="list-group-item">NIS : <?php echo $nis; ?></li>
            <li class="list-group-item">Nama : <?php echo $nama; ?></li>
            <li class="list-group-item">Username : <?php echo $username; ?>
            <li class="list-group-item">Password : <?php echo $password; ?>
            <li class="list-group-item">Jenis Kelamin : <?php echo $jenis_kelamin; ?></li>
            <li class="list-group-item">Kelas : <?php echo $kelas; ?></li>
            <li class="list-group-item">Alamat : <?php echo $alamat; ?></li>
            <li class="list-group-item">Telepon : <?php echo $no_telepon; ?></li>
        </ul>

        <div class="form-group">
            <a href="index.php" class="btn btn-default btn-reset">Kembali</a>
        </div>
    </div>
    </form>
</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->