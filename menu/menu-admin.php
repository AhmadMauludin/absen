<div class="container-fluid"> <!-- /.container-fluid -->
    <img alt="Brand" src="assets/img/favicon.png" height="42" width="auto">

    <a href="index.php"> <button type="button" class="btn btn-default navbar-btn" title="Dashboard"><i class="glyphicon glyphicon-home"></i></button></a>

    <a href="?page=tampil-data-santri"> <button type="button" class="btn btn-default navbar-btn" title="Santri"><i class="glyphicon glyphicon-user"></i></button></a>

    <a href="?page=tampil-data-tanggal"> <button type="button" class="btn btn-default navbar-btn" title="Tanggal Absen Solat"><i class="glyphicon glyphicon-calendar"></i></button></a>

    <a href="?page=tampil-data-absen"> <button type="button" class="btn btn-default navbar-btn" title="Absen"><i class="glyphicon glyphicon-list-alt"></i></button></a>

    <a href="?page=tampil-data-hsp"> <button type="button" class="btn btn-default navbar-btn" title="HSP"><i class="glyphicon glyphicon-hourglass"></i></button></a>

    <a href="?page=tampil-ptm"> <button type="button" class="btn btn-default navbar-btn" title="Pertemuan"><i class="glyphicon glyphicon-ok-circle"></i></button></a>

    <div class="btn-group">
        <button type="button" class="btn btn-default">
            <b><?php echo $_SESSION['level']; ?> </b></button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="?page=profile">Profile - <?php echo $_SESSION['iduser']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="backup.php">Backup DB</a></li>
        </ul>
    </div>
</div> <!-- /.container-fluid -->