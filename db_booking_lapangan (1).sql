-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 06:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking_lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_olahraga`
--

CREATE TABLE `booking_olahraga` (
  `id_booking_olahraga` int(12) NOT NULL,
  `id_pengguna` int(12) NOT NULL,
  `waktu_mulai_booking` datetime NOT NULL,
  `waktu_selesai_booking` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `id_lapangan` int(12) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `email_pemesan` varchar(200) NOT NULL,
  `catatan` text DEFAULT NULL,
  `nama_lapangan` varchar(50) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_olahraga`
--

INSERT INTO `booking_olahraga` (`id_booking_olahraga`, `id_pengguna`, `waktu_mulai_booking`, `waktu_selesai_booking`, `created_at`, `created_by`, `updated_at`, `updated_by`, `id_lapangan`, `nama_pemesan`, `email_pemesan`, `catatan`, `nama_lapangan`, `status`) VALUES
(91, 9137, '2024-06-07 10:08:00', '2024-06-07 11:08:00', '2024-06-07 03:08:23', 'admin', '2024-06-07 03:08:49', NULL, 148, 'admin', 'admin@1.c', 'yes', 'Jati 2', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan_olahraga`
--

CREATE TABLE `lapangan_olahraga` (
  `id_lapangan` int(12) NOT NULL,
  `id_lokasi` int(12) NOT NULL,
  `nama_lapangan` varchar(30) NOT NULL,
  `harga_lapangan` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `deskripsi_lapangan` text NOT NULL,
  `img_lapangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lapangan_olahraga`
--

INSERT INTO `lapangan_olahraga` (`id_lapangan`, `id_lokasi`, `nama_lapangan`, `harga_lapangan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deskripsi_lapangan`, `img_lapangan`) VALUES
(148, 7, 'Jati 2', 12000, '2024-06-07 02:52:57', NULL, '2024-06-07 02:52:57', NULL, 'alamak', 'img/code_1717728777.png'),
(149, 8, 'Kapernaum', 25000, '2024-06-07 03:01:46', NULL, '2024-06-07 03:01:46', NULL, 'yes', 'img/alamak_1717729306.jpeg'),
(150, 6, 'Jati', 25000, '2024-06-07 03:46:22', NULL, '2024-06-07 03:46:22', NULL, 'Walawe', 'img/4c8769453e0726ba5faf3f55ab967ce3_1717731982.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(225) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`, `deskripsi`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
(6, 'Medan', 'Jl. Sisimangaraja XII', 'Test', '2024-05-24 14:14:47', '2024-05-24 14:14:47', 'admin', NULL),
(7, 'Parapat', 'Jl. Parapat - Balige Km. 27', 'Dimana', '2024-05-24 15:00:54', '2024-05-24 15:00:54', 'admin', NULL),
(8, 'Laguboti', 'Jl. Besar', 'Daerah Laguboti', '2024-05-25 15:08:26', '2024-05-25 15:08:26', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `jenis_pelanggan` enum('biasa','member') NOT NULL,
  `id_pengguna` int(12) NOT NULL,
  `tgl_berakhir_member` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `jenis_pelanggan`, `id_pengguna`, `tgl_berakhir_member`, `updated_at`, `created_at`) VALUES
(4, 'member', 9136, '2025-05-22 07:56:59', '2024-05-22 07:56:59', '2024-05-22 07:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_lapangan`
--

CREATE TABLE `pengelola_lapangan` (
  `id_pengelola_lapangan` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `keterangan` text DEFAULT NULL,
  `id_lokasi` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_olahraga`
--

CREATE TABLE `pengguna_olahraga` (
  `id_pengguna` int(12) NOT NULL,
  `username_pengguna` varchar(200) NOT NULL,
  `password_pengguna` varchar(200) NOT NULL,
  `jenis_pengguna` enum('pemilik','pengelola','pelanggan','') NOT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `tgl_member_berakhir` datetime DEFAULT NULL,
  `id_lokasi` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna_olahraga`
--

INSERT INTO `pengguna_olahraga` (`id_pengguna`, `username_pengguna`, `password_pengguna`, `jenis_pengguna`, `created_at`, `created_by`, `updated_at`, `updated_by`, `last_login`, `tgl_member_berakhir`, `id_lokasi`) VALUES
(9136, 'walawe', '$2y$10$gnVnXtdraU8w2Txol5Y2MucNdkHe1xP27HWLym3vNlWC76MVRYgyO', 'pelanggan', '2024-05-22 07:56:13.000000', 'walawe', '2024-05-28 01:16:23', 'walawe', '2024-05-28 01:16:23', NULL, NULL),
(9137, 'admin', '$2y$10$1f3/uzbsWR5mNSUdvW2HKOt8Md3t7QIPX.7JUNIRiaOasLqZG9cgm', 'pemilik', '2024-05-22 07:58:13.000000', 'admin', '2024-06-07 03:49:46', 'admin', '2024-06-07 03:49:46', NULL, NULL),
(9144, 'alamak', '$2y$10$WkC1duAS6yvcZ6bYtT/7Y.h1pFb3p3lfkI.mvuj5KFKZT5CecAF2q', 'pengelola', '2024-05-24 14:59:52.000000', 'admin', '2024-06-07 03:45:56', 'admin', '2024-06-07 03:45:56', NULL, 6),
(9145, 'alamak2', '$2y$10$IC8IP.z28Ni85/cBlF1zeu8pODXVKfR01W8SQrnYb.Isf8MmCy2w.', 'pengelola', '2024-05-25 10:21:29.000000', 'admin', '2024-06-07 03:34:21', 'admin', '2024-06-07 03:34:21', NULL, 7),
(9146, 'alamak3', '$2y$10$YImi5Tbzc0zSE8ZQebwTvug4uuq0m9gnZXPHCLOEgjPCNEPDaRSlK', 'pengelola', '2024-05-25 15:08:43.000000', 'admin', '2024-05-26 08:14:21', 'admin', '2024-05-26 08:14:21', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `produk_olahraga`
--

CREATE TABLE `produk_olahraga` (
  `id_produkolahraga` int(12) NOT NULL,
  `nama_produkolahraga` varchar(50) NOT NULL,
  `harga_produkolahraga` double NOT NULL,
  `stok_produkolahraga` int(12) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `img_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_olahraga`
--

INSERT INTO `produk_olahraga` (`id_produkolahraga`, `nama_produkolahraga`, `harga_produkolahraga`, `stok_produkolahraga`, `created_at`, `created_by`, `updated_at`, `updated_by`, `img_product`) VALUES
(1, 'Lenovo Sneekers', 185200000, 2, '2024-05-24 14:57:20', NULL, '2024-05-24 14:57:35', NULL, 'img/alamak_1716562640.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_olahraga`
--

CREATE TABLE `transaksi_olahraga` (
  `id_transaksi_olahraga` int(12) NOT NULL,
  `id_pengguna` int(12) NOT NULL,
  `id_produkolahraga` int(12) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `nama_pemesan` varchar(12) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_olahraga`
--

INSERT INTO `transaksi_olahraga` (`id_transaksi_olahraga`, `id_pengguna`, `id_produkolahraga`, `created_at`, `created_by`, `nama_pemesan`, `jumlah`, `updated_at`) VALUES
(1, 9137, 1, '2024-05-24 14:57:58', '9137', 'admin', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_olahraga`
--
ALTER TABLE `booking_olahraga`
  ADD PRIMARY KEY (`id_booking_olahraga`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pengguna_2` (`id_pengguna`),
  ADD KEY `id_pengguna_3` (`id_pengguna`),
  ADD KEY `id_pengguna_4` (`id_pengguna`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `lapangan_olahraga`
--
ALTER TABLE `lapangan_olahraga`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `jenis_pelanggan` (`jenis_pelanggan`),
  ADD KEY `jenis_pelanggan_2` (`jenis_pelanggan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengelola_lapangan`
--
ALTER TABLE `pengelola_lapangan`
  ADD PRIMARY KEY (`id_pengelola_lapangan`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `pengguna_olahraga`
--
ALTER TABLE `pengguna_olahraga`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `produk_olahraga`
--
ALTER TABLE `produk_olahraga`
  ADD PRIMARY KEY (`id_produkolahraga`);

--
-- Indexes for table `transaksi_olahraga`
--
ALTER TABLE `transaksi_olahraga`
  ADD PRIMARY KEY (`id_transaksi_olahraga`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_produkolahraga` (`id_produkolahraga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_olahraga`
--
ALTER TABLE `booking_olahraga`
  MODIFY `id_booking_olahraga` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `lapangan_olahraga`
--
ALTER TABLE `lapangan_olahraga`
  MODIFY `id_lapangan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengelola_lapangan`
--
ALTER TABLE `pengelola_lapangan`
  MODIFY `id_pengelola_lapangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna_olahraga`
--
ALTER TABLE `pengguna_olahraga`
  MODIFY `id_pengguna` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9147;

--
-- AUTO_INCREMENT for table `produk_olahraga`
--
ALTER TABLE `produk_olahraga`
  MODIFY `id_produkolahraga` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_olahraga`
--
ALTER TABLE `transaksi_olahraga`
  MODIFY `id_transaksi_olahraga` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_olahraga`
--
ALTER TABLE `booking_olahraga`
  ADD CONSTRAINT `booking_lapangan` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan_olahraga` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_olahraga_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna_olahraga` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapangan_olahraga`
--
ALTER TABLE `lapangan_olahraga`
  ADD CONSTRAINT `id_lokas` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna_olahraga` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengelola_lapangan`
--
ALTER TABLE `pengelola_lapangan`
  ADD CONSTRAINT `id_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `pengelola_lapangan` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan_olahraga` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna_olahraga`
--
ALTER TABLE `pengguna_olahraga`
  ADD CONSTRAINT `pengguna_olahraga_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `transaksi_olahraga`
--
ALTER TABLE `transaksi_olahraga`
  ADD CONSTRAINT `transaksi_olahraga_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna_olahraga` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_olahraga_ibfk_4` FOREIGN KEY (`id_produkolahraga`) REFERENCES `produk_olahraga` (`id_produkolahraga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
