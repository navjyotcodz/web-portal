-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `actform`
--

CREATE TABLE `actform` (
  `id` int(11) NOT NULL,
  `act_category` varchar(50) NOT NULL,
  `short_title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `applicability` int(10) NOT NULL,
  `wef` date NOT NULL,
  `state` varchar(100) NOT NULL,
  `act_industry` varchar(30) NOT NULL,
  `file_name` varchar(400) NOT NULL,
  `type_act` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `actform`
--

INSERT INTO `actform` (`id`, `act_category`, `short_title`, `description`, `applicability`, `wef`, `state`, `act_industry`, `file_name`, `type_act`, `user_id`) VALUES
(34, '4', 'dad', 'jyoti', 3, '2024-01-03', '7', '1', 'nabo/hotel10.jpg', 'State', ''),
(31, '4', 'dadd', 'sfsf', 1, '2024-01-04', '18', '1,2', 'nabo/chandrayan.jpg', 'State', ''),
(25, '1', 'drgd', 'drgdrgtdr', 1, '2024-01-02', '16', '1,2', 'nabo/chandrayan.jpg', 'National', ''),
(36, '2', 'dcvxdcvdsv', 'dfdgf', 1, '2024-01-15', '19', '1,2', 'nabo/download.jpg', 'National', ''),
(37, '2', 'rgfderge', 'ertgret', 1, '2024-01-04', '7', '1,2', 'nabo/hotel3.jpg', 'National', '51'),
(38, '1', 'ramesh', 'ksks', 3, '2024-02-01', '24', '1', 'nabo/p1.jpg', 'State', '51');

-- --------------------------------------------------------

--
-- Table structure for table `acts`
--

CREATE TABLE `acts` (
  `act_id` int(5) NOT NULL,
  `act_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acts`
--

INSERT INTO `acts` (`act_id`, `act_name`, `user_id`, `date`) VALUES
(1, 'Contract Labour Act', '', '2024-01-25 18:26:06'),
(2, 'Payment of Wages', '', '2024-01-25 18:26:06'),
(3, 'Payment of Bonus', '', '2024-01-25 18:26:06'),
(4, 'Maternity act', '', '2024-01-25 18:26:06'),
(8, 'sdfsrfsr', '', '2024-01-25 18:26:06'),
(9, 'labour law', '', '2024-01-25 18:26:06'),
(10, 'dgdg', '53', '2024-01-25 18:26:06'),
(11, 'hello', '51', '2024-01-29 18:26:06'),
(12, 'wrwrwr', '51', '2024-01-29 18:26:06'),
(13, 'ksbff', '51', '2024-02-22 22:51:23'),
(14, 'ksbff', '51', '2024-02-22 22:51:38'),
(15, 'ksbff', '51', '2024-02-22 22:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `act_industry`
--

CREATE TABLE `act_industry` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `act_industry`
--

INSERT INTO `act_industry` (`id`, `industry_name`, `user_id`, `date`) VALUES
(1, 'Building and other construction work', '0', '2024-01-29 13:38:57'),
(2, 'factory', '0', '2024-01-29 13:38:57'),
(3, 'shop or commercial establishment', '0', '2024-01-29 13:38:57'),
(6, 'dgdgd', '0', '2024-01-29 13:38:57'),
(7, 'AdA', '0', '2024-01-29 13:38:57'),
(38, 'minakshidbewdfkew', '51', '2024-01-29 13:38:57'),
(37, 'nbnbn', 'ahmed', '2024-01-29 13:38:57'),
(36, 'manishjfbasf', '51', '2024-01-29 13:38:57'),
(35, 'doremon', 'ahmed', '2024-01-29 13:38:57'),
(39, 'regretgr', '51', '2024-01-29 13:38:57'),
(40, 'nabja', '51', '2024-01-29 13:38:57'),
(41, 'drydrydry', '51', '2024-01-28 13:38:57'),
(42, 'hellooo', '51', '2024-01-29 13:38:57'),
(43, 'ss', '51', '2024-02-22 22:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `act_master`
--

CREATE TABLE `act_master` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `states_id` int(100) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `act_master`
--

INSERT INTO `act_master` (`id`, `category_name`, `states_id`, `user_id`, `date`) VALUES
(1, 'category1', 18, '', '2024-01-25 18:25:31'),
(2, 'category2', 28, '', '2024-01-25 18:25:31'),
(3, 'category3', 8, '', '2024-01-25 18:25:31'),
(4, 'category4', 18, '', '2024-01-22 18:25:31'),
(9, 'category7', NULL, '', '2024-01-22 18:25:31'),
(10, 'vjvgjg', NULL, '', '2024-01-27 18:25:31'),
(11, 'adawda', NULL, '51', '2024-01-29 18:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `states_id` int(11) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `states_id`, `user_id`, `date`) VALUES
(1, 'Gurugram', 8, '', '2024-01-25 18:27:04'),
(2, 'faridabad', 8, '', '2024-01-25 18:27:04'),
(3, 'routak', 8, '', '2024-01-25 18:27:04'),
(4, 'hisar', 8, '', '2024-01-25 18:27:04'),
(5, 'ambala', 8, '', '2024-01-25 18:27:04'),
(6, 'varturs', 35, '', '2024-01-25 18:27:04'),
(8, 'dgdr', 1, '', '2024-01-25 18:27:04'),
(9, 'atunagar', 2, '', '2024-01-25 18:27:04'),
(10, 'hisaar', 8, '', '2024-01-25 18:27:04'),
(28, 'sjsfljfdrlffl', 22, '51', '2024-01-12 18:27:04'),
(27, 'nkarmakar', 56, '51', '2024-01-25 18:27:04'),
(26, 'nabaj', 59, '', '2024-01-25 18:27:04'),
(25, 'rerertret', 20, '', '2024-01-25 18:27:04'),
(29, 'wdww', 61, '51', '2024-02-22 22:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `mapacts`
--

CREATE TABLE `mapacts` (
  `id` int(11) NOT NULL,
  `states` varchar(50) NOT NULL,
  `acts` varchar(255) NOT NULL,
  `mapdate` date NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mapacts`
--

INSERT INTO `mapacts` (`id`, `states`, `acts`, `mapdate`, `user_id`, `date`) VALUES
(23, '18', '1,2,3', '2023-12-01', '', '2024-01-25 18:28:00'),
(22, '18', '1,2', '2023-12-04', '', '2024-01-25 18:28:00'),
(19, '19', '1,4', '2023-12-01', '', '2024-01-25 18:28:00'),
(20, '7', '4', '2023-11-27', '', '2024-01-25 18:28:00'),
(27, '1', '1', '2024-01-02', '', '2024-01-25 18:28:00'),
(26, '1', '1,2', '2023-11-30', '', '2024-01-25 18:28:00'),
(25, '2', '1', '2023-12-01', '', '2024-01-25 18:28:00'),
(24, '3', '1,2,3,4', '2023-12-01', '', '2024-01-25 18:28:00'),
(12, '1', '1,2,3,4', '2023-12-04', '', '2024-01-25 18:28:00'),
(28, '3', '1', '2024-01-19', '', '2024-01-25 18:28:00'),
(29, '3', '1', '2024-01-18', '51', '2024-01-12 18:28:00'),
(30, '3', '1', '2024-01-12', '51', '2024-01-25 18:28:00'),
(31, '4', '1', '2024-01-24', '51', '2024-01-25 18:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_action` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_action`, `parent_id`) VALUES
(1, 'master', NULL, 0),
(2, 'transaction', NULL, 0),
(3, 'reports', NULL, 0),
(4, 'qualification', 'qualification.php', 1),
(5, 'acts', 'acts.php', 1),
(6, 'state', 'states.php', 1),
(7, 'city', 'city.php', 1),
(8, 'industry', 'industry.php', 1),
(9, 'category', 'category.php', 1),
(10, 'addmission', 'nav_first.php', 2),
(11, 'mapacts', 'mapacts.php', 2),
(12, 'actform', 'actform.php', 2),
(13, 'studentsview', 'nav_display.php', 3),
(14, 'statesview', 'state_master.php', 3),
(15, 'formactview', 'actform_display.php', 3),
(16, 'mapactview', 'mapact_display.php', 3),
(18, 'addmenu', 'menu_add.php', 1),
(21, 'AssignMenuView', 'assign_display.php', 3),
(22, 'AssignMenuForm', 'assign_menu.php', 2),
(23, 'userlog', 'user_log.php', 1),
(80, 'address', 'address.php', 79),
(93, 'city', 'city.php', 1),
(94, 'city', 'city.php', 1),
(95, 'city', 'city.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `quali_name` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `quali_name`, `user_id`, `date`) VALUES
(1, 'ug', '', '2024-01-25 18:25:02'),
(2, 'pg', '', '2024-01-25 18:25:02'),
(3, 'diploma', '', '2024-01-25 18:25:02'),
(4, 'masters', '', '2024-01-25 18:25:02'),
(5, 'btech', '', '2024-01-25 18:25:02'),
(6, 'bcom', '', '2024-01-25 18:25:02'),
(14, 'mcom', '', '2024-01-25 18:25:02'),
(16, 'bca', '', '2024-01-25 18:25:02'),
(15, 'bca', '', '2024-01-25 18:25:02'),
(13, 'mcom', '', '2024-01-25 18:25:02'),
(25, 'dfgdf', '', '2024-01-25 18:25:02'),
(24, 'ertretre', '', '2024-01-25 18:25:02'),
(23, 'htfhfhfh', '', '2024-01-25 18:25:02'),
(22, 'qrwrwr', '', '2024-01-25 18:25:02'),
(55, 'manishk', '54', '2024-01-25 18:25:02'),
(54, 'hthythjytjy', '53', '2024-01-25 18:25:02'),
(53, 'hjdbdfjedfswjdsjfds', '53', '2024-01-25 18:25:02'),
(41, 'hello', '51', '2024-01-25 18:25:02'),
(35, 'gsvgdsgg', '51', '2024-01-25 18:25:02'),
(56, 'NNNNNNN', '51', '2024-01-29 12:22:24'),
(59, 'bcfgbc', '51', '2024-01-31 15:46:30'),
(58, 'hello', '51', '2024-01-29 15:35:18'),
(60, 'MCA', '51', '2024-02-05 19:06:29'),
(61, 'dfvdfv', '51', '2024-02-22 22:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `states_name` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `states_name`, `user_id`, `date`) VALUES
(3, 'Assam', '', '2024-01-25 18:27:31'),
(4, 'Bihar', '', '2024-01-25 18:27:31'),
(5, 'Chhattisgard', '', '2024-01-25 18:27:31'),
(7, 'Gujarat', '', '2024-01-25 18:27:31'),
(9, 'Himachal Pradesh', '', '2024-01-25 18:27:31'),
(10, 'Jharkhand', '', '2024-01-25 18:27:31'),
(11, 'Karnataka', '', '2024-01-25 18:27:31'),
(12, 'Kerala', '', '2024-01-25 18:27:31'),
(13, 'Madhya Pradesh', '', '2024-01-25 18:27:31'),
(14, 'Maharashtra', '', '2024-01-25 18:27:31'),
(15, 'Mainipur', '', '2024-01-25 18:27:31'),
(16, 'Meghalaya', '', '2024-01-25 18:27:31'),
(17, 'Mizoram', '', '2024-01-25 18:27:31'),
(18, 'Nagaland', '', '2024-01-25 18:27:31'),
(19, 'Odisha', '', '2024-01-25 18:27:31'),
(20, 'Punjab', '', '2024-01-25 18:27:31'),
(21, 'Rajasthan', '', '2024-01-25 18:27:31'),
(22, 'Sikkim', '', '2024-01-25 18:27:31'),
(24, 'Telangana', '', '2024-01-25 18:27:31'),
(25, 'tripura', '', '2024-01-25 18:27:31'),
(27, 'Uttarakhand', '53', '2024-01-22 18:27:31'),
(56, 'west bengal', '51', '2024-01-22 18:27:31'),
(61, 'etetee', '51', '2024-01-25 18:27:31'),
(62, 'nabajy', '51', '2024-01-25 18:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `stud_table`
--

CREATE TABLE `stud_table` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stud_table`
--

INSERT INTO `stud_table` (`id`, `firstname`, `lastname`, `dob`, `gender`, `qualification`, `certificate`, `file_name`, `city`, `user_id`, `date`) VALUES
(151, 'ahmed', 'idrisi', '2024-01-06', 'male', '28', '', 'nav/p1.jpg', '23', '', '2024-01-25 18:28:23'),
(131, 'priyanka', 'sah', '1999-12-02', 'female', '2', 'nav/p1.jpg', 'nav/p2.jpg', '4', '', '2024-01-25 18:28:23'),
(158, 'dwcc', 'ee', '2024-02-02', 'female', '41', '', 'nav/p3.jpg', '5', '51', '2024-02-22 23:04:24'),
(150, 'rahul', 'saha', '2024-01-03', 'male', '3', 'nav/p2.jpg', 'nav/p1.jpg', '2', '', '2024-01-25 18:28:23'),
(145, 'rajan', 'das', '2000-12-12', 'male', '1', 'nav/1741.jpegbg7.jpeg', 'nav/p1.jpg', '3', '', '2024-01-29 18:28:23'),
(155, 'cvbbvbvbvb', 'vbvbvbvb', '2024-01-03', 'male', '49', '', 'nav/p8.avif', '6', '51', '2024-01-29 18:28:23'),
(157, 'Deepika', 'Shahani', '2005-06-14', 'female', '60', 'nav/p2.jpg', 'nav/p2.jpg', '1', '51', '2024-02-05 19:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(54, 'geeta', 'geeta@12a', 'geeta@gmail.com'),
(53, 'minakshi', '122', 'minak@gmail.com'),
(48, 'nabajyoti', '44cgcg', 'nk@gmail.com'),
(51, 'ahmed', '123', 'ov@gmail.com'),
(52, 'nabajyotikarmakar', 'nb12@', 'karma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `date`) VALUES
(8, 51, '2024-01-30 08:19:38'),
(7, 53, '2024-01-30 08:18:09'),
(6, 51, '2024-01-30 08:17:55'),
(5, 51, '2024-01-29 08:15:56'),
(9, 51, '2024-01-30 09:27:33'),
(10, 52, '2024-01-30 10:33:30'),
(11, 51, '2024-01-30 10:33:43'),
(12, 51, '2024-01-30 10:54:30'),
(13, 51, '2024-01-30 11:13:23'),
(14, 51, '2024-01-30 11:21:10'),
(15, 54, '2024-01-30 11:33:57'),
(16, 51, '2024-01-30 11:43:19'),
(17, 51, '2024-01-30 11:53:18'),
(18, 54, '2024-01-30 12:16:56'),
(19, 51, '2024-01-30 12:17:14'),
(20, 52, '2024-01-30 13:12:23'),
(21, 51, '2024-01-30 13:12:35'),
(22, 51, '2024-01-31 05:38:15'),
(23, 52, '2024-01-31 07:56:16'),
(24, 51, '2024-01-31 07:56:58'),
(25, 51, '2024-01-31 08:05:01'),
(26, 54, '2024-01-31 09:12:31'),
(27, 51, '2024-01-31 09:53:45'),
(28, 51, '2024-02-01 05:35:55'),
(29, 54, '2024-02-01 13:23:33'),
(30, 51, '2024-02-01 13:43:31'),
(31, 51, '2024-02-02 05:32:22'),
(32, 54, '2024-02-02 06:44:50'),
(33, 51, '2024-02-02 06:54:15'),
(34, 51, '2024-02-02 06:55:47'),
(35, 51, '2024-02-02 06:56:09'),
(36, 54, '2024-02-02 10:06:08'),
(37, 51, '2024-02-02 10:06:37'),
(38, 51, '2024-02-02 13:21:56'),
(39, 51, '2024-02-03 05:25:37'),
(40, 51, '2024-02-03 10:04:58'),
(41, 51, '2024-02-03 10:05:13'),
(42, 51, '2024-02-03 10:07:19'),
(43, 51, '2024-02-03 10:08:53'),
(44, 51, '2024-02-03 10:11:58'),
(45, 54, '2024-02-03 11:46:25'),
(46, 51, '2024-02-03 11:58:17'),
(47, 51, '2024-02-03 12:24:00'),
(48, 51, '2024-02-05 05:57:27'),
(49, 51, '2024-02-05 10:15:28'),
(50, 51, '2024-02-05 13:34:13'),
(51, 51, '2024-02-06 05:39:55'),
(52, 51, '2024-02-22 15:08:02'),
(53, 51, '2024-02-22 15:48:09'),
(54, 51, '2024-02-22 15:48:57'),
(55, 51, '2024-02-22 15:49:11'),
(56, 51, '2024-02-22 15:50:19'),
(57, 51, '2024-02-22 17:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `user_id`, `menu_id`, `date`) VALUES
(318, '51', '9', '2024-02-02 12:15:16'),
(317, '51', '12', '2024-02-02 12:15:16'),
(429, '51', '92', '2024-02-03 17:29:26'),
(428, '51', '91', '2024-02-03 17:29:26'),
(307, '51', '11', '2024-02-02 11:08:47'),
(306, '51', '5', '2024-02-02 11:08:47'),
(305, '51', '8', '2024-02-02 11:08:47'),
(304, '54', '2', '2024-02-02 11:08:47'),
(303, '54', '18', '2024-02-02 11:08:47'),
(302, '54', '4', '2024-02-02 11:08:47'),
(301, '54', '1', '2024-02-02 11:08:47'),
(372, '51', '4', '2024-02-03 11:37:54'),
(430, '51', '6', '2024-02-03 17:48:37'),
(439, '51', '14', '2024-02-05 11:29:23'),
(438, '51', '13', '2024-02-05 11:29:23'),
(319, '51', '15', '2024-02-02 12:15:16'),
(436, '51', '22', '2024-02-05 11:28:58'),
(415, '51', '23', '2024-02-03 15:32:49'),
(435, '51', '11', '2024-02-05 11:28:58'),
(434, '51', '10', '2024-02-05 11:28:58'),
(432, '51', '1', '2024-02-05 11:28:23'),
(433, '51', '2', '2024-02-05 11:28:58'),
(437, '51', '3', '2024-02-05 11:29:23'),
(431, '54', '92', '2024-02-03 17:48:37'),
(421, '51', '18', '2024-02-03 15:42:57'),
(440, '51', '94', '2024-02-22 21:23:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actform`
--
ALTER TABLE `actform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acts`
--
ALTER TABLE `acts`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `act_industry`
--
ALTER TABLE `act_industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `act_master`
--
ALTER TABLE `act_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapacts`
--
ALTER TABLE `mapacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_table`
--
ALTER TABLE `stud_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actform`
--
ALTER TABLE `actform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `acts`
--
ALTER TABLE `acts`
  MODIFY `act_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `act_industry`
--
ALTER TABLE `act_industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `act_master`
--
ALTER TABLE `act_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mapacts`
--
ALTER TABLE `mapacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `stud_table`
--
ALTER TABLE `stud_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
