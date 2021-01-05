  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Ubah Kata Sandi</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Kata Sandi</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Ubah Kata Sandi</h3>
          </div>
          <form action="">
            <!-- Card body -->
            <div class="card-body">
              <div class="form-group">
                <label for="kata_sandi_lama" class="form-control-label">Kata Sandi Lama</label>
                <input type="password" name="kata_sandi_lama" id="kata_sandi_lama" class="form-control" placeholder="Masukkan kata sandi lama" required>
              </div>
              <div class="form-group">
                <label for="kata_sandi_baru" class="form-control-label">Kata Sandi Baru</label>
                <input type="password" name="kata_sandi_baru" id="kata_sandi_baru" class="form-control" placeholder="Masukkan kata sandi baru" required>
              </div>
              <div class="form-group">
                <label for="k_kata_sandi_baru" class="form-control-label">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="k_kata_sandi_baru" id="k_kata_sandi_baru" class="form-control" placeholder="Konfirmasi kata sandi baru" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>