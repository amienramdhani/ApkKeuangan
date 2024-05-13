-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manuang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(255) NOT NULL,
  `bank_nomor` varchar(255) NOT NULL,
  `bank_pemilik` varchar(255) NOT NULL,
  `bank_saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_nama`, `bank_nomor`, `bank_pemilik`, `bank_saldo`) VALUES
(1, 'BANK BRI', 'Diki', '0933-3393', 14500000),
(2, 'BANK BCA', 'Diki', '18280-232-23', 12100000),
(3, 'BNI', '741852963', 'Lisa Ayu', 52100000);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `hutang_id` int(11) NOT NULL,
  `hutang_tanggal` date NOT NULL,
  `hutang_nominal` int(11) NOT NULL,
  `hutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`hutang_id`, `hutang_tanggal`, `hutang_nominal`, `hutang_keterangan`) VALUES
(2, '2019-06-01', 10000, 'Setor\r\n\r\n'),
(4, '2022-02-09', 5000000, 'Beli PS 5');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'Lainnya'),
(3, 'Keluarga'),
(4, 'Penjualan Aplikasi'),
(5, 'Gaji Karyawan'),
(6, 'Keperluan Pribadi'),
(8, 'Keperluan Kantor'),
(9, 'Keperluan Rumah'),
(10, 'Biaya Tak Terduga'),
(11, 'Cicilan Rumah'),
(12, 'Pembuatan Aplikasi'),
(13, 'Tunjangan Karyawan'),
(14, 'Biaya Hosting Website'),
(17, 'Biaya Sekolah Anak');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_bbm`
--

CREATE TABLE `penjualan_bbm` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` int(11) NOT NULL,
  `totalisator_awal` double NOT NULL,
  `totalisator_akhir` double NOT NULL,
  `volume` double NOT NULL,
  `pump_test` double NOT NULL,
  `net_volume` double NOT NULL,
  `harga` double NOT NULL,
  `volume_akhir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_bbm`
--

INSERT INTO `penjualan_bbm` (`penjualan_id`, `tanggal`, `shift`, `totalisator_awal`, `totalisator_akhir`, `volume`, `pump_test`, `net_volume`, `harga`, `volume_akhir`) VALUES
(11, '2023-07-17', 1, 156215.43, 156366.47, 151.04000000001, 0, 151.0399932861328, 13300, 2008832.0000001);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_bbm`
--

CREATE TABLE `persediaan_bbm` (
  `persediaan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` int(11) NOT NULL,
  `distick_awal` varchar(150) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `no_mobil_tanki` varchar(50) NOT NULL,
  `noPNBPSO` varchar(50) NOT NULL,
  `distick_volume_sebelum_penerimaan` varchar(150) NOT NULL,
  `volume_sebelum_penerimaan` double NOT NULL,
  `volume_pengiriman_pnbp` double NOT NULL,
  `distick_volume_pengiriman` varchar(150) NOT NULL,
  `volume_pengiriman_aktual` double NOT NULL,
  `selisih_volume` double NOT NULL,
  `pengeluaran_dispenser` double NOT NULL,
  `stock_akhir` double NOT NULL,
  `distick_stock_akhir` varchar(50) NOT NULL,
  `stock_akhir_aktual` double NOT NULL,
  `selisih_total_volume` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan_bbm`
--

INSERT INTO `persediaan_bbm` (`persediaan_id`, `tanggal`, `shift`, `distick_awal`, `stock_awal`, `no_mobil_tanki`, `noPNBPSO`, `distick_volume_sebelum_penerimaan`, `volume_sebelum_penerimaan`, `volume_pengiriman_pnbp`, `distick_volume_pengiriman`, `volume_pengiriman_aktual`, `selisih_volume`, `pengeluaran_dispenser`, `stock_akhir`, `distick_stock_akhir`, `stock_akhir_aktual`, `selisih_total_volume`) VALUES
(13, '2023-07-03', 1, '53', 1113, 'H 8974 OA', '4024584036', '48.6', 1020.6, 2000, '143.8', 1999.2, 0.79999999999995, 145.44, 2966.76, '143.5', 3013.5, 46.74),
(14, '2023-07-10', 2, '53', 2568, '-', '-', '-', 0, 0, '-', 0, 0, 154.68, 958.32, '143.5', 2404.5, 1446.18);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `piutang_id` int(11) NOT NULL,
  `piutang_tanggal` date NOT NULL,
  `piutang_nominal` int(11) NOT NULL,
  `piutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`piutang_id`, `piutang_tanggal`, `piutang_nominal`, `piutang_keterangan`) VALUES
