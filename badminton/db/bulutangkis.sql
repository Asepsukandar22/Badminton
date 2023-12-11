-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 04:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulutangkis`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`) VALUES
(2, 'BCB001', 2, 'Coca Cola Puit2', 'Sedap Goreng', '22', '222', 'PCS', '0', '2023-11-06'),
(6, '', 2, 'Susu', 'Indomilk', '22000', '23000', 'PAK', '5', '2023-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `waktu` varchar(40) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `waktu`, `harga`) VALUES
(3, 'Siang', '20000'),
(4, 'Malam', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jam` time NOT NULL,
  `id_harga` int(11) NOT NULL,
  `jams` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam`, `id_harga`, `jams`) VALUES
(22, '08:00:00', 3, '09:00:00'),
(23, '09:00:00', 3, '10:00:00'),
(24, '10:00:00', 3, '11:00:00'),
(25, '11:00:00', 3, '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'Makanan', '2023-11-05'),
(2, 'Minuman', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lap` int(10) NOT NULL,
  `no_lap` varchar(11) NOT NULL,
  `deskripsi` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lap`, `no_lap`, `deskripsi`, `foto`) VALUES
(6, '04A', 'Des', 'Lapangan Upacara.png'),
(9, '04B', 'uuuuu', 'f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(10) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kode_member` varchar(50) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_lengkap`, `email`, `password`, `no_hp`, `kode_member`, `akses`) VALUES
(1, 'Juan', 'member@gmail.com', 'member', '222', 'BCB001', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `jumlah` varchar(20) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id`, `id_user`, `jumlah`, `total`, `tgl_input`) VALUES
(1, 2, 1, '2', '4000', '2023-11-05'),
(2, 6, 1, '2', '46000', '2023-11-06'),
(3, 6, 1, '2', '46000', '2023-11-07'),
(4, 2, 1, '2', '444', '2023-11-07'),
(5, 6, 1, '2', '46000', '2023-11-07'),
(6, 6, 1, '1', '46000', '2023-11-07'),
(7, 2, 1, '1', '444', '2023-11-08'),
(9, 6, 1, '2', '46000', '2023-11-25'),
(10, 6, 1, '3', '69000', '2023-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pesan` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(100) NOT NULL,
  `harga` char(10) NOT NULL,
  `dp` char(10) NOT NULL,
  `sisa` char(10) NOT NULL,
  `cash` varchar(20) DEFAULT NULL,
  `id` int(10) NOT NULL,
  `bukti` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_member` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pesan`, `tanggal`, `jam`, `harga`, `dp`, `sisa`, `cash`, `id`, `bukti`, `id_user`, `id_member`) VALUES
(66, 'KPS0001', '2023-12-08', '1', '20000', '15000', '0', 'NULL', 36, 'Picture2.png', 2, 0),
(67, 'KPS0067', '2023-12-10', '1', '20000', '0', '0', '20000', 41, 'NULL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `id_lap` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_member` int(10) DEFAULT NULL,
  `id_jadwal` int(10) NOT NULL,
  `status_boking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `start_datetime`, `end_datetime`, `id_lap`, `id_user`, `id_member`, `id_jadwal`, `status_boking`) VALUES
(36, 'asepsaww', '2023-12-08 11:00:00', '2023-12-08 12:00:00', 9, 2, 0, 25, 'Lunas'),
(38, 'Jadwal', '2023-12-08 09:00:00', '2023-12-08 10:00:00', 9, 1, 1, 23, 'Boking'),
(39, 'Asepppsukannndar', '2023-12-10 09:00:00', '2023-12-10 10:00:00', 9, 0, 0, 23, 'Boking'),
(41, 'sas33333', '2023-12-11 11:00:00', '2023-12-11 12:00:00', 9, 0, 0, 25, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `akses` enum('admin','user','kepala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `no_hp`, `akses`) VALUES
(1, 'asep sukandar', 'admin@gmail.com', 'admin', '0899', 'admin'),
(2, 'User Kita', 'user@gmail.com', 'user', '0987', 'user'),
(3, 'asep sukandar', 'user2@gmail.com', '222', '0899', 'user'),
(4, 'Mangiang', 'mangiang@gmail.com', '333', '087', 'kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_harga` (`id_harga`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id` (`id`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`,`id_member`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id` (`id`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lap` (`id_lap`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_harga`) REFERENCES `harga` (`id_harga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `schedule_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD CONSTRAINT `schedule_list_ibfk_3` FOREIGN KEY (`id_lap`) REFERENCES `lapangan` (`id_lap`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_list_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
