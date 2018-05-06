/*
MySQL Data Transfer
Source Host: localhost
Source Database: dhaka_motors
Target Host: localhost
Target Database: dhaka_motors
Date: 07-May-18 1:19:13 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nid` varchar(15) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dealers
-- ----------------------------
DROP TABLE IF EXISTS `dealers`;
CREATE TABLE `dealers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `dealerName` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for discount
-- ----------------------------
DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_from` date NOT NULL,
  `d_to` date NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `staffID` int(11) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for distribution
-- ----------------------------
DROP TABLE IF EXISTS `distribution`;
CREATE TABLE `distribution` (
  `distribution_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `dealer_id` int(11) NOT NULL,
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for motorcycle_info
-- ----------------------------
DROP TABLE IF EXISTS `motorcycle_info`;
CREATE TABLE `motorcycle_info` (
  `mID` int(11) NOT NULL AUTO_INCREMENT,
  `mType` varchar(30) NOT NULL,
  `mName` varchar(30) NOT NULL,
  `model` varchar(100) NOT NULL,
  `engineNo` varchar(30) NOT NULL,
  `chassisNo` varchar(30) NOT NULL,
  `cc` int(10) NOT NULL,
  `color` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `sID` int(11) DEFAULT NULL,
  `saleID` int(11) DEFAULT NULL,
  `cID` int(11) DEFAULT NULL,
  `warranty` date NOT NULL,
  `reg` varchar(50) NOT NULL,
  PRIMARY KEY (`mID`),
  KEY `stock` (`sID`),
  KEY `sale` (`saleID`),
  KEY `customer` (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for motorcycle_model
-- ----------------------------
DROP TABLE IF EXISTS `motorcycle_model`;
CREATE TABLE `motorcycle_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `miModel` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for motorcycle_name
-- ----------------------------
DROP TABLE IF EXISTS `motorcycle_name`;
CREATE TABLE `motorcycle_name` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `miName` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for motorcycle_type
-- ----------------------------
DROP TABLE IF EXISTS `motorcycle_type`;
CREATE TABLE `motorcycle_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `miType` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for parts_info
-- ----------------------------
DROP TABLE IF EXISTS `parts_info`;
CREATE TABLE `parts_info` (
  `parts_id` int(11) NOT NULL AUTO_INCREMENT,
  `parts_type` varchar(20) NOT NULL,
  `parts_name` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(5) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`parts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for parts_sale
-- ----------------------------
DROP TABLE IF EXISTS `parts_sale`;
CREATE TABLE `parts_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parts_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `qnt` int(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pre_booking
-- ----------------------------
DROP TABLE IF EXISTS `pre_booking`;
CREATE TABLE `pre_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(20) NOT NULL,
  `model` varchar(10) NOT NULL,
  `book_date` date NOT NULL,
  `book_time` time NOT NULL,
  `h_date` varchar(11) NOT NULL,
  `cID` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sale_info
-- ----------------------------
DROP TABLE IF EXISTS `sale_info`;
CREATE TABLE `sale_info` (
  `saleID` int(11) NOT NULL AUTO_INCREMENT,
  `sale_date` date DEFAULT NULL,
  `sale_time` time DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `staff_ID` int(11) DEFAULT NULL,
  `pre_book_status` int(11) NOT NULL,
  `dID` int(11) NOT NULL,
  PRIMARY KEY (`saleID`),
  KEY `stafftosale` (`staff_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_date` date NOT NULL,
  `s_time` date NOT NULL,
  `type_id` int(11) NOT NULL,
  `mID` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for service_type
-- ----------------------------
DROP TABLE IF EXISTS `service_type`;
CREATE TABLE `service_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  `fee` int(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff_info
-- ----------------------------
DROP TABLE IF EXISTS `staff_info`;
CREATE TABLE `staff_info` (
  `staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `level` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`staff_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stock_info
-- ----------------------------
DROP TABLE IF EXISTS `stock_info`;
CREATE TABLE `stock_info` (
  `sID` int(11) NOT NULL AUTO_INCREMENT,
  `stock_date` date NOT NULL,
  `stock_time` time NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sID`),
  KEY `staffID` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `customer` VALUES ('33', 'Hasan', '01730176622', 'muntasirhasan32@gmail.com', '12354657686789', 'Hasan', '1234');
INSERT INTO `customer` VALUES ('34', 'Siam', '01716849089', '', '', '', '');
INSERT INTO `dealers` VALUES ('1', 'Dhaka');
INSERT INTO `dealers` VALUES ('2', 'Chittagong');
INSERT INTO `dealers` VALUES ('3', 'Comilla');
INSERT INTO `dealers` VALUES ('4', 'Rajshahi');
INSERT INTO `dealers` VALUES ('5', 'Khulna');
INSERT INTO `discount` VALUES ('7', '2018-05-03', '2018-05-10', '4', 'Active', '2');
INSERT INTO `distribution` VALUES ('1', '2018-04-24', '2');
INSERT INTO `motorcycle_info` VALUES ('36', 'Sports', 'FZS V1', '2015', 'AFDFFFG', 'NINBIFNF', '150', 'GREEN', '200000', '47', '184', '33', '2020-05-04', '');
INSERT INTO `motorcycle_info` VALUES ('37', 'Classic', 'R15 V3', '2018', 'AFDFFFG', 'ODSNBFPODSNB F', '150', 'GREEN', '', '0', '0', '34', '0000-00-00', 'Dhaka metro 17-6888');
INSERT INTO `motorcycle_info` VALUES ('38', 'Cruising', 'FZS V2', '2017', 'AER7643TH4', '123BURTHBV90', '165', 'Ninja Green', '255000', '48', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('39', 'Sports', 'FZS SE', '2018', 'AER7643TH4', '123BURTHBV90', '150', 'Red', '265000', '49', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('40', 'Sports', 'R15 V1', '2018', 'A4R7643TH4', '123BU453HBV90', '165', 'White', '555000', '50', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('41', 'Sports', 'R15 V2', '2018', 'AER7643TH4', '123BURTHBV90', '165', 'Black ', '500000', '51', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('42', 'Sports', 'R15 V3', '2018', 'AER7643TH4', '123BU453HBV90', '150', 'Red', '490000', '52', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('43', 'Classic', 'Fazar V1', '2017', 'AFDFFFG4345', '234DGRFFRFVF', '150', 'Green', '275000', '53', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('44', 'Sports', 'Fazer V2', '2018', 'AER7643TH4', '123BURTHBV90', '150', 'Black & Red', '265000', '54', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('45', 'Sports', 'FZS V1', '2017', 'AER7643TH4', '123BU453HBV90', '150', 'Green & Black', '245000', '55', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('46', 'Sports', 'FZS V1', '2018', 'AER7643TH4', 'ODSNBFPODSNB F', '150', 'Green', '240000', '56', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('47', 'Cruising', 'Fazer V2', '2018', 'AER7643TH4', '123BU453HBV90', '165', 'Ninja Green', '235000', '57', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('48', 'Sports', 'R15 V2', '2018', 'AER7643TH4', '234DGRFFRFVF', '165', 'White', '520000', '58', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_info` VALUES ('49', 'Sports', 'R15 V2', '2018', 'AER7643TH6', '234DGRFFRFVF', '165', 'White', '520000', '59', '0', '0', '0000-00-00', '');
INSERT INTO `motorcycle_model` VALUES ('1', '2015');
INSERT INTO `motorcycle_model` VALUES ('2', '2016');
INSERT INTO `motorcycle_model` VALUES ('3', '2017');
INSERT INTO `motorcycle_model` VALUES ('4', '2018');
INSERT INTO `motorcycle_model` VALUES ('5', '2019');
INSERT INTO `motorcycle_name` VALUES ('1', 'FZS V1');
INSERT INTO `motorcycle_name` VALUES ('2', 'FZS V2');
INSERT INTO `motorcycle_name` VALUES ('3', 'FZS SE');
INSERT INTO `motorcycle_name` VALUES ('4', 'R15 V1');
INSERT INTO `motorcycle_name` VALUES ('5', 'R15 V2');
INSERT INTO `motorcycle_name` VALUES ('6', 'R15 V3');
INSERT INTO `motorcycle_name` VALUES ('7', 'Fazar V1');
INSERT INTO `motorcycle_name` VALUES ('8', 'Fazer V2');
INSERT INTO `motorcycle_type` VALUES ('1', 'Sports');
INSERT INTO `motorcycle_type` VALUES ('2', 'Classic');
INSERT INTO `motorcycle_type` VALUES ('3', 'Cruising');
INSERT INTO `parts_info` VALUES ('8', 'Engine', 'Timming Chain', '500', '9', '43', '1');
INSERT INTO `parts_info` VALUES ('9', 'Engine', 'Roker', '1400', '5', '44', '1');
INSERT INTO `parts_sale` VALUES ('178', '8', '186', '1', '34', '46');
INSERT INTO `parts_sale` VALUES ('179', '9', '186', '1', '34', '46');
INSERT INTO `sale_info` VALUES ('184', '2018-05-05', '00:34:00', '192000', '1', '0', '7');
INSERT INTO `sale_info` VALUES ('185', '2018-05-05', '00:47:27', '600', '1', '0', '0');
INSERT INTO `sale_info` VALUES ('186', '2018-05-05', '00:47:48', '2500', '1', '0', '0');
INSERT INTO `sale_info` VALUES ('187', '2018-05-05', '00:51:52', '1000', '1', '0', '0');
INSERT INTO `service` VALUES ('43', '2018-05-05', '2018-05-05', '1', '36', '1', '0');
INSERT INTO `service` VALUES ('44', '2018-05-05', '2018-05-05', '1', '36', '1', '0');
INSERT INTO `service` VALUES ('45', '2018-05-05', '2018-05-05', '3', '37', '1', '185');
INSERT INTO `service` VALUES ('46', '2018-05-05', '2018-05-05', '3', '37', '1', '186');
INSERT INTO `service` VALUES ('47', '2018-05-05', '2018-05-05', '2', '37', '1', '187');
INSERT INTO `service_type` VALUES ('1', 'Free', '0');
INSERT INTO `service_type` VALUES ('2', 'Full', '1000');
INSERT INTO `service_type` VALUES ('3', 'Regular', '600');
INSERT INTO `staff_info` VALUES ('1', 'Muntasir ', '01730176622', 'muntasir35@diit.info', 'siam', '1234', 'manager', '1');
INSERT INTO `staff_info` VALUES ('2', 'Muntasir', '01636093454', 'careless_siam@yahoo.com', 'mun', '1234', 'admin', '1');
INSERT INTO `stock_info` VALUES ('47', '2018-05-05', '00:26:25', '1', '2');
INSERT INTO `stock_info` VALUES ('48', '2018-05-06', '21:41:01', '1', '2');
INSERT INTO `stock_info` VALUES ('49', '2018-05-06', '21:41:48', '1', '2');
INSERT INTO `stock_info` VALUES ('50', '2018-05-06', '21:42:33', '1', '2');
INSERT INTO `stock_info` VALUES ('51', '2018-05-06', '21:43:30', '1', '2');
INSERT INTO `stock_info` VALUES ('52', '2018-05-06', '21:44:00', '1', '2');
INSERT INTO `stock_info` VALUES ('53', '2018-05-06', '21:44:42', '1', '2');
INSERT INTO `stock_info` VALUES ('54', '2018-05-06', '21:45:33', '1', '2');
INSERT INTO `stock_info` VALUES ('55', '2018-05-06', '21:47:18', '1', '2');
INSERT INTO `stock_info` VALUES ('56', '2018-05-06', '21:59:19', '1', '2');
INSERT INTO `stock_info` VALUES ('57', '2018-05-06', '21:59:44', '1', '2');
INSERT INTO `stock_info` VALUES ('58', '2018-05-06', '22:01:52', '1', '2');
INSERT INTO `stock_info` VALUES ('59', '2018-05-06', '22:01:55', '1', '2');
