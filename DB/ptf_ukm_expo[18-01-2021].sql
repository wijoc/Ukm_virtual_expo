-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2021 at 05:47 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptf_ukm_expo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_produk_foto`
--

CREATE TABLE `ref_produk_foto` (
  `rpf_id` int(5) NOT NULL,
  `prd_id_fk` int(3) NOT NULL,
  `rpf_foto` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ktgr_id` int(3) NOT NULL,
  `ktgr_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktgr_banner` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`ktgr_id`, `ktgr_nama`, `ktgr_banner`) VALUES
(1, 'KULINER REMBANG', 'assets/expo_img/kategori_img/4252349.jpg'),
(2, 'WISATA REMBANG', 'assets/expo_img/kategori_img/category_banner.png'),
(3, 'KOPI LELET', 'assets/expo_img/kategori_img/4848667.jpg'),
(4, 'BATIK, FASHION & KECANTIKAN', 'assets/expo_img/kategori_img/batik-floral-pattern1123.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `prd_id` int(3) NOT NULL,
  `toko_id_fk` int(3) NOT NULL,
  `prd_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_harga` decimal(10,2) NOT NULL,
  `prd_deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_thumbnail` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`prd_id`, `toko_id_fk`, `prd_nama`, `prd_harga`, `prd_deskripsi`, `prd_thumbnail`) VALUES
(3, 5, 'Dress Batik Lukis Kupu', '500000.00', '', 'assets/expo_img/store_img/dbc59cd5c68665f13f6493af7beaf07d.jpg'),
(4, 5, 'Dress Lurik Wayang', '400000.00', '', 'assets/expo_img/product_img/b77330a01a9778abbb71dcbcbb22dbb0.jpg'),
(5, 5, 'Dress Lurik Sawit Lukis Bunga', '400000.00', '', 'assets/expo_img/product_img/fb25d24ec1d87dfb3b28a525e1cddea2.jpg'),
(6, 5, 'Dress VRS Patchwork', '450000.00', '', 'assets/expo_img/product_img/bef68d7fb0e276e40dd41d0aa793b1b8.jpg'),
(7, 5, 'Kain lurik batik cap', '175000.00', '', NULL),
(8, 5, 'Syal lurik', '35000.00', '', NULL),
(9, 5, 'Kain lurik', '80000.00', '', 'assets/expo_img/product_img/53c9daff57d06d5619d1b303a82be65b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `toko_id` int(3) NOT NULL,
  `toko_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id_fk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_owner` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_kontak` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toko_logo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toko_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`toko_id`, `toko_nama`, `kategori_id_fk`, `toko_alamat`, `toko_owner`, `toko_kontak`, `toko_logo`, `toko_note`) VALUES
(5, 'A . H LURIK', '4', 'Klebengan RT 12 RW 03 Juwiring , Klaten', 'Muhammad Nur', '082242834293', NULL, NULL),
(6, 'ABEL ETHNIC SOLO', '4', 'TEGAL KUNIRAN RT01/26 JEBRES SURAKARTA', 'GATOT SANTOSO', '082242834293', NULL, NULL),
(7, 'ADISTY CRAFT BATIK', '4', 'JL. PANDJAITAN 112A WISATA PENGGARON UNGARAN', 'ADISTY', '082242834293', NULL, NULL),
(8, 'ADITYA HIJAB', '4', 'JL. TAMAN TEGALSARI I/7 SEMARANG', 'DINAR NUGROHO', '082242834293', NULL, NULL),
(9, 'AIRA COLLECTION', '4', 'TEDUNAN RT 01 RW 02 KEC WEDUNG KAB.DEMAK', 'EKA TAUHIDA', '082242834293', NULL, NULL),
(10, 'AMUNG GODHONG ECOPRINT', '4', 'PERUM GIRIMULYO, JALAN SUNAN BONANG 1C NO. 10 MAGELANG', 'RETNO SETYANINGSIH', '082242834293', NULL, NULL),
(11, '9 RATU LEBAH', '1', 'JL. SOEKARNO HATTA NO. 20 KETAPANG KENDAL', 'MOHAMAD DODY KUSNIYATO', '082242834293', NULL, NULL),
(12, 'ABON KOKI PURBALINGGA', '1', 'JL. MT HARYONO NO. 20 PURBALINGGA 53312', 'NOVI', '082242834293', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_produk_foto`
--
ALTER TABLE `ref_produk_foto`
  ADD PRIMARY KEY (`rpf_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ktgr_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_produk_foto`
--
ALTER TABLE `ref_produk_foto`
  MODIFY `rpf_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ktgr_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `prd_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `toko_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
