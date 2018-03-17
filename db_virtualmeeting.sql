-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 08:30 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_virtualmeeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_action`
--

CREATE TABLE `t_action` (
  `id_action` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_analisis` varchar(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_action`
--

INSERT INTO `t_action` (`id_action`, `id_objective`, `id_user`, `id_kategori_analisis`, `action`, `tanggal`) VALUES
(36, 28, 1, 'FNC', 'Mengetahui Lebih Awal Barang yang sudah kadaluarsa', '2018-03-16 17:16:31'),
(39, 30, 1, 'CST', 'Mengetahui rata rata waktu response', '2018-03-16 17:21:35'),
(40, 30, 1, 'CST', 'Meningkatkan disiplin pada karyawan', '2018-03-16 17:21:35'),
(42, 31, 1, 'CST', 'Analisa harga pasar', '2018-03-16 17:23:20'),
(43, 31, 1, 'CST', 'tanya pendapat pelanggan', '2018-03-16 17:23:20'),
(44, 32, 1, 'INT', 'mengetahui daftar pelanggan setia', '2018-03-16 17:25:57'),
(46, 33, 1, 'INT', 'mengetahui jumlah keterlambatan agen', '2018-03-16 17:27:24'),
(47, 34, 1, 'LEA', 'menghitung waktu desain', '2018-03-16 17:28:49'),
(48, 34, 1, 'LEA', 'menghitung waktu total proses', '2018-03-16 17:28:49'),
(49, 34, 1, 'LEA', 'memberikan pelatihan kartyawan', '2018-03-16 17:28:49'),
(51, 35, 2, 'FNC', '22', '2018-03-16 19:01:48'),
(55, 28, 1, 'FNC', 'Ramalan Stok yang lebih baik agar persediaan dapat terjaga baik', '2018-03-16 19:59:04'),
(57, 37, 1, 'FNC', 'meningiasedw', '2018-03-16 20:01:56'),
(58, 38, 2, 'FNC', '124124', '2018-03-16 20:06:40'),
(59, 38, 2, 'FNC', '346356', '2018-03-16 20:06:41'),
(60, 39, 2, 'FNC', '123123', '2018-03-16 20:10:57'),
(61, 40, 2, 'FNC', 'qwe', '2018-03-16 20:13:17'),
(62, 41, 2, 'FNC', '5', '2018-03-16 20:16:26'),
(63, 42, 2, 'FNC', '123', '2018-03-16 20:16:48'),
(64, 41, 2, 'FNC', '5', '2018-03-16 20:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `t_isneed`
--

CREATE TABLE `t_isneed` (
  `id_isneed` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_analisis` varchar(11) NOT NULL,
  `isneed` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_isneed`
--

INSERT INTO `t_isneed` (`id_isneed`, `id_objective`, `id_user`, `id_kategori_analisis`, `isneed`, `tanggal`) VALUES
(42, 28, 1, 'FNC', 'teknik analisas perputaran stok barang yang sering laku dan barang yang kurang terjual', '2018-03-16 17:16:31'),
(43, 28, 1, 'FNC', 'Ramalan Stok yang lebih Akurat', '2018-03-16 17:16:31'),
(44, 28, 1, 'FNC', 'Penggunaan algoritma yang berbeda untuk jenis stok yang berbeda', '2018-03-16 17:16:31'),
(46, 30, 1, 'CST', 'Sistem Penghitungan rata rata rrespon time', '2018-03-16 17:21:35'),
(47, 30, 1, 'CST', 'Sistem Penghitungan respon time per karyawan', '2018-03-16 17:21:35'),
(49, 31, 1, 'CST', 'sistem analisis harga pasar', '2018-03-16 17:23:20'),
(50, 31, 1, 'CST', 'sistem kuesioner pelanggan', '2018-03-16 17:23:20'),
(56, 35, 2, 'FNC', '333', '2018-03-16 19:01:48'),
(69, 32, 1, 'INT', 'Sistem untuk mengetahui kepuasan pelanggan', '2018-03-16 19:59:51'),
(71, 33, 1, 'INT', 'Sisem untuk mengetahui jumlah agen dan jumlah pengiriman', '2018-03-16 20:00:17'),
(73, 37, 1, 'FNC', 'aijosda', '2018-03-16 20:01:56'),
(74, 38, 2, 'FNC', '12414', '2018-03-16 20:06:40'),
(76, 38, 2, 'FNC', '54325435', '2018-03-16 20:06:41'),
(78, 39, 2, 'FNC', '123', '2018-03-16 20:10:57'),
(79, 40, 2, 'FNC', 'qwe', '2018-03-16 20:13:18'),
(80, 35, 2, 'FNC', 'sasd', '2018-03-16 20:14:45'),
(81, 41, 2, 'FNC', '5', '2018-03-16 20:16:26'),
(82, 42, 2, 'FNC', '12', '2018-03-16 20:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `t_komentar_timeline`
--

CREATE TABLE `t_komentar_timeline` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_komentar_timeline`
--

INSERT INTO `t_komentar_timeline` (`id_komentar`, `id_user`, `id_objective`, `komentar`, `waktu`) VALUES
(1, 2, 28, 'menurut saya lebih baik seperti ini untuk sistem yang akan diterapkan', '2018-03-17 01:36:50'),
(2, 1, 34, 'asdad', '2018-03-17 01:52:31'),
(3, 1, 34, 'yang bener mas ?', '2018-03-17 01:52:39'),
(4, 1, 34, 'mas', '2018-03-17 01:54:06'),
(5, 1, 28, 'gitu ya mas ?', '2018-03-17 01:54:24'),
(6, 2, 34, 'iya mas gitu ?', '2018-03-17 02:01:28'),
(7, 2, 34, 'masa ah', '2018-03-17 02:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `t_measure`
--

CREATE TABLE `t_measure` (
  `id_measure` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_analisis` varchar(11) NOT NULL,
  `measure` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_measure`
--

INSERT INTO `t_measure` (`id_measure`, `id_objective`, `id_user`, `id_kategori_analisis`, `measure`, `tanggal`) VALUES
(64, 28, 1, 'FNC', 'Perputaran Stok di Gudang', '2018-03-16 17:16:31'),
(65, 28, 1, 'FNC', 'Jumlah Write Off', '2018-03-16 17:16:31'),
(66, 28, 1, 'FNC', 'Biaya Gudang', '2018-03-16 17:16:31'),
(69, 30, 1, 'CST', 'Waktu Pemesanan sampai delivery', '2018-03-16 17:21:35'),
(70, 30, 1, 'CST', 'Inquiry response time', '2018-03-16 17:21:35'),
(71, 31, 1, 'CST', 'Benchmark Harga dengan Kompetitor', '2018-03-16 17:23:20'),
(72, 31, 1, 'CST', 'Persepsi/Nilai Harga Pelanggan', '2018-03-16 17:23:20'),
(73, 32, 1, 'INT', 'berkurangnya waktu layan untuk pelanggan setia', '2018-03-16 17:25:56'),
(74, 32, 1, 'INT', 'kepuasan pelanggan', '2018-03-16 17:25:57'),
(75, 33, 1, 'INT', 'Biaya Pengerjaan Ulang', '2018-03-16 17:27:24'),
(76, 33, 1, 'INT', 'jumlah rujukan', '2018-03-16 17:27:24'),
(77, 34, 1, 'LEA', 'waktu desain dan penjualan', '2018-03-16 17:28:49'),
(78, 35, 2, 'FNC', '123', '2018-03-16 19:01:48'),
(80, 35, 2, 'FNC', '111', '2018-03-16 19:01:48'),
(84, 37, 1, 'FNC', 'Laba Kotor ', '2018-03-16 20:01:56'),
(85, 37, 1, 'FNC', 'Laba Total', '2018-03-16 20:01:56'),
(86, 38, 2, 'FNC', '123', '2018-03-16 20:06:40'),
(87, 38, 2, 'FNC', '14214', '2018-03-16 20:06:40'),
(88, 38, 2, 'FNC', '345345', '2018-03-16 20:06:40'),
(90, 35, 2, 'FNC', 'asddasss', '2018-03-16 20:10:05'),
(91, 39, 2, 'FNC', '123123213', '2018-03-16 20:10:57'),
(92, 39, 2, 'FNC', '12313123', '2018-03-16 20:10:57'),
(93, 35, 2, 'FNC', 'asdasdad', '2018-03-16 20:11:21'),
(94, 40, 2, 'FNC', 'qwe', '2018-03-16 20:13:17'),
(95, 41, 2, 'FNC', '5', '2018-03-16 20:16:26'),
(96, 41, 2, 'FNC', '5', '2018-03-16 20:16:35'),
(97, 42, 2, 'FNC', '12', '2018-03-16 20:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `t_objective`
--

CREATE TABLE `t_objective` (
  `id_objective` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_analisis` varchar(11) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_objective`
--

INSERT INTO `t_objective` (`id_objective`, `id_user`, `id_kategori_analisis`, `objective`, `tanggal`) VALUES
(28, 1, 'FNC', 'Mengurangi Biaya Gudang', '0000-00-00 00:00:00'),
(30, 1, 'CST', 'Meningkatkan Responsiveness', '0000-00-00 00:00:00'),
(31, 1, 'CST', 'Harga Lebih kompetitif', '2018-03-16 17:23:20'),
(32, 1, 'INT', 'Menyediakan jalur khusus untuk pelanggan setia', '0000-00-00 00:00:00'),
(33, 1, 'INT', 'Menghilangkan biaya dan keterlambatan agen', '0000-00-00 00:00:00'),
(34, 1, 'LEA', 'Mengurangi Waktu pengembangan produk baru 30%', '0000-00-00 00:00:00'),
(35, 2, 'FNC', '1', '0000-00-00 00:00:00'),
(37, 1, 'FNC', 'Meningkatkan profitabilitas produk', '0000-00-00 00:00:00'),
(38, 2, 'FNC', '123', '0000-00-00 00:00:00'),
(39, 2, 'FNC', '123132', '0000-00-00 00:00:00'),
(40, 2, 'FNC', 'qwe', '2018-03-16 20:13:17'),
(41, 2, 'FNC', '5', '2018-03-16 20:16:26'),
(42, 2, 'FNC', '12', '2018-03-16 20:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `t_t`
--

CREATE TABLE `t_t` (
  `id_analisis` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `measure` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `isneed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_t`
--

INSERT INTO `t_t` (`id_analisis`, `id_objective`, `measure`, `action`, `isneed`) VALUES
(1, 1, 'Stock Turn', 'By Earlier Identification Item', 'New Stock Turn Analysis'),
(2, 1, 'Write Offs', 'Better Forecasting', 'Improve Sales Forecasting'),
(4, 2, 'Order to Delivery Read Time', 'Identifying cause of late', 'measure delivery time'),
(25, 16, '', 'ewrwer', 'werwer'),
(26, 16, '111', '111', '111'),
(27, 17, 'dd', 'ddd', 'asdasd'),
(30, 17, 'lp', 'lplp', 'lppl'),
(39, 16, 'fds', 'sdfds', 'sdf'),
(40, 2, 'sdad', 'asdadsa', 'sdad'),
(42, 22, 'mi', 'lah', 'hi'),
(85, 45, 'tes', 'SATU', 'dua'),
(91, 46, 'tes', 'SATU', 'duart'),
(92, 46, 'yrty', 'rtyrtyrt', 'tryrtyrty'),
(93, 46, NULL, 'rtyrty', 'rtyrty'),
(94, 46, NULL, NULL, 'rtyrty'),
(95, 47, 'tes', 'SATU', 'duart'),
(96, 47, 'dsfsdf', 'dsddd', 'fff'),
(97, 47, 'fdsfdsf', NULL, 'fsdfs'),
(98, 47, 'sdfsdf', NULL, NULL),
(99, 48, 'tes', 'SATU', 'duart'),
(100, 48, 'gdfgdfg', 'dfgdfg', 'dfgd'),
(101, 48, 'dfgdfg', NULL, NULL),
(102, 48, 'dfgdg', NULL, NULL),
(106, 50, 'efef', 'efefe', 'fef'),
(107, 50, 'fdsf', 'sdfdsf', ' '),
(108, 50, NULL, 'sdfsdf', ' '),
(109, 51, 'dd', 'sdfdsf', 'dsfsdf'),
(110, 51, 'ff', 'fdssdf', ' '),
(111, 51, NULL, 'sdfsdf', ' '),
(112, 51, 'dasdad', 'dfdsfdsf', ' '),
(113, 52, 'dd', 'sdfdsf', 'dsfsdf'),
(114, 52, 'rthrth', 'rthrh', ' '),
(115, 52, NULL, 'hrthrt', ' '),
(116, 52, 'dasdad', 'rthrth', ' '),
(117, 52, 'dasdad', 'rthrthr', ' '),
(118, 53, 'sdfsd', 'sdfsdf', 'sdfsdf'),
(119, 53, 'dsfsd', 'sdfsdfsdfsdf', ' '),
(120, 53, 'dasdad', 'sdfsdf', ' '),
(121, 53, 'dasdad', 'sdfsdfsdfsdf', ' '),
(122, 3, 'Meas', 'DED', 'FGASYD'),
(123, 3, 'DDD', ' ', 'HUDE'),
(124, 3, ' ', ' ', 'HUEHF'),
(125, 3, ' ', ' ', 'HUED');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_user`, `departemen`, `profile_picture`, `role`, `username`, `password`) VALUES
(1, 'Gumelar Tresna Dwinanda', 'IT', 'gumelar.jpg', 0, 'tresnaid', 'hehehehe'),
(2, 'Riki Winardi Garna', 'Finance', 'riki.jpg', 0, 'rikiwgarna', 'hehehehe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_action`
--
ALTER TABLE `t_action`
  ADD PRIMARY KEY (`id_action`);

--
-- Indexes for table `t_isneed`
--
ALTER TABLE `t_isneed`
  ADD PRIMARY KEY (`id_isneed`);

--
-- Indexes for table `t_komentar_timeline`
--
ALTER TABLE `t_komentar_timeline`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `t_measure`
--
ALTER TABLE `t_measure`
  ADD PRIMARY KEY (`id_measure`);

--
-- Indexes for table `t_objective`
--
ALTER TABLE `t_objective`
  ADD PRIMARY KEY (`id_objective`);

--
-- Indexes for table `t_t`
--
ALTER TABLE `t_t`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_action`
--
ALTER TABLE `t_action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `t_isneed`
--
ALTER TABLE `t_isneed`
  MODIFY `id_isneed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `t_komentar_timeline`
--
ALTER TABLE `t_komentar_timeline`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_measure`
--
ALTER TABLE `t_measure`
  MODIFY `id_measure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `t_objective`
--
ALTER TABLE `t_objective`
  MODIFY `id_objective` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `t_t`
--
ALTER TABLE `t_t`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
