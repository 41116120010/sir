<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pengeluaran</h1> 
    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                               <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Pengeluaran (Bulan Ini)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_bulanan, 0, ',', '.') ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= site_url('pengeluaran/create') ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengeluaran</a>
                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach ($pengeluaran as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_kegiatan'] ?></td>
                        <td>Rp <?= number_format($row['jumlah_pengeluaran'], 0, ',', '.') ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal_kegiatan'])) ?></td>
                        <td>
                            <a href="<?= site_url('pengeluaran/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a> | 
                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus" data-url="<?= site_url('pengeluaran/delete/' . $row['id']) ?>">Hapus</a>
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
                title: 'Rekap Pengeluaran',
                footer: false
            },
            { 
                extend: 'excel', 
                text: 'Excel', 
                className: 'd-none', 
                title: 'Rekap Pengeluaran',
                footer: false
            },
            { 
                extend: 'pdf', 
                text: 'PDF', 
                className: 'd-none', 
                title: 'Rekap Pengeluaran',
                footer: false
            },
            { 
                extend: 'print', 
                text: 'Print', 
                className: 'd-none', 
                title: 'Rekap Pengeluaran',
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