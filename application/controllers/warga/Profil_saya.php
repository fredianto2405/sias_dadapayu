<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_saya extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_warga();
    $this->load->model('pengajuan_model', 'pengajuan');
    $this->load->model('pengguna_model', 'pengguna');
  }

  public function index()
  {
    $web['halaman'] = "Profil Saya";
    $web['uri'] = $this->uri->segment(2);
    $id_pengguna = $this->session->userdata('id_pengguna');
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('2', $id_pengguna);
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('2', $id_pengguna);
    $fetch['pengguna'] = $this->pengguna->get_by_id($id_pengguna);
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_warga', $fetch);
    $this->load->view('profil_saya');
    $this->load->view('templates/footer');
  }
}
