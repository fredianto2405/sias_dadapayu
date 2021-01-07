<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_pimpinan();
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Pengajuan Surat";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('1');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('1');
    $fetch['no'] = 1;
    $fetch['pengajuan'] = $this->pengajuan->get_all();
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_pimpinan', $fetch);
    $this->load->view('pengajuan_pimpinan');
    $this->load->view('templates/footer');
  }

  public function detail_pengajuan($id_pengajuan)
  {
    echo json_encode($this->pengajuan->get_by_id($id_pengajuan));
  }

  public function konfirmasi_pengajuan()
  {
    date_default_timezone_set('Asia/Jakarta');

    $id_pengajuan = $this->input->post('id_pengajuan');
    $data = [
      'status' => '2',
      'tanggal_konfirmasi' => date('Y-m-d H:i:s'),
    ];

    echo json_encode($this->pengajuan->update($id_pengajuan, $data));
  }
}
