-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2021 at 02:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisko`
--

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan`
--

CREATE TABLE `perjalanan` (
  `id_perjalanan` tinyint(5) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `alamat_tujuan` varchar(30) NOT NULL,
  `jml_penumpang` tinyint(2) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `km_awal` int(10) NOT NULL,
  `km_akhir` int(10) DEFAULT NULL,
  `id_user` tinyint(2) NOT NULL,
  `id_kendaraan` tinyint(2) NOT NULL,
  `id_pengemudi` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `tgl_berangkat`, `tgl_pulang`, `alamat_tujuan`, `jml_penumpang`, `status`, `km_awal`, `km_akhir`, `id_user`, `id_kendaraan`, `id_pengemudi`) VALUES
(1, '2021-06-06', '2021-06-08', 'Jakarta', 2, 0, 12000, 12560, 1, 1, 1),
(2, '2021-06-06', '2021-06-07', 'Jawa Tengah', 5, 0, 12000, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `no` tinyint(3) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no`, `nisn`, `nama_lengkap`, `alamat`) VALUES
(2, '065119056', 'Sri Novianti', 'Jakarta'),
(3, '065119054', 'asli', 'korea'),
(4, '065119050', 'ali ali', 'amerika'),
(7, '0009', 'ali ali ali', 'bogor coret');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `email`, `admin`) VALUES
(1, 'masrud', '7d05dc02abe9cda729d0c798c886db47', 'M. Rudianto', '-', 1),
(5, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'M Ali Yanwar', '11', 2),
(7, 'ali', '86318e52f5ed4801abe1d13d509443de', 'ali ali ali ali', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `id_perjalanan` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `no` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
