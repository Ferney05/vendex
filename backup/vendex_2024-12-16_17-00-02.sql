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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_store`
--

LOCK TABLES `cart_store` WRITE;
/*!40000 ALTER TABLE `cart_store` DISABLE KEYS */;
INSERT INTO `cart_store` VALUES (1,'manzana verde',1,3000);
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
  `sale_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `amount_borrowed` decimal(50,0) NOT NULL,
  `creation_date` date NOT NULL,
  `fertilizers` decimal(50,0) NOT NULL,
  `credit_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credits`
--

LOCK TABLES `credits` WRITE;
/*!40000 ALTER TABLE `credits` DISABLE KEYS */;
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
INSERT INTO `inventory_products` VALUES (19,1,'manzana verde','Proveedor a',1500,3000,496,'fruta deliciosa','Unidades','2024-12-15'),(20,1,'Colcafé','Proveedor a',100,200,499,'bueno','Unidades','2024-12-15'),(21,1,'Pan','Proveedor a',400,500,491,'bueno','Unidades','2024-12-15'),(22,4,' Azúcar Blanca','Proveedor a',1000,2000,496,'bueno','Gramos','2024-12-15'),(23,3,'Aceite de Girasol','Proveedor a',2500,5000,500,'bueno','Litros','2024-12-15');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_details`
--

LOCK TABLES `sale_details` WRITE;
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
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
  `user_email` varchar(100) NOT NULL,
  `name_business` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
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

-- Dump completed on 2024-12-16 11:00:02
