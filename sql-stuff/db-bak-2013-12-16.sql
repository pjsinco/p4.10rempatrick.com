-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: rempatri_p4_10rempatrick_com
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `home` int(11) NOT NULL,
  `away` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `home_points` smallint(6) NOT NULL DEFAULT '0',
  `away_points` smallint(6) NOT NULL DEFAULT '0',
  `periods` tinyint(4) NOT NULL DEFAULT '4',
  `period_minutes` tinyint(4) NOT NULL DEFAULT '12',
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `game_id` (`game_id`),
  KEY `home` (`home`),
  KEY `away` (`away`),
  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`home`) REFERENCES `team` (`team_id`),
  CONSTRAINT `game_ibfk_2` FOREIGN KEY (`away`) REFERENCES `team` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (7,7,8,1387103845,0,0,4,12),(8,9,10,1387104497,0,0,4,12),(9,11,12,1387129929,0,0,4,12),(10,14,15,1387137682,0,0,4,12),(11,16,17,1387137717,0,0,4,12),(12,18,19,1387137868,0,0,4,12),(13,20,21,1387137885,0,0,4,12),(14,22,23,1387139108,0,0,4,12),(15,24,25,1387139169,0,0,4,12),(16,26,27,1387139194,0,0,4,12),(17,28,29,1387139212,0,0,4,12),(18,30,31,1387139320,0,0,4,12),(19,32,33,1387139489,0,0,4,12),(20,34,35,1387139512,0,0,4,12),(21,36,37,1387139534,0,0,4,12),(22,38,39,1387139618,0,0,4,12),(23,40,41,1387139646,0,0,4,12),(24,42,43,1387139695,0,0,4,12),(25,44,45,1387139823,0,0,4,12),(26,46,47,1387140103,0,0,4,12),(27,1,2,1387140530,0,0,4,12),(29,1,2,1387141337,0,0,4,12),(30,1,2,1387141417,0,0,4,12),(31,1,2,1387141967,0,0,4,12),(39,7,2,1387152015,0,0,0,0),(40,12,16,1387152029,0,0,0,0),(41,1,18,0,0,0,4,12),(42,1,12,1387155394,0,0,4,12);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `team` int(11) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `jersey` char(2) NOT NULL,
  `pos` enum('SG','SF','C','SG','PG','PF') NOT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `player_id` (`player_id`),
  UNIQUE KEY `last_name` (`last_name`,`first_name`,`jersey`,`team`),
  UNIQUE KEY `last_name_2` (`last_name`,`first_name`,`jersey`,`team`),
  KEY `team` (`team`),
  CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team`) REFERENCES `team` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,7,'Bennett','Anthony','15','SF'),(2,7,'Bynum','Andrew','21','C'),(3,7,'Clark','Earl','6','SF'),(4,7,'Dellavedova','Matthew','9','SG'),(5,7,'Felix','Carrick','30','SG'),(6,7,'Gee','Alonzo','33','SF'),(7,7,'Irving','Kyrie','2','PG'),(8,7,'Jack','Jarrett','1','PG'),(9,7,'Karasev','Sergey','10','SG'),(10,7,'Miles','C.J.','0','SG'),(11,7,'Sims','Henry','14','C'),(12,7,'Thompson','Tristan','13','PF'),(13,7,'Varejao','Anderson','17','C'),(14,7,'Waiters','Dion','3','SG'),(15,7,'Zeller','Tyler','40','C'),(16,1,'Bass','Brandon','30','PF'),(17,1,'Bogans','Keith','4','SG'),(18,1,'Bradley','Avery','0','PG'),(19,1,'Brooks','MarShon','12','SG'),(20,1,'Crawford','Jordan','27','SG'),(21,1,'Faverani','Vitor','38','C'),(22,1,'Green','Jeff','8','SG'),(23,1,'Humphries','Kris','43','PF'),(24,1,'Lee','Courtney','11','SG'),(25,1,'Olynyk','Kelly','41','C'),(26,1,'Pressey','Phil','26','PG'),(27,1,'Rondo','Rajon','9','PG'),(28,1,'Sullinger','Jared','7','PF'),(29,1,'Wallace','Gerald','45','SF'),(30,2,'Anderson','Alan','6','SG'),(31,2,'Blatche','Andray','0','C'),(32,2,'Evans','Reggie','30','PF'),(33,2,'Garnett','Kevin','2','PF'),(34,2,'Johnson','Joe','7','SG'),(35,2,'Kirilenko','Andrei','47','SF'),(36,2,'Livingston','Shaun','14','PG'),(37,2,'Lopez','Brook','11','C'),(38,2,'Pierce','Paul','34','SF'),(39,2,'Plumlee','Mason','1','PF'),(40,2,'Shengelia','Tornike','20','SF'),(41,2,'Taylor','Tyshawn','10','PG'),(42,2,'Teletovic','Mirza','33','PF'),(43,2,'Terry','Jason','31','SG'),(44,2,'Williams','Deron','8','PG'),(45,6,'Augustin','D.J.','14','PG'),(46,6,'Boozer','Carlos','5','PF'),(47,6,'Butler','Jimmy','21','SG'),(48,6,'Deng','Luol','9','SF'),(49,6,'Dunleavy','Mike','34','SF'),(50,6,'Gibson','Taj','22','PF'),(51,6,'Hinrich','Kirk','12','SG'),(52,6,'James','Mike','8','PG'),(53,6,'Mohammed','Nazr','48','C'),(54,6,'Murphy','Erik','31','PF'),(55,6,'Noah','Joakim','13','C'),(56,6,'Rose','Derrick','1','PG'),(57,6,'Snell','Tony','20','SF'),(58,6,'Teague','Marquis','25','PG'),(59,12,'Adrien','Jeff','4','PF'),(60,12,'Biyombo','Bismack','0','C'),(61,12,'Douglas-Roberts','Chris','17','SG'),(62,12,'Gordon','Ben','8','SG'),(63,12,'Haywood','Brendan','33','C'),(64,12,'Henderson','Gerald','9','SG'),(65,12,'Jefferson','Al','25','C'),(66,12,'Kidd-Gilchrist','Michael','14','SF'),(67,12,'McRoberts','Josh','11','PF'),(68,12,'Pargo','Jannero','5','PG'),(69,12,'Sessions','Ramon','7','PG'),(70,12,'Taylor','Jeff','44','SG'),(71,12,'Tolliver','Anthony','43','PF'),(72,12,'Walker','Kemba','15','PG'),(73,12,'Zeller','Cody','40','C'),(74,11,'Antic','Pero','6','C'),(75,11,'Ayon','Gustavo','14','PF'),(76,11,'Brand','Elton','42','PF'),(77,11,'Carroll','DeMarre','5','SF'),(78,11,'Cunningham','Jared','7','SG'),(79,11,'Horford','Al','15','C'),(80,11,'Jenkins','John','12','SG'),(81,11,'Korver','Kyle','26','SG'),(82,11,'Mack','Shelvin','8','PG'),(83,11,'Martin','Cartier','20','SF'),(84,11,'Millsap','Paul','4','PF'),(85,11,'Schroder','Dennis','17','PG'),(86,11,'Scott','Mike','32','PF'),(87,11,'Teague','Jeff','0','PG'),(88,11,'Williams','Louis','3','SG');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plays_in`
