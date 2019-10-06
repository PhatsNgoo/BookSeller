-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 05:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksellerproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` varchar(13) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Author` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Category` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Title`, `Price`, `Description`, `Author`, `Category`) VALUES
('1', 'First book', 5, 'This is a testing book', 'Johnnnn', 'Action'),
('2', 'Second book', 6.99, 'This is second fucking book', 'Johnnnn', 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE `giftcode` (
  `Code` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `State` int(11) NOT NULL,
  `BookID` varchar(13) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `UserID` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `UserID` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `UserID`, `Password`, `Email`, `Balance`) VALUES
('phatsngoo', '1', 'Uzur3u2w', 'phatsngoo2702@gmail.com', 0),
('vicinus', '2', 'iow8ehw8', 'vinnnvvv@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
