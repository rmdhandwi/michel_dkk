-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 03:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asesment`
--

CREATE TABLE `tbl_asesment` (
  `kd_asesment` varchar(7) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `nama_asesment` varchar(30) NOT NULL,
  `usia` int(3) NOT NULL,
  `hasil_asesment` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kat`
--

CREATE TABLE `tbl_kat` (
  `kd_kat` varchar(5) NOT NULL,
  `nama_kat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kat`
--

INSERT INTO `tbl_kat` (`kd_kat`, `nama_kat`) VALUES
('SR001', 'Surat Keputusan Penerima bantuan'),
('SR002', 'Rencana Anggaran Biaya'),
('SR003', 'Hasil Asesment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `kd_periode` varchar(5) NOT NULL,
  `tahun_periode` varchar(4) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_periode`
--

INSERT INTO `tbl_periode` (`kd_periode`, `tahun_periode`, `tgl_mulai`, `tgl_selesai`) VALUES
('PR001', '2024', '2024-01-01', '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rab`
--

CREATE TABLE `tbl_rab` (
  `kd_rab` varchar(7) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `kd_periode` varchar(5) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_rab` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rab`
--

INSERT INTO `tbl_rab` (`kd_rab`, `kd_kat`, `nama_kegiatan`, `kd_periode`, `anggaran`, `deskripsi`, `file_rab`) VALUES
('RAB0001', 'SR002', 'adsdsd', 'PR001', 3232323, 'dsdsdsdsd', 'RAB0001_adsdsd.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skpb`
--

CREATE TABLE `tbl_skpb` (
  `kd_skpb` varchar(8) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_identifikasi` varchar(50) DEFAULT NULL,
  `foto_identifikasi` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jns_bantuan` varchar(100) DEFAULT NULL,
  `jmlh_bantuan` int(11) DEFAULT NULL,
  `kd_periode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skpb`
--

INSERT INTO `tbl_skpb` (`kd_skpb`, `kd_kat`, `nama_lengkap`, `no_identifikasi`, `foto_identifikasi`, `alamat`, `jns_bantuan`, `jmlh_bantuan`, `kd_periode`) VALUES
('SKPB0001', 'SR001', 'Rizki', '4341343423414341', 'SKPB0001_Rizki_fileIdentitas.jpg', 'gfgfggf', 'Sembako', 10000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'michel', '$2y$10$YSUGwG3yY7ktaFrh07DySufZ9KSedEYW79ChYFc6Wkb/zpIbLZaVm', '1'),
(2, 'rizki', '$2y$10$G1sK8aNTHEQ6YkMtSXFlyuQHEVxLO4RSaGxErh0yldrZq7cR4CfSO', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_asesment`
--
ALTER TABLE `tbl_asesment`
  ADD PRIMARY KEY (`kd_asesment`),
  ADD KEY `fk_kad_asesment` (`kd_kat`);

--
-- Indexes for table `tbl_kat`
--
ALTER TABLE `tbl_kat`
  ADD PRIMARY KEY (`kd_kat`);

--
-- Indexes for table `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`kd_periode`);

--
-- Indexes for table `tbl_rab`
--
ALTER TABLE `tbl_rab`
  ADD PRIMARY KEY (`kd_rab`),
  ADD KEY `fk_kat_rab` (`kd_kat`),
  ADD KEY `fk_thn_rab` (`kd_periode`);

--
-- Indexes for table `tbl_skpb`
--
ALTER TABLE `tbl_skpb`
  ADD PRIMARY KEY (`kd_skpb`),
  ADD KEY `fk_skpb_kat` (`kd_kat`),
  ADD KEY `fk_skpb_thn` (`kd_periode`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_asesment`
--
ALTER TABLE `tbl_asesment`
  ADD CONSTRAINT `fk_kad_asesment` FOREIGN KEY (`kd_kat`) REFERENCES `tbl_kat` (`kd_kat`);

--
-- Constraints for table `tbl_rab`
--
ALTER TABLE `tbl_rab`
  ADD CONSTRAINT `fk_kat_rab` FOREIGN KEY (`kd_kat`) REFERENCES `tbl_kat` (`kd_kat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thn_rab` FOREIGN KEY (`kd_periode`) REFERENCES `tbl_periode` (`kd_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_skpb`
--
ALTER TABLE `tbl_skpb`
  ADD CONSTRAINT `fk_skpb_kat` FOREIGN KEY (`kd_kat`) REFERENCES `tbl_kat` (`kd_kat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_skpb_thn` FOREIGN KEY (`kd_periode`) REFERENCES `tbl_periode` (`kd_periode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
