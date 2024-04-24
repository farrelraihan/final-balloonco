-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2024 at 05:40 AM
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
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `kode_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `login_admin` varchar(50) NOT NULL,
  `pw_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `kode_admin`, `nama_admin`, `login_admin`, `pw_admin`) VALUES
(3, 'ADM-0001', 'Prabowo', 'prabowosubianto', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'ADM-0002', 'Farrel Raihan', 'subarasheeesh', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'ADM-0003', 'Gibran', 'gibran', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'ADM-0005', 'Michael Jordan', 'mjnotthegoat', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'ADM-0005', 'Reza Fahlevi', 'rezafah', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` text NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `qty_barang` int(50) NOT NULL,
  `harga_barang` int(50) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `deskripsi_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `qty_barang`, `harga_barang`, `harga_beli`, `deskripsi_barang`) VALUES
(1, 'KB-0001', 'Flower Set', 81, 199000, 129000, 'ini adalah flower set'),
(2, 'KB-0002', 'Bloombox', 50, 279000, 199000, 'kerenn banget loh'),
(4, 'KB-0003', 'Jumbo Snack Set', 43, 480000, 320000, 'favorit anak sekolah'),
(5, 'KB-0004', 'Money Bouquet', 5, 150000, 99000, 'Buket uanggg'),
(6, 'KB-0005', 'Petite Graduation', 71, 99999, 69000, 'petite graduationnn'),
(7, 'KB-0006', 'Teddy Set', 4, 250000, 169000, 'Set balon disertai Teddy Bear'),
(9, 'KB-0007', 'Mini Snack Set', 3, 149999, 99000, 'Snack miniiii');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `tanggal_pembelian` datetime(6) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `quantity`, `tanggal_pembelian`, `id_barang`) VALUES
(3, 'BUY-0001', 19, '2024-04-11 22:12:07.000000', 2),
(4, 'BUY-0002', 20, '2024-04-11 22:12:18.000000', 2),
(5, 'BUY-0003', 11, '2024-04-11 22:19:06.000000', 1),
(6, 'BUY-0004', 13, '2024-04-11 22:24:03.000000', 4),
(7, 'BUY-0005', 4, '2024-04-11 22:24:16.000000', 4),
(8, 'BUY-0006', 12, '2024-04-11 23:11:57.000000', 2),
(9, 'BUY-0007', 4, '2024-04-11 23:12:08.000000', 1),
(10, 'BUY-0008', 7, '2024-04-11 23:12:18.000000', 1),
(11, 'BUY-0009', 11, '2024-04-11 23:12:27.000000', 4),
(12, 'BUY-0010', 5, '2024-04-11 23:12:36.000000', 2),
(13, 'BUY-0011', 11, '2024-04-11 23:12:46.000000', 4),
(14, 'BUY-0012', 11, '2024-04-16 20:41:33.000000', 7),
(15, 'BUY-0013', 13, '2024-04-16 20:42:23.000000', 6),
(16, 'BUY-0014', 9, '2024-04-16 20:42:47.000000', 6),
(17, 'BUY-0015', 7, '2024-04-16 22:03:06.000000', 7),
(18, 'BUY-0016', 18, '2024-04-16 22:03:19.000000', 7),
(19, 'BUY-0017', 5, '2024-04-16 22:03:44.000000', 6),
(20, 'BUY-0018', 19, '2024-04-16 22:04:31.000000', 7),
(21, 'BUY-0019', 61, '2024-04-23 22:52:55.000000', 7),
(22, 'BUY-0020', 11, '2024-04-23 23:13:40.000000', 6),
(23, 'BUY-0021', 11, '2024-04-23 23:14:41.000000', 6);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `tanggal_penjualan` datetime(6) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `quantity`, `tanggal_penjualan`, `id_barang`) VALUES
(5, 'KP-0001', 6, '2024-04-11 21:29:06.000000', 2),
(6, 'KP-0002', 2, '2024-04-11 21:49:40.000000', 1),
(7, 'KP-0003', 3, '2024-04-11 21:49:53.000000', 2),
(8, 'KP-0004', 4, '2024-04-11 21:50:14.000000', 2),
(9, 'KP-0005', 5, '2024-04-11 21:50:27.000000', 1),
(10, 'KP-0006', 2, '2024-04-11 21:50:45.000000', 1),
(11, 'KP-0007', 1, '2024-04-11 21:50:52.000000', 1),
(12, 'KP-0008', 4, '2024-04-11 21:51:01.000000', 1),
(13, 'KP-0009', 2, '2024-04-11 21:51:14.000000', 2),
(14, 'KP-0010', 1, '2024-04-11 22:12:27.000000', 2),
(15, 'KP-0011', 3, '2024-04-11 22:12:40.000000', 2),
(16, 'KP-0012', 2, '2024-04-11 22:12:54.000000', 1),
(17, 'KP-0013', 1, '2024-04-11 22:13:06.000000', 1),
(18, 'KP-0014', 6, '2024-04-11 22:13:13.000000', 1),
(19, 'KP-0015', 3, '2024-04-11 22:13:22.000000', 2),
(20, 'KP-0016', 2, '2024-04-11 22:13:50.000000', 2),
(21, 'KP-0017', 3, '2024-04-11 22:14:00.000000', 2),
(22, 'KP-0018', 1, '2024-04-11 22:14:08.000000', 2),
(23, 'KP-0019', 2, '2024-04-11 22:14:22.000000', 1),
(24, 'KP-0020', 2, '2024-04-11 22:57:25.000000', 4),
(25, 'KP-0021', 2, '2024-04-13 17:00:29.000000', 4),
(26, 'KP-0022', 2, '2024-04-13 18:39:28.000000', 4),
(27, 'KP-0023', 9, '2024-04-13 18:44:35.000000', 2),
(28, 'KP-0024', 2, '2024-04-16 11:11:48.000000', 5),
(29, 'KP-0025', 1, '2024-04-16 20:48:13.000000', 6),
(30, 'KP-0026', 2, '2024-04-16 22:15:55.000000', 7),
(31, 'KP-0027', 121, '2024-04-23 22:53:10.000000', 7),
(32, 'KP-0028', 12, '2024-04-23 23:14:18.000000', 5),
(33, 'KP-0029', 35, '2024-04-23 23:14:33.000000', 2),
(34, 'KP-0030', 35, '2024-04-24 08:54:58.000000', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
