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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `correo`
--

DROP TABLE IF EXISTS `correo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `proveedores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_correo_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_correo_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `proveedores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_direcciones_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_direcciones_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `img_products`
--

DROP TABLE IF EXISTS `img_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) NOT NULL,
  `products_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_img_products_products_idx` (`products_id`),
  CONSTRAINT `fk_img_products_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(10) NOT NULL,
  `precio_venta` decimal(12,2) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precio_compra` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventario_products1_idx` (`products_id`),
  CONSTRAINT `fk_inventario_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `offert` int(5) NOT NULL,
  `available` enum('0','1') NOT NULL,
  `categories_id` int(10) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `proveedores_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`categories_id`),
  KEY `fk_products_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_empresa` varchar(255) NOT NULL,
  `nom_contacto` varchar(255) NOT NULL,
  `ap_paterno` varchar(255) NOT NULL,
  `ap_materno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `dec` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`img_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `proveedores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_telefonos_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_telefonos_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_direccion`
--

DROP TABLE IF EXISTS `user_direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_direccion_users1_idx` (`users_id`),
  CONSTRAINT `fk_user_direccion_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` enum('admin','coustumer') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_na` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_has_ventas`
--

DROP TABLE IF EXISTS `users_has_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_ventas` (
  `users_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ventas_id` int(11) NOT NULL,
  `user_direccion_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`ventas_id`),
  KEY `fk_users_has_ventas_ventas1_idx` (`ventas_id`),
  KEY `fk_users_has_ventas_users1_idx` (`users_id`),
  KEY `fk_users_has_ventas_user_direccion1_idx` (`user_direccion_id`),
  CONSTRAINT `fk_users_has_ventas_user_direccion1` FOREIGN KEY (`user_direccion_id`) REFERENCES `user_direccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_ventas_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_ventas_ventas1` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ventas_has_products`
--

DROP TABLE IF EXISTS `ventas_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_has_products` (
  `ventas_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(10) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`ventas_id`,`products_id`),
  KEY `fk_ventas_has_products_products1_idx` (`products_id`),
  KEY `fk_ventas_has_products_ventas1_idx` (`ventas_id`),
  CONSTRAINT `fk_ventas_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_has_products_ventas1` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-12 13:14:29
