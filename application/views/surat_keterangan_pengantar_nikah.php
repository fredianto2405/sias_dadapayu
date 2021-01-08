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
          <span style="font-size: 14px;"><b>SURAT KETERANGAN PENGANTAR NIKAH</b></span> <br>
          <span>Nomor : ' . $pengajuan['nomor_surat'] . '</span>
        </td>
      </tr>
      <tr>
        <td width="5%"></td>
        <td width="90%"><b>Yang bertanda tangan di bawah ini:</b></td>
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
        <td width="57%">' . $data->ttl1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Jenis Kelamin</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->jenis_kelamin1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Agama</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->agama1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Status Perkawinan</td>
        <td width="3%">:</td>
        <td width="57%">' . ucwords($data->status_perkawinan1) . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Warga Negara</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->warga_negara1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Pekerjaan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->pekerjaan1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->alamat1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Keperluan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->keperluan1 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Tujuan</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->tujuan1 . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Orang tersebut benar-benar penduduk Desa Dadapayu, Kecamatan Semanu, Kabupaten Gunungkidul.<br>Dan akan menikah dengan seorang ' . $data->jenis_kelamin2 . ' : </td>
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
        <td width="20%">Tempat & Tgl. Lahir</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->ttl2 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Agama</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->agama2 . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Status Perkawinan</td>
        <td width="3%">:</td>
        <td width="57%">' . ucwords($data->status_perkawinan2) . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="13%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="57%">' . $data->alamat2 . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <table cellpadding="10">
      <tr>
        <td width="5%"></td>
        <td width="90%">Demikian Surat Keterangan ini kami buat dengan sebenarnya dan agar dapat di pergunakan sebagaimana mestinya.</td>
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
