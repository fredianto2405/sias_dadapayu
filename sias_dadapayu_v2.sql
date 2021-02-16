-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2021 pada 10.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sias_dadapayu_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id_klasifikasi_surat` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `tentang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi_surat`
--

INSERT INTO `klasifikasi_surat` (`id_klasifikasi_surat`, `kode`, `tentang`) VALUES
(9, '140', 'Pemerintah Desa'),
(10, '141', 'Pamong Desa'),
(11, '300', 'Ketertiban Umum'),
(12, '330', 'Keamanan'),
(13, '340', 'Hansip (Linmas)'),
(14, '400', 'Kesejahteraan Rakyat'),
(15, '440', 'Kesehatan'),
(16, '430', 'Kebudayaan'),
(19, '471', 'WNI'),
(20, '475', 'Pindah Tempat'),
(21, '474', 'Pendaftaran Penduduk'),
(22, '517', 'Usaha'),
(24, '474.2', 'Nikah'),
(34, '111121', 'Not Aabeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran_surat_keluar`
--

CREATE TABLE `lampiran_surat_keluar` (
  `id_lampiran_surat_keluar` int(11) NOT NULL,
  `id_surat_keluar` int(11) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran_surat_masuk`
--

CREATE TABLE `lampiran_surat_masuk` (
  `id_lampiran_surat_masuk` int(11) NOT NULL,
  `id_surat_masuk` int(11) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_pengguna`, `jenis_surat`, `tanggal_pengajuan`, `tanggal_konfirmasi`, `nomor_surat`, `data`, `status`) VALUES
(52, 32, 'Surat Keterangan Usaha', '2021-01-08 18:21:37', '2021-01-09 00:23:01', '005/005/IX/2020', '{\"nama_lengkap\":\"Fredianto\",\"tanggal_lahir\":\"24 Mei 1999 \",\"tempat_lahir\":\"Wonogiri\",\"pekerjaan\":\"Mahasiswa\",\"alamat\":\"Depok, Sleman, DIY\",\"usaha_pokok\":\"Startup\",\"usaha_sampingan\":\"Freelance\",\"kalurahan\":\"Dadapayu\",\"kapanewon\":\"Semanu\"}', '3'),
(53, 32, 'Surat Keterangan Beda Nama', '2021-01-08 18:59:06', '2021-01-09 01:02:31', '005/005/IX/2020', '{\"nama_ktp\":\"Fredianto\",\"nik_ktp\":\"5170411101\",\"ttl_ktp\":\"Wonogiri, 24 Mei 1999 \",\"jenis_kelamin\":\"Laki-laki\",\"status_perkawinan\":\"Belum Kawin\",\"pekerjaan\":\"Mahasiswa\",\"agama\":\"Islam\",\"alamat_ktp\":\"Depok, Sleman, DIY\",\"nama_kk\":\"Freddy Anto\",\"nik_kk\":\"5170411101\",\"ttl_kk\":\"Wonogiri, 24 Mei 1999\",\"alamat_kk\":\"Depok, Sleman, DIY\"}', '3'),
(54, 32, 'Surat Keterangan Pengantar Nikah', '2021-01-08 19:00:04', '2021-01-09 01:02:37', '005/005/IX/2020', '{\"nama1\":\"Fredianto\",\"ttl1\":\"Wonogiri, 24 Mei 1999 \",\"jenis_kelamin1\":\"Laki-laki\",\"agama1\":\"Islam\",\"status_perkawinan1\":\"Belum Kawin\",\"warga_negara1\":\"WNI\",\"pekerjaan1\":\"Mahasiswa\",\"alamat1\":\"Depok, Sleman, DIY\",\"keperluan1\":\"Untuk Menikah\",\"tujuan1\":\"KUA Sleman\",\"nama2\":\"Calon\",\"ttl2\":\"Wonogiri, 4 Agustus 2000\",\"jenis_kelamin2\":\"Perempuan\",\"agama2\":\"Islam\",\"status_perkawinan2\":\"Belum Kawin\",\"alamat2\":\"Sleman, DIY\"}', '3'),
(55, 32, 'Surat Pengantar Akta Kelahiran', '2021-01-08 19:00:33', '2021-01-09 01:02:42', '005/005/IX/2020', '{\"nama_orang_tua\":\"Fredianto\",\"ttl\":\"Wonogiri, 24 Mei 1999 \",\"alamat\":\"Depok, Sleman, DIY\",\"agama\":\"Islam\",\"pekerjaan\":\"Mahasiswa\",\"nama_anak\":\"Budiman\",\"tanggal_lahir\":\"01 Januari 2021 \",\"hari_lahir\":\"Jum\'at \",\"jam\":\"01:00\",\"jenis_kelamin\":\"Laki-laki\",\"anak_ke\":\"1\"}', '3'),
(56, 32, 'Surat Pengantar Akta Kematian', '2021-01-08 19:00:55', '2021-01-09 01:02:48', '005/005/IX/2020', '{\"nama1\":\"Fredianto\",\"ttl\":\"Wonogiri, 24 Mei 1999 \",\"alamat\":\"Depok, Sleman, DIY\",\"agama\":\"Islam\",\"pekerjaan\":\"Mahasiswa\",\"nama2\":\"Almarhum\",\"tanggal_kematian\":\"01 Desember 2020 \",\"hari_kematian\":\"Selasa \",\"jam\":\"01:00\",\"jenis_kelamin\":\"Laki-laki\"}', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) DEFAULT NULL,
  `kata_sandi` varchar(100) DEFAULT NULL,
  `hak_akses` enum('pimpinan','petugas','warga') DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `data` text DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `hak_akses`, `status`, `data`, `ktp`, `kk`, `foto`) VALUES
