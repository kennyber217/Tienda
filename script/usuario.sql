/*
Navicat MySQL Data Transfer

Source Server         : vShop
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : vshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-05-07 00:30:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `persona` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin@gmail.com', '123', '1', 'admin', '1', '0');
INSERT INTO `usuario` VALUES ('2', 'user@gmail.com', '123', '2', 'user', '1', '0');
INSERT INTO `usuario` VALUES ('3', 'user2@gmail.com', '123', '2', 'user2', '1', '0');
