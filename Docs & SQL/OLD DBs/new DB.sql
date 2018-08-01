-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2018 at 08:40 PM
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
(1, 1, 1, 'Locker 1-1', NULL, NULL, 0, 1, 'SYS_ADMIN', '2017-06-15'),
(2, 1, 2, 'Locker 1-2', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(3, 1, 3, 'Locker 1-3', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(4, 2, 1, 'Locker 2-1', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(5, 2, 2, 'Locker 2-2', NULL, NULL, 1, 1, 'SYS_ADMIN', '2017-06-15'),
(6, 2, 3, 'Locker 2-3', NULL, NULL, 0, 0, 'SYS_ADMIN', '2017-06-15');

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
(1, 'Enginering Block', NULL, 1, 'SYS_ADMIN', '2017-06-15'),
(2, 'SIT Block', NULL, 1, 'SYS_ADMIN', '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_rental`
--

DROP TABLE IF EXISTS `tbl_locker_rental`;
CREATE TABLE IF NOT EXISTS `tbl_locker_rental` (
  `Rent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Locker_ID` int(11) NOT NULL,
  `Rent_From_Date` datetime NOT NULL,
  `Rent_To_Date` datetime NOT NULL,
  `Rented_By` varchar(45) NOT NULL,
  `Rental_Type` int(11) NOT NULL,
  `Creation_Date` varchar(45) NOT NULL,
  `Is_Active` tinyint(4) NOT NULL,
  `Pin_Code` int(11) NOT NULL,
  `Points_Obtained` int(11) NOT NULL,
  PRIMARY KEY (`Rent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_rental`
--

INSERT INTO `tbl_locker_rental` (`Rent_ID`, `Locker_ID`, `Rent_From_Date`, `Rent_To_Date`, `Rented_By`, `Rental_Type`, `Creation_Date`, `Is_Active`, `Pin_Code`, `Points_Obtained`) VALUES
(26, 1, '2018-07-29 19:41:00', '0000-00-00 00:00:00', '18A123A', 1, '2018-07-29 19:41', 1, 1133, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locker_rental_type`
--

DROP TABLE IF EXISTS `tbl_locker_rental_type`;
CREATE TABLE IF NOT EXISTS `tbl_locker_rental_type` (
  `Rental_Type_ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Rental_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locker_rental_type`
--

INSERT INTO `tbl_locker_rental_type` (`Rental_Type_ID`, `Name`, `Price`) VALUES
(1, 'Per Minute Rental', 0.01),
(2, 'Monthly Rental', 30);

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
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `Username` varchar(7) NOT NULL,
  `NRIC` varchar(45) NOT NULL,
  `Display_Name` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_No` varchar(8) NOT NULL,
  `Password` varchar(512) NOT NULL,
  `Create_Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Points` int(11) NOT NULL DEFAULT '0',
  `Is_Active` tinyint(4) NOT NULL DEFAULT '1',
  `Is_Admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Username`, `NRIC`, `Display_Name`, `Email`, `Mobile_No`, `Password`, `Create_Time`, `Points`, `Is_Active`, `Is_Admin`) VALUES
('18A123A', 'S1234567A', 'Tom', 'tom@fakeemail.com', '12345678', '123456', '2018-06-11 08:43:54', 33, 1, 0),
('18B123B', 'S1234567B', 'Jane', 'jane@fakeemail.com', '87654321', '123456', '2018-06-11 08:43:54', 11, 1, 0),
('18C123C', 'S1234567C', 'God', 'god@fakeemail.com', '12348765', '123456', '2018-06-11 08:43:54', 0, 1, 0),
('18D123D', 'S1234567D', 'Hacker', 'hacker@fakeemail.com', '12344321', '123456', '2018-06-11 08:45:23', 9999, 0, 0),
('Admin', 'AdminIC', 'Administrator', 'administrator@fakeemail.com', '12341234', '123456', '2018-06-11 08:56:43', 0, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
