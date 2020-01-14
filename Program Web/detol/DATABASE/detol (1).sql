-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 11:53 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detol`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakendaran`
--

CREATE TABLE `datakendaran` (
  `id` int(10) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `gerbang` varchar(256) NOT NULL,
  `golongan` varchar(256) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakendaran`
--

INSERT INTO `datakendaran` (`id`, `gambar`, `gerbang`, `golongan`, `waktu`, `harga`) VALUES
(2, '2.jpg', 'madiun', '1', '2019-11-28 22:40:00', 10000),
(3, '2.jpg', 'madiun', '2', '2019-11-28 22:40:19', 12000),
(4, '2.jpg', 'madiun', '1', '2019-11-28 22:40:24', 10000),
(5, '2.jpg', 'madiun', '1', '2019-11-28 22:41:22', 12000),
(6, '2.jpg', 'madiun', '1', '2019-11-28 22:41:19', 12000),
(7, '2.jpg', 'madiun', '1', '2019-11-28 22:41:16', 12000),
(8, '2.jpg', 'madiun', '3', '2019-11-28 22:41:16', 12000),
(9, '2.jpg', 'madiun', '2', '2019-11-28 22:41:16', 12000),
(10, '2.jpg', 'madiun', '4', '2019-11-28 22:41:16', 12000),
(11, '2.jpg', 'madiun', '4', '2019-11-28 22:41:16', 12000),
(12, '2.jpg', 'madiun', '5', '2019-11-28 22:41:16', 12000),
(13, '2.jpg', 'madiun', '5', '2019-11-28 22:41:16', 12000),
(14, '2.jpg', 'madiun', '6', '2019-11-28 22:41:16', 12000),
(15, '2.jpg', 'madiun', '6', '2019-11-28 22:41:16', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(10) NOT NULL,
  `gerbang` varchar(256) NOT NULL,
  `lokasi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `gerbang`, `lokasi`) VALUES
(2, 'madiun', 'madiun KM 5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@detol.com', 'detol123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakendaran`
--
ALTER TABLE `datakendaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gerbang` (`gerbang`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gerbang` (`gerbang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakendaran`
--
ALTER TABLE `datakendaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datakendaran`
--
ALTER TABLE `datakendaran`
  ADD CONSTRAINT `gerbang` FOREIGN KEY (`gerbang`) REFERENCES `lokasi` (`gerbang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
