-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: cinema_bookings
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_seat_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_seat_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shedule_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` enum('activated','cancelled','used') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `bookings_shedule_id_foreign` (`shedule_id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  CONSTRAINT `bookings_shedule_id_foreign` FOREIGN KEY (`shedule_id`) REFERENCES `schedules` (`id`),
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,'2018-07-2612','LeatBack','CenterBack',2,1,'activated',1,'no'),(2,'2018-07-2816','LeatBack','CenterBack',6,1,'activated',7,'no'),(3,'olBGS','LeatBack','CenterBack',1,1,'used',1,'no'),(4,'Uwx8u','CenterBack','CenterBack',11,1,'activated',1,'no'),(5,'QPFge','LeatBack','RightBack',6,1,'activated',1,'no');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',2),(3,'2018_07_10_210053_create_moviestable',2),(6,'2018_07_12_081450_remove_foreign_key_on_scdules',3),(7,'2018_07_10_210159_create_bookingstable',4),(8,'2018_07_12_150317_modify_bookings',5),(9,'2018_07_16_123003_add_column_being_veried',6),(10,'2018_07_16_203711_add_number_of_seatsto_booking',7),(14,'2018_07_21_175013_add_column_deleted_to_movies',8),(15,'2018_07_21_175159_add_column_deleted_to_schedules',8),(16,'2018_07_21_182736_delete_column_deleted_from_booking',9),(17,'2018_07_21_175235_add_column_deleted_to_bookings',10),(18,'2018_07_21_183640_add_column_deleted_to_movies',11),(19,'2018_07_21_183703_add_column_deleted_to_schedules',11),(20,'2018_07_21_183641_add_column_deleted_to_movies',12),(21,'2018_07_21_183704_add_column_deleted_to_schedules',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Sky Scrapper','Action','public/LxmpZJXkgoLRV8B5enOTU2ldEo9NjpfFESpHSxa8.jpeg','no'),(2,'Harry Potter','Adventure','public/3k3fzcgtrsJcgVHPxsmXE3Z6rzy9WzuwqXUwSUnI.jpeg','no'),(3,'Zombie land','Action','public/aFD4eNWzyiOhKbwPgwWAtR1PswsWmrck0Xrl43XE.jpeg','no'),(4,'First Kill','Action','public/nTNhPTaKtJxpaDuxkYUA7ipckw2lTW8HBBJar4sn.jpeg','no'),(5,'Maze Runner','Action','public/OtCxG9bssHwY8I5eSBklvbQ1u0ydiLJvHuhZhNBQ.jpeg','no'),(6,'Hostiles','Adventure','public/TmGJZnB9pnO4usp3SYM9rWUC5nTupRc97moWeXs6.jpeg','no'),(7,'Predator','Action','public/AzS9qMJzjJHPOyUr6zgREyi2I2Iq2MeZ4io2EFqK.jpeg','no'),(8,'Avengers Infinity War','Action','public/6ExdOlemCCc5MxV0bPhhrSv5wG4s3kuOaPbJXjhk.jpeg','no'),(9,'Death Race','Adventure','public/IwJdKyEd8T95PisTpatuNx9Z5Sy5fIwgp8QGSRdh.jpeg','no'),(10,'Death House','Horror','public/yANMgp6Rk4h1G2OisCCo5pfdvrvbuzkmYKVInmax.jpeg','no');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `being_verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `schedules_movie_id_foreign` (`movie_id`),
  CONSTRAINT `schedules_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'2018-07-26','22:30:00',10000.00,1,'0','no'),(2,'2018-07-26','19:30:00',10000.00,2,'0','no'),(3,'2018-07-25','21:30:00',10000.00,8,'0','no'),(4,'2018-07-23','21:30:00',10000.00,3,'0','no'),(5,'2018-07-26','10:00:00',10000.00,2,'0','no'),(6,'2018-07-28','23:00:00',10000.00,5,'0','no'),(7,'2018-07-23','21:30:00',10000.00,10,'0','no'),(8,'2018-07-24','19:30:00',10000.00,9,'0','no'),(9,'2018-07-24','22:45:00',10000.00,7,'0','no'),(10,'2018-07-23','16:30:00',10000.00,3,'0','no'),(11,'2018-07-26','22:30:00',10000.00,3,'0','no'),(12,'2018-07-23','16:15:00',10000.00,1,'0','no'),(13,'2018-07-25','21:45:00',10000.00,1,'0','no'),(14,'2018-07-26','16:45:00',10000.00,7,'0','no'),(15,'2018-07-26','18:45:00',10000.00,10,'0','no'),(16,'2018-07-28','05:30:00',10000.00,5,'0','no'),(17,'2018-07-29','03:15:00',10000.00,5,'0','no'),(18,'2018-07-29','05:45:00',10000.00,5,'0','no');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Okello Joel','okellojoelacaye@gmail.com','$2y$10$S/xtFFNM76.B58doKXwTQ.jBGNL7pAolj.oPXM2OQT087XV0547J2','mDWxEpAq3Ly6QOh85FSl0yswWU4p3hEfeDCNasSvuM0ttDGLSJnCePKYhWaG','2018-07-15 01:08:46','2018-07-15 01:08:46'),(2,'Opio','opiojoshuaoc@gmail.com','$2y$10$yNje2NbG8nvSP8RE3lUvCuaCTNPPwUoL359Bc9D3oxj4YorNe6qfW',NULL,'2018-07-16 04:31:53','2018-07-16 04:31:53'),(3,'Opio','opio@gmail.com','$2y$10$B.8yVOWpiyMHDWUEfcJpFO81koMWA3JDqN1cieVv03RgnFJwWo9Pa','d0SHTHvCibMxD66ZRfdVrentf9O7cl8T9lCvQAE0TANokdtBtnjX77P4LV9E','2018-07-17 05:58:12','2018-07-17 05:58:12'),(4,'bouncer','bouncer@gmail.com','$2y$10$lVVfHsSnSeKgaW.wp81WHO4/0ILTdComCHKwfby4/CDdPh8m7MCoe','fofcE7G3hbenPOZIF0scH9Agn327rwWxsPy1WJ2jd85XGZwHaY1Xdf5SU9C9','2018-07-20 03:16:31','2018-07-20 03:16:31'),(5,'admin@gmail.com','admin@gmail.com','$2y$10$fffk3.E92c.U/xvxbFxeJO45HrVhXvb3sLJPKrS1V0Kne7nnkWPRC','8M2MI0DXZ4YXjOnfWitkP4jqcsdpeK0ScmV0VkxmbCKMZZaxLMyEDUuIQ9I9','2018-07-20 03:18:08','2018-07-20 03:18:08'),(6,'Okello Joel','okellojoel@gmail.com','$2y$10$GOVQhVigQt9EOQLdjG3sh.fc4Mo5LAoBrMfX2/ZAIj5jhg8OEl1h6',NULL,'2018-07-27 03:33:04','2018-07-27 03:33:04');
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

-- Dump completed on 2018-07-30 11:47:57
