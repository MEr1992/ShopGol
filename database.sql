/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - shopgol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shopgol` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `shopgol`;

/*Table structure for table `base_keywords` */

DROP TABLE IF EXISTS `base_keywords`;

CREATE TABLE `base_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `order` int(11) DEFAULT NULL COMMENT 'ترتیب',
  `count_blog` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد مقاله',
  `count_product` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد محصول',
  `lang` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'fa' COMMENT 'زبان',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `base_keywords` */

/*Table structure for table `base_languages` */

DROP TABLE IF EXISTS `base_languages`;

CREATE TABLE `base_languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `symbol` varchar(5) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان اختصاری',
  `dir` varchar(3) COLLATE utf8_persian_ci NOT NULL DEFAULT 'rtl' COMMENT 'چینش',
  `icon` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'آیکون',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `base_languages` */

insert  into `base_languages`(`id`,`title`,`symbol`,`dir`,`icon`,`status_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'فارسی','fa','rtl','fa.png',1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33'),
(2,'English','en','ltr','en.png',0,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33'),
(3,'عربی','ar','rtl','ar.png',0,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33');

/*Table structure for table `base_statuses` */

DROP TABLE IF EXISTS `base_statuses`;

CREATE TABLE `base_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_fa` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان به زبان فارسی',
  `title_en` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان به زبان عربی',
  `group_id` int(11) DEFAULT NULL COMMENT 'شناسه گروه وضعیت',
  `code` varchar(3) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'کد وضعیت',
  `color` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'رنگ',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `base_statuses` */

insert  into `base_statuses`(`id`,`title_fa`,`title_en`,`group_id`,`code`,`color`,`status_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'وضعیت فعالی','active status',NULL,NULL,NULL,1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33'),
(2,'فعال','active',1,'1','theme-10',1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33'),
(3,'غیر فعال','inactive',1,'0','theme-24',1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33');

/*Table structure for table `blog_keyword` */

DROP TABLE IF EXISTS `blog_keyword`;

CREATE TABLE `blog_keyword` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL COMMENT 'شناسه مقاله',
  `keyword_id` int(11) DEFAULT NULL COMMENT 'شناسه کلمه کلیدی',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `blog_keyword` */

/*Table structure for table `blog_subjects` */

DROP TABLE IF EXISTS `blog_subjects`;

CREATE TABLE `blog_subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_fa` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `image` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `count_blog` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد مقاله در موضوع',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `blog_subjects` */

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `subject_id` int(11) DEFAULT NULL COMMENT 'شناسه موضوع مقاله',
  `image` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `summary` text COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'خلاصه',
  `text` text COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'متن',
  `count_view` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد بازدید',
  `lang` varchar(2) COLLATE utf8_persian_ci NOT NULL DEFAULT 'fa' COMMENT 'زبان',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `blogs` */

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `product_brands` */

DROP TABLE IF EXISTS `product_brands`;

CREATE TABLE `product_brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_fa` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام',
  `logo` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'لوگو',
  `count_product` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد محصولات در لاین',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `product_brands` */

insert  into `product_brands`(`id`,`name_fa`,`logo`,`count_product`,`status_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'آکاردان edit','image91051730361918.png',0,0,NULL,'2024-10-31 11:35:22','2024-10-31 12:52:17');

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_fa` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `count_product` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد محصولات در لاین',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `product_categories` */

/*Table structure for table `product_keyword` */

DROP TABLE IF EXISTS `product_keyword`;

CREATE TABLE `product_keyword` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL COMMENT 'شناسه محصول',
  `keyword_id` int(11) DEFAULT NULL COMMENT 'شناسه کلمه کلیدی',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `product_keyword` */

/*Table structure for table `product_lines` */

DROP TABLE IF EXISTS `product_lines`;

CREATE TABLE `product_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_fa` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `count_product` int(11) NOT NULL DEFAULT 0 COMMENT 'تعداد محصولات در لاین',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `product_lines` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام',
  `category_id` int(11) DEFAULT NULL COMMENT 'شناسه دسته بندی محصول',
  `line_id` int(11) DEFAULT NULL COMMENT 'شناسه لاین محصول',
  `brand_id` int(11) DEFAULT NULL COMMENT 'شناسه برند محصول',
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `review` text COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نقد وبررسی',
  `usage` text COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نحوه استفاده و مصرف',
  `description` text COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'توضیحات',
  `lang` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'fa' COMMENT 'زبان',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `products` */

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_fa` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `title_en` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`title_fa`,`title_en`,`status_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'مدیر ارشد','sadmin',1,NULL,'2024-09-14 11:56:32','2024-09-14 11:56:32'),
(2,'مدیر','admin',1,NULL,'2024-09-14 11:56:32','2024-09-14 11:56:32');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام',
  `lastname` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام خانوادگی',
  `mobile` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'شماره همراه',
  `email` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'رمز عبور',
  `role_id` int(11) DEFAULT NULL COMMENT 'نقش',
  `photo` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر',
  `lang` varchar(2) COLLATE utf8_persian_ci NOT NULL DEFAULT 'fa' COMMENT 'زبان',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'شناسه وضعیت فعال/غیر فعال',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`mobile`,`email`,`password`,`role_id`,`photo`,`lang`,`status_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'سانگار','مدیر ارشد','09191964745','sanegar.info@gmail.com','$2y$12$6KBSKABNUpwppTwc0TKfKucmqMANzEE2D22dSfKwovqKh.sW5oMWW',1,'1.jpg','fa',1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33'),
(2,'گل پخش','مدیریت','09191532091',NULL,'$2y$12$/kg3.CUk.SXebk6AYWsFDO3nSV1uQdLI9vW8DgDhmyxtDL.UI.7SO',2,'1.jpg','fa',1,NULL,'2024-09-14 11:56:33','2024-09-14 11:56:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
