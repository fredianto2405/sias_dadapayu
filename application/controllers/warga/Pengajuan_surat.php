<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_warga();
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Pengajuan Surat";
    $web['uri'] = $this->uri->segment(2);
    $id_pengguna = $this->session->userdata('id_pengguna');
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('2', $id_pengguna);
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('2', $id_pengguna);
    $fetch['no'] = 1;
    $fetch['pengajuan'] = $this->pengajuan->get_by_pengguna($id_pengguna);
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_warga', $fetch);
    $this->load->view('pengajuan_warga');
    $this->load->view('templates/footer');
  }

  public function detail_pengajuan($id_pengajuan)
  {
    echo json_encode($this->pengajuan->get_by_id($id_pengajuan));
  }

  public function simpan_pengajuan()
  {
    $data_pengajuan = array();
    $jenis_surat = '';

    if ($this->input->post('skbn') == 1) {
      $jenis_surat = 'Surat Keterangan Beda Nama';
      $data_pengajuan = [
        'nama_ktp' => $this->input->post('skbn_nama_ktp'),
        'nik_ktp' => $this->input->post('skbn_nik_ktp'),
        'ttl_ktp' => $this->input->post('skbn_ttl_ktp'),
        'jenis_kelamin' => $this->input->post('skbn_jenis_kelamin'),
        'status_perkawinan' => $this->input->post('skbn_status_perkawinan'),
        'pekerjaan' => $this->input->post('skbn_pekerjaan'),
        'agama' => $this->input->post('skbn_agama'),
        'alamat_ktp' => $this->input->post('skbn_alamat_ktp'),
        'nama_kk' => ucwords($this->input->post('skbn_nama_kk')),
        'nik_kk' => ucwords($this->input->post('skbn_nik_kk')),
        'ttl_kk' => ucwords($this->input->post('skbn_ttl_kk')),
        'alamat_kk' => ucwords($this->input->post('skbn_alamat_kk')),
      ];
    } else if ($this->input->post('skpn') == 1) {
      $jenis_surat = 'Surat Keterangan Pengantar Nikah';
      $data_pengajuan = [
        'nama1' => $this->input->post('skpn_nama1'),
        'ttl1' => $this->input->post('skpn_ttl1'),
        'jenis_kelamin1' => $this->input->post('skpn_jenis_kelamin1'),
        'agama1' => $this->input->post('skpn_agama1'),
        'status_perkawinan1' => $this->input->post('skpn_status_perkawinan1'),
        'warga_negara1' => $this->input->post('skpn_warga_negara1'),
        'pekerjaan1' => $this->input->post('skpn_pekerjaan1'),
        'alamat1' => $this->input->post('skpn_alamat1'),
        'keperluan1' => $this->input->post('skpn_keperluan1'),
        'tujuan1' => ucwords($this->input->post('skpn_tujuan1')),
        'nama2' => ucwords($this->input->post('skpn_nama2')),
        'ttl2' => ucwords($this->input->post('skpn_ttl2')),
        'jenis_kelamin2' => $this->input->post('skpn_jenis_kelamin2'),
        'agama2' => $this->input->post('skpn_agama2'),
        'status_perkawinan2' => $this->input->post('skpn_status_perkawinan2'),
        'alamat2' => ucwords($this->input->post('skpn_alamat2')),
      ];
    } else if ($this->input->post('sku') == 1) {
      $jenis_surat = 'Surat Keterangan Usaha';
      $data_pengajuan = [
        'nama_lengkap' => $this->input->post('sku_nama_lengkap'),
        'tanggal_lahir' => $this->input->post('sku_tanggal_lahir'),
        'tempat_lahir' => $this->input->post('sku_tempat_lahir'),
        'pekerjaan' => $this->input->post('sku_pekerjaan'),
        'alamat' => $this->input->post('sku_alamat'),
        'usaha_pokok' => ucwords($this->input->post('sku_usaha_pokok')),
        'usaha_sampingan' => ucwords($this->input->post('sku_usaha_sampingan')),
        'kalurahan' => ucwords($this->input->post('sku_kalurahan')),
        'kapanewon' => ucwords($this->input->post('sku_kapanewon')),
      ];
    } else if ($this->input->post('spak1') == 1) {
      $jenis_surat = 'Surat Pengantar Akta Kelahiran';
      $data_pengajuan = [
        'nama_orang_tua' => $this->input->post('spak1_nama_orang_tua'),
        'ttl' => $this->input->post('spak1_ttl'),
        'alamat' => $this->input->post('spak1_alamat'),
        'agama' => $this->input->post('spak1_agama'),
        'pekerjaan' => $this->input->post('spak1_pekerjaan'),
        'nama_anak' => ucwords($this->input->post('spak1_nama_anak')),
        'tanggal_lahir' => indonesian_date($this->input->post('spak1_tanggal_lahir')),
        'hari_lahir' => indonesian_date($this->input->post('spak1_tanggal_lahir'), 'l'),
        'jam' => ucwords($this->input->post('spak1_jam')),
        'jenis_kelamin' => ucwords($this->input->post('spak1_jenis_kelamin')),
        'anak_ke' => ucwords($this->input->post('spak1_anak_ke')),
      ];
    } else if ($this->input->post('spak2') == 1) {
      $jenis_surat = 'Surat Pengantar Akta Kematian';
      $data_pengajuan = [
        'nama1' => $this->input->post('spak2_nama1'),
        'ttl' => $this->input->post('spak2_ttl'),
        'alamat' => $this->input->post('spak2_alamat'),
        'agama' => $this->input->post('spak2_agama'),
        'pekerjaan' => $this->input->post('spak2_pekerjaan'),
        'nama2' => ucwords($this->input->post('spak2_nama2')),
        'tanggal_kematian' => indonesian_date($this->input->post('spak2_tanggal_kematian')),
        'hari_kematian' => indonesian_date($this->input->post('spak2_tanggal_kematian'), 'l'),
        'jam' => ucwords($this->input->post('spak2_jam')),
        'jenis_kelamin' => ucwords($this->input->post('spak2_jenis_kelamin')),
      ];
    }

    $data = [
      'id_pengguna' => $this->session->userdata('id_pengguna'),
      'jenis_surat' => $jenis_surat,
      'tanggal_pengajuan' => date('Y-m-d H:i:s'),
      'data' => json_encode($data_pengajuan),
      'status' => '0',
    ];

    echo json_encode($this->pengajuan->insert($data));
  }
}
