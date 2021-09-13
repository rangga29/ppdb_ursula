-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 02:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_ursula`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Super Admin'),
(2, 'admin_tbtk', 'Admin TB-TK'),
(3, 'admin_sd', 'Admin SD'),
(4, 'admin_smp', 'Admin SMP'),
(5, 'admin_yayasan', 'Admin Yayasan'),
(6, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 13:50:34', 1),
(2, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 14:01:22', 1),
(3, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 14:03:45', 1),
(4, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-09 14:16:08', 1),
(5, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-09 14:17:54', 1),
(6, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 14:18:01', 1),
(7, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 14:18:54', 1),
(8, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-09 14:27:16', 1),
(9, '::1', 'sd.unit@santaursula-bdg.sch.id', 6, '2021-08-09 14:29:15', 1),
(10, '::1', 'smp@santaursula-bdg.sch.id', 7, '2021-08-09 14:29:36', 1),
(11, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 14:30:01', 1),
(12, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-09 21:29:49', 1),
(13, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-10 03:27:53', 1),
(14, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-11 10:36:26', 1),
(15, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-13 00:28:46', 1),
(16, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-13 00:32:19', 1),
(17, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-13 01:26:53', 1),
(18, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-13 01:27:41', 1),
(19, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-13 01:28:04', 1),
(20, '::1', 'superadmin', NULL, '2021-08-13 23:06:21', 0),
(21, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-13 23:06:28', 1),
(22, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 00:42:28', 1),
(23, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 00:43:06', 1),
(24, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-14 00:45:03', 1),
(25, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 01:38:32', 1),
(26, '::1', 'superadmin', NULL, '2021-08-14 03:24:14', 0),
(27, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 03:24:18', 1),
(28, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 03:35:09', 1),
(29, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-14 03:35:55', 1),
(30, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-14 03:36:35', 1),
(31, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-14 03:37:56', 1),
(32, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-14 03:41:31', 1),
(33, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-14 03:44:25', 1),
(34, '::1', 'rangga9@gmail.com', NULL, '2021-08-14 14:01:41', 0),
(35, '::1', 'superadmin', NULL, '2021-08-14 14:01:46', 0),
(36, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 14:01:51', 1),
(37, '::1', 'superadmin', NULL, '2021-08-14 14:03:03', 0),
(38, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 14:03:07', 1),
(39, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 14:03:26', 1),
(40, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-14 14:21:38', 1),
(41, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 00:10:05', 1),
(42, '::1', 'admintbtk', NULL, '2021-08-15 00:29:18', 0),
(43, '::1', 'admintbtk', NULL, '2021-08-15 00:29:26', 0),
(44, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 00:29:32', 1),
(45, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-15 01:46:36', 1),
(46, '::1', 'sd.unit@santaursula-bdg.sch.id', 6, '2021-08-15 04:53:48', 1),
(47, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 05:18:22', 1),
(48, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-15 06:03:59', 1),
(49, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 06:04:15', 1),
(50, '::1', 'sd.unit@santaursula-bdg.sch.id', 6, '2021-08-15 06:04:30', 1),
(51, '::1', 'superadmin', NULL, '2021-08-15 14:55:01', 0),
(52, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-15 14:55:05', 1),
(53, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 15:13:26', 1),
(54, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-15 15:13:47', 1),
(55, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-15 15:14:23', 1),
(56, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-15 15:17:45', 1),
(57, '::1', 'adminypb', NULL, '2021-08-15 15:29:29', 0),
(58, '::1', 'adminypb', NULL, '2021-08-15 15:29:37', 0),
(59, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-15 15:29:43', 1),
(60, '::1', 'sd.unit@santaursula-bdg.sch.id', 6, '2021-08-15 15:32:36', 1),
(61, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-15 15:35:02', 1),
(62, '::1', 'smp@santaursula-bdg.sch.id', 7, '2021-08-15 15:45:11', 1),
(63, '::1', 'sd.unit@santaursula-bdg.sch.id', 6, '2021-08-15 15:50:12', 1),
(64, '::1', 'smp@santaursula-bdg.sch.id', 7, '2021-08-15 15:52:55', 1),
(65, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-15 15:53:53', 1),
(66, '::1', 'smp@santaursula-bdg.sch.id', 7, '2021-08-15 15:54:41', 1),
(67, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-16 18:24:17', 1),
(68, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-18 20:40:53', 1),
(69, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-24 19:35:50', 1),
(70, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-24 19:36:14', 1),
(71, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-24 19:36:27', 1),
(72, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-24 20:02:01', 1),
(73, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-30 22:19:41', 1),
(74, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-31 00:22:20', 1),
(75, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-31 01:39:31', 1),
(76, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-08-31 01:46:25', 1),
(77, '::1', 'smp@santaursula-bdg.sch.id', 7, '2021-08-31 01:46:39', 1),
(78, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-31 01:48:02', 1),
(79, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-08-31 08:51:38', 1),
(80, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-08-31 20:04:08', 1),
(81, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-01 19:33:29', 1),
(82, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-03 01:08:36', 1),
(83, '::1', 'superadmin', NULL, '2021-09-03 02:06:16', 0),
(84, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-03 02:06:22', 1),
(85, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-09-04 01:23:26', 1),
(86, '::1', 'admintbtk', NULL, '2021-09-05 15:28:24', 0),
(87, '::1', 'tk@santaursula-bdg.sch.id', 5, '2021-09-05 15:28:30', 1),
(88, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-05 15:29:10', 1),
(89, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-05 17:42:21', 1),
(90, '::1', 'ypb@santaursula-bdg.sch.id', 8, '2021-09-05 18:12:24', 1),
(91, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-09-06 20:30:46', 1),
(92, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-09-07 11:28:28', 1),
(93, '::1', 'ppdb@santaursula-bdg.sch.id', 4, '2021-09-07 23:32:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage User\'s Profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1628529866, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sd`
--

CREATE TABLE `sd` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `slug_nama_lengkap` varchar(255) NOT NULL,
  `kota_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `pilihan_tingkat` tinyint(1) NOT NULL DEFAULT 0,
  `nama_orangtua` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_whatsapp` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `no_virtual` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_pendaftaran` tinyint(1) NOT NULL DEFAULT 1,
  `status_penerimaan` tinyint(1) NOT NULL DEFAULT 1,
  `status_dapodik` tinyint(1) NOT NULL DEFAULT 1,
  `status_pernyataan` tinyint(1) NOT NULL DEFAULT 1,
  `status_keuangan` tinyint(1) NOT NULL DEFAULT 1,
  `status_seragam` tinyint(1) NOT NULL DEFAULT 1,
  `status_buku` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd`
--

