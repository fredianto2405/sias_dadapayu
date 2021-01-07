  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Profil Saya</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
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
            <h3 class="mb-0">Profil Saya</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
            <?php $data = json_decode($pengguna['data']); ?>
            <div class="row">
              <div class="col-md-8">
                <h3 class="text-muted">Identitas Diri</h3>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">NIK</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->nik; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Nama Lengkap</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->nama; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Tempat, Tgl. Lahir</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->tempat_lahir . ', ' . date('d-m-Y', strtotime($data->tanggal_lahir)); ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Jenis Kelamin</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->jenis_kelamin; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Alamat</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->alamat; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Agama</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->agama; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Status Perkawinan</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->status_perkawinan; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Pekerjaan</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->pekerjaan; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <small class="text-uppercase text-muted font-weight-bold">Kewarganegaraan</small>
                  </div>
                  <div class="col-sm-7">
                    <p class="mb-0"><?php echo $data->kewarganegaraan; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <a href="#!">
                  <img src="<?php echo base_url('upload/pengguna/' . $this->session->userdata('foto')); ?>" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;">
                </a>
                <div class="pt-4 text-center">
                  <h5 class="h3 title">
                    <span class="d-block mb-1"><?php echo $this->session->userdata('nama'); ?></span>
                    <small class="h4 font-weight-light text-muted"><?php echo ucwords($this->session->userdata('hak_akses')); ?></small>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>