-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 05:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zealux_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupen`
--

CREATE TABLE `tbl_coupen` (
  `id` int(11) NOT NULL,
  `coupen_code` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `description` text NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coupen`
--

INSERT INTO `tbl_coupen` (`id`, `coupen_code`, `date_from`, `date_to`, `description`, `discount_percentage`, `store_id`) VALUES
(3, '8528', '2024-11-16', '2025-01-01', 'For sun glasses ', 45, 1),
(4, 'Single', '2024-11-17', '2024-11-21', 'For one pair', 40, 1),
(5, 'Lens ', '2024-11-17', '2025-11-18', 'Lens only', 33, 1),
(6, 'Spcl', '2024-11-18', '2025-11-18', '', 10, 1),
(7, 'First try', '2024-11-19', '2025-11-19', '', 5, 1),
(8, 'Half ', '2024-11-21', '2024-12-31', '', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eye_test`
--

CREATE TABLE `tbl_eye_test` (
  `EyeTestId` int(11) NOT NULL,
  `CustomerName` varchar(200) DEFAULT NULL,
  `Testno` int(11) DEFAULT NULL,
  `Test_date` date DEFAULT NULL,
  `CustomerAge` int(11) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `MobileNo1` varchar(100) DEFAULT NULL,
  `MobileNo2` varchar(100) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `CustomerHistory` text DEFAULT NULL,
  `Occupation` varchar(200) DEFAULT NULL,
  `digital_usage` text DEFAULT NULL,
  `ARPower` text DEFAULT NULL,
  `ARPower_photo` varchar(200) DEFAULT NULL,
  `unaidedVision` text DEFAULT NULL,
  `pinholeVision` text DEFAULT NULL,
  `pgpVision` text DEFAULT NULL,
  `FlashTourch` varchar(100) DEFAULT NULL,
  `FlashTourchDiscription` text DEFAULT NULL,
  `CoverUnCoverTest` varchar(100) DEFAULT NULL,
  `CoverUnCoverTestDescription` text DEFAULT NULL,
  `ConverganceTest` varchar(100) DEFAULT NULL,
  `ConverganceTestDescription` text DEFAULT NULL,
  `PDMeasurement` text DEFAULT NULL,
  `Duochrome` text DEFAULT NULL,
  `JCC` varchar(100) DEFAULT NULL,
  `Prescription` text DEFAULT NULL,
  `GPOutside` varchar(100) DEFAULT NULL,
  `adviceUsage` varchar(100) DEFAULT NULL,
  `advice_lensDesign` text DEFAULT NULL,
  `frame_measurement` text DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_eye_test`
--

INSERT INTO `tbl_eye_test` (`EyeTestId`, `CustomerName`, `Testno`, `Test_date`, `CustomerAge`, `Gender`, `MobileNo1`, `MobileNo2`, `Email`, `CustomerHistory`, `Occupation`, `digital_usage`, `ARPower`, `ARPower_photo`, `unaidedVision`, `pinholeVision`, `pgpVision`, `FlashTourch`, `FlashTourchDiscription`, `CoverUnCoverTest`, `CoverUnCoverTestDescription`, `ConverganceTest`, `ConverganceTestDescription`, `PDMeasurement`, `Duochrome`, `JCC`, `Prescription`, `GPOutside`, `adviceUsage`, `advice_lensDesign`, `frame_measurement`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(2, 'dsgf', NULL, '2024-09-28', 21, 'Female', '14554545', '15455', 'test@gmail.com', '', 'Salaried', '7HRS', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', '1727336100_7f9caced58b793fef00f.jpg', '{\"right\":{\"Distance Vision\":\"1\",\"Near Vision\":\"11\"},\"left\":{\"Distance Vision\":\"2\",\"Near Vision\":\"1\"}}', '{\"right\":{\"Distance Vision\":\"41\",\"Near Vision\":\"2\"},\"left\":{\"Distance Vision\":\"30\",\"Near Vision\":\"1\"}}', '{\"right\":{\"Distance Vision\":\"25\",\"Near Vision\":\"25\"},\"left\":{\"Distance Vision\":\"5\",\"Near Vision\":\"5\"}}', 'Normal', 'fdg', 'Normal', 'ds', 'Upnormal', '    sg', '{\"pd_right\":\"55\",\"pd_left\":\"56\",\"pd_both\":\"6\"}', '{\"right\":{\"red\":\"6\",\"green\":\"25\",\"both\":\"25\"},\"left\":{\"red\":\"6\",\"green\":\"66\",\"both\":\"36\"}}', 'Refined', '{\"right\":{\"sph\":\"55\",\"cyl\":\"121\",\"axis\":\"21\",\"add\":\"2\",\"pd\":\"2\"},\"left\":{\"sph\":\"566\",\"cyl\":\"2\",\"axis\":\"23\",\"add\":\"2\",\"pd\":\"5\"}}', 'Comfortable', 'Constant Use', '1,2', '{\"right\":{\"segmentheight\":\"333\",\"fittingheight\":\"333\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-13 02:36:54', 2),
(3, 'Ziyadh ', NULL, '2024-09-27', 26, 'Male', '9446805672', '', 'ziyadh0114@gmail.com', ' Regular ', 'Salaried', '4HRS', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', NULL, '', NULL, '', NULL, ' ', '{\"pd_right\":\"\",\"pd_left\":\"\",\"pd_both\":\"\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', NULL, '{\"right\":{\"sph\":\"+1.00\",\"cyl\":\"0.00\",\"axis\":\"90\\/180\",\"add\":\"+1.00\",\"pd\":\"30\"},\"left\":{\"sph\":\"+100\",\"cyl\":\"0.00\",\"axis\":\"90\\/180\",\"add\":\"+1.00\",\"pd\":\"30\"}}', 'Comfortable', 'Constant Use', '2', '{\"right\":{\"segmentheight\":\"7\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"9\",\"fittingheight\":\"\"}}', 1, '2024-10-24 01:06:36', 2),
(4, 'Test', 1, '2024-10-05', 23, 'Male', '58464', '', '', '', 'Select Occupation', 'Select Digital Usage', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', NULL, '', NULL, '', NULL, '', '{\"pd_right\":\"\",\"pd_left\":\"\",\"pd_both\":\"\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, '{\"right\":{\"segmentheight\":\"1225\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-10-15 21:54:43', 2),
(5, 'Hello', 2, '2024-10-05', 58, 'Male', '6454554', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', 'Comfortable', NULL, '1,2', NULL, 1, '2024-10-05 04:46:37', 2),
(6, 'Ajmal', 3, '2024-10-07', 18, 'Male', '94468050766', '', 'ajmal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, '{\"right\":{\"segmentheight\":\"45\",\"fittingheight\":\"5\"},\"left\":{\"segmentheight\":\"54\",\"fittingheight\":\"5\"}}', 1, '2024-10-05 21:36:21', 2),
(7, 'Ajmal', 4, '2024-10-08', 24, 'Male', '9647567486', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, NULL, 1, '2024-10-07 21:36:56', 2),
(8, 'Safwan', 5, '2024-10-16', 24, 'Male', '9446805672', '', 'ajmal@gmail.com', 'Regular eyecheckup ', 'Select Occupation', '6HRS', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"6\\/6\",\"Near Vision\":\"6\\/6\"},\"left\":{\"Distance Vision\":\"6\\/6\",\"Near Vision\":\"6\\/6\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', 'Normal', '', 'Normal', '', 'Normal', '', '{\"pd_right\":\"30\",\"pd_left\":\"30\",\"pd_both\":\"60\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', 'Refined', '{\"right\":{\"sph\":\"+1.00\",\"cyl\":\"0.00\",\"axis\":\"\",\"add\":\"\",\"pd\":\"30\"},\"left\":{\"sph\":\"+1.00\",\"cyl\":\"0.00\",\"axis\":\"\",\"add\":\"\",\"pd\":\"30\"}}', 'Comfortable', 'Constant Use', '3', '{\"right\":{\"segmentheight\":\"1\",\"fittingheight\":\"1\"},\"left\":{\"segmentheight\":\"1\",\"fittingheight\":\"3\"}}', 1, '2024-10-15 21:58:33', 2),
(9, 'Ziyadh', 6, '2024-11-08', 123, 'Male', '9446805672', '', 'ziyadh0114@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, NULL, 1, '2024-11-07 22:51:53', 2),
(10, 'Arshad', 7, '2024-11-11', 24, 'Male', '7025903943', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-11 02:11:53', 2),
(11, 'Munner', 8, '2024-11-11', 30, 'Male', '9656452829', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, NULL, 1, '2024-11-11 02:31:31', 2),
(12, 'Inthisham', 9, '2024-11-11', 22, 'Male', '7559808602', '', 'inthisham012@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"-0.50\",\"cyl\":\"0.00\",\"axis\":\"----\",\"add\":\"----\",\"pd\":\"30\"},\"left\":{\"sph\":\"0.00\",\"cyl\":\"0.00\",\"axis\":\"----\",\"add\":\"----\",\"pd\":\"30\"}}', 'Comfortable', 'Occasional Use', '2', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-11 09:41:36', 2),
(13, 'Nanda kishore', 10, '2024-11-13', 29, 'Male', '7012093573', '', 'nandhums46@gmail.com', ' ', 'Select Occupation', 'Select Digital Usage', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', NULL, '', NULL, '', NULL, ' ', '{\"pd_right\":\"\",\"pd_left\":\"\",\"pd_both\":\"\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', NULL, '{\"right\":{\"sph\":\"+0.25\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"0.00\",\"pd\":\"31\"},\"left\":{\"sph\":\"+0.25\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"0.00\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '2', '{\"right\":{\"segmentheight\":\"6\",\"fittingheight\":\"2\"},\"left\":{\"segmentheight\":\"6\",\"fittingheight\":\"5\"}}', 1, '2024-11-13 07:54:12', 2),
(14, 'Ansil', 11, '2024-11-13', 25, 'Male', '9496612747', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, NULL, 1, '2024-11-13 07:30:46', 2),
(15, 'Afsal', 12, '2024-11-14', 23, 'Male', '8943879283', '', '', 'Regular eyecheckup ', 'Salaried', '3HRS', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', '1731598406_be6ec0394d957e8aad44.jpg', '{\"right\":{\"Distance Vision\":\"6\\/9\",\"Near Vision\":\"N6\"},\"left\":{\"Distance Vision\":\"6\\/24\",\"Near Vision\":\"N6\"}}', '{\"right\":{\"Distance Vision\":\"6\\/6\",\"Near Vision\":\"N6\"},\"left\":{\"Distance Vision\":\"6\\/12\",\"Near Vision\":\"N6\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', 'Normal', '', 'Normal', '', 'Normal', '', '{\"pd_right\":\"31\",\"pd_left\":\"31\",\"pd_both\":\"62\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"Refined \"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"Refined \"}}', 'Refined', '{\"right\":{\"sph\":\"-0.50\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"0.00\",\"pd\":\"31\"},\"left\":{\"sph\":\"-3.25\",\"cyl\":\"-1.50\",\"axis\":\"30\",\"add\":\"0.00\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '2', NULL, 1, '2024-11-14 09:33:26', 2),
(16, 'Rimsha fathima', 13, '2024-11-16', 9, 'Female', '9933276745', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"+2.00\",\"cyl\":\"-4.00\",\"axis\":\"10\",\"add\":\"0.00\",\"pd\":\"31\"},\"left\":{\"sph\":\"+1.50\",\"cyl\":\"-4.00\",\"axis\":\"170\",\"add\":\"0.00\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '2', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-16 09:13:21', 2),
(18, 'Fasal', 14, '2024-11-18', 35, 'Male', '9048895435', '', 'fasalu689@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"-1.00\",\"cyl\":\"-0.75\",\"axis\":\"170\",\"add\":\"0.00\",\"pd\":\"31\"},\"left\":{\"sph\":\"0.00\",\"cyl\":\"-1.25\",\"axis\":\"40\",\"add\":\"0.00\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '2', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-18 06:41:30', 2),
(19, 'Munner', 15, '2024-11-18', 35, 'Male', '9656452829', '', '', ' ', 'Select Occupation', 'Select Digital Usage', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', NULL, '', NULL, '', NULL, ' ', '{\"pd_right\":\"\",\"pd_left\":\"\",\"pd_both\":\"\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', NULL, '{\"right\":{\"sph\":\"-1.25\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"0.00\",\"pd\":\"31\"},\"left\":{\"sph\":\"-1.00\",\"cyl\":\"-4.00\",\"axis\":\"100\",\"add\":\"0.00\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '2', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"\"}}', 1, '2024-11-18 08:06:50', 2),
(20, 'Abdul rasheed', 16, '2024-11-19', 48, 'Male', '8281048900', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', NULL, NULL, NULL, NULL, 1, '2024-11-19 03:33:22', 2),
(21, 'Bijeesh ', 17, '2024-11-19', 44, 'Male', '8075619505', '', '', ' ', 'Select Occupation', 'Select Digital Usage', '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"add\":\"\"}}', NULL, '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', '{\"right\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"},\"left\":{\"Distance Vision\":\"\",\"Near Vision\":\"\"}}', NULL, '', NULL, '', NULL, ' ', '{\"pd_right\":\"\",\"pd_left\":\"\",\"pd_both\":\"\"}', '{\"right\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"},\"left\":{\"red\":\"\",\"green\":\"\",\"both\":\"\"}}', NULL, '{\"right\":{\"sph\":\"0.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.50\",\"pd\":\"31\"},\"left\":{\"sph\":\"0.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.50\",\"pd\":\"31\"}}', 'Comfortable', 'Constant Use', '4', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"24\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"24\"}}', 1, '2024-11-19 08:09:34', 2),
(22, 'Muhammed shafi', 18, '2024-11-19', 48, 'Male', '9447629285', '', 'mohammedshafikpkdy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"+1.75\",\"cyl\":\"-2.75\",\"axis\":\"90\",\"add\":\"+1.75\",\"pd\":\"31.5\"},\"left\":{\"sph\":\"+1.25\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.75\",\"pd\":\"31.5\"}}', 'Comfortable', 'Constant Use', '4', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"27\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"27\"}}', 1, '2024-11-19 07:26:56', 2),
(23, 'Raheena', 19, '2024-11-20', 40, 'Female', '9633201602', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"0.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.00\",\"pd\":\"62.5\"},\"left\":{\"sph\":\"0.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.00\",\"pd\":\"62.5\"}}', 'Comfortable', 'Constant Use', '4', '{\"right\":{\"segmentheight\":\"6\",\"fittingheight\":\"\"},\"left\":{\"segmentheight\":\"6\",\"fittingheight\":\"\"}}', 1, '2024-11-20 03:35:36', 2),
(24, 'Abdul rasheed', 20, '2024-11-20', 48, NULL, '8281048900', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"+1.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+1.75\",\"pd\":\"62.5\"},\"left\":{\"sph\":\"+1.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"1.75\",\"pd\":\"62.5\"}}', 'Comfortable', 'Constant Use', '4', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"25\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"25\"}}', 1, '2024-11-20 03:38:09', 2),
(25, 'Subramanian ', 21, '2024-11-20', 59, 'Male', '7594827273', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"+1.50\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+2.50\",\"pd\":\"31.5\"},\"left\":{\"sph\":\"+2.00\",\"cyl\":\"0.00\",\"axis\":\"0.00\",\"add\":\"+2.50\",\"pd\":\"31.5\"}}', 'Comfortable', 'Constant Use', '3', NULL, 1, '2024-11-20 09:25:24', 2),
(26, 'Shijeesh', 22, '2024-11-20', 48, NULL, '9846445952', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"},\"left\":{\"sph\":\"\",\"cyl\":\"\",\"axis\":\"\",\"add\":\"\",\"pd\":\"\"}}', 'Comfortable', 'Constant Use', '4', NULL, 1, '2024-11-20 09:44:46', 2),
(27, 'Vasu ', 23, '2024-11-21', 59, 'Male', '9847703005', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"right\":{\"sph\":\"+2.50\",\"cyl\":\"0.00\",\"axis\":\"0.0\",\"add\":\"+2.50\",\"pd\":\"29\"},\"left\":{\"sph\":\"+2.50\",\"cyl\":\"0.00\",\"axis\":\"0.0\",\"add\":\"+2.50\",\"pd\":\"29\"}}', 'Comfortable', 'Constant Use', '4', '{\"right\":{\"segmentheight\":\"\",\"fittingheight\":\"21\"},\"left\":{\"segmentheight\":\"\",\"fittingheight\":\"21\"}}', 1, '2024-11-20 23:32:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`id`, `description`, `image`, `store_id`, `CreatedDate`) VALUES
(4, '<p>1 year warranty</p>', '1726850915_356705939326ab74362f.jpg', 1, '2024-09-20 11:48:35'),
(28, '<p>Male</p>', '1729482915_37801134fc7f26d40233.jpg', 1, '2024-10-20 22:55:15'),
(29, '<p>Female</p>', '1729482928_7496ed2725f4ef46be40.jpg', 1, '2024-10-20 22:55:28'),
(30, '<p>Unisex</p>', '1729483220_d689d1e75dbd64067bc7.jpg', 1, '2024-10-20 23:00:20'),
(31, '<p>Aviator shape</p>', '1729483326_b6d0e1a1d3637d42bd71.jpg', 1, '2024-10-20 23:02:06'),
(32, '<p>Rectangle shape</p>', '1729483598_c97af8b30ff7450538bf.jpg', 1, '2024-10-20 23:06:38'),
(33, '<p>Round shape</p>', '1729483616_ceb8c3d87342a8994b3b.jpg', 1, '2024-10-20 23:06:56'),
(34, '<p>Geometric shape</p>', '1729483903_0b311d1ebd0b38a6fa37.jpg', 1, '2024-10-20 23:07:16'),
(35, '<p>Cat eye shape</p>', '1729483659_d4fd8258a2c09abcb5e2.jpg', 1, '2024-10-20 23:07:39'),
(36, '<p>Square shape</p>', '1729483673_9af3e6b66c8f7ce5c25b.jpg', 1, '2024-10-20 23:07:53'),
(37, '<p>Blue block lenses</p>', '1729613531_e9574688976052ba746f.webp', 1, '2024-10-22 11:12:09'),
(39, '<p>UV protection&nbsp;</p>', '1729613872_78d4bf4e285b846d94d9.jpg', 1, '2024-10-22 11:17:52'),
(40, '<p>Polarised&nbsp;</p>', '1729613963_f3d5159c8b89b8e589f2.png', 1, '2024-10-22 11:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(200) DEFAULT NULL,
  `isPrivilegeApplied` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `group_name`, `isPrivilegeApplied`, `store_id`, `CreatedDate`) VALUES
(1, 'GENERAL', 0, 1, '2024-09-20 02:07:35'),
(3, 'Eyewears', 1, 1, '2024-10-20 21:59:26'),
(4, 'Sunglasses ', 0, 1, '2024-10-20 21:59:36'),
(5, 'Kids', 1, 1, '2024-10-20 21:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoicereceipt`
--

CREATE TABLE `tbl_invoicereceipt` (
  `Rid` int(11) NOT NULL,
  `voucherType` varchar(200) NOT NULL,
  `master_invoice_date` date NOT NULL,
  `sales_masterId` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `PaymentMode` varchar(200) NOT NULL,
  `ReferanceNo` text NOT NULL,
  `BillAmount` decimal(18,2) NOT NULL,
  `PendingAmount` decimal(18,2) NOT NULL,
  `PaidAmount` decimal(18,2) NOT NULL,
  `Balance` decimal(18,2) NOT NULL,
  `SalesManId` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoicereceipt`
--

INSERT INTO `tbl_invoicereceipt` (`Rid`, `voucherType`, `master_invoice_date`, `sales_masterId`, `InvoiceNo`, `PaymentMode`, `ReferanceNo`, `BillAmount`, `PendingAmount`, `PaidAmount`, `Balance`, `SalesManId`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(1, 'sales', '2024-11-11', 1, 1, 'Gpay', '', 80.00, 80.00, 80.00, 0.00, 2, 1, '2024-11-11 14:22:25', 0),
(2, 'sales', '2024-11-11', 9, 2, 'Gpay', '', 1300.00, 1300.00, 1300.00, 0.00, 1, 1, '2024-11-11 21:14:44', 0),
(4, 'sales', '2024-11-13', 11, 4, 'Cash', '', 3599.00, 3599.00, 0.00, 3599.00, 1, 1, '2024-11-13 19:25:35', 0),
(22, 'sales', '2024-11-16', 29, 6, 'Cash', '', 1800.00, 1800.00, 1000.00, 800.00, 1, 1, '2024-11-16 21:36:22', 0),
(23, 'sales', '2024-11-18', 30, 7, 'Cash', '', 80.00, 80.00, 80.00, 0.00, 2, 1, '2024-11-18 10:54:36', 0),
(29, 'sales', '2024-11-18', 36, 11, 'Cash', '', 2199.00, 2199.00, 500.00, 1699.00, 2, 1, '2024-11-18 20:02:49', 0),
(30, 'sales', '2024-11-18', 37, 12, 'Cash', '', 1979.10, 1979.10, 500.00, 1479.10, 2, 1, '2024-11-18 20:11:10', 0),
(32, 'sales', '2024-11-19', 39, 14, 'Cash', '', 5399.00, 5399.00, 1000.00, 4399.00, 1, 1, '2024-11-19 19:27:11', 0),
(35, 'sales', '2024-11-20', 42, 17, 'Cash', '', 9239.40, 9239.40, 6000.00, 3239.40, 1, 1, '2024-11-20 15:17:36', 0),
(36, 'receipt', '2024-11-20', 29, 6, 'Gpay', '', 1800.00, 800.00, 800.00, 0.00, 1, 1, '2024-11-20 20:07:33', 0),
(41, 'sales', '2024-11-21', 43, 18, 'Cash', '', 2199.50, 2199.50, 0.00, 2199.50, 2, 1, '2024-11-21 11:09:30', 0),
(42, 'receipt', '2024-11-21', 43, 18, 'Cash', '', 2199.50, 2199.50, 2199.50, 0.00, 1, 1, '2024-11-21 16:13:11', 0),
(43, 'receipt', '2024-11-21', 42, 17, 'Cash', '', 9239.40, 3239.40, 3239.40, 0.00, 1, 1, '2024-11-21 16:18:55', 0),
(44, 'receipt', '2024-11-21', 39, 14, 'Cash', '', 5399.00, 4399.00, 4399.00, 0.00, 1, 1, '2024-11-21 16:22:42', 0),
(45, 'receipt', '2024-11-21', 37, 12, 'Cash', '', 1979.10, 1479.10, 1479.10, 0.00, 1, 1, '2024-11-21 16:30:33', 0),
(46, 'receipt', '2024-11-21', 36, 11, 'Cash', '', 2199.00, 1699.00, 1699.00, 0.00, 1, 1, '2024-11-21 16:33:00', 0),
(47, 'receipt', '2024-11-21', 11, 4, 'Cash', '', 3599.00, 3599.00, 3599.00, 0.00, 1, 1, '2024-11-21 16:36:23', 0),
(48, 'sales', '2024-11-21', 44, 19, 'Cash', '', 6900.00, 6900.00, 900.00, 6000.00, 1, 1, '2024-11-21 16:44:56', 0),
(49, 'receipt', '2024-11-21', 44, 19, 'Cash', '', 6900.00, 6000.00, 6000.00, 0.00, 1, 1, '2024-11-21 16:45:37', 0),
(50, 'sales', '2024-11-21', 45, 20, 'Cash', '', 4700.00, 4700.00, 700.00, 4000.00, 1, 1, '2024-11-21 16:46:53', 0),
(51, 'receipt', '2024-11-21', 45, 20, 'Cash', '', 4700.00, 4000.00, 4000.00, 0.00, 1, 1, '2024-11-21 16:48:31', 0),
(52, 'sales', '2024-11-21', 46, 21, 'Cash', '', 4700.00, 4700.00, 700.00, 4000.00, 1, 1, '2024-11-21 16:51:53', 0),
(53, 'receipt', '2024-11-21', 46, 21, 'Cash', '', 4700.00, 4000.00, 4000.00, 0.00, 1, 1, '2024-11-21 16:52:06', 0),
(54, 'sales', '2024-11-21', 47, 22, 'Cash', '', 3499.00, 3499.00, 499.00, 3000.00, 1, 1, '2024-11-21 16:55:45', 0),
(55, 'receipt', '2024-11-21', 47, 22, 'Cash', '', 3499.00, 3000.00, 3000.00, 0.00, 1, 1, '2024-11-21 16:56:00', 0),
(56, 'sales', '2024-11-21', 48, 23, 'Cash', '', 5200.00, 5200.00, 200.00, 5000.00, 1, 1, '2024-11-21 17:02:49', 0),
(57, 'receipt', '2024-11-21', 48, 23, 'Cash', '', 5200.00, 5000.00, 5000.00, 0.00, 1, 1, '2024-11-21 17:03:09', 0),
(58, 'sales', '2024-11-21', 49, 24, 'Cash', '', 5200.00, 5200.00, 200.00, 5000.00, 1, 1, '2024-11-21 17:05:44', 0),
(59, 'receipt', '2024-11-21', 49, 24, 'Cash', '', 5200.00, 5000.00, 5000.00, 0.00, 1, 1, '2024-11-21 17:05:55', 0),
(60, 'sales', '2024-11-21', 50, 25, 'Cash', '', 4700.00, 4700.00, 300.00, 4400.00, 1, 1, '2024-11-21 17:06:54', 0),
(61, 'receipt', '2024-11-21', 50, 25, 'Cash', '', 4700.00, 4400.00, 4400.00, 0.00, 1, 1, '2024-11-21 17:07:11', 0),
(62, 'sales', '2024-11-21', 51, 26, 'Cash', '', 15499.00, 15499.00, 4999.00, 10500.00, 1, 1, '2024-11-21 17:10:17', 0),
(63, 'receipt', '2024-11-21', 51, 26, 'Cash', '', 15499.00, 10500.00, 10500.00, 0.00, 1, 1, '2024-11-21 17:10:35', 0),
(64, 'sales', '2024-11-21', 52, 27, 'Cash', '', 12100.00, 12100.00, 2100.00, 10000.00, 1, 1, '2024-11-21 17:12:28', 0),
(65, 'receipt', '2024-11-21', 52, 27, 'Cash', '', 12100.00, 10000.00, 10000.00, 0.00, 1, 1, '2024-11-21 17:12:44', 0),
(66, 'sales', '2024-11-22', 53, 28, 'Cash', '', 3145.04, 3145.04, 145.04, 3000.00, 1, 1, '2024-11-22 14:18:45', 0),
(67, 'receipt', '2024-11-22', 53, 28, 'Cash', 'test', 3145.04, 3000.00, 3000.00, 0.00, 1, 1, '2024-11-23 10:40:26', 0),
(69, 'sales', '2024-11-23', 54, 29, 'Cash', '', 2600.00, 2600.00, 600.00, 2000.00, 1, 1, '2024-11-23 14:53:02', 0),
(71, 'sales', '2024-11-28', 56, 30, 'Cash', '', 1999.50, 1999.50, 1999.50, 0.00, 1, 1, '2024-11-28 11:35:15', 0),
(74, 'sales', '2024-11-29', 59, 32, 'Cash', '', 1349.50, 1349.50, 349.50, 1000.00, 1, 1, '2024-11-29 14:50:26', 0),
(75, 'sales', '2024-11-29', 60, 33, 'Cash', '', 1349.50, 1349.50, 0.00, 0.00, 1, 1, '2024-11-29 14:54:10', 0),
(76, 'sales', '2024-11-29', 61, 34, 'Cash', '', 1349.50, 1349.50, 0.00, 0.00, 1, 1, '2024-11-29 14:55:40', 0),
(77, 'sales', '2024-12-07', 54, 35, 'Cash', '', 2180.68, 2180.68, 0.00, 0.00, 1, 1, '2024-12-07 15:25:21', 0),
(80, 'sales', '2024-12-10', 63, 36, 'Cash', '', 10399.00, 10399.00, 0.00, 0.00, 1, 1, '2024-12-10 14:24:02', 0),
(81, 'sales', '2024-12-11', 64, 37, 'Cash', '', 1401.51, 1401.51, 401.51, 1000.00, 1, 1, '2024-12-11 10:41:15', 0),
(82, 'sales', '2024-12-12', 65, 38, 'Cash', '', 18599.00, 18599.00, 0.00, 0.00, 1, 1, '2024-12-12 11:10:54', 0),
(84, 'sales', '2024-12-12', 67, 40, 'Cash', '', 3258.96, 3258.96, 258.96, 3000.00, 1, 1, '2024-12-12 12:05:42', 0),
(86, 'sales', '2024-12-12', 69, 42, 'Cash', '', 15381.01, 15381.01, 0.00, 0.00, 1, 1, '2024-12-12 13:38:12', 0),
(87, 'sales', '2024-12-14', 70, 43, 'Cash', '', 3099.00, 3099.00, 0.00, 0.00, 1, 0, '2024-12-14 12:35:57', 0),
(89, 'sales', '2024-12-16', 72, 45, 'Cash', '', 3099.00, 3099.00, 99.00, 3000.00, 1, 0, '2024-12-16 12:13:23', 0),
(90, 'sales', '2024-12-17', 73, 46, 'Card', '', 3311.11, 3311.11, 311.11, 3000.00, 1, 0, '2024-12-17 10:42:16', 0),
(91, 'sales', '2024-12-17', 74, 47, 'Card', '', 4449.50, 4449.50, 449.50, 4000.00, 1, 0, '2024-12-17 12:10:43', 0),
(92, 'receipt', '2024-12-27', 72, 45, 'Cash', '', 3099.00, 3000.00, 1000.00, 2000.00, 1, 0, '2024-12-27 12:01:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoicereceipt_history`
--

CREATE TABLE `tbl_invoicereceipt_history` (
  `id` int(11) NOT NULL,
  `SalesMaster_historyId` int(11) NOT NULL,
  `voucherType` varchar(200) NOT NULL,
  `master_invoice_date` date NOT NULL,
  `sales_masterId` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `PaymentMode` varchar(200) NOT NULL,
  `ReferanceNo` text NOT NULL,
  `BillAmount` decimal(18,2) NOT NULL,
  `PendingAmount` decimal(18,2) NOT NULL,
  `PaidAmount` decimal(18,2) NOT NULL,
  `Balance` decimal(18,2) NOT NULL,
  `SalesManId` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoicereceipt_history`
--

INSERT INTO `tbl_invoicereceipt_history` (`id`, `SalesMaster_historyId`, `voucherType`, `master_invoice_date`, `sales_masterId`, `InvoiceNo`, `PaymentMode`, `ReferanceNo`, `BillAmount`, `PendingAmount`, `PaidAmount`, `Balance`, `SalesManId`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(1, 3, 'sales', '2024-12-09', 62, 35, 'Cash', '', 20699.00, 20699.00, 0.00, 0.00, 1, 1, '2025-01-03 14:30:29', 1),
(2, 3, 'sales', '2024-12-09', 62, 36, 'Cash', '', 0.00, 0.00, 0.00, 0.00, 1, 1, '2025-01-03 14:30:29', 1),
(3, 5, 'sales', '2024-12-12', 68, 41, 'Cash', '', 17019.00, 17019.00, 0.00, 0.00, 1, 1, '2024-12-12 13:05:11', 0),
(4, 6, 'sales', '2024-11-28', 57, 31, 'Cash', '', 2849.50, 2849.50, 849.50, 2000.00, 1, 1, '2024-11-28 12:22:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens`
--

CREATE TABLE `tbl_lens` (
  `id` int(11) NOT NULL,
  `lens_name` varchar(200) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lens`
--

INSERT INTO `tbl_lens` (`id`, `lens_name`, `store_id`, `CreatedDate`) VALUES
(1, 'Zero Power', 1, '2024-09-18 03:59:06'),
(2, 'Single Vision', 1, '2024-09-18 04:00:45'),
(3, 'Bifocal', 1, '2024-09-18 04:04:33'),
(4, 'Progressive', 1, '2024-09-18 04:04:42'),
(5, 'Tinted', 1, '2024-09-18 04:04:49'),
(6, 'Without Power', 1, '2024-10-23 23:58:23'),
(7, 'With Power ', 1, '2024-11-07 00:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens_cleaner`
--

CREATE TABLE `tbl_lens_cleaner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `decsription` text NOT NULL,
  `features` varchar(200) NOT NULL,
  `purchase_rate` decimal(18,2) NOT NULL,
  `sales_rate` decimal(18,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lens_cleaner`
--

INSERT INTO `tbl_lens_cleaner` (`id`, `name`, `decsription`, `features`, `purchase_rate`, `sales_rate`, `image`, `store_id`) VALUES
(1, 'ZEALUX LENS CLEANER', 'Remove dust,smudge from all surfaces', '', 100.00, 80.00, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens_coating`
--

CREATE TABLE `tbl_lens_coating` (
  `id` int(11) NOT NULL,
  `coating_name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `purchase_rate` decimal(18,2) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lens_coating`
--

INSERT INTO `tbl_lens_coating` (`id`, `coating_name`, `description`, `image`, `amount`, `purchase_rate`, `store_id`, `CreatedDate`) VALUES
(1, 'Blue Cutting', '', '1729747011_3cb940a8a84ae764e30c.webp', 500.00, 200.00, 1, '2024-11-25 00:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens_creation`
--

CREATE TABLE `tbl_lens_creation` (
  `lensId` int(11) NOT NULL,
  `lensName` varchar(200) DEFAULT NULL,
  `purchaseRate` decimal(18,2) DEFAULT NULL,
  `mrp` decimal(18,2) DEFAULT NULL,
  `salesRate` decimal(18,2) DEFAULT NULL,
  `lens` int(11) DEFAULT NULL,
  `lensFeaturesId` text DEFAULT NULL,
  `delivery_days` int(11) NOT NULL DEFAULT 1,
  `warranty_days` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lens_creation`
--

INSERT INTO `tbl_lens_creation` (`lensId`, `lensName`, `purchaseRate`, `mrp`, `salesRate`, `lens`, `lensFeaturesId`, `delivery_days`, `warranty_days`, `store_id`, `CreatedDate`) VALUES
(25, 'ZEALUX BASIC ANTIGLARE 1.56', 120.00, 400.00, 0.00, 2, '15,17', 4, 365, 1, '2024-12-09 03:23:05'),
(26, 'ZEALUX ANTIGLARE 1.56', 4.00, 700.00, 600.00, 2, '6,10,13,15,17', 4, 365, 1, '2024-11-17 05:30:33'),
(27, 'ZEALUX BLUCUT 1.60', 240.00, 1000.00, 900.00, 2, '6,9,10,13,14,15,16,19', 4, 365, 1, '2024-11-17 05:33:57'),
(28, 'ZEALUX ANTIGLARE PHOTOCHROMATIC 1.56', 460.00, 1500.00, 1300.00, 2, '4,6,8,13,14,15,16,17', 1, 365, 1, '2024-11-17 05:34:17'),
(29, 'ZEALUX BLUCUT PHOTOCHROMATIC 1.60', 1200.00, 4500.00, 3900.00, 2, '6,8,9,10,13,14,15,16,19', 4, 365, 1, '2024-11-17 05:38:05'),
(30, 'ZEALUX NIGHT DRIVE BLUE FILTER 1.60', 1200.00, 4500.00, 3900.00, 2, '6,10,11,13,14,15,16,19,22', 4, 0, 1, '2024-11-17 05:54:49'),
(31, 'NOVA BLUEMAX ULTRA SATIN + 1.56', 3380.00, 4000.00, 3300.00, 2, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 05:45:34'),
(32, 'NOVA TRANSITION CLASSIC 1.56 (Grey)', 7360.00, 7300.00, 7300.00, 2, '8,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 05:49:51'),
(33, 'NOVA TRANSITION GEN8 1.56 (GREY/BROWN/GREEN)', 17980.00, 17980.00, 17900.00, 2, '6,8,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 05:51:34'),
(34, 'NOVA BLUMAX ULTRA 1.67', 11180.00, 11180.00, 11100.00, 2, '6,9,10,13,14,15,16,19', 4, 365, 1, '2024-11-17 05:53:24'),
(35, 'NOVA BLUMAX ULTRA 1.74', 16580.00, 16580.00, 16500.00, 2, '6,9,10,13,14,15,16,21', 4, 365, 1, '2024-11-17 05:54:27'),
(36, 'NOVA POLYCARBONATE 1.59', 5580.00, 5580.00, 5500.00, 2, '6,10,14,15,16,18', 1, 365, 1, '2024-11-17 05:56:45'),
(37, 'RODENSTOCK 1.56 ', 7680.00, 7600.00, 7600.00, 2, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:24:01'),
(38, 'RODENSTOCK 1.67', 13680.00, 13680.00, 13600.00, 2, '6,9,10,13,14,15,16,20', 4, 365, 1, '2024-11-17 06:02:42'),
(39, 'ESSILOR CRIZAL 1.56', 5080.00, 5000.00, 5000.00, 2, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:04:20'),
(40, 'ESSILOR CRIZAL ROCK 1.56', 8480.00, 8400.00, 8400.00, 2, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:05:40'),
(41, 'ESSILOR CRIZAL TRANSITION CLASSIC 1.56', 8480.00, 8400.00, 8400.00, 2, '6,8,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:06:56'),
(42, 'ZEALUX ANTIGLARE 1.56', 1250.00, 1250.00, 1200.00, 3, '4,6,13,15,16,17', 4, 365, 1, '2024-11-17 06:10:28'),
(43, 'ZEALUX BLUCUT 1.56', 1600.00, 1700.00, 1700.00, 3, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:11:42'),
(44, 'ZEALUX PHOTOCHROMATIC 1.56', 2000.00, 2200.00, 2200.00, 3, '6,8,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:12:37'),
(45, 'ZEALUX PROGRESSIVE ANTIGLARE ', 2000.00, 2700.00, 2700.00, 4, '4,6,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:14:07'),
(46, 'ZEALUX PROGRESSIVE BLUE CUT ', 3000.00, 3300.00, 3300.00, 4, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:15:28'),
(47, 'ZEALUX PROGRESSIVE BLUCUT PHOTOCHROMATIC ', 4200.00, 4100.00, 4100.00, 4, '6,8,9,10,13,14,15,16,17', 1, 365, 1, '2024-11-17 06:16:58'),
(48, 'NOVA PROGRESSIVE DELITE 1.50', 11620.00, 11620.00, 11600.00, 4, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:19:01'),
(49, 'NoVA PROGRESSIVE TRENDFREE 2.0.  1.50', 14240.00, 13700.00, 13700.00, 4, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:23:12'),
(50, 'NOVA PROGRESSIVE 3DI 1.50', 24260.00, 24260.00, 23700.00, 4, '6,9,10,12,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:22:37'),
(51, 'VISIO PROGRESSIVE BLUCUT 1.50', 10100.00, 10020.00, 10020.00, 4, '6,9,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:25:16'),
(52, 'VISIO PROGRESSIVE HMC  1.50', 9000.00, 8520.00, 8520.00, 4, '6,10,13,14,15,16,17', 4, 365, 1, '2024-11-17 06:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens_feature`
--

CREATE TABLE `tbl_lens_feature` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lens_feature`
--

INSERT INTO `tbl_lens_feature` (`id`, `description`, `image`, `store_id`, `CreatedDate`) VALUES
(4, '<p>6month warranty&nbsp;</p>', '1727458595_16b54ee647a427eae6c2.jpg', 1, '2024-09-27 12:36:35'),
(6, '<p>Double side anti glare lens&nbsp;</p>', '1731295684_f9f7472103c5b6265abd.jpg', 1, '2024-11-10 21:28:04'),
(8, '<p>Photochromatic</p>', '1731311193_0e1da540ab3c1fb51075.jpg', 1, '2024-11-11 01:46:33'),
(9, '<p>Blue Cut Green Coat&nbsp;</p>', '1731311275_aa4b60590dcafc3e74fb.png', 1, '2024-11-11 01:47:55'),
(10, '<p>1 Year Warranty&nbsp;</p>', '1731311345_029197630583be82f663.jpg', 1, '2024-11-11 01:49:05'),
(11, '<p>Blue Cut Blue lens&nbsp;</p>', '1731311398_9a9f7e85fc8ee5263f8e.webp', 1, '2024-11-11 01:49:58'),
(12, '<p>Blue Cut photochromatic&nbsp;</p>', '1731311436_9a5c7e7dc26749e89e1b.jpg', 1, '2024-11-11 01:50:36'),
(13, '<p>UV protection&nbsp;</p>', '1731311562_2221153e80297d6ad823.jpg', 1, '2024-11-11 01:52:42'),
(14, '<p>WATER AND DUST REPELLENT&nbsp;</p>', '1731311711_2ca8505e731417b95909.jpg', 1, '2024-11-11 01:55:11'),
(15, '<p>SCRATCH RESISTANCE&nbsp;</p>', '1731311814_97f15f502271949bade7.png', 1, '2024-11-11 01:56:54'),
(16, '<p>SMUDGE RESISTANT&nbsp;</p><p>&nbsp;</p>', '1731312068_4496eb640e68c0ec4094.jpg', 1, '2024-11-11 02:01:08'),
(17, '<p>1.56 index&nbsp;</p>', '1731329219_31025385c0e28293d077.jpg', 1, '2024-11-11 06:46:59'),
(18, '<p>1.59 index&nbsp;</p>', '1731329253_aa61a2b2c3987e1d5659.jpg', 1, '2024-11-11 06:47:33'),
(19, '<p>1.60 index&nbsp;</p>', '1731329280_0bf37272f984e168254b.jpg', 1, '2024-11-11 06:48:00'),
(20, '<p>1.67 index&nbsp;</p>', '1731329344_6ba92a7800d0b48a8800.jpg', 1, '2024-11-11 06:49:04'),
(21, '<p>1.74 index&nbsp;</p>', '1731329385_f32312ab7c6bd0b7153f.jpg', 1, '2024-11-11 06:49:45'),
(22, '<p>Night Drive</p>', '1731503076_bf1178c1c51f130d1e7c.jpg', 1, '2024-11-13 07:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 1,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `user_type`, `status`, `store_id`, `CreatedDate`) VALUES
(1, 'admin', 'zealux', 'admin', 1, 1, '0000-00-00 00:00:00'),
(2, 'user1', '123', 'user', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_previlage_card`
--

CREATE TABLE `tbl_previlage_card` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `type` int(11) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `amount` decimal(18,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_previlage_card`
--

INSERT INTO `tbl_previlage_card` (`id`, `name`, `gender`, `phone`, `email`, `dob`, `type`, `from_date`, `to_date`, `amount`, `status`, `store_id`, `CreatedDate`) VALUES
(1, 'John', 'Male', '1234567890', 'test@gamil.com', '2024-10-17', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(2, 'Teza', 'Female', '2234567891', 'test2@gamil.com', '2024-10-08', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(3, 'Ziyadh', 'Male', '9446805672', 'ziyadh0114@gmail.com', '1998-09-25', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(4, 'Ziyadh ', 'Male', '9446805672', 'ziyadh0114@gmail.com', '2024-11-08', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(5, 'Arshad', 'Male', '7025903943', '', '2000-11-11', 5, '2024-11-28', '2024-11-30', 60.00, 1, 1, '2024-11-29 12:05:17'),
(6, 'Inthisham', 'Male', '7559808602', '', '0000-00-00', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(7, 'Nandha kishore', 'Male', '7012093573', 'nandhums46@gmail.com', '0000-00-00', 1, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(8, 'Fasal', 'Male', '9048895435', '', '0000-00-00', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(9, 'Munner', 'Male', '9656452829', '', '0000-00-00', 0, NULL, NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(10, 'Muhammed shafi', 'Male', '9447629285', 'mohammedshafikpkdy@gmail.com', '1976-11-05', 0, '2024-11-27', '2024-11-30', 0.00, 1, 1, '2024-11-29 12:05:17'),
(11, 'Abdul rasheed ', 'Male', '8281048900', '', '1976-07-23', 0, '2024-11-27', NULL, 0.00, 1, 1, '2024-11-29 12:05:17'),
(15, 'Test pri', 'Male', '45456', '', '2024-11-13', 5, '2024-11-28', '2024-12-31', 60.00, 1, 1, '2024-11-29 12:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege_card_type`
--

CREATE TABLE `tbl_privilege_card_type` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `days` int(11) NOT NULL,
  `no_of_purchase` int(11) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_privilege_card_type`
--

INSERT INTO `tbl_privilege_card_type` (`id`, `type`, `days`, `no_of_purchase`, `amount`, `store_id`, `CreatedDate`) VALUES
(1, 'Type 1', 30, 6, 200.00, 1, '2024-11-27 03:34:26'),
(3, 'Type 2', 60, 12, 500.00, 1, '2024-11-27 03:45:25'),
(4, 'Type 3', 365, 10, 0.00, 1, '2024-11-27 04:47:39'),
(5, 'Type 4', 2, 10, 60.00, 1, '2024-11-28 01:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `barcode` text DEFAULT NULL,
  `productName` varchar(200) DEFAULT NULL,
  `supportedLense` text DEFAULT NULL,
  `feature` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `model` varchar(200) NOT NULL,
  `group` int(11) DEFAULT NULL,
  `mrp` decimal(18,2) DEFAULT NULL,
  `sales_rate` decimal(18,2) DEFAULT NULL,
  `purchase_rate` decimal(18,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `warranty_days` int(11) NOT NULL,
  `active_status` int(11) DEFAULT 1,
  `publish_date` date DEFAULT NULL,
  `publish_time` time DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `barcode`, `productName`, `supportedLense`, `feature`, `size`, `brand`, `model`, `group`, `mrp`, `sales_rate`, `purchase_rate`, `description`, `warranty_days`, `active_status`, `publish_date`, `publish_time`, `store_id`, `CreatedDate`) VALUES
(5, 'PMG4983/1055', 'Voyage Wayfarer Polarized Sunglasses for Men & Women (Black Lens | Black & Rose Gold Frame - PMG4983)', '6,7', '30,36,39,40', '3', 'VOYAGE', 'Full Frame', 4, 2500.00, 1999.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:57:51'),
(6, '8725MG4643', 'Voyage Transparent Wayfarer Eyeglasses for Men & Women (8725MG4643)', '6,7', '30,31,37', '4', 'VOYAGE', 'Full Frame', 4, 3000.00, 1800.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:00:22'),
(7, '8725MG4196', 'Voyage Black Wayfarer Eyeglasses for Men & Women (8725MG4196)', NULL, '30,32,37', '3', 'VOYAGE', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 11:34:13'),
(8, 'MG3770', 'Voyage Black Round Sunglasses - MG3770', NULL, '30,33,39', '3', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:54:57'),
(9, 'MG3771/2206', 'Voyage Black Round Sunglasses - MG3771', NULL, '30,33,39', '3', 'VOYAGE ', 'Full Frame', 4, 1800.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:42:28'),
(10, 'MG3773/2206', 'Voyage Blue Round Sunglasses - MG3773', '6', '30,33,39', '3', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:59:40'),
(11, 'MG3573/2057', 'Voyage Black Silver Rectangular Sunglasses - MG3573', '1,2,3,4', '30,32,39', '3', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 08:24:00'),
(12, 'TR8096PMG4489', 'Voyage Exclusive Matt Black Polarized Wayfarer Sunglasses for Men & Women (TR8096PMG4489)', '6', '4,30,36,39,40', '3', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:45:54'),
(13, 'TR8096PMG4487', 'Voyage Exclusive Shine Black Polarized Wayfarer Sunglasses for Men & Women (TR8096PMG4487)', '6,7', '30,36,39,40', '3', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:05:19'),
(14, 'PMG4187', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4187', NULL, '30,36,39,40', '3', 'VOYAGE ', 'Full Frame', 4, 3000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 22:02:19'),
(15, 'PMG4189', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4189', NULL, '30,36,39,40', '3', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 22:05:42'),
(16, 'MG3622/191', 'Voyage Premium Round Black Silver Sunglasses - MG3622', NULL, '30,33,39', '3', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:45:31'),
(17, 'MG3625/1915', 'Voyage Premium Round Black Sunglasses - MG3625', NULL, '30,33,39', '3', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:55:31'),
(18, 'MG2371/3025', 'Voyage Black Aviator Sunglasses - MG2371', '6', '4,30,31,39', '3', 'VOYAGE ', 'Full Frame', 4, 4000.00, 2000.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:56:43'),
(19, 'MG2372', 'Voyage Black Aviator Sunglasses - MG2372', NULL, '30,31,39', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 22:18:14'),
(20, 'PMG5255/221008', 'Voyage Exclusive Wayfarer Polarized Sunglasses for Men & Women (Black Lens | Matt Black Frame - PMG5255)', NULL, '30,36,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:54:17'),
(21, 'PMG5057/8076', 'Voyage Wayfarer Polarized Sunglasses for Men & Women (Black Lens | Matt Black Frame - PMG5057)', NULL, '30,36,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:50:03'),
(22, 'PMG5058/8076', 'Voyage Wayfarer Polarized Sunglasses for Men & Women (Black Lens | Matt Black Frame - PMG5058)', '6,7', '30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 1999.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:01:55'),
(23, 'PMG5059/8076', 'Voyage Wayfarer Polarized Sunglasses for Men & Women (Brown Lens | Brown Frame - PMG5059)', '6,7', '30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 1999.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 05:49:23'),
(24, 'PMG5608/8009', 'Voyage Aviator Polarized Sunglasses for Men & Women (Black Lens | Black Frame - PMG5608)', NULL, '30,31,39,40', '4', 'VOYAGE ', 'Select Model', 0, 3000.00, 1900.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 05:59:50'),
(25, 'PMG4571', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4571', NULL, '30,36,39,40', '4', 'VOYAGE ', 'Select Model', 0, 2500.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 22:36:10'),
(26, 'PMG4573/1302', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4573', '6,7', '30,36,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 3000.00, 1800.00, 450.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:08:30'),
(27, 'PMG4581/1109', 'Voyage Exclusive Black Polarized Rectangle Sunglasses for Men & Women - PMG4581', '6,7', '30,32,39,40', '4', 'VOYAGE', 'Select Model', 0, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:04:13'),
(28, 'PMG4582', 'Voyage Exclusive Black Polarized Rectangle Sunglasses for Men & Women - PMG4582', NULL, '30,32,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 22:43:55'),
(29, '2351MG3960', 'Voyage Black Round Sunglasses for Men & Women (2351MG3960)', '6,7', '30,33,39', '4', 'VOYAGE ', 'Select Model', 0, 3000.00, 2000.00, 450.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:10:06'),
(30, '2351MG3962', 'Voyage Blue Round Sunglasses for Men & Women (2351MG3962)', '6,7', '30,33,39', '4', 'VOYAGE ', 'Full Frame', 4, 3000.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:07:25'),
(31, 'MG2972/2036', 'Voyage Black Round Sunglasses - MG2972', '6', '4,30,33,39', '4', 'VOYAGE ', 'Full Frame', 4, 3000.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:21:24'),
(32, 'MG2974/2036', 'Brown-Gold Round Sunglasses - MG2974', NULL, '30,33,39', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:38:55'),
(33, 'MG2968/58157', 'Voyage Retro Square Black Sunglasses - MG2968', '6', '4,30,36,39', '4', 'VOYAGE ', 'Select Model', 0, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:19:06'),
(34, 'MG2969/58157', 'Voyage Retro Square Brown Sunglasses - MG2969', NULL, '30,36,39', '3', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:18:28'),
(35, 'MG2975/2036', 'Voyage Round Black Sunglasses - MG2975', '6', '30,33,39', '3', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:53:14'),
(36, 'TR3387PMG4579', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women (TR3387PMG4579)', NULL, '4,30,36,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:15:43'),
(37, 'TR3387PMG4580', 'Voyage Exclusive Green Polarized Wayfarer Sunglasses for Men & Women (TR3387PMG4580)', '6,7', '30,36,39,40', '4', 'VOYAGE ', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 06:09:23'),
(38, 'PMG4583', 'Voyage Exclusive Grey Polarized Wayfarer Sunglasses for Men & Women - PMG4583', NULL, '30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 23:15:10'),
(39, 'PMG4583', 'Voyage Exclusive Grey Polarized Wayfarer Sunglasses for Men & Women - PMG4583', NULL, '30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2000.00, 1800.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 23:15:10'),
(40, 'PMG4583/1109', 'Voyage Exclusive Grey Polarized Wayfarer Sunglasses for Men & Women - PMG4583', '6', '4,30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:20:45'),
(41, 'MG3186/8725', 'Voyage Cateye Sunglasses for Women (Pink & Grey Lens | Light Pink & Golden Frame - MG3186)', NULL, '29,35,39', '3', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:46:38'),
(42, 'PMG4189', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4189', NULL, '30,36,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-10-22 23:22:00'),
(43, 'TR3386PMG4576', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women (TR3386PMG4576)', '6', '4,30,31,39,40', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 450.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:44:58'),
(44, 'MG3669/952', 'Voyage Black Wayfarer Sunglasses - MG3669', '6,7', '30,36,39', '3', 'VOYAGE', 'Full Frame', 4, 2500.00, 1999.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:15:03'),
(45, 'MG5176/86601', 'Voyage Square Sunglasses for Men & Women (Black Lens | Black Frame - MG5176)', NULL, '30,36,39', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 05:56:31'),
(46, 'MG2778/8926', 'Voyage Silver-Black Retro Square Sunglasses - MG2778', '1,2,3,4,5', '30,34,39', '4', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 04:41:08'),
(47, 'MG2779', 'Voyage Square Gold Black Sunglasses - MG2779', '6', '4,30,34,39', '4', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:53:15'),
(48, '2182PMG4659', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women (2182PMG4659)', '1,2,3,4', '4,30,34,39,40', '3', 'VOYAGE ', 'Full Frame', 3, 3500.00, 2500.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:38:59'),
(49, '7009PMG4656', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women (7009PMG4656)', '1,2,3,4', '30,32,39,40', '3', 'VOYAGE', 'Full Frame', 3, 3000.00, 2500.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:17:04'),
(50, 'PMG1109', 'Voyage Exclusive Black Polarized Wayfarer Sunglasses for Men & Women - PMG4582', '6', '4,30,32,39,40', '3', 'VOYAGE', 'Full Frame', 4, 2500.00, 2000.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:12:02'),
(51, '1008MG5074', 'Voyage Black & Silver Square Eyeglasses for Men & Women (1008MG5074)', NULL, '30,36', '3', 'VOYAGE', 'Full Frame', 3, 3000.00, 2500.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-09 05:52:17'),
(52, '860028', 'Zealux blue Tr', '1,2,3,4,5', '4,28,33', '3', 'Zealux ', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:04:07'),
(53, '692807', 'Zealux matte pink and white  tr full frame ', '1,2,3,4,5,6,7', '4,30,37,39', '3', 'ZEALUX ', 'Full Frame', 4, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:14:29'),
(54, '10', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(55, '1010', 'Zealux Tr Metal  Full Frame', '1,2,4,5,6,7', '30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:27:07'),
(56, '1021', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(57, '1022', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(58, '1023', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(59, '1025', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(60, '1026', 'Kids Flexible ', '1,2,3,4,5', '4,30,33', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 10:01:24'),
(61, '1029', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(62, '1032', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(63, '1033', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(64, '1034', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(65, '1036', 'Zealux Metal Half Frame ', '1,2,3,4,5', '4,29,35', '3', 'ZEALUX', 'Half Frame', 4, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-14 08:53:16'),
(66, '1038', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(67, '11', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(68, '12', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(69, '121905', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(70, '121910', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:55:34'),
(71, '125338', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(72, '129811', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(73, '129813', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(74, '129815', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(75, '129816', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(76, '129820', 'Zealux Half Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:20:13'),
(77, '13005', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '4', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:55:44'),
(78, '13008', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:44:12'),
(79, '13010', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 04:40:55'),
(80, '131201', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(81, '131203', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(82, '131204', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(83, '131206', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(84, '131207', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(85, '131210', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(86, '131505', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(87, '131512', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(88, '14135', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(89, '15', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(90, '156601', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(91, '156602', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(92, '156603', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(93, '156607', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(94, '156609', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(95, '18', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(96, '18901', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(97, '18910', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(98, '1903', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(99, '1904', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:36:42'),
(100, '1908', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(101, '1918', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(102, '2001', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(103, '2002', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(104, '2003', 'Zealux Metal Half Frame', '1,2,3,4,5', '4,29,35', '2', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-14 09:07:50'),
(105, '2004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(106, '2005', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(107, '2006', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(108, '2008', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:54:27'),
(109, '2014', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:52:12'),
(110, '20224', 'Zealux ', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:58:46'),
(111, '202433', 'Zealux metal Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:04:51'),
(112, '202434', 'Zealux Metal Full Frame ', '1,2,3,4,5', NULL, '3', 'ZEALUX', 'Full Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:51:00'),
(113, '202435', 'Zealux Half Frame', '1,2,3,4,5', '4,32', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:46:24'),
(114, '202436', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:59:05'),
(115, '202439', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:00:38'),
(116, '202440', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(117, '2046', 'Zealux Half Frame', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:03:40'),
(118, '2084', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(119, '2085', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(120, '2086', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(121, '2090', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(122, '2301', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:02:36'),
(123, '2305', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:54:57'),
(124, '2307', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:00:27'),
(125, '2311', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(126, '231203', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:08:08'),
(127, '231205', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:03:25'),
(128, '2328', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(129, '23703', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(130, '23705', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(131, '23707', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(132, '23710', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(133, '245630', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(134, '245632', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(135, '245634', 'ZEALUX Metal Half ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 04:14:48'),
(136, '248803', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(137, '248804', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(138, '248808', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(139, '248809', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(140, '248810', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(141, '26', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(142, '27001', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:43:42'),
(143, '27002', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:02:53'),
(144, '27003', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(145, '27004', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:20:55'),
(146, '27005', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(147, '27007', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 04:37:21'),
(148, '28807', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,29,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:43:34'),
(149, '28808', 'Zealux Accetate Full Frame ', '1,2,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:14:06'),
(150, '30001', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(151, '30003', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(152, '30004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(153, '30008', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(154, '300670', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,29,35', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:14:54'),
(155, '300683', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:12:33'),
(156, '31001', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(157, '31002', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(158, '31007', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(159, '3132', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(160, '32002', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:39:03'),
(161, '32003', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(162, '32004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(163, '32010', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:54:39'),
(164, '32301', 'Zealux Metal Half Frame', '1,2,3,4,5', '4,35', '2', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 06:50:04'),
(165, '32304', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,34', '3', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:56:00'),
(166, '32305', 'Zealux Metal Full Frame', '1,2,3,4,5', '4,30,35', '3', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 06:58:28'),
(167, '32305', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(168, '32307', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(169, '32308', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(170, '32309', 'Zealux ', '1,2,3,4,5', '4,30', '3', 'ZEALUX', 'Full Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 08:03:39'),
(171, '35091', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(172, '37', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(173, '37002', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(174, '37004', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,36', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:43:35'),
(175, '37005', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(176, '37007', 'Zealux Accetate Full Frame ', '1,3,4,5,6,7', '29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:15:33'),
(177, '39102', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:20:58'),
(178, '39104', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:12:24'),
(179, '434002', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:46:36'),
(180, '434006', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:30:43'),
(181, '434006', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(182, '434007', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(183, '4511', 'Zealux Half Frame', '1,2,3,4,5', '4,31', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:01:02'),
(184, '48001', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:49:49'),
(185, '48001', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(186, '48010', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:54:28'),
(187, '5011', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(188, '5012', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(189, '5016', 'Zealux Tr Full Frame', '1,2,3,4,5', '30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:58:21'),
(190, '50502', 'Zealux Accetate Full Frame ', '1,2,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:09:45'),
(191, '50506', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(192, '50508', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,35', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:23:15'),
(193, '50509', 'Zealux Accetate Full Frame ', '1,2,4,5,6,7', '4,29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:17:41'),
(194, '51018', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(195, '51032', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(196, '51087', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(197, '51088', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(198, '5210', 'Zealux Accetate Full Frame ', '1,2,3,4,5,6,7', '4,29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:13:30'),
(199, '5217', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(200, '5221', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:18:01'),
(201, '5228', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:54:59'),
(202, '53201', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(203, '53204', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(204, '53206', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(205, '53207', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(206, '53209', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(207, '53210', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(208, '5521', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(209, '5523', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(210, '5528', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(211, '56002', 'Zealux Accetate Full Frame ', '1,2,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:41:07'),
(212, '56003', 'Zealux Accetate Blue transparent ', '1,2,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 04:23:04'),
(213, '56007', 'Zealux Accetate tr', '1,2,3,4,5', '4,30,33,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-18 08:38:19'),
(214, '56801', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(215, '56802', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(216, '56803', 'Zealux Half Frame', '1,2,3,4,5', '4,30,32', NULL, 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-11 09:34:44'),
(217, '56805', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(218, '56808', 'Zealux metal half frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 05:55:35'),
(219, '56809', 'Zealux Metal Half Frame ', '1,2,3,4,5', '4,32', '2', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 06:54:31'),
(220, '56810', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(221, '58001', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:50:29'),
(222, '58002', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:07:46'),
(223, '58007', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(224, '58011', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(225, '58012', 'Zealux Tr Full Frame ', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:19:19'),
(226, '6', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(227, '60105', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(228, '6030', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(229, '6036', 'Zealux Accetate Full Frame ', '1,2,3,4,5,6,7', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:03:26'),
(230, '6040', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:48:40'),
(231, '611103', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(232, '611104', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,33', NULL, 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-11 09:37:43'),
(233, '611105', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(234, '611106', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(235, '611107', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(236, '611108', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(237, '611109', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(238, '611110', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(239, '611140', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(240, '620906', 'Zealux Accetate Full Frame ', '1,2,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:40:57'),
(241, '62101', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(242, '62102', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(243, '62108', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(244, '624010', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', NULL, NULL, 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:09:19'),
(245, '6606', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:32:15'),
(246, '6608', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:22:24'),
(247, '6611', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(248, '6613', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(249, '66661', 'Zealux Metal Full Frame', '1,2,3,4,5', '4,32,37', '3', 'ZEALUX', 'Full Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:08:10'),
(250, '66664', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(251, '66666', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(252, '66675', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(253, '6807', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(254, '692803', 'Zealux Accetate Full Frame ', '1,2,3,4,5,6,7', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:50:24'),
(256, '692809', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(257, '69601', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(258, '69710', 'Zealux Accetate Full Frame ', '1,2,3,4,5,6,7', '4,30', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:48:51'),
(259, '7', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(260, '7021', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(261, '7050', 'Zealux Accetate Full Frame ', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:14:08'),
(262, '7053', 'Zealux Tr Full Frame', '1,2,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:39:34'),
(263, '707', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '2', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 07:00:08'),
(264, '7070', 'Zealux Accetate Full Frame', '1,2,3,4,5', '30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:35:12'),
(265, '8003', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(266, '8010', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(267, '80152', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:22:59'),
(268, '80156', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,35', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:40:19'),
(269, '8016', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(270, '8017', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:06:21'),
(271, '80172', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:38:12'),
(272, '80174', 'Zealux Accetate Full Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-18 08:37:48'),
(273, '8018 ', 'Zealux Accetate Full Frame', '1,2,3,4,5', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:20:00'),
(274, '8019', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:02:04'),
(275, '8030', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(276, '8036', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(277, '8037', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(278, '8050', 'A', '1,2,3,4,5', '4,30,36', '3', 'Zealux Accetate Full Frame', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:36:03'),
(279, '80807', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(280, '8081', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(281, '80811', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(282, '8085', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(283, '8086', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(284, '8087', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(285, '8088', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(286, '8089', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(287, '8090', 'Zealux Metal Half Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 05:54:40'),
(288, '8091', 'Zealux Half Frame', '1,2,4,5', '4,30,34', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:08:22'),
(289, '81002', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(290, '81003', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:01:56'),
(291, '81009', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,29,33', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:50:09'),
(292, '81013', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,29,33', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:48:34'),
(293, '81102', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(294, '81104', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(295, '81105', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,36', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:45:12'),
(296, '81106', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(297, '81107', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(298, '81107', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(299, '81110', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:21:46'),
(300, '81807', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(301, '821809', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5,6,7', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:52:24'),
(302, '82227', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:06:13'),
(303, '82230', 'Zealux Accetate Black Colour Eyeglasses ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:35:07'),
(304, '82231', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:31:43'),
(305, '82503', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42');
INSERT INTO `tbl_product` (`pid`, `barcode`, `productName`, `supportedLense`, `feature`, `size`, `brand`, `model`, `group`, `mrp`, `sales_rate`, `purchase_rate`, `description`, `warranty_days`, `active_status`, `publish_date`, `publish_time`, `store_id`, `CreatedDate`) VALUES
(306, '82505', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(307, '82509', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(308, '82510', 'Zealux Half Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:44:25'),
(309, '82805', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(310, '82809', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(311, '82812', 'Zealux Tr Full Frame ', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 06:13:46'),
(312, '82813', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:44:17'),
(313, '82818', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(314, '83521', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(315, '83525', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(316, '83612', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(317, '83614', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(318, '83615', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(319, '83616', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(320, '83620', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(321, '83626', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(322, '83628', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(323, '83628', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(324, '83806', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:04:23'),
(325, '83807', 'Zealux cateye tr+ Accetate ', '1,2,3,4,5', '4,29,35', '3', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-20 03:29:27'),
(326, '83809', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,33', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:10:38'),
(327, '85001', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:17:03'),
(328, '85008', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(329, '85008', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(330, '85010', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(332, '86509', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:52:27'),
(333, '86815', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(334, '87001', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5,6,7', '30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:24:50'),
(335, '87002', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:39:12'),
(336, '87004', 'Zealux Accetate Full Frame', '1,2,3,4,5,6,7', '4,30,32,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-18 06:29:08'),
(337, '87004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(338, '87004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(339, '87008', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5,6,7', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:23:44'),
(340, '87703', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 03:06:12'),
(341, '88002', 'Zealux Tr Full Frame ', '1,2,3,4,5', '4,29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:47:48'),
(342, '8801', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(343, '88010', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:05:28'),
(344, '8802', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(345, '8803', 'Zealux Tr Half Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Half Frame', 3, 1599.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-20 03:01:06'),
(346, '8804', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(347, '8808', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(348, '8809', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(349, '8821', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(350, '8822', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(351, '8828', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(352, '88804', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(353, '88810', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(354, '9', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Rimless', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(355, '905', 'Zealux Tr Metal  Full Frame', '1,2,3,4,5,6,7', '4,30,34', '3', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 04:33:06'),
(356, '90902', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(357, '90903', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,33', '2', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:32:56'),
(358, '90904', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,29,35', '2', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:52:31'),
(359, '90906', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:24:09'),
(360, '90907', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:55:32'),
(361, '90910', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:31:43'),
(362, '920208', 'Zealux Fall Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:31:03'),
(363, '92219', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(364, '92308', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(365, '923201', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(366, '923204', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(367, '923208', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,29,35', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:28:46'),
(368, '923305', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(369, '923305', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(370, '923306', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(371, '923307', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(372, '923310', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(373, '926209', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(374, '928103', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(375, '928106', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(376, '928107', 'Zealux metal half frame ', '1,2,3,4,5', '4,29,35', '3', 'ZEALUX', 'Half Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 04:17:45'),
(377, '930104', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(378, '930105', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(379, '930108', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(380, '930109', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(381, '930110', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(382, '930110', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(383, '9317905', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(384, '9317906', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(385, '9317909', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(386, '93401', 'Zealux Metal Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:56:57'),
(387, '93407', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(388, '93410', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(389, '9353', 'Zealux Tr Half Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:43:08'),
(390, '9353', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Half Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(391, '9374', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,34', '3', 'ZEALUX', 'Half Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 09:08:43'),
(392, '939701', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,31', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:42:20'),
(393, '939702', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:32:35'),
(394, '939704', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 400.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(395, '942802', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:33:41'),
(396, '942808', 'Zealux Tr Full Frame', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 02:34:31'),
(397, '949415', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(398, '962009', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(399, '96204', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(400, '98004', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 2000.00, 1699.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(401, '98010', 'Zealux Full Frame', '1,2,3,4,5', '4,34', '2', 'ZEALUX', 'Full Frame', 3, 2000.00, 1699.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-12 07:58:22'),
(402, '9905', 'Zealux Tr Full Frame', '1,2,4,5', '4,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 08:58:01'),
(403, 'AM1105311', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:27:12'),
(404, 'M311', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(405, 'OVAL3', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 05:17:47'),
(406, 'S012', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(407, 'S013', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(408, 'S014', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(409, 'S015', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(410, 'S016', 'A', '1,2,3,4,5', '', '', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, '', 365, 1, NULL, NULL, 1, '2024-11-08 17:05:42'),
(411, 'T002', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,34', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 06:19:08'),
(412, 'T007', 'A', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX', 'Full Frame', 4, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 06:15:38'),
(413, 'T011', 'Zealux Tr Full Frame', '1,2,3,4,5,6,7', '4,30,32,36', '3', 'ZEALUX', 'Full Frame', 3, 1599.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-16 05:23:41'),
(414, 'WAYFARER ', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '3', 'ZEALUX', 'Full Frame', 3, 2000.00, 1299.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-13 07:00:45'),
(415, '50505', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,32', '2', 'ZEALUX ', 'Full Frame', 3, 2500.00, 2300.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 06:12:43'),
(416, '14118', 'Zealux clipon', '1,3,4,5', '4,30,35,40', '2', 'ZEALUX ', 'Full Frame', 3, 3500.00, 3000.00, 960.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-10 08:39:35'),
(417, '0114', 'Zealux Lens Cleaner ', '6', NULL, NULL, 'ZEALUX ', 'Select Model', 1, 120.00, 80.00, 40.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-11 02:18:45'),
(418, '0115', 'Zealux Lens cleaner ', '6', NULL, NULL, 'ZEALUX ', 'Select Model', 1, 129.00, 0.00, 20.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-11 02:38:54'),
(419, 'B&L 1 year', 'Baush and Lomb yearly Contact lenses', '2,3,4', NULL, NULL, 'Baush&Lomb', 'Select Model', 1, 1800.00, 1700.00, 475.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-13 09:37:37'),
(420, '22007', 'Voyage', '6', '4,30,36', '3', 'VOYAGE ', 'Full Frame', 4, 3000.00, 2000.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:42:07'),
(421, '58972', '', '6', '4,30,36', '4', 'VOYAGE ', 'Full Frame', 4, 2500.00, 2000.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 02:51:08'),
(422, '2184PMG4663', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women', '1,2,3,4', '4,30', '3', 'VOYAGE ', 'Half Frame', 3, 3000.00, 2500.00, 650.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:04:41'),
(423, '7009PMG4656', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women', '1,2,3,4', '4,30,32,34', '2', 'VOYAGE ', 'Full Frame', 3, 3500.00, 2500.00, 649.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:07:01'),
(424, '2182PMG4659', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women', '1,2,3,4,5', '4,30,34', '3', 'VOYAGE ', 'Full Frame', 3, 3500.00, 2500.00, 560.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:09:30'),
(425, '2181PMG4658', 'Voyage Black Wayfarer Clip-On Polarized Sunglasses for Men & Women', '1,2,3,4', '4,30,32', '2', 'VOYAGE ', 'Full Frame', 3, 3500.00, 2500.00, 400.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:15:00'),
(426, '14118', 'Zealux Tr Clipon', '1,2,3,4,5', '4,29,35', '2', 'Zealux ', 'Full Frame', 3, 3000.00, 2500.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:24:26'),
(427, '14111', 'Zealux Tr Clipon ', '1,2,3,4', '4,28', '2', 'Zealux ', 'Full Frame', 3, 3500.00, 2500.00, 500.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-15 03:32:45'),
(428, '4321', 'LENS ONLY ', '1,2,3,4,5,6,7', NULL, '3', 'ZEALUX', 'Full Frame', 3, 0.00, 0.00, 0.00, NULL, 365, 1, NULL, NULL, 1, '2024-11-18 05:08:40'),
(429, '611103', 'Zealux Accetate Full Frame ', '1,2,3,4,5', '4,30,36', '3', 'ZEALUX ', 'Full Frame', 3, 2000.00, 1299.00, 560.00, NULL, 0, 1, NULL, NULL, 1, '2024-12-09 02:03:33'),
(431, '1234552', 'test product', '2,3,4', '28,29,30', '2,3,4', 'test ', 'Half Frame', 3, 2700.00, 2600.00, 2300.00, NULL, 355, 1, NULL, NULL, 0, '2024-12-18 12:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcolor`
--

CREATE TABLE `tbl_productcolor` (
  `cid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `colorName` varchar(200) DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `colorImage` text DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productcolor`
--

INSERT INTO `tbl_productcolor` (`cid`, `pid`, `colorName`, `colorCode`, `stock`, `colorImage`, `store_id`, `CreatedDate`) VALUES
(38, 7, 'Black', '#000000', 1, '[\"1729614441_823c2a9aa3c34d26b657.jpg\",\"1729614441_7836773c136fc1667186.jpg\"]', 1, '2024-10-22 11:34:13'),
(46, 14, 'Black', '#000000', 1, '[\"1729652539_4a9a7a0e5cfd423624f3.jpg\",\"1729652539_c38dca97e84b64c390aa.jpg\"]', 1, '2024-10-22 22:02:19'),
(47, 15, 'Black', '#000000', 1, '[\"1729652742_3c84ef850ca715898817.jpg\",\"1729652742_506d59d631750e0ec265.jpg\"]', 1, '2024-10-22 22:05:42'),
(51, 19, 'Golden', '#000000', 1, '[\"1729653494_398b1147a5e0f5feda20.jpg\",\"1729653494_26d6f7ef11121593d184.jpg\"]', 1, '2024-10-22 22:18:14'),
(58, 25, 'Black', '#000000', 1, '[\"1729654570_e2fa34093ff043a2b1ee.jpg\",\"1729654570_8203409896aa47eff7d0.jpg\"]', 1, '2024-10-22 22:36:10'),
(61, 28, 'Black', '#000000', 1, '[\"1729655035_935391e0a72d19d41ede.jpg\",\"1729655035_7a92ed77b315db186cf0.jpg\"]', 1, '2024-10-22 22:43:55'),
(71, 38, 'Grey-Black', '#000000', 1, '[\"1729656910_d02b7e949bdf4be0805f.jpg\",\"1729656910_c6eeed54b654edce9d2a.jpg\"]', 1, '2024-10-22 23:15:10'),
(72, 39, 'Grey-Black', '#000000', 1, '[\"1729656910_9480957b396a7f5b0696.jpg\",\"1729656910_de0d6cf2c4fb5ea53223.jpg\"]', 1, '2024-10-22 23:15:10'),
(77, 42, 'Black ', '#000000', 1, '[\"1729657294_383b40fef12f180a03ad.jpg\",\"1729657294_9dbff4dc3397420d1260.jpg\"]', 1, '2024-10-22 23:22:00'),
(102, 226, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(103, 226, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(104, 226, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(105, 259, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(106, 354, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(107, 54, 'BLU BLACK\"', '#000000', 1, NULL, 1, NULL),
(108, 67, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(109, 68, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(110, 68, 'GOLD\"', '#000000', 1, NULL, 1, NULL),
(111, 89, 'RED\"', '#000000', 1, NULL, 1, NULL),
(112, 89, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(113, 89, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(114, 95, 'PURPULE\"', '#000000', 1, NULL, 1, NULL),
(115, 141, 'GUN M\"', '#000000', 1, NULL, 1, NULL),
(116, 141, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(117, 141, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(118, 141, 'GOLD/BRO\"', '#000000', 1, NULL, 1, NULL),
(119, 172, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(125, 56, 'GUN ASH\"', '#000000', 1, NULL, 1, NULL),
(126, 57, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(127, 57, 'GOLD\"', '#000000', 1, NULL, 1, NULL),
(128, 58, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(129, 58, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(130, 59, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(139, 61, 'GREY TRANS\"', '#000000', 1, NULL, 1, NULL),
(140, 61, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(141, 62, 'GREY TRANS\"', '#000000', 1, NULL, 1, NULL),
(142, 63, 'BACK WHITE\"', '#000000', 1, NULL, 1, NULL),
(143, 64, 'BLACK RED1\"', '#000000', 1, NULL, 1, NULL),
(145, 66, 'DARK BLU\"', '#000000', 1, NULL, 1, NULL),
(146, 98, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(151, 100, 'GREY TRANS\"', '#000000', 1, NULL, 1, NULL),
(152, 101, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(153, 102, 'PIN AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(154, 103, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(161, 105, 'LITE GRE TRANS\"', '#000000', 1, NULL, 1, NULL),
(162, 106, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(163, 106, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(164, 106, 'GREEN AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(165, 106, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(166, 107, 'TORTOISE &GOLD\"', '#000000', 1, NULL, 1, NULL),
(167, 107, 'MAT BLACK\"', '#000000', 1, NULL, 1, NULL),
(168, 107, 'MAT BLUE\"', '#000000', 1, NULL, 1, NULL),
(172, 118, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(173, 118, 'DARK GREEN\"', '#000000', 1, NULL, 1, NULL),
(174, 118, 'MATBLACK\"', '#000000', 1, NULL, 1, NULL),
(175, 119, 'DARK GREEN\"', '#000000', 1, NULL, 1, NULL),
(176, 119, 'GOLDEN PURPLE\"', '#000000', 1, NULL, 1, NULL),
(177, 119, 'GOLDEN PURPLE\"', '#000000', 1, NULL, 1, NULL),
(178, 119, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(179, 119, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(180, 119, 'BLACK & WHITE\"', '#000000', 1, NULL, 1, NULL),
(181, 119, 'PURPLE AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(182, 120, 'BLACK & WHITE\"', '#000000', 1, NULL, 1, NULL),
(183, 121, 'BLACK AND PURPLE\"', '#000000', 1, NULL, 1, NULL),
(184, 121, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(185, 121, 'GREY AND BLUE\"', '#000000', 1, NULL, 1, NULL),
(191, 125, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(192, 125, 'MAGENTA\"', '#000000', 1, NULL, 1, NULL),
(193, 128, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(194, 159, 'SILVER WITH BLUE\"', '#000000', 1, NULL, 1, NULL),
(195, 159, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(198, 187, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(199, 188, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(200, 188, 'BLACK & WHITE\"', '#000000', 1, NULL, 1, NULL),
(208, 199, 'PINK AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(215, 208, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(216, 208, 'WHITE AND PINK\"', '#000000', 1, NULL, 1, NULL),
(217, 209, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(218, 210, 'WHITE AND PINK\"', '#000000', 1, NULL, 1, NULL),
(219, 228, 'LITE PINK\"', '#000000', 1, NULL, 1, NULL),
(224, 247, 'MAT BLACK&BLU\"', '#000000', 1, NULL, 1, NULL),
(225, 248, 'GREEN BLACK\"', '#000000', 1, NULL, 1, NULL),
(226, 253, 'RED \"', '#000000', 1, NULL, 1, NULL),
(227, 253, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(228, 260, 'MAGENTA\"', '#000000', 1, NULL, 1, NULL),
(233, 265, 'SILVER WIH BLACK \"', '#000000', 1, NULL, 1, NULL),
(234, 265, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(235, 266, 'BLU WITH GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(236, 266, 'BLU WITH GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(237, 269, 'PINK WITH SILVER\"', '#000000', 1, NULL, 1, NULL),
(238, 269, 'BLU WITH SILVER\"', '#000000', 1, NULL, 1, NULL),
(246, 275, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(247, 276, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(248, 276, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(249, 277, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(250, 277, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(253, 280, 'BLACK AND SILVER\"', '#000000', 1, NULL, 1, NULL),
(254, 280, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(255, 282, 'GREY METAL\"', '#000000', 1, NULL, 1, NULL),
(256, 283, 'GREY SILVER\"', '#000000', 1, NULL, 1, NULL),
(257, 283, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(258, 283, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(259, 283, 'BLU\"', '#000000', 1, NULL, 1, NULL),
(260, 284, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(261, 284, 'MATTE BLACK\"', '#000000', 1, NULL, 1, NULL),
(262, 285, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(263, 285, 'MATTE BLACK\"', '#000000', 1, NULL, 1, NULL),
(264, 286, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(265, 286, 'BLACK AND GREN\"', '#000000', 1, NULL, 1, NULL),
(272, 342, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(273, 342, 'BLU&WHITE\"', '#000000', 1, NULL, 1, NULL),
(274, 344, 'PURPLE AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(275, 344, 'GREY TRANS\"', '#000000', 1, NULL, 1, NULL),
(276, 344, 'BLU\"', '#000000', 1, NULL, 1, NULL),
(277, 344, 'BLACK &GOLD\"', '#000000', 1, NULL, 1, NULL),
(278, 344, 'PIN AN BLACK\"', '#000000', 1, NULL, 1, NULL),
(281, 346, 'BLACK &GOLD\"', '#000000', 1, NULL, 1, NULL),
(282, 346, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(283, 346, 'GREY AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(284, 346, 'BLACK &GOLD\"', '#000000', 1, NULL, 1, NULL),
(285, 346, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(286, 347, 'BLACK AND RED\"', '#000000', 1, NULL, 1, NULL),
(287, 348, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(288, 349, 'BLUEAND BLACK\"', '#000000', 1, NULL, 1, NULL),
(289, 349, 'BROWN AND GOLD\"', '#000000', 1, NULL, 1, NULL),
(290, 349, 'BLACK AND SILVER\"', '#000000', 1, NULL, 1, NULL),
(291, 350, 'GOLD\"', '#000000', 1, NULL, 1, NULL),
(292, 351, 'GUN AND BLUE\"', '#000000', 1, NULL, 1, NULL),
(305, 88, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(306, 88, 'BLACK AND PINK\"', '#000000', 1, NULL, 1, NULL),
(307, 88, 'BLU\"', '#000000', 1, NULL, 1, NULL),
(308, 88, 'BLACK AND PINK\"', '#000000', 1, NULL, 1, NULL),
(309, 96, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(310, 97, 'TRANSPERANT\"', '#000000', 1, NULL, 1, NULL),
(311, 97, 'TRANSPERANT\"', '#000000', 1, NULL, 1, NULL),
(313, 129, 'TORTOISE AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(314, 130, 'GREEN TRAN\"', '#000000', 1, NULL, 1, NULL),
(315, 130, 'GREEN TRAN\"', '#000000', 1, NULL, 1, NULL),
(316, 131, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(317, 131, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(318, 132, 'MAT BLACK\"', '#000000', 1, NULL, 1, NULL),
(319, 132, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(320, 132, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(328, 144, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(331, 146, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(341, 150, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(342, 150, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(343, 151, 'BLE & SILVR\"', '#000000', 1, NULL, 1, NULL),
(344, 152, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(345, 153, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(346, 156, 'BLU SILVER\"', '#000000', 1, NULL, 1, NULL),
(347, 157, 'GUN METAL\"', '#000000', 1, NULL, 1, NULL),
(348, 157, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(349, 158, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(350, 158, 'BLU SILVER\"', '#000000', 1, NULL, 1, NULL),
(354, 161, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(355, 162, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(366, 168, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(367, 169, 'GREY & BLACK\"', '#000000', 1, NULL, 1, NULL),
(368, 169, 'BLU & BLACK\"', '#000000', 1, NULL, 1, NULL),
(369, 169, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(371, 171, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(372, 173, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(377, 175, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(387, 191, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(391, 194, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(392, 194, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(393, 194, 'RED&BLACK\"', '#000000', 1, NULL, 1, NULL),
(394, 195, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(395, 196, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(396, 197, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(397, 202, 'LITE BUE TRANS\"', '#000000', 1, NULL, 1, NULL),
(398, 202, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(399, 203, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(400, 204, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(401, 204, 'BROUN\"', '#000000', 1, NULL, 1, NULL),
(402, 205, 'GREY&BLACK\"', '#000000', 1, NULL, 1, NULL),
(403, 205, 'GREY&BLACK\"', '#000000', 1, NULL, 1, NULL),
(404, 206, 'BLU&BLAK\"', '#000000', 1, NULL, 1, NULL),
(405, 207, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(411, 214, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(412, 215, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(414, 217, 'BLACK&WHITE\"', '#000000', 1, NULL, 1, NULL),
(419, 220, 'MAT GREEN\"', '#000000', 1, NULL, 1, NULL),
(420, 220, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(427, 223, 'COPPER\"', '#000000', 1, NULL, 1, NULL),
(428, 223, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(429, 223, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(430, 224, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(434, 227, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(435, 241, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(436, 242, 'BLACK&WHITE\"', '#000000', 1, NULL, 1, NULL),
(437, 243, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(439, 250, 'GRE4 &GOLD\"', '#000000', 1, NULL, 1, NULL),
(440, 251, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(441, 252, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(442, 252, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(443, 257, 'BLACK&RED\"', '#000000', 1, NULL, 1, NULL),
(444, 257, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(453, 279, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(454, 281, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(455, 289, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(456, 289, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(460, 293, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(461, 294, 'MT BLACK\"', '#000000', 1, NULL, 1, NULL),
(463, 296, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(464, 297, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(465, 297, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(468, 300, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(469, 300, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(476, 305, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(477, 305, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(478, 306, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(479, 307, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(481, 309, 'GREEN &TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(482, 309, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(483, 309, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(484, 309, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(485, 310, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(486, 310, 'RED\"', '#000000', 1, NULL, 1, NULL),
(491, 313, 'BLACK&YELLOW\"', '#000000', 1, NULL, 1, NULL),
(492, 314, 'BLUE&GREEN\"', '#000000', 1, NULL, 1, NULL),
(493, 315, 'GREEN &PINK\"', '#000000', 1, NULL, 1, NULL),
(494, 316, 'BLUE&GOLD\"', '#000000', 1, NULL, 1, NULL),
(495, 317, 'GUN METAL\"', '#000000', 1, NULL, 1, NULL),
(496, 318, 'MAGENTA\"', '#000000', 1, NULL, 1, NULL),
(497, 318, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(498, 319, 'SILVER AND BLACK\"', '#000000', 1, NULL, 1, NULL),
(499, 320, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(500, 321, 'GOLD\"', '#000000', 1, NULL, 1, NULL),
(501, 321, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(502, 322, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(503, 322, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(504, 322, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(514, 328, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(515, 328, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(516, 330, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(518, 333, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(530, 352, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(531, 353, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(532, 356, 'RED\"', '#000000', 1, NULL, 1, NULL),
(542, 363, 'BLU &BLACK\"', '#000000', 1, NULL, 1, NULL),
(543, 364, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(545, 387, 'BLU &BLACK\"', '#000000', 1, NULL, 1, NULL),
(546, 388, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(547, 399, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(548, 399, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(549, 400, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(550, 400, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(553, 69, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(555, 71, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(556, 72, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(557, 72, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(558, 73, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(559, 73, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(560, 73, 'WHITE\"', '#000000', 1, NULL, 1, NULL),
(561, 74, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(562, 75, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(563, 75, 'MATT BLACK\"', '#000000', 1, NULL, 1, NULL),
(564, 75, 'GREY TRANSPERANT\"', '#000000', 1, NULL, 1, NULL),
(568, 80, 'BLACK & WHITE\"', '#000000', 1, NULL, 1, NULL),
(569, 80, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(570, 81, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(571, 82, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(572, 83, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(573, 84, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(574, 84, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(575, 84, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(576, 85, 'WHITE\"', '#000000', 1, NULL, 1, NULL),
(577, 86, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(578, 87, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(579, 90, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(580, 91, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(581, 92, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(582, 93, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(583, 93, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(584, 94, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(599, 116, 'MAT BLACK\"', '#000000', 1, NULL, 1, NULL),
(603, 133, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(604, 134, 'MAT RED&BLACK\"', '#000000', 1, NULL, 1, NULL),
(605, 134, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(607, 136, 'PINK\"', '#000000', 1, NULL, 1, NULL),
(608, 136, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(609, 137, 'ROSE GOLD\"', '#000000', 1, NULL, 1, NULL),
(610, 138, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(611, 138, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(612, 139, 'YELLOW\"', '#000000', 1, NULL, 1, NULL),
(613, 140, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(620, 182, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(621, 231, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(623, 233, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(624, 234, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(625, 235, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(626, 236, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(627, 236, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(628, 236, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(629, 237, 'GREEN&WHITE\"', '#000000', 1, NULL, 1, NULL),
(630, 238, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(631, 238, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(632, 238, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(633, 238, 'BROWN&GOLD\"', '#000000', 1, NULL, 1, NULL),
(634, 238, 'BLUE&SILVER\"', '#000000', 1, NULL, 1, NULL),
(635, 239, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(636, 239, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(641, 256, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(646, 365, 'RED\"', '#000000', 1, NULL, 1, NULL),
(647, 365, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(648, 366, 'VIOLET\"', '#000000', 1, NULL, 1, NULL),
(650, 368, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(651, 368, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(652, 368, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(653, 368, 'COPPER\"', '#000000', 1, NULL, 1, NULL),
(654, 368, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(655, 370, 'GUNMETAL\"', '#000000', 1, NULL, 1, NULL),
(656, 371, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(657, 371, 'GOLDEN&WHITE\"', '#000000', 1, NULL, 1, NULL),
(658, 372, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(659, 372, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(660, 373, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(661, 373, 'WHITE OPPAQ\"', '#000000', 1, NULL, 1, NULL),
(662, 373, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(663, 374, 'WHITE\"', '#000000', 1, NULL, 1, NULL),
(664, 375, 'SILVER\"', '#000000', 1, NULL, 1, NULL),
(666, 377, 'RED\"', '#000000', 1, NULL, 1, NULL),
(667, 378, 'MAT GREEN\"', '#000000', 1, NULL, 1, NULL),
(668, 378, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(669, 378, 'MAT BLACK\"', '#000000', 1, NULL, 1, NULL),
(670, 378, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(671, 379, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(672, 379, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(673, 380, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(674, 380, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(675, 381, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(676, 381, 'BROWN\"', '#000000', 1, NULL, 1, NULL),
(677, 381, 'MAT BLACK\"', '#000000', 1, NULL, 1, NULL),
(678, 381, 'MAT BLUE\"', '#000000', 1, NULL, 1, NULL),
(681, 394, 'GREEN\"', '#000000', 1, NULL, 1, NULL),
(684, 397, 'YELLOW\"', '#000000', 1, NULL, 1, NULL),
(685, 398, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(686, 383, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(687, 384, 'BROWN AND WHITE\"', '#000000', 1, NULL, 1, NULL),
(688, 385, 'GREY\"', '#000000', 1, NULL, 1, NULL),
(689, 385, 'BLACK&GREN\"', '#000000', 1, NULL, 1, NULL),
(690, 385, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(692, 404, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(694, 406, 'BLUE\"', '#000000', 1, NULL, 1, NULL),
(695, 407, 'TORTOISE\"', '#000000', 1, NULL, 1, NULL),
(696, 408, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(697, 409, 'BLACK\"', '#000000', 1, NULL, 1, NULL),
(698, 410, 'WHITE\"', '#000000', 1, NULL, 1, NULL),
(699, 410, 'WHITE\"', '#000000', 1, NULL, 1, NULL),
(1162, 32, 'Brown-Gold', '#000000', 1, '[\"1729655681_7f3f8505a6a4b1bf32f8.jpg\",\"1729655681_d73fa4a4ebad5d9cd910.jpg\"]', 1, '2024-11-09 04:38:55'),
(1164, 46, 'Silver-Black', '#000000', 1, '[\"1729657924_ff0d6555e91cd25faa01.jpg\",\"1729657924_c7478a75660a62295c01.jpg\"]', 1, '2024-11-09 04:41:08'),
(1165, 9, 'Black', '#000000', 1, '[\"1729614827_ea29545081bdfd4cbcbf.jpg\",\"1729614827_4699c0becf07483b360e.jpg\"]', 1, '2024-11-09 04:42:28'),
(1166, 16, 'Black Silver', '#000000', 1, '[\"1729653027_7a8ea5fd57480e3fc832.jpg\",\"1729653027_f1b911c75e2da420d093.jpg\"]', 1, '2024-11-09 04:45:31'),
(1167, 41, 'Pink & Grey Lens | Light Pink & Golden Frame', '#000000', 1, '[\"1729657088_00286c59cb504475df46.jpg\",\"1729657088_6de33070a86e62357a17.jpg\"]', 1, '2024-11-09 04:46:38'),
(1169, 21, 'Black Lens | Matt Black Frame', '#000000', 1, '[\"1729653938_8e2c58302fa602849b19.jpg\",\"1729653938_a16e08b9364d8bd0fb38.jpg\"]', 1, '2024-11-09 04:50:03'),
(1171, 35, 'Black ', '#000000', 1, '[\"1729656128_292b3e78bf25acd2285e.jpg\",\"1729656128_1a90504117f0864a8555.jpg\"]', 1, '2024-11-09 04:53:14'),
(1172, 20, 'Black Lens | Matt Black Frame', '#000000', 1, '[\"1729653700_bccff16d9b035abf3ccf.jpg\",\"1729653700_54ccaeb5a13bca245f46.jpg\"]', 1, '2024-11-09 04:54:17'),
(1173, 17, 'Black ', '#000000', 1, '[\"1729653164_f36fe1935b23e15c6ead.jpg\",\"1729653164_4324e5a1f7cc1c630f92.jpg\"]', 1, '2024-11-09 04:55:31'),
(1178, 23, 'Brown Lens | Brown Frame', '#000000', 1, '[\"1729654263_b8ad770cd83a8e9e0522.jpg\",\"1729654263_2035d5eec487025c0f36.jpg\"]', 1, '2024-11-09 05:49:23'),
(1180, 51, 'Black', '#000000', 1, '[\"1729686322_f60333ed6c8279abde1d.jpg\",\"1729686322_ad67d175717832d11b28.jpg\"]', 1, '2024-11-09 05:52:17'),
(1183, 45, 'Grey-Tortoise', '#000000', 1, '[\"1729657774_30d8193d36350e7daee9.jpg\",\"1729657774_7219655c6fc57adeb164.jpg\"]', 1, '2024-11-09 05:56:31'),
(1185, 24, 'Black Lens | Black Frame', '#000000', 1, '[\"1729654393_14889b06e74a0526b5a1.jpg\",\"1729654393_40172232bcba338e6fae.jpg\"]', 1, '2024-11-09 05:59:50'),
(1186, 6, 'Transparent', '#000000', 1, '[\"1729598445_aab2f225c5a3c8b6df6e.jpg\",\"1729598445_480a17bd6cb24270fad7.jpg\"]', 1, '2024-11-09 06:00:22'),
(1188, 22, 'Black Lens | Matt Black Frame', '#000000', 1, '[\"1729654088_93d1852d0650560af37e.jpg\",\"1729654088_cc1c880ec092a4ee28e7.jpg\"]', 1, '2024-11-09 06:01:55'),
(1189, 27, 'Rose Gold', '#000000', 1, '[\"1729654904_135a06ad31802bcc489c.jpg\",\"1729654904_be435a5dd35945b34a20.jpg\"]', 1, '2024-11-09 06:04:13'),
(1190, 13, 'Shine Black', '#000000', 1, '[\"1729652052_c7ada7f34da8e5c840f3.jpg\",\"1729652052_f9bae53f5b1c64733021.jpg\"]', 1, '2024-11-09 06:05:19'),
(1191, 30, 'Blue', '#000000', 1, '[\"1729655376_9c84bb5ba3ba7e88ffe2.jpg\",\"1729655376_926e6d5702f1d91c3e7c.jpg\"]', 1, '2024-11-09 06:07:25'),
(1192, 26, 'Black ', '#000000', 1, '[\"1729654730_243ae55d32ba97624cc4.jpg\",\"1729654730_3e68f1dd3e63d67162f1.jpg\"]', 1, '2024-11-09 06:08:30'),
(1193, 37, 'Green', '#000000', 1, '[\"1729656718_58de2894bc92994bb819.jpg\",\"1729656718_36106caf198929a0c0ba.jpg\"]', 1, '2024-11-09 06:09:23'),
(1194, 29, 'Black ', '#000000', 1, '[\"1729655231_f2778ba6b2946d17a98b.jpg\",\"1729655231_fd5b553ee59cc84f9aab.jpg\"]', 1, '2024-11-09 06:10:06'),
(1206, 212, 'Blue Transparent ', '#000000', 1, '[\"1731234184_1bc1cdae3e9d58560b5c.jpg\"]', 1, '2024-11-10 04:23:04'),
(1212, 147, 'Blue & Black', '#000000', 1, '[\"1731235041_e38f737997f2ab5f202a.jpg\"]', 1, '2024-11-10 04:37:21'),
(1213, 147, 'Tortoise', '#783f26', 1, '[\"1731235041_e80d5410b17ef4ee1874.jpg\"]', 1, '2024-11-10 04:37:21'),
(1214, 147, 'Blue & black', '#0000ff', 1, '[\"1731235041_f04ebae06abecec0f0d9.jpg\"]', 1, '2024-11-10 04:37:21'),
(1215, 147, 'Grey & Black', '#dbdbdb', 1, '[\"1731235041_1377dfb6239d7b7e66a5.jpg\"]', 1, '2024-11-10 04:37:21'),
(1216, 79, 'Brown ', '#662424', 1, '[\"1731235255_88875c58981552b0ef03.jpg\"]', 1, '2024-11-10 04:40:55'),
(1226, 143, 'Brown ', '#592323', 1, '[\"1731235693_34a11c721f9f75e48113.jpg\"]', 1, '2024-11-10 05:02:53'),
(1227, 142, 'TORTOISE', '#472323', 1, '[\"1731236548_5b72a76f5bbe8fb9d70e.jpg\"]', 1, '2024-11-10 05:03:34'),
(1228, 142, 'Blue & White', '#00ffff', 1, '[]', 1, '2024-11-10 05:03:34'),
(1229, 142, 'Grey', '#c7c7c7', 1, '[\"1731236548_6d59de5e9050846a3a35.jpg\"]', 1, '2024-11-10 05:03:34'),
(1230, 142, 'Black & Grey ', '#000000', 1, '[\"1731236548_a561882ee6fdda5554e2.jpg\"]', 1, '2024-11-10 05:03:34'),
(1231, 302, 'GUMETAL', '#000000', 1, '[\"1731236773_dbb07a4f16e1758d6787.jpg\"]', 1, '2024-11-10 05:06:13'),
(1232, 149, 'Red', '#ff0000', 1, '[\"1731237246_3cf152fbdb77e8de8794.jpg\"]', 1, '2024-11-10 05:14:06'),
(1233, 149, 'Brown ', '#61290f', 1, '[]', 1, '2024-11-10 05:14:06'),
(1234, 405, 'White Transparent ', '#000000', 1, '[\"1731237467_4932bb446672b38e2bcf.jpg\"]', 1, '2024-11-10 05:17:47'),
(1242, 267, 'Green', '#868f0a', 1, '[\"1731237779_3ddfdb8202b92e1e1068.jpg\"]', 1, '2024-11-10 05:22:59'),
(1243, 267, 'Black', '#000000', 1, '[\"1731237779_cf63d72b796e8b231528.jpg\"]', 1, '2024-11-10 05:22:59'),
(1244, 403, 'Transparent ', '#ffffff', 1, '[\"1731238032_7af4fe98873d751361f8.jpg\"]', 1, '2024-11-10 05:27:12'),
(1245, 304, 'Grey', '#878787', 1, '[\"1731238303_bc38c419b7aa93d85458.jpg\"]', 1, '2024-11-10 05:31:43'),
(1246, 304, 'Tortoise', '#5c1f13', 1, '[\"1731238303_2f49e0c727de85be089d.jpg\"]', 1, '2024-11-10 05:31:43'),
(1247, 304, 'GREEN', '#000000', 1, '[\"1731238303_d9015436dbbd2050705a.jpg\"]', 1, '2024-11-10 05:31:43'),
(1248, 303, 'Black', '#000000', 1, '[\"1731073775_3f9164292b84c45a608a.jpg\",\"1731073775_12d1540fbd71a01962c4.jpg\"]', 1, '2024-11-10 05:35:07'),
(1249, 303, 'Brown', '#4d342c', 1, '[\"1731238507_ef9557335a87456968c2.jpg\"]', 1, '2024-11-10 05:35:07'),
(1250, 278, 'BLACK', '#000000', 1, '[\"1731201836_61f9f655f0c280dde0e3.jpg\",\"1731201836_777ae81d846a71ee65d8.jpg\"]', 1, '2024-11-10 05:36:03'),
(1251, 271, 'Tortoise ', '#4a2b1b', 1, '[\"1731238692_55a0b353009a9b191923.jpg\"]', 1, '2024-11-10 05:38:12'),
(1252, 268, 'Green', '#35451e', 1, '[\"1731238819_1e0d94159c180cd4c8ea.jpg\"]', 1, '2024-11-10 05:40:19'),
(1253, 148, 'GRE&GUNMETAL', '#000000', 1, '[\"1731239014_1d0fe0c2a8c949a6e43b.jpg\"]', 1, '2024-11-10 05:43:34'),
(1256, 292, 'Blue ', '#0000ff', 1, '[\"1731239314_91c225bdf57be3b59f70.jpg\"]', 1, '2024-11-10 05:48:34'),
(1257, 291, 'Green & pink', '#ff7ae2', 1, '[\"1731239409_a8bc28227a93b0d91d3a.jpg\"]', 1, '2024-11-10 05:50:09'),
(1258, 109, 'Grey ', '#858585', 1, '[\"1731239532_67c661884f54f9e73365.jpg\"]', 1, '2024-11-10 05:52:12'),
(1261, 77, 'BLACK', '#000000', 1, '[\"1731239744_bd72beecec80dde36b3a.jpg\"]', 1, '2024-11-10 05:55:44'),
(1262, 52, 'BLUE ', '#000000', 1, '[\"1730362418_852dc05b4ff41f4a41cc.jpg\",\"1730362418_bbc821d3b5921a8cd676.jpg\"]', 1, '2024-11-10 06:04:07'),
(1263, 270, 'BLACK', '#ffff00', 1, '[\"1731240381_b58585ef76802d1e0dea.jpg\"]', 1, '2024-11-10 06:06:21'),
(1264, 270, 'Black & green', '#00ff00', 1, '[\"1731240381_e8554f501caab3682587.jpg\"]', 1, '2024-11-10 06:06:21'),
(1265, 190, 'Blue', '#252357', 1, '[\"1731240586_a1412478f2913cd8ec9d.jpg\"]', 1, '2024-11-10 06:09:46'),
(1266, 190, 'Brown', '#4f1414', 1, '[\"1731240586_b10c823855e822834ac5.jpg\"]', 1, '2024-11-10 06:09:46'),
(1268, 415, 'Red', '#ff0000', 1, '[\"1731240745_17d488a0a46afd90ee7f.jpg\"]', 1, '2024-11-10 06:12:43'),
(1270, 357, 'Red', '#ff0000', 1, '[\"1731241072_f87dd640ba4a4022f75d.jpg\"]', 1, '2024-11-10 06:17:52'),
(1271, 357, 'Green', '#347531', 1, '[\"1731241072_f3519a3b1eb989fb5709.jpg\"]', 1, '2024-11-10 06:17:52'),
(1273, 192, 'Blue', '#0000ff', 1, '[\"1731241395_c93914c36c7a3af8c953.jpg\"]', 1, '2024-11-10 06:23:15'),
(1274, 192, 'Brown ', '#783535', 1, '[\"1731241395_09de77a2134b908c1e87.jpg\"]', 1, '2024-11-10 06:23:15'),
(1275, 359, 'Brown & white', '#8c3535', 1, '[\"1731240857_d6572d9bab212c9dbad5.jpg\"]', 1, '2024-11-10 06:24:09'),
(1276, 361, 'Brown ', '#9c5908', 1, '[\"1731241903_08e50766067cb3d3e5ef.jpg\"]', 1, '2024-11-10 06:31:43'),
(1277, 361, 'Green', '#385e02', 1, '[\"1731241903_454828d7e30a5b9aac18.jpg\"]', 1, '2024-11-10 06:31:43'),
(1278, 78, 'Grey ', '#000000', 1, '[\"1731235525_78f8f1e7390007b8c5e6.jpg\"]', 1, '2024-11-10 06:44:12'),
(1279, 78, 'Brown', '#000000', 1, '[\"1731235525_933d82e2a806a452376a.jpg\"]', 1, '2024-11-10 06:44:12'),
(1285, 184, 'Pink Transparent ', '#fa84f6', 1, '[\"1731234547_8d47fd042413ff361ec1.jpg\"]', 1, '2024-11-10 06:49:49'),
(1286, 184, 'Black & green', '#000000', 1, '[\"1731242815_91c94465f44b0f8ba2e0.jpg\"]', 1, '2024-11-10 06:49:49'),
(1287, 184, 'Black', '#000000', 1, '[\"1731242815_c67043a2dad0385c498c.jpg\"]', 1, '2024-11-10 06:49:49'),
(1289, 358, 'Green', '#00ff00', 1, '[\"1731243116_0e05ab2ea9ef88a07bcc.jpg\"]', 1, '2024-11-10 06:52:31'),
(1290, 186, 'Black&White', '#000000', 1, '[\"1731243268_94a11cfb3f60af4e1f65.jpg\"]', 1, '2024-11-10 06:54:28'),
(1291, 360, 'Black ', '#000000', 1, '[\"1731243332_b23b86df6e4ca77ccc0e.jpg\"]', 1, '2024-11-10 06:55:32'),
(1292, 391, 'Black ', '#000000', 1, '[\"1731239175_1a0e6ca10989834ad711.jpg\"]', 1, '2024-11-10 06:56:45'),
(1293, 391, 'PINK', '#e09696', 1, '[\"1731243405_f13fe5cfdefb1e9bc131.jpg\"]', 1, '2024-11-10 06:56:45'),
(1294, 110, 'TRANSPERANT', '#000000', 1, '[\"1731243526_25a92c5e0fc2a52d5efc.jpg\"]', 1, '2024-11-10 06:58:46'),
(1295, 263, 'Tortoise ', '#6b2828', 1, '[\"1731243608_5cbbb5d0bc1f53709244.jpg\"]', 1, '2024-11-10 07:00:08'),
(1296, 416, 'Black&Blue', '#0000ff', 1, '[\"1731249575_c128e313a56a0d44391b.jpg\"]', 1, '2024-11-10 08:39:35'),
(1299, 417, 'White', '#000000', 1, '[\"1731309067_c4a43f5b1c7c5af357a1.jpg\"]', 1, '2024-11-11 02:18:45'),
(1300, 418, 'White ', '#000000', 1, '[\"1731309240_281bd7aa3c38a4e4a89b.jpg\"]', 1, '2024-11-11 02:38:54'),
(1301, 216, 'BLU&BLAK', '#000000', 1, '[]', 1, '2024-11-11 09:34:44'),
(1302, 232, 'Grey', '#ffffff', 1, '[]', 1, '2024-11-11 09:37:43'),
(1303, 135, 'Gold', '#ffff00', 1, '[\"1731406489_a8d1ceab1bb140fb315e.jpg\"]', 1, '2024-11-12 04:14:49'),
(1304, 376, 'BLUE & SILVER', '#000000', 1, '[\"1731406665_5b94ad31945a3b9706a2.jpg\"]', 1, '2024-11-12 04:17:45'),
(1316, 287, 'Gunmetal', '#919191', 1, '[]', 1, '2024-11-12 05:54:40'),
(1317, 287, 'Gold', '#c7b167', 1, '[\"1731408100_e98cfdd2b5a57ee0dc0f.jpg\"]', 1, '2024-11-12 05:54:40'),
(1318, 287, 'Silver', '#ffffff', 1, '[\"1731412480_34d6b0b891ad03085d94.jpg\"]', 1, '2024-11-12 05:54:40'),
(1319, 218, 'Gunmetal & black', '#000000', 1, '[\"1731407507_5ff3e1b1356348dfeaaa.jpg\"]', 1, '2024-11-12 05:55:35'),
(1320, 218, 'BLACK & gunmetal ', '#000000', 1, '[\"1731407507_7d944e26d4a06a8115b1.jpg\"]', 1, '2024-11-12 05:55:35'),
(1321, 164, 'Gold', '#bd8017', 1, '[\"1731415804_e769c166802e5bb3a9ce.jpg\"]', 1, '2024-11-12 06:50:04'),
(1322, 219, 'Gold', '#dea426', 1, '[\"1731416072_c7bf749d0d2c0529f03b.jpg\"]', 1, '2024-11-12 06:54:32'),
(1323, 166, 'Gunmetal', '#808080', 1, '[]', 1, '2024-11-12 06:58:28'),
(1324, 166, '32305', '#ff00ff', 1, '[\"1731416308_e92999ca107383e5a6e4.jpg\"]', 1, '2024-11-12 06:58:28'),
(1325, 183, 'Gunmetal ', '#8f8f8f', 1, '[\"1731416462_86a98547af0bd96f0fe5.jpg\"]', 1, '2024-11-12 07:01:02'),
(1326, 183, 'Silver', '#ffffff', 1, '[\"1731416462_5525c1ebd7b825a49dbc.jpg\"]', 1, '2024-11-12 07:01:02'),
(1327, 117, 'Blue', '#0000ff', 1, '[\"1731416620_fca48e63498fa536b5b9.jpg\"]', 1, '2024-11-12 07:03:40'),
(1328, 288, 'Blue ', '#0000ff', 1, '[\"1731416903_f3e596f1d4bd03d3169d.jpg\"]', 1, '2024-11-12 07:08:23'),
(1329, 288, 'Black', '#000000', 1, '[\"1731416903_c707cc9fa899fca738f8.jpg\"]', 1, '2024-11-12 07:08:23'),
(1332, 76, 'BLU TRANSPARENT', '#0000ff', 1, '[\"1731417429_1f0a6ded6748462f4878.jpg\"]', 1, '2024-11-12 07:20:13'),
(1333, 76, 'Silver ', '#787878', 1, '[\"1731417613_dff4112333b17df63672.jpg\"]', 1, '2024-11-12 07:20:13'),
(1334, 362, 'Brown and Gold', '#94733a', 1, '[\"1731418263_789330b1a6f662395797.jpg\"]', 1, '2024-11-12 07:31:03'),
(1335, 362, 'Red and gunmetal ', '#9c5833', 1, '[\"1731418263_5e417a5ac8d8fea6b941.jpg\"]', 1, '2024-11-12 07:31:03'),
(1336, 362, 'Black&silver', '#ffffff', 1, '[\"1731418263_886904419192d26363c4.jpg\"]', 1, '2024-11-12 07:31:03'),
(1337, 308, 'Black', '#000000', 1, '[\"1731419065_060252cf53fe9c66bd8b.jpg\"]', 1, '2024-11-12 07:44:25'),
(1338, 308, 'Silver&blu', '#00ffff', 1, '[\"1731419065_3327eb1edff49041cf54.jpg\"]', 1, '2024-11-12 07:44:25'),
(1339, 308, 'Brown', '#8a2222', 1, '[\"1731419065_38f841a4045b38348be4.jpg\"]', 1, '2024-11-12 07:44:25'),
(1341, 113, 'GREY&GUNMETAL', '#00ff00', 1, '[\"1731419184_bda24ff3efcd7227bab5.jpg\"]', 1, '2024-11-12 07:46:24'),
(1343, 112, 'Black&silver', '#000000', 1, '[\"1731419460_427a4a9ed70193978513.jpg\"]', 1, '2024-11-12 07:51:00'),
(1344, 386, 'Gunmetal', '#828282', 1, '[\"1731419817_2d6325d9c045cfb46a9f.jpg\"]', 1, '2024-11-12 07:56:57'),
(1345, 401, 'BLUE', '#0000ff', 1, '[\"1731417089_62c84b902ba2b38a775b.jpg\"]', 1, '2024-11-12 07:58:22'),
(1346, 170, 'BROWN', '#b03d23', 1, '[\"1731420219_9d8cf59650ef51293352.jpg\"]', 1, '2024-11-12 08:03:39'),
(1347, 11, 'Black silver ', '#000000', 1, '[\"1729615290_d5f436b6ba635eeaa6f1.jpg\",\"1729615290_378c970c9cbefc45d202.jpg\"]', 1, '2024-11-12 08:24:00'),
(1349, 414, 'Transparent ', '#ffffff', 1, '[\"1731237564_ed2e5cf5a12f9361e131.jpg\"]', 1, '2024-11-13 07:00:45'),
(1351, 419, 'Hazel', '#571e1e', 1, '[\"1731512257_b33c22e910350fd349d4.jpg\"]', 1, '2024-11-13 09:37:37'),
(1352, 65, 'Black', '#000000', 1, '[\"1731595996_5cf8e01f0d9917d32cb7.jpg\"]', 1, '2024-11-14 08:53:16'),
(1353, 104, 'Pink', '#ff00ff', 1, '[\"1731596870_bd54c04d2b083ea97cc3.jpg\"]', 1, '2024-11-14 09:07:50'),
(1354, 249, 'Gunmetal ', '#000000', 1, '[\"1731658090_df6a8911856c2e0aff13.jpg\"]', 1, '2024-11-15 02:08:10'),
(1355, 50, 'Black ', '#000000', 1, '[\"1729686152_3274f79533625d61efff.jpg\",\"1729686152_46e02199e34a45f0092a.jpg\"]', 1, '2024-11-15 02:12:02'),
(1356, 44, 'Black ', '#000000', 1, '[\"1729657608_1a9a45b0feb5149cd94e.jpg\",\"1729657608_ae914994339b2d06658b.jpg\"]', 1, '2024-11-15 02:15:03'),
(1357, 36, 'Black ', '#000000', 1, '[\"1729656532_fc8fec8d6e4b5f4d8fa4.jpg\",\"1729656532_f74e3e7645b7a59936a8.jpg\"]', 1, '2024-11-15 02:15:43'),
(1358, 49, 'Black', '#000000', 1, '[\"1729685722_9fd76e78f837e17d0218.jpg\",\"1729685722_9df710e4fb1f162e53da.jpg\"]', 1, '2024-11-15 02:17:04'),
(1359, 34, 'Brown', '#000000', 1, '[\"1729655959_1904a574caeb01fab2b1.jpg\",\"1729655959_c24624c4e6d49ab51b96.jpg\"]', 1, '2024-11-15 02:18:28'),
(1360, 33, 'Black ', '#000000', 1, '[\"1729655863_915484c2a4510794e0fb.jpg\",\"1729655863_d1741f6c008682c8d7aa.jpg\"]', 1, '2024-11-15 02:19:06'),
(1361, 40, 'Grey-Black', '#000000', 1, '[\"1729656911_7f23e8deba7992d8e862.jpg\",\"1729656911_5aaeeaa6ae2b8acc5d3e.jpg\"]', 1, '2024-11-15 02:20:45'),
(1362, 31, 'Black & Gold,', '#000000', 1, '[\"1729655560_e1711b8fb24a2a8e7b83.jpg\",\"1729655560_8ab661a8a6f6af835437.jpg\"]', 1, '2024-11-15 02:21:24'),
(1363, 48, 'Silver black', '#000000', 1, '[]', 1, '2024-11-15 02:38:59'),
(1364, 420, 'Transparent ', '#ffffff', 1, '[\"1731660127_5d602f4769416c84b291.jpg\"]', 1, '2024-11-15 02:42:07'),
(1365, 420, 'Black', '#000000', 1, '[\"1731660127_3e056343bc08effadaa1.jpg\"]', 1, '2024-11-15 02:42:07'),
(1366, 420, 'Grey', '#666666', 1, '[\"1731660127_f072f1f84a31cefb1355.jpg\"]', 1, '2024-11-15 02:42:07'),
(1367, 43, 'Black ', '#000000', 1, '[\"1729657464_0410621182ccee046aa3.jpg\",\"1729657464_c4bef8342b48485e27e7.jpg\"]', 1, '2024-11-15 02:44:58'),
(1368, 12, 'Matt Black', '#000000', 1, '[\"1729651919_caead9a46b67b1113e28.jpg\",\"1729651919_f768b34409d2a48d9f4d.jpg\"]', 1, '2024-11-15 02:45:54'),
(1369, 421, 'Black', '#000000', 1, '[\"1731660668_d447012131ff6c446063.jpg\"]', 1, '2024-11-15 02:51:08'),
(1370, 47, 'Gold Black', '#000000', 1, '[\"1729658042_96dac50d1dfeb32dc941.jpg\",\"1729658042_b9399fb464d28a3e2e3a.jpg\"]', 1, '2024-11-15 02:53:15'),
(1371, 47, 'Gold', '#000000', 1, '[]', 1, '2024-11-15 02:53:15'),
(1372, 8, 'Black', '#000000', 1, '[\"1729614655_c60b11b3c6b85c22478c.jpg\",\"1729614655_d167530c643ace43c2d7.jpg\"]', 1, '2024-11-15 02:54:57'),
(1373, 18, 'Black', '#000000', 1, '[\"1729653345_07f870c4d5059bf35891.jpg\",\"1729653345_49a6f873130dc780319f.jpg\"]', 1, '2024-11-15 02:56:43'),
(1374, 18, 'Gunmetal', '#7a7a7a', 1, '[\"1731661003_a067fdf03145a51d9881.jpg\"]', 1, '2024-11-15 02:56:43'),
(1375, 5, 'Black Lens | Black & Rose Gold Frame', '#000000', 1, '[\"1729598118_1d9dce94c32e226fa75f.jpg\",\"1729598118_a47c48a8d3db948ea390.jpg\"]', 1, '2024-11-15 02:57:51'),
(1376, 10, 'Blue', '#000000', 1, '[\"1729615019_3a2f610aa5d41457c5be.jpg\",\"1729615019_f2f05810485eee13ded7.jpg\"]', 1, '2024-11-15 02:59:40'),
(1377, 10, 'Gold &brown', '#7d3939', 1, '[\"1731661180_a075a070477db854d8da.jpg\"]', 1, '2024-11-15 02:59:40'),
(1378, 422, 'Black', '#000000', 1, '[\"1731661481_38653ce2b422bf1ad944.jpg\"]', 1, '2024-11-15 03:04:41'),
(1379, 423, 'Black', '#000000', 1, '[\"1731661621_9b35434c5c282de3958c.jpg\"]', 1, '2024-11-15 03:07:01'),
(1380, 424, 'Black ', '#000000', 1, '[\"1731661770_f22f5f398191854b63cd.jpg\"]', 1, '2024-11-15 03:09:30'),
(1381, 425, 'Black ', '#000000', 1, '[\"1731662100_e05e99a7215fa855a858.jpg\"]', 1, '2024-11-15 03:15:00'),
(1382, 426, 'Black', '#0000ff', 1, '[\"1731662666_a047e8c64cc2dd3293da.jpg\"]', 1, '2024-11-15 03:24:26'),
(1383, 427, 'Black', '#000000', 1, '[\"1731663165_c668d85d30d5ad4af45c.jpg\"]', 1, '2024-11-15 03:32:45'),
(1389, 335, 'Black and White', '#000000', 1, '[\"1731681552_5cc331a011b0133705ea.jpg\"]', 1, '2024-11-15 08:39:12'),
(1390, 211, 'Matte Blue', '#000000', 1, '[\"1731681667_5892703d456567caeb54.jpg\"]', 1, '2024-11-15 08:41:07'),
(1391, 211, 'Black', '#000000', 1, '[\"1731681667_3f0d38df5eaa5b29194b.jpg\"]', 1, '2024-11-15 08:41:07'),
(1392, 389, 'Transparent ', '#ffffff', 1, '[\"1731681788_66273a52e4aaf64db87d.jpg\"]', 1, '2024-11-15 08:43:08'),
(1393, 389, 'Blue', '#0000ff', 1, '[\"1731681788_29b8d674885496609bf7.jpg\"]', 1, '2024-11-15 08:43:08'),
(1394, 332, 'Black & blue', '#000000', 1, '[\"1731682347_3c335d436e7a9c45e333.jpg\"]', 1, '2024-11-15 08:52:27'),
(1395, 123, 'Grey', '#616161', 1, '[\"1731682497_71587870c4390b66e888.jpg\"]', 1, '2024-11-15 08:54:57'),
(1396, 123, 'Green', '#00ff00', 1, '[\"1731682497_66ac0b69b06c3b78063a.jpg\"]', 1, '2024-11-15 08:54:57'),
(1397, 402, 'Brown ', '#a34d0b', 1, '[\"1731682681_f2c4101938d4a1fcd5ae.jpg\"]', 1, '2024-11-15 08:58:01'),
(1398, 402, 'Tortoise ', '#85532a', 1, '[\"1731682681_5f4d47252c02ec5be9dd.jpg\"]', 1, '2024-11-15 08:58:01'),
(1399, 124, 'Black', '#000000', 1, '[\"1731682827_91a982f121d772daff7b.jpg\"]', 1, '2024-11-15 09:00:27'),
(1400, 124, 'Blue ', '#0000ff', 1, '[\"1731682827_9bf49924705b1d841f5e.jpg\"]', 1, '2024-11-15 09:00:27'),
(1401, 122, 'GREEN', '#00ff00', 1, '[\"1731682956_288db3ed4583666714c1.jpg\"]', 1, '2024-11-15 09:02:36'),
(1402, 324, 'Violet transparent ', '#b87de3', 1, '[\"1731683063_ccdefcb2cb86c78b3576.jpg\"]', 1, '2024-11-15 09:04:23'),
(1403, 343, 'BLACK', '#000000', 1, '[]', 1, '2024-11-15 09:05:28'),
(1404, 326, 'Grey', '#696969', 1, '[\"1731683438_522da4958c57113f4c39.jpg\"]', 1, '2024-11-15 09:10:38'),
(1405, 326, 'Black and purple ', '#000000', 1, '[\"1731683438_56f330944a0261434ea2.jpg\"]', 1, '2024-11-15 09:10:38'),
(1406, 155, 'White transparent ', '#ffffff', 1, '[\"1731683553_62640e4fbe5f12841e2c.jpg\"]', 1, '2024-11-15 09:12:33'),
(1407, 154, 'Black & white', '#6e6e6e', 1, '[\"1731683694_a1709397be1898e23955.jpg\"]', 1, '2024-11-15 09:14:54'),
(1408, 273, 'Green', '#00ff00', 1, '[\"1731074235_64ea7d8a4afa309acbf5.jpg\",\"1731074235_1a53599ff876da9e2f35.jpg\"]', 1, '2024-11-15 09:20:00'),
(1409, 273, 'Transparent ', '#ffffff', 1, '[\"1731075869_77c778cd9c5296e6cee7.jpg\",\"1731075869_9013b7cedf21c719deaa.jpg\"]', 1, '2024-11-15 09:20:00'),
(1410, 273, 'Tortoise', '#70471e', 1, '[\"1731075869_4824cbf0cd60bc9c952f.jpg\",\"1731075869_e7c30a8b440dad401db5.jpg\"]', 1, '2024-11-15 09:20:00'),
(1414, 145, 'Black & white', '#000000', 1, '[\"1731242964_3e5106455fd0137a262f.jpg\"]', 1, '2024-11-16 02:20:55'),
(1415, 145, 'BLACK & tortoise ', '#730707', 1, '[\"1731242964_16cabf40b87104098a8d.jpg\"]', 1, '2024-11-16 02:20:55'),
(1416, 367, 'Pink Transparent ', '#d99696', 1, '[\"1731745726_5d14b9c2092fedd2e25e.jpg\"]', 1, '2024-11-16 02:28:46'),
(1418, 393, 'GREEN ', '#1e630f', 1, '[\"1731745955_8831fb0cf060935c2c0b.jpg\"]', 1, '2024-11-16 02:32:35'),
(1419, 395, 'Grey', '#878787', 1, '[\"1731746021_6566608c9458de7266dd.jpg\"]', 1, '2024-11-16 02:33:41'),
(1420, 396, 'GREY', '#000000', 1, '[\"1731746071_ccf63b5938d5c92e9f09.jpg\"]', 1, '2024-11-16 02:34:31'),
(1422, 99, 'Blue Transparent ', '#00ffff', 1, '[\"1731745821_7c5495b64da2d9b3b152.jpg\"]', 1, '2024-11-16 02:36:42'),
(1423, 99, 'Purple ', '#82102a', 1, '[\"1731746202_824a76d51fa483c97289.jpg\"]', 1, '2024-11-16 02:36:42'),
(1425, 262, 'Mixed', '#000000', 1, '[\"1731746374_f8976ccf78c1a21c8e3d.jpg\"]', 1, '2024-11-16 02:39:34'),
(1426, 262, 'GUNMETAL', '#000000', 1, '[]', 1, '2024-11-16 02:39:34'),
(1427, 392, 'Blue', '#0000ff', 1, '[\"1731746540_a0e5c5e0312f6fc9f1a0.jpg\"]', 1, '2024-11-16 02:42:20'),
(1428, 174, 'Tortoise ', '#914f2f', 1, '[\"1731746615_6e3905d4d03e0ff920cc.jpg\"]', 1, '2024-11-16 02:43:35'),
(1429, 295, 'Blue & white', '#0000ff', 1, '[\"1731746712_8675f486976f9048c5d2.jpg\"]', 1, '2024-11-16 02:45:12'),
(1430, 179, 'Violet ', '#ff00ff', 1, '[\"1731746796_1f7a9e4e620733297f42.jpg\"]', 1, '2024-11-16 02:46:36'),
(1431, 341, 'BLUE', '#00ffff', 1, '[\"1731746868_91fb04fe72b68ae682e8.jpg\"]', 1, '2024-11-16 02:47:48'),
(1432, 108, 'Brown ', '#94643d', 1, '[\"1731747267_dded4c3cbade592fe4a5.jpg\"]', 1, '2024-11-16 02:54:27'),
(1433, 70, 'Green ', '#00ff00', 1, '[\"1731747334_9185f20576b289814907.jpg\"]', 1, '2024-11-16 02:55:34'),
(1434, 114, 'Red', '#ff0000', 1, '[\"1731747545_a365835bebceebe44680.jpg\"]', 1, '2024-11-16 02:59:05'),
(1435, 114, 'BLACK', '#000000', 1, '[\"1731747545_e4e9096367479ff8c811.jpg\"]', 1, '2024-11-16 02:59:05'),
(1436, 114, 'Green', '#00ff00', 1, '[\"1731747545_ea3397737d9c5a499d7b.jpg\"]', 1, '2024-11-16 02:59:05'),
(1437, 114, 'Grey & Blue', '#828282', 1, '[\"1731747545_5cffb51e7136622aa257.jpg\"]', 1, '2024-11-16 02:59:05'),
(1438, 114, 'Grey', '#454545', 1, '[\"1731747545_a450c0b39e19bf07139b.jpg\"]', 1, '2024-11-16 02:59:05'),
(1439, 115, 'Black', '#000000', 1, '[\"1731747638_e29ce2db630b299fc240.jpg\"]', 1, '2024-11-16 03:00:38'),
(1440, 290, 'Black', '#000000', 1, '[\"1731747716_a6606e1b8de4ffae37ac.jpg\"]', 1, '2024-11-16 03:01:56'),
(1441, 127, 'Brown ', '#9c5c24', 1, '[\"1731747805_157d0973c59ef238a0eb.jpg\"]', 1, '2024-11-16 03:03:25'),
(1442, 111, 'Green', '#166b18', 1, '[\"1731747891_92e0a6f06251cb0a611a.jpg\"]', 1, '2024-11-16 03:04:51'),
(1443, 111, 'Black', '#000000', 1, '[\"1731747891_798b7c6ec96f17391947.jpg\"]', 1, '2024-11-16 03:04:51'),
(1444, 340, 'Green& WHITE', '#7b9c30', 1, '[\"1731747972_bcba82c83e333edb38f6.jpg\"]', 1, '2024-11-16 03:06:12'),
(1446, 126, 'Black ', '#000000', 1, '[\"1731748088_473d70f0e0a2452e6e08.jpg\"]', 1, '2024-11-16 03:08:08'),
(1447, 244, 'Black', '#000000', 1, '[\"1731748159_598c5aa529fc447b4fda.jpg\"]', 1, '2024-11-16 03:09:19'),
(1448, 264, 'BROWN', '#ffffff', 1, '[\"1731749712_3dbda81a92ae1c9ebc16.jpg\"]', 1, '2024-11-16 03:35:12'),
(1450, 240, 'Black& maroon ', '#000000', 1, '[]', 1, '2024-11-16 03:40:57'),
(1452, 258, 'Black &red', '#000000', 1, '[\"1731750531_d2ffd609712883150585.jpg\"]', 1, '2024-11-16 03:48:51'),
(1453, 254, 'GUNMETAL', '#000000', 1, '[\"1731750624_14c8b31d00fd54a1a8a3.jpg\"]', 1, '2024-11-16 03:50:24'),
(1454, 301, 'Black ', '#000000', 1, '[\"1731750744_b5633475ce89521a6525.jpg\"]', 1, '2024-11-16 03:52:24'),
(1455, 163, 'GUNMETAL', '#000000', 1, '[\"1731750879_87f2552f730ac6a5c629.jpg\"]', 1, '2024-11-16 03:54:39'),
(1456, 165, 'Brown', '#94502e', 1, '[\"1731502683_e9ae9d3175273024e9f4.jpg\"]', 1, '2024-11-16 03:56:00'),
(1457, 165, 'Black and red', '#000000', 1, '[\"1731750960_3a018dbade91a65ab13a.jpg\"]', 1, '2024-11-16 03:56:00'),
(1458, 189, 'LITE BUE TRANSPARENT ', '#00ffff', 1, '[\"1731681415_b61c052e491f6400dcd9.jpg\"]', 1, '2024-11-16 03:58:21'),
(1459, 189, 'Blue', '#0000ff', 1, '[\"1731681415_a5dc96667927630cf895.jpg\"]', 1, '2024-11-16 03:58:21'),
(1460, 189, 'BLACK AND WHITE', '#000000', 1, '[\"1731681415_b23fb0a9ea99aed7bd8a.jpg\"]', 1, '2024-11-16 03:58:21'),
(1462, 261, 'RED', '#000000', 1, '[\"1731752048_6dc8b3289d4d19e82500.jpg\"]', 1, '2024-11-16 04:14:08'),
(1463, 176, 'BLACK', '#000000', 1, '[\"1731752133_a5fc37cd83adc4057803.jpg\"]', 1, '2024-11-16 04:15:33'),
(1464, 193, 'Green transparent ', '#00ff00', 1, '[\"1731752261_0a14cf760a5643574247.jpg\"]', 1, '2024-11-16 04:17:41'),
(1466, 299, 'Transparent ', '#ffffff', 1, '[\"1731752506_188e70d4a9f48fe1e07d.jpg\"]', 1, '2024-11-16 04:21:46'),
(1467, 339, 'GREEN', '#000000', 1, '[\"1731752624_bc8776070278051fd284.jpg\"]', 1, '2024-11-16 04:23:44'),
(1468, 334, 'GOLD', '#000000', 1, '[\"1731752690_bf4356c813b0048f2744.jpg\"]', 1, '2024-11-16 04:24:50'),
(1469, 55, 'Black ', '#000000', 1, '[\"1731752827_7f5499f746712ff71ae4.jpg\"]', 1, '2024-11-16 04:27:07'),
(1470, 180, 'Brown ', '#800b0b', 1, '[\"1731752403_0f39360b2f057fd3700e.jpg\"]', 1, '2024-11-16 04:30:43'),
(1471, 180, 'Black and white ', '#000000', 1, '[\"1731753043_adb4f1bd6b349fc6066b.jpg\"]', 1, '2024-11-16 04:30:43'),
(1472, 245, 'WHITE OPPAQ', '#000000', 1, '[\"1731753135_e7a7c619a6b8d013229e.jpg\"]', 1, '2024-11-16 04:32:15'),
(1473, 355, 'ROSE GOLD', '#000000', 1, '[\"1731751920_bda5df786f3d07a9f5fd.jpg\"]', 1, '2024-11-16 04:33:06'),
(1474, 355, 'Black ', '#000000', 1, '[\"1731753186_bc8f49cb881b947540b7.jpg\"]', 1, '2024-11-16 04:33:06'),
(1477, 160, 'Red& black ', '#000000', 1, '[\"1731753543_1fda4bdd9195ae1abc02.jpg\"]', 1, '2024-11-16 04:39:03'),
(1483, 312, 'BROWN& black ', '#000000', 1, '[\"1731753857_7fbdd1443ff2f5d8bc11.jpg\"]', 1, '2024-11-16 04:44:17'),
(1484, 312, 'YELLOW', '#000000', 1, '[]', 1, '2024-11-16 04:44:17'),
(1495, 230, 'RED', '#000000', 1, '[\"1731754120_8bbeb033194eb7cf5e39.jpg\"]', 1, '2024-11-16 04:48:40'),
(1496, 221, 'Brown ', '#c2703a', 1, '[\"1731754229_db75864bc43cd09670de.jpg\"]', 1, '2024-11-16 04:50:29'),
(1497, 221, 'BLACK&WHITE', '#000000', 1, '[]', 1, '2024-11-16 04:50:29'),
(1498, 221, 'WHITE TRANSPERANT', '#000000', 1, '[]', 1, '2024-11-16 04:50:29'),
(1499, 201, 'GREY', '#000000', 1, '[\"1731754499_fedbd613304ff63f38da.jpg\"]', 1, '2024-11-16 04:54:59'),
(1509, 274, 'Violet ', '#e3acda', 1, '[\"1731754924_b72fdab3fdd56b7a5669.jpg\"]', 1, '2024-11-16 05:02:04'),
(1510, 274, 'SILVER', '#000000', 1, '[]', 1, '2024-11-16 05:02:04'),
(1511, 229, 'Blue ', '#0000ff', 1, '[\"1731755006_4ac0a2301eafb2271603.jpg\"]', 1, '2024-11-16 05:03:26'),
(1516, 222, 'Black', '#000000', 1, '[\"1731746281_29e6640c9343af458013.jpg\"]', 1, '2024-11-16 05:07:46'),
(1517, 222, 'Green', '#234d22', 1, '[\"1731755266_02050a46e4bd735e6a94.jpg\"]', 1, '2024-11-16 05:07:46'),
(1527, 178, 'Semi Transparent pink', '#000000', 1, '[\"1731755544_d5131f73964d8c3d687e.jpg\"]', 1, '2024-11-16 05:12:24'),
(1528, 198, 'BLACK ', '#000000', 1, '[\"1731755610_9d6c8bdd4d434971d975.jpg\"]', 1, '2024-11-16 05:13:30'),
(1529, 198, 'GREEN', '#000000', 1, '[]', 1, '2024-11-16 05:13:30'),
(1530, 198, 'Black and brown ', '#000000', 1, '[]', 1, '2024-11-16 05:13:30'),
(1531, 198, 'Black and white ', '#000000', 1, '[\"1731753973_a0ac769c1ec4160621e5.jpg\"]', 1, '2024-11-16 05:13:30'),
(1532, 53, 'Green', '#00ff00', 1, '[\"1731750452_120f823245a4242c7cbd.jpg\"]', 1, '2024-11-16 05:14:29'),
(1533, 53, 'Semi transparent pink& white ', '#000000', 1, '[\"1731755669_ebcb3b4ba30b67caab4b.jpg\"]', 1, '2024-11-16 05:14:29'),
(1534, 327, 'Semi transparent ', '#ffffff', 1, '[\"1731755823_9a85fa8bb53b18539a57.jpg\"]', 1, '2024-11-16 05:17:03'),
(1535, 327, 'MAT BLACK', '#000000', 1, '[]', 1, '2024-11-16 05:17:03'),
(1536, 327, 'BLACK&WHITE', '#000000', 1, '[]', 1, '2024-11-16 05:17:03'),
(1537, 327, 'SILVER', '#000000', 1, '[]', 1, '2024-11-16 05:17:03'),
(1538, 327, 'GUNMETAL', '#000000', 1, '[]', 1, '2024-11-16 05:17:03'),
(1539, 200, 'BLUE', '#000000', 1, '[]', 1, '2024-11-16 05:18:01'),
(1540, 200, 'GREEN AND WHITE', '#000000', 1, '[]', 1, '2024-11-16 05:18:01'),
(1541, 200, 'Semi transparent blue ', '#000000', 1, '[\"1731755881_e0b73e7d27508ad2e249.jpg\"]', 1, '2024-11-16 05:18:01'),
(1542, 200, 'BLACK', '#000000', 1, '[\"1731754624_8cc63935b40f56a93706.jpg\"]', 1, '2024-11-16 05:18:01'),
(1543, 200, 'LITE BUE TRANS', '#000000', 1, '[\"1731753674_439507264af34be8fcc3.jpg\"]', 1, '2024-11-16 05:18:01'),
(1544, 225, 'GUNMETAL', '#000000', 1, '[]', 1, '2024-11-16 05:19:19'),
(1545, 225, 'Semi transparent pink', '#ffa3e7', 1, '[\"1731755959_8c3b91a20088e2a3bfd1.jpg\"]', 1, '2024-11-16 05:19:19'),
(1546, 225, 'Semi transparent ', '#e8e8e8', 1, '[\"1731755422_02dd0aaff7c4395b94e0.jpg\"]', 1, '2024-11-16 05:19:19'),
(1547, 177, 'BLACK& red ', '#000000', 1, '[\"1731756058_388bc2b43e945266b350.jpg\"]', 1, '2024-11-16 05:20:58'),
(1548, 246, 'MAT BLUE', '#000000', 1, '[\"1731756144_0470fe6da6af5d66f1a7.jpg\"]', 1, '2024-11-16 05:22:24'),
(1549, 413, 'Semi transparent pink', '#000000', 1, '[\"1731756221_8d9ec27b92aefd5b6f0e.jpg\"]', 1, '2024-11-16 05:23:41'),
(1550, 413, 'Semi transparent ', '#000000', 1, '[]', 1, '2024-11-16 05:23:41'),
(1551, 413, 'GREEN', '#000000', 1, '[\"1731755330_8d93abecb7d31fc6ea8c.jpg\"]', 1, '2024-11-16 05:23:41'),
(1552, 413, 'GREEN', '#000000', 1, '[\"1731755330_8d93abecb7d31fc6ea8c.jpg\"]', 1, '2024-11-16 05:23:41'),
(1553, 413, 'GREEN', '#000000', 1, '[\"1731755330_8d93abecb7d31fc6ea8c.jpg\"]', 1, '2024-11-16 05:23:41'),
(1554, 413, 'WHITE', '#000000', 1, '[\"1731127220_cd82e232eec31df714a0.jpg\"]', 1, '2024-11-16 05:23:41'),
(1555, 311, 'Pink', '#e670b7', 1, '[\"1731759226_dbd36b7e061ff92c20d0.jpg\"]', 1, '2024-11-16 06:13:46'),
(1556, 311, 'BLUE', '#000000', 1, '[]', 1, '2024-11-16 06:13:46'),
(1557, 412, 'Blue', '#00ffff', 1, '[\"1731759338_ba6fca359aa7f480a61a.jpg\"]', 1, '2024-11-16 06:15:38'),
(1558, 411, 'Black', '#000000', 1, '[]', 1, '2024-11-16 06:19:08'),
(1559, 411, 'Pink', '#ff00ff', 1, '[\"1731759548_0638f32853f180320e6f.jpg\"]', 1, '2024-11-16 06:19:08'),
(1568, 60, 'Maroon', '#ad5a5a', 1, '[\"1731772884_f7d9cab40a0157561f4c.jpg\"]', 1, '2024-11-16 10:01:24'),
(1569, 60, 'GUN TRANS', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1570, 60, 'BLU WHITE TRANS', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1571, 60, 'GRE GOLD', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1572, 60, 'BLU WHITE TRANS', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1573, 60, 'WHITE GREY TRANS', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1574, 60, 'GREY TRANS', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1575, 60, 'MAGENTA GRADIEN', '#000000', 1, '[]', 1, '2024-11-16 10:01:24'),
(1576, 428, 'Any', '#000000', 1, '[\"1731928121_ef44a37d8fc8705d6ec1.jpg\"]', 1, '2024-11-18 05:08:41'),
(1577, 336, 'Green', '#136115', 1, '[\"1731932948_534bb0381b0362c9cebb.jpg\"]', 1, '2024-11-18 06:29:08'),
(1578, 272, 'Grey', '#b3b3b3', 1, '[\"1731233023_5e026c127bf6da826a94.jpg\",\"1731233023_911c2992dacedbd1f318.jpg\"]', 1, '2024-11-18 08:37:48');
INSERT INTO `tbl_productcolor` (`cid`, `pid`, `colorName`, `colorCode`, `stock`, `colorImage`, `store_id`, `CreatedDate`) VALUES
(1579, 272, 'Black ', '#000000', 1, '[\"1731233023_ee75f64daa04b0a79379.jpg\",\"1731233023_0ed748f3d561aa43c74c.jpg\"]', 1, '2024-11-18 08:37:48'),
(1580, 272, 'Tortoise', '#8c5b3b', 1, '[\"1731233023_3fc14079ca9565e8da68.jpg\",\"1731233023_285c8a1cc9f9139afe6f.jpg\"]', 1, '2024-11-18 08:37:48'),
(1581, 213, 'Blue Transparent ', '#000000', 1, '[\"1731233912_1b9b81ac7b9a7ff5b911.jpg\"]', 1, '2024-11-18 08:38:19'),
(1582, 213, 'Green&blue', '#0000ff', 1, '[\"1731233912_f6c75f300f53fb8bca88.jpg\"]', 1, '2024-11-18 08:38:19'),
(1584, 345, 'Grey', '#7d7d7d', 1, '[\"1732093266_160b8c0751b9376b26bb.jpg\"]', 1, '2024-11-20 03:01:06'),
(1585, 325, 'Black& rose', '#ff00ff', 1, '[\"1732094967_c9a81163f8e9e9601c7a.jpg\"]', 1, '2024-11-20 03:29:27'),
(1586, 429, 'Green and gold', '#b4e34f', 1, '[\"1732021520_035d9d9f86c97ca0b92f.jpg\"]', 1, '2024-12-09 02:03:33'),
(1591, 431, 'Black', '#000000', 1, '[\"1734504127_3bb1bdb53680bedf73ee.jpg\"]', 1, '2024-12-18 12:12:07'),
(1592, 431, 'Green', '#1fa32e', 2, '[\"1734504127_accc9db9eb833684a467.png\"]', 1, '2024-12-18 12:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_details`
--

CREATE TABLE `tbl_return_details` (
  `ReturnDetailsId` int(11) NOT NULL,
  `Return_MasterId` int(11) NOT NULL,
  `Sales_MasterId` int(11) NOT NULL,
  `Sales_detailsId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `color_code` text NOT NULL,
  `lensid` int(11) NOT NULL,
  `coating_id` int(11) NOT NULL,
  `product_rate` decimal(18,2) NOT NULL,
  `product_discount` decimal(18,2) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `lens_rate` decimal(18,2) NOT NULL,
  `lens_discount` decimal(18,2) NOT NULL,
  `coating_rate` decimal(18,2) NOT NULL,
  `coating_discount` decimal(18,2) NOT NULL,
  `eyetest_id` int(11) NOT NULL,
  `ReturnDescription` text NOT NULL,
  `ReturnImage` varchar(200) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_return_details`
--

INSERT INTO `tbl_return_details` (`ReturnDetailsId`, `Return_MasterId`, `Sales_MasterId`, `Sales_detailsId`, `pid`, `color_name`, `color_code`, `lensid`, `coating_id`, `product_rate`, `product_discount`, `product_image`, `lens_rate`, `lens_discount`, `coating_rate`, `coating_discount`, `eyetest_id`, `ReturnDescription`, `ReturnImage`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(1, 1, 63, 76, 429, 'Green and gold', '#b4e34f', 30, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 3900.00, 0.00, 500.00, 0.00, 0, 'dasf', '6758028993870.png', 1, '2024-12-10 14:27:45', 2),
(2, 2, 62, 74, 429, 'Green and gold', '#b4e34f', 49, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 13700.00, 0.00, 500.00, 0.00, 0, '', NULL, 1, '2024-12-11 11:08:50', 2),
(3, 3, 56, 68, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 23, '', NULL, 1, '2024-12-11 15:39:32', 2),
(4, 4, 65, 80, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 0, '', NULL, 1, '2024-12-12 11:11:30', 2),
(5, 5, 68, 86, 429, 'Green and gold', '#b4e34f', 51, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 10020.00, 0.00, 500.00, 0.00, 0, '', NULL, 1, '2024-12-12 13:32:01', 2),
(7, 7, 74, 97, 425, 'Black', '#000000', 43, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731662100_e05e99a7215fa855a858.jpg', 1700.00, 0.00, 500.00, 0.00, 0, '', NULL, 0, '2024-12-17 12:41:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_master`
--

CREATE TABLE `tbl_return_master` (
  `ReturnMasterId` int(11) NOT NULL,
  `SalesMasterId` int(11) NOT NULL,
  `ReturnNo` int(11) NOT NULL,
  `ReturnDate` date NOT NULL,
  `Customername` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Salesmanid` int(11) NOT NULL,
  `TotalbillAmount` decimal(18,2) NOT NULL,
  `ReturnAmount` decimal(18,2) NOT NULL,
  `isWarrantyApplied` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_return_master`
--

INSERT INTO `tbl_return_master` (`ReturnMasterId`, `SalesMasterId`, `ReturnNo`, `ReturnDate`, `Customername`, `Phone`, `Email`, `Salesmanid`, `TotalbillAmount`, `ReturnAmount`, `isWarrantyApplied`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(1, 63, 1, '2024-12-10', 'sdfdg', '155451', '', 2, 10399.00, 5199.00, 0, 1, '2024-12-10 14:27:45', 2),
(2, 62, 2, '2024-12-11', '', '', '', 1, 20699.00, 14999.00, 0, 1, '2024-12-11 11:08:50', 2),
(3, 56, 3, '2024-12-11', 'Raheena', '9633201602', '', 1, 1999.50, 2200.00, 0, 1, '2024-12-11 15:39:32', 2),
(4, 65, 4, '2024-12-12', '', '', '', 1, 18599.00, 3499.00, 0, 1, '2024-12-12 11:11:30', 2),
(5, 68, 5, '2024-12-12', '', '', '', 1, 17019.00, 11319.00, 0, 1, '2024-12-12 13:32:01', 2),
(7, 74, 6, '2024-12-17', '', '', '', 1, 4449.50, 1700.00, 1, 0, '2024-12-17 12:41:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesman`
--

CREATE TABLE `tbl_salesman` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_salesman`
--

INSERT INTO `tbl_salesman` (`id`, `name`, `mobile`, `store_id`) VALUES
(1, 'Ziyadh', '1234567891', 1),
(2, 'Aravind Sai', '124556655', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesmaster`
--

CREATE TABLE `tbl_salesmaster` (
  `master_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `total_amount` decimal(18,2) NOT NULL,
  `advance_amont` decimal(18,2) NOT NULL,
  `balance_amount` decimal(18,2) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `coupen_id` int(11) NOT NULL,
  `coupen_disc_amt` decimal(18,2) NOT NULL,
  `coupon_disc_percentage` decimal(18,2) NOT NULL,
  `previlage_id` int(11) NOT NULL,
  `delivered` int(11) DEFAULT NULL,
  `Return_MasterId` int(11) NOT NULL,
  `Return_Amount` decimal(18,2) NOT NULL,
  `warranty_amt` decimal(18,2) NOT NULL,
  `warranty_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_salesmaster`
--

INSERT INTO `tbl_salesmaster` (`master_id`, `invoice_no`, `invoice_date`, `customer_name`, `phone`, `email`, `salesman_id`, `total_amount`, `advance_amont`, `balance_amount`, `payment_mode`, `coupen_id`, `coupen_disc_amt`, `coupon_disc_percentage`, `previlage_id`, `delivered`, `Return_MasterId`, `Return_Amount`, `warranty_amt`, `warranty_id`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(1, 1, '2024-11-11', 'Arshad', '7025903943', '', 2, 80.00, 80.00, 0.00, 'Gpay', 0, 0.00, 0.00, 5, 1, 0, 0.00, 0.00, 0, 1, '2024-11-11 14:22:25', 2),
(9, 2, '2024-11-11', 'Inthisham', '7559808602', 'inthisham012@gmail.com', 1, 1300.00, 1300.00, 0.00, 'Gpay', 0, 0.00, 0.00, 6, 0, 0, 0.00, 0.00, 0, 1, '2024-11-11 21:14:44', 2),
(11, 4, '2024-11-13', 'Nanda kishore', '7012093573', 'nandhums46@gmail.com', 1, 3599.00, 0.00, 3599.00, 'Cash', 0, 0.00, 0.00, 7, 1, 0, 0.00, 0.00, 0, 1, '2024-11-13 19:25:35', 2),
(29, 6, '2024-11-16', 'Rimsha fathima', '9933276745', '2881983@gmail.com', 1, 1800.00, 1000.00, 800.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-16 21:36:22', 2),
(30, 7, '2024-11-18', 'Prashanth ', '9495641049', '', 2, 80.00, 80.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-18 10:54:36', 2),
(36, 11, '2024-11-18', 'Fasal', '9048895435', 'fasalu689@gmail.com', 2, 2199.00, 500.00, 1699.00, 'Cash', 0, 0.00, 0.00, 8, 1, 0, 0.00, 0.00, 0, 1, '2024-11-18 20:02:49', 2),
(37, 12, '2024-11-18', 'Munner', '9656452829', '', 2, 1979.10, 500.00, 1479.10, 'Cash', 6, 219.90, 10.00, 9, 1, 0, 0.00, 0.00, 0, 1, '2024-11-18 20:11:10', 2),
(39, 14, '2024-11-19', 'Muhammed shafi', '9447629285', 'mohammedshafikpkdy@gmail.com', 1, 5399.00, 1000.00, 4399.00, 'Cash', 0, 0.00, 0.00, 10, 1, 0, 0.00, 0.00, 0, 1, '2024-11-19 19:27:11', 2),
(42, 17, '2024-11-20', 'Abdul rasheed', '8281048900', 'abdulrasheedop60@gmail.com', 1, 9239.40, 6000.00, 3239.40, 'Cash', 4, 6159.60, 40.00, 11, 1, 0, 0.00, 0.00, 0, 1, '2024-11-20 15:17:36', 2),
(43, 18, '2024-11-21', 'Vasu ', '9847703005', '', 2, 2199.50, 0.00, 2199.50, 'Cash', 8, 2199.50, 50.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 11:09:30', 2),
(44, 19, '2024-11-21', '', '', '', 1, 6900.00, 900.00, 6000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 16:44:56', 2),
(45, 20, '2024-11-21', '', '', '', 1, 4700.00, 700.00, 4000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 16:46:53', 2),
(46, 21, '2024-11-21', '', '', '', 1, 4700.00, 700.00, 4000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 16:51:53', 2),
(47, 22, '2024-11-21', '', '', '', 1, 3499.00, 499.00, 3000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 16:55:45', 2),
(48, 23, '2024-11-21', '', '', '', 1, 5200.00, 200.00, 5000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 17:02:49', 2),
(49, 24, '2024-11-21', '', '', '', 1, 5200.00, 200.00, 5000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 17:05:44', 2),
(50, 25, '2024-11-21', '', '', '', 1, 4700.00, 300.00, 4400.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 17:06:54', 2),
(51, 26, '2024-11-21', '', '', '', 1, 15499.00, 4999.00, 10500.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 17:10:17', 2),
(52, 27, '2024-11-21', '', '', '', 1, 12100.00, 2100.00, 10000.00, 'Cash', 0, 0.00, 0.00, 0, 1, 0, 0.00, 0.00, 0, 1, '2024-11-21 17:12:28', 2),
(53, 28, '2024-11-22', '', '', '', 1, 3145.04, 145.04, 3000.00, 'Cash', 8, 3145.04, 50.00, 5, 1, 0, 0.00, 0.00, 0, 1, '2024-11-22 14:18:45', 2),
(54, 29, '2024-11-23', '', '', '', 1, 2600.00, 600.00, 2000.00, 'Cash', 8, 2600.00, 50.00, 7, 0, 0, 0.00, 0.00, 0, 1, '2024-11-23 14:53:02', 2),
(56, 30, '2024-11-28', 'Raheena', '9633201602', '', 1, 1999.50, 1999.50, 0.00, 'Cash', 8, 1999.50, 50.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-28 11:35:15', 2),
(59, 32, '2024-11-29', '', '', '', 1, 1349.50, 349.50, 1000.00, 'Cash', 8, 1349.50, 50.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-29 14:50:26', 2),
(60, 33, '2024-11-29', '', '', '', 1, 1349.50, 0.00, 0.00, 'Cash', 8, 1349.50, 50.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-29 14:54:10', 2),
(61, 34, '2024-11-29', '', '', '', 1, 1349.50, 0.00, 0.00, 'Cash', 8, 1349.50, 50.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-29 14:55:40', 2),
(63, 36, '2024-12-10', '', '', '', 1, 10399.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-12-10 14:24:02', 2),
(64, 37, '2024-12-11', '', '', '', 1, 1401.51, 401.51, 1000.00, 'Cash', 8, 10099.50, 50.00, 15, 0, 0, 0.00, 0.00, 0, 1, '2024-12-11 10:41:15', 2),
(65, 38, '2024-12-12', '', '', '', 1, 18599.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 4, 3499.00, 0.00, 0, 1, '2024-12-12 11:10:54', 2),
(67, 40, '2024-12-12', '', '', '', 1, 3258.96, 258.96, 3000.00, 'Cash', 8, 6757.96, 50.00, 15, 0, 0, 0.00, 0.00, 0, 1, '2024-12-12 12:05:42', 2),
(69, 42, '2024-12-12', '', '', '', 1, 15381.01, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 15, 0, 68, 11319.00, 0.00, 0, 1, '2024-12-12 13:38:12', 2),
(70, 43, '2024-12-14', 'Ajmal', '94468050766', 'ajmal@gmail.com', 1, 3099.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 0, '2024-12-14 12:35:57', 2),
(72, 45, '2024-12-16', 'Ziyadh ', '+919446805672', 'ziyadh0114@gmail.com', 1, 3099.00, 99.00, 3000.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 0, '2024-12-16 12:13:23', 2),
(73, 46, '2024-12-17', '', '', '', 1, 3311.11, 311.11, 3000.00, 'Card', 8, 2811.11, 50.00, 15, 0, 56, 2200.00, 500.00, 2, 0, '2024-12-17 10:42:16', 2),
(74, 47, '2024-12-17', '', '', '', 1, 4449.50, 449.50, 4000.00, 'Card', 8, 4349.50, 50.00, 0, 0, 0, 0.00, 100.00, 1, 0, '2024-12-17 12:10:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesmaster_history`
--

CREATE TABLE `tbl_salesmaster_history` (
  `id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `total_amount` decimal(18,2) NOT NULL,
  `advance_amont` decimal(18,2) NOT NULL,
  `balance_amount` decimal(18,2) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `coupen_id` int(11) NOT NULL,
  `coupen_disc_amt` decimal(18,2) NOT NULL,
  `coupon_disc_percentage` decimal(18,2) NOT NULL,
  `previlage_id` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `Return_MasterId` int(11) NOT NULL,
  `Return_Amount` decimal(18,2) NOT NULL,
  `warranty_amt` decimal(18,2) NOT NULL,
  `warranty_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  `deleted_date` date DEFAULT NULL,
  `deleted_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_salesmaster_history`
--

INSERT INTO `tbl_salesmaster_history` (`id`, `history_id`, `invoice_no`, `invoice_date`, `customer_name`, `phone`, `email`, `salesman_id`, `total_amount`, `advance_amont`, `balance_amount`, `payment_mode`, `coupen_id`, `coupen_disc_amt`, `coupon_disc_percentage`, `previlage_id`, `delivered`, `Return_MasterId`, `Return_Amount`, `warranty_amt`, `warranty_id`, `store_id`, `CreatedDate`, `CreatedUser`, `deleted_date`, `deleted_user`) VALUES
(1, 1, 44, '2024-12-14', 'Ziyadh ', '9446805672', 'ziyadh0114@gmail.com', 1, 10899.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2025-01-03 11:44:16', 1, '2025-01-01', 1),
(2, 2, 39, '2024-12-12', '', '', '', 1, 3258.96, 258.96, 3000.00, 'Cash', 8, 6757.96, 50.00, 15, 0, 0, 0.00, 0.00, 0, 1, '2025-01-03 11:45:50', 1, '2025-01-02', 1),
(3, 3, 35, '2024-12-09', '', '', '', 1, 20699.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2025-01-03 14:30:29', 1, '2025-01-03', 1),
(5, 5, 41, '2024-12-12', '', '', '', 1, 17019.00, 0.00, 0.00, 'Cash', 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-12-12 13:05:11', 2, '2025-01-03', 1),
(6, 6, 31, '2024-11-28', 'Nanda kishore', '7012093573', 'nandhums46@gmail.com', 1, 2849.50, 849.50, 2000.00, 'Cash', 8, 2849.50, 50.00, 0, 0, 0, 0.00, 0.00, 0, 1, '2024-11-28 12:22:24', 2, '2025-01-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `id` int(11) NOT NULL,
  `sales_masterId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `color_code` text NOT NULL,
  `lensid` int(11) NOT NULL,
  `coating_id` int(11) NOT NULL,
  `product_rate` decimal(18,2) NOT NULL,
  `product_discount` decimal(18,2) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `lens_rate` decimal(18,2) NOT NULL,
  `lens_discount` decimal(18,2) NOT NULL,
  `coating_rate` decimal(18,2) NOT NULL,
  `coating_discount` decimal(18,2) NOT NULL,
  `eyetest_id` int(11) NOT NULL,
  `return_status` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`id`, `sales_masterId`, `pid`, `color_name`, `color_code`, `lensid`, `coating_id`, `product_rate`, `product_discount`, `product_image`, `lens_rate`, `lens_discount`, `coating_rate`, `coating_discount`, `eyetest_id`, `return_status`, `delivery_date`, `store_id`) VALUES
(1, 1, 417, 'White', '#000000', 0, 0, 80.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 0, 0, '0000-00-00', 1),
(2, 1, 418, 'White', '#000000', 0, 0, 0.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 0, 0, '0000-00-00', 1),
(6, 9, 216, 'BLU&BLAK', '#000000', 12, 0, 1299.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 0, 0, '2024-11-13', 1),
(7, 9, 232, 'Grey', '#ffffff', 12, 0, 1300.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 12, 0, '2024-11-13', 1),
(8, 11, 414, 'Transparent', '#ffffff', 17, 0, 1299.00, 1299.00, 'https://zealuxeyeboutique.com/images/product/1731237564_ed2e5cf5a12f9361e131.jpg', 2300.00, 2300.00, 0.00, 0.00, 13, 0, '2024-11-18', 1),
(9, 11, 165, 'Brown', '#94502e', 24, 0, 1299.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731502683_e9ae9d3175273024e9f4.jpg', 2300.00, 0.00, 0.00, 0.00, 13, 0, '2024-11-16', 1),
(37, 29, 60, 'Maroon', '#ad5a5a', 15, 0, 600.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731772884_f7d9cab40a0157561f4c.jpg', 1200.00, 0.00, 0.00, 0.00, 16, 0, '2024-11-21', 1),
(38, 30, 418, 'White', '#000000', 0, 0, 0.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731309240_281bd7aa3c38a4e4a89b.jpg', 0.00, 0.00, 0.00, 0.00, 0, 0, '0000-00-00', 1),
(39, 30, 417, 'White', '#000000', 0, 0, 80.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731309067_c4a43f5b1c7c5af357a1.jpg', 0.00, 0.00, 0.00, 0.00, 0, 0, '0000-00-00', 1),
(50, 36, 336, 'Green', '#136115', 27, 0, 1299.00, 1299.00, 'https://zealuxeyeboutique.com/images/product/1731932948_534bb0381b0362c9cebb.jpg', 900.00, 900.00, 0.00, 0.00, 18, 0, '2024-11-22', 1),
(51, 36, 261, 'RED', '#000000', 27, 0, 1299.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731752048_6dc8b3289d4d19e82500.jpg', 900.00, 0.00, 0.00, 0.00, 18, 0, '2024-11-22', 1),
(52, 37, 272, 'Black', '#000000', 27, 0, 1299.00, 1299.00, 'https://zealuxeyeboutique.com/images/product/1731233023_ee75f64daa04b0a79379.jpg', 900.00, 900.00, 0.00, 0.00, 19, 0, '2024-11-22', 1),
(53, 37, 213, 'Green&blue', '#0000ff', 27, 0, 1299.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1731233912_f6c75f300f53fb8bca88.jpg', 900.00, 0.00, 0.00, 0.00, 19, 0, '2024-11-22', 1),
(55, 39, 429, 'Green and gold', '#b4e34f', 47, 0, 1299.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 4100.00, 0.00, 0.00, 0.00, 22, 0, '2024-11-20', 1),
(56, 39, 184, 'Black & green', '#000000', 46, 0, 1299.00, 1299.00, 'https://zealuxeyeboutique.com/images/product/1731242815_91c94465f44b0f8ba2e0.jpg', 3300.00, 3300.00, 0.00, 0.00, 22, 0, '2024-11-23', 1),
(59, 42, 345, 'Grey', '#7d7d7d', 49, 0, 1699.00, 0.00, 'https://zealuxeyeboutique.com/images/product/1732093266_160b8c0751b9376b26bb.jpg', 13700.00, 0.00, 0.00, 0.00, 24, 0, '2024-11-24', 1),
(60, 42, 325, 'Black& rose', '#ff00ff', 45, 0, 1299.00, 1299.00, 'https://zealuxeyeboutique.com/images/product/1732094967_c9a81163f8e9e9601c7a.jpg', 2700.00, 2700.00, 0.00, 0.00, 23, 0, '2024-11-24', 1),
(61, 43, 400, 'BLUE', '#000000', 45, 0, 1699.00, 0.00, '', 2700.00, 0.00, 0.00, 0.00, 27, 0, '2024-11-25', 1),
(62, 53, 429, 'Green and gold', '#b4e34f', 43, 1, 1299.00, 251.32, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1700.00, 328.91, 500.00, 96.74, 0, 0, '2024-11-26', 1),
(63, 53, 427, 'Black', '#000000', 28, 1, 2500.00, 483.69, 'http://localhost/ecommerce/images/product/1731663165_c668d85d30d5ad4af45c.jpg', 1300.00, 251.52, 500.00, 96.74, 0, 0, '2024-11-23', 1),
(64, 54, 429, 'Green and gold', '#b4e34f', 28, 1, 1299.00, 485.07, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1300.00, 485.44, 500.00, 186.71, 0, 0, '2024-11-24', 1),
(65, 54, 426, 'Black', '#0000ff', 44, 1, 2500.00, 933.55, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 2200.00, 821.52, 500.00, 186.71, 0, 0, '2024-11-27', 1),
(68, 56, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 23, 0, '2024-12-02', 1),
(70, 61, 429, 'Green and gold', '#b4e34f', 27, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 900.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-03', 1),
(71, 54, 429, 'Green and gold', '#b4e34f', 28, 1, 1299.00, 330.52, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1300.00, 330.77, 500.00, 127.22, 0, 0, '2024-12-08', 1),
(72, 54, 426, 'Black', '#0000ff', 49, 1, 2500.00, 636.10, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 13700.00, 3485.81, 500.00, 127.22, 0, 0, '2024-12-11', 1),
(76, 63, 429, 'Green and gold', '#b4e34f', 30, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 3900.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-14', 1),
(77, 63, 427, 'Black', '#000000', 43, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731663165_c668d85d30d5ad4af45c.jpg', 1700.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-14', 1),
(78, 64, 429, 'Green and gold', '#b4e34f', 43, 1, 1299.00, 225.02, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1700.00, 294.48, 500.00, 86.61, 0, 0, '2024-12-15', 1),
(79, 64, 426, 'Black', '#0000ff', 49, 1, 2500.00, 433.07, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 13700.00, 2373.20, 500.00, 86.61, 0, 0, '2024-12-15', 1),
(80, 65, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-16', 1),
(81, 65, 426, 'Black', '#0000ff', 48, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 11600.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-16', 1),
(84, 67, 429, 'Green and gold', '#b4e34f', 43, 1, 1299.00, 236.15, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1700.00, 309.05, 500.00, 90.90, 0, 0, '2024-12-16', 1),
(85, 67, 422, 'Black', '#000000', 51, 1, 2500.00, 454.49, 'http://localhost/ecommerce/images/product/1731661481_38653ce2b422bf1ad944.jpg', 10020.00, 1821.59, 500.00, 90.90, 0, 0, '2024-12-16', 1),
(88, 69, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 169.21, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 286.58, 500.00, 65.13, 0, 0, '2024-12-16', 1),
(89, 69, 426, 'Black', '#0000ff', 50, 1, 2500.00, 325.66, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 23700.00, 3087.28, 500.00, 65.13, 0, 0, '2024-12-16', 1),
(90, 70, 429, 'Green and gold', '#b4e34f', 28, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1300.00, 0.00, 500.00, 0.00, 6, 0, '2024-12-15', 0),
(93, 72, 429, 'Green and gold', '#b4e34f', 28, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1300.00, 0.00, 500.00, 0.00, 3, 0, '2024-12-17', 0),
(94, 73, 429, 'Green and gold', '#b4e34f', 28, 1, 1299.00, 302.72, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1300.00, 302.95, 500.00, 116.52, 0, 0, '2024-12-18', 0),
(95, 73, 426, 'Black', '#0000ff', 47, 1, 2500.00, 582.60, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 4100.00, 955.47, 500.00, 116.52, 0, 0, '2024-12-18', 0),
(96, 74, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 1, '2024-12-21', 0),
(97, 74, 425, 'Black', '#000000', 43, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731662100_e05e99a7215fa855a858.jpg', 1700.00, 0.00, 500.00, 0.00, 0, 1, '2024-12-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details_history`
--

CREATE TABLE `tbl_sales_details_history` (
  `id` int(11) NOT NULL,
  `salesmaster_history_id` int(11) NOT NULL,
  `sales_masterId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `color_code` text NOT NULL,
  `lensid` int(11) NOT NULL,
  `coating_id` int(11) NOT NULL,
  `product_rate` decimal(18,2) NOT NULL,
  `product_discount` decimal(18,2) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `lens_rate` decimal(18,2) NOT NULL,
  `lens_discount` decimal(18,2) NOT NULL,
  `coating_rate` decimal(18,2) NOT NULL,
  `coating_discount` decimal(18,2) NOT NULL,
  `eyetest_id` int(11) NOT NULL,
  `return_status` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sales_details_history`
--

INSERT INTO `tbl_sales_details_history` (`id`, `salesmaster_history_id`, `sales_masterId`, `pid`, `color_name`, `color_code`, `lensid`, `coating_id`, `product_rate`, `product_discount`, `product_image`, `lens_rate`, `lens_discount`, `coating_rate`, `coating_discount`, `eyetest_id`, `return_status`, `delivery_date`, `store_id`) VALUES
(1, 1, 71, 427, 'Black', '#000000', 29, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731663165_c668d85d30d5ad4af45c.jpg', 3900.00, 0.00, 500.00, 0.00, 3, 0, '2024-12-18', 0),
(2, 1, 71, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-18', 0),
(3, 2, 66, 429, 'Green and gold', '#b4e34f', 43, 1, 1299.00, 236.15, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 1700.00, 309.05, 500.00, 90.90, 0, 0, '2024-12-16', 1),
(4, 2, 66, 422, 'Black', '#000000', 51, 1, 2500.00, 454.49, 'http://localhost/ecommerce/images/product/1731661481_38653ce2b422bf1ad944.jpg', 10020.00, 1821.59, 500.00, 90.90, 0, 0, '2024-12-16', 1),
(5, 3, 62, 424, 'Black', '#000000', 44, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731661770_f22f5f398191854b63cd.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-13', 1),
(6, 3, 62, 429, 'Green and gold', '#b4e34f', 49, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 13700.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-13', 1),
(7, 3, 62, 429, 'Green and gold', '#b4e34f', 44, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-13', 1),
(9, 5, 68, 426, 'Black', '#0000ff', 44, 1, 2500.00, 0.00, 'http://localhost/ecommerce/images/product/1731662666_a047e8c64cc2dd3293da.jpg', 2200.00, 0.00, 500.00, 0.00, 0, 0, '2024-12-16', 1),
(10, 6, 57, 429, 'Green and gold', '#b4e34f', 29, 1, 1299.00, 0.00, 'http://localhost/ecommerce/images/product/1732021520_035d9d9f86c97ca0b92f.jpg', 3900.00, 0.00, 500.00, 0.00, 13, 0, '2024-12-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `size_name` varchar(200) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `size_name`, `store_id`, `CreatedDate`) VALUES
(1, 'XS', 1, '2024-09-18 04:34:54'),
(2, 'S', 1, '2024-09-18 04:35:31'),
(3, 'M', 1, '2024-09-18 04:39:28'),
(4, 'L', 1, '2024-09-18 04:39:32'),
(5, 'XL', 1, '2024-09-18 04:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `voucher_type` varchar(200) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `document_no` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `color` varchar(200) NOT NULL,
  `inward_qty` int(11) NOT NULL,
  `outward_qty` int(11) NOT NULL,
  `purchase_rate` decimal(18,2) NOT NULL,
  `sales_rate` decimal(18,2) NOT NULL,
  `stock_date` date NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `voucher_type`, `voucher_no`, `document_no`, `pid`, `color`, `inward_qty`, `outward_qty`, `purchase_rate`, `sales_rate`, `stock_date`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(3, 'sales', 1, 1, 417, 'White', 0, 1, 0.00, 80.00, '2024-11-11', 1, '2024-11-18 00:50:34', 0),
(4, 'sales', 1, 1, 418, 'White', 0, 1, 0.00, 0.00, '2024-11-11', 1, '2024-11-18 00:50:34', 0),
(5, 'sales', 9, 2, 216, 'BLU&BLAK', 0, 1, 0.00, 1299.00, '2024-11-11', 1, '2024-11-18 00:50:34', 0),
(6, 'sales', 9, 2, 232, 'Grey', 0, 1, 0.00, 1300.00, '2024-11-11', 1, '2024-11-18 00:50:34', 0),
(7, 'sales', 11, 4, 414, 'Transparent', 0, 1, 0.00, 1299.00, '2024-11-13', 1, '2024-11-18 00:50:34', 0),
(8, 'sales', 11, 4, 165, 'Brown', 0, 1, 0.00, 1299.00, '2024-11-13', 1, '2024-11-18 00:50:34', 0),
(9, 'sales', 29, 6, 60, 'Maroon', 0, 1, 0.00, 600.00, '2024-11-16', 1, '2024-11-18 00:50:34', 0),
(10, 'sales', 30, 7, 418, 'White', 0, 1, 0.00, 0.00, '2024-11-18', 1, '2024-11-18 00:50:34', 0),
(11, 'sales', 30, 7, 417, 'White', 0, 1, 0.00, 80.00, '2024-11-18', 1, '2024-11-18 00:50:34', 0),
(12, 'sales', 31, 8, 261, 'RED', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 17:50:32', 0),
(13, 'sales', 31, 8, 336, 'Green', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 17:50:32', 0),
(14, 'sales', 32, 8, 336, 'Green', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 18:02:16', 0),
(15, 'sales', 32, 8, 261, 'RED', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 18:02:16', 0),
(16, 'sales', 33, 8, 261, 'RED', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 18:13:51', 0),
(17, 'sales', 33, 8, 336, 'Green', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 18:13:51', 0),
(18, 'sales', 34, 9, 213, 'Blue Transparent', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 19:33:06', 0),
(19, 'sales', 34, 9, 272, 'Grey', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 19:33:06', 0),
(20, 'sales', 35, 10, 272, 'Grey', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 19:42:52', 0),
(21, 'sales', 35, 10, 213, 'Blue Transparent', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 19:42:52', 0),
(22, 'sales', 36, 11, 336, 'Green', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 20:02:49', 0),
(23, 'sales', 36, 11, 261, 'RED', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 20:02:49', 0),
(24, 'sales', 37, 12, 272, 'Black', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 20:11:10', 0),
(25, 'sales', 37, 12, 213, 'Green&blue', 0, 1, 0.00, 1299.00, '2024-11-18', 1, '2024-11-18 20:11:10', 0),
(26, 'sales', 38, 13, 332, 'Black & blue', 0, 1, 0.00, 1299.00, '2024-11-19', 1, '2024-11-19 17:53:48', 0),
(27, 'sales', 39, 14, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-19', 1, '2024-11-19 19:27:11', 0),
(28, 'sales', 39, 14, 184, 'Black & green', 0, 1, 0.00, 1299.00, '2024-11-19', 1, '2024-11-19 19:27:11', 0),
(29, 'sales', 40, 15, 332, 'Black & blue', 0, 1, 0.00, 1299.00, '2024-11-19', 1, '2024-11-19 19:40:55', 0),
(30, 'sales', 41, 16, 332, 'Black & blue', 0, 1, 0.00, 1299.00, '2024-11-19', 1, '2024-11-19 19:43:42', 0),
(31, 'sales', 42, 17, 345, 'Grey', 0, 1, 0.00, 1699.00, '2024-11-20', 1, '2024-11-20 15:17:36', 0),
(32, 'sales', 42, 17, 325, 'Black& rose', 0, 1, 0.00, 1299.00, '2024-11-20', 1, '2024-11-20 15:17:36', 0),
(33, 'sales', 43, 18, 400, 'BLUE', 0, 1, 0.00, 1699.00, '2024-11-21', 1, '2024-11-21 11:09:30', 0),
(34, 'sales', 44, 19, 427, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 16:44:56', 0),
(35, 'sales', 45, 20, 422, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 16:46:53', 0),
(36, 'sales', 46, 21, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 16:51:53', 0),
(37, 'sales', 47, 22, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-21', 1, '2024-11-21 16:55:45', 0),
(38, 'sales', 48, 23, 423, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 17:02:49', 0),
(39, 'sales', 49, 24, 422, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 17:05:44', 0),
(40, 'sales', 50, 25, 427, 'Black', 0, 1, 0.00, 2500.00, '2024-11-21', 1, '2024-11-21 17:06:54', 0),
(41, 'sales', 51, 26, 402, 'Brown', 0, 1, 0.00, 1299.00, '2024-11-21', 1, '2024-11-21 17:10:17', 0),
(42, 'sales', 52, 27, 428, 'Any', 0, 1, 0.00, 0.00, '2024-11-21', 1, '2024-11-21 17:12:28', 0),
(43, 'sales', 53, 28, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-22', 1, '2024-11-22 14:18:45', 0),
(44, 'sales', 53, 28, 427, 'Black', 0, 1, 0.00, 2500.00, '2024-11-22', 1, '2024-11-22 14:18:45', 0),
(45, 'sales', 54, 29, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-23', 1, '2024-11-23 14:53:02', 0),
(46, 'sales', 54, 29, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-11-23', 1, '2024-11-23 14:53:02', 0),
(49, 'sales', 56, 30, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-28', 1, '2024-11-28 11:35:15', 0),
(52, 'sales', 59, 32, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-29', 1, '2024-11-29 14:50:26', 0),
(53, 'sales', 60, 33, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-29', 1, '2024-11-29 14:54:10', 0),
(54, 'sales', 61, 34, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-11-29', 1, '2024-11-29 14:55:40', 0),
(55, 'return', 54, 29, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-23', 1, '2024-12-07 15:25:21', 0),
(56, 'return', 54, 29, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-23', 1, '2024-12-07 15:25:21', 0),
(57, 'new sales', 54, 35, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-07', 1, '2024-12-07 15:25:21', 0),
(58, 'new sales', 54, 35, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-12-07', 1, '2024-12-07 15:25:21', 0),
(64, 'return', 53, 28, 427, 'Black', 1, 0, 0.00, 2500.00, '2024-11-22', 1, '2024-12-10 10:18:56', 0),
(65, 'return', 53, 28, 427, 'Black', 1, 0, 0.00, 2500.00, '2024-11-22', 1, '2024-12-10 10:19:03', 0),
(66, 'return', 53, 28, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-22', 1, '2024-12-10 13:03:29', 0),
(67, 'return', 53, 28, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-22', 1, '2024-12-10 13:06:09', 0),
(69, 'return', 53, 28, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-22', 1, '2024-12-10 13:14:01', 0),
(70, 'sales', 63, 36, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-10', 1, '2024-12-10 14:24:02', 0),
(71, 'sales', 63, 36, 427, 'Black', 0, 1, 0.00, 2500.00, '2024-12-10', 1, '2024-12-10 14:24:02', 0),
(72, 'return', 63, 36, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-12-10', 1, '2024-12-10 14:27:45', 0),
(73, 'sales', 64, 37, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-11', 1, '2024-12-11 10:41:15', 0),
(74, 'sales', 64, 37, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-12-11', 1, '2024-12-11 10:41:15', 0),
(76, 'return', 56, 30, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-11-28', 1, '2024-12-11 15:39:32', 0),
(77, 'sales', 65, 38, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-12', 1, '2024-12-12 11:10:54', 0),
(78, 'sales', 65, 38, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-12-12', 1, '2024-12-12 11:10:54', 0),
(79, 'return', 65, 38, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-12-12', 1, '2024-12-12 11:11:30', 0),
(82, 'sales', 67, 40, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-12', 1, '2024-12-12 12:05:42', 0),
(83, 'sales', 67, 40, 422, 'Black', 0, 1, 0.00, 2500.00, '2024-12-12', 1, '2024-12-12 12:05:42', 0),
(87, 'new sales', 69, 42, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-12', 1, '2024-12-12 13:38:12', 0),
(88, 'new sales', 69, 42, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-12-12', 1, '2024-12-12 13:38:12', 0),
(89, 'sales', 70, 43, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-14', 0, '2024-12-14 12:35:57', 0),
(92, 'sales', 72, 45, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-16', 0, '2024-12-16 12:13:23', 0),
(93, 'new sales', 73, 46, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-17', 0, '2024-12-17 10:42:16', 0),
(94, 'new sales', 73, 46, 426, 'Black', 0, 1, 0.00, 2500.00, '2024-12-17', 0, '2024-12-17 10:42:16', 0),
(95, 'sales', 74, 47, 429, 'Green and gold', 0, 1, 0.00, 1299.00, '2024-12-17', 0, '2024-12-17 12:10:43', 0),
(96, 'sales', 74, 47, 425, 'Black', 0, 1, 0.00, 2500.00, '2024-12-17', 0, '2024-12-17 12:10:43', 0),
(97, 'return', 74, 47, 429, 'Green and gold', 1, 0, 0.00, 1299.00, '2024-12-17', 0, '2024-12-17 12:39:04', 0),
(98, 'return', 74, 47, 425, 'Black', 1, 0, 0.00, 2500.00, '2024-12-17', 0, '2024-12-17 12:41:46', 0),
(103, 'opening stock', 7, 7, 7, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(104, 'opening stock', 14, 14, 14, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(105, 'opening stock', 15, 15, 15, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(106, 'opening stock', 19, 19, 19, 'Golden', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(107, 'opening stock', 25, 25, 25, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(108, 'opening stock', 28, 28, 28, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(109, 'opening stock', 38, 38, 38, 'Grey-Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(110, 'opening stock', 39, 39, 39, 'Grey-Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(111, 'opening stock', 42, 42, 42, 'Black ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(112, 'opening stock', 226, 226, 226, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(113, 'opening stock', 226, 226, 226, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(114, 'opening stock', 226, 226, 226, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(115, 'opening stock', 259, 259, 259, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(116, 'opening stock', 354, 354, 354, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(117, 'opening stock', 54, 54, 54, 'BLU BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(118, 'opening stock', 67, 67, 67, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(121, 'opening stock', 89, 89, 89, 'RED\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(122, 'opening stock', 89, 89, 89, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(123, 'opening stock', 89, 89, 89, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(124, 'opening stock', 95, 95, 95, 'PURPULE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(125, 'opening stock', 141, 141, 141, 'GUN M\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(126, 'opening stock', 141, 141, 141, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(127, 'opening stock', 141, 141, 141, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(128, 'opening stock', 141, 141, 141, 'GOLD/BRO\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(129, 'opening stock', 172, 172, 172, 'ROSE GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(130, 'opening stock', 56, 56, 56, 'GUN ASH\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(133, 'opening stock', 58, 58, 58, 'ROSE GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(134, 'opening stock', 58, 58, 58, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(135, 'opening stock', 59, 59, 59, 'ROSE GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(136, 'opening stock', 61, 61, 61, 'GREY TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(137, 'opening stock', 61, 61, 61, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(139, 'opening stock', 63, 63, 63, 'BACK WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(140, 'opening stock', 64, 64, 64, 'BLACK RED1\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(142, 'opening stock', 98, 98, 98, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(143, 'opening stock', 100, 100, 100, 'GREY TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(144, 'opening stock', 101, 101, 101, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(145, 'opening stock', 102, 102, 102, 'PIN AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(146, 'opening stock', 103, 103, 103, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(147, 'opening stock', 105, 105, 105, 'LITE GRE TRANS\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(148, 'opening stock', 106, 106, 106, 'LITE BUE TRANS\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(149, 'opening stock', 106, 106, 106, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(150, 'opening stock', 106, 106, 106, 'GREEN AND WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(151, 'opening stock', 106, 106, 106, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(152, 'opening stock', 107, 107, 107, 'TORTOISE &GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(153, 'opening stock', 107, 107, 107, 'MAT BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(154, 'opening stock', 107, 107, 107, 'MAT BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(155, 'opening stock', 118, 118, 118, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(156, 'opening stock', 118, 118, 118, 'DARK GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(157, 'opening stock', 118, 118, 118, 'MATBLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(158, 'opening stock', 119, 119, 119, 'DARK GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(159, 'opening stock', 119, 119, 119, 'GOLDEN PURPLE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(160, 'opening stock', 119, 119, 119, 'GOLDEN PURPLE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(161, 'opening stock', 119, 119, 119, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(162, 'opening stock', 119, 119, 119, 'PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(163, 'opening stock', 119, 119, 119, 'BLACK & WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(164, 'opening stock', 119, 119, 119, 'PURPLE AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(165, 'opening stock', 120, 120, 120, 'BLACK & WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(166, 'opening stock', 121, 121, 121, 'BLACK AND PURPLE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(167, 'opening stock', 121, 121, 121, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(168, 'opening stock', 121, 121, 121, 'GREY AND BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(169, 'opening stock', 125, 125, 125, 'GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(170, 'opening stock', 125, 125, 125, 'MAGENTA\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(171, 'opening stock', 128, 128, 128, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(172, 'opening stock', 159, 159, 159, 'SILVER WITH BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(173, 'opening stock', 159, 159, 159, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(174, 'opening stock', 187, 187, 187, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(175, 'opening stock', 188, 188, 188, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(176, 'opening stock', 188, 188, 188, 'BLACK & WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(177, 'opening stock', 199, 199, 199, 'PINK AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(178, 'opening stock', 208, 208, 208, 'PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(179, 'opening stock', 208, 208, 208, 'WHITE AND PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(180, 'opening stock', 209, 209, 209, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(181, 'opening stock', 210, 210, 210, 'WHITE AND PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(182, 'opening stock', 228, 228, 228, 'LITE PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(183, 'opening stock', 247, 247, 247, 'MAT BLACK&BLU\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(184, 'opening stock', 248, 248, 248, 'GREEN BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(185, 'opening stock', 253, 253, 253, 'RED \"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(186, 'opening stock', 253, 253, 253, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(187, 'opening stock', 260, 260, 260, 'MAGENTA\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(188, 'opening stock', 265, 265, 265, 'SILVER WIH BLACK \"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(189, 'opening stock', 265, 265, 265, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(190, 'opening stock', 266, 266, 266, 'BLU WITH GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(191, 'opening stock', 266, 266, 266, 'BLU WITH GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(192, 'opening stock', 269, 269, 269, 'PINK WITH SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(193, 'opening stock', 269, 269, 269, 'BLU WITH SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(194, 'opening stock', 275, 275, 275, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(195, 'opening stock', 276, 276, 276, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(196, 'opening stock', 276, 276, 276, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(197, 'opening stock', 277, 277, 277, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(198, 'opening stock', 277, 277, 277, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(199, 'opening stock', 280, 280, 280, 'BLACK AND SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(200, 'opening stock', 280, 280, 280, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(201, 'opening stock', 282, 282, 282, 'GREY METAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(202, 'opening stock', 283, 283, 283, 'GREY SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(203, 'opening stock', 283, 283, 283, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(204, 'opening stock', 283, 283, 283, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(205, 'opening stock', 283, 283, 283, 'BLU\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(206, 'opening stock', 284, 284, 284, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(207, 'opening stock', 284, 284, 284, 'MATTE BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(208, 'opening stock', 285, 285, 285, 'GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(209, 'opening stock', 285, 285, 285, 'MATTE BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(210, 'opening stock', 286, 286, 286, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(211, 'opening stock', 286, 286, 286, 'BLACK AND GREN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(212, 'opening stock', 342, 342, 342, 'PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(213, 'opening stock', 342, 342, 342, 'BLU&WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(214, 'opening stock', 344, 344, 344, 'PURPLE AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(215, 'opening stock', 344, 344, 344, 'GREY TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(216, 'opening stock', 344, 344, 344, 'BLU\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(217, 'opening stock', 344, 344, 344, 'BLACK &GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(218, 'opening stock', 344, 344, 344, 'PIN AN BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(219, 'opening stock', 346, 346, 346, 'BLACK &GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(220, 'opening stock', 346, 346, 346, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(221, 'opening stock', 346, 346, 346, 'GREY AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(222, 'opening stock', 346, 346, 346, 'BLACK &GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(223, 'opening stock', 346, 346, 346, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(224, 'opening stock', 347, 347, 347, 'BLACK AND RED\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(225, 'opening stock', 348, 348, 348, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(226, 'opening stock', 349, 349, 349, 'BLUEAND BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(227, 'opening stock', 349, 349, 349, 'BROWN AND GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(228, 'opening stock', 349, 349, 349, 'BLACK AND SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(229, 'opening stock', 350, 350, 350, 'GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(230, 'opening stock', 351, 351, 351, 'GUN AND BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(231, 'opening stock', 88, 88, 88, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(232, 'opening stock', 88, 88, 88, 'BLACK AND PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(233, 'opening stock', 88, 88, 88, 'BLU\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(234, 'opening stock', 88, 88, 88, 'BLACK AND PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(235, 'opening stock', 96, 96, 96, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(236, 'opening stock', 97, 97, 97, 'TRANSPERANT\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(237, 'opening stock', 97, 97, 97, 'TRANSPERANT\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(238, 'opening stock', 129, 129, 129, 'TORTOISE AND WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(239, 'opening stock', 130, 130, 130, 'GREEN TRAN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(240, 'opening stock', 130, 130, 130, 'GREEN TRAN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(241, 'opening stock', 131, 131, 131, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(242, 'opening stock', 131, 131, 131, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(243, 'opening stock', 132, 132, 132, 'MAT BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(244, 'opening stock', 132, 132, 132, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(245, 'opening stock', 132, 132, 132, 'TORTOISE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(246, 'opening stock', 144, 144, 144, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(247, 'opening stock', 146, 146, 146, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(248, 'opening stock', 150, 150, 150, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(249, 'opening stock', 150, 150, 150, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(250, 'opening stock', 151, 151, 151, 'BLE & SILVR\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(251, 'opening stock', 152, 152, 152, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(252, 'opening stock', 153, 153, 153, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(253, 'opening stock', 156, 156, 156, 'BLU SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(254, 'opening stock', 157, 157, 157, 'GUN METAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(255, 'opening stock', 157, 157, 157, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(256, 'opening stock', 158, 158, 158, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(257, 'opening stock', 158, 158, 158, 'BLU SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(258, 'opening stock', 161, 161, 161, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(259, 'opening stock', 162, 162, 162, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(260, 'opening stock', 168, 168, 168, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(261, 'opening stock', 169, 169, 169, 'GREY & BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(262, 'opening stock', 169, 169, 169, 'BLU & BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(263, 'opening stock', 169, 169, 169, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(264, 'opening stock', 171, 171, 171, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(265, 'opening stock', 173, 173, 173, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(266, 'opening stock', 175, 175, 175, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(267, 'opening stock', 191, 191, 191, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(268, 'opening stock', 194, 194, 194, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(269, 'opening stock', 194, 194, 194, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(270, 'opening stock', 194, 194, 194, 'RED&BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(271, 'opening stock', 195, 195, 195, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(272, 'opening stock', 196, 196, 196, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(273, 'opening stock', 197, 197, 197, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(274, 'opening stock', 202, 202, 202, 'LITE BUE TRANS\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(275, 'opening stock', 202, 202, 202, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(276, 'opening stock', 203, 203, 203, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(277, 'opening stock', 204, 204, 204, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(278, 'opening stock', 204, 204, 204, 'BROUN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(279, 'opening stock', 205, 205, 205, 'GREY&BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(280, 'opening stock', 205, 205, 205, 'GREY&BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(281, 'opening stock', 206, 206, 206, 'BLU&BLAK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(282, 'opening stock', 207, 207, 207, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(283, 'opening stock', 214, 214, 214, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(284, 'opening stock', 215, 215, 215, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(285, 'opening stock', 217, 217, 217, 'BLACK&WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(286, 'opening stock', 220, 220, 220, 'MAT GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(287, 'opening stock', 220, 220, 220, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(288, 'opening stock', 223, 223, 223, 'COPPER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(289, 'opening stock', 223, 223, 223, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(290, 'opening stock', 223, 223, 223, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(291, 'opening stock', 224, 224, 224, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(292, 'opening stock', 227, 227, 227, 'SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(293, 'opening stock', 241, 241, 241, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(294, 'opening stock', 242, 242, 242, 'BLACK&WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(295, 'opening stock', 243, 243, 243, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(296, 'opening stock', 250, 250, 250, 'GRE4 &GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(297, 'opening stock', 251, 251, 251, 'BLACK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(298, 'opening stock', 252, 252, 252, 'VIOLET\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(299, 'opening stock', 252, 252, 252, 'PINK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(300, 'opening stock', 257, 257, 257, 'BLACK&RED\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(301, 'opening stock', 257, 257, 257, 'GREY\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(302, 'opening stock', 279, 279, 279, 'GREEN\"', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(303, 'opening stock', 281, 281, 281, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(304, 'opening stock', 289, 289, 289, 'GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(305, 'opening stock', 289, 289, 289, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(306, 'opening stock', 293, 293, 293, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(307, 'opening stock', 294, 294, 294, 'MT BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(308, 'opening stock', 296, 296, 296, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(309, 'opening stock', 297, 297, 297, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(310, 'opening stock', 297, 297, 297, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(311, 'opening stock', 300, 300, 300, 'ROSE GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(312, 'opening stock', 300, 300, 300, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(313, 'opening stock', 305, 305, 305, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(314, 'opening stock', 305, 305, 305, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(315, 'opening stock', 306, 306, 306, 'GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(316, 'opening stock', 307, 307, 307, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(317, 'opening stock', 309, 309, 309, 'GREEN &TORTOISE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(318, 'opening stock', 309, 309, 309, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(319, 'opening stock', 309, 309, 309, 'TORTOISE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(320, 'opening stock', 309, 309, 309, 'TORTOISE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(321, 'opening stock', 310, 310, 310, 'VIOLET\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(322, 'opening stock', 310, 310, 310, 'RED\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(323, 'opening stock', 313, 313, 313, 'BLACK&YELLOW\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(324, 'opening stock', 314, 314, 314, 'BLUE&GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(325, 'opening stock', 315, 315, 315, 'GREEN &PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(326, 'opening stock', 316, 316, 316, 'BLUE&GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(327, 'opening stock', 317, 317, 317, 'GUN METAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(328, 'opening stock', 318, 318, 318, 'MAGENTA\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(329, 'opening stock', 318, 318, 318, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(330, 'opening stock', 319, 319, 319, 'SILVER AND BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(331, 'opening stock', 320, 320, 320, 'SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(332, 'opening stock', 321, 321, 321, 'GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(333, 'opening stock', 321, 321, 321, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(334, 'opening stock', 322, 322, 322, 'ROSE GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(335, 'opening stock', 322, 322, 322, 'GUNMETAL\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(336, 'opening stock', 322, 322, 322, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(337, 'opening stock', 328, 328, 328, 'PINK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(338, 'opening stock', 328, 328, 328, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(339, 'opening stock', 330, 330, 330, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(340, 'opening stock', 333, 333, 333, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(341, 'opening stock', 352, 352, 352, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(342, 'opening stock', 353, 353, 353, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(343, 'opening stock', 356, 356, 356, 'RED\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(344, 'opening stock', 363, 363, 363, 'BLU &BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(345, 'opening stock', 364, 364, 364, 'SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(346, 'opening stock', 387, 387, 387, 'BLU &BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(347, 'opening stock', 388, 388, 388, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(348, 'opening stock', 399, 399, 399, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(349, 'opening stock', 399, 399, 399, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(350, 'opening stock', 400, 400, 400, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(351, 'opening stock', 400, 400, 400, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(352, 'opening stock', 69, 69, 69, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(354, 'opening stock', 72, 72, 72, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(355, 'opening stock', 72, 72, 72, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(356, 'opening stock', 73, 73, 73, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(357, 'opening stock', 73, 73, 73, 'BROWN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(358, 'opening stock', 73, 73, 73, 'WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(359, 'opening stock', 74, 74, 74, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(360, 'opening stock', 75, 75, 75, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(361, 'opening stock', 75, 75, 75, 'MATT BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(362, 'opening stock', 75, 75, 75, 'GREY TRANSPERANT\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(363, 'opening stock', 80, 80, 80, 'BLACK & WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(364, 'opening stock', 80, 80, 80, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(365, 'opening stock', 81, 81, 81, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(366, 'opening stock', 82, 82, 82, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(367, 'opening stock', 83, 83, 83, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(368, 'opening stock', 84, 84, 84, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(369, 'opening stock', 84, 84, 84, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(370, 'opening stock', 84, 84, 84, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(371, 'opening stock', 85, 85, 85, 'WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(372, 'opening stock', 86, 86, 86, 'GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(373, 'opening stock', 87, 87, 87, 'GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(374, 'opening stock', 90, 90, 90, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(375, 'opening stock', 91, 91, 91, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(376, 'opening stock', 92, 92, 92, 'GREEN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(377, 'opening stock', 93, 93, 93, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(378, 'opening stock', 93, 93, 93, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(379, 'opening stock', 94, 94, 94, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(380, 'opening stock', 116, 116, 116, 'MAT BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(381, 'opening stock', 133, 133, 133, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(382, 'opening stock', 134, 134, 134, 'MAT RED&BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(383, 'opening stock', 134, 134, 134, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(384, 'opening stock', 136, 136, 136, 'PINK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(385, 'opening stock', 136, 136, 136, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(386, 'opening stock', 137, 137, 137, 'ROSE GOLD\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(387, 'opening stock', 138, 138, 138, 'VIOLET\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(388, 'opening stock', 138, 138, 138, 'VIOLET\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(389, 'opening stock', 139, 139, 139, 'YELLOW\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(390, 'opening stock', 140, 140, 140, 'BLUE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(391, 'opening stock', 182, 182, 182, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(392, 'opening stock', 231, 231, 231, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(393, 'opening stock', 233, 233, 233, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(394, 'opening stock', 234, 234, 234, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(395, 'opening stock', 235, 235, 235, 'GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(396, 'opening stock', 236, 236, 236, 'GREEN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(397, 'opening stock', 236, 236, 236, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(398, 'opening stock', 236, 236, 236, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(399, 'opening stock', 237, 237, 237, 'GREEN&WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(400, 'opening stock', 238, 238, 238, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(401, 'opening stock', 238, 238, 238, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(402, 'opening stock', 238, 238, 238, 'VIOLET\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(403, 'opening stock', 238, 238, 238, 'BROWN&GOLD\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(404, 'opening stock', 238, 238, 238, 'BLUE&SILVER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(405, 'opening stock', 239, 239, 239, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(406, 'opening stock', 239, 239, 239, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(407, 'opening stock', 256, 256, 256, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(408, 'opening stock', 365, 365, 365, 'RED\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(409, 'opening stock', 365, 365, 365, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(410, 'opening stock', 366, 366, 366, 'VIOLET\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(411, 'opening stock', 368, 368, 368, 'BROWN\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(412, 'opening stock', 368, 368, 368, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(413, 'opening stock', 368, 368, 368, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(414, 'opening stock', 368, 368, 368, 'COPPER\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(415, 'opening stock', 368, 368, 368, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(416, 'opening stock', 370, 370, 370, 'GUNMETAL\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(417, 'opening stock', 371, 371, 371, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(418, 'opening stock', 371, 371, 371, 'GOLDEN&WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(419, 'opening stock', 372, 372, 372, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(420, 'opening stock', 372, 372, 372, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(421, 'opening stock', 373, 373, 373, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(422, 'opening stock', 373, 373, 373, 'WHITE OPPAQ\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(423, 'opening stock', 373, 373, 373, 'GREY\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(424, 'opening stock', 374, 374, 374, 'WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(425, 'opening stock', 375, 375, 375, 'SILVER\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(426, 'opening stock', 377, 377, 377, 'RED\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(427, 'opening stock', 378, 378, 378, 'MAT GREEN\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(428, 'opening stock', 378, 378, 378, 'GREY\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(429, 'opening stock', 378, 378, 378, 'MAT BLACK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(430, 'opening stock', 378, 378, 378, 'GREEN\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(431, 'opening stock', 379, 379, 379, 'BROWN\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(432, 'opening stock', 379, 379, 379, 'GREY\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(433, 'opening stock', 380, 380, 380, 'BLACK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(434, 'opening stock', 380, 380, 380, 'BLACK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(435, 'opening stock', 381, 381, 381, 'GREEN\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(436, 'opening stock', 381, 381, 381, 'BROWN\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(437, 'opening stock', 381, 381, 381, 'MAT BLACK\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(438, 'opening stock', 381, 381, 381, 'MAT BLUE\"', 1, 0, 400.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(439, 'opening stock', 394, 394, 394, 'GREEN\"', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(440, 'opening stock', 397, 397, 397, 'YELLOW\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(441, 'opening stock', 398, 398, 398, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(442, 'opening stock', 383, 383, 383, 'TORTOISE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(443, 'opening stock', 384, 384, 384, 'BROWN AND WHITE\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(444, 'opening stock', 385, 385, 385, 'GREY\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(445, 'opening stock', 385, 385, 385, 'BLACK&GREN\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(446, 'opening stock', 385, 385, 385, 'BLACK\"', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(447, 'opening stock', 404, 404, 404, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(448, 'opening stock', 406, 406, 406, 'BLUE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(449, 'opening stock', 407, 407, 407, 'TORTOISE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(450, 'opening stock', 408, 408, 408, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(451, 'opening stock', 409, 409, 409, 'BLACK\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(452, 'opening stock', 410, 410, 410, 'WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(453, 'opening stock', 410, 410, 410, 'WHITE\"', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(454, 'opening stock', 32, 32, 32, 'Brown-Gold', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(455, 'opening stock', 46, 46, 46, 'Silver-Black', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(456, 'opening stock', 9, 9, 9, 'Black', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(457, 'opening stock', 16, 16, 16, 'Black Silver', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(458, 'opening stock', 41, 41, 41, 'Pink & Grey Lens | Light Pink & Golden Frame', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(459, 'opening stock', 21, 21, 21, 'Black Lens | Matt Black Frame', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(460, 'opening stock', 35, 35, 35, 'Black ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(461, 'opening stock', 20, 20, 20, 'Black Lens | Matt Black Frame', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(462, 'opening stock', 17, 17, 17, 'Black ', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(463, 'opening stock', 23, 23, 23, 'Brown Lens | Brown Frame', 1, 0, 500.00, 1999.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(464, 'opening stock', 51, 51, 51, 'Black', 1, 0, 400.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(465, 'opening stock', 45, 45, 45, 'Grey-Tortoise', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(466, 'opening stock', 24, 24, 24, 'Black Lens | Black Frame', 1, 0, 400.00, 1900.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(467, 'opening stock', 6, 6, 6, 'Transparent', 1, 0, 500.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(468, 'opening stock', 22, 22, 22, 'Black Lens | Matt Black Frame', 1, 0, 400.00, 1999.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1);
INSERT INTO `tbl_stock` (`id`, `voucher_type`, `voucher_no`, `document_no`, `pid`, `color`, `inward_qty`, `outward_qty`, `purchase_rate`, `sales_rate`, `stock_date`, `store_id`, `CreatedDate`, `CreatedUser`) VALUES
(469, 'opening stock', 27, 27, 27, 'Rose Gold', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(470, 'opening stock', 13, 13, 13, 'Shine Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(471, 'opening stock', 30, 30, 30, 'Blue', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(472, 'opening stock', 26, 26, 26, 'Black ', 1, 0, 450.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(473, 'opening stock', 37, 37, 37, 'Green', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(474, 'opening stock', 29, 29, 29, 'Black ', 1, 0, 450.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(475, 'opening stock', 212, 212, 212, 'Blue Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(476, 'opening stock', 147, 147, 147, 'Blue & Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(477, 'opening stock', 147, 147, 147, 'Tortoise', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(478, 'opening stock', 147, 147, 147, 'Blue & black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(479, 'opening stock', 147, 147, 147, 'Grey & Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(480, 'opening stock', 79, 79, 79, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(481, 'opening stock', 143, 143, 143, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(482, 'opening stock', 142, 142, 142, 'TORTOISE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(483, 'opening stock', 142, 142, 142, 'Blue & White', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(484, 'opening stock', 142, 142, 142, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(485, 'opening stock', 142, 142, 142, 'Black & Grey ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(486, 'opening stock', 302, 302, 302, 'GUMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(487, 'opening stock', 149, 149, 149, 'Red', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(488, 'opening stock', 149, 149, 149, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(489, 'opening stock', 405, 405, 405, 'White Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(490, 'opening stock', 267, 267, 267, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(491, 'opening stock', 267, 267, 267, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(492, 'opening stock', 403, 403, 403, 'Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(493, 'opening stock', 304, 304, 304, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(494, 'opening stock', 304, 304, 304, 'Tortoise', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(495, 'opening stock', 304, 304, 304, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(496, 'opening stock', 303, 303, 303, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(497, 'opening stock', 303, 303, 303, 'Brown', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(498, 'opening stock', 278, 278, 278, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(499, 'opening stock', 271, 271, 271, 'Tortoise ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(500, 'opening stock', 268, 268, 268, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(501, 'opening stock', 148, 148, 148, 'GRE&GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(502, 'opening stock', 292, 292, 292, 'Blue ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(503, 'opening stock', 291, 291, 291, 'Green & pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(504, 'opening stock', 109, 109, 109, 'Grey ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(505, 'opening stock', 77, 77, 77, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(506, 'opening stock', 52, 52, 52, 'BLUE ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(507, 'opening stock', 270, 270, 270, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(508, 'opening stock', 270, 270, 270, 'Black & green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(509, 'opening stock', 190, 190, 190, 'Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(510, 'opening stock', 190, 190, 190, 'Brown', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(511, 'opening stock', 415, 415, 415, 'Red', 1, 0, 560.00, 2300.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(512, 'opening stock', 357, 357, 357, 'Red', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(513, 'opening stock', 357, 357, 357, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(514, 'opening stock', 192, 192, 192, 'Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(515, 'opening stock', 192, 192, 192, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(516, 'opening stock', 359, 359, 359, 'Brown & white', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(517, 'opening stock', 361, 361, 361, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(518, 'opening stock', 361, 361, 361, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(519, 'opening stock', 78, 78, 78, 'Grey ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(520, 'opening stock', 78, 78, 78, 'Brown', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(521, 'opening stock', 184, 184, 184, 'Pink Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(522, 'opening stock', 184, 184, 184, 'Black & green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(523, 'opening stock', 184, 184, 184, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(524, 'opening stock', 358, 358, 358, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(525, 'opening stock', 186, 186, 186, 'Black&White', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(526, 'opening stock', 360, 360, 360, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(527, 'opening stock', 391, 391, 391, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(528, 'opening stock', 391, 391, 391, 'PINK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(529, 'opening stock', 110, 110, 110, 'TRANSPERANT', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(530, 'opening stock', 263, 263, 263, 'Tortoise ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(531, 'opening stock', 416, 416, 416, 'Black&Blue', 1, 0, 960.00, 3000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(532, 'opening stock', 417, 417, 417, 'White', 1, 0, 40.00, 80.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(533, 'opening stock', 418, 418, 418, 'White ', 1, 0, 20.00, 0.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(534, 'opening stock', 216, 216, 216, 'BLU&BLAK', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(535, 'opening stock', 232, 232, 232, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(536, 'opening stock', 135, 135, 135, 'Gold', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(537, 'opening stock', 376, 376, 376, 'BLUE & SILVER', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(538, 'opening stock', 287, 287, 287, 'Gunmetal', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(539, 'opening stock', 287, 287, 287, 'Gold', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(540, 'opening stock', 287, 287, 287, 'Silver', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(541, 'opening stock', 218, 218, 218, 'Gunmetal & black', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(542, 'opening stock', 218, 218, 218, 'BLACK & gunmetal ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(543, 'opening stock', 164, 164, 164, 'Gold', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(544, 'opening stock', 219, 219, 219, 'Gold', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(545, 'opening stock', 166, 166, 166, 'Gunmetal', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(546, 'opening stock', 166, 166, 166, '32305', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(547, 'opening stock', 183, 183, 183, 'Gunmetal ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(548, 'opening stock', 183, 183, 183, 'Silver', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(549, 'opening stock', 117, 117, 117, 'Blue', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(550, 'opening stock', 288, 288, 288, 'Blue ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(551, 'opening stock', 288, 288, 288, 'Black', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(552, 'opening stock', 76, 76, 76, 'BLU TRANSPARENT', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(553, 'opening stock', 76, 76, 76, 'Silver ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(554, 'opening stock', 362, 362, 362, 'Brown and Gold', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(555, 'opening stock', 362, 362, 362, 'Red and gunmetal ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(556, 'opening stock', 362, 362, 362, 'Black&silver', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(557, 'opening stock', 308, 308, 308, 'Black', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(558, 'opening stock', 308, 308, 308, 'Silver&blu', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(559, 'opening stock', 308, 308, 308, 'Brown', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(560, 'opening stock', 113, 113, 113, 'GREY&GUNMETAL', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(561, 'opening stock', 112, 112, 112, 'Black&silver', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(562, 'opening stock', 386, 386, 386, 'Gunmetal', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(563, 'opening stock', 401, 401, 401, 'BLUE', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(564, 'opening stock', 170, 170, 170, 'BROWN', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(565, 'opening stock', 11, 11, 11, 'Black silver ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(566, 'opening stock', 414, 414, 414, 'Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(567, 'opening stock', 419, 419, 419, 'Hazel', 1, 0, 475.00, 1700.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(568, 'opening stock', 65, 65, 65, 'Black', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(569, 'opening stock', 104, 104, 104, 'Pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(570, 'opening stock', 249, 249, 249, 'Gunmetal ', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(571, 'opening stock', 50, 50, 50, 'Black ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(572, 'opening stock', 44, 44, 44, 'Black ', 1, 0, 500.00, 1999.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(573, 'opening stock', 36, 36, 36, 'Black ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(574, 'opening stock', 49, 49, 49, 'Black', 1, 0, 400.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(575, 'opening stock', 34, 34, 34, 'Brown', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(576, 'opening stock', 33, 33, 33, 'Black ', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(577, 'opening stock', 40, 40, 40, 'Grey-Black', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(578, 'opening stock', 31, 31, 31, 'Black & Gold,', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(579, 'opening stock', 48, 48, 48, 'Silver black', 1, 0, 500.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(580, 'opening stock', 420, 420, 420, 'Transparent ', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(581, 'opening stock', 420, 420, 420, 'Black', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(582, 'opening stock', 420, 420, 420, 'Grey', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(583, 'opening stock', 43, 43, 43, 'Black ', 1, 0, 450.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(584, 'opening stock', 12, 12, 12, 'Matt Black', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(585, 'opening stock', 421, 421, 421, 'Black', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(586, 'opening stock', 47, 47, 47, 'Gold Black', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(587, 'opening stock', 47, 47, 47, 'Gold', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(588, 'opening stock', 8, 8, 8, 'Black', 1, 0, 400.00, 1800.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(589, 'opening stock', 18, 18, 18, 'Black', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(590, 'opening stock', 18, 18, 18, 'Gunmetal', 1, 0, 500.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(591, 'opening stock', 5, 5, 5, 'Black Lens | Black & Rose Gold Frame', 1, 0, 400.00, 1999.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(592, 'opening stock', 10, 10, 10, 'Blue', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(593, 'opening stock', 10, 10, 10, 'Gold &brown', 1, 0, 400.00, 2000.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(594, 'opening stock', 422, 422, 422, 'Black', 1, 0, 650.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(595, 'opening stock', 423, 423, 423, 'Black', 1, 0, 649.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(596, 'opening stock', 424, 424, 424, 'Black ', 1, 0, 560.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(597, 'opening stock', 425, 425, 425, 'Black ', 1, 0, 400.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(598, 'opening stock', 426, 426, 426, 'Black', 1, 0, 500.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(599, 'opening stock', 427, 427, 427, 'Black', 1, 0, 500.00, 2500.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(600, 'opening stock', 335, 335, 335, 'Black and White', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(601, 'opening stock', 211, 211, 211, 'Matte Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(602, 'opening stock', 211, 211, 211, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(603, 'opening stock', 389, 389, 389, 'Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(604, 'opening stock', 389, 389, 389, 'Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(605, 'opening stock', 332, 332, 332, 'Black & blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(606, 'opening stock', 123, 123, 123, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(607, 'opening stock', 123, 123, 123, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(608, 'opening stock', 402, 402, 402, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(609, 'opening stock', 402, 402, 402, 'Tortoise ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(610, 'opening stock', 124, 124, 124, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(611, 'opening stock', 124, 124, 124, 'Blue ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(612, 'opening stock', 122, 122, 122, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(613, 'opening stock', 324, 324, 324, 'Violet transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(614, 'opening stock', 343, 343, 343, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(615, 'opening stock', 326, 326, 326, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(616, 'opening stock', 326, 326, 326, 'Black and purple ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(617, 'opening stock', 155, 155, 155, 'White transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(618, 'opening stock', 154, 154, 154, 'Black & white', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(619, 'opening stock', 273, 273, 273, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(620, 'opening stock', 273, 273, 273, 'Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(621, 'opening stock', 273, 273, 273, 'Tortoise', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(622, 'opening stock', 145, 145, 145, 'Black & white', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(623, 'opening stock', 145, 145, 145, 'BLACK & tortoise ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(624, 'opening stock', 367, 367, 367, 'Pink Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(625, 'opening stock', 393, 393, 393, 'GREEN ', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(626, 'opening stock', 395, 395, 395, 'Grey', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(627, 'opening stock', 396, 396, 396, 'GREY', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(628, 'opening stock', 99, 99, 99, 'Blue Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(629, 'opening stock', 99, 99, 99, 'Purple ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(630, 'opening stock', 262, 262, 262, 'Mixed', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(631, 'opening stock', 262, 262, 262, 'GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(632, 'opening stock', 392, 392, 392, 'Blue', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(633, 'opening stock', 174, 174, 174, 'Tortoise ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(634, 'opening stock', 295, 295, 295, 'Blue & white', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(635, 'opening stock', 179, 179, 179, 'Violet ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(636, 'opening stock', 341, 341, 341, 'BLUE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(637, 'opening stock', 108, 108, 108, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(638, 'opening stock', 70, 70, 70, 'Green ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(639, 'opening stock', 114, 114, 114, 'Red', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(640, 'opening stock', 114, 114, 114, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(641, 'opening stock', 114, 114, 114, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(642, 'opening stock', 114, 114, 114, 'Grey & Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(643, 'opening stock', 114, 114, 114, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(644, 'opening stock', 115, 115, 115, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(645, 'opening stock', 290, 290, 290, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(646, 'opening stock', 127, 127, 127, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(647, 'opening stock', 111, 111, 111, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(648, 'opening stock', 111, 111, 111, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(649, 'opening stock', 340, 340, 340, 'Green& WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(650, 'opening stock', 126, 126, 126, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(651, 'opening stock', 244, 244, 244, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(652, 'opening stock', 264, 264, 264, 'BROWN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(653, 'opening stock', 240, 240, 240, 'Black& maroon ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(654, 'opening stock', 258, 258, 258, 'Black &red', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(655, 'opening stock', 254, 254, 254, 'GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(656, 'opening stock', 301, 301, 301, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(657, 'opening stock', 163, 163, 163, 'GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(658, 'opening stock', 165, 165, 165, 'Brown', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(659, 'opening stock', 165, 165, 165, 'Black and red', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(660, 'opening stock', 189, 189, 189, 'LITE BUE TRANSPARENT ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(661, 'opening stock', 189, 189, 189, 'Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(662, 'opening stock', 189, 189, 189, 'BLACK AND WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(663, 'opening stock', 261, 261, 261, 'RED', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(664, 'opening stock', 176, 176, 176, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(665, 'opening stock', 193, 193, 193, 'Green transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(666, 'opening stock', 299, 299, 299, 'Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(667, 'opening stock', 339, 339, 339, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(668, 'opening stock', 334, 334, 334, 'GOLD', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(669, 'opening stock', 55, 55, 55, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(670, 'opening stock', 180, 180, 180, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(671, 'opening stock', 180, 180, 180, 'Black and white ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(672, 'opening stock', 245, 245, 245, 'WHITE OPPAQ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(673, 'opening stock', 355, 355, 355, 'ROSE GOLD', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(674, 'opening stock', 355, 355, 355, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(675, 'opening stock', 160, 160, 160, 'Red& black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(676, 'opening stock', 312, 312, 312, 'BROWN& black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(677, 'opening stock', 312, 312, 312, 'YELLOW', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(678, 'opening stock', 230, 230, 230, 'RED', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(679, 'opening stock', 221, 221, 221, 'Brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(680, 'opening stock', 221, 221, 221, 'BLACK&WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(681, 'opening stock', 221, 221, 221, 'WHITE TRANSPERANT', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(682, 'opening stock', 201, 201, 201, 'GREY', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(683, 'opening stock', 274, 274, 274, 'Violet ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(684, 'opening stock', 274, 274, 274, 'SILVER', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(685, 'opening stock', 229, 229, 229, 'Blue ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(686, 'opening stock', 222, 222, 222, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(687, 'opening stock', 222, 222, 222, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(688, 'opening stock', 178, 178, 178, 'Semi Transparent pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(689, 'opening stock', 198, 198, 198, 'BLACK ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(690, 'opening stock', 198, 198, 198, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(691, 'opening stock', 198, 198, 198, 'Black and brown ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(692, 'opening stock', 198, 198, 198, 'Black and white ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(693, 'opening stock', 53, 53, 53, 'Green', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(694, 'opening stock', 53, 53, 53, 'Semi transparent pink& white ', 1, 0, 400.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(695, 'opening stock', 327, 327, 327, 'Semi transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(696, 'opening stock', 327, 327, 327, 'MAT BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(697, 'opening stock', 327, 327, 327, 'BLACK&WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(698, 'opening stock', 327, 327, 327, 'SILVER', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(699, 'opening stock', 327, 327, 327, 'GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(700, 'opening stock', 200, 200, 200, 'BLUE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(701, 'opening stock', 200, 200, 200, 'GREEN AND WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(702, 'opening stock', 200, 200, 200, 'Semi transparent blue ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(703, 'opening stock', 200, 200, 200, 'BLACK', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(704, 'opening stock', 200, 200, 200, 'LITE BUE TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(705, 'opening stock', 225, 225, 225, 'GUNMETAL', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(706, 'opening stock', 225, 225, 225, 'Semi transparent pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(707, 'opening stock', 225, 225, 225, 'Semi transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(708, 'opening stock', 177, 177, 177, 'BLACK& red ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(709, 'opening stock', 246, 246, 246, 'MAT BLUE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(710, 'opening stock', 413, 413, 413, 'Semi transparent pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(711, 'opening stock', 413, 413, 413, 'Semi transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(712, 'opening stock', 413, 413, 413, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(713, 'opening stock', 413, 413, 413, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(714, 'opening stock', 413, 413, 413, 'GREEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(715, 'opening stock', 413, 413, 413, 'WHITE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(716, 'opening stock', 311, 311, 311, 'Pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(717, 'opening stock', 311, 311, 311, 'BLUE', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(718, 'opening stock', 412, 412, 412, 'Blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(719, 'opening stock', 411, 411, 411, 'Black', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(720, 'opening stock', 411, 411, 411, 'Pink', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(721, 'opening stock', 60, 60, 60, 'Maroon', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(722, 'opening stock', 60, 60, 60, 'GUN TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(723, 'opening stock', 60, 60, 60, 'BLU WHITE TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(724, 'opening stock', 60, 60, 60, 'GRE GOLD', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(725, 'opening stock', 60, 60, 60, 'BLU WHITE TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(726, 'opening stock', 60, 60, 60, 'WHITE GREY TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(727, 'opening stock', 60, 60, 60, 'GREY TRANS', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(728, 'opening stock', 60, 60, 60, 'MAGENTA GRADIEN', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(729, 'opening stock', 428, 428, 428, 'Any', 1, 0, 0.00, 0.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(730, 'opening stock', 336, 336, 336, 'Green', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(731, 'opening stock', 272, 272, 272, 'Grey', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(732, 'opening stock', 272, 272, 272, 'Black ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(733, 'opening stock', 272, 272, 272, 'Tortoise', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(734, 'opening stock', 213, 213, 213, 'Blue Transparent ', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(735, 'opening stock', 213, 213, 213, 'Green&blue', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(736, 'opening stock', 345, 345, 345, 'Grey', 1, 0, 560.00, 1699.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(737, 'opening stock', 325, 325, 325, 'Black& rose', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(738, 'opening stock', 429, 429, 429, 'Green and gold', 1, 0, 560.00, 1299.00, '2024-12-17', 1, '2024-12-17 16:03:40', 1),
(739, 'opening stock', 431, 431, 431, 'Black', 1, 0, 2300.00, 2600.00, '2024-12-18', 1, '2024-12-18 12:12:07', 1),
(740, 'opening stock', 431, 431, 431, 'Green', 2, 0, 2300.00, 2600.00, '2024-12-18', 1, '2024-12-18 12:12:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upi`
--

CREATE TABLE `tbl_upi` (
  `id` int(11) NOT NULL,
  `upi` text NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_upi`
--

INSERT INTO `tbl_upi` (`id`, `upi`, `name`) VALUES
(1, 'ziyadh0114@oksbi', 'Ziyadh Ziyah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warrenty_card`
--

CREATE TABLE `tbl_warrenty_card` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `decsription` text NOT NULL,
  `features` text NOT NULL,
  `sales_rate` decimal(18,2) NOT NULL,
  `price_from` decimal(18,2) NOT NULL,
  `price_to` decimal(18,2) NOT NULL,
  `store_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_warrenty_card`
--

INSERT INTO `tbl_warrenty_card` (`id`, `name`, `decsription`, `features`, `sales_rate`, `price_from`, `price_to`, `store_id`, `CreatedDate`) VALUES
(1, '1 Year Warrenty', '', '', 100.00, 0.00, 2000.00, 1, NULL),
(2, '1 Year Warrenty - A                                                      ', '', '', 500.00, 2001.00, 5000.00, 1, NULL),
(3, 'Test', 'sdfdf', 'one | two | three | four', 1000.00, 5001.00, 10000.00, 1, '2024-12-16 03:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `test_prices`
--

CREATE TABLE `test_prices` (
  `id` int(11) NOT NULL,
  `pid` text NOT NULL,
  `mrp` decimal(18,2) NOT NULL,
  `srp` decimal(18,2) NOT NULL,
  `wrp` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_prices`
--

INSERT INTO `test_prices` (`id`, `pid`, `mrp`, `srp`, `wrp`) VALUES
(1, '10', 2000.00, 1699.00, 560.00),
(2, '1010', 1599.00, 1299.00, 560.00),
(3, '1021', 1599.00, 1299.00, 560.00),
(4, '1022', 1599.00, 1299.00, 560.00),
(5, '1023', 1599.00, 1299.00, 560.00),
(6, '1025', 1599.00, 1299.00, 560.00),
(7, '1026', 1599.00, 1299.00, 560.00),
(8, '1029', 1599.00, 1299.00, 560.00),
(9, '1032', 2000.00, 1699.00, 560.00),
(10, '1033', 2000.00, 1699.00, 560.00),
(11, '1034', 2000.00, 1699.00, 560.00),
(12, '1036', 2000.00, 1699.00, 560.00),
(13, '1038', 2000.00, 1699.00, 560.00),
(14, '11', 2000.00, 1699.00, 560.00),
(15, '12', 2000.00, 1699.00, 560.00),
(16, '121905', 1599.00, 1299.00, 560.00),
(17, '121910', 1599.00, 1299.00, 560.00),
(18, '125338', 2000.00, 1699.00, 560.00),
(19, '129811', 2000.00, 1699.00, 560.00),
(20, '129813', 2000.00, 1699.00, 560.00),
(21, '129815', 2000.00, 1699.00, 560.00),
(22, '129816', 2000.00, 1699.00, 560.00),
(23, '129820', 2000.00, 1699.00, 560.00),
(24, '13005', 1599.00, 1299.00, 560.00),
(25, '13008', 1599.00, 1299.00, 560.00),
(26, '13010', 1599.00, 1299.00, 560.00),
(27, '131201', 2000.00, 1699.00, 560.00),
(28, '131203', 2000.00, 1699.00, 560.00),
(29, '131204', 2000.00, 1699.00, 560.00),
(30, '131206', 2000.00, 1699.00, 560.00),
(31, '131207', 2000.00, 1699.00, 560.00),
(32, '131210', 2000.00, 1699.00, 560.00),
(33, '131505', 1599.00, 1299.00, 560.00),
(34, '131512', 1599.00, 1299.00, 560.00),
(35, '14135', 1599.00, 1299.00, 560.00),
(36, '15', 1599.00, 1299.00, 560.00),
(37, '15', 2000.00, 1699.00, 560.00),
(38, '156601', 2000.00, 1699.00, 560.00),
(39, '156602', 2000.00, 1699.00, 560.00),
(40, '156603', 2000.00, 1699.00, 560.00),
(41, '156607', 2000.00, 1699.00, 560.00),
(42, '156609', 2000.00, 1699.00, 560.00),
(43, '18', 2000.00, 1699.00, 560.00),
(44, '18901', 2000.00, 1699.00, 560.00),
(45, '18910', 2000.00, 1699.00, 560.00),
(46, '1903', 1599.00, 1299.00, 560.00),
(47, '1904', 1599.00, 1299.00, 560.00),
(48, '1908', 1599.00, 1299.00, 560.00),
(49, '1918', 2000.00, 1699.00, 560.00),
(50, '2001', 1599.00, 1299.00, 560.00),
(51, '2002', 2000.00, 1699.00, 560.00),
(52, '2003', 1599.00, 1299.00, 560.00),
(53, '2003', 2000.00, 1699.00, 560.00),
(54, '2004', 2000.00, 1699.00, 560.00),
(55, '2005', 2000.00, 1699.00, 560.00),
(56, '2006', 2000.00, 1699.00, 560.00),
(57, '2008', 1599.00, 1299.00, 560.00),
(58, '2014', 1599.00, 1299.00, 560.00),
(59, '20224', 1599.00, 1299.00, 560.00),
(60, '202433', 1599.00, 1299.00, 560.00),
(61, '202433', 2000.00, 1699.00, 560.00),
(62, '202434', 2000.00, 1699.00, 560.00),
(63, '202435', 2000.00, 1699.00, 560.00),
(64, '202436', 1599.00, 1299.00, 560.00),
(65, '202439', 1599.00, 1299.00, 560.00),
(66, '202440', 1599.00, 1299.00, 560.00),
(67, '2046', 2000.00, 1699.00, 560.00),
(68, '2084', 1599.00, 1299.00, 560.00),
(69, '2085', 1599.00, 1299.00, 560.00),
(70, '2086', 1599.00, 1299.00, 560.00),
(71, '2090', 1599.00, 1299.00, 560.00),
(72, '2301', 1599.00, 1299.00, 560.00),
(73, '2305', 1599.00, 1299.00, 560.00),
(74, '2307', 1599.00, 1299.00, 560.00),
(75, '2311', 2000.00, 1699.00, 560.00),
(76, '231203', 1599.00, 1299.00, 560.00),
(77, '231205', 1599.00, 1299.00, 560.00),
(78, '2328', 2000.00, 1699.00, 560.00),
(79, '23703', 1599.00, 1299.00, 560.00),
(80, '23705', 1599.00, 1299.00, 560.00),
(81, '23707', 1599.00, 1299.00, 560.00),
(82, '23710', 1599.00, 1299.00, 560.00),
(83, '245630', 2000.00, 1699.00, 560.00),
(84, '245632', 2000.00, 1699.00, 560.00),
(85, '245634', 2000.00, 1699.00, 560.00),
(86, '248803', 2000.00, 1699.00, 560.00),
(87, '248804', 2000.00, 1699.00, 560.00),
(88, '248808', 2000.00, 1699.00, 560.00),
(89, '248809', 2000.00, 1699.00, 560.00),
(90, '248810', 2000.00, 1699.00, 560.00),
(91, '26', 2000.00, 1699.00, 560.00),
(92, '27001', 1599.00, 1299.00, 560.00),
(93, '27002', 1599.00, 1299.00, 560.00),
(94, '27003', 1599.00, 1299.00, 560.00),
(95, '27004', 1599.00, 1299.00, 560.00),
(96, '27005', 1599.00, 1299.00, 560.00),
(97, '27007', 1599.00, 1299.00, 560.00),
(98, '28807', 1599.00, 1299.00, 560.00),
(99, '28808', 1599.00, 1299.00, 560.00),
(100, '30001', 2000.00, 1699.00, 560.00),
(101, '30003', 2000.00, 1699.00, 560.00),
(102, '30004', 2000.00, 1699.00, 560.00),
(103, '30008', 2000.00, 1699.00, 560.00),
(104, '300670', 1599.00, 1299.00, 560.00),
(105, '300683', 1599.00, 1299.00, 560.00),
(106, '31001', 2000.00, 1699.00, 560.00),
(107, '31002', 2000.00, 1699.00, 560.00),
(108, '31007', 2000.00, 1699.00, 560.00),
(109, '3132', 2000.00, 1699.00, 560.00),
(110, '32002', 1599.00, 1299.00, 560.00),
(111, '32003', 1599.00, 1299.00, 560.00),
(112, '32004', 1599.00, 1299.00, 560.00),
(113, '32010', 1599.00, 1299.00, 560.00),
(114, '32301', 2000.00, 1699.00, 560.00),
(115, '32304', 1599.00, 1299.00, 560.00),
(116, '32305', 1599.00, 1299.00, 560.00),
(117, '32305', 2000.00, 1699.00, 560.00),
(118, '32307', 1599.00, 1299.00, 560.00),
(119, '32308', 1599.00, 1299.00, 560.00),
(120, '32308', 2000.00, 1699.00, 560.00),
(121, '32309', 2000.00, 1699.00, 560.00),
(122, '35091', 2000.00, 1699.00, 560.00),
(123, '37', 2000.00, 1699.00, 560.00),
(124, '37002', 1599.00, 1299.00, 560.00),
(125, '37004', 1599.00, 1299.00, 560.00),
(126, '37005', 1599.00, 1299.00, 560.00),
(127, '37007', 1599.00, 1299.00, 560.00),
(128, '39102', 1599.00, 1299.00, 560.00),
(129, '39104', 1599.00, 1299.00, 560.00),
(130, '434002', 1599.00, 1299.00, 560.00),
(131, '434006', 1599.00, 1299.00, 560.00),
(132, '434007', 1599.00, 1299.00, 560.00),
(133, '4511', 2000.00, 1699.00, 560.00),
(134, '48001', 1599.00, 1299.00, 560.00),
(135, '48010', 1599.00, 1299.00, 560.00),
(136, '5011', 1599.00, 1299.00, 560.00),
(137, '5012', 1599.00, 1299.00, 560.00),
(138, '5016', 1599.00, 1299.00, 560.00),
(139, '50502', 1599.00, 1299.00, 560.00),
(140, '50506', 1599.00, 1299.00, 560.00),
(141, '50508', 1599.00, 1299.00, 560.00),
(142, '50509', 1599.00, 1299.00, 560.00),
(143, '51018', 2000.00, 1699.00, 560.00),
(144, '51032', 2000.00, 1699.00, 560.00),
(145, '51087', 1599.00, 1299.00, 560.00),
(146, '51088', 1599.00, 1299.00, 560.00),
(147, '5210', 1599.00, 1299.00, 560.00),
(148, '5217', 1599.00, 1299.00, 560.00),
(149, '5221', 1599.00, 1299.00, 560.00),
(150, '5228', 1599.00, 1299.00, 560.00),
(151, '53201', 1599.00, 1299.00, 560.00),
(152, '53204', 1599.00, 1299.00, 560.00),
(153, '53206', 1599.00, 1299.00, 560.00),
(154, '53207', 1599.00, 1299.00, 560.00),
(155, '53209', 1599.00, 1299.00, 560.00),
(156, '53210', 1599.00, 1299.00, 560.00),
(157, '5521', 1599.00, 1299.00, 560.00),
(158, '5523', 1599.00, 1299.00, 560.00),
(159, '5528', 1599.00, 1299.00, 560.00),
(160, '56002', 1599.00, 1299.00, 560.00),
(161, '56003', 1599.00, 1299.00, 560.00),
(162, '56007', 1599.00, 1299.00, 560.00),
(163, '56801', 2000.00, 1699.00, 560.00),
(164, '56802', 2000.00, 1699.00, 560.00),
(165, '56803', 2000.00, 1699.00, 560.00),
(166, '56805', 2000.00, 1699.00, 560.00),
(167, '56808', 2000.00, 1699.00, 560.00),
(168, '56809', 1599.00, 1299.00, 560.00),
(169, '56809', 2000.00, 1699.00, 560.00),
(170, '56810', 2000.00, 1699.00, 560.00),
(171, '58001', 1599.00, 1299.00, 560.00),
(172, '58002', 1599.00, 1299.00, 560.00),
(173, '58007', 1599.00, 1299.00, 560.00),
(174, '58011', 1599.00, 1299.00, 560.00),
(175, '58012', 1599.00, 1299.00, 560.00),
(176, '6', 2000.00, 1699.00, 560.00),
(177, '60105', 2000.00, 1699.00, 560.00),
(178, '6030', 1599.00, 1299.00, 560.00),
(179, '6036', 1599.00, 1299.00, 560.00),
(180, '6040', 1599.00, 1299.00, 560.00),
(181, '611103', 1599.00, 1299.00, 560.00),
(182, '611104', 1599.00, 1299.00, 560.00),
(183, '611105', 1599.00, 1299.00, 560.00),
(184, '611106', 1599.00, 1299.00, 560.00),
(185, '611107', 1599.00, 1299.00, 560.00),
(186, '611108', 1599.00, 1299.00, 560.00),
(187, '611109', 1599.00, 1299.00, 560.00),
(188, '611110', 1599.00, 1299.00, 560.00),
(189, '611140', 1599.00, 1299.00, 560.00),
(190, '620906', 1599.00, 1299.00, 560.00),
(191, '62101', 1599.00, 1299.00, 560.00),
(192, '62102', 1599.00, 1299.00, 560.00),
(193, '62108', 1599.00, 1299.00, 560.00),
(194, '624010', 1599.00, 1299.00, 560.00),
(195, '6606', 1599.00, 1299.00, 560.00),
(196, '6608', 1599.00, 1299.00, 560.00),
(197, '6611', 1599.00, 1299.00, 560.00),
(198, '6613', 1599.00, 1299.00, 560.00),
(199, '66661', 2000.00, 1699.00, 560.00),
(200, '66664', 2000.00, 1699.00, 560.00),
(201, '66666', 2000.00, 1699.00, 560.00),
(202, '66675', 2000.00, 1699.00, 560.00),
(203, '6807', 1599.00, 1299.00, 560.00),
(204, '692803', 1599.00, 1299.00, 560.00),
(205, '692807', 1599.00, 1299.00, 560.00),
(206, '692809', 1599.00, 1299.00, 560.00),
(207, '69601', 2000.00, 1699.00, 560.00),
(208, '69710', 1599.00, 1299.00, 560.00),
(209, '7', 2000.00, 1699.00, 560.00),
(210, '7021', 1599.00, 1299.00, 560.00),
(211, '7050', 1599.00, 1299.00, 560.00),
(212, '7053', 1599.00, 1299.00, 560.00),
(213, '707', 1599.00, 1299.00, 560.00),
(214, '7070', 1599.00, 1299.00, 560.00),
(215, '8003', 2000.00, 1699.00, 560.00),
(216, '8010', 2000.00, 1699.00, 560.00),
(217, '80152', 1599.00, 1299.00, 560.00),
(218, '80156', 1599.00, 1299.00, 560.00),
(219, '8016', 1599.00, 1299.00, 560.00),
(220, '8017', 1599.00, 1299.00, 560.00),
(221, '80172', 1599.00, 1299.00, 560.00),
(222, '80174', 1599.00, 1299.00, 560.00),
(223, '8018', 1599.00, 1299.00, 560.00),
(224, '8019', 1599.00, 1299.00, 560.00),
(225, '8030', 1599.00, 1299.00, 560.00),
(226, '8036', 1599.00, 1299.00, 560.00),
(227, '8037', 1599.00, 1299.00, 560.00),
(228, '8050', 1599.00, 1299.00, 560.00),
(229, '80807', 1599.00, 1299.00, 560.00),
(230, '8081', 2000.00, 1699.00, 560.00),
(231, '80811', 1599.00, 1299.00, 560.00),
(232, '8085', 2000.00, 1699.00, 560.00),
(233, '8086', 2000.00, 1699.00, 560.00),
(234, '8087', 2000.00, 1699.00, 560.00),
(235, '8088', 2000.00, 1699.00, 560.00),
(236, '8089', 2000.00, 1699.00, 560.00),
(237, '8090', 2000.00, 1699.00, 560.00),
(238, '8091', 2000.00, 1699.00, 560.00),
(239, '81002', 1599.00, 1299.00, 560.00),
(240, '81003', 1599.00, 1299.00, 560.00),
(241, '81009', 1599.00, 1299.00, 560.00),
(242, '81013', 1599.00, 1299.00, 560.00),
(243, '81102', 1599.00, 1299.00, 560.00),
(244, '81104', 1599.00, 1299.00, 560.00),
(245, '81105', 1599.00, 1299.00, 560.00),
(246, '81106', 1599.00, 1299.00, 560.00),
(247, '81107', 1599.00, 1299.00, 560.00),
(248, '81110', 1599.00, 1299.00, 560.00),
(249, '81807', 1599.00, 1299.00, 560.00),
(250, '821809', 1599.00, 1299.00, 560.00),
(251, '82227', 1599.00, 1299.00, 560.00),
(252, '82230', 1599.00, 1299.00, 560.00),
(253, '82231', 1599.00, 1299.00, 560.00),
(254, '82503', 2000.00, 1699.00, 560.00),
(255, '82505', 2000.00, 1699.00, 560.00),
(256, '82509', 2000.00, 1699.00, 560.00),
(257, '82510', 2000.00, 1699.00, 560.00),
(258, '82805', 1599.00, 1299.00, 560.00),
(259, '82809', 1599.00, 1299.00, 560.00),
(260, '82812', 1599.00, 1299.00, 560.00),
(261, '82813', 1599.00, 1299.00, 560.00),
(262, '82818', 1599.00, 1299.00, 560.00),
(263, '83521', 2000.00, 1699.00, 560.00),
(264, '83525', 2000.00, 1699.00, 560.00),
(265, '83612', 2000.00, 1699.00, 560.00),
(266, '83614', 2000.00, 1699.00, 560.00),
(267, '83615', 2000.00, 1699.00, 560.00),
(268, '83616', 2000.00, 1699.00, 560.00),
(269, '83620', 2000.00, 1699.00, 560.00),
(270, '83626', 2000.00, 1699.00, 560.00),
(271, '83628', 2000.00, 1699.00, 560.00),
(272, '83806', 1599.00, 1299.00, 560.00),
(273, '83807', 1599.00, 1299.00, 560.00),
(274, '83809', 1599.00, 1299.00, 560.00),
(275, '85001', 1599.00, 1299.00, 560.00),
(276, '85008', 1599.00, 1299.00, 560.00),
(277, '85010', 1599.00, 1299.00, 560.00),
(278, '860028', 1599.00, 1299.00, 560.00),
(279, '86509', 1599.00, 1299.00, 560.00),
(280, '86815', 1599.00, 1299.00, 560.00),
(281, '87001', 1599.00, 1299.00, 560.00),
(282, '87002', 1599.00, 1299.00, 560.00),
(283, '87004', 1599.00, 1299.00, 560.00),
(284, '87008', 1599.00, 1299.00, 560.00),
(285, '87703', 1599.00, 1299.00, 560.00),
(286, '88002', 1599.00, 1299.00, 560.00),
(287, '8801', 1599.00, 1299.00, 560.00),
(288, '88010', 1599.00, 1299.00, 560.00),
(289, '8802', 1599.00, 1299.00, 560.00),
(290, '8802', 2000.00, 1699.00, 560.00),
(291, '8803', 1599.00, 1299.00, 560.00),
(292, '8803', 2000.00, 1699.00, 560.00),
(293, '8804', 1599.00, 1299.00, 560.00),
(294, '8804', 2000.00, 1699.00, 560.00),
(295, '8808', 2000.00, 1699.00, 560.00),
(296, '8809', 2000.00, 1699.00, 560.00),
(297, '8821', 1599.00, 1299.00, 560.00),
(298, '8822', 1599.00, 1299.00, 560.00),
(299, '8828', 1599.00, 1299.00, 560.00),
(300, '88804', 2000.00, 1699.00, 560.00),
(301, '88810', 2000.00, 1699.00, 560.00),
(302, '9', 2000.00, 1699.00, 560.00),
(303, '905', 1599.00, 1299.00, 560.00),
(304, '90902', 1599.00, 1299.00, 560.00),
(305, '90903', 1599.00, 1299.00, 560.00),
(306, '90904', 1599.00, 1299.00, 560.00),
(307, '90906', 1599.00, 1299.00, 560.00),
(308, '90907', 1599.00, 1299.00, 560.00),
(309, '90910', 1599.00, 1299.00, 560.00),
(310, '920208', 2000.00, 1699.00, 560.00),
(311, '92219', 2000.00, 1699.00, 560.00),
(312, '92308', 1599.00, 1299.00, 560.00),
(313, '923201', 1599.00, 1299.00, 560.00),
(314, '923204', 1599.00, 1299.00, 560.00),
(315, '923208', 1599.00, 1299.00, 560.00),
(316, '923305', 1599.00, 1299.00, 560.00),
(317, '923306', 1599.00, 1299.00, 560.00),
(318, '923307', 1599.00, 1299.00, 560.00),
(319, '923310', 1599.00, 1299.00, 560.00),
(320, '926209', 1599.00, 1299.00, 560.00),
(321, '928103', 2000.00, 1699.00, 560.00),
(322, '928106', 2000.00, 1699.00, 560.00),
(323, '928107', 2000.00, 1699.00, 560.00),
(324, '930104', 2000.00, 1699.00, 560.00),
(325, '930105', 2000.00, 1699.00, 560.00),
(326, '930108', 2000.00, 1699.00, 560.00),
(327, '930109', 2000.00, 1699.00, 560.00),
(328, '930110', 2000.00, 1699.00, 560.00),
(329, '9317905', 2000.00, 1699.00, 560.00),
(330, '9317906', 2000.00, 1699.00, 560.00),
(331, '9317909', 2000.00, 1699.00, 560.00),
(332, '93401', 1599.00, 1299.00, 560.00),
(333, '93407', 2000.00, 1699.00, 560.00),
(334, '93410', 2000.00, 1699.00, 560.00),
(335, '9353', 1599.00, 1299.00, 560.00),
(336, '9374', 1599.00, 1299.00, 560.00),
(337, '939701', 1599.00, 1299.00, 560.00),
(338, '939702', 1599.00, 1299.00, 560.00),
(339, '939704', 1599.00, 1299.00, 560.00),
(340, '942802', 1599.00, 1299.00, 560.00),
(341, '942808', 1599.00, 1299.00, 560.00),
(342, '949415', 1599.00, 1299.00, 560.00),
(343, '962009', 1599.00, 1299.00, 560.00),
(344, '96204', 2000.00, 1699.00, 560.00),
(345, '98004', 2000.00, 1699.00, 560.00),
(346, '98010', 2000.00, 1699.00, 560.00),
(347, '9905', 1599.00, 1299.00, 560.00),
(348, 'AM1105311', 1599.00, 1299.00, 560.00),
(349, 'M311', 1599.00, 1299.00, 560.00),
(350, 'OVAL3', 1599.00, 1299.00, 560.00),
(351, 'S012', 1599.00, 1299.00, 560.00),
(352, 'S013', 1599.00, 1299.00, 560.00),
(353, 'S014', 1599.00, 1299.00, 560.00),
(354, 'S015', 1599.00, 1299.00, 560.00),
(355, 'S016', 1599.00, 1299.00, 560.00),
(356, 'T002', 1599.00, 1299.00, 560.00),
(357, 'T007', 1599.00, 1299.00, 560.00),
(358, 'T011', 1599.00, 1299.00, 560.00),
(359, 'WAFARER', 1599.00, 1299.00, 560.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_coupen`
--
ALTER TABLE `tbl_coupen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eye_test`
--
ALTER TABLE `tbl_eye_test`
  ADD PRIMARY KEY (`EyeTestId`);

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoicereceipt`
--
ALTER TABLE `tbl_invoicereceipt`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `tbl_invoicereceipt_history`
--
ALTER TABLE `tbl_invoicereceipt_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lens`
--
ALTER TABLE `tbl_lens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lens_cleaner`
--
ALTER TABLE `tbl_lens_cleaner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lens_coating`
--
ALTER TABLE `tbl_lens_coating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lens_creation`
--
ALTER TABLE `tbl_lens_creation`
  ADD PRIMARY KEY (`lensId`);

--
-- Indexes for table `tbl_lens_feature`
--
ALTER TABLE `tbl_lens_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_previlage_card`
--
ALTER TABLE `tbl_previlage_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privilege_card_type`
--
ALTER TABLE `tbl_privilege_card_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_productcolor`
--
ALTER TABLE `tbl_productcolor`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  ADD PRIMARY KEY (`ReturnDetailsId`);

--
-- Indexes for table `tbl_return_master`
--
ALTER TABLE `tbl_return_master`
  ADD PRIMARY KEY (`ReturnMasterId`);

--
-- Indexes for table `tbl_salesman`
--
ALTER TABLE `tbl_salesman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salesmaster`
--
ALTER TABLE `tbl_salesmaster`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `tbl_salesmaster_history`
--
ALTER TABLE `tbl_salesmaster_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_details_history`
--
ALTER TABLE `tbl_sales_details_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upi`
--
ALTER TABLE `tbl_upi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_warrenty_card`
--
ALTER TABLE `tbl_warrenty_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_prices`
--
ALTER TABLE `test_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_coupen`
--
ALTER TABLE `tbl_coupen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_eye_test`
--
ALTER TABLE `tbl_eye_test`
  MODIFY `EyeTestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_invoicereceipt`
--
ALTER TABLE `tbl_invoicereceipt`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_invoicereceipt_history`
--
ALTER TABLE `tbl_invoicereceipt_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_lens`
--
ALTER TABLE `tbl_lens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_lens_cleaner`
--
ALTER TABLE `tbl_lens_cleaner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lens_coating`
--
ALTER TABLE `tbl_lens_coating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lens_creation`
--
ALTER TABLE `tbl_lens_creation`
  MODIFY `lensId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_lens_feature`
--
ALTER TABLE `tbl_lens_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_previlage_card`
--
ALTER TABLE `tbl_previlage_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_privilege_card_type`
--
ALTER TABLE `tbl_privilege_card_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `tbl_productcolor`
--
ALTER TABLE `tbl_productcolor`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1593;

--
-- AUTO_INCREMENT for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  MODIFY `ReturnDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_return_master`
--
ALTER TABLE `tbl_return_master`
  MODIFY `ReturnMasterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_salesman`
--
ALTER TABLE `tbl_salesman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_salesmaster`
--
ALTER TABLE `tbl_salesmaster`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_salesmaster_history`
--
ALTER TABLE `tbl_salesmaster_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_sales_details_history`
--
ALTER TABLE `tbl_sales_details_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741;

--
-- AUTO_INCREMENT for table `tbl_upi`
--
ALTER TABLE `tbl_upi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warrenty_card`
--
ALTER TABLE `tbl_warrenty_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_prices`
--
ALTER TABLE `test_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
