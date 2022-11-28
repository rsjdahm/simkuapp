-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 12:39 PM
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
-- Database: `simkuv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urusan_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `urusan_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1.02', 'URUSAN PEMERINTAHAN BIDANG KESEHATAN', '2022-11-09 06:59:34', '2022-11-28 07:30:17');

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
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `program_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1.02.01.1-10', 'Peningkatan Pelayanan BLUD', '2022-11-10 02:40:12', '2022-11-28 12:16:14');

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
(5, '2022_11_05_230842_create_rek_akun_table', 5),
(6, '2022_11_06_203127_create_rek_kelompok_table', 6),
(7, '2022_11_06_213514_create_rek_jenis_table', 7),
(8, '2022_11_06_230359_create_rek_objek_table', 8),
(9, '2022_11_06_233331_create_rek_rinc_objek_table', 9),
(10, '2022_11_07_000532_create_rek_sub_rinc_objek_table', 10),
(15, '2022_11_07_102538_create_pegawai_table', 11),
(16, '2022_11_09_142913_create_urusan_table', 12),
(17, '2022_11_09_145730_create_bidang_table', 13),
(18, '2022_11_09_160917_create_unit_table', 14),
(19, '2022_11_09_160932_create_subunit_table', 15),
(20, '2022_11_10_091900_create_program_table', 16),
(21, '2022_11_10_103824_create_kegiatan_table', 17),
(23, '2022_11_10_145534_create_subkegiatan_table', 18),
(24, '2022_11_18_105620_create_rka_table', 19);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar_dpn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_blkg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepeg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `gelar_dpn`, `gelar_blkg`, `nip`, `nik`, `npwp`, `tgl_lahir`, `tmpt_lahir`, `jenis_kelamin`, `status_kepeg`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Moh. Walid Arkham Sani', NULL, 'A.Md.Pnl.', '20000806 202201 1 001', '3510130608000002', '43.512.631.3-627.000', '2000-08-06', 'Banyuwangi', 'Laki-laki', 'PNS', 'Jl. Siradj Salman Gg. Nanas No. 20 RT027/000, Kel. Teluk Lerong Ilir, Kec. Samarinda Ulu, Kota Samarinda', '2022-11-06 20:38:24', '2022-11-06 20:38:24'),
(2, 'Milenia Febrianti', NULL, 'A.Md.Pnl.', '20000201 202201 2 002', NULL, NULL, '2000-02-01', 'Kebumen', 'Perempuan', 'PNS', 'Jl. Bukit Barisan Gg. No. 2, Kel. Jawa, Samarinda Ulu, Kota Samarinda', '2022-11-06 20:45:50', '2022-11-09 23:29:54'),
(3, 'Aulan Nawal', NULL, 'A.Md.Ak', '19990310 202201 1 002', '1106071003990001', '53.640.621.8-108.000', '1999-03-10', 'Aceh Besar', 'Laki-laki', 'PNS', 'Jl. Gunung Cermai, Kel. Jawa, Samarinda Ulu, Kota Samarinda', '2022-11-06 20:46:56', '2022-11-09 23:27:50'),
(4, 'Liliek Ani Suryaningsih', 'Hj.', 'S.E., M.Si.', NULL, NULL, NULL, '1977-12-17', 'Samarinda', 'Perempuan', 'PNS', NULL, '2022-11-06 20:56:02', '2022-11-06 20:56:02'),
(5, 'Syahrani', NULL, 'S.Sos., M.Si.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 20:56:51', '2022-11-06 20:56:51'),
(6, 'Hadi Machbudiansyah', NULL, 'S.E.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 20:57:38', '2022-11-06 20:57:38'),
(7, 'Sopia Lena', NULL, 'S.E., M.Si.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 20:58:10', '2022-11-06 20:58:10'),
(8, 'Ika Trisna Rahayu', NULL, 'S.E.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'Non ASN', NULL, '2022-11-06 20:59:24', '2022-11-06 20:59:24'),
(9, 'M. Wahid Arian', NULL, 'S.E.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'Non ASN', NULL, '2022-11-06 21:00:11', '2022-11-06 21:00:11'),
(10, 'Rajak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 21:01:25', '2022-11-06 21:01:25'),
(11, 'Hari Jumadi', NULL, 'A.Md.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 21:02:25', '2022-11-06 21:02:25'),
(12, 'Riandy', NULL, 'S.Kep.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 21:02:48', '2022-11-06 21:02:48'),
(13, 'Agus Sutrasno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 21:03:38', '2022-11-09 22:05:45'),
(14, 'Supriyatun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 21:04:40', '2022-11-06 21:04:40'),
(15, 'Helingking', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'Non ASN', NULL, '2022-11-06 23:49:11', '2022-11-06 23:49:11'),
(16, 'Indah Puspitasari', 'dr.', 'MARS.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 23:50:39', '2022-11-06 23:50:39'),
(17, 'Fauziah Andriyani', 'dr.', 'MARS.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 23:52:30', '2022-11-06 23:52:30'),
(18, 'Eko Rianto', 'Ns.', 'S.Kep.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-06 23:54:05', '2022-11-06 23:54:52'),
(19, 'Yenny', 'dr.', 'SpKJ', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 23:55:40', '2022-11-06 23:55:40'),
(20, 'Rahmawati', 'Ns. Hj.', 'S.Kep, MM.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-06 23:58:58', '2022-11-06 23:58:58'),
(21, 'Syarifah Farikah', NULL, 'A.Md.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-07 00:07:11', '2022-11-07 00:07:11'),
(22, 'Elda Trialisa Putri', NULL, 'S.Psi., M.Psi.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-07 00:08:31', '2022-11-07 00:08:31'),
(23, 'Dini Adriyanti', 'dr.', NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-07 00:09:34', '2022-11-07 00:09:34'),
(24, 'Syahrial', NULL, 'S.Kep., SKM', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-07 00:10:38', '2022-11-07 00:15:33'),
(25, 'Dinda Ika Paramita', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'Non ASN', NULL, '2022-11-07 00:11:22', '2022-11-07 00:11:22'),
(26, 'Lurin Dian', 'Ns.', 'S.Kep, MM.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-07 00:12:28', '2022-11-07 00:12:28'),
(27, 'Eliza Cahyani', 'Ns.', 'S.Kep.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'PNS', NULL, '2022-11-07 00:13:13', '2022-11-07 00:13:13'),
(28, 'Maya Lestari', NULL, 'S.E.', NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'Non ASN', NULL, '2022-11-07 03:26:04', '2022-11-07 03:26:04'),
(29, 'Suharsono', 'Ns.', 'S.Kep.', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'PNS', NULL, '2022-11-07 03:34:40', '2022-11-07 03:35:10'),
(30, 'Herdy Fauzi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'Non ASN', NULL, '2022-11-07 07:36:14', '2022-11-07 07:36:14'),
(31, 'Irawati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perempuan', 'Non ASN', NULL, '2022-11-07 07:36:39', '2022-11-07 07:36:39'),
(32, 'Muhammad Wahyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'Non ASN', NULL, '2022-11-07 07:37:22', '2022-11-07 07:37:22');

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
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `bidang_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1.02.01', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI', '2022-11-10 01:23:38', '2022-11-28 12:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `rek_akun`
--

