<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_surat_keluar extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_pimpinan();
    $this->load->model('surat_keluar_model', 'surat_keluar');
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Laporan Surat Masuk";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('0');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('0');
    $fetch['no'] = 1;
    $fetch['laporan_surat_keluar'] = array();

    if ($this->input->post('tanggal_mulai') && $this->input->post('tanggal_selesai')) {
      $fetch['laporan_surat_keluar'] = $this->surat_keluar->get_by_date($this->input->post('tanggal_mulai'), $this->input->post('tanggal_selesai'));
    }

    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_pimpinan', $fetch);
    $this->load->view('laporan_surat_keluar');
    $this->load->view('templates/footer');
  }
}
