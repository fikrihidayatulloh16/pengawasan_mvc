<div class="container">

<!-- Menampilkan flash -->
<?php Flasher::flash() ?>

<div class="container mt-5">
    <div class="card mt-100">
        <h5 class="card-header text-white d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Laporan Mingguan Ke-<?= $data['minggu_ke'] ?>
                </button>
                <ul class="dropdown-menu">
                    <?php
                    $tanggal_mulai_projek = new DateTime($data['projek']['tanggal_mulai']);
                    foreach ($data['all_laporan_mingguan'] as $laporan) :    
                        $tanggal_laporan = new DateTime($laporan['tanggal_mulai']);
                        // Menghitung selisih hari antara tanggal laporan dan tanggal mulai proyek
                        $selisih_hari = $tanggal_mulai_projek->diff($tanggal_laporan)->days;
                        $minggu_ke = floor($selisih_hari / 7) + 1;
                    ?>
                    <li><a class="dropdown-item" href="<?= PUBLICURL ?>/laporanmingguan/weekly_laporan_harian/<?= $data['projek']['id_projek']?>/<?= $laporan['tanggal_mulai'] ?>/<?= $laporan['tanggal_selesai'] ?>/<?= $minggu_ke?>">
                    Laporan Mingguan Ke-<?= $minggu_ke ?>
                    </a></li>
                    <?php endforeach ?>
                    <li><a class="dropdown-item" href="<?= PUBLICURL ?>/operator/laporan_harian_list/<?= $data['id_projek'] ?>">Laporan Harian</a></li>
                </ul>
            </div>
        </div>
            <button type="button" class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#lh_tambah">
                <i class='bx bx-plus-medical' style="margin-right: 5px;" name="lh_tambah"></i>ADD
            </button>
        </h5>

    <div class="table-responsive">
        <table id="myTable" class="table-thick-border" style="width: 100%;">
            <thead>
                <tr>
                    <th>No. <i id="icon0" class="fas fa-sort sort-icon" onclick="sortTable(0)"></i></th>
                    <th>Hari Ke- <i id="icon1" class="fas fa-sort sort-icon" onclick="sortTable(1)"></i></th>
                    <th>Tanggal <i id="icon2" class="fas fa-sort sort-icon" onclick="sortTable(2)"></i></th>
                    <th>Progres Harian<i id="icon3" class="fas fa-sort sort-icon" onclick="sortTable(3)"></i></th>
                    <th>Progres Kumulatif<i id="icon3" class="fas fa-sort sort-icon" onclick="sortTable(4)"></i></th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                $nomor = 1;
                foreach ($data['laporan'] as $laporan) :  
                    $tanggal_laporan = $this->model('Operator_crud_model')->dateConverter($laporan['tanggal_laporan']);
                    
                    $datetime1 = new DateTime($data['projek']['tanggal_mulai']);
                    $datetime2 = new DateTime($laporan['tanggal_laporan']); 
                    $interval = $datetime1->diff($datetime2);
                    $hari_ke = $interval->days + 1;
                ?>
                <tr>
                    <td class="text-center align-middle nomor"></td>
                    <td class="text-center align-middle" style="color: #464F60;">
                        <a href="<?= PUBLICURL ?>/operator/rekap/<?= $laporan['id_laporan_harian'] ?>/<?= $data['projek']['id_projek']?>/<?= $hari_ke?>">Hari ke-<?= $hari_ke ?></a>
                    </td>
                    <td class="text-center align-middle" style="color: #464F60;"><?= $tanggal_laporan ?></td>
                    <td class="text-center align-middle"><?= $laporan['progress_harian'] ?>%</td>
                    <td class="text-center align-middle"><?= $laporan['total_progres'] ?>%</td>
                    <td>
                        <form action="../../script/projek_pilih.php" method="POST">
                            <a href="#" class="btn btn-aksi" data-bs-toggle="modal" data-bs-target="#lh-hapus-<?= $laporan['id_laporan_harian'] ?>">
                                <i class='bx bx-trash'></i>
                            </a>
                            <!--<a href="#" class="btn btn-aksi mt-1" data-bs-toggle="modal" data-bs-target="#lh-ubah-?= $laporan['id_laporan_harian'] ?>">
                                <i class='bx bx-edit-alt'></i>
                            </a>
                            <a href="  ?= PUBLICURL ?>/printpdf/mpdf/  ?= $data['projek']['id_projek'] ?>/  ?= $laporan['id_laporan_harian'] ?>/  ?= $laporan['tanggal_laporan'] ?>" target="_blank" class="btn btn-aksi mt-1"><i class="bx bx-download"></i></a>
                            <input type="hidden" name="id_laporan" value="  ?= $laporan['id_laporan_harian'] ?>">
                            -->
                        </form>
                    </td>
                </tr>
                <?php 
                include "../app/views/modals/modal_ud/operator/laporan_harian_ud.php";
                $nomor++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end mt-3 me-3" id="pagination">
                <!-- Pagination dynamically generated by JavaScript -->
            </ul>
        </nav>

        
    </div>
    <div class="container d-flex justify-content-end">
        <a href="<?=PUBLICURL?>/laporanmingguan/laporan_mingguan_list/<?=$data['id_projek']?>" class="btn btn-kembali mt-2">
            <i class='bx bxs-chevrons-left'></i>Kembali
        </a>
    </div>
</div>

<?php
include "../app/views/modals/modal_add/operator/laporan_harian_add.php";
?>

<?php if (isset($_SESSION['flash'])): ?>
    <script>
        Swal.fire({
            title: '<?php echo $_SESSION['flash']['type'] === 'error' ? 'Error!' : 'Success!'; ?>',
            text: '<?php echo addslashes($_SESSION['flash']['message']); ?>',
            icon: '<?php echo $_SESSION['flash']['type']; ?>',
            confirmButtonText: 'OK'
        });
    </script>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<script src="<?= PUBLICURL ?>/assets/js/laporan_harian_list.js"></script>