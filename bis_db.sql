-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 02:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `action` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, '41', '2022-09-21 08:35:19', 'Delete Resident ha h | Deleted by admin'),
(2, '41', '2022-09-21 08:35:37', 'Archived resident qwe qwe | Archived by admin'),
(3, '41', '2022-09-21 08:35:46', 'Delete Resident qwe qwe | Deleted by admin'),
(4, '41', '2022-09-21 08:37:09', 'Archived resident w w | Archived by admin'),
(5, '41', '2022-09-21 08:41:21', 'Unarchive Resident w w | Unarchive by admin'),
(6, '41', '2022-09-21 17:37:42', 'Accept request Barangay Indigency | Accepted by admin'),
(7, '41', '2022-09-22 08:00:30', 'Accept request Barangay Clearance | Declined by admin'),
(8, '41', '2022-09-22 08:10:47', 'Accept request Barangay Indigency | Accepted by admin'),
(9, '41', '2022-09-22 08:23:59', 'Mark Barangay Indigency as ready to pickup | Mark by admin'),
(10, '41', '2022-09-22 08:24:29', 'Mark Barangay Clearance as ready to pickup | Mark by admin'),
(11, '41', '2022-09-22 08:25:09', 'Mark Barangay Clearance as ready to pickup | Mark by admin'),
(12, '41', '2022-09-22 08:25:41', 'Mark Barangay Residency as ready to pickup | Mark by admin'),
(13, '41', '2022-09-22 08:27:58', 'Accept request Barangay Clearance | Declined by admin'),
(14, '41', '2022-09-22 08:29:40', 'Accept request Barangay Indigency | Declined by admin'),
(15, '41', '2022-09-22 08:30:01', 'Mark Barangay Residency as ready to pickup | Mark by admin'),
(16, '41', '2022-09-22 08:39:55', 'Mark Barangay Indigency as completed | Mark by admin'),
(17, '41', '2022-09-22 08:43:39', 'Mark Barangay Clearance as completed | Mark by admin'),
(18, '41', '2022-09-22 08:43:50', 'Mark Barangay Clearance as completed | Mark by admin'),
(19, '41', '2022-10-01 08:01:08', 'Archived resident w w | Archived by admin'),
(20, '41', '2022-10-01 08:02:04', 'Unarchive Resident w w | Unarchive by admin'),
(21, '41', '2022-10-02 16:11:50', 'Add new user qwe | Added by admin'),
(22, '41', '2022-10-02 16:13:20', 'Add new user qwe | Added by admin'),
(23, '41', '2022-10-02 16:21:28', 'Add new user qwe | Added by admin'),
(24, '41', '2022-10-03 08:17:37', 'Add new user qwe | Added by admin'),
(25, '41', '2022-10-03 08:17:49', 'Add new user qwe | Added by admin'),
(26, '41', '2022-10-03 08:20:14', 'Add new user qwe | Added by admin'),
(27, '41', '2022-10-03 02:37:29', 'Update User sec | Updated by admin'),
(28, '41', '2022-10-03 02:37:52', 'Update User  | Updated by admin'),
(29, '41', '2022-10-03 02:38:45', 'Update User secww | Updated by admin'),
(30, '41', '2022-10-03 08:41:20', 'Edit user secww | Added by admin'),
(31, '41', '2022-10-03 08:50:48', 'Add new user edward aguilar | Added by admin'),
(32, '41', '2022-10-03 08:51:04', 'Edit user admino | Added by admin'),
(33, '41', '2022-10-03 08:52:48', 'Add new user edward | Added by admin'),
(34, '57', '2022-10-03 08:53:30', 'Add new user admin | Added by edward'),
(35, '57', '2022-10-03 08:53:48', 'Edit user admino | Added by edward'),
(36, '57', '2022-10-03 08:55:13', 'Edit user edward aguilar | Added by edward'),
(37, '57', '2022-10-03 08:56:56', 'Add new user edward aguilar | Added by edward'),
(38, '57', '2022-10-03 08:57:08', 'Edit user edward aguilar | Added by edward'),
(39, '57', '2022-10-03 08:57:37', 'Edit user edward aguilar | Added by edward'),
(40, '57', '2022-10-03 09:01:03', 'Edit user edward aguilarw | Added by edward'),
(41, '57', '2022-10-03 09:02:44', 'Edit user edward aguilar | Added by edward'),
(42, '57', '2022-10-03 09:03:13', 'Edit user edward aguilar | Added by edward'),
(43, '57', '2022-10-03 09:05:55', 'Edit user edward aguilar | Added by edward'),
(44, '57', '2022-10-03 09:06:04', 'Edit user edward aguilar | Added by edward'),
(45, '59', '2022-10-03 09:10:34', 'Edit user edward aguilar | Added by edward'),
(46, '59', '2022-10-03 09:11:14', 'Edit user edward aguilar | Added by edward'),
(47, '59', '2022-10-03 09:11:44', 'Edit user edward aguilar | Added by edward'),
(48, '59', '2022-10-03 09:12:20', 'Edit user edward aguilar | Added by edward'),
(49, '59', '2022-10-03 09:13:00', 'Edit user edward aguilar | Added by edward'),
(50, '59', '2022-10-03 09:14:49', 'Edit user admino | Added by edward'),
(51, '59', '2022-10-03 09:15:22', 'Edit user admino | Added by edward'),
(52, '59', '2022-10-03 09:15:56', 'Edit user admino | Added by edward'),
(53, '59', '2022-10-03 09:16:18', 'Edit user admino | Added by edward'),
(54, '59', '2022-10-03 09:16:27', 'Edit user admino | Added by edward'),
(55, '59', '2022-10-03 09:17:56', 'Edit user admino | Added by edward'),
(56, '59', '2022-10-03 09:18:12', 'Edit user edward aguilar | Added by edward'),
(57, '59', '2022-10-03 09:18:32', 'Edit user edward aguilar | Added by edward'),
(58, NULL, '2022-10-03 09:20:10', 'Edit user edward aguilar | Added by '),
(59, '59', '2022-10-03 19:43:16', 'Add new purok Purok 9 | Added by edward'),
(60, '59', '2022-10-03 19:50:37', 'Delete purok Purok 9 | Deleted by edward'),
(61, '59', '2022-10-03 19:58:10', 'Update purok Purok 11 | Updated by edward'),
(62, '59', '2022-10-03 19:58:16', 'Update purok Purok 1 | Updated by edward'),
(63, '59', '2022-10-05 07:48:50', 'Update barangay info | Updated by '),
(64, '59', '2022-10-05 07:48:57', 'Update barangay info | Updated by '),
(65, '59', '2022-10-05 07:49:02', 'Update barangay info | Updated by '),
(66, '59', '2022-10-05 07:55:48', 'Update barangay info | Updated by '),
(67, '59', '2022-10-05 07:57:51', 'Update barangay info | Updated by '),
(68, '59', '2022-10-05 08:03:48', 'Update barangay info | Updated by '),
(69, '59', '2022-10-05 08:03:58', 'Update barangay info | Updated by '),
(70, '59', '2022-10-05 08:04:07', 'Update barangay info | Updated by '),
(71, '59', '2022-10-05 08:05:41', 'Update barangay info | Updated by '),
(72, '59', '2022-10-05 08:05:51', 'Update barangay info | Updated by '),
(73, '59', '2022-10-05 08:06:02', 'Update barangay info | Updated by '),
(74, '59', '2022-10-05 08:06:20', 'Update barangay info | Updated by '),
(75, '59', '2022-10-05 08:06:40', 'Update barangay info | Updated by '),
(76, '59', '2022-10-05 08:06:53', 'Update barangay info | Updated by '),
(77, '59', '2022-10-05 08:07:43', 'Update barangay info | Updated by '),
(78, '59', '2022-10-05 08:12:08', 'Update barangay info | Updated by '),
(79, '59', '2022-10-05 08:12:27', 'Update barangay info | Updated by '),
(80, '59', '2022-10-05 08:16:28', 'Update barangay info | Updated by '),
(81, '59', '2022-10-05 08:16:52', 'Update barangay info | Updated by '),
(82, '59', '2022-10-05 08:17:05', 'Update barangay info | Updated by '),
(83, '59', '2022-10-05 08:17:19', 'Update barangay info | Updated by '),
(84, '59', '2022-10-05 08:17:44', 'Update barangay info | Updated by '),
(85, '59', '2022-10-05 08:47:39', 'Update forms price | Updated by edward'),
(86, NULL, '2022-10-07 11:31:46', 'spongebob squarepantsCreate an account'),
(87, NULL, '2022-10-08 08:22:48', '59'),
(88, NULL, '2022-10-11 14:20:51', NULL),
(89, NULL, '2022-10-11 14:22:17', 'Update account username spongebob | Updated by edward'),
(90, NULL, '2022-10-11 14:22:40', NULL),
(91, NULL, '2022-10-11 14:23:26', 'Update account username spongebob | Updated by edward'),
(92, NULL, '2022-10-12 07:42:03', NULL),
(93, NULL, '2022-10-12 07:59:43', '59'),
(94, NULL, '2022-10-12 08:28:09', 'Approved account of  | Approved by edward'),
(95, NULL, '2022-10-12 11:21:22', '59'),
(96, NULL, '2022-10-22 11:32:09', '59'),
(97, NULL, '2022-10-26 20:33:29', 'qwe qwe Create an account');

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `blotter_id` int(11) NOT NULL,
  `complainant` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complained_resident` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filling` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_of_filling` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`blotter_id`, `complainant`, `complained_resident`, `date_of_filling`, `time_of_filling`, `status`, `description`) VALUES
(9, 'abdul g jabol', '1', '2022-09-09', '07:28', 'pending', 'magnanakaw');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_controller`
--

