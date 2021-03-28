-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 10:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kopsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga_jual` int(9) NOT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `kode_barang`, `nama_barang`, `harga_jual`, `stok_barang`) VALUES
(1, 1, 'BRG0001', 'HVS', 500, 92),
(2, 1, 'BRG0002', 'Bufallo', 500, 0),
(3, 1, 'BRG0003', 'Folio Bergaris', 500, 0),
(4, 1, 'BRG0004', 'Mika', 500, 88),
(5, 2, 'BRG0005', 'Amplop sedang', 500, 490),
(6, 1, 'BRG0006', 'Amplop besar', 500, 0),
(7, 3, 'BRG0007', 'CD-R', 3500, 94),
(8, 3, 'BRG0008', 'DVD-RW', 5500, 0),
(9, 3, 'BRG0009', 'CD-RW', 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `no_penjualan` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `sub_total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`no_penjualan`, `nama_barang`, `harga_jual`, `jumlah_barang`, `sub_total`) VALUES
('TR1612315192', 'HVS', '500', 2, '1000'),
('TR1612330764', 'CD-R', '3500', 3, '10500'),
('TR1612330764', 'HVS', '500', 1, '500'),
('TR1612411761', 'Mika', '500', 5, '2500'),
('TR1612424196', 'Amplop sedang', '500', 10, '5000'),
('TR1612424196', 'Mika', '500', 2, '1000'),
('TR1616671241', 'CD-R', '3500', 3, '10500'),
('TR1616671241', 'Mika', '500', 1, '500'),
('TR1616732644', 'HVS', '500', 1, '500'),
('TR1616839959', 'HVS', '500', 1, '500'),
('TR1616918532', 'Mika', '500', 1, '500'),
('TR1616918552', 'Mika', '500', 3, '1500'),
('TR1616918552', 'HVS', '500', 3, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'kertas'),
(2, 'amplop'),
(3, 'disket'),
(4, 'map'),
(5, 'perlengkapan'),
(6, 'pembalut'),
(7, 'alat tulis'),
(8, 'penggaris'),
(9, 'penghapus'),
(10, 'tipe-x'),
(11, 'buku'),
(12, 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` varchar(20) DEFAULT NULL,
  `nama_kasir` varchar(100) DEFAULT NULL,
  `tanggal_penjualan` varchar(20) DEFAULT NULL,
  `jam_penjualan` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `no_penjualan`, `nama_kasir`, `tanggal_penjualan`, `jam_penjualan`, `total`) VALUES
(1, 'TR1612315192', 'admin', '03/02/2021', '08:19:52', 1000),
(2, 'TR1612330764', 'admin', '03/02/2021', '12:39:24', 11000),
(3, 'TR1612411761', 'admin', '04/02/2021', '11:09:21', 2500),
(4, 'TR1612424196', 'admin', '04/02/2021', '14:36:36', 6000),
(5, 'TR1616671241', 'admin', '25/03/2021', '18:20:41', 11000),
(6, 'TR1616732644', 'admin', '26/03/2021', '11:24:04', 500),
(7, 'TR1616839959', 'admin', '27/03/2021', '17:12:39', 500),
(8, 'TR1616918532', 'admin', '28/03/2021', '15:02:12', 500),
(9, 'TR1616918552', 'admin', '28/03/2021', '15:02:32', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_keluar`
--

CREATE TABLE `tb_stok_keluar` (
  `id_stok_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal_stok_keluar` varchar(10) NOT NULL,
  `jam_stok_keluar` varchar(8) NOT NULL,
  `jumlah_stok_keluar` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tb_stok_keluar`
--
DELIMITER $$
CREATE TRIGGER `tr_barang_keluar` AFTER INSERT ON `tb_stok_keluar` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok_barang = stok_barang - NEW.jumlah_stok_keluar WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_delete_stok_keluar` AFTER DELETE ON `tb_stok_keluar` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok_barang = stok_barang + OLD.jumlah_stok_keluar WHERE id_barang = OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_stok_keluar` AFTER UPDATE ON `tb_stok_keluar` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok_barang = NEW.jumlah_stok_keluar WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_masuk`
--

CREATE TABLE `tb_stok_masuk` (
  `id_stok_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal_stok_masuk` varchar(10) NOT NULL,
  `jam_stok_masuk` varchar(8) NOT NULL,
  `jumlah_stok_masuk` int(11) NOT NULL,
  `harga_beli` int(9) NOT NULL,
  `total_harga_beli` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_masuk`
--

INSERT INTO `tb_stok_masuk` (`id_stok_masuk`, `id_barang`, `id_supplier`, `tanggal_stok_masuk`, `jam_stok_masuk`, `jumlah_stok_masuk`, `harga_beli`, `total_harga_beli`) VALUES
(1, 1, 2, '03/02/2021', '08:18:42', 100, 250, 25000),
(2, 7, 3, '03/02/2021', '12:38:23', 100, 2000, 200000),
(3, 4, 2, '04/02/2021', '11:07:57', 100, 400, 40000),
(4, 5, 2, '04/02/2021', '14:35:19', 500, 300, 150000);

--
-- Triggers `tb_stok_masuk`
--
DELIMITER $$
CREATE TRIGGER `tr_barang_masuk` AFTER INSERT ON `tb_stok_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok_barang = stok_barang + NEW.jumlah_stok_masuk WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_delete_stok_masuk` AFTER DELETE ON `tb_stok_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok_barang = stok_barang - OLD.jumlah_stok_masuk WHERE id_barang = OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_stok_masuk` AFTER UPDATE ON `tb_stok_masuk` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok_barang = NEW.jumlah_stok_masuk WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon`, `keterangan`) VALUES
(1, 'Purnama Uniform', 'Jl. Rungkut Asri Barat I No.2, Sby', '081259504853', 'Distributor Seragam Sekolah'),
(2, 'TBMO', 'Jl. Merr Kalijudan, Kec. Mulyorejo, Sby', '03199044299', 'Menjual apa saja'),
(3, 'S3 Komputer', 'Jl. Semolowaru Tengah I No.68, Sby', '081232588337', 'Distributor Accesories Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin'),
(2, 'Rona Aniwidjaja', 'ronawidjaja', '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  ADD PRIMARY KEY (`id_stok_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  MODIFY `id_stok_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  MODIFY `id_stok_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Constraints for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  ADD CONSTRAINT `tb_stok_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_stok_keluar_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  ADD CONSTRAINT `tb_stok_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_stok_masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
