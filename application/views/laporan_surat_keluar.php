  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Laporan Surat Keluar</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(strtolower($this->session->userdata('hak_akses')) . '/beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Surat Keluar</li>
              </ol>
            </nav>
          </div>
          <?php if ($this->session->flashdata('tanggal_mulai')) : ?>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo base_url(strtolower($this->session->userdata('hak_akses')) . '/laporan-surat-keluar/cetak/' . $this->session->flashdata('tanggal_mulai') . '/' . $this->session->flashdata('tanggal_selesai')); ?>" target="_blank" class="btn btn-sm btn-neutral">Cetak Laporan</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card body -->
          <div class="card-body">
            <form action="" method="POST" id="form_tanggal">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="tanggal_mulai" class="form-control-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="tanggal_selesai" class="form-control-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary btn-block" style="margin-top: 32px;">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Tabel Data Laporan Surat Keluar</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
              <thead class="thead-light">
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 23%">Kode Klasifikasi</th>
                  <th style="width: 25%">Isi Ringkas</th>
                  <th style="width: 23%">Kepada</th>
                  <th style="width: 23%">No. & Tgl. Surat</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 23%">Kode Klasifikasi</th>
                  <th style="width: 25%">Isi Ringkas</th>
                  <th style="width: 23%">Kepada</th>
                  <th style="width: 23%">No. & Tgl. Surat</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $laporan_surat_keluar = $this->session->flashdata('laporan_surat_keluar');
                if ($laporan_surat_keluar) :
                  foreach ($laporan_surat_keluar as $data) :
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kode']; ?> - <?php echo $data['tentang']; ?></td>
                      <td><?php echo $data['isi_ringkas']; ?></td>
                      <td><?php echo $data['kepada']; ?></td>
                      <td>
                        Nomor Surat:<br>
                        <?php echo $data['nomor_surat']; ?><br>
                        <br>

                        Tanggal Surat:<br>
                        <?php echo indonesian_date($data['tanggal_surat']); ?>
                      </td>
                    </tr>
                <?php
                  endforeach;
                endif;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>