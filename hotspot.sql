-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 07:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) UNSIGNED NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `sid`, `pid`, `date`) VALUES
(7, 5, 'M1', '2018-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp` varchar(255) NOT NULL,
  `cid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp`, `cid`) VALUES
('Asus', 101),
('Honor', 102),
('Oppo', 103),
('Samsung', 104),
('Nokia', 105),
('Motorola', 106);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` varchar(255) NOT NULL,
  `cid` int(3) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) NOT NULL,
  `ram` int(5) NOT NULL,
  `storage` int(5) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `cid`, `image`, `model_name`, `ram`, `storage`, `color`, `price`) VALUES
('7C', 102, 'images/h7c.jpg', 'Honor 7C', 4, 64, 'Black', 10000),
('A7', 104, 'images/samA7.jpeg', 'Samsung Galaxy A7', 4, 64, 'Grey', 24999),
('F9', 103, 'images/OPPOF9.jpeg', 'OPPO F9', 6, 64, 'Red', 23990),
('M1', 101, 'images/AsusM1.jpg', 'Asus Zenfone Max Pro', 4, 64, 'Black', 10999),
('V10', 102, 'images/honv10.jpg', 'Honor View 10', 8, 128, 'Blue', 29999),
('Z4', 101, 'images/z4.jpg', 'Asus Zenfone 4', 3, 32, 'White', 8999);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) UNSIGNED NOT NULL,
  `model_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `model_id`, `quantity`) VALUES
(6, '7C', 56),
(5, 'M1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `com_name` varchar(20) NOT NULL,
  `model_id` varchar(255) NOT NULL,
  `memory_slot` varchar(255) NOT NULL,
  `camera` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `display_size` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `clock` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`com_name`, `model_id`, `memory_slot`, `camera`, `network`, `battery`, `display_size`, `weight`, `warranty`, `OS`, `processor`, `clock`) VALUES
('Asus', 'M1', 'Dedicated', '5MP+13MP', '4G VoLTE, GSM, 4G LTE, WCDMA', '5000 mAh', '15.21 cm (5.99 inch)', '180 g', 'Brand Warranty of 1 Year Available for Handset and 6 Months for Accessories\r\n', 'Android Oreo 8.1', 'Qualcomm Snapdragon 636 Octa Core', '1.8 GHz');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `is_seller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `name`, `phone`, `email`, `password`, `address`, `city`, `state`, `pin`, `is_seller`) VALUES
(5, 'mona', 'MONA KUMARI', 8565985867, 'mona.2016ca11@gmail.com', '1234', 'RN: 317, IH-B girl\'s hostel, MNNIT', 'ALLAHABAD', 'BIHAR', 854327, 1),
(6, 'komal', 'KOMAL ', 123456789, 'komal@gmail.com', '4321', 'RN: 316 MNNIT', 'Pillibigh', 'Uttar Pradesh', 211004, 1),
(7, 'manisha', 'mani', 2345678, 'asd', '8765', 'Room No: 316 IH-B MNNIT', 'Allahabd', 'UP', 211001, 0),
(8, 'abc', 'abcd', 9161759716, 'monishakram@gmail.com', '12345', NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD KEY `model_id` (`model_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `company` (`cid`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`),
  ADD CONSTRAINT `seller_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
