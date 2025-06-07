<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Matakuliah</h1>
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
    <h3 class="card-title">Create Matakuliah</h3>

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
    <form action="<?php echo base_url(). "index.php/matkul/insert"; ?>" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for=" mata">Kode Matakuliah</label>
            <input type="text" class="form-control" id="kdmat" placeholder="Kode Matakuliah" name="kdmat" required>
        </div>
        <div class="form-group">
            <label for=" judul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="namat" placeholder="Nama Matakuliah" name="namat" required>
        </div>
        <div class="form-group">
            <label for=" sks">SKS</label>
            <select class="form-control" name="sks" id="sks" required>
                <option value="">-- Pilihan --</option>
                <option value="2">2 SKS</option>
                <option value="3">3 SKS</option>
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select class="form-control" name="semester" id="semester" required>
                <option value="">-- Pilihan --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control" name="jenis" id="jenis" required>
                <option value="">-- Pilihan --</option>
                <option value="umum">Umum</option>
                <option value="wajib">Wajib</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prodi">Prodi</label>
            <select class="form-control" name="prodi" id="prodi" required>
                <option value="">-- Pilihan --</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
        </div>
        <div class="box-footer" >
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="reset" class="btn btn-default">Cancel</button>
        </div>
    </form>
    </div>
    <div class="card-footer" >
    </div>
</div>
</section>
</div>