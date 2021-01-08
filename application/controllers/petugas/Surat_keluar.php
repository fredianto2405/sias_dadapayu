<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_petugas();
    $this->load->model('surat_keluar_model', 'surat_keluar');
    $this->load->model('lampiran_surat_keluar_model', 'lampiran_surat_keluar');
    $this->load->model('klasifikasi_surat_model', 'klasifikasi_surat');
    $this->load->model('pengajuan_model', 'pengajuan');
  }

  public function index()
  {
    $web['halaman'] = "Surat Keluar";
    $web['uri'] = $this->uri->segment(2);
    $fetch['notifikasi'] = $this->pengajuan->get_by_status('0');
    $fetch['total_notifikasi'] = $this->pengajuan->count_by_status('0');
    $fetch['no'] = 1;
    $fetch['surat_keluar'] = $this->surat_keluar->get_all();
    $fetch['klasifikasi_surat'] = $this->klasifikasi_surat->get_all();
    $this->load->view('templates/header', $web);
    $this->load->view('templates/sidebar_petugas', $fetch);
    $this->load->view('surat_keluar');
    $this->load->view('templates/footer');
  }

  public function hapus_surat()
  {
    echo json_encode($this->surat_keluar->delete($this->input->post('id')));
  }

  public function detail_surat($id_surat_keluar)
  {
    echo json_encode($this->surat_keluar->get_by_id($id_surat_keluar));
  }

  public function simpan_surat()
  {
    $data = [
      'id_klasifikasi_surat' => $this->input->post('id_klasifikasi_surat'),
      'kepada' => $this->input->post('kepada'),
      'nomor_surat' => $this->input->post('nomor_surat'),
      'tanggal_surat' => $this->input->post('tanggal_surat'),
      'isi_ringkas' => $this->input->post('isi_ringkas'),
      'keterangan' => $this->input->post('keterangan'),
      'id_pengguna' => $this->session->userdata('id_pengguna'),
    ];

    echo json_encode($this->surat_keluar->insert($data));
  }

  public function edit_surat()
  {
    $id_surat_keluar = $this->input->post('edit_id');
    $data = [
      'id_klasifikasi_surat' => $this->input->post('edit_id_klasifikasi_surat'),
      'kepada' => $this->input->post('edit_kepada'),
      'nomor_surat' => $this->input->post('edit_nomor_surat'),
      'tanggal_surat' => $this->input->post('edit_tanggal_surat'),
      'isi_ringkas' => $this->input->post('edit_isi_ringkas'),
      'keterangan' => $this->input->post('edit_keterangan'),
      'id_pengguna' => $this->session->userdata('id_pengguna'),
    ];

    echo json_encode($this->surat_keluar->update($id_surat_keluar, $data));
  }

  public function lampiran($id_surat_keluar)
  {
    echo json_encode($this->lampiran_surat_keluar->get_by_id($id_surat_keluar));
  }

  public function hapus_lampiran()
  {
    echo json_encode($this->lampiran_surat_keluar->delete($this->input->post('id')));
  }

  public function simpan_lampiran()
  {
    $berkas = uniqid();
    $data = [
      'id_surat_keluar' => $this->input->post('id_surat_keluar'),
      'judul' => $this->input->post('judul'),
      'berkas' => $this->upload_files('./upload/surat_keluar/', $berkas, 'berkas'),
    ];

    echo json_encode($this->lampiran_surat_keluar->insert($data));
  }

  // file upload
  private function upload_files($path, $title, $files)
  {
    $config = [
      'upload_path' => $path,
      'allowed_types' => 'pdf',
      'overwrite' => TRUE,
    ];

    $this->load->library('upload', $config);
    $file_name = $title . '.pdf';
    $config['file_name'] = $file_name;
    $this->upload->initialize($config);

    if ($this->upload->do_upload($files)) {
      return $file_name;
    } else {
      return "default.pdf";
    }
  }
}
