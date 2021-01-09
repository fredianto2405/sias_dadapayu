  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Klasifikasi Surat</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(strtolower($this->session->userdata('hak_akses')) . '/beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Klasifikasi Surat</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal_tambah">Tambah Klasifikasi Surat</button>
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
            <h3 class="mb-0">Tabel Data Klasifikasi Surat</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th style="width: 6%;">No</th>
                  <th style="width: 10%">Aksi</th>
                  <th style="width: 42%">Kode</th>
                  <th style="width: 42%">Tentang</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Kode</th>
                  <th>Tentang</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($klasifikasi_surat as $data) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <button type="button" onclick="edit('<?php echo $data['id_klasifikasi_surat']; ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                      <button type="button" onclick="hapus('<?php echo $data['id_klasifikasi_surat']; ?>', '<?php echo $data['tentang']; ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                    <td><?php echo $data['kode']; ?></td>
                    <td><?php echo $data['tentang']; ?></td>
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
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Tambah Klasifikasi Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_tambah" action="" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="kode" class="form-control-label">Kode</label>
              <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan kode" required>
            </div>
            <div class="form-group">
              <label for="tentang" class="form-control-label">Tentang</label>
              <input type="text" name="tentang" id="tentang" class="form-control" placeholder="Masukkan tentang" required>
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
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Ubah Klasifikasi Surat</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" id="form_edit" action="" method="POST">
          <input type="hidden" name="edit_id" id="edit_id">
          <div class="modal-body">
            <div class="form-group">
              <label for="edit_kode" class="form-control-label">Kode</label>
              <input type="text" name="edit_kode" id="edit_kode" class="form-control" placeholder="Masukkan kode" required>
            </div>
            <div class="form-group">
              <label for="edit_tentang" class="form-control-label">Tentang</label>
              <input type="text" name="edit_tentang" id="edit_tentang" class="form-control" placeholder="Masukkan tentang" required>
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
    function hapus(id, tentang) {
      let _id = id;
      Swal.fire({
        title: 'Hapus Klasifikasi Surat?',
        text: `${tentang}`,
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
            url: '<?= base_url('petugas/klasifikasi-surat/hapus-klasifikasi') ?>',
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
        url: '<?= base_url('petugas/klasifikasi-surat/detail-klasifikasi/') ?>' + id,
        type: "GET",
        dataType: "json",
        success: (response) => {
          $('[name="edit_id"]').val(response.id_klasifikasi_surat);
          $('[name="edit_kode"]').val(response.kode);
          $('[name="edit_tentang"]').val(response.tentang);
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
            url: '<?= base_url('petugas/klasifikasi-surat/simpan-klasifikasi') ?>',
            method: "POST",
            data: isi_form,
            dataType: "json",
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
            url: '<?= base_url('petugas/klasifikasi-surat/edit-klasifikasi') ?>',
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