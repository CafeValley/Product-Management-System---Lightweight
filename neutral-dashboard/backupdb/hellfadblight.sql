-- -------------------------------------------------------------
-- TablePlus 6.7.1(636)
--
-- https://tableplus.com/
--
-- Database: hellfadblight
-- Generation Time: 2025-11-03 01:27:44.8540
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `accountp`;
CREATE TABLE `accountp` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `accountname` varchar(255) NOT NULL,
  `accountnamerecept` varchar(100) NOT NULL,
  `accountroot` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `accountdesc` text NOT NULL,
  `accountamount` double(50,2) NOT NULL,
  `inorout` int NOT NULL,
  `accountdate` datetime DEFAULT NULL,
  `orderno` bigint DEFAULT NULL,
  `user_namel` varchar(50) NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73420 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `customerdelaypayment`;
CREATE TABLE `customerdelaypayment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `accountname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `accountnamerecept` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `accountamount` double(50,2) NOT NULL,
  `inorout` int NOT NULL,
  `accountdate` datetime DEFAULT NULL,
  `orderno` bigint NOT NULL,
  `typepayment` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `active` int NOT NULL,
  `user_namel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17668 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `manfacdelaypayment`;
CREATE TABLE `manfacdelaypayment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `manfname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `manfamount` double(50,2) NOT NULL,
  `inorout` int NOT NULL,
  `manfdate` datetime NOT NULL,
  `manfdate2nd` datetime NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `active` int NOT NULL,
  `user_namel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1600 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `M_id` bigint NOT NULL AUTO_INCREMENT,
  `M_name` varchar(50) NOT NULL,
  `M_password` varchar(50) NOT NULL,
  `M_type` varchar(10) NOT NULL,
  `M_last_login` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ourlock` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`M_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `ordercount`;
CREATE TABLE `ordercount` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `orderid` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `orderdisanddate`;
CREATE TABLE `orderdisanddate` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `orderid` bigint NOT NULL,
  `orderdate` datetime NOT NULL,
  `orderdiscount` int NOT NULL,
  `ordercutomername` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ordercutomernamerecept` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_namel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51990 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `productcategory`;
CREATE TABLE `productcategory` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `user_namel` varchar(50) NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `productname`;
CREATE TABLE `productname` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `user_namel` varchar(50) NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2639 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `productprice`;
CREATE TABLE `productprice` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `idprod` bigint NOT NULL,
  `pricein` double(50,2) NOT NULL,
  `pricetobesold` double(50,2) NOT NULL,
  `active` int NOT NULL,
  `cataid` bigint NOT NULL,
  `user_namel` varchar(50) NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52880 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `productquantit`;
CREATE TABLE `productquantit` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `idprod` bigint NOT NULL,
  `numberin` bigint NOT NULL,
  `cataid` bigint NOT NULL,
  `user_namel` varchar(50) NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2635 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `productquantitlimit`;
CREATE TABLE `productquantitlimit` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `idprod` bigint NOT NULL,
  `limitnumber` bigint NOT NULL DEFAULT '0',
  `cataid` bigint NOT NULL,
  `timedofa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `productsells`;
CREATE TABLE `productsells` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `idprod` bigint NOT NULL,
  `cataid` bigint NOT NULL,
  `pricesold` double(50,2) NOT NULL,
  `quntity` bigint NOT NULL,
  `orderno` bigint NOT NULL,
  `whodidthis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111714 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `productsellstemp`;
CREATE TABLE `productsellstemp` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `idprod` bigint NOT NULL,
  `cataid` bigint NOT NULL,
  `pricesold` double(50,2) NOT NULL,
  `datesold` datetime NOT NULL,
  `quntity` bigint NOT NULL,
  `customername` varchar(100) DEFAULT NULL,
  `customernamerecept` varchar(100) NOT NULL,
  `whodidthis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

INSERT INTO `members` (`M_id`, `M_name`, `M_password`, `M_type`, `M_last_login`, `ourlock`) VALUES
(1, 'admin', 'admin', 'Admin', '2025-11-03 00:28:27', 1),
(2, 'sam', 'sam', 'SprAdmin', '2025-09-05 23:08:52', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;