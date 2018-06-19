# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: btfd.group (MySQL 5.5.5-10.1.23-MariaDB-9+deb9u1)
# Database: btfd_db
# Generation Time: 2018-06-19 04:28:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account` (
  `user_id` int(11) NOT NULL,
  `exchange_name` char(20) NOT NULL,
  `commodity_name` char(20) NOT NULL,
  `value` double DEFAULT '0',
  PRIMARY KEY (`user_id`,`exchange_name`,`commodity_name`),
  KEY `exchange_name` (`exchange_name`),
  KEY `commodity_name` (`commodity_name`),
  CONSTRAINT `Account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Account_ibfk_2` FOREIGN KEY (`exchange_name`) REFERENCES `Exchange` (`name`),
  CONSTRAINT `Account_ibfk_3` FOREIGN KEY (`commodity_name`) REFERENCES `Commodity` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;

INSERT INTO `Account` (`user_id`, `exchange_name`, `commodity_name`, `value`)
VALUES
	(1,'Binance','cad',600),
	(1,'Binance','eth',500),
	(1,'Euronext','goog',1),
	(1,'QuadrigaCX','btc',2000),
	(1,'QuadrigaCX','cad',6966970),
	(1,'QuadrigaCX','eth',90000.1),
	(2,'Kraken','cad',5),
	(2,'NASDAQ','eth',500),
	(3,'NASDAQ','aapl',6000),
	(3,'NASDAQ','cad',25),
	(6,'Kraken','amzn',17),
	(6,'QuadrigaCX','cad',5),
	(7,'CoinSquare','amzn',10),
	(7,'CoinSquare','cad',600),
	(9,'QuadrigaCX','btc',0),
	(9,'QuadrigaCX','cad',9700),
	(9,'QuadrigaCX','eth',1),
	(11,'NASDAQ','btc',7000);

/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Commodity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Commodity`;

CREATE TABLE `Commodity` (
  `name` char(20) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Commodity` WRITE;
/*!40000 ALTER TABLE `Commodity` DISABLE KEYS */;

INSERT INTO `Commodity` (`name`)
VALUES
	('aapl'),
	('amzn'),
	('brick'),
	('btc'),
	('cad'),
	('eth'),
	('fb'),
	('goog'),
	('iota'),
	('ore'),
	('sheep'),
	('spice'),
	('spot'),
	('wood');

/*!40000 ALTER TABLE `Commodity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ECOMM_METRICS
# ------------------------------------------------------------

DROP VIEW IF EXISTS `ECOMM_METRICS`;

CREATE TABLE `ECOMM_METRICS` (
   `commodity_name` CHAR(20) NULL DEFAULT NULL,
   `exchange_name` CHAR(20) NULL DEFAULT NULL,
   `bid` DOUBLE NULL DEFAULT '0',
   `ask` DOUBLE NULL DEFAULT '0',
   `volume` DOUBLE NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table Exchange
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Exchange`;

CREATE TABLE `Exchange` (
  `name` char(20) NOT NULL,
  `website` char(20) DEFAULT NULL,
  `fees` double DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Exchange` WRITE;
/*!40000 ALTER TABLE `Exchange` DISABLE KEYS */;

INSERT INTO `Exchange` (`name`, `website`, `fees`)
VALUES
	('Binance','binance.com',0.03),
	('CoinSquare','coinsquare.com',0.01),
	('Euronext','euronext.com',0.06),
	('Kraken','kraken.io',0.08),
	('NASDAQ','nasdaq.com',0.02),
	('QuadrigaCX','quadrigacx.ca',0.05),
	('TCE','theCatanExchange.com',0.9);

