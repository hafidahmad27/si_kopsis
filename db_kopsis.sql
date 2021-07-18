-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 06:22 AM
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
(1, 1, 'BRG0001', 'HVS', 500, 89),
(2, 1, 'BRG0002', 'Bufallo', 500, 0),
(3, 1, 'BRG0003', 'Folio Bergaris', 600, 23),
(4, 1, 'BRG0004', 'Mika', 500, 70),
(5, 2, 'BRG0005', 'Amplop sedang', 500, 484),
(6, 1, 'BRG0006', 'Amplop besar', 500, 0),
(7, 3, 'BRG0007', 'CD-R', 3500, 91),
(8, 3, 'BRG0008', 'DVD-RW', 5500, 0),
(9, 3, 'BRG0009', 'CD-RW', 5000, 0),
(10, 5, 'BRG0010', 'topi', 15000, -7),
(11, 5, 'BRG0011', 'sabuk', 20000, 79),
(12, 12, 'BRG0012', 'yakult', 0, 50),
(13, 7, 'BRG0013', 'ss', 760099, 15),
(14, 9, 'BRG0014', 'atm', 1000, 500);

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
('TR1616918552', 'HVS', '500', 3, '1500'),
('TR1626240411', 'Amplop sedang', '500', 1, '500'),
('TR1626240411', 'CD-R', '3500', 3, '10500'),
('TR1626240411', 'HVS', '500', 1, '500'),
('TR1626315741', 'dasi', '15000', 2, '30000'),
('TR1626315741', 'sabuk', '20000', 1, '20000'),
('TR1626500440', 'Folio Bergaris', '600', 1, '600'),
('TR1626506961', 'Amplop sedang', '500', 5, '2500'),
('TR1626507003', 'sabuk', '20000', 20, '400000'),
('TR1626509853', 'Folio Bergaris', '600', 10, '6000'),
('TR1626510799', 'HVS', '500', 1, '500'),
('TR1626510877', 'HVS', '500', 1, '500'),
('TR1626567431', 'Folio Bergaris', '600', 3, '1800'),
('TR1626567604', 'Folio Bergaris', '600', 1, '600'),
('TR1626567913', 'Folio Bergaris', '600', 2, '1200'),
('TR1626568044', 'Folio Bergaris', '600', 4, '2400'),
('TR1626568127', 'Folio Bergaris', '600', 5, '3000'),
('TR1626568212', 'Folio Bergaris', '600', 2, '1200'),
('TR1626568295', 'Folio Bergaris', '600', 5, '3000'),
('TR1626568416', 'Mika', '500', 3, '1500'),
('TR1626568416', 'Folio Bergaris', '600', 1, '600'),
('TR1626568480', 'topi', '15000', 2, '30000'),
('TR1626568520', 'Mika', '500', 9, '4500'),
('TR1626568657', 'Folio Bergaris', '600', 2, '1200'),
('TR1626568657', 'Mika', '500', 3, '1500'),
('TR1626568699', 'Folio Bergaris', '600', 1, '600'),
('TR1626581815', 'Mika', '500', 3, '1500'),
('TR1626582078', 'topi', '15000', 10, '150000');

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
(9, 'TR1616918552', 'admin', '28/03/2021', '15:02:32', 3000),
(10, 'TR1626240411', 'admin', '14/07/2021', '12:26:51', 11500),
(11, 'TR1626315741', 'admin', '15/07/2021', '09:22:21', 50000),
(12, 'TR1626500440', 'kaeka', '17/07/2021', '12:40:40', 600),
(13, 'TR1626506961', 'admin', '17/07/2021', '14:29:21', 2500),
(14, 'TR1626507003', 'admin', '17/07/2021', '14:30:03', 400000),
(15, 'TR1626509853', 'admin', '17/07/2021', '15:17:33', 6000),
(16, 'TR1626510799', 'admin', '17/07/2021', '15:33:19', 500),
(17, 'TR1626510877', 'admin', '17/07/2021', '15:34:37', 500),
(18, 'TR1626567431', 'admin', '18/07/2021', '07:17:11', 1800),
(19, 'TR1626567604', 'admin', '18/07/2021', '07:20:04', 600),
(20, 'TR1626567913', 'admin', '18/07/2021', '07:25:13', 1200),
(21, 'TR1626568044', 'admin', '18/07/2021', '07:27:24', 2400),
(22, 'TR1626568127', 'admin', '18/07/2021', '07:28:47', 3000),
(23, 'TR1626568212', 'admin', '18/07/2021', '07:30:12', 1200),
(24, 'TR1626568295', 'admin', '18/07/2021', '07:31:35', 3000),
(25, 'TR1626568416', 'admin', '18/07/2021', '07:33:36', 2100),
(26, 'TR1626568480', 'admin', '18/07/2021', '07:34:40', 30000),
(27, 'TR1626568520', 'admin', '18/07/2021', '07:35:20', 4500),
(28, 'TR1626568657', 'admin', '18/07/2021', '07:37:37', 2700),
(29, 'TR1626568699', 'admin', '18/07/2021', '07:38:19', 600),
(30, 'TR1626581815', 'admin', '18/07/2021', '11:16:55', 1500),
(31, 'TR1626582078', 'kaeka', '18/07/2021', '11:21:18', 150000);

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
(4, 5, 2, '04/02/2021', '14:35:19', 500, 300, 150000),
(5, 3, 2, '14/07/2021', '12:35:13', 50, 300, 15000),
(6, 3, 2, '14/07/2021', '12:37:11', 10, 500, 5000),
(7, 10, 1, '15/07/2021', '08:08:47', 5, 12000, 60000),
(8, 11, 1, '15/07/2021', '08:10:56', 100, 17000, 1700000),
(9, 12, 2, '16/07/2021', '07:52:46', 50, 20000, 0),
(10, 13, 3, '16/07/2021', '07:59:49', 15, 3500, 0),
(11, 14, 2, '16/07/2021', '08:06:17', 500, 500, 0);

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
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'Eka', 'kaeka', 'kasir123', 'kasir'),
(3, 'Budi Pratama', 'budi_prap', 'gudang123', 'gudang'),
(4, 'Rona Aniwidjaja', 'rona', 'pimpinan123', 'pimpinan');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  MODIFY `id_stok_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  MODIFY `id_stok_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
