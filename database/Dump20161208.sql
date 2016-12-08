-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: gaotie
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `ad_table`
--

DROP TABLE IF EXISTS `ad_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_table` (
  `task_id` int(11) NOT NULL,
  `url` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_table`
--

LOCK TABLES `ad_table` WRITE;
/*!40000 ALTER TABLE `ad_table` DISABLE KEYS */;
INSERT INTO `ad_table` VALUES (3,'resource/adviertisement/public/1481180086e6ed.mp4');
/*!40000 ALTER TABLE `ad_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `device_id` varchar(50) NOT NULL,
  `task_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `answer` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(45) NOT NULL,
  PRIMARY KEY (`device_id`,`task_id`,`time`,`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES ('dec110',1,1,'/1','1481099308'),('dec110',1,2,'1','1481099308'),('dec110',1,3,'1111','1481099308'),('dec110',1,1,'/2','1481115272'),('dec110',1,2,'2','1481115272'),('dec110',1,3,'555','1481115272');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device` (
  `device_id` varchar(50) NOT NULL,
  `left_bandwidth` int(10) unsigned NOT NULL DEFAULT '50',
  `totaluse` int(10) unsigned NOT NULL DEFAULT '0',
  `permission` int(11) NOT NULL DEFAULT '0',
  `ison` int(11) DEFAULT '0',
  PRIMARY KEY (`device_id`),
  UNIQUE KEY `device_id_UNIQUE` (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device`
--

LOCK TABLES `device` WRITE;
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
INSERT INTO `device` VALUES ('dec110',6133,0,3,0),('dec111',2048,0,1,1),('dec120',2048,0,1,0),('fds',2048,0,0,0),('ffffffff-afeb-80f8-750e-a574421f8268',2048,0,0,0),('ok',2048,0,0,0),('sdc555',35,15,0,0),('sdsa',50,0,0,0),('ssa',50,0,0,0);
/*!40000 ALTER TABLE `device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_history`
--

DROP TABLE IF EXISTS `device_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_history` (
  `device_id` varchar(50) NOT NULL,
  `left_bandwidth` int(10) unsigned NOT NULL,
  `totaluse` int(10) unsigned NOT NULL,
  `permission` int(10) NOT NULL,
  PRIMARY KEY (`device_id`),
  UNIQUE KEY `device_id_UNIQUE` (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_history`
--

LOCK TABLES `device_history` WRITE;
/*!40000 ALTER TABLE `device_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `device_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionnaire` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`task_id`,`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire`
--

LOCK TABLES `questionnaire` WRITE;
/*!40000 ALTER TABLE `questionnaire` DISABLE KEYS */;
INSERT INTO `questionnaire` VALUES (1,1,'要是旅游的话你更愿意去哪个城市','多选题'),(1,2,'你喜欢几个人去旅游','单选题'),(1,3,'对本次旅途的感想','文本框'),(2,1,'性别','单选题'),(2,2,'家庭所在城市','文本框'),(2,3,'年龄','单选题');
/*!40000 ALTER TABLE `questionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resoure_tb`
--

DROP TABLE IF EXISTS `resoure_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resoure_tb` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(80) DEFAULT NULL,
  `res_name` varchar(45) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resoure_tb`
--

LOCK TABLES `resoure_tb` WRITE;
/*!40000 ALTER TABLE `resoure_tb` DISABLE KEYS */;
INSERT INTO `resoure_tb` VALUES (7,'resource/adviertisement/private/14812012929p9m.mp4','dota1',1),(8,'resource/adviertisement/private/1481201481ibzk.mp4','小沈阳搞笑',3);
/*!40000 ALTER TABLE `resoure_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `task_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_detail` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`task_id`,`subject_id`,`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,1,1,'重庆'),(1,1,2,'成都'),(1,1,3,'西安'),(1,1,4,'石家庄'),(1,2,1,'一个人'),(1,2,2,'两个人'),(1,2,3,'三个人'),(1,2,4,'多于三个人'),(2,1,1,'男'),(2,1,2,'女'),(2,3,1,'10岁以下'),(2,3,2,'10-30'),(2,3,3,'30岁以上');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_done`
--

DROP TABLE IF EXISTS `task_done`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_done` (
  `task_id` int(11) NOT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_done`
--

LOCK TABLES `task_done` WRITE;
/*!40000 ALTER TABLE `task_done` DISABLE KEYS */;
INSERT INTO `task_done` VALUES (1,'dec110'),(3,'dec110');
/*!40000 ALTER TABLE `task_done` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_table`
--

DROP TABLE IF EXISTS `task_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_table` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bandwidth` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  UNIQUE KEY `task_id_UNIQUE` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_table`
--

LOCK TABLES `task_table` WRITE;
/*!40000 ALTER TABLE `task_table` DISABLE KEYS */;
INSERT INTO `task_table` VALUES (1,'旅游意愿调查',1024,3,1),(2,'个人信息调查',1024,1,1),(3,'捡垃圾公益视频',1024,1,2);
/*!40000 ALTER TABLE `task_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-08 22:17:11
