CREATE DATABASE  IF NOT EXISTS `cafetria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cafetria`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: cafetria
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `order-product`
--

DROP TABLE IF EXISTS `order-product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order-product` (
  `OID` int(100) NOT NULL,
  `PID` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  PRIMARY KEY (`OID`,`PID`),
  KEY `PID` (`PID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order-product`
--

LOCK TABLES `order-product` WRITE;
/*!40000 ALTER TABLE `order-product` DISABLE KEYS */;
INSERT INTO `order-product` VALUES (67,3,1),(66,1,1),(65,1,1),(64,6,2),(64,5,1),(63,2,1);
/*!40000 ALTER TABLE `order-product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `OID` int(100) NOT NULL AUTO_INCREMENT,
  `OrderDate` datetime DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `UserId` int(100) DEFAULT NULL,
  PRIMARY KEY (`OID`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (63,'2021-01-02 10:11:59','pending',1),(64,'2021-01-02 10:12:32','pending',1),(65,'2021-01-02 10:13:58','pending',4),(66,'2021-01-04 14:27:33','pending',2),(67,'2021-01-04 14:27:40','pending',2);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `PID` int(100) NOT NULL AUTO_INCREMENT,
  `Pname` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  `Category` varchar(100) NOT NULL,
  `PPicPath` varchar(50) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'tea',20,'hot drinks','tea.jpg'),(2,'coffee',15,'hot drinks','coffee_shutterstock.jpg'),(3,'latte',40,'hot drinks','latte.jpg'),(4,'Cappuccino',50,'hot drinks','images.jpg'),(5,'Ice Coffee',40,'cold drinks','icecofee.jpg'),(6,'Ice Chocolate',50,'cold drinks','icechocolate.jpg'),(7,'MilkShake',60,'cold drinks','milkshake.jpeg'),(8,'Fresh Orange',35,'cold drinks','freshorange.webp'),(9,'cheese cake',60,'desserts','cheesecake.jpg'),(10,'strawberycake',60,'desserts','strawberycake.jpg'),(11,'blueberrycake',60,'desserts','blueberrycake.jpg'),(12,'frenchdesserts',40,'desserts','frenchdesserts.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemuser`
--

DROP TABLE IF EXISTS `systemuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systemuser` (
  `UID` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RoomNo` int(100) NOT NULL,
  `Ext` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemuser`
--

LOCK TABLES `systemuser` WRITE;
/*!40000 ALTER TABLE `systemuser` DISABLE KEYS */;
INSERT INTO `systemuser` VALUES (1,'ahmed','ahmedsheblwafa@gmail.com','0502215477',4,'1000','admin'),(2,'alaaahmed','alaaahmed@gmail.com','0502215477',4,'1005','user'),(3,'Nirdeennaeem','nirdeen@gmail.com','0502215477',5,'1002','user'),(4,'moustafamahmoud','moustafa@gmail.com','0502215477',3,'1000','user'),(5,'alaaali','alaa@gmail.com','0502215477',2,'1001','user');
/*!40000 ALTER TABLE `systemuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cafetria'
--

--
-- Dumping routines for database 'cafetria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-04 16:27:15
