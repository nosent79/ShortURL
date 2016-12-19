DROP DATABASE IF EXISTS `surl`;
CREATE DATABASE IF NOT EXISTS `surl` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `surl`;

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` varchar(15) NOT NULL,
  `admin_nm` varchar(30) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='관리자테이블';

DROP TABLE IF EXISTS `tbl_short_url`;
CREATE TABLE IF NOT EXISTS `tbl_short_url` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(180) NOT NULL,
  `alias` varchar(40) NOT NULL,
  `expire_dt` datetime NOT NULL,
  `hit` int(10) NOT NULL DEFAULT '1',
  `reg_dt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4  COMMENT='단축URL테이블';