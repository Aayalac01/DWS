CREATE DATABASE  IF NOT EXISTS `chess_game` ;
USE `chess_game`;
-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: chess_game
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `T_Board_Status`
--

DROP TABLE IF EXISTS `T_Board_Status`;


CREATE TABLE `T_Board_Status` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDGame` int NOT NULL,
  `board` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`,`IDGame`),
  KEY `IDGame` (`IDGame`),
  CONSTRAINT `T_Board_Status_ibfk_1` FOREIGN KEY (`IDGame`) REFERENCES `T_Matches` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 ;


--
-- Dumping data for table `T_Board_Status`
--

LOCK TABLES `T_Board_Status` WRITE;
/*!40000 ALTER TABLE `T_Board_Status` DISABLE KEYS */;
INSERT INTO `T_Board_Status` VALUES (1,1,'RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP'),(2,1,'RW,NW,BW,QW,KW,BW,NW,RW,NP,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP'),(3,1,'RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,NP,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP'),(4,1,'RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,NP,NP,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP'),(5,1,'RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,NP,NP,NP,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP'),(6,1,'RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,NP,NP,NP,NP,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP');
/*!40000 ALTER TABLE `T_Board_Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Matches`
--

DROP TABLE IF EXISTS `T_Matches`;

CREATE TABLE `T_Matches` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `white` int NOT NULL,
  `black` int NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime DEFAULT NULL,
  `winner` varchar(10) DEFAULT NULL,
  `state` varchar(20) NOT NULL DEFAULT (_utf8mb4'En curso'),
  PRIMARY KEY (`ID`),
  KEY `white` (`white`),
  KEY `black` (`black`),
  CONSTRAINT `T_Matches_ibfk_1` FOREIGN KEY (`white`) REFERENCES `T_Players` (`ID`),
  CONSTRAINT `T_Matches_ibfk_2` FOREIGN KEY (`black`) REFERENCES `T_Players` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 ;

--
-- Dumping data for table `T_Matches`
--

LOCK TABLES `T_Matches` WRITE;
/*!40000 ALTER TABLE `T_Matches` DISABLE KEYS */;
INSERT INTO `T_Matches` VALUES (1,'prueba',1,2,'2023-11-29 17:01:48',NULL,NULL,'En curso'),(2,'prueba 2',5,3,'2023-11-29 17:03:41',NULL,NULL,'En curso'),(3,'Prueba 3',2,4,'2023-12-01 18:40:00',NULL,NULL,'En curso'),(4,'Prueba 4',6,3,'2023-12-01 18:41:35',NULL,NULL,'En curso'),(5,'Prueba 5',2,1,'2023-12-01 18:49:49',NULL,NULL,'Tablas'),(6,'Prueba 6',4,1,'2023-12-01 18:50:13',NULL,NULL,'Tablas'),(7,'Prueba 7',5,3,'2023-12-01 18:50:37',NULL,NULL,'Jaque mate'),(8,'Prueba 8',2,5,'2023-12-01 18:50:53',NULL,NULL,'Jaque mate'),(15,'Partida de prueba',3,6,'2023-12-19 18:04:08',NULL,NULL,'En curso');
/*!40000 ALTER TABLE `T_Matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Players`
--

DROP TABLE IF EXISTS `T_Players`;

CREATE TABLE `T_Players` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `profileType` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 ;

--
-- Dumping data for table `T_Players`
--

LOCK TABLES `T_Players` WRITE;
/*!40000 ALTER TABLE `T_Players` DISABLE KEYS */;
INSERT INTO `T_Players` VALUES (1,'Francisco','franciscoemail@email.com',NULL,NULL),(2,'Antonio','antonioemail@email.com',NULL,NULL),(3,'Mateo','mateoemail@email.com',NULL,NULL),(4,'Jose','joseemail@email.com',NULL,NULL),(5,'Laura','lauraemail@email.com',NULL,NULL),(6,'Valdric','valdricemail@email.com',NULL,NULL),(7,'alex','alex@mail.com','$2y$10$yhdTLX3kDLp0ykRzqkJ5cOv5vfzWQeHxKV1ol.aEmzu290qyiyWSe','jugador'),(8,'aaron','aaron@mail.com','$2y$10$3vaPCYrkHuYY4cqOrx6dmuViGshAsIV5UvVHkozTZAMOHDrMAWmj6','premium'),(12,'carlos','carlos@mail.com','$2y$10$91Wy42adh.gHFd7ROKLu7uq89JWel7koVjfPMjp5s5peXHmbNqpe.','premium');
/*!40000 ALTER TABLE `T_Players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-12 18:53:36
