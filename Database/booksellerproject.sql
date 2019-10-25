-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 08:38 PM
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
  `BookID` int(11) NOT NULL CHECK (BookID <> ''),
  `Title` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Title <> ''),
  `Price` float NOT NULL CHECK (Price <> ''),
  `Description` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Description <> ''),
  `Author` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Author <> ''),
  `Category` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Category <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Title`, `Price`, `Description`, `Author`, `Category`) VALUES
(1, 'First book', 5, 'This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book This is a testing book ', 'Johnnnn', 'Action'),
(2, 'Second book', 6.99, 'This is second fucking book', 'Johnnnn', 'Action'),
(3, 'The third book', 8.99, 'This is third book in store', 'David James', 'Drama'),
(4, 'Fourth Book', 8.99, 'Too lazy for write description', 'Vincinus', 'Science'),
(5, 'Fifth Book', 7.99, 'Lazzyyyyy', 'Vinnn', 'Story'),
(6, 'Sixth Book', 7.99, 'Lazzy', 'Ahnna', 'English'),
(7, 'Seventh Book', 8.99, 'This is a horror book', 'King John', 'Comedy'),
(8, 'Eighth book', 99.99, 'This is eighth fucking book', 'Johnnnn', 'Drama'),
(9, 'Nineth Book', 9.99, 'Fuck u description', 'Vinnn', 'Science'),
(10, 'Tenth book', 8.99, 'Fuck u description', 'David James', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE `giftcode` (
  `Code` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Code <> ''),
  `Value` float NOT NULL CHECK (Value <> ''),
  `Useable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `giftcode`
--

INSERT INTO `giftcode` (`Code`, `Value`, `Useable`) VALUES
('fwfg35gdfg', 30, 1),
('Ifdi09teh', 100, 0),
('S3phjr0th', 15, 1),
('t4gtry345srg', 15, 1),
('Uzur3u2w', 10, 0),
('vb4tyw356', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(20) NOT NULL CHECK (TransactionID <> ''),
  `State` int(11) NOT NULL CHECK (State <> ''),
  `BookID` int(11) NOT NULL CHECK (BookID <> ''),
  `UserName` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserName <> ''),
  `ShippingAddress` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (ShippingAddress <> ''),
  `DateTime` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (DateTime <> ''),
  `Phone` char(11) CHARACTER SET utf8 NOT NULL CHECK (Phone <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `State`, `BookID`, `UserName`, `ShippingAddress`, `DateTime`, `Phone`) VALUES
(1, 1, 2, 'phatsngoo', 'To Huu Street, Ha Dong, room 5-08 CT2 Van Khe Urban', '10/16/2019', '0967162652'),
(2, 1, 2, 'phatsngoo', 'To Huu Street, Ha Dong, room 5-08 CT2 Van Khe Urban', '10/16/2019', '0967162652'),
(3, 1, 2, 'phatsngoo', 'To Huu Street, Ha Dong, room 5-08 CT2 Van Khe Urban', '10/25/2019', '0967162652'),
(4, 1, 5, 'phatsngoo', 'To Huu Street, Ha Dong, room 5-08 CT2 Van Khe Urban', '10/25/2019', '0967162652'),
(5, 1, 7, 'vicinus', '50 Nguyen Trai street Ha noi', '10/25/2019', '091204365'),
(6, 1, 7, 'vicinus', '50 Nguyen Trai street Ha noi', '10/25/2019', '0912354667');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserName <> ''),
  `UserID` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserID <> ''),
  `Password` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Password <> ''),
  `Email` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Email <> ''),
  `Balance` float NOT NULL,
  `UserRole` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `UserID`, `Password`, `Email`, `Balance`, `UserRole`) VALUES
('fifthacc', '5', 'iow8ehw8', 'gruuhhh@gmail.com', 0, 'User'),
('fourhtacc', '3', 'aacc1234', 'kelldjn@gmail.com', 0, 'User'),
('kelvjn', '4', 'iow8ehw8', 'kelvingH@gmail.com', 0, 'User'),
('phatsngoo', '1', 'Uzur3u2w', 'phatsngoo2702@gmail.com', 110, 'Admin'),
('vicinus', '2', 'iow8ehw8', 'vinnnvvv@gmail.com', 219, 'User');

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
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `FK_UserID` (`UserName`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`),
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
