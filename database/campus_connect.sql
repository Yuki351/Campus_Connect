-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 10:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `program_studi_id_program_studi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `program_studi_id_program_studi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program_studi` varchar(3) NOT NULL,
  `nama_studi` varchar(50) NOT NULL,
  `fakuktas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengajuan`
--

CREATE TABLE `surat_pengajuan` (
  `id_surat_pengajuan` varchar(5) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `mahasiswa_nrp` varchar(9) NOT NULL,
  `mahasiswa_program_studi_id_program_studi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tu`
--

CREATE TABLE `tu` (
  `nip` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `program_studi_id_program_studi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`,`program_studi_id_program_studi`),
  ADD KEY `fk_dosen_program_studi_idx` (`program_studi_id_program_studi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`,`program_studi_id_program_studi`),
  ADD KEY `fk_mahasiswa_program_studi1_idx` (`program_studi_id_program_studi`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program_studi`);

--
-- Indexes for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  ADD PRIMARY KEY (`id_surat_pengajuan`,`mahasiswa_nrp`,`mahasiswa_program_studi_id_program_studi`),
  ADD KEY `fk_surat_pengajuan_mahasiswa1_idx` (`mahasiswa_nrp`,`mahasiswa_program_studi_id_program_studi`);

--
-- Indexes for table `tu`
--
ALTER TABLE `tu`
  ADD PRIMARY KEY (`nip`,`program_studi_id_program_studi`),
  ADD KEY `fk_tu_program_studi1_idx` (`program_studi_id_program_studi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_dosen_program_studi` FOREIGN KEY (`program_studi_id_program_studi`) REFERENCES `program_studi` (`id_program_studi`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_program_studi1` FOREIGN KEY (`program_studi_id_program_studi`) REFERENCES `program_studi` (`id_program_studi`);

--
-- Constraints for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  ADD CONSTRAINT `fk_surat_pengajuan_mahasiswa1` FOREIGN KEY (`mahasiswa_nrp`,`mahasiswa_program_studi_id_program_studi`) REFERENCES `mahasiswa` (`nrp`, `program_studi_id_program_studi`);

--
-- Constraints for table `tu`
--
ALTER TABLE `tu`
  ADD CONSTRAINT `fk_tu_program_studi1` FOREIGN KEY (`program_studi_id_program_studi`) REFERENCES `program_studi` (`id_program_studi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
