/*
Navicat MySQL Data Transfer

Source Server         : vShop
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : vshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-05-07 08:34:56
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

-- ----------------------------
-- Table structure for tienda
-- ----------------------------
DROP TABLE IF EXISTS `tienda`;
CREATE TABLE `tienda` (
  `tienda_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen_url` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `longitud` varchar(500) DEFAULT NULL,
  `latitud` varchar(500) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL COMMENT 'Dueño_tienda',
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`tienda_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tienda
-- ----------------------------
INSERT INTO `tienda` VALUES ('1', 'Fresh Look ', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '1', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('2', 'StarBucks', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '1', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('3', 'Vinaya', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '2', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('4', 'Organic Shop', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '3', null, null, '3', '1', '0');
INSERT INTO `tienda` VALUES ('5', 'Wooly', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '3', null, null, '3', '1', '0');
INSERT INTO `tienda` VALUES ('6', 'Home Shop', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '253614', '965412365', 'av. Central  175 - Rimac', '2', null, null, '3', '1', '0');

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
