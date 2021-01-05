<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_petugas();
    $this->load->model('surat_masuk_model', 'surat_masuk');
    $this->load->model('surat_keluar_model', 'surat_keluar');
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Beranda";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('0');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('0');
    $fetch['surat_masuk'] = $this->surat_masuk->count_by_month();
    $fetch['surat_keluar'] = $this->surat_keluar->count_by_month();
    $fetch['pengajuan'] = $this->pengajuan->count_by_month();
    $fetch['periode'] = indonesian_date(date('F Y'), 'F Y');
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_petugas', $fetch);
    $this->load->view('beranda_petugas');
    $this->load->view('templates/footer');
  }
}
