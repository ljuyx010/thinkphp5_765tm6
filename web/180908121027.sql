/*
MySQL Backup
Source Server Version: 5.6.14
Source Database: mythinkphp5
Date: 2018/9/8 12:10:27
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
--  Table structure for `dp_article`
-- ----------------------------
DROP TABLE IF EXISTS `dp_article`;
CREATE TABLE `dp_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `title` varchar(120) NOT NULL COMMENT '标题',
  `keyword` varchar(200) DEFAULT NULL COMMENT '关键字',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  `pic` varchar(80) DEFAULT NULL COMMENT '封面图',
  `pics` varchar(100) DEFAULT NULL COMMENT '图集',
  `tj` int(1) DEFAULT NULL COMMENT '推荐',
  `sid` int(10) DEFAULT NULL COMMENT '专题',
  `author` varchar(30) DEFAULT NULL COMMENT '作者',
  `from` varchar(30) DEFAULT NULL COMMENT '来源',
  `time` int(10) NOT NULL COMMENT '发布日期',
  `uid` int(10) NOT NULL COMMENT '发文人id',
  `url` varchar(30) DEFAULT NULL COMMENT '外链',
  `content` longtext NOT NULL COMMENT '正文',
  `del` int(1) DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `pic` varchar(80) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL,
  `page` int(2) DEFAULT NULL,
  `model` varchar(10) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '100',
  `gid` int(2) DEFAULT NULL COMMENT '留言模板id',
  `isn` int(1) NOT NULL DEFAULT '1' COMMENT '是否主菜单显示',
  `isf` int(1) NOT NULL DEFAULT '1' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_img`
-- ----------------------------
DROP TABLE IF EXISTS `dp_img`;
CREATE TABLE `dp_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `imgurl` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `ico` varchar(40) DEFAULT NULL,
  `order` int(3) DEFAULT '100' COMMENT '排序',
  `display` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

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
--  Table structure for `dp_subject`
-- ----------------------------
DROP TABLE IF EXISTS `dp_subject`;
CREATE TABLE `dp_subject` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subname` varchar(60) NOT NULL COMMENT '专题名称',
  `pic` varchar(80) DEFAULT NULL COMMENT '专题封面',
  `url` varchar(40) DEFAULT NULL COMMENT '跳转链接',
  `order` int(3) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `dp_article` VALUES ('4','4','十大歌手的嘎嘎的反感',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'65851814','0',NULL,'','0'), ('3','4','撒饭发卡机佛奥时间哦评价',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'189256546','0',NULL,'','1');
INSERT INTO `dp_cate` VALUES ('1','0','联系方式','Finance and taxation','电子书','办理时间：周一至周五，上午8：30——12：00；下午3:00——5：30','/public/uploads/20180901/310ddbaae58f627662295caa0e77eb71.jpg','','10','info','100','0','1','1'), ('2','1','在线留言','','','',NULL,'','10','gbook','100','0','1','1'), ('3','0','新闻资讯','News','','',NULL,'','10','article','99','0','1','1'), ('4','0','行业新闻','','','',NULL,'','10','article','100','0','1','1');
INSERT INTO `dp_img` VALUES ('1','/public/uploads/20180908/2e1bb44a3ed73cf484ddd3ad21454696.jpg');
INSERT INTO `dp_nav` VALUES ('2','0','系统菜单','system/index','layui-icon layui-icon-tree','2','1'), ('4','0','站点设置','','layui-icon layui-icon-app','1','1'), ('5','4','常规设置','siteset/index','','100','1'), ('6','4','水印设置','siteset/weater','','100','1'), ('7','4','邮件设置','siteset/mail','','100','1'), ('8','4','微信设置','siteset/wechat','','100','1'), ('9','0','广告图管理','banner/index','layui-icon layui-icon-picture-','3','1'), ('10','0','友链管理','link/index','layui-icon layui-icon-link','100','1'), ('11','0','专题管理','subject/index','layui-icon layui-icon-list','100','1'), ('12','0','栏目管理','cate/index','layui-icon layui-icon-menu-fill','100','1'), ('13','0','权限管理','','layui-icon layui-icon-auz','100','1'), ('14','13','管理员列表','auth/user','','100','1'), ('15','13','角色管理','auth/rule','','100','1'), ('16','13','节点管理','auth/access','','100','1'), ('17','10','友链类型','link/type','','100','1'), ('18','10','友链列表','link/index','','100','1'), ('19','0','系统工具','','layui-icon layui-icon-util','100','1'), ('20','19','采集设置','collect/index','','100','1'), ('21','19','采集记录','collect/note','','100','1'), ('22','19','数据备份','bak/index','','100','1');
