/*
Navicat MySQL Data Transfer

Source Server         : Regist
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : bishe

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-09-27 22:39:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `bookname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
