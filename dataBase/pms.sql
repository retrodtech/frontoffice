-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 10:57 PM
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
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `hotelId`, `title`, `add_on`) VALUES
(15, 1, 'Temperature check', '0000-00-00 00:00:00'),
(16, 1, 'Bath Kit', '0000-00-00 00:00:00'),
(17, 1, 'Sanitizers', '0000-00-00 00:00:00'),
(19, 1, 'Mask', '0000-00-00 00:00:00'),
(20, 1, 'Pool', '0000-00-00 00:00:00'),
(22, 0, 'Housekeeping', '2022-01-06 09:03:49'),
(23, 0, 'Hangers', '2022-01-06 09:03:49'),
(24, 0, 'Hot water', '2022-01-06 09:03:49'),
(25, 0, 'Bath Kit', '2022-01-06 09:03:49'),
(26, 0, 'Air conditioning', '0000-00-00 00:00:00'),
(27, 0, 'Storage space', '0000-00-00 00:00:00'),
(28, 0, 'Temperature check', '0000-00-00 00:00:00'),
(29, 0, 'Bath Kit', '0000-00-00 00:00:00'),
(30, 0, 'Sanitizers', '0000-00-00 00:00:00'),
(31, 0, 'Mask', '0000-00-00 00:00:00'),
(32, 0, 'Pool', '0000-00-00 00:00:00'),
(33, 0, 'Kit', '2022-08-24 06:39:41'),
(49, 1, 'Kit', '2022-08-24 08:00:21'),
(50, 2, 'Kit', '2022-08-24 08:05:15');

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
  `reciptNo` varchar(8) DEFAULT NULL,
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
  `addBy` text DEFAULT NULL,
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
-- Table structure for table `counter_table`
--

CREATE TABLE `counter_table` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `visiter_ip` varchar(250) NOT NULL,
  `visiter_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter_table`
--

