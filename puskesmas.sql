-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `image`) VALUES
(1,	'topek@gmail.com',	'4984f20f6bdf502f2090796f392cb157',	'topek ganteng',	'20190719012456nero.jpg'),
(6,	'aji@gmail.com',	'4984f20f6bdf502f2090796f392cb157',	'aji ganteng',	'20190719012943nero.jpg');

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `umur_pasien` varchar(255) NOT NULL,
  `id_ktp_pasien` varchar(255) NOT NULL,
  `sakit_pasien` varchar(255) NOT NULL,
  `rawat` enum('jalan','inap') NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_room` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `room` (`id_room`, `nomor_room`, `pasien_id`, `status`) VALUES
(1,	1,	0,	'0'),
(2,	2,	2,	'1'),
(3,	3,	0,	'0'),
(4,	4,	0,	'0');

-- 2019-07-19 21:58:15
