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
                      <?php if ($data['status'] == 0) : ?>
                        <button type="button" onclick="proses('<?php echo $data['id_pengajuan']; ?>')" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></button>
                      <?php else : ?>
                        <button type="button" onclick="proses('<?php echo $data['id_pengajuan']; ?>')" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></button>
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

  <!-- modal proses -->
  <div class="modal fade" id="modal_proses" tabindex="-1" role="dialog" aria-labelledby="modal_proses" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Proses Pengajuan Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_proses" action="" method="POST">
          <input type="hidden" name="id_pengajuan" id="id_pengajuan">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_surat" class="form-control-label">Jenis Surat</label>
                  <input type="text" name="jenis_surat" id="jenis_surat" class="form-control" readonly>
                </div>
              </div>
              <div class=" col-md-6">
                <div class="form-group">
                  <label for="nomor_surat" class="form-control-label">Nomor Surat</label>
                  <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan nomor surat" required>
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
                    <label for="tanggal_lahir" class="form-control-label">Tempat, Tgl. Lahir</label>
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
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Proses Pengajuan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function proses(id) {
      $.ajax({
        url: '<?php echo base_url('petugas/pengajuan-surat/detail-pengajuan/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          data = JSON.parse(response.data);
          $('[name="id_pengajuan"]').val(response.id_pengajuan);
          $('[name="jenis_surat"]').val(response.jenis_surat);
          if (response.status != '0') {
            $('[name="nomor_surat"]').val(response.nomor_surat);
            $('[name="nomor_surat"]').attr('readonly', true);
            $('.modal-footer').hide();
          } else {
            $('[name="nomor_surat"]').val('');
            $('[name="nomor_surat"]').removeAttr('readonly');
            $('.modal-footer').show();
          }
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
            $('#surat_keterangan_pengantar_nikah').hide();
            $('#surat_keterangan_usaha').hide();
            $('#surat_pengantar_akta_kelahiran').hide();
            $('#surat_pengantar_akta_kematian').hide();
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
            $('#surat_keterangan_beda_nama').hide();
            $('#surat_keterangan_pengantar_nikah').show();
            $('#surat_keterangan_usaha').hide();
            $('#surat_pengantar_akta_kelahiran').hide();
            $('#surat_pengantar_akta_kematian').hide();
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
            $('#surat_keterangan_beda_nama').hide();
            $('#surat_keterangan_pengantar_nikah').hide();
            $('#surat_keterangan_usaha').show();
            $('#surat_pengantar_akta_kelahiran').hide();
            $('#surat_pengantar_akta_kematian').hide();
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
            $('#surat_keterangan_beda_nama').hide();
            $('#surat_keterangan_pengantar_nikah').hide();
            $('#surat_keterangan_usaha').hide();
            $('#surat_pengantar_akta_kelahiran').show();
            $('#surat_pengantar_akta_kematian').hide();
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
            $('#surat_keterangan_beda_nama').hide();
            $('#surat_keterangan_pengantar_nikah').hide();
            $('#surat_keterangan_usaha').hide();
            $('#surat_pengantar_akta_kelahiran').hide();
            $('#surat_pengantar_akta_kematian').show();
          } else {
            console.log("Tidak diketahui");
          }
          $('#modal_proses').modal('show');
        },
        error: (err) => {
          Swal.fire({
            type: 'error',
            title: `Fetch Data : ${err}`
          })
        }
      });
    }

    function rincian(id) {
      console.log(id);
    }

    $(() => {
      // submit form proses
      $('#form_proses').validate({
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
          let form = $('#form_proses')[0];
          let isi_form = new FormData(form);
          $.ajax({
            url: '<?php echo base_url('petugas/pengajuan-surat/proses-pengajuan') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              if (response.status) {
                $('#modal_proses').modal('hide');
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
                $('#modal_proses').modal('hide');
                Swal.fire({
                  type: 'error',
                  title: `${response.title}`,
                  text: `${response.text}.`
                })
              }
            },
            error: (err) => {
              Swal.fire({
                type: 'error',
                title: `Error Submit Proses: ${err}.`
              })
            }
          });
        }
      });
    });
  </script>