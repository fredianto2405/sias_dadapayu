<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi_surat_model extends CI_Model
{
  public function get_all()
  {
    return $this->db->get('klasifikasi_surat')->result_array();
  }

  public function get_by_id($id_klasifikasi_surat)
  {
    return $this->db->get_where('klasifikasi_surat', ['id_klasifikasi_surat' => $id_klasifikasi_surat])->row_array();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Klasifikasi Surat Disimpan"];

    if (!$this->db->insert('klasifikasi_surat', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function update($id_klasifikasi_surat, $data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Klasifikasi Surat Diubah"];

    if (!$this->db->update('klasifikasi_surat', $data, ['id_klasifikasi_surat' => $id_klasifikasi_surat])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function delete($id_klasifikasi_surat)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Klasifikasi Surat Dihapus"];

    if (!$this->db->delete('klasifikasi_surat', ['id_klasifikasi_surat' => $id_klasifikasi_surat])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
