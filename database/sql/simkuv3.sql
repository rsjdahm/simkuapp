-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2022 at 09:45 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkuv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `urusan_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'UMUM', '2022-12-17 13:48:35', '2022-12-17 13:48:35', NULL),
(2, 2, 2, 'URUSAN PEMERINTAHAN BIDANG KESEHATAN', '2022-12-17 13:49:03', '2022-12-17 13:49:03', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `program_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 110, 'Peningkatan Pelayanan BLUD', '2022-12-17 14:43:30', '2022-12-17 14:43:30', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(15, '2022_12_16_085814_create_urusan_table', 5),
(16, '2022_12_17_012539_create_bidang_table', 6),
(17, '2022_12_17_124237_create_program_table', 7),
(18, '2022_12_17_221500_create_kegiatan_table', 8),
(19, '2022_12_17_230935_create_sub_kegiatan_table', 9),
(20, '2022_12_18_004147_create_rek_akun_table', 10),
(21, '2022_12_18_005731_create_rek_kelompok_table', 11),
(22, '2022_12_18_044118_create_rek_jenis_table', 12),
(23, '2022_12_18_052821_create_rek_objek_table', 13),
(24, '2022_12_18_080733_create_rek_rincian_objek_table', 14),
(25, '2022_12_18_084238_create_rek_sub_rincian_objek_table', 15);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `bidang_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI', '2022-12-17 13:55:41', '2022-12-17 13:55:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rek_akun`
--

CREATE TABLE `rek_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_akun`
--

