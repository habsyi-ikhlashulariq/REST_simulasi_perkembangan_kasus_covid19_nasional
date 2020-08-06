-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `kd_provinsi` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `kd_provinsi`, `nama`, `email`, `password`, `avatar`) VALUES
(1, 12, 'Supriyono', 'jabarkorona@gmail.com', '$2y$10$.LBeYJtpgGXtsNwGhYB1/OdjGAlRwj.fMopMPlx3MhxIr7wD5VgqC', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasus`
--

CREATE TABLE `tb_kasus` (
  `id` int(11) NOT NULL,
  `positif` int(11) NOT NULL,
  `sembuh` int(11) NOT NULL,
  `meninggal` int(11) NOT NULL,
  `dirawat` int(11) NOT NULL,
  `pdp` int(11) NOT NULL,
  `odp` int(11) NOT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kasus`
--

INSERT INTO `tb_kasus` (`id`, `positif`, `sembuh`, `meninggal`, `dirawat`, `pdp`, `odp`, `update_at`) VALUES
(14, 300, 100, 50, 150, 250, 500, '2020-07-23 23:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id` int(11) NOT NULL,
  `nm_kab` varchar(20) NOT NULL,
  `nm_kota` varchar(20) NOT NULL,
  `nm_kec` varchar(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `radius` varchar(11) NOT NULL,
  `warna` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id`, `nm_kab`, `nm_kota`, `nm_kec`, `latitude`, `longitude`, `radius`, `warna`) VALUES
(9, 'Cimahi', 'Bandung', 'Cimahi', '-6.937332868878443', '107.60006766501725', '10000', 'yellow'),
(10, 'Cikampek', 'Karawang', 'Cikampek', '-6.375353167891235', '107.34192922802089', '15000', 'red'),
(11, 'Cipayung', 'Depok', 'Cipayung', '-6.457234498765346', '106.83114466119834', '5000', 'blue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `tb_kasus`
--
ALTER TABLE `tb_kasus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kasus`
--
ALTER TABLE `tb_kasus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