CREATE TABLE `brgy_controller` (
  `id` int(11) NOT NULL,
  `enable_disable` int(11) NOT NULL COMMENT '0=enable 1=disable',
  `clearance` int(11) NOT NULL COMMENT 'controller',
  `indigency` int(11) NOT NULL,
  `certificate` int(11) NOT NULL,
  `residency` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `natID` int(11) NOT NULL,
  `business` int(11) NOT NULL,
  `demolished` int(11) NOT NULL,
  `goodMoral` int(11) NOT NULL,
  `DA` int(11) NOT NULL,
  `some_disable_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_disable_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_controller`
--

INSERT INTO `brgy_controller` (`id`, `enable_disable`, `clearance`, `indigency`, `certificate`, `residency`, `building`, `natID`, `business`, `demolished`, `goodMoral`, `DA`, `some_disable_message`, `all_disable_message`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Sorry for the inconvenience, but barangay clearance is currently unavailable. Thank you.', 'Sorry for the inconvenience, but requesting certificates is currently unavailable. Thank you po');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_forms_price`
--

CREATE TABLE `brgy_forms_price` (
  `brgy_forms_price_id` int(11) NOT NULL,
  `clearance_price` int(11) DEFAULT NULL,
  `indigency_price` int(11) DEFAULT NULL,
  `certificate_price` int(11) DEFAULT NULL,
  `residency_price` int(11) DEFAULT NULL,
  `building_price` int(11) DEFAULT NULL,
  `clearance_nat_price` int(11) DEFAULT NULL,
  `business_clearance_price` int(11) DEFAULT NULL,
  `demolished_price` int(11) DEFAULT NULL,
  `goodmoral_price` int(11) DEFAULT NULL,
  `da_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_forms_price`
--

INSERT INTO `brgy_forms_price` (`brgy_forms_price_id`, `clearance_price`, `indigency_price`, `certificate_price`, `residency_price`, `building_price`, `clearance_nat_price`, `business_clearance_price`, `demolished_price`, `goodmoral_price`, `da_price`) VALUES
(1, 404, 10, 0, 30, 100, 50, 23, 202, 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `brgy_info`
--

CREATE TABLE `brgy_info` (
  `brgy_info_id` int(11) NOT NULL,
  `province` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brgy` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brgy_logo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_logo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_info`
--

INSERT INTO `brgy_info` (`brgy_info_id`, `province`, `city`, `brgy`, `contact`, `brgy_logo`, `city_logo`) VALUES
(1, 'Nueva Ecija', 'Penaranda', 'San Josef', '09123456789', 'img/stotoaslogo.jpg', 'img/27062022180850penarandalogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_official`
--

CREATE TABLE `brgy_official` (
  `brgy_official_id` int(11) NOT NULL,
  `firstname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairmanship` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_term` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_term` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_official`
--

INSERT INTO `brgy_official` (`brgy_official_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `contact`, `address`, `civil_status`, `age`, `gender`, `position`, `chairmanship`, `start_term`, `end_term`, `picture`) VALUES
(55, 'qwe', 'w', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, 'Chairman', 'Committee on Agriculture', '2022-09-11', '2022-09-13', 'img/officialPhoto2022091825211.jpg'),
(61, 'edwardo', 'a', 'aguilar', NULL, NULL, NULL, NULL, NULL, NULL, 'Chairman', 'Barangay Chairman', '2022-09-18', '2022-09-19', 'img/officialPhoto2022091857290.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_request_certificate`
--

CREATE TABLE `brgy_request_certificate` (
  `brgy_clearance_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `purpose` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_request` datetime DEFAULT current_timestamp(),
  `date_completed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_by` int(11) DEFAULT NULL,
  `certificate_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'walkin or online',
  `revenue_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_request_certificate`
--

INSERT INTO `brgy_request_certificate` (`brgy_clearance_id`, `resident_id`, `purpose`, `payment_type`, `reason`, `amount`, `status`, `message`, `date_of_request`, `date_completed`, `issued_by`, `certificate_type`, `business_name`, `business_type`, `business_loc`, `origin`, `revenue_status`, `reference_number`, `print`) VALUES
(1, 21, 'qwe', 'Cash on pick-up', NULL, 404, 'accepted', NULL, '2022-10-10 09:45:45', NULL, NULL, 'Barangay Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(2, 21, 'qwe', 'Cash on pick-up', NULL, 404, 'accepted', NULL, '2022-10-10 09:45:55', NULL, NULL, 'Barangay Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(3, 21, 'bobo', 'Cash on pick-up', NULL, 404, 'pending', NULL, '2022-10-10 09:46:02', NULL, NULL, 'Barangay Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(4, 21, 'sample request', 'Cash on pick-up', NULL, 404, 'pending', NULL, '2022-10-10 09:48:02', NULL, NULL, 'Barangay Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(5, 21, 'qwe', 'Cash on pick-up', NULL, 404, 'pending', NULL, '2022-10-10 09:53:12', NULL, NULL, 'Barangay Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(6, 21, 'qe', 'Cash on pick-up', NULL, 10, 'cancel', NULL, '2022-10-10 10:05:29', NULL, NULL, 'Barangay Indigency', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(7, 21, 'qwe', 'Cash on pick-up', NULL, 10, 'pending', NULL, '2022-10-10 10:06:15', NULL, NULL, 'Barangay Indigency', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(8, 21, 'qwe', 'Free', NULL, NULL, 'pending', NULL, '2022-10-10 10:12:55', NULL, NULL, 'Barangay Certificate', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(9, 21, 'qwe', 'Cash on pick-up', NULL, 30, 'pending', NULL, '2022-10-10 10:15:04', NULL, NULL, 'Barangay Residency', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(10, 21, 'qwe', 'Cash on pick-up', NULL, 100, 'pending', NULL, '2022-10-10 10:17:39', NULL, NULL, 'Building Clearance', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(11, 21, 'qew', 'Cash on pick-up', NULL, 50, 'pending', NULL, '2022-10-10 13:44:50', NULL, NULL, 'Barangay Clearance NAT ID', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(12, 21, 'QWE', 'Cash on pick-up', NULL, 10, 'pending', NULL, '2022-10-10 13:56:34', NULL, NULL, 'Barangay Indigency', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(13, 21, 'ewan pa&#13;&#10;', 'Cash on pick-up', NULL, 23, 'cancel', NULL, '2022-10-10 13:57:17', NULL, NULL, 'Barangay Business Clearance', 'EWAN', 'SARE SARE', 'Purok 1, San Josef, Penaranda, Nueva Ecija', 'Online Request', NULL, '', NULL),
(14, 21, 'sample', 'Cash on pick-up', NULL, 5, 'pending', NULL, '2022-10-10 14:00:33', NULL, NULL, 'Good Moral', NULL, NULL, NULL, 'Online Request', NULL, '', NULL),
(15, 21, 'qwe', 'Cash on pick-up', NULL, 10, 'cancel', NULL, '2022-10-13 07:43:01', NULL, NULL, 'Barangay Indigency', NULL, NULL, NULL, 'Online Request', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chairmanship`
--

CREATE TABLE `chairmanship` (
  `chairmanship_id` int(11) NOT NULL,
  `chairmanship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chairmanship`
--

INSERT INTO `chairmanship` (`chairmanship_id`, `chairmanship`) VALUES
(2, 'Committee on Environmento'),
(3, 'Committee on Agriculture'),
(4, 'Committee on Finance'),
(5, 'Committee on Infrastructure'),
(6, 'Committee on Peace & Order'),
(7, 'Committee on Education'),
(8, 'Committee on Health'),
(14, 'Barangay Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_slider`
--

INSERT INTO `image_slider` (`id`, `image`, `title`, `content`) VALUES
(1, 'img/Dark-Black-Wallpapers-HD-67-Wallpapers-HD-Wallpapers-in-.jpg', 'Sample Title', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.'),
(2, 'img/wallpaperflare.com_wallpaper.jpg', 'Sample Title 2', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.'),
(3, 'img/1133845.png', 'qwe', 'qweqweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notif_status` int(11) DEFAULT NULL,
  `res_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brgy_clearance_id` int(11) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decline_mess` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification`, `date`, `link`, `notif_status`, `res_id`, `user_id`, `brgy_clearance_id`, `reason`, `status_icon`, `decline_mess`) VALUES
(1, 'Your account has been approved, you can now request a certificate.', '2022-10-12 08:28:09', 'my-profile', 1, 21, 59, NULL, NULL, 'Verified', NULL),
(2, 'Barangay Clearance request is now in process.', '2022-10-12 11:21:22', 'my_request', 1, 21, 59, 2, NULL, 'in process', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position`) VALUES
(1, 'Chairman'),
(2, 'Kagawad'),
(10, 'Secretary'),
(11, 'SK. Chairman'),
(12, 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `purok_id` int(11) NOT NULL,
  `purok` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`purok_id`, `purok`, `details`) VALUES
(1, 'Purok 1', ''),
(2, 'Purok 2', ''),
(3, 'Purok 3', ''),
(4, 'Purok 4', ''),
(5, 'Purok 5', ''),
(6, 'Purok 6', ''),
(7, 'Purok 7', ''),
(8, 'Purok 8', '');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL,
  `resident_number` int(11) DEFAULT NULL,
  `firstname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purok` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `brgy` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthplace` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `civil_status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_occupation` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years_of_residency` int(11) DEFAULT NULL,
  `contact_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voters_status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blotter_records` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_verify` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_verify_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `resident_number`, `firstname`, `middlename`, `lastname`, `email`, `username`, `password`, `purok`, `date_added`, `brgy`, `city`, `province`, `citizenship`, `resident_status`, `religion`, `gender`, `birthdate`, `birthplace`, `age`, `civil_status`, `profession_occupation`, `years_of_residency`, `contact_no`, `voters_status`, `blotter_records`, `photo`, `verification_status`, `image_verify`, `to_verify_status`, `delete_status`, `account_status`) VALUES
(1, 0, 'Edward', 'A', 'Aguilar', '', 'edward', '$2y$10$lsrtASF5R5ZxvzDJL9ALJuy.7Nv5idcCCewhqMGnHzwVTnhaAZJ5G', 'Purok 8', '2022-09-03 14:49:54', 'San Josef', 'Penaranda', 'Nueva Ecija', 'Filipino', '', 'Catholic', 'Male', '04-14-2000', 'Sto Tomas, Penaranda, Ne', 22, 'Single', 'None', 22, '09123456789', 'Yes', 'Solve', 'img/residentPIC2022092061540.jpg', 'Verified', 'img/download.jpg', '0', NULL, NULL),
(21, NULL, 'spongebob', 'a', 'squarepants', NULL, 'spongebob', '$2y$10$9OtbdqgHBNJIrRPVDDpMHOY1ykjBe0.oRWBGFij/nJoaZk2pKBgDq', 'Purok 8', '2022-10-07 11:31:45', 'San Josef', 'Penaranda', 'Nueva Ecija', 'foam', NULL, 'fishda', 'Male', 'april-14-2000', 'bikini bottom', 0, 'Single', 'cook', 22, '09123456789', 'Yes', NULL, 'img/residentPIC2022101140254.jpeg', 'Verified', 'img/residentID2022101267305.jpg', '0', NULL, NULL),
(22, NULL, 'qwe', 'w', 'qwe', NULL, 'qwe', '$2y$10$nIq3Xo8C8b/V0j9BqMJ1qekjqMm3PXxgWv74HVTA67EYx.uaRtcHu', 'Purok 1', '2022-10-26 20:33:27', 'San Josef', 'Penaranda', 'Nueva Ecija', '<script>alert(\'qwe\')</script>', NULL, 'w', 'Male', '10-26-2022', 'qwe', 0, 'Single', 'qwe', 2, '12312312312', 'Yes', NULL, 'img/person.png', 'Not Verified', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_request`
--

CREATE TABLE `type_of_request` (
  `type_of_request_id` int(11) NOT NULL,
  `type_of_request` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `user_type`, `photo`) VALUES
(57, 'admino', 'admin', '$2y$10$n9B4JvX0A9aKwjTcwasgR.4uPBWzpO/VFmZyR6v8xfOeNKBvZXJfG', 'Admin', 'img/userPIC2022100361431.jpg'),
(58, 'admino', 'admin', '$2y$10$YDIyqakgkeU3/GZyDvNyve6fTX5wuoFMB4Wh3gZltg/ImVlAq0ADS', 'Admin', 'img/userPIC2022100343753.jpg'),
(59, 'edward aguilar', 'edward', '$2y$10$WmwpJ5brHARRvCvGpHA59ua4qftgjYS4tU1BIKQQEVQADEO5W2JV2', 'Admin', 'img/userPIC2022100370118.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`blotter_id`);

--
-- Indexes for table `brgy_controller`
--
ALTER TABLE `brgy_controller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brgy_forms_price`
--
ALTER TABLE `brgy_forms_price`
  ADD PRIMARY KEY (`brgy_forms_price_id`);

--
-- Indexes for table `brgy_info`
--
ALTER TABLE `brgy_info`
  ADD PRIMARY KEY (`brgy_info_id`);

--
-- Indexes for table `brgy_official`
--
ALTER TABLE `brgy_official`
  ADD PRIMARY KEY (`brgy_official_id`);

--
-- Indexes for table `brgy_request_certificate`
--
ALTER TABLE `brgy_request_certificate`
  ADD PRIMARY KEY (`brgy_clearance_id`);

--
-- Indexes for table `chairmanship`
--
ALTER TABLE `chairmanship`
  ADD PRIMARY KEY (`chairmanship_id`);

--
-- Indexes for table `image_slider`
--
ALTER TABLE `image_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`purok_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`),
  ADD KEY `firstname` (`firstname`,`lastname`,`username`),
  ADD KEY `purok` (`purok`,`age`);

--
-- Indexes for table `type_of_request`
--
ALTER TABLE `type_of_request`
  ADD PRIMARY KEY (`type_of_request_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `blotter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brgy_controller`
--
ALTER TABLE `brgy_controller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brgy_forms_price`
--
ALTER TABLE `brgy_forms_price`
  MODIFY `brgy_forms_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brgy_info`
--
ALTER TABLE `brgy_info`
  MODIFY `brgy_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brgy_official`
--
ALTER TABLE `brgy_official`
  MODIFY `brgy_official_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `brgy_request_certificate`
--
ALTER TABLE `brgy_request_certificate`
  MODIFY `brgy_clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chairmanship`
--
ALTER TABLE `chairmanship`
  MODIFY `chairmanship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `image_slider`
--
ALTER TABLE `image_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `purok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `type_of_request`
--
ALTER TABLE `type_of_request`
  MODIFY `type_of_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
