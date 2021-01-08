<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampiran_surat_keluar_model extends CI_Model
{
  public function get_by_id($id_surat_keluar)
  {
    return $this->db->get_where('lampiran_surat_keluar', ['id_surat_keluar' => $id_surat_keluar])->result_array();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Lampiran Disimpan"];

    if (!$this->db->insert('lampiran_surat_keluar', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function delete($id_lampiran_surat_keluar)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Lampiran Dihapus"];

    if (!$this->db->delete('lampiran_surat_keluar', ['id_lampiran_surat_keluar' => $id_lampiran_surat_keluar])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
