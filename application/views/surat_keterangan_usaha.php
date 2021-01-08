<?php

$data = json_decode($pengajuan['data']);

$pdf = new Pdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle($pengajuan['jenis_surat']);
$pdf->setPrintHeader(FALSE);
$pdf->setPrintFooter(FALSE);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('times', '', 12);
$pdf->AddPage('P');

$html = '
    <table cellpadding="5">
      <tr align="center">
        <td width="15%">
          <img src="' . base_url('assets/img/brand/logo-gunungkidul-hitam-putih.png') . '" width="70px">
        </td>
        <td width="85%" style="font-size: 16px;">
          KABUPATEN GUNUNGKIDUL <br>
          KAPANEWON SEMANU <br>
          <b>PEMERINTAH KELURAHAN DADAPAYU</b> <br>
        </td>
      </tr>
    </table>

    <hr>

    <table cellpadding="10">
      <tr align="center">
        <td>
          <span style="font-size: 14px;"><b>SURAT KETERANGAN USAHA</b></span> <br>
          <span>Nomor : ' . $pengajuan['nomor_surat'] . '</span>
        </td>
      </tr>
      <tr>
        <td width="5%"></td>
        <td width="90%">Yang bertanda tangan di bawah ini:</td>
        <td width="5%"></td>
      </tr>
      <tr>
        <td width="5%"></td>
        <td width="90%">Pemerintah  Kalurahan Dadapayu Kapanewon Semanu, Menerangkan bahwa:</td>
        <td width="5%"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="13%"></td>
        <td width="20%">Nama Lengkap</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->nama_lengkap . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Tanggal Lahir</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->tanggal_lahir . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Tempat Lahir</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->tempat_lahir . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Pekerjaan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->pekerjaan . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->alamat . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Orang tersebut benar-benar mempunyai usaha pokok: ' . $data->usaha_pokok . '</td>
        <td width="5%"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="13%"></td>
        <td width="20%">Usaha Sampingan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->usaha_sampingan . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Di Kalurahan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->kalurahan . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Kapanewon</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->kapanewon . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Demikian Surat Keterangan ini kami buat dengan sebenar-benarnya dan agar dapat dipergunakan seperlunya.</td>
        <td width="5%"></td>
      </tr>
    </table>

    <br><br><br><br>

    <table>
      <tr align="center">
        <td width="7%"></td>
        <td width="50%"></td>
        <td width="36%">
          Dadapayu, ' . indonesian_date($pengajuan['tanggal_konfirmasi']) . ' <br>
          Pemerintah Kelurahan Dadapayu <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          Kepala Desa Dadapayu
        </td>
        <td width="7%"></td>
      </tr>
    </table>
    ';

$pdf->writeHTML($html, TRUE, FALSE, TRUE, FALSE, '');
$pdf->Output(date('dmYHis') . '_' . $pengajuan['jenis_surat'] . '.pdf', 'I');
