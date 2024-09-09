<?php

// ROUTE MENU ADMIN
// route menu utama

if (empty($_GET["page"])) {
    include "dashboards/dashboard-admin.php";
} else if ($_GET['page'] == 'profile') {
    include "profile/profile.php";

    //route fitur data santri

} else if ($_GET['page'] == 'tampil-data-santri') {
    include "santri/tampil-data.php";
} elseif ($_GET['page'] == 'tambah-santri') {
    include "santri/form-tambah.php";
} elseif ($_GET['page'] == 'simpan-santri') {
    include "santri/proses-simpan.php";
} elseif ($_GET['page'] == 'hapus-santri') {
    include "santri/proses-hapus.php";
} elseif ($_GET['page'] == 'ubah-santri') {
    include "santri/form-ubah.php";
} elseif ($_GET['page'] == 'perbaharui-santri') {
    include "santri/proses-ubah.php";
} elseif ($_GET['page'] == 'detail-santri') {
    include "santri/detail.php";
} elseif ($_GET['page'] == 'detail-absen-santri') {
    include "santri/detail-absen.php";
} elseif ($_GET['page'] == 'kirim-absen-santri') {
    include "santri/kirim-absen.php";


    //route fitur data tanggal

} else if ($_GET['page'] == 'tampil-data-tanggal') {
    include "tanggal/tampil-data.php";
} elseif ($_GET['page'] == 'tambah-tanggal') {
    include "tanggal/form-tambah.php";
} elseif ($_GET['page'] == 'ubah-tanggal') {
    include "tanggal/form-ubah.php";
} elseif ($_GET['page'] == 'detail-tanggal') {
    include "tanggal/detail.php";

    //route fitur data absen

} else if ($_GET['page'] == 'tampil-data-absen') {
    include "absen/tampil-data.php";
} elseif ($_GET['page'] == 'tambah-absen') {
    include "absen/form-tambah.php";
} elseif ($_GET['page'] == 'ubah-absen') {
    include "absen/form-ubah.php";
} elseif ($_GET['page'] == 'detail-absen') {
    include "absen/detail.php";
} elseif ($_GET['page'] == 'form-absen') {
    include "absen/form.php";
} elseif ($_GET['page'] == 'import-absen') {
    include "absen/import.php";

    //route fitur data HSP

} else if ($_GET['page'] == 'tampil-data-hsp') {
    include "hsp/tampil-data.php";
} elseif ($_GET['page'] == 'tambah-hsp') {
    include "hsp/form-tambah.php";
} elseif ($_GET['page'] == 'verifikasi-hsp') {
    include "hsp/form-verifikasi.php";
} elseif ($_GET['page'] == 'lapor-hsp') {
    include "hsp/form-lapor.php";
} elseif ($_GET['page'] == 'detail-hsp') {
    include "hsp/detail.php";
} elseif ($_GET['page'] == 'kirim-hsp') {
    include "hsp/kirim.php";

    // ROUTE SANTRI ATAU ORTU

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