(1, '2019-06-22', 1000000, 'Hutang oleh rahman'),
(3, '2019-06-23', 70000, 'Hutang oleh jony untuk beli pulsa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_jenis` enum('Pengeluaran','Pemasukan') NOT NULL,
  `transaksi_kategori` int(11) NOT NULL,
  `transaksi_nominal` int(11) NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `transaksi_jenis`, `transaksi_kategori`, `transaksi_nominal`, `transaksi_keterangan`, `transaksi_bank`) VALUES
(1, '2019-06-21', 'Pemasukan', 3, 1000000, 'Kiki\r\n', 1),
(4, '2019-06-21', 'Pengeluaran', 8, 50000, 'Beli Alat Kantor', 1),
(5, '2019-06-20', 'Pemasukan', 4, 1500000, '', 1),
(6, '2019-06-06', 'Pemasukan', 1, 13570000, 'Pembayaran Project', 1),
(8, '2019-06-14', 'Pemasukan', 12, 20000000, 'Pembuatan Aplikasi Sistem Rumah Sakit Karya Bakti', 1),
(9, '2019-06-22', 'Pengeluaran', 13, 200000, 'Biaya Berobat Pak Tele', 1),
(10, '2019-06-22', 'Pemasukan', 3, 4000000, 'Pembuatan Aplikasi Klinik', 3),
(11, '2019-05-14', 'Pemasukan', 3, 1000000, '', 1),
(12, '2019-06-21', 'Pengeluaran', 10, 32000000, 'tes', 3),
(13, '2019-06-23', 'Pengeluaran', 14, 300000, 'Hosting Tahunan', 1),
(15, '2019-06-23', 'Pengeluaran', 14, 300000, 'Biaya Hosting tahun Depan', 3),
(16, '2019-06-23', 'Pemasukan', 4, 2000000, 'Penjualan Aplikasi Laba Rugi', 1),
(17, '2019-06-23', 'Pemasukan', 4, 2000000, 'Penjualan Aplikasi Akademik Sekolah SMP 888', 1),
(19, '2021-12-01', 'Pemasukan', 4, 2000000, 'pembuatan aplikasi web + hosting', 3),
(42, '2023-07-11', 'Pemasukan', 1, 25000000, 'Gajian Bulanan', 3),
(44, '2023-07-10', 'Pemasukan', 3, 8500000, 'Nemu Duit', 2),
(45, '2023-07-10', 'Pengeluaran', 6, 5000000, 'Beli PS 5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Amien', 'dhanimacbull@gmail.com', 'IMG_20200106_055802.jpg', '$2y$10$npyGVcvMollF3bK91scTN.MpvI1F2IJanSP2rNyDGms6V3PHzDTn6', 2, 1, 1624428325),
(2, 'hafidz doelah', 'hafidzdoelah@gmail.com', 'default.png', '$2y$10$BgrmDAT5X.Op6nSYTKx6POv9L3IdIkMFuV9juSBgi/UkANzXtwVvG', 1, 1, 1624435747),
(3, 'amienramdhani', 'admin@admin.com', 'yunus.jpg', '$2y$10$hBof.cSp8v5Mw8PcSkil/.fZeOOCPZ5Vsqxwm60ZIsM7yiwMZ/R9G', 1, 1, 1688742210);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin/admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'User/user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'User/user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', '	\r\nfas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'Admin/admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 1, 'Kategori', 'Admin/kategori', 'fas fa-fw fa-folder', 1),
(12, 1, 'Persediaan BBM', 'Admin/Persediaan', 'fas fa-fw fa-business-time', 1),
(13, 1, 'Penjualan BBM', 'Admin/penjualan', 'fas fa-fw fa-landmark', 1),
(14, 1, 'Transaksi', 'Admin/Transaksi', 'fas fa-fw fa-money-bill', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`hutang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `penjualan_bbm`
--
ALTER TABLE `penjualan_bbm`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indexes for table `persediaan_bbm`
--
ALTER TABLE `persediaan_bbm`
  ADD PRIMARY KEY (`persediaan_id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`piutang_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `hutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjualan_bbm`
--
ALTER TABLE `penjualan_bbm`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `persediaan_bbm`
--
ALTER TABLE `persediaan_bbm`
  MODIFY `persediaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `piutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
