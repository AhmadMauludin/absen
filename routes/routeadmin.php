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
} elseif ($_GET['page'] == 'simpan-tanggal') {
    include "tanggal/proses-simpan.php";
} elseif ($_GET['page'] == 'hapus-tanggal') {
    include "tanggal/proses-hapus.php";
} elseif ($_GET['page'] == 'ubah-tanggal') {
    include "tanggal/form-ubah.php";
} elseif ($_GET['page'] == 'perbaharui-tanggal') {
    include "tanggal/proses-ubah.php";
} elseif ($_GET['page'] == 'detail-tanggal') {
    include "tanggal/detail.php";

    //route fitur data absen

} else if ($_GET['page'] == 'tampil-data-absen') {
    include "absen/tampil-data.php";
} elseif ($_GET['page'] == 'tambah-absen') {
    include "absen/form-tambah.php";
} elseif ($_GET['page'] == 'simpan-absen') {
    include "absen/proses-simpan.php";
} elseif ($_GET['page'] == 'hapus-absen') {
    include "absen/proses-hapus.php";
} elseif ($_GET['page'] == 'ubah-absen') {
    include "absen/form-ubah.php";
} elseif ($_GET['page'] == 'perbaharui-absen') {
    include "absen/proses-ubah.php";
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
} elseif ($_GET['page'] == 'simpan-hsp') {
    include "hsp/proses-simpan.php";
} elseif ($_GET['page'] == 'hapus-hsp') {
    include "hsp/proses-hapus.php";
} elseif ($_GET['page'] == 'ubah-hsp') {
    include "hsp/form-ubah.php";
} elseif ($_GET['page'] == 'perbaharui-hsp') {
    include "hsp/proses-ubah.php";
} elseif ($_GET['page'] == 'detail-hsp') {
    include "hsp/detail.php";
} elseif ($_GET['page'] == 'kirim-hsp') {
    include "hsp/kirim.php";

    // Route Absensi Ngaji & Sekolah

} else if ($_GET['page'] == 'tampil-jadwal') {
    include "absensi/tampil-jadwal.php";
} else if ($_GET['page'] == 'tampil-ptm') {
    include "absensi/tampil-ptm.php";
} else if ($_GET['page'] == 'tambah-ptm') {
    include "absensi/tambah-ptm.php";
} else if ($_GET['page'] == 'simpan-ptm') {
    include "absensi/simpan-ptm.php";
} else if ($_GET['page'] == 'input-absensi') {
    include "absensi/input-absensi.php";
} else if ($_GET['page'] == 'simpan-absensi') {
    include "absensi/simpan-absensi.php";
} else if ($_GET['page'] == 'hapus-absensi') {
    include "absensi/hapus-absensi.php";
} else if ($_GET['page'] == 'tampil-absensi') {
    include "absensi/tampil-absensi.php";
}
