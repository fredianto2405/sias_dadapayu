<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  d-flex  align-items-center">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url(); ?>/assets/img/brand/logo-sias-dadapayu-blue.png" class="navbar-brand-img" alt="...">
      </a>
      <div class=" ml-auto ">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'beranda' ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan/beranda'); ?>">
              <i class="fas fa-home text-primary"></i>
              <span class="nav-link-text">Beranda</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Transaksi</span>
          <span class="docs-mini">T</span>
        </h6>
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'pengajuan-surat' ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan/pengajuan-surat'); ?>">
              <i class="ni ni-single-copy-04 text-pink"></i>
              <span class="nav-link-text">Pengajuan Surat</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Laporan</span>
          <span class="docs-mini">L</span>
        </h6>
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'laporan-surat-masuk' ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan/laporan-surat-masuk'); ?>">
              <i class="ni ni-chart-bar-32 text-primary"></i>
              <span class="nav-link-text">Surat Masuk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'laporan-surat-keluar' ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan/laporan-surat-keluar'); ?>">
              <i class="ni ni-chart-bar-32 text-green"></i>
              <span class="nav-link-text">Surat Keluar</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Master Data</span>
          <span class="docs-mini">MD</span>
        </h6>
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'pengguna' ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan/pengguna'); ?>">
              <i class="fas fa-users text-info"></i>
              <span class="nav-link-text">Pengguna</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">Anda memiliki <strong class="text-primary"><?php echo $total_notifikasi; ?></strong> notifikasi.</h6>
              </div>
              <!-- List group -->
              <div class="list-group list-group-flush">
                <?php
                foreach ($notifikasi as $data) :
                  $data2 = json_decode($data['data_pengguna']);
                ?>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="<?php echo base_url(); ?>/upload/pengguna/<?php echo $data['foto']; ?>" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $data2->nama; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small><?php echo indonesian_date($data['tanggal_pengajuan']); ?></small>
                          </div>
                        </div>
                        <p class="text-sm mb-0"><?php echo $data['jenis_surat'] ?></p>
                      </div>
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>
              <!-- View all -->
              <a href="<?php echo base_url('pimpinan/pengajuan-surat'); ?>" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat semua</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url(); ?>/upload/pengguna/<?php echo $this->session->userdata('foto'); ?>">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('nama'); ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <a href="<?php echo base_url('pimpinan/profil-saya'); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Profil Saya</span>
              </a>
              <a href="<?php echo base_url('pimpinan/ubah-kata-sandi') ?>" class="dropdown-item">
                <i class="fas fa-unlock-alt"></i>
                <span>Ubah Kata Sandi</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('landing/logout') ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>