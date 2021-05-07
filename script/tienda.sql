/*
Navicat MySQL Data Transfer

Source Server         : vShop
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : vshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-05-07 00:29:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tienda
-- ----------------------------
DROP TABLE IF EXISTS `tienda`;
CREATE TABLE `tienda` (
  `tienda_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen_url` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL COMMENT 'Dueño_tienda',
  `estado` char(4) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`tienda_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tienda
-- ----------------------------
INSERT INTO `tienda` VALUES ('1', 'Fresh Look ', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', '2', '1', '0');
INSERT INTO `tienda` VALUES ('2', 'StarBucks', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', '2', '1', '0');
INSERT INTO `tienda` VALUES ('3', 'Vinaya', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2', '2', '1', '0');
INSERT INTO `tienda` VALUES ('4', 'Organic Shop', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3', '3', '1', '0');
INSERT INTO `tienda` VALUES ('5', 'Wooly', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3', '3', '1', '0');
INSERT INTO `tienda` VALUES ('6', 'Home Shop', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/shop-instagram-logo-design-template-4a87a0691340ebb999043f744c47b586_screen.jpg?ts=1566597774', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2', '3', '1', '0');
