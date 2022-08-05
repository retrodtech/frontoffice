-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 04:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `banktypemethod`
--

CREATE TABLE `banktypemethod` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addBy` varchar(250) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banktypemethod`
--

INSERT INTO `banktypemethod` (`id`, `pid`, `name`, `status`, `addBy`, `addOn`) VALUES
(1, 0, 'Cheque', 1, '1', '2022-06-24 00:50:15'),
(2, 0, 'Credit card', 1, '1', '2022-06-24 00:50:59'),
(3, 0, 'Debit card', 1, '1', '2022-06-24 00:50:59'),
(4, 0, 'NEFT/RTGS', 1, '1', '2022-06-24 00:51:22'),
(5, 0, 'UPI', 1, '1', '2022-06-24 00:51:49'),
(6, 0, 'Cash', 1, '1', '2022-07-07 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `bookinId` varchar(250) NOT NULL,
  `reciptNo` varchar(8) NOT NULL,
  `userPay` float DEFAULT 0,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `nroom` int(11) NOT NULL,
  `couponCode` varchar(250) DEFAULT NULL,
  `pickUp` float DEFAULT NULL,
  `payment_status` varchar(250) DEFAULT NULL,
  `payment_id` varchar(250) DEFAULT NULL,
  `bookingSource` int(11) NOT NULL,
  `bussinessSource` int(11) NOT NULL,
  `voucherNumber` varchar(250) DEFAULT NULL,
  `comPlanId` int(11) DEFAULT NULL,
  `comValue` float DEFAULT NULL,
  `coompanyId` int(11) DEFAULT NULL,
  `paymethodId` int(11) DEFAULT NULL,
  `paytypeId` int(11) DEFAULT NULL,
  `addBy` int(11) DEFAULT NULL,
  `add_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `deleteRec` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `roomDId` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `gstPer` int(11) DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `checkinstatus` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookingsource`
--

CREATE TABLE `bookingsource` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `img` varchar(250) NOT NULL,
  `addBy` varchar(150) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingsource`
--

INSERT INTO `bookingsource` (`id`, `name`, `status`, `img`, `addBy`, `addOn`) VALUES
(1, 'OTA', 1, 'source_pms.png', '0', '2022-06-07 20:04:27'),
(2, 'Booking Engine', 1, 'diretBooking.png', '0', '2022-06-07 20:04:27'),
(3, 'Travel Agent', 1, '', '0', '2022-06-07 20:05:05'),
(4, 'Company', 1, '', '0', '2022-06-07 20:05:05'),
(5, 'Direct', 1, '', '0', '2022-06-07 20:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `cashiering`
--

CREATE TABLE `cashiering` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `bookingSource` varchar(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contactPerson` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addBy` int(11) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashiering`
--

INSERT INTO `cashiering` (`id`, `hotelId`, `bookingSource`, `name`, `contactPerson`, `phone`, `email`, `type`, `status`, `addBy`, `addOn`) VALUES
(1, 0, '1,2', 'Make my trip', '', '', '', 'agent ', 1, 0, '2022-06-06 19:33:23'),
(2, 0, '1,3', 'Airbnd', '', '', '', 'agent ', 1, 0, '2022-06-06 19:33:23'),
(3, 0, '1,2', 'Goibibo', '', '', '', 'agent ', 1, 0, '2022-06-06 19:48:06'),
(4, 0, '1,3', 'Happyeasygo', '', '', '', 'agent ', 1, 0, '2022-06-06 19:48:06'),
(5, 0, '1,2', 'Agoda', '', '', '', 'agent ', 1, 0, '2022-06-06 19:48:36'),
(6, 0, '1,2', 'BANK OF INDIA', '', '', '', 'company', 1, 0, '2022-06-06 20:00:05'),
(7, 0, '1', 'BIJAY KRUSHNA BRAMHA', '', '', '', 'company', 1, 0, '2022-06-06 20:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `check_in_status`
--

CREATE TABLE `check_in_status` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `color` varchar(250) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_in_status`
--

INSERT INTO `check_in_status` (`id`, `name`, `color`, `addOn`) VALUES
(1, 'Reservation', '7928ca', '2022-07-05 02:08:26'),
(2, 'Check In', '008000', '2022-07-05 02:08:26'),
(3, 'Check Out', 'ff8100', '2022-07-05 02:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL,
  `roomnum` int(11) NOT NULL,
  `owner` int(11) NOT NULL DEFAULT 0,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `comGst` varchar(250) DEFAULT NULL,
  `country` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guestidproof`
--

CREATE TABLE `guestidproof` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestidproof`
--

INSERT INTO `guestidproof` (`id`, `name`, `status`, `addOn`) VALUES
(1, 'Aadhar card', 1, '2022-06-07 02:08:23'),
(2, 'Driving License', 1, '2022-06-07 02:08:23'),
(3, 'Passport', 1, '2022-06-07 02:09:04'),
(4, 'Voter ID', 1, '2022-06-07 02:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `guest_review`
--

CREATE TABLE `guest_review` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `admin` int(11) NOT NULL DEFAULT 0,
  `guestId` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `msg` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleteRec` int(11) NOT NULL DEFAULT 1,
  `addOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_review`
--

INSERT INTO `guest_review` (`id`, `hotelId`, `pid`, `admin`, `guestId`, `name`, `email`, `msg`, `status`, `deleteRec`, `addOn`) VALUES
(1, 0, 0, 0, NULL, 'Avinab Giri', 'avinabgiri9439@gmail.com', 'for test', 1, 1, '2022-07-06 02:32:38'),
(2, 0, 1, 0, NULL, 'avinab', 'avinabgiri@!gmail.com', 'For replay comment test', 1, 1, '2022-07-06 02:36:54'),
(3, 0, 1, 0, 1, NULL, NULL, 'Test for gest id', 1, 1, '2022-07-06 06:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hCode` varchar(8) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `website` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `commission` int(11) NOT NULL,
  `paymentGetway` varchar(50) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `webBilder` int(11) NOT NULL,
  `bookingEngine` int(11) NOT NULL,
  `pms` int(11) NOT NULL,
  `beLink` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addBy` text NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `hCode`, `name`, `email`, `phone`, `website`, `logo`, `commission`, `paymentGetway`, `userId`, `password`, `webBilder`, `bookingEngine`, `pms`, `beLink`, `status`, `addBy`, `addOn`) VALUES
(6, 'de78', 'Jamindars palace', 'reservation@jamindarspalace.com', '12345678902', 'jamindarspalace.com', 'Jamindars_palace_663.png', 1, 'hotel', 'reservation@jamindarspalace.com', 'Pass@2022', 1, 1, 0, 'https://jamindars.retrox.in', 1, '1_03-05-2022,1_03-06-2022', '2022-06-03 09:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_detail_id` int(11) DEFAULT NULL,
  `add_date` date NOT NULL,
  `room` int(11) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `price2` float NOT NULL DEFAULT 0,
  `eAdult` float NOT NULL,
  `eChild` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservationtype`
--

CREATE TABLE `reservationtype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservationtype`
--

INSERT INTO `reservationtype` (`id`, `name`, `addOn`) VALUES
(1, 'Confirm Booking', '2022-06-06 21:51:27'),
(2, 'Unconfirmed Booking Inquiry', '2022-06-06 21:51:27'),
(3, 'Online Failed Booking', '2022-06-06 21:51:49'),
(4, 'Hold Confirm Booking', '2022-06-06 21:51:49'),
(5, 'Hold Unconfirm Booking', '2022-06-06 21:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `header` varchar(250) NOT NULL,
  `sName` varchar(150) NOT NULL,
  `bedtype` varchar(250) NOT NULL,
  `totalroom` int(11) NOT NULL,
  `roomcapacity` int(11) NOT NULL,
  `description` text NOT NULL,
  `noAdult` int(11) NOT NULL,
  `noChild` int(11) NOT NULL,
  `add_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `mrp` float NOT NULL,
  `roomArea` varchar(150) DEFAULT NULL,
  `noBed` varchar(150) DEFAULT NULL,
  `noBathroom` varchar(150) DEFAULT NULL,
  `faceId` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `booking` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `hotelId`, `slug`, `header`, `sName`, `bedtype`, `totalroom`, `roomcapacity`, `description`, `noAdult`, `noChild`, `add_on`, `status`, `mrp`, `roomArea`, `noBed`, `noBathroom`, `faceId`, `view`, `booking`) VALUES
(1, 0, 'standard-room', 'Standard Room', 'STD', 'king', 0, 3, '', 2, 0, '2022-05-24 12:17:14', 1, 6000, NULL, '1', '1', 0, 0, 0),
(2, 0, 'deluxe-ground-floor', 'Deluxe Ground Floor', 'DGF', 'king', 0, 3, '', 2, 0, '2022-05-24 12:20:56', 1, 6500, NULL, '1', '1', 1, 0, 0),
(3, 0, 'deluxe-upper-floor', 'Deluxe Upper Floor', 'DUF', 'King', 0, 3, '', 2, 0, '2022-05-24 12:28:50', 1, 7000, NULL, '1', '1', 1, 0, 0),
(4, 0, 'super-deluxe-room', 'Super Deluxe Room', 'SUD', 'king', 0, 3, '', 2, 0, '2022-05-24 12:56:48', 1, 8000, NULL, '1', '1', 1, 0, 0),
(5, 0, 'suite-room', 'Suite Room', 'SUT', 'king', 0, 3, '', 3, 0, '2022-05-24 01:01:38', 1, 8500, NULL, '2', '1', 0, 0, 0),
(6, 0, 'royal-suite', 'Royal Suite', 'ROS', 'king', 0, 4, '', 4, 0, '2022-05-24 01:05:25', 1, 9000, NULL, '2', '1', 0, 0, 0),
(7, 0, 'family-suite', 'Family Suite', 'FMS', 'king', 0, 7, '', 6, 0, '2022-05-24 01:07:49', 1, 10000, NULL, '3', '1', 0, 0, 0),
(8, 0, 'jamindars-suite', 'Jamindars Suite', 'JMS', 'king', 0, 5, '', 2, 0, '2022-05-24 01:10:07', 1, 11000, NULL, '3', '1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomnumber`
--

CREATE TABLE `roomnumber` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addBy` int(11) NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp(),
  `deleteRec` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomnumber`
--

INSERT INTO `roomnumber` (`id`, `hotelId`, `roomNo`, `roomId`, `status`, `addBy`, `addOn`, `deleteRec`) VALUES
(1, 0, 101, 1, 1, 1, '2022-06-17 23:23:48', 1),
(2, 0, 102, 1, 1, 1, '2022-06-17 23:24:19', 1),
(3, 0, 103, 1, 1, 1, '2022-06-17 23:23:48', 1),
(4, 0, 104, 1, 1, 1, '2022-06-17 23:24:19', 1),
(5, 0, 201, 2, 1, 1, '2022-06-17 23:24:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomratetype`
--

CREATE TABLE `roomratetype` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `singlePrice` float NOT NULL,
  `doublePrice` float NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `extra_adult` float NOT NULL,
  `extra_child` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomratetype`
--

INSERT INTO `roomratetype` (`id`, `room_id`, `title`, `singlePrice`, `doublePrice`, `price`, `extra_adult`, `extra_child`, `status`) VALUES
(1, 1, 'Room With Breakfast', 5600, 5600, 0, 1000, 1000, 1),
(2, 2, 'Room With Breakfast', 6100, 0, 0, 1000, 1000, 1),
(3, 3, 'Room With Breakfast', 6600, 6600, 0, 1000, 1000, 1),
(4, 4, 'Room With Breakfast', 7490, 0, 0, 1000, 1000, 1),
(5, 5, 'Room With Breakfast', 7900, 0, 0, 1000, 1000, 1),
(6, 6, 'Room With Breakfast', 8700, 0, 0, 1000, 1000, 1),
(7, 7, 'Room With Breakfast', 9500, 0, 0, 1000, 1000, 1),
(8, 8, 'Room With Breakfast', 10300, 0, 0, 1000, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

CREATE TABLE `room_amenities` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `amenitie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_amenities`
--

INSERT INTO `room_amenities` (`id`, `room_id`, `amenitie_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 13),
(6, 1, 14),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 13),
(14, 3, 2),
(15, 3, 3),
(16, 3, 4),
(17, 3, 5),
(18, 3, 13),
(19, 3, 14),
(20, 4, 2),
(21, 4, 3),
(22, 4, 4),
(23, 4, 5),
(24, 4, 13),
(25, 4, 14),
(26, 5, 2),
(27, 5, 3),
(28, 5, 4),
(29, 5, 5),
(30, 5, 13),
(31, 5, 14),
(32, 6, 2),
(33, 6, 3),
(34, 6, 4),
(35, 6, 5),
(36, 6, 13),
(37, 6, 14),
(38, 7, 2),
(39, 7, 3),
(40, 7, 4),
(41, 7, 5),
(42, 7, 13),
(43, 7, 14),
(44, 8, 2),
(45, 8, 3),
(46, 8, 4),
(47, 8, 5),
(48, 8, 13),
(49, 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `room_img`
--

CREATE TABLE `room_img` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_img`
--

INSERT INTO `room_img` (`id`, `room_id`, `image`) VALUES
(15, 5, '464614.jpg'),
(16, 6, '536387.jpg'),
(17, 7, '844004.jpg'),
(18, 8, '522082.jpg'),
(19, 1, '494158.jpeg'),
(20, 1, '528254.jpeg'),
(21, 1, '769596.jpeg'),
(22, 1, '624579.jpeg'),
(24, 2, '319274.jpeg'),
(25, 2, '412388.jpeg'),
(26, 2, '910266.jpeg'),
(27, 3, '585052.jpg'),
(28, 3, '345592.jpg'),
(29, 3, '460995.jpg'),
(30, 3, '201718.jpg'),
(31, 4, '809171.jpg'),
(32, 4, '708928.jpg'),
(33, 8, '209014.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `username`, `password`, `designation`, `image`, `status`, `addOn`) VALUES
(1, 'Avinab Giri', 'avinab', 'Avinab121', 'Head Of Technology', 'avi.jpg', 1, '2022-06-01 13:25:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banktypemethod`
--
ALTER TABLE `banktypemethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingsource`
--
ALTER TABLE `bookingsource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashiering`
--
ALTER TABLE `cashiering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_in_status`
--
ALTER TABLE `check_in_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guestidproof`
--
ALTER TABLE `guestidproof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_review`
--
ALTER TABLE `guest_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservationtype`
--
ALTER TABLE `reservationtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomnumber`
--
ALTER TABLE `roomnumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banktypemethod`
--
ALTER TABLE `banktypemethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookingsource`
--
ALTER TABLE `bookingsource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cashiering`
--
ALTER TABLE `cashiering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `check_in_status`
--
ALTER TABLE `check_in_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestidproof`
--
ALTER TABLE `guestidproof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guest_review`
--
ALTER TABLE `guest_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservationtype`
--
ALTER TABLE `reservationtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomnumber`
--
ALTER TABLE `roomnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
