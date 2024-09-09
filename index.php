<?php
require_once "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Smartren | Dashboard</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/datepicker.min.css" rel="stylesheet">

  <!-- styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fungsi untuk membatasi karakter yang diinputkan -->
  <script language="javascript">
    function getkey(e) {
      if (window.event)
        return window.event.keyCode;
      else if (e)
        return e.which;
      else
        return null;
    }

    function goodchars(e, goods, field) {
      var key, keychar;
      key = getkey(e);
      if (key == null) return true;

      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      goods = goods.toLowerCase();

      // check goodkeys
      if (goods.indexOf(keychar) != -1)
        return true;
      // control keys
      if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
        return true;

      if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
          if (field == field.form.elements[i])
            break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
      };
      // else return false
      return false;
    }
  </script>

  <style>
    @media print {

      .btn-outline-success,
      .form-group,
      .kirim,
      .kembali,
      .pull-right,
      .aksi {
        display: none;
      }
    }
  </style>

</head>

<body>

  <?php
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
  }
  ?>

  <nav class="navbar navbar-default navbar-fixed-top">
    <?php
    if ($_SESSION['level'] == "admin") {
      include 'menu/menu-admin.php';
    } else if ($_SESSION['level'] == "pengurus") {
      include 'menu/menu-pengurus.php';
    } else if ($_SESSION['level'] == "santri") {
      include 'menu/menu-santri.php';
    } else if ($_SESSION['level'] == "orangtua") {
      include 'menu/menu-orangtua.php';
    }
    ?>
  </nav>


  <div class="container-fluid"> <!-- Route -->

    <?php
    if ($_SESSION['level'] == "admin") {
      include 'routes/routeadmin.php';
    } else if ($_SESSION['level'] == "pengurus") {
      include 'routes/routepengurus.php';
    } else if ($_SESSION['level'] == "santri") {
      include 'routes/routesantri.php';
    } else if ($_SESSION['level'] == "orangtua") {
      include 'routes/routesantri.php';
    }
    ?>

  </div> <!-- Route -->

  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted center"><b>Smartren</b> by Maldin</p>
    </div>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $(function() {

      //datepicker plugin
      $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      // toolip
      $('[data-toggle="tooltip"]').tooltip();
    })
  </script>
</body>

</html>