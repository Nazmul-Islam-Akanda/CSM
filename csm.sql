-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: csm
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'1','sector-11','2022-07-06 11:20:26','2022-07-06 11:20:26'),(2,'1','sector-10','2022-07-06 11:20:32','2022-07-06 11:20:32'),(3,'2','khilkhet Bazar','2022-07-06 11:20:37','2022-07-06 11:20:37'),(4,'3','cdsgd','2022-07-14 00:19:08','2022-07-14 00:19:08'),(5,'3','safs','2022-07-14 00:19:18','2022-07-14 00:19:18'),(6,'4','fsg','2022-07-14 00:19:24','2022-07-14 00:19:24'),(7,'4','sfd','2022-07-14 00:19:29','2022-07-14 00:19:29');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_nid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_phone` int NOT NULL,
  `ship_prefix` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_email_unique` (`email`),
  UNIQUE KEY `branches_owner_nid_unique` (`owner_nid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'Uttara','uttara@gmail.com','1234','House-4,Road-13/B,Sector-10','Nazmul',1765345764,'dh','2022-07-06 11:19:57','2022-07-06 11:19:57'),(2,'khilkhet','Khilkhet@gmail.com','1223','House 14 Road-08, Sector-6, Uttara, Dhaka 1230','Naeem',1765345764,'khi','2022-07-06 11:20:16','2022-07-06 11:20:16'),(3,'Chittagong','chittagong@gmail.com','4234','fasfs','gs',1765345764,'chi','2022-07-14 00:18:14','2022-07-14 00:18:14'),(4,'Khulna','khulna@gmail.com','12421','khi','wres',1765345764,'khu','2022-07-14 00:18:49','2022-07-14 00:18:49');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'1','1','KABIR HOSSAIN','kabir@gmail.com','123423',125345,'House-4,Road-13/B,Sector-10','2022-07-06 11:21:13','2022-07-06 11:21:13'),(2,'1','2','Klinic1','reuben26@bins.info','1423',125345,'House 14 Road-08, Sector-6, Uttara, Dhaka 1230','2022-07-06 11:21:28','2022-07-06 11:21:28'),(3,'2','3','5mb','nurse@gmail.com','3234',125345,'House 14 Road-08, Sector-6, Uttara, Dhaka 1230','2022-07-06 11:21:41','2022-07-06 11:21:41'),(4,'3','4','sfvs','asfds@gmail.com','543',35342,'asf','2022-07-14 00:21:45','2022-07-14 00:21:45');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `n_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `drivers_n_id_unique` (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'1','Uttara',24325,'243243','House-4,Road-13/B,Sector-10','2022-07-06 11:22:12','2022-07-06 11:22:12'),(2,'1','5mb',4364,'324','House 14 Road-08, Sector-6, Uttara, Dhaka 1230','2022-07-06 11:22:24','2022-07-06 11:22:24');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense` int NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'2','2022-07-07','12:44',1002,'sdsw','2022-07-07 00:44:26','2022-07-07 00:58:24'),(3,'1','2022-07-12','10:52',345,'warwe','2022-07-16 22:52:26','2022-07-16 22:52:26'),(4,'2','2022-07-08','10:52',500,'as','2022-07-16 22:53:00','2022-07-16 22:53:00'),(5,'1','2022-07-17','18:09',50,NULL,'2022-07-17 06:09:12','2022-07-17 06:09:12'),(6,'1','2022-08-04','18:56',2,NULL,'2022-07-17 06:56:25','2022-07-17 06:56:25');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incomes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficiary_branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` int NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` VALUES (1,'customer','1','2',NULL,NULL,5005,'erd','2022-07-06 23:41:08','2022-07-06 23:47:20'),(2,'branch','2',NULL,'1','1',1000,'drwe','2022-07-06 23:41:43','2022-07-06 23:52:20'),(3,'customer','1','2',NULL,NULL,33,'qaq','2022-07-07 00:00:05','2022-07-07 00:00:56'),(5,'customer','1','1',NULL,NULL,500,'zdfsd','2022-07-14 04:29:44','2022-07-14 04:29:44'),(6,'customer','1','1',NULL,NULL,500,'arf','2022-07-17 06:06:56','2022-07-17 06:06:56'),(7,'customer','1','1',NULL,NULL,100,NULL,'2022-07-17 06:07:10','2022-07-17 06:07:38');
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_06_29_074949_create_branches_table',1),(6,'2022_06_30_065901_create_areas_table',1),(7,'2022_07_01_193935_create_customers_table',1),(8,'2022_07_03_061847_create_shipments_table',1),(9,'2022_07_04_094258_create_drivers_table',1),(10,'2022_07_05_100623_create_missions_table',1),(11,'2022_07_05_114031_create_mission_details_table',1),(13,'2022_07_06_101354_create_incomes_table',2),(14,'2022_07_07_063818_create_expenses_table',3),(16,'2022_07_13_062153_create_website_setups_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission_details`
--

DROP TABLE IF EXISTS `mission_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mission_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mission_id` bigint unsigned NOT NULL,
  `shipping_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mission_details_mission_id_foreign` (`mission_id`),
  CONSTRAINT `mission_details_mission_id_foreign` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission_details`
--

LOCK TABLES `mission_details` WRITE;
/*!40000 ALTER TABLE `mission_details` DISABLE KEYS */;
INSERT INTO `mission_details` VALUES (1,1,'NPdhcMs','2022-07-06 11:24:19','2022-07-06 11:24:19'),(2,1,'NPdhPm7','2022-07-06 11:24:19','2022-07-06 11:24:19'),(3,2,'NPdhEo2','2022-07-08 23:06:01','2022-07-08 23:06:01');
/*!40000 ALTER TABLE `mission_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions`
--

DROP TABLE IF EXISTS `missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `missions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_no` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Running',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions`
--

LOCK TABLES `missions` WRITE;
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
INSERT INTO `missions` VALUES (1,'1','2022-07-06','23:23','2','12','2','Closed','2022-07-06 11:24:19','2022-07-06 11:24:35'),(2,'1','2022-07-08','11:05','2','12','2','Closed','2022-07-08 23:06:01','2022-07-09 00:27:13');
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` int NOT NULL,
  `receiver_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_branch_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_area_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_area_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `shipping_cost` int NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_direction` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on_delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shipments_shipment_id_unique` (`shipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipments`
--

LOCK TABLES `shipments` WRITE;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
INSERT INTO `shipments` VALUES (1,'Door to Door','1','2022-07-06','23:22','1','fdrg',325,'gdgd2','2','3','1','Prepaid','Cash Payment','Paid','NPdhcMs','fsd1',2,500,'Delivered','return','2022-07-06 11:23:02','2022-07-06 11:24:56'),(2,'Door to Door','1','2022-07-07','23:23','1','fdrg',353,'gdgd','2','3','1','Postpaid','Invoice Payment','Paid','NPdhPm7','35',324,500,'On The Way','on_delivery','2022-07-06 11:23:33','2022-07-06 11:24:46'),(3,'Door to Door','2','2022-07-07','11:28','3','fdrg',132,'gdgd','1','1','3','Postpaid','Cash Payment','Unpaid','NPkhis8c','wreesf',2,500,'Pending','on_delivery','2022-07-06 23:28:58','2022-07-06 23:28:58'),(4,'Branch to Branch','1','2022-07-09','11:04','1','fdrgf',403275,'sgdf','2','3','1','Prepaid','Due Payment','Unpaid','NPdhEo2','ewfq',2,500,'Delivered','on_delivery','2022-07-08 23:05:05','2022-07-09 00:27:14'),(5,'Door to Door','3','2022-07-14','12:30','4','fdrgf',23353,'gdgd2','4','6','4','Prepaid','Cash Payment','Paid','NPchiOMC','q4',2,5000,'Pending','on_delivery','2022-07-14 00:30:55','2022-07-14 00:30:55');
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `n_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_n_id_unique` (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (14,'Admin','admin@gmail.com',NULL,'$2y$10$0MIbtIEzxNLP1epuD5Lvne/o8TTomqMIPsvGmut5CcZgzfL7rordC','admin',1687653423,'12345678',NULL,NULL,'2022-07-13 00:40:39','2022-07-13 00:40:39'),(15,'Nazmul','nazmul@gmail.com',NULL,'$2y$10$8YiKb5k5b0SzJVllr6Ul3.WlQvh4/R84wudqJ.jTlXCN9NgucVZm.','branch_manager',1678987445,'13124','1',NULL,'2022-07-13 06:03:29','2022-07-13 06:03:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_setups`
--

DROP TABLE IF EXISTS `website_setups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website_setups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website_setups`
--

LOCK TABLES `website_setups` WRITE;
/*!40000 ALTER TABLE `website_setups` DISABLE KEYS */;
INSERT INTO `website_setups` VALUES (1,'Nayem Parcel','0168765343','gerlach.julian@veum.com','Ut beatae eligendi','20220713090723.jpg','2022-07-13 00:40:39','2022-07-13 03:54:29');
/*!40000 ALTER TABLE `website_setups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-17 19:01:20
