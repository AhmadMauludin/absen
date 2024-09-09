<?php

// ROUTE MENU SANTRI / ORTU
// route menu utama

if (empty($_GET["page"])) {
    include "dashboards/dashboard-santri.php";
} else if ($_GET['page'] == 'profile') {
    include "profile/profile.php";

    // route fitur tampil data (Beda)

} else if ($_GET['page'] == 'santri-tampil-data-santri') {
    include "santri/santri-tampil-data.php";
} else if ($_GET['page'] == 'santri-tampil-data-tanggal') {
    include "tanggal/santri-tampil-data.php";
} else if ($_GET['page'] == 'santri-tampil-data-absen') {
    include "absen/santri-tampil-data.php";
} else if ($_GET['page'] == 'santri-tampil-data-hsp') {
    include "hsp/santri-tampil-data.php";
} elseif ($_GET['page'] == 'detail-tanggal') {
    include "tanggal/detail.php";
} elseif ($_GET['page'] == 'detail-absen') {
    include "absen/detail.php";

    //route fitur data (sama)

} elseif ($_GET['page'] == 'ubah-santri') {
    include "santri/form-ubah.php";
} elseif ($_GET['page'] == 'detail-santri') {
    include "santri/detail.php";
} elseif ($_GET['page'] == 'detail-absen-santri') {
    include "santri/detail-absen.php";
} elseif ($_GET['page'] == 'tambah-hsp') {
    include "hsp/form-tambah.php";
} elseif ($_GET['page'] == 'detail-hsp') {
    include "hsp/detail.php";
} elseif ($_GET['page'] == 'kirim-hsp') {
    include "hsp/kirim.php";
}
