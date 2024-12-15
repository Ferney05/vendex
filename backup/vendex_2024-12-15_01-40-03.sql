-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: vendex
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `beverage_inventory`
--

DROP TABLE IF EXISTS `beverage_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverage_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_name` varchar(100) NOT NULL,
  `purchase_price` decimal(50,0) NOT NULL,
  `sale_price` decimal(50,0) NOT NULL,
  `available_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverage_inventory`
--

LOCK TABLES `beverage_inventory` WRITE;
/*!40000 ALTER TABLE `beverage_inventory` DISABLE KEYS */;
INSERT INTO `beverage_inventory` VALUES (2,'cocacola',2200,3600,450);
/*!40000 ALTER TABLE `beverage_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_store`
--

DROP TABLE IF EXISTS `cart_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `cart_stock` int(11) NOT NULL,
  `sale_price` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_store`
--

LOCK TABLES `cart_store` WRITE;
/*!40000 ALTER TABLE `cart_store` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_restaurant`
--

DROP TABLE IF EXISTS `categories_restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_restaurant`
--

LOCK TABLES `categories_restaurant` WRITE;
/*!40000 ALTER TABLE `categories_restaurant` DISABLE KEYS */;
INSERT INTO `categories_restaurant` VALUES (1,'Alimentos'),(2,'Alimentos'),(3,'jugar'),(4,'Bebidas');
/*!40000 ALTER TABLE `categories_restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_store`
--

DROP TABLE IF EXISTS `categories_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_store`
--

LOCK TABLES `categories_store` WRITE;
/*!40000 ALTER TABLE `categories_store` DISABLE KEYS */;
INSERT INTO `categories_store` VALUES (1,'Alimentos'),(3,'Aceites y Grasas'),(4,'Endulzantes');
/*!40000 ALTER TABLE `categories_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credits`
--

DROP TABLE IF EXISTS `credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) NOT NULL,
  `amount_borrowed` decimal(50,0) NOT NULL,
  `creation_date` date NOT NULL,
  `fertilizers` decimal(50,0) NOT NULL,
  `credit_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credits`
--

LOCK TABLES `credits` WRITE;
/*!40000 ALTER TABLE `credits` DISABLE KEYS */;
INSERT INTO `credits` VALUES (3,'Andrés',3000,'2024-12-11',2000,'Pendiente'),(4,'Juan',7500,'2024-12-11',0,'Pendiente'),(7,'Andrés',3000,'2024-12-11',2000,'Pendiente'),(8,'Juan',7500,'2024-12-11',0,'Pendiente'),(9,'Nombre del cliente',3500,'2024-12-11',0,'Pendiente'),(11,'Andrés',3000,'2024-12-11',0,'Pendiente'),(12,'ferney',3500,'2024-12-11',0,'Pendiente'),(13,'Juan',7500,'2024-12-11',0,'Pendiente'),(14,'Nombre del cliente',3500,'2024-12-11',0,'Pendiente'),(15,'',4700,'2024-12-11',0,'Pendiente'),(16,'Andrés',3000,'2024-12-11',0,'Pendiente'),(17,'ferney',3500,'2024-12-11',0,'Pendiente'),(18,'Juan',7500,'2024-12-11',0,'Pendiente'),(19,'Nombre del cliente',3500,'2024-12-11',0,'Pendiente'),(20,'',4700,'2024-12-14',0,'Pendiente'),(21,'Andrés',3000,'2024-12-14',0,'Pendiente'),(22,'ferney',3500,'2024-12-14',0,'Pendiente'),(23,'Juan',7500,'2024-12-14',0,'Pendiente'),(24,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(25,'',14700,'2024-12-14',0,'Pendiente'),(26,'Andrés',3000,'2024-12-14',0,'Pendiente'),(27,'ferney',3500,'2024-12-14',0,'Pendiente'),(28,'Juan',7500,'2024-12-14',0,'Pendiente'),(29,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(30,'',14900,'2024-12-14',0,'Pendiente'),(31,'Andrés',3000,'2024-12-14',0,'Pendiente'),(32,'ferney',3500,'2024-12-14',0,'Pendiente'),(33,'Juan',7500,'2024-12-14',0,'Pendiente'),(34,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(35,'',14900,'2024-12-14',0,'Pendiente'),(36,'Andrés',3000,'2024-12-14',0,'Pendiente'),(37,'ferney',5500,'2024-12-14',0,'Pendiente'),(38,'Juan',7500,'2024-12-14',0,'Pendiente'),(39,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(40,'',14900,'2024-12-14',0,'Pendiente'),(41,'Andrés',3000,'2024-12-14',0,'Pendiente'),(42,'ferney',5500,'2024-12-14',0,'Pendiente'),(43,'Juan',7500,'2024-12-14',0,'Pendiente'),(44,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(45,'',14900,'2024-12-14',0,'Pendiente'),(46,'Andrés',3000,'2024-12-14',0,'Pendiente'),(47,'ferney',5500,'2024-12-14',0,'Pendiente'),(48,'Juan',7500,'2024-12-14',0,'Pendiente'),(49,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(50,'',14900,'2024-12-14',0,'Pendiente'),(51,'Andrés',3000,'2024-12-14',0,'Pendiente'),(52,'ferney',5500,'2024-12-14',0,'Pendiente'),(53,'Juan',7500,'2024-12-14',0,'Pendiente'),(54,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(55,'',14900,'2024-12-14',0,'Pendiente'),(56,'Andrés',3000,'2024-12-14',0,'Pendiente'),(57,'ferney',5500,'2024-12-14',0,'Pendiente'),(58,'Juan',7500,'2024-12-14',0,'Pendiente'),(59,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(60,'sheila',200,'2024-12-14',0,'Pendiente'),(61,'',14900,'2024-12-14',0,'Pendiente'),(62,'Andrés',3000,'2024-12-14',0,'Pendiente'),(63,'ferney',5500,'2024-12-14',0,'Pendiente'),(64,'Juan',7500,'2024-12-14',0,'Pendiente'),(65,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(66,'sheila',200,'2024-12-14',0,'Pendiente'),(67,'',14900,'2024-12-14',0,'Pendiente'),(68,'Andrés',3000,'2024-12-14',0,'Pendiente'),(69,'ferney',5500,'2024-12-14',0,'Pendiente'),(70,'Juan',7500,'2024-12-14',0,'Pendiente'),(71,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(72,'sheila',200,'2024-12-14',0,'Pendiente'),(73,'',14900,'2024-12-14',0,'Pendiente'),(74,'Andrés',3000,'2024-12-14',0,'Pendiente'),(75,'ferney',5500,'2024-12-14',0,'Pendiente'),(76,'Juan',7500,'2024-12-14',0,'Pendiente'),(77,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(78,'sheila',200,'2024-12-14',0,'Pendiente'),(79,'',14900,'2024-12-14',0,'Pendiente'),(80,'Andrés',3000,'2024-12-14',0,'Pendiente'),(81,'ferney',5500,'2024-12-14',0,'Pendiente'),(82,'Juan',7500,'2024-12-14',0,'Pendiente'),(83,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(84,'sheila',200,'2024-12-14',0,'Pendiente'),(85,'',14900,'2024-12-14',0,'Pendiente'),(86,'Andrés',3000,'2024-12-14',0,'Pendiente'),(87,'ferney',5500,'2024-12-14',0,'Pendiente'),(88,'Juan',7500,'2024-12-14',0,'Pendiente'),(89,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(90,'sheila',200,'2024-12-14',0,'Pendiente'),(91,'',14900,'2024-12-14',0,'Pendiente'),(92,'Andrés',3000,'2024-12-14',0,'Pendiente'),(93,'ferney',5500,'2024-12-14',0,'Pendiente'),(94,'Juan',7500,'2024-12-14',0,'Pendiente'),(95,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(96,'sheila',200,'2024-12-14',0,'Pendiente'),(97,'',14900,'2024-12-14',0,'Pendiente'),(98,'Andrés',3000,'2024-12-14',0,'Pendiente'),(99,'ferney',5500,'2024-12-14',0,'Pendiente'),(100,'Juan',7500,'2024-12-14',0,'Pendiente'),(101,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(102,'sheila',200,'2024-12-14',0,'Pendiente'),(103,'',14900,'2024-12-14',0,'Pendiente'),(104,'Andrés',3000,'2024-12-14',0,'Pendiente'),(105,'ferney',5500,'2024-12-14',0,'Pendiente'),(106,'Juan',7500,'2024-12-14',0,'Pendiente'),(107,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(108,'sheila',200,'2024-12-14',0,'Pendiente'),(109,'',14900,'2024-12-14',0,'Pendiente'),(110,'Andrés',3000,'2024-12-14',0,'Pendiente'),(111,'ferney',5500,'2024-12-14',0,'Pendiente'),(112,'Juan',7500,'2024-12-14',0,'Pendiente'),(113,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(114,'sheila',200,'2024-12-14',0,'Pendiente'),(115,'',14900,'2024-12-14',0,'Pendiente'),(116,'Andrés',3000,'2024-12-14',0,'Pendiente'),(117,'ferney',5500,'2024-12-14',0,'Pendiente'),(118,'Juan',7500,'2024-12-14',0,'Pendiente'),(119,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(120,'sheila',200,'2024-12-14',0,'Pendiente'),(121,'',14900,'2024-12-14',0,'Pendiente'),(122,'Andrés',3000,'2024-12-14',0,'Pendiente'),(123,'ferney',5500,'2024-12-14',0,'Pendiente'),(124,'Juan',7500,'2024-12-14',0,'Pendiente'),(125,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(126,'sheila',200,'2024-12-14',0,'Pendiente'),(127,'',14900,'2024-12-14',0,'Pendiente'),(128,'Andrés',3000,'2024-12-14',0,'Pendiente'),(129,'ferney',5500,'2024-12-14',0,'Pendiente'),(130,'Juan',7500,'2024-12-14',0,'Pendiente'),(131,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(132,'sheila',200,'2024-12-14',0,'Pendiente'),(133,'',14900,'2024-12-14',0,'Pendiente'),(134,'Andrés',3000,'2024-12-14',0,'Pendiente'),(135,'ferney',5500,'2024-12-14',0,'Pendiente'),(136,'Juan',7500,'2024-12-14',0,'Pendiente'),(137,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(138,'sheila',200,'2024-12-14',0,'Pendiente'),(139,'',14900,'2024-12-14',0,'Pendiente'),(140,'Andrés',3000,'2024-12-14',0,'Pendiente'),(141,'ferney',5500,'2024-12-14',0,'Pendiente'),(142,'Juan',7500,'2024-12-14',0,'Pendiente'),(143,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(144,'sheila',200,'2024-12-14',0,'Pendiente'),(145,'',14900,'2024-12-14',0,'Pendiente'),(146,'Andrés',3000,'2024-12-14',0,'Pendiente'),(147,'ferney',5500,'2024-12-14',0,'Pendiente'),(148,'Juan',7500,'2024-12-14',0,'Pendiente'),(149,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(150,'sheila',200,'2024-12-14',0,'Pendiente'),(151,'',14900,'2024-12-14',0,'Pendiente'),(152,'Andrés',3000,'2024-12-14',0,'Pendiente'),(153,'ferney',5500,'2024-12-14',0,'Pendiente'),(154,'Juan',7500,'2024-12-14',0,'Pendiente'),(155,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(156,'sheila',200,'2024-12-14',0,'Pendiente'),(157,'',14900,'2024-12-14',0,'Pendiente'),(158,'Andrés',3000,'2024-12-14',0,'Pendiente'),(159,'ferney',5500,'2024-12-14',0,'Pendiente'),(160,'Juan',7500,'2024-12-14',0,'Pendiente'),(161,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(162,'sheila',200,'2024-12-14',0,'Pendiente'),(163,'',14900,'2024-12-14',0,'Pendiente'),(164,'Andrés',3000,'2024-12-14',0,'Pendiente'),(165,'ferney',5500,'2024-12-14',0,'Pendiente'),(166,'Juan',7500,'2024-12-14',0,'Pendiente'),(167,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(168,'sheila',200,'2024-12-14',0,'Pendiente'),(169,'',14900,'2024-12-14',0,'Pendiente'),(170,'Andrés',3000,'2024-12-14',0,'Pendiente'),(171,'ferney',5500,'2024-12-14',0,'Pendiente'),(172,'Juan',7500,'2024-12-14',0,'Pendiente'),(173,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(174,'sheila',200,'2024-12-14',0,'Pendiente'),(175,'',14900,'2024-12-14',0,'Pendiente'),(176,'Andrés',3000,'2024-12-14',0,'Pendiente'),(177,'ferney',5500,'2024-12-14',0,'Pendiente'),(178,'Juan',7500,'2024-12-14',0,'Pendiente'),(179,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(180,'sheila',200,'2024-12-14',0,'Pendiente'),(181,'',14900,'2024-12-14',0,'Pendiente'),(182,'Andrés',3000,'2024-12-14',0,'Pendiente'),(183,'ferney',5500,'2024-12-14',0,'Pendiente'),(184,'Juan',7500,'2024-12-14',0,'Pendiente'),(185,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(186,'sheila',200,'2024-12-14',0,'Pendiente'),(187,'',14900,'2024-12-14',0,'Pendiente'),(188,'Andrés',3000,'2024-12-14',0,'Pendiente'),(189,'ferney',5500,'2024-12-14',0,'Pendiente'),(190,'Juan',7500,'2024-12-14',0,'Pendiente'),(191,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(192,'sheila',200,'2024-12-14',0,'Pendiente'),(193,'',14900,'2024-12-14',0,'Pendiente'),(194,'Andrés',3000,'2024-12-14',0,'Pendiente'),(195,'ferney',5500,'2024-12-14',0,'Pendiente'),(196,'Juan',7500,'2024-12-14',0,'Pendiente'),(197,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(198,'sheila',200,'2024-12-14',0,'Pendiente'),(199,'',14900,'2024-12-14',0,'Pendiente'),(200,'Andrés',3000,'2024-12-14',0,'Pendiente'),(201,'ferney',5500,'2024-12-14',0,'Pendiente'),(202,'Juan',7500,'2024-12-14',0,'Pendiente'),(203,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(204,'sheila',200,'2024-12-14',0,'Pendiente'),(205,'',14900,'2024-12-14',0,'Pendiente'),(206,'Andrés',3000,'2024-12-14',0,'Pendiente'),(207,'ferney',5500,'2024-12-14',0,'Pendiente'),(208,'Juan',7500,'2024-12-14',0,'Pendiente'),(209,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(210,'sheila',200,'2024-12-14',0,'Pendiente'),(211,'',14900,'2024-12-14',0,'Pendiente'),(212,'Andrés',3000,'2024-12-14',0,'Pendiente'),(213,'ferney',5500,'2024-12-14',0,'Pendiente'),(214,'Juan',7500,'2024-12-14',0,'Pendiente'),(215,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(216,'sheila',200,'2024-12-14',0,'Pendiente'),(217,'',14900,'2024-12-14',0,'Pendiente'),(218,'Andrés',3000,'2024-12-14',0,'Pendiente'),(219,'ferney',5500,'2024-12-14',0,'Pendiente'),(220,'Juan',7500,'2024-12-14',0,'Pendiente'),(221,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(222,'sheila',200,'2024-12-14',0,'Pendiente'),(223,'',14900,'2024-12-14',0,'Pendiente'),(224,'Andrés',3000,'2024-12-14',0,'Pendiente'),(225,'ferney',5500,'2024-12-14',0,'Pendiente'),(226,'Juan',7500,'2024-12-14',0,'Pendiente'),(227,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(228,'sheila',200,'2024-12-14',0,'Pendiente'),(229,'',14900,'2024-12-14',0,'Pendiente'),(230,'Andrés',3000,'2024-12-14',0,'Pendiente'),(231,'ferney',5500,'2024-12-14',0,'Pendiente'),(232,'Juan',7500,'2024-12-14',0,'Pendiente'),(233,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(234,'sheila',200,'2024-12-14',0,'Pendiente'),(235,'',14900,'2024-12-14',0,'Pendiente'),(236,'Andrés',3000,'2024-12-14',0,'Pendiente'),(237,'ferney',5500,'2024-12-14',0,'Pendiente'),(238,'Juan',7500,'2024-12-14',0,'Pendiente'),(239,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(240,'sheila',200,'2024-12-14',0,'Pendiente'),(241,'',14900,'2024-12-14',0,'Pendiente'),(242,'Andrés',3000,'2024-12-14',0,'Pendiente'),(243,'ferney',5500,'2024-12-14',0,'Pendiente'),(244,'Juan',7500,'2024-12-14',0,'Pendiente'),(245,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(246,'sheila',200,'2024-12-14',0,'Pendiente'),(247,'',14900,'2024-12-14',0,'Pendiente'),(248,'Andrés',3000,'2024-12-14',0,'Pendiente'),(249,'ferney',5500,'2024-12-14',0,'Pendiente'),(250,'Juan',7500,'2024-12-14',0,'Pendiente'),(251,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(252,'sheila',200,'2024-12-14',0,'Pendiente'),(253,'',14900,'2024-12-14',0,'Pendiente'),(254,'Andrés',3000,'2024-12-14',0,'Pendiente'),(255,'ferney',5500,'2024-12-14',0,'Pendiente'),(256,'Juan',7500,'2024-12-14',0,'Pendiente'),(257,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(258,'sheila',200,'2024-12-14',0,'Pendiente'),(259,'',14900,'2024-12-14',0,'Pendiente'),(260,'Andrés',3000,'2024-12-14',0,'Pendiente'),(261,'ferney',5500,'2024-12-14',0,'Pendiente'),(262,'Juan',7500,'2024-12-14',0,'Pendiente'),(263,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(264,'sheila',200,'2024-12-14',0,'Pendiente'),(265,'',14900,'2024-12-14',0,'Pendiente'),(266,'Andrés',3000,'2024-12-14',0,'Pendiente'),(267,'ferney',5500,'2024-12-14',0,'Pendiente'),(268,'Juan',7500,'2024-12-14',0,'Pendiente'),(269,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(270,'sheila',200,'2024-12-14',0,'Pendiente'),(271,'',14900,'2024-12-14',0,'Pendiente'),(272,'Andrés',3000,'2024-12-14',0,'Pendiente'),(273,'ferney',5500,'2024-12-14',0,'Pendiente'),(274,'Juan',7500,'2024-12-14',0,'Pendiente'),(275,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(276,'sheila',200,'2024-12-14',0,'Pendiente'),(277,'',14900,'2024-12-14',0,'Pendiente'),(278,'Andrés',3000,'2024-12-14',0,'Pendiente'),(279,'ferney',5500,'2024-12-14',0,'Pendiente'),(280,'Juan',7500,'2024-12-14',0,'Pendiente'),(281,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(282,'sheila',200,'2024-12-14',0,'Pendiente'),(283,'',14900,'2024-12-14',0,'Pendiente'),(284,'Andrés',3000,'2024-12-14',0,'Pendiente'),(285,'ferney',5500,'2024-12-14',0,'Pendiente'),(286,'Juan',7500,'2024-12-14',0,'Pendiente'),(287,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(288,'sheila',200,'2024-12-14',0,'Pendiente'),(289,'',14900,'2024-12-14',0,'Pendiente'),(290,'Andrés',3000,'2024-12-14',0,'Pendiente'),(291,'ferney',5500,'2024-12-14',0,'Pendiente'),(292,'Juan',7500,'2024-12-14',0,'Pendiente'),(293,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(294,'sheila',200,'2024-12-14',0,'Pendiente'),(295,'',14900,'2024-12-14',0,'Pendiente'),(296,'Andrés',3000,'2024-12-14',0,'Pendiente'),(297,'ferney',5500,'2024-12-14',0,'Pendiente'),(298,'Juan',7500,'2024-12-14',0,'Pendiente'),(299,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(300,'sheila',200,'2024-12-14',0,'Pendiente'),(301,'',14900,'2024-12-14',0,'Pendiente'),(302,'Andrés',3000,'2024-12-14',0,'Pendiente'),(303,'ferney',5500,'2024-12-14',0,'Pendiente'),(304,'Juan',7500,'2024-12-14',0,'Pendiente'),(305,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(306,'sheila',200,'2024-12-14',0,'Pendiente'),(307,'',14900,'2024-12-14',0,'Pendiente'),(308,'Andrés',3000,'2024-12-14',0,'Pendiente'),(309,'ferney',5500,'2024-12-14',0,'Pendiente'),(310,'Juan',7500,'2024-12-14',0,'Pendiente'),(311,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(312,'sheila',200,'2024-12-14',0,'Pendiente'),(313,'',14900,'2024-12-14',0,'Pendiente'),(314,'Andrés',3000,'2024-12-14',0,'Pendiente'),(315,'ferney',5500,'2024-12-14',0,'Pendiente'),(316,'Juan',7500,'2024-12-14',0,'Pendiente'),(317,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(318,'sheila',200,'2024-12-14',0,'Pendiente'),(319,'',14900,'2024-12-14',0,'Pendiente'),(320,'Andrés',3000,'2024-12-14',0,'Pendiente'),(321,'ferney',5500,'2024-12-14',0,'Pendiente'),(322,'Juan',7500,'2024-12-14',0,'Pendiente'),(323,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(324,'sheila',200,'2024-12-14',0,'Pendiente'),(325,'',14900,'2024-12-14',0,'Pendiente'),(326,'Andrés',3000,'2024-12-14',0,'Pendiente'),(327,'ferney',5500,'2024-12-14',0,'Pendiente'),(328,'Juan',7500,'2024-12-14',0,'Pendiente'),(329,'Nombre del cliente',3500,'2024-12-14',0,'Pendiente'),(330,'sheila',200,'2024-12-14',0,'Pendiente');
/*!40000 ALTER TABLE `credits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_employee` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_number` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `employee_position` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `type_contract` varchar(100) NOT NULL,
  `emergency_contact` varchar(100) NOT NULL,
  `emergency_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Ferney Barbosa','barbosaferney05@gmail.com','Calle 21A #1A - 34','CC','1042996313','3008557349','Administrador','2024-11-19','Tiempo completo','Martha Perez','1234566789');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name_ingredient` varchar(100) NOT NULL,
  `quantity_stock` int(11) NOT NULL,
  `purchase_price` decimal(50,0) NOT NULL,
  `minimum_stock` int(11) NOT NULL,
  `ingredient_status` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,1,'Papas',74,1500,10,'Activo','kg','2024-11-19'),(3,1,'Pan',15,500,10,'Activo','unidad','2024-11-23'),(4,1,'Harina',34,1800,5,'Activo','unidad','2024-11-23');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients_of_dish`
--

DROP TABLE IF EXISTS `ingredients_of_dish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients_of_dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dish` int(11) NOT NULL,
  `name_ingredient` varchar(100) NOT NULL,
  `stock_taken` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `cost` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients_of_dish`
--

LOCK TABLES `ingredients_of_dish` WRITE;
/*!40000 ALTER TABLE `ingredients_of_dish` DISABLE KEYS */;
INSERT INTO `ingredients_of_dish` VALUES (1,1,'Papas',3,'kg',1500),(2,1,'Salchicha',2,'unidad',2000),(3,1,'Pan',2,'unidad',500),(4,2,'Pan',2,'unidad',500),(5,2,'Salchicha',1,'unidad',2000);
/*!40000 ALTER TABLE `ingredients_of_dish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_products`
--

DROP TABLE IF EXISTS `inventory_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `purchase_price` decimal(50,0) NOT NULL,
  `sale_price` decimal(50,0) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `unit_measure` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_products`
--

LOCK TABLES `inventory_products` WRITE;
/*!40000 ALTER TABLE `inventory_products` DISABLE KEYS */;
INSERT INTO `inventory_products` VALUES (19,1,'manzana verde','Proveedor a',1500,3000,24,'fruta deliciosa','Unidades','2024-12-11'),(20,1,'Colcafé','Proveedor a',100,200,73,'bueno','Unidades','2024-12-12'),(21,1,'Pan','Proveedor a',400,500,479,'bueno','Unidades','2024-12-12'),(22,4,' Azúcar Blanca','Proveedor a',1000,2000,84,'bueno','Gramos','2024-12-12'),(23,3,'Aceite de Girasol','Proveedor a',2500,5000,103,'bueno','Litros','2024-12-12');
/*!40000 ALTER TABLE `inventory_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_cart`
--

DROP TABLE IF EXISTS `order_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `cart_stock` int(11) NOT NULL,
  `sale_price` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_cart`
--

LOCK TABLES `order_cart` WRITE;
/*!40000 ALTER TABLE `order_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_sales`
--

DROP TABLE IF EXISTS `order_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` decimal(50,0) NOT NULL,
  `sale_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_sales`
--

LOCK TABLES `order_sales` WRITE;
/*!40000 ALTER TABLE `order_sales` DISABLE KEYS */;
INSERT INTO `order_sales` VALUES (1,36000,'2024-11-19'),(2,36000,'2024-11-19'),(3,18000,'2024-11-19'),(4,54000,'2024-11-20'),(5,18000,'2024-11-21'),(7,36000,'2024-11-22');
/*!40000 ALTER TABLE `order_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_sales_details`
--

DROP TABLE IF EXISTS `order_sales_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_sales_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(50,0) NOT NULL,
  `subtotal` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sale_id` (`sale_id`),
  CONSTRAINT `order_sales_details_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `order_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_sales_details`
--

LOCK TABLES `order_sales_details` WRITE;
/*!40000 ALTER TABLE `order_sales_details` DISABLE KEYS */;
INSERT INTO `order_sales_details` VALUES (1,1,'Salchipapas',2,18000,36000),(2,2,'Salchipapas',2,18000,36000),(3,3,'Salchipapas',1,18000,18000),(4,4,'Salchipapas',3,18000,54000),(5,5,'Salchipapas',1,18000,18000),(7,7,'Salchipapas',2,18000,36000);
/*!40000 ALTER TABLE `order_sales_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_order_details`
--

DROP TABLE IF EXISTS `pending_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `saucer` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `estimated_time` int(11) NOT NULL,
  `personalization` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_order_details`
--

LOCK TABLES `pending_order_details` WRITE;
/*!40000 ALTER TABLE `pending_order_details` DISABLE KEYS */;
INSERT INTO `pending_order_details` VALUES (2,2,'Salchipapas',1,10,'Sin papas'),(3,3,'Salchipapas',3,30,'normal'),(4,4,'Salchipapas',1,10,'Sin papas'),(6,5,'Salchipapas',2,20,'Sin papas');
/*!40000 ALTER TABLE `pending_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `type_service` varchar(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_orders`
--

LOCK TABLES `pending_orders` WRITE;
/*!40000 ALTER TABLE `pending_orders` DISABLE KEYS */;
INSERT INTO `pending_orders` VALUES (3,2,'Andrea perez','2024-11-19T15:16','Lista','Comer en el lugar','1'),(5,3,'Linda Sarmiento','2024-11-19T23:24','Lista','A domicilio','1'),(6,4,'Ferney Barbosa','2024-11-21T16:04','Lista','Comer en el lugar','1'),(8,5,'Ferney Barbosa','2024-11-22T21:16','Lista','Comer en el lugar','1');
/*!40000 ALTER TABLE `pending_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_dish` varchar(100) NOT NULL,
  `sale_price` decimal(50,0) NOT NULL,
  `prepared_time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'Salchipapas',18000,'10 min'),(2,'Perro caliente',15000,'15 min'),(3,'Pizza',25000,'15 minutos'),(5,'Malteada',10000,'10 min'),(6,'pollo azado',24500,'15 minutos'),(7,'Salvajada',23000,'15 minutos');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_details`
--

DROP TABLE IF EXISTS `sale_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(50,0) NOT NULL,
  `client` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `subtotal` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_details`
--

LOCK TABLES `sale_details` WRITE;
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
INSERT INTO `sale_details` VALUES (2,1,'','Panela',1,3000,'Nombre del cliente','','','Efectivo',3000),(3,2,'','arroz pinillar',1,3500,'Nombre del cliente','','','Efectivo',3500),(4,3,'','arroz pinillar',3,3500,'Nombre del cliente','','','',10500),(5,4,'','arroz pinillar',1,3500,'Nombre del cliente','','','A crédito',3500),(6,5,'','Panela',1,3000,'Andrés','','','A crédito',3000),(9,7,'','arroz pinillar',1,3500,'Juan','','','A crédito',3500),(10,7,'',' Azúcar Blanca 500g',2,2000,'Juan','','','A crédito',4000),(13,9,'','arroz pinillar',1,3500,'','','','A crédito',3500),(14,9,'','Pan',2,600,'','','','A crédito',1200),(15,10,'','arroz pinillar',1,3500,'','','','Efectivo',3500),(16,11,'','arroz pinillar',1,3500,'ferney','','','A crédito',3500),(17,12,'','Pan',3,600,'','','','Nequi',1800),(18,13,'','Pan',1,500,'','','','Efectivo',500),(19,27,'','Aceite de Girasol',2,5000,'','','','A crédito',10000),(20,28,'','Colcafé',1,200,'','','','A crédito',200),(21,29,'',' Azúcar Blanca',1,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','A crédito',2000),(22,30,'','Pan',2,500,'','','','Nequi',1000),(23,31,'',' Azúcar Blanca',1,2000,'','','','Efectivo',2000),(24,32,'','manzana verde',1,3000,'sheila','sheilareyes@gmail.com','321456789','Efectivo',3000),(25,33,'','Colcafé',1,200,'sheila','sheilareyes@gmail.com','32134456677','A crédito',200),(26,34,'','Pan',1,500,'','','','Efectivo',500),(27,35,'VX-ST-35',' Azúcar Blanca',1,2000,'','','','Nequi',2000),(28,36,'VX-ST-36','Pan',1,500,'','','','Efectivo',500),(29,37,'VX-ST-37',' Azúcar Blanca',1,2000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(30,37,'VX-ST-37','Aceite de Girasol',1,5000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(31,38,'VX-ST-38','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(32,39,'VX-ST-39','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(33,40,'VX-ST-40','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(34,41,'VX-ST-41','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(35,42,'VX-ST-42','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(36,43,'VX-ST-43','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(37,44,'VX-ST-44','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',200),(38,45,'VX-ST-45','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(39,46,'VX-ST-46','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',5000),(40,46,'VX-ST-46','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',200),(41,47,'VX-ST-47','Pan',2,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',1000),(42,48,'VX-ST-48','Aceite de Girasol',1,5000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(43,49,'VX-ST-49',' Azúcar Blanca',1,2000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(44,50,'VX-ST-50','manzana verde',1,3000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',3000),(45,51,'VX-ST-51','manzana verde',2,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',6000),(46,51,'VX-ST-51',' Azúcar Blanca',1,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(47,51,'VX-ST-51','Colcafé',3,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',600),(48,52,'VX-ST-52','Pan',5,500,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',2500),(49,52,'VX-ST-52',' Azúcar Blanca',1,2000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',2000),(50,52,'VX-ST-52','Colcafé',4,200,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',800),(51,53,'VX-ST-53',' Azúcar Blanca',3,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',6000),(52,53,'VX-ST-53','Pan',5,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',2500),(53,53,'VX-ST-53','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(54,53,'VX-ST-53','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(55,54,'VX-ST-54','manzana verde',1,3000,'ferney barbosa','barbosaferney05@gmail.com','3008557349','Nequi',3000),(56,54,'VX-ST-54',' Azúcar Blanca',1,2000,'ferney barbosa','barbosaferney05@gmail.com','3008557349','Nequi',2000),(57,55,'VX-ST-55','Aceite de Girasol',1,5000,'','','','Efectivo',5000),(58,56,'VX-ST-56',' Azúcar Blanca',1,2000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',2000),(59,56,'VX-ST-56','Colcafé',2,200,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',400),(60,57,'VX-ST-57',' Azúcar Blanca',1,2000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',2000),(61,57,'VX-ST-57','Colcafé',2,200,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Nequi',400),(62,58,'VX-ST-58',' Azúcar Blanca',1,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(63,59,'VX-ST-59','Aceite de Girasol',1,5000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(64,59,'VX-ST-59','manzana verde',2,3000,'ferney barbosa','ferneybarbosa05@gmail.com','3008557349','Efectivo',6000),(65,60,'VX-ST-60','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(66,60,'VX-ST-60','Colcafé',3,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',600),(67,61,'VX-ST-61','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(68,61,'VX-ST-61',' Azúcar Blanca',1,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(69,62,'VX-ST-62','Aceite de Girasol',2,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',10000),(70,62,'VX-ST-62','manzana verde',3,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',9000),(71,63,'VX-ST-63','manzana verde',2,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',6000),(72,64,'VX-ST-64','Pan',1,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',500),(73,65,'VX-ST-65','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(74,65,'VX-ST-65','Colcafé',2,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',400),(75,66,'VX-ST-66','Pan',1,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',500),(76,66,'VX-ST-66','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(77,67,'VX-ST-67','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(78,68,'VX-ST-68','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(79,69,'VX-ST-69','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(80,70,'VX-ST-70',' Azúcar Blanca',1,2000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',2000),(81,71,'VX-ST-71','Pan',1,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',500),(82,72,'VX-ST-72','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(83,72,'VX-ST-72','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',5000),(84,73,'VX-ST-73','Pan',1,500,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',500),(85,74,'VX-ST-74','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000),(86,75,'VX-ST-75','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(87,76,'VX-ST-76','Aceite de Girasol',1,5000,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',5000),(88,77,'VX-ST-77','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Nequi',200),(89,78,'VX-ST-78','Colcafé',1,200,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',200),(90,78,'VX-ST-78','manzana verde',1,3000,'ferney','ferneybarbosa05@gmail.com','3008557349','Efectivo',3000);
/*!40000 ALTER TABLE `sale_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,6500,'2024-12-10'),(2,3500,'2024-12-10'),(3,10500,'2024-12-11'),(4,3500,'2024-12-11'),(5,3000,'2024-12-11'),(7,7500,'2024-12-11'),(9,4700,'2024-12-11'),(10,3500,'2024-12-11'),(11,3500,'2024-12-11'),(12,1800,'2024-12-11'),(13,500,'2024-12-14'),(27,10000,'2024-12-14'),(28,200,'2024-12-14'),(29,2000,'2024-12-14'),(30,1000,'2024-12-14'),(31,2000,'2024-12-14'),(32,3000,'2024-12-14'),(33,200,'2024-12-14'),(34,500,'2024-12-14'),(35,2000,'2024-12-14'),(36,500,'2024-12-14'),(37,7000,'2024-12-14'),(38,5000,'2024-12-14'),(39,3000,'2024-12-14'),(40,3000,'2024-12-14'),(41,200,'2024-12-14'),(42,5000,'2024-12-14'),(43,3000,'2024-12-14'),(44,200,'2024-12-14'),(45,200,'2024-12-14'),(46,5200,'2024-12-14'),(47,1000,'2024-12-14'),(48,5000,'2024-12-14'),(49,2000,'2024-12-14'),(50,3000,'2024-12-14'),(51,8600,'2024-12-14'),(52,5300,'2024-12-14'),(53,13700,'2024-12-14'),(54,5000,'2024-12-14'),(55,5000,'2024-12-14'),(56,2400,'2024-12-14'),(57,2400,'2024-12-14'),(58,2000,'2024-12-14'),(59,11000,'2024-12-14'),(60,5600,'2024-12-14'),(61,7000,'2024-12-14'),(62,19000,'2024-12-14'),(63,6000,'2024-12-14'),(64,500,'2024-12-14'),(65,3400,'2024-12-14'),(66,3500,'2024-12-14'),(67,5000,'2024-12-14'),(68,3000,'2024-12-14'),(69,200,'2024-12-14'),(70,2000,'2024-12-14'),(71,500,'2024-12-14'),(72,8000,'2024-12-14'),(73,500,'2024-12-14'),(74,3000,'2024-12-14'),(75,200,'2024-12-14'),(76,5000,'2024-12-14'),(77,200,'2024-12-14'),(78,3200,'2024-12-14');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_employees`
--

DROP TABLE IF EXISTS `sales_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `name_employee` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sale_id` (`sale_id`),
  CONSTRAINT `sales_employees_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `order_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_employees`
--

LOCK TABLES `sales_employees` WRITE;
/*!40000 ALTER TABLE `sales_employees` DISABLE KEYS */;
INSERT INTO `sales_employees` VALUES (1,1,'Ferney Barbosa'),(2,2,'Ferney Barbosa'),(3,3,'Ferney Barbosa'),(4,4,'Ferney Barbosa'),(5,5,'Ferney Barbosa'),(7,7,'Ferney Barbosa');
/*!40000 ALTER TABLE `sales_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_employee` varchar(100) NOT NULL,
  `entry_time` varchar(100) NOT NULL,
  `departure_time` varchar(100) NOT NULL,
  `days_week` varchar(200) NOT NULL,
  `start_break` varchar(100) NOT NULL,
  `end_break` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'Ferney Barbosa','17:00','23:00','Lunes, Miércoles, Sábado','20:10','20:20');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_costs`
--

DROP TABLE IF EXISTS `staff_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_costs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` varchar(100) NOT NULL,
  `employee_position` varchar(100) NOT NULL,
  `hours_worked` int(11) NOT NULL,
  `hourly_pay` decimal(50,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_costs`
--

LOCK TABLES `staff_costs` WRITE;
/*!40000 ALTER TABLE `staff_costs` DISABLE KEYS */;
INSERT INTO `staff_costs` VALUES (1,'Ferney Barbosa','Administrador',8,7500);
/*!40000 ALTER TABLE `staff_costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name_business` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ferney','Barbosa','barbosaferney05@gmail.com','3008557349','ferstore','Tienda la misericordia','Tienda'),(2,'Ferney','Barbosa','ferneybarbosa05@gmail.com','','ferrest','','Restaurante');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-14 19:40:03
