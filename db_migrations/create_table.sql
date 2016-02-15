/*
SQLyog Community v11.5 (64 bit)
MySQL - 5.5.34 : Database - advlite
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`advlite` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `advlite`;

/*Table structure for table `visitor` */

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT 'visitor''s ip: ip4 or ip6',
  `user_agent` tinytext COLLATE utf8_bin COMMENT 'fingerprint of the visitor''s browser',
  `resource` tinytext COLLATE utf8_bin NOT NULL COMMENT 'requested resource',
  `param` tinytext COLLATE utf8_bin COMMENT 'parameters of the request',
  `redirect` tinytext COLLATE utf8_bin COMMENT 'url to which the user should be redirected',
  `time` datetime NOT NULL COMMENT 'time of the request',
  `trackCode` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'visitor tracking code',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
