-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: 202web
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `LeagueInfo`
--

DROP TABLE IF EXISTS `LeagueInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LeagueInfo` (
  `League` varchar(30) DEFAULT NULL,
  `LeagueRating` int(11) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `TopTeam` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LeagueInfo`
--

LOCK TABLES `LeagueInfo` WRITE;
/*!40000 ALTER TABLE `LeagueInfo` DISABLE KEYS */;
INSERT INTO `LeagueInfo` VALUES ('La Liga',10,'Spain','Real Madrid'),('Bundesliga',9,'Germany','Bayern Munich'),('Premier League',8,'England','Manchester United'),('Serie A',7,'Italy','Juventus'),('Ligue 1',6,'France','PSG'),('Primeira Liga',5,'Portugal','Porto'),('Eredevisie',4,'Netherlands','Ajax');
/*!40000 ALTER TABLE `LeagueInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(32) DEFAULT NULL,
  `AdminPW` varchar(64) DEFAULT NULL,
  `activeSession` varchar(128) DEFAULT NULL,
  `firstLogin` datetime DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'geovan89','13cde6d161307fa7b7fb5918dd46a0a6260a5cd7',NULL,'2016-03-22 06:32:44','2016-03-22 06:32:44');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientId` int(11) NOT NULL AUTO_INCREMENT,
  `clientName` varchar(32) NOT NULL,
  `clientPW` varchar(64) NOT NULL,
  `secret` varchar(64) NOT NULL,
  `permissions` int(1) NOT NULL,
  `activeSession` varchar(128) NOT NULL,
  `firstLogin` datetime DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'geovanny','ff3aef01ece1cc2a1a51d64335cb1aeb8e28a397','4832059541b7710a3cd4dbade6a91900c0dde8cb',0,'','2016-03-22 06:29:57','2016-03-22 06:29:57'),(2,'arlette','13cde6d161307fa7b7fb5918dd46a0a6260a5cd7','4832059541b7710a3cd4dbade6a91900c0dde8cb',0,'','2016-03-22 07:01:12','2016-03-22 07:01:12'),(3,'addriane','13cde6d161307fa7b7fb5918dd46a0a6260a5cd7','27fb38a278e7e0830b202760fb156b0929216e1c',1,'','2016-03-22 08:18:25','2016-03-22 08:18:25'),(4,'suzy','f05a7b170769532e69e116fdc7e5ef00199ec6e7','0ed37e5d4f00dd23646950ea0263c08ddcf7f1c4',1,'','2016-03-23 02:59:45','2016-03-23 02:59:45'),(5,'john','13cde6d161307fa7b7fb5918dd46a0a6260a5cd7','8bf9689b2dbe041f7f016f04dcc679043e24cf42',1,'','2016-03-23 05:14:33','2016-03-23 05:14:33');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `TeamName` varchar(30) NOT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `TopScorer` varchar(30) DEFAULT NULL,
  `NumberofTitles` int(11) DEFAULT NULL,
  PRIMARY KEY (`TeamName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES ('Ajax','Netherlands','Arkadiusz Milik',4),('Aston Villa','England','Gabby Agbonlahor',1),('Barcelona','Spain','Lionel Messi',5),('Bayern Munich','Germany','Robert Lewandoski',5),('Benfica','Portugal','Jonas Silva',2),('Borussia Dortmund','Germany','Pierre Aubameyang',1),('Chelsea','England','Frank Lampard',1),('Internazionale','Italy','Mauro Icardi',3),('Juventus','Italy','Paulo Dybala',2),('Liverpool','England','Robbie Fowler',5),('Manchester United','England','Wayne Rooney',3),('Marseille','France','Michy Batshuayi',1),('Milan','Italy','Carlos Bacca',7),('Porto','Portugal','Vincent Aboubakar',2),('Real Madrid','Spain','Cristiano Ronaldo',10);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprofiles`
--

DROP TABLE IF EXISTS `userprofiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userprofiles` (
  `clientName` varchar(25) NOT NULL,
  `team` varchar(25) DEFAULT NULL,
  `league` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`clientName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofiles`
--

LOCK TABLES `userprofiles` WRITE;
/*!40000 ALTER TABLE `userprofiles` DISABLE KEYS */;
INSERT INTO `userprofiles` VALUES ('addriane',NULL,NULL),('arlette',NULL,NULL),('geovanny','Real Madrid','La Liga'),('john','Liverpool','Premier League'),('suzy','Barcelona','La Liga');
/*!40000 ALTER TABLE `userprofiles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-23 19:47:19