INSERT INTO `sd` (`id`, `nama_lengkap`, `slug_nama_lengkap`, `kota_lahir`, `tanggal_lahir`, `asal_sekolah`, `pilihan_tingkat`, `nama_orangtua`, `email`, `no_whatsapp`, `bukti_pembayaran`, `no_registrasi`, `no_virtual`, `password`, `status_pendaftaran`, `status_penerimaan`, `status_dapodik`, `status_pernyataan`, `status_keuangan`, `status_seragam`, `status_buku`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Calon Siswa SD Internal 2', 'calon-siswa-sd-internal', 'Bandung', '1212-12-12', 'TK Santa Ursula Bandung', 1, 'Cecep Supriatna', 'qwertyuiop2@gmail.com', '081234567890', '1629687419_223ee307a4a699aed539.jpg', '2223201001', '8947802223201001', '$2y$10$OWyBw6AlUlUfrrTk8rIJD.5ZCZXjmhYNKFXgja97/ji6iS1gRSB/m', 3, 1, 1, 1, 1, 1, 1, '2021-08-22 21:56:59', '2021-08-24 19:36:42', NULL),
(22, 'Calon Siswa SD External', 'calon-siswa-sd-external', 'Bandung', '1212-12-12', 'SD Santo Agustinus 2', 1, 'Cecep Supriatna', 'qwertyuiop3@gmail.com', '081234567890', '1629687458_d99a8ea00a868bdffdd2.jpg', '2223201002', '8947802223201002', '$2y$10$MdYI6MqLdsoXnB1HZPk0ju0JjAFWkByEyv3cZxLGqK7vqnxezSXFK', 3, 1, 1, 1, 1, 1, 1, '2021-08-22 21:57:38', '2021-08-24 19:36:46', NULL),
(23, 'Calon Siswa SD Internal Baru 2', 'calon-siswa-sd-internal-baru', 'Bandung', '1212-12-12', 'TK Santa Ursula Bandung', 1, 'Budiman Santoso', 'qwertyuiop30@gmail.com', '081234567890', '1630880909_9e38800df1b87ef44bed.jpeg', '2223201003', '8947802223201003', '$2y$10$l6yWAx.BUWn.siPSwKKPH.woTvo0V5r3/kQwx5U0W1ryypBTNXyvG', 3, 2, 3, 2, 2, 1, 1, '2021-09-05 17:28:30', '2021-09-05 17:55:28', NULL),
(24, 'Calon Siswa SD External Baru', 'calon-siswa-sd-external-baru', 'Bandung', '1212-12-12', 'SD Santo Agustinus', 1, 'Budiman Santoso', 'qwertyuiop40@gmail.com', '082120142028', '1630880993_c036de093790c9bb16d2.jpeg', '2223201004', '8947802223201004', '$2y$10$NOFlMz9uIGjXV3tWYHga1.tblIH9dxgKokeD7WcUiaZRJpG6sHRVK', 3, 2, 2, 2, 2, 1, 1, '2021-09-05 17:29:53', '2021-09-06 02:47:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sd_beasiswa`
--

CREATE TABLE `sd_beasiswa` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `uang_pangkal` int(64) NOT NULL,
  `uang_sekolah` int(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd_beasiswa`
--

INSERT INTO `sd_beasiswa` (`id`, `sd_id`, `uang_pangkal`, `uang_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 21, 0, 0, '2021-09-03 02:06:54', '2021-09-03 02:06:54', NULL),
(2, 22, 0, 0, '2021-09-03 02:07:00', '2021-09-03 02:07:00', NULL),
(3, 23, 500000, 0, '2021-09-05 17:42:55', '2021-09-05 17:42:55', NULL),
(4, 24, 500000, 100000, '2021-09-05 17:43:09', '2021-09-05 17:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sd_dapodik`
--

CREATE TABLE `sd_dapodik` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `nama_panggilan` varchar(64) NOT NULL,
  `kota_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `kewarganegaraan` varchar(64) NOT NULL,
  `agama` varchar(64) NOT NULL,
  `paroki` varchar(64) DEFAULT NULL,
  `kebutuhan_khusus` varchar(64) NOT NULL,
  `jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `anak_keberapa` varchar(64) NOT NULL,
  `saudara_kandung` varchar(64) NOT NULL,
  `gol_darah` varchar(64) NOT NULL,
  `tinggi` varchar(64) NOT NULL,
  `berat` varchar(64) NOT NULL,
  `kepala` varchar(64) NOT NULL,
  `nisn` varchar(64) DEFAULT NULL,
  `pas_foto` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `nkk` varchar(64) NOT NULL,
  `nak` varchar(64) NOT NULL,
  `scan_kk` varchar(64) NOT NULL,
  `scan_ak` varchar(64) NOT NULL,
  `kk_alamat` varchar(64) NOT NULL,
  `kk_rt` varchar(64) NOT NULL,
  `kk_rw` varchar(64) NOT NULL,
  `kk_kelurahan` varchar(64) NOT NULL,
  `kk_kecamatan` varchar(64) NOT NULL,
  `kk_kota` varchar(64) NOT NULL,
  `kk_kodepos` varchar(64) NOT NULL,
  `tt_alamat` varchar(64) DEFAULT NULL,
  `tt_rt` varchar(64) DEFAULT NULL,
  `tt_rw` varchar(64) DEFAULT NULL,
  `tt_kelurahan` varchar(64) DEFAULT NULL,
  `tt_kecamatan` varchar(64) DEFAULT NULL,
  `tt_kota` varchar(64) DEFAULT NULL,
  `tt_kodepos` varchar(64) DEFAULT NULL,
  `tinggal_bersama` varchar(64) NOT NULL,
  `transportasi` varchar(64) NOT NULL,
  `jarak_tempuh` varchar(64) NOT NULL,
  `waktu_tempuh` varchar(64) NOT NULL,
  `asal_sekolah` varchar(64) DEFAULT NULL,
  `asal_sekolah_alamat` text DEFAULT NULL,
  `asal_sekolah_kota` varchar(64) DEFAULT NULL,
  `ayah_nama_lengkap` varchar(64) DEFAULT NULL,
  `ayah_nik` varchar(64) DEFAULT NULL,
  `ayah_kota_lahir` varchar(64) DEFAULT NULL,
  `ayah_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ayah_agama` varchar(64) DEFAULT NULL,
  `ayah_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ayah_pendidikan` varchar(64) DEFAULT NULL,
  `ayah_pekerjaan` varchar(64) DEFAULT NULL,
  `ayah_jabatan` varchar(64) DEFAULT NULL,
  `ayah_pendapatan` varchar(64) DEFAULT NULL,
  `ayah_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_telepon` varchar(64) DEFAULT NULL,
  `ayah_email` varchar(64) DEFAULT NULL,
  `ibu_nama_lengkap` varchar(64) DEFAULT NULL,
  `ibu_nik` varchar(64) DEFAULT NULL,
  `ibu_kota_lahir` varchar(64) DEFAULT NULL,
  `ibu_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ibu_agama` varchar(64) DEFAULT NULL,
  `ibu_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ibu_pendidikan` varchar(64) DEFAULT NULL,
  `ibu_pekerjaan` varchar(64) DEFAULT NULL,
  `ibu_jabatan` varchar(64) DEFAULT NULL,
  `ibu_pendapatan` varchar(64) DEFAULT NULL,
  `ibu_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_telepon` varchar(64) DEFAULT NULL,
  `ibu_email` varchar(64) DEFAULT NULL,
  `wali_nama_lengkap` varchar(64) DEFAULT NULL,
  `wali_nik` varchar(64) DEFAULT NULL,
  `wali_kota_lahir` varchar(64) DEFAULT NULL,
  `wali_tanggal_lahir` varchar(64) DEFAULT NULL,
  `wali_agama` varchar(64) DEFAULT NULL,
  `wali_kewarganegaraan` varchar(64) DEFAULT NULL,
  `wali_pendidikan` varchar(64) DEFAULT NULL,
  `wali_pekerjaan` varchar(64) DEFAULT NULL,
  `wali_jabatan` varchar(64) DEFAULT NULL,
  `wali_pendapatan` varchar(64) DEFAULT NULL,
  `wali_nama_perusahaan` varchar(64) DEFAULT NULL,
  `wali_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `wali_telepon` varchar(64) DEFAULT NULL,
  `wali_email` varchar(64) DEFAULT NULL,
  `wali_hubungan_anak` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd_dapodik`
--

INSERT INTO `sd_dapodik` (`id`, `sd_id`, `nama_lengkap`, `nama_panggilan`, `kota_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kewarganegaraan`, `agama`, `paroki`, `kebutuhan_khusus`, `jenis_kebutuhan_khusus`, `anak_keberapa`, `saudara_kandung`, `gol_darah`, `tinggi`, `berat`, `kepala`, `nisn`, `pas_foto`, `nik`, `nkk`, `nak`, `scan_kk`, `scan_ak`, `kk_alamat`, `kk_rt`, `kk_rw`, `kk_kelurahan`, `kk_kecamatan`, `kk_kota`, `kk_kodepos`, `tt_alamat`, `tt_rt`, `tt_rw`, `tt_kelurahan`, `tt_kecamatan`, `tt_kota`, `tt_kodepos`, `tinggal_bersama`, `transportasi`, `jarak_tempuh`, `waktu_tempuh`, `asal_sekolah`, `asal_sekolah_alamat`, `asal_sekolah_kota`, `ayah_nama_lengkap`, `ayah_nik`, `ayah_kota_lahir`, `ayah_tanggal_lahir`, `ayah_agama`, `ayah_kewarganegaraan`, `ayah_pendidikan`, `ayah_pekerjaan`, `ayah_jabatan`, `ayah_pendapatan`, `ayah_nama_perusahaan`, `ayah_alamat_perusahaan`, `ayah_kebutuhan_khusus`, `ayah_jenis_kebutuhan_khusus`, `ayah_telepon`, `ayah_email`, `ibu_nama_lengkap`, `ibu_nik`, `ibu_kota_lahir`, `ibu_tanggal_lahir`, `ibu_agama`, `ibu_kewarganegaraan`, `ibu_pendidikan`, `ibu_pekerjaan`, `ibu_jabatan`, `ibu_pendapatan`, `ibu_nama_perusahaan`, `ibu_alamat_perusahaan`, `ibu_kebutuhan_khusus`, `ibu_jenis_kebutuhan_khusus`, `ibu_telepon`, `ibu_email`, `wali_nama_lengkap`, `wali_nik`, `wali_kota_lahir`, `wali_tanggal_lahir`, `wali_agama`, `wali_kewarganegaraan`, `wali_pendidikan`, `wali_pekerjaan`, `wali_jabatan`, `wali_pendapatan`, `wali_nama_perusahaan`, `wali_alamat_perusahaan`, `wali_telepon`, `wali_email`, `wali_hubungan_anak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 'Calon Siswa SD Internal Baru', 'Calon SD Internal', 'Bandung', '1212-12-12', 'Perempuan', 'WNA', 'Islam', '', 'Ya', 'Tidak Diketahui', '1', '1', 'ab', '170', '80', '50', '32040770051232341', '1630882080_daca0e71cb36a1988c82.jpeg', '3204077009030003', '3204072804050866', '3202-LT-22052011-0032', '1630882080_bc73b1ff5b7321ed9713.jpeg', '1630882125_1dad7cea706505f1ac62.jpg', 'Jalan Karang Pasundan 5', '05', '13', 'Jatiendah', 'Cilengkrang', 'Kab. Bandung', '40616', 'Jalan ABC', '01', '02', 'ABC', 'CBA', 'Bandung', '40696', 'Wali', 'Kendaraan Umum', '10', '60', 'TK Santo Agustinus', 'Jalan Bengawan No 2', 'Bandung', 'Cecep Supriatna', '3404075103910008', 'Bandung', '1212-12-12', 'Budha', 'WNA', 'S3', 'Wiraswasta', 'Manajer', 'gol1', 'PT Mantap', 'Jalan Asik No 12 Bandung', 'Ya', 'asdasdasdasd', '081234567890', 'asdasd@gmail.com', 'Cucu Supriatna', '3203012503770011', 'Bandung', '1212-12-12', 'Kong Hu Cu', 'WNA', 'D4/S1', 'Pedagang Kecil', 'Karyawan', 'gol1', 'PT Asap', 'Jalan Asap No 12 Bandung', 'Ya', 'svsavsvdasdv', '080987654321', 'dsadsa@gmail.com', 'Caca Supriatna 6', '124123123123', 'Bandung', '1212-12-12', 'Budha', 'WNI', 'D3', 'Pedagang Kecil', 'Buruh', 'gol3', 'PTPTAN', 'asdasdasdasda', '0813243546576879', 'asdasdasdasd', 'Om/Tante', '2021-09-05 17:48:00', '2021-09-05 17:48:45', NULL),
(2, 24, 'Silvester Rangga', 'Rangga', 'asfasfasf', '1212-12-12', 'Laki-Laki', 'WNI', 'Katolik', '', 'Tidak', '', '1', '4', 'ab', '170', '80', '50', '32040770051232341', '1630914440_c7463414e00f4e428806.jpg', '3204077009030003', '3204072804050866', '3202-LT-22052011-0032', '1630914440_7fed7a1ad35b89cbae65.jpg', '1630914440_906e5b3355a533125734.jpg', 'Jalan Karang Pasundan 5', '05', '13', 'Jatiendah', 'Cilengkrang', 'Kab. bandung', '40616', '', '', '', '', '', '', '', 'Orangtua', 'Jalan Kaki', '10', '60', 'TB Santa Ursula', 'Jalan Bengawan No 2', 'Bandung', 'Cecep Supriatna', '3404075103910008', 'Bandung', '1212-12-12', 'Protestan', 'WNI', 'SD', 'Tidak Bekerja', '', 'gol1', '', '', 'Tidak', '', '081234567890', 'asdasd@gmail.com', 'Cucu Supriatna', '3203012503770011', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'SD', 'Tidak Bekerja', '', 'gol1', '', '', 'Tidak', '', '080987654321', 'dsadsa@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-06 02:47:20', '2021-09-06 02:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sd_keuangan`
--

CREATE TABLE `sd_keuangan` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanggal_pembayaran` int(11) NOT NULL,
  `tahap_pembayaran` int(11) NOT NULL,
  `uang_tahap_1` int(16) DEFAULT 0,
  `status_tahap_1` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_2` int(16) DEFAULT 0,
  `status_tahap_2` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_3` int(16) DEFAULT 0,
  `status_tahap_3` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_4` int(16) DEFAULT 0,
  `status_tahap_4` int(16) NOT NULL DEFAULT 0,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd_keuangan`
--

INSERT INTO `sd_keuangan` (`id`, `sd_id`, `nama_lengkap`, `alamat`, `handphone`, `tanggal_pembayaran`, `tahap_pembayaran`, `uang_tahap_1`, `status_tahap_1`, `uang_tahap_2`, `status_tahap_2`, `uang_tahap_3`, `status_tahap_3`, `uang_tahap_4`, `status_tahap_4`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 'Silvester Rangga 2', 'Jalan ABC No 2 Bandung', '081234567890', 6, 3, 3000000, 1, 3000000, 1, 3000000, 0, 0, 0, '61354ae07c656.png', '2021-09-05 17:55:28', '2021-09-05 17:56:07', NULL),
(2, 24, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', 2, 3, 3000000, 1, 3000000, 0, 3000000, 0, 0, 0, '6135c7a8c69d4.png', '2021-09-06 02:47:52', '2021-09-06 02:56:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sd_pembayaran`
--

CREATE TABLE `sd_pembayaran` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `tahap` varchar(16) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` varchar(64) NOT NULL,
  `bukti_bayar` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd_pembayaran`
--

INSERT INTO `sd_pembayaran` (`id`, `sd_id`, `tahap`, `tanggal_bayar`, `jumlah_bayar`, `bukti_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, '1', '1212-12-12', '3000000', '1630882555_4a5dae0c3a3c65ab7cb6.jpeg', '2021-09-05 17:55:55', '2021-09-05 17:55:55', NULL),
(2, 23, '2', '1212-12-12', '3000000', '1630882567_61223f52813965cc108b.jpeg', '2021-09-05 17:56:07', '2021-09-05 17:56:07', NULL),
(3, 24, '1', '1212-12-12', '2500000', '1630915011_ecfbd48f2805213111e2.jpg', '2021-09-06 02:56:51', '2021-09-06 02:56:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sd_pernyataan`
--

CREATE TABLE `sd_pernyataan` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd_pernyataan`
--

INSERT INTO `sd_pernyataan` (`id`, `sd_id`, `nama_lengkap`, `alamat`, `handphone`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', '6135499ce1468.png', '2021-09-05 17:50:04', '2021-09-05 17:50:04', NULL),
(2, 24, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', '6135c7935803e.png', '2021-09-06 02:47:31', '2021-09-06 02:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp`
--

CREATE TABLE `smp` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `slug_nama_lengkap` varchar(255) NOT NULL,
  `kota_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `pilihan_tingkat` tinyint(1) NOT NULL DEFAULT 0,
  `nama_orangtua` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_whatsapp` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) DEFAULT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `no_virtual` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas4_sem1_indo` varchar(255) NOT NULL,
  `kelas4_sem1_mat` varchar(255) NOT NULL,
  `kelas4_sem2_indo` varchar(255) NOT NULL,
  `kelas4_sem2_mat` varchar(255) NOT NULL,
  `kelas5_sem1_indo` varchar(255) NOT NULL,
  `kelas5_sem1_mat` varchar(255) NOT NULL,
  `kelas5_sem2_indo` varchar(255) NOT NULL,
  `kelas5_sem2_mat` varchar(255) NOT NULL,
  `status_pendaftaran` tinyint(1) NOT NULL DEFAULT 1,
  `status_penerimaan` tinyint(1) NOT NULL DEFAULT 1,
  `status_dapodik` tinyint(1) NOT NULL DEFAULT 1,
  `status_pernyataan` tinyint(1) NOT NULL DEFAULT 1,
  `status_keuangan` tinyint(1) NOT NULL DEFAULT 1,
  `status_seragam` tinyint(1) NOT NULL DEFAULT 1,
  `status_buku` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp`
--

INSERT INTO `smp` (`id`, `nama_lengkap`, `slug_nama_lengkap`, `kota_lahir`, `tanggal_lahir`, `asal_sekolah`, `pilihan_tingkat`, `nama_orangtua`, `email`, `no_whatsapp`, `bukti_pembayaran`, `surat_pengantar`, `no_registrasi`, `no_virtual`, `password`, `kelas4_sem1_indo`, `kelas4_sem1_mat`, `kelas4_sem2_indo`, `kelas4_sem2_mat`, `kelas5_sem1_indo`, `kelas5_sem1_mat`, `kelas5_sem2_indo`, `kelas5_sem2_mat`, `status_pendaftaran`, `status_penerimaan`, `status_dapodik`, `status_pernyataan`, `status_keuangan`, `status_seragam`, `status_buku`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 'Calon Siswa SMP Internal', 'calon-siswa-smp-internal', 'Bandung', '1212-12-12', 'SD Santa Ursula Bandung', 7, 'Cecep Supriatna', 'qwertyuiop4@gmail.com', '081234567890', '1629687523_39c2d6bc67ba13578454.jpg', '1629687523_b3568f3e5273cadaec1e.pdf', '2223307001', '8947802223307001', '$2y$10$vuOL5qfZcwrGH.qM1./In.8y1OWfgn1UlV/S4OKqjek0vVfpYEtvG', '10', '20', '30', '40', '50', '60', '70', '80', 3, 2, 1, 1, 1, 1, 1, '2021-08-22 21:58:44', '2021-08-30 22:43:51', NULL),
(24, 'Calon Peserta Didik SMP External', 'calon-peserta-didik-smp-external', 'Bandung', '1212-12-12', 'SD Santo Agustinus', 7, 'Cecep Supriatna', 'qwertyuiop5@gmail.com', '081234567890', '1629687579_ccd855b18db57abe1a25.jpg', NULL, '2223307002', '8947802223307002', '$2y$10$EhQYhNUPMLTE/olYJqvBj.KepZ1kJMrvejCAPIbK8GhiE/nCn1dxK', '10', '20', '30', '40', '50', '60', '70', '80', 3, 1, 1, 1, 1, 1, 1, '2021-08-22 21:59:39', '2021-08-24 19:36:56', NULL),
(28, 'Silvester Rangga 2', 'silvester-rangga-2', 'Bandung', '0000-00-00', 'SD Santa Ursula Bandung', 7, 'asdasd', 'ppdb@santaursula-bdg.sch.id', '081234567890', '1630458572_e7b3e3e707f38f7eabb0.jpg', NULL, '2223307003', '8947802223307003', '$2y$10$ksVC8FpfV2QLHToy8iab1.tyGYm7uQWIfuDTmOzfau41Lb8Ify7ba', '10', '20', '30', '40', '50', '60', '70', '80', 2, 1, 1, 1, 1, 1, 1, '2021-08-31 20:09:32', '2021-08-31 20:09:32', NULL),
(29, 'Calon Siswa SMP Internal Baru', 'calon-siswa-smp-internal-baru', 'Bandung', '0012-12-12', 'SD Santa Ursula Bandung', 7, 'Cecep Supriatna', 'qwertyuiop50@gmail.com', '081234567890', '1630883444_e3d7faee8f02cce9c2f9.jpeg', '1630883444_914a9310f9891537fdb9.pdf', '2223307004', '8947802223307004', '$2y$10$ZhYlaoPubxqB4WBf/79eB.x41mzOKtUZO.hVnYje2Fp/ilUUW6xdC', '10', '20', '30', '40', '50', '60', '70', '80', 3, 2, 2, 2, 2, 1, 1, '2021-09-05 18:10:44', '2021-09-05 18:17:57', NULL),
(30, 'Calon Siswa SMP External Baru', 'calon-siswa-smp-external-baru', 'Bandung', '1212-12-12', 'SD Santo Agustinus', 7, 'Cecep Supriatna', 'qwertyuiop60@gmail.com', '081234567890', '1630883526_659cc4409a886116bc0b.jpeg', NULL, '2223307005', '8947802223307005', '$2y$10$ITKR4Gqo9U/zYeTc7O.kTungEBPxHFCR3Xy9NA7Py0KsJylqnd8t2', '10', '20', '30', '40', '50', '60', '70', '80', 3, 2, 1, 1, 2, 1, 1, '2021-09-05 18:12:06', '2021-09-05 23:05:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp_beasiswa`
--

CREATE TABLE `smp_beasiswa` (
  `id` int(11) NOT NULL,
  `smp_id` int(11) NOT NULL,
  `uang_pangkal` int(64) NOT NULL,
  `uang_sekolah` int(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp_beasiswa`
--

INSERT INTO `smp_beasiswa` (`id`, `smp_id`, `uang_pangkal`, `uang_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 500000, 0, '2021-08-30 22:46:17', '2021-08-30 22:46:17', NULL),
(2, 23, 0, 0, '2021-09-03 02:07:06', '2021-09-03 02:07:06', NULL),
(3, 23, 0, 0, '2021-09-03 02:07:11', '2021-09-03 02:07:11', NULL),
(4, 24, 0, 0, '2021-09-03 02:07:25', '2021-09-03 02:07:25', NULL),
(5, 29, 100000, 50000, '2021-09-05 18:12:49', '2021-09-05 18:12:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp_dapodik`
--

CREATE TABLE `smp_dapodik` (
  `id` int(11) NOT NULL,
  `smp_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `nama_panggilan` varchar(64) NOT NULL,
  `kota_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `kewarganegaraan` varchar(64) NOT NULL,
  `agama` varchar(64) NOT NULL,
  `paroki` varchar(64) DEFAULT NULL,
  `kebutuhan_khusus` varchar(64) NOT NULL,
  `jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `anak_keberapa` varchar(64) NOT NULL,
  `saudara_kandung` varchar(64) NOT NULL,
  `gol_darah` varchar(64) NOT NULL,
  `tinggi` varchar(64) NOT NULL,
  `berat` varchar(64) NOT NULL,
  `kepala` varchar(64) NOT NULL,
  `nisn` varchar(64) DEFAULT NULL,
  `pas_foto` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `nkk` varchar(64) NOT NULL,
  `nak` varchar(64) NOT NULL,
  `scan_kk` varchar(64) NOT NULL,
  `scan_ak` varchar(64) NOT NULL,
  `kk_alamat` varchar(64) NOT NULL,
  `kk_rt` varchar(64) NOT NULL,
  `kk_rw` varchar(64) NOT NULL,
  `kk_kelurahan` varchar(64) NOT NULL,
  `kk_kecamatan` varchar(64) NOT NULL,
  `kk_kota` varchar(64) NOT NULL,
  `kk_kodepos` varchar(64) NOT NULL,
  `tt_alamat` varchar(64) DEFAULT NULL,
  `tt_rt` varchar(64) DEFAULT NULL,
  `tt_rw` varchar(64) DEFAULT NULL,
  `tt_kelurahan` varchar(64) DEFAULT NULL,
  `tt_kecamatan` varchar(64) DEFAULT NULL,
  `tt_kota` varchar(64) DEFAULT NULL,
  `tt_kodepos` varchar(64) DEFAULT NULL,
  `tinggal_bersama` varchar(64) NOT NULL,
  `transportasi` varchar(64) NOT NULL,
  `jarak_tempuh` varchar(64) NOT NULL,
  `waktu_tempuh` varchar(64) NOT NULL,
  `asal_sekolah` varchar(64) DEFAULT NULL,
  `asal_sekolah_alamat` text DEFAULT NULL,
  `asal_sekolah_kota` varchar(64) DEFAULT NULL,
  `ayah_nama_lengkap` varchar(64) DEFAULT NULL,
  `ayah_nik` varchar(64) DEFAULT NULL,
  `ayah_kota_lahir` varchar(64) DEFAULT NULL,
  `ayah_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ayah_agama` varchar(64) DEFAULT NULL,
  `ayah_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ayah_pendidikan` varchar(64) DEFAULT NULL,
  `ayah_pekerjaan` varchar(64) DEFAULT NULL,
  `ayah_jabatan` varchar(64) DEFAULT NULL,
  `ayah_pendapatan` varchar(64) DEFAULT NULL,
  `ayah_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_telepon` varchar(64) DEFAULT NULL,
  `ayah_email` varchar(64) DEFAULT NULL,
  `ibu_nama_lengkap` varchar(64) DEFAULT NULL,
  `ibu_nik` varchar(64) DEFAULT NULL,
  `ibu_kota_lahir` varchar(64) DEFAULT NULL,
  `ibu_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ibu_agama` varchar(64) DEFAULT NULL,
  `ibu_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ibu_pendidikan` varchar(64) DEFAULT NULL,
  `ibu_pekerjaan` varchar(64) DEFAULT NULL,
  `ibu_jabatan` varchar(64) DEFAULT NULL,
  `ibu_pendapatan` varchar(64) DEFAULT NULL,
  `ibu_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_telepon` varchar(64) DEFAULT NULL,
  `ibu_email` varchar(64) DEFAULT NULL,
  `wali_nama_lengkap` varchar(64) DEFAULT NULL,
  `wali_nik` varchar(64) DEFAULT NULL,
  `wali_kota_lahir` varchar(64) DEFAULT NULL,
  `wali_tanggal_lahir` varchar(64) DEFAULT NULL,
  `wali_agama` varchar(64) DEFAULT NULL,
  `wali_kewarganegaraan` varchar(64) DEFAULT NULL,
  `wali_pendidikan` varchar(64) DEFAULT NULL,
  `wali_pekerjaan` varchar(64) DEFAULT NULL,
  `wali_jabatan` varchar(64) DEFAULT NULL,
  `wali_pendapatan` varchar(64) DEFAULT NULL,
  `wali_nama_perusahaan` varchar(64) DEFAULT NULL,
  `wali_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `wali_telepon` varchar(64) DEFAULT NULL,
  `wali_email` varchar(64) DEFAULT NULL,
  `wali_hubungan_anak` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp_dapodik`
--

INSERT INTO `smp_dapodik` (`id`, `smp_id`, `nama_lengkap`, `nama_panggilan`, `kota_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kewarganegaraan`, `agama`, `paroki`, `kebutuhan_khusus`, `jenis_kebutuhan_khusus`, `anak_keberapa`, `saudara_kandung`, `gol_darah`, `tinggi`, `berat`, `kepala`, `nisn`, `pas_foto`, `nik`, `nkk`, `nak`, `scan_kk`, `scan_ak`, `kk_alamat`, `kk_rt`, `kk_rw`, `kk_kelurahan`, `kk_kecamatan`, `kk_kota`, `kk_kodepos`, `tt_alamat`, `tt_rt`, `tt_rw`, `tt_kelurahan`, `tt_kecamatan`, `tt_kota`, `tt_kodepos`, `tinggal_bersama`, `transportasi`, `jarak_tempuh`, `waktu_tempuh`, `asal_sekolah`, `asal_sekolah_alamat`, `asal_sekolah_kota`, `ayah_nama_lengkap`, `ayah_nik`, `ayah_kota_lahir`, `ayah_tanggal_lahir`, `ayah_agama`, `ayah_kewarganegaraan`, `ayah_pendidikan`, `ayah_pekerjaan`, `ayah_jabatan`, `ayah_pendapatan`, `ayah_nama_perusahaan`, `ayah_alamat_perusahaan`, `ayah_kebutuhan_khusus`, `ayah_jenis_kebutuhan_khusus`, `ayah_telepon`, `ayah_email`, `ibu_nama_lengkap`, `ibu_nik`, `ibu_kota_lahir`, `ibu_tanggal_lahir`, `ibu_agama`, `ibu_kewarganegaraan`, `ibu_pendidikan`, `ibu_pekerjaan`, `ibu_jabatan`, `ibu_pendapatan`, `ibu_nama_perusahaan`, `ibu_alamat_perusahaan`, `ibu_kebutuhan_khusus`, `ibu_jenis_kebutuhan_khusus`, `ibu_telepon`, `ibu_email`, `wali_nama_lengkap`, `wali_nik`, `wali_kota_lahir`, `wali_tanggal_lahir`, `wali_agama`, `wali_kewarganegaraan`, `wali_pendidikan`, `wali_pekerjaan`, `wali_jabatan`, `wali_pendapatan`, `wali_nama_perusahaan`, `wali_alamat_perusahaan`, `wali_telepon`, `wali_email`, `wali_hubungan_anak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 'Calon Siswa SMP Internal Baru', 'Calon Siswa SMP Internal', 'Bandung', '1212-12-12', 'Laki-Laki', 'WNI', 'Katolik', '', 'Tidak', '', '1', '4', 'o', '170', '80', '50', '', '1630883742_c98f61e9fb097b43e7af.jpeg', '3204077009030003', '3204072804050866', '3202-LT-22052011-0032', '1630883742_6ce0628d7fe02ad5237d.jpeg', '1630883742_e72b089d302a34817333.jpeg', 'Jalan Karang Pasundan 5', '05', '13', 'Jatiendah', 'Cilengkrang', 'Kab. Bandung', '40616', '', '', '', '', '', '', '', 'Orangtua', 'Kendaraan Pribadi', '10', '60', 'SD Santo Agustinus', 'Jalan Bengawan No 2', 'Bandung', 'Cecep Supriatna', '3404075103910008', 'Bandung', '1212-02-21', 'Islam', 'WNA', 'D1', 'Wiraswasta', '', 'gol1', '', '', 'Tidak', '', '081234567890', 'asdasd@gmail.com', 'Cucu Supriatna 2', '3203012503770011', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'D3', 'Wirausaha', '', 'gol1', '', '', 'Tidak', '', '080987654321', 'dsadsa@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-05 18:15:42', '2021-09-05 18:16:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp_keuangan`
--

CREATE TABLE `smp_keuangan` (
  `id` int(11) NOT NULL,
  `smp_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanggal_pembayaran` int(11) NOT NULL,
  `tahap_pembayaran` int(11) NOT NULL,
  `uang_tahap_1` int(16) DEFAULT 0,
  `status_tahap_1` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_2` int(16) DEFAULT 0,
  `status_tahap_2` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_3` int(16) DEFAULT 0,
  `status_tahap_3` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_4` int(16) DEFAULT 0,
  `status_tahap_4` int(16) NOT NULL DEFAULT 0,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp_keuangan`
--

INSERT INTO `smp_keuangan` (`id`, `smp_id`, `nama_lengkap`, `alamat`, `handphone`, `tanggal_pembayaran`, `tahap_pembayaran`, `uang_tahap_1`, `status_tahap_1`, `uang_tahap_2`, `status_tahap_2`, `uang_tahap_3`, `status_tahap_3`, `uang_tahap_4`, `status_tahap_4`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 'Cecep Supriatna', 'Jalan ABC No 2 Bandung', '24123123', 15, 4, 3000000, 1, 3000000, 0, 3000000, 0, 900000, 0, '613550259a1d5.png', '2021-09-05 18:17:57', '2021-09-05 18:18:11', NULL),
(2, 30, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', 5, 4, 3000000, 1, 3000000, 0, 3000000, 0, 1000000, 0, '61359389b90c2.png', '2021-09-05 23:05:29', '2021-09-05 23:06:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp_pembayaran`
--

CREATE TABLE `smp_pembayaran` (
  `id` int(11) NOT NULL,
  `smp_id` int(11) NOT NULL,
  `tahap` varchar(16) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` varchar(64) NOT NULL,
  `bukti_bayar` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp_pembayaran`
--

INSERT INTO `smp_pembayaran` (`id`, `smp_id`, `tahap`, `tanggal_bayar`, `jumlah_bayar`, `bukti_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, '1', '1212-12-12', '2000000', '1630883891_533ea097139786607a75.jpeg', '2021-09-05 18:18:11', '2021-09-05 18:18:11', NULL),
(2, 30, '1', '1212-12-12', '2000000', '1630901204_e955eef0a924e840c356.jpg', '2021-09-05 23:06:44', '2021-09-05 23:06:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smp_pernyataan`
--

CREATE TABLE `smp_pernyataan` (
  `id` int(11) NOT NULL,
  `smp_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp_pernyataan`
--

INSERT INTO `smp_pernyataan` (`id`, `smp_id`, `nama_lengkap`, `alamat`, `handphone`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 'Silvester Rangga 2', 'Jalan ABC No 2 Bandung', '24123123', '6135500030a8f.png', '2021-09-05 18:17:20', '2021-09-05 18:17:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk`
--

CREATE TABLE `tbtk` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `slug_nama_lengkap` varchar(255) NOT NULL,
  `kota_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `pilihan_tingkat` tinyint(1) NOT NULL DEFAULT 0,
  `nama_orangtua` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_whatsapp` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `no_virtual` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_pendaftaran` tinyint(1) NOT NULL DEFAULT 1,
  `status_penerimaan` tinyint(1) NOT NULL DEFAULT 1,
  `status_dapodik` tinyint(1) NOT NULL DEFAULT 1,
  `status_pernyataan` tinyint(1) NOT NULL DEFAULT 1,
  `status_keuangan` tinyint(1) NOT NULL DEFAULT 1,
  `status_seragam` tinyint(1) NOT NULL DEFAULT 1,
  `status_buku` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk`
--

INSERT INTO `tbtk` (`id`, `nama_lengkap`, `slug_nama_lengkap`, `kota_lahir`, `tanggal_lahir`, `asal_sekolah`, `pilihan_tingkat`, `nama_orangtua`, `email`, `no_whatsapp`, `bukti_pembayaran`, `no_registrasi`, `no_virtual`, `password`, `status_pendaftaran`, `status_penerimaan`, `status_dapodik`, `status_pernyataan`, `status_keuangan`, `status_seragam`, `status_buku`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'Silvester Rangga', 'silvester-rangga', 'Bandung', '1212-12-12', 'TB Santa Ursula', 2, 'Cecep Supriatna', 'qwertyuiop1@gmail.com', '081234567890', '1629678871_dfdc69860933bd29e8ff.jpg', '2223102001', '8947802223102001', '$2y$10$Nj2GImJGhPJ8rySlZ9a1ZuzMCoJg7NNQeINm4xcvMLdV.ZCgVnryG', 3, 2, 3, 2, 2, 1, 1, '2021-08-22 19:34:31', '2021-09-08 00:37:02', NULL),
(20, 'Calon Peserta Didik TK', 'calon-peserta-didik-tk', 'Bandung', '1212-12-12', '', 1, 'Budiman Santoso', 'qwertyuiop2@gmail.com', '081234567890', '1630342689_2bc3afba88323d448699.jpg', '2223101001', '8947802223101001', '$2y$10$5kbT91Uli2uqY09MFHPvF..q0elF76uqwmBgbvZ7lXHlGXkH5mPza', 3, 2, 1, 1, 2, 1, 1, '2021-09-01 11:58:09', '2021-09-08 00:33:23', NULL),
(21, 'Calon Siswa TB Baru', 'calon-siswa-tb', 'Bandung', '1212-12-12', '', 1, 'Fransiskus Gregorius Josephus', 'qwertyuiop10@gmail.com', '081234567890', '1630873037_a7af1f2f44b30409a8fc.jpg', '2223101002', '8947802223101002', '$2y$10$K8I2wkC58OnUx1K7xtcAT.JNlVORgp.xZcs6.3WO4KLNjgyi53CiK', 3, 2, 2, 3, 3, 1, 1, '2021-09-05 15:17:17', '2021-09-08 00:31:56', NULL),
(22, 'Calon Siswa TK', 'calon-siswa-tk', 'Bandung', '1212-12-12', 'TB Santa Ursula', 2, 'Fransiskus Gregorius Josephus', 'qwertyuiop20@gmail.com', '081234567890', '1630873122_09af644dd3e3ae43d952.jpg', '2223102002', '8947802223102002', '$2y$10$yPqqLImQ2ARPc2rLp6y9A.mJbb/4vB66bRENtt.M0LRGgJSTIG.C2', 3, 2, 1, 2, 1, 1, 1, '2021-09-05 15:18:42', '2021-09-05 16:02:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk_beasiswa`
--

CREATE TABLE `tbtk_beasiswa` (
  `id` int(11) NOT NULL,
  `tbtk_id` int(11) NOT NULL,
  `uang_pangkal` int(64) NOT NULL,
  `uang_sekolah` int(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk_beasiswa`
--

INSERT INTO `tbtk_beasiswa` (`id`, `tbtk_id`, `uang_pangkal`, `uang_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 19, 100000, 100000, '2021-09-03 02:06:32', '2021-09-07 01:48:10', NULL),
(6, 21, 500000, 50000, '2021-09-05 15:29:27', '2021-09-05 15:29:27', NULL),
(7, 20, 100000, 20000, '2021-09-07 01:22:36', '2021-09-07 01:22:36', NULL),
(8, 22, 0, 0, '2021-09-07 01:48:18', '2021-09-07 01:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk_dapodik`
--

CREATE TABLE `tbtk_dapodik` (
  `id` int(11) NOT NULL,
  `tbtk_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `nama_panggilan` varchar(64) NOT NULL,
  `kota_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `kewarganegaraan` varchar(64) NOT NULL,
  `agama` varchar(64) NOT NULL,
  `paroki` varchar(64) DEFAULT NULL,
  `kebutuhan_khusus` varchar(64) NOT NULL,
  `jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `anak_keberapa` varchar(64) NOT NULL,
  `saudara_kandung` varchar(64) NOT NULL,
  `gol_darah` varchar(64) NOT NULL,
  `tinggi` varchar(64) NOT NULL,
  `berat` varchar(64) NOT NULL,
  `kepala` varchar(64) NOT NULL,
  `nisn` varchar(64) DEFAULT NULL,
  `pas_foto` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `nkk` varchar(64) NOT NULL,
  `nak` varchar(64) NOT NULL,
  `scan_kk` varchar(64) NOT NULL,
  `scan_ak` varchar(64) NOT NULL,
  `kk_alamat` varchar(64) NOT NULL,
  `kk_rt` varchar(64) NOT NULL,
  `kk_rw` varchar(64) NOT NULL,
  `kk_kelurahan` varchar(64) NOT NULL,
  `kk_kecamatan` varchar(64) NOT NULL,
  `kk_kota` varchar(64) NOT NULL,
  `kk_kodepos` varchar(64) NOT NULL,
  `tt_alamat` varchar(64) DEFAULT NULL,
  `tt_rt` varchar(64) DEFAULT NULL,
  `tt_rw` varchar(64) DEFAULT NULL,
  `tt_kelurahan` varchar(64) DEFAULT NULL,
  `tt_kecamatan` varchar(64) DEFAULT NULL,
  `tt_kota` varchar(64) DEFAULT NULL,
  `tt_kodepos` varchar(64) DEFAULT NULL,
  `tinggal_bersama` varchar(64) NOT NULL,
  `transportasi` varchar(64) NOT NULL,
  `jarak_tempuh` varchar(64) NOT NULL,
  `waktu_tempuh` varchar(64) NOT NULL,
  `asal_sekolah` varchar(64) DEFAULT NULL,
  `asal_sekolah_alamat` text DEFAULT NULL,
  `asal_sekolah_kota` varchar(64) DEFAULT NULL,
  `ayah_nama_lengkap` varchar(64) DEFAULT NULL,
  `ayah_nik` varchar(64) DEFAULT NULL,
  `ayah_kota_lahir` varchar(64) DEFAULT NULL,
  `ayah_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ayah_agama` varchar(64) DEFAULT NULL,
  `ayah_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ayah_pendidikan` varchar(64) DEFAULT NULL,
  `ayah_pekerjaan` varchar(64) DEFAULT NULL,
  `ayah_jabatan` varchar(64) DEFAULT NULL,
  `ayah_pendapatan` varchar(64) DEFAULT NULL,
  `ayah_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ayah_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ayah_telepon` varchar(64) DEFAULT NULL,
  `ayah_email` varchar(64) DEFAULT NULL,
  `ibu_nama_lengkap` varchar(64) DEFAULT NULL,
  `ibu_nik` varchar(64) DEFAULT NULL,
  `ibu_kota_lahir` varchar(64) DEFAULT NULL,
  `ibu_tanggal_lahir` varchar(64) DEFAULT NULL,
  `ibu_agama` varchar(64) DEFAULT NULL,
  `ibu_kewarganegaraan` varchar(64) DEFAULT NULL,
  `ibu_pendidikan` varchar(64) DEFAULT NULL,
  `ibu_pekerjaan` varchar(64) DEFAULT NULL,
  `ibu_jabatan` varchar(64) DEFAULT NULL,
  `ibu_pendapatan` varchar(64) DEFAULT NULL,
  `ibu_nama_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `ibu_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_jenis_kebutuhan_khusus` varchar(64) DEFAULT NULL,
  `ibu_telepon` varchar(64) DEFAULT NULL,
  `ibu_email` varchar(64) DEFAULT NULL,
  `wali_nama_lengkap` varchar(64) DEFAULT NULL,
  `wali_nik` varchar(64) DEFAULT NULL,
  `wali_kota_lahir` varchar(64) DEFAULT NULL,
  `wali_tanggal_lahir` varchar(64) DEFAULT NULL,
  `wali_agama` varchar(64) DEFAULT NULL,
  `wali_kewarganegaraan` varchar(64) DEFAULT NULL,
  `wali_pendidikan` varchar(64) DEFAULT NULL,
  `wali_pekerjaan` varchar(64) DEFAULT NULL,
  `wali_jabatan` varchar(64) DEFAULT NULL,
  `wali_pendapatan` varchar(64) DEFAULT NULL,
  `wali_nama_perusahaan` varchar(64) DEFAULT NULL,
  `wali_alamat_perusahaan` varchar(64) DEFAULT NULL,
  `wali_telepon` varchar(64) DEFAULT NULL,
  `wali_email` varchar(64) DEFAULT NULL,
  `wali_hubungan_anak` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk_dapodik`
--

INSERT INTO `tbtk_dapodik` (`id`, `tbtk_id`, `nama_lengkap`, `nama_panggilan`, `kota_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kewarganegaraan`, `agama`, `paroki`, `kebutuhan_khusus`, `jenis_kebutuhan_khusus`, `anak_keberapa`, `saudara_kandung`, `gol_darah`, `tinggi`, `berat`, `kepala`, `nisn`, `pas_foto`, `nik`, `nkk`, `nak`, `scan_kk`, `scan_ak`, `kk_alamat`, `kk_rt`, `kk_rw`, `kk_kelurahan`, `kk_kecamatan`, `kk_kota`, `kk_kodepos`, `tt_alamat`, `tt_rt`, `tt_rw`, `tt_kelurahan`, `tt_kecamatan`, `tt_kota`, `tt_kodepos`, `tinggal_bersama`, `transportasi`, `jarak_tempuh`, `waktu_tempuh`, `asal_sekolah`, `asal_sekolah_alamat`, `asal_sekolah_kota`, `ayah_nama_lengkap`, `ayah_nik`, `ayah_kota_lahir`, `ayah_tanggal_lahir`, `ayah_agama`, `ayah_kewarganegaraan`, `ayah_pendidikan`, `ayah_pekerjaan`, `ayah_jabatan`, `ayah_pendapatan`, `ayah_nama_perusahaan`, `ayah_alamat_perusahaan`, `ayah_kebutuhan_khusus`, `ayah_jenis_kebutuhan_khusus`, `ayah_telepon`, `ayah_email`, `ibu_nama_lengkap`, `ibu_nik`, `ibu_kota_lahir`, `ibu_tanggal_lahir`, `ibu_agama`, `ibu_kewarganegaraan`, `ibu_pendidikan`, `ibu_pekerjaan`, `ibu_jabatan`, `ibu_pendapatan`, `ibu_nama_perusahaan`, `ibu_alamat_perusahaan`, `ibu_kebutuhan_khusus`, `ibu_jenis_kebutuhan_khusus`, `ibu_telepon`, `ibu_email`, `wali_nama_lengkap`, `wali_nik`, `wali_kota_lahir`, `wali_tanggal_lahir`, `wali_agama`, `wali_kewarganegaraan`, `wali_pendidikan`, `wali_pekerjaan`, `wali_jabatan`, `wali_pendapatan`, `wali_nama_perusahaan`, `wali_alamat_perusahaan`, `wali_telepon`, `wali_email`, `wali_hubungan_anak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 19, 'Silvester Rangga 2', 'Rangga', 'Bandung', '1212-12-12', 'Perempuan', 'WNA', 'Protestan', 'Santa Odilia', 'Ya', 'Tidak Diketahui', '1', '4', 'ab', '170', '80', '50', '32040770051232341', '1630530303_3dbce252757cd567b8a3.jpg', '3204077009030003', '3204072804050866', '3202-LT-22052011-0032', '1630700977_59f396d0702912b51965.png', '1630530373_df666fe768d328927a4a.jpg', 'Jalan Karang Pasundan 5', '05', '13', 'Jatiendah', 'Cilengkrang', 'Kab. bandung', '40616', 'Jalan ABC', '01', '02', 'ABC', 'CBA', 'Bandung', '40696', 'Orangtua', 'Jalan Kaki', '10', '60', 'TK Santo Agustinus', 'Jalan Bengawan No 2', 'Bandung', 'Cecep Supriatna', '3404075103910008', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'SD', 'Tidak Bekerja', 'Manajer', 'gol1', 'Mantap', 'Jalan Asik No 12 Bandung', 'Ya', 'asdasdasdasd', '081234567890', 'asdasd@gmail.com', 'Cucu Supriatna', '3203012503770011', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'SD', 'Tidak Bekerja', 'Karyawan', 'gol1', 'PT Asap', 'Jalan Asap No 12 Bandung', 'Ya', 'svsavsvdasdv', '080987654321', 'dsadsa@gmail.com', 'Caca Supriatna', '124123123123', 'Bandung', '1212-12-12', 'Hindu', 'WNI', 'D1', 'Pedagang Besar', 'Buruh', 'gol3', 'PTPTAN', 'asdasdasdasda', '0813243546576879', 'asdasdasdasd', 'Om/Tante', '2021-09-01 00:53:35', '2021-09-03 15:29:37', NULL),
(8, 21, 'Calon Siswa TB Baru', 'TB Baru 2', 'Bandung', '1212-12-12', 'Laki-Laki', 'WNI', 'Protestan', 'Santa Odilia', 'Tidak', '', '1', '4', 'o', '170', '80', '50', '32040770051232341', '1630875088_98226f2b4161afc9b791.jpeg', '3204077009030003', '3204072804050866', '3202-LT-22052011-0032', '1630874852_49b5e6982fe667181456.jpg', '1630874852_47f65dabb91e902eb4b3.jpg', 'Jalan Karang Pasundan 5', '05', '13', 'Jatiendah', 'Cilengkrang', 'Kab. Bandung', '40616', '', '', '', '', '', '', '', 'Orangtua', 'Kendaraan Pribadi', '10', '60', NULL, NULL, NULL, 'Cecep Supriatna', '3404075103910008', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'D4/S1', 'Karyawan Swasta', '', 'gol1', 'PT Mantap', 'Jalan Asik No 12 Bandung', 'Tidak', '', '081234567890', 'asdasd@gmail.com', 'Cucu Supriatna', '3203012503770011', 'Bandung', '1212-12-12', 'Katolik', 'WNI', 'SD', 'Tidak Bekerja', '', 'gol1', '', '', 'Tidak', '', '080987654321', 'dsadsa@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-05 15:47:32', '2021-09-05 15:51:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk_keuangan`
--

CREATE TABLE `tbtk_keuangan` (
  `id` int(11) NOT NULL,
  `tbtk_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanggal_pembayaran` int(11) NOT NULL,
  `tahap_pembayaran` int(11) NOT NULL,
  `uang_tahap_1` int(16) DEFAULT 0,
  `status_tahap_1` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_2` int(16) DEFAULT 0,
  `status_tahap_2` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_3` int(16) DEFAULT 0,
  `status_tahap_3` int(16) NOT NULL DEFAULT 0,
  `uang_tahap_4` int(16) DEFAULT 0,
  `status_tahap_4` int(16) NOT NULL DEFAULT 0,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk_keuangan`
--

INSERT INTO `tbtk_keuangan` (`id`, `tbtk_id`, `nama_lengkap`, `alamat`, `handphone`, `tanggal_pembayaran`, `tahap_pembayaran`, `uang_tahap_1`, `status_tahap_1`, `uang_tahap_2`, `status_tahap_2`, `uang_tahap_3`, `status_tahap_3`, `uang_tahap_4`, `status_tahap_4`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 'Cecep Supriatna', 'Jalan ABC No 2 Bandung', '081234567890', 5, 3, 2500000, 1, 2500000, 1, 2500000, 0, 0, 0, '6131b7865cd93.png', '2021-09-03 00:49:58', '2021-09-05 14:44:40', NULL),
(3, 20, 'Cecep Supriatna', 'Jalan ABC No 2 Bandung', '081234567890', 20, 3, 2500000, 0, 2500000, 0, 2500000, 0, 0, 0, '6131be9a3c132.png', '2021-09-03 01:20:10', '2021-09-03 01:20:10', NULL),
(6, 21, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', 10, 4, 2000000, 1, 2000000, 1, 2000000, 1, 1000000, 1, '613531c61e6fd.png', '2021-09-05 16:08:22', '2021-09-05 16:10:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk_pembayaran`
--

CREATE TABLE `tbtk_pembayaran` (
  `id` int(11) NOT NULL,
  `tbtk_id` int(11) NOT NULL,
  `tahap` varchar(16) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` varchar(64) NOT NULL,
  `bukti_bayar` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk_pembayaran`
--

INSERT INTO `tbtk_pembayaran` (`id`, `tbtk_id`, `tahap`, `tanggal_bayar`, `jumlah_bayar`, `bukti_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 19, '1', '1212-12-12', '2500000', '1630869759_4e79d6f47462cbe987ce.jpg', '2021-09-05 14:22:39', '2021-09-05 14:22:39', NULL),
(4, 19, '2', '1212-12-12', '2500000', '1630871080_20dd1bee8ac4ebf7615a.jpg', '2021-09-05 14:44:40', '2021-09-05 14:44:40', NULL),
(5, 21, '1', '1212-12-12', '2000000', '1630876153_d6ef0eafb47ef3be5414.jpeg', '2021-09-05 16:09:13', '2021-09-05 16:09:13', NULL),
(6, 21, '2', '1212-12-12', '2500000', '1630876167_7f5abc05bff13eddf46d.jpeg', '2021-09-05 16:09:27', '2021-09-05 16:09:27', NULL),
(7, 21, '3', '1212-12-12', '1000000', '1630876187_9a35f72aa07818e0e452.jpeg', '2021-09-05 16:09:47', '2021-09-05 16:09:47', NULL),
(8, 21, '4', '1212-12-12', '1500000', '1630876217_e4a7610a4795c6e0c50f.jpeg', '2021-09-05 16:10:17', '2021-09-05 16:10:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbtk_pernyataan`
--

CREATE TABLE `tbtk_pernyataan` (
  `id` int(11) NOT NULL,
  `tbtk_id` int(11) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `handphone` varchar(64) NOT NULL,
  `tanda_tangan` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtk_pernyataan`
--

INSERT INTO `tbtk_pernyataan` (`id`, `tbtk_id`, `nama_lengkap`, `alamat`, `handphone`, `tanda_tangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 22, 'Silvester Rangga 2', 'Jalan ABC No 2 Bandung', '081234567890', '6135305b47800.png', '2021-09-05 16:02:19', '2021-09-05 16:02:19', NULL),
(3, 21, 'Silvester Rangga', 'Jalan ABC No 2 Bandung', '081234567890', '613530b120b50.png', '2021-09-05 16:03:45', '2021-09-05 16:03:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ppdb@santaursula-bdg.sch.id', 'superadmin', NULL, 'default.png', '$2y$10$smoAmFwCB8GKTKUHTuYjaOec205nyS3ActHO8vPeaK41fzrHJ4NbG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-09 13:50:15', '2021-08-09 13:50:15', NULL),
(5, 'tk@santaursula-bdg.sch.id', 'admintbtk', NULL, 'default.png', '$2y$10$qkLCWVCXxcrdGtO.60hQd.HMXqfzb9dRXP8RWVYlJc10bu93CzW76', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-09 14:15:48', '2021-08-09 14:15:48', NULL),
(6, 'sd.unit@santaursula-bdg.sch.id', 'adminsd', NULL, 'default.png', '$2y$10$DRY5O.hzu4ZjeZMpsmXJr.Ys5pJ1LqaVJ87Dx6Sr4ki0oIBPqQGGS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-09 14:16:31', '2021-08-09 14:16:31', NULL),
(7, 'smp@santaursula-bdg.sch.id', 'adminsmp', NULL, 'default.png', '$2y$10$sd6v4/JoKf5xzV71LkFzRu9cN0ABgtUJrQYcOpuLQhkWATEwAPoK.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-09 14:17:00', '2021-08-09 14:17:00', NULL),
(8, 'ypb@santaursula-bdg.sch.id', 'adminypb', NULL, 'default.png', '$2y$10$Cc0LuQJdrxw.Hx5ES4SLMudHd23WJsvTwSByqW8uTNuIZ9HkBgR5S', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-09 14:17:43', '2021-08-09 14:17:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd`
--
ALTER TABLE `sd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_beasiswa`
--
ALTER TABLE `sd_beasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sd_beasiswa` (`sd_id`);

--
-- Indexes for table `sd_dapodik`
--
ALTER TABLE `sd_dapodik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sd_dapodik` (`sd_id`);

--
-- Indexes for table `sd_keuangan`
--
ALTER TABLE `sd_keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sd_keuangan` (`sd_id`);

--
-- Indexes for table `sd_pembayaran`
--
ALTER TABLE `sd_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sd_pembayaran` (`sd_id`);

--
-- Indexes for table `sd_pernyataan`
--
ALTER TABLE `sd_pernyataan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sd_pernyataan` (`sd_id`);

--
-- Indexes for table `smp`
--
ALTER TABLE `smp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smp_beasiswa`
--
ALTER TABLE `smp_beasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_smp_beasiswa` (`smp_id`);

--
-- Indexes for table `smp_dapodik`
--
ALTER TABLE `smp_dapodik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_smp_dapodik` (`smp_id`);

--
-- Indexes for table `smp_keuangan`
--
ALTER TABLE `smp_keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_smp_keuangan` (`smp_id`);

--
-- Indexes for table `smp_pembayaran`
--
ALTER TABLE `smp_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_smp_pembayaran` (`smp_id`);

--
-- Indexes for table `smp_pernyataan`
--
ALTER TABLE `smp_pernyataan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_smp_pernyataan` (`smp_id`);

--
-- Indexes for table `tbtk`
--
ALTER TABLE `tbtk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbtk_beasiswa`
--
ALTER TABLE `tbtk_beasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tbtk_beasiswa` (`tbtk_id`);

--
-- Indexes for table `tbtk_dapodik`
--
ALTER TABLE `tbtk_dapodik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tbtk_dapodik` (`tbtk_id`);

--
-- Indexes for table `tbtk_keuangan`
--
ALTER TABLE `tbtk_keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tbtk_keuangan` (`tbtk_id`);

--
-- Indexes for table `tbtk_pembayaran`
--
ALTER TABLE `tbtk_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tbtk_pembayaran` (`tbtk_id`);

--
-- Indexes for table `tbtk_pernyataan`
--
ALTER TABLE `tbtk_pernyataan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tbtk_pernyataan` (`tbtk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sd`
--
ALTER TABLE `sd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sd_beasiswa`
--
ALTER TABLE `sd_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sd_dapodik`
--
ALTER TABLE `sd_dapodik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sd_keuangan`
--
ALTER TABLE `sd_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sd_pembayaran`
--
ALTER TABLE `sd_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sd_pernyataan`
--
ALTER TABLE `sd_pernyataan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smp`
--
ALTER TABLE `smp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `smp_beasiswa`
--
ALTER TABLE `smp_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smp_dapodik`
--
ALTER TABLE `smp_dapodik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smp_keuangan`
--
ALTER TABLE `smp_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smp_pembayaran`
--
ALTER TABLE `smp_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smp_pernyataan`
--
ALTER TABLE `smp_pernyataan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbtk`
--
ALTER TABLE `tbtk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbtk_beasiswa`
--
ALTER TABLE `tbtk_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbtk_dapodik`
--
ALTER TABLE `tbtk_dapodik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbtk_keuangan`
--
ALTER TABLE `tbtk_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbtk_pembayaran`
--
ALTER TABLE `tbtk_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbtk_pernyataan`
--
ALTER TABLE `tbtk_pernyataan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sd_beasiswa`
--
ALTER TABLE `sd_beasiswa`
  ADD CONSTRAINT `id_sd_beasiswa` FOREIGN KEY (`sd_id`) REFERENCES `sd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sd_dapodik`
--
ALTER TABLE `sd_dapodik`
  ADD CONSTRAINT `id_sd_dapodik` FOREIGN KEY (`sd_id`) REFERENCES `sd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sd_keuangan`
--
ALTER TABLE `sd_keuangan`
  ADD CONSTRAINT `id_sd_keuangan` FOREIGN KEY (`sd_id`) REFERENCES `sd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sd_pembayaran`
--
ALTER TABLE `sd_pembayaran`
  ADD CONSTRAINT `id_sd_pembayaran` FOREIGN KEY (`sd_id`) REFERENCES `sd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sd_pernyataan`
--
ALTER TABLE `sd_pernyataan`
  ADD CONSTRAINT `id_sd_pernyataan` FOREIGN KEY (`sd_id`) REFERENCES `sd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_beasiswa`
--
ALTER TABLE `smp_beasiswa`
  ADD CONSTRAINT `id_smp_beasiswa` FOREIGN KEY (`smp_id`) REFERENCES `smp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_dapodik`
--
ALTER TABLE `smp_dapodik`
  ADD CONSTRAINT `id_smp_dapodik` FOREIGN KEY (`smp_id`) REFERENCES `smp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_keuangan`
--
ALTER TABLE `smp_keuangan`
  ADD CONSTRAINT `id_smp_keuangan` FOREIGN KEY (`smp_id`) REFERENCES `smp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_pembayaran`
--
ALTER TABLE `smp_pembayaran`
  ADD CONSTRAINT `id_smp_pembayaran` FOREIGN KEY (`smp_id`) REFERENCES `smp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_pernyataan`
--
ALTER TABLE `smp_pernyataan`
  ADD CONSTRAINT `id_smp_pernyataan` FOREIGN KEY (`smp_id`) REFERENCES `smp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtk_beasiswa`
--
ALTER TABLE `tbtk_beasiswa`
  ADD CONSTRAINT `id_tbtk_beasiswa` FOREIGN KEY (`tbtk_id`) REFERENCES `tbtk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtk_dapodik`
--
ALTER TABLE `tbtk_dapodik`
  ADD CONSTRAINT `id_tbtk_dapodik` FOREIGN KEY (`tbtk_id`) REFERENCES `tbtk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtk_keuangan`
--
ALTER TABLE `tbtk_keuangan`
  ADD CONSTRAINT `id_tbtk_keuangan` FOREIGN KEY (`tbtk_id`) REFERENCES `tbtk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtk_pembayaran`
--
ALTER TABLE `tbtk_pembayaran`
  ADD CONSTRAINT `id_tbtk_pembayaran` FOREIGN KEY (`tbtk_id`) REFERENCES `tbtk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtk_pernyataan`
--
ALTER TABLE `tbtk_pernyataan`
  ADD CONSTRAINT `id_tbtk_pernyataan` FOREIGN KEY (`tbtk_id`) REFERENCES `tbtk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
