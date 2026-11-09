-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2026 at 08:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad5b`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('siakad-polnep-cache-admin@siakad.tes|127.0.0.1', 'i:1;', 1793245443),
('siakad-polnep-cache-admin@siakad.tes|127.0.0.1:timer', 'i:1793245443;', 1793245443),
('siakad-polnep-cache-delvianrizq@gmail.com|127.0.0.1', 'i:1;', 1793275136),
('siakad-polnep-cache-delvianrizq@gmail.com|127.0.0.1:timer', 'i:1793275136;', 1793275136);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint UNSIGNED NOT NULL,
  `nidn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `email`, `telepon`, `alamat`, `jabatan_fungsional`, `created_at`, `updated_at`) VALUES
(1, '0032006921', 'Eluh Andriani S.Kom., M.Kom.', 'nova.anggraini@example.org', '087045311427', 'Kpg. Raya Setiabudhi No. 187, Surabaya 61095, Kaltara', NULL, '2026-10-25 06:50:45', '2026-11-05 12:59:00'),
(2, '0029016542', 'Cornelia Saragih S.Kom., M.Kom.', 'uyainah.panca@example.com', '082261514279', 'Ki. Mahakam No. 890, Tebing Tinggi 36149, Kalsel', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(3, '0091251352', 'Gabriella Nashiruddin S.Kom., M.Eng.', 'jprasetya@example.com', '085903314751', 'Jr. Basoka No. 628, Banjar 40489, Jateng', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(4, '0050044435', 'Oni Tarihoran S.Kom., M.Eng.', 'parman.purwanti@example.net', '081835672296', 'Kpg. Reksoninten No. 319, Sawahlunto 92293, Bali', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(5, '0071761002', 'Gara Mandasari S.Kom., M.Eng.', 'clara20@example.com', '087417929924', 'Ds. Flora No. 480, Denpasar 33033, Kalsel', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(6, '0006783200', 'Iriana Palastri S.Si., M.Cs.', 'rahayu21@example.net', '088522784958', 'Jln. Bahagia No. 574, Bengkulu 91998, Kepri', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(7, '0017796010', 'Endah Siregar S.Si., M.Cs.', 'tmardhiyah@example.com', '083511126403', 'Kpg. W.R. Supratman No. 142, Pematangsiantar 20649, Malut', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(8, '0013359409', 'Asman Sitorus S.Kom., M.Eng.', 'rahmi.uyainah@example.org', '088838269195', 'Psr. Setiabudhi No. 365, Tanjung Pinang 93874, Papua', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(9, '0000822716', 'Ihsan Melani S.T., M.T.', 'hutasoit.harsaya@example.org', '084761697733', 'Ki. Madiun No. 16, Manado 97450, Papua', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(10, '0019531156', 'Rahmi Sihotang S.Si., M.Cs.', 'nova76@example.net', '087661808038', 'Ki. Moch. Toha No. 755, Banjarmasin 53501, NTB', NULL, '2026-10-25 06:50:45', '2026-10-25 06:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `tahun_akademik` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','diajukan','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_id`, `tahun_akademik`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(2, 2, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(3, 3, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(5, 5, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(6, 6, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(7, 7, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(8, 8, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(9, 9, '2026/2027', 'Ganjil', 'draft', '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(13, 52, '2024/2025', 'Ganjil', 'draft', '2026-11-09 07:21:23', '2026-11-09 07:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `krs_detail`
--

CREATE TABLE `krs_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `krs_id` bigint UNSIGNED NOT NULL,
  `mata_kuliah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs_detail`
--

INSERT INTO `krs_detail` (`id`, `krs_id`, `mata_kuliah_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(2, 1, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(3, 1, 1, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(4, 1, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(5, 1, 6, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(6, 2, 7, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(7, 2, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(8, 2, 6, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(9, 2, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(10, 2, 9, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(11, 3, 8, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(12, 3, 6, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(13, 3, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(14, 3, 9, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(15, 3, 5, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(21, 5, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(22, 5, 5, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(23, 5, 4, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(24, 5, 9, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(25, 5, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(26, 6, 8, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(27, 6, 10, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(28, 6, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(29, 6, 1, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(30, 6, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(31, 7, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(32, 7, 4, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(33, 7, 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(34, 7, 5, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(35, 7, 10, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(36, 8, 4, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(37, 8, 1, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(38, 8, 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(39, 8, 6, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(40, 8, 9, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(41, 9, 6, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(42, 9, 1, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(43, 9, 4, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(44, 9, 10, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(45, 9, 8, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(53, 13, 2, '2026-11-09 07:21:23', '2026-11-09 07:21:23'),
(54, 13, 3, '2026-11-09 07:21:23', '2026-11-09 07:21:23'),
(55, 13, 4, '2026-11-09 07:21:23', '2026-11-09 07:21:23'),
(56, 13, 5, '2026-11-09 07:21:23', '2026-11-09 07:21:23'),
(57, 13, 6, '2026-11-09 07:21:23', '2026-11-09 07:21:23'),
(58, 13, 7, '2026-11-09 07:21:23', '2026-11-09 07:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` smallint UNSIGNED NOT NULL,
  `program_studi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'D3 Teknik Informatika',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jenis_kelamin`, `email`, `angkatan`, `program_studi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2403033416', 'Uchita Najmudin', 'P', '2403033416@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(2, '2303037722', 'Darmana Laksita', 'L', '2303037722@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(3, '2403039815', 'Hartaka Melani', 'L', '2403039815@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(4, '2503030234', 'Septi Usamah', 'P', '2503030234@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(5, '2203033268', 'Vino Halimah', 'L', '2203033268@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(6, '2203031986', 'Mursinin Winarsih', 'L', '2203031986@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(7, '2503032286', 'Winda Nurdiyanti', 'P', '2503032286@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(8, '2503031769', 'Sakura Maryati', 'P', '2503031769@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(9, '2503038179', 'Ayu Nashiruddin', 'P', '2503038179@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(11, '2403030017', 'Tirtayasa Damanik', 'L', '2403030017@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(12, '2403034528', 'Damu Manullang', 'L', '2403034528@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(13, '2403038630', 'Tira Puspita', 'P', '2403038630@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(14, '2403030534', 'Cengkal Puspasari', 'L', '2403030534@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(15, '2503033738', 'Mulya Yuliarti', 'L', '2503033738@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(16, '2203039555', 'Citra Susanti', 'P', '2203039555@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(17, '2403037525', 'Dalima Winarno', 'P', '2403037525@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(18, '2303034268', 'Vera Rajasa', 'P', '2303034268@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(19, '2403034003', 'Bakianto Wahyuni', 'L', '2403034003@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(20, '2203032865', 'Karimah Fujiati', 'P', '2203032865@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(21, '2203038305', 'Najib Pradipta', 'L', '2203038305@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(22, '2303032461', 'Harja Kusmawati', 'L', '2303032461@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(23, '2203038743', 'Nadine Wibisono', 'P', '2203038743@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(24, '2303030490', 'Vivi Zulkarnain', 'P', '2303030490@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(25, '2503034080', 'Elisa Maulana', 'P', '2503034080@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(26, '2503030443', 'Elvina Ardianto', 'P', '2503030443@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(27, '2303039380', 'Chandra Sinaga', 'L', '2303039380@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(28, '2203039869', 'Galuh Kusmawati', 'L', '2203039869@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(29, '2503036327', 'Almira Yulianti', 'P', '2503036327@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(30, '2203031682', 'Jane Budiman', 'P', '2203031682@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(31, '2303034638', 'Ida Habibi', 'P', '2303034638@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(32, '2203035421', 'Muhammad Zulkarnain', 'L', '2203035421@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(33, '2203030135', 'Vicky Suryono', 'P', '2203030135@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-11-09 07:57:58', NULL),
(34, '2403030321', 'Diah Siregar', 'P', '2403030321@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(35, '2203035647', 'Leo Saptono', 'L', '2203035647@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(36, '2203034424', 'Puspa Mardhiyah', 'P', '2203034424@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(37, '2503031983', 'Kani Purnawati', 'P', '2503031983@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(38, '2203039185', 'Kamaria Handayani', 'P', '2203039185@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(39, '2203031589', 'Violet Purnawati', 'P', '2203031589@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(40, '2303031467', 'Vera Purwanti', 'P', '2303031467@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(41, '2403036878', 'Gambira Agustina', 'L', '2403036878@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(42, '2303030750', 'Wage Yolanda', 'L', '2303030750@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(43, '2203032829', 'Darmana Rahayu', 'L', '2203032829@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(44, '2503034531', 'Indah Safitri', 'P', '2503034531@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(45, '2503032250', 'Hesti Maryadi', 'P', '2503032250@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(46, '2303031992', 'Samiah Sihombing', 'P', '2303031992@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(47, '2403039071', 'Farhunnisa Novitasari', 'P', '2403039071@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(48, '2203038041', 'Adriansyah', 'P', '2203038041@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-11-08 13:26:16', NULL),
(49, '2203039686', 'Vera Zulaika', 'P', '2203039686@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(50, '2503031314', 'Ophelia Napitupulu', 'P', '2503031314@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-10-25 06:50:45', '2026-10-25 06:50:45', NULL),
(52, '2401001', 'Delvian Rizq', 'L', 'delvian.rizq@contoh.ac.id', 2024, 'D3 Teknik Informatika', '2026-11-08 13:12:19', '2026-11-08 13:12:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode_mk`, `nama_mk`, `sks`, `created_at`, `updated_at`) VALUES
(1, 'T1101', 'Pengantar Teknologi Informasi', 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(2, 'T1102', 'Algoritma dan Pemrograman', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(3, 'T1103', 'Matematika Diskrit', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(4, 'T1201', 'Basis Data', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(5, 'T1202', 'Desain Web', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(6, 'T1203', 'Pemrograman Web', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(7, 'T1204', 'Jaringan Komputer', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(8, 'T1301', 'Rekayasa Perangkat Lunak', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(9, 'T1302', 'Pemrograman Berorientasi Objek', 3, '2026-10-25 06:50:45', '2026-10-25 06:50:45'),
(10, 'T1303', 'Sistem Operasi', 2, '2026-10-25 06:50:45', '2026-10-25 06:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_20_113225_add_role_to_users_table', 1),
(5, '2026_10_24_181155_create_dosen_table', 1),
(6, '2026_10_24_181208_create_mahasiswa_table', 1),
(7, '2026_10_24_181216_create_mata_kuliah_table', 1),
(8, '2026_10_24_193522_create_krs_table', 1),
(9, '2026_10_24_193534_create_krs_detail_table', 1),
(10, '2026_10_25_133835_add_jabatan_fungsional_to_dosen_table', 1),
(11, '2026_10_29_223055_add_last_login_at_to_users_table', 2),
(12, '2026_11_09_142749_add_deleted_at_to_mahasiswa_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aU02mv8h6aEgPPiKBAmUXVg9H7sCtMJSeEnKH8Ci', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaFdHQ1NVeEZ4NUtnSVVNTUY5dEFJOEp4eTAybXo4YnljWG80VTdpQiI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImQ5NGNkNDlhYmVlY2E3ODM1YTc0OGJkY2MyNzAxYzk2Nzg4OTc2MjcxYWIxNTgwMDIyODQxOTNhNzBiMWQ5YjYiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva3JzIjtzOjU6InJvdXRlIjtzOjk6Imtycy5pbmRleCI7fX0=', 1794187505),
('pQfFFseRp7MkcxSeKWAC3WxRZ5sEgp0EwfomJitd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoielpVbHZqMDV6Y283aTFzOXJDOUNsM0FDVjVtMGFVREQ0SGJiV3hTeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva3JzIjtzOjU6InJvdXRlIjtzOjk6Imtycy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImQ5NGNkNDlhYmVlY2E3ODM1YTc0OGJkY2MyNzAxYzk2Nzg4OTc2MjcxYWIxNTgwMDIyODQxOTNhNzBiMWQ5YjYiO30=', 1794159272),
('WBAUxZGuc6fw550QMuRvYRBShB668Xx5en7KiBxI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRTlhNmQ2cTVBU0dmaWVlUTR0QzdBYkVUUklPakxxRktINE5xV2JIcyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImQ5NGNkNDlhYmVlY2E3ODM1YTc0OGJkY2MyNzAxYzk2Nzg4OTc2MjcxYWIxNTgwMDIyODQxOTNhNzBiMWQ5YjYiO30=', 1794211191);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','dosen','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `last_login_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator SIAKAD', 'admin@siakad.test', NULL, '2026-11-09 07:20:37', '$2y$12$4wykQZ63WIttWazpHzWFIuiJn7vp6Yl/XuoyZrVVXrNhlXvq7nOPe', 'admin', NULL, '2026-10-25 06:50:43', '2026-11-09 07:20:37'),
(2, 'Dosen Uji', 'dosen@siakad.test', NULL, '2026-11-05 13:42:45', '$2y$12$E.9otQXZ63bJSTZwv/fCKODHsHPrfPLRopuRisHBFmvvlEwcMT4yS', 'dosen', NULL, '2026-10-25 06:50:44', '2026-11-05 13:42:45'),
(3, 'Mahasiswa Uji', 'mahasiswa@siakad.test', NULL, '2026-11-05 14:41:59', '$2y$12$H8Xw5xSyFtBbLDP89ev78ugmeVAvLoEbrY0zzW9mmn3aKPNBuPh4S', 'mahasiswa', 'J5A055ayoOhZo5o6hdLpX17p77WkmsStznwwhjwIxJzGZjBDPVVSlNwFE4kF', '2026-10-25 06:50:45', '2026-11-05 14:41:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nidn_unique` (`nidn`),
  ADD UNIQUE KEY `dosen_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `krs_mahasiswa_id_tahun_akademik_semester_unique` (`mahasiswa_id`,`tahun_akademik`,`semester`);

--
-- Indexes for table `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `krs_detail_krs_id_mata_kuliah_id_unique` (`krs_id`,`mata_kuliah_id`),
  ADD KEY `krs_detail_mata_kuliah_id_foreign` (`mata_kuliah_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_kuliah_kode_mk_unique` (`kode_mk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1993;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `krs_detail`
--
ALTER TABLE `krs_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD CONSTRAINT `krs_detail_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_detail_mata_kuliah_id_foreign` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
