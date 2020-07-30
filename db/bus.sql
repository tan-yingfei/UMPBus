-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 01:48 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_bus`
--

CREATE TABLE `booking_bus` (
  `num_booking` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `date_last` date NOT NULL,
  `time` date NOT NULL,
  `time_last` date NOT NULL,
  `driver` varchar(50) COLLATE utf8_bin NOT NULL,
  `place` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `booking_bus`
--

INSERT INTO `booking_bus` (`num_booking`, `title`, `date`, `date_last`, `time`, `time_last`, `driver`, `place`) VALUES
(4, 'wewewqaaa', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'weqe', 'dsadsad'),
(5, '332 DSFSDF', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'FDDSFDS', 'SADSADSA'),
(6, '34 FDSFSD', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'DFF', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pkuser` int(11) NOT NULL,
  `usern` varchar(250) NOT NULL,
  `passd` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pkuser`, `usern`, `passd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE `user_booking` (
  `num_user_booking` int(100) NOT NULL,
  `num_booking` int(100) NOT NULL,
  `name` varchar(500) COLLATE utf8_bin NOT NULL,
  `nric` varchar(100) COLLATE utf8_bin NOT NULL,
  `std_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `faculty` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `date_last` date NOT NULL,
  `time` varchar(100) COLLATE utf8_bin NOT NULL,
  `time_last` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `phone` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(500) COLLATE utf8_bin NOT NULL,
  `city` varchar(100) COLLATE utf8_bin NOT NULL,
  `state` varchar(100) COLLATE utf8_bin NOT NULL,
  `postcode` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` varchar(100) COLLATE utf8_bin NOT NULL,
  `remarks` varchar(200) COLLATE utf8_bin NOT NULL,
  `paper_work` varchar(100) COLLATE utf8_bin NOT NULL,
  `pay` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` varchar(100) COLLATE utf8_bin NOT NULL,
  `pstatus` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`num_user_booking`, `num_booking`, `name`, `nric`, `std_id`, `faculty`, `date`, `date_last`, `time`, `time_last`, `email`, `phone`, `address`, `city`, `state`, `postcode`, `price`, `remarks`, `paper_work`, `pay`, `status`, `pstatus`) VALUES
(13, 5, 'sadsa', '9502423453', '5452', 'fvgfdgdf', '2015-12-06', '2015-12-07', '', '', 'gdfg@gmail.com', '02252452', 'dfgfd', 'dfgd', 'Johor', '63453', '41', 'l', 'dgdgd.docx', 'pay.docx', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_bus`
--
ALTER TABLE `booking_bus`
  ADD PRIMARY KEY (`num_booking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pkuser`);

--
-- Indexes for table `user_booking`
--
ALTER TABLE `user_booking`
  ADD PRIMARY KEY (`num_user_booking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_bus`
--
ALTER TABLE `booking_bus`
  MODIFY `num_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pkuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_booking`
--
ALTER TABLE `user_booking`
  MODIFY `num_user_booking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
