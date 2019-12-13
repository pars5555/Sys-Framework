/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.1.35-MariaDB : Database - sys
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sys` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `sys`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `password` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `hash` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`password`,`hash`) values 
(1,'Root','root','root','dAWtnCHbEtHzJbyYXDaCifBvp5TVvpUYlg0IShUMJ6XlDOzu3wizwThSHMB4Ke5g');

/*Table structure for table `page_description` */

DROP TABLE IF EXISTS `page_description`;

CREATE TABLE `page_description` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en` tinytext COLLATE utf8_unicode_ci,
  `hy` tinytext COLLATE utf8_unicode_ci,
  `ru` tinytext COLLATE utf8_unicode_ci,
  `tr` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `page_description` */

insert  into `page_description`(`id`,`url`,`en`,`hy`,`ru`,`tr`) values 
(1,'sysdefault',NULL,NULL,NULL,NULL);

/*Table structure for table `page_keywords` */

DROP TABLE IF EXISTS `page_keywords`;

CREATE TABLE `page_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en` tinytext COLLATE utf8_unicode_ci,
  `hy` tinytext COLLATE utf8_unicode_ci,
  `ru` tinytext COLLATE utf8_unicode_ci,
  `tr` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `page_keywords` */

insert  into `page_keywords`(`id`,`url`,`en`,`hy`,`ru`,`tr`) values 
(1,'sysdefault',NULL,NULL,NULL,NULL);

/*Table structure for table `page_titles` */

DROP TABLE IF EXISTS `page_titles`;

CREATE TABLE `page_titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en` tinytext COLLATE utf8_unicode_ci,
  `hy` tinytext COLLATE utf8_unicode_ci,
  `ru` tinytext COLLATE utf8_unicode_ci,
  `tr` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `page_titles` */

insert  into `page_titles`(`id`,`url`,`en`,`hy`,`ru`,`tr`) values 
(1,'sysdefault',NULL,NULL,NULL,NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `var` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` tinytext COLLATE utf8_unicode_ci,
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`var`,`value`,`description`) values 
(1,'facebook','https://www.facebook.com',''),
(2,'twitter','https://twitter.com','');

/*Table structure for table `snippets` */

DROP TABLE IF EXISTS `snippets`;

CREATE TABLE `snippets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `namespace` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(250) CHARACTER SET ascii DEFAULT NULL,
  `en` longtext COLLATE utf8_unicode_ci,
  `hy` longtext COLLATE utf8_unicode_ci,
  `ru` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `namespace` (`namespace`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `snippets` */

insert  into `snippets`(`id`,`namespace`,`name`,`en`,`hy`,`ru`) values 
(1,'main/home.tpl','home','home','տուն','Главная');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