/*!40000 ALTER TABLE `Exchange` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Metric
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Metric`;

CREATE TABLE `Metric` (
  `commodity_name` char(20) DEFAULT NULL,
  `exchange_name` char(20) DEFAULT NULL,
  `bid` double DEFAULT '0',
  `ask` double DEFAULT '0',
  `volume` double DEFAULT '0',
  KEY `commodity_name` (`commodity_name`,`exchange_name`),
  CONSTRAINT `Metric_ibfk_1` FOREIGN KEY (`commodity_name`, `exchange_name`) REFERENCES `Traded_On` (`commodity_name`, `exchange_name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Metric` WRITE;
/*!40000 ALTER TABLE `Metric` DISABLE KEYS */;

INSERT INTO `Metric` (`commodity_name`, `exchange_name`, `bid`, `ask`, `volume`)
VALUES
	('btc','QuadrigaCX',9150,9185,191.98325856),
	('cad','Kraken',1,1,1),
	('btc','Kraken',900,1100,50000),
	('cad','QuadrigaCX',1,1,1),
	('eth','Kraken',659,748,9123),
	('aapl','NASDAQ',570,650,23494),
	('cad','NASDAQ',1,1,1),
	('amzn','NASDAQ',78,89,823457),
	('goog','NASDAQ',1200,1300,9238345),
	('eth','QuadrigaCX',1000,1000,1000),
	('eth','Binance',650,950,78364782),
	('goog','Euronext',600,998,879870),
	('cad','Binance',1,1,1),
	('cad','Euronext',1,1,1);

/*!40000 ALTER TABLE `Metric` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Trade
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Trade`;

CREATE TABLE `Trade` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `exchange_name` char(20) DEFAULT NULL,
  `commodity_name` char(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `move` char(20) DEFAULT NULL,
  PRIMARY KEY (`timestamp`),
  KEY `user_id` (`user_id`),
  KEY `exchange_name` (`exchange_name`),
  KEY `commodity_name` (`commodity_name`,`exchange_name`),
  CONSTRAINT `Trade_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Trade_ibfk_2` FOREIGN KEY (`commodity_name`, `exchange_name`) REFERENCES `Traded_On` (`commodity_name`, `exchange_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Trade` WRITE;
/*!40000 ALTER TABLE `Trade` DISABLE KEYS */;

INSERT INTO `Trade` (`timestamp`, `user_id`, `exchange_name`, `commodity_name`, `price`, `quantity`, `move`)
VALUES
	('2018-06-17 20:57:37',3,'TCE','sheep',1,2,'sell'),
	('2018-06-17 21:04:37',1,'QuadrigaCX','eth',400,0.1,'buy'),
	('2018-06-18 00:08:49',9,'QuadrigaCX','eth',800,1,'buy'),
	('2018-06-18 03:57:35',2,'Kraken','btc',800,1,'buy'),
	('2018-06-18 22:58:37',1,'QuadrigaCX','eth',500,0.1,'buy'),
	('2018-06-19 03:55:09',1,'QuadrigaCX','eth',1000,0.1,'buy');

/*!40000 ALTER TABLE `Trade` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bnwlkr`@`%` */ /*!50003 TRIGGER `trade` AFTER INSERT ON `Trade` FOR EACH ROW begin
if new.move='sell' then
update Account set Account.value = value-new.quantity where user_id=new.user_id and commodity_name=new.commodity_name and         exchange_name=new.exchange_name;
update Account set Account.value = value + (new.quantity * new.price) where user_id=new.user_id and commodity_name='cad' and     exchange_name=new.exchange_name;
elseif new.move ='buy' then
update Account set value = value - (new.quantity * new.price) where user_id=new.user_id and commodity_name='cad' and                 exchange_name=new.exchange_name;
update Account set value = value + new.quantity where user_id=new.user_id and commodity_name=new.commodity_name and                     exchange_name=new.exchange_name;
end if;
end */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table Traded_On
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Traded_On`;

CREATE TABLE `Traded_On` (
  `commodity_name` char(20) NOT NULL,
  `exchange_name` char(20) NOT NULL,
  PRIMARY KEY (`commodity_name`,`exchange_name`),
  KEY `exchange_name` (`exchange_name`),
  CONSTRAINT `Traded_On_ibfk_1` FOREIGN KEY (`exchange_name`) REFERENCES `Exchange` (`name`) ON DELETE CASCADE,
  CONSTRAINT `Traded_On_ibfk_2` FOREIGN KEY (`commodity_name`) REFERENCES `Commodity` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Traded_On` WRITE;
