/*
Navicat MySQL Data Transfer

Source Server         : vShop
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : vshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-05-07 00:29:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `categoria_id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`categoria_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'categoria 1', '1', '0');
INSERT INTO `categoria` VALUES ('2', 'cat 2', '1', '0');
INSERT INTO `categoria` VALUES ('3', 'cat 3', '1', '0');
