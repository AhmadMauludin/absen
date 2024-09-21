 <!--- untuk mengecek sesi di index -->
 <?php
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    ?>

 <!--- untuk menampilkan menu sesuai dengan level -->
 <?php
    if ($_SESSION['level'] == "admin") {
        include 'menu-admin.php';
    } else if ($_SESSION['level'] == "pengurus") {
        include 'menu/menu-pengurus.php';
    }
    ?>