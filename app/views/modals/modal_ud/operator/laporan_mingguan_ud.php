<div class="modal fade" id="lm-ubah-<?= $laporan['id_laporan_mingguan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Laporan Harian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= PUBLICURL ?>/laporanmingguan/ubah_laporan_mingguan/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_laporan_mingguan" value="<?=$laporan['id_laporan_mingguan']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="container-fluid px-4">
                            <div class="form-group">
                                <h5 for="id_projek">Minggu Ke-<?= $minggu_ke?></h5>
                                <label for="tanggal_laporan" class="form-label">Tanggal Awal Minggu :</label>
                                <strong><?= $laporan['tanggal_mulai'] ?></strong><br>
                                <label for="tanggal_laporan" class="form-label">Tanggal Akhir Minggu :</label>
                                <strong><?= $laporan['tanggal_selesai'] ?></strong>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="rencana_progres">Rencana Progres:</label>

                                <div class="input-group">
                                    <input type="number" id="rencana_progres" name="rencana_progres" class="form-control" value="<?= $laporan['rencana_progres'] ?>" placeholder="Masukkan Persentase" step="0.1" min="0" max="100" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="realisasi_progres">Realisasi Progres:</label>

                                <div class="input-group">
                                    <input type="number" id="realisasi_progres" name="realisasi_progres" class="form-control" value="<?= $laporan['realisasi_progres'] ?>" placeholder="Masukkan Persentase" step="0.1" min="0" max="100" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="lh_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hapus laporan harian-->
<div class="modal fade" id="lm-hapus-<?=$laporan['id_laporan_mingguan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Laporan Harian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= PUBLICURL ?>/laporanmingguan/hapus_laporan_mingguan/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_laporan_mingguan" value="<?=$laporan['id_laporan_mingguan']?>">

                <div class="modal-body">
                    <div class="mb-3">
                        <strong>Peringatan!!</strong><br>
                        <p>Semua data yang di dalam <strong>laporan Minggu ke-<?= $minggu_ke ?> </strong> akan terhapus. </p>
                        <p>Apakah anda yakin ingin menghapus? </p><br>
                        <label for="tanggal_laporan" class="form-label">Tanggal Awal Minggu :</label>
                        <strong><?= $laporan['tanggal_mulai'] ?></strong><br>
                        <label for="tanggal_laporan" class="form-label">Tanggal Akhir Minggu :</label>
                        <strong><?= $laporan['tanggal_selesai'] ?></strong>
                    </div>
                </div>

                <div class="modal-footer bg-secondary">
                    <button type="submit" class="btn btn-danger" name="lh-hapus">Delete</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
                            