-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2021 at 08:29 PM
-- Server version: 5.7.32-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greencity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `version` varchar(250) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL,
  `userType` int(11) NOT NULL DEFAULT '1',
  `addDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifyDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `profile`, `version`, `status`, `userType`, `addDate`, `modifyDate`) VALUES
(1, 'Admin', 'admin@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 'user.png', NULL, '1', 1, '2021-02-10 20:00:30', '2021-02-10 20:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `bookingmaster`
--

CREATE TABLE `bookingmaster` (
  `id` int(11) NOT NULL,
  `UpcyclingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `status` int(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingmaster`
--

INSERT INTO `bookingmaster` (`id`, `UpcyclingId`, `userId`, `bookingDate`, `status`, `created`, `updated`) VALUES
(1, 1, 3, '2021-02-26', 1, '2021-02-25 11:28:19', '0000-00-00 00:00:00'),
(4, 1, 1, '2021-02-27', 1, '2021-02-25 11:42:43', '0000-00-00 00:00:00'),
(5, 1, 1, '2021-02-28', 1, '2021-02-25 11:43:06', '0000-00-00 00:00:00'),
(6, 1, 2, '2021-02-26', 1, '2021-02-25 13:02:03', '0000-00-00 00:00:00'),
(10, 1, 2, '2021-02-28', 1, '2021-02-25 15:14:56', '0000-00-00 00:00:00'),
(12, 1, 2, '2021-02-27', 1, '2021-02-26 05:58:14', '0000-00-00 00:00:00'),
(13, 2, 2, '2021-02-28', 1, '2021-02-26 06:56:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `quantity`, `addDate`) VALUES
(61, 5, 33, '1', '2021-03-02 23:09:49'),
(63, 2, 37, '1', '2021-03-03 18:31:23'),
(65, 2, 36, '1', '2021-03-04 11:14:03'),
(66, 2, 35, '1', '2021-03-04 11:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL DEFAULT '1',
  `addDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`id`, `name`, `status`, `addedBy`, `addDate`, `modifyDate`) VALUES
(1, 'Plastic', 1, 1, '2021-02-06 20:56:23', '2021-02-17 17:26:19'),
(2, 'Electronics devices', 1, 1, '2021-02-20 13:15:37', '2021-02-20 13:15:37'),
(3, 'Metal', 1, 1, '2021-03-02 20:00:13', '2021-03-04 18:50:28'),
(4, 'Glass', 1, 1, '2021-03-04 18:50:44', '2021-03-04 18:50:44'),
(5, 'Cardboard', 1, 1, '2021-03-04 18:50:56', '2021-03-04 18:50:56'),
(6, 'Paper', 1, 1, '2021-03-04 18:51:08', '2021-03-04 18:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `townCity` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `orderDeliverredCollected` int(5) NOT NULL COMMENT '1=Deliverred,2=Collected',
  `orderComments` varchar(255) NOT NULL,
  `orderQr` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `userId`, `name`, `email`, `phone`, `address`, `country`, `townCity`, `postcode`, `orderDeliverredCollected`, `orderComments`, `orderQr`, `status`, `created`, `updated`) VALUES
