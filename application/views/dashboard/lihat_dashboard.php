<?php $jabatan = $this->session->userdata('jabatan'); ?>
<?php if ($jabatan === 'Owner' || $jabatan === 'Operator') : ?>
<section class="content">
	<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>
   <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pendapatan (Hari Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Total Pengeluaran (Hari Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pengeluaran, 0, ',', '.'); ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Keuntungan (Hari Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_keuntungan, 0, ',', '.'); ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Jumlah Jam Bermain (Hari Ini)
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_jam_bermain; ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
       <div class="col-xl-6 col-lg-7">
         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Grafik Keuntungan Bersih Mingguan</h6>
            </div>
            <div class="card-body">
               <div class="chart-bar"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="total_keuntungan_mingguan" width="293" height="160" style="display: block; width: 293px; height: 160px;" class="chartjs-render-monitor"></canvas>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-lg-7">
         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Grafik Keuntungan Bersih Bulanan</h6>
            </div>
            <div class="card-body">
               <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="total_keuntungan_bulanan" width="293" height="160" style="display: block; width: 293px; height: 160px;" class="chartjs-render-monitor"></canvas>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</div>
</div>
</section>
<?php endif; ?>

<?php if ($jabatan === 'Pengunjung') : ?>
<section class="content">
	<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>
   <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Harga PS 3 / jam
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($tarif['ps3_perjam'], 0, ',', '.') ?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-money-bill fa-2x text-gray-300"></i>
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
                        Harga PS 4 / jam
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($tarif['ps4_perjam'], 0, ',', '.') ?></div>
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
  <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Game</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Konsol</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <img src="https://http2.mlstatic.com/D_Q_NP_2X_607873-MLM32469764909_102019-V-grand-theft-auto-v-ps3-gta-v-.webp" alt="GTAV" width="100">
                </td>
                <td>
                  Grand Theft Auto V (GTA V) adalah game aksi-petualangan dunia terbuka yang dikembangkan oleh Rockstar North dan diterbitkan oleh Rockstar Games.
                </td>
                <td>Playstation 3</td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <img src="https://m.media-amazon.com/images/I/81hbJgEs+fL.jpg" alt="PES" width="100">
                </td>
                <td>
                 Pro Evolution Soccer 2018 (PES 2018) adalah game simulasi sepak bola yang dikembangkan oleh Konami.
                </td>
                <td>Playstation 3</td>
              </tr>
               <tr>
                <td>3</td>
                <td>
                  <img src="https://cdn0.spong.com/pack/m/i/minecraft411545l/_-Minecraft-PS3-_.jpg" alt="MINECRAFT" width="100">
                </td>
                <td>
                 Minecraft adalah game sandbox ikonik yang dikembangkan oleh Mojang.
                </td>
                <td>Playstation 3</td>
              </tr>
               <tr>
                <td>4</td>
                <td>
                  <img src="https://kalimagames.com/wp-content/uploads/2022/08/cover-ps3-28.jpg" alt="MOTOGP" width="100">
                </td>
                <td>
                 MotoGP 15 adalah game balapan motor resmi dari kejuaraan dunia MotoGP, yang dikembangkan oleh Milestone S.r.l
                </td>
                <td>Playstation 3</td>
              </tr>
              <tr>
                <td>5</td>
                <td>
                  <img src="https://www.fifa-fc.com/wp-content/uploads/2024/09/EA-SPORTS-FC-25-Standard-Edition-PS4-VideoGame.jpg" alt="FC25" width="100">
                </td>
                <td>
                 EA Sports FC 25 adalah lanjutan dari franchise sepak bola ternama yang sebelumnya dikenal sebagai FIFA.
                </td>
                <td>Playstation 4</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> 
  </div>
  <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Konsol</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>Kode Konsol</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Waktu Berakhir</th>
              </tr>
            </thead>
            <tbody>
        <?php 
        $now = date('Y-m-d H:i:s');
        foreach ($status_konsol as $konsol): 
            $berakhir = $konsol->waktu_berakhir;
            $status = ($berakhir && $berakhir > $now) ? 'Dipakai' : 'Tersedia';
        ?>
        <tr>
            <td><?= htmlspecialchars($konsol->kode_konsol) ?></td>
            <td><?= htmlspecialchars($konsol->jenis_konsol) ?></td>
            <td><span class="badge badge-<?= ($status == 'Tersedia') ? 'success' : 'danger' ?>">
                <?= $status ?></span>
            </td>
            <td><?= $berakhir ? date('H:i:s', strtotime($berakhir)) : '-' ?></td>
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
</section>
<?php endif; ?>