CREATE TABLE `rek_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_akun`
--

INSERT INTO `rek_akun` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, '1', 'ASET', '2022-11-06 11:52:13', '2022-11-26 03:40:27'),
(2, '2', 'KEWAJIBAN', '2022-11-06 11:52:38', '2022-11-26 03:40:27'),
(3, '3', 'EKUITAS', '2022-11-06 11:59:46', '2022-11-26 03:40:27'),
(4, '4', 'PENDAPATAN DAERAH', '2022-11-06 12:01:27', '2022-11-26 03:40:27'),
(5, '5', 'BELANJA DAERAH', '2022-11-06 12:02:18', '2022-11-26 03:40:27'),
(6, '6', 'PEMBIAYAAN DAERAH', '2022-11-06 12:03:56', '2022-11-26 03:40:27'),
(7, '7', 'PENDAPATAN DAERAH-LO', '2022-11-06 12:05:04', '2022-11-26 03:40:27'),
(8, '8', 'BEBAN DAERAH', '2022-11-06 12:06:01', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rek_jenis`
--

CREATE TABLE `rek_jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_kelompok_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_jenis`
--

INSERT INTO `rek_jenis` (`id`, `rek_kelompok_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '5.1.01', 'Belanja Pegawai', '2022-11-06 13:56:28', '2022-11-26 03:40:27'),
(2, 1, '5.1.02', 'Belanja Barang dan Jasa', '2022-11-06 13:57:31', '2022-11-26 03:40:27'),
(3, 2, '5.2.02', 'Belanja Modal Peralatan dan Mesin', '2022-11-06 13:59:36', '2022-11-26 03:40:27'),
(4, 2, '5.2.03', 'Belanja Modal Gedung dan Bangunan', '2022-11-06 14:00:15', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rek_kelompok`
--

CREATE TABLE `rek_kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_akun_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_kelompok`
--

INSERT INTO `rek_kelompok` (`id`, `rek_akun_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 5, '5.1', 'BELANJA OPERASIONAL', '2022-11-06 13:20:46', '2022-11-26 03:40:27'),
(2, 5, '5.2', 'BELANJA MODAL', '2022-11-06 13:21:49', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rek_objek`
--

CREATE TABLE `rek_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_jenis_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_objek`
--

INSERT INTO `rek_objek` (`id`, `rek_jenis_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '5.1.01.99', 'Belanja Pegawai BLUD', '2022-11-06 15:19:05', '2022-11-26 03:40:27'),
(2, 2, '5.1.02.01', 'Belanja Barang', '2022-11-06 15:19:49', '2022-11-26 03:40:27'),
(3, 2, '5.1.02.02', 'Belanja Jasa', '2022-11-06 15:20:27', '2022-11-26 03:40:27'),
(4, 2, '5.1.02.03', 'Belanja Pemeliharaan', '2022-11-06 15:21:38', '2022-11-26 03:40:27'),
(5, 2, '5.1.02.04', 'Belanja Perjalanan Dinas', '2022-11-06 15:22:24', '2022-11-26 03:40:27'),
(6, 3, '5.2.02.02', 'Belanja Modal Alat Angkutan', '2022-11-06 15:24:25', '2022-11-26 03:40:27'),
(7, 3, '5.2.02.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', '2022-11-06 15:24:42', '2022-11-26 03:40:27'),
(8, 3, '5.2.02.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', '2022-11-06 15:25:02', '2022-11-26 03:40:27'),
(9, 3, '5.2.02.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', '2022-11-06 15:25:18', '2022-11-26 03:40:27'),
(10, 3, '5.2.02.08', 'Belanja Modal Alat Laboratorium', '2022-11-06 15:25:39', '2022-11-26 03:40:27'),
(11, 3, '5.2.02.10', 'Belanja Modal Komputer', '2022-11-06 15:26:32', '2022-11-26 03:40:27'),
(12, 4, '5.2.03.01', 'Belanja Modal Bangunan Gedung', '2022-11-06 15:29:05', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rek_rinc_objek`
--

CREATE TABLE `rek_rinc_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_objek_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_rinc_objek`
--

INSERT INTO `rek_rinc_objek` (`id`, `rek_objek_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '5.1.01.99.01', 'Belanja Pegawai BLUD', '2022-11-06 15:51:42', '2022-11-26 03:40:27'),
(2, 2, '5.1.02.01.01', 'Belanja Bahan Pakai Habis', '2022-11-06 15:55:34', '2022-11-26 03:40:27'),
(3, 2, '5.1.02.01.02', 'Belanja Bahan/Material', '2022-11-06 15:55:45', '2022-11-26 03:40:27'),
(4, 3, '5.1.02.02.01', 'Belanja Jasa Kantor', '2022-11-06 15:56:04', '2022-11-26 03:40:27'),
(5, 3, '5.1.02.02.02', 'Belanja Jasa Asuransi', '2022-11-06 15:56:56', '2022-11-26 03:40:27'),
(6, 3, '5.1.02.02.05', 'Belanja Sewa Alat Berat', '2022-11-06 15:57:15', '2022-11-26 03:40:27'),
(7, 3, '5.1.02.02.08', 'Belanja Jasa Ketersediaan Layanan (Availibility Payment)', '2022-11-06 15:57:25', '2022-11-26 03:40:27'),
(8, 3, '5.1.02.02.09', 'Belanja Beasiswa Pendidikan PNS', '2022-11-06 15:57:36', '2022-11-26 03:40:27'),
(9, 3, '5.1.02.02.12', 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi Daerah', '2022-11-06 15:57:49', '2022-11-26 03:40:27'),
(10, 4, '5.1.02.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', '2022-11-06 15:58:05', '2022-11-26 03:40:27'),
(11, 4, '5.1.02.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', '2022-11-06 15:58:15', '2022-11-26 03:40:27'),
(12, 4, '5.1.02.03.04', 'Belanja Pemeliharaan Jalan, Jaringan, dan Irigasi', '2022-11-06 15:58:50', '2022-11-26 03:40:27'),
(13, 5, '5.1.02.04.01', 'Belanja Perjalanan Dinas Dalam Daerah', '2022-11-06 15:59:17', '2022-11-26 03:40:27'),
(14, 6, '5.2.02.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', '2022-11-06 16:00:00', '2022-11-26 03:40:27'),
(15, 7, '5.2.02.05.02', 'Belanja Modal Alat Rumah Tangga', '2022-11-06 16:00:15', '2022-11-26 03:40:27'),
(16, 8, '5.2.02.06.02', 'Belanja Modal Alat Komunikasi', '2022-11-06 16:00:30', '2022-11-26 03:40:27'),
(17, 9, '5.2.02.07.02', 'Belanja Modal Alat Kesehatan Umum', '2022-11-06 16:01:14', '2022-11-26 03:40:27'),
(18, 10, '5.2.02.08.08', 'Belanja Modal Peralatan Laboratorium Hydrodinamica', '2022-11-06 16:01:31', '2022-11-26 03:40:27'),
(19, 11, '5.2.02.10.01', 'Belanja Modal Komputer Unit', '2022-11-06 16:01:50', '2022-11-26 03:40:27'),
(20, 11, '5.2.02.10.02', 'Belanja Modal Peralatan Komputer', '2022-11-06 16:01:57', '2022-11-26 03:40:27'),
(21, 12, '5.2.03.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', '2022-11-06 16:02:33', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rek_sub_rinc_objek`
--

CREATE TABLE `rek_sub_rinc_objek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rek_rinc_objek_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rek_sub_rinc_objek`
--

INSERT INTO `rek_sub_rinc_objek` (`id`, `rek_rinc_objek_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '5.1.01.99.01.0003', 'Honor Pelaksana Pengelola Kegiatan', '2022-11-06 16:15:52', '2022-11-26 03:40:27'),
(2, 1, '5.1.01.99.01.0006', 'Honor Tunjangan Pengelola Keuangan', '2022-11-06 16:17:40', '2022-11-26 03:40:27'),
(3, 1, '5.1.01.99.01.0023', 'Belanja Jasa Pelayanan', '2022-11-06 16:17:49', '2022-11-26 03:40:27'),
(4, 1, '5.1.01.99.01.0024', 'Tunjangan Tambahan Penghasilan', '2022-11-06 16:18:07', '2022-11-26 03:40:27'),
(5, 1, '5.1.01.99.01.0026', 'Tambahan Penghasilan Beban Kerja', '2022-11-06 16:18:18', '2022-11-26 03:40:27'),
(6, 1, '5.1.01.99.01.0032', 'Honor Pelayanan MOU', '2022-11-06 16:18:30', '2022-11-26 03:40:27'),
(7, 1, '5.1.01.99.01.0050', 'Honor Pengadaan Barang dan Jasa', '2022-11-06 16:19:00', '2022-11-26 03:40:27'),
(8, 2, '5.1.02.01.01.0001', 'Belanja Bahan - Bahan Bangunan dan Kontruksi', '2022-11-06 16:19:26', '2022-11-26 03:40:27'),
(9, 2, '5.1.02.01.01.0002', 'Belanja Bahan - Bahan Kimia', '2022-11-06 16:19:36', '2022-11-26 03:40:27'),
(10, 2, '5.1.02.01.01.0004', 'Belanja Bahan Bakar dan Pelumas', '2022-11-06 16:19:57', '2022-11-26 03:40:27'),
(11, 2, '5.1.02.01.01.0015', 'Belanja Suku Cadang - Suku Cadang Alat Kedokteran', '2022-11-06 16:20:07', '2022-11-26 03:40:27'),
(12, 2, '5.1.02.01.01.0024', 'Belanja Alat / Bahan Untuk Kegiatan Kantor - Alat Tulis Kantor', '2022-11-06 16:20:16', '2022-11-26 03:40:27'),
(13, 2, '5.1.02.01.01.0027', 'Belanja Alat / Bahan Kegiatan Kantor - Benda Pos', '2022-11-06 16:20:26', '2022-11-26 03:40:27'),
(14, 2, '5.1.02.01.01.0029', 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Komputer', '2022-11-06 16:20:45', '2022-11-26 03:40:27'),
(15, 2, '5.1.02.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perabot Kantor', '2022-11-06 16:20:57', '2022-11-26 03:40:27'),
(16, 2, '5.1.02.01.01.0031', 'Belanja Alat / Bahan Untuk Kegiatan kantor - Alat Listrik', '2022-11-06 16:21:08', '2022-11-26 03:40:27'),
(17, 2, '5.1.02.01.01.0036', 'Belanja Alat / kelengkapan terapi modalitas', '2022-11-06 16:21:27', '2022-11-26 03:40:27'),
(18, 2, '5.1.02.01.01.0037', 'Belanja Obat-Obatan', '2022-11-06 16:21:36', '2022-11-26 03:40:27'),
(19, 2, '5.1.02.01.01.0056', 'Belanja Makanan dan Minuman pada fasilitas Pelayanan urusan Kesehatan', '2022-11-06 16:21:44', '2022-11-26 03:40:27'),
(20, 3, '5.1.02.01.02.0003', 'Belanja Komponen-Komponen Peralatan', '2022-11-06 16:22:37', '2022-11-26 03:40:27'),
(21, 3, '5.1.02.01.02.0003', 'Belanja Modal Komputer Jaringan', '2022-11-06 16:22:44', '2022-11-26 03:40:27'),
(22, 4, '5.1.02.02.01.0007', 'Honorarium Rohaniwan', '2022-11-06 16:23:08', '2022-11-26 03:40:27'),
(23, 4, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', '2022-11-06 16:23:16', '2022-11-26 03:40:27'),
(24, 4, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi Belanja Honorarium', '2022-11-06 16:23:27', '2022-11-26 03:40:27'),
(25, 4, '5.1.02.02.01.0028', 'Belanja Jasa Tenaga Pelayanan Umum', '2022-11-06 16:23:39', '2022-11-26 03:40:27'),
(26, 4, '5.1.02.02.01.0032', 'Belanja Pakaian dinas dan atribut kelengkapannya', '2022-11-06 16:23:49', '2022-11-26 03:40:27'),
(27, 4, '5.1.02.02.01.0048', 'Belanja Jasa Kontribusi Asosiasi', '2022-11-06 16:24:06', '2022-11-26 03:40:27'),
(28, 4, '5.1.02.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', '2022-11-06 16:24:12', '2022-11-26 03:40:27'),
(29, 4, '5.1.02.02.01.0062', 'Belanja Langganan Jurnal/Surat Kabar/ Majalah', '2022-11-06 16:24:23', '2022-11-26 03:40:27'),
(30, 4, '5.1.02.02.01.0064', 'Belanja Paket / Pengiriman', '2022-11-06 16:24:32', '2022-11-26 03:40:27'),
(31, 4, '5.1.02.02.01.0073', 'Belanja Medical Check Up', '2022-11-06 16:24:40', '2022-11-26 03:40:27'),
(32, 5, '5.1.02.02.02.0005', 'Belanja Iuran Jaminan Kesehatan', '2022-11-06 16:25:02', '2022-11-26 03:40:27'),
(33, 6, '5.1.02.02.05.0038', 'Belanja Sewa Rumah Negara Golongan 1', '2022-11-06 16:25:17', '2022-11-26 03:40:27'),
(34, 6, '5.1.02.02.05.0049', 'Belanja Sewa Rumah Tidak Bersusun', '2022-11-06 16:25:30', '2022-11-26 03:40:27'),
(35, 7, '5.1.02.02.08.0017', 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Pengembangan Pemanfaatan Ruang', '2022-11-06 16:25:54', '2022-11-26 03:40:27'),
(36, 7, '5.1.02.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung', '2022-11-06 16:26:03', '2022-11-26 03:40:27'),
(37, 8, '5.1.02.02.09.0006', 'Belanja Jasa Konsultasi Berorientasi Bidang - Keuangan', '2022-11-06 16:26:29', '2022-11-26 03:40:27'),
(38, 9, '5.1.02.02.12.0002', 'Belanja Kegiatan Aktivitas kelompok dan Terapi Keluarga', '2022-11-06 16:26:45', '2022-11-26 03:40:27'),
(39, 9, '5.1.02.02.12.0003', 'Belanja Bimbingan Teknis', '2022-11-06 16:26:55', '2022-11-26 03:40:27'),
(40, 10, '5.1.02.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan - Alat Angkutan Bermotor - Kendaraan Dinas Bermotor Perorangan', '2022-11-06 16:28:09', '2022-11-26 03:40:27'),
(41, 10, '5.1.02.03.02.0117', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga - Alat Kantor - Alat Kantor Lainnya', '2022-11-06 16:28:21', '2022-11-26 03:40:27'),
(42, 10, '5.1.02.03.02.0204', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan - Alat Kedokteran - Alat Kedokteran Umum', '2022-11-06 16:28:35', '2022-11-26 03:40:27'),
(43, 11, '5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Kantor', '2022-11-06 16:29:01', '2022-11-26 03:40:27'),
(44, 12, '5.1.02.03.04.0083', 'Belanja Pemeliharaan Instalasi - Instalasi Air kotor - Instalasi Air Kotor Lainnya', '2022-11-06 16:29:18', '2022-11-26 03:40:27'),
(45, 13, '5.1.02.04.01.0001', 'Belanja Perjalanan Dinas Biasa', '2022-11-06 16:29:40', '2022-11-26 03:40:27'),
(46, 14, '5.2.02.02.01.0002', 'Belanja Modal Kendaraan Bermotor Penumpang', '2022-11-06 16:30:25', '2022-11-26 03:40:27'),
(47, 15, '5.2.02.05.02.0001', 'Belanja Modal Mebel', '2022-11-06 16:30:54', '2022-11-26 03:40:27'),
(48, 15, '5.2.02.05.02.0004', 'Belanja Modal Alat Pendingin', '2022-11-06 16:31:00', '2022-11-26 03:40:27'),
(49, 15, '5.2.02.05.02.0006', 'Belanja Modal Alat Rumah Tangga lainnya', '2022-11-06 16:31:08', '2022-11-26 03:40:27'),
(50, 16, '5.2.02.06.02.0001', 'Belanja Modal Alat komunikasi', '2022-11-06 16:31:29', '2022-11-26 03:40:27'),
(51, 17, '5.2.02.07.02.0005', 'Belanja Modal Bed pasien', '2022-11-06 16:31:51', '2022-11-26 03:40:27'),
(52, 17, '5.2.02.07.02.0005', 'Belanja Modal Alat Kesehatan Umum Lainnya', '2022-11-06 16:32:00', '2022-11-26 03:40:27'),
(53, 18, '5.2.02.08.08.0006', 'Belanja Modal Peralatan Umum', '2022-11-06 16:32:21', '2022-11-26 03:40:27'),
(54, 18, '5.2.02.08.08.0015', 'Belanja Modal Photo and Film Equipment', '2022-11-06 16:32:31', '2022-11-26 03:40:27'),
(55, 19, '5.2.02.10.01.0002', 'Belanja Modal Personal Computer', '2022-11-06 16:32:47', '2022-11-26 03:40:27'),
(56, 20, '5.2.02.10.02.0005', 'Belanja Modal Peralatan Komputer Lainnya', '2022-11-06 16:32:59', '2022-11-26 03:40:27'),
(57, 21, '5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', '2022-11-06 16:33:18', '2022-11-26 03:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rka`
--

CREATE TABLE `rka` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subunit_id` bigint(20) UNSIGNED NOT NULL,
  `no_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_anggaran` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rka`
--

INSERT INTO `rka` (`id`, `subunit_id`, `no_dokumen`, `tgl_dokumen`, `uraian`, `jenis`, `thn_anggaran`, `created_at`, `updated_at`) VALUES
(2, 1, 'DPA/1/2023', '2022-11-25', 'DPA BLUD RSJD Atma Husada Mahakam Murni Tahun 2023', 'Murni', 2023, '2022-11-25 10:30:29', '2022-11-25 10:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatan`
--

CREATE TABLE `subkegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkegiatan`
--

INSERT INTO `subkegiatan` (`id`, `kegiatan_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1.02.01.1-10.001', 'Pelayanan dan Penunjang Pelayanan BLUD', '2022-11-10 07:09:53', '2022-11-28 12:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `subunit`
--

CREATE TABLE `subunit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunit`
--

INSERT INTO `subunit` (`id`, `unit_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1-02.0-00.0-00.01.004', 'RSJD Atma Husada Mahakam', '2022-11-09 08:42:16', '2022-11-28 12:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `bidang_id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, '1-02.0-00.0-00.01', 'Dinas Kesehatan', '2022-11-09 08:35:37', '2022-11-28 12:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, '1', 'URUSAN PEMERINTAHAN WAJIB YANG BERKAITAN DENGAN PELAYANAN DASAR', '2022-11-09 06:37:17', '2022-11-09 06:45:27');

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
(1, 'Moh. Walid Arkham Sani', 'walid.rsjdahm@gmail.com', '200008062022011001', 'Pengelola Data Transaksi', NULL, '$2y$10$3HhvttC5YwVUFt.hj8tbBOwpenPIAts2TVQ6XKETGzXTZVzML.t8O', 'Admin', 'Zt902dLA9qEEnpNoLHkw52AMtim2SWkf5s8FWi1gghHZMWjCU5otrDyykQM3', '2022-11-06 11:51:51', '2022-11-06 11:51:51');

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rek_rinc_objek`
--
ALTER TABLE `rek_rinc_objek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_sub_rinc_objek`
--
ALTER TABLE `rek_sub_rinc_objek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rka`
--
ALTER TABLE `rka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunit`
--
ALTER TABLE `subunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rek_kelompok`
--
ALTER TABLE `rek_kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rek_objek`
--
ALTER TABLE `rek_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rek_rinc_objek`
--
ALTER TABLE `rek_rinc_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rek_sub_rinc_objek`
--
ALTER TABLE `rek_sub_rinc_objek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `rka`
--
ALTER TABLE `rka`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subunit`
--
ALTER TABLE `subunit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
