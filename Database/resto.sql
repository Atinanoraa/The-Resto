-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 01:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tgl_realease` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama_menu`, `harga`, `tgl_realease`) VALUES
('M003', 'Nasi Goreng', '15000', '2021-05-12'),
('M005', 'Ayam geprek', '50000', '2021-05-12'),
('M006', 'Martabak', '31000', '2021-05-12'),
('M007', 'Jus', '5000', '2021-05-12'),
('M008', 'Ikan Bakar', '90000', '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_transaksi`
--

CREATE TABLE `tmp_transaksi` (
  `id_tmp` int(11) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_nota` varchar(255) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `kembalian` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_nota`, `kode_menu`, `nama`, `harga`, `qty`, `total`, `bayar`, `kembalian`, `tanggal`) VALUES
('N001', 'M005', 'Ayam geprek', 50000, 2, 100000, 120000, 5000, '2021-05-20'),
('N001', 'M003', 'Nasi Goreng', 15000, 1, 15000, 120000, 5000, '2021-05-20'),
('N002', 'M006', 'Martabak', 31000, 1, 31000, 40000, 4000, '2021-05-20'),
('N002', 'M007', 'Jus', 5000, 1, 5000, 40000, 4000, '2021-05-20'),
('N003', 'M003', 'Nasi Goreng', 15000, 1, 15000, 200000, 0, '2021-05-20'),
('N003', 'M007', 'Jus', 5000, 1, 5000, 200000, 0, '2021-05-20'),
('N003', 'M008', 'Ikan Bakar', 90000, 2, 180000, 200000, 0, '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `phone`, `gender`, `picture`) VALUES
(1, '', 'Admin', 'admin123', '', '', ''),
(2, 'Atina Nora', 'Atinaa', 'Atina123', '0812345678', 'Female', NULL),
(3, 'Bagas Surahman', 'Bagass', 'bagas123', '085678158', 'Male', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
