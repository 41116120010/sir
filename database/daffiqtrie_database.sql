-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2025 at 02:41 AM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saaddbvc_webdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_konsol`
--

CREATE TABLE `daffiqtrie_konsol` (
  `kode_konsol` varchar(50) NOT NULL,
  `jenis_konsol` enum('PS3','PS4') NOT NULL,
  `status` enum('Tersedia','Disewa') DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_konsol`
--

INSERT INTO `daffiqtrie_konsol` (`kode_konsol`, `jenis_konsol`, `status`) VALUES
('ps3-1', 'PS3', 'Tersedia'),
('ps3-2', 'PS3', 'Tersedia'),
('ps3-3', 'PS3', 'Tersedia'),
('ps4-1', 'PS4', 'Tersedia'),
('ps4-2', 'PS4', 'Tersedia'),
('ps4-3', 'PS4', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_pendapatan`
--

CREATE TABLE `daffiqtrie_pendapatan` (
  `id` int(11) NOT NULL,
  `no_trx` varchar(50) NOT NULL,
  `durasi_penyewaan` varchar(20) NOT NULL,
  `jenis_konsol` enum('PS3','PS4') NOT NULL,
  `kode_konsol` varchar(50) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_berakhir` datetime NOT NULL,
  `id_operator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_pendapatan`
--

INSERT INTO `daffiqtrie_pendapatan` (`id`, `no_trx`, `durasi_penyewaan`, `jenis_konsol`, `kode_konsol`, `pendapatan`, `waktu_mulai`, `waktu_berakhir`, `id_operator`) VALUES
(1, '2606-001', '1 jam', 'PS3', 'ps3-1', 6000, '2025-06-26 01:33:02', '2025-06-26 02:33:02', 1),
(2, '2606-002', '1 jam', 'PS4', 'ps4-1', 8000, '2025-06-26 01:33:12', '2025-06-26 02:33:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_pengeluaran`
--

CREATE TABLE `daffiqtrie_pengeluaran` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `jumlah_pengeluaran` bigint(20) NOT NULL,
  `tanggal_kegiatan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_pengeluaran`
--

INSERT INTO `daffiqtrie_pengeluaran` (`id`, `nama_kegiatan`, `jumlah_pengeluaran`, `tanggal_kegiatan`) VALUES
(1, 'Token Listrik 10k', 12000, '2025-06-25 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_pengguna`
--

CREATE TABLE `daffiqtrie_pengguna` (
  `id_operator` int(11) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jabatan` enum('Owner','Operator','Pengunjung') NOT NULL DEFAULT 'Pengunjung',
  `last_login` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_pengguna`
--

INSERT INTO `daffiqtrie_pengguna` (`id_operator`, `nama_operator`, `username`, `password`, `jabatan`, `last_login`, `foto`) VALUES
(1, 'Akun Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Owner', '2025-06-26', 'dapiqun.jpg'),
(2, 'Akun Operator', 'operator', '4b583376b2767b923c3e1da60d10de59', 'Operator', '0000-00-00', 'ranah.jpeg'),
(3, 'Akun Pengunjung', 'pengunjung', '3fbe7200a4b9a894e16c9d998314dc80', 'Pengunjung', '2025-06-26', 'ranah.jpeg'),
(4, 'Prabowo Subianto', 'prabowo', '8fc9ea4323c75d30cd28d1ca854d56d8', 'Pengunjung', '0000-00-00', 'daffiqtrie_685c48373e227.jpg'),
(5, 'Akun Ranah Playstation', 'ranah', '51744a5c6ffd0d01f3891ffe48241ea0', 'Pengunjung', '0000-00-00', 'daffiqtrie_685c48f0d44f9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_telegram`
--

CREATE TABLE `daffiqtrie_telegram` (
  `id` int(11) NOT NULL,
  `no_trx` varchar(20) NOT NULL,
  `kode_konsol` varchar(50) NOT NULL,
  `jenis_notifikasi` enum('hampir_habis','habis') NOT NULL,
  `waktu_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_telegram`
--

INSERT INTO `daffiqtrie_telegram` (`id`, `no_trx`, `kode_konsol`, `jenis_notifikasi`, `waktu_kirim`) VALUES
(1, '2606-001', 'ps3-1', 'hampir_habis', '2025-06-25 19:25:05'),
(2, '2606-002', 'ps4-1', 'hampir_habis', '2025-06-25 19:25:06'),
(3, '2606-001', 'ps3-1', 'hampir_habis', '2025-06-25 19:30:06'),
(4, '2606-002', 'ps4-1', 'hampir_habis', '2025-06-25 19:30:08'),
(5, '2606-001', 'ps3-1', 'habis', '2025-06-25 19:35:05'),
(6, '2606-002', 'ps4-1', 'habis', '2025-06-25 19:35:06'),
(7, '2606-001', 'ps3-1', 'habis', '2025-06-25 19:40:06'),
(8, '2606-002', 'ps4-1', 'habis', '2025-06-25 19:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `daffiqtrie_website`
--

CREATE TABLE `daffiqtrie_website` (
  `id` int(11) NOT NULL,
  `nama_rental` varchar(255) NOT NULL,
  `lokasi_rental` text NOT NULL,
  `ps3_perjam` int(11) NOT NULL,
  `ps4_perjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daffiqtrie_website`
--

INSERT INTO `daffiqtrie_website` (`id`, `nama_rental`, `lokasi_rental`, `ps3_perjam`, `ps4_perjam`) VALUES
(1, 'Ranah Playstation', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2626070054357!2d100.36531757496518!3d-0.956294199034467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b95b5aaaaaab%3A0x212dca98e12beff8!2sMasjid%20Maryam%20Ranah!5e0!3m2!1sid!2sid!4v1740335451781!5m2!1sid!2sid', 6000, 8000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daffiqtrie_konsol`
--
ALTER TABLE `daffiqtrie_konsol`
  ADD PRIMARY KEY (`kode_konsol`) USING BTREE;

--
-- Indexes for table `daffiqtrie_pendapatan`
--
ALTER TABLE `daffiqtrie_pendapatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendapatan_konsol` (`kode_konsol`),
  ADD KEY `fk_pendapatan_operator` (`id_operator`);

--
-- Indexes for table `daffiqtrie_pengeluaran`
--
ALTER TABLE `daffiqtrie_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daffiqtrie_pengguna`
--
ALTER TABLE `daffiqtrie_pengguna`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `daffiqtrie_telegram`
--
ALTER TABLE `daffiqtrie_telegram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daffiqtrie_website`
--
ALTER TABLE `daffiqtrie_website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daffiqtrie_pendapatan`
--
ALTER TABLE `daffiqtrie_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daffiqtrie_pengeluaran`
--
ALTER TABLE `daffiqtrie_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daffiqtrie_pengguna`
--
ALTER TABLE `daffiqtrie_pengguna`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daffiqtrie_telegram`
--
ALTER TABLE `daffiqtrie_telegram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daffiqtrie_website`
--
ALTER TABLE `daffiqtrie_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daffiqtrie_pendapatan`
--
ALTER TABLE `daffiqtrie_pendapatan`
  ADD CONSTRAINT `fk_pendapatan_konsol` FOREIGN KEY (`kode_konsol`) REFERENCES `daffiqtrie_konsol` (`kode_konsol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendapatan_operator` FOREIGN KEY (`id_operator`) REFERENCES `daffiqtrie_pengguna` (`id_operator`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
