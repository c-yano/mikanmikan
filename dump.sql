-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)

--
-- Drop all tables and database
--
USE `Shop`;

DROP TABLE IF EXISTS `shop_product`;
DROP TABLE IF EXISTS `shop_staff`;
DROP DATABASE `Shop`;

--
-- Current Database: `Shop`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `Shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

GRANT ALL PRIVILEGES ON `Shop`.* to shopadmin@localhost IDENTIFIED BY 'AdminPassword';

USE `Shop`;

--
-- Dumping data for table `shop_product`
--

CREATE TABLE `shop_product` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `gazou` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `shop_staff`
--

CREATE TABLE `shop_staff` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

