-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 03:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `level` varchar(1) NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `level`, `username`, `password`, `status`) VALUES
(1, 'Almubarok', '1', 'admin', 'admin', '1'),
(2, 'admin', '1', 'admin123', 'admin123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
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
  `status_dokter` tinyint(1) NOT NULL DEFAULT '1',
  `level` varchar(1) NOT NULL DEFAULT '2',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `tempat_lahir_dokter`, `tanggal_lahir_dokter`, `nama_dokter`, `spesialis`, `alamat_dokter`, `no_telp_dokter`, `jk_dokter`, `status_dokter`, `level`, `username`, `password`) VALUES
(3, 'Bantul', '1978-12-11', 'dr. Herri Kurnia, Sp. A', 'Anak', 'Bantul', '08123456789', 'L', 1, '2', 'herri', 'herri123'),
(4, 'Makassar', '1976-03-16', 'dr. Rizky Aulia Dwiyanti, Sp. M', 'Mata', 'Warung Boto', '08321654987', 'P', 1, '2', 'kiki', 'kiki123'),
(7, 'brebes', '1997-11-04', 'drg. Calicul', 'gigi', 'veteran', '082389347654', 'L', 1, '2', 'calicul', 'calicul');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_dokter` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_perawat`
--

CREATE TABLE `jadwal_perawat` (
  `id_perawat` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `janji`
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
-- Table structure for table `obat`
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
-- Table structure for table `pasien`
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
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `jk_pasien`, `gol_darah_pasien`, `no_telepon_pasien`, `pekerjaan_pasien`, `wali_pasien`, `alamat_pasien`, `kelurahan_pasien`, `kecamatan_pasien`, `kota_pasien`, `provinsi_pasien`, `no_rm`, `nik_pasien`, `no_kk_pasien`, `no_bbjs_pasien`, `status_pasien`) VALUES
(1, 'm.fauzan', 'Yogyakarta', '1998-04-13', 'Laki-Laki', 'B', '877295131', 'Mahasiswa', 'Bahrudin', 'Pleret ', 'pleret', 'pleret', 'bantul', 'DIY', '1234231345', '1324552316', '1486855244', '1324536429', '1'),
(2, 'Ahmad Tohir', 'Semarang', '1991-10-08', 'Laki-laki', 'AB', '812345125', 'Wirausaha', 'Ahmad', 'Jalan Veteran Yogyakata', 'Warung Boto', 'Umbul Harjo', 'Yogyakarta', 'DIY', '674322456', '326741612', '1234559315', '1316576837', '1'),
(3, 'q', 'S', '0000-00-00', 'Laki-laki', 'A', '8', 'M', 'M', 'A', 'A', 'A', 'A', 'A', '0', '2', '3', '5', '1'),
(4, 'ucok', 'banyumas', '0000-00-00', 'Laki-laki', 'A', '23456', 'mahasiswa', 'sfhsgga', 'semarang', 'kono', 'kene', 'semarang', 'jawa tengah', '0', '12345', '345', '345', '1'),
(5, 'andin', 'malan', '0000-00-00', 'Perempuan', 'O', '2147483647', 'guru', 'markonah', 'jalan mawar', 'Kemangi', 'Semangi', 'malang', 'jawa timur', '0', '123456', '786754356', '45768765', '1'),
(6, 'andin', 'malan', '0000-00-00', 'Perempuan', 'O', '2147483647', 'guru', 'markonah', 'jalan mawar', 'Kemangi', 'Semangi', 'malang', 'jawa timur', '0', '123456', '786754356', '45768765', '1'),
(7, 'aulia', 'Klaten', '0000-00-00', 'Laki-laki', 'B', '082332786534', 'Mahasiswa', 'Septiana', 'jalan veteran', 'umbulharjo', 'warung boto', 'Yogyakarta', 'DIY', '', '3098279826', '2037220239', '28927872', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tempat_lahir_pegawai`, `tgl_lahir_pegawai`, `alamat_pegawai`, `no_tlpn_pegawai`, `status_pegawai`, `tgl_masuk_sebagai_pegawai`, `level`, `username`, `password`) VALUES
(3, 'Ika', 'riau', '1998-11-05', 'kusuma negara', '083278459823', 3, '2018-11-07', '1', 'ika123', 'ika123');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `rm` varchar(100) NOT NULL,
  `resep` varchar(100) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_perawat` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(10) NOT NULL,
  `nama_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Mata'),
(2, 'Poli Penyakit Dalam'),
(3, 'Poli Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `no_telp_supplier` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `Alamat`, `no_telp_supplier`, `email`, `status`) VALUES
(1, 'kiki', 'mks', '0998', 'kjhgfd', '0'),
(2, 'Ayua', 'palembang', '082309549876', 'ayua@gmail.com', '1'),
(3, 'Rizky Aulia Dwiyanty', 'Makassar', '082347246576', 'rizkyauliadwiyanty@g', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat_in`
--

CREATE TABLE `transaksi_obat_in` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat_out`
--

CREATE TABLE `transaksi_obat_out` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `jadwal_dokter_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
