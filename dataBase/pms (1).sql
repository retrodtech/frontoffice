-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 12:56 AM
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
  `title` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `addOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `category`, `img`, `description`, `addOn`) VALUES
(6, 'Lawn View', 'Palace', 'activity1.jpg', '', '2022-02-23 20:27:03'),
(7, 'Side View', 'Outdoor', 'activity2.jpg', '', '2022-02-23 20:27:12'),
(8, 'Front View', 'Outdoor', 'activity3.jpg', '', '2022-02-23 20:27:20'),
(13, 'Jamindars Beach ', 'Hotel', '169156.jpg', 'Best Sea View Hotel At Puri.', '2022-03-16 04:53:02'),
(14, 'Travel', 'Puri', '581175.jpg', 'A day in Puri is a day in paradise, and all around you there is a sense of beauty radiating from the water of the Bay of Bengal. A flock of Bengali tourists is always found somewhere around the corner, and youth is wasted on its soft beaches, drenched by the incoming waves. The story of Puri is a story of duality, of divinity, and dream. On one hand, you find Lord Jagannathâ€™s benevolence, while on the other there is the romance of the sea. A typical day in Puri is made of soul-stirring walks, and seeking the blessing of the lord; this is 24 hours in Odishaâ€™s most important sea town.', '2022-07-19 05:26:44');

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
(1, 1, 'jamindars_e1bada', NULL, 6832, '2022-07-30', '2022-07-31', 1, '', 0, 'complete', NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:02:30', 1, 1),
(2, 1, 'jamindars_9be210', NULL, 6832, '0000-00-00', '0000-00-00', 1, '', 0, 'pending', NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:07:33', 1, 1),
(3, 1, 'jamindars_fe8bcd', NULL, 13664, '0000-00-00', '0000-00-00', 1, '', 0, 'pending', NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:36:52', 1, 1),
(4, 1, 'jamindars_1ff312', NULL, 13664, '0000-00-00', '0000-00-00', 1, '', 0, 'pending', NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:53:33', 1, 1);

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
(1, 1, 2, 2, 201, 2, 0, NULL, NULL, 1),
(2, 2, 2, 2, 201, 2, 0, NULL, NULL, 1),
(3, 3, 2, 2, 201, 2, 0, NULL, NULL, 1),
(4, 3, 2, 2, 201, 2, 0, NULL, NULL, 1),
(5, 4, 2, 2, 201, 2, 0, NULL, NULL, 1),
(6, 4, 2, 2, 201, 2, 0, NULL, NULL, 1);

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
(1, 1, 1, 201, '1', 'Lokanath Lenka', 'avi@gmail.com', '7978098671', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:02:30'),
(2, 1, 2, 201, '1', 'Lokanath Lenka', 'avi@gmail.com', '7978098671', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:07:33'),
(3, 1, 3, 201, '1', 'Lokanath Lenka', 'avi@gmail.com', '7978098671', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:36:52'),
(4, 1, 4, 201, '1', 'Lokanath Lenka', 'avi@gmail.com', '7978098671', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-30 01:53:33');

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
  `img` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subTitle` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `herosection`
--

INSERT INTO `herosection` (`id`, `img`, `title`, `subTitle`, `status`) VALUES
(6, '650762.jpg', 'fdgdf', '', 1);

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

