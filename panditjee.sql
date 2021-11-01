-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 07:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panditjee`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT 1,
  `title` varchar(200) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `author`, `title`, `date`) VALUES
(6, 1, 'awe', '2017:08:24'),
(8, 1, 'asdadsada', '2017:08:04 00:00:00'),
(9, 1, 'aku 6.30', '2017:08:24 06:30:00'),
(25, 1, 'testing', '2021-09-27 00:00:00'),
(26, 1, 'testing2', '2021-09-28 00:00:00'),
(27, 1, '23323232', '2021-09-28 00:00:00'),
(28, 1, '2323232', '2021-09-28 00:00:00'),
(29, 1, '23232323wersdsf', '2021-09-28 00:00:00'),
(30, 1, 'sdfsdfsdfsd', '2021-09-28 00:00:00'),
(31, 1, 'dasdfghjklgfdsf', '2021-10-03 00:00:00'),
(32, 1, 'tsfghjlkl', '2021-09-27 00:00:00'),
(34, 1, 'dhirudsfsfsdfds', '2021-10-10 00:00:00'),
(36, 1, 'testingsdfsfsd', '2021-10-12 00:00:00'),
(37, 1, 'saafasdsfsd', '2021-10-10 00:00:00'),
(39, 1, 'sfsafsaa', '2021-10-11 00:00:00'),
(40, 1, 'sfsafsaa', '2021-10-11 00:00:00'),
(41, 1, 'testing final', '2021-10-22T16:46'),
(42, 1, 'Dhiru test Bandhu', '2021-10-16T20:57'),
(43, 1, 'zxczc', '2021-09-30T21:05'),
(45, 1, 'dfghjkj', '2021-10-20T21:30'),
(46, 1, 'test', '2021-10-21T21:36'),
(47, 1, 'dhiru baba', '2021-10-15T12:33'),
(48, 1, 'Dhiru Test', '2021-10-06 08:35:56'),
(49, 1, 'Dhiru Test', '2021-10-06 08:35:56'),
(50, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(51, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(52, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(53, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(54, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(55, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(56, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(57, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(58, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(59, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(60, 1, 'Dhiru TestNew', '2021-10-06 08:35:56'),
(61, 1, 'Dhiru TestNew', '2021-10-06 08:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_bookings`
--

