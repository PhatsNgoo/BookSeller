-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 04:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksellpurches`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbook`
--

CREATE TABLE `addbook` (
  `id` int(255) NOT NULL,
  `ShopName` varchar(30) DEFAULT NULL,
  `ParsonName` varchar(30) DEFAULT NULL,
  `ParsonMobile` varchar(13) DEFAULT NULL,
  `BookName` varchar(30) DEFAULT NULL,
  `PiesOfBook` int(255) DEFAULT NULL,
  `PriceOfOneBook` double(50,0) DEFAULT NULL,
  `ShoppingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbook`
--

INSERT INTO `addbook` (`id`, `ShopName`, `ParsonName`, `ParsonMobile`, `BookName`, `PiesOfBook`, `PriceOfOneBook`, `ShoppingDate`) VALUES
(1, 'Facebook', 'Semant.mishra', '9898587958', 'Node.js', 10, 400, '2018-12-11'),
(2, 'CvRU', 'Semant.mishra', '9898587958', 'C', 3, 300, '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `sellbook`
--

CREATE TABLE `sellbook` (
  `id` int(25) NOT NULL,
  `ShopName` varchar(32) DEFAULT NULL,
  `BuyingParson` varchar(30) DEFAULT NULL,
  `BuyingParsonMobile` varchar(13) DEFAULT NULL,
  `SellParson` varchar(30) DEFAULT NULL,
  `BookName` varchar(30) DEFAULT NULL,
  `PiesOfBook` int(25) DEFAULT NULL,
  `PriceOfOneBook` int(25) DEFAULT NULL,
  `PriceOfAlaBook` int(25) DEFAULT NULL,
  `SellingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellbook`
--

INSERT INTO `sellbook` (`id`, `ShopName`, `BuyingParson`, `BuyingParsonMobile`, `SellParson`, `BookName`, `PiesOfBook`, `PriceOfOneBook`, `PriceOfAlaBook`, `SellingDate`) VALUES
(1, 'A to Z Programming Books Shop', 'Google', '8546958785', 'Semant.mishra', 'Node.js', 2, 400, 800, '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `shopinfo`
--

CREATE TABLE `shopinfo` (
  `ShopName` varchar(30) DEFAULT NULL,
  `Admin` varchar(30) DEFAULT NULL,
  `Mobile` varchar(13) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `ShopAddress` text,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopinfo`
--

INSERT INTO `shopinfo` (`ShopName`, `Admin`, `Mobile`, `Email`, `ShopAddress`, `id`) VALUES
('A to Z Programming Books Shop', 'Semant.Mishra', '8458795485', 'Admint@gmail.com', 'Ambikapur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `gender`, `password`) VALUES
(11, 'semant', 'semant@gmail.com', 'MALE', '$2y$10$Dl98zx3I16kjklor/ZvgceshU/GgwzUuF40eL4CR74pAZBgTxc1v.'),
(15, 'Semant.mishra', 'Semant.Mishra@project.com', 'MALE', '$2y$10$eeyKQwPTMZcWPWtZ4K/ng.3vygPRezY3P0haGGtvFBNFzM3mSb.oe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbook`
--
ALTER TABLE `addbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellbook`
--
ALTER TABLE `sellbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopinfo`
--
ALTER TABLE `shopinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbook`
--
ALTER TABLE `addbook`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellbook`
--
ALTER TABLE `sellbook`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopinfo`
--
ALTER TABLE `shopinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
