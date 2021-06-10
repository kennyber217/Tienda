/*
Navicat MySQL Data Transfer

Source Server         : vShop
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : vshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-05-29 01:34:49
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Bebidas', '1', '0');
INSERT INTO `categoria` VALUES ('2', 'Alimentos', '1', '0');
INSERT INTO `categoria` VALUES ('3', 'Ropas', '1', '0');

-- ----------------------------
-- Table structure for categoria_producto
-- ----------------------------
DROP TABLE IF EXISTS `categoria_producto`;
CREATE TABLE `categoria_producto` (
  `categoria_producto_id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`categoria_producto_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria_producto
-- ----------------------------
INSERT INTO `categoria_producto` VALUES ('1', 'Gaseosas', '1', '0');
INSERT INTO `categoria_producto` VALUES ('2', 'Otros', '1', '0');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta` (
  `detalle_venta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` int(20) unsigned NOT NULL,
  `producto_id` int(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`detalle_venta_id`),
  KEY `fk_detalle_venta_02` (`producto_id`),
  KEY `fk_detalle_venta_01` (`venta_id`),
  CONSTRAINT `fk_detalle_venta_01` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`venta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_detalle_venta_02` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_venta
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `producto_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tienda_id` int(11) DEFAULT NULL,
  `categoria_producto_id` int(11) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `imagen_url` varchar(500) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precioVenta` double(5,2) DEFAULT NULL,
  `precioCompra` double(5,2) DEFAULT NULL,
  `existencia` double(5,2) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`producto_id`),
  KEY `fk_producto_01` (`tienda_id`),
  KEY `fk_producto_02` (`categoria_producto_id`),
  CONSTRAINT `fk_producto_01` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`tienda_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_producto_02` FOREIGN KEY (`categoria_producto_id`) REFERENCES `categoria_producto` (`categoria_producto_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', '6', '1', '1', 'https://wongfood.vteximg.com.br/arquivos/ids/273848-750-750/103181-1.jpg?v=636850638318230000', 'Gaseosa', 'aaaaaaaaaaaaaaaaaaa', '10.00', '7.00', '10.00', '0', '0');
INSERT INTO `producto` VALUES ('2', '6', '1', '2', 'https://wongfood.vteximg.com.br/arquivos/ids/273848-750-750/103181-1.jpg?v=636850638318230000', 'Gaseosa', 'Gaseosa', '5.00', '7.00', '10.00', '1', '0');
INSERT INTO `producto` VALUES ('3', '6', '1', '3', 'https://wongfood.vteximg.com.br/arquivos/ids/273848-750-750/103181-1.jpg?v=636850638318230000', 'Gaseosa', 'Gaseosa', '5.00', '6.00', '10.00', '1', '0');
INSERT INTO `producto` VALUES ('4', '6', '2', '4', 'https://wongfood.vteximg.com.br/arquivos/ids/273848-750-750/103181-1.jpg?v=636850638318230000', 'Gaseosa', 'Gaseosa', '1.00', '5.00', '5.00', '1', '0');
INSERT INTO `producto` VALUES ('5', '6', '2', '5', 'https://wongfood.vteximg.com.br/arquivos/ids/273848-750-750/103181-1.jpg?v=636850638318230000', 'Gaseosa', 'Gaseosa', '3.00', '3.00', '5.00', '1', '0');
INSERT INTO `producto` VALUES ('6', '6', '1', '45654', '', 'sdfsd', 'sdfsdfsdf', '3.00', '2.00', '3.00', '1', '1');

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
  PRIMARY KEY (`tienda_id`),
  KEY `fk_tienda_01` (`categoria_id`),
  KEY `fk_tienda_02` (`usuario_id`),
  CONSTRAINT `fk_tienda_01` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tienda_02` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tienda
-- ----------------------------
INSERT INTO `tienda` VALUES ('1', 'Adidas', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/1200px-Adidas_Logo.svg.png', 'Adidas diseña ropa deportiva para atletas de todo tipo. Creadores que disfrutan de cambiar las reglas del juego. Desafiar las convenciones. Romper las normas y definir nuevas. Y volverlas a romper. Confeccionamos la ropa sport que visten equipos y jugadores individuales en preparación para el partido. Para que no pierdan la concentración. Diseñamos indumentaria deportiva para que llegues a la meta. Para que ganes el partido. Nuestras tiendas deportivas ofrecen atuendos para mujeres, con tops deportivos y licras diseñados con un objetivo en mente. Para deportes de impacto bajo, medio o alto. Diseñamos, innovamos e inspiramos. Ponemos a prueba nuevas tecnologías. En el campo, en la cancha, en la pista, en la piscina. La ropa deportiva retro inspira nuevos elementos esenciales de la ropa urbana. Como las NMD y los buzos Firebird. Los modelos deportivos clásicos vuelven a la vida. Como las Stan Smith y las Superstar. Ahora en todas las calles y en los escenarios más destacados.', '253614', '965412365', 'av. Central  175 - Rimac', '1', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('2', 'StarBucks', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZFz7s3GEEAu9tMakpwyc4APqNHdSykkAXlgdGtnkQ1paDh-hzXeUy5ouvoavoGjs0fC0&usqp=CAU', 'Starbucks compra y tuesta cafés en grano de gran calidad. Es la esencia de nuestra actividad. ¿Pero sabes quiénes somos en realidad?\nNuestras cafeterías se han convertido en puntos de referencia para los amantes del café en todo el mundo. ¿Pero por qué insisten en venir a Starbucks? Porque saben que reciben un servicio genuino, un ambiente acogedor y una magnífica taza de café tostado preparado con esmero por manos expertas.\n\nMás que café\nNos apasiona nuestra labor de abastecedores de café, así como todo lo relacionado con el disfrute de una experiencia gratificante en una de nuestras tiendas. También ofrecemos una selección de tés de calidad superior, alta repostería y otras alternativas deliciosas para agradar al paladar. Sin olvidar que la música que se escucha en nuestras tiendas está elegida por su calidad artística y su atractivo.', '253614', '965412365', 'av. Central  175 - Rimac', '1', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('3', 'Segoviana', 'https://www.directoriohoreca.com/sites/default/files/LA%20SEGOVIANA_0.png', 'Somos Sociedad Suizo Peruana de embutidos S.A., en 1993 con muchas ganas de crecer y apuntando a convertirnos en el referente dentro de las marcas prácticas y rendidoras, creamos la marca LA SEGOVIANA para comercializar una gran variedad de embutidos, enfocados en el Ama de Casa y todas aquellas personas que buscan la variedad, sabor, rendimiento y calidad en cada una de sus comidas. A través de los años nuestra marca se forjó un lugar en los hogares peruanos, creció llegando el momento de modernizarse, es así que en el año 2012 actualizamos nuestro ícono más representativo: nuestro logo, con una imagen más moderna y cercana a nuestros consumidores.', '253614', '965412365', 'av. Central  175 - Rimac', '2', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('4', 'Vivanda', 'http://logosenvector.com/logo/img/vivanda-307.jpg', 'En la actualidad las personas ya no tienen el tiempo o la disposición de recorrer toda una tienda en busca de los productos que necesitan; ahora desean encontrar todo rápido y fácil.\n\nPor eso, a fines del 2005 nace Vivanda, un concepto original con un formato interior único y con importantes innovaciones, dirigidas a convertir la compra diaria de nuestros clientes en una experiencia gratificante.', '253614', '965412365', 'av. Central  175 - Rimac', '2', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('5', 'Parada 111', 'https://4.bp.blogspot.com/-DlpTwvvT70Q/V6jOk-5pxWI/AAAAAAAAzhE/5fqFm_btPFY49lRs8VQqJnJRM5tF9dyewCLcB/s1600/parada111.jpg', 'PARADA 111 JEANS captura la verdadera alma del jeanswear. Nuestra marca se enorgullece de la reactivación de artículos auténticos de época y tiene como objetivo reproducir lavados, recortar y telas con referencia a períodos específicos en el tiempo. PARADA 111 JEANS VINTAGE CLOTHING sigue las tendencias, pero sigue siendo fiel a las prendas una vez celebradas por iconos de estilo del pasado.', '253614', '965412365', 'av. Central  175 - Rimac', '3', null, null, '2', '1', '0');
INSERT INTO `tienda` VALUES ('6', 'Juguería Disfruta', 'https://expansionfranquicia.com/wp-content/uploads/2018/10/logog001.jpg', 'Desde hace nueve años, Disfruta, viene revolucionando el concepto de juguería en el Perú. Los jugos están entre las bebidas favoritas de los peruanos y las juguerías son espacios de socialización, de encuentro con la salud y las bebidas naturales.\n\nDisfruta nació con un formato moderno de juguería. Llenaron una demanda que se hacía sentir en el naciente boom de los centros comerciales y de los locales de venta de productos naturales y sanos.', '253614', '965412365', 'av. Central  175 - Rimac', '1', null, null, '3', '1', '0');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin@gmail.com', '123', '1', 'ape_pa', 'ape_ma', 'admin', '1', '0');
INSERT INTO `usuario` VALUES ('2', 'user@gmail.com', '123', '2', 'ape_pa', 'ape_ma', 'user', '1', '0');
INSERT INTO `usuario` VALUES ('3', 'wingal@unmsm.edu.pe', '123', '2', 'ape_pa', 'ape_ma', 'user2', '1', '0');

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `venta_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '1',
  `trash` char(1) DEFAULT '0',
  PRIMARY KEY (`venta_id`),
  KEY `fk_venta_01` (`cliente_id`),
  CONSTRAINT `fk_venta_01` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of venta
-- ----------------------------
