<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampiran_surat_masuk_model extends CI_Model
{
  public function get_by_id($id_surat_masuk)
  {
    return $this->db->get_where('lampiran_surat_masuk', ['id_surat_masuk' => $id_surat_masuk])->result_array();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Lampiran Disimpan"];

    if (!$this->db->insert('lampiran_surat_masuk', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function delete($id_lampiran_surat_masuk)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Lampiran Dihapus"];

    if (!$this->db->delete('lampiran_surat_masuk', ['id_lampiran_surat_masuk' => $id_lampiran_surat_masuk])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
