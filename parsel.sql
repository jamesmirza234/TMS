-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2014 at 09:04 AM
-- Server version: 5.5.23
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_service`
--

CREATE TABLE IF NOT EXISTS `additional_service` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Harga` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `additional_service`
--

INSERT INTO `additional_service` (`ID`, `Nama`, `Harga`) VALUES
(1, 'Packing', 100000),
(2, 'Loading', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `Last` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`Last`) VALUES
(10037);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyCustomer` bigint(20) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Panjang` int(11) DEFAULT NULL,
  `Lebar` int(11) DEFAULT NULL,
  `Tinggi` int(11) DEFAULT NULL,
  `Berat` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `keyCustomer`, `Nama`, `Panjang`, `Lebar`, `Tinggi`, `Berat`) VALUES
(1, 1, 'CUSTOMER GOODS', 100, 50, 50, 300),
(2, 1, 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(5, 2, 'BUKU', 25, 10, 1, 1),
(6, 1, 'Notebook', 10, 15, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(100) DEFAULT NULL,
  `Provinsi` varchar(100) DEFAULT NULL,
  `Negara` varchar(100) DEFAULT NULL,
  `ZIP` varchar(6) DEFAULT NULL,
  `Kontak` varchar(50) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `Nama`, `Alamat`, `Kota`, `Provinsi`, `Negara`, `ZIP`, `Kontak`, `Telpon`, `Email`) VALUES
(1, 'PT. JUJUR UTAMA', 'Jl. Pembangunan III No 81', 'Tangerang', 'Banten', 'Indonesia', '15129', NULL, '(62-21) 557-34617', 'info@jumatransport.com'),
(2, 'PT. Tiga Permata Ekspress', 'Jl. Raya Waru KM 15', 'Sidoarjo', 'Jawa Timur', 'INDONESIA', '61256', NULL, '(62-31) 853-3130', 'info@3pe.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyCustomer` bigint(20) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Perusahaan` varchar(100) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(50) DEFAULT NULL,
  `Provinsi` varchar(50) DEFAULT NULL,
  `Negara` varchar(50) DEFAULT NULL,
  `ZIP` varchar(6) DEFAULT NULL,
  `Kontak` varchar(50) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `keyCustomer`, `Nama`, `Perusahaan`, `Alamat`, `Kota`, `Provinsi`, `Negara`, `ZIP`, `Kontak`, `Telpon`, `Email`) VALUES
(3, 1, 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com'),
(4, 2, 'imslogistik2', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Wiwin', '083276389823', 'wiwin@imslogistics.com'),
(5, 1, 'imslogistics3', 'PT. IMS Logistik', 'Mampang', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', '-', 'wawan', '0217564828', 'wawan@imslogistics.com'),
(7, 1, 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com'),
(8, 1, 'Perumnas', 'Perumnas1', 'Perumnas', 'Tangerang', 'Banten', 'Indonesia', '-', 'halo', '0874676329', 'test@permunas.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE IF NOT EXISTS `container` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Transport` bigint(20) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Fix` bit(1) DEFAULT NULL,
  `Panjang` int(11) DEFAULT NULL,
  `Lebar` int(11) DEFAULT NULL,
  `Tinggi` int(11) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`ID`, `Transport`, `Nama`, `Fix`, `Panjang`, `Lebar`, `Tinggi`, `Latitude`, `Longitude`, `Accuracy`, `Modified_By`, `Modified_Date`) VALUES
(1, 1, 'ZB1234ABC', b'1', 500, 350, 200, -6.1946638, 106.633992, 25, NULL, NULL),
(2, 1, 'XXX001', b'0', 300, 350, 200, -6.1946638, 106.633992, 25, NULL, NULL),
(5, 2, 'ZB3805NUM', b'1', 500, 350, 200, -6.1946638, 106.633992, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(100) DEFAULT NULL,
  `Provinsi` varchar(100) DEFAULT NULL,
  `Negara` varchar(100) DEFAULT NULL,
  `ZIP` varchar(6) DEFAULT NULL,
  `Kontak` varchar(50) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Nama`, `Alamat`, `Kota`, `Provinsi`, `Negara`, `ZIP`, `Kontak`, `Telpon`, `Email`) VALUES
(1, 'PT. Gudang Garam', 'Jl. Soekarno Hatta', 'Kediri', 'Jawa Timur', 'Indonesia', 'ZIP', 'Kontak Info', '-', 'info@gudanggaram.com'),
(2, 'Nama 01', ' Alamat 01', ' Kota 01', ' Provinsi 01', ' Negara 01', ' ZIP01', 'Kontak Info', ' Telpon 01', ' Email 01'),
(3, 'Nama 02', ' Alamat 02', ' Kota 02', ' Provinsi 02', ' Negara 02', ' ZIP02', 'Kontak Info', ' Telpon 02', ' Email 02'),
(4, 'Nama 03', ' Alamat 03', ' Kota 03', ' Provinsi 03', ' Negara 03', ' ZIP03', 'Kontak Info', ' Telpon 03', ' Email 03'),
(5, 'Nama 04', ' Alamat 04', ' Kota 04', ' Provinsi 04', ' Negara 04', ' ZIP04', 'Kontak Info', ' Telpon 04', ' Email 04'),
(6, 'Nama 05', ' Alamat 05', ' Kota 05', ' Provinsi 05', ' Negara 05', ' ZIP05', 'Kontak Info', ' Telpon 05', ' Email 05'),
(7, 'Nama 06', ' Alamat 06', ' Kota 06', ' Provinsi 06', ' Negara 06', ' ZIP06', 'Kontak Info', ' Telpon 06', ' Email 06'),
(8, 'Nama 07', ' Alamat 07', ' Kota 07', ' Provinsi 07', ' Negara 07', ' ZIP07', 'Kontak Info', ' Telpon 07', ' Email 07'),
(9, 'Nama 08', ' Alamat 08', ' Kota 08', ' Provinsi 08', ' Negara 08', ' ZIP08', 'Kontak Info', ' Telpon 08', ' Email 08'),
(10, 'Nama 09', ' Alamat 09', ' Kota 09', ' Provinsi 09', ' Negara 09', ' ZIP09', 'Kontak Info', ' Telpon 09', ' Email 09'),
(11, 'Nama 10', ' Alamat 10', ' Kota 10', ' Provinsi 10', ' Negara 10', ' ZIP10', 'Kontak Info', ' Telpon 10', ' Email 10'),
(12, 'Nama 11', ' Alamat 11', ' Kota 11', ' Provinsi 11', ' Negara 11', ' ZIP11', 'Kontak Info', ' Telpon 11', ' Email 11'),
(13, 'Nama 12', ' Alamat 12', ' Kota 12', ' Provinsi 12', ' Negara 12', ' ZIP12', 'Kontak Info', ' Telpon 12', ' Email 12'),
(14, 'Nama 13', ' Alamat 13', ' Kota 13', ' Provinsi 13', ' Negara 13', ' ZIP13', 'Kontak Info', ' Telpon 13', ' Email 13'),
(15, 'Nama 14', ' Alamat 14', ' Kota 14', ' Provinsi 14', ' Negara 14', ' ZIP14', 'Kontak Info', ' Telpon 14', ' Email 14'),
(16, 'Nama 15', ' Alamat 15', ' Kota 15', ' Provinsi 15', ' Negara 15', ' ZIP15', 'Kontak Info', ' Telpon 15', ' Email 15'),
(17, 'Nama 16', ' Alamat 16', ' Kota 16', ' Provinsi 16', ' Negara 16', ' ZIP16', 'Kontak Info', ' Telpon 16', ' Email 16'),
(18, 'Nama 17', ' Alamat 17', ' Kota 17', ' Provinsi 17', ' Negara 17', ' ZIP17', 'Kontak Info', ' Telpon 17', ' Email 17'),
(19, 'Nama 18', ' Alamat 18', ' Kota 18', ' Provinsi 18', ' Negara 18', ' ZIP18', 'Kontak Info', ' Telpon 18', ' Email 18'),
(20, 'Nama 19', ' Alamat 19', ' Kota 19', ' Provinsi 19', ' Negara 19', ' ZIP19', 'Kontak Info', ' Telpon 19', ' Email 19'),
(21, 'Nama 20', ' Alamat 20', ' Kota 20', ' Provinsi 20', ' Negara 20', ' ZIP20', 'Kontak Info', ' Telpon 20', ' Email 20'),
(22, 'Nama 21', ' Alamat 21', ' Kota 21', ' Provinsi 21', ' Negara 21', ' ZIP21', 'Kontak Info', ' Telpon 21', ' Email 21'),
(23, 'Nama 22', ' Alamat 22', ' Kota 22', ' Provinsi 22', ' Negara 22', ' ZIP22', 'Kontak Info', ' Telpon 22', ' Email 22'),
(24, 'Nama 23', ' Alamat 23', ' Kota 23', ' Provinsi 23', ' Negara 23', ' ZIP23', 'Kontak Info', ' Telpon 23', ' Email 23'),
(25, 'Nama 24', ' Alamat 24', ' Kota 24', ' Provinsi 24', ' Negara 24', ' ZIP24', 'Kontak Info', ' Telpon 24', ' Email 24'),
(26, 'Nama 25', ' Alamat 25', ' Kota 25', ' Provinsi 25', ' Negara 25', ' ZIP25', 'Kontak Info', ' Telpon 25', ' Email 25'),
(28, 'Nama 27', ' Alamat 27', ' Kota 27', ' Provinsi 27', ' Negara 27', ' ZIP27', 'Kontak Info', ' Telpon 27', ' Email 27'),
(29, 'Nama 28', ' Alamat 28', ' Kota 28', ' Provinsi 28', ' Negara 28', ' ZIP28', 'Kontak Info', ' Telpon 28', ' Email 28'),
(30, 'Nama 29', ' Alamat 29', 'Tangerang', ' Provinsi 29', 'Indonesia', ' ZIP29', 'Kontak Info', ' Telpon 29', ' Email 29'),
(32, 'Reinstar', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Ade', '082177404407', 'ade@gmail.com'),
(33, 'Reina', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '15561', 'Reina', '0888387429018', 'reina@talaga.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice`
--

CREATE TABLE IF NOT EXISTS `detail_invoice` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Invoice` bigint(20) DEFAULT NULL,
  `Tambahan` varchar(50) DEFAULT NULL,
  `Harga` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Pertanyaan` varchar(2000) DEFAULT NULL,
  `Jawaban` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `Pertanyaan`, `Jawaban`) VALUES
(2, 'Bagaimana cara login?', 'Input username dan password dengan benar');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Shipment` varchar(11) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Lokasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Shipment` bigint(20) DEFAULT NULL,
  `Invoice_No` varchar(10) DEFAULT NULL,
  `Asal` varchar(50) DEFAULT NULL,
  `Tujuan` varchar(50) DEFAULT NULL,
  `Koli` int(11) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Service` varchar(50) DEFAULT NULL,
  `UOM` varchar(50) DEFAULT NULL,
  `Harga` bigint(20) DEFAULT NULL,
  `Pajak` int(11) DEFAULT NULL,
  `Pajak_Persen` int(11) DEFAULT NULL,
  `Total` bigint(20) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TOP` bigint(20) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Action` varchar(100) DEFAULT NULL,
  `Sequence` int(11) DEFAULT NULL,
  `Active` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Shipment` bigint(20) DEFAULT NULL,
  `Container` bigint(20) DEFAULT NULL,
  `Paket_No` varchar(6) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Panjang` int(11) DEFAULT NULL,
  `Lebar` int(11) DEFAULT NULL,
  `Tinggi` int(11) DEFAULT NULL,
  `Berat` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`ID`, `Shipment`, `Container`, `Paket_No`, `Nama`, `Panjang`, `Lebar`, `Tinggi`, `Berat`) VALUES
(1, 12, 1, '00000', 'CUSTOMER GOODS', 100, 50, 50, 300),
(2, 12, 1, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(3, 12, 1, '00002', 'CUSTOMER GOODS', 100, 50, 50, 300),
(4, 12, 1, '00003', 'CUSTOMER GOODS', 100, 50, 50, 300),
(5, 12, 1, '00004', 'CUSTOMER GOODS', 100, 50, 50, 300),
(6, 13, 2, '00000', 'CUSTOMER GOODS', 100, 50, 50, 300),
(7, 13, 2, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(8, 13, 2, '00002', 'CUSTOMER GOODS', 100, 50, 50, 300),
(9, 13, 2, '00003', 'CUSTOMER GOODS', 100, 50, 50, 300),
(10, 13, 2, '00004', 'CUSTOMER GOODS', 100, 50, 50, 300),
(11, 13, 2, '00005', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(12, 13, 2, '00006', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(13, 13, 2, '00007', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(14, 13, 2, '00008', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(15, 13, 2, '00009', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(16, 13, 2, '00010', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(17, 13, 2, '00011', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(18, 14, NULL, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(19, 14, NULL, '00002', 'CUSTOMER GOODS', 100, 50, 50, 300),
(20, 14, NULL, '00003', 'CUSTOMER GOODS', 100, 50, 50, 300),
(21, 14, NULL, '00004', 'CUSTOMER GOODS', 100, 50, 50, 300),
(22, 14, NULL, '00005', 'CUSTOMER GOODS', 100, 50, 50, 300),
(23, 14, NULL, '00006', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(24, 14, NULL, '00007', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(25, 14, NULL, '00008', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(26, 14, NULL, '00009', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(27, 14, NULL, '00010', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(28, 14, NULL, '00011', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(29, 14, NULL, '00012', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(30, 15, NULL, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(31, 15, NULL, '00002', 'CUSTOMER GOODS', 100, 50, 50, 300),
(32, 15, NULL, '00003', 'CUSTOMER GOODS', 100, 50, 50, 300),
(33, 16, NULL, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(34, 16, NULL, '00002', 'CUSTOMER GOODS', 100, 50, 50, 300),
(35, 16, NULL, '00003', 'CUSTOMER GOODS', 100, 50, 50, 300),
(36, 17, 1, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(37, 18, NULL, '00001', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(38, 19, NULL, '00001', 'CUSTOMER GOODS', 100, 50, 50, 300),
(39, 20, 1, '00001', 'BUKU', 25, 10, 1, 1),
(40, 20, 1, '00002', 'BUKU', 25, 10, 1, 1),
(41, 20, 1, '00003', 'BUKU', 25, 10, 1, 1),
(42, 20, 1, '00004', 'BUKU', 25, 10, 1, 1),
(43, 20, 1, '00005', 'BUKU', 25, 10, 1, 1),
(44, 20, 1, '00006', 'BUKU', 25, 10, 1, 1),
(45, 20, 1, '00007', 'BUKU', 25, 10, 1, 1),
(46, 20, 1, '00008', 'BUKU', 25, 10, 1, 1),
(47, 20, 1, '00009', 'BUKU', 25, 10, 1, 1),
(48, 20, 1, '00010', 'BUKU', 25, 10, 1, 1),
(49, 20, 1, '00011', 'BUKU', 25, 10, 1, 1),
(50, 20, 1, '00012', 'BUKU', 25, 10, 1, 1),
(51, 20, 1, '00013', 'BUKU', 25, 10, 1, 1),
(52, 20, 1, '00014', 'BUKU', 25, 10, 1, 1),
(53, 20, 1, '00015', 'BUKU', 25, 10, 1, 1),
(54, 20, 1, '00016', 'BUKU', 25, 10, 1, 1),
(55, 20, 1, '00017', 'BUKU', 25, 10, 1, 1),
(56, 20, 1, '00018', 'BUKU', 25, 10, 1, 1),
(57, 20, 1, '00019', 'BUKU', 25, 10, 1, 1),
(58, 20, 1, '00020', 'BUKU', 25, 10, 1, 1),
(59, 20, 1, '00021', 'BUKU', 25, 10, 1, 1),
(60, 20, 1, '00022', 'BUKU', 25, 10, 1, 1),
(61, 20, 1, '00023', 'BUKU', 25, 10, 1, 1),
(62, 20, 1, '00024', 'BUKU', 25, 10, 1, 1),
(63, 20, 1, '00025', 'BUKU', 25, 10, 1, 1),
(64, 20, 1, '00026', 'BUKU', 25, 10, 1, 1),
(65, 20, 1, '00027', 'BUKU', 25, 10, 1, 1),
(66, 20, 1, '00028', 'BUKU', 25, 10, 1, 1),
(67, 20, 1, '00029', 'BUKU', 25, 10, 1, 1),
(68, 20, 1, '00030', 'BUKU', 25, 10, 1, 1),
(69, 21, 1, '00001', 'BUKU', 25, 10, 1, 1),
(70, 21, 1, '00002', 'BUKU', 25, 10, 1, 1),
(71, 21, 1, '00003', 'BUKU', 25, 10, 1, 1),
(72, 21, 1, '00004', 'BUKU', 25, 10, 1, 1),
(73, 21, 1, '00005', 'BUKU', 25, 10, 1, 1),
(74, 21, 1, '00006', 'BUKU', 25, 10, 1, 1),
(75, 21, 1, '00007', 'BUKU', 25, 10, 1, 1),
(76, 21, 1, '00008', 'BUKU', 25, 10, 1, 1),
(77, 21, 1, '00009', 'BUKU', 25, 10, 1, 1),
(78, 21, 1, '00010', 'BUKU', 25, 10, 1, 1),
(79, 21, 1, '00011', 'BUKU', 25, 10, 1, 1),
(80, 21, 1, '00012', 'BUKU', 25, 10, 1, 1),
(81, 21, 1, '00013', 'BUKU', 25, 10, 1, 1),
(82, 21, 1, '00014', 'BUKU', 25, 10, 1, 1),
(83, 21, 1, '00015', 'BUKU', 25, 10, 1, 1),
(84, 21, 1, '00016', 'BUKU', 25, 10, 1, 1),
(85, 21, 1, '00017', 'BUKU', 25, 10, 1, 1),
(86, 21, 1, '00018', 'BUKU', 25, 10, 1, 1),
(87, 21, 1, '00019', 'BUKU', 25, 10, 1, 1),
(88, 21, 1, '00020', 'BUKU', 25, 10, 1, 1),
(89, 21, 1, '00021', 'BUKU', 25, 10, 1, 1),
(90, 21, 1, '00022', 'BUKU', 25, 10, 1, 1),
(91, 21, 1, '00023', 'BUKU', 25, 10, 1, 1),
(92, 21, 1, '00024', 'BUKU', 25, 10, 1, 1),
(93, 21, 1, '00025', 'BUKU', 25, 10, 1, 1),
(94, 21, 1, '00026', 'BUKU', 25, 10, 1, 1),
(95, 21, 1, '00027', 'BUKU', 25, 10, 1, 1),
(96, 21, 1, '00028', 'BUKU', 25, 10, 1, 1),
(97, 21, 1, '00029', 'BUKU', 25, 10, 1, 1),
(98, 21, 1, '00030', 'BUKU', 25, 10, 1, 1),
(99, 21, 1, '00031', 'BUKU', 25, 10, 1, 1),
(100, 21, 1, '00032', 'BUKU', 25, 10, 1, 1),
(101, 21, 1, '00033', 'BUKU', 25, 10, 1, 1),
(102, 21, 1, '00034', 'BUKU', 25, 10, 1, 1),
(103, 21, 1, '00035', 'BUKU', 25, 10, 1, 1),
(104, 21, 1, '00036', 'BUKU', 25, 10, 1, 1),
(105, 21, 1, '00037', 'BUKU', 25, 10, 1, 1),
(106, 21, 1, '00038', 'BUKU', 25, 10, 1, 1),
(107, 21, 1, '00039', 'BUKU', 25, 10, 1, 1),
(108, 21, 1, '00040', 'BUKU', 25, 10, 1, 1),
(109, 21, 1, '00041', 'BUKU', 25, 10, 1, 1),
(110, 21, 1, '00042', 'BUKU', 25, 10, 1, 1),
(111, 21, 1, '00043', 'BUKU', 25, 10, 1, 1),
(112, 21, 1, '00044', 'BUKU', 25, 10, 1, 1),
(113, 21, 1, '00045', 'BUKU', 25, 10, 1, 1),
(114, 21, 1, '00046', 'BUKU', 25, 10, 1, 1),
(115, 21, 1, '00047', 'BUKU', 25, 10, 1, 1),
(116, 21, 1, '00048', 'BUKU', 25, 10, 1, 1),
(117, 21, 1, '00049', 'BUKU', 25, 10, 1, 1),
(118, 21, 1, '00050', 'BUKU', 25, 10, 1, 1),
(119, 21, 1, '00051', 'BUKU', 25, 10, 1, 1),
(120, 21, 1, '00052', 'BUKU', 25, 10, 1, 1),
(121, 21, 1, '00053', 'BUKU', 25, 10, 1, 1),
(122, 21, 1, '00054', 'BUKU', 25, 10, 1, 1),
(123, 21, 1, '00055', 'BUKU', 25, 10, 1, 1),
(124, 21, 1, '00056', 'BUKU', 25, 10, 1, 1),
(125, 21, 1, '00057', 'BUKU', 25, 10, 1, 1),
(126, 21, 1, '00058', 'BUKU', 25, 10, 1, 1),
(127, 21, 1, '00059', 'BUKU', 25, 10, 1, 1),
(128, 21, 1, '00060', 'BUKU', 25, 10, 1, 1),
(129, 21, 1, '00061', 'BUKU', 25, 10, 1, 1),
(130, 21, 1, '00062', 'BUKU', 25, 10, 1, 1),
(131, 21, 1, '00063', 'BUKU', 25, 10, 1, 1),
(132, 21, 1, '00064', 'BUKU', 25, 10, 1, 1),
(133, 21, 1, '00065', 'BUKU', 25, 10, 1, 1),
(134, 23, NULL, '00001', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(135, 23, NULL, '00002', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(136, 23, NULL, '00003', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(137, 23, NULL, '00004', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(138, 23, NULL, '00005', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(139, 23, NULL, '00006', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(140, 23, NULL, '00007', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(141, 23, NULL, '00008', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(142, 23, NULL, '00009', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(143, 23, NULL, '00010', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(144, 23, NULL, '00011', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(145, 23, NULL, '00012', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(146, 23, NULL, '00013', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(147, 23, NULL, '00014', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(148, 23, NULL, '00015', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(149, 23, NULL, '00016', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(150, 23, NULL, '00017', 'CUSTOMER CHEMICAL', 100, 125, 30, 25),
(151, 24, NULL, '00001', 'Notebook', 10, 15, 2, 3),
(152, 24, NULL, '00002', 'Notebook', 10, 15, 2, 3),
(153, 24, NULL, '00003', 'Notebook', 10, 15, 2, 3),
(154, 25, NULL, '00001', 'Notebook', 10, 15, 2, 3),
(155, 25, NULL, '00002', 'Notebook', 10, 15, 2, 3),
(156, 25, NULL, '00003', 'Notebook', 10, 15, 2, 3),
(157, 25, NULL, '00004', 'Notebook', 10, 15, 2, 3),
(158, 25, NULL, '00005', 'Notebook', 10, 15, 2, 3),
(159, 25, NULL, '00006', 'Notebook', 10, 15, 2, 3),
(160, 25, NULL, '00007', 'Notebook', 10, 15, 2, 3),
(161, 25, NULL, '00008', 'Notebook', 10, 15, 2, 3),
(162, 25, NULL, '00009', 'Notebook', 10, 15, 2, 3),
(163, 25, NULL, '00010', 'Notebook', 10, 15, 2, 3),
(164, 25, NULL, '00011', 'CUSTOMER GOODS', 100, 50, 50, 300),
(165, 25, NULL, '00012', 'CUSTOMER GOODS', 100, 50, 50, 300),
(166, 25, NULL, '00013', 'CUSTOMER GOODS', 100, 50, 50, 300),
(167, 25, NULL, '00014', 'CUSTOMER GOODS', 100, 50, 50, 300),
(168, 25, NULL, '00015', 'CUSTOMER GOODS', 100, 50, 50, 300),
(169, 26, NULL, '00001', 'Notebook', 10, 15, 2, 3),
(170, 26, NULL, '00002', 'Notebook', 10, 15, 2, 3),
(171, 26, NULL, '00003', 'Notebook', 10, 15, 2, 3),
(172, 26, NULL, '00004', 'Notebook', 10, 15, 2, 3),
(173, 26, NULL, '00005', 'Notebook', 10, 15, 2, 3),
(174, 26, NULL, '00006', 'Notebook', 10, 15, 2, 3),
(175, 26, NULL, '00007', 'Notebook', 10, 15, 2, 3),
(176, 26, NULL, '00008', 'Notebook', 10, 15, 2, 3),
(177, 26, NULL, '00009', 'Notebook', 10, 15, 2, 3),
(178, 26, NULL, '00010', 'Notebook', 10, 15, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pod`
--

CREATE TABLE IF NOT EXISTS `pod` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Shipment` varchar(11) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `IMEI` varchar(20) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Kategori` varchar(10) DEFAULT NULL,
  `Gambar1` varchar(100) DEFAULT NULL,
  `Gambar2` varchar(100) DEFAULT NULL,
  `Gambar3` varchar(100) DEFAULT NULL,
  `Penerima` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pop`
--

CREATE TABLE IF NOT EXISTS `pop` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Shipment` varchar(11) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `IMEI` varchar(20) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Kategori` varchar(10) DEFAULT NULL,
  `Gambar1` varchar(100) DEFAULT NULL,
  `Gambar2` varchar(100) DEFAULT NULL,
  `Gambar3` varchar(100) DEFAULT NULL,
  `Penerima` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Asal` varchar(50) DEFAULT NULL,
  `Tujuan` varchar(50) DEFAULT NULL,
  `Service` varchar(50) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Harga` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`ID`, `Asal`, `Tujuan`, `Service`, `Satuan`, `Harga`) VALUES
(1, 'Jakarta', 'Bandung', 'Regular', 'pcs', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`ID`, `Nama`) VALUES
(1, 'pcs'),
(2, 'box');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID`, `Nama`) VALUES
(2, 'Over Night'),
(3, 'Same Day'),
(5, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyCustomer` bigint(20) DEFAULT NULL,
  `Shipment_No` varchar(11) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Lokasi` varchar(255) DEFAULT NULL,
  `Status` bigint(50) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Catatan` varchar(100) DEFAULT NULL,
  `Dari` varchar(50) DEFAULT NULL,
  `Dari_Perusahaan` varchar(100) DEFAULT NULL,
  `Dari_Alamat` varchar(255) DEFAULT NULL,
  `Dari_Kota` varchar(50) DEFAULT NULL,
  `Dari_Provinsi` varchar(50) DEFAULT NULL,
  `Dari_Negara` varchar(50) DEFAULT NULL,
  `Dari_ZIP` varchar(6) DEFAULT NULL,
  `Dari_Kontak` varchar(50) DEFAULT NULL,
  `Dari_Telpon` varchar(20) DEFAULT NULL,
  `Dari_Email` varchar(100) DEFAULT NULL,
  `Untuk` varchar(50) DEFAULT NULL,
  `Untuk_Perusahaan` varchar(100) DEFAULT NULL,
  `Untuk_Alamat` varchar(255) DEFAULT NULL,
  `Untuk_Kota` varchar(50) DEFAULT NULL,
  `Untuk_Provinsi` varchar(50) DEFAULT NULL,
  `Untuk_Negara` varchar(50) DEFAULT NULL,
  `Untuk_ZIP` varchar(6) DEFAULT NULL,
  `Untuk_Kontak` varchar(50) DEFAULT NULL,
  `Untuk_Telpon` varchar(20) DEFAULT NULL,
  `Untuk_Email` varchar(100) DEFAULT NULL,
  `Service` bigint(50) DEFAULT NULL,
  `Collie` int(11) DEFAULT NULL,
  `AW` int(11) DEFAULT NULL,
  `VW` int(11) DEFAULT NULL,
  `CW` int(11) DEFAULT NULL,
  `V` int(11) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`ID`, `keyCustomer`, `Shipment_No`, `Tanggal`, `Lokasi`, `Status`, `Keterangan`, `Catatan`, `Dari`, `Dari_Perusahaan`, `Dari_Alamat`, `Dari_Kota`, `Dari_Provinsi`, `Dari_Negara`, `Dari_ZIP`, `Dari_Kontak`, `Dari_Telpon`, `Dari_Email`, `Untuk`, `Untuk_Perusahaan`, `Untuk_Alamat`, `Untuk_Kota`, `Untuk_Provinsi`, `Untuk_Negara`, `Untuk_ZIP`, `Untuk_Kontak`, `Untuk_Telpon`, `Untuk_Email`, `Service`, `Collie`, `AW`, `VW`, `CW`, `V`, `Modified_By`, `Modified_Date`) VALUES
(1, NULL, 'JO14L030012', '2014-12-03', NULL, 3, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 0, 0, 0, 0, 0, NULL, NULL),
(2, NULL, 'JO14L030013', '2014-12-03', NULL, 2, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 2, 2, 2, 2, 500, NULL, NULL),
(3, NULL, 'JO14L030014', '2014-12-03', NULL, 3, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(4, NULL, 'JO14L030015', '2014-12-03', NULL, 3, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(5, NULL, 'JO14L030016', '2014-12-03', NULL, 3, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(6, NULL, 'JO14L030017', '2014-12-03', NULL, 2, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(7, NULL, 'JO14L030018', '2014-12-03', NULL, 2, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(8, NULL, 'JO14L030019', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(9, NULL, 'JO14L030020', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(10, NULL, 'JO14L030021', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(11, NULL, 'JO14L030022', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(12, NULL, 'JO14L030023', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 5, 1500, 210, 1500, 1250000, NULL, NULL),
(13, NULL, 'JO14L030024', '2014-12-03', NULL, 4, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 12, 1675, 651, 1941, 3875000, NULL, NULL),
(14, NULL, 'JO14L030025', '2014-12-03', NULL, 3, 'Description Create Shipment', 'Note Create Shipment', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 2, 12, 1675, 651, 1941, 3875000, NULL, NULL),
(15, NULL, 'JO14L030026', '2014-12-03', NULL, 3, 'Description', 'Note', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 3, 900, 126, 900, 750000, NULL, NULL),
(16, NULL, 'JO14L030027', '2014-12-03', NULL, 3, 'Description', 'Note', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 3, 900, 126, 900, 750000, NULL, NULL),
(17, NULL, 'JO14L030028', '2014-12-03', NULL, 1, 'Pengiriman paket', 'Note done', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 'imslogistics3', 'PT. IMS Logistik', 'Mampang', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', '-', 'wiwin', '0217564828', 'wiwin@imslogistics.com', 5, 1, 300, 42, 300, 250000, NULL, NULL),
(18, NULL, 'JO14L030029', '2014-12-03', NULL, 2, 'Descr', 'Note', 'imslogistik2', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Wiwin', '083276389823', 'wiwin@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 1, 25, 63, 63, 375000, NULL, NULL),
(19, 1, 'JO14L030030', '2014-12-03', NULL, 3, 'Desc', 'Note', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 1, 300, 42, 300, 250000, NULL, NULL),
(20, 2, 'JO14L030031', '2014-12-03', NULL, 4, 'Descr Test', 'Note 3', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 'imslogistik2', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Wiwin', '083276389823', 'wiwin@imslogistics.com', 5, 30, 30, 30, 30, 7500, NULL, NULL),
(21, 1, 'JO14L040032', '2014-12-04', 'Kota Tangerang - Banten', 4, 'halooo', 'Done', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'imslogistics3', 'PT. IMS Logistik', 'Mampang', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', '-', 'wawan', '0217564828', 'wawan@imslogistics.com', 5, 65, 65, 65, 65, 16250, NULL, NULL),
(22, 1, 'JO14L040033', '2014-12-04', NULL, 1, 'Enter', 'Here', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'imslogistik2', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Wiwin', '083276389823', 'wiwin@imslogistics.com', 5, 15, 375, 945, 945, 5625000, NULL, NULL),
(23, 1, 'JO14L040034', '2014-12-04', NULL, 1, 'Enter', 'Here', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'imslogistik2', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Wiwin', '083276389823', 'wiwin@imslogistics.com', 5, 17, 425, 1071, 1071, 6375000, NULL, NULL),
(24, 1, 'JO14L080035', '2014-12-08', NULL, 1, 'Data', 'Note', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 3, 9, 3, 9, 900, NULL, NULL),
(25, 1, 'JO14L090036', '2014-12-09', 'Tangerang', 2, 'Coba gudanggaram', 'Data', 'Perumnas', 'Perumnas', 'Perumnas', 'Tangerang', 'Banten', 'Indonesia', '-', 'test', '0874676329', 'test@permunas.com', 'Talaga Bestari', 'PT. Intiland', 'Talaga Bestari', 'Kab. Tangerang', 'Banten', 'Indonesia', '-', 'Abdul', '0217564827', 'info@talagabestari.com', 5, 15, 1530, 220, 1530, 1253000, NULL, NULL),
(26, 1, 'JO14L090037', '2014-12-09', NULL, 1, 'Deskripsi', 'Note', 'imslogistik1', 'PT. IMS Logistik', 'Pembangunan III', 'Tangerang', 'Banten', 'Indonesia', '-', 'Bambang', '0874676329', 'bambang@imslogistics.com', 'Perumnas', 'Perumnas', 'Perumnas', 'Tangerang', 'Banten', 'Indonesia', '-', 'halo', '0874676329', 'test@permunas.co.id', 5, 10, 30, 10, 30, 3000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Nama`) VALUES
(1, 'Draft'),
(2, 'Sent'),
(3, 'In Transit'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_transport`
--

CREATE TABLE IF NOT EXISTS `tipe_transport` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Fix` bit(1) DEFAULT NULL,
  `Panjang` int(11) DEFAULT NULL,
  `Lebar` int(11) DEFAULT NULL,
  `Tinggi` int(11) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipe_transport`
--

INSERT INTO `tipe_transport` (`ID`, `Nama`, `Fix`, `Panjang`, `Lebar`, `Tinggi`, `Modified_By`, `Modified_Date`) VALUES
(1, 'CD4', b'0', 500, 400, 300, NULL, NULL),
(2, 'CD6', b'0', 600, 400, 300, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE IF NOT EXISTS `track` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Transport` varchar(20) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`ID`, `Transport`, `Latitude`, `Longitude`, `Accuracy`, `Modified_By`, `Modified_Date`) VALUES
(1, 'B1234ABC', -6.1212781, 106.6869958, NULL, '62', '2014-12-07 12:00:00'),
(2, 'B1234ABC', -6.1212781, 106.6869958, NULL, '62', '2014-12-07 12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Tipe` bigint(20) DEFAULT NULL,
  `Panjang` int(11) DEFAULT NULL,
  `Lebar` int(11) DEFAULT NULL,
  `Tinggi` int(11) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Last_Pair` bigint(20) DEFAULT NULL,
  `Modified_By` varchar(50) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`ID`, `Nama`, `Tipe`, `Panjang`, `Lebar`, `Tinggi`, `Latitude`, `Longitude`, `Accuracy`, `Last_Pair`, `Modified_By`, `Modified_Date`) VALUES
(1, 'B1234ABC', 1, 500, 350, 200, -6.1946638, 106.633992, 25, 62, NULL, NULL),
(2, 'B3805NUM', 1, 500, 350, 200, -6.1946638, 106.633992, 25, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Active` bit(1) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `keyCustomer` bigint(20) DEFAULT NULL,
  `keyCompany` bigint(20) DEFAULT NULL,
  `IMEI` varchar(20) DEFAULT NULL,
  `HP` varchar(20) DEFAULT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `Key` varchar(10) DEFAULT NULL,
  `SMS_Key` varchar(10) DEFAULT NULL,
  `Exp_Key` datetime DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Mobile_Level` int(11) DEFAULT NULL,
  `Mobile_Team` bit(1) DEFAULT NULL,
  `Mobile_Track` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Active`, `Level`, `keyCustomer`, `keyCompany`, `IMEI`, `HP`, `Nama`, `Key`, `SMS_Key`, `Exp_Key`, `Latitude`, `Longitude`, `Accuracy`, `Mobile_Level`, `Mobile_Team`, `Mobile_Track`) VALUES
(1, 'admin', 'User12!@', b'1', 0, 0, 0, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(2, '3pe', 'User12!@', b'1', 1, 0, 2, '863360029474842', '85799844440', 'Redy', '2345', '1606', '2014-10-27 00:00:00', -6.1212781, 106.6869958, 40, 1, b'1', NULL),
(3, 'gudanggaram', 'User12!@', b'1', 2, 1, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(4, 'admin@suryamasgemilang.com', 'User12!@', b'1', 2, 2, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(5, 'juma', 'User12!@', b'1', 1, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(6, 'admin@chemstationasia.com', 'User12!@', b'1', 2, 3, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(7, 'admin@fhp-ww.com', 'User12!@', b'1', 2, 4, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(8, 'admin@mowilex.com', 'User12!@', b'1', 2, 11, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(9, 'user1', 'User12!@', b'1', 2, 7, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(10, 'admin@standardpen.com', 'User12!@', b'1', 2, 8, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(11, 'admin@ifars.co.id', 'User12!@', b'1', 2, 9, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(12, 'admin@uniaircargo.co.id', 'User12!@', b'1', 2, 10, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(13, 'Tabita@yahoo.com', 'User12!@', b'1', 2, 19, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(14, 'admin@tabita.com', 'User12!@', b'1', 2, 19, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(15, 'admin@Venture.com', 'User12!@', b'1', 2, 20, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(16, 'admin@delto.com', 'User12!@', b'1', 2, 21, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(17, 'demo', 'User12!@', b'1', 1, 0, 3, '357379051581780', '81803280707', 'Artha', '4654', '6236', '2014-10-27 00:00:00', -6.1521857, 106.6377662, 30, 1, b'1', NULL),
(18, 'samsung', 'User12!@', b'1', 2, 24, 3, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(19, 'userjump', 'User12!@', b'1', 2, 25, 3, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(20, 'fitri', 'User12!@', b'1', 1, 0, 2, '353086060308782', '8113271727', 'Fitri', '9534', '6361', '2014-12-04 00:00:00', 0, 0, 0, 1, b'1', NULL),
(21, 'lumik', 'User12!@', b'1', 2, 26, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(22, 'adminjuma', 'User12!@', b'1', 2, 28, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(23, 'admin@DDT2.com', 'User12!@', b'1', 2, 11, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(24, 'adminddt2', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(25, 'admin@ddt.com', 'User12!@', b'1', 2, 30, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(26, 'admin@ddt-11.com', 'User12!@', b'1', 2, 31, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(27, 'admin@delta dunia tekstil.com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(28, 'admin@deltaduniatekstil.com', 'User12!@', b'1', 2, 32, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(29, 'admin@Deltaduniasandangtekstil.com', 'User12!@', b'1', 2, 34, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(30, 'admin@deltaduniasandang.com', 'User12!@', b'1', 2, 35, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(31, 'admin@tigapilarsejahtera.com', 'User12!@', b'1', 2, 36, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(32, 'adminlumik', 'User12!@', b'1', 2, 26, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(33, 'PT. Delta Dunia Textile I', 'User12!@', b'1', 2, 3, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(34, 'admin@avione.com', 'User12!@', b'1', 2, 39, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(35, 'admin@haryan.com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(36, 'Admin278@haryan.com', 'User12!@', b'1', 2, 41, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(37, 'admin@DDTI.com', 'User12!@', b'1', 2, 38, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(38, 'jmpindonesia', 'User12!@', b'1', 2, 42, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(39, 'admin@SWA.com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(40, 'admin@sariwarnaasli.com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(41, 'demo2', 'User12!@', b'1', 1, 0, 3, '863360029474842', '85799844440', 'Redy', '4240', '6350', '2014-11-01 00:00:00', -6.1216048, 106.6870315, 60, 1, b'1', NULL),
(42, '', 'User12!@', b'0', -1, 0, 0, '863360029474842', '85799844440', 'Redy', '', '6616', '2014-10-21 00:00:00', -6.121456, 106.6868178, 78, 3, b'1', NULL),
(43, '', 'User12!@', b'0', -1, 0, 0, '863360029474842', '8113389928', 'Redy', '', '7450', '2014-10-20 00:00:00', -6.1214784, 106.6867981, 67, 3, b'1', NULL),
(44, '', 'User12!@', b'0', -1, 0, 0, '865234020277017', '87782156953', 'Irwanto ', '', '6840', '2014-10-21 00:00:00', 0, 0, 0, 3, b'1', NULL),
(45, 'demo3', 'User12!@', b'1', 1, 0, 3, '353086060114321', '87875188829', 'Aan', '6701', '5352', '2014-10-31 00:00:00', 0, 0, 0, 1, b'1', NULL),
(46, 'admin@Ultima.com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(47, 'admingg', 'User12!@', b'1', 2, 1, 2, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(48, 'adminDeltomed@com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(49, 'demo4', 'User12!@', b'1', 1, 0, 3, '353086060308782', '8113271727', 'Eko', '1222', '9129', '2014-11-08 00:00:00', -7.3753177, 112.7306392, 1739, 1, b'1', NULL),
(50, 'demo5', 'User12!@', b'1', 1, 0, 3, '355251058890641', '8113388880', 'Tity Ali', '7946', '3820', '2014-10-28 00:00:00', -6.1521847, 106.6356112, 36, 1, b'1', NULL),
(51, 'boy', 'User12!@', b'1', 2, 63, 3, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(52, 'AdminProspecta@com', 'User12!@', b'1', 2, 0, 1, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(53, 'juma01', 'User12!@', b'1', 1, 0, 1, '353086068679085', '87809672516', 'Yayang', '2051', '5998', '2014-11-05 00:00:00', 0, 0, 0, 1, b'1', NULL),
(54, 'juma02', 'User12!@', b'1', 1, 0, 1, '352879066274920', '85939672302', 'Syukur', '3848', '358', '2014-12-04 00:00:00', -6.1521871, 106.6378042, 30, 1, b'1', NULL),
(55, '3pe01', 'User12!@', b'1', 1, 0, 2, '353232061532505', '81311497924', 'Parsel1', '7233', '5527', '2014-11-11 00:00:00', -6.1212869, 106.6871343, 49, 1, b'1', NULL),
(56, '3pe02', 'User12!@', b'1', 1, 0, 2, '353086060492305', '8113271728', '3pe02', '5770', '9697', '2014-11-08 00:00:00', -7.3759725, 112.7323519, 1624, 1, b'1', NULL),
(57, '', 'User12!@', b'0', -1, 0, 0, '352879064189534', '81388227718', 'Andre Wirawan', '', '9558', '2014-11-04 00:00:00', 0, 0, 0, 3, b'1', NULL),
(58, 'juma03', 'User12!@', b'1', 1, 0, 1, 'A100003B887F47', '82177404407', 'Syukur', '4989', '9918', '2014-12-04 00:00:00', -6.1648996, 106.6398167, 1407, 1, b'1', NULL),
(59, 'juma04', 'User12!@', b'1', 1, 0, 1, '352879066274987', '85939672303', 'Rosul', '2184', '4155', '2014-11-05 00:00:00', -6.1218963, 106.6867981, 48, 1, b'1', NULL),
(60, 'pandaria', 'User12!@', b'1', 2, 71, 3, '', '', '', '', '', '1990-01-01 00:00:00', 0, 0, 0, 3, b'0', NULL),
(62, NULL, NULL, NULL, NULL, NULL, NULL, '0123456789', '082177404407', 'Ade Nugroho', '', '4102', '2014-12-07 18:28:40', -6.1212781, 106.6869958, 25, 3, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_menus`
--

CREATE TABLE IF NOT EXISTS `user_menus` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `User_ID` bigint(20) DEFAULT NULL,
  `Menu_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_shipment`
--
CREATE TABLE IF NOT EXISTS `view_shipment` (
`ID` bigint(20)
,`keyCustomer` bigint(20)
,`customer` varchar(50)
,`tanggal` date
,`shipment` varchar(11)
,`description` varchar(100)
,`status` varchar(50)
,`origin` varchar(50)
,`now_at` varchar(255)
,`destination` varchar(50)
,`collie` int(11)
,`weight` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_shipment`
--
DROP TABLE IF EXISTS `view_shipment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_shipment` AS select `a`.`ID` AS `ID`,`a`.`keyCustomer` AS `keyCustomer`,`b`.`Nama` AS `customer`,`a`.`Tanggal` AS `tanggal`,`a`.`Shipment_No` AS `shipment`,`a`.`Keterangan` AS `description`,`c`.`Nama` AS `status`,`a`.`Dari_Kota` AS `origin`,`a`.`Lokasi` AS `now_at`,`a`.`Untuk_Kota` AS `destination`,`a`.`Collie` AS `collie`,`a`.`AW` AS `weight` from ((`shipment` `a` left join `customer` `b` on((`a`.`keyCustomer` = `b`.`ID`))) left join `status` `c` on((`a`.`Status` = `c`.`ID`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
