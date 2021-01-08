  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Pengajuan Surat</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengajuan Surat</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal_jenis_surat">Pengajuan Baru</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Tabel Data Pengajuan Surat</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 5%">Aksi</th>
                  <th style="width: 15%">Nama</th>
                  <th style="width: 20%">Jenis Surat</th>
                  <th style="width: 20%">Tanggal Pengajuan</th>
                  <th style="width: 14%">Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 5%">Aksi</th>
                  <th style="width: 15%">Nama</th>
                  <th style="width: 20%">Jenis Surat</th>
                  <th style="width: 20%">Tanggal Pengajuan</th>
                  <th style="width: 14%">Status</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($pengajuan as $data) :
                  $data2 = json_decode($data['data_pengguna']);
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <?php if ($data['status'] == 0 || $data['status'] == 1) : ?>
                        <button type="button" onclick="rincian('<?php echo $data['id_pengajuan']; ?>')" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></button>
                      <?php else : ?>
                        <a href="<?php echo base_url('warga/pengajuan-surat/cetak/' . $data['id_pengajuan']); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i></a>
                      <?php endif; ?>
                    </td>
                    <td><?php echo $data2->nama; ?></td>
                    <td><?php echo $data['jenis_surat']; ?></td>
                    <td><?php echo indonesian_date($data['tanggal_pengajuan']); ?></td>
                    <td>
                      <?php if ($data['status'] == 0) : ?>
                        <i class="fa fa-spinner text-muted"></i> Menunggu
                      <?php elseif ($data['status'] == 1) : ?>
                        <i class="fa fa-tasks text-primary"></i> Diproses
                      <?php else : ?>
                        <i class="fa fa-check-double text-success"></i> Disetujui
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal jenis surat -->
  <div class="modal fade" id="modal_jenis_surat" tabindex="-1" role="dialog" aria-labelledby="modal_jenis_surat" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Pilih Jenis Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- List group -->
          <ul class="list-group list-group-flush list my--3">
            <li class="list-group-item px-0">
              <div class="row align-items-center">
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Surat Keterangan Beda Nama</a>
                  </h4>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-primary" onclick="buat('skbn')">Buat</button>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="row align-items-center">
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Surat Keterangan Pengantar Nikah</a>
                  </h4>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-primary" onclick="buat('skpn')">Buat</button>
                </div>
              </div>
            </li>
            <li class=" list-group-item px-0">
              <div class="row align-items-center">
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Surat Keterangan Usaha</a>
                  </h4>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-primary" onclick="buat('sku')">Buat</button>
                </div>
              </div>
            </li>
            <li class=" list-group-item px-0">
              <div class="row align-items-center">
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Surat Pengantar Akta Kelahiran</a>
                  </h4>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-primary" onclick="buat('spak1')">Buat</button>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="row align-items-center">
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!">Surat Pengantar Akta Kematian</a>
                  </h4>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-primary" onclick="buat('spak2')">Buat</button>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php $data_pengguna = json_decode($this->session->userdata('data')); ?>

  <!-- modal buat -->
  <div class="modal fade" id="modal_buat" tabindex="-1" role="dialog" aria-labelledby="modal_buat" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-buat">Jenis Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_buat" action="" method="POST">
          <input type="hidden" name="skbn">
          <input type="hidden" name="skpn">
          <input type="hidden" name="sku">
          <input type="hidden" name="spak1">
          <input type="hidden" name="spak2">
          <div class="modal-body">
            <!-- Surat Keterangan Beda Nama -->
            <div id="form_skbn">
              <h6 class="heading-small text-muted mb-4">Data Kartu Tanda Penduduk (KTP)</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_nama_ktp" class="form-control-label">Nama</label>
                    <input type="text" name="skbn_nama_ktp" id="skbn_nama_ktp" class="form-control" value="<?php echo $data_pengguna->nama; ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_nik_ktp" class="form-control-label">NIK</label>
                    <input type="text" name="skbn_nik_ktp" id="skbn_nik_ktp" class="form-control" value="<?php echo $data_pengguna->nik; ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_ttl_ktp" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="skbn_ttl_ktp" id="skbn_ttl_ktp" class="form-control" value="<?php echo $data_pengguna->tempat_lahir . ', ' . indonesian_date($data_pengguna->tanggal_lahir); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="skbn_jenis_kelamin" id="skbn_jenis_kelamin" class="form-control" value="<?php echo ucfirst($data_pengguna->jenis_kelamin); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_status_perkawinan" class="form-control-label">Status Perkawinan</label>
                    <input type="text" name="skbn_status_perkawinan" id="skbn_status_perkawinan" class="form-control" value="<?php echo ucwords($data_pengguna->status_perkawinan); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="skbn_pekerjaan" id="skbn_pekerjaan" class="form-control" value="<?php echo ucwords($data_pengguna->pekerjaan); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_agama" class="form-control-label">Agama</label>
                    <input type="text" name="skbn_agama" id="skbn_agama" class="form-control" value="<?php echo ucwords($data_pengguna->agama); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_alamat_ktp" class="form-control-label">Alamat</label>
                    <input type="text" name="skbn_alamat_ktp" id="skbn_alamat_ktp" class="form-control" value="<?php echo ucwords($data_pengguna->alamat); ?>" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Kartu Keluarga (KK)</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_nama_kk" class="form-control-label">Nama</label>
                    <input type="text" name="skbn_nama_kk" id="skbn_nama_kk" class="form-control" placeholder="Masukkan nama sesuai KK" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_nik_kk" class="form-control-label">NIK</label>
                    <input type="text" name="skbn_nik_kk" id="skbn_nik_kk" class="form-control" placeholder="Masukkan NIK sesuai KK" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skbn_ttl_kk" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="skbn_ttl_kk" id="skbn_ttl_kk" class="form-control" placeholder="Masukkan tempat & tgl. lahir sesuai KK" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skbn_alamat_kk" class="form-control-label">Alamat</label>
                    <input type="text" name="skbn_alamat_kk" id="skbn_alamat_kk" class="form-control" placeholder="Masukkan alamat sesuai KK" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Keterangan Pengantar Nikah -->
            <div id="form_skpn">
              <h6 class="heading-small text-muted mb-4">Data Penduduk Desa Dadapayu</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_nama1" class="form-control-label">Nama</label>
                    <input type="text" name="skpn_nama1" id="skpn_nama1" class="form-control" value="<?php echo ucwords($data_pengguna->nama); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_ttl1" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="skpn_ttl1" id="skpn_ttl1" class="form-control" value="<?php echo ucwords($data_pengguna->tempat_lahir) . ', ' . indonesian_date($data_pengguna->tanggal_lahir); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_jenis_kelamin1" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="skpn_jenis_kelamin1" id="skpn_jenis_kelamin1" class="form-control" value="<?php echo ucwords($data_pengguna->jenis_kelamin); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_agama1" class="form-control-label">Agama</label>
                    <input type="text" name="skpn_agama1" id="skpn_agama1" class="form-control" value="<?php echo ucwords($data_pengguna->agama); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_status_perkawinan1" class="form-control-label">Status Perkawinan</label>
                    <input type="text" name="skpn_status_perkawinan1" id="skpn_status_perkawinan1" class="form-control" value="<?php echo ucwords($data_pengguna->status_perkawinan); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_warga_negara1" class="form-control-label">Warga Negara</label>
                    <input type="text" name="skpn_warga_negara1" id="skpn_warga_negara1" class="form-control" value="<?php echo ucwords($data_pengguna->kewarganegaraan); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_pekerjaan1" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="skpn_pekerjaan1" id="skpn_pekerjaan1" class="form-control" value="<?php echo ucwords($data_pengguna->pekerjaan); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_alamat1" class="form-control-label">Alamat</label>
                    <input type="text" name="skpn_alamat1" id="skpn_alamat1" class="form-control" value="<?php echo ucwords($data_pengguna->alamat); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_keperluan1" class="form-control-label">Keperluan</label>
                    <input type="text" name="skpn_keperluan1" id="skpn_keperluan1" class="form-control" value="Untuk Menikah" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_tujuan1" class="form-control-label">Tujuan</label>
                    <input type="text" name="skpn_tujuan1" id="skpn_tujuan1" class="form-control" placeholder="Masukkan tujuan" required>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Calon</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_nama2" class="form-control-label">Nama</label>
                    <input type="text" name="skpn_nama2" id="skpn_nama2" class="form-control" placeholder="Masukkan nama" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_ttl2" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="skpn_ttl2" id="skpn_ttl2" class="form-control" placeholder="Masukkan tempat & tgl. lahir" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_jenis_kelamin2" class="form-control-label">Jenis Kelamin</label>
                    <select name="skpn_jenis_kelamin2" id="skpn_jenis_kelamin2" class="form-control" required>
                      <option value="">-- Pilih jenis kelamin --</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_agama2" class="form-control-label">Agama</label>
                    <select name="skpn_agama2" id="skpn_agama2" class="form-control" required>
                      <option value="">-- Pilih agama --</option>
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="skpn_status_perkawinan2" class="form-control-label">Status Perkawinan</label>
                    <select name="skpn_status_perkawinan2" id="skpn_status_perkawinan2" class="form-control" required>
                      <option value="">-- Pilih status perkawinan --</option>
                      <option value="Belum Kawin">Belum Kawin</option>
                      <option value="Kawin">Kawin</option>
                      <option value="Cerai Hidup">Cerai Hidup</option>
                      <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="skpn_alamat2" class="form-control-label">Alamat</label>
                    <input type="text" name="skpn_alamat2" id="skpn_alamat2" class="form-control" placeholder="Masukkan alamat" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Keterangan Usaha -->
            <div id="form_sku">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sku_nama_lengkap" class="form-control-label">Nama Lengkap</label>
                    <input type="text" name="sku_nama_lengkap" id="sku_nama_lengkap" class="form-control" value="<?php echo ucwords($data_pengguna->nama); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="sku_tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input type="text" name="sku_tanggal_lahir" id="sku_tanggal_lahir" class="form-control" value="<?php echo indonesian_date($data_pengguna->tanggal_lahir); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sku_tempat_lahir" class="form-control-label">Tempat Lahir</label>
                    <input type="text" name="sku_tempat_lahir" id="sku_tempat_lahir" class="form-control" value="<?php echo ucwords($data_pengguna->tempat_lahir); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="sku_pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="sku_pekerjaan" id="sku_pekerjaan" class="form-control" value="<?php echo ucwords($data_pengguna->pekerjaan); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="sku_alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="sku_alamat" id="sku_alamat" class="form-control" value="<?php echo ucwords($data_pengguna->alamat); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="sku_usaha_pokok" class="form-control-label">Usaha Pokok</label>
                    <input type="text" name="sku_usaha_pokok" id="sku_usaha_pokok" class="form-control" placeholder="Masukkan usaha pokok" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sku_usaha_sampingan" class="form-control-label">Usaha Sampingan</label>
                    <input type="text" name="sku_usaha_sampingan" id="sku_usaha_sampingan" class="form-control" placeholder="Masukkan usaha sampingan" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="sku_kalurahan" class="form-control-label">Kalurahan</label>
                    <input type="text" name="sku_kalurahan" id="sku_kalurahan" class="form-control" placeholder="Masukkan kalurahan" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sku_kapanewon" class="form-control-label">Kapanewon</label>
                    <input type="text" name="sku_kapanewon" id="sku_kapanewon" class="form-control" placeholder="Masukkan kapanewon" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Pengantar Akta Kelahiran -->
            <div id="form_spak1">
              <h6 class="heading-small text-muted mb-4">Data Orang Tua</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak1_nama_orang_tua" class="form-control-label">Nama</label>
                    <input type="text" name="spak1_nama_orang_tua" id="spak1_nama_orang_tua" class="form-control" value="<?php echo ucwords($data_pengguna->nama); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak1_ttl" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="spak1_ttl" id="spak1_ttl" class="form-control" value="<?php echo ucwords($data_pengguna->tempat_lahir) . ', ' . indonesian_date($data_pengguna->tanggal_lahir); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="spak1_alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="spak1_alamat" id="spak1_alamat" class="form-control" value="<?php echo ucwords($data_pengguna->alamat); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak1_agama" class="form-control-label">Agama</label>
                    <input type="text" name="spak1_agama" id="spak1_agama" class="form-control" value="<?php echo ucwords($data_pengguna->agama); ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak1_pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="spak1_pekerjaan" id="spak1_pekerjaan" class="form-control" value="<?php echo ucwords($data_pengguna->pekerjaan); ?>" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Anak</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak1_nama_anak" class="form-control-label">Nama</label>
                    <input type="text" name="spak1_nama_anak" id="spak1_nama_anak" class="form-control" placeholder="Masukkan nama anak" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak1_tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input type="date" name="spak1_tanggal_lahir" id="spak1_tanggal_lahir" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak1_jam" class="form-control-label">Jam</label>
                    <input type="time" name="spak1_jam" id="spak1_jam" class="form-control" placeholder="Masukkan jam lahir" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak1_jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select name="spak1_jenis_kelamin" id="spak1_jenis_kelamin" class="form-control" required>
                      <option value="">-- Pilih jenis kelamin --</option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak1_anak_ke" class="form-control-label">Anak Ke</label>
                    <input type="number" name="spak1_anak_ke" id="spak1_anak_ke" class="form-control" placeholder="Masukkan anak ke" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Pengantar Akta Kematian -->
            <div id="form_spak2">
              <h6 class="heading-small text-muted mb-4">Data Pemohon</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak2_nama1" class="form-control-label">Nama</label>
                    <input type="text" name="spak2_nama1" id="spak2_nama1" class="form-control" value="<?php echo ucwords($data_pengguna->nama); ?>" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak2_ttl" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="spak2_ttl" id="spak2_ttl" class="form-control" value="<?php echo ucwords($data_pengguna->tempat_lahir) . ', ' . indonesian_date($data_pengguna->tanggal_lahir); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="spak2_alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="spak2_alamat" id="spak2_alamat" class="form-control" value="<?php echo ucwords($data_pengguna->alamat); ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak2_agama" class="form-control-label">Agama</label>
                    <input type="text" name="spak2_agama" id="spak2_agama" class="form-control" value="<?php echo ucwords($data_pengguna->agama); ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak2_pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="spak2_pekerjaan" id="spak2_pekerjaan" class="form-control" value="<?php echo ucwords($data_pengguna->pekerjaan); ?>" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Orang Meninggal</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak2_nama2" class="form-control-label">Nama</label>
                    <input type="text" name="spak2_nama2" id="spak2_nama2" class="form-control" placeholder="Masukkan nama orang meninggal" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak2_tanggal_kematian" class="form-control-label">Tanggal Kematian</label>
                    <input type="date" name="spak2_tanggal_kematian" id="spak2_tanggal_kematian" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="spak2_jam" class="form-control-label">Jam</label>
                    <input type="time" name="spak2_jam" id="spak2_jam" class="form-control" required>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="spak2_jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select name="spak2_jenis_kelamin" id="spak2_jenis_kelamin" class="form-control" required>
                      <option value="">-- Pilih jenis kelamin --</option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal rincian -->
  <div class="modal fade" id="modal_rincian" tabindex="-1" role="dialog" aria-labelledby="modal_rincian" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Rincian Pengajuan Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_rincian" action="" method="POST">
          <input type="hidden" name="id_pengajuan" id="id_pengajuan">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="jenis_surat" class="form-control-label">Jenis Surat</label>
                  <input type="text" name="jenis_surat" id="jenis_surat" class="form-control" readonly>
                </div>
              </div>
            </div>
            <!-- Surat Keterangan Beda Nama -->
            <div id="surat_keterangan_beda_nama">
              <h6 class="heading-small text-muted mb-4">Data Kartu Tanda Penduduk (KTP)</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama_ktp" class="form-control-label">Nama</label>
                    <input type="text" name="nama_ktp" id="nama_ktp" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="nik_ktp" class="form-control-label">NIK</label>
                    <input type="text" name="nik_ktp" id="nik_ktp" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ttl_ktp" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl_ktp" id="ttl_ktp" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="agama" class="form-control-label">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="alamat_ktp" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Kartu Keluarga (KK)</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama_kk" class="form-control-label">Nama</label>
                    <input type="text" name="nama_kk" id="nama_kk" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="nik_kk" class="form-control-label">NIK</label>
                    <input type="text" name="nik_kk" id="nik_kk" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ttl_kk" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl_kk" id="ttl_kk" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="alamat_kk" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat_kk" id="alamat_kk" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Keterangan Pengantar Nikah -->
            <div id="surat_keterangan_pengantar_nikah">
              <h6 class="heading-small text-muted mb-4">Data Penduduk Desa Dadapayu</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama1" class="form-control-label">Nama</label>
                    <input type="text" name="nama1" id="nama1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="ttl1" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl1" id="ttl1" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jenis_kelamin1" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin1" id="jenis_kelamin1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="agama1" class="form-control-label">Agama</label>
                    <input type="text" name="agama1" id="agama1" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status_perkawinan1" class="form-control-label">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan1" id="status_perkawinan1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="warga_negara1" class="form-control-label">Warga Negara</label>
                    <input type="text" name="warga_negara1" id="warga_negara1" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pekerjaan1" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan1" id="pekerjaan1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="alamat1" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat1" id="alamat1" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="keperluan1" class="form-control-label">Keperluan</label>
                    <input type="text" name="keperluan1" id="keperluan1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="tujuan1" class="form-control-label">Tujuan</label>
                    <input type="text" name="tujuan1" id="tujuan1" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Calon</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama2" class="form-control-label">Nama</label>
                    <input type="text" name="nama2" id="nama2" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="ttl2" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl2" id="ttl2" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jenis_kelamin2" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin2" id="jenis_kelamin2" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="agama2" class="form-control-label">Agama</label>
                    <input type="text" name="agama2" id="agama2" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status_perkawinan2" class="form-control-label">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan2" id="status_perkawinan2" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="alamat2" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat2" id="alamat2" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Keterangan Usaha -->
            <div id="surat_keterangan_usaha">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="usaha_pokok" class="form-control-label">Usaha Pokok</label>
                    <input type="text" name="usaha_pokok" id="usaha_pokok" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="usaha_sampingan" class="form-control-label">Usaha Sampingan</label>
                    <input type="text" name="usaha_sampingan" id="usaha_sampingan" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="kalurahan" class="form-control-label">Kalurahan</label>
                    <input type="text" name="kalurahan" id="kalurahan" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kapanewon" class="form-control-label">Kapanewon</label>
                    <input type="text" name="kapanewon" id="kapanewon" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Pengantar Akta Kelahiran -->
            <div id="surat_pengantar_akta_kelahiran">
              <h6 class="heading-small text-muted mb-4">Data Orang Tua</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama_orang_tua" class="form-control-label">Nama</label>
                    <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="ttl" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl" id="ttl" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="agama" class="form-control-label">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Anak</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama_anak" class="form-control-label">Nama</label>
                    <input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jam" class="form-control-label">Jam</label>
                    <input type="text" name="jam" id="jam" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="anak_ke" class="form-control-label">Anak Ke</label>
                    <input type="text" name="anak_ke" id="anak_ke" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- Surat Pengantar Akta Kematian -->
            <div id="surat_pengantar_akta_kematian">
              <h6 class="heading-small text-muted mb-4">Data Pemohon</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama1" class="form-control-label">Nama</label>
                    <input type="text" name="nama1" id="nama1" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="ttl" class="form-control-label">Tempat, Tgl. Lahir</label>
                    <input type="text" name="ttl" id="ttl" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="agama" class="form-control-label">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Data Orang Meninggal</h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama2" class="form-control-label">Nama</label>
                    <input type="text" name="nama2" id="nama2" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="tanggal_kematian" class="form-control-label">Tanggal Kematian</label>
                    <input type="text" name="tanggal_kematian" id="tanggal_kematian" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jam" class="form-control-label">Jam</label>
                    <input type="text" name="jam" id="jam" class="form-control" readonly>
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function buat(jenis_surat) {
      $('#form_buat')[0].reset();
      $('#form_skbn').hide();
      $('[name="skbn"]').val(0);
      $('#form_skpn').hide();
      $('[name="skpn"]').val(0);
      $('#form_sku').hide();
      $('[name="sku"]').val(0);
      $('#form_spak1').hide();
      $('[name="spak1"]').val(0);
      $('#form_spak2').hide();
      $('[name="spak2"]').val(0);
      if (jenis_surat == 'skbn') {
        $('#modal-title-buat').text('Surat Keterangan Beda Nama');
        $('[name="skbn"]').val('1');
        $('#form_skbn').show();
      } else if (jenis_surat == 'skpn') {
        $('#modal-title-buat').text('Surat Keterangan Pengantar Nikah');
        $('[name="skpn"]').val('1');
        $('#form_skpn').show();
      } else if (jenis_surat == 'sku') {
        $('#modal-title-buat').text('Surat Keterangan Usaha');
        $('[name="sku"]').val('1');
        $('#form_sku').show();
      } else if (jenis_surat == 'spak1') {
        $('#modal-title-buat').text('Surat Pengantar Akta Kelahiran');
        $('[name="spak1"]').val('1');
        $('#form_spak1').show();
      } else if (jenis_surat == 'spak2') {
        $('#modal-title-buat').text('Surat Pengantar Akta Kematian');
        $('[name="spak2"]').val('1');
        $('#form_spak2').show();
      } else {
        console.log('Jenis surat tidak diketahui');
      }
      $('#modal_buat').modal('show');
    }

    function rincian(id) {
      $('#form_rincian')[0].reset();
      $.ajax({
        url: '<?php echo base_url('warga/pengajuan-surat/detail-pengajuan/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          data = JSON.parse(response.data);
          $('[name="id_pengajuan"]').val(response.id_pengajuan);
          $('[name="jenis_surat"]').val(response.jenis_surat);
          $('#surat_keterangan_beda_nama').hide();
          $('#surat_keterangan_pengantar_nikah').hide();
          $('#surat_keterangan_usaha').hide();
          $('#surat_pengantar_akta_kelahiran').hide();
          $('#surat_pengantar_akta_kematian').hide();
          if (response.jenis_surat == "Surat Keterangan Beda Nama") {
            $('[name="nama_ktp"]').val(data.nama_ktp);
            $('[name="nik_ktp"]').val(data.nik_ktp);
            $('[name="ttl_ktp"]').val(data.ttl_ktp);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="status_perkawinan"]').val(data.status_perkawinan);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="agama"]').val(data.agama);
            $('[name="alamat_ktp"]').val(data.alamat_ktp);
            $('[name="nama_kk"]').val(data.nama_kk);
            $('[name="nik_kk"]').val(data.nik_kk);
            $('[name="ttl_kk"]').val(data.ttl_kk);
            $('[name="alamat_kk"]').val(data.alamat_kk);
            $('#surat_keterangan_beda_nama').show();
          } else if (response.jenis_surat == "Surat Keterangan Pengantar Nikah") {
            $('[name="nama1"]').val(data.nama1);
            $('[name="ttl1"]').val(data.ttl1);
            $('[name="jenis_kelamin1"]').val(data.jenis_kelamin1);
            $('[name="agama1"]').val(data.agama1);
            $('[name="status_perkawinan1"]').val(data.status_perkawinan1);
            $('[name="warga_negara1"]').val(data.warga_negara1);
            $('[name="pekerjaan1"]').val(data.pekerjaan1);
            $('[name="alamat1"]').val(data.alamat1);
            $('[name="keperluan1"]').val(data.keperluan1);
            $('[name="tujuan1"]').val(data.tujuan1);
            $('[name="nama2"]').val(data.nama2);
            $('[name="ttl2"]').val(data.ttl2);
            $('[name="jenis_kelamin2"]').val(data.jenis_kelamin2);
            $('[name="agama2"]').val(data.agama2);
            $('[name="status_perkawinan2"]').val(data.status_perkawinan2);
            $('[name="alamat2"]').val(data.alamat2);
            $('#surat_keterangan_pengantar_nikah').show();
          } else if (response.jenis_surat == "Surat Keterangan Usaha") {
            $('[name="nama_lengkap"]').val(data.nama_lengkap);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="alamat"]').val(data.alamat);
            $('[name="usaha_pokok"]').val(data.usaha_pokok);
            $('[name="usaha_sampingan"]').val(data.usaha_sampingan);
            $('[name="kalurahan"]').val(data.kalurahan);
            $('[name="kapanewon"]').val(data.kapanewon);
            $('#surat_keterangan_usaha').show();
          } else if (response.jenis_surat == "Surat Pengantar Akta Kelahiran") {
            $('[name="nama_orang_tua"]').val(data.nama_orang_tua);
            $('[name="ttl"]').val(data.ttl);
            $('[name="alamat"]').val(data.alamat);
            $('[name="agama"]').val(data.agama);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="nama_anak"]').val(data.nama_anak);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="jam"]').val(data.jam);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="anak_ke"]').val(data.anak_ke);
            $('#surat_pengantar_akta_kelahiran').show();
          } else if (response.jenis_surat == "Surat Pengantar Akta Kematian") {
            $('[name="nama1"]').val(data.nama1);
            $('[name="ttl"]').val(data.ttl);
            $('[name="alamat"]').val(data.alamat);
            $('[name="agama"]').val(data.agama);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="nama2"]').val(data.nama2);
            $('[name="tanggal_kematian"]').val(data.tanggal_kematian);
            $('[name="jam"]').val(data.jam);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('#surat_pengantar_akta_kematian').show();
          } else {
            console.log("Tidak diketahui");
          }
          $('#modal_rincian').modal('show');
        },
        error: (err) => {
          Swal.fire({
            type: 'error',
            title: `Fetch Data : ${err}`
          })
        }
      });
    }

    $(() => {
      // submit form buat
      $('#form_buat').validate({
        errorElement: 'span',
        errorPlacement: (error, element) => {
          error.addClass('invalid-feedback');
          element.closest('.notif').append(error);
        },
        highlight: (element, errorClass, validClass) => {
          $(element).addClass('is-invalid');
        },
        unhighlight: (element, errorClass, validClass) => {
          $(element).removeClass('is-invalid');
        },
        submitHandler: () => {
          let form = $('#form_buat')[0];
          let isi_form = new FormData(form);
          $.ajax({
            url: '<?php echo base_url('warga/pengajuan-surat/simpan-pengajuan') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              if (response.status) {
                $('#modal_buat').modal('hide');
                $('#modal_jenis_surat').modal('hide');
                Swal.fire({
                  type: 'success',
                  title: `${response.title}`,
                  text: `${response.text}`,
                  button: {
                    text: "OK",
                    value: "OK"
                  }
                }).then((value) => {
                  location.reload();
                });
              } else {
                $('#modal_tambah').modal('hide');
                Swal.fire({
                  type: 'error',
                  title: `${response.title}`,
                  text: `${response.text}`,
                })
              }
            },
            error: (err) => {
              Swal.fire({
                type: 'error',
                title: `Error Submit Data: ${err}.`
              })
            }
          });
        }
      });
    });
  </script>