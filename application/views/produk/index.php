<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Produk'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard_user') ?>">Home</a></li> <!-- Sesuaikan dengan URL dashboard Anda -->
                        <li class="breadcrumb-item active"><?= isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Manajemen Produk'; ?></li>
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
                            <h3 class="card-title">Daftar Produk</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createProdukModal">
                                    <i class="fas fa-plus"></i> Tambah Produk
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
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($produk as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($item->kode_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>Rp <?= number_format($item->harga_produk, 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($item->stok_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-xs" onclick="openEditProdukModal('<?= $item->id_produk; ?>')"><i class="fas fa-edit"></i> Edit</button>
                                            <a href="#" class="btn btn-danger btn-xs" onclick="confirmDeleteProduk('<?= base_url('index.php/produk/delete/' . $item->id_produk); ?>', '<?= htmlspecialchars($item->nama_produk, ENT_QUOTES, 'UTF-8'); ?>'); return false;"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($produk)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data produk.</td>
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

<!-- Modal Create Produk -->
<div class="modal fade" id="createProdukModal" tabindex="-1" role="dialog" aria-labelledby="createProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProdukModalLabel">Tambah Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('produk/store', ['id' => 'createProdukForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="create_kode_produk">Kode Produk</label>
                    <input type="text" class="form-control" id="create_kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk" value="<?= set_value('kode_produk'); ?>" required>
                    <div class="invalid-feedback" id="error_create_kode_produk"></div>
                </div>
                <div class="form-group">
                    <label for="create_nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="create_nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= set_value('nama_produk'); ?>" required>
                    <div class="invalid-feedback" id="error_create_nama_produk"></div>
                </div>
                <div class="form-group">
                    <label for="create_harga_produk">Harga Produk</label>
                    <input type="number" class="form-control" id="create_harga_produk" name="harga_produk" placeholder="Masukkan Harga (Contoh: 50000)" value="<?= set_value('harga_produk'); ?>" min="0" required>
                    <div class="invalid-feedback" id="error_create_harga_produk"></div>
                </div>
                <div class="form-group">
                    <label for="create_stok_produk">Stok Produk</label>
                    <input type="number" class="form-control" id="create_stok_produk" name="stok_produk" placeholder="Masukkan Jumlah Stok" value="<?= set_value('stok_produk'); ?>" min="0" required>
                    <div class="invalid-feedback" id="error_create_stok_produk"></div>
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

<!-- Modal Edit Produk -->
<div class="modal fade" id="editProdukModal" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['id' => 'editProdukForm']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_kode_produk">Kode Produk</label>
                    <input type="text" class="form-control" id="edit_kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk" required>
                    <div class="invalid-feedback" id="error_edit_kode_produk"></div>
                </div>
                <div class="form-group">
                    <label for="edit_nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
                    <div class="invalid-feedback" id="error_edit_nama_produk"></div>
                </div>
                <div class="form-group">
                    <label for="edit_harga_produk">Harga Produk</label>
                    <input type="number" class="form-control" id="edit_harga_produk" name="harga_produk" placeholder="Masukkan Harga (Contoh: 50000)" min="0" required>
                    <div class="invalid-feedback" id="error_edit_harga_produk"></div>
                </div>
                <div class="form-group">
                    <label for="edit_stok_produk">Stok Produk</label>
                    <input type="number" class="form-control" id="edit_stok_produk" name="stok_produk" placeholder="Masukkan Jumlah Stok" min="0" required>
                    <div class="invalid-feedback" id="error_edit_stok_produk"></div>
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
function openEditProdukModal(id_produk) {
    // Bersihkan error messages sebelumnya jika ada (jika Anda implementasi AJAX submit dengan error handling)
    $('#editProdukForm .is-invalid').removeClass('is-invalid');
    $('#editProdukForm .invalid-feedback').text('');

    $.ajax({
        url: '<?= base_url('index.php/produk/get_json/') ?>' + id_produk,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var data = response.data;
                $('#edit_kode_produk').val(data.kode_produk);
                $('#edit_nama_produk').val(data.nama_produk);
                $('#edit_harga_produk').val(data.harga_produk);
                $('#edit_stok_produk').val(data.stok_produk);
                $('#editProdukForm').attr('action', '<?= base_url('index.php/produk/update/') ?>' + data.id_produk);
                $('#editProdukModal').modal('show');
            } else {
                alert(response.message || 'Gagal mengambil data produk.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan saat mengambil data produk.');
        }
    });
}

$('#createProdukModal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
    $(this).find('.is-invalid').removeClass('is-invalid');
    $(this).find('.invalid-feedback').text('');
    // Jika Anda menangani error validasi CI via flashdata dan menampilkannya di modal dengan JS,
    // Anda mungkin perlu membersihkannya secara eksplisit di sini.
});
// Fungsi confirmDeleteProduk mungkin sudah ada di skrip Anda, jika belum bisa ditambahkan.
// function confirmDeleteProduk(url, namaProduk) {
//     if (confirm("Apakah Anda yakin ingin menghapus produk '" + namaProduk + "'?")) {
//         window.location.href = url;
//     }
// }
</script>