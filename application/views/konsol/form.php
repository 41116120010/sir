<?php
    $selected_jenis = set_value('jenis_konsol', isset($konsol) ? $konsol->jenis_konsol : '');
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= isset($konsol) ? 'Edit Konsol' : 'Tambah Konsol' ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= isset($konsol) ? 'Edit Konsol' : 'Tambah Konsol' ?></h6>
                </div>
                <div class="card-body">
                        <?= validation_errors() ?>
                        <form class="user" method="POST">
                  <div class="form-group">
                     <p>Kode Konsol</p>
                     <input type="text" class="form-control" name="kode_konsol" value="<?= set_value('kode_konsol', isset($konsol) ? $konsol->kode_konsol : '') ?>">
                  </div>
                  <div class="form-group">
                     <p>Jenis Konsol</p>
                     <select class="form-control" name="jenis_konsol" required>
                        <option value="">-- Pilih Jenis Konsol --</option>
                        <?php foreach($jenis_list as $jenis): ?>
                            <option value="<?= $jenis ?>" <?= $selected_jenis == $jenis ? 'selected' : '' ?>>
                                <?= $jenis ?>
                            </option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <button type="submit" class="btn btn-warning btn-user btn-block">
                  <?= isset($konsol) ? 'Update' : 'Simpan' ?>
                  </button>
                            <a href="<?= site_url('konsol') ?>" class="btn btn-success btn-user btn-block">
                                Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>