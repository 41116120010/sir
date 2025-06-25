<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Rekap Transaksi Harian</h1>
   </div>
   <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Jumlah Jam Bermain (Bulan Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_durasi ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pendapatan (Bulan Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></div>
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
                     <th>No / ID</th>
                     <th>Kategori</th>
                     <th>Nama Kegiatan</th>
                     <th>Tanggal</th>
                     <th>Durasi</th>
                     <th>Jenis Konsol</th>
                     <th>Jumlah</th>
                  </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($rekap as $r): ?>
                     <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['kategori'] ?></td>
                        <td><?= $r['nama_kegiatan'] ?></td>
                        <td><?= $r['tanggal'] ?></td>
                        <td><?= $r['durasi_penyewaan'] ?? '-' ?></td>
                        <td><?= $r['jenis_konsol'] ?? '-' ?></td>
                        <td>Rp <?= number_format($r['jumlah'], 0, ',', '.') ?></td>
                     </tr>
                  <?php endforeach; ?>          
                     </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:right;"><strong>Total Pendapatan :</strong></td>
                        <td id="totalPendapatan"></td>
                    </tr>
                    </tfoot>
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
                title: 'Rekap Pendapatan dan Pengeluaran',
                footer: true
            },
            { 
                extend: 'excel', 
                text: 'Excel', 
                className: 'd-none', 
                title: 'Rekap Pendapatan dan Pengeluaran',
                footer: true
            },
            { 
                extend: 'pdf', 
                text: 'PDF', 
                className: 'd-none', 
                title: 'Rekap Pendapatan dan Pengeluaran',
                footer: false,
                customize: function (doc) {
                    var totalData = hitungTotal();
                    doc.content[1].table.body.push([
                        { text: 'TOTAL PENDAPATAN', bold: true, alignment: 'right', colSpan: 6 },
                        {}, {}, {}, {}, {},
                        { text: `Rp ${totalData.pendapatan}`, bold: true }
                    ]);
                    doc.content[1].table.body.push([
                        { text: 'TOTAL PENGELUARAN', bold: true, alignment: 'right', colSpan: 6 },
                        {}, {}, {}, {}, {},
                        { text: `Rp ${totalData.pengeluaran}`, bold: true }
                    ]);
                }
            },
            { 
                extend: 'print', 
                text: 'Print', 
                className: 'd-none', 
                title: 'Rekap Pendapatan dan Pengeluaran',
                footer: true,
                customize: function (win) {
                    $(win.document.body).find('tfoot').css("display", "table-footer-group");
                }
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
        },
        footerCallback: function (row, data, start, end, display) {
            var totalData = hitungTotal();
            let tfoot = $('#tabelData tfoot');
            $(this.api().column(6).footer()).html(`<strong>Rp ${totalData.pendapatan}</strong>`);

            if (tfoot.find('.total-pengeluaran').length === 0) {
                tfoot.append(`<tr class="total-pengeluaran">
                    <td colspan="6" style="text-align:right;"><strong>Total Pengeluaran:</strong></td>
                    <td><strong>Rp ${totalData.pengeluaran}</strong></td>
                </tr>`);
            } else {
                $('.total-pengeluaran td:last').html(`<strong>Rp ${totalData.pengeluaran}</strong>`);
            }
        }
    });

    function hitungTotal() {
        var api = $('#tabelData').DataTable();
        var totalPendapatan = 0;
        var totalPengeluaran = 0;

        api.rows({ search: 'applied' }).data().each(function (rowData) {
            let kategori = rowData[1] ? rowData[1].trim().toLowerCase() : "";
            let jumlah = rowData[6] ? rowData[6].replace(/[^\d]/g, '') : "0";
            jumlah = jumlah ? parseInt(jumlah) : 0;

            if (kategori.includes("pendapatan")) {
                totalPendapatan += jumlah;
            } else if (kategori.includes("pengeluaran")) {
                totalPengeluaran += jumlah;
            }
        });

        return {
            pendapatan: totalPendapatan.toLocaleString("id-ID"),
            pengeluaran: totalPengeluaran.toLocaleString("id-ID")
        };
    }

    $('#btnCSV').click(function () { table.button('.buttons-csv').trigger(); });
    $('#btnExcel').click(function () { table.button('.buttons-excel').trigger(); });
    $('#btnPDF').click(function () { table.button('.buttons-pdf').trigger(); });
    $('#btnPrint').click(function () { table.button('.buttons-print').trigger(); });
});
</script>