<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="Tempat Seru Bermain PS3 & PS4" />
      <meta name="author" content="Daffiq Trie Octorino" />
      <title><?= $nama_rental ?> - Rental PS3 dan PS4</title>
      <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/landing/assets/ranahh.ico" />
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
      <link href="<?php echo base_url() ?>assets/landing/css/styles.css" rel="stylesheet" />
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
         <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><?= $nama_rental ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                  <li class="nav-item"><a class="nav-link" href="#konsol">Konsol</a></li>
                  <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>Dashboard">Halaman Admin</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <header class="masthead">
         <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
               <div class="text-center">
                  <h1 class="mx-auto my-0 text-uppercase"><?= $nama_rental ?></h1>
               </div>
            </div>
         </div>
      </header>
      <section class="about-section text-center" id="about">
         <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
               <div class="col-lg-8">
                  <h2 class="text-white mb-4">Tentang Kami</h2>
                  <p class="text-white-50">
                     Selamat datang di <?= $nama_rental ?>, tempat rental PlayStation terpercaya dan favorit di kota!
Kami hadir untuk memberikan pengalaman bermain game yang seru, nyaman, dan terjangkau untuk semua kalangan.

<br>Kami percaya bahwa bermain game adalah tentang keseruan dan kebersamaan. Jadi, ayo datang dan nikmati pengalaman main game terbaik bersama teman atau keluarga!</p>
               </div>
            </div>
         </div>
      </section>
      <section class="signup-section bg-black" id="konsol">
         <div class="container px-4 px-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
               <h2 class="text-white mb-5">Cek Ketersediaan Konsol</h2>
            </div>
            <div class="row gx-4 gx-lg-5">
    <?php foreach ($konsolData as $konsol): ?>
    <div class="col-md-4 mb-3">
        <div class="card py-4 h-100">
            <div class="card-body text-center">
                <i class="fa-brands fa-playstation text-primary mb-2"></i>
                <h4 class="text-uppercase m-0"><?= htmlspecialchars($konsol['kode_konsol']) ?></h4>
                <hr class="my-4 mx-auto" />
                <div class="small"><?= $konsol['status'] ?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

         </div>
      </section>
      <section class="contact-section bg-black" id="lokasi">
         <div class="col-md-10 col-lg-8 mx-auto text-center">
            <h2 class="text-white mb-5">Kami tunggu kehadiran anda!</h2>
         </div>
         <div class="container px-4 px-lg-5">
            <iframe src="<?= $lokasi_rental ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      </section>
      <footer class="footer bg-black small text-center text-white-50">
         <div class="container px-4 px-lg-5">Copyright 2025 &copy; <?= $nama_rental ?></div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>assets/landing/js/scripts.js"></script>
      <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
   </body>
</html>