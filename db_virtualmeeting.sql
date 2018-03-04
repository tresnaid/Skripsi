-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 08:02 PM
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
(1, 1, 1, 'FNC', 'By Earlier Manage', '2018-03-02 15:10:37'),
(2, 1, 1, 'FNC', 'by better forecasting', '2018-03-02 15:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `t_analisis`
--

CREATE TABLE `t_analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_objective` int(11) NOT NULL,
  `measure` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `isneed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_analisis`
--

INSERT INTO `t_analisis` (`id_analisis`, `id_objective`, `measure`, `action`, `isneed`) VALUES
(1, 1, 'Stock Turn', 'By Earlier Identification Item', 'New Stock Turn Analysis'),
(2, 1, 'Write Offs', 'Better Forecasting', 'Improve Sales Forecasting'),
(3, 1, 'StockHandling Cost', ' ', 'New Stock Algorithm'),
(4, 2, 'Order to Delivery Read Time', 'Identifying cause of late', 'measure delivery time'),
(5, 2, ' ', 'Informing CUstomer In Advanced', 'Analysist of type'),
(7, 5, 'Politics', 'Burn', 'APPS'),
(8, 6, 'How', 'How', 'WHat');

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
(1, 1, 1, 'FNC', 'New Stock Turn Analysist', '2018-03-02 15:11:24');

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
(1, 1, 1, 'FNC', 'Stock Turn', '2018-03-02 14:33:35'),
(2, 1, 1, 'FNC', 'Write Offs', '2018-03-02 14:33:35'),
(3, 0, 0, '', '44', '2018-03-03 17:52:29'),
(4, 0, 0, '', '44', '2018-03-03 17:52:29'),
(5, 0, 0, '', '123', '2018-03-03 17:52:29'),
(6, 0, 0, '', 'rrr', '2018-03-03 18:15:45'),
(7, 0, 0, '', 'rrr', '2018-03-03 18:15:45');

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
(1, 1, 'FNC', 'Reducing Cost', '2018-03-02 14:30:17'),
(2, 1, 'FNC', 'Increasing Profit', '2018-03-02 14:30:17'),
(16, 1, '', 'er', '2018-03-03 14:14:10'),
(17, 1, '', 'ads', '2018-03-03 14:19:14'),
(22, 1, '', 'bis', '2018-03-03 15:31:58'),
(49, 1, '', 'fe', '2018-03-03 18:49:27'),
(50, 1, '', 'fe', '2018-03-03 18:50:18'),
(51, 1, '', 'dd', '2018-03-03 18:52:14'),
(52, 1, '', 'dd', '2018-03-03 18:52:43'),
(53, 1, '', 'sdgdsg', '2018-03-03 18:53:07'),
(54, 1, '', 'qweqe', '2018-03-03 18:55:41');

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
(41, 2, 'asdad', 'asdasda', ''),
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
(103, 49, 'efef', 'efefe', 'fef'),
(104, 49, NULL, 'fefefef', ' '),
(105, 49, NULL, 'fefe', ' '),
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
(122, 54, 'qweqwe', 'qweqwe', 'qweqweq'),
(123, 54, 'wqeqwe', 'qweqwe', 'ewqeq'),
(124, 54, ' ', 'qewqwe', 'eqwe'),
(125, 54, ' ', 'qeqweq', ' '),
(126, 54, ' ', 'eqweq', ' ');

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
-- Indexes for table `t_analisis`
--
ALTER TABLE `t_analisis`
  ADD PRIMARY KEY (`id_analisis`),
  ADD KEY `t_analisis_ibfk_1` (`id_objective`);

--
-- Indexes for table `t_isneed`
--
ALTER TABLE `t_isneed`
  ADD PRIMARY KEY (`id_isneed`);

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
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_analisis`
--
ALTER TABLE `t_analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_isneed`
--
ALTER TABLE `t_isneed`
  MODIFY `id_isneed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_measure`
--
ALTER TABLE `t_measure`
  MODIFY `id_measure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_objective`
--
ALTER TABLE `t_objective`
  MODIFY `id_objective` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `t_t`
--
ALTER TABLE `t_t`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
