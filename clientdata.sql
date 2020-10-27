-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 07:24 AM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15114221_clientdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client_Data`
--

CREATE TABLE `Client_Data` (
  `Account_No.` int(5) NOT NULL,
  `Name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Email_Address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Client_Data`
--

INSERT INTO `Client_Data` (`Account_No.`, `Name`, `Email_Address`, `Amount`) VALUES
(1, 'Adam Lively', 'Adamlively@gmail.com', 3000),
(2, 'Blake Adams', 'AdamsBlake@gmail..com', 4480),
(3, 'Chris Adams', 'ChrisAdams@gmail.com', 7500),
(4, 'David Sullen', 'DavidSullen@gmail.com', 3480),
(5, 'Elis Warne', 'Elis.Warne@gmail.com', 7500),
(6, 'Frederik Smith', 'Fsmith@gmail.com', 2050),
(7, 'Gaurang Shinde', 'ShindeGaurang@gmail.com', 9280),
(8, 'Harry Potter', 'Harry.potter@gmail.com', 13158),
(9, 'Idris Elba', 'Idirs11@gmail.com', 3865),
(10, 'Jason Todd', 'JasonTodd112@gmail.com', 4244);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_hist`
--

CREATE TABLE `transaction_hist` (
  `id` int(10) NOT NULL,
  `transfer_from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_to` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `transfer_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_hist`
--

INSERT INTO `transaction_hist` (`id`, `transfer_from`, `transfer_to`, `date`, `transfer_amount`) VALUES
(17, 'Idris Elba', 'Elis Warne', '2020-10-27 01:03:00', 2000),
(18, 'Blake Adams', 'Harry Potter', '2020-10-27 01:05:00', 2000),
(19, 'Jason Todd', 'Elis Warne', '2020-10-27 01:08:00', 5000),
(20, 'Frederik Smith', 'Harry Potter', '2020-10-27 12:46:00', 3000),
(21, 'Elis Warne', 'Adam Lively', '2020-10-27 12:47:00', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Client_Data`
--
ALTER TABLE `Client_Data`
  ADD PRIMARY KEY (`Account_No.`);

--
-- Indexes for table `transaction_hist`
--
ALTER TABLE `transaction_hist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Client_Data`
--
ALTER TABLE `Client_Data`
  MODIFY `Account_No.` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_hist`
--
ALTER TABLE `transaction_hist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
