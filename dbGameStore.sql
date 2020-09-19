-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: dbGameStore
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Producer` varchar(200) DEFAULT NULL,
  `Descripton` varchar(255) DEFAULT NULL,
  `Quantity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`),
  UNIQUE KEY `1` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` VALUES (3,'Agrou',139000,'https://linkneverdie.com/Assets/Imgs/Post/wallpaper6693.jpg','Steam','không có gì ','10'),(80,'Among us',50000,'https://gamek.mediacdn.vn/thumb_w/640/133514250583805952/2020/9/15/photo-1-1600136951352481030258.jpg','Steam','Không có description','20'),(1,'Fall Guys: Ultimate Knockout',187000,'https://i.ytimg.com/vi/FcITAzKW3fY/maxresdefault.jpg','Steam',NULL,'10'),(82,'Farmer',25000,'https://minigameviet.net/wp-content/uploads/2017/05/the-famer-game-phan-1.png','Steam','Không có description','44'),(5,'Game Pass Ultimate',49000,'https://images-na.ssl-images-amazon.com/images/I/31JhBW8ryuL.png','Xbox',NULL,'0'),(83,'Hayday',10000,'https://i.ytimg.com/vi/nbkipycETpQ/maxresdefault.jpg','Steam','Không có description','23'),(81,'Nitro',500000,'https://cdn.tgdd.vn/Files/2015/11/10/737474/asphalt-nitro-img.jpg','Steam','Không có description','20'),(2,'PlayerUnknown\'s Battlegrounds PUBG',340000,'https://cdn.oneesports.gg/wp-content/uploads/sites/4/2019/10/PUBG-Mobile-fantic-an-do-1024x683.jpg','BlueHole',NULL,'23'),(79,'Pubg mobile',20000,'https://cdn.vox-cdn.com/thumbor/dnCGFRZNWyS8r7nLF4cV9FOwOxw=/0x0:1200x628/fit-in/1200x630/cdn.vox-cdn.com/uploads/chorus_asset/file/16332386/PUBG_Mobile.jpg','tencent','không có','7'),(4,'Tom Clancy\'s Rainbow Six Siege ',299000,'https://s3.gaming-cdn.com/images/products/152/orig/tomb-raider-cover.jpg','Steam',NULL,'1');
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Pass` varchar(30) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `constraint_name` (`Email`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'h','r','hung@gmail.com','123456',0,'2020-09-19 19:25:38'),(2,'admin','hung','hungreoa7@gmail.com','123',1,'2019-12-31 17:00:00');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-20  4:20:14
