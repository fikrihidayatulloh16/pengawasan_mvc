<div class="modal fade" id="ph-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Laporan Permasalahan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= PUBLICURL ?>/operator/tambah_permasalahan/<?= $data['id_laporan_harian']?>/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_laporan_harian" value="<?= $data['id_laporan_harian']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="container-fluid px-4">
                            <div class="form-group">
                                <label for="id_projek">Projek:</label>
                                <p class="mb-0"><?= $data['projek']['nama_projek']?></p>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="permasalahan">Permasalahan:</label>
                                <textarea type="text" id="permasalahan" name="permasalahan" class="form-control"  rows="3" maxlength="255" placeholder="Masukkan Permasalahan"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="saran">Saran :</label>
                                <textarea type="text" id="saran" name="saran" class="form-control"  rows="3"    maxlength="255" placeholder="Masukkan Saran"></textarea>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="masalah_simpan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
-->