-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 05:31 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerbangtol`
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
(1, '66.jpg', 'madiun', '1', '2019-11-30 04:30:32', 24000),
(2, '67.jpg', 'madiun', '1', '2019-11-30 04:31:21', 24000),
(3, '68.jpg', 'madiun', '6', '2019-11-30 04:32:11', 50000),
(4, '69.jpg', 'madiun', '1', '2019-11-30 04:34:04', 24000),
(5, '70.jpg', 'madiun', '2', '2019-11-30 04:34:23', 36000),
(6, '71.jpg', 'madiun', '2', '2019-11-30 04:34:30', 36000),
(7, '72.jpg', 'madiun', '6', '2019-11-30 04:34:38', 50000),
(8, '73.jpg', 'madiun', '2', '2019-11-30 04:34:51', 36000),
(9, '74.jpg', 'madiun', '1', '2019-11-30 04:35:00', 24000),
(10, '75.jpg', 'madiun', '6', '2019-11-30 04:35:06', 50000),
(11, '76.jpg', 'madiun', '1', '2019-11-30 04:35:13', 24000),
(12, '77.jpg', 'madiun', '1', '2019-11-30 04:35:30', 24000),
(13, '78.jpg', 'madiun', '2', '2019-11-30 04:35:39', 36000),
(14, '79.jpg', 'madiun', '3', '2019-11-30 04:36:05', 40000),
(15, '80.jpg', 'madiun', '2', '2019-11-30 04:36:16', 36000),
(16, '81.jpg', 'madiun', '2', '2019-11-30 04:36:26', 36000),
(17, '82.jpg', 'madiun', '2', '2019-11-30 04:36:35', 36000),
(18, '83.jpg', 'madiun', '1', '2019-11-30 04:36:49', 24000),
(19, '84.jpg', 'madiun', '3', '2019-11-30 04:36:53', 40000),
(20, '85.jpg', 'madiun', '2', '2019-11-30 04:36:57', 36000),
(21, '86.jpg', 'madiun', '2', '2019-11-30 04:37:04', 36000),
(22, '87.jpg', 'madiun', '1', '2019-11-30 04:37:26', 24000),
(23, '88.jpg', 'madiun', '1', '2019-11-30 04:40:45', 24000),
(24, '89.jpg', 'madiun', '2', '2019-11-30 04:43:24', 36000),
(25, '90.jpg', 'madiun', '1', '2019-11-30 04:54:59', 24000),
(26, '91.jpg', 'madiun', '3', '2019-11-30 04:56:15', 40000),
(27, '92.jpg', 'madiun', '2', '2019-11-30 04:56:22', 36000),
(28, '93.jpg', 'madiun', '6', '2019-11-30 05:06:35', 50000),
(29, '94.jpg', 'madiun', '6', '2019-11-30 05:08:06', 50000),
(30, '95.jpg', 'madiun', '1', '2019-11-30 05:08:36', 24000),
(31, '96.jpg', 'madiun', '1', '2019-11-30 05:10:45', 24000),
(32, '97.jpg', 'madiun', '1', '2019-11-30 05:11:26', 24000),
(33, '98.jpg', 'madiun', '6', '2019-11-30 05:11:49', 50000),
(34, '99.jpg', 'madiun', '2', '2019-11-30 05:14:11', 36000),
(35, '100.jpg', 'madiun', '1', '2019-11-30 05:17:01', 24000),
(36, '101.jpg', 'madiun', '2', '2019-11-30 05:17:21', 36000),
(37, '102.jpg', 'madiun', '2', '2019-11-30 05:17:42', 36000),
(38, '103.jpg', 'madiun', '2', '2019-11-30 05:41:00', 36000),
(39, '104.jpg', 'madiun', '1', '2019-11-30 05:41:52', 24000),
(40, '105.jpg', 'madiun', '2', '2019-11-30 06:28:58', 36000),
(41, '106.jpg', 'madiun', '3', '2019-11-30 06:29:11', 40000);

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
  `id` int(10) NOT NULL,
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `datakendaran`
--
ALTER TABLE `datakendaran`
  ADD CONSTRAINT `gerbang` FOREIGN KEY (`gerbang`) REFERENCES `lokasi` (`gerbang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
