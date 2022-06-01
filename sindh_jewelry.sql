/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.21-MariaDB : Database - sindh_jewellery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sindh_jewellery` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sindh_jewellery`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_category_id_foreign` (`parent_category_id`),
  CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`category`,`parent_category_id`,`created_at`,`updated_at`) values 
(1,'Necklaces',NULL,NULL,NULL),
(2,'Earrings',NULL,NULL,NULL),
(3,'Rings',NULL,NULL,NULL),
(4,'Itlian Ring',3,NULL,NULL),
(5,'Sindhi Ring',3,NULL,NULL),
(6,'Sindhi Necklaces',1,NULL,NULL),
(7,'Thai Earring',2,NULL,'2021-10-26 12:42:26'),
(8,'new category',3,'2021-10-23 13:51:47','2021-10-23 13:51:47'),
(9,'new one2',3,'2021-10-23 13:57:11','2021-11-20 15:22:19'),
(12,'new design1',NULL,'2021-10-23 14:41:18','2021-11-20 14:48:13'),
(16,'new one',12,'2021-11-20 15:22:44','2021-11-20 15:22:44'),
(17,'Itlian Design',NULL,'2021-11-20 15:29:24','2021-11-20 15:29:24'),
(18,'itlian desgin necklace',17,'2021-11-20 15:29:43','2021-11-20 16:13:05');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `gold_rates` */

DROP TABLE IF EXISTS `gold_rates`;

CREATE TABLE `gold_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `gold_rates` */

insert  into `gold_rates`(`id`,`rate`,`created_at`,`updated_at`) values 
(1,'99000',NULL,'2021-10-22 17:21:47');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_10_03_182400_create_roles_table',1),
(6,'2021_10_03_214705_create_user_roles_table',1),
(7,'2021_10_06_102318_create_categories_table',2),
(8,'2021_10_06_104508_create_categories_table',3),
(9,'2021_10_14_113547_create_products_table',4),
(10,'2021_10_14_115357_create_product_rates_table',4),
(11,'2021_10_14_115411_create_product_images_table',4),
(17,'2021_10_21_185727_create_orders_table',5),
(18,'2021_10_21_191243_create_order_details_table',5),
(20,'2021_10_22_123852_create_gold_rates_table',6),
(22,'2021_10_22_125332_add_weight_to_products',7),
(29,'2021_10_22_145048_add_weight_to_products',8),
(30,'2021_10_22_152414_add_gold_rate_id_to_products',8);

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_details` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int(10) unsigned NOT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` enum('Cash on delivery','Jazz Cash','Easy Paisa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Order Placed','On The Way','Shipped') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_role_id_foreign` (`user_role_id`),
  CONSTRAINT `orders_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main_image` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_path`,`is_main_image`,`created_at`,`updated_at`) values 
