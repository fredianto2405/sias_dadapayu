<!-- Main content -->
<div class="main-content">
  <!-- Header -->
  <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white">Masuk</h1>
            <p class="text-lead text-white">Silahkan masuk kedalam sistem dengan akun Anda</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--9 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="text-center text-muted mb-4">
              <small>Pastikan nama pengguna dan kata sandi Anda benar</small>
            </div>
            <form method="POST">
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input class="form-control" name="nama_pengguna" placeholder="Masukkan nama pengguna" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                  </div>
                  <input class="form-control" name="kata_sandi" placeholder="Masukkan kata sandi" type="password">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>