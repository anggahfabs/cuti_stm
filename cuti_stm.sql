-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2025 at 06:24 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti_stm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int NOT NULL,
  `user_id` int NOT NULL,
  `departemen_id` int NOT NULL,
  `jenis_cuti` enum('Tahunan','Sakit','Besar','Tanpa Bayar','Khusus') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_hari` int NOT NULL,
  `alasan` text,
  `alamat_selama_cuti` varchar(255) DEFAULT NULL,
  `pengganti_id` int DEFAULT NULL,
  `status` enum('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `departemen_id` int NOT NULL,
  `nama_departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`departemen_id`, `nama_departemen`) VALUES
(2, 'BMO'),
(6, 'SECURITY'),
(7, 'TEKNIK'),
(8, 'ADMINISTRASI & GENERAL'),
(9, 'PURCHASING'),
(10, 'ACC & FIN'),
(11, 'ADMINISTRASI & GENERAL'),
(12, 'BRD & HKG'),
(13, 'F&B'),
(16, 'HR&GA');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Direktur', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(2, 'Finance Controlling', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(3, 'Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(4, 'Asisten Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(5, 'Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(6, 'Supervisor (Internal Audit)', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(7, 'Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(8, 'Internal Control (Audit) Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(9, 'Design Grafis / IT', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(10, 'Sekretaris', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(11, 'Staff AP', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(12, 'Storekeeper', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(13, 'Building Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(14, 'Sekretaris', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(15, 'Senior Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(16, 'Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(17, 'Receptionist', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(18, 'Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(19, 'Cleaning', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(20, 'Gardening', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(21, 'Gondola', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(22, 'Cleaner', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(23, 'Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(24, 'Waitress', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(25, 'Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(26, 'Office Boy', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(27, 'GA Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(28, 'Safety Officer Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(29, 'Messenger', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(30, 'Supervisor Legal', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(31, 'Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(32, 'Driver', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(33, 'K3 Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(34, 'HR Staff', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(35, 'Danru Regu A', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(36, 'Danru Regu B', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(37, 'Danru Regu C', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(38, 'Danru Regu D', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(39, 'Regu A', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(40, 'Regu B', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(41, 'Regu C', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(42, 'Regu D', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(43, 'Operator Safety', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(44, 'Asisten Chief', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(45, 'Staff Admin', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(46, 'Manager', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(47, 'Teknisi', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(48, 'Chief Teknik', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(49, 'Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(50, 'Senior Supervisor', '2025-10-01 02:52:43', '2025-10-01 02:52:43'),
(51, 'Staff Admin', '2025-10-01 02:52:43', '2025-10-01 02:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `kacamata`
--

CREATE TABLE `kacamata` (
  `kacamata_id` int NOT NULL,
  `user_id` int NOT NULL,
  `departemen_id` int NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_pengajuan` decimal(12,2) NOT NULL,
  `keterangan` text,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `medical_id` int NOT NULL,
  `user_id` int NOT NULL,
  `departemen_id` int NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_pengajuan` decimal(12,2) NOT NULL,
  `keterangan` text,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `nama_role`) VALUES
(4, 'Admin'),
(3, 'BMO'),
(2, 'Kadep'),
(5, 'Staff'),
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `departemen_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `tanggal_masuk` date DEFAULT NULL,
  `status_karyawan` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `qr_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `departemen_id`, `role_id`, `jabatan_id`, `nik`, `nama_lengkap`, `email`, `no_hp`, `alamat`, `tanggal_masuk`, `status_karyawan`, `qr_code`, `password`, `created_at`, `updated_at`) VALUES
(1, 10, 5, NULL, '0340041', 'V. HERDI SUNDJAJA. H', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0340041.png', '$2y$12$eopU9xlDi.m1q70RKXHOwu4yOjEjDOh0IyhImq.aIapPvDwIvvmMW', '2025-10-01 20:46:29', '2025-10-01 20:46:28'),
(2, 10, 5, NULL, '0440023', 'TJHIN JOHAN BUDIHARTANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0440023.png', '$2y$12$qFgWQaxKo/Korw8FDQd66.SsoE5u54x2fzfmuIwao3sFmDgSQKg8q', '2025-10-01 20:46:29', '2025-10-01 20:46:29'),
(3, 10, 5, NULL, '1540759', 'ELSYE', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540759.png', '$2y$12$hPqybMH/zqoup7RXdn57h.T.Lb6SkxqE812i5pLtYUKUlE3ExOAv2', '2025-10-01 20:46:30', '2025-10-01 20:46:29'),
(4, 10, 5, NULL, '2040846', 'ALVIN SUGANDA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040846.png', '$2y$12$SEDdfryq0l/tiOdiRqg.8uz0BRWx0Pc5P2qyFXeEv9sV4g3H44Wn2', '2025-10-01 20:46:30', '2025-10-01 20:46:30'),
(5, 10, 5, NULL, '0640295', 'BRIAN JONATHAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0640295.png', '$2y$12$Yn.Lq22WDHYZAV9GeB5.Ce1x0ERQSlrB66uQNXSzGYMwsHt9jgXFm', '2025-10-01 20:46:31', '2025-10-01 20:46:30'),
(6, 10, 5, NULL, '1640779', 'CHATARINA WIGATI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640779.png', '$2y$12$tRbNf1WeSVAiiUc8737t1ea/4lMnnyUHMmpEZeEvpXdPDjU1lu0H6', '2025-10-01 20:46:31', '2025-10-01 20:46:31'),
(7, 11, 5, NULL, '1640785', 'DANISH ARTHA SUBRATA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640785.png', '$2y$12$UnSUfieIqBGee8MgkDcnZ.6aJaKutw5sHhOkPVB1l9qQxqs5J8WZe', '2025-10-01 20:46:32', '2025-10-01 20:46:31'),
(8, 10, 5, NULL, '2240850', 'DAVIDTO DOMINGGUS MARCELLINO S', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2240850.png', '$2y$12$mMQ72hAQ5Wf9OHKYq0uelea74hP3/zllrnkAn/QWokJ0cclEy0Ur2', '2025-10-01 20:46:32', '2025-10-01 20:46:32'),
(9, 10, 5, NULL, '1440738', 'DHYAN SULISTYONO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440738.png', '$2y$12$Wut1LptB5DnxPV4L/gHwH.JwtbVDAXViihVPNoO.f7TChXSWC8bFW', '2025-10-01 20:46:33', '2025-10-01 20:46:32'),
(10, 10, 5, NULL, '2340860', 'ERRIN TARUNA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340860.png', '$2y$12$IlFSCUGBMUPTHMC2BCkd7uONSAQQ1fnnJthvZPl/ycaLjyZiNghMe', '2025-10-01 20:46:34', '2025-10-01 20:46:33'),
(11, 6, 5, NULL, '2540871', 'FISAL', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2540871.png', '$2y$12$Gkj/Qxj1uCuAKwq0bG5VX.mBzCWPb.J.6AFuJIXE5ahepfHe9l6N6', '2025-10-01 20:46:34', '2025-10-01 20:47:05'),
(12, 11, 5, NULL, '1740799', 'LUKI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740799.png', '$2y$12$MSElkOXz1Z3mlQOuffChRO/mvvjb9t9eVNO29uSgD/QMLe8ok9hAG', '2025-10-01 20:46:35', '2025-10-01 20:46:34'),
(13, 10, 5, NULL, '1840806', 'MARGARETHA MARIA LOY', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840806.png', '$2y$12$bqjVEDB3H.BU8F4OCp3SPesCamvLV4UvSByOCHphaGYl5ZhN0iJj2', '2025-10-01 20:46:35', '2025-10-01 20:46:35'),
(14, 10, 5, NULL, '9340033', 'MAS OVA SUSSANTY', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9340033.png', '$2y$12$meqNHsGsIp/QabeGBLDJ0eBWfl8SDlaF4sNervfqohLxfBbGOtNk.', '2025-10-01 20:46:36', '2025-10-01 20:46:35'),
(15, 10, 5, NULL, '1240643', 'MUHAMMAD PAMUNGKAS', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240643.png', '$2y$12$3rA0FqU.tMVCFDWiu5YZ7uCX4AsHUmbMeZZk/H.6YYEL0V0D79YAq', '2025-10-01 20:46:37', '2025-10-01 20:46:36'),
(16, 10, 5, NULL, '1940823', 'SAMUEL ALDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940823.png', '$2y$12$Hqubcz6437naIQJK2qhsDe3LeC2MY9WHMK18mPsghTxXxFu.hcywG', '2025-10-01 20:46:37', '2025-10-01 20:46:37'),
(17, 10, 5, NULL, '1940824', 'VENICIA NAFTALI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940824.png', '$2y$12$vV9xN9cOCU2L9/vRh0ei/em0Xa4CnXjvC2HdQ8puM6HfmGeiTcTIK', '2025-10-01 20:46:37', '2025-10-01 20:46:37'),
(18, 9, 5, NULL, '9140018', 'ANDI SUMARTA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9140018.png', '$2y$12$YWnshhXaL0RutoX/ZFlHMeD5x9bHy3HSQYbvncYeKZhXXSb6xwqK2', '2025-10-01 20:46:38', '2025-10-01 20:46:37'),
(19, 9, 5, NULL, '2440866', 'ABU YAZID AL BUSTHOMI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2440866.png', '$2y$12$cmgsQp34wR2nQ58WDlIghuCU/PB0ukB2dXYLWkY0uKQeCADbmxy/y', '2025-10-01 20:46:38', '2025-10-01 20:46:38'),
(20, 9, 5, NULL, '1440744', 'FRANSISCA IRAWATY', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440744.png', '$2y$12$64Q2v9dGBfMjAEQ55q1.yuBQcyfAskbhyBjWG3Tk39LMN3e6IRmPe', '2025-10-01 20:46:38', '2025-10-01 20:46:38'),
(21, 9, 5, NULL, '1540763', 'FELYA GABI MEGAN D.P', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540763.png', '$2y$12$8y1JBsa.zE5a7d.phbFVI.N0sU.LTm0k1fa.0wzSRX0exsuxaVy2u', '2025-10-01 20:46:38', '2025-10-01 20:46:38'),
(22, 9, 5, NULL, '9240128', 'QOMARI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9240128.png', '$2y$12$XTKTbCq/GwnGzXoCcQ4TZedZMNuzbn7Ht3RgPo0c9qA.8CGZpXrI2', '2025-10-01 20:46:39', '2025-10-01 20:46:38'),
(23, 2, 3, NULL, '0440031', 'IWAN GUNAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0440031.png', '$2y$12$4wNAbkd9nkjv2yBMVNthu.ev/2nkQxZrwn4AecIhOKi3ugDQ2sWkS', '2025-10-01 20:46:39', '2025-10-01 20:46:39'),
(24, 2, 3, NULL, '2440862', 'ADE ARYANI DARMAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2440862.png', '$2y$12$AxuxZvXGrOuSAoie8thHvObO77eOJE9I0HUBW9Uf181NKS1aPRVqG', '2025-10-01 20:46:39', '2025-10-01 20:46:39'),
(25, 12, 5, NULL, '9540032', 'DADANG SANUSI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9540032.png', '$2y$12$bwucqUXrAdM46jhVscn60euyXcrDNt0GXvMObpVU20BX.tVzXaQkS', '2025-10-01 20:46:40', '2025-10-01 20:46:39'),
(26, 12, 5, NULL, '2340858', 'HERLINA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340858.png', '$2y$12$GE65To.XmrT440BSPcvI..njzAIYe4S8fbb5P7cWl15IEX6/bHoh2', '2025-10-01 20:46:40', '2025-10-01 20:46:40'),
(27, 12, 5, NULL, '1040503', 'MUSAROFAH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1040503.png', '$2y$12$JiLJlUmXngLaQh4e788qYOZkU8KfUOUmbhbl.PEWL1LCLOZGCLIDu', '2025-10-01 20:46:40', '2025-10-01 20:46:40'),
(28, 12, 5, NULL, '9140077', 'NURLAELA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9140077.png', '$2y$12$GVDGlLf/K7ad2d3J8ARfXeE4XMmt1Fz1VtkRbP5LB.rpT7PseXC0K', '2025-10-01 20:46:40', '2025-10-01 20:46:40'),
(29, 12, 5, NULL, '1640772', 'ADE THOVANI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640772.png', '$2y$12$cSLfXyLW6aAA.2zWEGc3MO2kMQfbXNTno9Sii7yu4HVKEg8USrEom', '2025-10-01 20:46:41', '2025-10-01 20:46:40'),
(30, 12, 5, NULL, '1640793', 'AGUS CHOMSAH NUR ROKHMAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640793.png', '$2y$12$NSf4OQWwMjOxJ01mMxe28e2IdAihUmOTlZLeZLf4ytEVwMu2CXX/.', '2025-10-01 20:46:41', '2025-10-01 20:46:41'),
(31, 12, 5, NULL, '0440211', 'AGUS SETIAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0440211.png', '$2y$12$9Z3AVKRqYsiIogXHH4A0VusUb7xe.MZAnL.Mh/FlP06M6K2Xn09Ra', '2025-10-01 20:46:41', '2025-10-01 20:46:41'),
(32, 12, 5, NULL, '9540059', 'AGUS SUPRIYADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9540059.png', '$2y$12$JzWKd2NLuQFH2OI6ngSkJ.Kbz9adwZPRomLd/oCBn.wm7OfOX28fy', '2025-10-01 20:46:41', '2025-10-01 20:46:41'),
(33, 12, 5, NULL, '2340854', 'BAYU HERMAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340854.png', '$2y$12$j1Hk1dqCLrg70Zf6a1mmZ.SqOEbnKh08wT0wX.ONnlua3amWFpyBK', '2025-10-01 20:46:42', '2025-10-01 20:46:41'),
(34, 12, 5, NULL, '1940832', 'CANDRA IRAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940832.png', '$2y$12$sqXbuaZ.UqXlKle1Efqg9OyOLz8TKRhm2.Wt1EE2YvSUTgSySNbcO', '2025-10-01 20:46:42', '2025-10-01 20:46:42'),
(35, 12, 5, NULL, '1240619', 'CHAMID MASRURI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240619.png', '$2y$12$WutEaTJMIRiaxpooNiqV7O3ZRJblh/D5lw16g7NZE7ZK1xJDuJ78.', '2025-10-01 20:46:43', '2025-10-01 20:46:42'),
(36, 12, 5, NULL, '1340713', 'CHRISTOVORUS FERNANDEZ', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340713.png', '$2y$12$PSMFI3yWRU.8uETxM9261uDgS0VdTrllLqjvtQzaxmQqsjuEkAKyK', '2025-10-01 20:46:43', '2025-10-01 20:46:43'),
(37, 12, 5, NULL, '1940833', 'DANI DWI LAKSONO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940833.png', '$2y$12$gRwmADLhMTp/oUt8QI.CGOryvnMcAlWoaQumOwYwKkXBgeKTVeWXS', '2025-10-01 20:46:44', '2025-10-01 20:46:43'),
(38, 12, 5, NULL, '1740796', 'DEDI SUDRAJAT', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740796.png', '$2y$12$ImpPqoD.NF6OvLpnx1.R1uXSv7496JPxO/LMOWmOyqpZ.eV7jGtIi', '2025-10-01 20:46:44', '2025-10-01 20:46:44'),
(39, 12, 5, NULL, '1740802', 'DEDY WAHYUDIN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740802.png', '$2y$12$Wc7uwzY9ZsnKi0aq5aVoY.8wIctRWyLqY9RAWhJrQ88G7/Ib8GBjW', '2025-10-01 20:46:44', '2025-10-01 20:46:44'),
(40, 12, 5, NULL, '1940820', 'ELMA AMELIA LUCTNIAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940820.png', '$2y$12$Emo6O296PG0qvQao0O2n0uzuFs4qdlu4HwxgJzsa4cSuuF5JS3SOu', '2025-10-01 20:46:45', '2025-10-01 20:46:44'),
(41, 12, 5, NULL, '1840813', 'ERIK ANDRIAN SAPUTRA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840813.png', '$2y$12$Z6FvxI7GhdxNjLTngkTakeqUIFlKmsLE42.2chn/zCSS1WNhiJUl6', '2025-10-01 20:46:45', '2025-10-01 20:46:45'),
(42, 12, 5, NULL, '1340716', 'EUIS ATIKA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340716.png', '$2y$12$el00gerAR0p5uI0x/S86qOPHgAng4XHRJbzxi7R6g5DKwmbuAVbD2', '2025-10-01 20:46:45', '2025-10-01 20:46:45'),
(43, 12, 5, NULL, '1740801', 'FAHRUDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740801.png', '$2y$12$2yBJxj32ZmKqQBvAX51Leet1hKT/79MtoYZKVa35A3pLQuit2H/Fe', '2025-10-01 20:46:46', '2025-10-01 20:46:45'),
(44, 12, 5, NULL, '1740797', 'FAHRULLAH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740797.png', '$2y$12$HfyMrkDiYt102MaNO9GP9O.KBW7WhbkBrHpfGBZq8nr15xJGCMYBa', '2025-10-01 20:46:46', '2025-10-01 20:46:46'),
(45, 12, 5, NULL, '1140554', 'GANESA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140554.png', '$2y$12$n7CZaBVGJ5jYQibuQgwPReJzKbZUlFVMszXhCLCWJ0fS2qH85KaC2', '2025-10-01 20:46:46', '2025-10-01 20:46:46'),
(46, 12, 5, NULL, '1640788', 'INDRA SAPUTRA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640788.png', '$2y$12$R5UliI7l4FbDgQpS.0yCWOX5evwoqjFlU9dNeCYOaqJt8HkeEwIwG', '2025-10-01 20:46:47', '2025-10-01 20:46:46'),
(47, 12, 5, NULL, '1340718', 'JAENUDIN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340718.png', '$2y$12$slbcI78QFoiXOcCzWfE9weFe8dQqpa4kdaxmBQz8b6bF9Qz8Xy6lS', '2025-10-01 20:46:47', '2025-10-01 20:46:47'),
(48, 12, 5, NULL, '1940821', 'JIHAN NATASHA MEILANI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940821.png', '$2y$12$.GlGF38Lojt/od2Mj5RbsuG3vvs.TNDfsXBDIncChVaUVgPz7uARS', '2025-10-01 20:46:47', '2025-10-01 20:46:47'),
(49, 12, 5, NULL, '1840803', 'LISSIU HUTASOIT', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840803.png', '$2y$12$Jmwj4UHZbCvEc6q.AvxcOe1U/rfkGGnei9Y/3alRb9.THUE4EMjPC', '2025-10-01 20:46:47', '2025-10-01 20:46:47'),
(50, 12, 5, NULL, '1340710', 'LIYA SUFRIATNA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340710.png', '$2y$12$QVkttLa3NFObw56yn6XQUOSgflQQId.qH8WOSf8Lk3/x.XT26EVei', '2025-10-01 20:46:48', '2025-10-01 20:46:47'),
(51, 12, 5, NULL, '1340720', 'MUHAMAT ARPIAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340720.png', '$2y$12$SmvEi5NxKp93zeggij1vleVGDj.UT79t5QFe1uoByLwnVXVshvuFK', '2025-10-01 20:46:48', '2025-10-01 20:46:48'),
(52, 12, 5, NULL, '1040481', 'NANANG PRAMUDIAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1040481.png', '$2y$12$W.4srPTbMbYBZDq7TsZXLuumOnOpe9N5WvZGaAOM6SGGUF8C02mpC', '2025-10-01 20:46:48', '2025-10-01 20:46:48'),
(53, 12, 5, NULL, '1340708', 'NURUL HASANAH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340708.png', '$2y$12$cGscSlwJkzbrgZLCST7oVOJUA6xLUwPeq10NpGzcAuHQWwgyslDCi', '2025-10-01 20:46:49', '2025-10-01 20:46:48'),
(54, 12, 5, NULL, '1340715', 'PETRUS YOPPY CHRISTIAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340715.png', '$2y$12$tFfvZ2GlpjDEjPelCNqAgulOSH..7j2TEAy7ALAq4V8gsS5w7oBju', '2025-10-01 20:46:49', '2025-10-01 20:46:49'),
(55, 12, 5, NULL, '2540867', 'RIFAL ALHABSYI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2540867.png', '$2y$12$GH3.D8QGxT.5sqbi.E3Ob.0eDBacVijHvv4jKlzRSFibuzHNPKhb2', '2025-10-01 20:46:49', '2025-10-01 20:46:49'),
(56, 12, 5, NULL, '1440730', 'ROSMALIA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440730.png', '$2y$12$4OZvK0jNyEEfY.hNKpEIw.lRcUh.WewUMqsWTfCMGD.AbX1W34TfS', '2025-10-01 20:46:50', '2025-10-01 20:46:49'),
(57, 12, 5, NULL, '1440740', 'SAEPUL BASRI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440740.png', '$2y$12$fdScXTFIf1UozF9pOqaSbucZvjeIooQs8xv3wK6UtsJken5mfBcZ.', '2025-10-01 20:46:50', '2025-10-01 20:46:50'),
(58, 12, 5, NULL, '1440729', 'SINTIA DANIA PUTRI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440729.png', '$2y$12$xWyP08p.1wS/9fEWRw8PEujG3EsuJ63abkP/0cEe7gkpQIZK96m9C', '2025-10-01 20:46:50', '2025-10-01 20:46:50'),
(59, 12, 5, NULL, '1740798', 'TEGUH FADLI ALIMI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1740798.png', '$2y$12$NFk33NRGf/J1jynGtVhY9.l0GyUypdJDIvzx/kVvANerPKY/z05sK', '2025-10-01 20:46:51', '2025-10-01 20:46:50'),
(60, 12, 5, NULL, '1340721', 'TIHAMAH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340721.png', '$2y$12$YslCU5JVCnKPJVf3UFbMWemTsBzCPyAiYAottnU.Gik3WnvpYxZwm', '2025-10-01 20:46:51', '2025-10-01 20:46:51'),
(61, 12, 5, NULL, '1640774', 'UCEP', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640774.png', '$2y$12$uQvMYSsQxeSer/oV8gDCeOF.vVgTj2c8cjlWNT.BOLsBcrHHPxrAG', '2025-10-01 20:46:51', '2025-10-01 20:46:51'),
(62, 12, 5, NULL, '1540760', 'WAHYUNI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540760.png', '$2y$12$.AF5uqaM4TCUIh184GfDwOZajot.vso0PQ2/fVIN3c3En3iES0CIm', '2025-10-01 20:46:51', '2025-10-01 20:46:51'),
(63, 13, 5, NULL, '1640781', 'ARROHMAN SANJAYA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640781.png', '$2y$12$8v2eebc0mGlAYYItKCy0p.2PoHnEYNFnh.vDkh6CcC7vK08LJt38W', '2025-10-01 20:46:52', '2025-10-01 20:46:51'),
(64, 13, 5, NULL, '1940836', 'DANI HARSANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940836.png', '$2y$12$jxmtHB7oVhUPSPtDWqgCHeIXGJ2LAXe3mW96V9ia.X8NMKWO.xpj6', '2025-10-01 20:46:52', '2025-10-01 20:46:52'),
(65, 13, 5, NULL, '9040153', 'MARDIYONO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9040153.png', '$2y$12$sicK2H6.Xe/AYAmDh4MduuwtB6A9/n0qTooQvON5tsnDwALHFSu3.', '2025-10-01 20:46:53', '2025-10-02 04:13:21'),
(66, 13, 5, NULL, '0140031', 'WIYONO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0140031.png', '$2y$12$wPjEdBhqH3sxAh69CPJKf.PX7OqBd7h0Pjneipp.M58wUd/1ay0J.', '2025-10-01 20:46:53', '2025-10-02 04:13:26'),
(67, 13, 5, NULL, '1340714', 'YAYAN IIS RISDIYANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340714.png', '$2y$12$SbUZeaax2S/OAsPu.4D6x.neIoaZ1K2wdI3Ro3dChgiYsOxMLvG.K', '2025-10-01 20:46:53', '2025-10-02 04:13:30'),
(68, 16, 5, NULL, '1940826', 'AGUS SETIAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940826.png', '$2y$12$VQHXyEjG5oJSIv9J5hA.EORFXXygoFKLZ109h1BTaOUZHL49Sbb3y', '2025-10-01 20:46:54', '2025-10-02 04:14:27'),
(69, 16, 5, NULL, '1640778', 'ANTHONY WIJAYA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640778.png', '$2y$12$n3zAWY4zBPpZRthXS0PNMezWf8DrU0RikRuMmfrQp6ci/IDGycey.', '2025-10-01 20:46:54', '2025-10-02 04:14:31'),
(70, 16, 5, NULL, '9640118', 'BUDI SANTOSO KOERNIA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9640118.png', '$2y$12$KXLIHT9/w.R9w9tsP5xosO4zjx6lJlLT8aGnANDiw08U2f1FazQdm', '2025-10-01 20:46:54', '2025-10-02 04:14:36'),
(71, 16, 5, NULL, '1140601', 'DEDEN SAPUTRA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140601.png', '$2y$12$XLnMvYwpQM18GhpKEkYmm.yOLj768OiI2gWZ5kGqNE3HBMLSub2wC', '2025-10-01 20:46:54', '2025-10-02 04:14:42'),
(72, 16, 5, NULL, '2040837', 'DENI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040837.png', '$2y$12$hn4ga9M0zPhUvsbifFVy2ORJb5.lXISM.yYm30BB.4z1y0Wnkolpi', '2025-10-01 20:46:55', '2025-10-02 04:14:46'),
(73, 16, 5, NULL, '1140546', 'FITRI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140546.png', '$2y$12$0zITBb0ayYDgv1EZtH/5Ye4400v/TcEKtVuHZyY8qW1.WK3T38Xha', '2025-10-01 20:46:55', '2025-10-02 04:14:53'),
(74, 16, 5, NULL, '0540431', 'MARSAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0540431.png', '$2y$12$DOD/LUfjOS2vXQnKrPUNEOC4318nOgN6ImE9djl71Ht99kNZGSOzK', '2025-10-01 20:46:55', '2025-10-02 04:14:59'),
(75, 16, 5, NULL, '1840814', 'PYAS ANGGIT DITIRA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840814.png', '$2y$12$kTOgT/8Y38rWWURPjeKB8eUnJIbLm84H3gLHJUzD.HidqsVR9yKMC', '2025-10-01 20:46:56', '2025-10-02 04:15:09'),
(76, 16, 5, NULL, '1640787', 'REZA DEWANTORO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640787.png', '$2y$12$p5PzMLZudIkLyorB8pkCuOS9.hICqKYpcqjMv6W4VvQeLaNT5LwW6', '2025-10-01 20:46:56', '2025-10-02 04:15:14'),
(77, 16, 5, NULL, '2240848', 'SUMANTRI ARIFIN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2240848.png', '$2y$12$/bHDyMzaMKkFkzE7PAWhGOZ8UGNJnzD7Mp81XRJMWGLdrRpG1y8Hi', '2025-10-01 20:46:56', '2025-10-02 04:15:18'),
(78, 16, 5, NULL, '0640457', 'TARSAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0640457.png', '$2y$12$7pdfFlNaOf4BG376lDpY7OhhigaZJAqqNuqXe/mt/cXqj1TtyQNQW', '2025-10-01 20:46:57', '2025-10-02 04:15:23'),
(79, 16, 4, NULL, '2540873', 'YOSELIN PARDOSI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2540873.png', '$2y$12$.d/sTYhIIFYFVFnB45Q/2ebwK8eIxMqr9HZCHrGU9XvWFdfvmVAl.', '2025-10-01 20:46:57', '2025-10-02 04:15:29'),
(80, 6, 5, NULL, '1540750', 'ABDUL MALIK', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540750.png', '$2y$12$ejkZmjZ6ExIGtToJBjQfg.Q7V0OdfvEzB8ZFdRovY4cpplrA6UO9K', '2025-10-01 20:46:57', '2025-10-01 20:46:57'),
(81, 6, 5, NULL, '2040842', 'ADE SANDI MAULANA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040842.png', '$2y$12$n5N6zM6sCeLcLxGXmb5m8.0OHblmc825AH8pZoMEJP/aUCTNw8S2y', '2025-10-01 20:46:58', '2025-10-01 20:46:57'),
(82, 6, 5, NULL, '9940022', 'AGUNG NUGROHO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9940022.png', '$2y$12$fbPOFLLqhlbIq27R0ou5EeTzTtaPA2nn8.1/PdG7mytH0iCJo8jrC', '2025-10-01 20:46:58', '2025-10-01 20:46:58'),
(83, 6, 5, NULL, '0040045', 'AGUS DJULI DJUNAEDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0040045.png', '$2y$12$C8zNmz0K4O5W7f5qJz2ZXe4yEZEQu/J1uCbwHV2B55xY1IDFt9JZO', '2025-10-01 20:46:58', '2025-10-01 20:46:58'),
(84, 6, 5, NULL, '9640088', 'AGUS EDI RUKANDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9640088.png', '$2y$12$f6RtRX9XbC9QXlwYfgcBwOnBOxdiHF2nvu8GxLjR3zpsuCCsb12b6', '2025-10-01 20:46:59', '2025-10-01 20:46:58'),
(85, 6, 5, NULL, '9140051', 'AHMAD HUSAINI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9140051.png', '$2y$12$//3R7sFkqOQS9j0XbdjZy.qNfOHdmE7q6We1OMWpwOCRGwb/JyIIu', '2025-10-01 20:46:59', '2025-10-01 20:46:59'),
(86, 6, 5, NULL, '1840811', 'AHMAD ZAINI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840811.png', '$2y$12$6rM5bu25c7ABTOVN4FPt/uo5XsrRccVfUd.o28THtWqYLsQfcn6u6', '2025-10-01 20:46:59', '2025-10-01 20:46:59'),
(87, 6, 5, NULL, '0040096', 'ALEXANDER AYAWAILA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0040096.png', '$2y$12$Kl/wGvfZIqU42SOsAUn6eOaqMQ55OHoMIozeG6wj3XKcH8/dbIZZe', '2025-10-01 20:47:00', '2025-10-01 20:46:59'),
(88, 6, 5, NULL, '2040843', 'ANDI SANDRA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040843.png', '$2y$12$70iiVR8hjrdY1WNJBef5VezkJ5MUPZEqiUQ7Ttv1KPgvAOKtdMtzO', '2025-10-01 20:47:00', '2025-10-01 20:47:00'),
(89, 6, 5, NULL, '2040844', 'ANDRIS TRI YAHYA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040844.png', '$2y$12$nFjE3Bx296RLk81p.uDNGOwgTkFW6s06dkUefuxd8wig0OTDvUznO', '2025-10-01 20:47:00', '2025-10-01 20:47:00'),
(90, 6, 5, NULL, '1640791', 'ASEP HERYADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640791.png', '$2y$12$OaRo1tRlt7e0Bj.LFLg/iu/SDnawyq7WZZv0OCzGNfPIv6d0Z8a5S', '2025-10-01 20:47:01', '2025-10-01 20:47:00'),
(91, 6, 5, NULL, '9640011', 'DADANG SUPRIA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9640011.png', '$2y$12$rVgtgHq.qL7yGEqfATNUrOEqA0bAYJY8UEr2ZJIMxYu0WZHuJvfJ2', '2025-10-01 20:47:01', '2025-10-01 20:47:01'),
(92, 6, 5, NULL, '1440732', 'DWI HARTONO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440732.png', '$2y$12$mBo2vMHPwUpDIFd/hilOvuZI44yc9lWNBt1iLE7iz4hFKXMqZ0La2', '2025-10-01 20:47:01', '2025-10-01 20:47:01'),
(93, 6, 5, NULL, '1440731', 'EDDY SUTAMTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440731.png', '$2y$12$l4L51PffIwVbBR/0lPPag.XLT5xV7L8AqJe7QQIQMI.0fgtfdU3vS', '2025-10-01 20:47:01', '2025-10-01 20:47:01'),
(94, 6, 5, NULL, '1240651', 'EKA ARIES YANDHA LESMANA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240651.png', '$2y$12$cHto6iU8ZWKXHVY/bh7YI.BHSZA6EptbMY.Dn5fKFJwdKQIQzpNly', '2025-10-01 20:47:02', '2025-10-01 20:47:02'),
(95, 6, 5, NULL, '1640789', 'EKO JULYANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640789.png', '$2y$12$jp5P089dOCJEkES.y6aygeVZF51e9NqtYUSYYDjOjkJOO.zw./wUq', '2025-10-01 20:47:04', '2025-10-01 20:47:03'),
(96, 6, 5, NULL, '1640792', 'ENDA JUANDA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640792.png', '$2y$12$8NtLOSOAMis5dOO15onFcOdNwbkbpp2B9dcGvQcfkt4vETWvXtu2C', '2025-10-01 20:47:05', '2025-10-01 20:47:04'),
(97, 6, 5, NULL, '2340859', 'GUNTUR PRABOWO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340859.png', '$2y$12$umvYrxfGPlpieY97.5.Ww.n9IF8tyMuGEEr.znzaNm4eDFUq33dga', '2025-10-01 20:47:05', '2025-10-01 20:47:05'),
(98, 6, 5, NULL, '2440864', 'HANDOKO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2440864.png', '$2y$12$G5Z/4ZxKo1W7HCnZgsqTn.mjAF.lTud4/xQMyG6AxKEgR1pvYIT1m', '2025-10-01 20:47:06', '2025-10-01 20:47:06'),
(99, 6, 5, NULL, '1240635', 'HARUN SUHADA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240635.png', '$2y$12$iyGWN0lf02ZF.Yoabcv/hurOdi6JUtw6dCK4XLWRDXxBV/R4jVrIG', '2025-10-01 20:47:06', '2025-10-01 20:47:06'),
(100, 6, 5, NULL, '1940828', 'IMAM TOHARI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940828.png', '$2y$12$DGZZZWcYHJ3D9t3JGvCCWOZEZCqhRd9B/DL.JgtwCC8TE34N6mt4i', '2025-10-01 20:47:07', '2025-10-01 20:47:06'),
(101, 6, 5, NULL, '1940835', 'ISEP WAHYUDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940835.png', '$2y$12$TyYp38D80sPNxRuA3oniH.iCm94Kzq6ZZp/6IQbST9WTp35ipbuzu', '2025-10-01 20:47:07', '2025-10-01 20:47:07'),
(102, 6, 5, NULL, '1440725', 'IWAN INDIRWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440725.png', '$2y$12$PRqVTgSKLTN/o674mzYJ8.MEnPMCieJMTibDt0v39cQMK7X9wG2ni', '2025-10-01 20:47:07', '2025-10-01 20:47:07'),
(103, 6, 5, NULL, '1140562', 'JANIM JAYADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140562.png', '$2y$12$rhE679WZjWFs5pHt71Cq0OszZiANxjv8MyFAE/nZ.tmVd132BCbki', '2025-10-01 20:47:07', '2025-10-01 20:47:07'),
(104, 6, 5, NULL, '9540016', 'JOKO WALUYO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9540016.png', '$2y$12$KO43.JEcQWCrpO4PccaDPeMBu8Ieu1NN6FD0rIgUYIwlmOsskXkhi', '2025-10-01 20:47:08', '2025-10-01 20:47:07'),
(105, 6, 5, NULL, '1540746', 'LUKMAN HAKIM', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540746.png', '$2y$12$W75VkDr8aSGuzsll592n8.fDxw25mERKVJDmiiuXc8T4iC1OYj4vC', '2025-10-01 20:47:08', '2025-10-01 20:47:08'),
(106, 6, 5, NULL, '2040845', 'M. RAHMAT DIANTO S', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040845.png', '$2y$12$nSDbmQjWvfWlegvdBFgvAOkmuEcd4gmFkrNsGtNso9DMn.O5iTE9i', '2025-10-01 20:47:08', '2025-10-01 20:47:08'),
(107, 6, 5, NULL, '9240071', 'MAMAT RAHMAT', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9240071.png', '$2y$12$EAWuY.I2Cpb784g73F7AVeKtUjG3PrvQD9me1ARMytu3rX22Xfx1S', '2025-10-01 20:47:09', '2025-10-01 20:47:08'),
(108, 6, 5, NULL, '1940831', 'MOHAMAD IKBAL FAUZI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940831.png', '$2y$12$AVk04SomnLWdxu6CM.B8FO8fJYmgR1AALG.YWe6pW7aSQxA8jD3Kq', '2025-10-01 20:47:09', '2025-10-01 20:47:09'),
(109, 6, 5, NULL, '1940827', 'MUHAMAD NUR HUDA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940827.png', '$2y$12$tQrej16H0GO4.gogmJixqeg75PvCETpupjAQ8x.JYm4JH0ni0r/qy', '2025-10-01 20:47:09', '2025-10-01 20:47:09'),
(110, 6, 5, NULL, '1140589', 'MUHAMAD ISMAIL', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140589.png', '$2y$12$q3.aQESFXvS10ek.zp2BXextvpIbGIscYT4bUbocj.kPWGSucVyH2', '2025-10-01 20:47:09', '2025-10-01 20:47:09'),
(111, 6, 5, NULL, '9240063', 'NANA SUYATNA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9240063.png', '$2y$12$BgYFfyYPHpdn6p4iX1kSiuA0PZ0hMx5YLjOgrpXCYgVHTRjcdNSri', '2025-10-01 20:47:10', '2025-10-01 20:47:09'),
(112, 6, 5, NULL, '1940829', 'NUROKHMAN JAYA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940829.png', '$2y$12$JQRucs1KEH.c1b6fto6MFevdXE2RRsSpfIB5cxiBZ.QQg2Mmi1PVC', '2025-10-01 20:47:10', '2025-10-01 20:47:10'),
(113, 6, 5, NULL, '9640071', 'NURUL ABDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9640071.png', '$2y$12$JUBU52wk/MqUV1JjAYP4Dep/S/GAiS1atNkL7L0JAeq/lhwNtmDH6', '2025-10-01 20:47:10', '2025-10-01 20:47:10'),
(114, 6, 5, NULL, '1840812', 'NURYADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840812.png', '$2y$12$thdUHBYpErpCYPLCXtdCIuGWAWpDpjQ3lMjG2/U7m3rPIdk0Tp5KG', '2025-10-01 20:47:11', '2025-10-01 20:47:10'),
(115, 6, 5, NULL, '2540868', 'RANDI ADINATA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2540868.png', '$2y$12$kze7UaFDAqVQI6kMF.fm9.pywyKUJieKZZJWhZ3/mrJlvODoY7/ra', '2025-10-01 20:47:11', '2025-10-01 20:47:11'),
(116, 6, 5, NULL, '0940497', 'REZA FADRIYAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0940497.png', '$2y$12$SsuIwECFmLn/BpRfSYQbfu/nl8XVr.uo1ydiWjc4/rYn8Ts1InWuW', '2025-10-01 20:47:11', '2025-10-01 20:47:11'),
(117, 6, 5, NULL, '2240849', 'ROBBY SETIAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2240849.png', '$2y$12$DI5bVMvZKJH7PoSQOki2P.5XTbjS6ZQGr3ni3a6MvqhiBsXfErfIK', '2025-10-01 20:47:12', '2025-10-01 20:47:11'),
(118, 6, 5, NULL, '1340711', 'SUKMARA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340711.png', '$2y$12$hw0Re74PDSUd6DRizMoBUOJ9ykDFsHzwzwoRd/t5gyspV72E.V76.', '2025-10-01 20:47:12', '2025-10-01 20:47:12'),
(119, 6, 5, NULL, '0940501', 'SUPRIYADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0940501.png', '$2y$12$s22OtHptcHyrxRFyKWNBnO2luYmuQlLT9L.ig4KZkpDlghkuAP0xi', '2025-10-01 20:47:12', '2025-10-01 20:47:12'),
(120, 6, 5, NULL, '1240686', 'SURYA WINATA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240686.png', '$2y$12$bMo9DG28zzY26AFyNejNHOeCth.23MUP.JrTC5iHFqak8FvggKycq', '2025-10-01 20:47:13', '2025-10-01 20:47:12'),
(121, 6, 5, NULL, '1940834', 'SUTANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940834.png', '$2y$12$CsdU5CMEin/nS246ueksI.jY8Jr2XKp3g8I38IhFgYZOOpmLe8Vka', '2025-10-01 20:47:13', '2025-10-01 20:47:13'),
(122, 6, 5, NULL, '9940031', 'SUTEDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9940031.png', '$2y$12$vBbNJq8mCcdIC.cHJXRJ7ON2z20DikEN7s.DxTcDKS9R1J1AbjAAO', '2025-10-01 20:47:13', '2025-10-01 20:47:13'),
(123, 6, 5, NULL, '1640775', 'SYAIFULLOH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640775.png', '$2y$12$UZuRK76m9XxVPfs45s4tBe4S0.a5F1Hz6c7DXtYHMeYnx0DJBAlLG', '2025-10-01 20:47:14', '2025-10-01 20:47:13'),
(124, 6, 5, NULL, '1640782', 'TEGUH FIRMANSAH', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640782.png', '$2y$12$ZbK2XqtpilGIU4KeC.o/IuwrSEPRNFHieqRbrwcTCO2Wo78kXPZ7u', '2025-10-01 20:47:14', '2025-10-01 20:47:14'),
(125, 6, 5, NULL, '1540748', 'TEGUH YULIANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540748.png', '$2y$12$AyS7zH4VX6OM1mWo.t/MoOj2euX4CXVjlQOsP8/2I19He15TvUja.', '2025-10-01 20:47:14', '2025-10-01 20:47:14'),
(126, 6, 5, NULL, '2340855', 'TONI GUNAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340855.png', '$2y$12$G/dNxySsK9lKploEiWvIse3jqI09K/ggs1FZKcTbYMs.ZBYuIDGme', '2025-10-01 20:47:14', '2025-10-01 20:47:14'),
(127, 6, 5, NULL, '1540747', 'YEREMIA YAKOB TATIPATA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540747.png', '$2y$12$kLEpe1kAik56hJtn4pc4xeGTDfkx3CHJ6IlVSCgF6ZXGjMyq04rLK', '2025-10-01 20:47:15', '2025-10-01 20:47:14'),
(128, 7, 5, NULL, '1440733', 'ANTHONY', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1440733.png', '$2y$12$FRgNaN6llT7wd8OZvPr7LO/KgSXFjr.0gbcmv6VKnLz9EORRIIkkq', '2025-10-01 20:47:15', '2025-10-01 20:47:15'),
(129, 7, 5, NULL, '2440863', 'AMEL RYAN MIFTAH RAMADHAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2440863.png', '$2y$12$KN.TNKdffjcIc3.NlbUzk.gMEqbF1EpMz5VRvyBz3BRAb0flbGEBC', '2025-10-01 20:47:15', '2025-10-01 20:47:15'),
(130, 7, 5, NULL, '1640784', 'BAYU PRAWIJAYA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1640784.png', '$2y$12$aVVQJ9m4TbNfraH72tEjReHVMeADWCmy9qNN8YWGHtDkSsA0UM.5a', '2025-10-01 20:47:16', '2025-10-01 20:47:15'),
(131, 7, 5, NULL, '1540770', 'EDI SUJARWO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540770.png', '$2y$12$PNB6UGfq0V82OSz2MiHN2uN5MH4D6WHuHxOVYguM1Az5sWpfDrQpm', '2025-10-01 20:47:16', '2025-10-01 20:47:16'),
(132, 7, 5, NULL, '0740075', 'ERLAN ZAELANI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0740075.png', '$2y$12$jcNCpOHH9tWSYL/zY.Q3xOedfmPQkFKSSVLYLDYYNtmMqj7gCTAS2', '2025-10-01 20:47:16', '2025-10-01 20:47:16'),
(133, 7, 5, NULL, '2040839', 'FAJAR RUSANDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040839.png', '$2y$12$xYdsfZeNhhrebUL8I1Ikvedrsd2WKJhoUCig0teAGINzSsS/jlV4y', '2025-10-01 20:47:17', '2025-10-01 20:47:16'),
(134, 7, 5, NULL, '1340717', 'HASTHO BROTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1340717.png', '$2y$12$TkVWAa405weVwiymGzLkq./a9WS196gdl3IPEThPU/kfTUDnxwTv.', '2025-10-01 20:47:17', '2025-10-01 20:47:17'),
(135, 7, 5, NULL, '2540869', 'ISKANDAR MARJUNI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2540869.png', '$2y$12$.0AH4W/3erzkUSle/IyxquPFBQGfoyAht9nkw4EQI0Ftaib6nlqfi', '2025-10-01 20:47:17', '2025-10-01 20:47:17'),
(136, 7, 5, NULL, '2340852', 'M. DIMAS AZZAHABI ADHA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340852.png', '$2y$12$Nx6ZOadxw0zfcup2Ugc1r.MtifysSBkOVLO3xwq50oLcvDNj0ZzXa', '2025-10-01 20:47:18', '2025-10-01 20:47:17'),
(137, 7, 5, NULL, '2040840', 'MUHAMMAD ALI AULIA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040840.png', '$2y$12$M3tOjMECLZXCwaDI9R1d.OO4hw2nkeLOE7bRVypnXEWLzYnpynZ7a', '2025-10-01 20:47:18', '2025-10-01 20:47:18'),
(138, 7, 5, NULL, '1840810', 'MUHAMAD NURHADI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1840810.png', '$2y$12$ouCCJxENC/3k6RNdxcEFlOsZx2jq8AGzn7OvvqcBNl.P6AByyWPB.', '2025-10-01 20:47:18', '2025-10-01 20:47:18'),
(139, 7, 5, NULL, '2340853', 'NANANG JAMALUDIN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340853.png', '$2y$12$0YZeIKdKH8Uz2M5l7Uly0O/lfdyGpyvO7mauRskUxbSfogxkiH.4.', '2025-10-01 20:47:19', '2025-10-01 20:47:18'),
(140, 7, 5, NULL, '2040847', 'NURROHMAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040847.png', '$2y$12$E.xc9PuAmLFTsICuYIhg3uW/294jQe1X9KPVjTSdsIUoANDX4lpy.', '2025-10-01 20:47:19', '2025-10-01 20:47:19'),
(141, 7, 5, NULL, '9640134', 'OMAN SUGANDA', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/9640134.png', '$2y$12$HGILmsiIQldyFZiRcF/iCeaff4JzcNpVJcMR8eyb/RY1aFtNF.tWy', '2025-10-01 20:47:19', '2025-10-01 20:47:19'),
(142, 7, 5, NULL, '1940815', 'PUSPO WARDOYO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940815.png', '$2y$12$AQzOaRYHp9RLYOsIDk7FJulualvR8ELAnoX1X8b3i40DGbNM9dQb6', '2025-10-01 20:47:19', '2025-10-01 20:47:19'),
(143, 7, 5, NULL, '0740083', 'RAHMAD IWAN PRASETYO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0740083.png', '$2y$12$5miP2oV1J0bQYTpiMcutIuRAL8Qbefhqv.U4r2acJ7.08F3tnB5GK', '2025-10-01 20:47:20', '2025-10-01 20:47:19'),
(144, 7, 5, NULL, '2340851', 'RICKY HERMAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340851.png', '$2y$12$NB4tmbdb0cDGTAgRIJmHPOkyFYF1wjbD.9OER133Br.lIm5j40W8G', '2025-10-01 20:47:20', '2025-10-01 20:47:20'),
(145, 7, 5, NULL, '2040841', 'ROKI SETIAWAN', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2040841.png', '$2y$12$/i7li96MfOrGCSh0tplviezZ/Poy1SqmmfNNyY5XgGlo2wBgrDhx6', '2025-10-01 20:47:20', '2025-10-01 20:47:20'),
(146, 7, 5, NULL, '1140571', 'SEPTO TRIHANDOKO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1140571.png', '$2y$12$Avv9DVQK8IeqmCB.faDhGO2hbAY3KPtRQQ2vf2bw6Z1XsD5aitlVa', '2025-10-01 20:47:21', '2025-10-01 20:47:20'),
(147, 7, 5, NULL, '1540771', 'SUBAKTIO PURWANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1540771.png', '$2y$12$Oaod1WQubF0.vjDKl4lihOUaOxUQblBhuuI8tpji6lR3kfg4cYjg.', '2025-10-01 20:47:21', '2025-10-01 20:47:21'),
(148, 7, 5, NULL, '1240627', 'SUDARYANTO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1240627.png', '$2y$12$vLRJFlQ4G7CdoouiPOSuEOsdLdOqnjDuI/0w02L1I0E3mCgWbfMwu', '2025-10-01 20:47:21', '2025-10-01 20:47:21'),
(149, 7, 5, NULL, '1940822', 'SUGITO', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/1940822.png', '$2y$12$5shHTJIKUQ57K4m.bA5eAu/XL69MApJAHW0WVtQtoEBiPV12VqsDy', '2025-10-01 20:47:21', '2025-10-01 20:47:21'),
(150, 7, 5, NULL, '2440865', 'USEP SAEPUL ULUM', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2440865.png', '$2y$12$5Gsa/sV96fD6m9mRLJl4KetjEev5bEN09TRI/WPUjoVe3hqz9.SJu', '2025-10-01 20:47:22', '2025-10-01 20:47:21'),
(151, 7, 5, NULL, '2340861', 'WAHYUDI', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/2340861.png', '$2y$12$IcCzEdt.sGwaS..7SzVVS.e/1pXn5hwW4.a95tDVvnm.mXGdSRIdy', '2025-10-01 20:47:22', '2025-10-01 20:47:22'),
(152, 16, 1, NULL, '0000001', 'Superadmin', NULL, NULL, NULL, NULL, 'Aktif', 'qr_code/0000001.png', '$2y$12$I/qtwTSVIMbKaKA6jFvlEOobhwslHCb3E5xXpR5QTKhMh4AfcuvHy', '2025-10-01 20:47:22', '2025-10-01 20:47:22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laporan`
-- (See below for the actual view)
--
CREATE TABLE `vw_laporan` (
`pengajuan_id` int
,`nama_lengkap` varchar(100)
,`nama_departemen` varchar(100)
,`jenis_pengajuan` varchar(8)
,`detail` mediumtext
,`tanggal` date
,`status` varchar(9)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`),
  ADD KEY `fk_cuti_user` (`user_id`),
  ADD KEY `fk_cuti_departemen` (`departemen_id`),
  ADD KEY `fk_cuti_pengganti` (`pengganti_id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `kacamata`
--
ALTER TABLE `kacamata`
  ADD PRIMARY KEY (`kacamata_id`),
  ADD KEY `fk_kacamata_user` (`user_id`),
  ADD KEY `fk_kacamata_departemen` (`departemen_id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`medical_id`),
  ADD KEY `fk_medical_user` (`user_id`),
  ADD KEY `fk_medical_departemen` (`departemen_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `nama_role` (`nama_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_departemen` (`departemen_id`),
  ADD KEY `fk_user_role` (`role_id`),
  ADD KEY `fk_user_jabatan` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `kacamata`
--
ALTER TABLE `kacamata`
  MODIFY `kacamata_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `medical_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

-- --------------------------------------------------------

--
-- Structure for view `vw_laporan`
--
DROP TABLE IF EXISTS `vw_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laporan`  AS SELECT `c`.`cuti_id` AS `pengajuan_id`, `u`.`nama_lengkap` AS `nama_lengkap`, `d`.`nama_departemen` AS `nama_departemen`, 'Cuti' AS `jenis_pengajuan`, `c`.`jenis_cuti` AS `detail`, `c`.`tanggal_mulai` AS `tanggal`, `c`.`status` AS `status` FROM ((`cuti` `c` join `user` `u` on((`c`.`user_id` = `u`.`user_id`))) join `departemen` `d` on((`c`.`departemen_id` = `d`.`departemen_id`)))union all select `m`.`medical_id` AS `pengajuan_id`,`u`.`nama_lengkap` AS `nama_lengkap`,`d`.`nama_departemen` AS `nama_departemen`,'Medical' AS `jenis_pengajuan`,`m`.`keterangan` AS `detail`,`m`.`tanggal_pengajuan` AS `tanggal`,`m`.`status` AS `status` from ((`medical` `m` join `user` `u` on((`m`.`user_id` = `u`.`user_id`))) join `departemen` `d` on((`m`.`departemen_id` = `d`.`departemen_id`))) union all select `k`.`kacamata_id` AS `pengajuan_id`,`u`.`nama_lengkap` AS `nama_lengkap`,`d`.`nama_departemen` AS `nama_departemen`,'Kacamata' AS `jenis_pengajuan`,`k`.`keterangan` AS `detail`,`k`.`tanggal_pengajuan` AS `tanggal`,`k`.`status` AS `status` from ((`kacamata` `k` join `user` `u` on((`k`.`user_id` = `u`.`user_id`))) join `departemen` `d` on((`k`.`departemen_id` = `d`.`departemen_id`))) order by `tanggal` desc  ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `fk_cuti_departemen` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`departemen_id`),
  ADD CONSTRAINT `fk_cuti_pengganti` FOREIGN KEY (`pengganti_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_cuti_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `kacamata`
--
ALTER TABLE `kacamata`
  ADD CONSTRAINT `fk_kacamata_departemen` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`departemen_id`),
  ADD CONSTRAINT `fk_kacamata_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `medical`
--
ALTER TABLE `medical`
  ADD CONSTRAINT `fk_medical_departemen` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`departemen_id`),
  ADD CONSTRAINT `fk_medical_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_departemen` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`departemen_id`),
  ADD CONSTRAINT `fk_user_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
