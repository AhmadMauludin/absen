<!DOCTYPE html>
<html>

<head>
    <title>Smartren Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Id User dan Password tidak sesuai !</div>";
        } else if ($_GET['pesan'] == "logindulu") {
            echo "<div class='alert'>Silahkan Login dulu !</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login"> <B>L O G I N</B></p>
        <hr>

        <form action="cek_login.php" method="post">
            <P><label>Id</label></P>
            <input type="text" name="iduser" class="form_login" placeholder="id user" required="required">
            <label>Password</label>
            <p><input type="password" name="password" class="form_login" placeholder="Password" required="required"></p>

            <p><input type="submit" class="tombol_login" value="M A S U K"></p>
        </form>
    </div>
</body>

</html>