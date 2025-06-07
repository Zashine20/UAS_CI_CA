-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 09:15 AM
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
  `pengirim` varchar(20) NOT NULL,
  `tanggal_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `kategori`, `headline`, `isi_berita`, `pengirim`, `tanggal_publish`) VALUES
(4, 'hai', 'apa', 'dimanaa', '<p>sayaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'ngilang', '2025-05-14'),
(9, 'kasnda', 'dfksdfns', 'mfoaao', '<p>wondasmd</p>', 'wasdaw', '0000-00-00'),
(10, 'benar', '1', 'aww', '<p>tolong adit</p>', 'sopo', '2025-05-01');

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
('UPK200X', 'PKN', 3, 7, 'PKN', 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `created_at`, `updated_at`) VALUES
(1, 'ww', 'tangerang', '081239127312', '2025-06-03 02:40:48', '2025-06-06 11:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(256) NOT NULL,
  `nama_produk` varchar(256) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `created_at`, `update_at`) VALUES
(1, 'BK01', 'Laptop', '50000', 2, '2025-06-03 01:57:52', '2025-06-03 11:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id_sales_order` int(11) NOT NULL,
  `nomor_order` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_sales_person` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status_order` enum('draft','dikirim','selesai','dibatalkan') NOT NULL DEFAULT 'draft',
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id_sales_order`, `nomor_order`, `id_pelanggan`, `id_sales_person`, `tanggal_order`, `total_harga`, `status_order`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'SO-20250603-0001', 1, 1, '2025-06-03 09:43:00', '100000.00', 'selesai', 'Pembelian Pertama', '2025-06-03 02:43:58', '2025-06-03 02:59:39'),
(2, 'SO-20250603-0002', 1, 1, '2025-06-03 11:33:00', '100000.00', 'selesai', 'test', '2025-06-03 04:33:32', '2025-06-03 04:35:41'),
(3, 'SO-20250603-0003', 1, 1, '2025-06-03 11:35:00', '100000.00', 'selesai', 'aa', '2025-06-03 04:36:08', '2025-06-03 04:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_items`
--

CREATE TABLE `sales_order_items` (
  `id_order_item` int(11) NOT NULL,
  `id_sales_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_saat_order` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_items`
--

INSERT INTO `sales_order_items` (`id_order_item`, `id_sales_order`, `id_produk`, `jumlah`, `harga_saat_order`, `subtotal`) VALUES
(1, 1, 1, 2, '50000.00', '0.00'),
(2, 2, 1, 2, '50000.00', '100000.00'),
(3, 3, 1, 2, '50000.00', '100000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_persons`
--

CREATE TABLE `sales_persons` (
  `id_sales_person` int(11) NOT NULL,
  `kode_sales` varchar(50) NOT NULL,
  `nama_sales` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_persons`
--

INSERT INTO `sales_persons` (`id_sales_person`, `kode_sales`, `nama_sales`, `created_at`, `updated_at`) VALUES
(1, 'SALES001', 'Nela', '2025-06-03 02:43:20', '2025-06-03 02:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User','Sales','Manager') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user2-160x160.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `create_at`, `profile_picture`) VALUES
(7, 'a', '$2y$10$Jst5O8FhUyFFFwRhQBT6zepOeFFKmxbyei6FC7zIJhUxgYYKt6I2.', 'Admin', '2025-05-25 13:46:53', '8103588f5ae02565ad73f8ec98cde0f6.jpg'),
(8, 'xz', '$2y$10$aUh8Er1fOF4sKsJHrMGPQe8iW44GS4DpNA8xUl0hG9tRjNrNOmeT2', 'User', '2025-05-29 08:28:32', '15367f44a5f84fbfecae4b197de27295.jpg'),
(9, 'ww', '$2y$10$eWIvAGTsRRMifEQlOVWHVuHi74pJT8Em96Rrct5bQnabJed1FYS5m', 'User', '2025-05-29 08:40:18', '9ff4367af0dba10a16ef048cddc49b5d.jpg'),
(13, 'czxm', '$2y$10$DzA7CH9yvYm9yRNxbRoGZuwgnIUw4GAKLNu504DcW7uKumLUFfVQO', 'Sales', '2025-06-03 12:49:30', 'user2-160x160.jpg'),
(14, 'awww', '$2y$10$nGOj98P/UAXix.2O2CIjaOgtr5m6f01NUiPxjoOupn0w903YyxxqC', 'Manager', '2025-06-04 01:52:52', 'user2-160x160.jpg');

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
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id_sales_order`),
  ADD UNIQUE KEY `nomor_order` (`nomor_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_sales_person` (`id_sales_person`);

--
-- Indexes for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `id_sales_order` (`id_sales_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `sales_persons`
--
ALTER TABLE `sales_persons`
  ADD PRIMARY KEY (`id_sales_person`),
  ADD UNIQUE KEY `kode_sales` (`kode_sales`);

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
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id_sales_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_persons`
--
ALTER TABLE `sales_persons`
  MODIFY `id_sales_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `sales_orders_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `sales_orders_ibfk_2` FOREIGN KEY (`id_sales_person`) REFERENCES `sales_persons` (`id_sales_person`);

--
-- Constraints for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD CONSTRAINT `sales_order_items_ibfk_1` FOREIGN KEY (`id_sales_order`) REFERENCES `sales_orders` (`id_sales_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_order_items_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
