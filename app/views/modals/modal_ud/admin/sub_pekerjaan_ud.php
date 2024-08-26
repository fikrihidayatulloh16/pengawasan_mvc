
<!-- Ubah Modal -->
<div class="modal fade" id="sub-ubah-<?=$subtask['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Master Sub Pekerjaan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= PUBLICURL ?>/admin/ubah_sub_pekerjaan/<?= $data['id_projek'] ?>" method="POST">
                <input type="hidden" name="id_m_sub_pekerjaan" value="<?=$subtask['id']?>">
                <div class="modal-body ">                    
                    <div class="mb-3">
                        <label for="id_m_sub_pekerjaan" class="form-label">ID (Tidak Bisa Diubah)</label>
                        <p class="form-label"><?=$subtask['id']?></p>
                        <label for="nama_sub_pekerjaan" class="form-label">Nama Sub Pekerjaan</label>
                        <input type="text" class="form-control" id="nama_sub_pekerjaan" name="nama_sub_pekerjaan" value="<?= $subtask['name']?>" placeholder="Masukkan Nama Sub Pekerjaan" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning text-dark" name="sub_ubah">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>


        <!-- Hapus Modal -->
                            <div class="modal fade" id="sub-hapus-<?= $subtask['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-dark">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Master Pekerjaan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= PUBLICURL ?>/admin/hapus_sub_pekerjaan/<?= $data['id_projek'] ?>" method="POST">
                                    <input type="hidden" name="id_m_sub_pekerjaan" value="<?=$subtask['id']?>">
                                        <div class="modal-body">
                                            
                                            <div class="mb-3">
                                                <label for="id_m_sub_pekerjaan" class="form-label">ID</label>
                                                <h5 for="id_m_sub_pekerjaan" class="form-label" id="id_m_sub_pekerjaan" name="id_m_sub_pekerjaan" value="<?= $subtask['id']?>"><?=$subtask['id']?></h5>
                                                <label for="jenis_pekerja" class="form-label">Jenis Pekerja</label>
                                                <h5 for="nama_sub_pekerjaan" class="form-label text-danger"><?=$subtask['id']?></h5>
                                            </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="sub_hapus">Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            