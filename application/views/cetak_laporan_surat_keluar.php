<?php

$pdf = new Pdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);

$pdf->SetTitle('Laporan Surat Masuk');
$pdf->setPrintHeader(FALSE);
$pdf->setPrintFooter(FALSE);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('times', '', 12);
$pdf->AddPage('L');

$html = '
<h3 align="right">Buku Agenda Surat Keluar Tahun ' . date('Y') . '</h3>
<table border="1" cellpadding="3">
  <tr align="center">
    <th width="5%"><b>No.</b></th>
    <th width="10%"><b>Kode Klasifikasi</b></th>
    <th width="20%"><b>Isi Ringkas</b></th>
    <th width="20%"><b>Pengolah</b></th>
    <th width="20%"><b>No. & Tanggal Surat</b></th>
    <th width="15%"><b>Kepada</b></th>
    <th width="10%"><b>Keterangan</b></th>
  </tr>
';

if ($laporan_surat_keluar != NULL) {
  $nomor_urut = 1;
  foreach ($laporan_surat_keluar as $row) {
    $data = json_decode($row['data']);

    $html .= '
    <tr>
      <td align="center">' . $nomor_urut++ . '</td>
      <td>' . $row['kode'] . '</td>
      <td>' . $row['isi_ringkas'] . '</td>
      <td>' . $data->nama . '</td>
      <td>' . $row['nomor_surat'] . ' - ' . date("d/m/Y", strtotime($row['tanggal_surat'])) . '</td>
      <td>' . $row['kepada'] . '</td>
      <td>' . $row['keterangan'] . '</td>
    </tr>
  ';
  }
} else {
  $html .= '
  <tr>
    <td align="center" colspan="7">Data tidak ditemukan</td>
  </tr>
  ';
}

$html .= '</table>';

$pdf->writeHTML($html, TRUE, FALSE, TRUE, FALSE, '');
$pdf->Output('Laporan Surat Masuk.pdf', 'I');
