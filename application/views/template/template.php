<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Sistem Informasi Rental">
      <meta name="author" content="Daffiq Trie Octorino">
      <title>Sistem Informasi Rental</title>
      <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/landing/assets/ranahh.ico" />
      <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
      <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </head>
   <body id="page-top">
      <div id="wrapper">
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-gamepad"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?= $nama_rental ?></sup></div>
         </a>
         <hr class="sidebar-divider my-0">
         <?php $jabatan = $this->session->userdata('jabatan'); ?>
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
         </li>
         <?php if ($jabatan === 'Owner') : ?>
         <hr class="sidebar-divider">
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Konsol/">
            <i class="fas fa-fw fa-play"></i>
            <span>Kelola Konsol</span></a>
         </li>
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Website/">
            <i class="fas fa-fw fa-globe"></i>
            <span>Kelola Website</span></a>
         </li>
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Operator/">
            <i class="fas fa-fw fa-user"></i>
            <span>Kelola Pengguna</span></a>
         </li>
         <hr class="sidebar-divider">
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Jam/">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Riwayat Jam Bermain</span></a>
         </li>
         <?php endif; ?>
         <hr class="sidebar-divider">
         <?php if ($jabatan === 'Owner' || $jabatan === 'Operator') : ?>
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Riwayat Transaksi:</h6>
                  <a class="collapse-item" href="<?php echo base_url() ?>Pendapatan/">Pendapatan</a>
                  <a class="collapse-item" href="<?php echo base_url() ?>Pengeluaran/">Pengeluaran</a>
                  <a class="collapse-item" href="<?php echo base_url() ?>harian">Rekap Transaksi Harian</a>
                  <a class="collapse-item" href="<?php echo base_url() ?>bulanan">Rekap Transaksi Bulanan</a>
               </div>
            </div>
         </li>
         <hr class="sidebar-divider d-none d-md-block">
          <?php endif; ?>
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>
      <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
         </button>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata['nama_operator']; ?></span>
               <?php $foto = $this->session->userdata['foto']; ?>
               <img class="img-profile rounded-circle"
                  src="<?php echo base_url('uploads/operator/') . $foto; ?>">
               </a>
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">               
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                  </a>
               </div>
            </li>
         </ul>
      </nav>

			<?php echo $contents ?>

<footer class="sticky-footer bg-white">
   <div class="container my-auto">
      <div class="copyright text-center my-auto">
         <span>&copy; 2025 | Made with ☕ by Daffiq Trie Octorino.</span>
      </div>
   </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi.</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
            <a class="btn btn-primary" href="<?php echo base_url() ?>auth/logout">Logout</a>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/grafik_bulanan.js"></script>
<script src="<?php echo base_url() ?>assets/js/grafik_mingguan.js"></script>
</body>
</html>