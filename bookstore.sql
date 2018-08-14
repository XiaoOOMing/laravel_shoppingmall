/*
Navicat MySQL Data Transfer

Source Server         : 本地php
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bookstore

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-14 10:27:24
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
