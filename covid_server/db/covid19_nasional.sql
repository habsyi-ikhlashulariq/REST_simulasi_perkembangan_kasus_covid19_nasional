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
-- Database: `covid19_nasional`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'rahasia', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`kd_user`, `username`, `password`, `avatar`) VALUES
(1, 'admin', '$2y$10$SiFIfmltH18.y3RtcZSXv.hVuKAhjTytGhwObVRsygIUxnQ370vQW', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perkembangan_kasus`
--

CREATE TABLE `tbl_perkembangan_kasus` (
  `id_kasus` int(11) NOT NULL,
  `kd_provinsi` int(11) NOT NULL,
  `positif` int(11) NOT NULL,
  `sembuh` int(11) NOT NULL,
  `meninggal` int(11) NOT NULL,
  `dirawat` int(11) NOT NULL,
  `pdp` int(11) NOT NULL,
  `odp` int(11) NOT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perkembangan_kasus`
--

INSERT INTO `tbl_perkembangan_kasus` (`id_kasus`, `kd_provinsi`, `positif`, `sembuh`, `meninggal`, `dirawat`, `pdp`, `odp`, `update_at`) VALUES
(1, 3, 100, 20, 20, 60, 129, 300, '2020-07-23 23:22:58'),
(3, 30, 80, 10, 20, 50, 100, 120, '2020-07-23 23:23:34'),
(4, 5, 550, 200, 50, 300, 200, 630, '2020-07-24 12:52:53'),
(6, 12, 300, 100, 50, 150, 250, 500, '2020-07-24 12:52:59'),
(8, 14, 200, 100, 20, 80, 28, 30, '2020-07-23 23:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `kd_provinsi` int(11) NOT NULL,
  `nm_provinsi` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`kd_provinsi`, `nm_provinsi`, `latitude`, `longitude`) VALUES
(1, 'Provinsi Aceh', '4.695135', '96.7493993'),
(2, 'Provinsi Sumatera Utara', '2.1153547', '99.5450974'),
(3, 'Provinsi Sumatera Barat', '-0.7399397', '100.8000051'),
(4, 'Provinsi Riau', '0.2933469', '101.7068294'),
(5, ' Provinsi Jambi', '-1.4851831', '102.4380581'),
(6, ' Provinsi Sumatera Selatan', '-3.3194374', '103.914399'),
(7, ' Provinsi Bengkulu', '-3.5778471', '102.3463875'),
(8, ' Provinsi Lampung', '-4.5585849', ' 105.4068079'),
(9, ' Provinsi Kepulauan Bangka Belitung', '-2.7410513', '106.4405872'),
(10, 'Provinsi Kepulauan Riau', '3.9456514', '108.1428669'),
(11, ' Provinsi DKI Jakarta', '-6.211544', '106.845172'),
(12, ' Provinsi Jawa Barat', '-7.090911', '107.668887'),
(13, ' Provinsi Jawa Tengah', '-7.150975', '110.1402594'),
(14, ' Provinsi DI Yogyakarta', '-7.8753849', '110.4262088'),
(15, ' Provinsi Jawa Timur', '-7.5360639', ' 112.2384017'),
(16, ' Provinsi Banten', '-6.4058172', '106.0640179'),
(17, ' Provinsi Bali', '-8.4095178', '115.188916'),
(18, ' Provinsi Nusa Tenggara Barat', '-8.6529334', ' 117.3616476'),
(19, ' Provinsi Nusa Tenggara Timur', '-8.6573819', '121.0793705'),
(20, ' Provinsi Kalimantan Barat', '-0.2787808', '111.4752851'),
(21, 'Provinsi Kalimantan Tengah', '-1.6814878', '113.3823545'),
(22, 'Provinsi Kalimantan Selatan', '-3.0926415', '115.2837585'),
(23, 'Provinsi Kalimantan Timur', '1.6406296', '116.419389'),
(24, 'Provinsi Sulawesi Utara', '0.6246932', '123.9750018'),
(25, 'Provinsi Sulawesi Tengah', '-1.4300254', '121.4456179'),
(26, 'Provinsi Sulawesi Selatan', '-3.6687994', '119.9740534'),
(27, ' Provinsi Sulawesi Tenggara', '-4.14491', '122.174605'),
(28, 'Provinsi Gorontalo', '0.6999372', '122.4467238'),
(29, 'Provinsi Sulawesi Barat', '-2.8441371', '119.2320784'),
(30, 'Provinsi Maluku', '-3.2384616', '130.1452734'),
(31, 'Provinsi Maluku Utara', '1.5709993', '127.8087693'),
(32, 'Provinsi Papua Barat', '-1.3361154', '133.1747162'),
(33, 'Provinsi Papua', '-4.269928', '138.0803529');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_provinsi`
--

CREATE TABLE `tbl_sub_provinsi` (
  `id` int(11) NOT NULL,
  `kd_provinsi` int(11) NOT NULL,
  `nm_kota` varchar(50) NOT NULL,
  `nm_kab` varchar(50) NOT NULL,
  `nm_kec` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `radius` varchar(11) NOT NULL,
  `warna` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_provinsi`
--

INSERT INTO `tbl_sub_provinsi` (`id`, `kd_provinsi`, `nm_kota`, `nm_kab`, `nm_kec`, `latitude`, `longitude`, `radius`, `warna`) VALUES
(24, 5, 'Bandung', 'Cimahi', 'Cimahi', '-6.937332868878443', '107.60006766501725', '10000', 'yellow'),
(25, 5, 'Karawang', 'Cikampek', 'Cikampek', '-6.375353167891235', '107.34192922802089', '15000', 'red'),
(26, 5, 'Depok', 'Cipayung', 'Cipayung', '-6.457234498765346', '106.83114466119834', '5000', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `kd_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table covid19_nasional.tbl_user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `covid19_nasional`.`tbl_user`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `tbl_perkembangan_kasus`
--
ALTER TABLE `tbl_perkembangan_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`kd_provinsi`);

--
-- Indexes for table `tbl_sub_provinsi`
--
ALTER TABLE `tbl_sub_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_perkembangan_kasus`
--
ALTER TABLE `tbl_perkembangan_kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `kd_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_sub_provinsi`
--
ALTER TABLE `tbl_sub_provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
