                            <!-- Ubah Modal -->
                            <div class="modal fade" id="malat-ubah-<?=$data_m_peralatan['id_m_peralatan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Master Peralatan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= PUBLICURL ?>/admin/ubah_m_peralatan/<?= $data['id_projek'] ?>" method="POST">
                                        <input type="hidden" name="id_m_peralatan" value="<?=$data_m_peralatan['id_m_peralatan']?>">
                                        <div class="modal-body">
                                            
                                            <div class="mb-3">
                                                <label for="id_m_peralatan" class="form-label">ID (Tidak Bisa Diubah)</label>
                                                <h5 for="id_m_peralatan" class="form-label"><?=$data_m_peralatan['id_m_peralatan']?></h5>
                                                <label for="nama_alat" class="form-label">Nama Alat</label>
                                                <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?= $data_m_peralatan['nama_alat']?>" placeholder="Masukkan Nama Alat" required><br><br>
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $data_m_peralatan['satuan']?>" placeholder="Masukkan satuan" required><br><br>
                                            </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning text-dark" name="alat_ubah">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>

                            <!-- Hapus Modal -->
                            <div class="modal fade" id="malat-hapus-<?=$data_m_peralatan['id_m_peralatan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-dark">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Master Peralatan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= PUBLICURL ?>/admin/hapus_m_peralatan/<?= $data['id_projek'] ?>" method="POST">
                                    <input type="hidden" name="id_m_peralatan" value="<?=$data_m_peralatan['id_m_peralatan']?>">
                                        <div class="modal-body">
                                            
                                            <div class="mb-3">
                                                <label for="id_m_peralatan" class="form-label">ID</label>
                                                <h5 for="id_m_peralatan" class="form-label" id="id_m_peralatan" name="id_m_peralatan" value="<?= $data_m_peralatan['id_m_peralatan']?>"><?=$data_m_peralatan['id_m_peralatan']?></h5>
                                                <label for="nama_alat" class="form-label">Nama Alat</label>
                                                <h5 for="nama_alat" class="form-label text-danger"><?=$data_m_peralatan['nama_alat']?></h5>
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <h5 for="satuan" class="form-label text-danger"><?=$data_m_peralatan['satuan']?></h5>
                                            </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="alat_hapus">Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>