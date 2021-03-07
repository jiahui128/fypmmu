-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 07:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_phoneno` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_gender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `code` mediumint(50) NOT NULL,
  `admin_status` int(10) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phoneno`, `admin_gender`) VALUES
(123456, 'Vivian Quek', '1181202878@student.mmu.edu.my', 'vivian020302', '01110967982', 'Female'),
(234567, 'Wei Chin', '1191200801@student.mmu.edu.my', 'weichin010417', '01110567502', 'Male'),
(345678, 'Jia Hui', '1181203410@student.mmu.edu.my', 'jiahui011208', '01110899638', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
