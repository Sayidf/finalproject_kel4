-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 10:36 PM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 'Tes', '2022-12-15 09:06:29', '2022-12-15 09:06:29');

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
(6, '6', '8', '2022-11-24 08:32:02', NULL),
(7, '7', '4', '2022-12-08 09:47:29', '2022-12-08 09:47:29'),
(8, '8', '6', '2022-12-14 19:22:47', NULL);

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
(1, 1, 'Nasi Goreng Spesial', 40000, 'Sosis, Bakso, Udang, Telur Mata Sapi', '1-Nasi Goreng Spesial.png', '2022-11-16 08:36:14', '2022-12-14 19:20:43'),
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orders_id`, `menu_id`, `quantityOrder`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2022-12-09 21:45:55', '2022-12-09 21:45:55'),
(2, 2, 2, 1, '2022-12-09 21:45:56', '2022-12-09 21:45:56'),
(3, 3, 2, 1, '2022-12-09 21:46:02', '2022-12-09 21:46:02'),
(4, 4, 2, 1, '2022-12-09 21:46:05', '2022-12-09 21:46:05'),
(5, 5, 2, 1, '2022-12-09 21:46:07', '2022-12-09 21:46:07'),
(6, 6, 2, 1, '2022-12-09 21:46:09', '2022-12-09 21:46:09'),
(7, 7, 2, 1, '2022-12-09 21:46:13', '2022-12-09 21:46:13'),
(8, 8, 2, 1, '2022-12-09 21:56:02', '2022-12-09 21:56:02'),
(9, 9, 2, 1, '2022-12-09 22:05:03', '2022-12-09 22:05:03'),
(10, 10, 2, 2, '2022-12-09 22:06:08', '2022-12-09 22:06:08'),
(11, 11, 2, 2, '2022-12-13 09:21:02', '2022-12-13 09:21:02'),
(12, 11, 8, 1, '2022-12-13 09:21:02', '2022-12-13 09:21:02'),
(13, 11, 3, 1, '2022-12-13 09:21:02', '2022-12-13 09:21:02'),
(14, 11, 5, 1, '2022-12-13 09:21:02', '2022-12-13 09:21:02'),
(15, 12, 2, 1, '2022-12-14 00:24:18', '2022-12-14 00:24:18'),
(16, 12, 7, 1, '2022-12-14 00:24:18', '2022-12-14 00:24:18'),
(17, 13, 2, 1, '2022-12-14 16:46:14', '2022-12-14 16:46:14'),
(18, 14, 2, 1, '2022-12-14 17:12:29', '2022-12-14 17:12:29'),
(19, 15, 2, 1, '2022-12-14 17:13:15', '2022-12-14 17:13:15'),
(20, 16, 2, 1, '2022-12-14 17:17:20', '2022-12-14 17:17:20'),
(21, 16, 1, 1, '2022-12-14 17:17:20', '2022-12-14 17:17:20'),
(22, 17, 2, 1, '2022-12-14 17:18:18', '2022-12-14 17:18:18'),
(23, 17, 1, 1, '2022-12-14 17:18:18', '2022-12-14 17:18:18'),
(24, 20, 2, 1, '2022-12-14 17:22:21', '2022-12-14 17:22:21'),
(25, 20, 1, 1, '2022-12-14 17:22:21', '2022-12-14 17:22:21'),
(26, 21, 2, 1, '2022-12-14 17:22:57', '2022-12-14 17:22:57'),
(27, 21, 1, 1, '2022-12-14 17:22:57', '2022-12-14 17:22:57'),
(28, 22, 2, 1, '2022-12-14 17:24:02', '2022-12-14 17:24:02'),
(29, 22, 1, 1, '2022-12-14 17:24:02', '2022-12-14 17:24:02'),
(30, 23, 2, 1, '2022-12-14 17:24:36', '2022-12-14 17:24:36'),
(31, 23, 1, 1, '2022-12-14 17:24:36', '2022-12-14 17:24:36'),
(32, 24, 2, 1, '2022-12-14 17:24:52', '2022-12-14 17:24:52'),
(33, 24, 1, 1, '2022-12-14 17:24:52', '2022-12-14 17:24:52'),
(34, 25, 2, 1, '2022-12-14 17:25:33', '2022-12-14 17:25:33'),
(35, 25, 1, 1, '2022-12-14 17:25:33', '2022-12-14 17:25:33'),
(36, 26, 2, 1, '2022-12-14 17:25:43', '2022-12-14 17:25:43'),
(37, 27, 2, 1, '2022-12-14 17:27:38', '2022-12-14 17:27:38'),
(38, 28, 2, 1, '2022-12-14 17:28:42', '2022-12-14 17:28:42'),
(39, 29, 6, 1, '2022-12-14 18:13:59', '2022-12-14 18:13:59'),
(40, 29, 1, 1, '2022-12-14 18:13:59', '2022-12-14 18:13:59'),
(41, 30, 1, 2, '2022-12-14 19:09:45', '2022-12-14 19:09:45'),
(42, 30, 2, 1, '2022-12-14 19:09:45', '2022-12-14 19:09:45'),
(43, 30, 6, 1, '2022-12-14 19:09:45', '2022-12-14 19:09:45'),
(44, 31, 10, 1, '2022-12-14 19:16:31', '2022-12-14 19:16:31'),
(45, 31, 5, 1, '2022-12-14 19:16:31', '2022-12-14 19:16:31'),
(46, 31, 4, 1, '2022-12-14 19:16:31', '2022-12-14 19:16:31'),
(47, 32, 2, 2, '2022-12-14 19:35:20', '2022-12-14 19:35:20'),
(48, 33, 2, 1, '2022-12-14 20:17:17', '2022-12-14 20:17:17'),
(49, 34, 2, 1, '2022-12-14 20:20:33', '2022-12-14 20:20:33'),
(50, 34, 9, 1, '2022-12-14 20:20:33', '2022-12-14 20:20:33'),
(51, 35, 2, 1, '2022-12-14 20:21:54', '2022-12-14 20:21:54'),
(52, 35, 9, 1, '2022-12-14 20:21:54', '2022-12-14 20:21:54'),
(53, 36, 2, 1, '2022-12-14 20:22:09', '2022-12-14 20:22:09'),
(54, 36, 9, 1, '2022-12-14 20:22:09', '2022-12-14 20:22:09');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `id_reservasi`, `created_at`, `updated_at`) VALUES
(1, 40000, 3, '2022-12-09 21:45:55', '2022-12-09 21:45:55'),
(2, 40000, 3, '2022-12-09 21:45:56', '2022-12-09 21:45:56'),
(3, 40000, 3, '2022-12-09 21:46:02', '2022-12-09 21:46:02'),
(4, 40000, 3, '2022-12-09 21:46:05', '2022-12-09 21:46:05'),
(5, 40000, 3, '2022-12-09 21:46:07', '2022-12-09 21:46:07'),
(6, 40000, 3, '2022-12-09 21:46:09', '2022-12-09 21:46:09'),
(7, 40000, 3, '2022-12-09 21:46:13', '2022-12-09 21:46:13'),
(8, 40000, 3, '2022-12-09 21:56:02', '2022-12-09 21:56:02'),
(9, 40000, 3, '2022-12-09 22:05:03', '2022-12-09 22:05:03'),
(10, 80000, 3, '2022-12-09 22:06:08', '2022-12-09 22:06:08'),
(11, 180000, 3, '2022-12-13 09:21:02', '2022-12-13 09:21:02'),
(12, 80000, 9, '2022-12-14 00:24:18', '2022-12-14 00:24:18'),
(13, 40000, 9, '2022-12-14 16:46:14', '2022-12-14 16:46:14'),
(14, 40000, 12, '2022-12-14 17:12:29', '2022-12-14 17:12:29'),
(15, 40000, 12, '2022-12-14 17:13:15', '2022-12-14 17:13:15'),
(16, 80000, 12, '2022-12-14 17:17:20', '2022-12-14 17:17:20'),
(17, 80000, 12, '2022-12-14 17:18:18', '2022-12-14 17:18:18'),
(18, 80000, 12, '2022-12-14 17:21:24', '2022-12-14 17:21:24'),
(19, 80000, 12, '2022-12-14 17:22:00', '2022-12-14 17:22:00'),
(20, 80000, 12, '2022-12-14 17:22:21', '2022-12-14 17:22:21'),
(21, 80000, 12, '2022-12-14 17:22:57', '2022-12-14 17:22:57'),
(22, 80000, 12, '2022-12-14 17:24:02', '2022-12-14 17:24:02'),
(23, 80000, 12, '2022-12-14 17:24:36', '2022-12-14 17:24:36'),
(24, 80000, 12, '2022-12-14 17:24:52', '2022-12-14 17:24:52'),
(25, 80000, 12, '2022-12-14 17:25:33', '2022-12-14 17:25:33'),
(26, 40000, 12, '2022-12-14 17:25:43', '2022-12-14 17:25:43'),
(27, 40000, 12, '2022-12-14 17:27:38', '2022-12-14 17:27:38'),
(28, 40000, 12, '2022-12-14 17:28:42', '2022-12-14 17:28:42'),
(29, 80000, 13, '2022-12-14 18:13:59', '2022-12-14 18:13:59'),
(30, 160000, 14, '2022-12-14 19:09:45', '2022-12-14 19:09:45'),
(31, 100000, 14, '2022-12-14 19:16:31', '2022-12-14 19:16:31'),
(32, 80000, 15, '2022-12-14 19:35:20', '2022-12-14 19:35:20'),
(33, 40000, 15, '2022-12-14 20:17:17', '2022-12-14 20:17:17'),
(34, 60000, 15, '2022-12-14 20:20:33', '2022-12-14 20:20:33'),
(35, 60000, 15, '2022-12-14 20:21:54', '2022-12-14 20:21:54'),
(36, 60000, 15, '2022-12-14 20:22:09', '2022-12-14 20:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tgl_pembayaran`, `total_bayar`, `id_reservasi`, `created_at`, `updated_at`) VALUES
(1, '2022-12-14', '80000', 9, '2022-12-14 00:25:08', '2022-12-14 00:25:08'),
(2, '2022-12-14', '40000', 9, '2022-12-14 16:46:15', '2022-12-14 16:46:15'),
(3, '2022-12-15', '40000', 12, '2022-12-14 17:27:39', '2022-12-14 17:27:39'),
(4, '2022-12-15', '40000', 12, '2022-12-14 17:29:00', '2022-12-14 17:29:00'),
(5, '2022-12-15', '80000', 13, '2022-12-14 18:14:32', '2022-12-14 18:14:32'),
(6, '2022-12-15', '160000', 14, '2022-12-14 19:09:49', '2022-12-14 19:09:49'),
(7, '2022-12-15', '100000', 14, '2022-12-14 19:16:35', '2022-12-14 19:16:35'),
(8, '2022-12-15', '80000', 15, '2022-12-14 19:36:51', '2022-12-14 19:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Users', 15, 'token', 'f7d67a4998d09c15d87ef4ccbb6b198f8e1c149e9259616a4860b463a1080834', '[\"*\"]', NULL, NULL, '2022-12-15 07:17:59', '2022-12-15 07:17:59'),
(2, 'App\\Models\\Users', 15, 'token', '4874b41fc87ac9dd2341a645744ac2fff76eadd41457f8deceeec0599c9e9a0b', '[\"*\"]', NULL, NULL, '2022-12-15 07:18:06', '2022-12-15 07:18:06'),
(3, 'App\\Models\\Users', 3, 'token', '89d5985c1b027b4abacfb2ef3dc102f225ab3888c72e3c6fffae00e08bba7ac3', '[\"*\"]', NULL, NULL, '2022-12-15 08:52:33', '2022-12-15 08:52:33'),
(4, 'App\\Models\\Users', 3, 'token', '4f775ffbbb7a062851cf8bf6fc3d73d95078f70b3a02703b52053f626a4666e4', '[\"*\"]', '2022-12-15 09:08:08', NULL, '2022-12-15 08:53:32', '2022-12-15 09:08:08'),
(5, 'App\\Models\\Users', 15, 'token', '58115033ab64ca66a5bfe058f575c055ff8499f3048019153ef2c405e344d21c', '[\"*\"]', NULL, NULL, '2022-12-15 10:17:29', '2022-12-15 10:17:29');

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
(2, '2022-12-17', '14:40:00', '23:42:00', 'pending', 1, 3, 2, '2022-12-04 09:40:35', '2022-12-05 07:39:33'),
(3, '2022-11-29', '05:57:00', '05:57:00', 'cancel', 4, 3, 12, '2022-12-04 15:54:19', '2022-12-05 07:39:38'),
(4, '2022-12-14', '09:39:00', '11:40:00', 'pending', 1, 4, 4, '2022-12-04 16:40:11', '2022-12-04 16:40:11'),
(5, '2022-12-07', '09:23:00', '11:20:00', 'cancel', 4, 5, 12, '2022-12-04 19:20:30', '2022-12-14 15:51:51'),
(6, '2022-12-07', '11:22:00', '23:00:00', 'approved', 1, 11, 4, '2022-12-06 11:23:15', '2022-12-15 18:09:43'),
(7, '2022-12-27', '11:22:00', '13:22:00', 'done', 4, 3, 4, '2022-12-06 17:22:21', '2022-12-08 21:17:17'),
(8, '2022-12-15', '11:46:00', '17:44:00', 'approved', 1, 3, 4, '2022-12-09 21:44:51', '2022-12-09 21:45:27'),
(9, '2022-12-15', '19:22:00', '20:19:00', 'done', 3, 3, 5, '2022-12-13 09:19:44', '2022-12-14 16:46:15'),
(10, '2022-12-21', '11:54:00', '12:52:00', 'done', 3, 5, 6, '2022-12-14 15:52:39', '2022-12-14 15:52:39'),
(11, '2022-12-15', '12:39:00', '13:39:00', 'approved', 1, 13, 3, '2022-12-14 16:39:27', '2022-12-14 19:26:30'),
(12, '2022-12-16', '17:11:00', '18:11:00', 'done', 1, 3, 4, '2022-12-14 17:11:36', '2022-12-14 17:29:00'),
(13, '2022-12-15', '13:13:00', '14:13:00', 'done', 1, 3, 3, '2022-12-14 18:13:32', '2022-12-14 18:14:32'),
(14, '2022-12-16', '11:07:00', '11:12:00', 'done', 3, 3, 5, '2022-12-14 19:08:04', '2022-12-14 19:16:35'),
(15, '2022-12-16', '19:34:00', '20:34:00', 'approved', 3, 3, 8, '2022-12-14 19:35:00', '2022-12-14 19:36:51');

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
(5, 'bambang', 'bambang', 'bambang@gmail.com', '$2y$10$Fz6kO8/2vLXV8pRVcumnIeJlCNy2AhxvEJM2pFMyiXIcCcF.QiKgS', '0888888888', 'user', '2022-12-04 19:19:40', '2022-12-04 19:19:40'),
(11, 'John Doe', 'johndoe', 'johndoe@gmail.com', '$2y$10$xAYvrrSbGZ86RLvNjaJ18OPuxedKQ5y4MMUUsHp5WIx8BjXliPJ4G', '088888888888', 'user', '2022-12-06 11:20:49', '2022-12-06 11:20:49'),
(12, 'Fulan', 'fulan', 'fulan@gmail.com', '$2y$10$g1kuTYxipEGTPs92ZVSgAeajt.oWHgVkiv8RWwuAm3qntoyDSjHq2', '0888888888', 'user', '2022-12-06 11:24:20', '2022-12-06 11:24:20'),
(13, 'Momo', 'momo', 'momo@gmail.com', '$2y$10$te0D.QtcYXkKPbBEtlPPnOZjvZ6cuXfWMUB4tPq4tBMmGBKaN1XVW', '088888888888', 'user', '2022-12-14 16:04:08', '2022-12-14 16:04:08'),
(14, 'mimi', 'mimi', 'mimi@gmail.com', '$2y$10$IRskfNT8ErmPI6ehkYDb4uKppmpsA2lZ8woh0aNimNnASUHmFsWMK', '088888888888', 'user', '2022-12-14 16:41:38', '2022-12-14 16:41:38'),
(15, 'testings', 'testings', 'testings@gmail.xom', '$2y$10$WIhaV48eTx9CRLlvvAdRke/UchfKoIPEnGJm7q/BlBgT7eo1BPqAu', '08888888888888', 'user', '2022-12-15 07:14:18', '2022-12-15 07:14:18'),
(16, 'Rere', 'rere', 'rere@gmail.com', '$2y$10$dsc67N.by/33MmynlWdHQeEKvaXwO9kPf61UFKiGtDOtO7dTP2fXG', '088888888888', 'user', '2022-12-15 19:11:26', '2022-12-15 19:11:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_reservasi1` (`id_reservasi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
