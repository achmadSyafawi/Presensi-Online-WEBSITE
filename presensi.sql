-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 03:47 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `waktu` time NOT NULL,
  `type` enum('1','2','3','') NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  `nidn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `tgl`, `foto`, `waktu`, `type`, `id_lokasi`, `nidn`) VALUES
(13, '2017-06-21', '12523022_1497981931742.jpg', '01:05:00', '1', 2, '12523022'),
(14, '2017-06-21', '12523022_1497982488097.jpg', '01:14:00', '2', 2, '12523022'),
(16, '2017-06-21', '12523022_1497983207903.jpg', '01:26:00', '1', 2, '12523023'),
(17, '2017-06-21', '12523022_1497983483613.jpg', '01:31:00', '2', 2, '12523023'),
(18, '2017-07-04', '12523023_1499163975106.jpg', '17:26:00', '1', 2, '12523023'),
(19, '2017-07-04', '12523023_1499164285675.jpg', '17:31:00', '1', 2, '12523023');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `longi` varchar(30) NOT NULL,
  `lati` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `name`, `longi`, `lati`) VALUES
(1, 'Fakultas Teknologi Industri', '110.410638', '-7.686526'),
(2, 'Fakultas Kedokteran', '110.414109', '-7.686941'),
(3, 'Perpustakaan Pusat', '110.4152006', '-7.6884429'),
(4, 'Fakultas Psikologi dan Sosial ', '110.414141', '-7.687186'),
(5, 'Fakultas Matematika', '110.412558', '-7.687696'),
(6, 'Fakultas Teknik Sipil', '110.412714', '-7.686994'),
(7, 'Fakultas Ilmu Agama Islam', '110.410364', '-7.687159'),
(8, 'Rektorat', '110.413536', '-7.687990'),
(9, 'Fakultas Ekonomi', '110.411518', '-7.760356');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nidn` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `program_studi` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nidn`, `name`, `pangkat`, `jabatan`, `program_studi`, `password`) VALUES
('12523022', 'achmad', 'admin', 'admin', 'informatika', '123456'),
('12523023', 'ddddd', 'dddd', 'ddd', 'ddd', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','operator') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@yahoo.co.id', 'admin', '$2y$10$md/P3Tb6qzA5761CtQxfR.H1LUh9YVLiijfI04cM1ZLlYCqS.9vm6', 'admin', 'AwcHQrRmHkghMSiZUv3oGzkzJoy7ZmwfK9uc5gTbCpWcoeiOSALyirbe4tHB', '2016-06-27 14:30:19', '2017-05-24 02:49:40'),
(3, 'Operator', 'operator@labbaika.com', 'operator', '$2y$10$47uHYKOE/NVjeb9iyMjX2OahtT0uvg5ADfQAr0tgrkLqetasUjDBm', 'operator', 'cFyEfUJJoI8YdBgqPf8FSM2cWgPrypCEdvPpnv7mMTomBHr6TSrPyyzyUHva', '2016-07-31 10:45:59', '2016-08-04 07:14:12'),
(4, 'frontoffice', 'frontoffice@labbaika.com', 'frontoffice', '$2y$10$.n8Le2PHa4jl83GYS7eQke.9BpqOwjmw8d2cl72q8ygXpULlYzZFO', 'operator', NULL, '2016-08-04 07:15:09', '2016-08-04 07:15:09'),
(5, 'achmad', 'achmad@gmail.com', 'achmad', '$2y$10$9XhjlacygSiz/letZoHNGuuHcN3hMJulQockI6dlOi/yYkQERWjUK', 'admin', NULL, '2017-05-24 03:30:15', '2017-05-24 03:30:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nidn`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `pegawai` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
