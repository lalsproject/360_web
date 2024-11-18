-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.24-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.5.0.6702
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_360.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_360.login: ~1 rows (lebih kurang)
DELETE FROM `login`;
INSERT INTO `login` (`id`, `username`, `password`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- membuang struktur untuk table db_360.tbl_galery
CREATE TABLE IF NOT EXISTS `tbl_galery` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `Regdate` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_360.tbl_galery: ~3 rows (lebih kurang)
DELETE FROM `tbl_galery`;
INSERT INTO `tbl_galery` (`id_foto`, `title`, `foto`, `Regdate`) VALUES
	(1, 'Gambar Pura 1', 'Foto-20052024-104727-admin-2415109.jpg', '2024-05-20 10:47:27'),
	(2, 'Gambar Pura 2', 'Foto-20052024-104743-admin-402233.jpg', '2024-05-20 10:47:43'),
	(3, 'Gambar Jalan Utama', 'Foto-20052024-104759-admin-265978.jpg', '2024-05-20 10:47:59');

-- membuang struktur untuk table db_360.tbl_hotspot
CREATE TABLE IF NOT EXISTS `tbl_hotspot` (
  `id_hotspot` int(11) NOT NULL AUTO_INCREMENT,
  `in` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `pitch` float NOT NULL,
  `yaw` float NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'scene',
  `title` varchar(50) NOT NULL DEFAULT 'scene',
  PRIMARY KEY (`id_hotspot`),
  KEY `FK__tbl_scane` (`to`),
  KEY `FK__tbl_scane_2` (`in`),
  CONSTRAINT `FK__tbl_scane` FOREIGN KEY (`to`) REFERENCES `tbl_scane` (`id_scane`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__tbl_scane_2` FOREIGN KEY (`in`) REFERENCES `tbl_scane` (`id_scane`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_360.tbl_hotspot: ~13 rows (lebih kurang)
DELETE FROM `tbl_hotspot`;
INSERT INTO `tbl_hotspot` (`id_hotspot`, `in`, `to`, `pitch`, `yaw`, `type`, `title`) VALUES
	(2, 1, 4, -2.1, 132.9, 'scene', 'CC1'),
	(3, 2, 1, -2.1, 132.9, 'scene', 'CC1'),
	(4, 3, 2, -2.1, 132.9, 'scene', 'CC4'),
	(5, 1, 3, -10.1, 132.9, 'scene', 'CC3'),
	(7, 3, 4, -3.96, -9.87, 'scene', 'Mall'),
	(8, 3, 2, 2.33, 132.4, 'scene', 'Jalan Luar'),
	(9, 4, 2, -0.7, 124.14, 'scene', 'Jalan Depan'),
	(10, 8, 9, -5.31, 46.82, 'scene', 'Office'),
	(11, 1, 8, -5, 86.15, 'scene', 'Gunung'),
	(12, 1, 4, 4.08, 21.62, 'scene', 'Mall'),
	(13, 11, 4, -9.61, 74.96, 'scene', 'Mall'),
	(14, 12, 11, -5.15, -138.08, 'scene', 'Pura 1'),
	(15, 11, 12, -0.19, 156.44, 'scene', 'Jalan Pura');

-- membuang struktur untuk table db_360.tbl_scane
CREATE TABLE IF NOT EXISTS `tbl_scane` (
  `id_scane` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `panorama` text NOT NULL,
  `first_scane` enum('Y','N') NOT NULL DEFAULT 'Y',
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_scane`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_360.tbl_scane: ~8 rows (lebih kurang)
DELETE FROM `tbl_scane`;
INSERT INTO `tbl_scane` (`id_scane`, `title`, `panorama`, `first_scane`, `regdate`) VALUES
	(1, 'Scene 1', 'alma.jpg', 'N', '2024-05-17 02:44:08'),
	(2, 'Scene 2', 'bma-1.jpg', 'N', '2024-05-17 02:45:39'),
	(3, 'Scene 3', 'bma-0.jpg', 'N', '2024-05-17 02:45:39'),
	(4, 'Mall', 'Foto-17052024-015358-admin-2607579.jpg', 'N', '2024-05-17 13:53:58'),
	(8, 'Gunung', 'Foto-17052024-085347-admin-9056583.jpg', 'N', '2024-05-17 20:53:47'),
	(9, 'Office', 'Foto-17052024-085456-admin-4618988.jpg', 'N', '2024-05-17 20:54:56'),
	(11, 'Pura 1', 'Foto-20052024-103818-admin-9962822.jpg', 'Y', '2024-05-20 10:38:18'),
	(12, 'Jalan Pura', 'Foto-20052024-104333-admin-4077449.jpg', 'N', '2024-05-20 10:43:33');

-- membuang struktur untuk view db_360.tbv_hotspot
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `tbv_hotspot` (
	`id_hotspot` INT(11) NOT NULL,
	`in` INT(11) NOT NULL,
	`title_in` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`to` INT(11) NOT NULL,
	`title_to` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`pitch` FLOAT NOT NULL,
	`yaw` FLOAT NOT NULL,
	`type` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`title` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view db_360.tbv_hotspot
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `tbv_hotspot`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `tbv_hotspot` AS SELECT 
a.id_hotspot,
a.`in`,
b.title AS title_in,
a.`to`,
c.title AS title_to,
a.pitch,
a.yaw,
a.`type`,
a.title
FROM tbl_hotspot a
LEFT JOIN tbl_scane b
ON a.`in` = b.id_scane
LEFT JOIN tbl_scane c
ON a.`to` = c.id_scane ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
