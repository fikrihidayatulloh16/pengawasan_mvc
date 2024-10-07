<?php
$navBrands = '<a class="navbar-brand" href=""' . PUBLICURL . '/operator/laporan_harian_list/' . $data['id_projek'] . '"">OPERATOR</a>';

$navItems = '
    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-5" href="' . PUBLICURL . '/operator/laporan_harian_list/' . $data['id_projek'] . '" >
        LAPORAN HARIAN
    </a>

    </li>
    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-5" href="' . PUBLICURL . '/laporanmingguan/laporan_mingguan_list/' . $data['id_projek'] . '">
        LAPORAN MINGGUAN
    </a>

    </li>
    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-5" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Fitur Belum Tersedia">
            LAPORAN BULANAN
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-5" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Fitur Belum Tersedia">
        LAPORAN EKSEKUTIF
    </a>

    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-3 text-center" aria-current="page" id="pdf" href="' . PUBLICURL . '/printpdf/print_laporan_mingguan/' . $data['id_projek'] . '" target="_blank" style="display: none;">
        UNDUH
        <i class="bx bx-download"></i>
        </a>
    </li>

    </li>
    <li class="nav-item">
        <a class="nav-link nav-head ms-lg-5 text-center" href="' . PUBLICURL . '/home/log_out/"><i class="bx bxs-user-circle" style="font-size: 24px;"></i> Logout</a>
    </li>
    ';
    
include '../app/views/layouts/header.php';
?>

<!-- Content of Page -->
<div class="container">
    <div class="container header-laporan text-center mt-3">
        <h3 style="color : #818181;"><?= $data['judul_laporan'] ?></h3>
        <h4 class="roboto-text">PENGAWASAN <?= $data['projek']['nama_projek'] ?></h4>
        <h4 class="roboto-text">Waktu Pelaksanaan : <?= $data['tanggal_mulai_projek'] ?> - <?= $data['tanggal_selesai_projek'] ?></h4>
        <h4 class="roboto-text">Tambahan Waktu : <?= $data['tambahan_waktu_projek'] ?></h4>
        </div>
    <hr class="container separator-header">
</div>
