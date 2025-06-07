-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 04:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan23cap`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `headline` varchar(20) NOT NULL,
  `isi_berita` text NOT NULL,
  `pengirim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `kategori`, `headline`, `isi_berita`, `pengirim`) VALUES
(4, 'hai', 'apa', 'dimana', '<p>saya</p>', 'ngilang'),
(9, 'kasnda', 'dfksdfns', 'mfoaao', '<p>wondasmd</p>', 'wasdaw');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`idkategori`, `kategori`) VALUES
(1, 'pkn'),
(2, 'paii');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kdmat` varchar(11) NOT NULL,
  `namat` varchar(30) NOT NULL,
  `sks` int(3) NOT NULL,
  `semester` int(3) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kdmat`, `namat`, `sks`, `semester`, `jenis`, `prodi`) VALUES
('UPK200X', 'PKN', 3, 7, 'PKN', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','','') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `create_at`) VALUES
(1, 'nuy', '$2y$10$p0YrJhLI3LyhsM1iBOP.7eQcXKUiyWq.MHtTNS1dRkxiuHPoero2G', 'admin', '2025-03-18 03:02:50'),
(2, 'za', '$2y$10$3jrrNIqeHTcmLZa4X0iAaeUipVKfruvY7u2lJWhqxxvmfhEDOwpem', 'admin', '2025-03-23 08:07:01'),
(3, 'tom', '$2y$10$rtyoGCdmF8eZouGEqpTk6uZQrZep9VPNcFuRw9me4APw/vngrR2RS', 'user', '2025-03-23 08:25:03'),
(4, 'za1', '$2y$10$hpZfTyQHeKcMZ6NSio5EQeOZDGZN4eDJgFKGCTX9uaGRREgZws4Yu', 'admin', '2025-03-23 08:51:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kdmat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