(1,1,'jewellery-products1.jpg',1,NULL,NULL),
(5,2,'jewellery-products1-1.jpg',1,NULL,NULL),
(7,3,'jewellery-products2.jpg',1,NULL,NULL),
(9,14,'jewellery-products1.jpg',1,NULL,NULL),
(10,14,'jewellery-products2.jpg',0,NULL,NULL),
(11,14,'jewellery-products2-1.jpg',0,NULL,NULL),
(12,14,'jewellery-products1-1.jpg',0,NULL,NULL),
(17,3,'jewellery-products1.jpg',0,NULL,NULL),
(88,3,'jewellery-products2-1.jpg',0,NULL,NULL),
(89,10,'jewellery-products1.jpg',1,NULL,NULL),
(90,7,'jewellery-products2-1.jpg',1,NULL,NULL),
(91,9,'jewellery-products2-1.jpg',0,NULL,NULL),
(92,10,'jewellery-products2-1.jpg',0,NULL,NULL),
(93,5,'jewellery-products2-1.jpg',1,NULL,NULL),
(94,1,'jewellery-products3.jpg',0,NULL,NULL),
(95,3,'jewellery-products3.jpg',0,NULL,NULL),
(96,4,'jewellery-products3.jpg',1,NULL,NULL),
(97,3,'jewellery-products3.jpg',0,NULL,NULL),
(98,1,'jewellery-products3.jpg',0,NULL,NULL),
(99,2,'jewellery-products3.jpg',0,NULL,NULL),
(100,10,'jewellery-products3.jpg',0,NULL,NULL),
(101,4,'jewellery-products3.jpg',0,NULL,NULL),
(102,4,'jewellery-products3.jpg',0,NULL,NULL),
(103,1,'jewellery-products3.jpg',0,NULL,NULL),
(104,6,'jewellery-products3.jpg',0,NULL,NULL),
(105,2,'jewellery-products3.jpg',0,NULL,NULL),
(106,2,'jewellery-products3.jpg',0,NULL,NULL),
(107,5,'jewellery-products3.jpg',0,NULL,NULL),
(108,3,'jewellery-products3.jpg',0,NULL,NULL),
(109,4,'jewellery-products4.jpg',0,NULL,NULL),
(110,9,'jewellery-products4.jpg',0,NULL,NULL),
(111,3,'jewellery-products4-1.jpg',0,NULL,NULL),
(112,1,'jewellery-products5.jpg',0,NULL,NULL),
(113,6,'jewellery-products5.jpg',1,NULL,NULL),
(114,6,'jewellery-products5.jpg',0,NULL,NULL),
(115,6,'jewellery-products5.jpg',0,NULL,NULL),
(116,2,'jewellery-products5.jpg',0,NULL,NULL),
(117,5,'jewellery-products5-1.jpg',0,NULL,NULL),
(118,5,'jewellery-products5-1.jpg',0,NULL,NULL),
(119,9,'jewellery-products5-1.jpg',1,NULL,NULL),
(120,1,'jewellery-products5-1.jpg',0,NULL,NULL),
(121,1,'jewellery-products5-1.jpg',0,NULL,NULL),
(122,2,'jewellery-products5-1.jpg',0,NULL,NULL),
(123,1,'jewellery-products5-1.jpg',0,NULL,NULL),
(124,7,'jewellery-products5-1.jpg',0,NULL,NULL),
(125,1,'jewellery-products5-1.jpg',0,NULL,NULL),
(126,5,'jewellery-products5-1.jpg',0,NULL,NULL),
(127,2,'jewellery-products5-1.jpg',0,NULL,NULL),
(128,4,'jewellery-products5-1.jpg',0,NULL,NULL),
(129,8,'jewellery-products6.jpg',0,NULL,NULL),
(130,8,'jewellery-products6.jpg',1,NULL,NULL),
(131,7,'jewellery-products6.jpg',0,NULL,NULL),
(132,6,'jewellery-products6.jpg',0,NULL,NULL),
(133,9,'jewellery-products6.jpg',0,NULL,NULL),
(134,1,'jewellery-products6.jpg',0,NULL,NULL),
(135,6,'jewellery-products6-1.jpg',0,NULL,NULL),
(136,6,'jewellery-products6-1.jpg',0,NULL,NULL),
(137,3,'jewellery-products6-1.jpg',0,NULL,NULL),
(138,69,'jewellery-products6-1.jpg',1,NULL,NULL),
(139,70,'jewellery-products6-1.jpg',1,NULL,NULL),
(140,70,'jewellery-products6-1.jpg',0,NULL,NULL),
(141,70,'jewellery-products6-1.jpg',0,NULL,NULL),
(142,71,'jewellery-products6-1.jpg',1,NULL,NULL),
(143,71,'jewellery-products6-1.jpg',0,NULL,NULL),
(144,71,'jewellery-products6-1.jpg',0,NULL,NULL),
(145,72,'jewellery-products6-1.jpg',1,NULL,NULL);

/*Table structure for table `product_rates` */

DROP TABLE IF EXISTS `product_rates`;

