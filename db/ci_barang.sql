-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 08:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `aprove_permohonan`
--

CREATE TABLE `aprove_permohonan` (
  `id_aprove` int(11) NOT NULL,
  `id_minta_barang` int(11) NOT NULL,
  `tgl_aprove` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aprove_permohonan`
--

INSERT INTO `aprove_permohonan` (`id_aprove`, `id_minta_barang`, `tgl_aprove`) VALUES
(3, 3, '2021-08-16'),
(4, 4, '2021-08-16'),
(5, 6, '2021-08-25'),
(6, 7, '2021-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`) VALUES
('B000001', 'Lenovo Ideapad 1550', 12, 1, 3),
('B000002', 'Samsung Galaxy J1 Ace', 50, 1, 4),
('B000003', 'Aqua 1,5 Liter', 700, 3, 2),
('B000004', 'Mouse Wireless Logitech M220', 22, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `user_id`, `barang_id`, `jumlah_keluar`, `tanggal_keluar`) VALUES
('T-BK-19082000001', 1, 'B000003', 35, '2019-08-20'),
('T-BK-19082000002', 1, 'B000002', 10, '2019-08-20'),
('T-BK-19092000003', 1, 'B000001', 5, '2019-09-20'),
('T-BK-19092000004', 1, 'B000003', 150, '2019-09-20'),
('T-BK-19092000005', 1, 'B000004', 10, '2019-09-20'),
('T-BK-19092200006', 1, 'B000003', 100, '2019-09-22'),
('T-BK-21081600001', 1, 'B000001', 5, '2021-08-16');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-19082000001', 1, 'B000003', 800, '2019-08-20'),
('T-BM-19082000002', 1, 'B000001', 20, '2019-08-20'),
('T-BM-19082000003', 1, 'B000002', 10, '2019-08-20'),
('T-BM-19082000004', 1, 'B000004', 15, '2019-08-20'),
('T-BM-19092000005', 1, 'B000002', 40, '2019-09-20'),
('T-BM-19092000006', 1, 'B000003', 50, '2019-09-20'),
('T-BM-19092200007', 1, 'B000004', 15, '2019-09-22'),
('T-BM-19092200008', 1, 'B000003', 135, '2019-09-22'),
('T-BM-21081500001', 1, 'B000004', 2, '2021-08-15'),
('T-BM-21083000001', 1, 'B000001', 2, '2021-08-30');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_minta_barang`
--

CREATE TABLE `detail_minta_barang` (
  `id_minta_barang` int(11) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_minta_barang`
--

INSERT INTO `detail_minta_barang` (`id_minta_barang`, `id_barang`, `qty`) VALUES
(6, 'B000002', 56),
(7, 'B000002', 5),
(7, 'B000003', 4),
(7, 'B000004', 4),
(8, 'B000001', 4),
(8, 'B000003', 4),
(8, 'B000004', 6),
(8, 'B000001', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Laptop'),
(4, 'Handphone'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `minta_barang`
--

CREATE TABLE `minta_barang` (
  `id_minta_barang` int(11) NOT NULL,
  `tgl_minta` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemohon` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `prihal` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minta_barang`
--

INSERT INTO `minta_barang` (`id_minta_barang`, `tgl_minta`, `id_user`, `pemohon`, `kepada`, `dari`, `sifat`, `prihal`, `status`) VALUES
(6, '2021-08-21', 1, 'tes', 'fgd', '5453', 'dffd', '453', 'barang diterima'),
(7, '2021-09-06', 14, 'aldo bareto', 'div 1', 'dpktb', 'rahasia', 'permohonan barang', 'barang diterima'),
(8, '2021-09-06', 14, 'astri', 'kabid', 'dpktb', 'rahasia', 'permohonan', 'belum acc');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Pack'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_barang`
--

CREATE TABLE `tmp_barang` (
  `id_tmp` int(11) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_ba`
--

CREATE TABLE `upload_ba` (
  `id_file` int(11) NOT NULL,
  `id_minta_barang` int(11) NOT NULL,
  `file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_ba`
--

INSERT INTO `upload_ba` (`id_file`, `id_minta_barang`, `file`) VALUES
(1, 6, '1521615441-TOR-SEMNAS-KARAkTER-4-2018.pdf'),
(2, 7, 'WORD-KARTU VAKSIN2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('pengurus barang','admin','kabu','pptk','kabid','pegawai') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 'd5f22535b639d55be7d099a7315e1f7f.png', 1),
(8, 'Muhammad Ghifari Arfananda', 'mghifariarfan', 'mghifariarfan@gmail.com', '085697442673', 'kabu', '$2y$10$5SGUIbRyEXH7JslhtEegEOpp6cvxtK6X.qdiQ1eZR7nd0RZjjx3qe', 1568691629, 'user.png', 1),
(13, 'Arfan Kashilukato', 'arfankashilukato', 'arfankashilukato@gmail.com', '081623123181', 'pptk', '$2y$10$/QpTunAD9alBV5NSRJ7ytupS2ibUrbmS3ia3u5B26H6f3mCjOD92W', 1569192547, 'user.png', 1),
(14, 'diki', 'diki', 'diki@gmail.com', '084234242', 'pegawai', '$2y$10$2JZsXKKfqlTb/goR2FMqTu8Bwk0K3a2QKBowuADxy.DJl7wT..gNu', 1629372336, 'user.png', 1),
(15, 'ali', 'ali', 'ali@gmail.com', '087977', 'kabid', '$2y$10$3eLHpFcKKQKrxlBJuqapKeydcBRnMzTQa5fbXhUCG/xfO7TSbWwRG', 1629852684, 'user.png', 1),
(16, 'pptk', 'pptk', 'pptk@gmail.com', '756785685', 'pptk', '$2y$10$oX7u9vTVUkaZ6Az3VEp7EOXguHxhuOjBYkpbQTO1CMXqjwIrqQWai', 1630335556, 'user.png', 1),
(17, 'kabu', 'kabu', 'kabu@gmail.com', '098797', 'kabu', '$2y$10$Fk1AE0gPLcqSDR4.y.oh/.1HJGjOyCxVuEVbkSDsdF3BFe4a6ainu', 1630335689, 'user.png', 1),
(18, 'pengurus', 'pengurus', 'pengurus@gmail.com', '0843535', 'pengurus barang', '$2y$10$cycVUbECaEqGahmEiIe6y.KRD/97F9xTDIfaby8hWdCEyFfCt69aC', 1630824329, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprove_permohonan`
--
ALTER TABLE `aprove_permohonan`
  ADD PRIMARY KEY (`id_aprove`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `detail_minta_barang`
--
ALTER TABLE `detail_minta_barang`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_minta_barang` (`id_minta_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `minta_barang`
--
ALTER TABLE `minta_barang`
  ADD PRIMARY KEY (`id_minta_barang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tmp_barang`
--
ALTER TABLE `tmp_barang`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `upload_ba`
--
ALTER TABLE `upload_ba`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprove_permohonan`
--
ALTER TABLE `aprove_permohonan`
  MODIFY `id_aprove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `minta_barang`
--
ALTER TABLE `minta_barang`
  MODIFY `id_minta_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tmp_barang`
--
ALTER TABLE `tmp_barang`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_ba`
--
ALTER TABLE `upload_ba`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_minta_barang`
--
ALTER TABLE `detail_minta_barang`
  ADD CONSTRAINT `detail_minta_barang_ibfk_1` FOREIGN KEY (`id_minta_barang`) REFERENCES `minta_barang` (`id_minta_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
