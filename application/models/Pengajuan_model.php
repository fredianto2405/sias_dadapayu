<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
  public function get_all()
  {
    $this->db->select('pengajuan.*, pengguna.nama_pengguna, pengguna.status as status_pengguna, pengguna.data as data_pengguna');
    $this->db->from('pengajuan');
    $this->db->join('pengguna', 'pengguna.id_pengguna = pengajuan.id_pengguna');
    return $this->db->get()->result_array();
  }

  public function get_by_id($id_pengajuan)
  {
    $this->db->select('pengajuan.*, pengguna.nama_pengguna, pengguna.status as status_pengguna, pengguna.data as data_pengguna');
    $this->db->from('pengajuan');
    $this->db->join('pengguna', 'pengguna.id_pengguna = pengajuan.id_pengguna');
    $this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
    return $this->db->get()->row_array();
  }

  public function update($id_pengajuan, $data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Pengajuan Surat Diproses"];

    if (!$this->db->update('pengajuan', $data, ['id_pengajuan' => $id_pengajuan])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