--

DROP TABLE IF EXISTS `plays_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plays_in` (
  `player` int(11) NOT NULL DEFAULT '0',
  `game` int(11) NOT NULL DEFAULT '0',
  `team` int(11) DEFAULT NULL,
  `reb` tinyint(4) DEFAULT NULL,
  `o_reb` tinyint(4) DEFAULT NULL,
  `assts` tinyint(4) DEFAULT NULL,
  `pf` tinyint(4) DEFAULT NULL,
  `blks` tinyint(4) DEFAULT NULL,
  `turnvr` tinyint(4) DEFAULT NULL,
  `fg2miss` tinyint(4) DEFAULT NULL,
  `fg2made` tinyint(4) DEFAULT NULL,
  `fg3miss` tinyint(4) DEFAULT NULL,
  `fg3made` tinyint(4) DEFAULT NULL,
  `ft_miss` tinyint(4) DEFAULT NULL,
  `ft_made` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`player`,`game`),
  KEY `game` (`game`),
  CONSTRAINT `plays_in_ibfk_1` FOREIGN KEY (`player`) REFERENCES `player` (`player_id`),
  CONSTRAINT `plays_in_ibfk_2` FOREIGN KEY (`game`) REFERENCES `game` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plays_in`
--

LOCK TABLES `plays_in` WRITE;
/*!40000 ALTER TABLE `plays_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `plays_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  PRIMARY KEY (`team_id`),
  UNIQUE KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Boston','Celtics'),(2,'Brooklyn','Nets'),(3,'New York','Knicks'),(4,'Philadelphia','76ers'),(5,'Toronto','Raptors'),(6,'Chicago','Bulls'),(7,'Cleveland','Cavaliers'),(8,'Detroit','Pistons'),(9,'Indiana','Pacers'),(10,'Milwaukee','Bucks'),(11,'Atlanta','Hawks'),(12,'Charlotte','Bobcats'),(13,'Miami','Heat'),(14,'Orlando','Magic'),(15,'Washington','Wizards'),(16,'Dallas','Mavericks'),(17,'Houston','Rockets'),(18,'Memphis','Grizzlies'),(19,'New Orleans','Pelicans'),(20,'San Antonio','Spurs'),(21,'Denver','Nuggets'),(22,'Minnesota','Timberwolves'),(23,'Portland Trail','Blazers'),(24,'Oklahoma City','Thunder'),(25,'Utah','Jazz'),(26,'Golden State','Warriors'),(27,'Los Angeles','Clippers'),(28,'Los Angeles','Lakers'),(29,'Phoenix','Suns'),(30,'Sacramento','Kings');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-16  7:34:03