CREATE TABLE `ldg_bookings` (
  `bookingId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `bookingTime` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `bookingDtm` datetime NOT NULL,
  `bookStartDate` datetime NOT NULL,
  `bookEndDate` datetime NOT NULL,
  `bookingComments` varchar(2048) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `accept_rejected` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 means no action,1 for approved,2 for rejected',
  `comment_action` text NOT NULL,
  `actionDtm` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedBy` varchar(100) NOT NULL,
  `updatedDtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_bookings`
--

INSERT INTO `ldg_bookings` (`bookingId`, `customerId`, `title`, `name`, `email`, `phone_number`, `course_type`, `bookingTime`, `address`, `bookingDtm`, `bookStartDate`, `bookEndDate`, `bookingComments`, `isDeleted`, `createdBy`, `createdDtm`, `accept_rejected`, `comment_action`, `actionDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 0, 'test dhiru', 'Dhirendra', 'dhirendrabca93@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-06 08:35:56', '2021-10-06 11:59:00', '2021-10-06 11:59:00', 'testing yet', 0, 1, '2021-10-06 08:35:56', '2', 'asddadasdasd', '2021-10-10 09:32:25', '', '2021-10-06 00:00:00'),
(2, 0, 'test dhiru', 'Dhirendra', 'dhirendrabca93@gmail.com', 2147483647, '14', '0000-00-00 00:00:00', 'new delhi', '2021-10-06 08:41:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'testing yet', 0, 1, '2021-10-06 08:41:17', '0', '', '2021-10-10 11:50:07', '', '0000-00-00 00:00:00'),
(3, 0, 'test dhiru', 'Mohan', 'dhirendrabca93@gmail.com', 214748364, '14', '2021-10-06 08:44:37', 'new delhi', '2021-10-06 08:44:37', '2021-10-06 08:44:37', '2021-10-06 08:44:37', '\r\n\r\ntesting yet\r\n\r\n', 0, 1, '2021-10-06 08:44:37', '1', '<p>testing point of view</p>', '2021-10-10 08:44:07', '', '0000-00-00 00:00:00'),
(4, 0, 'test dhiru', 'Raju', 'dhirendrabca93@gmail.com', 214748365, '14', '2021-10-06 11:59:00', 'new delhi', '2021-10-06 08:56:15', '2021-10-06 11:59:00', '2021-10-06 11:59:00', '\r\n\r\ntesting yet\r\n\r\n', 0, 1, '2021-10-06 08:56:15', '2', '<p>we are not avalable here</p>', '2021-10-10 08:41:12', '', '0000-00-00 00:00:00'),
(5, 0, 'test dhiru', '', 'db@GMAIL.COM', 457554664, '8', '2021-10-20 03:22:37', 'Bihar', '2021-10-04 07:00:27', '2021-10-04 07:00:27', '2021-10-04 07:00:27', '\r\n\r\ntesting yet\r\n\r\n', 1, 0, '2021-10-04 07:00:27', '0', '', '2021-10-10 11:50:07', '1', '2021-10-10 07:41:16'),
(6, 0, 'dhiru', 'raman', 'dhieu@gmail.com', 2147483647, '11', '2021-11-05 12:56:00', 'Gali No-10 Jai Vihar Phase1', '2021-10-08 09:27:01', '2021-11-05 12:56:00', '2021-11-05 12:56:00', '<p>testing</p>', 0, 1, '2021-10-08 09:27:01', '2', 'reject due to long distance', '2021-10-10 09:52:54', '', '0000-00-00 00:00:00'),
(7, 0, 'testing final', 'DHirendra', 'dhirendrabca93@gmail.com', 2147483647, '13', '2021-10-22 16:46:00', 'Ward No -4 Ranu tol Dadhiya Asadhar, Darhia asadhar,ps- angar ghart,dis- samastipur bihar 848134', '2021-10-10 13:17:07', '2021-10-22 16:46:00', '2021-10-22 16:46:00', '<p>testing</p>', 0, 1, '2021-10-10 13:17:07', '0', '', '2021-10-10 16:47:07', '', '0000-00-00 00:00:00'),
(8, 0, 'Dhiru test Bandhu', 'Dhiru test Bandhu', 'dhirendrabca93@gmail.com', 2147483647, '2', '2021-10-16 20:57:00', 'Ward No -4 Ranu tol Dadhiya Asadhar, Darhia asadhar,ps- angar ghart,dis- samastipur bihar 848134', '2021-10-19 17:24:34', '2021-10-16 20:57:00', '2021-10-16 20:57:00', NULL, 0, 1, '2021-10-19 17:24:34', '0', '', '2021-10-19 20:54:34', '', '0000-00-00 00:00:00'),
(9, 0, 'zxczc', 'zxcxzc', 'dhirendrabca93@gmail.com', 234567890, '10', '2021-09-30 21:05:00', 'Ward No -4 Ranu tol Dadhiya Asadhar, Darhia asadhar,ps- angar ghart,dis- samastipur bihar 848134', '2021-10-19 17:40:27', '2021-09-30 21:05:00', '2021-09-30 21:05:00', '<p>dzfxgchjkl;</p>', 0, 1, '2021-10-19 17:40:27', '0', '', '2021-10-19 21:10:27', '', '0000-00-00 00:00:00'),
(10, 0, 'dfghjkj', 'dfzdgfhjgkjk', 'dhirendrabca93@gmail.com', 23456789, '11', '2021-10-20 21:30:00', 'Ward No -4 Ranu tol Dadhiya Asadhar, Darhia asadhar,ps- angar ghart,dis- samastipur bihar 848134', '2021-10-19 18:01:50', '2021-10-20 21:30:00', '2021-10-20 21:30:00', NULL, 0, 0, '2021-10-19 18:01:50', '0', '', '2021-10-19 21:31:50', '', '0000-00-00 00:00:00'),
(11, 0, 'test', 'test', 'dhirendrabca93@gmail.com', 1234567890, '10', '2021-10-21 21:36:00', 'Ward No -4 Ranu tol Dadhiya Asadhar, Darhia asadhar,ps- angar ghart,dis- samastipur bihar 848134', '2021-10-19 18:02:32', '2021-10-21 21:36:00', '2021-10-21 21:36:00', NULL, 0, 0, '2021-10-19 18:02:32', '0', '', '2021-10-19 21:32:32', '', '0000-00-00 00:00:00'),
(12, 0, 'dhiru baba', 'filtertype', 'arinazstarofficial@gmail.com', 2147483647, '7', '2021-10-15 12:33:00', '5116 W ROSCOE ST', '2021-10-19 18:04:03', '2021-10-15 12:33:00', '2021-10-15 12:33:00', '<p>adstryuil;\'lhjdg</p>', 0, 1, '2021-10-19 18:04:03', '0', '', '2021-10-19 21:34:03', '', '0000-00-00 00:00:00'),
(13, 0, 'Dhiru Test', 'dhiru api', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 17:44:15', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 17:44:15', '0', '', '2021-10-20 21:14:15', '', '0000-00-00 00:00:00'),
(14, 0, 'Dhiru Test', 'dhiru api', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 17:44:23', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 17:44:23', '0', '', '2021-10-20 21:14:23', '', '0000-00-00 00:00:00'),
(15, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:16:58', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:16:58', '0', '', '2021-10-20 21:46:58', '', '0000-00-00 00:00:00'),
(16, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:17:16', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:17:16', '0', '', '2021-10-20 21:47:16', '', '0000-00-00 00:00:00'),
(17, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:17:39', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:17:39', '0', '', '2021-10-20 21:47:39', '', '0000-00-00 00:00:00'),
(18, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:18:16', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:18:16', '0', '', '2021-10-20 21:48:16', '', '0000-00-00 00:00:00'),
(19, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:20:24', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:20:24', '0', '', '2021-10-20 21:50:24', '', '0000-00-00 00:00:00'),
(20, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:22:32', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:22:32', '0', '', '2021-10-20 21:52:32', '', '0000-00-00 00:00:00'),
(21, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:22:48', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:22:48', '0', '', '2021-10-20 21:52:48', '', '0000-00-00 00:00:00'),
(22, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:23:35', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:23:35', '0', '', '2021-10-20 21:53:35', '', '0000-00-00 00:00:00'),
(23, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:24:05', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:24:05', '0', '', '2021-10-20 21:54:05', '', '0000-00-00 00:00:00'),
(24, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:24:27', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:24:27', '0', '', '2021-10-20 21:54:27', '', '0000-00-00 00:00:00'),
(25, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:25:26', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:25:26', '0', '', '2021-10-20 21:55:26', '', '0000-00-00 00:00:00'),
(26, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:26:37', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:26:37', '0', '', '2021-10-20 21:56:37', '', '0000-00-00 00:00:00'),
(27, 0, 'Dhiru TestNew', 'dhiru apiToken', 'dhiru@gmail.com', 2147483647, '14', '2021-10-06 08:35:56', 'new delhi', '2021-10-20 18:27:14', '2021-10-06 08:35:56', '2021-10-06 08:35:56', 'testing point of view', 0, 0, '2021-10-20 18:27:14', '0', '', '2021-10-20 21:57:14', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_connect_us`
--

CREATE TABLE `ldg_connect_us` (
  `id` int(11) NOT NULL,
  `your_name` varchar(120) NOT NULL,
  `your_email` varchar(120) NOT NULL,
  `your_subject` text NOT NULL,
  `your_message` longtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldg_connect_us`
--

INSERT INTO `ldg_connect_us` (`id`, `your_name`, `your_email`, `your_subject`, `your_message`, `date_created`, `isDeleted`) VALUES
(1, 'Juan Carlos Morales-Moreno', 'arinazstarofficial@gmail.com', 'Juan Carlos Morales-Moreno', 'Juan Carlos Morales-Moreno', '2021-10-20 16:57:19', '0'),
(2, 'Dhirendra NBL TEST', 'arinazstarofficialsddsds@gmail.com', 'Juan Carlos Morales-Moreno dhieu', 'Juan Carlos Morales-Moreno  dhiru', '2021-10-20 16:59:51', '0'),
(3, 'DHiru Baba', 'dhiru@gmail.com', 'testing', 'testing', '2021-10-20 17:03:28', '0'),
(4, 'test from contact', 'test@contact.com', 'test from contact', 'test from contacttest from contacttest from contacttest from contacttest from contact', '2021-10-20 17:03:59', '0'),
(5, 'test from contact', 'test@contact.com', 'test from contact', 'test from contacttest from contacttest from contacttest from contacttest from contact', '2021-10-20 17:06:33', '0'),
(6, 'test from contact', 'test@contact.com', 'test from contact', 'test from contacttest from contacttest from contacttest from contacttest from contact', '2021-10-20 17:07:43', '0'),
(7, 'dhirutest NBL', 'arinazstarofficial@gmail.com', 'zxcvbjjghfdsrae', 'adsfdghjhkl/;lkyjthrgefds', '2021-10-20 17:08:52', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_customer`
--

CREATE TABLE `ldg_customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerAddress` varchar(2048) DEFAULT NULL,
  `customerPhone` varchar(15) DEFAULT NULL,
  `customerEmail` varchar(128) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_customer`
--

INSERT INTO `ldg_customer` (`customerId`, `customerName`, `customerAddress`, `customerPhone`, `customerEmail`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(2, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 1, 1, '2017-08-02 18:35:04', 1, '2021-10-10 07:34:53'),
(3, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(4, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(5, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(6, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(7, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(8, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(9, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(10, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(11, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(12, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(13, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(14, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(15, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(16, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(17, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(18, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(19, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(20, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(21, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31'),
(22, 'Alexander', 'The Big Street Address, Near Corner', '', 'email@outlook.com', 0, 1, '2017-08-02 18:35:04', 1, '2018-12-30 06:48:04'),
(23, 'John Doe', 'The Big Street Address, Near Corner', '123456789', '', 0, 1, '2017-08-02 18:25:01', 1, '2018-12-30 06:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_floor`
--

CREATE TABLE `ldg_floor` (
  `event_id` tinyint(4) NOT NULL,
  `event_name` varchar(120) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `event_date_and_time` datetime NOT NULL,
  `exp_date_time` datetime NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` longtext NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Floor Table';

--
-- Dumping data for table `ldg_floor`
--

INSERT INTO `ldg_floor` (`event_id`, `event_name`, `image_path`, `event_date_and_time`, `exp_date_time`, `short_desc`, `long_desc`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(4, 'Dhiru Test', '724109386_pp.jpg', '2021-10-19 19:55:00', '2021-10-29 19:55:00', 'testing by dhiru', '<p>dhiru test docs</p>', 0, 1, '2021-10-19 16:26:20', NULL, NULL),
(5, 'Dhiru Tes2', '1441224201_picturelogo.png', '2021-10-22 13:43:00', '2021-11-06 21:44:00', 'testing by dhiru', '<p>saddasdasdas</p>', 0, 1, '2021-10-19 18:14:08', NULL, NULL),
(6, 'Dhiru Tes3', '441848642_download.jpg', '2021-10-22 13:45:00', '2021-10-29 21:50:00', 'testing by dhiru', '<p>adsfhgjkl;kkhjgfdfdsafghkjk</p>', 0, 1, '2021-10-19 18:15:16', NULL, NULL),
(7, 'Dhiru Tes3ffsf', '77538735_group.jpg', '2021-10-29 21:49:00', '2021-10-30 21:50:00', 'dsfsddsf', '<p>sdfsdfsdfsdfsdfdsfs</p>', 0, 1, '2021-10-19 18:15:38', NULL, NULL),
(8, 'Dhiru Tes7', '28834383_image.jpeg', '2021-10-22 22:07:00', '2021-12-02 22:07:00', 'testing by dhiru', '<p>asdfhgjl;lkjhgdf</p>', 0, 1, '2021-10-19 18:31:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_lodge`
--

CREATE TABLE `ldg_lodge` (
  `lodgeId` int(11) NOT NULL,
  `lodgeName` varchar(128) NOT NULL,
  `lodgeAddress` varchar(512) NOT NULL,
  `lodgeCity` varchar(50) NOT NULL,
  `lodgeState` varchar(50) NOT NULL,
  `lodgeCountry` varchar(50) DEFAULT NULL,
  `lodgePincode` varchar(10) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of lodge';

-- --------------------------------------------------------

--
-- Table structure for table `ldg_reset_password`
--

CREATE TABLE `ldg_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldg_reset_password`
--

INSERT INTO `ldg_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(25, 'email@gmail.com', 'nxwY5JKbbNcTRju', 'Chrome 56.0.2924.87', '0.0.0.0', 0, 1, '2017-03-22 18:11:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_roles`
--

CREATE TABLE `ldg_roles` (
  `roleId` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of roles';

--
-- Dumping data for table `ldg_roles`
--

INSERT INTO `ldg_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Lodge Manager'),
(3, 'Booker');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_rooms`
--

CREATE TABLE `ldg_rooms` (
  `roomId` int(11) NOT NULL,
  `roomNumber` varchar(50) NOT NULL,
  `roomSizeId` int(11) NOT NULL COMMENT 'FK : ldg_room_sizes',
  `floorId` tinyint(4) NOT NULL COMMENT 'FK : ldg_floor',
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of rooms';

--
-- Dumping data for table `ldg_rooms`
--

INSERT INTO `ldg_rooms` (`roomId`, `roomNumber`, `roomSizeId`, `floorId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'G101', 1, 1, 0, 1, '2017-01-10 17:26:22', NULL, NULL),
(2, 'G102', 1, 1, 0, 1, '2017-01-10 17:29:34', NULL, NULL),
(3, 'G103', 1, 1, 0, 1, '2017-01-10 17:29:43', NULL, NULL),
(4, 'G104', 2, 1, 0, 1, '2017-01-18 18:13:45', NULL, NULL),
(5, 'G105', 2, 1, 0, 1, '2017-01-18 18:15:22', NULL, NULL),
(6, 'G106', 3, 1, 0, 1, '2017-01-18 18:15:43', NULL, NULL),
(7, 'G107', 3, 1, 0, 1, '2017-01-18 18:15:52', NULL, NULL),
(8, 'G108', 4, 1, 0, 1, '2017-01-18 18:16:08', NULL, NULL),
(9, 'G109', 5, 1, 0, 1, '2017-01-18 18:16:51', NULL, NULL),
(10, 'G110', 4, 1, 0, 1, '2017-01-18 18:16:35', 1, '2017-02-11 18:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_room_base_fare`
--

CREATE TABLE `ldg_room_base_fare` (
  `bfId` bigint(20) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `baseFareHour` double NOT NULL,
  `baseFareDay` double NOT NULL,
  `serviceTax` double NOT NULL,
  `serviceCharge` double NOT NULL,
  `fareTotal` double NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_room_base_fare`
--

INSERT INTO `ldg_room_base_fare` (`bfId`, `sizeId`, `baseFareHour`, `baseFareDay`, `serviceTax`, `serviceCharge`, `fareTotal`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 1, 40, 500, 15, 3.5, 592.5, 0, 1, '2017-02-11 19:14:24', 1, '2017-02-11 19:16:14'),
(2, 2, 55, 700, 15, 3.5, 829.5, 0, 1, '2017-02-11 19:19:52', 1, '2017-02-11 19:25:38'),
(3, 3, 60, 800, 15, 3.5, 948, 0, 1, '2017-02-11 19:20:07', NULL, NULL),
(4, 4, 70, 900, 15, 3.5, 1066.5, 0, 1, '2017-02-11 19:20:35', NULL, NULL),
(5, 5, 100, 1100, 15, 3.5, 1303.5, 0, 1, '2017-02-11 19:20:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_room_sizes`
--

CREATE TABLE `ldg_room_sizes` (
  `sizeId` int(11) NOT NULL,
  `sizeTitle` varchar(512) NOT NULL,
  `sizeDescription` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of room sizes';

--
-- Dumping data for table `ldg_room_sizes`
--

INSERT INTO `ldg_room_sizes` (`sizeId`, `sizeTitle`, `sizeDescription`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'Murti Pranpratishtha', 'Murti Pranpratishtha', 0, 1, '2017-01-04 16:55:01', 1, '2017-01-04 18:06:17'),
(2, 'Ati Rudra Pooja', 'Ati Rudra Pooja', 0, 1, '2017-01-04 18:05:53', 1, '2017-01-04 18:06:34'),
(3, 'Maha Rudra Pooja', 'Maha Rudra Pooja', 0, 1, '2017-01-04 18:07:56', 1, '2017-01-04 18:08:19'),
(4, 'Laghu Rudra', 'Laghu Rudra', 0, 1, '2017-01-04 18:09:09', 1, '2017-01-04 18:11:05'),
(5, 'Rudra Abhishek', 'Rudra Abhishek', 0, 1, '2017-01-04 18:09:47', 1, '2017-01-04 18:11:16'),
(6, 'Ghat Sthapna', 'Ghat Sthapna', 0, 1, '2017-01-04 16:55:01', 1, '2017-01-04 18:06:17'),
(7, 'Nav Grah Shanti', 'Nav Grah Shanti', 0, 1, '2017-01-04 18:05:53', 1, '2017-01-04 18:06:34'),
(8, 'Vastu Shanti', 'Vastu Shanti', 0, 1, '2017-01-04 18:07:56', 1, '2017-01-04 18:08:19'),
(9, 'Nakshatra Shanti', 'Nakshatra Shanti', 0, 1, '2017-01-04 18:09:09', 1, '2017-01-04 18:11:05'),
(10, 'Kaal Sarp Yog', 'Kaal Sarp Yog', 0, 1, '2017-01-04 18:09:47', 1, '2017-01-04 18:11:16'),
(11, 'Navchandi Yagna', 'Navchandi Yagna', 0, 1, '2017-01-04 18:09:47', 1, '2017-01-04 18:11:16'),
(12, 'Ganesh Yagna', 'Ganesh Yagna', 0, 1, '2017-01-04 16:55:01', 1, '2017-01-04 18:06:17'),
(13, 'Vishnu Yagna', 'Vishnu Yagna', 0, 1, '2017-01-04 18:05:53', 1, '2017-01-04 18:06:34'),
(14, 'Maha Mrityunjay Jap', 'Maha Mrityunjay Jap', 0, 1, '2017-01-04 18:07:56', 1, '2017-01-04 18:08:19'),
(15, 'Narayanbali Pitrushraddh Vidhi', 'Narayanbali Pitrushraddh Vidhi', 0, 1, '2017-01-04 18:09:09', 1, '2017-01-04 18:11:05'),
(16, 'Other', 'Other', 0, 1, '2017-01-04 18:09:47', 1, '2017-01-04 18:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_users`
--

CREATE TABLE `ldg_users` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userPassword` varchar(128) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userAddress` varchar(1024) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of administrative users';

--
-- Dumping data for table `ldg_users`
--

INSERT INTO `ldg_users` (`userId`, `userEmail`, `userPassword`, `userName`, `userPhone`, `userAddress`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'email@gmail.com', '$2y$10$W0JwINh/A4eadWvp1.AxkejudEgv8Wg5vUMCcX4MKtdoCimQieBdK', 'Kishor Mali', '9890098900', 'Pune India', 1, 0, 1, '2017-01-01 00:00:00', NULL, NULL),
(2, 'subadmin@gmail.com', '$2y$10$sqyx0XUQhJxIJ6lq9adpV.ioq97zngNXeT33b/n5M2KbWdyzfALie', 'Sub Admin', '9890098900', '', 2, 0, 1, '2017-03-23 18:19:38', 1, '2017-05-15 18:32:43'),
(3, 'admin@codeinsect.com', '$2y$10$0zdAvfmzLst8d2aoD5vi6emxmcT4idjjTl1Uz3zkKwzRGbaAk0qk.', 'Book Admin', '9890098900', '', 3, 0, 1, '2017-03-24 16:26:31', 1, '2017-05-15 18:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldg_bookings`
--
ALTER TABLE `ldg_bookings`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `ldg_connect_us`
--
ALTER TABLE `ldg_connect_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `ldg_floor`
--
ALTER TABLE `ldg_floor`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ldg_lodge`
--
ALTER TABLE `ldg_lodge`
  ADD PRIMARY KEY (`lodgeId`);

--
-- Indexes for table `ldg_reset_password`
--
ALTER TABLE `ldg_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldg_roles`
--
ALTER TABLE `ldg_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `ldg_rooms`
--
ALTER TABLE `ldg_rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `ldg_room_base_fare`
--
ALTER TABLE `ldg_room_base_fare`
  ADD PRIMARY KEY (`bfId`);

--
-- Indexes for table `ldg_room_sizes`
--
ALTER TABLE `ldg_room_sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Indexes for table `ldg_users`
--
ALTER TABLE `ldg_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ldg_bookings`
--
ALTER TABLE `ldg_bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ldg_connect_us`
--
ALTER TABLE `ldg_connect_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ldg_floor`
--
ALTER TABLE `ldg_floor`
  MODIFY `event_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ldg_lodge`
--
ALTER TABLE `ldg_lodge`
  MODIFY `lodgeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ldg_reset_password`
--
ALTER TABLE `ldg_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ldg_roles`
--
ALTER TABLE `ldg_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ldg_rooms`
--
ALTER TABLE `ldg_rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ldg_room_base_fare`
--
ALTER TABLE `ldg_room_base_fare`
  MODIFY `bfId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ldg_room_sizes`
--
ALTER TABLE `ldg_room_sizes`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ldg_users`
--
ALTER TABLE `ldg_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
