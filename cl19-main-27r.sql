-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 02:49 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl19-main-27r`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `RecipientID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `RecipientID`, `SenderID`, `Text`, `Subject`, `Time`) VALUES
(10, 1, 1, 'I love you', 'Confession', '2016-12-06 05:07:30'),
(11, 1, 1, 'I Love You', 'Confession2', '2016-12-06 06:05:22'),
(12, 1, 1, 'I hate you', 'Confession 3', '2016-12-06 07:24:16'),
(18, 2, 1, 'Bla Bla', 'Confession 4', '2016-12-06 08:19:18'),
(19, 1, 2, 'I hate you', 'Confession 5', '2016-12-06 09:14:12'),
(20, 2, 1, 'I really hate you', 'Confession 6', '2016-12-06 10:14:06'),
(21, 2, 1, 'I still hate you', 'Confession 7', '2016-12-06 11:09:09'),
(22, 2, 1, 'I like you', 'Confession 8', '2016-12-06 12:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `Price` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `TimeLeft` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `SellerID`, `BuyerID`, `Price`, `Name`, `Img`, `Type`, `Description`, `TimeLeft`) VALUES
(7, 0, 2, 14, 'Alec', '520621.jpg', '', 'fantastic beasts', 0),
(11, 1, 2, 0, 'Bra', '16883.jpg', '', '', 0),
(12, 1, 2, 12, 'Alec', '68955.jpg', '', 'Sucks', 0),
(13, 1, 2, 12, 'Alec', '725861.jpg', '', 'Kleyer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `COUNTRY` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `FirstName`, `LastName`, `COUNTRY`, `Image`, `PhoneNumber`) VALUES
(1, 'minh.95dq@gmail.com', '7042', 'Minh', 'Doan', 'USA', '', '9293785706'),
(2, 'minh.95dq@gmail.com', '7042', 'Minh', 'Doan', 'United States', '', '9293785706');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
