<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/dist/css/adminlte.min.css');?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <?php if($this->session->flashdata('message')): ?>
        <?php echo $this->session->flashdata('message');?>
      <?php endif; ?>
      <?php if(validation_errors()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo validation_errors(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <?php endif; ?>
      <form action="<?php echo base_url(). "index.php/auth/process_register"; ?>" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirm_password" placeholder="confirm password" name="confirm_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="profile_picture" name="profile_picture">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
            </div>
          </div>
        </div>
        <small class="form-text text-muted d-block mb-3">Foto Profil (Opsional). Format: JPG, PNG, GIF. Maks: 2MB.</small>

        <div class="form-group">
          <label for="role">Role</label>
          <select class="form-control" id="role" name="role" required>
              <option value="">-- Pilih Role --</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
              <option value="Sales">sales</option>
              <option value="Manager">manager</option>
          </select><br>
          <small>Pilih role yang ingin anda daftarkan.</small>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="<?= base_url('index.php/auth/login');?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url('aset/adminlte/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('aset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('aset/adminlte/dist/js/adminlte.min.js');?>"></script>
</body>
</html>