INSERT INTO `inventory` (`id`, `room_id`, `room_detail_id`, `add_date`, `room`, `price`, `price2`, `eAdult`, `eChild`, `status`) VALUES
(1, 1, 1, '2022-05-25', 3, NULL, 0, 0, 0, 1),
(2, 1, 1, '2022-05-26', 10, NULL, 6600, 0, 0, 1),
(3, 1, 1, '2022-05-27', 8, '5600', 0, 0, 0, 1),
(4, 1, 1, '2022-05-28', 2, '5600', 0, 0, 0, 1),
(5, 1, 1, '2022-05-29', 0, '5600', 0, 0, 0, 1),
(6, 1, 1, '2022-05-30', 6, NULL, 0, 0, 0, 1),
(7, 1, 1, '2022-05-31', 1, NULL, 0, 0, 0, 1),
(8, 1, 1, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(9, 1, 1, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(10, 1, 1, '2022-06-03', 1, NULL, 0, 0, 0, 1),
(11, 2, 2, '2022-05-25', 5, NULL, 0, 0, 0, 1),
(12, 2, 2, '2022-05-26', 3, NULL, 0, 0, 0, 1),
(13, 2, 2, '2022-05-27', 4, NULL, 0, 0, 0, 1),
(14, 2, 2, '2022-05-28', 4, NULL, 0, 0, 0, 1),
(15, 2, 2, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(16, 2, 2, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(17, 2, 2, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(18, 2, 2, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(19, 2, 2, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(20, 2, 2, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(21, 3, 3, '2022-05-25', 2, NULL, 0, 0, 0, 1),
(22, 3, 3, '2022-05-26', 4, NULL, 0, 0, 0, 1),
(23, 3, 3, '2022-05-27', 2, NULL, 0, 0, 0, 1),
(24, 3, 3, '2022-05-28', 1, NULL, 0, 0, 0, 1),
(25, 3, 3, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(26, 3, 3, '2022-05-30', 1, NULL, 0, 0, 0, 1),
(27, 3, 3, '2022-05-31', 2, NULL, 0, 0, 0, 1),
(28, 3, 3, '2022-06-01', 2, NULL, 0, 0, 0, 1),
(29, 3, 3, '2022-06-02', 3, NULL, 0, 0, 0, 1),
(30, 3, 3, '2022-06-03', 4, NULL, 0, 0, 0, 1),
(31, 4, 4, '2022-05-25', 2, NULL, 0, 0, 0, 1),
(32, 4, 4, '2022-05-26', 2, NULL, 0, 0, 0, 1),
(33, 4, 4, '2022-05-27', 2, NULL, 0, 0, 0, 1),
(34, 4, 4, '2022-05-28', 1, NULL, 0, 0, 0, 1),
(35, 4, 4, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(36, 4, 4, '2022-05-30', 4, NULL, 0, 0, 0, 1),
(37, 4, 4, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(38, 4, 4, '2022-05-21', 2, NULL, 0, 0, 0, 1),
(39, 4, 4, '2022-05-22', 1, NULL, 0, 0, 0, 1),
(40, 4, 4, '2022-05-23', 1, NULL, 0, 0, 0, 1),
(41, 4, 4, '2022-05-24', 1, NULL, 0, 0, 0, 1),
(42, 4, 4, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(43, 4, 4, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(44, 4, 4, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(45, 5, 5, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(46, 5, 5, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(47, 5, 5, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(48, 5, 5, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(49, 5, 5, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(50, 5, 5, '2022-05-30', 1, NULL, 0, 0, 0, 1),
(51, 5, 5, '2022-05-31', 1, NULL, 0, 0, 0, 1),
(52, 5, 5, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(53, 5, 5, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(54, 5, 5, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(55, 6, 6, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(56, 6, 6, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(57, 6, 6, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(58, 6, 6, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(59, 6, 6, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(60, 6, 6, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(61, 6, 6, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(62, 6, 6, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(63, 6, 6, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(64, 6, 6, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(65, 7, 7, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(66, 7, 7, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(67, 7, 7, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(68, 7, 7, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(69, 7, 7, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(70, 7, 7, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(71, 7, 7, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(72, 7, 7, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(73, 7, 7, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(74, 7, 7, '2022-06-03', 0, NULL, 0, 0, 0, 1),
(75, 8, 8, '2022-05-25', 0, NULL, 0, 0, 0, 1),
(76, 8, 8, '2022-05-26', 0, NULL, 0, 0, 0, 1),
(77, 8, 8, '2022-05-27', 0, NULL, 0, 0, 0, 1),
(78, 8, 8, '2022-05-28', 0, NULL, 0, 0, 0, 1),
(79, 8, 8, '2022-05-29', 0, NULL, 0, 0, 0, 1),
(80, 8, 8, '2022-05-30', 0, NULL, 0, 0, 0, 1),
(81, 8, 8, '2022-05-31', 0, NULL, 0, 0, 0, 1),
(82, 8, 8, '2022-06-01', 0, NULL, 0, 0, 0, 1),
(83, 8, 8, '2022-06-02', 0, NULL, 0, 0, 0, 1),
(84, 8, 8, '2022-06-03', 1, NULL, 0, 0, 0, 1),
(85, 1, 1, '2022-06-04', 3, NULL, 0, 0, 0, 1),
(86, 1, 1, '2022-06-05', 1, NULL, 0, 0, 0, 1),
(87, 1, 1, '2022-06-06', 5, NULL, 0, 0, 0, 1),
(88, 1, 1, '2022-06-07', 4, NULL, 0, 0, 0, 1),
(89, 1, 1, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(90, 1, 1, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(91, 1, 1, '2022-06-10', 2, NULL, 0, 0, 0, 1),
(92, 1, 1, '2022-06-11', 2, NULL, 0, 0, 0, 1),
(93, 1, 1, '2022-06-12', 3, NULL, 0, 0, 0, 1),
(94, 2, 2, '2022-06-04', 3, NULL, 0, 0, 0, 1),
(95, 2, 2, '2022-06-05', 2, NULL, 0, 0, 0, 1),
(96, 2, 2, '2022-06-06', 2, NULL, 0, 0, 0, 1),
(97, 2, 2, '2022-06-07', 1, NULL, 0, 0, 0, 1),
(98, 2, 2, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(99, 2, 2, '2022-06-09', 2, NULL, 0, 0, 0, 1),
(100, 2, 2, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(101, 2, 2, '2022-06-11', 4, NULL, 0, 0, 0, 1),
(102, 2, 2, '2022-06-12', 5, NULL, 0, 0, 0, 1),
(103, 3, 3, '2022-06-04', 8, NULL, 0, 0, 0, 1),
(104, 3, 3, '2022-06-05', 5, NULL, 0, 0, 0, 1),
(105, 3, 3, '2022-06-06', 7, NULL, 0, 0, 0, 1),
(106, 3, 3, '2022-06-07', 5, NULL, 0, 0, 0, 1),
(107, 3, 3, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(108, 3, 3, '2022-06-10', 5, NULL, 0, 0, 0, 1),
(109, 3, 3, '2022-06-11', 7, NULL, 0, 0, 0, 1),
(110, 3, 3, '2022-06-12', 8, NULL, 0, 0, 0, 1),
(111, 4, 4, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(112, 4, 4, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(113, 4, 4, '2022-06-06', 1, NULL, 0, 0, 0, 1),
(114, 4, 4, '2022-06-07', 3, NULL, 0, 0, 0, 1),
(115, 4, 4, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(116, 4, 4, '2022-06-09', 0, NULL, 0, 0, 0, 1),
(117, 4, 4, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(118, 4, 4, '2022-06-11', 4, NULL, 0, 0, 0, 1),
(119, 4, 4, '2022-06-12', 4, NULL, 0, 0, 0, 1),
(120, 1, 1, '2022-05-21', 7, NULL, 0, 0, 0, 1),
(121, 1, 1, '2022-05-22', 7, NULL, 0, 0, 0, 1),
(122, 1, 1, '2022-05-23', 7, NULL, 0, 0, 0, 1),
(123, 5, 5, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(124, 5, 5, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(125, 5, 5, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(126, 5, 5, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(127, 5, 5, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(128, 5, 5, '2022-06-07', 1, NULL, 0, 0, 0, 1),
(129, 5, 5, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(130, 5, 5, '2022-06-05', 2, NULL, 0, 0, 0, 1),
(131, 5, 5, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(132, 6, 6, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(133, 6, 6, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(134, 6, 6, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(135, 6, 6, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(136, 6, 6, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(137, 6, 6, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(138, 6, 6, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(139, 6, 6, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(140, 6, 6, '2022-06-12', 1, NULL, 0, 0, 0, 1),
(141, 7, 7, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(142, 7, 7, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(143, 7, 7, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(144, 7, 7, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(145, 7, 7, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(146, 7, 7, '2022-06-09', 1, NULL, 0, 0, 0, 1),
(147, 7, 7, '2022-06-10', 1, NULL, 0, 0, 0, 1),
(148, 7, 7, '2022-06-11', 1, NULL, 0, 0, 0, 1),
(149, 7, 7, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(150, 8, 8, '2022-06-04', 0, NULL, 0, 0, 0, 1),
(151, 8, 8, '2022-06-05', 0, NULL, 0, 0, 0, 1),
(152, 8, 8, '2022-06-06', 0, NULL, 0, 0, 0, 1),
(153, 8, 8, '2022-06-07', 0, NULL, 0, 0, 0, 1),
(154, 8, 8, '2022-06-08', 0, NULL, 0, 0, 0, 1),
(155, 8, 8, '2022-06-09', 0, NULL, 0, 0, 0, 1),
(156, 8, 8, '2022-06-10', 0, NULL, 0, 0, 0, 1),
(157, 8, 8, '2022-06-11', 0, NULL, 0, 0, 0, 1),
(158, 8, 8, '2022-06-12', 0, NULL, 0, 0, 0, 1),
(159, 1, 1, '2022-06-13', 3, NULL, 0, 0, 0, 1),
(160, 1, 1, '2022-06-14', 1, NULL, 0, 0, 0, 1),
(161, 1, 1, '2022-06-15', 1, NULL, 0, 0, 0, 1),
(162, 1, 1, '2022-06-16', 6, NULL, 0, 0, 0, 1),
(163, 1, 1, '2022-06-17', 6, NULL, 0, 0, 0, 1),
(164, 1, 1, '2022-06-18', 6, NULL, 0, 0, 0, 1),
(165, 1, 1, '2022-06-19', 6, NULL, 0, 0, 0, 1),
(166, 1, 1, '2022-06-20', 6, NULL, 0, 0, 0, 1),
(167, 1, 1, '2022-06-21', 6, NULL, 0, 0, 0, 1),
(168, 2, 2, '2022-06-13', 5, NULL, 0, 0, 0, 1),
(169, 1, 1, '2022-05-17', 2, NULL, 0, 0, 0, 1),
(170, 2, 2, '2022-06-14', 1, NULL, 0, 0, 0, 1),
(171, 2, 2, '2022-06-15', 1, NULL, 0, 0, 0, 1),
(172, 2, 2, '2022-06-16', 3, NULL, 0, 0, 0, 1),
(173, 2, 2, '2022-06-17', 3, NULL, 0, 0, 0, 1),
(174, 2, 2, '2022-06-18', 3, NULL, 0, 0, 0, 1),
(175, 2, 2, '2022-06-19', 3, NULL, 0, 0, 0, 1),
(176, 2, 2, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(177, 2, 2, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(178, 3, 3, '2022-06-13', 7, NULL, 0, 0, 0, 1),
(179, 3, 3, '2022-06-14', 5, NULL, 0, 0, 0, 1),
(180, 3, 3, '2022-06-15', 4, NULL, 0, 0, 0, 1),
(181, 3, 3, '2022-06-16', 4, NULL, 0, 0, 0, 1),
(182, 3, 3, '2022-06-17', 5, NULL, 0, 0, 0, 1),
(183, 3, 3, '2022-06-18', 4, NULL, 0, 0, 0, 1),
(184, 3, 3, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(185, 3, 3, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(186, 3, 3, '2022-06-21', 2, NULL, 0, 0, 0, 1),
(187, 4, 4, '2022-06-14', 2, NULL, 0, 0, 0, 1),
(188, 4, 4, '2022-06-13', 2, NULL, 0, 0, 0, 1),
(189, 1, 1, '2022-05-24', 2, NULL, 0, 0, 0, 1),
(190, 4, 4, '2022-06-15', 3, NULL, 0, 0, 0, 1),
(191, 4, 4, '2022-06-16', 2, NULL, 0, 0, 0, 1),
(192, 4, 4, '2022-06-17', 2, NULL, 0, 0, 0, 1),
(193, 4, 4, '2022-06-18', 2, NULL, 0, 0, 0, 1),
(194, 4, 4, '2022-06-19', 2, NULL, 0, 0, 0, 1),
(195, 4, 4, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(196, 4, 4, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(197, 6, 6, '2022-06-13', 1, NULL, 0, 0, 0, 1),
(198, 6, 6, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(199, 6, 6, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(200, 6, 6, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(201, 6, 6, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(202, 6, 6, '2022-06-18', 1, NULL, 0, 0, 0, 1),
(203, 6, 6, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(204, 6, 6, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(205, 6, 6, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(206, 7, 7, '2022-06-13', 0, NULL, 0, 0, 0, 1),
(207, 7, 7, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(208, 7, 7, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(209, 7, 7, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(210, 7, 7, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(211, 7, 7, '2022-06-18', 0, NULL, 0, 0, 0, 1),
(212, 7, 7, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(213, 7, 7, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(214, 7, 7, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(215, 5, 5, '2022-06-13', 0, NULL, 0, 0, 0, 1),
(216, 5, 5, '2022-06-14', 0, NULL, 0, 0, 0, 1),
(217, 5, 5, '2022-06-15', 0, NULL, 0, 0, 0, 1),
(218, 5, 5, '2022-06-16', 0, NULL, 0, 0, 0, 1),
(219, 5, 5, '2022-06-17', 0, NULL, 0, 0, 0, 1),
(220, 5, 5, '2022-06-18', 0, NULL, 0, 0, 0, 1),
(221, 5, 5, '2022-06-19', 0, NULL, 0, 0, 0, 1),
(222, 5, 5, '2022-06-20', 0, NULL, 0, 0, 0, 1),
(223, 5, 5, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(224, 1, 1, '2022-06-22', 6, NULL, 0, 0, 0, 1),
(225, 1, 1, '2022-06-23', 6, NULL, 0, 0, 0, 1),
(226, 1, 1, '2022-06-24', 2, NULL, 0, 0, 0, 1),
(227, 1, 1, '2022-06-25', 2, NULL, 0, 0, 0, 1),
(228, 1, 1, '2022-06-26', 2, NULL, 0, 0, 0, 1),
(229, 1, 1, '2022-06-27', 4, NULL, 0, 0, 0, 1),
(230, 1, 1, '2022-06-28', 4, NULL, 0, 0, 0, 1),
(231, 1, 1, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(232, 1, 1, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(233, 2, 2, '2022-06-22', 3, NULL, 0, 0, 0, 1),
(234, 2, 2, '2022-06-23', 3, NULL, 0, 0, 0, 1),
(235, 2, 2, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(236, 2, 2, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(237, 2, 2, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(238, 2, 2, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(239, 2, 2, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(240, 2, 2, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(241, 2, 2, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(242, 3, 3, '2022-06-22', 4, NULL, 0, 0, 0, 1),
(243, 3, 3, '2022-06-23', 4, NULL, 0, 0, 0, 1),
(244, 3, 3, '2022-06-24', 1, NULL, 0, 0, 0, 1),
(245, 3, 3, '2022-06-25', 2, NULL, 0, 0, 0, 1),
(246, 3, 3, '2022-06-26', 1, NULL, 0, 0, 0, 1),
(247, 1, 1, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(248, 1, 1, '2022-07-02', 1, NULL, 0, 0, 0, 1),
(249, 1, 1, '2022-07-03', 2, NULL, 0, 0, 0, 1),
(250, 1, 1, '2022-07-04', 2, NULL, 0, 0, 0, 1),
(251, 1, 1, '2022-07-05', 2, NULL, 0, 0, 0, 1),
(252, 3, 3, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(253, 3, 3, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(254, 3, 3, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(255, 3, 3, '2022-06-30', 3, NULL, 0, 0, 0, 1),
(256, 1, 1, '2022-07-06', 2, NULL, 0, 0, 0, 1),
(257, 1, 1, '2022-07-07', 2, NULL, 0, 0, 0, 1),
(258, 1, 1, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(259, 4, 4, '2022-06-22', 3, NULL, 0, 0, 0, 1),
(260, 4, 4, '2022-06-23', 3, NULL, 0, 0, 0, 1),
(261, 4, 4, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(262, 4, 4, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(263, 4, 4, '2022-06-26', 2, NULL, 0, 0, 0, 1),
(264, 1, 1, '2022-07-09', 0, NULL, 0, 0, 0, 1),
(265, 1, 1, '2022-07-10', 0, NULL, 0, 0, 0, 1),
(266, 2, 2, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(267, 4, 4, '2022-06-27', 3, NULL, 0, 0, 0, 1),
(268, 4, 4, '2022-06-28', 3, NULL, 0, 0, 0, 1),
(269, 2, 2, '2022-07-02', 3, NULL, 0, 0, 0, 1),
(270, 4, 4, '2022-06-29', 3, NULL, 0, 0, 0, 1),
(271, 4, 4, '2022-06-30', 5, NULL, 0, 0, 0, 1),
(272, 2, 2, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(273, 5, 5, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(274, 5, 5, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(275, 2, 2, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(276, 5, 5, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(277, 5, 5, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(278, 2, 2, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(279, 5, 5, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(280, 5, 5, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(281, 5, 5, '2022-06-28', 1, NULL, 0, 0, 0, 1),
(282, 5, 5, '2022-06-29', 1, NULL, 0, 0, 0, 1),
(283, 5, 5, '2022-06-30', 2, NULL, 0, 0, 0, 1),
(284, 2, 2, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(285, 2, 2, '2022-07-08', 3, NULL, 0, 0, 0, 1),
(286, 2, 2, '2022-07-09', 0, NULL, 0, 0, 0, 1),
(287, 2, 2, '2022-07-10', 0, NULL, 0, 0, 0, 1),
(288, 3, 3, '2022-07-01', 3, NULL, 0, 0, 0, 1),
(289, 3, 3, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(290, 6, 6, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(291, 6, 6, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(292, 6, 6, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(293, 3, 3, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(294, 6, 6, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(295, 6, 6, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(296, 6, 6, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(297, 3, 3, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(298, 6, 6, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(299, 6, 6, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(300, 6, 6, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(301, 7, 7, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(302, 7, 7, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(303, 7, 7, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(304, 7, 7, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(305, 7, 7, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(306, 7, 7, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(307, 7, 7, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(308, 7, 7, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(309, 7, 7, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(310, 8, 8, '2022-06-21', 0, NULL, 0, 0, 0, 1),
(311, 8, 8, '2022-06-22', 0, NULL, 0, 0, 0, 1),
(312, 8, 8, '2022-06-23', 0, NULL, 0, 0, 0, 1),
(313, 8, 8, '2022-06-24', 0, NULL, 0, 0, 0, 1),
(314, 8, 8, '2022-06-25', 0, NULL, 0, 0, 0, 1),
(315, 8, 8, '2022-06-26', 0, NULL, 0, 0, 0, 1),
(316, 8, 8, '2022-06-27', 0, NULL, 0, 0, 0, 1),
(317, 8, 8, '2022-06-28', 0, NULL, 0, 0, 0, 1),
(318, 8, 8, '2022-06-29', 0, NULL, 0, 0, 0, 1),
(319, 8, 8, '2022-06-30', 0, NULL, 0, 0, 0, 1),
(320, 3, 3, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(321, 3, 3, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(322, 3, 3, '2022-07-07', 3, NULL, 0, 0, 0, 1),
(323, 3, 3, '2022-07-08', 3, NULL, 0, 0, 0, 0),
(324, 3, 3, '2022-07-09', 0, NULL, 0, 0, 0, 0),
(325, 3, 3, '2022-07-10', 0, NULL, 0, 0, 0, 0),
(326, 4, 4, '2022-07-01', 5, NULL, 0, 0, 0, 1),
(327, 4, 4, '2022-07-02', 5, NULL, 0, 0, 0, 1),
(328, 4, 4, '2022-07-03', 3, NULL, 0, 0, 0, 1),
(329, 4, 4, '2022-07-04', 3, NULL, 0, 0, 0, 1),
(330, 4, 4, '2022-07-05', 3, NULL, 0, 0, 0, 1),
(331, 4, 4, '2022-07-06', 3, NULL, 0, 0, 0, 1),
(332, 4, 4, '2022-07-07', 3, NULL, 0, 0, 0, 1),
(333, 4, 4, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(334, 4, 4, '2022-07-09', 2, NULL, 0, 0, 0, 1),
(335, 4, 4, '2022-07-10', 2, NULL, 0, 0, 0, 1),
(336, 5, 5, '2022-07-01', 2, NULL, 0, 0, 0, 1),
(337, 5, 5, '2022-07-02', 2, NULL, 0, 0, 0, 1),
(338, 5, 5, '2022-07-03', 1, NULL, 0, 0, 0, 1),
(339, 5, 5, '2022-07-04', 1, NULL, 0, 0, 0, 1),
(340, 5, 5, '2022-07-05', 1, NULL, 0, 0, 0, 1),
(341, 5, 5, '2022-07-06', 1, NULL, 0, 0, 0, 1),
(342, 1, 1, '2022-08-01', 4, NULL, 0, 0, 0, 1),
(343, 1, 1, '2022-08-02', 4, NULL, 0, 0, 0, 1),
(344, 1, 1, '2022-08-03', 4, NULL, 0, 0, 0, 1),
(345, 1, 1, '2022-08-04', 4, NULL, 0, 0, 0, 1),
(346, 1, 1, '2022-08-05', 4, NULL, 0, 0, 0, 1),
(347, 1, 1, '2022-08-06', 4, NULL, 0, 0, 0, 1),
(348, 7, 7, '2022-07-01', 0, NULL, 0, 0, 0, 1),
(349, 1, 1, '2022-08-09', 4, NULL, 0, 0, 0, 1),
(350, 1, 1, '2022-08-08', 4, NULL, 0, 0, 0, 1),
(351, 1, 1, '2022-08-07', 4, NULL, 0, 0, 0, 1),
(352, 1, 1, '2022-08-10', 4, NULL, 0, 0, 0, 1),
(353, 8, 8, '2022-07-01', 0, NULL, 0, 0, 0, 1),
(354, 2, 2, '2022-08-01', 3, NULL, 0, 0, 0, 1),
(355, 2, 2, '2022-08-02', 3, NULL, 0, 0, 0, 1),
(356, 8, 8, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(357, 2, 2, '2022-08-04', 3, NULL, 0, 0, 0, 1),
(358, 2, 2, '2022-08-05', 3, NULL, 0, 0, 0, 1),
(359, 2, 2, '2022-08-03', 3, NULL, 0, 0, 0, 1),
(360, 2, 2, '2022-08-06', 3, NULL, 0, 0, 0, 1),
(361, 2, 2, '2022-08-07', 3, NULL, 0, 0, 0, 1),
(362, 8, 8, '2022-07-03', 0, NULL, 0, 0, 0, 1),
(363, 2, 2, '2022-08-09', 3, NULL, 0, 0, 0, 1),
(364, 2, 2, '2022-08-08', 3, NULL, 0, 0, 0, 1),
(365, 8, 8, '2022-07-04', 0, NULL, 0, 0, 0, 1),
(366, 2, 2, '2022-08-10', 3, NULL, 0, 0, 0, 1),
(367, 8, 8, '2022-07-05', 0, NULL, 0, 0, 0, 1),
(368, 8, 8, '2022-07-06', 0, NULL, 0, 0, 0, 1),
(369, 3, 3, '2022-08-01', 4, NULL, 0, 0, 0, 1),
(370, 3, 3, '2022-08-02', 4, NULL, 0, 0, 0, 1),
(371, 3, 3, '2022-08-03', 4, NULL, 0, 0, 0, 1),
(372, 3, 3, '2022-08-04', 4, NULL, 0, 0, 0, 1),
(373, 3, 3, '2022-08-05', 4, NULL, 0, 0, 0, 1),
(374, 3, 3, '2022-08-06', 2, NULL, 0, 0, 0, 1),
(375, 3, 3, '2022-08-07', 0, NULL, 0, 0, 0, 1),
(376, 3, 3, '2022-08-08', 4, NULL, 0, 0, 0, 1),
(377, 3, 3, '2022-08-09', 4, NULL, 0, 0, 0, 1),
(378, 3, 3, '2022-08-10', 4, NULL, 0, 0, 0, 1),
(379, 4, 4, '2022-08-01', 3, NULL, 0, 0, 0, 1),
(380, 4, 4, '2022-08-02', 3, NULL, 0, 0, 0, 1),
(381, 4, 4, '2022-08-03', 3, NULL, 0, 0, 0, 1),
(382, 4, 4, '2022-08-04', 3, NULL, 0, 0, 0, 1),
(383, 4, 4, '2022-08-05', 0, NULL, 0, 0, 0, 0),
(384, 4, 4, '2022-08-06', 0, NULL, 0, 0, 0, 0),
(385, 4, 4, '2022-08-07', 3, NULL, 0, 0, 0, 1),
(386, 4, 4, '2022-08-08', 3, NULL, 0, 0, 0, 1),
(387, 4, 4, '2022-08-09', 3, NULL, 0, 0, 0, 1),
(388, 4, 4, '2022-08-10', 3, NULL, 0, 0, 0, 1),
(389, 1, 1, '2022-08-11', 4, NULL, 0, 0, 0, 1),
(390, 1, 1, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(391, 1, 1, '2022-08-13', 4, '5600', 0, 0, 0, 1),
(392, 1, 1, '2022-08-14', 6, NULL, 0, 0, 0, 1),
(393, 1, 1, '2022-08-15', 4, NULL, 0, 0, 0, 1),
(394, 1, 1, '2022-08-16', 5, NULL, 0, 0, 0, 1),
(395, 1, 1, '2022-08-17', 5, NULL, 0, 0, 0, 1),
(396, 1, 1, '2022-08-18', 5, NULL, 0, 0, 0, 1),
(397, 1, 1, '2022-08-19', 4, NULL, 0, 0, 0, 1),
(398, 1, 1, '2022-07-11', 0, NULL, 0, 0, 0, 1),
(399, 1, 1, '2022-07-12', 4, NULL, 0, 0, 0, 1),
(400, 2, 2, '2022-08-11', 3, NULL, 0, 0, 0, 1),
(401, 1, 1, '2022-07-13', 4, NULL, 0, 0, 0, 1),
(402, 2, 2, '2022-08-12', 0, NULL, 0, 0, 0, 1),
(403, 1, 1, '2022-07-14', 6, NULL, 0, 0, 0, 1),
(404, 2, 2, '2022-08-13', 0, NULL, 0, 0, 0, 1),
(405, 1, 1, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(406, 2, 2, '2022-08-14', 3, NULL, 0, 0, 0, 1),
(407, 1, 1, '2022-07-16', 5, NULL, 0, 0, 0, 1),
(408, 2, 2, '2022-08-15', 3, NULL, 0, 0, 0, 1),
(409, 1, 1, '2022-07-17', 6, NULL, 0, 0, 0, 1),
(410, 1, 1, '2022-07-18', 4, NULL, 0, 0, 0, 1),
(411, 2, 2, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(412, 1, 1, '2022-07-19', 4, NULL, 0, 0, 0, 1),
(413, 2, 2, '2022-08-17', 3, NULL, 0, 0, 0, 1),
(414, 2, 2, '2022-08-18', 3, NULL, 0, 0, 0, 1),
(415, 2, 2, '2022-08-19', 3, NULL, 0, 0, 0, 1),
(416, 2, 2, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(417, 2, 2, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(418, 2, 2, '2022-07-13', 3, NULL, 0, 0, 0, 1),
(419, 2, 2, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(420, 2, 2, '2022-07-15', 0, NULL, 0, 0, 0, 1),
(421, 2, 2, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(422, 2, 2, '2022-07-17', 0, NULL, 0, 0, 0, 0),
(423, 3, 3, '2022-08-11', 4, NULL, 0, 0, 0, 1),
(424, 2, 2, '2022-07-18', 0, NULL, 0, 0, 0, 0),
(425, 3, 3, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(426, 2, 2, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(427, 3, 3, '2022-08-13', 4, NULL, 0, 0, 0, 1),
(428, 3, 3, '2022-08-14', 5, NULL, 0, 0, 0, 1),
(429, 3, 3, '2022-08-15', 2, NULL, 0, 0, 0, 1),
(430, 3, 3, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(431, 3, 3, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(432, 3, 3, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(433, 3, 3, '2022-08-17', 4, NULL, 0, 0, 0, 1),
(434, 3, 3, '2022-07-13', 5, NULL, 0, 0, 0, 1),
(435, 3, 3, '2022-08-18', 4, NULL, 0, 0, 0, 1),
(436, 3, 3, '2022-07-14', 5, NULL, 0, 0, 0, 1),
(437, 3, 3, '2022-08-19', 4, NULL, 0, 0, 0, 1),
(438, 3, 3, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(439, 3, 3, '2022-07-16', 3, NULL, 0, 0, 0, 1),
(440, 3, 3, '2022-07-17', 2, NULL, 0, 0, 0, 1),
(441, 3, 3, '2022-07-18', 1, NULL, 0, 0, 0, 1),
(442, 3, 3, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(443, 4, 4, '2022-08-11', 3, NULL, 0, 0, 0, 1),
(444, 4, 4, '2022-07-11', 3, NULL, 0, 0, 0, 1),
(445, 4, 4, '2022-07-12', 3, NULL, 0, 0, 0, 1),
(446, 4, 4, '2022-07-13', 3, NULL, 0, 0, 0, 1),
(447, 4, 4, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(448, 4, 4, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(449, 4, 4, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(450, 4, 4, '2022-07-17', 0, NULL, 0, 0, 0, 0),
(451, 4, 4, '2022-07-18', 0, NULL, 0, 0, 0, 0),
(452, 4, 4, '2022-08-15', 3, NULL, 0, 0, 0, 1),
(453, 4, 4, '2022-07-19', 0, NULL, 0, 0, 0, 0),
(454, 4, 4, '2022-08-16', 3, NULL, 0, 0, 0, 1),
(455, 4, 4, '2022-08-17', 3, NULL, 0, 0, 0, 1),
(456, 4, 4, '2022-08-18', 3, NULL, 0, 0, 0, 1),
(457, 4, 4, '2022-08-19', 3, NULL, 0, 0, 0, 1),
(458, 7, 7, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(459, 7, 7, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(460, 7, 7, '2022-07-16', 1, NULL, 0, 0, 0, 1),
(461, 7, 7, '2022-07-17', 1, NULL, 0, 0, 0, 1),
(462, 7, 7, '2022-07-18', 0, NULL, 0, 0, 0, 1),
(463, 6, 6, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(464, 6, 6, '2022-08-12', 0, NULL, 0, 0, 0, 1),
(465, 6, 6, '2022-08-13', 3, NULL, 0, 0, 0, 1),
(466, 8, 8, '2022-07-14', 1, NULL, 0, 0, 0, 1),
(467, 8, 8, '2022-07-15', 1, NULL, 0, 0, 0, 1),
(468, 6, 6, '2022-08-14', 2, NULL, 0, 0, 0, 1),
(469, 8, 8, '2022-07-16', 1, NULL, 0, 0, 0, 1),
(470, 8, 8, '2022-07-17', 1, NULL, 0, 0, 0, 1),
(471, 1, 1, '2022-07-20', 4, NULL, 0, 0, 0, 1),
(472, 1, 1, '2022-07-21', 4, NULL, 0, 0, 0, 1),
(473, 1, 1, '2022-07-22', 4, NULL, 0, 0, 0, 1),
(474, 1, 1, '2022-07-23', 5, NULL, 0, 0, 0, 1),
(475, 7, 7, '2022-08-10', 0, NULL, 0, 0, 0, 1),
(476, 1, 1, '2022-07-24', 6, NULL, 0, 0, 0, 1),
(477, 1, 1, '2022-07-25', 4, NULL, 0, 0, 0, 1),
(478, 7, 7, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(479, 1, 1, '2022-07-26', 4, NULL, 0, 0, 0, 1),
(480, 7, 7, '2022-08-12', 1, NULL, 0, 0, 0, 1),
(481, 1, 1, '2022-07-27', 4, NULL, 0, 0, 0, 1),
(482, 1, 1, '2022-07-28', 8, NULL, 0, 0, 0, 1),
(483, 7, 7, '2022-08-13', 1, NULL, 0, 0, 0, 1),
(484, 1, 1, '2022-07-29', 8, NULL, 0, 0, 0, 1),
(485, 7, 7, '2022-08-14', 1, NULL, 0, 0, 0, 1),
(486, 7, 7, '2022-08-15', 0, NULL, 0, 0, 0, 1),
(487, 2, 2, '2022-07-20', 3, NULL, 0, 0, 0, 1),
(488, 2, 2, '2022-07-21', 3, NULL, 0, 0, 0, 1),
(489, 2, 2, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(490, 2, 2, '2022-07-23', 0, NULL, 0, 0, 0, 1),
(491, 2, 2, '2022-07-24', 0, NULL, 0, 0, 0, 1),
(492, 2, 2, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(493, 2, 2, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(494, 2, 2, '2022-07-27', 3, NULL, 0, 0, 0, 1),
(495, 2, 2, '2022-07-28', 0, NULL, 0, 0, 0, 1),
(496, 2, 2, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(497, 3, 3, '2022-07-20', 4, NULL, 0, 0, 0, 1),
(498, 3, 3, '2022-07-21', 4, NULL, 0, 0, 0, 1),
(499, 3, 3, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(500, 3, 3, '2022-07-23', 2, NULL, 0, 0, 0, 1),
(501, 3, 3, '2022-07-24', 4, NULL, 0, 0, 0, 1),
(502, 3, 3, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(503, 3, 3, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(504, 3, 3, '2022-07-27', 5, NULL, 0, 0, 0, 1),
(505, 3, 3, '2022-07-28', 5, NULL, 0, 0, 0, 1),
(506, 3, 3, '2022-07-29', 4, NULL, 0, 0, 0, 1),
(507, 4, 4, '2022-07-20', 3, NULL, 0, 0, 0, 1),
(508, 4, 4, '2022-07-21', 3, NULL, 0, 0, 0, 1),
(509, 4, 4, '2022-07-22', 3, NULL, 0, 0, 0, 1),
(510, 4, 4, '2022-07-23', 3, NULL, 0, 0, 0, 1),
(511, 4, 4, '2022-07-24', 3, NULL, 0, 0, 0, 1),
(512, 4, 4, '2022-07-25', 3, NULL, 0, 0, 0, 1),
(513, 4, 4, '2022-07-26', 3, NULL, 0, 0, 0, 1),
(514, 1, 1, '2022-08-20', 4, NULL, 0, 0, 0, 1),
(515, 4, 4, '2022-07-27', 3, NULL, 0, 0, 0, 1),
(516, 4, 4, '2022-07-28', 3, NULL, 0, 0, 0, 1),
(517, 1, 1, '2022-08-21', 4, NULL, 0, 0, 0, 1),
(518, 4, 4, '2022-07-29', 3, NULL, 0, 0, 0, 1),
(519, 1, 1, '2022-08-22', 4, NULL, 0, 0, 0, 1),
(520, 1, 1, '2022-08-23', 4, NULL, 0, 0, 0, 1),
(521, 1, 1, '2022-08-24', 4, NULL, 0, 0, 0, 1),
(522, 1, 1, '2022-08-25', 4, NULL, 0, 0, 0, 1),
(523, 1, 1, '2022-08-26', 4, NULL, 0, 0, 0, 1),
(524, 1, 1, '2022-08-27', 4, NULL, 0, 0, 0, 1),
(525, 1, 1, '2022-08-28', 4, NULL, 0, 0, 0, 1),
(526, 1, 1, '2022-08-29', 4, NULL, 0, 0, 0, 1),
(527, 2, 2, '2022-08-20', 3, NULL, 0, 0, 0, 1),
(528, 2, 2, '2022-08-21', 3, NULL, 0, 0, 0, 1),
(529, 2, 2, '2022-08-22', 3, NULL, 0, 0, 0, 1),
(530, 2, 2, '2022-08-23', 3, NULL, 0, 0, 0, 1),
(531, 2, 2, '2022-08-24', 3, NULL, 0, 0, 0, 1),
(532, 2, 2, '2022-08-25', 3, NULL, 0, 0, 0, 1),
(533, 2, 2, '2022-08-26', 3, NULL, 0, 0, 0, 1),
(534, 2, 2, '2022-08-27', 3, NULL, 0, 0, 0, 1),
(535, 2, 2, '2022-08-28', 3, NULL, 0, 0, 0, 1),
(536, 2, 2, '2022-08-29', 3, NULL, 0, 0, 0, 1),
(537, 3, 3, '2022-08-20', 6, NULL, 0, 0, 0, 1),
(538, 3, 3, '2022-08-21', 4, NULL, 0, 0, 0, 1),
(539, 3, 3, '2022-08-22', 4, NULL, 0, 0, 0, 1),
(540, 3, 3, '2022-08-23', 4, NULL, 0, 0, 0, 1),
(541, 3, 3, '2022-08-24', 4, NULL, 0, 0, 0, 1),
(542, 3, 3, '2022-08-25', 4, NULL, 0, 0, 0, 1),
(543, 3, 3, '2022-08-26', 4, NULL, 0, 0, 0, 1),
(544, 1, 1, '2022-07-30', 8, NULL, 0, 0, 0, 1),
(545, 3, 3, '2022-08-27', 4, NULL, 0, 0, 0, 1),
(546, 1, 1, '2022-07-31', 7, NULL, 0, 0, 0, 1),
(547, 3, 3, '2022-08-28', 4, NULL, 0, 0, 0, 1),
(548, 3, 3, '2022-08-29', 4, NULL, 0, 0, 0, 1),
(549, 2, 2, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(550, 2, 2, '2022-07-31', 0, NULL, 0, 0, 0, 1),
(551, 4, 4, '2022-08-20', 3, NULL, 0, 0, 0, 1),
(552, 4, 4, '2022-08-21', 3, NULL, 0, 0, 0, 1),
(553, 4, 4, '2022-08-22', 3, NULL, 0, 0, 0, 1),
(554, 3, 3, '2022-07-30', 3, NULL, 0, 0, 0, 1),
(555, 4, 4, '2022-08-23', 3, NULL, 0, 0, 0, 1),
(556, 4, 4, '2022-08-24', 3, NULL, 0, 0, 0, 1),
(557, 3, 3, '2022-07-31', 2, NULL, 0, 0, 0, 1),
(558, 4, 4, '2022-08-25', 3, NULL, 0, 0, 0, 1),
(559, 4, 4, '2022-08-26', 3, NULL, 0, 0, 0, 1),
(560, 4, 4, '2022-08-27', 3, NULL, 0, 0, 0, 1),
(561, 4, 4, '2022-07-30', 3, NULL, 0, 0, 0, 1),
(562, 4, 4, '2022-08-28', 3, NULL, 0, 0, 0, 1),
(563, 4, 4, '2022-07-31', 3, NULL, 0, 0, 0, 1),
(564, 4, 4, '2022-08-29', 3, NULL, 0, 0, 0, 1),
(565, 1, 1, '2022-09-01', 4, NULL, 0, 0, 0, 1),
(566, 1, 1, '2022-09-02', 4, NULL, 0, 0, 0, 1),
(567, 1, 1, '2022-09-03', 4, NULL, 0, 0, 0, 1),
(568, 1, 1, '2022-09-04', 4, NULL, 0, 0, 0, 1),
(569, 1, 1, '2022-09-05', 4, NULL, 0, 0, 0, 1),
(570, 1, 1, '2022-09-06', 4, NULL, 0, 0, 0, 1),
(571, 1, 1, '2022-09-07', 4, NULL, 0, 0, 0, 1),
(572, 1, 1, '2022-09-08', 4, NULL, 0, 0, 0, 1),
(573, 1, 1, '2022-09-09', 4, NULL, 0, 0, 0, 1),
(574, 1, 1, '2022-09-10', 4, NULL, 0, 0, 0, 1),
(575, 2, 2, '2022-09-01', 3, NULL, 0, 0, 0, 1),
(576, 2, 2, '2022-09-02', 3, NULL, 0, 0, 0, 1),
(577, 2, 2, '2022-09-03', 3, NULL, 0, 0, 0, 1),
(578, 2, 2, '2022-09-04', 3, NULL, 0, 0, 0, 1),
(579, 2, 2, '2022-09-05', 3, NULL, 0, 0, 0, 1),
(580, 2, 2, '2022-09-06', 3, NULL, 0, 0, 0, 1),
(581, 2, 2, '2022-09-07', 3, NULL, 0, 0, 0, 1),
(582, 2, 2, '2022-09-08', 3, NULL, 0, 0, 0, 1),
(583, 2, 2, '2022-09-09', 3, NULL, 0, 0, 0, 1),
(584, 2, 2, '2022-09-10', 3, NULL, 0, 0, 0, 1),
(585, 3, 3, '2022-09-01', 5, NULL, 0, 0, 0, 1),
(586, 3, 3, '2022-09-02', 5, NULL, 0, 0, 0, 1),
(587, 3, 3, '2022-09-03', 5, NULL, 0, 0, 0, 1),
(588, 3, 3, '2022-09-04', 5, NULL, 0, 0, 0, 1),
(589, 3, 3, '2022-09-05', 5, NULL, 0, 0, 0, 1),
(590, 3, 3, '2022-09-06', 5, NULL, 0, 0, 0, 1),
(591, 1, 1, '2022-10-01', 5, NULL, 0, 0, 0, 1),
(592, 3, 3, '2022-09-07', 5, NULL, 0, 0, 0, 1),
(593, 3, 3, '2022-09-08', 5, NULL, 0, 0, 0, 1),
(594, 1, 1, '2022-10-02', 5, NULL, 0, 0, 0, 1),
(595, 3, 3, '2022-09-09', 5, NULL, 0, 0, 0, 1),
(596, 1, 1, '2022-10-03', 5, NULL, 0, 0, 0, 1),
(597, 3, 3, '2022-09-10', 5, NULL, 0, 0, 0, 1),
(598, 1, 1, '2022-10-04', 5, NULL, 0, 0, 0, 1),
(599, 1, 1, '2022-10-05', 5, NULL, 0, 0, 0, 1),
(600, 1, 1, '2022-10-06', 5, NULL, 0, 0, 0, 1),
(601, 4, 4, '2022-09-01', 3, NULL, 0, 0, 0, 1),
(602, 4, 4, '2022-09-02', 3, NULL, 0, 0, 0, 1),
(603, 1, 1, '2022-10-07', 5, NULL, 0, 0, 0, 1),
(604, 4, 4, '2022-09-03', 3, NULL, 0, 0, 0, 1),
(605, 4, 4, '2022-09-04', 3, NULL, 0, 0, 0, 1),
(606, 1, 1, '2022-10-08', 5, NULL, 0, 0, 0, 1),
(607, 4, 4, '2022-09-05', 3, NULL, 0, 0, 0, 1),
(608, 4, 4, '2022-09-06', 3, NULL, 0, 0, 0, 1),
(609, 1, 1, '2022-10-09', 5, NULL, 0, 0, 0, 1),
(610, 4, 4, '2022-09-07', 3, NULL, 0, 0, 0, 1),
(611, 4, 4, '2022-09-08', 3, NULL, 0, 0, 0, 1),
(612, 1, 1, '2022-10-10', 5, NULL, 0, 0, 0, 1),
(613, 4, 4, '2022-09-09', 3, NULL, 0, 0, 0, 1),
(614, 4, 4, '2022-09-10', 3, NULL, 0, 0, 0, 1),
(615, 2, 2, '2022-10-01', 3, NULL, 0, 0, 0, 1),
(616, 2, 2, '2022-10-02', 3, NULL, 0, 0, 0, 1),
(617, 2, 2, '2022-10-03', 3, NULL, 0, 0, 0, 1),
(618, 2, 2, '2022-10-04', 3, NULL, 0, 0, 0, 1),
(619, 2, 2, '2022-10-05', 3, NULL, 0, 0, 0, 1),
(620, 2, 2, '2022-10-06', 3, NULL, 0, 0, 0, 1),
(621, 2, 2, '2022-10-07', 3, NULL, 0, 0, 0, 1),
(622, 1, 1, '2022-09-11', 4, NULL, 0, 0, 0, 1),
(623, 1, 1, '2022-09-12', 4, NULL, 0, 0, 0, 1),
(624, 2, 2, '2022-10-08', 3, NULL, 0, 0, 0, 1),
(625, 1, 1, '2022-09-13', 4, NULL, 0, 0, 0, 1),
(626, 2, 2, '2022-10-09', 3, NULL, 0, 0, 0, 1),
(627, 1, 1, '2022-09-14', 4, NULL, 0, 0, 0, 1),
(628, 1, 1, '2022-09-15', 4, NULL, 0, 0, 0, 1),
(629, 2, 2, '2022-10-10', 3, NULL, 0, 0, 0, 1),
(630, 1, 1, '2022-09-16', 4, NULL, 0, 0, 0, 1),
(631, 1, 1, '2022-09-17', 4, NULL, 0, 0, 0, 1),
(632, 1, 1, '2022-09-18', 4, NULL, 0, 0, 0, 1),
(633, 1, 1, '2022-09-19', 4, NULL, 0, 0, 0, 1),
(634, 3, 3, '2022-10-01', 4, NULL, 0, 0, 0, 1),
(635, 3, 3, '2022-10-02', 4, NULL, 0, 0, 0, 1),
(636, 3, 3, '2022-10-03', 4, NULL, 0, 0, 0, 1),
(637, 2, 2, '2022-09-11', 3, NULL, 0, 0, 0, 1),
(638, 2, 2, '2022-09-12', 3, NULL, 0, 0, 0, 1),
(639, 3, 3, '2022-10-04', 4, NULL, 0, 0, 0, 1),
(640, 2, 2, '2022-09-13', 3, NULL, 0, 0, 0, 1),
(641, 2, 2, '2022-09-14', 3, NULL, 0, 0, 0, 1),
(642, 3, 3, '2022-10-05', 4, NULL, 0, 0, 0, 1),
(643, 2, 2, '2022-09-15', 3, NULL, 0, 0, 0, 1),
(644, 3, 3, '2022-10-06', 4, NULL, 0, 0, 0, 1),
(645, 2, 2, '2022-09-16', 3, NULL, 0, 0, 0, 1),
(646, 2, 2, '2022-09-17', 3, NULL, 0, 0, 0, 1),
(647, 3, 3, '2022-10-07', 4, NULL, 0, 0, 0, 1),
(648, 2, 2, '2022-09-18', 3, NULL, 0, 0, 0, 1),
(649, 2, 2, '2022-09-19', 3, NULL, 0, 0, 0, 1),
(650, 3, 3, '2022-10-08', 4, NULL, 0, 0, 0, 1),
(651, 3, 3, '2022-09-11', 5, NULL, 0, 0, 0, 1),
(652, 3, 3, '2022-10-09', 4, NULL, 0, 0, 0, 1),
(653, 3, 3, '2022-09-12', 5, NULL, 0, 0, 0, 1),
(654, 3, 3, '2022-09-13', 5, NULL, 0, 0, 0, 1),
(655, 3, 3, '2022-10-10', 4, NULL, 0, 0, 0, 1),
(656, 3, 3, '2022-09-14', 5, NULL, 0, 0, 0, 1),
(657, 3, 3, '2022-09-15', 5, NULL, 0, 0, 0, 1),
(658, 3, 3, '2022-09-16', 5, NULL, 0, 0, 0, 1),
(659, 3, 3, '2022-09-17', 5, NULL, 0, 0, 0, 1),
(660, 3, 3, '2022-09-18', 5, NULL, 0, 0, 0, 1),
(661, 4, 4, '2022-10-01', 4, NULL, 0, 0, 0, 1),
(662, 3, 3, '2022-09-19', 5, NULL, 0, 0, 0, 1),
(663, 4, 4, '2022-10-02', 4, NULL, 0, 0, 0, 1),
(664, 4, 4, '2022-09-11', 3, NULL, 0, 0, 0, 1),
(665, 4, 4, '2022-10-03', 4, NULL, 0, 0, 0, 1),
(666, 4, 4, '2022-09-12', 3, NULL, 0, 0, 0, 1),
(667, 4, 4, '2022-09-13', 3, NULL, 0, 0, 0, 1),
(668, 4, 4, '2022-10-04', 4, NULL, 0, 0, 0, 1),
(669, 4, 4, '2022-09-14', 3, NULL, 0, 0, 0, 1),
(670, 4, 4, '2022-10-05', 4, NULL, 0, 0, 0, 1),
(671, 4, 4, '2022-09-15', 3, NULL, 0, 0, 0, 1),
(672, 4, 4, '2022-10-06', 4, NULL, 0, 0, 0, 1),
(673, 4, 4, '2022-09-16', 3, NULL, 0, 0, 0, 1),
(674, 4, 4, '2022-09-17', 3, NULL, 0, 0, 0, 1),
(675, 4, 4, '2022-10-07', 4, NULL, 0, 0, 0, 1),
(676, 4, 4, '2022-09-18', 3, NULL, 0, 0, 0, 1),
(677, 4, 4, '2022-10-08', 4, NULL, 0, 0, 0, 1),
(678, 4, 4, '2022-09-19', 3, NULL, 0, 0, 0, 1),
(679, 4, 4, '2022-10-09', 4, NULL, 0, 0, 0, 1),
(680, 4, 4, '2022-10-10', 4, NULL, 0, 0, 0, 1),
(681, 1, 1, '2022-09-20', 4, NULL, 0, 0, 0, 1),
(682, 1, 1, '2022-09-21', 4, NULL, 0, 0, 0, 1),
(683, 1, 1, '2022-09-22', 4, NULL, 0, 0, 0, 1),
(684, 1, 1, '2022-09-23', 14, NULL, 0, 0, 0, 1),
(685, 1, 1, '2022-09-24', 14, NULL, 0, 0, 0, 1),
(686, 1, 1, '2022-09-25', 14, NULL, 0, 0, 0, 1),
(687, 1, 1, '2022-09-26', 14, NULL, 0, 0, 0, 1),
(688, 1, 1, '2022-09-27', 4, NULL, 0, 0, 0, 1),
(689, 1, 1, '2022-09-28', 4, NULL, 0, 0, 0, 1),
(690, 1, 1, '2022-09-29', 4, NULL, 0, 0, 0, 1),
(691, 2, 2, '2022-09-20', 3, NULL, 0, 0, 0, 1),
(692, 2, 2, '2022-09-21', 3, NULL, 0, 0, 0, 1),
(693, 2, 2, '2022-09-22', 3, NULL, 0, 0, 0, 1),
(694, 2, 2, '2022-09-23', 3, NULL, 0, 0, 0, 1),
(695, 2, 2, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(696, 2, 2, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(697, 2, 2, '2022-09-26', 3, NULL, 0, 0, 0, 1),
(698, 2, 2, '2022-09-27', 3, NULL, 0, 0, 0, 1),
(699, 2, 2, '2022-09-28', 3, NULL, 0, 0, 0, 1),
(700, 2, 2, '2022-09-29', 3, NULL, 0, 0, 0, 1),
(701, 3, 3, '2022-11-04', 2, NULL, 0, 0, 0, 1),
(702, 3, 3, '2022-11-05', 2, NULL, 0, 0, 0, 1),
(703, 3, 3, '2022-09-20', 5, NULL, 0, 0, 0, 1),
(704, 3, 3, '2022-09-21', 5, NULL, 0, 0, 0, 1),
(705, 3, 3, '2022-09-22', 5, NULL, 0, 0, 0, 1),
(706, 3, 3, '2022-09-23', 5, NULL, 0, 0, 0, 1),
(707, 3, 3, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(708, 3, 3, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(709, 3, 3, '2022-09-26', 5, NULL, 0, 0, 0, 1),
(710, 3, 3, '2022-09-27', 5, NULL, 0, 0, 0, 1),
(711, 3, 3, '2022-09-28', 5, NULL, 0, 0, 0, 1),
(712, 3, 3, '2022-09-29', 5, NULL, 0, 0, 0, 1),
(713, 4, 4, '2022-09-20', 3, NULL, 0, 0, 0, 1),
(714, 4, 4, '2022-09-21', 3, NULL, 0, 0, 0, 1),
(715, 4, 4, '2022-09-22', 3, NULL, 0, 0, 0, 1),
(716, 4, 4, '2022-09-23', 3, NULL, 0, 0, 0, 1),
(717, 4, 4, '2022-09-24', 3, NULL, 0, 0, 0, 1),
(718, 4, 4, '2022-09-25', 3, NULL, 0, 0, 0, 1),
(719, 4, 4, '2022-09-26', 3, NULL, 0, 0, 0, 1),
(720, 4, 4, '2022-09-27', 3, NULL, 0, 0, 0, 1),
(721, 4, 4, '2022-09-28', 3, NULL, 0, 0, 0, 1),
(722, 4, 4, '2022-09-29', 3, NULL, 0, 0, 0, 1),
(723, 1, 1, '2022-09-30', 4, NULL, 0, 0, 0, 1),
(724, 2, 2, '2022-09-30', 3, NULL, 0, 0, 0, 1),
(725, 3, 3, '2022-09-30', 5, NULL, 0, 0, 0, 1),
(726, 4, 4, '2022-09-30', 3, NULL, 0, 0, 0, 1),
(727, 3, 3, '2022-06-09', 2, NULL, 0, 0, 0, 1),
(728, 8, 8, '2022-07-28', 1, NULL, 0, 0, 0, 1),
(729, 8, 8, '2022-07-29', 1, NULL, 0, 0, 0, 1),
(730, 8, 8, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(731, 1, 1, '2023-07-01', 2, '1000', 0, 0, 0, 1),
(732, 1, 1, '2022-10-11', 5, NULL, 0, 0, 0, 1),
(733, 1, 1, '2022-10-12', 5, NULL, 0, 0, 0, 1),
(734, 1, 1, '2022-10-13', 5, NULL, 0, 0, 0, 1),
(735, 1, 1, '2022-10-14', 5, NULL, 0, 0, 0, 1),
(736, 1, 1, '2022-10-15', 5, NULL, 0, 0, 0, 1),
(737, 1, 1, '2022-10-16', 5, NULL, 0, 0, 0, 1),
(738, 1, 1, '2022-10-17', 5, NULL, 0, 0, 0, 1),
(739, 1, 1, '2022-10-18', 5, NULL, 0, 0, 0, 1),
(740, 1, 1, '2022-10-19', 5, NULL, 0, 0, 0, 1),
(741, 1, 1, '2022-10-20', 5, NULL, 0, 0, 0, 1),
(742, 1, 1, '2022-10-21', 5, NULL, 0, 0, 0, 1),
(743, 1, 1, '2022-10-22', 5, NULL, 0, 0, 0, 1),
(744, 1, 1, '2022-10-23', 5, NULL, 0, 0, 0, 1),
(745, 1, 1, '2022-10-24', 5, NULL, 0, 0, 0, 1),
(746, 1, 1, '2022-10-25', 5, NULL, 0, 0, 0, 1),
(747, 1, 1, '2022-10-26', 5, NULL, 0, 0, 0, 1),
(748, 1, 1, '2022-10-27', 5, NULL, 0, 0, 0, 1),
(749, 1, 1, '2022-10-28', 5, NULL, 0, 0, 0, 1),
(750, 1, 1, '2022-10-29', 5, NULL, 0, 0, 0, 1),
(751, 1, 1, '2022-10-30', 5, NULL, 0, 0, 0, 1),
(752, 1, 1, '2022-10-31', 5, NULL, 0, 0, 0, 1),
(753, 2, 2, '2022-10-11', 3, NULL, 0, 0, 0, 1),
(754, 2, 2, '2022-10-12', 3, NULL, 0, 0, 0, 1),
(755, 2, 2, '2022-10-13', 3, NULL, 0, 0, 0, 1),
(756, 2, 2, '2022-10-14', 3, NULL, 0, 0, 0, 1),
(757, 2, 2, '2022-10-15', 3, NULL, 0, 0, 0, 1),
(758, 2, 2, '2022-10-16', 3, NULL, 0, 0, 0, 1),
(759, 2, 2, '2022-10-17', 3, NULL, 0, 0, 0, 1),
(760, 2, 2, '2022-10-18', 3, NULL, 0, 0, 0, 1),
(761, 2, 2, '2022-10-19', 3, NULL, 0, 0, 0, 1),
(762, 2, 2, '2022-10-20', 3, NULL, 0, 0, 0, 1),
(763, 2, 2, '2022-10-21', 3, NULL, 0, 0, 0, 1),
(764, 2, 2, '2022-10-22', 3, NULL, 0, 0, 0, 1),
(765, 2, 2, '2022-10-23', 3, NULL, 0, 0, 0, 1),
(766, 2, 2, '2022-10-24', 3, NULL, 0, 0, 0, 1),
(767, 2, 2, '2022-10-25', 3, NULL, 0, 0, 0, 1),
(768, 2, 2, '2022-10-26', 3, NULL, 0, 0, 0, 1),
(769, 2, 2, '2022-10-27', 3, NULL, 0, 0, 0, 1),
(770, 2, 2, '2022-10-28', 3, NULL, 0, 0, 0, 1),
(771, 2, 2, '2022-10-29', 3, NULL, 0, 0, 0, 1),
(772, 2, 2, '2022-10-30', 3, NULL, 0, 0, 0, 1),
(773, 2, 2, '2022-10-31', 3, NULL, 0, 0, 0, 1),
(774, 3, 3, '2022-10-11', 4, NULL, 0, 0, 0, 1),
(775, 3, 3, '2022-10-12', 4, NULL, 0, 0, 0, 1),
(776, 3, 3, '2022-10-13', 4, NULL, 0, 0, 0, 1),
(777, 3, 3, '2022-10-14', 4, NULL, 0, 0, 0, 1),
(778, 3, 3, '2022-10-15', 4, NULL, 0, 0, 0, 1),
(779, 3, 3, '2022-10-16', 4, NULL, 0, 0, 0, 1),
(780, 3, 3, '2022-10-17', 4, NULL, 0, 0, 0, 1),
(781, 3, 3, '2022-10-18', 4, NULL, 0, 0, 0, 1),
(782, 3, 3, '2022-10-19', 4, NULL, 0, 0, 0, 1),
(783, 3, 3, '2022-10-20', 4, NULL, 0, 0, 0, 1),
(784, 3, 3, '2022-10-21', 4, NULL, 0, 0, 0, 1),
(785, 3, 3, '2022-10-22', 4, NULL, 0, 0, 0, 1),
(786, 3, 3, '2022-10-23', 4, NULL, 0, 0, 0, 1),
(787, 3, 3, '2022-10-24', 4, NULL, 0, 0, 0, 1),
(788, 3, 3, '2022-10-25', 4, NULL, 0, 0, 0, 1),
(789, 3, 3, '2022-10-26', 4, NULL, 0, 0, 0, 1),
(790, 3, 3, '2022-10-27', 4, NULL, 0, 0, 0, 1),
(791, 3, 3, '2022-10-28', 4, NULL, 0, 0, 0, 1),
(792, 3, 3, '2022-10-29', 4, NULL, 0, 0, 0, 1),
(793, 3, 3, '2022-10-30', 4, NULL, 0, 0, 0, 1),
(794, 3, 3, '2022-10-31', 4, NULL, 0, 0, 0, 1),
(795, 4, 4, '2022-10-11', 4, NULL, 0, 0, 0, 1),
(796, 4, 4, '2022-10-12', 4, NULL, 0, 0, 0, 1),
(797, 4, 4, '2022-10-13', 4, NULL, 0, 0, 0, 1),
(798, 4, 4, '2022-10-14', 4, NULL, 0, 0, 0, 1),
(799, 4, 4, '2022-10-15', 4, NULL, 0, 0, 0, 1),
(800, 4, 4, '2022-10-16', 4, NULL, 0, 0, 0, 1),
(801, 4, 4, '2022-10-17', 4, NULL, 0, 0, 0, 1),
(802, 4, 4, '2022-10-18', 4, NULL, 0, 0, 0, 1),
(803, 4, 4, '2022-10-19', 4, NULL, 0, 0, 0, 1),
(804, 4, 4, '2022-10-20', 4, NULL, 0, 0, 0, 1),
(805, 4, 4, '2022-10-21', 4, NULL, 0, 0, 0, 1),
(806, 4, 4, '2022-10-22', 4, NULL, 0, 0, 0, 1),
(807, 4, 4, '2022-10-23', 4, NULL, 0, 0, 0, 1),
(808, 4, 4, '2022-10-24', 4, NULL, 0, 0, 0, 1),
(809, 4, 4, '2022-10-25', 4, NULL, 0, 0, 0, 1),
(810, 4, 4, '2022-10-26', 4, NULL, 0, 0, 0, 1),
(811, 4, 4, '2022-10-27', 4, NULL, 0, 0, 0, 1),
(812, 4, 4, '2022-10-28', 4, NULL, 0, 0, 0, 1),
(813, 4, 4, '2022-10-29', 4, NULL, 0, 0, 0, 1),
(814, 4, 4, '2022-10-30', 4, NULL, 0, 0, 0, 1),
(815, 4, 4, '2022-10-31', 4, NULL, 0, 0, 0, 1),
(816, 5, 5, '2022-08-11', 2, NULL, 0, 0, 0, 1),
(817, 5, 5, '2022-08-12', 2, NULL, 0, 0, 0, 1),
(818, 5, 5, '2022-08-13', 1, NULL, 0, 0, 0, 1),
(819, 5, 5, '2022-08-14', 2, NULL, 0, 0, 0, 1),
(820, 6, 6, '2022-08-16', 0, NULL, 0, 0, 0, 0),
(821, 6, 6, '2022-08-17', 0, NULL, 0, 0, 0, 0),
(822, 6, 6, '2022-08-18', 0, NULL, 0, 0, 0, 0),
(823, 5, 5, '2022-08-16', 2, NULL, 0, 0, 0, 1),
(824, 5, 5, '2022-08-17', 2, NULL, 0, 0, 0, 1),
(825, 5, 5, '2022-08-18', 2, NULL, 0, 0, 0, 1),
(826, 5, 5, '2022-08-19', 2, NULL, 0, 0, 0, 1),
(827, 7, 7, '2022-10-04', 1, NULL, 0, 0, 0, 1),
(828, 7, 7, '2022-10-05', 1, NULL, 0, 0, 0, 1),
(829, 7, 7, '2022-10-06', 1, NULL, 0, 0, 0, 1),
(830, 5, 5, '2022-07-22', 1, NULL, 0, 0, 0, 1),
(831, 5, 5, '2022-07-23', 1, NULL, 0, 0, 0, 1),
(832, 4, 4, '2022-08-13', 3, NULL, 0, 0, 0, 1),
(833, 6, 6, '2022-07-01', 2, NULL, 0, 0, 0, 1),
(834, 6, 6, '2022-07-02', 0, NULL, 0, 0, 0, 1),
(835, 1, 9, '2022-07-03', 2, NULL, 0, 0, 0, 1),
(836, 1, 9, '2022-07-04', 2, NULL, 0, 0, 0, 1),
(837, 1, 9, '2022-07-05', 2, NULL, 0, 0, 0, 1),
(838, 1, 9, '2022-07-06', 2, NULL, 0, 0, 0, 1),
(839, 1, 9, '2022-07-07', 2, NULL, 0, 0, 0, 1),
(840, 1, 9, '2022-07-08', 2, NULL, 0, 0, 0, 1),
(841, 4, 4, '2022-08-14', 3, NULL, 0, 0, 0, 1),
(842, 5, 5, '2022-07-12', 0, NULL, 0, 0, 0, 1),
(843, 1, 9, '2022-07-14', 6, NULL, 0, 0, 0, 1),
(844, 1, 9, '2022-07-15', 5, NULL, 0, 0, 0, 1),
(845, 1, 9, '2022-07-16', 5, NULL, 0, 0, 0, 1),
(846, 1, 9, '2022-07-17', 6, NULL, 0, 0, 0, 1),
(847, 3, 3, '2022-12-10', 0, NULL, 0, 0, 0, 1),
(848, 3, 3, '2022-12-11', 0, NULL, 0, 0, 0, 1),
(849, 3, 3, '2022-12-12', 0, NULL, 0, 0, 0, 1),
(850, 4, 4, '2022-12-10', 2, NULL, 0, 0, 0, 1),
(851, 4, 4, '2022-12-11', 2, NULL, 0, 0, 0, 1),
(852, 4, 4, '2022-12-12', 2, NULL, 0, 0, 0, 1),
(853, 1, 9, '2022-08-13', 4, NULL, 0, 0, 0, 1),
(854, 5, 5, '2022-07-15', 0, NULL, 0, 0, 0, 1),
(855, 5, 5, '2022-07-16', 0, NULL, 0, 0, 0, 1),
(856, 7, 7, '2022-07-23', 0, NULL, 0, 0, 0, 1),
(857, 7, 7, '2022-07-24', 0, NULL, 0, 0, 0, 1),
(858, 1, 9, '2022-08-14', 6, NULL, 0, 0, 0, 1),
(859, 5, 5, '2022-07-19', 0, NULL, 0, 0, 0, 1),
(860, 8, 8, '2022-07-23', 1, NULL, 0, 0, 0, 1),
(861, 8, 8, '2022-07-24', 1, NULL, 0, 0, 0, 1),
(862, 8, 8, '2022-07-25', 1, NULL, 0, 0, 0, 1),
(863, 6, 6, '2022-07-21', 0, NULL, 0, 0, 0, 1),
(864, 5, 5, '2022-07-21', 1, NULL, 0, 0, 0, 1),
(865, 7, 7, '2022-08-04', 1, NULL, 0, 0, 0, 1),
(866, 7, 7, '2022-08-05', 1, NULL, 0, 0, 0, 1),
(867, 7, 7, '2022-08-06', 1, NULL, 0, 0, 0, 1),
(868, 7, 7, '2022-08-07', 1, NULL, 0, 0, 0, 1),
(869, 7, 7, '2022-08-08', 0, NULL, 0, 0, 0, 1),
(870, 5, 5, '2022-08-04', 1, NULL, 0, 0, 0, 1),
(871, 5, 5, '2022-08-05', 2, NULL, 0, 0, 0, 1),
(872, 5, 5, '2022-08-06', 3, NULL, 0, 0, 0, 1),
(873, 5, 5, '2022-08-07', 1, NULL, 0, 0, 0, 1),
(874, 5, 5, '2022-08-08', 0, NULL, 0, 0, 0, 1),
(875, 1, 9, '2022-08-12', 3, NULL, 0, 0, 0, 1),
(876, 1, 9, '2022-08-15', 4, NULL, 0, 0, 0, 1),
(877, 6, 6, '2022-08-20', 1, NULL, 0, 0, 0, 1),
(878, 6, 6, '2022-08-21', 1, NULL, 0, 0, 0, 1),
(879, 6, 6, '2022-08-22', 1, NULL, 0, 0, 0, 1),
(880, 8, 8, '2022-08-06', 1, NULL, 0, 0, 0, 1),
(881, 3, 3, '2022-11-01', 4, NULL, 0, 0, 0, 1),
(882, 3, 3, '2022-11-02', 1, NULL, 0, 0, 0, 1),
(883, 1, 9, '2022-07-22', 4, NULL, 0, 0, 0, 1),
(884, 1, 9, '2022-07-23', 5, NULL, 0, 0, 0, 1),
(885, 1, 9, '2022-07-24', 6, NULL, 0, 0, 0, 1),
(886, 5, 5, '2022-07-24', 1, NULL, 0, 0, 0, 1),
(887, 8, 8, '2022-08-09', 1, NULL, 0, 0, 0, 1),
(888, 8, 8, '2022-08-10', 1, NULL, 0, 0, 0, 1),
(889, 8, 8, '2022-08-11', 1, NULL, 0, 0, 0, 1),
(890, 5, 5, '2022-08-15', 1, NULL, 0, 0, 0, 1),
(891, 6, 6, '2022-08-15', 1, NULL, 0, 0, 0, 1),
(892, 5, 5, '2022-07-30', 2, NULL, 0, 0, 0, 1),
(893, 6, 6, '2022-07-30', 1, NULL, 0, 0, 0, 1),
(894, 6, 6, '2022-07-31', 3, NULL, 0, 0, 0, 1),
(895, 6, 6, '2022-08-01', 1, NULL, 0, 0, 0, 1),
(896, 3, 3, '2022-12-24', 1, NULL, 0, 0, 0, 1),
(897, 3, 3, '2022-12-25', 1, NULL, 0, 0, 0, 1),
(898, 3, 3, '2022-12-26', 1, NULL, 0, 0, 0, 1),
(899, 3, 3, '2022-12-27', 1, NULL, 0, 0, 0, 1),
(900, 3, 3, '2022-12-28', 1, NULL, 0, 0, 0, 1),
(901, 3, 3, '2022-12-29', 1, NULL, 0, 0, 0, 1),
(902, 3, 3, '2022-12-30', 1, NULL, 0, 0, 0, 1),
(903, 3, 3, '2022-12-31', 1, NULL, 0, 0, 0, 1),
(904, 5, 5, '2022-07-31', 0, NULL, 0, 0, 0, 1),
(905, 5, 5, '2022-08-01', 0, NULL, 0, 0, 0, 1),
(906, 5, 5, '2022-08-02', 0, NULL, 0, 0, 0, 1),
(907, 1, 9, '2022-07-31', 7, NULL, 0, 0, 0, 1),
(908, 1, 9, '2022-07-28', 8, NULL, 0, 0, 0, 1),
(909, 1, 9, '2022-07-29', 8, NULL, 0, 0, 0, 1),
(910, 1, 9, '2022-07-30', 8, NULL, 0, 0, 0, 1),
(911, 1, 9, '2022-09-24', 14, NULL, 0, 0, 0, 1),
(912, 1, 9, '2022-09-25', 14, NULL, 0, 0, 0, 1),
(913, 7, 7, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(914, 5, 5, '2022-07-29', 1, NULL, 0, 0, 0, 1),
(915, 1, 9, '2022-09-26', 14, NULL, 0, 0, 0, 1),
(916, 1, 9, '2022-09-27', 4, NULL, 0, 0, 0, 1),
(917, 1, 9, '2022-09-23', 14, NULL, 0, 0, 0, 1),
(918, 2, 11, '2022-09-24', 5, NULL, 0, 0, 0, 1),
(919, 2, 11, '2022-09-25', 5, NULL, 0, 0, 0, 1),
(920, 2, 11, '2022-07-28', 0, NULL, 0, 0, 0, 1),
(921, 2, 11, '2022-07-29', 0, NULL, 0, 0, 0, 1),
(922, 2, 11, '2022-07-30', 0, NULL, 0, 0, 0, 1),
(923, 2, 11, '2022-07-31', 0, NULL, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `offersection`
--

CREATE TABLE `offersection` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(250) NOT NULL,
  `percentage` float NOT NULL,
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offersection`
--

INSERT INTO `offersection` (`id`, `title`, `price`, `img`, `percentage`, `code`) VALUES
(1, 'Luxury Sea View Rooms Available ', 4999, 'offer_room.jpeg', 10, 'JPLUXURY10');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
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

INSERT INTO `profile` (`id`, `name`, `email`, `primaryphone`, `address`, `district`, `pincode`, `gst`, `description`, `logo`, `url`, `checkIn`, `checkOut`) VALUES
(1, 'Jamindars Palace', 'reservation@jamindarspalace.com', '7682830917', 'BLUE FLAG BEACH, CHAKRATIRTHA ROAD, PURI', 'PURI', '752002', '21AABCH4042H1Z6', 'Jamindar Palace is one among the best luxury sea-view hotel in Puri and has stunning views of the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea-view hotel in Puri', 'logo.png', 'https://jamindarspalace.com', '10.00 AM', '08.00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `quickpay`
--

CREATE TABLE `quickpay` (
  `id` int(11) NOT NULL,
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

INSERT INTO `setting` (`id`, `maxRoomCapacity`, `advancePay`, `pckupDropPrice`, `pckupDropCaption`, `PartialPaymentPrice`, `partialPaymentCaption`, `pckupDropStatus`, `partialPaymentStatus`, `payByRoom`) VALUES
(1, 6, 7499, 5000, '                   ', 50, '', 0, 1, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
