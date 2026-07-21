-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2026 at 08:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'manager', 'manager123', 'Restaurant Manager', 'manager@latoscana.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cuisineid` int(11) NOT NULL,
  `cuisinename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cuisineid`, `cuisinename`) VALUES
(1, 'Indian'),
(2, 'Chinese'),
(3, 'South Indian'),
(4, 'North Indian'),
(5, 'Italian');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dishid` int(11) NOT NULL,
  `dishname` varchar(100) NOT NULL,
  `dishcuisine` int(11) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dishid`, `dishname`, `dishcuisine`, `price`, `image`) VALUES
(6, 'Butter Chicken', 4, 280, 'ButterChicken.png'),
(7, 'Chhole Bhature', 4, 150, 'ChholeBhature.png'),
(8, 'Hakka Noodles', 2, 180, 'HakkaNoodles.png'),
(9, 'Margherita', 5, 250, 'Margherita.png'),
(10, 'Masala Dosa', 3, 120, 'MasalaDosa.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `fullname`, `email`, `photo`) VALUES
(1, 'chaksh', '$2y$10$N.B4zot8ZxS1JAjjK6LwouAga12pKsYXP8OaCHbbHmAYtsEyTjRL6', 'chakshdeep', 'chakshdeep@gmail.com', '1782284276_black-chimpanzee-photography-bag2t39givx0vs7l.jpg.png'),
(2, 'gurjeet', '$2y$10$xe287FvaIsanPgLD./F4Wejtx0m8bs2CxfPkkavN7XFIviDanv21q', 'gurjeet', 'gg@gmail.com', '1782290654_sharp-edged-giga-chad-portrait-shot-oofiuz2vnh8xvh5c.jpg'),
(3, 'Inder', '123', 'Inder', 'munc2@yahoo.com', '1782843090_Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dishid` int(11) NOT NULL,
  `dishname` varchar(100) NOT NULL,
  `dishcuisine` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `username`, `dishid`, `dishname`, `dishcuisine`, `price`, `quantity`, `total`, `status`) VALUES
(1, 3, 'Inder', 10, 'Masala Dosa', 'South Indian', 120, 1, 120, 'Pending'),
(2, 3, 'Inder', 7, 'Chhole Bhature', 'North Indian', 150, 2, 300, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cuisineid`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dishid`),
  ADD KEY `dishcuisine` (`dishcuisine`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cuisineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `dishid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`dishcuisine`) REFERENCES `categories` (`cuisineid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
