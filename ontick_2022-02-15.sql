# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.6.4-MariaDB)
# Database: yerene
# Generation Time: 2022-02-15 13:56:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `hash` varchar(32) DEFAULT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `people` int(255) NOT NULL,
  `bucin` varchar(255) NOT NULL,
  `extra` int(1) DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `total` int(255) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `payment_slip` varchar(255) DEFAULT NULL,
  `payment_confirm` int(1) DEFAULT 0,
  `payment_confirm_date` timestamp NULL DEFAULT NULL,
  `payment_confirm_admin` int(16) DEFAULT NULL,
  `ip_address` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `hash`, `ticket_id`, `name`, `username`, `email`, `phone`, `people`, `bucin`, `extra`, `keterangan`, `day`, `shift`, `total`, `sender_name`, `payment_slip`, `payment_confirm`, `payment_confirm_date`, `payment_confirm_admin`, `ip_address`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'IYG2MFTN','YRNBOWTUSEQA','KAOWKOAKW','jsdijfisdjfs','kykaalvi@gmail.com','2391813291',5,'AB',0,'addad','Minggu',1,175000,'adasdasd','1582827207_81260491_3441438262550021_5726016524620136448_o.png',1,'2020-02-28 18:59:48',1,NULL,'2021-12-28 01:13:27','2022-02-28 18:59:48',NULL),
	(2,'XQMD7ULX','YRNLFGXQ4JNP','Testing','kaowkaowkoakw','kykaalviii@gmail.com','102182821',1,'A',0,NULL,'Minggu',2,35000,'adadasd','1582827559_BASIC_FONT_TEE_NAVY_2_1024x1024@2x.jpg',1,'2022-01-18 14:22:45',1,NULL,'2021-12-28 01:19:19','2022-01-18 14:22:45',NULL),
	(3,'XBIEID4M','YRNBY5CJVHLD','Test Input','29i391239jifjsds','kykaa@mail.com','081212812812',3,'AB',1,'Irene : 1, Yeri : 2','Sabtu',2,105000,'sfasdasdadada','1582891021_425620_sub11.jpg',3,NULL,NULL,NULL,'2021-12-28 18:57:01','2022-02-28 18:57:01',NULL),
	(4,'VBP9CS5O','YRNJOXT9DJ1O','Haloo','kykaaaaa','kykaalvi@gmail.com','0812982155',1,'A',1,'','Sabtu',2,35000,'112121','1582892197_315875.jpg',3,NULL,NULL,NULL,'2021-12-28 19:16:37','2022-02-28 19:16:37',NULL),
	(5,'BQW5CPDO','YRNTREA0CKHJ','Kyka','sdasdasdas','kykaalvi@gmail.com','0812812821',1,'B',1,'','Minggu',1,35000,'121212','1582892245_190316_Yeri_-_farbutnear0305_01.jpg',3,NULL,NULL,NULL,'2021-12-28 19:17:25','2022-02-28 19:17:25',NULL),
	(6,'XOJOB8ZJ','YRNQK73PD8AL','Kyka','sdasdasdas','kykaalvi@gmail.com','0812812821',1,'B',NULL,'','Sabtu',2,25000,'121212','1582892311_81260491_3441438262550021_5726016524620136448_o.png',3,NULL,NULL,NULL,'2021-12-28 19:18:31','2022-02-28 19:18:31',NULL),
	(7,'317FUK0K','YRNU1DCXPJ6W','Kyka','sdasdasdas','kykaalvi@gmail.com','0812812821',1,'B',1,'','Minggu',2,35000,'121212','1582892351_425620_sub11.jpg',3,NULL,NULL,NULL,'2021-12-28 19:19:11','2022-02-28 19:19:11',NULL),
	(8,'BHBVJIBR','YRNQPUH1LWCQ','Kyka ALvi','kayasyaya','redeubelbet.go@gmail.com','08121828128',1,'B',1,'','Minggu',2,35000,'adasdsa','1582892438_81260491_3441438262550021_5726016524620136448_o.png',3,NULL,NULL,NULL,'2021-12-28 19:20:38','2022-02-28 19:20:38',NULL),
	(9,'LBILOMFP','YRNI14AMMRRO','Kyka Alvi','kykaaaaaa','kykaalvi@gmail.com','08128128128',2,'AB',1,'','Minggu',2,70000,'asdfasda','1582893716_425620_sub11.jpg',3,NULL,NULL,NULL,'2021-12-28 19:41:56','2022-02-28 19:41:56',NULL),
	(10,'FEU2CQVW','YRNL9KJHRSAS','Test Input','kykaaaa','alvii@naver.com','818181',2,'AB',1,'','Minggu',2,70000,'kykaalviii','1582897329_425620_sub11.jpg',3,NULL,NULL,NULL,'2021-12-28 20:42:09','2022-02-28 20:42:09',NULL),
	(11,'EJPU9S73','YRNERFQDN9UY','Kyka Alvi','kykaalvi','rizkyka.alvi@mail.com','081298215013',1,'B',1,'','Minggu',2,35000,'ffffff','1643554468_whoisbenjamin-k8kGlvUKlL4-unsplash-2.jpg',3,NULL,NULL,NULL,'2022-01-30 21:54:28','2022-01-30 21:54:28',NULL);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `plain_password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'kykaalvi','Alvi','kyka@mail.com',NULL,'$2y$10$bOzPtyzdWY8COA6h2RDEyuyZW4u6w1ekdmcCJ.MLXJkZ2RwX0rip6','kyka123','TRZVhTBAZTiNU3lwYTHW4jxPdNGRPE5E7Lp1cDd10E6f1LR8odnJxR52f5qA','2022-01-17 13:15:19','2022-01-17 13:15:19'),
	(2,'alvi','Test register','mail@mail.com',NULL,'$2y$10$qVSDkqyr4wj67hY7oltgJuNE.yFBAEEKYSCop5XvJcmFqLIoEMq9S','kyka123',NULL,'2022-01-17 15:46:15','2022-01-17 15:46:15'),
	(3,'NanaGO','NanaGO','test2@mail.com',NULL,'$2y$10$WTfr5VeTlcanv4PIBy/KSeQR/mPIbKmBlbFL7gD3IucdzuMzxxjbK','kyka123','7v67l9IOFbNUBgSBIv7Z2U8D3ARuinI5W2Z7GmlnMuva59crUjnBLZedNx8C','2022-01-17 15:49:32','2022-01-17 15:49:32');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
