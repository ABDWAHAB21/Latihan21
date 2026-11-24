-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2026 at 07:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `kebutuhan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `provinsi_id` varchar(10) DEFAULT NULL,
  `provinsi_nama` varchar(100) DEFAULT NULL,
  `kabupaten_id` varchar(10) DEFAULT NULL,
  `kabupaten_nama` varchar(100) DEFAULT NULL,
  `kecamatan_id` varchar(10) DEFAULT NULL,
  `kecamatan_nama` varchar(100) DEFAULT NULL,
  `kelurahan_id` varchar(10) DEFAULT NULL,
  `kelurahan_nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `jenis_kelamin`, `provinsi_id`, `provinsi_nama`, `kabupaten_id`, `kabupaten_nama`, `kecamatan_id`, `kecamatan_nama`, `kelurahan_id`, `kelurahan_nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('dia', '465b1f70b50166b6d05397fca8d600b0', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('alam', '81dc9bdb52d04dc20036dbd8313ed055', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('wahab', 'a0af1bfeb7f18f2746347000d2224365', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('kaka', 'c20ad4d76fe97759aa27a0c99bff6710', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('iy', 'c20ad4d76fe97759aa27a0c99bff6710', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('iyy', '3c59dc048e8850243be8079a5c74d079', 9, 'Laki-laki', '35', 'JAWA TIMUR', '3520', 'KABUPATEN MAGETAN', '3520120', 'KARANGREJO', '3520120020', 'KAUMAN'),
('alam', '96a3be3cf272e017046d1b2674a52bd3', 10, 'Laki-laki', '34', 'DI YOGYAKARTA', '3401', 'KABUPATEN KULON PROGO', '3401120', 'SAMIGALUH', '3401120006', 'NGARGOSARI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
