<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_surat_masuk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_petugas();
    $this->load->model('surat_masuk_model', 'surat_masuk');
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Laporan Surat Masuk";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('0');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('0');
    $fetch['no'] = 1;
    $fetch['laporan_surat_masuk'] = array();

    if ($this->input->post('tanggal_mulai') && $this->input->post('tanggal_selesai')) {
      $fetch['laporan_surat_masuk'] = $this->surat_masuk->get_by_date($this->input->post('tanggal_mulai'), $this->input->post('tanggal_selesai'));
    }

    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_petugas', $fetch);
    $this->load->view('laporan_surat_masuk');
    $this->load->view('templates/footer');
  }
}
