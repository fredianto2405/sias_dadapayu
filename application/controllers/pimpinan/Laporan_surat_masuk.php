<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_surat_masuk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_pimpinan();
    $this->load->model('surat_masuk_model', 'surat_masuk');
    $this->load->model('pengajuan_model', 'pengajuan');
    $this->load->library('Pdf');
  }

  public function index()
  {
    $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|trim');
    $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $web['halaman'] = "Laporan Surat Masuk";
      $web['uri'] = $this->uri->segment(2);
      $fetch['notifikasi'] = $this->pengajuan->get_by_status('1');
      $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('1');
      $fetch['no'] = 1;

      $this->load->view('templates/header', $web);
      $this->load->view('templates/sidebar_pimpinan', $fetch);
      $this->load->view('laporan_surat_masuk');
      $this->load->view('templates/footer');
    } else {
      $this->_laporan_surat_masuk();
    }
  }

  private function _laporan_surat_masuk()
  {
    $laporan_surat_masuk = $this->surat_masuk->get_by_date($this->input->post('tanggal_mulai'), $this->input->post('tanggal_selesai'));
    $this->session->set_flashdata('laporan_surat_masuk', $laporan_surat_masuk);
    $this->session->set_flashdata('tanggal_mulai', $this->input->post('tanggal_mulai'));
    $this->session->set_flashdata('tanggal_selesai', $this->input->post('tanggal_selesai'));
    redirect('pimpinan/laporan-surat-masuk');
  }

  public function cetak($tanggal_mulai, $tanggal_selesai)
  {
    $fetch['laporan_surat_masuk'] = $this->surat_masuk->get_by_date($tanggal_mulai, $tanggal_selesai);
    $this->load->view('cetak_laporan_surat_masuk', $fetch);
  }
}
