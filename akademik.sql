-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for akademik
CREATE DATABASE IF NOT EXISTS `akademik` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `akademik`;

-- Dumping structure for table akademik.detail_kls
CREATE TABLE IF NOT EXISTS `detail_kls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_kls` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kls` (`id_kls`),
  KEY `id_mhs` (`id_mhs`),
  CONSTRAINT `detail_kls_ibfk_1` FOREIGN KEY (`id_kls`) REFERENCES `tbl_kls` (`id_kls`),
  CONSTRAINT `detail_kls_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs` (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=2241 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table akademik.detail_kls: ~11 rows (approximately)
/*!40000 ALTER TABLE `detail_kls` DISABLE KEYS */;
INSERT INTO `detail_kls` (`id`, `id_mhs`, `id_kls`) VALUES
	(2229, 15, 1),
	(2230, 17, 1),
	(2231, 18, 1),
	(2232, 19, 2),
	(2233, 20, 2),
	(2234, 21, 2),
	(2235, 22, 5),
	(2236, 23, 5),
	(2237, 24, 5),
	(2238, 25, 9),
	(2239, 26, 9),
	(2240, 27, 9);
/*!40000 ALTER TABLE `detail_kls` ENABLE KEYS */;

-- Dumping structure for table akademik.tbl_kls
CREATE TABLE IF NOT EXISTS `tbl_kls` (
  `id_kls` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kls` varchar(10) DEFAULT NULL,
  `nm_kls` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kls`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table akademik.tbl_kls: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_kls` DISABLE KEYS */;
INSERT INTO `tbl_kls` (`id_kls`, `kode_kls`, `nm_kls`) VALUES
	(1, '4anr1', '4A NonReg BJM'),
	(2, '4bnr1', '4B NonReg BJM'),
	(5, '4cnr1', '4C NonReg BJM'),
	(9, '4dnr1', '4D NonReg BJM');
/*!40000 ALTER TABLE `tbl_kls` ENABLE KEYS */;

-- Dumping structure for table akademik.tbl_mhs
CREATE TABLE IF NOT EXISTS `tbl_mhs` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mhs`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tbl_mhs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table akademik.tbl_mhs: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_mhs` DISABLE KEYS */;
INSERT INTO `tbl_mhs` (`id_mhs`, `id_user`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
	(15, 51, 'Widya Puspita', 'Banjarmasin', '2000-05-22', 'Jl. A.Yani No.221', '081340804276'),
	(17, 52, 'Arief Muhammad', 'Jakarta', '2000-01-02', 'Jl. Seroja No.95', '089675839108'),
	(18, 53, 'Rizky Kurniawan', 'PalangkaRaya', '2000-05-09', 'Jl. Tendean No.21', '08996906443'),
	(19, 54, 'Setiawan Fauzi', 'Kuala Kapuas', '1998-02-05', 'Jl. Jawa No. 209', '089523641376'),
	(20, 55, 'Diana Kartika', 'Marabahan', '1997-09-11', 'Jl. Patih Rumbih No.11', '083843069913'),
	(21, 56, 'Bagas Hermawan', 'Kotabaru', '2001-11-09', 'Jl. Pemurus No.87', '082118325367'),
	(22, 57, 'Adytia Permana', 'Banjarbaru', '2000-09-09', 'Jl. Sultan Adam No.99', '08975532756'),
	(23, 58, 'Zepry Setiawan', 'Bandung', '1998-09-12', 'Jl. Melati No.25', '085776422447'),
	(24, 59, 'Gilang Ramadhan', 'Sampit', '1999-04-01', 'Jl. Jepang No.77', '087820017410'),
	(25, 60, 'Bella Puspita', 'Malang', '1997-07-04', 'Jl. S Parman No.6', '089694860041'),
	(26, 61, 'Angga Kurnia', 'Semarang', '1999-01-07', 'Jl. Antasari No.99', '082322225678'),
	(27, 62, 'Bayu Arvinza', 'Yogyakarta', '2000-11-01', 'Jl. Aghatis No.67', '082337830730');
/*!40000 ALTER TABLE `tbl_mhs` ENABLE KEYS */;

-- Dumping structure for table akademik.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `level` enum('admin','mahasiswa') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table akademik.tbl_user: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `foto`, `level`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin.jpg', 'admin'),
	(51, 'widya', '9146bfc09df862ee46fa9b512c72f9a6', '1.jpg', 'mahasiswa'),
	(52, 'arief', '2fab7eefb328d669c8dde67a91528eb9', '2.jpg', 'mahasiswa'),
	(53, 'rizky', '49d8712dd6ac9c3745d53cd4be48284c', '3.jpg', 'mahasiswa'),
	(54, 'setiawan', '41591fa3a697604be431ef66b5f53572', '4.jpg', 'mahasiswa'),
	(55, 'diana', '3a23bb515e06d0e944ff916e79a7775c', '5.jpg', 'mahasiswa'),
	(56, 'bagas', 'ee776a18253721efe8a62e4abd29dc47', '6.jpg', 'mahasiswa'),
	(57, 'adytia', 'd623c24d384c3448c96765af24247f99', '7.jpg', 'mahasiswa'),
	(58, 'zepry', '6022d248a2dd3012e99df464f37a6da8', '8.jpg', 'mahasiswa'),
	(59, 'gilang', 'c37fddfb7b3f538674c6e9a77e7bf486', '9.jpg', 'mahasiswa'),
	(60, 'bella', 'e7e9ec3723447a642f762b2b6a15cfd7', '10.jpg', 'mahasiswa'),
	(61, 'angga', '8479c86c7afcb56631104f5ce5d6de62', '11.jpg', 'mahasiswa'),
	(62, 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', '12.jpg', 'mahasiswa');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
