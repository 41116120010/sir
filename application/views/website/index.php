
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Kelola Website</h1>
   </div>
   
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Kelola Website</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                       <tr>
        <th>ID</th>
        <th>Nama Rental</th>
        <th>Lokasi Rental</th>
        <th>PS3 / Jam</th>
        <th>PS4 / Jam</th>
        <th>Aksi</th>
    </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($website as $row): ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->nama_rental ?></td>
        <td><?= $row->lokasi_rental ?></td>
        <td><?= $row->ps3_perjam ?></td>
        <td><?= $row->ps4_perjam ?></td>
        <td>
            <a href="<?= site_url('website/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
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
