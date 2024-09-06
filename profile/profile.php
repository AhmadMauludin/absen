<style type="text/css">
    .responsive {
        width: 100%;
        max-width: 130px;
        height: auto;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <center> <b> P R O F I L E </b> </center>
        </div> <!-- /.page-header -->

        <?php
        $query = mysqli_query($db, "SELECT * FROM user WHERE iduser='$_SESSION[iduser];'") or die('Query Error : ' . mysqli_error($db));
        while ($data    = mysqli_fetch_assoc($query)) {
            $iduser     = $data['iduser'];
            $username   = $data['username'];
            $password   = $data['password'];
            $level      = $data['level'];
            $nis        = $data['nis'];
        }

        ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="proses-user-ubah.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">User id</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="nis" value="<?php echo $iduser; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-2">
                            <input class="form-control" name="level" autocomplete="off" value="<?php echo $level; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $username; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-2">
                            <input class="form-control" name="password" autocomplete="off" value="<?php echo $password; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Update">
                        </div>
                    </div>
                </form>

                <hr>

                <?php

                $nis1 = $nis;
                $query1 = mysqli_query($db, "SELECT * FROM staf WHERE nis='$nis1'") or die('Query Error : ' . mysqli_error($db));
                while ($data1    = mysqli_fetch_assoc($query1)) {
                    $nis    = $data1['nis'];
                    $nama   = $data1['nama'];
                    $telp   = $data1['telp'];
                    $email  = $data1['email'];
                    $jabatan      = $data1['jabatan'];
                    $foto   = $data1['foto'];
                }

                ?>

                <form class="form-horizontal" method="POST" action="proses-staf-ubah.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="nis" value="<?php echo $nis; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jabatan</label>
                        <div class="col-sm-2">
                            <input class="form-control" name="password" autocomplete="off" value="<?php echo $jabatan; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-2">
                            <input class="form-control" name="level" autocomplete="off" value="<?php echo $nama; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">No Telp</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $telp; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-2">
                            <input class="form-control" name="password" autocomplete="off" value="<?php echo $email; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <a href="#" class="thumbnail">
                                        <?php echo "<img src='assets/img/$foto' width='auto' height='100' ; />"; ?>
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" name="password" autocomplete="off" value="<?php echo $foto; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Update">
                        </div>
                    </div>
                </form>
                <hr>
                <a href="index.php" class="btn btn-default btn-reset">Kembali</a>
            </div>
        </div>


    </div> <!-- /.col -->
</div> <!-- /.row -->