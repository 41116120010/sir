<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
    </div>                

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= site_url('pendapatan/create') ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaksi</a>
                </div>
                    
                <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No. Transaksi</th>
                                            <th>Durasi</th>
                                            <th>Jenis</th>
                                            <th>Kode</th>
                                            <th>Pendapatan</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Berakhir</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jam_bermain as $row): ?>
                                        <tr>
                                            <td><?= $row['no_trx'] ?></td>
                                            <td><?= $row['durasi_penyewaan'] ?></td>
                                            <td><?= $row['jenis_konsol'] ?></td>
                                            <td><?= $row['kode_konsol'] ?></td>
                                            <td>Rp <?= number_format($row['pendapatan'], 0, ',', '.') ?></td>
                                            <td><?= $row['waktu_mulai'] ?></td>
                                            <td><?= $row['waktu_berakhir'] ?></td>
                                            <td>
                                                <a href="<?= site_url('pendapatan/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a> | 
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus" data-url="<?= site_url('pendapatan/delete/' . $row['id']) ?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>          
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
    document.addEventListener("DOMContentLoaded", function () {
    if (typeof jQuery === 'undefined') {
        console.error("jQuery tidak dimuat. Pastikan jQuery dipanggil sebelum DataTables!");
        return;
    }

    var table = $('#tabelData').DataTable({
        dom: 'Bfrtip',
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        buttons: [
            { 
                extend: 'csv', 
                text: 'CSV', 
                className: 'd-none', 
                title: 'Rekap Pendapatan',
                footer: false
            },
            { 
                extend: 'excel', 
                text: 'Excel', 
                className: 'd-none', 
                title: 'Rekap Pendapatan',
                footer: false
            },
            { 
                extend: 'pdf', 
                text: 'PDF', 
                className: 'd-none', 
                title: 'Rekap Pendapatan',
                footer: false
            },
            { 
                extend: 'print', 
                text: 'Print', 
                className: 'd-none', 
                title: 'Rekap Pendapatan',
                footer: false
            }
        ],
        language: {
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data tersedia",
            infoFiltered: "(disaring dari _MAX_ total data)",
            search: "Cari:",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        }
    });


    $('#btnCSV').click(function () { table.button('.buttons-csv').trigger(); });
    $('#btnExcel').click(function () { table.button('.buttons-excel').trigger(); });
    $('#btnPDF').click(function () { table.button('.buttons-pdf').trigger(); });
    $('#btnPrint').click(function () { table.button('.buttons-print').trigger(); });
    });
</script>

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