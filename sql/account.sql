/*
Navicat MySQL Data Transfer

Source Server         : Regist
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : bishe

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-09-27 22:39:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `tel` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `level` int(255) NOT NULL DEFAULT '0',
  `nicheng` varchar(255) NOT NULL,
  `number` char(11) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `jifen` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  PRIMARY KEY (`tel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('15110962402', '123456', '1', '果冻', '15110962402', '202', '3221', 'Los Angeles,California', '911119');
