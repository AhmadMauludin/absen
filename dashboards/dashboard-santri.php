<div class="row">

    <div class="col-md-12">
        <div class="page-header">
            <center> <b>DASHBOARD SANTRI</b> </center>
        </div>

        <div class="row">

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item active">
                            <?php
                            $query = "SELECT * FROM tanggal";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item"><i class="glyphicon glyphicon-calendar"></i> Pengabsenan</div>
                    </center>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item active">
                            <?php
                            $query = "SELECT * FROM absen";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i> Rekap</div>
                    </center>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item">
                            <?php
                            $query = "SELECT * FROM hsp where jenis='Pulang'";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item active"><i class="glyphicon glyphicon-plane"></i> Pulang</div>
                    </center>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item">
                            <?php
                            $query = "SELECT * FROM hsp where jenis='Sakit'";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item active"><i class="glyphicon glyphicon-bed"></i> Sakit</div>
                    </center>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item">
                            <?php
                            $query = "SELECT * FROM hsp where jenis='Haid'";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item active"><i class="glyphicon glyphicon-tint"></i> Haid</div>
                    </center>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <center>
                        <div class="list-group-item">
                            <?php
                            $query = "SELECT * FROM hsp where jenis='Lainnya'";
                            $result = mysqli_query($db, $query);
                            $jumlah = mysqli_num_rows($result);
                            ?>
                            <h1></b><?php echo $jumlah; ?></b></h1>
                        </div>
                        <div class="list-group-item active"><i class="glyphicon glyphicon-th"></i> Lainnya</div>
                    </center>
                </div>
            </div>

        </div>


    </div> <!-- /.col -->


</div> <!-- /.row -->