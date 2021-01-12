-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2020 at 01:36 PM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_starter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_crud`
--

CREATE TABLE `tb_crud` (
  `crud_id` int(1) NOT NULL,
  `crud_field_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crud_field_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_crud`
--

INSERT INTO `tb_crud` (`crud_id`, `crud_field_1`, `crud_field_2`) VALUES
(1, 'qwerty', 'opt1'),
(2, 'qwerty', 'opt1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_crud`
--
ALTER TABLE `tb_crud`
  ADD PRIMARY KEY (`crud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_crud`
--
ALTER TABLE `tb_crud`
  MODIFY `crud_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
