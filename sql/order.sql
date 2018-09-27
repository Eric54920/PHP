/*
Navicat MySQL Data Transfer

Source Server         : Regist
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : bishe

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-09-27 22:39:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('67', '人生最美是清欢', '15110962402', '1');
INSERT INTO `order` VALUES ('68', '人生最美是清欢', '15110962402', '1');
INSERT INTO `order` VALUES ('69', '囚徒健身', '15110962402', '1');
