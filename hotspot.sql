-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 07:55 PM
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
(7, 5, 'M1', '2018-10-27'),
(9, 0, 'F9', '2018-10-28'),
(9, 5, 'M1', '2018-10-30'),
(13, 5, 'M1', '2018-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `sid` int(11) UNSIGNED NOT NULL,
  `pid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `oid`, `cid`, `sid`, `pid`) VALUES
(1, 9, 13, 5, 'M1'),
(2, 10, 13, 5, 'M1'),
(3, 11, 13, 5, 'M1'),
(4, 12, 13, 5, 'M1'),
(5, 13, 13, 5, 'M1'),
(6, 14, 13, 5, 'M1'),
(7, 15, 13, 5, 'M1'),
(8, 16, 13, 5, 'M1'),
(9, 17, 13, 5, 'M1'),
(10, 18, 13, 5, 'M1'),
(11, 19, 13, 5, 'M1'),
(12, 20, 13, 5, 'M1');

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
('Motorola', 106),
('Apple', 107);

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
('E13', 105, 'images/phone.jpg', 'Nokia 3000', 1, 2, 'Black', 3000),
('F9', 103, 'images/OPPOF9.jpeg', 'OPPO F9', 6, 64, 'Red', 23990),
('M1', 101, 'images/AsusM1.jpg', 'Asus Zenfone Max Pro', 4, 64, 'Black', 10999),
('V10', 102, 'images/honv10.jpg', 'Honor View 10', 8, 128, 'Blue', 29999),
('Z4', 101, 'images/z4.jpg', 'Asus Zenfone 4', 3, 32, 'White', 8999);

-- --------------------------------------------------------

--
-- Table structure for table `new_model_req`
--

CREATE TABLE `new_model_req` (
  `model_id` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_model_req`
--

INSERT INTO `new_model_req` (`model_id`, `seller_id`, `c_name`) VALUES
('E1', 1, 'Nokia'),
('N1', 2, 'Nokia'),
('S8', 12, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `oid` int(11) UNSIGNED NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_complete`
--

CREATE TABLE `order_complete` (
  `oid` int(11) UNSIGNED NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `sid` int(11) UNSIGNED NOT NULL,
  `pid` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ram` int(5) NOT NULL,
  `storage` int(5) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_confirm`
--

CREATE TABLE `order_confirm` (
  `oid` int(11) NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_confirm`
--

INSERT INTO `order_confirm` (`oid`, `cid`, `date`) VALUES
(1, 13, '2018-11-08'),
(2, 43, '2018-11-06'),
(3, 65, '2018-11-24'),
(4, 13, '2018-11-08'),
(5, 13, '2018-11-08'),
(6, 13, '2018-11-08'),
(7, 13, '2018-11-08'),
(8, 13, '2018-11-08'),
(9, 13, '2018-11-08'),
(10, 13, '2018-11-08'),
(11, 13, '2018-11-10'),
(12, 13, '2018-11-10'),
(13, 13, '2018-11-10'),
(14, 13, '2018-11-10'),
(15, 13, '2018-11-10'),
(16, 13, '2018-11-10'),
(17, 13, '2018-11-10'),
(18, 13, '2018-11-10'),
(19, 13, '2018-11-10'),
(20, 13, '2018-11-14');

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
(5, 'M1', 25),
(8, '7C', 1),
(14, '7C', 60);

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
('Asus', 'M1', 'Dedicated', '5MP+13MP', '4G VoLTE, GSM, 4G LTE, WCDMA', '5000 mAh', '15.21 cm (5.99 inch)', '180 g', 'Brand Warranty of 1 Year Available for Handset and 6 Months for Accessories\r\n', 'Android Oreo 8.1', 'Qualcomm Snapdragon 636 Octa Core', '1.8 GHz'),
('Nokia', 'E16', 'Dedicated', '2 MP', '3g', '3000mh', '3.8 inch', '150g', '1 year', 'ANdroid', '1.25 Gz', '2'),
('Nokia', 'E13', 'Dedicated', '2MP', '3g', '3000mah', '4inch', '1.8gm', '1year', 'Android', 'Dual Core', '1.2GHZ');

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
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `is_seller` tinyint(1) NOT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `name`, `phone`, `email`, `password`, `address`, `city`, `state`, `pin`, `is_seller`, `is_admin`) VALUES
(5, 'mona', 'MONA KUMARI', 8565985867, 'mona.2016ca11@gmail.com', '1234', 'RN: 317, IH-B girl\'s hostel, MNNIT', 'ALLAHABAD', 'BIHAR', 854327, 1, 0),
(6, 'komal', 'KOMAL ', 123456789, 'komal@gmail.com', '4321', 'RN: 316 MNNIT', 'Pillibigh', 'Uttar Pradesh', 211004, 1, 0),
(7, 'manisha', 'mani', 2345678, 'asd', '8765', 'Room No: 316 IH-B MNNIT', 'Allahabd', 'UP', 211001, 0, 0),
(8, 'abc', 'abcd', 9161759716, 'monishakram@gmail.com', '12345', NULL, NULL, NULL, NULL, 1, 1),
(9, 'zishan', 'Mohd Zishan', 9793574346, 'mz@gmail.com', 'sanu786', 'teliyargang', 'ALLAHABAD', 'UTTAR PRADESH', 211004, 0, 1),
(11, 'rastogi', 'Satyam', 9793574346, 'mz@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, NULL, 0, NULL),
(12, 'zishan1', 'Mohd Zishan', 9793574346, 'mz@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, NULL, 1, NULL),
(13, 'pansarimona', 'Mona', 8565985867, 'mona.2016ca11@gmail.com', '132106a20b11b49bb6c2d6a39e302b5ea3d4acc34cfca1ad41e102d2ab898c0f', 'MNNIT ', 'Allahabad', 'UP', 211004, 0, NULL),
(14, 'pansariaditya', 'Aditya', 1234567890, 'abc@gmail.com', '265719f4e7ee032fe4a0c5ed5735a0530545e4f35c8648155dc5450330327e2a', NULL, NULL, NULL, NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oid` (`oid`);

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
-- Indexes for table `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD PRIMARY KEY (`oid`);

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
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `order_confirm` (`oid`);

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
