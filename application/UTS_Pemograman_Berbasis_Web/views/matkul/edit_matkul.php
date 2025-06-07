<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>form Matakuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Update Mata kuliah</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <form action="<?= base_url(). ("index.php/matkul/update/". $matkul['kdmat']);?>" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for=" kdmat">Nama Matakuliah</label>
            <input type="text" class="form-control" id="kdmat" value="<?= $matkul['kdmat'];?>" placeholder="kdmat" name="kdmat" required>
        </div>
        <div class="form-group">
            <label for=" namat">Nama Matakuliah</label>
            <input type="text" class="form-control" id="namat" value="<?= $matkul['namat'];?>" placeholder="namat" name="namat" required>
        </div>
        <div class="form-group">
            <label for=" jenis">jenis</label>
            <select class="form-control" id="jenis" name="jenis" required>
              <option value="<?= $matkul['namat'];?>"><?= $matkul['namat'];?></option>
              <option value="wajib">Wajib</option>
              <option value="umum">Umum</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <select class="form-control" id="prodi" name="prodi" required>
              <option value="<?= $matkul['prodi'];?>"><?= $matkul['prodi'];?></option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknologi Informasi">Teknologi Informasi</option>
            </select>
        </div>
        <div class="box-footer" >
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('matkul');?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
    </div>
    <div class="card-footer" >
    </div>
</div>
</section>
</div>