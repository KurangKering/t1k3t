-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2017 at 04:32 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--
CREATE DATABASE IF NOT EXISTS `tiket` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tiket`;

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE `maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `fee` int(11) NOT NULL,
  `persen` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `nama`, `fee`, `persen`) VALUES
(1, 'AIR ASIA', 10000, '5.0000'),
(2, 'SRIWIJAYA', 10000, '5.0000'),
(3, 'CITILINK', 10000, '5.0000'),
(4, 'LION', 10000, '5.0000'),
(5, 'BATIK', 10000, '5.0000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `booking_code` varchar(10) NOT NULL,
  `hpp` int(11) NOT NULL,
  `persen` decimal(5,4) NOT NULL,
  `invoice` int(11) NOT NULL,
  `q` tinyint(4) NOT NULL,
  `adm_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_tc`, `id_maskapai`, `tanggal`, `booking_code`, `hpp`, `persen`, `invoice`, `q`, `adm_fee`) VALUES
(1, 1, 1, '2017-02-01', 'J9QUNW', 634100, '0.0500', 754100, 3, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE `tc` (
  `id_tc` int(11) NOT NULL,
  `nama_tc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tc`
--

INSERT INTO `tc` (`id_tc`, `nama_tc`) VALUES
(1, 'Meimei'),
(2, 'Hardi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_penjualan` (
`id_penjualan` int(11)
,`id_tc` int(11)
,`id_maskapai` int(11)
,`tanggal` date
,`booking_code` varchar(10)
,`hpp` int(11)
,`persen` decimal(5,4)
,`invoice` int(11)
,`q` tinyint(4)
,`adm_fee` int(11)
,`nama_tc` varchar(50)
,`nama_maskapai` varchar(30)
,`NTA` bigint(17) unsigned
,`harga_jual` bigint(18) unsigned
,`up_salling` bigint(19) unsigned
,`profit_1` bigint(20) unsigned
,`FEE` bigint(14)
,`profit_2` bigint(21) unsigned
,`jumlah` bigint(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_penjualan`
--
DROP TABLE IF EXISTS `view_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_penjualan`  AS  select `penjualan`.`id_penjualan` AS `id_penjualan`,`penjualan`.`id_tc` AS `id_tc`,`penjualan`.`id_maskapai` AS `id_maskapai`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`booking_code` AS `booking_code`,`penjualan`.`hpp` AS `hpp`,`penjualan`.`persen` AS `persen`,`penjualan`.`invoice` AS `invoice`,`penjualan`.`q` AS `q`,`penjualan`.`adm_fee` AS `adm_fee`,`tc`.`nama_tc` AS `nama_tc`,`maskapai`.`nama` AS `nama_maskapai`,cast((`penjualan`.`hpp` * `penjualan`.`persen`) as unsigned) AS `NTA`,cast((`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)) as unsigned) AS `harga_jual`,cast((`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`))) as unsigned) AS `up_salling`,cast(((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) as unsigned) AS `profit_1`,(`penjualan`.`q` * `penjualan`.`adm_fee`) AS `FEE`,cast((((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) - (`penjualan`.`q` * `penjualan`.`adm_fee`)) as unsigned) AS `profit_2`,(`penjualan`.`hpp` + (`penjualan`.`q` * `penjualan`.`adm_fee`)) AS `jumlah` from ((`penjualan` join `maskapai` on((`penjualan`.`id_maskapai` = `maskapai`.`id_maskapai`))) join `tc` on((`penjualan`.`id_tc` = `tc`.`id_tc`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`id_maskapai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tc`
--
ALTER TABLE `tc`
  ADD PRIMARY KEY (`id_tc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maskapai`
--
ALTER TABLE `maskapai`
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id_tc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
