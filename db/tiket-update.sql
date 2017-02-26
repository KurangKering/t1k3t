-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tiket
CREATE DATABASE IF NOT EXISTS `tiket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tiket`;

-- Dumping structure for table tiket.konfig
CREATE TABLE IF NOT EXISTS `konfig` (
  `persen` decimal(5,4) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.konfig: ~0 rows (approximately)
/*!40000 ALTER TABLE `konfig` DISABLE KEYS */;
INSERT INTO `konfig` (`persen`, `fee`) VALUES
	(0.0500, 10000);
/*!40000 ALTER TABLE `konfig` ENABLE KEYS */;

-- Dumping structure for table tiket.maskapai
CREATE TABLE IF NOT EXISTS `maskapai` (
  `id_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_maskapai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.maskapai: ~7 rows (approximately)
/*!40000 ALTER TABLE `maskapai` DISABLE KEYS */;
INSERT INTO `maskapai` (`id_maskapai`, `nama`, `status`) VALUES
	(1, 'AIR ASIA', 'ACTIVE'),
	(2, 'SRIWIJAYA', 'ACTIVE'),
	(3, 'CITILINK', 'ACTIVE'),
	(4, 'LION', 'ACTIVE'),
	(5, 'BATIK', 'ACTIVE'),
	(6, 'sdfsd', 'ACTIVE');
/*!40000 ALTER TABLE `maskapai` ENABLE KEYS */;

-- Dumping structure for table tiket.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `booking_code` varchar(10) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hpp` int(11) NOT NULL,
  `persen` decimal(5,4) NOT NULL,
  `invoice` int(11) NOT NULL,
  `q` tinyint(4) NOT NULL,
  `fee` int(11) NOT NULL,
  `tanggal_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.penjualan: ~5 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`booking_code`, `id_tc`, `id_maskapai`, `tanggal`, `hpp`, `persen`, `invoice`, `q`, `fee`, `tanggal_insert`) VALUES
	('1', 1, 4, '2017-02-12', 1, 0.0500, 1, 1, 10000, '2017-02-26 18:14:25'),
	('12312', 1, 1, '2017-02-14', 2, 0.0500, 2, 2, 10000, '2017-02-26 18:17:28'),
	('232', 1, 1, '2017-02-28', 1, 0.0500, 1, 2, 10000, '2017-02-26 18:16:55'),
	('232232', 1, 2, '2017-02-17', 1, 0.0500, 1, 1, 10000, '2017-02-26 18:21:00'),
	('993', 1, 1, '2017-02-14', 1, 0.0500, 1, 2, 10000, '2017-02-26 18:14:25');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table tiket.tc
CREATE TABLE IF NOT EXISTS `tc` (
  `id_tc` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tc` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id_tc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.tc: ~2 rows (approximately)
/*!40000 ALTER TABLE `tc` DISABLE KEYS */;
INSERT INTO `tc` (`id_tc`, `nama_tc`, `status`) VALUES
	(1, 'Meimei', 'ACTIVE'),
	(2, 'Hardi', 'ACTIVE');
/*!40000 ALTER TABLE `tc` ENABLE KEYS */;

-- Dumping structure for table tiket.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tiket.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`) VALUES
	('admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view tiket.view_penjualan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_penjualan` (
	`tanggal_insert` TIMESTAMP NOT NULL,
	`id_tc` INT(11) NOT NULL,
	`id_maskapai` INT(11) NOT NULL,
	`tanggal` DATE NOT NULL,
	`booking_code` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`hpp` INT(11) NOT NULL,
	`persen` DECIMAL(5,4) NOT NULL,
	`invoice` INT(11) NOT NULL,
	`q` TINYINT(4) NOT NULL,
	`fee` INT(11) NOT NULL,
	`nama_tc` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nama_maskapai` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`NTA` BIGINT(17) UNSIGNED NOT NULL,
	`harga_jual` BIGINT(18) UNSIGNED NOT NULL,
	`up_salling` BIGINT(19) UNSIGNED NOT NULL,
	`profit_1` BIGINT(20) UNSIGNED NOT NULL,
	`adm_fee` BIGINT(14) NOT NULL,
	`profit_2` BIGINT(21) UNSIGNED NOT NULL,
	`jumlah` BIGINT(15) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view tiket.view_penjualan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_penjualan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_penjualan` AS select `penjualan`.`tanggal_insert` AS `tanggal_insert`, `penjualan`.`id_tc` AS `id_tc`,`penjualan`.`id_maskapai` AS `id_maskapai`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`booking_code` AS `booking_code`,`penjualan`.`hpp` AS `hpp`,`penjualan`.`persen` AS `persen`,`penjualan`.`invoice` AS `invoice`,`penjualan`.`q` AS `q`,`penjualan`.`fee` AS `fee`,`tc`.`nama_tc` AS `nama_tc`,`maskapai`.`nama` AS `nama_maskapai`,cast((`penjualan`.`hpp` * `penjualan`.`persen`) as unsigned) AS `NTA`,cast((`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)) as unsigned) AS `harga_jual`,cast((`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`))) as unsigned) AS `up_salling`,cast(((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) as unsigned) AS `profit_1`,(`penjualan`.`q` * `penjualan`.`fee`) AS `adm_fee`,cast((((`penjualan`.`hpp` * `penjualan`.`persen`) + (`penjualan`.`invoice` - (`penjualan`.`hpp` + (`penjualan`.`hpp` * `penjualan`.`persen`)))) - (`penjualan`.`q` * `penjualan`.`fee`)) as unsigned) AS `profit_2`,(`penjualan`.`hpp` + (`penjualan`.`q` * `penjualan`.`fee`)) AS `jumlah` from ((`penjualan` join `maskapai` on((`penjualan`.`id_maskapai` = `maskapai`.`id_maskapai`))) join `tc` on((`penjualan`.`id_tc` = `tc`.`id_tc`))) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
