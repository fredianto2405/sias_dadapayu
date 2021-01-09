  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Pengguna</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(strtolower($this->session->userdata('hak_akses')) . '/beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal_tambah">Tambah Pengguna</button>
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
            <h3 class="mb-0">Tabel Data Pengguna</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 10%">Aksi</th>
                  <th style="width: 20%">Nama</th>
                  <th style="width: 28%">Alamat</th>
                  <th style="width: 16%">Hak Akses</th>
                  <th style="width: 20%">Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Hak Akses</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($pengguna as $data) :
                  $data_pengguna = json_decode($data['data']);
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <button type="button" onclick="edit('<?php echo $data['id_pengguna']; ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                    </td>
                    <td><?php echo $data_pengguna->nama; ?></td>
                    <td><?php echo $data_pengguna->alamat; ?></td>
                    <td><?php echo ucwords($data['hak_akses']); ?></td>
                    <td>
                      <?php if ($data['status'] == '1') : ?>
                        <i class="fas fa-toggle-on text-success"></i> Aktif
                      <?php else : ?>
                        <i class="fas fa-toggle-off text-danger"></i> Tidak Aktif
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

  <!-- modal tambah -->
  <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Tambah Pengguna</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_tambah" action="" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_pengguna" class="form-control-label">Nama Pengguna</label>
                  <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Masukkan nama pengguna" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="hak_akses" class="form-control-label">Hak Akses</label>
                  <select name="hak_akses" id="hak_akses" class="form-control" required>
                    <option value="">-- Pilih hak akses --</option>
                    <option value="pimpinan">Pimpinan</option>
                    <option value="petugas">Petugas</option>
                    <option value="warga">Warga</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih jenis kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat" class="form-control-label">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="agama" class="form-control-label">Agama</label>
                  <select name="agama" id="agama" class="form-control" required>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                  <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                    <option value="">-- Pilih status perkawinan --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                    <option value="">-- Pilih kewarganegaraan --</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="foto" class="form-control-label">Pas Foto</label>
                  <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="customFileLang" lang="en">
                    <label class="custom-file-label" for="customFileLang"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal edit -->
  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Ubah Pengguna</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_edit" action="" method="POST">
          <input type="hidden" name="edit_id" id="edit_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nama_pengguna" class="form-control-label">Nama Pengguna</label>
                  <input type="text" name="edit_nama_pengguna" id="edit_nama_pengguna" class="form-control" placeholder="Masukkan nama pengguna" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_hak_akses" class="form-control-label">Hak Akses</label>
                  <select name="edit_hak_akses" id="edit_hak_akses" class="form-control" required>
                    <option value="">-- Pilih hak akses --</option>
                    <option value="pimpinan">Pimpinan</option>
                    <option value="petugas">Petugas</option>
                    <option value="warga">Warga</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_status" class="form-control-label">Status</label>
                  <select name="edit_status" id="edit_status" class="form-control" required>
                    <option value="">-- Pilih status --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_kata_sandi" class="form-control-label">Kata Sandi</label>
                  <input type="password" name="edit_kata_sandi" id="edit_kata_sandi" class="form-control" placeholder="Masukkan kata sandi baru">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nik" class="form-control-label">NIK</label>
                  <input type="text" name="edit_nik" id="edit_nik" class="form-control" placeholder="Masukkan NIK" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nama" class="form-control-label">Nama</label>
                  <input type="text" name="edit_nama" id="edit_nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input type="text" name="edit_tempat_lahir" id="edit_tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input type="date" name="edit_tanggal_lahir" id="edit_tanggal_lahir" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                  <select name="edit_jenis_kelamin" id="edit_jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih jenis kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_alamat" class="form-control-label">Alamat</label>
                  <input type="text" name="edit_alamat" id="edit_alamat" class="form-control" placeholder="Masukkan alamat" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_agama" class="form-control-label">Agama</label>
                  <select name="edit_agama" id="edit_agama" class="form-control" required>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input type="text" name="edit_pekerjaan" id="edit_pekerjaan" class="form-control" placeholder="Masukkan pekerjaan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_status_perkawinan" class="form-control-label">Status Perkawinan</label>
                  <select name="edit_status_perkawinan" id="edit_status_perkawinan" class="form-control" required>
                    <option value="">-- Pilih status perkawinan --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                  <select name="edit_kewarganegaraan" id="edit_kewarganegaraan" class="form-control" required>
                    <option value="">-- Pilih kewarganegaraan --</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_foto" class="form-control-label">Pas Foto</label>
                  <div class="custom-file">
                    <input type="file" name="edit_foto" class="custom-file-input" id="customFileLang" lang="en">
                    <label class="custom-file-label" for="customFileLang"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function edit(id) {
      $.ajax({
        url: '<?= base_url('pimpinan/pengguna/detail-pengguna/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          data = JSON.parse(response.data);
          $('[name="edit_id"]').val(response.id_pengguna);
          $('[name="edit_nama_pengguna"]').val(response.nama_pengguna);
          $('[name="edit_hak_akses"]').val(response.hak_akses).change();
          $('[name="edit_status"]').val(response.status).change();
          $('[name="edit_nik"]').val(data.nik);
          $('[name="edit_nama"]').val(data.nama);
          $('[name="edit_tempat_lahir"]').val(data.tempat_lahir);
          $('[name="edit_tanggal_lahir"]').val(data.tanggal_lahir);
          $('[name="edit_jenis_kelamin"]').val(data.jenis_kelamin).change();
          $('[name="edit_alamat"]').val(data.alamat);
          $('[name="edit_agama"]').val(data.agama).change();
          $('[name="edit_pekerjaan"]').val(data.pekerjaan);
          $('[name="edit_status_perkawinan"]').val(data.status_perkawinan).change();
          $('[name="edit_kewarganegaraan"]').val(data.kewarganegaraan).change();
          $('#modal_edit').modal('show');
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
      // submit form tambah
      $('#form_tambah').validate({
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
          let form = $('#form_tambah')[0];
          let isi_form = new FormData(form);
          $.ajax({
            url: '<?= base_url('pimpinan/pengguna/simpan-pengguna') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              $('#modal_tambah').modal('hide');
              if (response.status) {
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

      // submit form edit
      $('#form_edit').validate({
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
          let form = $('#form_edit')[0];
          let isi_form = new FormData(form);
          $.ajax({
            url: '<?= base_url('pimpinan/pengguna/edit-pengguna') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              if (response.status) {
                $('#modal_edit').modal('hide');
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
                $('#modal_edit').modal('hide');
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