INSERT INTO `counter_table` (`id`, `hotelId`, `visiter_ip`, `visiter_date`) VALUES
(1, 0, '::1', '2022-07-29 19:51:11'),
(2, 0, '127.0.0.1', '2022-07-29 21:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `couponcode`
--

CREATE TABLE `couponcode` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `min_value` float NOT NULL,
  `coupon_value` float NOT NULL,
  `expire_on` date NOT NULL,
  `addBy` text NOT NULL,
  `add_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couponcode`
--

INSERT INTO `couponcode` (`id`, `hotelId`, `coupon_code`, `coupon_type`, `min_value`, `coupon_value`, `expire_on`, `addBy`, `add_on`, `status`) VALUES
(1, 1, 'JPLUXURY10', 'P', 0, 10, '2022-08-31', '', '2022-03-11 22:21:16', 1),
(3, 1, 'JPLUXURY20', 'P', 0, 20, '2022-08-31', '', '2022-03-20 04:22:22', 0),
(4, 1, 'JPLUXURY25', 'P', 0, 25, '2022-08-31', '', '2022-03-21 02:47:29', 0),
(5, 1, 'JPLUXURY15', 'P', 0, 15, '2022-12-31', '', '2022-03-22 07:16:54', 0),
(6, 1, 'JPLUXURY-15', 'P', 0, 15, '2022-08-31', '', '2022-04-22 03:35:45', 1),
(7, 1, 'JPLUXURY(20)', 'P', 0, 20, '2023-02-28', '', '2022-04-22 03:36:34', 1),
(8, 1, 'JPLUXURY@25', 'P', 0, 25, '2023-10-31', '', '2022-04-22 03:37:19', 1),
(9, 1, 'JPLUXURY#22', 'P', 0, 22, '2023-10-28', '', '2022-05-03 03:47:42', 1),
(10, 1, 'JPLUXURY_25', 'P', 0, 25, '2022-09-04', '', '2022-05-03 05:59:26', 0),
(11, 1, 'JPLUXURY*25	', 'P', 0, 25, '2022-05-10', '', '2022-05-03 05:59:37', 0),
(12, 1, 'JPLUXURYA30', 'P', 0, 30, '2023-06-30', '', '2022-05-07 07:00:36', 1),
(13, 1, 'JPLUXURY&24', 'P', 0, 24, '2022-08-27', '', '2022-05-12 01:54:21', 0),
(14, 1, 'JPLUXURYA&28', 'P', 0, 28, '2022-10-19', '', '2022-05-22 06:41:19', 0),
(15, 1, 'JPLUXURY28', 'P', 0, 28, '2023-10-07', '', '2022-07-07 04:26:34', 0),
(16, 1, 'JPLUXURY-32', 'P', 0, 32, '2023-12-17', '', '2022-07-17 00:21:43', 0),
(17, 2, 'ASIANSUM50', 'P', 0, 20, '2022-08-25', '', '2022-08-24 14:50:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facing`
--

CREATE TABLE `facing` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `img` varchar(150) NOT NULL,
  `addOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facing`
--

INSERT INTO `facing` (`id`, `title`, `img`, `addOn`) VALUES
(1, 'See Facing', 'seeFaching.png', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `addBy` text NOT NULL,
  `add_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `hotelId`, `text`, `img`, `addBy`, `add_on`) VALUES
(2, 1, 'Jamindar Palace	2', 'gallery2.jpg', '', '2022-02-03 18:19:17'),
(3, 1, 'Jamindar Palace	', 'gallery3.jpg', '', '2022-02-03 18:19:17'),
(5, 1, 'Jamindar Palace	', 'gallery5.jpg', '', '2022-02-03 18:19:17'),
(6, 1, 'Jamindar Palace	', 'gallery6.jpg', '', '2022-02-03 18:19:17'),
(8, 1, 'JP', 'gallery8.jpg', '', '2022-02-03 18:19:17'),
(9, 1, 'Jamindar Palace	', 'gallery9.jpg', '', '2022-02-03 18:19:17'),
(10, 1, 'JP', 'gallery10.jpg', '', '2022-02-03 18:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL,
  `roomnum` int(11) NOT NULL,
  `owner` varchar(11) NOT NULL DEFAULT '0',
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `comGst` varchar(250) DEFAULT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `kyc_file` varchar(250) DEFAULT NULL,
  `kyc_number` varchar(250) DEFAULT NULL,
  `kyc_type` int(11) DEFAULT NULL,
  `addBy` text DEFAULT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
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
  `addBy` text NOT NULL,
  `addOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `herosection`
--

CREATE TABLE `herosection` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subTitle` varchar(250) NOT NULL,
  `addBy` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `herosection`
--

INSERT INTO `herosection` (`id`, `hotelId`, `img`, `title`, `subTitle`, `addBy`, `status`) VALUES
(6, 1, '650762.jpg', 'In Puri<br /> Best Hotel Ever', 'PURI\'S MOST BEAUTIFUL RETREAT', '', 1),
(16, 1, '650762.jpg', 'Amazing interior<br />to stay comfortable. ', 'Beautiful, comfortable rooms', '', 1),
(17, 1, '650762.jpg', 'Amazing<br />Interior View.', 'EXPLORE NEW CONCEPT WORLDS', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hCode` varchar(8) NOT NULL,
  `slug` varchar(250) NOT NULL,
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

INSERT INTO `hotel` (`id`, `hCode`, `slug`, `name`, `email`, `phone`, `website`, `logo`, `commission`, `paymentGetway`, `userId`, `password`, `webBilder`, `bookingEngine`, `pms`, `beLink`, `status`, `addBy`, `addOn`) VALUES
(1, '1e055', 'jamindars-palace', 'Jamindars palace', 'reservation@jamindarspalace.com', '12345678902', 'jamindarspalace.com', 'Jamindars_palace_111.png', 12, 'hotel', 'jamindars', '123456', 1, 1, 1, '', 1, '1_17-08-2022', '2022-08-17 19:51:25'),
(2, 'ce068', 'jamindars-palace2', 'Jamindars palace2', 'reservation@jamindarspalace.com2', '1234567890', 'jamindarspalace.com2', 'Jamindars_palace2_552.png', 12, 'hotel', 'jamindars2', '123456', 1, 1, 1, '', 1, '1_18-08-2022', '2022-08-18 19:11:43');

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
  `addBy` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `hotelId`, `room_id`, `room_detail_id`, `add_date`, `room`, `price`, `price2`, `eAdult`, `eChild`, `addBy`, `status`) VALUES
(1, 0, 1, 1, '2022-08-27', 2, '100', 0, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live`
--

INSERT INTO `live` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `offersection`
--

CREATE TABLE `offersection` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(250) NOT NULL,
  `percentage` float NOT NULL,
  `addBy` text NOT NULL,
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offersection`
--

INSERT INTO `offersection` (`id`, `hotelId`, `title`, `price`, `img`, `percentage`, `addBy`, `code`) VALUES
(1, 1, 'Luxury Sea View Rooms Available ', 4990, 'offer_room.jpeg', 10, '', 'JPLUXURY10');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `car` int(11) NOT NULL,
  `duration` float NOT NULL,
  `description` text NOT NULL,
  `room` int(11) NOT NULL,
  `rdid` int(11) NOT NULL,
  `discount` float NOT NULL,
  `pickup` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `addBy` text NOT NULL,
  `addOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_policy`
--

CREATE TABLE `package_policy` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `addOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`, `addOn`) VALUES
(1, 'Success', '2022-08-26 06:26:35'),
(2, 'Failed', '2022-08-26 06:26:47'),
(3, 'Return', '2022-08-26 06:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `primaryphone` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `district` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `gst` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(250) NOT NULL,
  `url` varchar(550) NOT NULL,
  `checkIn` varchar(250) NOT NULL,
  `checkOut` varchar(250) NOT NULL,
  `addBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `hotelId`, `name`, `email`, `primaryphone`, `address`, `district`, `pincode`, `gst`, `description`, `logo`, `url`, `checkIn`, `checkOut`, `addBy`) VALUES
(1, 0, 'Jamindars Palace', 'reservation@jamindarspalace.com', '7682830917', 'BLUE FLAG BEACH, CHAKRATIRTHA ROAD, PURI', 'PURI', '752002', '21AABCH4042H1Z6', 'Jamindar Palace is one among the best luxury sea-view hotel in Puri and has stunning views of the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea-view hotel in Puri', 'logo.png', 'https://jamindarspalace.com', '10.00 AM', '08.00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `quickpay`
--

CREATE TABLE `quickpay` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `orderId` varchar(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `room` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `nOfRoom` int(11) NOT NULL DEFAULT 1,
  `roomPrice` float NOT NULL,
  `qickPayNote` text NOT NULL,
  `totalAmount` float NOT NULL DEFAULT 0,
  `amount` float NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `paymentId` varchar(250) DEFAULT NULL,
  `paymentStatus` varchar(250) NOT NULL,
  `addBy` text NOT NULL,
  `addOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `booking` int(11) NOT NULL DEFAULT 0,
  `addBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `hotelId`, `slug`, `header`, `sName`, `bedtype`, `totalroom`, `roomcapacity`, `description`, `noAdult`, `noChild`, `add_on`, `status`, `mrp`, `roomArea`, `noBed`, `noBathroom`, `faceId`, `view`, `booking`, `addBy`) VALUES
(1, 1, 'suite-room', 'Suite Room', '', 'king', 1, 3, '', 2, 0, '2022-08-24 08:32:51', 1, 3000, NULL, NULL, NULL, 0, 0, 0, '');

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
  `addBy` text NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp(),
  `deleteRec` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomnumber`
--

INSERT INTO `roomnumber` (`id`, `hotelId`, `roomNo`, `roomId`, `status`, `addBy`, `addOn`, `deleteRec`) VALUES
(1, 1, 101, 1, 1, '', '2022-08-26 11:15:16', 1),
(2, 1, 102, 1, 1, '', '2022-08-26 11:15:29', 1);

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
(1, 1, 'Room Only', 1300, 1500, 0, 1120, 1120, 1);

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
(1, 1, 15),
(2, 1, 16),
(3, 1, 17);

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
(0, 1, '145057.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `maxRoomCapacity` int(11) NOT NULL,
  `advancePay` float NOT NULL,
  `pckupDropPrice` float NOT NULL,
  `pckupDropCaption` text NOT NULL,
  `PartialPaymentPrice` float NOT NULL,
  `partialPaymentCaption` text NOT NULL,
  `pckupDropStatus` int(11) NOT NULL,
  `partialPaymentStatus` int(11) NOT NULL,
  `payByRoom` int(11) NOT NULL,
  `addBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `hotelId`, `maxRoomCapacity`, `advancePay`, `pckupDropPrice`, `pckupDropCaption`, `PartialPaymentPrice`, `partialPaymentCaption`, `pckupDropStatus`, `partialPaymentStatus`, `payByRoom`, `addBy`) VALUES
(1, 0, 6, 7499, 5000, '                   ', 50, '', 0, 1, 0, '');

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
(1, 'Avinab Giri', 'avinab', '12345', 'Head Of Technology', 'avi.jpg', 1, '2022-06-01 13:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `wb_basic`
--

CREATE TABLE `wb_basic` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `chartBoot` varchar(250) NOT NULL,
  `fb_ifrm` text NOT NULL,
  `wbAna` varchar(250) NOT NULL,
  `beAna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wb_basic`
--

INSERT INTO `wb_basic` (`id`, `hotelId`, `chartBoot`, `fb_ifrm`, `wbAna`, `beAna`) VALUES
(1, 1, '623426eaa34c2456412ba294/1fudrg1g6', '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fjamindarspalacepuriodisha&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId\" width=\"340\" height=\"500\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 'G-PP65MF6NZY', 'G-PP65MF6NZY');

-- --------------------------------------------------------

--
-- Table structure for table `wb_blog`
--

CREATE TABLE `wb_blog` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `addBy` text NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wb_blog`
--

INSERT INTO `wb_blog` (`id`, `hotelId`, `title`, `category`, `img`, `description`, `addBy`, `addOn`) VALUES
(7, 1, 'Side2 View', 'Outdoor', 'activity2.jpg', '', '', '2022-02-23 20:27:12'),
(8, 1, 'Front View', 'Outdoor', 'activity3.jpg', '', '', '2022-02-23 20:27:20'),
(13, 1, 'Jamindars Beach ', 'Hotel', '169156.jpg', 'Best Sea View Hotel At Puri.', '', '2022-03-16 04:53:02'),
(14, 1, 'Travel', 'Puri', '581175.jpg', 'A day in Puri is a day in paradise, and all around you there is a sense of beauty radiating from the water of the Bay of Bengal. A flock of Bengali tourists is always found somewhere around the corner, and youth is wasted on its soft beaches, drenched by the incoming waves. The story of Puri is a story of duality, of divinity, and dream. On one hand, you find Lord Jagannathâ€™s benevolence, while on the other there is the romance of the sea. A typical day in Puri is made of soul-stirring walks, and seeking the blessing of the lord; this is 24 hours in Odishaâ€™s most important sea town.', '', '2022-07-19 05:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `wb_feedback`
--

CREATE TABLE `wb_feedback` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `rating` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `addOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wb_feedback`
--

INSERT INTO `wb_feedback` (`id`, `hotelId`, `name`, `email`, `rating`, `img`, `description`, `addOn`) VALUES
(1, 1, 'Prajna', '', 5, 'testimonial_1.png', '\r\n                Reached with my family quite early owing to the train timings and the check-in was really smooth & well\r\n                before timing. Throughout our stay staff were polite, courteous, and helpful\r\n              \r\n              ', '2022-08-19 02:57:02'),
(2, 1, 'Jaidev Solanki', '', 5, 'testimonial_2.png', '\r\n                Jamindar\'s palace is very well located on the golden beach which is one of the blue flag certified beach\r\n                in India. One can directly access the magnificent beach from hotel.\r\n                The staff arranges the tickets to go to beach on request.\r\n              ', '2022-08-19 02:57:02'),
(3, 1, 'Siddhartha Barooah', '', 4, 'testimonial_3.png', '\r\n                The hotel is located in a very good location adjacent to Panthanivas on one side and Mayfair on the\r\n                other. The access to beach is through the Panthanivas side on payment of 20/- per head. Daily one pass\r\n                per guest is being issued by hotel.\r\n              ', '2022-08-19 02:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `wb_page`
--

CREATE TABLE `wb_page` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `pageName` varchar(250) NOT NULL,
  `bgImg` varchar(250) NOT NULL,
  `img1` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `subtitle` varchar(250) DEFAULT NULL,
  `srtDes` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rurl` varchar(250) DEFAULT NULL,
  `rurlBtn` varchar(250) DEFAULT NULL,
  `addBy` text DEFAULT NULL,
  `addOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wb_page`
--

INSERT INTO `wb_page` (`id`, `hotelId`, `pageName`, `bgImg`, `img1`, `img2`, `title`, `subtitle`, `srtDes`, `description`, `rurl`, `rurlBtn`, `addBy`, `addOn`) VALUES
(1, 1, 'about', '', 'about01.jpg', 'about02.jpg', 'Welcome To Jamindars Palace', 'WHAT WE CAN GIVE TO OUR GUESTS', 'Jamindar Palace is one among the best luxury sea view hotel in Puri and has stunning views of\n            the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea view hotel\n            in Puri,', '', '', '', '', '2022-08-18 18:30:00'),
(2, 1, 'trailer', '', 'trailer01.jpg', '', 'Best Sea View Rooms', '', '', '', '', '', '', '2022-08-18 18:30:00'),
(3, 1, 'client', '', NULL, NULL, 'What Client Thinks', 'OUR TESTIMONIALS', NULL, NULL, 'about', 'ABOUT US', NULL, '2022-08-18 18:30:00'),
(4, 1, 'facilities', 'hero4.jpg', NULL, NULL, 'Facilities', 'GET THE PREMIUM TREATMENT', 'Who are in extremely love with the eco-friendly system?', NULL, NULL, NULL, NULL, '2022-08-22 09:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `counter_table`
--
ALTER TABLE `counter_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couponcode`
--
ALTER TABLE `couponcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facing`
--
ALTER TABLE `facing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
-- Indexes for table `herosection`
--
ALTER TABLE `herosection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_inventory` (`room_id`);

--
-- Indexes for table `live`
--
ALTER TABLE `live`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offersection`
--
ALTER TABLE `offersection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_policy`
--
ALTER TABLE `package_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quickpay`
--
ALTER TABLE `quickpay`
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
-- Indexes for table `roomratetype`
--
ALTER TABLE `roomratetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_basic`
--
ALTER TABLE `wb_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_blog`
--
ALTER TABLE `wb_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_feedback`
--
ALTER TABLE `wb_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_page`
--
ALTER TABLE `wb_page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
-- AUTO_INCREMENT for table `counter_table`
--
ALTER TABLE `counter_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `couponcode`
--
ALTER TABLE `couponcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `facing`
--
ALTER TABLE `facing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `herosection`
--
ALTER TABLE `herosection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live`
--
ALTER TABLE `live`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offersection`
--
ALTER TABLE `offersection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_policy`
--
ALTER TABLE `package_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quickpay`
--
ALTER TABLE `quickpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservationtype`
--
ALTER TABLE `reservationtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roomnumber`
--
ALTER TABLE `roomnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roomratetype`
--
ALTER TABLE `roomratetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_amenities`
--
ALTER TABLE `room_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_basic`
--
ALTER TABLE `wb_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_blog`
--
ALTER TABLE `wb_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wb_feedback`
--
ALTER TABLE `wb_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wb_page`
--
ALTER TABLE `wb_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
