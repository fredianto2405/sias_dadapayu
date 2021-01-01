<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi_surat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('klasifikasi_surat_model', 'klasifikasi_surat');
  }

  public function index()
  {
    $web['halaman'] = "Klasifikasi Surat";
    $web['uri'] = $this->uri->segment(2);
    $fetch['no'] = 1;
    $fetch['klasifikasi_surat'] = $this->klasifikasi_surat->get_all();
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_petugas');
    $this->load->view('klasifikasi_surat', $fetch);
    $this->load->view('templates/footer');
  }

  public function hapus_klasifikasi()
  {
    echo json_encode($this->klasifikasi_surat->delete($this->input->post('id')));
  }

  public function detail_klasifikasi($id_klasifikasi_surat)
  {
    echo json_encode($this->klasifikasi_surat->get_by_id($id_klasifikasi_surat));
  }

  public function simpan_klasifikasi()
  {
    $data = [
      'kode' => $this->input->post('kode'),
      'tentang' => $this->input->post('tentang'),
    ];

    echo json_encode($this->klasifikasi_surat->insert($data));
  }

  public function edit_klasifikasi()
  {
    $id_klasifikasi_surat = $this->input->post('edit-id');
    $data = [
      'kode' => $this->input->post('edit-kode'),
      'tentang' => $this->input->post('edit-tentang'),
    ];

    echo json_encode($this->klasifikasi_surat->update($id_klasifikasi_surat, $data));
  }
}
