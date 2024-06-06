-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for simperpus_vsga2024
CREATE DATABASE IF NOT EXISTS `simperpus_vsga2024` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `simperpus_vsga2024`;

-- Dumping structure for table simperpus_vsga2024.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(50) NOT NULL DEFAULT '0',
  `alamat` varchar(200) NOT NULL DEFAULT '0',
  `email` varchar(65) NOT NULL DEFAULT '0',
  `no_telp` varchar(20) NOT NULL DEFAULT '0',
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table simperpus_vsga2024.tb_anggota: ~5 rows (approximately)
INSERT INTO `tb_anggota` (`id`, `nama_anggota`, `alamat`, `email`, `no_telp`, `jenis_kelamin`) VALUES
	(1, 'Tim Robbins', 'New York', 'tim.r@gmail.com', '9754945345', 'L'),
	(2, 'Morgan Freeman	', 'Memphis', 'morgan.freeman@gmail.com	', '98734234', 'L'),
	(7, 'Azid Fadhil', 'Sleman', 'azidfadhil@gmail.com', '085877657163', 'L'),
	(8, 'Azzayyana Farossa', 'Yogyakarta', 'farossa.a@yahoo.com', '085643169576', 'P'),
	(12, 'Shava Putri', 'Jakarta', 'shava.p@yahoo.com', '17239138127', 'P');

-- Dumping structure for table simperpus_vsga2024.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL DEFAULT '0',
  `tahun` year NOT NULL DEFAULT '2000',
  `pengarang` varchar(50) NOT NULL DEFAULT '0',
  `penerbit` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table simperpus_vsga2024.tb_buku: ~5 rows (approximately)
INSERT INTO `tb_buku` (`id`, `judul_buku`, `tahun`, `pengarang`, `penerbit`) VALUES
	(1, 'Get Started with Bootstrap', '2001', 'Bootstrap team', 'Bootstrap team'),
	(2, 'The Small Framework with Powerful Features', '2023', 'Codeigniter', 'Codeigniter Foundation'),
	(3, 'The PHP Framework for Web Artisans', '2020', 'Laravel', 'Laravel LLC.'),
	(9, 'History Of The World War, Sejarah Perang Dunia', '2020', 'Saut Pasaribu', 'Alexander Books'),
	(10, 'Nineteenth Century Questions Sejarah Dunia Abad Ke-19', '2022', 'James Freeman Clarke', 'Indoliterasi');

-- Dumping structure for table simperpus_vsga2024.tb_transaksi
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `buku_id` int DEFAULT NULL,
  `anggota_id` int DEFAULT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '1',
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_transaksi_tb_buku` (`buku_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table simperpus_vsga2024.tb_transaksi: ~5 rows (approximately)
INSERT INTO `tb_transaksi` (`id`, `buku_id`, `anggota_id`, `status`, `tgl_pinjam`, `tgl_kembali`) VALUES
	(1, 1, 1, '1', '2024-06-05', '2024-06-12'),
	(2, 3, 7, '1', '2024-06-05', '2024-06-11'),
	(3, 2, 12, '1', '2024-06-04', '2024-06-10'),
	(4, 1, 8, '2', '2024-05-31', '2024-06-05'),
	(5, 10, 12, '1', '2024-06-06', '2024-06-12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
