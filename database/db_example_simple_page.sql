/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_example_simple_page

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-07-22 16:43:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Shirts', 'Shirts for every occasion');
INSERT INTO `categories` VALUES ('2', 'Blouses', 'Blouses for every occasion');
INSERT INTO `categories` VALUES ('3', 'Pants', 'Pants for every occasion');
INSERT INTO `categories` VALUES ('4', 'Dresses', 'Dresses for every occasion');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ranks` int(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Shirts 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '20', 'pc.jpg', '3', '1');
INSERT INTO `products` VALUES ('2', 'Shirts 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '41', 'pc1.jpg', '4', '1');
INSERT INTO `products` VALUES ('3', 'Shirts 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '15', 'pc2.jpg', '3', '1');
INSERT INTO `products` VALUES ('4', 'Shirts 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '12', 'pc3.jpg', '5', '1');
INSERT INTO `products` VALUES ('5', 'Blouses', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '20', 'pc4.jpg', '3', '2');
INSERT INTO `products` VALUES ('6', 'Blouses 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '40', 'pc2.jpg', '3', '2');
INSERT INTO `products` VALUES ('7', 'Blouses 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '30', 'pc5.jpg', '4', '2');
INSERT INTO `products` VALUES ('8', 'Pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '40', 'pc1.jpg', '4', '3');
INSERT INTO `products` VALUES ('9', 'Pants 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '45', 'pc6.jpg', '2', '3');
INSERT INTO `products` VALUES ('10', 'Pants 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '12', 'pc6.jpg', '3', '3');
INSERT INTO `products` VALUES ('11', 'Pants 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '20', 'pc7.jpg', '5', '3');
INSERT INTO `products` VALUES ('12', 'Pants 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '10', 'pc2.jpg', '5', '3');
INSERT INTO `products` VALUES ('13', 'Dresses', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '70', 'pc3.jpg', '5', '4');
INSERT INTO `products` VALUES ('14', 'Dresses 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '30', 'pc3.jpg', '4', '4');
INSERT INTO `products` VALUES ('15', 'Dresses 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at laoreet ex. Ut eu scelerisque quam. Mauris id enim arcu. In leo quam, cursus elementum fringilla vehicula, vehicula eu nisi', '40', 'pc1.jpg', '3', '4');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'John', '$2y$10$FcNfJMc1JBecx6jx3EXH3er/Xgj0KuUjqIusJFeyii/ReQMFKYSGe', 'john@gmail.com');
INSERT INTO `users` VALUES ('2', 'Peter', '$2y$10$P21vUE/bUVCmp5d26BMeDul6PtcM6w8t5HQsgpneKb742NwMCPzKW', 'peter@yahoo.com');
INSERT INTO `users` VALUES ('3', 'Crish', '$2y$10$FkdyOJ9nXdNDHY8IqaH0Ne5OTD5hgejJhqWObqA/sn70nSUnuYq9.', 'crish@gmail.com');
