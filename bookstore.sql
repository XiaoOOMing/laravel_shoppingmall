/*
Navicat MySQL Data Transfer

Source Server         : 本地php
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bookstore

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-14 10:54:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categorys
-- ----------------------------
DROP TABLE IF EXISTS `categorys`;
CREATE TABLE `categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `order_no` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorys
-- ----------------------------
INSERT INTO `categorys` VALUES ('1', 'PHP', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('2', 'Java', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('3', 'Javascript', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('4', 'ThinkPHP', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('5', 'YII', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('6', 'Zend', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('7', 'SpringMVC', '2', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('8', 'Node.js', '3', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('9', 'Vue.js', '3', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categorys` VALUES ('10', 'React.js', '3', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `summary` varchar(100) NOT NULL DEFAULT '',
  `preview` varchar(255) NOT NULL DEFAULT '' COMMENT '图片预览',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '单位：分',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '4', 'ThinkPHP实战', '本书实战性很强，没有冗长的概念讲解，都是实际项目中使用的实用技术，比如验证码、文件上传、图像处理、调试、安全、缓存等。留言板、博客、论坛、微信公众平台开发4个实战项目案例', '//img10.360buyimg.com/n1/jfs/t5134/102/158367023/109977/46ba081f/58f9dd89Nff920fa1.jpg', '3920', '2018-08-14 10:41:11', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('2', '4', '微信公众平台开发：从零基础到ThinkPHP5高性能框架实践', '微信是时下热门的社交通信平台，它已经全面融入我们的生活，正如它的口号所说，微信是一种生活方式。本书介绍微信及微信公众平台上的开发，涵盖了包括微信支付在内的所有接口的技术讲解，以各类应用开发为实例', '//img14.360buyimg.com/n1/jfs/t6166/335/652478356/130534/b275bd7c/59422eefNc95bdcca.jpg', '7690', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('3', '8', 'Node.js硬实战：115个核心技巧', '本书精心组织115 个已通过测试的例子，并细致剖析保障这些Node应用良好运行的实用技术；采用提出问题/解决问题模式，囊括基于事件的编程、流、集成外部应用和发布等重要话题', 'https://img10.360buyimg.com/n1/jfs/t3154/275/4458168308/153672/a9b5507b/584839baN45eeec7b.jpg', '9890', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `products` VALUES ('4', '8', '深入浅出Node.js', '《深入浅出Node.js》从不同的视角介绍了 Node 内在的特点和结构。由首章Node 介绍为索引，涉及Node 的各个方面，主要内容包含模块机制的揭示、异步I/O 实现原理的展现、异步编程的探讨', 'https://img13.360buyimg.com/n1/jfs/t6094/107/710811867/382815/4d54717/592bf165N755a88f0.jpg', '4870', '2018-08-14 10:53:21', '0000-00-00 00:00:00');
