-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 08:29 AM
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
  `title` varchar(250) NOT NULL,
  `add_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `title`, `add_on`) VALUES
(2, 'Housekeeping', '2022-01-06 14:33:49'),
(3, 'Hangers', '2022-01-06 14:33:49'),
(4, 'Hot water', '2022-01-06 14:33:49'),
(5, 'Bath Kit', '2022-01-06 14:33:49'),
(13, 'Air conditioning', '0000-00-00 00:00:00'),
(14, 'Storage space', '0000-00-00 00:00:00'),
(15, 'Temperature check', '0000-00-00 00:00:00'),
(16, 'Bath Kit', '0000-00-00 00:00:00'),
(17, 'Sanitizers', '0000-00-00 00:00:00'),
(19, 'Mask', '0000-00-00 00:00:00'),
(20, 'Pool', '0000-00-00 00:00:00');

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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `hotelId`, `title`, `category`, `img`, `description`, `addOn`) VALUES
(7, 0, 'Side2 View', 'Outdoor', 'activity2.jpg', '', '2022-02-23 20:27:12'),
(8, 0, 'Front View', 'Outdoor', 'activity3.jpg', '', '2022-02-23 20:27:20'),
(13, 0, 'Jamindars Beach ', 'Hotel', '169156.jpg', 'Best Sea View Hotel At Puri.', '2022-03-16 04:53:02'),
(14, 0, 'Travel', 'Puri', '581175.jpg', 'A day in Puri is a day in paradise, and all around you there is a sense of beauty radiating from the water of the Bay of Bengal. A flock of Bengali tourists is always found somewhere around the corner, and youth is wasted on its soft beaches, drenched by the incoming waves. The story of Puri is a story of duality, of divinity, and dream. On one hand, you find Lord Jagannathâ€™s benevolence, while on the other there is the romance of the sea. A typical day in Puri is made of soul-stirring walks, and seeking the blessing of the lord; this is 24 hours in Odishaâ€™s most important sea town.', '2022-07-19 05:26:44');

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
  `addBy` int(11) DEFAULT NULL,
  `add_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `deleteRec` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `hotelId`, `bookinId`, `reciptNo`, `userPay`, `checkIn`, `checkOut`, `nroom`, `couponCode`, `pickUp`, `payment_status`, `payment_id`, `bookingSource`, `bussinessSource`, `voucherNumber`, `comPlanId`, `comValue`, `coompanyId`, `paymethodId`, `paytypeId`, `addBy`, `add_on`, `status`, `deleteRec`) VALUES
(1, 1, 'jamindars_8a274', '001', 10000, '2022-08-17', '2022-08-18', 0, 'ASIANSUM50', NULL, '1', NULL, 1, 1, NULL, NULL, NULL, NULL, 6, 0, NULL, '2022-08-08 10:24:48', 1, 1),
(2, 1, 'jamindars_cb8fd', '002', 5000, '2022-08-16', '2022-08-17', 0, 'ASIANSUM50', NULL, '1', NULL, 1, 1, NULL, NULL, NULL, NULL, 6, NULL, NULL, '2022-08-09 19:35:17', 1, 1),
(3, 1, 'jamindars_01dae3', NULL, 6832, '0000-00-00', '0000-00-00', 1, '', 0, 'pending', NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-09 07:50:19', 1, 1);

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

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`id`, `bid`, `roomId`, `roomDId`, `room_number`, `adult`, `child`, `gstPer`, `totalPrice`, `checkinstatus`) VALUES
(1, 1, 1, 1, 101, 2, 0, NULL, NULL, 2),
(2, 2, 1, 1, 102, 2, 0, NULL, NULL, 1),
(3, 3, 2, 2, 201, 2, 0, NULL, NULL, 1);

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
  `visiter_ip` varchar(250) NOT NULL,
  `visiter_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter_table`
--

INSERT INTO `counter_table` (`id`, `visiter_ip`, `visiter_date`) VALUES
(1, '::1', '2022-07-29 19:51:11'),
(2, '127.0.0.1', '2022-07-29 21:16:09');

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
  `add_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couponcode`
--

