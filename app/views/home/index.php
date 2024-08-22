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

        <table id="myTable" class="table-thick-border">
    <thead>
        <tr>
            <th>No. <i id="icon0" class="fas fa-sort sort-icon" onclick="sortTable(0)"></i></th>
            <th>Hari Ke- <i id="icon1" class="fas fa-sort sort-icon" onclick="sortTable(1)"></i></th>
            <th>Tanggal <i id="icon2" class="fas fa-sort sort-icon" onclick="sortTable(2)"></i></th>
            
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
            <td class="text-center align-middle"><?= $nomor ?></td>
            <td class="text-center align-middle" style="color: #464F60;">
                <a href="<?= PUBLICURL ?>/home/rekap_user/<?= $laporan['id_laporan_harian'] ?>/<?= $data['projek']['id_projek']?>/<?= $hari_ke?>">Hari ke-<?= $hari_ke ?></a>
            </td>
            <td class="text-center align-middle" style="color: #464F60;"><?= $tanggal_laporan ?></td>
            
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

<script>
       let currentPage = 1;
let rowsPerPage = 15;
let sortDirection = {};

function updateTable() {
    let selectedValue = document.getElementById('row_count').value;
    let tableBody = document.getElementById('table-body');
    let totalRows = tableBody.rows.length;

    if (selectedValue === "all") {
        rowsPerPage = totalRows; // Show all rows
    } else {
        rowsPerPage = parseInt(selectedValue);
    }

    displayTable(currentPage);
    generatePagination();
}

function displayTable(page) {
    let tableBody = document.getElementById('table-body');
    let rows = tableBody.rows;
    let start = (page - 1) * rowsPerPage;
    let end = start + rowsPerPage;
    
    for (let i = 0; i < rows.length; i++) {
        rows[i].style.display = (i >= start && i < end) ? '' : 'none';
    }
}

function generatePagination() {
    let tableBody = document.getElementById('table-body');
    let rows = tableBody.rows.length;
    let pages = Math.ceil(rows / rowsPerPage);
    let pagination = document.getElementById('pagination');
    
    pagination.innerHTML = '';
    
    for (let i = 1; i <= pages; i++) {
        let li = document.createElement('li');
        li.className = 'page-item' + (i === currentPage ? ' active' : '');
        li.innerHTML = `<a class="page-link" href="#" onclick="gotoPage(${i})">${i}</a>`;
        pagination.appendChild(li);
    }
}

function gotoPage(page) {
    currentPage = page;
    displayTable(page);
    generatePagination();
}

function sortTable(columnIndex) {
    let table = document.getElementById("myTable");
    let rows = Array.from(table.querySelector('tbody').rows); 

    if (!sortDirection[columnIndex]) {
        sortDirection[columnIndex] = 'asc';
    } else if (sortDirection[columnIndex] === 'asc') {
        sortDirection[columnIndex] = 'desc';
    } else {
        sortDirection[columnIndex] = 'asc';
    }

    let direction = sortDirection[columnIndex];

    let sortedRows = rows.sort((a, b) => {
        let cellA = a.cells[columnIndex].innerText.trim();
        let cellB = b.cells[columnIndex].innerText.trim();
        
        if (direction === 'asc') {
            return cellA.localeCompare(cellB, undefined, { numeric: true });
        } else {
            return cellB.localeCompare(cellA, undefined, { numeric: true });
        }
    });

    let tbody = table.querySelector('tbody');
    sortedRows.forEach(row => tbody.appendChild(row));

    document.querySelectorAll('.sort-icon').forEach(icon => {
        icon.classList.remove('fa-sort-up', 'fa-sort-down');
        icon.classList.add('fa-sort');
    });

    let icon = document.getElementById(`icon${columnIndex}`);
    if (direction === 'asc') {
        icon.classList.remove('fa-sort', 'fa-sort-down');
        icon.classList.add('fa-sort-up');
    } else {
        icon.classList.remove('fa-sort', 'fa-sort-up');
        icon.classList.add('fa-sort-down');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    displayTable(currentPage);
    generatePagination();
});

    </script>