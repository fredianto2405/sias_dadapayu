<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_kata_sandi extends CI_Controller
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
    $this->form_validation->set_rules('kata_sandi_lama', 'Kata Sandi Lama', 'required|trim');
    $this->form_validation->set_rules('kata_sandi_baru', 'Kata Sandi Baru', 'required|trim');
    $this->form_validation->set_rules('k_kata_sandi_baru', 'Konfirmasi Kata Sandi Baru', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $web['halaman'] = "Ubah Kata Sandi";
      $web['uri'] = $this->uri->segment(2);
      $fetch['notifikasi'] = $this->pengajuan->get_by_status('2');
      $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('2');

      $this->load->view('templates/header', $web);
      $this->load->view('templates/sidebar_warga', $fetch);
      $this->load->view('ubah_kata_sandi');
      $this->load->view('templates/footer');
    } else {
      $this->_ubah_kata_sandi();
    }
  }

  private function _ubah_kata_sandi()
  {
    $kata_sandi_lama = $this->input->post('kata_sandi_lama');
    $kata_sandi_baru = $this->input->post('kata_sandi_baru');
    $k_kata_sandi_baru = $this->input->post('k_kata_sandi_baru');

    $pengguna = $this->pengguna->get_by_id($this->session->userdata('id_pengguna'));

    if (password_verify($kata_sandi_lama, $pengguna['kata_sandi'])) {
      if ($kata_sandi_baru == $k_kata_sandi_baru) {
        $data = [
          'kata_sandi' => password_hash($kata_sandi_baru, PASSWORD_DEFAULT),
        ];

        $this->pengguna->update($this->session->userdata('id_pengguna'), $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Berhasil!</strong> Kata sandi diubah.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('warga/ubah-kata-sandi');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal!</strong> Konfirmasi kata sandi baru salah.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('warga/ubah-kata-sandi');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal!</strong> Kata sandi lama salah.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('warga/ubah-kata-sandi');
    }
  }
}
