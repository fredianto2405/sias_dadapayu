<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  d-flex  align-items-center">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url(); ?>/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
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
            <a class="nav-link <?php echo $uri == 'beranda' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/beranda'); ?>">
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
            <a class="nav-link <?php echo $uri == 'surat-masuk' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/surat-masuk'); ?>">
              <i class="fas fa-inbox text-orange"></i>
              <span class="nav-link-text">Surat Masuk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'surat-keluar' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/surat-keluar'); ?>">
              <i class="fas fa-paper-plane text-info"></i>
              <span class="nav-link-text">Surat Keluar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'pengajuan-surat' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/pengajuan-surat'); ?>">
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
            <a class="nav-link <?php echo $uri == 'laporan-surat-masuk' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/laporan-surat-masuk'); ?>">
              <i class="ni ni-chart-bar-32 text-primary"></i>
              <span class="nav-link-text">Surat Masuk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $uri == 'laporan-surat-keluar' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/laporan-surat-keluar'); ?>">
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
            <a class="nav-link <?php echo $uri == 'klasifikasi-surat' ? 'active' : ''; ?>" href="<?php echo base_url('petugas/klasifikasi-surat'); ?>">
              <i class="ni ni-book-bookmark text-red"></i>
              <span class="nav-link-text">Klasifikasi Surat</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>