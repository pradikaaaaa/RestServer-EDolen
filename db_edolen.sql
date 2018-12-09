-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 12:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edolen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_wisata` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori_wisata`, `image`) VALUES
(1, 'Pantai', 'pantai.png'),
(2, 'Taman', 'taman.jpg'),
(3, 'Alam', 'alam.jpg'),
(4, 'Taman Rekreasi Air', 'wisata_air.jpg'),
(5, 'Wisata Malam', 'DRAGONFLY_JAKARTA_best_clubbing.jpg'),
(6, 'Wisata Rohani', 'GangMacan.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `tanggal_lahir`, `status`) VALUES
(1, 'admin', 'admin', 'adminstrator', NULL, 'admin'),
(2, 'dio', 'dio', 'Dio Syahrizal', '1998-05-09', 'user'),
(3, 'yahuya', 'yahuya', 'Yahya', '1998-05-11', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wisata`
--

CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_wisata`
--

INSERT INTO `tbl_wisata` (`id_wisata`, `nama_wisata`, `id_kategori`, `alamat`, `deskripsi`, `longitude`, `latitude`, `image`) VALUES
(1, 'Hawai Water Park', 4, 'Perumahan Graha Kencana Raya, Jl. Raya Karanglo, Banjararum, Singosari, Karanglo, Banjararum, Singosari, Malang, Jawa Timur 65126', 'Hawaiian-themed park with many slides & water attractions, plus a food court, pool bar & playground.', -7.92326, 112.658205, NULL),
(2, 'Alun Alun Merdeka Malang', 2, 'Jl. Merdeka Selatan, Kiduldalem, Klojen, Kota Malang, Jawa Timur 65119', 'Popular square in the heart of downtown featuring shade trees, walking paths & a central fountain.', NULL, NULL, NULL),
(4, 'Taman Suls', 2, 'Malang', 'Luar biasa gaming', 0.123124, 0.431413, '32087415_2315388885155202_7377428220116729856_n.jpg'),
(5, 'Alun Alun Malang', 4, 'Jl. Merdeka Selatan, Kiduldalem, Klojen, Kota Malang, Jawa Timur 65119', 'Alun-alun populer di pusat kota yang memiliki pohon rindang, jalan setapak, & air mancur di tengahnya.', 112.632003, -7.981653, 'alun_alun1.jpg'),
(6, 'Villa Songgoriti', 6, 'Jl. Arumdalu, Songgokerto, Kec. Batu, Malang, Jawa Timur 65312', 'Mantap Gan', 112.506214, -7.863127, 'sgm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `fk_KategoriWisata` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD CONSTRAINT `fk_KategoriWisata` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