INSERT INTO `couponcode` (`id`, `hotelId`, `coupon_code`, `coupon_type`, `min_value`, `coupon_value`, `expire_on`, `add_on`, `status`) VALUES
(1, 0, 'JPLUXURY10', 'P', 0, 10, '2022-08-31', '2022-03-11 22:21:16', 1),
(3, 0, 'JPLUXURY20', 'P', 0, 20, '2022-08-31', '2022-03-20 04:22:22', 0),
(4, 0, 'JPLUXURY25', 'P', 0, 25, '2022-08-31', '2022-03-21 02:47:29', 0),
(5, 0, 'JPLUXURY15', 'P', 0, 15, '2022-12-31', '2022-03-22 07:16:54', 0),
(6, 0, 'JPLUXURY-15', 'P', 0, 15, '2022-08-31', '2022-04-22 03:35:45', 1),
(7, 0, 'JPLUXURY(20)', 'P', 0, 20, '2023-02-28', '2022-04-22 03:36:34', 1),
(8, 0, 'JPLUXURY@25', 'P', 0, 25, '2023-10-31', '2022-04-22 03:37:19', 1),
(9, 0, 'JPLUXURY#22', 'P', 0, 22, '2023-10-28', '2022-05-03 03:47:42', 1),
(10, 0, 'JPLUXURY_25', 'P', 0, 25, '2022-09-04', '2022-05-03 05:59:26', 0),
(11, 0, 'JPLUXURY*25	', 'P', 0, 25, '2022-05-10', '2022-05-03 05:59:37', 0),
(12, 0, 'JPLUXURYA30', 'P', 0, 30, '2023-06-30', '2022-05-07 07:00:36', 1),
(13, 0, 'JPLUXURY&24', 'P', 0, 24, '2022-08-27', '2022-05-12 01:54:21', 0),
(14, 0, 'JPLUXURYA&28', 'P', 0, 28, '2022-10-19', '2022-05-22 06:41:19', 0),
(15, 0, 'JPLUXURY28', 'P', 0, 28, '2023-10-07', '2022-07-07 04:26:34', 0),
(16, 0, 'JPLUXURY-32', 'P', 0, 32, '2023-12-17', '2022-07-17 00:21:43', 0);

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
  `text` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `add_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `text`, `img`, `add_on`) VALUES
(2, 'Jamindar Palace	2', 'gallery2.jpg', '2022-02-03 18:19:17'),
(3, 'Jamindar Palace	', 'gallery3.jpg', '2022-02-03 18:19:17'),
(5, 'Jamindar Palace	', 'gallery5.jpg', '2022-02-03 18:19:17'),
(6, 'Jamindar Palace	', 'gallery6.jpg', '2022-02-03 18:19:17'),
(8, 'JP', 'gallery8.jpg', '2022-02-03 18:19:17'),
(9, 'Jamindar Palace	', 'gallery9.jpg', '2022-02-03 18:19:17'),
(10, 'JP', 'gallery10.jpg', '2022-02-03 18:19:17');

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
  `addBy` int(11) DEFAULT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `hotelId`, `bookId`, `roomnum`, `owner`, `name`, `email`, `phone`, `gender`, `company_name`, `comGst`, `country`, `state`, `city`, `zip`, `image`, `kyc_file`, `kyc_number`, `kyc_type`, `addBy`, `addOn`) VALUES
(1, 1, 1, 101, '1', 'Avinab', '', '1234567890', NULL, NULL, NULL, '', '', '', 0, 'guest_127750.jpg', '', '', 0, 1, '2022-08-08 10:24:48'),
(2, 1, 2, 102, '1', 'Avinab', '', '', NULL, NULL, NULL, '', '', '', 0, 'guest_302517.png', 'guestP_152818.jpg', '', 0, 1, '2022-08-09 19:35:17'),
(3, 1, 3, 201, '1', 'avi giri', 'avi@gmail.com', '7978098671', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-09 19:50:19'),
(4, 1, 2, 102, '0', 'Avinab3', 'avinabgiri9439@gmail.com', '123', NULL, NULL, NULL, '', '', '', 0, 'guest_793607.png', 'guestP_521568.jpeg', '', 0, 1, '2022-08-16 16:45:17');

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
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `herosection`
--

INSERT INTO `herosection` (`id`, `hotelId`, `img`, `title`, `subTitle`, `status`) VALUES
(6, 0, '650762.jpg', 'fdgdf', '', 1);

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
(1, 'f2508', 'Jamindars palace', 'reservation@jamindarspalace.com2', '1234567890', 'jamindarspalace.com', 'Jamindars_palace_482.jpg', 12, 'hotel', 'jamindars', '12345', 0, 0, 1, '', 1, '1_27-07-2022', '2022-07-27 23:04:41');

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `hotelId`, `room_id`, `room_detail_id`, `add_date`, `room`, `price`, `price2`, `eAdult`, `eChild`, `status`) VALUES
(1, 0, 1, 1, '2022-05-25', 3, NULL, 0, 0, 0, 1),
(2, 0, 1, 1, '2022-05-26', 10, NULL, 6600, 0, 0, 1),
(3, 0, 1, 1, '2022-05-27', 8, '5600', 0, 0, 0, 1),
(4, 0, 1, 1, '2022-05-28', 2, '5600', 0, 0, 0, 1),
(5, 0, 1, 1, '2022-05-29', 0, '5600', 0, 0, 0, 1),
(6, 0, 1, 1, '2022-05-30', 6, NULL, 0, 0, 0, 1),
(7, 0, 1, 1, '2022-05-31', 1, NULL, 0, 0, 0, 1),
(8, 0, 1, 1, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(9, 0, 1, 1, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(10, 0, 1, 1, '2022-06-03', 1, NULL, 0, 0, 0, 1),
(11, 0, 2, 2, '2022-05-25', 5, NULL, 0, 0, 0, 1),
(12, 0, 2, 2, '2022-05-26', 3, NULL, 0, 0, 0, 1),
(13, 0, 2, 2, '2022-05-27', 4, NULL, 0, 0, 0, 1),
(14, 0, 2, 2, '2022-05-28', 4, NULL, 0, 0, 0, 1),
(15, 0, 2, 2, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(16, 0, 2, 2, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(17, 0, 2, 2, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(18, 0, 2, 2, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(19, 0, 2, 2, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(20, 0, 2, 2, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(21, 0, 3, 3, '2022-05-25', 2, NULL, 0, 0, 0, 1),
(22, 0, 3, 3, '2022-05-26', 4, NULL, 0, 0, 0, 1),
(23, 0, 3, 3, '2022-05-27', 2, NULL, 0, 0, 0, 1),
(24, 0, 3, 3, '2022-05-28', 1, NULL, 0, 0, 0, 1),
(25, 0, 3, 3, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(26, 0, 3, 3, '2022-05-30', 1, NULL, 0, 0, 0, 1),
(27, 0, 3, 3, '2022-05-31', 2, NULL, 0, 0, 0, 1),
(28, 0, 3, 3, '2022-06-01', 2, NULL, 0, 0, 0, 1),
(29, 0, 3, 3, '2022-06-02', 3, NULL, 0, 0, 0, 1),
(30, 0, 3, 3, '2022-06-03', 4, NULL, 0, 0, 0, 1),
(31, 0, 4, 4, '2022-05-25', 2, NULL, 0, 0, 0, 1),
(32, 0, 4, 4, '2022-05-26', 2, NULL, 0, 0, 0, 1),
(33, 0, 4, 4, '2022-05-27', 2, NULL, 0, 0, 0, 1),
(34, 0, 4, 4, '2022-05-28', 1, NULL, 0, 0, 0, 1),
(35, 0, 4, 4, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(36, 0, 4, 4, '2022-05-30', 4, NULL, 0, 0, 0, 1),
(37, 0, 4, 4, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(38, 0, 4, 4, '2022-05-21', 2, NULL, 0, 0, 0, 1),
(39, 0, 4, 4, '2022-05-22', 1, NULL, 0, 0, 0, 1),
(40, 0, 4, 4, '2022-05-23', 1, NULL, 0, 0, 0, 1),
(41, 0, 4, 4, '2022-05-24', 1, NULL, 0, 0, 0, 1),
(42, 0, 4, 4, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(43, 0, 4, 4, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(44, 0, 4, 4, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(45, 0, 5, 5, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(46, 0, 5, 5, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(47, 0, 5, 5, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(48, 0, 5, 5, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(49, 0, 5, 5, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(50, 0, 5, 5, '2022-05-30', 1, NULL, 0, 0, 0, 1),
(51, 0, 5, 5, '2022-05-31', 1, NULL, 0, 0, 0, 1),
(52, 0, 5, 5, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(53, 0, 5, 5, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(54, 0, 5, 5, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(55, 0, 6, 6, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(56, 0, 6, 6, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(57, 0, 6, 6, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(58, 0, 6, 6, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(59, 0, 6, 6, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(60, 0, 6, 6, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(61, 0, 6, 6, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(62, 0, 6, 6, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(63, 0, 6, 6, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(64, 0, 6, 6, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(65, 0, 7, 7, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(66, 0, 7, 7, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(67, 0, 7, 7, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(68, 0, 7, 7, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(69, 0, 7, 7, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(70, 0, 7, 7, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(71, 0, 7, 7, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(72, 0, 7, 7, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(73, 0, 7, 7, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(74, 0, 7, 7, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(75, 0, 8, 8, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(76, 0, 8, 8, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(77, 0, 8, 8, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(78, 0, 8, 8, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(79, 0, 8, 8, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(80, 0, 8, 8, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(81, 0, 8, 8, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(82, 0, 8, 8, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(83, 0, 8, 8, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(84, 0, 8, 8, '2022-06-03', 1, NULL, 0, 0, 0, 1),
(85, 0, 1, 1, '2022-06-04', 3, NULL, 0, 0, 0, 1),
(86, 0, 1, 1, '2022-06-05', 1, NULL, 0, 0, 0, 1),
(87, 0, 1, 1, '2022-06-06', 5, NULL, 0, 0, 0, 1),
(88, 0, 1, 1, '2022-06-07', 4, NULL, 0, 0, 0, 1),
(89, 0, 1, 1, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(90, 0, 1, 1, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(91, 0, 1, 1, '2022-06-10', 2, NULL, 0, 0, 0, 1),
(92, 0, 1, 1, '2022-06-11', 2, NULL, 0, 0, 0, 1),
(93, 0, 1, 1, '2022-06-12', 3, NULL, 0, 0, 0, 1),
(94, 0, 2, 2, '2022-06-04', 3, NULL, 0, 0, 0, 1),
(95, 0, 2, 2, '2022-06-05', 2, NULL, 0, 0, 0, 1),
(96, 0, 2, 2, '2022-06-06', 2, NULL, 0, 0, 0, 1),
(97, 0, 2, 2, '2022-06-07', 1, NULL, 0, 0, 0, 1),
(98, 0, 2, 2, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(99, 0, 2, 2, '2022-06-09', 2, NULL, 0, 0, 0, 1),
(100, 0, 2, 2, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(101, 0, 2, 2, '2022-06-11', 4, NULL, 0, 0, 0, 1),
(102, 0, 2, 2, '2022-06-12', 5, NULL, 0, 0, 0, 1),
(103, 0, 3, 3, '2022-06-04', 8, NULL, 0, 0, 0, 1),
(104, 0, 3, 3, '2022-06-05', 5, NULL, 0, 0, 0, 1),
(105, 0, 3, 3, '2022-06-06', 7, NULL, 0, 0, 0, 1),
(106, 0, 3, 3, '2022-06-07', 5, NULL, 0, 0, 0, 1),
(107, 0, 3, 3, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(108, 0, 3, 3, '2022-06-10', 5, NULL, 0, 0, 0, 1),
(109, 0, 3, 3, '2022-06-11', 7, NULL, 0, 0, 0, 1),
(110, 0, 3, 3, '2022-06-12', 8, NULL, 0, 0, 0, 1),
(111, 0, 4, 4, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(112, 0, 4, 4, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(113, 0, 4, 4, '2022-06-06', 1, NULL, 0, 0, 0, 1),
(114, 0, 4, 4, '2022-06-07', 3, NULL, 0, 0, 0, 1),
(115, 0, 4, 4, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(116, 0, 4, 4, '2022-06-09', 0, NULL, 0, 0, 0, 1),
(117, 0, 4, 4, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(118, 0, 4, 4, '2022-06-11', 4, NULL, 0, 0, 0, 1),
(119, 0, 4, 4, '2022-06-12', 4, NULL, 0, 0, 0, 1),
(120, 0, 1, 1, '2022-05-21', 7, NULL, 0, 0, 0, 1),
(121, 0, 1, 1, '2022-05-22', 7, NULL, 0, 0, 0, 1),
(122, 0, 1, 1, '2022-05-23', 7, NULL, 0, 0, 0, 1),
(123, 0, 5, 5, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(124, 0, 5, 5, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(125, 0, 5, 5, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(126, 0, 5, 5, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(127, 0, 5, 5, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(128, 0, 5, 5, '2022-06-07', 1, NULL, 0, 0, 0, 1),
(129, 0, 5, 5, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(130, 0, 5, 5, '2022-06-05', 2, NULL, 0, 0, 0, 1),
(131, 0, 5, 5, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(132, 0, 6, 6, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(133, 0, 6, 6, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(134, 0, 6, 6, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(135, 0, 6, 6, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(136, 0, 6, 6, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(137, 0, 6, 6, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(138, 0, 6, 6, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(139, 0, 6, 6, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(140, 0, 6, 6, '2022-06-12', 1, NULL, 0, 0, 0, 1),
(141, 0, 7, 7, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(142, 0, 7, 7, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(143, 0, 7, 7, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(144, 0, 7, 7, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(145, 0, 7, 7, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(146, 0, 7, 7, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(147, 0, 7, 7, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(148, 0, 7, 7, '2022-06-11', 1, NULL, 0, 0, 0, 1),
(149, 0, 7, 7, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(150, 0, 8, 8, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(151, 0, 8, 8, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(152, 0, 8, 8, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(153, 0, 8, 8, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(154, 0, 8, 8, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(155, 0, 8, 8, '2022-06-09', 0, NULL, 0, 0, 0, 1),
(156, 0, 8, 8, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(157, 0, 8, 8, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(158, 0, 8, 8, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(159, 0, 1, 1, '2022-06-13', 3, NULL, 0, 0, 0, 1),
(160, 0, 1, 1, '2022-06-14', 1, NULL, 0, 0, 0, 1),
(161, 0, 1, 1, '2022-06-15', 1, NULL, 0, 0, 0, 1),
(162, 0, 1, 1, '2022-06-16', 6, NULL, 0, 0, 0, 1),
(163, 0, 1, 1, '2022-06-17', 6, NULL, 0, 0, 0, 1),
(164, 0, 1, 1, '2022-06-18', 6, NULL, 0, 0, 0, 1),
(165, 0, 1, 1, '2022-06-19', 6, NULL, 0, 0, 0, 1),
(166, 0, 1, 1, '2022-06-20', 6, NULL, 0, 0, 0, 1),
(167, 0, 1, 1, '2022-06-21', 6, NULL, 0, 0, 0, 1),
(168, 0, 2, 2, '2022-06-13', 5, NULL, 0, 0, 0, 1),
(169, 0, 1, 1, '2022-05-17', 2, NULL, 0, 0, 0, 1),
(170, 0, 2, 2, '2022-06-14', 1, NULL, 0, 0, 0, 1),
(171, 0, 2, 2, '2022-06-15', 1, NULL, 0, 0, 0, 1),
(172, 0, 2, 2, '2022-06-16', 3, NULL, 0, 0, 0, 1),
(173, 0, 2, 2, '2022-06-17', 3, NULL, 0, 0, 0, 1),
(174, 0, 2, 2, '2022-06-18', 3, NULL, 0, 0, 0, 1),
(175, 0, 2, 2, '2022-06-19', 3, NULL, 0, 0, 0, 1),
(176, 0, 2, 2, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(177, 0, 2, 2, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(178, 0, 3, 3, '2022-06-13', 7, NULL, 0, 0, 0, 1),
(179, 0, 3, 3, '2022-06-14', 5, NULL, 0, 0, 0, 1),
(180, 0, 3, 3, '2022-06-15', 4, NULL, 0, 0, 0, 1),
(181, 0, 3, 3, '2022-06-16', 4, NULL, 0, 0, 0, 1),
(182, 0, 3, 3, '2022-06-17', 5, NULL, 0, 0, 0, 1),
(183, 0, 3, 3, '2022-06-18', 4, NULL, 0, 0, 0, 1),
(184, 0, 3, 3, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(185, 0, 3, 3, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(186, 0, 3, 3, '2022-06-21', 2, NULL, 0, 0, 0, 1),
(187, 0, 4, 4, '2022-06-14', 2, NULL, 0, 0, 0, 1),
(188, 0, 4, 4, '2022-06-13', 2, NULL, 0, 0, 0, 1),
(189, 0, 1, 1, '2022-05-24', 2, NULL, 0, 0, 0, 1),
(190, 0, 4, 4, '2022-06-15', 3, NULL, 0, 0, 0, 1),
(191, 0, 4, 4, '2022-06-16', 2, NULL, 0, 0, 0, 1),
(192, 0, 4, 4, '2022-06-17', 2, NULL, 0, 0, 0, 1),
(193, 0, 4, 4, '2022-06-18', 2, NULL, 0, 0, 0, 1),
(194, 0, 4, 4, '2022-06-19', 2, NULL, 0, 0, 0, 1),
(195, 0, 4, 4, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(196, 0, 4, 4, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(197, 0, 6, 6, '2022-06-13', 1, NULL, 0, 0, 0, 1),
(198, 0, 6, 6, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(199, 0, 6, 6, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(200, 0, 6, 6, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(201, 0, 6, 6, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(202, 0, 6, 6, '2022-06-18', 1, NULL, 0, 0, 0, 1),
(203, 0, 6, 6, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(204, 0, 6, 6, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(205, 0, 6, 6, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(206, 0, 7, 7, '2022-06-13', 0, NULL, 0, 0, 0, 1),
(207, 0, 7, 7, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(208, 0, 7, 7, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(209, 0, 7, 7, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(210, 0, 7, 7, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(211, 0, 7, 7, '2022-06-18', 0, NULL, 0, 0, 0, 1),
(212, 0, 7, 7, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(213, 0, 7, 7, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(214, 0, 7, 7, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(215, 0, 5, 5, '2022-06-13', 0, NULL, 0, 0, 0, 1),
(216, 0, 5, 5, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(217, 0, 5, 5, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(218, 0, 5, 5, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(219, 0, 5, 5, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(220, 0, 5, 5, '2022-06-18', 0, NULL, 0, 0, 0, 1),
(221, 0, 5, 5, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(222, 0, 5, 5, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(223, 0, 5, 5, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(224, 0, 1, 1, '2022-06-22', 6, NULL, 0, 0, 0, 1),
(225, 0, 1, 1, '2022-06-23', 6, NULL, 0, 0, 0, 1),
(226, 0, 1, 1, '2022-06-24', 2, NULL, 0, 0, 0, 1),
(227, 0, 1, 1, '2022-06-25', 2, NULL, 0, 0, 0, 1),
(228, 0, 1, 1, '2022-06-26', 2, NULL, 0, 0, 0, 1),
(229, 0, 1, 1, '2022-06-27', 4, NULL, 0, 0, 0, 1),
(230, 0, 1, 1, '2022-06-28', 4, NULL, 0, 0, 0, 1),
(231, 0, 1, 1, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(232, 0, 1, 1, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(233, 0, 2, 2, '2022-06-22', 3, NULL, 0, 0, 0, 1),
(234, 0, 2, 2, '2022-06-23', 3, NULL, 0, 0, 0, 1),
(235, 0, 2, 2, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(236, 0, 2, 2, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(237, 0, 2, 2, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(238, 0, 2, 2, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(239, 0, 2, 2, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(240, 0, 2, 2, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(241, 0, 2, 2, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(242, 0, 3, 3, '2022-06-22', 4, NULL, 0, 0, 0, 1),
(243, 0, 3, 3, '2022-06-23', 4, NULL, 0, 0, 0, 1),
(244, 0, 3, 3, '2022-06-24', 1, NULL, 0, 0, 0, 1),
(245, 0, 3, 3, '2022-06-25', 2, NULL, 0, 0, 0, 1),
(246, 0, 3, 3, '2022-06-26', 1, NULL, 0, 0, 0, 1),
(247, 0, 1, 1, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(248, 0, 1, 1, '2022-07-02', 1, NULL, 0, 0, 0, 1),
(249, 0, 1, 1, '2022-07-03', 2, NULL, 0, 0, 0, 1),
(250, 0, 1, 1, '2022-07-04', 2, NULL, 0, 0, 0, 1),
(251, 0, 1, 1, '2022-07-05', 2, NULL, 0, 0, 0, 1),
(252, 0, 3, 3, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(253, 0, 3, 3, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(254, 0, 3, 3, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(255, 0, 3, 3, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(256, 0, 1, 1, '2022-07-06', 2, NULL, 0, 0, 0, 1),
(257, 0, 1, 1, '2022-07-07', 2, NULL, 0, 0, 0, 1),
(258, 0, 1, 1, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(259, 0, 4, 4, '2022-06-22', 3, NULL, 0, 0, 0, 1),
(260, 0, 4, 4, '2022-06-23', 3, NULL, 0, 0, 0, 1),
(261, 0, 4, 4, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(262, 0, 4, 4, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(263, 0, 4, 4, '2022-06-26', 2, NULL, 0, 0, 0, 1),
(264, 0, 1, 1, '2022-07-09', 0, NULL, 0, 0, 0, 1),
(265, 0, 1, 1, '2022-07-10', 0, NULL, 0, 0, 0, 1),
(266, 0, 2, 2, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(267, 0, 4, 4, '2022-06-27', 3, NULL, 0, 0, 0, 1),
(268, 0, 4, 4, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(269, 0, 2, 2, '2022-07-02', 3, NULL, 0, 0, 0, 1),
(270, 0, 4, 4, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(271, 0, 4, 4, '2022-06-30', 5, NULL, 0, 0, 0, 1),
(272, 0, 2, 2, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(273, 0, 5, 5, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(274, 0, 5, 5, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(275, 0, 2, 2, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(276, 0, 5, 5, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(277, 0, 5, 5, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(278, 0, 2, 2, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(279, 0, 5, 5, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(280, 0, 5, 5, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(281, 0, 5, 5, '2022-06-28', 1, NULL, 0, 0, 0, 1),
(282, 0, 5, 5, '2022-06-29', 1, NULL, 0, 0, 0, 1),
(283, 0, 5, 5, '2022-06-30', 2, NULL, 0, 0, 0, 1),
(284, 0, 2, 2, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(285, 0, 2, 2, '2022-07-08', 3, NULL, 0, 0, 0, 1),
(286, 0, 2, 2, '2022-07-09', 0, NULL, 0, 0, 0, 1),
(287, 0, 2, 2, '2022-07-10', 0, NULL, 0, 0, 0, 1),
(288, 0, 3, 3, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(289, 0, 3, 3, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(290, 0, 6, 6, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(291, 0, 6, 6, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(292, 0, 6, 6, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(293, 0, 3, 3, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(294, 0, 6, 6, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(295, 0, 6, 6, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(296, 0, 6, 6, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(297, 0, 3, 3, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(298, 0, 6, 6, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(299, 0, 6, 6, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(300, 0, 6, 6, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(301, 0, 7, 7, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(302, 0, 7, 7, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(303, 0, 7, 7, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(304, 0, 7, 7, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(305, 0, 7, 7, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(306, 0, 7, 7, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(307, 0, 7, 7, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(308, 0, 7, 7, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(309, 0, 7, 7, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(310, 0, 8, 8, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(311, 0, 8, 8, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(312, 0, 8, 8, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(313, 0, 8, 8, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(314, 0, 8, 8, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(315, 0, 8, 8, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(316, 0, 8, 8, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(317, 0, 8, 8, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(318, 0, 8, 8, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(319, 0, 8, 8, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(320, 0, 3, 3, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(321, 0, 3, 3, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(322, 0, 3, 3, '2022-07-07', 3, NULL, 0, 0, 0, 1),
(323, 0, 3, 3, '2022-07-08', 3, NULL, 0, 0, 0, 0),
(324, 0, 3, 3, '2022-07-09', 0, NULL, 0, 0, 0, 0),
(325, 0, 3, 3, '2022-07-10', 0, NULL, 0, 0, 0, 0),
(326, 0, 4, 4, '2022-07-01', 5, NULL, 0, 0, 0, 1),
(327, 0, 4, 4, '2022-07-02', 5, NULL, 0, 0, 0, 1),
(328, 0, 4, 4, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(329, 0, 4, 4, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(330, 0, 4, 4, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(331, 0, 4, 4, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(332, 0, 4, 4, '2022-07-07', 3, NULL, 0, 0, 0, 1),
(333, 0, 4, 4, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(334, 0, 4, 4, '2022-07-09', 2, NULL, 0, 0, 0, 1),
(335, 0, 4, 4, '2022-07-10', 2, NULL, 0, 0, 0, 1),
(336, 0, 5, 5, '2022-07-01', 2, NULL, 0, 0, 0, 1),
(337, 0, 5, 5, '2022-07-02', 2, NULL, 0, 0, 0, 1),
(338, 0, 5, 5, '2022-07-03', 1, NULL, 0, 0, 0, 1),
(339, 0, 5, 5, '2022-07-04', 1, NULL, 0, 0, 0, 1),
(340, 0, 5, 5, '2022-07-05', 1, NULL, 0, 0, 0, 1),
(341, 0, 5, 5, '2022-07-06', 1, NULL, 0, 0, 0, 1),
(342, 0, 1, 1, '2022-08-01', 4, NULL, 0, 0, 0, 1),
(343, 0, 1, 1, '2022-08-02', 4, NULL, 0, 0, 0, 1),
(344, 0, 1, 1, '2022-08-03', 4, NULL, 0, 0, 0, 1),
(345, 0, 1, 1, '2022-08-04', 4, NULL, 0, 0, 0, 1),
(346, 0, 1, 1, '2022-08-05', 4, NULL, 0, 0, 0, 1),
(347, 0, 1, 1, '2022-08-06', 4, NULL, 0, 0, 0, 1),
(348, 0, 7, 7, '2022-07-01', 0, NULL, 0, 0, 0, 1),
(349, 0, 1, 1, '2022-08-09', 4, NULL, 0, 0, 0, 1),
(350, 0, 1, 1, '2022-08-08', 4, NULL, 0, 0, 0, 1),
(351, 0, 1, 1, '2022-08-07', 4, NULL, 0, 0, 0, 1),
(352, 0, 1, 1, '2022-08-10', 4, NULL, 0, 0, 0, 1),
(353, 0, 8, 8, '2022-07-01', 0, NULL, 0, 0, 0, 1),
(354, 0, 2, 2, '2022-08-01', 3, NULL, 0, 0, 0, 1),
(355, 0, 2, 2, '2022-08-02', 3, NULL, 0, 0, 0, 1),
(356, 0, 8, 8, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(357, 0, 2, 2, '2022-08-04', 3, NULL, 0, 0, 0, 1),
(358, 0, 2, 2, '2022-08-05', 3, NULL, 0, 0, 0, 1),
(359, 0, 2, 2, '2022-08-03', 3, NULL, 0, 0, 0, 1),
(360, 0, 2, 2, '2022-08-06', 3, NULL, 0, 0, 0, 1),
(361, 0, 2, 2, '2022-08-07', 3, NULL, 0, 0, 0, 1),
(362, 0, 8, 8, '2022-07-03', 0, NULL, 0, 0, 0, 1),
(363, 0, 2, 2, '2022-08-09', 3, NULL, 0, 0, 0, 1),
(364, 0, 2, 2, '2022-08-08', 3, NULL, 0, 0, 0, 1),
(365, 0, 8, 8, '2022-07-04', 0, NULL, 0, 0, 0, 1),
(366, 0, 2, 2, '2022-08-10', 3, NULL, 0, 0, 0, 1),
(367, 0, 8, 8, '2022-07-05', 0, NULL, 0, 0, 0, 1),
(368, 0, 8, 8, '2022-07-06', 0, NULL, 0, 0, 0, 1),
(369, 0, 3, 3, '2022-08-01', 4, NULL, 0, 0, 0, 1),
(370, 0, 3, 3, '2022-08-02', 4, NULL, 0, 0, 0, 1),
(371, 0, 3, 3, '2022-08-03', 4, NULL, 0, 0, 0, 1),
(372, 0, 3, 3, '2022-08-04', 4, NULL, 0, 0, 0, 1),
(373, 0, 3, 3, '2022-08-05', 4, NULL, 0, 0, 0, 1),
(374, 0, 3, 3, '2022-08-06', 2, NULL, 0, 0, 0, 1),
(375, 0, 3, 3, '2022-08-07', 0, NULL, 0, 0, 0, 1),
(376, 0, 3, 3, '2022-08-08', 4, NULL, 0, 0, 0, 1),
(377, 0, 3, 3, '2022-08-09', 4, NULL, 0, 0, 0, 1),
(378, 0, 3, 3, '2022-08-10', 4, NULL, 0, 0, 0, 1),
(379, 0, 4, 4, '2022-08-01', 3, NULL, 0, 0, 0, 1),
(380, 0, 4, 4, '2022-08-02', 3, NULL, 0, 0, 0, 1),
(381, 0, 4, 4, '2022-08-03', 3, NULL, 0, 0, 0, 1),
(382, 0, 4, 4, '2022-08-04', 3, NULL, 0, 0, 0, 1),
(383, 0, 4, 4, '2022-08-05', 0, NULL, 0, 0, 0, 0),
(384, 0, 4, 4, '2022-08-06', 0, NULL, 0, 0, 0, 0),
(385, 0, 4, 4, '2022-08-07', 3, NULL, 0, 0, 0, 1),
(386, 0, 4, 4, '2022-08-08', 3, NULL, 0, 0, 0, 1),
(387, 0, 4, 4, '2022-08-09', 3, NULL, 0, 0, 0, 1),
(388, 0, 4, 4, '2022-08-10', 3, NULL, 0, 0, 0, 1),
(389, 0, 1, 1, '2022-08-11', 4, NULL, 0, 0, 0, 1),
(390, 0, 1, 1, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(391, 0, 1, 1, '2022-08-13', 4, '5600', 0, 0, 0, 1),
(392, 0, 1, 1, '2022-08-14', 6, NULL, 0, 0, 0, 1),
(393, 0, 1, 1, '2022-08-15', 4, NULL, 0, 0, 0, 1),
(394, 0, 1, 1, '2022-08-16', 5, NULL, 0, 0, 0, 1),
(395, 0, 1, 1, '2022-08-17', 5, NULL, 0, 0, 0, 1),
(396, 0, 1, 1, '2022-08-18', 5, NULL, 0, 0, 0, 1),
(397, 0, 1, 1, '2022-08-19', 4, NULL, 0, 0, 0, 1),
(398, 0, 1, 1, '2022-07-11', 0, NULL, 0, 0, 0, 1),
(399, 0, 1, 1, '2022-07-12', 4, NULL, 0, 0, 0, 1),
(400, 0, 2, 2, '2022-08-11', 3, NULL, 0, 0, 0, 1),
(401, 0, 1, 1, '2022-07-13', 4, NULL, 0, 0, 0, 1),
(402, 0, 2, 2, '2022-08-12', 0, NULL, 0, 0, 0, 1),
(403, 0, 1, 1, '2022-07-14', 6, NULL, 0, 0, 0, 1),
(404, 0, 2, 2, '2022-08-13', 0, NULL, 0, 0, 0, 1),
(405, 0, 1, 1, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(406, 0, 2, 2, '2022-08-14', 3, NULL, 0, 0, 0, 1),
(407, 0, 1, 1, '2022-07-16', 5, NULL, 0, 0, 0, 1),
(408, 0, 2, 2, '2022-08-15', 3, NULL, 0, 0, 0, 1),
(409, 0, 1, 1, '2022-07-17', 6, NULL, 0, 0, 0, 1),
(410, 0, 1, 1, '2022-07-18', 4, NULL, 0, 0, 0, 1),
(411, 0, 2, 2, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(412, 0, 1, 1, '2022-07-19', 4, NULL, 0, 0, 0, 1),
(413, 0, 2, 2, '2022-08-17', 3, NULL, 0, 0, 0, 1),
(414, 0, 2, 2, '2022-08-18', 3, NULL, 0, 0, 0, 1),
(415, 0, 2, 2, '2022-08-19', 3, NULL, 0, 0, 0, 1),
(416, 0, 2, 2, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(417, 0, 2, 2, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(418, 0, 2, 2, '2022-07-13', 3, NULL, 0, 0, 0, 1),
(419, 0, 2, 2, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(420, 0, 2, 2, '2022-07-15', 0, NULL, 0, 0, 0, 1),
(421, 0, 2, 2, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(422, 0, 2, 2, '2022-07-17', 0, NULL, 0, 0, 0, 0),
(423, 0, 3, 3, '2022-08-11', 4, NULL, 0, 0, 0, 1),
(424, 0, 2, 2, '2022-07-18', 0, NULL, 0, 0, 0, 0),
(425, 0, 3, 3, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(426, 0, 2, 2, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(427, 0, 3, 3, '2022-08-13', 4, NULL, 0, 0, 0, 1),
(428, 0, 3, 3, '2022-08-14', 5, NULL, 0, 0, 0, 1),
(429, 0, 3, 3, '2022-08-15', 2, NULL, 0, 0, 0, 1),
(430, 0, 3, 3, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(431, 0, 3, 3, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(432, 0, 3, 3, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(433, 0, 3, 3, '2022-08-17', 4, NULL, 0, 0, 0, 1),
(434, 0, 3, 3, '2022-07-13', 5, NULL, 0, 0, 0, 1),
(435, 0, 3, 3, '2022-08-18', 4, NULL, 0, 0, 0, 1),
(436, 0, 3, 3, '2022-07-14', 5, NULL, 0, 0, 0, 1),
(437, 0, 3, 3, '2022-08-19', 4, NULL, 0, 0, 0, 1),
(438, 0, 3, 3, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(439, 0, 3, 3, '2022-07-16', 3, NULL, 0, 0, 0, 1),
(440, 0, 3, 3, '2022-07-17', 2, NULL, 0, 0, 0, 1),
(441, 0, 3, 3, '2022-07-18', 1, NULL, 0, 0, 0, 1),
(442, 0, 3, 3, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(443, 0, 4, 4, '2022-08-11', 3, NULL, 0, 0, 0, 1),
(444, 0, 4, 4, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(445, 0, 4, 4, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(446, 0, 4, 4, '2022-07-13', 3, NULL, 0, 0, 0, 1),
(447, 0, 4, 4, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(448, 0, 4, 4, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(449, 0, 4, 4, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(450, 0, 4, 4, '2022-07-17', 0, NULL, 0, 0, 0, 0),
(451, 0, 4, 4, '2022-07-18', 0, NULL, 0, 0, 0, 0),
(452, 0, 4, 4, '2022-08-15', 3, NULL, 0, 0, 0, 1),
(453, 0, 4, 4, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(454, 0, 4, 4, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(455, 0, 4, 4, '2022-08-17', 3, NULL, 0, 0, 0, 1),
(456, 0, 4, 4, '2022-08-18', 3, NULL, 0, 0, 0, 1),
(457, 0, 4, 4, '2022-08-19', 3, NULL, 0, 0, 0, 1),
(458, 0, 7, 7, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(459, 0, 7, 7, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(460, 0, 7, 7, '2022-07-16', 1, NULL, 0, 0, 0, 1),
(461, 0, 7, 7, '2022-07-17', 1, NULL, 0, 0, 0, 1),
(462, 0, 7, 7, '2022-07-18', 0, NULL, 0, 0, 0, 1),
(463, 0, 6, 6, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(464, 0, 6, 6, '2022-08-12', 0, NULL, 0, 0, 0, 1),
(465, 0, 6, 6, '2022-08-13', 3, NULL, 0, 0, 0, 1),
(466, 0, 8, 8, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(467, 0, 8, 8, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(468, 0, 6, 6, '2022-08-14', 2, NULL, 0, 0, 0, 1),
(469, 0, 8, 8, '2022-07-16', 1, NULL, 0, 0, 0, 1),
(470, 0, 8, 8, '2022-07-17', 1, NULL, 0, 0, 0, 1),
(471, 0, 1, 1, '2022-07-20', 4, NULL, 0, 0, 0, 1),
(472, 0, 1, 1, '2022-07-21', 4, NULL, 0, 0, 0, 1),
(473, 0, 1, 1, '2022-07-22', 4, NULL, 0, 0, 0, 1),
(474, 0, 1, 1, '2022-07-23', 5, NULL, 0, 0, 0, 1),
(475, 0, 7, 7, '2022-08-10', 0, NULL, 0, 0, 0, 1),
(476, 0, 1, 1, '2022-07-24', 6, NULL, 0, 0, 0, 1),
(477, 0, 1, 1, '2022-07-25', 4, NULL, 0, 0, 0, 1),
(478, 0, 7, 7, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(479, 0, 1, 1, '2022-07-26', 4, NULL, 0, 0, 0, 1),
(480, 0, 7, 7, '2022-08-12', 1, NULL, 0, 0, 0, 1),
(481, 0, 1, 1, '2022-07-27', 4, NULL, 0, 0, 0, 1),
(482, 0, 1, 1, '2022-07-28', 8, NULL, 0, 0, 0, 1),
(483, 0, 7, 7, '2022-08-13', 1, NULL, 0, 0, 0, 1),
(484, 0, 1, 1, '2022-07-29', 8, NULL, 0, 0, 0, 1),
(485, 0, 7, 7, '2022-08-14', 1, NULL, 0, 0, 0, 1),
(486, 0, 7, 7, '2022-08-15', 0, NULL, 0, 0, 0, 1),
(487, 0, 2, 2, '2022-07-20', 3, NULL, 0, 0, 0, 1),
(488, 0, 2, 2, '2022-07-21', 3, NULL, 0, 0, 0, 1),
(489, 0, 2, 2, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(490, 0, 2, 2, '2022-07-23', 0, NULL, 0, 0, 0, 1),
(491, 0, 2, 2, '2022-07-24', 0, NULL, 0, 0, 0, 1),
(492, 0, 2, 2, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(493, 0, 2, 2, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(494, 0, 2, 2, '2022-07-27', 3, NULL, 0, 0, 0, 1),
(495, 0, 2, 2, '2022-07-28', 0, NULL, 0, 0, 0, 1),
(496, 0, 2, 2, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(497, 0, 3, 3, '2022-07-20', 4, NULL, 0, 0, 0, 1),
(498, 0, 3, 3, '2022-07-21', 4, NULL, 0, 0, 0, 1),
(499, 0, 3, 3, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(500, 0, 3, 3, '2022-07-23', 2, NULL, 0, 0, 0, 1),
(501, 0, 3, 3, '2022-07-24', 4, NULL, 0, 0, 0, 1),
(502, 0, 3, 3, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(503, 0, 3, 3, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(504, 0, 3, 3, '2022-07-27', 5, NULL, 0, 0, 0, 1),
(505, 0, 3, 3, '2022-07-28', 5, NULL, 0, 0, 0, 1),
(506, 0, 3, 3, '2022-07-29', 4, NULL, 0, 0, 0, 1),
(507, 0, 4, 4, '2022-07-20', 3, NULL, 0, 0, 0, 1),
(508, 0, 4, 4, '2022-07-21', 3, NULL, 0, 0, 0, 1),
(509, 0, 4, 4, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(510, 0, 4, 4, '2022-07-23', 3, NULL, 0, 0, 0, 1),
(511, 0, 4, 4, '2022-07-24', 3, NULL, 0, 0, 0, 1),
(512, 0, 4, 4, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(513, 0, 4, 4, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(514, 0, 1, 1, '2022-08-20', 4, NULL, 0, 0, 0, 1),
(515, 0, 4, 4, '2022-07-27', 3, NULL, 0, 0, 0, 1),
(516, 0, 4, 4, '2022-07-28', 3, NULL, 0, 0, 0, 1),
(517, 0, 1, 1, '2022-08-21', 4, NULL, 0, 0, 0, 1),
(518, 0, 4, 4, '2022-07-29', 3, NULL, 0, 0, 0, 1),
(519, 0, 1, 1, '2022-08-22', 4, NULL, 0, 0, 0, 1),
(520, 0, 1, 1, '2022-08-23', 4, NULL, 0, 0, 0, 1),
(521, 0, 1, 1, '2022-08-24', 4, NULL, 0, 0, 0, 1),
(522, 0, 1, 1, '2022-08-25', 4, NULL, 0, 0, 0, 1),
(523, 0, 1, 1, '2022-08-26', 4, NULL, 0, 0, 0, 1),
(524, 0, 1, 1, '2022-08-27', 4, NULL, 0, 0, 0, 1),
(525, 0, 1, 1, '2022-08-28', 4, NULL, 0, 0, 0, 1),
(526, 0, 1, 1, '2022-08-29', 4, NULL, 0, 0, 0, 1),
(527, 0, 2, 2, '2022-08-20', 3, NULL, 0, 0, 0, 1),
(528, 0, 2, 2, '2022-08-21', 3, NULL, 0, 0, 0, 1),
(529, 0, 2, 2, '2022-08-22', 3, NULL, 0, 0, 0, 1),
(530, 0, 2, 2, '2022-08-23', 3, NULL, 0, 0, 0, 1),
(531, 0, 2, 2, '2022-08-24', 3, NULL, 0, 0, 0, 1),
(532, 0, 2, 2, '2022-08-25', 3, NULL, 0, 0, 0, 1),
(533, 0, 2, 2, '2022-08-26', 3, NULL, 0, 0, 0, 1),
(534, 0, 2, 2, '2022-08-27', 3, NULL, 0, 0, 0, 1),
(535, 0, 2, 2, '2022-08-28', 3, NULL, 0, 0, 0, 1),
(536, 0, 2, 2, '2022-08-29', 3, NULL, 0, 0, 0, 1),
(537, 0, 3, 3, '2022-08-20', 6, NULL, 0, 0, 0, 1),
(538, 0, 3, 3, '2022-08-21', 4, NULL, 0, 0, 0, 1),
(539, 0, 3, 3, '2022-08-22', 4, NULL, 0, 0, 0, 1),
(540, 0, 3, 3, '2022-08-23', 4, NULL, 0, 0, 0, 1),
(541, 0, 3, 3, '2022-08-24', 4, NULL, 0, 0, 0, 1),
(542, 0, 3, 3, '2022-08-25', 4, NULL, 0, 0, 0, 1),
(543, 0, 3, 3, '2022-08-26', 4, NULL, 0, 0, 0, 1),
(544, 0, 1, 1, '2022-07-30', 8, NULL, 0, 0, 0, 1),
(545, 0, 3, 3, '2022-08-27', 4, NULL, 0, 0, 0, 1),
(546, 0, 1, 1, '2022-07-31', 7, NULL, 0, 0, 0, 1),
(547, 0, 3, 3, '2022-08-28', 4, NULL, 0, 0, 0, 1),
(548, 0, 3, 3, '2022-08-29', 4, NULL, 0, 0, 0, 1),
(549, 0, 2, 2, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(550, 0, 2, 2, '2022-07-31', 0, NULL, 0, 0, 0, 1),
(551, 0, 4, 4, '2022-08-20', 3, NULL, 0, 0, 0, 1),
(552, 0, 4, 4, '2022-08-21', 3, NULL, 0, 0, 0, 1),
(553, 0, 4, 4, '2022-08-22', 3, NULL, 0, 0, 0, 1),
(554, 0, 3, 3, '2022-07-30', 3, NULL, 0, 0, 0, 1),
(555, 0, 4, 4, '2022-08-23', 3, NULL, 0, 0, 0, 1),
(556, 0, 4, 4, '2022-08-24', 3, NULL, 0, 0, 0, 1),
(557, 0, 3, 3, '2022-07-31', 2, NULL, 0, 0, 0, 1),
(558, 0, 4, 4, '2022-08-25', 3, NULL, 0, 0, 0, 1),
(559, 0, 4, 4, '2022-08-26', 3, NULL, 0, 0, 0, 1),
(560, 0, 4, 4, '2022-08-27', 3, NULL, 0, 0, 0, 1),
(561, 0, 4, 4, '2022-07-30', 3, NULL, 0, 0, 0, 1),
(562, 0, 4, 4, '2022-08-28', 3, NULL, 0, 0, 0, 1),
(563, 0, 4, 4, '2022-07-31', 3, NULL, 0, 0, 0, 1),
(564, 0, 4, 4, '2022-08-29', 3, NULL, 0, 0, 0, 1),
(565, 0, 1, 1, '2022-09-01', 4, NULL, 0, 0, 0, 1),
(566, 0, 1, 1, '2022-09-02', 4, NULL, 0, 0, 0, 1),
(567, 0, 1, 1, '2022-09-03', 4, NULL, 0, 0, 0, 1),
(568, 0, 1, 1, '2022-09-04', 4, NULL, 0, 0, 0, 1),
(569, 0, 1, 1, '2022-09-05', 4, NULL, 0, 0, 0, 1),
(570, 0, 1, 1, '2022-09-06', 4, NULL, 0, 0, 0, 1),
(571, 0, 1, 1, '2022-09-07', 4, NULL, 0, 0, 0, 1),
(572, 0, 1, 1, '2022-09-08', 4, NULL, 0, 0, 0, 1),
(573, 0, 1, 1, '2022-09-09', 4, NULL, 0, 0, 0, 1),
(574, 0, 1, 1, '2022-09-10', 4, NULL, 0, 0, 0, 1),
(575, 0, 2, 2, '2022-09-01', 3, NULL, 0, 0, 0, 1),
(576, 0, 2, 2, '2022-09-02', 3, NULL, 0, 0, 0, 1),
(577, 0, 2, 2, '2022-09-03', 3, NULL, 0, 0, 0, 1),
(578, 0, 2, 2, '2022-09-04', 3, NULL, 0, 0, 0, 1),
(579, 0, 2, 2, '2022-09-05', 3, NULL, 0, 0, 0, 1),
(580, 0, 2, 2, '2022-09-06', 3, NULL, 0, 0, 0, 1),
(581, 0, 2, 2, '2022-09-07', 3, NULL, 0, 0, 0, 1),
(582, 0, 2, 2, '2022-09-08', 3, NULL, 0, 0, 0, 1),
(583, 0, 2, 2, '2022-09-09', 3, NULL, 0, 0, 0, 1),
(584, 0, 2, 2, '2022-09-10', 3, NULL, 0, 0, 0, 1),
(585, 0, 3, 3, '2022-09-01', 5, NULL, 0, 0, 0, 1),
(586, 0, 3, 3, '2022-09-02', 5, NULL, 0, 0, 0, 1),
(587, 0, 3, 3, '2022-09-03', 5, NULL, 0, 0, 0, 1),
(588, 0, 3, 3, '2022-09-04', 5, NULL, 0, 0, 0, 1),
(589, 0, 3, 3, '2022-09-05', 5, NULL, 0, 0, 0, 1),
(590, 0, 3, 3, '2022-09-06', 5, NULL, 0, 0, 0, 1),
(591, 0, 1, 1, '2022-10-01', 5, NULL, 0, 0, 0, 1),
(592, 0, 3, 3, '2022-09-07', 5, NULL, 0, 0, 0, 1),
(593, 0, 3, 3, '2022-09-08', 5, NULL, 0, 0, 0, 1),
(594, 0, 1, 1, '2022-10-02', 5, NULL, 0, 0, 0, 1),
(595, 0, 3, 3, '2022-09-09', 5, NULL, 0, 0, 0, 1),
(596, 0, 1, 1, '2022-10-03', 5, NULL, 0, 0, 0, 1),
(597, 0, 3, 3, '2022-09-10', 5, NULL, 0, 0, 0, 1),
(598, 0, 1, 1, '2022-10-04', 5, NULL, 0, 0, 0, 1),
(599, 0, 1, 1, '2022-10-05', 5, NULL, 0, 0, 0, 1),
(600, 0, 1, 1, '2022-10-06', 5, NULL, 0, 0, 0, 1),
(601, 0, 4, 4, '2022-09-01', 3, NULL, 0, 0, 0, 1),
(602, 0, 4, 4, '2022-09-02', 3, NULL, 0, 0, 0, 1),
(603, 0, 1, 1, '2022-10-07', 5, NULL, 0, 0, 0, 1),
(604, 0, 4, 4, '2022-09-03', 3, NULL, 0, 0, 0, 1),
(605, 0, 4, 4, '2022-09-04', 3, NULL, 0, 0, 0, 1),
(606, 0, 1, 1, '2022-10-08', 5, NULL, 0, 0, 0, 1),
(607, 0, 4, 4, '2022-09-05', 3, NULL, 0, 0, 0, 1),
(608, 0, 4, 4, '2022-09-06', 3, NULL, 0, 0, 0, 1),
(609, 0, 1, 1, '2022-10-09', 5, NULL, 0, 0, 0, 1),
(610, 0, 4, 4, '2022-09-07', 3, NULL, 0, 0, 0, 1),
(611, 0, 4, 4, '2022-09-08', 3, NULL, 0, 0, 0, 1),
(612, 0, 1, 1, '2022-10-10', 5, NULL, 0, 0, 0, 1),
(613, 0, 4, 4, '2022-09-09', 3, NULL, 0, 0, 0, 1),
(614, 0, 4, 4, '2022-09-10', 3, NULL, 0, 0, 0, 1),
(615, 0, 2, 2, '2022-10-01', 3, NULL, 0, 0, 0, 1),
(616, 0, 2, 2, '2022-10-02', 3, NULL, 0, 0, 0, 1),
(617, 0, 2, 2, '2022-10-03', 3, NULL, 0, 0, 0, 1),
(618, 0, 2, 2, '2022-10-04', 3, NULL, 0, 0, 0, 1),
(619, 0, 2, 2, '2022-10-05', 3, NULL, 0, 0, 0, 1),
(620, 0, 2, 2, '2022-10-06', 3, NULL, 0, 0, 0, 1),
(621, 0, 2, 2, '2022-10-07', 3, NULL, 0, 0, 0, 1),
(622, 0, 1, 1, '2022-09-11', 4, NULL, 0, 0, 0, 1),
(623, 0, 1, 1, '2022-09-12', 4, NULL, 0, 0, 0, 1),
(624, 0, 2, 2, '2022-10-08', 3, NULL, 0, 0, 0, 1),
(625, 0, 1, 1, '2022-09-13', 4, NULL, 0, 0, 0, 1),
(626, 0, 2, 2, '2022-10-09', 3, NULL, 0, 0, 0, 1),
(627, 0, 1, 1, '2022-09-14', 4, NULL, 0, 0, 0, 1),
(628, 0, 1, 1, '2022-09-15', 4, NULL, 0, 0, 0, 1),
(629, 0, 2, 2, '2022-10-10', 3, NULL, 0, 0, 0, 1),
(630, 0, 1, 1, '2022-09-16', 4, NULL, 0, 0, 0, 1),
(631, 0, 1, 1, '2022-09-17', 4, NULL, 0, 0, 0, 1),
(632, 0, 1, 1, '2022-09-18', 4, NULL, 0, 0, 0, 1),
(633, 0, 1, 1, '2022-09-19', 4, NULL, 0, 0, 0, 1),
(634, 0, 3, 3, '2022-10-01', 4, NULL, 0, 0, 0, 1),
(635, 0, 3, 3, '2022-10-02', 4, NULL, 0, 0, 0, 1),
(636, 0, 3, 3, '2022-10-03', 4, NULL, 0, 0, 0, 1),
(637, 0, 2, 2, '2022-09-11', 3, NULL, 0, 0, 0, 1),
(638, 0, 2, 2, '2022-09-12', 3, NULL, 0, 0, 0, 1),
(639, 0, 3, 3, '2022-10-04', 4, NULL, 0, 0, 0, 1),
(640, 0, 2, 2, '2022-09-13', 3, NULL, 0, 0, 0, 1),
(641, 0, 2, 2, '2022-09-14', 3, NULL, 0, 0, 0, 1),
(642, 0, 3, 3, '2022-10-05', 4, NULL, 0, 0, 0, 1),
(643, 0, 2, 2, '2022-09-15', 3, NULL, 0, 0, 0, 1),
(644, 0, 3, 3, '2022-10-06', 4, NULL, 0, 0, 0, 1),
(645, 0, 2, 2, '2022-09-16', 3, NULL, 0, 0, 0, 1),
(646, 0, 2, 2, '2022-09-17', 3, NULL, 0, 0, 0, 1),
(647, 0, 3, 3, '2022-10-07', 4, NULL, 0, 0, 0, 1),
(648, 0, 2, 2, '2022-09-18', 3, NULL, 0, 0, 0, 1),
(649, 0, 2, 2, '2022-09-19', 3, NULL, 0, 0, 0, 1),
(650, 0, 3, 3, '2022-10-08', 4, NULL, 0, 0, 0, 1),
(651, 0, 3, 3, '2022-09-11', 5, NULL, 0, 0, 0, 1),
(652, 0, 3, 3, '2022-10-09', 4, NULL, 0, 0, 0, 1),
(653, 0, 3, 3, '2022-09-12', 5, NULL, 0, 0, 0, 1),
(654, 0, 3, 3, '2022-09-13', 5, NULL, 0, 0, 0, 1),
(655, 0, 3, 3, '2022-10-10', 4, NULL, 0, 0, 0, 1),
(656, 0, 3, 3, '2022-09-14', 5, NULL, 0, 0, 0, 1),
(657, 0, 3, 3, '2022-09-15', 5, NULL, 0, 0, 0, 1),
(658, 0, 3, 3, '2022-09-16', 5, NULL, 0, 0, 0, 1),
(659, 0, 3, 3, '2022-09-17', 5, NULL, 0, 0, 0, 1),
(660, 0, 3, 3, '2022-09-18', 5, NULL, 0, 0, 0, 1),
(661, 0, 4, 4, '2022-10-01', 4, NULL, 0, 0, 0, 1),
(662, 0, 3, 3, '2022-09-19', 5, NULL, 0, 0, 0, 1),
(663, 0, 4, 4, '2022-10-02', 4, NULL, 0, 0, 0, 1),
(664, 0, 4, 4, '2022-09-11', 3, NULL, 0, 0, 0, 1),
(665, 0, 4, 4, '2022-10-03', 4, NULL, 0, 0, 0, 1),
(666, 0, 4, 4, '2022-09-12', 3, NULL, 0, 0, 0, 1),
(667, 0, 4, 4, '2022-09-13', 3, NULL, 0, 0, 0, 1),
(668, 0, 4, 4, '2022-10-04', 4, NULL, 0, 0, 0, 1),
(669, 0, 4, 4, '2022-09-14', 3, NULL, 0, 0, 0, 1),
(670, 0, 4, 4, '2022-10-05', 4, NULL, 0, 0, 0, 1),
(671, 0, 4, 4, '2022-09-15', 3, NULL, 0, 0, 0, 1),
(672, 0, 4, 4, '2022-10-06', 4, NULL, 0, 0, 0, 1),
(673, 0, 4, 4, '2022-09-16', 3, NULL, 0, 0, 0, 1),
(674, 0, 4, 4, '2022-09-17', 3, NULL, 0, 0, 0, 1),
(675, 0, 4, 4, '2022-10-07', 4, NULL, 0, 0, 0, 1),
(676, 0, 4, 4, '2022-09-18', 3, NULL, 0, 0, 0, 1),
(677, 0, 4, 4, '2022-10-08', 4, NULL, 0, 0, 0, 1),
(678, 0, 4, 4, '2022-09-19', 3, NULL, 0, 0, 0, 1),
(679, 0, 4, 4, '2022-10-09', 4, NULL, 0, 0, 0, 1),
(680, 0, 4, 4, '2022-10-10', 4, NULL, 0, 0, 0, 1),
(681, 0, 1, 1, '2022-09-20', 4, NULL, 0, 0, 0, 1),
(682, 0, 1, 1, '2022-09-21', 4, NULL, 0, 0, 0, 1),
(683, 0, 1, 1, '2022-09-22', 4, NULL, 0, 0, 0, 1),
(684, 0, 1, 1, '2022-09-23', 14, NULL, 0, 0, 0, 1),
(685, 0, 1, 1, '2022-09-24', 14, NULL, 0, 0, 0, 1),
(686, 0, 1, 1, '2022-09-25', 14, NULL, 0, 0, 0, 1),
(687, 0, 1, 1, '2022-09-26', 14, NULL, 0, 0, 0, 1),
(688, 0, 1, 1, '2022-09-27', 4, NULL, 0, 0, 0, 1),
(689, 0, 1, 1, '2022-09-28', 4, NULL, 0, 0, 0, 1),
(690, 0, 1, 1, '2022-09-29', 4, NULL, 0, 0, 0, 1),
(691, 0, 2, 2, '2022-09-20', 3, NULL, 0, 0, 0, 1),
(692, 0, 2, 2, '2022-09-21', 3, NULL, 0, 0, 0, 1),
(693, 0, 2, 2, '2022-09-22', 3, NULL, 0, 0, 0, 1),
(694, 0, 2, 2, '2022-09-23', 3, NULL, 0, 0, 0, 1),
(695, 0, 2, 2, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(696, 0, 2, 2, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(697, 0, 2, 2, '2022-09-26', 3, NULL, 0, 0, 0, 1),
(698, 0, 2, 2, '2022-09-27', 3, NULL, 0, 0, 0, 1),
(699, 0, 2, 2, '2022-09-28', 3, NULL, 0, 0, 0, 1),
(700, 0, 2, 2, '2022-09-29', 3, NULL, 0, 0, 0, 1),
(701, 0, 3, 3, '2022-11-04', 2, NULL, 0, 0, 0, 1),
(702, 0, 3, 3, '2022-11-05', 2, NULL, 0, 0, 0, 1),
(703, 0, 3, 3, '2022-09-20', 5, NULL, 0, 0, 0, 1),
(704, 0, 3, 3, '2022-09-21', 5, NULL, 0, 0, 0, 1),
(705, 0, 3, 3, '2022-09-22', 5, NULL, 0, 0, 0, 1),
(706, 0, 3, 3, '2022-09-23', 5, NULL, 0, 0, 0, 1),
(707, 0, 3, 3, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(708, 0, 3, 3, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(709, 0, 3, 3, '2022-09-26', 5, NULL, 0, 0, 0, 1),
(710, 0, 3, 3, '2022-09-27', 5, NULL, 0, 0, 0, 1),
(711, 0, 3, 3, '2022-09-28', 5, NULL, 0, 0, 0, 1),
(712, 0, 3, 3, '2022-09-29', 5, NULL, 0, 0, 0, 1),
(713, 0, 4, 4, '2022-09-20', 3, NULL, 0, 0, 0, 1),
(714, 0, 4, 4, '2022-09-21', 3, NULL, 0, 0, 0, 1),
(715, 0, 4, 4, '2022-09-22', 3, NULL, 0, 0, 0, 1),
(716, 0, 4, 4, '2022-09-23', 3, NULL, 0, 0, 0, 1),
(717, 0, 4, 4, '2022-09-24', 3, NULL, 0, 0, 0, 1),
(718, 0, 4, 4, '2022-09-25', 3, NULL, 0, 0, 0, 1),
(719, 0, 4, 4, '2022-09-26', 3, NULL, 0, 0, 0, 1),
(720, 0, 4, 4, '2022-09-27', 3, NULL, 0, 0, 0, 1),
(721, 0, 4, 4, '2022-09-28', 3, NULL, 0, 0, 0, 1),
(722, 0, 4, 4, '2022-09-29', 3, NULL, 0, 0, 0, 1),
(723, 0, 1, 1, '2022-09-30', 4, NULL, 0, 0, 0, 1),
(724, 0, 2, 2, '2022-09-30', 3, NULL, 0, 0, 0, 1),
(725, 0, 3, 3, '2022-09-30', 5, NULL, 0, 0, 0, 1),
(726, 0, 4, 4, '2022-09-30', 3, NULL, 0, 0, 0, 1),
(727, 0, 3, 3, '2022-06-09', 2, NULL, 0, 0, 0, 1),
(728, 0, 8, 8, '2022-07-28', 1, NULL, 0, 0, 0, 1),
(729, 0, 8, 8, '2022-07-29', 1, NULL, 0, 0, 0, 1),
(730, 0, 8, 8, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(731, 0, 1, 1, '2023-07-01', 2, '1000', 0, 0, 0, 1),
(732, 0, 1, 1, '2022-10-11', 5, NULL, 0, 0, 0, 1),
(733, 0, 1, 1, '2022-10-12', 5, NULL, 0, 0, 0, 1),
(734, 0, 1, 1, '2022-10-13', 5, NULL, 0, 0, 0, 1),
(735, 0, 1, 1, '2022-10-14', 5, NULL, 0, 0, 0, 1),
(736, 0, 1, 1, '2022-10-15', 5, NULL, 0, 0, 0, 1),
(737, 0, 1, 1, '2022-10-16', 5, NULL, 0, 0, 0, 1),
(738, 0, 1, 1, '2022-10-17', 5, NULL, 0, 0, 0, 1),
(739, 0, 1, 1, '2022-10-18', 5, NULL, 0, 0, 0, 1),
(740, 0, 1, 1, '2022-10-19', 5, NULL, 0, 0, 0, 1),
(741, 0, 1, 1, '2022-10-20', 5, NULL, 0, 0, 0, 1),
(742, 0, 1, 1, '2022-10-21', 5, NULL, 0, 0, 0, 1),
(743, 0, 1, 1, '2022-10-22', 5, NULL, 0, 0, 0, 1),
(744, 0, 1, 1, '2022-10-23', 5, NULL, 0, 0, 0, 1),
(745, 0, 1, 1, '2022-10-24', 5, NULL, 0, 0, 0, 1),
(746, 0, 1, 1, '2022-10-25', 5, NULL, 0, 0, 0, 1),
(747, 0, 1, 1, '2022-10-26', 5, NULL, 0, 0, 0, 1),
(748, 0, 1, 1, '2022-10-27', 5, NULL, 0, 0, 0, 1),
(749, 0, 1, 1, '2022-10-28', 5, NULL, 0, 0, 0, 1),
(750, 0, 1, 1, '2022-10-29', 5, NULL, 0, 0, 0, 1),
(751, 0, 1, 1, '2022-10-30', 5, NULL, 0, 0, 0, 1),
(752, 0, 1, 1, '2022-10-31', 5, NULL, 0, 0, 0, 1),
(753, 0, 2, 2, '2022-10-11', 3, NULL, 0, 0, 0, 1),
(754, 0, 2, 2, '2022-10-12', 3, NULL, 0, 0, 0, 1),
(755, 0, 2, 2, '2022-10-13', 3, NULL, 0, 0, 0, 1),
(756, 0, 2, 2, '2022-10-14', 3, NULL, 0, 0, 0, 1),
(757, 0, 2, 2, '2022-10-15', 3, NULL, 0, 0, 0, 1),
(758, 0, 2, 2, '2022-10-16', 3, NULL, 0, 0, 0, 1),
(759, 0, 2, 2, '2022-10-17', 3, NULL, 0, 0, 0, 1),
(760, 0, 2, 2, '2022-10-18', 3, NULL, 0, 0, 0, 1),
(761, 0, 2, 2, '2022-10-19', 3, NULL, 0, 0, 0, 1),
(762, 0, 2, 2, '2022-10-20', 3, NULL, 0, 0, 0, 1),
(763, 0, 2, 2, '2022-10-21', 3, NULL, 0, 0, 0, 1),
(764, 0, 2, 2, '2022-10-22', 3, NULL, 0, 0, 0, 1),
(765, 0, 2, 2, '2022-10-23', 3, NULL, 0, 0, 0, 1),
(766, 0, 2, 2, '2022-10-24', 3, NULL, 0, 0, 0, 1),
(767, 0, 2, 2, '2022-10-25', 3, NULL, 0, 0, 0, 1),
(768, 0, 2, 2, '2022-10-26', 3, NULL, 0, 0, 0, 1),
(769, 0, 2, 2, '2022-10-27', 3, NULL, 0, 0, 0, 1),
(770, 0, 2, 2, '2022-10-28', 3, NULL, 0, 0, 0, 1),
(771, 0, 2, 2, '2022-10-29', 3, NULL, 0, 0, 0, 1),
(772, 0, 2, 2, '2022-10-30', 3, NULL, 0, 0, 0, 1),
(773, 0, 2, 2, '2022-10-31', 3, NULL, 0, 0, 0, 1),
(774, 0, 3, 3, '2022-10-11', 4, NULL, 0, 0, 0, 1),
(775, 0, 3, 3, '2022-10-12', 4, NULL, 0, 0, 0, 1),
(776, 0, 3, 3, '2022-10-13', 4, NULL, 0, 0, 0, 1),
(777, 0, 3, 3, '2022-10-14', 4, NULL, 0, 0, 0, 1),
(778, 0, 3, 3, '2022-10-15', 4, NULL, 0, 0, 0, 1),
(779, 0, 3, 3, '2022-10-16', 4, NULL, 0, 0, 0, 1),
(780, 0, 3, 3, '2022-10-17', 4, NULL, 0, 0, 0, 1),
(781, 0, 3, 3, '2022-10-18', 4, NULL, 0, 0, 0, 1),
(782, 0, 3, 3, '2022-10-19', 4, NULL, 0, 0, 0, 1),
(783, 0, 3, 3, '2022-10-20', 4, NULL, 0, 0, 0, 1),
(784, 0, 3, 3, '2022-10-21', 4, NULL, 0, 0, 0, 1),
(785, 0, 3, 3, '2022-10-22', 4, NULL, 0, 0, 0, 1),
(786, 0, 3, 3, '2022-10-23', 4, NULL, 0, 0, 0, 1),
(787, 0, 3, 3, '2022-10-24', 4, NULL, 0, 0, 0, 1),
(788, 0, 3, 3, '2022-10-25', 4, NULL, 0, 0, 0, 1),
(789, 0, 3, 3, '2022-10-26', 4, NULL, 0, 0, 0, 1),
(790, 0, 3, 3, '2022-10-27', 4, NULL, 0, 0, 0, 1),
(791, 0, 3, 3, '2022-10-28', 4, NULL, 0, 0, 0, 1),
(792, 0, 3, 3, '2022-10-29', 4, NULL, 0, 0, 0, 1),
(793, 0, 3, 3, '2022-10-30', 4, NULL, 0, 0, 0, 1),
(794, 0, 3, 3, '2022-10-31', 4, NULL, 0, 0, 0, 1),
(795, 0, 4, 4, '2022-10-11', 4, NULL, 0, 0, 0, 1),
(796, 0, 4, 4, '2022-10-12', 4, NULL, 0, 0, 0, 1),
(797, 0, 4, 4, '2022-10-13', 4, NULL, 0, 0, 0, 1),
(798, 0, 4, 4, '2022-10-14', 4, NULL, 0, 0, 0, 1),
(799, 0, 4, 4, '2022-10-15', 4, NULL, 0, 0, 0, 1),
(800, 0, 4, 4, '2022-10-16', 4, NULL, 0, 0, 0, 1),
(801, 0, 4, 4, '2022-10-17', 4, NULL, 0, 0, 0, 1),
(802, 0, 4, 4, '2022-10-18', 4, NULL, 0, 0, 0, 1),
(803, 0, 4, 4, '2022-10-19', 4, NULL, 0, 0, 0, 1),
(804, 0, 4, 4, '2022-10-20', 4, NULL, 0, 0, 0, 1),
(805, 0, 4, 4, '2022-10-21', 4, NULL, 0, 0, 0, 1),
(806, 0, 4, 4, '2022-10-22', 4, NULL, 0, 0, 0, 1),
(807, 0, 4, 4, '2022-10-23', 4, NULL, 0, 0, 0, 1),
(808, 0, 4, 4, '2022-10-24', 4, NULL, 0, 0, 0, 1),
(809, 0, 4, 4, '2022-10-25', 4, NULL, 0, 0, 0, 1),
(810, 0, 4, 4, '2022-10-26', 4, NULL, 0, 0, 0, 1),
(811, 0, 4, 4, '2022-10-27', 4, NULL, 0, 0, 0, 1),
(812, 0, 4, 4, '2022-10-28', 4, NULL, 0, 0, 0, 1),
(813, 0, 4, 4, '2022-10-29', 4, NULL, 0, 0, 0, 1),
(814, 0, 4, 4, '2022-10-30', 4, NULL, 0, 0, 0, 1),
(815, 0, 4, 4, '2022-10-31', 4, NULL, 0, 0, 0, 1),
(816, 0, 5, 5, '2022-08-11', 2, NULL, 0, 0, 0, 1),
(817, 0, 5, 5, '2022-08-12', 2, NULL, 0, 0, 0, 1),
(818, 0, 5, 5, '2022-08-13', 1, NULL, 0, 0, 0, 1),
(819, 0, 5, 5, '2022-08-14', 2, NULL, 0, 0, 0, 1),
(820, 0, 6, 6, '2022-08-16', 0, NULL, 0, 0, 0, 0),
(821, 0, 6, 6, '2022-08-17', 0, NULL, 0, 0, 0, 0),
(822, 0, 6, 6, '2022-08-18', 0, NULL, 0, 0, 0, 0),
(823, 0, 5, 5, '2022-08-16', 2, NULL, 0, 0, 0, 1),
(824, 0, 5, 5, '2022-08-17', 2, NULL, 0, 0, 0, 1),
(825, 0, 5, 5, '2022-08-18', 2, NULL, 0, 0, 0, 1),
(826, 0, 5, 5, '2022-08-19', 2, NULL, 0, 0, 0, 1),
(827, 0, 7, 7, '2022-10-04', 1, NULL, 0, 0, 0, 1),
(828, 0, 7, 7, '2022-10-05', 1, NULL, 0, 0, 0, 1),
(829, 0, 7, 7, '2022-10-06', 1, NULL, 0, 0, 0, 1),
(830, 0, 5, 5, '2022-07-22', 1, NULL, 0, 0, 0, 1),
(831, 0, 5, 5, '2022-07-23', 1, NULL, 0, 0, 0, 1),
(832, 0, 4, 4, '2022-08-13', 3, NULL, 0, 0, 0, 1),
(833, 0, 6, 6, '2022-07-01', 2, NULL, 0, 0, 0, 1),
(834, 0, 6, 6, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(835, 0, 1, 9, '2022-07-03', 2, NULL, 0, 0, 0, 1),
(836, 0, 1, 9, '2022-07-04', 2, NULL, 0, 0, 0, 1),
(837, 0, 1, 9, '2022-07-05', 2, NULL, 0, 0, 0, 1),
(838, 0, 1, 9, '2022-07-06', 2, NULL, 0, 0, 0, 1),
(839, 0, 1, 9, '2022-07-07', 2, NULL, 0, 0, 0, 1),
(840, 0, 1, 9, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(841, 0, 4, 4, '2022-08-14', 3, NULL, 0, 0, 0, 1),
(842, 0, 5, 5, '2022-07-12', 0, NULL, 0, 0, 0, 1),
(843, 0, 1, 9, '2022-07-14', 6, NULL, 0, 0, 0, 1),
(844, 0, 1, 9, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(845, 0, 1, 9, '2022-07-16', 5, NULL, 0, 0, 0, 1),
(846, 0, 1, 9, '2022-07-17', 6, NULL, 0, 0, 0, 1),
(847, 0, 3, 3, '2022-12-10', 0, NULL, 0, 0, 0, 1),
(848, 0, 3, 3, '2022-12-11', 0, NULL, 0, 0, 0, 1),
(849, 0, 3, 3, '2022-12-12', 0, NULL, 0, 0, 0, 1),
(850, 0, 4, 4, '2022-12-10', 2, NULL, 0, 0, 0, 1),
(851, 0, 4, 4, '2022-12-11', 2, NULL, 0, 0, 0, 1),
(852, 0, 4, 4, '2022-12-12', 2, NULL, 0, 0, 0, 1),
(853, 0, 1, 9, '2022-08-13', 4, NULL, 0, 0, 0, 1),
(854, 0, 5, 5, '2022-07-15', 0, NULL, 0, 0, 0, 1),
(855, 0, 5, 5, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(856, 0, 7, 7, '2022-07-23', 0, NULL, 0, 0, 0, 1),
(857, 0, 7, 7, '2022-07-24', 0, NULL, 0, 0, 0, 1),
(858, 0, 1, 9, '2022-08-14', 6, NULL, 0, 0, 0, 1),
(859, 0, 5, 5, '2022-07-19', 0, NULL, 0, 0, 0, 1),
(860, 0, 8, 8, '2022-07-23', 1, NULL, 0, 0, 0, 1),
(861, 0, 8, 8, '2022-07-24', 1, NULL, 0, 0, 0, 1),
(862, 0, 8, 8, '2022-07-25', 1, NULL, 0, 0, 0, 1),
(863, 0, 6, 6, '2022-07-21', 0, NULL, 0, 0, 0, 1),
(864, 0, 5, 5, '2022-07-21', 1, NULL, 0, 0, 0, 1),
(865, 0, 7, 7, '2022-08-04', 1, NULL, 0, 0, 0, 1),
(866, 0, 7, 7, '2022-08-05', 1, NULL, 0, 0, 0, 1),
(867, 0, 7, 7, '2022-08-06', 1, NULL, 0, 0, 0, 1),
(868, 0, 7, 7, '2022-08-07', 1, NULL, 0, 0, 0, 1),
(869, 0, 7, 7, '2022-08-08', 0, NULL, 0, 0, 0, 1),
(870, 0, 5, 5, '2022-08-04', 1, NULL, 0, 0, 0, 1),
(871, 0, 5, 5, '2022-08-05', 2, NULL, 0, 0, 0, 1),
(872, 0, 5, 5, '2022-08-06', 3, NULL, 0, 0, 0, 1),
(873, 0, 5, 5, '2022-08-07', 1, NULL, 0, 0, 0, 1),
(874, 0, 5, 5, '2022-08-08', 0, NULL, 0, 0, 0, 1),
(875, 0, 1, 9, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(876, 0, 1, 9, '2022-08-15', 4, NULL, 0, 0, 0, 1),
(877, 0, 6, 6, '2022-08-20', 1, NULL, 0, 0, 0, 1),
(878, 0, 6, 6, '2022-08-21', 1, NULL, 0, 0, 0, 1),
(879, 0, 6, 6, '2022-08-22', 1, NULL, 0, 0, 0, 1),
(880, 0, 8, 8, '2022-08-06', 1, NULL, 0, 0, 0, 1),
(881, 0, 3, 3, '2022-11-01', 4, NULL, 0, 0, 0, 1),
(882, 0, 3, 3, '2022-11-02', 1, NULL, 0, 0, 0, 1),
(883, 0, 1, 9, '2022-07-22', 4, NULL, 0, 0, 0, 1),
(884, 0, 1, 9, '2022-07-23', 5, NULL, 0, 0, 0, 1),
(885, 0, 1, 9, '2022-07-24', 6, NULL, 0, 0, 0, 1),
(886, 0, 5, 5, '2022-07-24', 1, NULL, 0, 0, 0, 1),
(887, 0, 8, 8, '2022-08-09', 1, NULL, 0, 0, 0, 1),
(888, 0, 8, 8, '2022-08-10', 1, NULL, 0, 0, 0, 1),
(889, 0, 8, 8, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(890, 0, 5, 5, '2022-08-15', 1, NULL, 0, 0, 0, 1),
(891, 0, 6, 6, '2022-08-15', 1, NULL, 0, 0, 0, 1),
(892, 0, 5, 5, '2022-07-30', 2, NULL, 0, 0, 0, 1),
(893, 0, 6, 6, '2022-07-30', 1, NULL, 0, 0, 0, 1),
(894, 0, 6, 6, '2022-07-31', 3, NULL, 0, 0, 0, 1),
(895, 0, 6, 6, '2022-08-01', 1, NULL, 0, 0, 0, 1),
(896, 0, 3, 3, '2022-12-24', 1, NULL, 0, 0, 0, 1),
(897, 0, 3, 3, '2022-12-25', 1, NULL, 0, 0, 0, 1),
(898, 0, 3, 3, '2022-12-26', 1, NULL, 0, 0, 0, 1),
(899, 0, 3, 3, '2022-12-27', 1, NULL, 0, 0, 0, 1),
(900, 0, 3, 3, '2022-12-28', 1, NULL, 0, 0, 0, 1),
(901, 0, 3, 3, '2022-12-29', 1, NULL, 0, 0, 0, 1),
(902, 0, 3, 3, '2022-12-30', 1, NULL, 0, 0, 0, 1),
(903, 0, 3, 3, '2022-12-31', 1, NULL, 0, 0, 0, 1),
(904, 0, 5, 5, '2022-07-31', 0, NULL, 0, 0, 0, 1),
(905, 0, 5, 5, '2022-08-01', 0, NULL, 0, 0, 0, 1),
(906, 0, 5, 5, '2022-08-02', 0, NULL, 0, 0, 0, 1),
(907, 0, 1, 9, '2022-07-31', 7, NULL, 0, 0, 0, 1),
(908, 0, 1, 9, '2022-07-28', 8, NULL, 0, 0, 0, 1),
(909, 0, 1, 9, '2022-07-29', 8, NULL, 0, 0, 0, 1),
(910, 0, 1, 9, '2022-07-30', 8, NULL, 0, 0, 0, 1),
(911, 0, 1, 9, '2022-09-24', 14, NULL, 0, 0, 0, 1),
(912, 0, 1, 9, '2022-09-25', 14, NULL, 0, 0, 0, 1),
(913, 0, 7, 7, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(914, 0, 5, 5, '2022-07-29', 1, NULL, 0, 0, 0, 1),
(915, 0, 1, 9, '2022-09-26', 14, NULL, 0, 0, 0, 1),
(916, 0, 1, 9, '2022-09-27', 4, NULL, 0, 0, 0, 1),
(917, 0, 1, 9, '2022-09-23', 14, NULL, 0, 0, 0, 1),
(918, 0, 2, 11, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(919, 0, 2, 11, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(920, 0, 2, 11, '2022-07-28', 0, NULL, 0, 0, 0, 1),
(921, 0, 2, 11, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(922, 0, 2, 11, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(923, 0, 2, 11, '2022-07-31', 0, NULL, 0, 0, 0, 1);

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
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offersection`
--

