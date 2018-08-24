/*
MySQL Backup
Source Server Version: 5.6.14
Source Database: mythinkphp5
Date: 2018/8/24 17:59:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `dp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dp_admin`;
CREATE TABLE `dp_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '账号',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `pic` varchar(60) DEFAULT NULL COMMENT '头像',
  `state` int(1) NOT NULL COMMENT '状态',
  `regtime` int(10) NOT NULL COMMENT '注册日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_adv`
-- ----------------------------
DROP TABLE IF EXISTS `dp_adv`;
CREATE TABLE `dp_adv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `pic` varchar(60) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_cate`
-- ----------------------------
DROP TABLE IF EXISTS `dp_cate`;
CREATE TABLE `dp_cate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `en` varchar(30) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pic` varchar(60) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL,
  `page` int(2) DEFAULT NULL,
  `model` varchar(10) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '100',
  `gid` int(2) DEFAULT NULL COMMENT '留言模板id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_link`
-- ----------------------------
DROP TABLE IF EXISTS `dp_link`;
CREATE TABLE `dp_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `pic` varchar(60) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `dp_login`
-- ----------------------------
DROP TABLE IF EXISTS `dp_login`;
CREATE TABLE `dp_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '用户id',
  `ip` varchar(20) NOT NULL COMMENT 'ip',
  `os` varchar(20) NOT NULL COMMENT '系统',
  `browser` varchar(20) NOT NULL COMMENT '浏览器',
  `logintime` varchar(10) NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_nav`
-- ----------------------------
DROP TABLE IF EXISTS `dp_nav`;
CREATE TABLE `dp_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(60) NOT NULL,
  `ico` varchar(30) DEFAULT NULL,
  `order` int(3) DEFAULT '100' COMMENT '排序',
  `display` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_sets`
-- ----------------------------
DROP TABLE IF EXISTS `dp_sets`;
CREATE TABLE `dp_sets` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL COMMENT '设置分类名称',
  `content` text NOT NULL COMMENT '数据集',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `dp_nav` VALUES ('1','0','系统设置菜单','system/index','layui-icon layui-icon-tree','100','1');