/*!40000 ALTER TABLE `Traded_On` DISABLE KEYS */;

INSERT INTO `Traded_On` (`commodity_name`, `exchange_name`)
VALUES
	('aapl','NASDAQ'),
	('amzn','CoinSquare'),
	('amzn','NASDAQ'),
	('brick','TCE'),
	('btc','CoinSquare'),
	('btc','Kraken'),
	('btc','QuadrigaCX'),
	('cad','Binance'),
	('cad','CoinSquare'),
	('cad','Euronext'),
	('cad','Kraken'),
	('cad','NASDAQ'),
	('cad','QuadrigaCX'),
	('cad','TCE'),
	('eth','Binance'),
	('eth','Kraken'),
	('eth','QuadrigaCX'),
	('fb','QuadrigaCX'),
	('goog','Euronext'),
	('goog','NASDAQ'),
	('iota','CoinSquare'),
	('ore','NASDAQ'),
	('ore','TCE'),
	('sheep','TCE'),
	('spice','TCE'),
	('spot','NASDAQ'),
	('spot','QuadrigaCX'),
	('wood','TCE');

/*!40000 ALTER TABLE `Traded_On` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table User
# ------------------------------------------------------------

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `password` char(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;

INSERT INTO `User` (`id`, `name`, `email`, `password`)
VALUES
	(1,'Ben Walker','bnwlkr@icloud.com','73675debcd8a436be48ec22211dcf44fe0df0a64'),
	(2,'Germaine Chu','gchu@gmail.com','a30dea72d991e65c1ae10f1336c1f8e5aeae3e60'),
	(3,'Mike Smith','mikey@gmail.com','7b0ab45a730e48a69239010b5b8fe5fa4e8eaac6'),
	(4,'Alex Wong','awong@gmail.com','60c6d277a8bd81de7fdde19201bf9c58a3df08f4'),
	(6,'Luxury Yacht','lyacht@gmail.com','9556683532e39f3347ea6a33919c7063017438a5'),
	(7,'Turtle Wanger','twanger@gmail.com','75105193bfdd0db68cd7b988dda79744a9baea41'),
	(8,'Arnold DuVagne','aduvagne@gmail.com','6f9019a59c51da7447ae804dd2cbe5203f6f90ac'),
	(9,'Peggy Sue','psue@gmail.com','b5382301bba21d7c6aa558a7c9c06a948f62925e'),
	(11,'Constance Verm','cverm@gmail.com','a4ea59ba0634336128a559be812cab6afbcee613'),
	(12,'Wun Wun','wunwun@hotmail.co','a89234r8234rjfvjsdfgv8923jrerfv9wrfgj3494jfv99');

/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;




# Replace placeholder table for ECOMM_METRICS with correct view syntax
# ------------------------------------------------------------

DROP TABLE `ECOMM_METRICS`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bnwlkr`@`%` SQL SECURITY DEFINER VIEW `ECOMM_METRICS`
AS SELECT
   `Metric`.`commodity_name` AS `commodity_name`,
   `Metric`.`exchange_name` AS `exchange_name`,
   `Metric`.`bid` AS `bid`,
   `Metric`.`ask` AS `ask`,
   `Metric`.`volume` AS `volume`
FROM (`Metric` left join `Traded_On` on(((`Metric`.`commodity_name` = `Traded_On`.`exchange_name`) and (`Metric`.`commodity_name` = `Traded_On`.`commodity_name`)))) where (`Metric`.`commodity_name` <> 'cad');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
