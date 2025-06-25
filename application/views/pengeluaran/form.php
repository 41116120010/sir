<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul_form ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $judul_form ?></h6>
                </div>
                <div class="card-body">
                        <form class="user" method="POST">
                            <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" value="<?= isset($pengeluaran['nama_kegiatan']) ? $pengeluaran['nama_kegiatan'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label>Jumlah Pengeluaran (Rp)</label>
                    <input type="number" name="jumlah_pengeluaran" class="form-control" value="<?= isset($pengeluaran['jumlah_pengeluaran']) ? $pengeluaran['jumlah_pengeluaran'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="form-control" value="<?= isset($pengeluaran['tanggal_kegiatan']) ? $pengeluaran['tanggal_kegiatan'] : '' ?>" required>
                </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Simpan
                            </button>
                            <a href="<?= site_url('pengeluaran') ?>" class="btn btn-success btn-user btn-block">
                                Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>