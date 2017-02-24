-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 03:42 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
-- Table structure for table `konfig`
--

CREATE TABLE `konfig` (
  `persen` decimal(5,4) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfig`
--

INSERT INTO `konfig` (`persen`, `fee`) VALUES
('0.0500', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE `maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `nama`, `status`) VALUES
(1, 'AIR ASIA', 'ACTIVE'),
(2, 'SRIWIJAYA', 'ACTIVE'),
(3, 'CITILINK', 'ACTIVE'),
(4, 'LION', 'ACTIVE'),
(5, 'BATIK', 'ACTIVE'),
(6, 'sdfsd', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `booking_code` varchar(10) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hpp` int(11) NOT NULL,
  `persen` decimal(5,4) NOT NULL,
  `invoice` int(11) NOT NULL,
  `q` tinyint(4) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`booking_code`, `id_tc`, `id_maskapai`, `tanggal`, `hpp`, `persen`, `invoice`, `q`, `fee`) VALUES
('111', 1, 1, '2017-02-21', 2123, '0.0500', 232, 2, 10000),
('1231231', 1, 1, '2017-02-07', 654100, '0.0500', 725100, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE `tc` (
  `id_tc` int(11) NOT NULL,
  `nama_tc` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tc`
--

INSERT INTO `tc` (`id_tc`, `nama_tc`, `status`) VALUES
(1, 'Meimei', 'ACTIVE'),
(2, 'Hardi', 'ACTIVE');

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
--
CREATE TABLE `view_penjualan` (
`id_tc` int(11)
,`id_maskapai` int(11)
,`tanggal` date
,`booking_code` varchar(10)
,`hpp` int(11)
,`persen` decimal(5,4)
,`invoice` int(11)
,`q` tinyint(4)
,`fee` int(11)
,`nama_tc` varchar(50)
,`nama_maskapai` varchar(30)
,`NTA` bigint(17) unsigned
,`harga_jual` bigint(18) unsigned
,`up_salling` bigint(19) unsigned
,`profit_1` bigint(20) unsigned
,`adm_fee` bigint(14)
,`profit_2` bigint(21) unsigned
,`jumlah` bigint(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_penjualan`
--
DROP TABLE IF EXISTS `view_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan`  AS  select `penjualan`.`id_tc` AS `id_tc`,`penjualan`.`id_maskapai` AS `id_maskapai`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`booking_code` AS `booking_code`,`penjualan`.`hpp` AS `hpp`,`penjualan`.`persen` AS `persen`,`penjualan`.`invoice` AS `invoice`,`penjualan`.`q` AS `q`,`penjualan`.`fee` AS `fee`,`tc`.`nama_tc` AS `nama_tc`,`maskapai`.`nama` AS `nama_maskapai`,cast((`penjualan`.`hpp` * `penjualan`.`persen`) as unsigned) AS `NTA`,cast((`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)) as unsigned) AS `harga_jual`,cast((`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`))) as unsigned) AS `up_salling`,cast(((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) as unsigned) AS `profit_1`,(`penjualan`.`q` * `penjualan`.`fee`) AS `adm_fee`,cast((((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) - (`penjualan`.`q` * `penjualan`.`fee`)) as unsigned) AS `profit_2`,(`penjualan`.`hpp` + (`penjualan`.`q` * `penjualan`.`fee`)) AS `jumlah` from ((`penjualan` join `maskapai` on((`penjualan`.`id_maskapai` = `maskapai`.`id_maskapai`))) join `tc` on((`penjualan`.`id_tc` = `tc`.`id_tc`))) ;

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
  ADD PRIMARY KEY (`booking_code`);

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
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id_tc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
