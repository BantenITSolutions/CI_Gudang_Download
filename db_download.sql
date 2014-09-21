-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2012 at 02:57 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_download`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE IF NOT EXISTS `tbl_download` (
  `id_download` int(40) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(200) NOT NULL,
  `link_artikel` varchar(100) NOT NULL,
  `link_download` varchar(100) NOT NULL,
  `tgl_posting` varchar(50) NOT NULL,
  `hitung` int(20) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_download`
--

INSERT INTO `tbl_download` (`id_download`, `judul_artikel`, `link_artikel`, `link_download`, `tgl_posting`, `hitung`) VALUES
(1, 'Tutorial AI : Penerapan Algoritma K-Means Pada PHP (Studi Kasus Klasifikasi Nilai)', 'http://gedelumbung.com/?p=2085', 'http://www.4shared.com/file/nJswynHb/gede_lumbung_-_k-means.html ', '28-Apr-2012', 0),
(2, 'Tutorial Android : Membuat Kalkulator Biner-Desimal Sederhana di Android', 'http://gedelumbung.com/?p=2079', 'http://www.4shared.com/zip/LgVL9IlB/Gede_Lumbung_-_KalkulatorBiner.html ', '28-Apr-2012', 1),
(3, 'Tutorial Android : Contoh Aplikasi Sistem Informasi Akademik Berbasis Android', 'http://gedelumbung.com/?p=2074', 'http://www.4shared.com/zip/V-_qViI3/Gede_Lumbung_-_SIAKAD_Android.html ', '28-Apr-2012', 2),
(4, 'Tutorial CodeIgniter : Cara Konfigurasi CKEditor dan KCFinder di CodeIgniter', 'http://gedelumbung.com/?p=2071', 'http://www.4shared.com/zip/jHwUuDdb/Gede_Lumbung_-_Konfigurasi_CKE.html', '28-Apr-2012', 1),
(5, 'Tutorial Android : Cara Sederhana Parsing Data XML di Android', 'http://gedelumbung.com/?p=2053', 'http://www.4shared.com/zip/PaU_x4jY/Gede_Lumbung_-_ParsingXml.html', '28-Apr-2012', 2),
(6, 'Tutorial Android : Mengakses Data Dari Database MySQL di ListView Dengan JSON', 'http://gedelumbung.com/?p=2046', 'http://www.4shared.com/zip/GTm62_fQ/Gede_Lumbung_-_AksesServer.html', '28-Apr-2012', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `id_pengguna` int(50) NOT NULL AUTO_INCREMENT,
  `email_pengguna` varchar(100) NOT NULL,
  `stts` varchar(5) NOT NULL,
  `kunci` varchar(50) NOT NULL,
  `hit` int(30) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `email_pengguna`, `stts`, `kunci`, `hit`) VALUES
(1, 'asra_sebudi@yahoo.com', '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spr_admn`
--

CREATE TABLE IF NOT EXISTS `tbl_spr_admn` (
  `kode_spr_admn` int(10) NOT NULL AUTO_INCREMENT,
  `username_admn` varchar(50) NOT NULL,
  `pass_admn` varchar(100) NOT NULL,
  `nama_admn` varchar(100) NOT NULL,
  `stts` varchar(20) NOT NULL,
  `lvl` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_spr_admn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_spr_admn`
--

INSERT INTO `tbl_spr_admn` (`kode_spr_admn`, `username_admn`, `pass_admn`, `nama_admn`, `stts`, `lvl`, `email`, `alamat`, `tgl_lahir`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Gede Lumbung', '1', 'spradmn', 'gedelumbung@gmail.com', 'Denpasar - Bali', '4 Februari 1991');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
