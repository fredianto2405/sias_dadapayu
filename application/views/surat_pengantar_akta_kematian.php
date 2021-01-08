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
          <span style="font-size: 14px;"><b>SURAT PENGANTAR AKTA KEMATIAN</b></span> <br>
          <span>Nomor : ' . $pengajuan['nomor_surat'] . '</span>
        </td>
      </tr>
      <tr>
        <td width="5%"></td>
        <td width="90%">Yang bertanda tangan di bawah ini Pemerintah Desa Dadapayu, Kecamatan Semanu, Kabupaten Gunungkidul menerangkan bahwa:</td>
        <td width="5%"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="13%"></td>
        <td width="20%">Nama</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->nama1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Tempat & Tgl. Lahir</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->ttl . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->alamat . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Agama</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->agama . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Pekerjaan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->pekerjaan . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Orang tersebut akan mencarikan AKTA KEMATIAN Ke Kantor Catatan SIPIL Kabupaten Gunungkidul</td>
        <td width="5%"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="13%"></td>
        <td width="20%">Nama</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->nama2 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Hari Meninggal</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->hari_kematian . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Tanggal Kematian</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->tanggal_kematian . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Jam</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->jam . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Jenis Kelamin</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->jenis_kelamin . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Demikian surat keterangan ini kami buat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.</td>
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
