-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 03:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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
(1, 1, 'BRG0001', 'HVS', 500, 479),
(2, 1, 'BRG0002', 'bufallo', 1000, 493),
(3, 1, 'BRG0003', 'folio bergaris', 0, 0),
(4, 1, 'BRG0004', 'mika', 0, 0),
(5, 2, 'BRG0005', 'amplop sedang', 0, 0),
(6, 2, 'BRG0006', 'amplop besar', 0, 0),
(7, 3, 'BRG0007', 'CD-R', 3500, 92),
(8, 3, 'BRG0008', 'DVD-RW', 5500, 94),
(9, 3, 'BRG0009', 'CD-RW', 5000, 98),
(10, 4, 'BRG0010', 'stofmap', 0, 0),
(11, 4, 'BRG0011', 'clear holder (mika)', 0, 0),
(12, 4, 'BRG0012', 'map spring', 0, 0),
(13, 4, 'BRG0013', 'dokumen qipper isi 60', 0, 0),
(14, 4, 'BRG0014', 'mika berkancing', 0, 0),
(15, 4, 'BRG0015', 'snail hecter', 0, 0),
(16, 5, 'BRG0016', 'double tape', 0, 0),
(17, 5, 'BRG0017', 'keplek + tali', 0, 0),
(18, 5, 'BRG0018', 'isolasi', 0, 0),
(19, 5, 'BRG0019', 'tissu', 0, 0),
(20, 5, 'BRG0020', 'stapler kecil', 0, 0),
(21, 5, 'BRG0021', 'stapler besar', 0, 0),
(22, 5, 'BRG0022', 'stabillo boss', 0, 0),
(23, 5, 'BRG0023', 'bed', 0, 0),
(24, 5, 'BRG0024', 'topi', 0, 0),
(25, 5, 'BRG0025', 'dasi', 0, 0),
(26, 5, 'BRG0026', 'sabuk', 0, 0),
(27, 5, 'BRG0027', 'hasduk', 0, 0),
(28, 5, 'BRG0028', 'kaos kaki', 0, 0),
(29, 5, 'BRG0029', 'materai', 0, 0),
(30, 5, 'BRG0030', 'binder clip', 0, 0);

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
('TR1626602768', 'HVS', '500', 4, '2000'),
('TR1626602768', 'CD-RW', '5000', 2, '10000'),
('TR1626602995', 'bufallo', '1000', 1, '1000'),
('TR1626603052', 'HVS', '500', 5, '2500'),
('TR1626603052', 'bufallo', '1000', 1, '1000'),
('TR1626603254', 'DVD-RW', '5500', 3, '16500'),
('TR1626603254', 'CD-R', '3500', 1, '3500'),
('TR1626603352', 'bufallo', '1000', 2, '2000'),
('TR1626603352', 'HVS', '500', 12, '6000'),
('TR1626603352', 'DVD-RW', '5500', 1, '5500'),
('TR1626623687', 'CD-R', '3500', 2, '7000'),
('TR1626623687', 'bufallo', '1000', 1, '1000'),
('TR1626657005', 'CD-R', '3500', 5, '17500'),
('TR1626657070', 'bufallo', '1000', 2, '2000'),
('TR1626657070', 'DVD-RW', '5500', 2, '11000');

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
(1, 'TR1626602768', 'admin', '02/04/2021', '17:06:08', 12000),
(2, 'TR1626602995', 'admin', '03/04/2021', '17:09:55', 1000),
(3, 'TR1626603052', 'admin', '10/05/2021', '17:10:52', 3500),
(4, 'TR1626603254', 'admin', '09/06/2021', '17:14:14', 20000),
(5, 'TR1626603352', 'admin', '18/07/2021', '17:15:52', 13500),
(6, 'TR1626623687', 'admin', '18/07/2021', '22:54:47', 8000),
(7, 'TR1626657005', 'admin', '03/04/2021', '08:10:05', 17500),
(8, 'TR1626657070', 'admin', '10/05/2021', '08:11:10', 13000);

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
(1, 1, 2, '18/07/2021', '16:55:10', 500, 300, 0),
(2, 2, 2, '18/07/2021', '16:55:39', 500, 750, 0),
(3, 7, 3, '18/07/2021', '16:56:12', 100, 2500, 0),
(4, 8, 3, '18/07/2021', '16:57:48', 100, 4000, 0),
(5, 9, 3, '18/07/2021', '16:58:33', 100, 3500, 0);

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
(1, 'Purnama Uniform', 'Jl. Rungkut Asri Barat No. 2, Sby', '082145467675', 'Distributor Seragam Sekolah'),
(2, 'TBMO', 'Jl. Merr Kalijudan, Kec. Mulyorejo, Sby', '03199044299', 'Menjual apa saja'),
(3, 'S3 Komputer', 'Jl. Semolowaru Tengah I No. 68, Sby', '081232588337', 'Grosir Accesories Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'Eka', 'kasir', 'ekasir', 'kasir'),
(3, 'Budi Pratama', 'gudang', 'budipra', 'gudang'),
(4, 'Rona Aniwidjaja', 'pimpinan', 'ronawidjaja', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD KEY `no_penjualan` (`no_penjualan`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_penjualan` (`no_penjualan`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  MODIFY `id_stok_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  MODIFY `id_stok_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Constraints for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD CONSTRAINT `tb_detail_penjualan_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `tb_penjualan` (`no_penjualan`),
  ADD CONSTRAINT `tb_detail_penjualan_ibfk_2` FOREIGN KEY (`nama_barang`) REFERENCES `tb_barang` (`nama_barang`);

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
