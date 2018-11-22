-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Sep 2018 pada 08.38
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masruri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `janji`
--

CREATE TABLE `janji` (
  `id_pasien` int(10) NOT NULL,
  `no_rm` int(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_janji` date NOT NULL,
  `jam_janji` time NOT NULL,
  `poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tempat_lahir_pasien` varchar(100) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `jk_pasien` varchar(100) NOT NULL,
  `gol_darah_pasien` varchar(100) NOT NULL,
  `no_telepon_pasien` int(13) NOT NULL,
  `pekerjaan_pasien` varchar(100) NOT NULL,
  `wali_pasien` varchar(100) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `kelurahan_pasien` varchar(100) NOT NULL,
  `kecamatan_pasien` varchar(100) NOT NULL,
  `kota_pasien` varchar(100) NOT NULL,
  `provinsi_pasien` varchar(100) NOT NULL,
  `no_rm` int(10) NOT NULL,
  `nik_pasien` int(20) NOT NULL,
  `no_kk_pasien` int(20) NOT NULL,
  `no_bbjs_pasien` int(20) NOT NULL,
  `status_pasien` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `jk_pasien`, `gol_darah_pasien`, `no_telepon_pasien`, `pekerjaan_pasien`, `wali_pasien`, `alamat_pasien`, `kelurahan_pasien`, `kecamatan_pasien`, `kota_pasien`, `provinsi_pasien`, `no_rm`, `nik_pasien`, `no_kk_pasien`, `no_bbjs_pasien`, `status_pasien`) VALUES
(1, 'm.fauzan', 'Yogyakarta', '1998-04-13', 'Laki-Laki', 'B', 877295131, 'Mahasiswa', 'Bahrudin', 'Pleret ', 'pleret', 'pleret', 'bantul', 'DIY', 1234231345, 1324552316, 1486855244, 1324536429, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat_lahir_pegawai` varchar(100) NOT NULL,
  `tgl_lahir_pegawai` date NOT NULL,
  `alamat_pegawai` varchar(100) NOT NULL,
  `no_tlpn_pegawai` varchar(13) NOT NULL,
  `status_pegawai` tinyint(1) NOT NULL,
  `tgl_masuk_sebagai_pegawai` varchar(100) NOT NULL,
  `level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tempat_lahir_pegawai`, `tgl_lahir_pegawai`, `alamat_pegawai`, `no_tlpn_pegawai`, `status_pegawai`, `tgl_masuk_sebagai_pegawai`, `level`) VALUES
(1, 'Arif Setiawan', 'Semarang', '1989-04-07', 'Yogyakarta', '087723452132', 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_transaksi` int(10) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `id_kasir` int(10) NOT NULL,
  `total_priksa` int(100) NOT NULL,
  `total_resep` int(100) NOT NULL,
  `total_tagihan_pasien` varchar(100) NOT NULL,
  `status_tagihan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
