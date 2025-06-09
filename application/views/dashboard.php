  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Dashboard'; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Dashboard'; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Pelanggan</span>
                <span class="info-box-number">
                  <?= isset($total_pelanggan) ? htmlspecialchars($total_pelanggan, ENT_QUOTES, 'UTF-8') : '0'; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-boxes"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Produk</span>
                <span class="info-box-number">
                  <?= isset($total_produk) ? htmlspecialchars($total_produk, ENT_QUOTES, 'UTF-8') : '0'; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan</span>
                <span class="info-box-number">
                  Rp <?= isset($total_pendapatan) ? number_format($total_pendapatan, 0, ',', '.') : '0'; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Produk Terjual</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Terjual</th>
                      <th>Total Pendapatan Produk</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($sold_products_summary)): $no_sold = 1; ?>
                      <?php foreach ($sold_products_summary as $sold_item): ?>
                        <tr>
                          <td><?= $no_sold++; ?>.</td>
                          <td><?= htmlspecialchars($sold_item->kode_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?= htmlspecialchars($sold_item->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td>Rp <?= number_format($sold_item->harga_produk, 0, ',', '.'); ?></td>
                          <td><?= htmlspecialchars($sold_item->total_jumlah_terjual, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td>Rp <?= number_format($sold_item->total_pendapatan_produk, 0, ',', '.'); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" class="text-center">Belum ada produk yang terjual.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->