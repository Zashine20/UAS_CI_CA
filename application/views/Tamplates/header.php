<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/fontawesome-free/css/all.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/jqvmap/jqvmap.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/overlayScrollbars/css/overlayScrollbars.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/daterangepicker/daterangepicker.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/summernote/summernote-bs4.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/sweetalert2/sweetalert2.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('aset/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Source+Sans+Pro:300;400;500;700">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('index.php/dashboard_user');?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= base_url('aset/adminlte/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PT Maju Jaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
            $default_image_name = 'user2-160x160.jpg';
            $profile_pic_session = $this->session->userdata('profile_picture');
            $profile_pic_filename = !empty($profile_pic_session) ? $profile_pic_session : $default_image_name;


            $profile_pic_url = base_url('aset/adminlte/dist/img/' . $default_image_name); 

            if ($profile_pic_filename !== $default_image_name) {
                $uploaded_image_path = 'aset/uploads/profile_pictures/' . $profile_pic_filename;
                if (file_exists(FCPATH . $uploaded_image_path)) {
                    $profile_pic_url = base_url($uploaded_image_path);
                }
            }
          ?>
          <img src="<?= $profile_pic_url; ?>" class="img-circle elevation-2" alt="User Image" style="width: 34px; height: 34px; object-fit: cover;">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?= htmlspecialchars($this->session->userdata('username'), ENT_QUOTES, 'UTF-8'); ?>
            <br>
            <small>Role:<?= htmlspecialchars($this->session->userdata('role'), ENT_QUOTES, 'UTF-8'); ?></small>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/berita');?>" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
              <?php if ($this->session->userdata('role') == 'Admin') { ?>
              <li class="nav-item">
                <a href="<?= base_url('index.php/kategori');?>" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/berita/laporan');?>" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Laporan</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="<?= base_url('index.php/matkul');?>" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Matakuliah</p>
                </a>
              </li>
            </ul> <!-- /.nav-treeview for Dashboard -->
          </li> <!-- /.nav-item for Dashboard -->

          <?php if ($this->session->userdata('role') == 'Admin') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-folder-open nav-icon"></i> 
              <p>
                Manajemen Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="<?= base_url('index.php/produk');?>" class="nav-link">
                  <i class="fas fa-box nav-icon"></i> 
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/pelanggan');?>" class="nav-link">
                  <i class="fas fa-users nav-icon"></i> 
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/sales');?>" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i> 
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/salesorder');?>" class="nav-link">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Daftar Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/admin');?>" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Daftar Users</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('role') == 'Sales') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i> 
              <p>
                Sales Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/salesorder/create');?>" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Buat Order Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/salesorder');?>" class="nav-link">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Daftar Order</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('role') == 'Manager') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i> 
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/laporan/per_sales');?>" class="nav-link">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>Penjualan Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/laporan/per_produk');?>" class="nav-link">
                  <i class="fas fa-boxes nav-icon"></i>
                  <p>Penjualan Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/laporan/per_periode');?>" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Penjualan Periode</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li>
            <a href="<?= base_url('index.php/profile/profile');?>" class="nav-link">
              <i class="far fa-newspaper nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="<?= base_url('index.php/auth/logout');?>" class="nav-link" onclick="confirmLogout(event)" >
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>

        </ul> <!-- /.nav nav-pills nav-sidebar flex-column -->
      </nav> <!-- This was original line 250, now correctly placed -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>