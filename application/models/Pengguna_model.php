<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
  public function get_all()
  {
    return $this->db->get('pengguna')->result_array();
  }

  public function get_by_id($id_pengguna)
  {
    return $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
  }

  public function count_all()
  {
    $this->db->select('*');
    $this->db->from('pengguna');
    return $this->db->count_all_results();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Pengguna Disimpan"];

    if (!$this->db->insert('pengguna', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function update($id_pengguna, $data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Pengguna Diubah"];

    if (!$this->db->update('pengguna', $data, ['id_pengguna' => $id_pengguna])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
