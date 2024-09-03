    <!-- Ubah tim pengawas Modal -->
    <div class="modal fade" id="pengawas-ubah-<?= $tim_pengawas['id_tim_pengawas']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Tim Pengawas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= PUBLICURL ?>/admin/ubah_tim_pengawas/<?= $data['id_laporan_harian']?>/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_tim_pengawas" value="<?=$tim_pengawas['id_tim_pengawas']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="container-fluid px-4">
                            <div class="form-group">
                                <label for="id_projek">Projek:</label>

                                <h5><?= 'nama_pekerjaan'?></h5>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="tim_pengawas">Tim Pengawas:</label>
                                <input type="text" id="tim_pengawas" name="tim_pengawas" class="form-control" placeholder="Masukkan Tim Pengawas" value="<?= $tim_pengawas['tim_pengawas'] ?>" required></input>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="tim_leader">Tim Leader :</label>
                                <input type="text" id="tim_leader" name="tim_leader" class="form-control" placeholder="Masukkan Team Leader" value="<?= $tim_pengawas['tim_leader'] ?>" required></input>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                                    
                    <div class="modal-footer bg-secondary">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success text-light" name="timpengawas-ubah">Ubah</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Hapus tim pengawas modal-->
<div class="modal fade" id="pengawas-hapus-<?= $tim_pengawas['id_tim_pengawas']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-dark">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tim Pengawas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= PUBLICURL ?>/admin/hapus_tim_pengawas/<?= $data['id_laporan_harian']?>/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_tim_pengawas" value="<?=$tim_pengawas['id_tim_pengawas']?>">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_tim_pengawas" class="form-label">IDu</label>
                        <h5 for="id_tim_pengawas" class="form-label" id="id_tim_pengawas" name="id_tim_pengawas" value="<?= $tim_pengawas['id_tim_pengawas']?>"><?=$tim_pengawas['id_tim_pengawas']?></h5>
                        <label for="tim_pengawas" class="form-label">Tim Pengawas</label>
                        <h5 for="tim_pengawas" class="form-label text-danger"><?=$tim_pengawas['tim_pengawas']?></h5>
                        <label for="tim_leader" class="form-label">Jumlah</label>
                        <h5 for="tim_leader" class="form-label text-danger"><?=$tim_pengawas['tim_leader']?></h5>
                    </div>
                </div>
                                    
                <div class="modal-footer bg-secondary">
                    <button type="submit" class="btn btn-danger" name="timpengawas-hapus">Delete</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
                            