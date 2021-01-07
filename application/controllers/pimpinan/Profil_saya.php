<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_saya extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_pimpinan();
    $this->load->model('pengajuan_model', 'pengajuan');
    $this->load->model('pengguna_model', 'pengguna');
  }

  public function index()
  {
    $web['halaman'] = "Profil Saya";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('1');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('1');
    $fetch['pengguna'] = $this->pengguna->get_by_id($this->session->userdata('id_pengguna'));
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_pimpinan', $fetch);
    $this->load->view('profil_saya');
    $this->load->view('templates/footer');
  }
}
