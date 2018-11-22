-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Nov 2018 pada 16.52
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
-- Database: `masbeken`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `tempat_lahir_dokter` varchar(100) NOT NULL,
  `tanggal_lahir_dokter` date NOT NULL,
  `nama_dokter` varchar(40) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  `alamat_dokter` varchar(60) NOT NULL,
  `no_telp_dokter` varchar(20) NOT NULL,
  `jk_dokter` varchar(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `tempat_lahir_dokter`, `tanggal_lahir_dokter`, `nama_dokter`, `spesialis`, `alamat_dokter`, `no_telp_dokter`, `jk_dokter`, `status`) VALUES
(2, 'Jayapura', '1987-12-16', 'dr. Abdul Qomari, Sp.B', 'Bedah', 'Sleman', '08213546879', 'L', 1),
(3, 'Bantul', '1978-12-11', 'dr. Herri Kurnia, Sp. A', 'Anak', 'Bantul', '08123456789', 'L', 1),
(4, 'Makassar', '1976-03-16', 'dr. Rizky Aulia Dwiyanti, Sp. M', 'Mata', 'Warung Boto', '08321654987', 'P', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal_dokter` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal_dokter`, `id_dokter`, `id_poli`, `hari`, `jam`) VALUES
(1, 2, 1, 'Mon', 'pagi'),
(2, 3, 2, 'Mon', 'sore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_perawat`
--

CREATE TABLE `jadwal_perawat` (
  `id_perawat` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `stock` int(10) NOT NULL,
  `id_supplier` int(11) NOT NULL
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
  `no_telepon_pasien` varchar(13) NOT NULL,
  `pekerjaan_pasien` varchar(100) NOT NULL,
  `wali_pasien` varchar(100) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `kelurahan_pasien` varchar(100) NOT NULL,
  `kecamatan_pasien` varchar(100) NOT NULL,
  `kota_pasien` varchar(100) NOT NULL,
  `provinsi_pasien` varchar(100) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `nik_pasien` varchar(20) NOT NULL,
  `no_kk_pasien` varchar(20) NOT NULL,
  `no_bbjs_pasien` varchar(20) NOT NULL,
  `status_pasien` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `jk_pasien`, `gol_darah_pasien`, `no_telepon_pasien`, `pekerjaan_pasien`, `wali_pasien`, `alamat_pasien`, `kelurahan_pasien`, `kecamatan_pasien`, `kota_pasien`, `provinsi_pasien`, `no_rm`, `nik_pasien`, `no_kk_pasien`, `no_bbjs_pasien`, `status_pasien`) VALUES
(1, 'm.fauzan', 'Yogyakarta', '1998-04-13', 'Laki-Laki', 'B', '877295131', 'Mahasiswa', 'Bahrudin', 'Pleret ', 'pleret', 'pleret', 'bantul', 'DIY', '1234231345', '1324552316', '1486855244', '1324536429', '1'),
(2, 'Ahmad Tohir', 'Semarang', '1991-10-08', 'Laki-laki', 'AB', '812345125', 'Wirausaha', 'Ahmad', 'Jalan Veteran Yogyakata', 'Warung Boto', 'Umbul Harjo', 'Yogyakarta', 'DIY', '674322456', '326741612', '1234559315', '1316576837', '0'),
(5, 'andin', 'malan', '0000-00-00', 'Perempuan', 'O', '2147483647', 'guru', 'markonah', 'jalan mawar', 'Kemangi', 'Semangi', 'malang', 'jawa timur', '0', '123456', '786754356', '45768765', '0'),
(6, 'andin', 'malan', '0000-00-00', 'Perempuan', 'O', '2147483647', 'guru', 'markonah', 'jalan mawar', 'Kemangi', 'Semangi', 'malang', 'jawa timur', '0', '123456', '786754356', '45768765', '0'),
(7, 'aulia', 'Klaten', '0000-00-00', 'Laki-laki', 'B', '082332786534', 'Mahasiswa', 'Septiana', 'jalan veteran', 'umbulharjo', 'warung boto', 'Yogyakarta', 'DIY', '', '3098279826', '2037220239', '28927872', '0'),
(8, 'nina', 'kjjiji', '0000-00-00', 'Perempuan', 'A', 'e67', 'haji', 'hsha', 'h', 'h', 'knk', 'g', 'g', '', '122', '23', '2344', '0'),
(10, 'D', 'd', '2018-11-21', 'Laki-laki', 'A', '7', 'h', 'hh', 'd', 'dddd', 'd', 'd', 'd', '', '87', '76', '76', '0'),
(11, 'HH', 'U', '2018-10-30', 'Laki-laki', 'A', '6', 'Y', 'Y', 'U', 'U', 'U', 'U', 'U', '', '6', '77', '777', '0'),
(12, 'G', 'g', '2018-11-13', 'Laki-laki', 'A', '7', 'HH', 'JHJH', 'gg', 'g', 'DDF', 'g', 'g', '690582', '878', '88', '878', '0'),
(13, 'kiki', 'hjhh', '2018-11-13', 'Laki-laki', 'A', '657', 'dgfgh', 'hghgh', 'hg', 'hg', 'hj', 'h', 'hj', '276130', '4565', '456', '4567', '0'),
(14, 'dada', 'dfdsa', '1999-11-07', 'Perempuan', 'O', '1234567', 'dfghj', 'sdfghj', 'qwe', 'asdfgh', 'hjhgf', 'fghfd', 'dfg', '', '1234', '43', '5677', '0'),
(15, 'uy', 'kk', '2017-06-07', 'Laki-laki', 'AB', '56', 'hghj', 'jj', 'w', 'et', 'hh', 'kk', 'k', '', '87', '55', '554', '1'),
(16, 'h', 'h', '2018-05-15', 'Laki-laki', 'A', '7', 'j', 'j', 'h', 'h', 'h', 'h', 'h', '', '0', '0', '0', '0'),
(17, 'ruri', '3e', '2000-10-30', 'Laki-laki', 'B', '56', 'jjj', 'jj', 'r', 'ee', 'y', 'y', 'g', '', '76', '55', '555', '0'),
(18, 'ilham', 'a', '2018-11-02', 'Laki-laki', 'AB', '087729538582', 'aa', 'a', 'a', 'a', 'a', 'a', 'a', '407326', '1234566', '2356', '6543234567', '1'),
(19, 'fahrezi', 'fghj', '1998-11-11', 'Laki-laki', 'A', '23456', 'dfghj', 'fghj', 'dfghjk', 'ghj', 'ghj', 'ghj', 'ghj', '593206', '23456', '3456', '34567', '1'),
(20, 'Mahendra', 'inggris', '1998-11-11', 'Laki-laki', 'O', '08923416754', 'mahasiswa', 'tohir', 'jl purworejo', 'balikono', 'onorah', 'purworejo', 'jawa tengah', '407326', '345620208', '2345678907', '23425364286', '1');

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
  `level` varchar(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tempat_lahir_pegawai`, `tgl_lahir_pegawai`, `alamat_pegawai`, `no_tlpn_pegawai`, `status_pegawai`, `tgl_masuk_sebagai_pegawai`, `level`, `username`, `password`) VALUES
(1, 'Arif Setiawan', 'Semarang', '1989-04-07', 'Yogyakarta', '087723452132', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `resep` varchar(100) DEFAULT NULL,
  `tgl_periksa` date NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_perawat` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_pasien`, `no_rm`, `resep`, `tgl_periksa`, `id_dokter`, `id_perawat`, `status`, `jam`) VALUES
(1, 13, '276130', NULL, '0000-00-00', NULL, NULL, NULL, ''),
(2, 13, '276130', NULL, '2018-11-10', NULL, NULL, NULL, ''),
(3, 12, '690582', NULL, '2018-11-10', NULL, NULL, NULL, ''),
(4, 13, '276130', NULL, '2018-11-13', NULL, NULL, NULL, ''),
(5, 1, '1234231345', NULL, '2018-11-13', NULL, NULL, NULL, ''),
(6, 1, '1234231345', NULL, '2018-11-13', NULL, NULL, NULL, ''),
(7, 13, '276130', NULL, '2018-11-13', NULL, NULL, NULL, ''),
(8, 4, '0', NULL, '2018-11-14', NULL, NULL, NULL, ''),
(9, 7, '', NULL, '2018-11-14', NULL, NULL, NULL, NULL),
(10, 13, '276130', NULL, '2018-11-14', NULL, NULL, NULL, NULL),
(11, 12, '690582', NULL, '2018-11-14', NULL, NULL, NULL, '3'),
(12, 10, '', NULL, '2018-11-14', NULL, NULL, NULL, '3'),
(13, 14, '', NULL, '2018-11-14', NULL, NULL, NULL, '3'),
(14, 18, '407326', NULL, '2018-11-15', NULL, NULL, NULL, '2'),
(15, 6, '0', NULL, '2018-11-17', NULL, NULL, NULL, '2'),
(16, 18, '407326', NULL, '2018-11-17', NULL, NULL, NULL, '3'),
(17, 18, '407326', NULL, '2018-11-17', NULL, NULL, NULL, '3'),
(18, 17, '', NULL, '2018-11-17', NULL, NULL, NULL, '3'),
(19, 17, '', NULL, '2018-11-17', NULL, NULL, NULL, '1'),
(20, 18, '407326', NULL, '2018-11-17', NULL, NULL, NULL, 'sore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(10) NOT NULL,
  `nama_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Mata'),
(2, 'Poli Penyakit Dalam'),
(3, 'Poli Jantung'),
(4, 'Poli THT'),
(5, 'Poli Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `lead_time` date NOT NULL,
  `status` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supply_obat`
--

CREATE TABLE `supply_obat` (
  `id_pembelian` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `apoteker` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
