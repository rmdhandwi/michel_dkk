-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 02:34 AM
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
  `keterangan` text NOT NULL,
  `rekomendasi_asesment` varchar(155) NOT NULL,
  `catatan_asesment` varchar(155) NOT NULL,
  `file_asesment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_asesment`
--

INSERT INTO `tbl_asesment` (`kd_asesment`, `kd_kat`, `nama_asesment`, `usia`, `hasil_asesment`, `keterangan`, `rekomendasi_asesment`, `catatan_asesment`, `file_asesment`) VALUES
('ASM0001', 'SR003', 'michel', 18, 'ah enak', 'enak', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bast`
--

CREATE TABLE `tbl_bast` (
  `kd_bast` int(11) NOT NULL,
  `kd_kat` varchar(7) NOT NULL,
  `tgl_bast` date DEFAULT NULL,
  `penyerah` varchar(50) DEFAULT NULL,
  `deskripsi_bast` text DEFAULT NULL,
  `bantuan_bast` varchar(15) DEFAULT NULL,
  `keterangan_bast` text DEFAULT NULL,
  `bast_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dos`
--

CREATE TABLE `tbl_dos` (
  `kd_dos` int(11) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `judul_dokumentasi` varchar(55) DEFAULT NULL,
  `tgl_dos` date DEFAULT NULL,
  `tempat` varchar(55) DEFAULT NULL,
  `keterangan_dos` text DEFAULT NULL,
  `dos_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ins`
--

CREATE TABLE `tbl_ins` (
  `kd_ins` int(11) NOT NULL,
  `kd_kat` int(11) DEFAULT NULL,
  `nama_intervensi` text DEFAULT NULL,
  `tgl_intervensi` date DEFAULT NULL,
  `hasil_intervensi` text DEFAULT NULL,
  `kesimpulan_intervensi` text DEFAULT NULL,
  `tindaklanjut_intervensi` text DEFAULT NULL,
  `file_intervensi` varchar(5) DEFAULT NULL
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
-- Table structure for table `tbl_spj`
--

CREATE TABLE `tbl_spj` (
  `kd_spj` int(11) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `no_spj` varchar(55) DEFAULT NULL,
  `tgl_spj` date DEFAULT NULL,
  `pengeluaran` varchar(50) DEFAULT NULL,
  `penerimaan` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `catatan_spj` varchar(155) DEFAULT NULL,
  `spj_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sui`
--

CREATE TABLE `tbl_sui` (
  `kd_sui` int(11) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `judul_sui` varchar(55) DEFAULT NULL,
  `tgl_sui` date DEFAULT NULL,
  `deskripsi_sui` text DEFAULT NULL,
  `jenis_sui` varchar(20) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `sui_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tbk`
--

CREATE TABLE `tbl_tbk` (
  `kd_tbk` int(11) NOT NULL,
  `kd_kat` varchar(5) NOT NULL,
  `nama_tbk` varchar(50) DEFAULT NULL,
  `tgl_kasus` date DEFAULT NULL,
  `nama_peserta` varchar(100) DEFAULT NULL,
  `jabatan_peserta` varchar(55) DEFAULT NULL,
  `peran_peserta` varchar(55) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
  `tindaklanjut` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL,
  `tbk_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_bast`
--
ALTER TABLE `tbl_bast`
  ADD PRIMARY KEY (`kd_bast`);

--
-- Indexes for table `tbl_dos`
--
ALTER TABLE `tbl_dos`
  ADD PRIMARY KEY (`kd_dos`);

--
-- Indexes for table `tbl_ins`
--
ALTER TABLE `tbl_ins`
  ADD PRIMARY KEY (`kd_ins`);

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
-- Indexes for table `tbl_spj`
--
ALTER TABLE `tbl_spj`
  ADD PRIMARY KEY (`kd_spj`);

--
-- Indexes for table `tbl_sui`
--
ALTER TABLE `tbl_sui`
  ADD PRIMARY KEY (`kd_sui`);

--
-- Indexes for table `tbl_tbk`
--
ALTER TABLE `tbl_tbk`
  ADD PRIMARY KEY (`kd_tbk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bast`
--
ALTER TABLE `tbl_bast`
  MODIFY `kd_bast` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tbk`
--
ALTER TABLE `tbl_tbk`
  MODIFY `kd_tbk` int(11) NOT NULL AUTO_INCREMENT;

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
