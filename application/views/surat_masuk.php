  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Surat Masuk</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(strtolower($this->session->userdata('hak_akses')) . '/beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Surat Masuk</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal_tambah">Tambah Surat Masuk</button>
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
            <h3 class="mb-0">Tabel Data Surat Masuk</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 10%">Aksi</th>
                  <th style="width: 21%">Kode Klasifikasi</th>
                  <th style="width: 21%">Isi Ringkas</th>
                  <th style="width: 21%">Dari</th>
                  <th style="width: 21%">No. & Tgl. Surat</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 10%">Aksi</th>
                  <th style="width: 21%">Kode Klasifikasi</th>
                  <th style="width: 21%">Isi Ringkas</th>
                  <th style="width: 21%">Dari</th>
                  <th style="width: 21%">No. & Tgl. Surat</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($surat_masuk as $data) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <button type="button" onclick="lampiran('<?php echo $data['id_surat_masuk']; ?>')" class="btn btn-sm btn-primary"><i class="fa fa-copy"></i></button>
                      <button type="button" onclick="edit('<?php echo $data['id_surat_masuk']; ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                      <button type="button" onclick="hapus('<?php echo $data['id_surat_masuk']; ?>', '<?php echo $data['nomor_surat']; ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                    <td><?php echo $data['kode']; ?> - <?php echo $data['tentang']; ?></td>
                    <td><?php echo $data['isi_ringkas']; ?></td>
                    <td><?php echo $data['dari']; ?></td>
                    <td>
                      Nomor Surat:<br>
                      <?php echo $data['nomor_surat']; ?><br>
                      <br>

                      Tanggal Surat:<br>
                      <?php echo indonesian_date($data['tanggal_surat']); ?>
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
          <h6 class="modal-title" id="modal-title-default">Tambah Surat Masuk</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_tambah" action="" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="id_klasifikasi_surat" class="form-control-label">Kode Klasifikasi</label>
                  <select class="form-control" name="id_klasifikasi_surat" id="id_klasifikasi_surat" required>
                    <option value="">-- Pilih Kode Klasifikasi --</option>
                    <?php foreach ($klasifikasi_surat as $data) : ?>
                      <option value="<?php echo $data['id_klasifikasi_surat']; ?>"><?php echo $data['kode']; ?> - <?php echo $data['tentang']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="dari" class="form-control-label">Dari</label>
                  <input type="text" name="dari" id="dari" class="form-control" placeholder="Masukkan asal surat" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor_surat" class="form-control-label">Nomor Surat</label>
                  <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan nomor surat" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_surat" class="form-control-label">Tanggal Surat</label>
                  <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" placeholder="Masukkan tanggal surat" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="isi_ringkas" class="form-control-label">Isi Ringkas</label>
              <textarea class="form-control" name="isi_ringkas" id="isi_ringkas" rows="3" placeholder="Tuliskan isi ringkas" required></textarea>
            </div>
            <div class="form-group">
              <label for="keterangan" class="form-control-label">Keterangan</label>
              <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan">
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
          <h6 class="modal-title" id="modal-title-default">Ubah Surat Masuk</h6>
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
                  <label for="edit_id_klasifikasi_surat" class="form-control-label">Kode Klasifikasi</label>
                  <select class="form-control" name="edit_id_klasifikasi_surat" id="edit_id_klasifikasi_surat" required>
                    <option value="">-- Pilih Kode Klasifikasi --</option>
                    <?php foreach ($klasifikasi_surat as $data) : ?>
                      <option value="<?php echo $data['id_klasifikasi_surat']; ?>"><?php echo $data['kode']; ?> - <?php echo $data['tentang']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_dari" class="form-control-label">Dari</label>
                  <input type="text" name="edit_dari" id="edit_dari" class="form-control" placeholder="Masukkan asal surat" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nomor_surat" class="form-control-label">Nomor Surat</label>
                  <input type="text" name="edit_nomor_surat" id="edit_nomor_surat" class="form-control" placeholder="Masukkan nomor surat" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_tanggal_surat" class="form-control-label">Tanggal Surat</label>
                  <input type="date" name="edit_tanggal_surat" id="edit_tanggal_surat" class="form-control" placeholder="Masukkan tanggal surat" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_isi_ringkas" class="form-control-label">Isi Ringkas</label>
              <textarea class="form-control" name="edit_isi_ringkas" id="edit_isi_ringkas" rows="3" placeholder="Tuliskan isi ringkas" required></textarea>
            </div>
            <div class="form-group">
              <label for="edit_keterangan" class="form-control-label">Keterangan</label>
              <input type="text" name="edit_keterangan" id="edit_keterangan" class="form-control" placeholder="Masukkan keterangan">
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

  <!-- modal lampiran -->
  <div class="modal fade" id="modal_lampiran" tabindex="-1" role="dialog" aria-labelledby="modal_lampiran" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Lampiran Surat Masuk</h6>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah_lampiran">Tambah Lampiran</button>
        </div>
        <div class="modal-body">
          <ul class="list-group list-group-flush list my--3" id="lampiran">
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- modal tambah lampiran -->
  <div class="modal fade" id="modal_tambah_lampiran" tabindex="-1" role="dialog" aria-labelledby="modal_tambah_lampiran" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Tambah Lampiran</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_tambah_lampiran" action="" method="POST">
          <input type="hidden" name="id_surat_masuk" id="id_surat_masuk">
          <div class="modal-body">
            <div class="form-group">
              <label for="judul" class="form-control-label">Judul</label>
              <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul lampiran" required>
            </div>
            <div class="form-group">
              <label for="berkas" class="form-control-label">Berkas</label>
              <input type="file" name="berkas" id="berkas" class="form-control" required>
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

  <script type="text/javascript">
    function hapus(id, nomor_surat) {
      let _id = id;
      Swal.fire({
        title: 'Hapus Surat Masuk?',
        text: `${nomor_surat}`,
        type: 'question',
        showCancelButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo base_url('petugas/surat-masuk/hapus-surat') ?>',
            method: "POST",
            data: {
              id: _id
            },
            dataType: "json",
            success: (response) => {
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
                Swal.fire({
                  type: 'error',
                  title: `${response.title}.`,
                  text: `${response.text}.`
                })
              }
            },
            error: (ee) => {
              console.log(` ee ${ee} `);
            }
          });
        }
      })
    }

    function edit(id) {
      $.ajax({
        url: '<?php echo base_url('petugas/surat-masuk/detail-surat/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          $('[name="edit_id"]').val(response.id_surat_masuk);
          $('[name="edit_id_klasifikasi_surat"]').val(response.id_klasifikasi_surat).change();
          $('[name="edit_dari"]').val(response.dari);
          $('[name="edit_nomor_surat"]').val(response.nomor_surat);
          $('[name="edit_tanggal_surat"]').val(response.tanggal_surat);
          $('[name="edit_isi_ringkas"]').val(response.isi_ringkas);
          $('[name="edit_keterangan"]').val(response.keterangan);
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

    function lampiran(id) {
      $('[name="id_surat_masuk"]').val(id);
      $.ajax({
        url: '<?php echo base_url('petugas/surat-masuk/lampiran/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          $('#lampiran').empty();
          var data = new Array();
          var file = '<?php echo base_url('upload/surat_masuk/'); ?>'
          for (var i = 0; i < response.length; i++) {
            var row = '<li class="list-group-item px-0"><div class="row align-items-center"><div class="col ml--2"><h4 class="mb-0"><a href="' + file + response[i]['berkas'] + '" target="_blank">' + response[i]['judul'] + '</a></h4></div><div class="col-auto"><button type="button" class="btn btn-sm btn-danger" onclick="hapus_lampiran(' + response[i]['id_lampiran_surat_masuk'] + ')">Hapus</a></div></div></li>';
            data.push(row);
          }
          $('#lampiran').append(data);
          $('#modal_lampiran').modal('show');
        },
        error: (err) => {
          Swal.fire({
            type: 'error',
            title: `Fetch Data : ${err}`
          })
        }
      });
    }

    function hapus_lampiran(id) {
      let _id = id;
      Swal.fire({
        title: 'Hapus Lampiran?',
        type: 'question',
        showCancelButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo base_url('petugas/surat-masuk/hapus-lampiran') ?>',
            method: "POST",
            data: {
              id: _id
            },
            dataType: "json",
            success: (response) => {
              if (response.status) {
                $('#modal_lampiran').modal('hide');
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
                Swal.fire({
                  type: 'error',
                  title: `${response.title}.`,
                  text: `${response.text}.`
                })
              }
            },
            error: (ee) => {
              console.log(` ee ${ee} `);
            }
          });
        }
      })
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
            url: '<?php echo base_url('petugas/surat-masuk/simpan-surat') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              if (response.status) {
                $('#modal_tambah').modal('hide');
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

      // submit form tambah lampiran
      $('#form_tambah_lampiran').validate({
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
          let form = $('#form_tambah_lampiran')[0];
          let isi_form = new FormData(form);
          $.ajax({
            url: '<?php echo base_url('petugas/surat-masuk/simpan-lampiran') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
              if (response.status) {
                $('#modal_tambah_lampiran').modal('hide');
                $('#modal_lampiran').modal('hide');
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
                $('#modal_tambah_lampiran').modal('hide');
                $('#modal_lampiran').modal('hide');
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
            url: '<?php echo base_url('petugas/surat-masuk/edit-surat') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
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