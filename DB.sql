-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------


-- Dumping database structure for research1
DROP DATABASE IF EXISTS `research1`;
CREATE DATABASE IF NOT EXISTS `research1` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `research1`;


-- Dumping structure for table research1.composition
DROP TABLE IF EXISTS `composition`;
CREATE TABLE IF NOT EXISTS `composition` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'For Id Composition',
  `maintitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `principle` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `standard` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `indicate` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  `master_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table research1.control_sar
DROP TABLE IF EXISTS `control_sar`;
CREATE TABLE IF NOT EXISTS `control_sar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `master_sar_id` int(3) NOT NULL,
  `university` int(1) NOT NULL,
  `faculty` int(1) NOT NULL,
  `major` int(1) NOT NULL,
  `ref` int(1) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `U_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.


-- Dumping structure for table research1.indicator
DROP TABLE IF EXISTS `indicator`;
CREATE TABLE IF NOT EXISTS `indicator` (
  `indicator_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_num` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indicator_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indicator_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `data_use` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citeria` int(1) NOT NULL,
  `composition_id` int(5) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `lv3` int(1) NOT NULL DEFAULT '0',
  `lv2` int(1) NOT NULL DEFAULT '0',
  `lv1` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`indicator_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table research1.map_user_to_ref
DROP TABLE IF EXISTS `map_user_to_ref`;
CREATE TABLE IF NOT EXISTS `map_user_to_ref` (
  `user_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.


-- Dumping structure for table research1.master_sar
DROP TABLE IF EXISTS `master_sar`;
CREATE TABLE IF NOT EXISTS `master_sar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `institution` int(1) NOT NULL DEFAULT '0',
  `faculty` int(1) NOT NULL DEFAULT '0',
  `department` int(1) NOT NULL DEFAULT '0',
  `ref` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.


-- Dumping structure for table research1.ref
DROP TABLE IF EXISTS `ref`;
CREATE TABLE IF NOT EXISTS `ref` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`ref_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.


-- Dumping structure for table research1.subindicator
DROP TABLE IF EXISTS `subindicator`;
CREATE TABLE IF NOT EXISTS `subindicator` (
  `subindicator_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subindicator_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table research1.subindicatorresult
DROP TABLE IF EXISTS `subindicatorresult`;
CREATE TABLE IF NOT EXISTS `subindicatorresult` (
  `ID_ResultQA` int(6) NOT NULL AUTO_INCREMENT,
  `ID_Fac` int(4) DEFAULT NULL,
  `indicator_id` int(6) DEFAULT NULL,
  `ResultQA` double DEFAULT NULL,
  `SelfQA` double DEFAULT NULL,
  PRIMARY KEY (`ID_ResultQA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table research1.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `user_ref` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for view research1.user_ref
DROP VIEW IF EXISTS `user_ref`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_ref` (
	`user_id` INT(11) NOT NULL,
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`level` INT(11) NOT NULL,
	`status` INT(1) NOT NULL,
	`user_ref` INT(11) NOT NULL,
	`parrent_detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view research1.user_ref
DROP VIEW IF EXISTS `user_ref`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_ref`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `user_ref` AS select users.*, parent.detail as parrent_detail
  from user as users
  join user as parent on parent.user_id = users.user_ref ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
