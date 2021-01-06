<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_warga();
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Beranda";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('2');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('2');
    $id_pengguna = $this->session->userdata('id_pengguna');
    $fetch['menunggu'] = $this->pengajuan->count_by_month('0', $id_pengguna);
    $fetch['diproses'] = $this->pengajuan->count_by_month('1', $id_pengguna);
    $fetch['disetujui'] = $this->pengajuan->count_by_month('2', $id_pengguna);
    $fetch['periode'] = indonesian_date(date('F Y'), 'F Y');
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_warga', $fetch);
    $this->load->view('beranda_warga');
    $this->load->view('templates/footer');
  }
}
