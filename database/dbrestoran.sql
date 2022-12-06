-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 06:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Nasi', '2022-11-16 08:26:21', '2022-11-16 08:26:21'),
(2, 'Ikan', '2022-11-16 08:26:34', '2022-11-16 08:26:34'),
(3, 'Ayam', '2022-11-16 08:27:14', '2022-11-16 08:27:14'),
(4, 'Sayuran', '2022-11-16 08:27:24', '2022-11-16 08:27:24'),
(5, 'Minuman', '2022-11-16 08:27:35', '2022-11-16 08:27:35'),
(6, 'Daging', '2022-11-24 18:18:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `no_meja` varchar(45) NOT NULL,
  `kapasitas` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, '1', '4', NULL, NULL),
(2, '2', '4', NULL, NULL),
(3, '3', '8', NULL, NULL),
(4, '4', '12', NULL, NULL),
(5, '5', '8', '2022-11-24 08:30:03', NULL),
(6, '6', '8', '2022-11-24 08:32:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `ket` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_kategori`, `nama`, `harga`, `ket`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nasi Goreng Spesial', 40000, 'Sosis, Bakso, Udang, Telur Mata Sapi', '1-Nasi Goreng Spesial.png', '2022-11-16 08:36:14', '2022-11-16 22:49:42'),
(2, 1, 'Nasi Uduk', 40000, 'Telur sambal, mie, ayam, tempe, timun', '1-Nasi Uduk.jpg', '2022-11-16 08:41:23', '2022-11-16 22:36:53'),
(3, 2, 'Gurami Bakar', 50000, NULL, '2-Gurami Bakar.jpg', '2022-11-16 08:47:13', '2022-11-16 22:37:11'),
(4, 2, 'Bawal Goreng', 60000, NULL, '2-Bawal Goreng.jpg', '2022-11-16 08:48:56', '2022-11-16 22:38:40'),
(5, 3, 'Ayam Cabe Hijau', 20000, NULL, '3-Ayam Cabe Hijau.jpg', '2022-11-16 08:49:56', '2022-11-16 22:38:54'),
(6, 3, 'Ayam Sambal Merah', 40000, NULL, '3-Ayam Sambal Merah.jpg', '2022-11-16 09:14:38', '2022-11-16 22:39:11'),
(7, 4, 'Brokoli Udang', 40000, NULL, '4-Brokoli Udang.png', '2022-11-16 11:53:15', '2022-11-16 22:39:31'),
(8, 4, 'Kangkung Terasi', 30000, NULL, '4-Kangkung Terasi.jpg', '2022-11-16 11:53:30', '2022-11-16 22:39:46'),
(9, 5, 'Teh Manis', 20000, NULL, '', '2022-11-16 11:53:43', NULL),
(10, 5, 'Teh Tarik', 20000, NULL, '', '2022-11-16 11:53:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantityOrder` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` double NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `total_bayar` varchar(45) DEFAULT NULL,
  `id_reservasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `tgl_reservasi` date DEFAULT NULL,
  `jam_in` time DEFAULT NULL,
  `jam_out` time DEFAULT NULL,
  `status` enum('done','approved','pending','cancel') DEFAULT 'pending',
  `id_meja` int(11) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `jml_orang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `tgl_reservasi`, `jam_in`, `jam_out`, `status`, `id_meja`, `id_users`, `jml_orang`, `created_at`, `updated_at`) VALUES
(1, '2022-12-06', '07:57:00', '11:53:00', 'approved', 1, 3, 4, '2022-12-02 17:53:55', '2022-12-02 18:23:40'),
(2, '2022-12-17', '14:40:00', '23:42:00', 'cancel', 1, 3, 2, '2022-12-04 09:40:35', '2022-12-05 07:39:33'),
(3, '2022-11-29', '05:57:00', '05:57:00', 'cancel', 4, 3, 12, '2022-12-04 15:54:19', '2022-12-05 07:39:38'),
(4, '2022-12-14', '09:39:00', '11:40:00', 'pending', 1, 4, 4, '2022-12-04 16:40:11', '2022-12-04 16:40:11'),
(5, '2022-12-07', '09:23:00', '11:20:00', 'approved', 4, 5, 12, '2022-12-04 19:20:30', '2022-12-04 19:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `id_reservasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `no_hp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Sayid Farhan', 'sayidfarhan', 'sayidfarhan2@gmail.com', '$2y$10$6MRjxiJ6PQQvkJP59KFZfORmJ02GzxpFNO04OgRijtDJRCYiXtXZe', '088888888888', 'admin', '2022-11-23 10:53:17', '2022-11-23 10:53:17'),
(2, 'admin', 'admin', 'admin@admin.com', '$2y$10$ackuTHNys7Q9L55a3qhvaO68zLqPnV5HZqyZcgeM8TH2.dPn1seWe', '0888888888', 'admin', '2022-12-04 18:48:29', '2022-12-04 18:48:29'),
(3, 'Testing', 'testing', 'rambo@gmail.com', '$2y$10$Afl1.EGNTmlsYTvVhPTppObXsIFUyyaoQG6833Y9zIg2Q3wNpPF/G', '123456789', 'user', '2022-11-24 03:21:16', '2022-11-24 03:21:16'),
(4, 'fahrulsw', 'fahrulsw', 'fahrulsw@gmail.com', '$2y$10$hBfH1VbqBtO9LzAD88pS7eTchtdYyR3GiczKrVVv4/0VZwpFnl0FG', '09873763763733', 'user', '2022-12-04 07:24:41', '2022-12-04 07:24:41'),
(5, 'bambang', 'bambang', 'bambang@gmail.com', '$2y$10$Fz6kO8/2vLXV8pRVcumnIeJlCNy2AhxvEJM2pFMyiXIcCcF.QiKgS', '0888888888', 'user', '2022-12-04 19:19:40', '2022-12-04 19:19:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_kategori1_idx` (`id_kategori`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_has_menu_orders1` (`orders_id`),
  ADD KEY `fk_orders_has_menu_menu1` (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_reservasi` (`id_reservasi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_reservasi1` (`id_reservasi`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservasi_meja1` (`id_meja`),
  ADD KEY `fk_reservasi_users1` (`id_users`) USING BTREE;

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ulasan_reservasi1_idx` (`id_reservasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orders_has_menu_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_has_menu_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_reservasi` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_reservasi1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi_meja1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservasi_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `fk_ulasan_reservasi1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
