
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Kelola Konsol</h1>
   </div>
   
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="<?= site_url('konsol/create') ?>" class="btn btn-sm btn-primary">Tambah Konsol</a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                        <th>Kode Konsol</th>
                        <th>Jenis Konsol</th>
                        <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($konsol as $row): ?>
                         <tr>
                                <td><?= $row->kode_konsol ?></td>
                                <td><?= $row->jenis_konsol ?></td>
                                <td>
                                <a href="<?= site_url('konsol/edit/'.$row->kode_konsol) ?>" class="btn btn-warning btn-sm">Edit</a> |
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus" data-url="<?= site_url('konsol/delete/'.$row->kode_konsol) ?>">Hapus</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>         
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

<script>
$(document).ready(function() {
  $('#modalHapus').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); 
    var url = button.data('url'); 
    var modal = $(this);
    modal.find('#btn-konfirmasi-hapus').attr('href', url);
  });
});
</script>
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" id="btn-konfirmasi-hapus" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
