-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 03:52 PM
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
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rmid` int(11) NOT NULL,
  `whereroom` varchar(255) NOT NULL,
  `rmtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rmid`, `whereroom`, `rmtype`, `price`, `status`) VALUES
(1, '', 'standard', 500.00, 'ว่าง'),
(2, '', 'standard', 500.00, 'ว่าง'),
(3, '', 'standard', 500.00, 'ว่าง'),
(4, '', 'standard', 500.00, 'ว่าง'),
(5, '', 'standard', 500.00, 'ว่าง'),
(6, '', 'standard', 500.00, 'ว่าง'),
(7, '', 'standard', 500.00, 'ว่าง'),
(8, '', 'standard', 500.00, 'ว่าง'),
(9, '', 'standard', 500.00, 'ว่าง'),
(10, '', 'standard', 500.00, 'ว่าง'),
(11, '', 'standard', 500.00, 'ว่าง'),
(12, '', 'standard', 500.00, 'ว่าง'),
(13, '', 'standard', 500.00, 'ว่าง'),
(14, '', 'standard', 500.00, 'ว่าง'),
(15, '', 'standard', 500.00, 'ว่าง'),
(16, '', 'standard', 500.00, 'ว่าง'),
(17, '', 'standard', 500.00, 'ว่าง'),
(18, '', 'standard', 500.00, 'ว่าง'),
(19, '', 'standard', 500.00, 'ว่าง'),
(20, '', 'standard', 500.00, 'ว่าง'),
(21, '', 'standard', 500.00, 'ว่าง'),
(22, '', 'standard', 500.00, 'ว่าง'),
(23, '', 'standard', 500.00, 'ว่าง'),
(24, '', 'standard', 500.00, 'ว่าง'),
(25, '', 'standard', 500.00, 'ว่าง'),
(26, '', 'standard', 500.00, 'ว่าง'),
(27, '', 'standard', 500.00, 'ว่าง'),
(28, '', 'standard', 500.00, 'ว่าง'),
(29, '', 'standard', 500.00, 'ว่าง'),
(30, '', 'sweet', 1500.00, 'ว่าง'),
(31, '', 'sweet', 1500.00, 'ว่าง'),
(32, '', 'sweet', 1500.00, 'ว่าง'),
(33, '', 'sweet', 1500.00, 'ว่าง'),
(34, '', 'sweet', 1500.00, 'ว่าง'),
(35, '', 'sweet', 1500.00, 'ว่าง'),
(36, '', 'sweet', 1500.00, 'ว่าง'),
(37, '', 'sweet', 1500.00, 'ว่าง'),
(38, '', 'sweet', 1500.00, 'ว่าง'),
(39, '', 'sweet', 1500.00, 'ว่าง'),
(40, '', 'sweet', 1500.00, 'ว่าง'),
(41, '', 'sweet', 1500.00, 'ว่าง'),
(42, '', 'sweet', 1500.00, 'ว่าง'),
(43, '', 'sweet', 1500.00, 'ว่าง'),
(44, '', 'sweet', 1500.00, 'ว่าง'),
(45, '', 'sweet', 1500.00, 'ว่าง'),
(46, '', 'sweet', 1500.00, 'ว่าง'),
(47, '', 'sweet', 1500.00, 'ว่าง'),
(48, '', 'sweet', 1500.00, 'ว่าง'),
(49, '', 'sweet', 1500.00, 'ว่าง'),
(50, '', 'vip', 3000.00, 'ว่าง'),
(51, '', 'vip', 3000.00, 'ว่าง'),
(52, '', 'vip', 3000.00, 'ว่าง'),
(53, '', 'vip', 3000.00, 'ว่าง'),
(54, '', 'vip', 3000.00, 'ว่าง'),
(55, '', 'vip', 3000.00, 'ว่าง'),
(56, '', 'vip', 3000.00, 'ว่าง'),
(57, '', 'vip', 3000.00, 'ว่าง'),
(58, '', 'vip', 3000.00, 'ว่าง'),
(59, '', 'vip', 3000.00, 'ว่าง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_addmin`
--

CREATE TABLE `tb_addmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_addmin`
--

INSERT INTO `tb_addmin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `roomtype` varchar(50) DEFAULT NULL,
  `bank_slip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'user', '1', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rmid`);

--
-- Indexes for table `tb_addmin`
--
ALTER TABLE `tb_addmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_addmin`
--
ALTER TABLE `tb_addmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
