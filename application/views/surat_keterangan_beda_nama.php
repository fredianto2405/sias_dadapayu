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
          <span style="font-size: 14px;"><b>SURAT KETERANGAN BEDA NAMA</b></span> <br>
          <span>Nomor : ' . $pengajuan['nomor_surat'] . '</span>
        </td>
      </tr>
      <tr>
        <td width="5%"></td>
        <td width="90%"><p style="text-indent: 1cm;">Yang bertanda tangan di bawah ini kami Pemerintah Kalurahan Dadapayu, Kecamatan Semanu, Kabupaten Gunungkidul, menerangkan dengan sebenarnya bahwa :</p></td>
        <td width="5%"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="7%"></td>
        <td width="20%">Nama</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->nama_ktp . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">NIK</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->nik_ktp . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Tempat/Tgl. Lahir</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->ttl_ktp . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Jenis Kelamin</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->jenis_kelamin . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Status Perkawinan</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->status_perkawinan . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Pekerjaan</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->pekerjaan . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Agama</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->agama . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->alamat_ktp . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <br><br>

    <table>
      <tr>
        <td width="7%"></td>
        <td width="20%">Nama KK</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->nama_kk . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">NIK</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->nik_kk . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Tempat/Tgl. Lahir</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->ttl_kk . '</td>
        <td width="7%"></td>
      </tr>
      <tr>
        <td width="7%"></td>
        <td width="20%">Alamat</td>
        <td width="3%">:</td>
        <td width="63%">' . $data->alamat_kk . '</td>
        <td width="7%"></td>
      </tr>
    </table>

    <br><br>

    <table>
      <tr>
        <td width="7%"></td>
        <td width="86%">Menerangkan dengan sesungguhnya bahwa yang bersangkutan benar-benar Orang yang sama  Namun terjadi perbedaan NAMA di  KK & KTP.</td>
        <td width="7%"></td>
      </tr>
    <table>

    <br><br>

    <table>
      <tr>
        <td width="7%"></td>
        <td width="86%">Demikian surat keterangan ini kami buat dengan keadaan yang sebenarnya agar dapat dipergunakan sebagaimana mestinya.</td>
        <td width="7%"></td>
      </tr>
    <table>

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
