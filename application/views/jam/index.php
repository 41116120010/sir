<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Riwayat Jam Bermain</h1>
   </div>
   <div class="row">
      <div class="col-xl-4 col-md-4 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Jumlah Jam Bermain (Bulan Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $jam_bermain_bulan ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pendapatan (Bulan Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp <?= number_format($pendapatan_bulan, 0, ',', '.') ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Keuntungan (Bulan Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp <?= number_format($keuntungan_bulan, 0, ',', '.'); ?>
                     </div>
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
               <button id="btnExcel" class="btn btn-sm btn-primary"> Ekspor ke Excel</button>
               <button id="btnPDF" class="btn btn-sm btn-primary"> Ekspor ke PDF</button>
               <button id="btnCSV" class="btn btn-sm btn-primary"> Ekspor ke CSV</button>
               <button id="btnPrint" class="btn btn-sm btn-primary"> Print</button>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
                     <thead class="thead-light">
                        <tr>
                           <th>No. Transaksi</th>
                           <th>Durasi</th>
                           <th>Jenis Konsol</th>
                           <th>Kode Konsol</th>
                           <th>Pendapatan</th>
                           <th>Waktu Pembayaran</th>
                           <th>Dicatat Oleh</th>
                        </tr>
                     </thead>
                     <tbody>
                          <?php foreach ($jam_bermain as $row): ?>
                        <tr>
                           <td><?= htmlspecialchars($row['no_trx']); ?></td>
                           <td><?= htmlspecialchars($row['durasi_penyewaan']); ?></td>
                           <td><?= htmlspecialchars($row['jenis_konsol']); ?></td>
                           <td><?= htmlspecialchars($row['kode_konsol']); ?></td>
                           <td>Rp <?= number_format($row['pendapatan'], 0, ',', '.'); ?></td>
                           <td><?= htmlspecialchars($row['waktu_mulai']); ?></td>
                           <td><?= htmlspecialchars($row['nama_operator']); ?></td>
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