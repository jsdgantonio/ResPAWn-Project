CREATE DATABASE  IF NOT EXISTS `respawn_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `respawn_db`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: respawn_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_tb` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `uaID` int(11) DEFAULT NULL,
  `oaID` int(11) DEFAULT NULL,
  `uaPostID` int(11) DEFAULT NULL,
  `oaPostID` int(11) DEFAULT NULL,
  `adminEmail` varchar(45) DEFAULT NULL,
  `adminPassword` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  KEY `adding_fk_admin_tb` (`uaID`),
  KEY `adding_fk_admin_tb2` (`oaID`),
  KEY `adding_fk_admin_tb3` (`uaPostID`),
  KEY `adding_fk_admin_tb4` (`oaPostID`),
  CONSTRAINT `adding_fk_admin` FOREIGN KEY (`uaID`) REFERENCES `user_tb` (`userID`),
  CONSTRAINT `adding_fk_admin2` FOREIGN KEY (`oaID`) REFERENCES `org_tb` (`orgID`),
  CONSTRAINT `adding_fk_admin3` FOREIGN KEY (`uaPostID`) REFERENCES `postuser` (`userPostID`),
  CONSTRAINT `adding_fk_admin4` FOREIGN KEY (`oaPostID`) REFERENCES `postorg` (`orgPostID`),
  CONSTRAINT `adding_fk_admin_tb` FOREIGN KEY (`uaID`) REFERENCES `user_tb` (`userID`),
  CONSTRAINT `adding_fk_admin_tb2` FOREIGN KEY (`oaID`) REFERENCES `org_tb` (`orgID`),
  CONSTRAINT `adding_fk_admin_tb3` FOREIGN KEY (`uaPostID`) REFERENCES `postuser` (`userPostID`),
  CONSTRAINT `adding_fk_admin_tb4` FOREIGN KEY (`oaPostID`) REFERENCES `postorg` (`orgPostID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_tb`
--

LOCK TABLES `admin_tb` WRITE;
/*!40000 ALTER TABLE `admin_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_tb`
--

DROP TABLE IF EXISTS `org_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `org_tb` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `orgUsername` varchar(45) DEFAULT NULL,
  `orgPassword` varchar(45) DEFAULT NULL,
  `orgName` varchar(45) DEFAULT NULL,
  `orgEmail` varchar(45) DEFAULT NULL,
  `orgContact` int(11) DEFAULT NULL,
  PRIMARY KEY (`orgID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_tb`
--

LOCK TABLES `org_tb` WRITE;
/*!40000 ALTER TABLE `org_tb` DISABLE KEYS */;
INSERT INTO `org_tb` VALUES (1,'animalorg','1','animal org','o@gmail.com',123);
/*!40000 ALTER TABLE `org_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postorg`
--

DROP TABLE IF EXISTS `postorg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postorg` (
  `orgPostID` int(11) NOT NULL AUTO_INCREMENT,
  `oID` int(11) DEFAULT NULL,
  `orgLocation` varchar(45) DEFAULT NULL,
  `orgCaption` varchar(45) DEFAULT NULL,
  `orgImage` varchar(45) DEFAULT NULL,
  `orgComment` varchar(45) DEFAULT NULL,
  `orgStatus` varchar(45) DEFAULT NULL,
  `org_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`orgPostID`),
  KEY `adding_fk_org_tb` (`oID`),
  CONSTRAINT `adding_fk_org` FOREIGN KEY (`oID`) REFERENCES `org_tb` (`orgID`),
  CONSTRAINT `adding_fk_org_tb` FOREIGN KEY (`oID`) REFERENCES `org_tb` (`orgID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postorg`
--

LOCK TABLES `postorg` WRITE;
/*!40000 ALTER TABLE `postorg` DISABLE KEYS */;
INSERT INTO `postorg` VALUES (1,1,'morato','dog open for adoption!','dog.png','i want to adopt','Open For Adoption','2024-05-13 05:57:09'),(4,1,'morato','dog open for adoption!','dog.png','i want to adopt','Open For Adoption','2024-05-13 05:57:09'),(5,1,'morato','dog open for adoption!','dog.png','i want to adopt','Open For Adoption','2024-05-13 05:57:09'),(13,NULL,'nka','adn,k','ndlka',NULL,'arggg','2024-05-13 05:57:09'),(14,NULL,'nka','adn,k','ndlka',NULL,'arggg','2024-05-13 05:57:09'),(15,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(16,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(17,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(18,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(19,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(20,NULL,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(21,1,'nka','adn,k','ndlka',NULL,'arg','2024-05-13 05:57:09'),(29,1,'tama ba to','tama','tama',NULL,'arg','2024-05-13 06:11:48'),(30,1,'may tama ka','may tama ka','may tama ka',NULL,'GOH','2024-05-13 06:12:08'),(31,1,'akosi','akosi','akosi',NULL,'akosi','2024-05-13 06:13:29');
/*!40000 ALTER TABLE `postorg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postuser`
--

DROP TABLE IF EXISTS `postuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postuser` (
  `userPostID` int(11) NOT NULL AUTO_INCREMENT,
  `uID` int(11) DEFAULT NULL,
  `userLocation` varchar(45) DEFAULT NULL,
  `userCaption` varchar(45) DEFAULT NULL,
  `userImage` varchar(45) DEFAULT NULL,
  `userComment` varchar(45) DEFAULT NULL,
  `userStatus` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userPostID`),
  KEY `adding_fk_user_tb` (`uID`),
  CONSTRAINT `adding_fk_user` FOREIGN KEY (`uID`) REFERENCES `user_tb` (`userID`),
  CONSTRAINT `adding_fk_user_tb` FOREIGN KEY (`uID`) REFERENCES `user_tb` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postuser`
--

LOCK TABLES `postuser` WRITE;
/*!40000 ALTER TABLE `postuser` DISABLE KEYS */;
INSERT INTO `postuser` VALUES (3,2,'kyusi','askal missing dito','askal.png','','missing','2024-05-13 05:55:48'),(17,3,'pearl drive','saklolo yung pusa ko nawawala','pusako.png','nasa ilalim kanina','missing','2024-05-13 05:55:48'),(23,3,'mfklsfk','msfelks','mfkslk',NULL,'arg','2024-05-13 05:55:48'),(28,3,'the one','dog','dog.png',NULL,'missing','2024-05-13 06:11:06'),(29,3,'test','test','test',NULL,'test','2024-05-13 06:11:23');
/*!40000 ALTER TABLE `postuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tb` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userUsername` varchar(45) DEFAULT NULL,
  `userPassword` varchar(45) DEFAULT NULL,
  `userFirstName` varchar(45) DEFAULT NULL,
  `userLastName` varchar(45) DEFAULT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  `userContact` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tb`
--

LOCK TABLES `user_tb` WRITE;
/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` VALUES (1,'lilmarcy','143','marceline','little','marcy@gmail.com',123),(2,'kathy','1010','kathryn','bernardo','kb@gmail.com',234),(3,'hevabi','00','hev','abi','ha@gmail.com',1103),(4,'cerabhie','anakngbayan','alyzza','castillo','aj@gmail.com',378430),(5,'charhashi','afam','bianca','tinsay','bt@gmail.com',289380),(6,'binini','bhdsj','nini','bini','nini@gmail.com',128193),(7,'jeaisbusy','09309','jea','ant','langgam@gmail.com',19201),(8,'langgam','ant','ant','sad','ant@gmail.com',128932),(9,'antyyy','3872','langg','am','anttt@gmail.com',12819),(10,'ysa','4686','ysabella','agb','ya@gmail.com',381);
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-13 15:21:23
