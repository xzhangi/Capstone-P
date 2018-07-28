CREATE DATABASE  IF NOT EXISTS `locka` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `locka`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: locka
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_locker`
--

DROP TABLE IF EXISTS `tbl_locker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_locker` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_locker`
--

LOCK TABLES `tbl_locker` WRITE;
/*!40000 ALTER TABLE `tbl_locker` DISABLE KEYS */;
INSERT INTO `tbl_locker` VALUES (1,1,1,'Locker 1-1',NULL,NULL,1,'SYS_ADMIN','2017-06-15'),(2,1,2,'Locker 1-2',NULL,NULL,1,'SYS_ADMIN','2017-06-15'),(3,1,3,'Locker 1-3',NULL,NULL,1,'SYS_ADMIN','2017-06-15'),(4,2,1,'Locker 2-1',NULL,NULL,1,'SYS_ADMIN','2017-06-15'),(5,2,2,'Locker 2-2',NULL,NULL,1,'SYS_ADMIN','2017-06-15'),(6,2,3,'Locker 2-3',NULL,NULL,0,'SYS_ADMIN','2017-06-15');
/*!40000 ALTER TABLE `tbl_locker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_locker_location`
--

DROP TABLE IF EXISTS `tbl_locker_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_locker_location` (
  `Location_ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Remarks` varchar(45) DEFAULT NULL,
  `Is_Active` tinyint(4) DEFAULT NULL,
  `Created_By` varchar(45) NOT NULL,
  `Created_Date` varchar(45) NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_locker_location`
--

LOCK TABLES `tbl_locker_location` WRITE;
/*!40000 ALTER TABLE `tbl_locker_location` DISABLE KEYS */;
INSERT INTO `tbl_locker_location` VALUES (1,'Enginering Block',NULL,1,'SYS_ADMIN','2017-06-15'),(2,'SIT Block',NULL,1,'SYS_ADMIN','2017-06-15');
/*!40000 ALTER TABLE `tbl_locker_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_locker_rental`
--

DROP TABLE IF EXISTS `tbl_locker_rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_locker_rental` (
  `Rent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Rent_From_Date` datetime NOT NULL,
  `Rent_To_Date` datetime NOT NULL,
  `Rented_By` varchar(45) NOT NULL,
  `Rental_Type` int(11) NOT NULL,
  `Creation_Date` varchar(45) NOT NULL,
  `Is_Active` tinyint(4) NOT NULL,
  `Pin_Code` int(11) NOT NULL,
  `Points_Obtained` int(11) NOT NULL,
  PRIMARY KEY (`Rent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_locker_rental`
--

LOCK TABLES `tbl_locker_rental` WRITE;
/*!40000 ALTER TABLE `tbl_locker_rental` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_locker_rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_locker_rental_type`
--

DROP TABLE IF EXISTS `tbl_locker_rental_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_locker_rental_type` (
  `Rental_Type_ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Rental_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_locker_rental_type`
--

LOCK TABLES `tbl_locker_rental_type` WRITE;
/*!40000 ALTER TABLE `tbl_locker_rental_type` DISABLE KEYS */;
INSERT INTO `tbl_locker_rental_type` VALUES (1,'Per Minute Rental',0.01),(2,'Monthly Rental',30);
/*!40000 ALTER TABLE `tbl_locker_rental_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_locker_size`
--

DROP TABLE IF EXISTS `tbl_locker_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_locker_size` (
  `Locker_Size_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`Locker_Size_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_locker_size`
--

LOCK TABLES `tbl_locker_size` WRITE;
/*!40000 ALTER TABLE `tbl_locker_size` DISABLE KEYS */;
INSERT INTO `tbl_locker_size` VALUES (1,'Small'),(2,'Medium'),(3,'Large');
/*!40000 ALTER TABLE `tbl_locker_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES ('18A123A','S1234567A','Tom','tom@fakeemail.com','12345678','123456','2018-06-11 08:43:54',33,1,0),('18B123B','S1234567B','Jane','jane@fakeemail.com','87654321','123456','2018-06-11 08:43:54',11,1,0),('18C123C','S1234567C','God','god@fakeemail.com','12348765','123456','2018-06-11 08:43:54',0,1,0),('18D123D','S1234567D','Hacker','hacker@fakeemail.com','12344321','123456','2018-06-11 08:45:23',9999,0,0),('Admin','AdminIC','Administrator','administrator@fakeemail.com','12341234','123456','2018-06-11 08:56:43',0,1,1);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-11 17:08:10
