-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2018 at 03:43 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locka`
--
CREATE DATABASE IF NOT EXISTS `locka` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `locka`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ewallet`
--

DROP TABLE IF EXISTS `tbl_ewallet`;
CREATE TABLE IF NOT EXISTS `tbl_ewallet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `Balance` int(11) NOT NULL DEFAULT '0',
  `Created_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Has_Pending_Payments` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `Username_idx` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ewallet`
--

INSERT INTO `tbl_ewallet` (`ID`, `Username`, `Balance`, `Created_Date`, `Has_Pending_Payments`) VALUES
(1, '18A123A', 60, '2018-07-31 19:53:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker`
--

DROP TABLE IF EXISTS `tbl_locker`;
CREATE TABLE IF NOT EXISTS `tbl_locker` (
  `ID` int(11) NOT NULL,
  `Location_ID` int(11) NOT NULL COMMENT 'Location ID - foreign key from location table',
  `Locker_Size_ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Desc` varchar(45) DEFAULT NULL,
  `Remarks` varchar(120) DEFAULT NULL,
  `Is_Available` tinyint(4) NOT NULL DEFAULT '0',
  `Is_Active` tinyint(4) NOT NULL DEFAULT '0',
  `Created_By` varchar(45) NOT NULL,
  `Created_Date` date NOT NULL,
  PRIMARY KEY (`ID`,`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Locker table to keep track of lockers in school';

--
-- Dumping data for table `tbl_locker`
--

INSERT INTO `tbl_locker` (`ID`, `Location_ID`, `Locker_Size_ID`, `Name`, `Desc`, `Remarks`, `Is_Available`, `Is_Active`, `Created_By`, `Created_Date`) VALUES
(1, 1, 1, 'SEG - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(2, 1, 2, 'SEG - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(3, 1, 3, 'SEG - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(4, 2, 1, 'SIT - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(5, 2, 2, 'SIT - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(6, 2, 3, 'SIT - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(7, 3, 1, 'SIDM - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(8, 3, 2, 'SIDM - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(9, 3, 3, 'SIDM - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(10, 4, 1, 'SHS - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(11, 4, 2, 'SHS - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(12, 4, 3, 'SHS - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(13, 5, 1, 'SBM - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(14, 5, 2, 'SBM - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(15, 5, 3, 'SBM - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(16, 6, 1, 'SCL - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(17, 6, 2, 'SCL - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(18, 6, 3, 'SCL - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(19, 7, 1, 'SDN - Small 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(20, 7, 2, 'SDN - Medium 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(21, 7, 3, 'SDN - Large 01', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_location`
--

DROP TABLE IF EXISTS `tbl_locker_location`;
CREATE TABLE IF NOT EXISTS `tbl_locker_location` (
  `Location_ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Remarks` varchar(45) DEFAULT NULL,
  `Is_Active` tinyint(4) DEFAULT NULL,
  `Created_By` varchar(45) NOT NULL,
  `Created_Date` varchar(45) NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_location`
--

INSERT INTO `tbl_locker_location` (`Location_ID`, `Name`, `Remarks`, `Is_Active`, `Created_By`, `Created_Date`) VALUES
(1, 'SEG', 'School of Engineering', 1, 'SYS_ADMIN', '2017-06-15'),
(2, 'SIT', 'School of Information Technology', 1, 'SYS_ADMIN', '2017-06-15'),
(3, 'SIDM', 'School of Interactive & Digital Media', 1, 'SYS_ADMIN', '2017-06-15'),
(4, 'SHS', 'School of Health Sciences', 1, 'SYS_ADMIN', '2017-06-15'),
(5, 'SBM', 'School of Business Management', 1, 'SYS_ADMIN', '2017-06-15'),
(6, 'SCL', 'School for Chemical & Life Sciences', 1, 'SYS_ADMIN', '2017-06-15'),
(7, 'SDN', 'School of Design', 1, 'SYS_ADMIN', '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_rental`
--

DROP TABLE IF EXISTS `tbl_locker_rental`;
CREATE TABLE IF NOT EXISTS `tbl_locker_rental` (
  `Rent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Locker_ID` int(11) NOT NULL,
  `Rent_From_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rent_To_Date` datetime DEFAULT NULL,
  `Username` varchar(45) NOT NULL,
  `Rental_Type` int(11) NOT NULL,
  `Creation_Date` datetime NOT NULL,
  `Is_Active` tinyint(4) NOT NULL,
  `Pin_Code` varchar(512) NOT NULL,
  `Points_Obtained` int(11) NOT NULL,
  `Paid` tinyint(4) NOT NULL,
  `Locker_Unlocked` tinyint(4) NOT NULL DEFAULT '0',
  `Show_Pin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Rent_ID`),
  KEY `Username_idx` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_rental`
--

INSERT INTO `tbl_locker_rental` (`Rent_ID`, `Locker_ID`, `Rent_From_Date`, `Rent_To_Date`, `Username`, `Rental_Type`, `Creation_Date`, `Is_Active`, `Pin_Code`, `Points_Obtained`, `Paid`, `Locker_Unlocked`, `Show_Pin`) VALUES
(54, 16, '2018-07-31 16:11:00', '2018-07-31 16:34:00', '18A123A', 1, '2018-07-31 16:11:00', 0, '406742', 0, 0, 0, 0),
(55, 18, '2018-07-31 16:35:00', '2018-07-31 16:39:00', '18A123A', 1, '2018-07-31 16:35:00', 0, '637683', 0, 0, 0, 0),
(56, 17, '2018-07-31 16:39:00', '2018-07-31 16:40:00', '18A123A', 1, '2018-07-31 16:39:00', 0, '610883', 0, 0, 0, 0),
(57, 17, '2018-07-31 16:42:00', '2018-07-31 16:43:00', '18A123A', 1, '2018-07-31 16:42:00', 0, '502396', 0, 0, 0, 0),
(58, 16, '2018-07-31 20:19:00', '2018-07-31 20:20:00', '18A123A', 1, '2018-07-31 20:19:00', 0, '195251', 0, 0, 0, 0),
(64, 19, '2018-08-01 11:02:00', NULL, '18A123A', 1, '2018-08-01 11:02:00', 0, '476029cdd37d4c7b50e51ae7b6ff9c2b', 0, 0, 0, 0),
(65, 1, '2018-08-01 13:18:00', NULL, '18A123A', 1, '2018-08-01 13:18:00', 0, '75f972e52a32a1a77be7f80d145e16c1', 0, 0, 0, 0),
(66, 2, '2018-08-01 13:29:00', NULL, '18A123A', 1, '2018-08-01 13:29:00', 0, '123456', 0, 0, 0, 0),
(67, 1, '2018-08-01 13:53:00', NULL, '18A123A', 1, '2018-08-01 13:53:00', 0, '123456', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_rental_type`
--

DROP TABLE IF EXISTS `tbl_locker_rental_type`;
CREATE TABLE IF NOT EXISTS `tbl_locker_rental_type` (
  `Rental_Type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Price` double NOT NULL,
  `Remarks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Rental_Type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_rental_type`
--

INSERT INTO `tbl_locker_rental_type` (`Rental_Type_ID`, `Name`, `Price`, `Remarks`) VALUES
(1, 'Per Minute Rental - Small', 0.01, NULL),
(2, 'Per Minute Rental - Medium', 0.02, NULL),
(3, 'Per Minute Rental - Big', 0.03, NULL),
(4, 'Monthly Rental - Small', 30, NULL),
(5, 'Monthly Rental - Medium', 40, NULL),
(6, 'Monthly Rental - Big', 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_size`
--

DROP TABLE IF EXISTS `tbl_locker_size`;
CREATE TABLE IF NOT EXISTS `tbl_locker_size` (
  `Locker_Size_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`Locker_Size_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_size`
--

INSERT INTO `tbl_locker_size` (`Locker_Size_ID`, `Name`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

DROP TABLE IF EXISTS `tbl_notifications`;
CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Is_Read` tinyint(4) NOT NULL DEFAULT '0',
  `Is_Deleted` varchar(45) NOT NULL DEFAULT '0',
  `Create_By` varchar(12) NOT NULL DEFAULT 'SYS_ADMIN',
  `Create_Date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`ID`, `Username`, `Title`, `Content`, `Is_Read`, `Is_Deleted`, `Create_By`, `Create_Date`) VALUES
(1, '18A123A', 'Test', 'This is a test notification for debugging purposes.', 0, '0', 'SYS_ADMIN', '2017-06-20'),
(4, '18A123A', 'TEST', '12321', 0, '0', 'SYS_ADMIN', '2018-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

DROP TABLE IF EXISTS `tbl_reports`;
CREATE TABLE IF NOT EXISTS `tbl_reports` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Report_Title` varchar(255) NOT NULL,
  `Report_Details` varchar(255) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Created_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Is_Deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `NRIC` varchar(45) NOT NULL,
  `Display_Name` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_No` varchar(8) NOT NULL,
  `Password` varchar(512) NOT NULL,
  `Create_Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Points` int(11) NOT NULL DEFAULT '0',
  `Is_Active` tinyint(4) NOT NULL DEFAULT '1',
  `Is_Admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `Username`, `NRIC`, `Display_Name`, `Email`, `Mobile_No`, `Password`, `Create_Time`, `Points`, `Is_Active`, `Is_Admin`) VALUES
(1, '18A123A', 'S1234555A', 'Tom', 'tom@fakeemail.com', '12345678', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-11 08:43:54', 33, 1, 0),
(2, '18B123B', 'S1234567B', 'Jane', 'jane@fakeemail.com', '87654321', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-11 08:43:54', 11, 1, 0),
(3, '18C123C', 'S1234567C', 'God', 'god@fakeemail.com', '12348765', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-11 08:43:54', 0, 1, 0),
(4, '18D123D', 'S1234567D', 'Hacker', 'hacker@fakeemail.com', '12344321', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-11 08:45:23', 9999, 0, 0),
(5, 'Admin', 'AdminIC', 'Administrator', 'administrator@fakeemail.com', '12341234', 'e10adc3949ba59abbe56e057f20f883e', '2018-06-11 08:56:43', 0, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ewallet`
--
ALTER TABLE `tbl_ewallet`
  ADD CONSTRAINT `Username` FOREIGN KEY (`Username`) REFERENCES `tbl_users` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
