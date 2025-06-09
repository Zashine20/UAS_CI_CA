<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Sales'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Sales'; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Sales</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createSalesModal">
                                    <i class="fas fa-plus"></i> Tambah Sales 
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">No</th>
                                        <th>ID Sales</th>
                                        <th>Nama Sales</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($sales_persons as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($item->kode_sales, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item->nama_sales, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-xs" onclick="openEditSalesModal('<?= $item->id_sales_person; ?>')"><i class="fas fa-edit"></i> Edit</button>
                                            <a href="#" class="btn btn-danger btn-xs" onclick="confirmDeleteSales('<?= base_url('index.php/sales/delete/' . $item->id_sales_person); ?>', '<?= htmlspecialchars($item->nama_sales, ENT_QUOTES, 'UTF-8'); ?>'); return false;"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($sales_persons)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data sales.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Modal Create Sales -->
<div class="modal fade" id="createSalesModal" tabindex="-1" role="dialog" aria-labelledby="createSalesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSalesModalLabel">Tambah Sales Person Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('sales/store', ['id' => 'createSalesForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="create_kode_sales">ID Sales</label>
                    <input type="text" class="form-control" id="create_kode_sales" name="kode_sales" placeholder="Masukkan ID Sales (Contoh: SALES001)" required>
                    <div class="invalid-feedback" id="error_create_kode_sales"></div>
                </div>
                <div class="form-group">
                    <label for="create_nama_sales">Nama Sales</label>
                    <input type="text" class="form-control" id="create_nama_sales" name="nama_sales" placeholder="Masukkan Nama Sales" required>
                    <div class="invalid-feedback" id="error_create_nama_sales"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal Edit Sales -->
<div class="modal fade" id="editSalesModal" tabindex="-1" role="dialog" aria-labelledby="editSalesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSalesModalLabel">Edit Sales Person</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['id' => 'editSalesForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_kode_sales">ID Sales</label>
                    <input type="text" class="form-control" id="edit_kode_sales" name="kode_sales" placeholder="Masukkan ID Sales" required>
                    <div class="invalid-feedback" id="error_edit_kode_sales"></div>
                </div>
                <div class="form-group">
                    <label for="edit_nama_sales">Nama Sales</label>
                    <input type="text" class="form-control" id="edit_nama_sales" name="nama_sales" placeholder="Masukkan Nama Sales" required>
                    <div class="invalid-feedback" id="error_edit_nama_sales"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<script>
function openEditSalesModal(id_sales_person) {
    // Bersihkan error messages sebelumnya jika ada
    $('#editSalesForm .is-invalid').removeClass('is-invalid');
    $('#editSalesForm .invalid-feedback').text('');

    $.ajax({
        url: '<?= base_url('index.php/sales/get_json/') ?>' + id_sales_person,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var data = response.data;
                $('#edit_kode_sales').val(data.kode_sales);
                $('#edit_nama_sales').val(data.nama_sales);
                $('#editSalesForm').attr('action', '<?= base_url('index.php/sales/update/') ?>' + data.id_sales_person);
                $('#editSalesModal').modal('show');
            } else {
                alert(response.message || 'Gagal mengambil data sales.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan saat mengambil data sales.');
        }
    });
}

$('#createSalesModal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
    $(this).find('.is-invalid').removeClass('is-invalid');
    $(this).find('.invalid-feedback').text('');
    // Anda bisa menambahkan pembersihan error dari session flashdata di sini jika diperlukan setelah redirect gagal validasi
});

// Fungsi confirmDeleteSales mungkin sudah ada di skrip global Anda atau bisa ditambahkan di sini jika belum.
// function confirmDeleteSales(url, namaSales) {
//     if (confirm("Apakah Anda yakin ingin menghapus sales '" + namaSales + "'?")) {
//         window.location.href = url;
//     }
// }
</script>
