<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
  public function index()
  {
    $web['halaman'] = "Beranda";
    $this->load->view('templates/header_landing', $web);
    $this->load->view('landing/index');
    $this->load->view('templates/footer_landing');
  }

  public function tentang()
  {
    $web['halaman'] = "Tentang";
    $this->load->view('templates/header_landing', $web);
    $this->load->view('landing/tentang');
    $this->load->view('templates/footer_landing');
  }

  public function masuk()
  {
    $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
    $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $web['halaman'] = "Masuk";
      $this->load->view('templates/header_landing', $web);
      $this->load->view('landing/masuk');
      $this->load->view('templates/footer_landing');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nama_pengguna = $this->input->post('nama_pengguna');
    $kata_sandi = $this->input->post('kata_sandi');

    $pengguna = $this->db->get_where('pengguna', ['nama_pengguna' => $nama_pengguna])->row_array();

    if ($pengguna) {
      if (password_verify($kata_sandi, $pengguna['kata_sandi']) && $pengguna['status'] == '1') {
        $data_pengguna = json_decode($pengguna['data']);
        $data = [
          'id_pengguna' => $pengguna['id_pengguna'],
          'nama' => $data_pengguna->nama,
          'hak_akses' => $pengguna['hak_akses'],
          'data' => $pengguna['data'],
          'foto' => $pengguna['foto'],
        ];
        $this->session->set_userdata($data);

        if ($pengguna['hak_akses'] == 'pimpinan') {
          redirect('pimpinan/beranda');
        } elseif ($pengguna['hak_akses'] == 'petugas') {
          redirect('petugas/beranda');
        } elseif ($pengguna['hak_akses'] == 'warga') {
          redirect('warga/beranda');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal masuk!</strong> Nama Pengguna dan Kata Sandi tidak cocok.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('landing/masuk');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Gagal masuk!</strong> Nama Pengguna dan Kata Sandi tidak cocok.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('landing/masuk');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('id_pengguna');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('hak_akses');
    $this->session->unset_userdata('foto');

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Berhasil!</strong> Anda keluar dari sistem.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('landing/masuk');
  }
}
