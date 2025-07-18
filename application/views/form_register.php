<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
      <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Daffiq Trie Octorino">
      <title>Sistem Informasi Rental</title>
      <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/landing/assets/ranahh.ico" />
      <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                  </div>
                  <?= form_open('auth/register'); ?>
                    <div class="form-group">
                      <input type="text" name="nama_operator" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= site_url('auth/login') ?>">Sudah punya akun? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
</body>
</html>