INSERT INTO `rek_akun` (`id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ASET', '2022-12-17 16:52:22', '2022-12-17 16:52:22', NULL),
(2, 2, 'KEWAJIBAN', '2022-12-17 16:52:38', '2022-12-17 16:52:38', NULL),
(3, 3, 'EKUITAS', '2022-12-17 16:52:45', '2022-12-17 16:52:45', NULL),
(4, 4, 'PENDAPATAN DAERAH', '2022-12-17 16:52:53', '2022-12-17 16:52:53', NULL),
(5, 5, 'BELANJA DAERAH', '2022-12-17 16:53:01', '2022-12-17 16:53:01', NULL),
(6, 6, 'PEMBIAYAAN DAERAH', '2022-12-17 16:53:10', '2022-12-17 16:53:10', NULL),
(7, 7, 'PENDAPATAN DAERAH-LO', '2022-12-17 16:53:17', '2022-12-17 16:53:17', NULL),
(8, 8, 'BEBAN DAERAH', '2022-12-17 16:53:26', '2022-12-17 16:54:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rek_jenis`
--

CREATE TABLE `rek_jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_kelompok_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_jenis`
--

INSERT INTO `rek_jenis` (`id`, `rek_kelompok_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Belanja Pegawai', '2022-12-17 20:58:10', '2022-12-17 21:14:09', NULL),
(2, 1, 2, 'Belanja Barang dan Jasa', '2022-12-17 21:10:06', '2022-12-17 21:10:06', NULL),
(3, 2, 2, 'Belanja Modal Peralatan dan Mesin', '2022-12-17 21:11:03', '2022-12-17 21:11:03', NULL),
(4, 2, 3, 'Belanja Modal Gedung dan Bangunan', '2022-12-17 21:11:18', '2022-12-18 00:39:31', '2022-12-18 09:41:46'),
(5, 3, 1, 'Belanja Tidak Terduga', '2022-12-17 21:12:51', '2022-12-17 21:16:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rek_kelompok`
--

CREATE TABLE `rek_kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_kelompok`
--

INSERT INTO `rek_kelompok` (`id`, `rek_akun_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, 'BELANJA OPERASI', '2022-12-17 17:13:56', '2022-12-17 17:13:56', NULL),
(2, 5, 2, 'BELANJA MODAL', '2022-12-17 17:14:55', '2022-12-17 17:14:55', NULL),
(3, 5, 3, 'BELANJA TIDAK TERDUGA', '2022-12-17 17:15:39', '2022-12-18 09:40:09', NULL),
(4, 5, 4, 'BELANJA TRANSFER', '2022-12-17 17:16:00', '2022-12-17 21:11:48', '2022-12-17 21:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `rek_objek`
--

CREATE TABLE `rek_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_jenis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_objek`
--

INSERT INTO `rek_objek` (`id`, `rek_jenis_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 99, 'Belanja Pegawai BLUD', '2022-12-17 21:29:33', '2022-12-17 21:29:33', NULL),
(2, 2, 1, 'Belanja Barang', '2022-12-17 21:31:03', '2022-12-17 21:31:03', NULL),
(3, 2, 2, 'Belanja Jasa', '2022-12-17 21:31:12', '2022-12-17 21:31:12', NULL),
(4, 2, 3, 'Belanja Pemeliharaan', '2022-12-17 21:31:22', '2022-12-17 21:31:22', NULL),
(5, 2, 4, 'Belanja Perjalanan Dinas', '2022-12-17 21:31:30', '2022-12-17 21:31:30', NULL),
(6, 3, 5, 'Belanja Modal Alat Kantor dan Rumah Tangga', '2022-12-17 21:34:31', '2022-12-17 21:34:31', NULL),
(7, 3, 7, 'Belanja Modal Alat Kedokteran dan Kesehatan', '2022-12-17 21:35:01', '2022-12-17 21:35:01', NULL),
(8, 3, 10, 'Belanja Modal Komputer', '2022-12-17 21:35:17', '2022-12-17 21:35:17', NULL),
(9, 5, 1, 'Belanja Tidak Terduga', '2022-12-18 00:40:53', '2022-12-18 00:40:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rek_rincian_objek`
--

CREATE TABLE `rek_rincian_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_objek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_rincian_objek`
--

INSERT INTO `rek_rincian_objek` (`id`, `rek_objek_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Belanja Pegawai BLUD', '2022-12-18 00:27:58', '2022-12-18 00:27:58', NULL),
(2, 2, 1, 'Belanja Bahan Pakai Habis', '2022-12-18 00:29:11', '2022-12-18 00:29:11', NULL),
(3, 2, 2, 'Belanja Bahan/Material', '2022-12-18 00:29:25', '2022-12-18 00:29:25', NULL),
(4, 3, 1, 'Belanja Jasa Kantor', '2022-12-18 00:33:25', '2022-12-18 00:33:25', NULL),
(5, 3, 2, 'Belanja Jasa Asuransi', '2022-12-18 00:33:32', '2022-12-18 00:33:32', NULL),
(6, 3, 5, 'Belanja Sewa Alat Berat', '2022-12-18 00:34:35', '2022-12-18 00:34:35', NULL),
(7, 3, 8, 'Belanja Jasa Ketersediaan Layanan (Availibility Payment)', '2022-12-18 00:34:44', '2022-12-18 00:34:44', NULL),
(8, 3, 9, 'Belanja Beasiswa Pendidikan PNS', '2022-12-18 00:34:58', '2022-12-18 00:34:58', NULL),
(9, 3, 12, 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi Daerah', '2022-12-18 00:35:10', '2022-12-18 00:35:10', NULL),
(10, 4, 2, 'Belanja Pemeliharaan Peralatan dan Mesin', '2022-12-18 00:35:54', '2022-12-18 00:35:54', NULL),
(11, 4, 3, 'Belanja Pemeliharaan Gedung dan Bangunan', '2022-12-18 00:36:03', '2022-12-18 00:36:03', NULL),
(12, 4, 4, 'Belanja Pemeliharaan Jalan, Jaringan, dan Irigasi', '2022-12-18 00:36:11', '2022-12-18 00:36:11', NULL),
(13, 5, 1, 'Belanja Perjalanan Dinas Dalam Daerah', '2022-12-18 00:36:27', '2022-12-18 00:36:27', NULL),
(14, 6, 2, 'Belanja Modal Alat Rumah Tangga', '2022-12-18 00:36:57', '2022-12-18 00:36:57', NULL),
(15, 7, 2, 'Belanja Modal Alat Kesehatan Umum', '2022-12-18 00:37:14', '2022-12-18 00:37:14', NULL),
(16, 8, 1, 'Belanja Modal Komputer Unit', '2022-12-18 00:37:30', '2022-12-18 00:37:30', NULL),
(17, 8, 2, 'Belanja Modal Peralatan Komputer', '2022-12-18 00:37:40', '2022-12-18 00:37:40', NULL),
(18, 9, 1, 'Belanja Tidak Terduga', '2022-12-18 00:41:53', '2022-12-18 00:41:53', NULL),
(19, 1, 3, 'Honor Pelaksana Pengelola Kegiatan', '2022-12-18 00:57:09', '2022-12-18 00:57:32', '2022-12-18 00:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `rek_sub_rincian_objek`
--

CREATE TABLE `rek_sub_rincian_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_rincian_objek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_sub_rincian_objek`
--

INSERT INTO `rek_sub_rincian_objek` (`id`, `rek_rincian_objek_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 'Honor Pelaksana Pengelola Kegiatan', '2022-12-18 01:01:28', '2022-12-18 01:01:28', NULL),
(2, 1, 6, 'Honor Tunjangan Pengelola Keuangan', '2022-12-18 01:02:36', '2022-12-18 01:02:36', NULL),
(3, 1, 23, 'Belanja Jasa Pelayanan', '2022-12-18 01:03:25', '2022-12-18 01:03:25', NULL),
(4, 1, 24, 'Tunjangan Tambahan Penghasilan', '2022-12-18 01:03:41', '2022-12-18 01:03:41', NULL),
(5, 1, 26, 'Tambahan Penghasilan Beban Kerja', '2022-12-18 01:03:54', '2022-12-18 01:03:54', NULL),
(6, 1, 32, 'Honor Pelayanan MOU', '2022-12-18 01:04:09', '2022-12-18 01:04:09', NULL),
(7, 1, 50, 'Honor Pengadaan Barang dan Jasa', '2022-12-18 01:04:24', '2022-12-18 01:04:24', NULL),
(8, 2, 1, 'Belanja Bahan - Bahan Bangunan dan Kontruksi', '2022-12-18 01:09:05', '2022-12-18 01:09:05', NULL),
(9, 2, 2, 'Belanja Bahan - Bahan Kimia', '2022-12-18 01:09:14', '2022-12-18 01:09:14', NULL),
(10, 2, 4, 'Belanja Bahan Bakar dan Pelumas', '2022-12-18 01:09:25', '2022-12-18 01:09:25', NULL),
(11, 2, 15, 'Belanja Suku Cadang - Suku Cadang Alat Kedokteran', '2022-12-18 01:09:35', '2022-12-18 01:09:35', NULL),
(12, 2, 24, 'Belanja Alat / Bahan Untuk Kegiatan Kantor - Alat Tulis Kantor', '2022-12-18 01:09:45', '2022-12-18 01:09:45', NULL),
(13, 2, 27, 'Belanja Alat / Bahan Kegiatan Kantor - Benda Pos', '2022-12-18 01:09:58', '2022-12-18 01:09:58', NULL),
(14, 2, 29, 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Komputer', '2022-12-18 01:10:08', '2022-12-18 01:10:08', NULL),
(15, 2, 30, 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perabot Kantor', '2022-12-18 01:10:31', '2022-12-18 01:10:31', NULL),
(16, 2, 31, 'Belanja Alat / Bahan Untuk Kegiatan kantor - Alat Listrik', '2022-12-18 01:10:40', '2022-12-18 01:10:40', NULL),
(17, 2, 36, 'Belanja Alat / kelengkapan terapi modalitas', '2022-12-18 01:10:49', '2022-12-18 09:39:31', '2022-12-18 09:39:31'),
(18, 2, 37, 'Belanja Obat-Obatan', '2022-12-18 01:11:01', '2022-12-18 01:11:01', NULL),
(19, 2, 56, 'Belanja Makanan dan Minuman pada fasilitas Pelayanan urusan Kesehatan', '2022-12-18 01:11:10', '2022-12-18 01:11:10', NULL),
(20, 3, 3, 'Belanja Komponen-Komponen Peralatan', '2022-12-18 01:11:35', '2022-12-18 01:11:35', NULL),
(21, 3, 3, 'Belanja Modal Komputer Jaringan', '2022-12-18 01:11:44', '2022-12-18 06:47:04', '2022-12-18 06:47:04'),
(22, 4, 7, 'Honorarium Rohaniwan', '2022-12-18 01:12:11', '2022-12-18 01:12:11', NULL),
(23, 4, 26, 'Belanja Jasa Tenaga Administrasi', '2022-12-18 01:12:20', '2022-12-18 01:12:20', NULL),
(24, 4, 26, 'Belanja Jasa Tenaga Administrasi Belanja Honorarium', '2022-12-18 01:12:30', '2022-12-18 06:45:11', '2022-12-18 06:45:11'),
(25, 4, 28, 'Belanja Jasa Tenaga Pelayanan Umum', '2022-12-18 01:12:43', '2022-12-18 01:12:43', NULL),
(26, 4, 32, 'Belanja Pakaian dinas dan atrbut kelengkapannya', '2022-12-18 01:12:53', '2022-12-18 01:12:53', NULL),
(27, 4, 48, 'Belanja Jasa Kontribusi Asosiasi', '2022-12-18 01:13:02', '2022-12-18 01:13:02', NULL),
(28, 4, 55, 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', '2022-12-18 01:13:15', '2022-12-18 01:13:15', NULL),
(29, 4, 62, 'Belanja Langganan Jurnal/Surat Kabar/ Majalah', '2022-12-18 01:13:25', '2022-12-18 01:13:25', NULL),
(30, 4, 64, 'Belanja Paket / Pengiriman', '2022-12-18 01:13:39', '2022-12-18 01:13:39', NULL),
(31, 4, 73, 'Belanja Medical Check Up', '2022-12-18 01:13:50', '2022-12-18 01:13:50', NULL),
(32, 5, 5, 'Belanja Iuran Jaminan Kesehatan', '2022-12-18 01:14:05', '2022-12-18 01:14:05', NULL),
(33, 6, 38, 'Belanja Sewa Rumah Negara Golongan 1', '2022-12-18 01:14:23', '2022-12-18 01:14:23', NULL),
(34, 6, 49, 'Belanja Sewa Rumah Tidak Bersusun', '2022-12-18 01:14:36', '2022-12-18 01:14:36', NULL),
(35, 7, 17, 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Pengembangan Pemanfaatan Ruang', '2022-12-18 01:14:47', '2022-12-18 01:14:47', NULL),
(36, 7, 19, 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung', '2022-12-18 01:14:57', '2022-12-18 01:14:57', NULL),
(37, 8, 6, 'Belanja Jasa Konsultasi Berorientasi Bidang - Keuangan', '2022-12-18 01:15:15', '2022-12-18 01:15:15', NULL),
(38, 9, 2, 'Belanja Kegiatan Aktivitas kelompok dan Terapi Keluarga', '2022-12-18 01:15:31', '2022-12-18 01:15:31', NULL),
(39, 9, 3, 'Belanja Bimbingan Teknis', '2022-12-18 01:15:39', '2022-12-18 01:15:39', NULL),
(40, 10, 35, 'Belanja Pemeliharaan Alat Angkutan - Alat Angkutan Bermotor - Kendaraan Dinas Bermotor Perorangan', '2022-12-18 01:16:07', '2022-12-18 01:16:07', NULL),
(41, 10, 117, 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga - Alat Kantor - Alat Kantor Lainnya', '2022-12-18 01:16:16', '2022-12-18 01:16:16', NULL),
(42, 10, 204, 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan - Alat Kedokteran - Alat Kedokteran Umum', '2022-12-18 01:16:29', '2022-12-18 01:16:29', NULL),
(43, 11, 1, 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Kantor', '2022-12-18 01:16:51', '2022-12-18 01:16:51', NULL),
(44, 12, 83, 'Belanja Pemeliharaan Instalasi - Instalasi Air kotor - Instalasi Air Kotor Lainnya', '2022-12-18 01:17:05', '2022-12-18 01:17:05', NULL),
(45, 13, 1, 'Belanja Perjalanan Dinas Biasa', '2022-12-18 01:17:23', '2022-12-18 01:17:23', NULL),
(46, 14, 1, 'Belanja Modal Mebel', '2022-12-18 01:18:20', '2022-12-18 01:18:20', NULL),
(47, 14, 4, 'Belanja Modal Alat Pendingin', '2022-12-18 01:18:34', '2022-12-18 01:18:34', NULL),
(48, 14, 6, 'Belanja Modal Alat Rumah Tangga lainnya', '2022-12-18 01:18:43', '2022-12-18 01:18:43', NULL),
(49, 15, 5, 'Belanja Modal Bed pasien', '2022-12-18 01:19:08', '2022-12-18 06:49:37', '2022-12-18 06:49:37'),
(50, 15, 5, 'Belanja Modal Alat Kesehatan Umum Lainnya', '2022-12-18 01:19:17', '2022-12-18 01:19:17', NULL),
(51, 16, 1, 'Belanja Modal Personal Computer', '2022-12-18 01:19:53', '2022-12-18 01:19:53', NULL),
(52, 17, 5, 'Belanja Modal Peralatan Komputer Lainnya', '2022-12-18 01:20:08', '2022-12-18 01:20:08', NULL),
(53, 18, 1, 'Belanja Tidak Terduga', '2022-12-18 06:50:38', '2022-12-18 06:50:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id`, `kegiatan_id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Pelayanan dan Penunjang Pelayanan BLUD', '2022-12-17 15:33:49', '2022-12-17 15:33:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'UMUM', '2022-12-17 13:47:58', '2022-12-17 13:47:58', NULL),
(2, 1, 'URUSAN PEMERINTAHAN WAJIB YANG BERKAITAN DENGAN PELAYANAN DASAR', '2022-12-17 13:48:20', '2022-12-17 13:48:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nip`, `jabatan`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Moh. Walid Arkham Sani', 'walid.rsjdahm@gmail.com', '200008062022011001', 'Pengelola Data Transaksi', NULL, '$2y$10$st3olnQTrDjcDSRjoTseeuMn6LOf0lN4dnNLFHwL4UAQC8rSmvT0C', 'Admin', '0gknj9gjSVds2OKIoP8FUW4gvwPBowoRfZO1EzzeXyIpVKcmUZy7cAuccgCU', '2022-12-15 02:20:18', '2022-12-15 02:20:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_akun`
--
ALTER TABLE `rek_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_jenis`
--
ALTER TABLE `rek_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_kelompok`
--
ALTER TABLE `rek_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_objek`
--
ALTER TABLE `rek_objek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_rincian_objek`
--
ALTER TABLE `rek_rincian_objek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_sub_rincian_objek`
--
ALTER TABLE `rek_sub_rincian_objek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rek_akun`
--
ALTER TABLE `rek_akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rek_jenis`
--
ALTER TABLE `rek_jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rek_kelompok`
--
ALTER TABLE `rek_kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rek_objek`
--
ALTER TABLE `rek_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rek_rincian_objek`
--
ALTER TABLE `rek_rincian_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rek_sub_rincian_objek`
--
ALTER TABLE `rek_sub_rincian_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
