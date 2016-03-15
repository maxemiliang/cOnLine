-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `car_site`;
CREATE DATABASE `car_site` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `car_site`;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `have` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `text` mediumtext NOT NULL,
  `img` varchar(40) NOT NULL DEFAULT 'default.jpg',
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`cID`),
  KEY `userID` (`userID`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `mID` int(11) NOT NULL AUTO_INCREMENT,
  `sID` int(11) NOT NULL,
  `rID` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  PRIMARY KEY (`mID`),
  KEY `sID` (`sID`),
  KEY `rID` (`rID`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sID`) REFERENCES `users` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`rID`) REFERENCES `users` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privileges` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uID`),
  KEY `uID` (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2016-03-15 12:55:44