<?php

$pdf = new Pdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);

$pdf->SetTitle('Laporan Surat Masuk');
$pdf->setPrintHeader(FALSE);
$pdf->setPrintFooter(FALSE);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('times', '', 12);
$pdf->AddPage('L');

$html = '
<h3 align="right">Buku Agenda Surat Masuk Tahun ' . date('Y') . '</h3>
<table border="1" cellpadding="3">
  <tr align="center">
    <th rowspan="2" width="5%"><b>No.</b></th>
    <th rowspan="2" width="10%"><b>Kode Klasifikasi</b></th>
    <th rowspan="2" width="20%"><b>Isi Ringkas</b></th>
    <th rowspan="2" width="10%"><b>Dari</b></th>
    <th rowspan="2" width="15%"><b>Nomor Surat</b></th>
    <th rowspan="2" width="10%"><b>Tanggal Surat</b></th>
    <th colspan="2" width="20%"><b>Unit Pengolah</b></th>
    <th rowspan="2" width="10%"><b>Keterangan</b></th>
  </tr>
  <tr align="center">
    <th><b>Nama</b></th>
    <th><b>Tgl/Paraf</b></th>
  </tr>
';

if ($laporan_surat_masuk != NULL) {
  $nomor_urut = 1;
  foreach ($laporan_surat_masuk as $row) {
    $data = json_decode($row['data']);

    $html .= '
    <tr>
      <td align="center">' . $nomor_urut++ . '</td>
      <td>' . $row['kode'] . '</td>
      <td>' . $row['isi_ringkas'] . '</td>
      <td>' . $row['dari'] . '</td>
      <td>' . $row['nomor_surat'] . '</td>
      <td>' . indonesian_date($row['tanggal_surat'], 'd/m/Y') . '</td>
      <td>' . $data->nama . '</td>
      <td></td>
      <td>' . $row['keterangan'] . '</td>
    </tr>
  ';
  }
} else {
  $html .= '
  <tr>
    <td align="center" colspan="9">Data tidak ditemukan</td>
  </tr>
  ';
}

$html .= '</table>';

$pdf->writeHTML($html, TRUE, FALSE, TRUE, FALSE, '');
$pdf->Output('Laporan Surat Masuk.pdf', 'I');
