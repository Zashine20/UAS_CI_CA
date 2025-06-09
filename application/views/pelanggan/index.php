<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Pelanggan'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard_user') ?>">Home</a></li> <!-- Sesuaikan dengan URL dashboard Anda -->
                        <li class="breadcrumb-item active"><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Pelanggan'; ?></li>
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
                            <h3 class="card-title">Daftar Pelanggan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createPelangganModal">
                                    <i class="fas fa-plus"></i> Tambah Pelanggan
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
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($pelanggan as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($item->nama_pelanggan, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= nl2br(htmlspecialchars($item->alamat_pelanggan, ENT_QUOTES, 'UTF-8')); ?></td>
                                        <td><?= htmlspecialchars($item->telepon_pelanggan, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-xs" onclick="openEditModal('<?= $item->id_pelanggan; ?>')"><i class="fas fa-edit"></i> Edit</button>
                                            <a href="#" class="btn btn-danger btn-xs" onclick="confirmDeletePelanggan('<?= base_url('index.php/pelanggan/delete/' . $item->id_pelanggan); ?>', '<?= htmlspecialchars($item->nama_pelanggan, ENT_QUOTES, 'UTF-8'); ?>'); return false;"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($pelanggan)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
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

<!-- Modal Edit Pelanggan -->
<div class="modal fade" id="editPelangganModal" tabindex="-1" role="dialog" aria-labelledby="editPelangganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPelangganModalLabel">Edit Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['id' => 'editPelangganForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="edit_nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" required>
                    <div class="invalid-feedback" id="error_edit_nama_pelanggan"></div>
                </div>
                <div class="form-group">
                    <label for="edit_alamat_pelanggan">Alamat</label>
                    <textarea class="form-control" id="edit_alamat_pelanggan" name="alamat_pelanggan" rows="3" placeholder="Masukkan Alamat Pelanggan"></textarea>
                    <div class="invalid-feedback" id="error_edit_alamat_pelanggan"></div>
                </div>
                <div class="form-group">
                    <label for="edit_telepon_pelanggan">Nomor Telepon</label>
                    <input type="text" class="form-control" id="edit_telepon_pelanggan" name="telepon_pelanggan" placeholder="Masukkan Nomor Telepon (Contoh: 08123456789)">
                    <div class="invalid-feedback" id="error_edit_telepon_pelanggan"></div>
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

<!-- Modal Create Pelanggan -->
<div class="modal fade" id="createPelangganModal" tabindex="-1" role="dialog" aria-labelledby="createPelangganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPelangganModalLabel">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pelanggan/store', ['id' => 'createPelangganForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="create_nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control <?= (form_error('nama_pelanggan') && $this->session->flashdata('form_context') === 'create') ? 'is-invalid' : ''; ?>" id="create_nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" value="<?= set_value('nama_pelanggan'); ?>">
                    <div class="invalid-feedback">
                        <?= (form_error('nama_pelanggan') && $this->session->flashdata('form_context') === 'create') ? form_error('nama_pelanggan') : ''; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="create_alamat_pelanggan">Alamat</label>
                    <textarea class="form-control <?= (form_error('alamat_pelanggan') && $this->session->flashdata('form_context') === 'create') ? 'is-invalid' : ''; ?>" id="create_alamat_pelanggan" name="alamat_pelanggan" rows="3" placeholder="Masukkan Alamat Pelanggan"><?= set_value('alamat_pelanggan'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= (form_error('alamat_pelanggan') && $this->session->flashdata('form_context') === 'create') ? form_error('alamat_pelanggan') : ''; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="create_telepon_pelanggan">Nomor Telepon</label>
                    <input type="text" class="form-control <?= (form_error('telepon_pelanggan') && $this->session->flashdata('form_context') === 'create') ? 'is-invalid' : ''; ?>" id="create_telepon_pelanggan" name="telepon_pelanggan" placeholder="Masukkan Nomor Telepon (Contoh: 08123456789)" value="<?= set_value('telepon_pelanggan'); ?>">
                    <div class="invalid-feedback">
                        <?= (form_error('telepon_pelanggan') && $this->session->flashdata('form_context') === 'create') ? form_error('telepon_pelanggan') : ''; ?>
                    </div>
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

<!-- /.content-wrapper -->

<script>
function openEditModal(id_pelanggan) {
    // Bersihkan error messages sebelumnya jika ada
    $('#editPelangganForm .is-invalid').removeClass('is-invalid');
    $('#editPelangganForm .invalid-feedback').text('');

    $.ajax({
        url: '<?= base_url('index.php/pelanggan/get_json/') ?>' + id_pelanggan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var data = response.data;
                $('#edit_nama_pelanggan').val(data.nama_pelanggan);
                $('#edit_alamat_pelanggan').val(data.alamat_pelanggan);
                $('#edit_telepon_pelanggan').val(data.telepon_pelanggan);
                $('#editPelangganForm').attr('action', '<?= base_url('index.php/pelanggan/update/') ?>' + data.id_pelanggan);
                $('#editPelangganModal').modal('show');
            } else {
                alert(response.message || 'Gagal mengambil data pelanggan.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan saat mengambil data pelanggan.');
        }
    });
}

$('#createPelangganModal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
    $(this).find('.is-invalid').removeClass('is-invalid');
    $(this).find('.invalid-feedback').text('');
});

<?php if ($this->session->flashdata('form_context') === 'create' && validation_errors()): ?>
$(document).ready(function(){
    $('#createPelangganModal').modal('show');
});
<?php endif; ?>

// Fungsi confirmDeletePelanggan mungkin sudah ada di skrip global Anda atau bisa ditambahkan di sini jika belum.
// function confirmDeletePelanggan(url, namaPelanggan) { ... }

</script>