INSERT INTO `offersection` (`id`, `hotelId`, `title`, `price`, `img`, `percentage`, `code`) VALUES
(1, 0, 'Luxury Sea View Rooms Available ', 4990, 'offer_room.jpeg', 10, 'JPLUXURY10');

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
  `checkOut` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `hotelId`, `name`, `email`, `primaryphone`, `address`, `district`, `pincode`, `gst`, `description`, `logo`, `url`, `checkIn`, `checkOut`) VALUES
(1, 0, 'Jamindars Palace', 'reservation@jamindarspalace.com', '7682830917', 'BLUE FLAG BEACH, CHAKRATIRTHA ROAD, PURI', 'PURI', '752002', '21AABCH4042H1Z6', 'Jamindar Palace is one among the best luxury sea-view hotel in Puri and has stunning views of the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea-view hotel in Puri', 'logo.png', 'https://jamindarspalace.com', '10.00 AM', '08.00 AM');

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
  `payByRoom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `hotelId`, `maxRoomCapacity`, `advancePay`, `pckupDropPrice`, `pckupDropCaption`, `PartialPaymentPrice`, `partialPaymentCaption`, `pckupDropStatus`, `partialPaymentStatus`, `payByRoom`) VALUES
(1, 0, 6, 7499, 5000, '                   ', 50, '', 0, 1, 0);

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
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `banktypemethod`
--
ALTER TABLE `banktypemethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomnumber`
--
ALTER TABLE `roomnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
