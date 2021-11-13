/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.5-10.1.38-MariaDB : Database - leavemessage
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `leavemessage`;

USE `leavemessage`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reply` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addTime` datetime DEFAULT NULL,
  `face` varchar(10) COLLATE utf8_unicode_ci DEFAULT '1.gif',
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `message` */

insert  into `message`(`messageId`,`author`,`title`,`content`,`reply`,`addTime`,`face`) values (1,'小花','好好学习','持之以恒','滴水石穿','2021-09-18 00:00:00','1.gif'),(2,'钟子','干饭王','明天吃啥子','螺蛳粉','2021-09-28 00:00:00','11.gif'),(3,'国庆','庆生','祝福伟大的祖国繁荣昌盛','信仰的颜色是中国红!','2021-09-30 18:39:49','21.gif'),(4,'电影','我和我的父辈','乘风、诗、鸭先知、少年行','','2021-10-01 18:55:58','15.gif'),(5,'十一','祖国','北京','','2021-10-01 19:14:00','4.gif'),(6,'qwe','ert','rrr','','2021-10-14 18:48:30','1.gif'),(7,'99','重阳节','九月九日','忆山东兄弟','2021-10-14 19:46:04','1.gif'),(8,'111','我是八楼','八楼是我','111','2021-10-14 22:43:39','1.gif'),(9,'你好','我好','大家好','好','2021-10-14 22:44:43','1.gif'),(10,'tom','驾照','考科一','高分飘过','2021-10-15 09:35:38','1.gif'),(11,'jarry','渔粉','今天渔粉没开门',NULL,'2021-10-15 10:12:04','1.gif'),(12,'作者','标题','内容',NULL,'2021-10-15 15:51:03','1.gif'),(13,'today','十六','今天是10月16日',NULL,'2021-10-16 13:45:22','1.gif');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`userId`,`userName`,`pwd`) values (1,'tom','123'),(2,'jarry','123'),(3,'susan','123');

/*Table structure for table `yhxxs` */

DROP TABLE IF EXISTS `yhxxs`;

CREATE TABLE `yhxxs` (
  `yhId` int(10) NOT NULL AUTO_INCREMENT,
  `yhName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `yhpwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`yhId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yhxxs` */

insert  into `yhxxs`(`yhId`,`yhName`,`yhpwd`) values (1,'tom','202cb962ac59075b964b07152d234b70'),(2,'jarry','698d51a19d8a121ce581499d7b701668'),(3,'susan','9340791b41c1cd2bdee21d3b7618a815');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
