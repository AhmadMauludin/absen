<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Detail tanggal absen
            </h4>
        </div> <!-- /.page-header -->
        <?php
        if (isset($_GET['id'])) {
            $id   = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM tanggal WHERE id='$id'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $id         = $data['id'];
                $hari       = $data['hari'];
                $tanggal    = $data['tanggal'];
                $ket        = $data['ket'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">DETAIL DATA</li>
            <li class="list-group-item">id : <?php echo $id; ?></li>
            <li class="list-group-item">Hari, Tanggal : <?php echo $hari ?>, <?php echo $tanggal; ?></li>
            <li class="list-group-item">Keterangan : <?php echo $ket; ?></li>

        </ul>

        <ul class="list-group">
            <li class="list-group-item active">KEHADIRAN</li>
            <li class="list-group-item"></li>
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