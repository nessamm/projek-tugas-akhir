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


-- Dumping database structure for ta_db
CREATE DATABASE IF NOT EXISTS `ta_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ta_db`;

-- Dumping structure for table ta_db.anggarand
CREATE TABLE IF NOT EXISTS `anggarand` (
  `seqno` int NOT NULL AUTO_INCREMENT,
  `notiket` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banyak` int DEFAULT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_satuan` decimal(15,2) DEFAULT NULL,
  `jumlah` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`seqno`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.anggarand: ~11 rows (approximately)
REPLACE INTO `anggarand` (`seqno`, `notiket`, `kategori`, `nama_barang`, `banyak`, `satuan`, `harga_satuan`, `jumlah`) VALUES
	(1, '0', 0, 'apa ya', 1, 'jam', 2000.00, 2000.00),
	(2, '0', 0, 'aaaaa', 1, 'minggu', 1111.00, 1111.00),
	(3, 'RAB260306', 0, 'aaaaa', 1, 'jam', 11111.00, 11111.00),
	(4, 'RAB260308', 0, 'trial hari senin', 4, '1', 20000.00, 80000.00),
	(5, 'RAB260311', 1, 'kiwww', 3, '1', 40000.00, 120000.00),
	(6, 'RAB260312', 1, 'heuuuu', 5, '1', 50000.00, 250000.00),
	(7, 'RAB260313', 1, 'buku', 10, '1', 2000.00, 20000.00),
	(8, 'RAB260314', 1, 'snddnsjndjsnfkjs', 500, '1', 300949.00, 150474500.00),
	(9, 'RAB260314', 1, 'sdsdsdsds', 3000, '1', 348899.00, 1046697000.00),
	(10, 'RAB260315', 1, 'selasa', 10000, '1', 3.00, 30000.00),
	(11, 'RAB260315', 1, 'rabu', 10000, '1', 1.00, 10000.00);

-- Dumping structure for table ta_db.anggaran_header
CREATE TABLE IF NOT EXISTS `anggaran_header` (
  `id` int NOT NULL AUTO_INCREMENT,
  `noticket` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `organisasi` int DEFAULT NULL,
  `total` decimal(15,2) DEFAULT '0.00',
  `userinput` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timeinput` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tiket` (`noticket`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.anggaran_header: ~15 rows (approximately)
REPLACE INTO `anggaran_header` (`id`, `noticket`, `judul`, `organisasi`, `total`, `userinput`, `timeinput`) VALUES
	(1, 'RAB260301', 'trialalalla', NULL, 0.00, NULL, '2026-03-10 08:48:01'),
	(2, 'RAB260302', 'apaluuu', NULL, 0.00, NULL, '2026-03-10 09:06:28'),
	(3, 'RAB260303', 'apa aja deh ya', NULL, 0.00, '11', '2026-03-10 09:07:59'),
	(4, 'RAB260304', 'coba trialll yaa', NULL, 0.00, '14', '2026-03-13 09:27:13'),
	(5, 'RAB260305', 'hmmm', NULL, 0.00, '14', '2026-03-13 09:37:20'),
	(6, 'RAB260306', 'aaaaa', NULL, 0.00, '14', '2026-03-13 09:40:44'),
	(7, 'RAB260307', 'anis senin', NULL, 0.00, '13', '2026-03-30 12:58:02'),
	(8, 'RAB260308', 'trial hari senin', NULL, 0.00, '13', '2026-03-30 13:19:01'),
	(9, 'RAB260309', 'hoooo', NULL, 0.00, '13', '2026-03-30 13:42:04'),
	(10, 'RAB260310', 'yooooii', 1, 0.00, '13', '2026-03-30 13:50:19'),
	(11, 'RAB260311', 'yoiiiii', 1, 0.00, '13', '2026-03-30 13:52:15'),
	(12, 'RAB260312', 'harus coba coba', 1, 0.00, '13', '2026-03-30 13:53:17'),
	(13, 'RAB260313', 'kegiatan sertijab', 1, 0.00, '17', '2026-03-30 14:10:17'),
	(14, 'RAB260314', 'hmmmm', 1, 0.00, '13', '2026-03-31 07:23:23'),
	(15, 'RAB260315', 'trial selasa', 1, 40000.00, '13', '2026-03-31 07:37:22');

-- Dumping structure for table ta_db.mskategori
CREATE TABLE IF NOT EXISTS `mskategori` (
  `code` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `timeinput` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.mskategori: ~1 rows (approximately)
REPLACE INTO `mskategori` (`code`, `name`, `description`, `timeinput`) VALUES
	(1, 'ktgr2', 'hayolo', '2026-03-27 08:32:35');

-- Dumping structure for table ta_db.mskelas
CREATE TABLE IF NOT EXISTS `mskelas` (
  `code` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `timeinput` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.mskelas: ~2 rows (approximately)
REPLACE INTO `mskelas` (`code`, `name`, `description`, `timeinput`) VALUES
	(1, 'xiii', 'sija', '2026-03-27 07:21:46'),
	(2, 'xi', 'yah', '2026-03-27 08:26:22');

-- Dumping structure for table ta_db.msorganisasi
CREATE TABLE IF NOT EXISTS `msorganisasi` (
  `code` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `timeinput` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.msorganisasi: ~1 rows (approximately)
REPLACE INTO `msorganisasi` (`code`, `name`, `description`, `timeinput`) VALUES
	(1, 'argapeta', 'panjat', '2026-03-27 08:29:32');

-- Dumping structure for table ta_db.mssatuan
CREATE TABLE IF NOT EXISTS `mssatuan` (
  `code` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `timeinput` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.mssatuan: ~1 rows (approximately)
REPLACE INTO `mssatuan` (`code`, `name`, `timeinput`) VALUES
	(1, '%', '2026-03-27 08:34:57');

-- Dumping structure for table ta_db.tregister_ta
CREATE TABLE IF NOT EXISTS `tregister_ta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ta_db.tregister_ta: ~12 rows (approximately)
REPLACE INTO `tregister_ta` (`id`, `fullname`, `username`, `email`, `gender`, `kelas`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(2, 'afwa', 'afwulll', 'afwa@gmail.com', 'L', NULL, '$2y$10$NtJZfZ.MHAWlA52whVsOkek4hQRP9WsgYH1.qeGVf/L', 2, '2026-03-02 06:40:31', '2026-03-02 06:40:31'),
	(3, 'SAAMM', 'NESS', 'samm@gmail.com', 'P', NULL, '$2y$10$RrWCZOe.yec5ZBl8Nk9JruI4EL.BXoFvYYfJw6zkgO6', 2, '2026-03-02 06:48:44', '2026-03-02 06:48:44'),
	(7, 'annissam', 'nnessam', 'anis@gmail.com', 'P', NULL, '$2y$10$EF/FarneUimkKKpvXhazger8lR1aJtK9GM5MuXN9v.D7Nh/kr9cAa', 1, '2026-03-03 02:32:06', '2026-03-03 02:32:06'),
	(8, 'Afwa Rifatika', 'afwaa', 'afwatikarifa@gmail.com', 'P', NULL, '$2y$10$.hXgVSYvBHP0H1l0DLjil.nYqOQEZmGjp409RwMflkABcK9FzX6xO', 2, '2026-03-03 03:48:58', '2026-03-03 03:48:58'),
	(9, 'dyah', 'dyah123', 'dyahayu@gmail.com', 'P', NULL, '$2y$10$aaL9jAeqyp2PWnKv7jTyQ.Vhywv7Ai/pHY5YZl/3ORVXYZkNXNLBu', 2, '2026-03-04 03:27:33', '2026-03-04 03:27:33'),
	(10, 'halo', 'halohaii', 'halohaii@gmaik.com', 'P', NULL, '$2y$10$3zdONMATzDsBmOo7PV6atugPXkcYMiLWBiLhDZpYFnaz5tTp11EcS', 2, '2026-03-04 03:36:45', '2026-03-04 03:36:45'),
	(11, 'sayaa ', 'sayaaa', 'saya@gmail.com', 'P', 'XII', '$2y$10$s1sIf.PsBcv/4zaatdPf.O86DUXMv91z6Yp4ncf2CI6Se6/zlSn7O', 1, '2026-03-04 03:39:19', '2026-03-10 00:49:27'),
	(12, 'apa hayoo', 'hayo apa', 'hayo@gmail.com', 'L', NULL, '$2y$10$Fj5DLjRTnNW8e0HhKAqcZuWX9ixDnNPmzixEk4gB8wbaECqq/t0AK', 2, '2026-03-04 03:53:17', '2026-03-04 03:53:17'),
	(13, 'anugerah', 'nnessam_174', 'anis11830@gmail.com', 'P', 'XI', '$2y$10$qzrKHy7FhZp3hVcSFrSbM.GtwGr5XUsbtmcjRbPns0uk1h/uHpX92', 2, '2026-03-06 03:21:21', '2026-03-06 05:40:42'),
	(14, 'trial regis', 'triges', 'triges@gmail.com', 'P', 'XII', '$2y$10$0Cccr4m3g.LZbRnwl17x/epR27m7.4z0PyymHHlLhkq9DadrE4Iw.', 2, '2026-03-10 00:54:22', '2026-03-10 00:54:22'),
	(15, 'anugerah', 'nessam', 'anis@gmail', 'P', NULL, '$2y$10$OwgLV3oHg.esDLWAdBmSyO5bgJrDKKiOj425vetLSSG8EbumC.3wm', 2, '2026-03-10 00:56:33', '2026-03-10 00:56:33'),
	(16, 'apayaa', 'yayayay', 'yayaya@gmial.com', 'L', 'XII', '$2y$10$wajG.n8Q.SL5QYDXwwa1nOwV8yqmnDi3bxeXtZSWwVnBmgYBu6w7O', 2, '2026-03-10 00:58:49', '2026-03-10 00:58:49'),
	(17, 'dyah ayu', 'ayudyah', 'ayu2@gmail.com', 'P', '1', '$2y$10$u381umU0fZq/fDNLZl.tXenqOli7/15BepfmGv6lzRg4DADtp.fYm', 2, '2026-03-30 07:02:01', '2026-03-30 07:02:01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
