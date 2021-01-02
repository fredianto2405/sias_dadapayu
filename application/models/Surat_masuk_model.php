<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk_model extends CI_Model
{
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat_masuk.id_klasifikasi_surat');
    $this->db->join('pengguna', 'pengguna.id_pengguna = surat_masuk.id_pengguna');
    return $this->db->get()->result_array();
  }

  public function get_by_id($id_surat_masuk)
  {
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat_masuk.id_klasifikasi_surat');
    $this->db->join('pengguna', 'pengguna.id_pengguna = surat_masuk.id_pengguna');
    $this->db->where('id_surat_masuk', $id_surat_masuk);
    return $this->db->get()->row_array();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Masuk Disimpan"];

    if (!$this->db->insert('surat_masuk', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function update($id_surat_masuk, $data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Masuk Diubah"];

    if (!$this->db->update('surat_masuk', $data, ['id_surat_masuk' => $id_surat_masuk])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function delete($id_surat_masuk)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Masuk Dihapus"];

    if (!$this->db->delete('surat_masuk', ['id_surat_masuk' => $id_surat_masuk])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
