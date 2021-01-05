<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar_model extends CI_Model
{
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat_keluar.id_klasifikasi_surat');
    $this->db->join('pengguna', 'pengguna.id_pengguna = surat_keluar.id_pengguna');
    return $this->db->get()->result_array();
  }

  public function get_by_id($id_surat_keluar)
  {
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat_keluar.id_klasifikasi_surat');
    $this->db->join('pengguna', 'pengguna.id_pengguna = surat_keluar.id_pengguna');
    $this->db->where('id_surat_keluar', $id_surat_keluar);
    return $this->db->get()->row_array();
  }

  public function get_by_date($tanggal_mulai, $tanggal_selesai)
  {
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->join('klasifikasi_surat', 'klasifikasi_surat.id_klasifikasi_surat = surat_keluar.id_klasifikasi_surat');
    $this->db->join('pengguna', 'pengguna.id_pengguna = surat_keluar.id_pengguna');
    $this->db->where('tanggal_surat >=', $tanggal_mulai);
    $this->db->where('tanggal_surat <=', $tanggal_selesai);
    return $this->db->get()->result_array();
  }

  public function count_by_month()
  {
    $month = date('m');
    $year = date('Y');
    $where = "MONTH(tanggal_surat) = '$month' AND YEAR(tanggal_surat) = '$year'";

    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where($where);
    return $this->db->count_all_results();
  }

  public function insert($data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Keluar Disimpan"];

    if (!$this->db->insert('surat_keluar', $data)) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function update($id_surat_keluar, $data)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Keluar Diubah"];

    if (!$this->db->update('surat_keluar', $data, ['id_surat_keluar' => $id_surat_keluar])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }

  public function delete($id_surat_keluar)
  {
    $response = ['status' => TRUE, 'title' => "Berhasil", 'text' => "Surat Keluar Dihapus"];

    if (!$this->db->delete('surat_keluar', ['id_surat_keluar' => $id_surat_keluar])) {
      $error = $this->db->error();
      $response = ['status' => FALSE, 'title' => "Gagal", 'text' => "Pesan: " . $error['message']];
    }

    return $response;
  }
}
