/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - mng_user
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mng_user` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `tbl_report` */

DROP TABLE IF EXISTS `tbl_report`;

CREATE TABLE `tbl_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `report_name` varchar(50) DEFAULT NULL,
  `instrument` varchar(50) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `evaluation_date` date DEFAULT NULL,
  `uploads` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_report` */

insert  into `tbl_report`(`id`,`user_id`,`report_name`,`instrument`,`report_date`,`evaluation_date`,`uploads`) values 
(346,36,'2021-AM001','Amperímetro','2021-02-19','2021-02-19','2021-AM001.pdf'),
(347,36,'2021-AN004','Anemômetro','2021-02-19','2021-02-19','2021-AN004.pdf'),
(350,36,'2021-AN004','Anemômetro','2021-02-19','2021-02-19','2021-AN004.pdf'),
(352,36,'2021-AM001','Amperímetro','2021-02-11','2021-02-18','2021-AM001.pdf');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`name`,`email`,`pass`,`role`) values 
(35,'Labadmin','contato@labwork.com.br','VXBCcmF2bzIx',1),
(36,'as','as@as.com','YXNhc2Fz',NULL),
(37,'asd','asd@asd.com','YXNhc2Fz',NULL),
(38,'qw','qw@qw.com','YXNhc2Fz',NULL),
(44,'sdad','sd@sd.com','c2RzZA==',NULL),
(45,'asdfa','asd@sdadad.com','YXNhc2Fz',NULL),
(46,'ddd','ddd@ddd.com','ZGRk',NULL),
(47,'asd','asdad@sdad.com','YXNhc2Fz',NULL),
(48,'rrr','rrr@rrr.com','YXNhc2Fz',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
