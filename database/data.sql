-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: tienda_alfa
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Cocina'),(2,'Comedor'),(3,'Sala'),(7,'Baño');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `correo`
--

LOCK TABLES `correo` WRITE;
/*!40000 ALTER TABLE `correo` DISABLE KEYS */;
INSERT INTO `correo` VALUES (1,'Empresa','ale@mueble.com',1),(2,'Empresa','juan@mueblero.com',2);
/*!40000 ALTER TABLE `correo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,'Empresa','México','Tonanitla','Asunción','24 de Ocutbre','5','55785',1),(2,'Empresa','México','Tecamác','Tres torres','Mendoza','50','55768',2);
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `img_products`
--

LOCK TABLES `img_products` WRITE;
/*!40000 ALTER TABLE `img_products` DISABLE KEYS */;
INSERT INTO `img_products` VALUES (1,'product-155b.jpg',1),(2,'product-132e.jpg',2),(3,'product-148b.jpg',3),(4,'product-132a.jpg',4),(5,'product-144g.jpg',5);
/*!40000 ALTER TABLE `img_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,1,16500.00,'25','2016-08-12 13:45:55',NULL,'2016-08-12 13:45:55',15000.00),(2,2,18000.00,'30','2016-08-12 13:49:32',NULL,'2016-08-12 13:49:32',16000.00),(3,3,13200.00,'23','2016-08-12 13:52:48',NULL,'2016-08-12 13:52:48',12000.00),(4,4,24000.00,'42','2016-08-12 13:58:32',NULL,'2016-08-12 13:58:32',21000.00),(5,5,34600.00,'10','2016-08-12 14:01:44',NULL,'2016-08-12 14:01:44',32000.00);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Sala con terminado piel','Hermosa sala con terminado en piel.',16500.00,24,10,'1',3,'product-155a.jpg',1,'2016-08-12 13:45:55','2016-08-13 00:00:49',NULL),(2,'Sala minimal','Sala minimal para gustos modernos.',18000.00,30,0,'1',3,'product-132d.jpg',2,'2016-08-12 13:49:32','2016-08-12 13:49:32',NULL),(3,'Cocina pequeña','Comedor pequeño para departamentos, con diseño minimal.',13200.00,21,15,'1',2,'product-148a.jpg',1,'2016-08-12 13:52:48','2016-08-12 23:25:28',NULL),(4,'Baño moderno','Baño de lujo en ceramica y madera estilo minimal de facil modato.',24000.00,40,20,'1',7,'product-132f.jpg',2,'2016-08-12 13:58:32','2016-08-13 00:09:30',NULL),(5,'Baño minimal','Baño moderno con acabados unicos.',34600.00,9,25,'1',7,'product-144a.jpg',2,'2016-08-12 14:01:44','2016-08-13 00:00:49',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'Muebleria Ortiz','Alejandro','Ortiz','Martinez'),(2,'Mueblero','Juan','Olvero','Archa');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'slider-19-slidera.png','Nuevo Slider','Muebles modernos',NULL,'2016-08-12 13:32:09','2016-08-12 13:32:09'),(2,'slider-136-Untitled.png','Nuevo Slider de mueble','Mueble minimal y moderno',NULL,'2016-08-12 13:34:36','2016-08-12 13:34:36');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefonos`
--

LOCK TABLES `telefonos` WRITE;
/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
INSERT INTO `telefonos` VALUES (1,'Empresa','5511223344',1),(2,'Empresa','5599887766',2);
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_direccion`
--

LOCK TABLES `user_direccion` WRITE;
/*!40000 ALTER TABLE `user_direccion` DISABLE KEYS */;
INSERT INTO `user_direccion` VALUES (1,'Casa','México','Tonanitla','Asunción','24 de Octubre','5','55785',1),(2,'Casa','México','Ecatepec','Mnedio','Fresas','24','55785',1);
/*!40000 ALTER TABLE `user_direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adrian','adrian@codizer.com','$2y$10$bO/Mfe.YdDJ29PUg9UqfI.guFT9GsfzQ0Hb47dbPzgIWdZqUt2wd6','admin','rxjbqxRhzZvapr5TgoHt2htKLBTZbuLdIUn1xXhAG4EYrFPg0mHap7uasfu0','2016-06-30 00:55:46','2016-08-30 06:44:13','Ortiz','Martinez','Hombre','1990-06-30 00:00:00'),(2,'Alan','alan@codizer.com','$2y$10$bO/Mfe.YdDJ29PUg9UqfI.guFT9GsfzQ0Hb47dbPzgIWdZqUt2wd6','coustumer','vJf4ShTAM9UOMVQ7uxnFhpkPnIeV4rCoi0gXpqqPcqGrhAwvKvIOV7LtiuRQ','2016-06-30 00:55:46','2016-08-13 00:04:37','Rojas','Mendoza','Hombre','1993-04-10 00:00:00'),(3,'Angel','pema@codizer.com','$2y$10$B4OHHySXQflq4KRmtLVmqOU7KBXFWk6TLrlfpWTJ8H6qw2VQM.nNq','coustumer','BkL7khFiWFq1Lso2Yo4rLRWpqMw4FeW7Hc02nKJKtcIIbDGcawWfElaq44wc','2016-08-13 00:05:56','2016-08-13 00:07:42','Peralta','Martinez','Femenino','2016-08-09 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_has_ventas`
--

LOCK TABLES `users_has_ventas` WRITE;
/*!40000 ALTER TABLE `users_has_ventas` DISABLE KEYS */;
INSERT INTO `users_has_ventas` VALUES (1,8,1),(2,3,1),(2,7,1);
/*!40000 ALTER TABLE `users_has_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (3,41640),(7,40800),(8,19200);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ventas_has_products`
--

LOCK TABLES `ventas_has_products` WRITE;
/*!40000 ALTER TABLE `ventas_has_products` DISABLE KEYS */;
INSERT INTO `ventas_has_products` VALUES (3,3,2,13200,15),(3,4,1,24000,20),(7,1,1,16500,10),(7,5,1,34600,25),(8,4,1,24000,20);
/*!40000 ALTER TABLE `ventas_has_products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-12 13:15:55
