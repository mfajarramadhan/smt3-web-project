-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 02:38 PM
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
-- Database: `db_blkkarawang`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_peserta`
--

CREATE TABLE `login_peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_peserta`
--

INSERT INTO `login_peserta` (`id`, `nama`, `email`, `nohp`, `sandi`) VALUES
(1, 'adm123', 'adm@gmail.com', '089533353857', 'adm321'),
(2, 'Hamba Allah', 'user123@gmail.com', '085612345678', 'user123'),
(3, 'Hamba Allah', 'user321@gmail.com', '085612340987', 'user321'),
(4, 'Hamba Allah', 'user111@gmail.com', '081111111111', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `kode_desa` varchar(10) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`kode_desa`, `nama_desa`, `alamat`, `ket`) VALUES
('3215011005', 'TANJUNGPURA', 'KLARI', 'AKTIF'),
('3215022003', 'GINTUNG', 'KLARI', 'AKTIF'),
('3215042004', 'CENGKONG', 'KLARI', 'AKTIF'),
('3215052002', 'PANCAWATI', 'KLARI', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `kode_kecamatan` varchar(6) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`kode_kecamatan`, `nama_kecamatan`, `alamat`, `ket`) VALUES
('321501', 'KARAWANG BARAT', 'KARAWANG', 'AKTIF'),
('321502', 'KARAWANG TIMUR', 'KARAWANG', 'AKTIF'),
('321505', 'KLARI', 'KARAWANG', 'AKTIF'),
('321506', 'BATUJAYA', 'KARAWANG', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kejuruan`
--

CREATE TABLE `tbl_kejuruan` (
  `kode_kejuruan` varchar(6) NOT NULL,
  `kejuruan` varchar(200) NOT NULL,
  `pelatihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kejuruan`
--

INSERT INTO `tbl_kejuruan` (`kode_kejuruan`, `kejuruan`, `pelatihan`) VALUES
('BRS001', 'BARISTA', 'BARISTA KOPI DAN PASTRY'),
('OTM001', 'OTOMOTIF', 'MEKANIK  JUNIOR SEPEDA MOTOR'),
('TEI001', 'TEKNIK ELEKTRONIKA', 'TEKNISI AUDIO VIDEO/PLC\r\n'),
('TIK001', 'DESIGN GRAFIS', 'DESIGN GRAFIS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `kode_kejuruan` varchar(6) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status_nikah` varchar(100) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kode_desa` varchar(10) NOT NULL,
  `kode_kecamatan` varchar(6) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_ortu` varchar(14) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `npsn` varchar(8) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`kode_kejuruan`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `status_nikah`, `tinggi_badan`, `berat_badan`, `no_telp`, `email`, `alamat`, `kode_desa`, `kode_kecamatan`, `nama_ortu`, `no_ortu`, `pendidikan`, `npsn`, `jurusan`, `tujuan`, `ktp`) VALUES
('BRS001', 3275062012030002, 'USER', 'KARAWANG', '2004-01-03', 'L', 'Belum Menikah', '175', '63', '089612345678', 'user123@gmail.com', 'JL-KLARI KOSAMBI', '3215052002', '321505', 'ABU BAKAR', '089893849389', 'sma/smk', '20217936', 'TEKNIK ELEKTRONIKA INDUSTRI', 'kerja', '6594d49f7f768.jpeg'),
('TEI001', 3275062012030022, 'HAMBA ALLAH', 'KARAWANG', '2003-12-20', 'L', 'Belum Menikah', '170', '60', '089533353543', 'hamba@gmail.com', 'JL. KOSAMBI RT/RW 004/006', '3215052002', '321505', 'ABU BAKAR', '089893849389', 'sma/smk', '20217936', 'TEKNIK ELEKTRONIKA INDUSTRI', 'kerja', '65822b1fe7e0f.png'),
('BRS001', 3275062012030091, 'AISYAH', 'KARAWANG', '2003-12-28', 'P', 'Belum Menikah', '155', '50', '089534560984', 'aisyah@gmail.com', 'JL. KARANGPAWITAN RT/RW 004/006', '3215011005', '321501', 'ABDUL', '089893849320', 'sma/smk', '20217787', 'IPA', 'usaha', '658cd2277d35a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `npsn` varchar(8) NOT NULL,
  `nama_sekolah` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`npsn`, `nama_sekolah`, `alamat`) VALUES
('20217787', 'SMAN 1 KLARI', 'JL. KOSAMBI - KLARI'),
('20217936', 'SMKS TEXMACO KARAWANG', 'JL. KAWASAN INDUSTRI CITARUM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ADMIN', 'adm123', '$2y$10$p.4ym6KDtD.xFW0WE2GvzO86R5srAyu6vvqXbE21fad8nj0TC2Ipy'),
(2, 'ADMIN2', 'adm321', '$2y$10$zWR9528skLujhpO3C.Kck.TqimVu7nfBQVnxz7dEqQl/y.UU1DbE.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_peserta`
--
ALTER TABLE `login_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`kode_desa`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`);

--
-- Indexes for table `tbl_kejuruan`
--
ALTER TABLE `tbl_kejuruan`
  ADD PRIMARY KEY (`kode_kejuruan`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `kode_desa` (`kode_desa`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`),
  ADD KEY `id_kejuruan` (`kode_kejuruan`),
  ADD KEY `npsn` (`npsn`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_peserta`
--
ALTER TABLE `login_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD CONSTRAINT `tbl_peserta_ibfk_2` FOREIGN KEY (`kode_desa`) REFERENCES `tbl_desa` (`kode_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_peserta_ibfk_3` FOREIGN KEY (`kode_kecamatan`) REFERENCES `tbl_kecamatan` (`kode_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_peserta_ibfk_4` FOREIGN KEY (`npsn`) REFERENCES `tbl_sekolah` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_peserta_ibfk_5` FOREIGN KEY (`kode_kejuruan`) REFERENCES `tbl_kejuruan` (`kode_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