(1, 100101, 1, 'James Adamson', 'mradamson85@gmail.com', '1234567899', '', '', '', '', 2, '', 'order_number=100101_1614868571.png', '1', '2021-03-04 14:36:12', '0000-00-00 00:00:00'),
(2, 100102, 1, 'James Adamson', 'mradamson@gmail.com', '1234567899', '123 Black Street', 'antrim', 'Belfast', 'bt125gh', 1, 'order notes', '', '1', '2021-03-04 14:37:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordersproducts`
--

CREATE TABLE `ordersproducts` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersproducts`
--

INSERT INTO `ordersproducts` (`id`, `orderId`, `userId`, `productId`, `productQuantity`, `created`, `updated`) VALUES
(1, 1, 2, 6, 25, '2021-02-18 09:28:21', '0000-00-00 00:00:00'),
(2, 1, 2, 1, 1, '2021-02-18 09:28:21', '0000-00-00 00:00:00'),
(3, 2, 2, 6, 1, '2021-02-18 09:30:34', '0000-00-00 00:00:00'),
(4, 3, 2, 13, 2, '2021-02-18 13:48:00', '0000-00-00 00:00:00'),
(5, 3, 2, 1, 1, '2021-02-18 13:48:00', '0000-00-00 00:00:00'),
(6, 4, 2, 13, 1, '2021-02-18 13:50:50', '0000-00-00 00:00:00'),
(7, 5, 1, 14, 1, '2021-02-18 14:01:59', '0000-00-00 00:00:00'),
(10, 7, 2, 14, 1, '2021-02-19 08:00:25', '0000-00-00 00:00:00'),
(11, 7, 2, 13, 1, '2021-02-19 08:00:25', '0000-00-00 00:00:00'),
(12, 8, 2, 6, 1, '2021-02-19 08:05:06', '0000-00-00 00:00:00'),
(13, 9, 1, 13, 1, '2021-02-19 11:58:27', '0000-00-00 00:00:00'),
(14, 10, 4, 36, 1, '2021-02-24 11:28:53', '0000-00-00 00:00:00'),
(15, 10, 4, 35, 1, '2021-02-24 11:28:53', '0000-00-00 00:00:00'),
(16, 10, 4, 34, 3, '2021-02-24 11:28:53', '0000-00-00 00:00:00'),
(17, 11, 2, 36, 1, '2021-02-26 09:43:26', '0000-00-00 00:00:00'),
(18, 12, 2, 32, 1, '2021-02-26 10:22:35', '0000-00-00 00:00:00'),
(19, 12, 2, 34, 1, '2021-02-26 10:22:35', '0000-00-00 00:00:00'),
(20, 13, 2, 33, 1, '2021-02-26 10:24:42', '0000-00-00 00:00:00'),
(21, 13, 2, 28, 1, '2021-02-26 10:24:42', '0000-00-00 00:00:00'),
(22, 14, 2, 32, 1, '2021-02-26 11:37:08', '0000-00-00 00:00:00'),
(23, 15, 5, 1, 3, '2021-03-02 14:26:46', '0000-00-00 00:00:00'),
(24, 15, 5, 13, 1, '2021-03-02 14:26:46', '0000-00-00 00:00:00'),
(25, 16, 4, 37, 1, '2021-03-02 14:40:51', '0000-00-00 00:00:00'),
(26, 17, 2, 32, 1, '2021-03-03 07:22:26', '0000-00-00 00:00:00'),
(27, 17, 2, 37, 1, '2021-03-03 07:22:26', '0000-00-00 00:00:00'),
(28, 18, 1, 36, 1, '2021-03-03 07:22:37', '0000-00-00 00:00:00'),
(29, 18, 1, 37, 1, '2021-03-03 07:22:37', '0000-00-00 00:00:00'),
(30, 19, 4, 37, 1, '2021-03-03 14:46:15', '0000-00-00 00:00:00'),
(31, 1, 1, 7, 1, '2021-03-04 14:36:11', '0000-00-00 00:00:00'),
(32, 2, 1, 7, 1, '2021-03-04 14:37:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `productId`, `image`, `addDate`) VALUES
(3, 1, 'images (4).jpg', '2021-03-04 18:53:10'),
(4, 2, 'download (1).jpg', '2021-03-04 18:55:36'),
(5, 2, 'download (2).jpg', '2021-03-04 18:55:36'),
(6, 3, 'cardboard-boxes-on-white-PUHY25N.jpg', '2021-03-04 19:37:51'),
(8, 5, 'empty-glass-bottles-PS4VUJW.jpg', '2021-03-04 19:39:31'),
(12, 4, '61ac04f7-b17d-454e-985f-c449792f54a4.jpg', '2021-03-04 20:00:53'),
(13, 7, '9a2b3858-5dd9-419f-9b53-7c8839a6434e.jpg', '2021-03-04 20:02:05'),
(15, 6, 'canned-food-in-metal-cans-G6VQW49.jpg', '2021-03-04 20:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE `productmaster` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `descriptionLong` text NOT NULL,
  `status` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL DEFAULT '1',
  `addDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`id`, `name`, `categoryId`, `quantity`, `description`, `descriptionLong`, `status`, `addedBy`, `addDate`, `modifyDate`) VALUES
(1, 'Plastic Bottles', 1, '50', 'plastic bottles, cup. concept of recycling plastic, plastic waste', '', 1, 1, '2021-03-04 19:02:19', '2021-03-04 19:02:19'),
(2, 'cup & Plate', 1, '43', 'okk', 'iujhygtfrdw', 1, 1, '2021-03-04 19:29:11', '2021-03-04 19:29:11'),
(3, 'Cardboard Boxes', 5, '50', '', '', 1, 1, '2021-03-04 19:37:51', '2021-03-04 19:37:51'),
(4, 'Paper', 6, '100', 'Flat lay of paper wastes', '', 1, 1, '2021-03-04 20:00:53', '2021-03-04 20:00:53'),
(5, 'Glass bottles', 4, '20', '', '', 1, 1, '2021-03-04 19:39:31', '2021-03-04 19:39:31'),
(6, 'Metal Cans', 3, '20', '', '', 1, 1, '2021-03-04 20:05:17', '2021-03-04 20:05:17'),
(7, 'Plastic Bottle and cups set', 1, '19', '', '', 1, 1, '2021-03-04 20:02:05', '2021-03-04 20:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `recyclingCenterName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `recyclingCenterName`, `address`, `status`, `created`, `updated`) VALUES
(1, 'Ormeau Road Recycling Centre', ' 6 Park Rd, Belfast BT7 2FX, United Kingdom', '', '2021-02-26 11:36:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `sessionEventName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `maxnoPeopleInSession` varchar(255) NOT NULL,
  `recyclingCenterName` varchar(255) NOT NULL,
  `recyclingCenterAddress` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `addDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`id`, `name`, `email`, `phone`, `password`, `status`, `addDate`, `modifyDate`) VALUES
(1, 'James Adamson', 'mradamson85@gmail.com', '1234567899', '25d55ad283aa400af464c76d713c07ad', 1, '2021-03-04 18:17:54', '2021-03-04 18:17:54'),
(2, 'Rukmini', 'rukku@gmail.com', '9632587412', '25d55ad283aa400af464c76d713c07ad', 1, '2021-03-04 18:50:36', '2021-03-04 18:50:36'),
(3, 'sdxfcvb', 'rukku22@gmail.com', '999', '25d55ad283aa400af464c76d713c07ad', 1, '2021-03-04 20:19:50', '2021-03-04 20:19:50'),
(4, 'Rukmini', 'rukku722@gmail.com', '666', '25d55ad283aa400af464c76d713c07ad', 1, '2021-03-04 20:22:12', '2021-03-04 20:22:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingmaster`
--
ALTER TABLE `bookingmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productmaster`
--
ALTER TABLE `productmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookingmaster`
--
ALTER TABLE `bookingmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productmaster`
--
ALTER TABLE `productmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