(19, 'jumadi', '$2y$10$g0zpQsTNiQSCsGXwEBnUoObSkvoTdbVSED.7j9mkB17oS3pcvUwD.', 'pimpinan', '1', '{\"nik\":\"1111111111111111\",\"nama\":\"Jumadi\",\"tempat_lahir\":\"Gunungkidul\",\"tanggal_lahir\":\"1970-01-01\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Ploso RT. 002\\/002, Dadapayu, Semanu, Gunungkidul\",\"agama\":\"Islam\",\"status_perkawinan\":\"Kawin\",\"pekerjaan\":\"Kepala Desa\",\"kewarganegaraan\":\"WNI\"}', '5f84605991890.png', '5f846059918901.png', '5f8bda7389489.jpg'),
(22, 'sarmanta', '$2y$10$U8PHQdH5tmRHpgYZXAcRZeyKaltKov21/B3DAkATTOUJrfUs/dhPO', 'petugas', '1', '{\"nik\":\"1234567812345678\",\"nama\":\"Sarmanta\",\"tempat_lahir\":\"Gunungkidul\",\"tanggal_lahir\":\"1970-01-01\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Kepuh RT. 016\\/002, Dadapayu, Semanu, Gunungkidul\",\"agama\":\"Islam\",\"status_perkawinan\":\"Kawin\",\"pekerjaan\":\"Pemerintah Desa\",\"kewarganegaraan\":\"WNI\"}', '5f8bdc028f0ff.jpg', '5f8bdc028f0ff1.jpg', '5f8bdc028f0ff2.jpg'),
(32, 'fredianto', '$2y$10$Y5ObUWbDnFnjzXLqYWCgfelxVs027/X5z3EyuqkGAGpbNtpcpz9jO', 'warga', '1', '{\"nik\":\"5170411101\",\"nama\":\"Fredianto\",\"tempat_lahir\":\"Wonogiri\",\"tanggal_lahir\":\"1999-05-24\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Depok, Sleman, DIY\",\"agama\":\"Islam\",\"status_perkawinan\":\"Belum Kawin\",\"pekerjaan\":\"Mahasiswa\",\"kewarganegaraan\":\"WNI\"}', 'default.jpg', 'default.jpg', 'default.jpg'),
(33, 'davaalfiansyah', '$2y$10$znAxPswfjWGEmknTDixnruhiDtfPCyjCjLf7JREcr9pHjJuP52Fg2', 'warga', '1', '{\"nik\":\"5170411102\",\"nama\":\"Dava Alfiansyah\",\"tempat_lahir\":\"Tangerang\",\"tanggal_lahir\":\"2012-12-20\",\"jenis_kelamin\":\"Laki-laki\",\"alamat\":\"Tangerang\",\"agama\":\"Islam\",\"status_perkawinan\":\"Belum Kawin\",\"pekerjaan\":\"Pelajar\",\"kewarganegaraan\":\"WNI\"}', 'default.jpg', 'default.jpg', '5ff9261b1202f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `id_klasifikasi_surat` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `isi_ringkas` varchar(100) DEFAULT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `kepada` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `id_klasifikasi_surat`, `id_pengguna`, `isi_ringkas`, `nomor_surat`, `tanggal_surat`, `kepada`, `keterangan`) VALUES
(11, 9, 22, '-', '005/005/IX/2020', '2021-01-01', 'Lorem', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `id_klasifikasi_surat` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `isi_ringkas` varchar(100) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `id_klasifikasi_surat`, `id_pengguna`, `isi_ringkas`, `dari`, `nomor_surat`, `tanggal_surat`, `keterangan`) VALUES
(18, 9, 22, 'lorem', 'Test', '005/005/IX/2020', '2021-01-08', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id_klasifikasi_surat`);

--
-- Indeks untuk tabel `lampiran_surat_keluar`
--
ALTER TABLE `lampiran_surat_keluar`
  ADD PRIMARY KEY (`id_lampiran_surat_keluar`),
  ADD KEY `id_surat_keluar` (`id_surat_keluar`);

--
-- Indeks untuk tabel `lampiran_surat_masuk`
--
ALTER TABLE `lampiran_surat_masuk`
  ADD PRIMARY KEY (`id_lampiran_surat_masuk`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_klasifikasi_surat` (`id_klasifikasi_surat`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_klasifikasi_surat` (`id_klasifikasi_surat`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id_klasifikasi_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `lampiran_surat_keluar`
--
ALTER TABLE `lampiran_surat_keluar`
  MODIFY `id_lampiran_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lampiran_surat_masuk`
--
ALTER TABLE `lampiran_surat_masuk`
  MODIFY `id_lampiran_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lampiran_surat_keluar`
--
ALTER TABLE `lampiran_surat_keluar`
  ADD CONSTRAINT `lampiran_surat_keluar_ibfk_1` FOREIGN KEY (`id_surat_keluar`) REFERENCES `surat_keluar` (`id_surat_keluar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lampiran_surat_masuk`
--
ALTER TABLE `lampiran_surat_masuk`
  ADD CONSTRAINT `lampiran_surat_masuk_ibfk_1` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_klasifikasi_surat`) REFERENCES `klasifikasi_surat` (`id_klasifikasi_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_klasifikasi_surat`) REFERENCES `klasifikasi_surat` (`id_klasifikasi_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
