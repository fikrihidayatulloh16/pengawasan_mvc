<div class="container">

<!-- Menampilkan alert -->
 <?php Flasher::flash() ?>

<div class="container mt-5">
    <div class="card mt-100">
        <h5 class="card-header text-white d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <form>
                <label for="row_count">Tampilkan Baris:</label>
                <select id="row_count" name="row_count" onchange="updateTable()">
                    <option value="15" selected>15</option>
                    <option value="30">30</option>
                    <option value="60">60</option>
                    <option value="all">Semua</option>
                </select>
            </form>
            </div>
        </h5>

    <div class="table-responsive">
        <table id="myTable" class="table-thick-border">
            <thead>
                <tr>
                    <th>No. <i id="icon0" class="fas fa-sort sort-icon" onclick="sortTable(0)"></i></th>
                    <th>Hari Ke- <i id="icon1" class="fas fa-sort sort-icon" onclick="sortTable(1)"></i></th>
                    <th>Tanggal <i id="icon2" class="fas fa-sort sort-icon" onclick="sortTable(2)"></i></th>
                    <th class="col-1">Progres Harian <i id="icon3" class="fas fa-sort sort-icon" onclick="sortTable(3)"></i></th>
                    <th class="col-2">Progres Kumulatif <i id="icon3" class="fas fa-sort sort-icon" onclick="sortTable(3)"></i></th>
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
                        <a href="<?= PUBLICURL ?>/home/rekap_user/<?= $laporan['id_laporan_harian'] ?>/<?= $data['projek']['id_projek']?>/<?= $hari_ke?>">Hari ke-<?= $hari_ke ?></a>
                    </td>
                    <td class="text-center align-middle" style="color: #464F60;"><?= $tanggal_laporan ?></td>
                    <td class="text-center align-middle" style="color: #464F60;"><?= $laporan['progress_harian'] ?>%</td>
                    <td class="text-center align-middle" style="color: #464F60;"><?= $laporan['total_progres'] ?>%</td>
                    <td>
                        <form action="../../script/projek_pilih.php" method="POST">
                            <a href="<?= PUBLICURL ?>/printpdf/print_laporan_harian/<?= $data['projek']['id_projek'] ?>/<?= $laporan['id_laporan_harian'] ?>/<?= $laporan['tanggal_laporan'] ?>" target="_blank" class="btn btn-aksi mt-1"><i class="bx bx-download"></i></a>
                            <input type="hidden" name="id_laporan" value="<?= $laporan['id_laporan_harian'] ?>">
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
</div>

<?php
include "../app/views/modals/modal_add/operator/laporan_harian_add.php";
?>

<?php
// include "../../public/alert/successAlert.php";
?>

<script src="<?= PUBLICURL ?>/assets/js/laporan_harian_list.js"></script>