CREATE TABLE `product_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_role_id` int(10) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_rates_product_id_foreign` (`product_id`),
  KEY `product_rates_user_role_id_foreign` (`user_role_id`),
  CONSTRAINT `product_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_rates_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_rates` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `low_inventory` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `is_free_shipping` tinyint(4) DEFAULT NULL,
  `shipping_charges` int(11) DEFAULT NULL,
  `is_rating_allowed` tinyint(4) DEFAULT NULL,
  `is_comment_allowed` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gold_rate_id` int(10) unsigned DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `products_user_role_id_foreign` (`user_role_id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`user_role_id`,`category_id`,`title`,`description`,`price`,`quantity`,`is_active`,`low_inventory`,`is_featured`,`is_free_shipping`,`shipping_charges`,`is_rating_allowed`,`is_comment_allowed`,`created_at`,`updated_at`,`weight`,`gold_rate_id`) values 
(1,1,7,'New Nicklace','wsaasdsffsdfasdaaasds\r\n',66000,12,1,5,1,1,NULL,1,1,NULL,NULL,'1',NULL),
(2,1,5,'title2','desc',120000,112,1,3,1,1,4,1,1,'2021-10-18 14:49:33','2021-10-18 14:49:33','1',NULL),
(3,1,4,'title3','desc1',1211212,10,1,5,1,1,200,1,1,'2021-10-18 14:56:45','2021-10-18 14:56:45','1',NULL),
(4,1,5,'title4','desc1',1211212,10,1,5,1,1,200,1,1,'2021-10-18 14:58:11','2021-10-18 14:58:11','1',NULL),
(5,1,5,'title5','desc1',1211212,10,1,500,1,1,200,1,1,'2021-10-18 15:19:59','2021-10-18 15:19:59','1',NULL),
(6,1,4,'title6','desc1',1211212,10,1,500,1,1,200,1,1,'2021-10-18 15:23:38','2021-10-18 15:23:38','1',NULL),
(7,1,5,'title7','desc1',1211212,10,1,500,1,1,200,1,1,'2021-10-18 15:25:39','2021-10-18 15:25:39','1',NULL),
(8,1,4,'title8','desc1',1211212,10,1,500,1,1,200,1,1,'2021-10-18 15:30:40','2021-10-18 15:30:40','1',NULL),
(9,1,4,'title9','desc1',1211212,10,1,500,1,1,200,1,1,'2021-10-18 15:31:43','2021-10-18 15:31:43','1',NULL),
(10,1,5,'title10','desc2',12112,100,1,500,1,1,200,1,1,'2021-10-18 16:03:19','2021-10-18 16:03:19','1',NULL),
(12,1,5,'new necklaces','necklace',100000,NULL,1,NULL,0,0,200,0,0,'2021-10-18 16:48:19','2021-10-18 16:48:19','1',NULL),
(13,1,6,'new necklaces','necklace',100000,10,1,NULL,1,1,NULL,0,1,'2021-10-18 16:49:44','2021-10-18 16:49:44','1',NULL),
(14,1,4,'rbkk','good',120500,10,1,2,0,0,NULL,0,0,'2021-10-20 11:21:08','2021-10-27 13:45:31','2',1),
(15,1,6,'today15','today',16973,10,1,2,0,1,200,1,1,'2021-10-22 12:31:42','2021-10-22 19:41:17','2',1),
(19,1,6,'Miss','Qui ut quo molestiae qui alias aut. Neque repellat animi est provident id. Sit sit est et exercitationem est sit et. Quas ad quos deleniti sed est.',169018,46,1,2,0,0,126,1,1,'2021-11-17 15:05:26','2021-11-17 15:05:26','5',1),
(20,1,6,'Dr.','Expedita non similique non et. Cumque dolore facilis dolores assumenda pariatur. Nisi aliquid odio facilis.',58438,29,1,4,0,0,103,1,1,'2021-11-17 15:05:26','2021-11-17 15:05:26','6',1),
(21,1,6,'Mr.','Eaque maiores quaerat ut est ea quos tempora. Recusandae quidem ea quo dolores nesciunt est suscipit. At sit ut qui voluptate sapiente.',26557,47,1,7,0,0,103,1,1,'2021-11-17 15:05:26','2021-11-17 15:05:26','3',1),
(22,1,1,'Ms.','Et debitis et qui eos beatae rerum. Voluptatibus sint voluptatem distinctio et autem commodi earum quos. Explicabo omnis omnis ratione debitis.',183546,13,1,8,0,0,157,1,1,'2021-11-17 15:05:26','2021-11-17 15:05:26','7',1),
(23,1,1,'Ms.','Mollitia veritatis ipsa corporis corrupti nihil. Quia similique sed aut dolorum. Aspernatur dolorem mollitia maiores quas. Ducimus non quod porro eius occaecati necessitatibus cumque. Dolorem rerum fugiat ratione sed qui.',111984,49,1,4,0,0,136,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','10',1),
(24,1,1,'Mr.','Est cupiditate explicabo debitis. Voluptatem laborum consequuntur eius sapiente consequatur. Consequuntur eius quia delectus doloremque odio velit. Pariatur doloribus repellat iusto ut illo est esse.',161863,34,1,8,0,0,139,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','6',1),
(25,1,1,'Dr.','Natus suscipit quae ut totam laborum. Perferendis dolor itaque ab sit ratione corporis rem quod. Minima sed in nostrum expedita aut occaecati. Facere sed atque rerum voluptatibus sint.',113000,27,1,10,0,0,174,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','2',1),
(26,1,1,'Prof.','Ut dolor et doloremque. Harum quis earum ipsam eligendi aut omnis consequatur. Aperiam repudiandae qui vitae fugiat placeat eos. Sit deserunt temporibus perspiciatis unde reiciendis at.',47212,26,1,9,0,0,101,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','4',1),
(27,1,1,'Mrs.','Modi quos assumenda id id necessitatibus possimus. Esse quia sint illo velit amet repudiandae molestias qui. Asperiores rem fugiat voluptatem magni ullam molestiae non. Aut alias magnam similique architecto commodi.',45066,14,1,3,0,0,145,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','12',1),
(28,1,1,'Prof.','Temporibus fugit adipisci officia iusto ea. Aut sint ut voluptates sint. Voluptatem excepturi sed et voluptatibus. Perspiciatis ratione assumenda aut voluptatem libero incidunt temporibus. Consequatur quis dolorum nemo esse aut aut dicta est.',157744,22,1,4,0,0,165,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','11',1),
(29,1,1,'Dr.','Dolores et rerum adipisci qui et. Corrupti consequuntur delectus mollitia ut fugit omnis. Ipsam dolorem esse impedit debitis. Ut iusto voluptas et sequi.',123903,40,1,3,0,0,199,1,1,'2021-11-17 15:05:27','2021-11-17 15:05:27','2',1),
(30,1,1,'Prof.','Qui eum excepturi fugit sunt tempora nihil. Et minus temporibus dolores et numquam sit.',38728,11,1,2,0,0,140,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','7',1),
(31,1,1,'Miss','Sunt dolorum et sed dolores dolore eligendi. Modi id sit explicabo fuga assumenda incidunt sit. Deserunt voluptas rem dolore dolor eum.',103649,11,1,7,0,0,148,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','8',1),
(32,1,1,'Dr.','Non ab et rerum. Enim qui non tempora qui. Id voluptatem ex ab aut et.',17806,40,1,1,0,0,170,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','1',1),
(33,1,1,'Mr.','Quae maxime ut nobis tenetur et voluptatibus alias. Ex minima quia aliquam quisquam. Perspiciatis laudantium amet architecto adipisci ipsum praesentium. Fugit itaque enim omnis aut.',186204,50,1,6,0,0,191,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','4',1),
(34,1,1,'Miss','Officiis a inventore commodi aut. Accusantium quis eos qui ducimus. Ea eligendi nemo consequatur error. Voluptate est sed quia nostrum fugit ad.',108459,49,1,1,0,0,108,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','11',1),
(35,1,1,'Dr.','Quod sit architecto rerum similique illo. Sequi quibusdam consequatur et ut molestias sunt facere eveniet. Aut quam ipsum molestias sequi velit quas accusantium aut. Tempora aliquid dolorum et est aspernatur voluptatem illum molestiae.',81556,37,1,5,0,0,136,1,1,'2021-11-17 15:05:28','2021-11-17 15:05:28','9',1),
(36,1,1,'Miss','Et sapiente maiores asperiores ipsa. Est doloribus alias ut. Maiores error mollitia earum sint delectus.',151586,18,1,8,0,0,190,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','1',1),
(37,1,1,'Dr.','Distinctio voluptas et voluptas enim voluptatem sapiente itaque. Rerum cupiditate aut et fugiat eos sunt. Et qui voluptatem iure dolore.',89475,26,1,4,0,0,154,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','6',1),
(38,1,1,'Mrs.','Optio eveniet velit consequatur rerum nam sit eligendi. Est eaque saepe iste rem similique. Est rerum id expedita illum eum.',111676,40,1,6,0,0,159,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','1',1),
(39,1,1,'Miss','Possimus rerum eveniet et voluptas culpa. Aut id perferendis et placeat vel ex. Ad ex accusamus sed et dolor iste aut. Assumenda id cum ex at.',52723,44,1,2,0,0,183,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','8',1),
(40,1,1,'Mr.','Eligendi ipsam sequi dolor qui est. Eum qui reiciendis suscipit voluptatem et doloremque perspiciatis quas. Labore unde nisi quidem rem occaecati sequi quia aut.',190237,45,1,3,0,0,129,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','9',1),
(41,1,1,'Dr.','Dolores quas quae consequuntur eos dolor sapiente maiores. Perspiciatis accusantium iusto qui aspernatur molestias et esse. Et voluptas repellat sit nobis natus atque quisquam. Sint corrupti dicta qui et enim voluptatem.',129682,28,1,7,0,0,120,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','10',1),
(42,1,1,'Dr.','Minus eos soluta non hic. Hic rerum aliquid laborum tempore. Officia sit temporibus provident adipisci recusandae autem.',99381,27,1,7,0,0,159,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','6',1),
(43,1,1,'Miss','Mollitia omnis qui maxime. Consectetur sapiente optio minus voluptas eius. Nihil aut et eos ut eius. Occaecati quibusdam explicabo et dicta accusamus ex natus. Ut quis harum nulla nesciunt voluptatem qui sed.',92799,18,1,4,0,0,165,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','8',1),
(44,1,1,'Mr.','Quod neque officia non eos qui quos. Architecto fugit placeat magni ut unde aut exercitationem quia. Dicta quia minima perspiciatis ea officia et. Suscipit vel laudantium labore.',112331,40,1,6,0,0,192,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','3',1),
(45,1,1,'Mr.','Dicta et pariatur distinctio dolore non consequatur. Fuga incidunt rerum enim aut aut. Alias beatae hic harum distinctio in. Aut iure est enim facilis ipsam ut minima.',112136,19,1,10,0,0,174,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','14',1),
(46,1,1,'Mrs.','Debitis officiis esse quam asperiores. Et aliquid beatae libero veniam sapiente ab. Totam quam soluta et rerum repellendus voluptas. Molestiae alias quasi illum saepe et quia.',158147,44,1,2,0,0,112,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','13',1),
(47,1,1,'Ms.','Sint illo est alias similique deserunt. Qui nihil sapiente repellat cumque modi aliquid. Rerum ex nobis aut ab pariatur. Quia ut perferendis magni autem id. Quia non voluptatum molestiae eum.',68346,15,1,10,0,1,0,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','8',1),
(48,1,1,'Prof.','Tempore quia commodi est iste distinctio tempora. Non corporis cumque ullam placeat. Molestiae voluptas perferendis saepe beatae et.',57619,49,1,2,0,1,0,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','5',1),
(49,1,1,'Dr.','Occaecati id voluptatem hic et. Neque accusantium sequi sit est labore voluptatibus voluptatem. Deleniti mollitia cum aperiam modi. Adipisci molestiae a beatae deserunt aperiam voluptas aut necessitatibus.',91068,16,1,5,0,1,0,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','2',1),
(50,1,1,'Dr.','Asperiores est est fuga laborum accusantium minima architecto. Sunt consequatur laborum maxime maiores harum quas omnis fuga.',93614,32,1,5,0,1,0,1,1,'2021-11-17 15:05:29','2021-11-17 15:05:29','10',1),
(51,1,1,'Prof.','Saepe vel quisquam sit soluta dolores dolores inventore. Tenetur eum possimus ducimus nobis soluta eius voluptatem. Omnis sit provident sed eveniet qui doloribus.',88379,31,1,4,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','7',1),
(52,1,1,'Prof.','Aperiam porro saepe nobis voluptates id aut soluta. Doloremque incidunt nesciunt similique ut qui asperiores perferendis porro. Exercitationem velit reprehenderit unde provident cumque voluptas. Earum ut ex ut sint consequatur.',123898,24,1,10,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','6',1),
(53,1,1,'Miss','Et dolor est ullam. Aut asperiores quia ea ipsum incidunt rerum ipsum. Consequatur blanditiis voluptates tempore expedita. Iste placeat qui iure dolores.',80419,29,1,7,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','14',1),
(54,1,1,'Ms.','Repellat sit deserunt quibusdam sed dignissimos doloremque et sit. Sint pariatur tempora fugiat aut dolor.',87553,10,1,3,0,0,174,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','1',1),
(55,1,1,'Mrs.','Excepturi ut nobis neque dolor aut cupiditate nihil. Temporibus sit nihil exercitationem aperiam nobis. Voluptates nesciunt ut deleniti.',109680,28,1,1,0,0,162,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','11',1),
(56,1,1,'Ms.','Quasi distinctio perspiciatis quae officia occaecati. Provident eum esse et dolores voluptatem. Et dicta quia quasi voluptas et quaerat. Consequatur temporibus sit quia quasi est.',63696,34,1,4,0,0,154,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','11',1),
(57,1,1,'Prof.','Maiores id voluptatum quis saepe. Esse repudiandae sed voluptate praesentium et. Quo neque est aperiam ut corrupti. Accusantium inventore aspernatur eum enim.',147246,46,1,9,0,0,175,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','6',1),
(58,1,1,'Ms.','Maiores est soluta ea voluptates. Quis aliquid cumque quibusdam voluptate. Quidem ipsa omnis quis quidem dolorem blanditiis et rerum.',62255,19,1,6,0,0,195,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','6',1),
(59,1,1,'Mr.','Voluptas reprehenderit delectus ad ratione vitae. Est sint perspiciatis aut nobis doloremque. Quos id odio minus et.',65305,39,1,2,0,0,135,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','5',1),
(60,1,1,'Prof.','Est provident nobis ea qui ut ut. Fuga fugiat quis vel accusamus possimus praesentium. Odit eos quia odit corporis. Consequatur sequi quaerat earum.',119325,43,1,5,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','4',1),
(61,1,1,'Dr.','Accusamus quidem recusandae est laborum quisquam. Molestias et ab et laudantium amet atque ipsa. Et minima asperiores doloribus velit nulla consequuntur.',149250,11,1,5,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','4',1),
(62,1,1,'Dr.','Dolor soluta consequatur corrupti consequatur animi amet. Atque ex commodi et distinctio sint harum animi. Dicta sequi est rerum.',21320,37,1,6,0,1,0,1,1,'2021-11-17 15:05:30','2021-11-17 15:05:30','5',1),
(63,1,1,'Mrs.','Necessitatibus qui id recusandae officia. Sint et dolore est hic fugit est. Sunt odit alias repellendus enim. Natus aut atque architecto ab unde aspernatur fugiat. Unde natus quibusdam corporis harum pariatur itaque assumenda.',103208,24,1,6,0,1,0,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','7',1),
(64,1,1,'Miss','Et hic nemo maiores voluptas in aut. Asperiores magnam est tempora quos illum placeat repellendus hic. Quia in commodi eius nulla maiores voluptas. Inventore aut debitis rerum rerum ex quis. Modi illum qui qui in.',153088,36,1,9,0,1,0,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','7',1),
(65,1,1,'Miss','Autem velit laudantium perferendis aut aut animi laborum. Odit autem rerum accusamus adipisci hic aliquam ipsam. Molestiae iure fugit illo velit. Et recusandae aut nisi architecto nobis omnis maxime.',61958,26,1,5,0,1,0,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','1',1),
(66,1,1,'Miss','Suscipit libero sit id et quam. Nobis occaecati iure ut voluptatibus ipsum. Distinctio suscipit suscipit nam error.',91860,14,1,3,0,0,143,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','15',1),
(67,1,1,'Mrs.','Non praesentium consequatur possimus maxime aut consequuntur. Dolorem laborum sit doloribus optio. Veritatis porro nulla voluptatibus voluptatem aut vel praesentium. Sunt voluptatem et praesentium corrupti tenetur et.',162363,14,1,9,0,0,177,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','12',1),
(68,1,1,'Dr.','Similique sunt assumenda voluptas blanditiis possimus. Mollitia excepturi sint sunt aut quaerat provident rerum expedita. Et vel consequatur non quia enim voluptates est.',96336,35,1,4,0,0,121,1,1,'2021-11-17 15:05:31','2021-11-17 15:05:31','1',1),
(69,1,5,'rasool bux','rasool bux',22000,20,1,NULL,NULL,1,NULL,NULL,NULL,'2021-11-18 10:14:31','2021-11-18 10:14:31','2.10',1),
(70,1,6,'rasool bux1','rasool bux1',21500,12,1,NULL,NULL,NULL,200,NULL,NULL,'2021-11-18 10:17:08','2021-11-18 10:17:08','2.01',1),
(71,1,6,'new product1','new product1',22500,5,1,5,1,NULL,200,1,1,'2021-11-18 11:07:14','2021-11-20 14:34:10','2.210',1),
(72,1,6,'Dubai Design Nacklace','Dubai Design Nacklace Description',1240000,1,1,1,NULL,1,NULL,1,1,'2021-11-21 12:26:49','2021-11-21 12:26:49','115.200',1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_name`) values 
(1,'Admin'),
(2,'Manager'),
(3,'User');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`) values 
(1,1,1,'2021-10-03 22:06:28','2021-10-03 22:06:28'),
(2,2,2,'2021-10-03 22:08:36','2021-10-03 22:08:36'),
(3,3,2,'2021-10-04 11:55:24','2021-10-04 11:55:24'),
(4,4,1,'2021-10-04 12:05:02','2021-10-04 12:05:02'),
(5,6,2,'2021-10-04 12:57:09','2021-10-04 12:57:09'),
(6,7,3,'2021-10-04 13:01:52','2021-10-04 13:01:52'),
(7,8,3,'2021-10-04 13:03:20','2021-10-04 13:03:20'),
(8,9,3,'2021-10-04 13:15:15','2021-10-04 13:15:15'),
(9,10,3,'2021-10-04 13:22:21','2021-10-04 13:22:21'),
(10,11,3,'2021-10-04 13:26:31','2021-10-04 13:26:31'),
(11,12,3,'2021-10-04 13:29:52','2021-10-04 13:29:52'),
(12,13,3,'2021-10-04 17:08:02','2021-10-04 17:08:02'),
(13,14,1,'2021-10-21 18:04:50','2021-10-21 18:04:50');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','pending','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`full_name`,`avatar`,`mobile`,`email`,`password`,`google_id`,`facebook_id`,`remember_token`,`status`,`created_at`,`updated_at`) values 
(1,'Rasool bux','C:\\xampp\\tmp\\phpC0B8.tmp','+923173780063','rasoolbux@gmail.com','$2y$10$E0a9exRjX4xSkppYuX0FeOk9y1SbhC.V9ENXzfw1RtHQbexQ5BBYi',NULL,NULL,NULL,'pending','2021-10-03 22:06:28','2021-10-23 14:54:42'),
(2,'Zahid','C:\\xampp\\tmp\\phpB305.tmp','+923173780061','zahid@gmail.com','$2y$10$uojjcWquZ5rv6UdmSdlnN..WGcRt5Bj.EIkJQbCdNdm1jrnEHrw9q',NULL,NULL,NULL,'active','2021-10-03 22:08:35','2021-10-03 22:08:35'),
(3,'Siraj','C:\\xampp\\tmp\\phpA943.tmp','+923001234567','siraj@gmail.com','$2y$10$PpwWHu0sPtU8wWeQJKrkyOYuTubbGQUGAT8LNV07mAupt4kQ.jDZC',NULL,NULL,NULL,'active','2021-10-04 11:55:24','2021-10-04 11:55:24'),
(4,'akash','C:\\xampp\\tmp\\php796E.tmp','+923001234568','akash@gmail.com','$2y$10$5DaKZAV2L.3qOwQoT9OgGe6BdZt9OVCMMiF1pAF5S/aXoJ/Fws9lW',NULL,NULL,NULL,'active','2021-10-04 12:05:01','2021-10-04 12:05:01'),
(5,'ayaz','C:\\xampp\\tmp\\phpD996.tmp','+923001234569','ayaz@gmail.com','$2y$10$DNAqt9m24qM5H/2/q52PdOIwD6Vbo6Q/lFvzfzohldo8311mYZ3/G',NULL,NULL,NULL,'active','2021-10-04 12:54:35','2021-10-04 12:54:35'),
(6,'Hasnain','C:\\xampp\\tmp\\php3190.tmp','+923001234511','Hasnain@gmail.com','$2y$10$Uxi6jpbH3dp20YlYueWaoOJ8dJLCLkfO6QhbAoew42ywykn9/XKTO',NULL,NULL,NULL,'active','2021-10-04 12:57:09','2021-10-04 12:57:09'),
(7,'student','C:\\xampp\\tmp\\php85D8.tmp','+923001234512','john@gmail.com','$2y$10$dk3QCVv7Wf2.1QNF1OjntOTH.nTZ.uApdy5opqgFtbidZMtALsiI6',NULL,NULL,NULL,'active','2021-10-04 13:01:52','2021-10-04 13:01:52'),
(8,'student','C:\\xampp\\tmp\\phpDABC.tmp','+923001234513','john1@gmail.com','$2y$10$8ROcZyl2//HKndIJ4iaXaOG4YSX9VEI6DtU3HS5Q/OFzarz8gf2mq',NULL,NULL,NULL,'active','2021-10-04 13:03:20','2021-10-04 13:03:20'),
(9,'Ali','C:\\xampp\\tmp\\phpC470.tmp','+923001234514','ali@gmail.com','$2y$10$bvbhiw7Fa9FJnY7owYsN2uMHqoqcb7wn1qKv5dNj1WXvW8Wsuhesi',NULL,NULL,NULL,'active','2021-10-04 13:15:15','2021-10-04 13:15:15'),
(10,'Rasool bux','C:\\xampp\\tmp\\php44C0.tmp','+923001234515','rasoolbux1@gmail.com','$2y$10$htFlcymDFKR79Amdxsh7zesoEG8Y1vLgbU8VwBG.Qp9GwtxepWEi.',NULL,NULL,NULL,'pending','2021-10-04 13:22:21','2021-10-23 14:54:48'),
(11,'Rasool bux','C:\\xampp\\tmp\\php14D4.tmp','+923001234516','rasoolbux2@gmail.com','$2y$10$OCVvXAxR4hvG/JzMTXjT8u8VbPvrLgxHaY30nnqO.KHtGm9tylA96',NULL,NULL,NULL,'pending','2021-10-04 13:26:31','2021-11-20 16:13:55'),
(12,'Rasool bux','C:\\xampp\\tmp\\php2745.tmp','+923001234517','rasoolbu@gmail.com','$2y$10$FUOogbuIbm/o8TZGRbpKCOy039nEmm6Zehe56Qy0N3t3I12NVeVJm',NULL,NULL,NULL,'active','2021-10-04 13:29:52','2021-10-23 14:26:19'),
(13,'Rasool bux','C:\\xampp\\tmp\\phpE33B.tmp','+923001234518','rasool@gmail.com','$2y$10$CMBHDSm0g9UMIaEIcldFBurRXB0O3nxeFKhvmdspOx4bEFaIFUtRG',NULL,NULL,NULL,'active','2021-10-04 17:08:02','2021-10-23 14:26:42'),
(14,'212','C:\\xampp\\tmp\\php2470.tmp','123232323232','1212@gmail.com','$2y$10$.MEEHTdL6xwPxbIuof0sjOTMR5ouiqHBY/4pcAV4DcB.qDNCidXIa',NULL,NULL,NULL,'active','2021-10-21 18:04:49','2021-10-23 14:28:00'),
(15,'RBK','C:\\xampp\\tmp\\php1FC2.tmp','03001234567','rbk@gmail.com','$2y$10$ThvCMCGqVKF33qE4YydVV.cBX6oTOcH/ATwPzvZQorhtEYNnyQ272',NULL,NULL,NULL,'active','2021-10-21 18:14:38','2021-10-21 18:14:38'),
(17,'Rasool bux','C:\\xampp\\tmp\\php6E75.tmp','+923173780000','rbk00@gmail.com','$2y$10$SqqvL3/GaiCFfR2H9tC/xOZGhAldG51xOPc11pNle5WWuxBSeU9zO',NULL,NULL,NULL,'active','2021-10-21 18:39:00','2021-10-21 18:39:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
