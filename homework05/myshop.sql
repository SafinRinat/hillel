-- MySQL dump 10.15  Distrib 10.0.28-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.28-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(200) NOT NULL DEFAULT '',
  `last_name` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `idx_login` (`login`),
  KEY `idx_first_name` (`first_name`),
  KEY `idx_last_name` (`last_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'admin','admin','admin','admin'),(2,'manager','manager','manager','manager'),(3,'user1','123','Ivan','Ivanov'),(4,'user2','123','Sergey','Chapaev'),(5,'user3','123','Irina','Mihalkova'),(6,'user4','123','Anna','Markova'),(7,'kmm','r123','Kimmy','Granger'),(8,'mll','r321','Molly','Jane');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_comment` text NOT NULL,
  `web_site` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufactures`
--

LOCK TABLES `manufactures` WRITE;
/*!40000 ALTER TABLE `manufactures` DISABLE KEYS */;
INSERT INTO `manufactures` VALUES (1,'Apple','Apple is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services. Its hardware products include the iPhone smartphone, the iPad tablet computer, the Mac personal computer, the iPod portable media player, the Apple Watch smartwatch, and the Apple TV digital media player. Apple\'s consumer software includes the macOS and iOS operating systems, the iTunes media player, the Safari web browser, and the iLife and iWork creativity and productivity suites. Its online services include the iTunes Store, the iOS App Store and Mac App Store, Apple Music, and iCloud.',''),(2,'Samsung','Samsung Electronics Co., Ltd. (Korean: 삼성전자; Hanja: 三星電子 (Literally \'3 star electronics\') (stylized as SΛMSUNG) is a South Korean multinational electronics company headquartered in Suwon, South Korea. Through extremely complicated ownership structure with some circular ownership it is the flagship division of the Samsung Group, accounting for 70% of the group\'s revenue in 2012. It is the world\'s second largest information technology company by revenue, after Apple. Samsung Electronics has assembly plants and sales networks in 80 countries and employs around 370,000 people. Since 2012, Kwon Oh-hyun has served as the company\'s CEO.',''),(3,'Meizu','Meizu Technology Co., Ltd. (Chinese: 魅族科技有限公司; pinyin: Mèizú Kējì Yǒuxiàn Gōngsī) is a Chinese consumer electronics company based in Zhuhai, Guangdong. Founded in 2003, Meizu began as a manufacturer of MP3 plaers and later MP4 players. As of 2008, Meizu moved its focus from MP3 and MP4 players to smartphones, with their first smartphone being the Meizu M8. Meizu is one of the top ten smartphone manufacturers in China with 8.9 million units sold worldwide in the first half of 2015.',''),(4,'Xiaomi','Xiaomi Inc. (Chinese Mandarin: [ɕi̯àu̯mì] ( listen), Chinese: 小米科技; pinyin: Xiǎomǐ Kējì, literally \'millet technology\'; English pronunciation: /ˌʃiaʊˈmiː/ or /ʃiˌaʊˈmiː/) is a privately owned Chinese electronics company headquartered in Beijing. It is the world\'s 4th largest smartphone maker. Xiaomi designs, develops, and sells smartphones, mobile apps, laptops, and related consumer electronics.','');
/*!40000 ALTER TABLE `manufactures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_man` int(11) NOT NULL,
  `model` varchar(200) NOT NULL DEFAULT '',
  `price` double NOT NULL,
  `short_description` text,
  `description` text,
  `count_items` int(255) DEFAULT NULL,
  `beg_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `sale` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_price` (`price`),
  KEY `idx_model` (`model`),
  KEY `idx_count` (`count_items`),
  KEY `idx_sale` (`sale`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,0,'Product 1',22.13,NULL,NULL,NULL,NULL,NULL,NULL),(2,0,'Product 2',15.19,NULL,NULL,NULL,NULL,NULL,NULL),(3,0,'Product 3',55.11,NULL,NULL,NULL,NULL,NULL,NULL),(4,0,'Product 4',18.18,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,'Product 5',88.77,NULL,NULL,NULL,NULL,NULL,NULL),(6,0,'ProductSale 1',124.421,NULL,NULL,10,NULL,NULL,NULL),(7,0,'ProductSale 2',22.55,NULL,NULL,5,NULL,NULL,NULL),(8,0,'ProductSale 3',4.14,NULL,NULL,1,NULL,NULL,NULL),(9,0,'ProductSale 4',78.1,NULL,NULL,10,NULL,NULL,NULL),(10,0,'ProductSale 5',86.18,NULL,NULL,10,NULL,NULL,NULL),(11,0,'ProductPeriod 1',44.44,NULL,NULL,NULL,'2016-12-07 00:00:00','0000-00-00 00:00:00',NULL),(12,0,'ProductPeriod 2',55.55,NULL,NULL,NULL,'2016-12-13 00:00:00','0000-00-00 00:00:00',NULL),(13,0,'ProductPeriod 3',11.22,NULL,NULL,NULL,'2016-12-16 00:00:00','0000-00-00 00:00:00',NULL),(14,0,'ProductPeriod 4',13.13,NULL,NULL,NULL,'2016-12-12 00:00:00','0000-00-00 00:00:00',NULL),(15,0,'ProductPeriod 5',67.76,NULL,NULL,NULL,'2016-12-21 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-22 19:50:00
