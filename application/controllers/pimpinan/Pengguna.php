<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_pimpinan();
    $this->load->model('pengguna_model', 'pengguna');
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Pengguna";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('0');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('0');
    $fetch['no'] = 1;
    $fetch['pengguna'] = $this->pengguna->get_all();
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_pimpinan', $fetch);
    $this->load->view('pengguna');
    $this->load->view('templates/footer');
  }

  public function hapus_pengguna()
  {
    echo json_encode($this->pengguna->delete($this->input->post('id')));
  }

  public function detail_pengguna($id_pengguna)
  {
    echo json_encode($this->pengguna->get_by_id($id_pengguna));
  }

  public function simpan_pengguna()
  {
    $data_pengguna = [
      'nik' => $this->input->post('nik'),
      'nama' => $this->input->post('nama'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'agama' => $this->input->post('agama'),
      'status_perkawinan' => $this->input->post('status_perkawinan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'kewarganegaraan' => $this->input->post('kewarganegaraan'),
    ];

    $password_default = date('dmY', strtotime($this->input->post('tanggal_lahir')));

    $data = [
      'nama_pengguna' => $this->input->post('nama_pengguna'),
      'kata_sandi' => password_hash($password_default, PASSWORD_DEFAULT),
      'hak_akses' => $this->input->post('hak_akses'),
      'status' => '0',
      'data' => json_encode($data_pengguna),
      'ktp' => 'default.jpg',
      'kk' => 'default.jpg',
      'foto' => 'default.jpg',
    ];

    echo json_encode($this->pengguna->insert($data));
  }

  public function edit_pengguna()
  {
    $id_pengguna = $this->input->post('edit_id');

    $data_pengguna = [
      'nik' => $this->input->post('edit_nik'),
      'nama' => $this->input->post('edit_nama'),
      'tempat_lahir' => $this->input->post('edit_tempat_lahir'),
      'tanggal_lahir' => $this->input->post('edit_tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('edit_jenis_kelamin'),
      'alamat' => $this->input->post('edit_alamat'),
      'agama' => $this->input->post('edit_agama'),
      'status_perkawinan' => $this->input->post('edit_status_perkawinan'),
      'pekerjaan' => $this->input->post('edit_pekerjaan'),
      'kewarganegaraan' => $this->input->post('edit_kewarganegaraan'),
    ];

    $data = [
      'nama_pengguna' => $this->input->post('edit_nama_pengguna'),
      'hak_akses' => $this->input->post('edit_hak_akses'),
      'status' => $this->input->post('edit_status'),
      'data' => json_encode($data_pengguna),
    ];

    echo json_encode($this->pengguna->update($id_pengguna, $data));
  }
}
