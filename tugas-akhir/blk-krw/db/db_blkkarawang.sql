-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 10:10 AM
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
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `email`, `no_telp`, `password`) VALUES
(7, 'Peserta', 'peserta@gmail.com', '089595959595', '$2y$10$01dYfHK6yTqx6I1a5LLpmeJ.E3l8EKVPIAPZhC6IKCQQniuqleJ.q'),
(8, 'User', 'user@gmail.com', '089999999999', '$2y$10$wAy7Rk5yy4OG64HZXS9yLOGz8Liy2kURViYdaltBChXFFD6pwixue');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id` int(11) NOT NULL,
  `kode_desa` varchar(10) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id`, `kode_desa`, `nama_desa`, `alamat`, `ket`) VALUES
(1, '3215011005', 'TANJUNGPURA', 'KLARI', 'AKTIF'),
(2, '3215022003', 'GINTUNG', 'KLARI', 'AKTIF'),
(3, '3215042004', 'CENGKONG', 'KLARI', 'AKTIF'),
(4, '3215052002', 'PANCAWATI', 'KLARI', 'NON AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id` int(11) NOT NULL,
  `kode_kecamatan` varchar(6) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `alamat`, `ket`) VALUES
(1, '321501', 'KARAWANG BARAT', 'KARAWANG', 'AKTIF'),
(2, '321502', 'KARAWANG TIMUR', 'KARAWANG', 'AKTIF'),
(3, '321505', 'KLARI', 'KARAWANG', 'AKTIF'),
(4, '321506', 'TELUKJAMBE TIMUR', 'KARAWANG', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kejuruan`
--

CREATE TABLE `tbl_kejuruan` (
  `id` int(11) NOT NULL,
  `kode_kejuruan` varchar(6) NOT NULL,
  `kejuruan` varchar(200) NOT NULL,
  `pelatihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kejuruan`
--

INSERT INTO `tbl_kejuruan` (`id`, `kode_kejuruan`, `kejuruan`, `pelatihan`) VALUES
(1, 'BRS001', 'BARISTA', 'BARISTA KOPI DAN PASTRY'),
(2, 'OTM001', 'OTOMOTIF', 'MEKANIK  JUNIOR SEPEDA MOTOR'),
(3, 'TEI001', 'TEKNIK ELEKTRONIKA', 'TEKNISI AUDIO VIDEO/PLC\r\n'),
(4, 'TIK001', 'DESIGN GRAFIS', 'DESIGN GRAFIS'),
(5, 'TIK010', 'WEB PROGRAMMING', 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_kejuruan` int(11) NOT NULL,
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
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_ortu` varchar(14) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_kejuruan`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `status_nikah`, `tinggi_badan`, `berat_badan`, `no_telp`, `email`, `alamat`, `id_desa`, `id_kecamatan`, `nama_ortu`, `no_ortu`, `pendidikan`, `asal_sekolah`, `jurusan`, `tujuan`, `ktp`) VALUES
(1, 1234567891040001, 'Azza', 'Karawang', '2024-06-12', 'P', 'Belum Menikah', '160', '50', '08123456678', 'azza@gmail.com', 'karawang', 1, 2, 'abc', '12345678', 'strata', 'karawang', 'barista', 'usaha', ''),
(1, 3275061210040090, 'AHMAD SOPYAN', 'KARAWANG', '2004-05-11', 'L', 'Belum Menikah', '172', '60', '089624968771', 'ahmadsopyan123@gmail.com', 'JL. TAMELANG, RT/RW 008/006', 1, 1, 'SUMARNO', '081905085523', 'sma/smk', '20217936', 'TEKNIK ELEKTRONIKA INDUSTRI', 'kerja', '65ec170f2e866.jpeg'),
(0, 3275062012030002, 'FULAN', 'KARAWANG', '2004-01-03', '', '', '175', '63', '089612345678', 'user123@gmail.com', 'JL-KLARI KOSAMBI', 0, 0, 'ABU BAKAR', '089893849389', 'sma/smk', '20217936', 'TEKNIK ELEKTRONIKA INDUSTRI', 'kerja', ''),
(3, 3275062012030022, 'HAMBA ALLAH', 'KARAWANG', '2003-12-20', 'L', 'Belum Menikah', '170', '60', '089533353543', 'hamba@gmail.com', 'JL. KOSAMBI RT/RW 004/006', 3, 3, 'ABU BAKAR', '089893849389', 'sma/smk', '20217936', 'TEKNIK ELEKTRONIKA INDUSTRI', 'kerja', '65822b1fe7e0f.png'),
(4, 3275062012030091, 'AISYAH', 'KARAWANG', '2003-12-28', 'P', 'Belum Menikah', '155', '50', '089534560984', 'aisyah@gmail.com', 'JL. KARANGPAWITAN RT/RW 004/006', 4, 4, 'ABDUL', '089893849320', 'sma/smk', '20217787', 'IPA', 'usaha', '658cd2277d35a.jpg');

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
(4, 'Fajar', 'fajar123', 'fajar123'),
(7, 'Hanif', 'hanif123', 'hanif123'),
(9, 'Diva', 'diva123', 'diva123'),
(14, 'Ayu', 'ayu321', 'ayu'),
(20, 'Admin1', 'adm123', '$2y$10$9gwj/pE9YL41mXqSH7H7l.l0EWRD8sOirLIulC3lBZHolCyKdH0Xm'),
(21, 'Tian', 'tian123', 'tian123'),
(26, 'bb', 'adaaii', 'ccca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kejuruan`
--
ALTER TABLE `tbl_kejuruan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`nik`);

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
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_kejuruan`
--
ALTER TABLE `tbl_kejuruan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
