<!-- Main content -->
<div class="main-content">
  <!-- Header -->
  <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white">Buat Akun Baru</h1>
            <p class="text-lead text-white">Silahkan isi form pendaftaran dengan data diri Anda</p>
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
      <div class="col-lg-7 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <?php
              if ($this->session->flashdata('flash')) {
                echo $this->session->flashdata('flash');
              }
              ?>
              <small>Pastikan data diri Anda sesuai dengan KTP</small>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="hak_akses" value="warga">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="nama_pengguna" class="form-control-label">Nama Pengguna</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" name="nama_pengguna" placeholder="Masukkan nama pengguna" type="text" value="<?php echo set_value('nama_pengguna'); ?>">
                    </div>
                    <p><small class="text-danger"><?= form_error('nama_pengguna'); ?></small></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="kata_sandi" class="form-control-label">Kata Sandi</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <p class="form-control text-success">Tanggal lahir (HHBBTTTT)</p>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group mb-3">
                <label for="nik" class="form-control-label">NIK</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <input class="form-control" name="nik" placeholder="Masukkan NIK" type="text" value="<?php echo set_value('nik'); ?>">
                </div>
                <p><small class="text-danger"><?= form_error('nik'); ?></small></p>
              </div>
              <div class="form-group mb-3">
                <label for="nama" class="form-control-label">Nama</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <input class="form-control" name="nama" placeholder="Masukkan nama" type="text" value="<?php echo set_value('nama'); ?>">
                </div>
                <p><small class="text-danger"><?= form_error('nama'); ?></small></p>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir" type="text" value="<?php echo set_value('tempat_lahir'); ?>">
                    </div>
                    <p><small class="text-danger"><?= form_error('tempat_lahir'); ?></small></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan tanggal lahir" type="text" value="<?php echo set_value('tanggal_lahir'); ?>">
                    </div>
                    <p><small class="text-danger"><?= form_error('tanggal_lahir'); ?></small></p>
                  </div>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="" <?php echo set_select('jenis_kelamin', '', TRUE); ?>>-- Pilih salah satu --</option>
                    <option value="laki-laki" <?php echo set_select('jenis_kelamin', 'laki-laki'); ?>>Laki-laki</option>
                    <option value="perempuan" <?php echo set_select('jenis_kelamin', 'perempuan'); ?>>Perempuan</option>
                  </select>
                </div>
                <p><small class="text-danger"><?= form_error('jenis_kelamin'); ?></small></p>
              </div>
              <div class="form-group mb-3">
                <label for="alamat" class="form-control-label">Alamat</label>
                <div class="input-group input-group-merge input-group-alternative">
                  <input class="form-control" name="alamat" placeholder="Masukkan alamat" type="text" value="<?php echo set_value('alamat'); ?>">
                </div>
                <p><small class="text-danger"><?= form_error('alamat'); ?></small></p>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="agama" class="form-control-label">Agama</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <select name="agama" id="agama" class="form-control">
                        <option value="" <?php echo set_select('agama', '', TRUE); ?>>-- Pilih salah satu --</option>
                        <option value="islam" <?php echo set_select('agama', 'islam'); ?>>Islam</option>
                        <option value="protestan" <?php echo set_select('agama', 'protestan'); ?>>Protestan</option>
                        <option value="katolik" <?php echo set_select('agama', 'katolik'); ?>>Katolik</option>
                        <option value="hindu" <?php echo set_select('agama', 'hindu'); ?>>Hindu</option>
                        <option value="buddha" <?php echo set_select('agama', 'buddha'); ?>>Buddha</option>
                        <option value="khonghucu" <?php echo set_select('agama', 'khonghucu'); ?>>Khonghucu</option>
                      </select>
                    </div>
                    <p><small class="text-danger"><?= form_error('agama'); ?></small></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" name="pekerjaan" placeholder="Masukkan pekerjaan" type="text" value="<?php echo set_value('pekerjaan'); ?>">
                    </div>
                    <p><small class="text-danger"><?= form_error('pekerjaan'); ?></small></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                        <option value="" <?php echo set_select('status_perkawinan', '', TRUE); ?>>-- Pilih salah satu --</option>
                        <option value="belum kawin" <?php echo set_select('status_perkawinan', 'belum kawin'); ?>>Belum Kawin</option>
                        <option value="kawin" <?php echo set_select('status_perkawinan', 'kawin'); ?>>Kawin</option>
                        <option value="cerai hidup" <?php echo set_select('status_perkawinan', 'cerai hidup'); ?>>Cerai Hidup</option>
                        <option value="cerai mati" <?php echo set_select('status_perkawinan', 'cerai mati'); ?>>Cerai Mati</option>
                      </select>
                    </div>
                    <p><small class="text-danger"><?= form_error('status_perkawinan'); ?></small></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" name="kewarganegaraan" placeholder="Masukkan kewarganegaraan" type="text" value="<?php echo set_value('kewarganegaraan'); ?>">
                    </div>
                    <p><small class="text-danger"><?= form_error('kewarganegaraan'); ?></small></p>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group mb-3">
                <label for="ktp" class="form-control-label">Foto KTP</label>
                <div class="custom-file">
                  <input type="file" name="ktp" class="custom-file-input" id="customFileLang" lang="en">
                  <label for="customFileLang" class="custom-file-label"></label>
                </div>
                <p><small class="text-danger"><?= form_error('ktp'); ?></small></p>
              </div>
              <div class="form-group mb-3">
                <label for="kk" class="form-control-label">Foto Kartu Keluarga</label>
                <div class="custom-file">
                  <input type="file" name="kk" class="custom-file-input" id="customFileLang" lang="en">
                  <label for="customFileLang" class="custom-file-label"></label>
                </div>
                <p><small class="text-danger"><?= form_error('kk'); ?></small></p>
              </div>
              <div class="form-group mb-3">
                <label for="foto" class="form-control-label">Pas Foto Pengguna</label>
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="customFileLang" lang="en">
                  <label for="customFileLang" class="custom-file-label"></label>
                </div>
                <p><small class="text-danger"><?= form_error('foto'); ?></small></p>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Buat akun</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>