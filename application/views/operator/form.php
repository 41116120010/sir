<?php
$edit = isset($operator);
?>
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $edit ? "Edit" : "Tambah" ?> Pengguna</h1>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"><?= $edit ? "Edit" : "Tambah" ?> Pengguna</h6>
            </div>
            <div class="card-body">
               <?= validation_errors(); ?>
				<?= form_open_multipart($edit ? 'operator/edit/'.$operator->id_operator : 'operator/create'); ?>
           
                  <div class="form-group">
                     <p>Nama</p>
                     <input type="text" class="form-control" name="nama_operator" value="<?= set_value('nama_operator', $edit ? $operator->nama_operator : '') ?>" required>
                  </div>
                  <div class="form-group">
                     <p>Username</p>
                     <input type="text" class="form-control" name="username" value="<?= set_value('username', $edit ? $operator->username : '') ?>" required>
                  </div>
                  <div class="form-group">
                     <p>Password <?= $edit ? '(kosongkan jika tidak diganti)' : '' ?></p>
                     <input type="password" class="form-control" name="password" placeholder="Password Baru">
                  </div>
                  <div class="form-group">
                     <p>Foto</p>
                     <input type="file" name="foto" class="form-control">
                     <?php if ($edit && $operator->foto): ?>
        			<br><img src="<?= base_url('uploads/operator/' . $operator->foto) ?>" width="100">
    				<?php endif; ?>
                  </div>
                  <button type="submit" class="btn btn-warning btn-user btn-block">
                  <?= $edit ? "Edit" : "Tambah" ?>
                  </button>
                  <a href="<?php echo base_url() ?>Operator/" class="btn btn-success btn-user btn-block">
                  Kembali
                  </a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>