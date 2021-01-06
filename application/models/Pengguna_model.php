<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
  public function get_all()
  {
    return $this->db->get('klasifikasi_surat')->result_array();
  }
}
