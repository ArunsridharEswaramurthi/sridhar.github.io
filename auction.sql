-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 02:13 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `auction_amount`
--

CREATE TABLE `auction_amount` (
  `id` int(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `datej` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_register`
--

CREATE TABLE `auction_register` (
  `id` int(100) NOT NULL,
  `packagetype` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `datej` datetime NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(100) NOT NULL,
  `auction_type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `address`, `phone`, `email`, `login`, `password`) VALUES
(1, 'kannan', '107 west street', '9659599191', 'karthiappsmine@gmail.com', 'kannan', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `useradd`
--

CREATE TABLE `useradd` (
  `id` int(100) NOT NULL,
  `atype` varchar(20) NOT NULL,
  `aname` varchar(20) NOT NULL,
  `datej` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_amount`
--
ALTER TABLE `auction_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction_register`
--
ALTER TABLE `auction_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradd`
--
ALTER TABLE `useradd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_amount`
--
ALTER TABLE `auction_amount`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auction_register`
--
ALTER TABLE `auction_register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `useradd`
--
ALTER TABLE `useradd`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
