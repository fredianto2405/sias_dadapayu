<?php

function is_petugas()
{
  $app = get_instance();
  if ($app->session->userdata('hak_akses') != 'petugas') {
    $app->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal masuk!</strong> Silahkan masuk dahulu.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('landing/masuk');
  }
}

function is_pimpinan()
{
  $app = get_instance();
  if ($app->session->userdata('hak_akses') != 'pimpinan') {
    $app->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal masuk!</strong> Silahkan masuk dahulu.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('landing/masuk');
  }
}

function is_warga()
{
  $app = get_instance();
  if ($app->session->userdata('hak_akses') != 'warga') {
    $app->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal masuk!</strong> Silahkan masuk dahulu.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('landing/masuk');
  }
}
