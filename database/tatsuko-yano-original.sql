/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : tatsuko-yano-original

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tyo_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_admin`;
CREATE TABLE `tyo_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `power` varchar(1000) NOT NULL COMMENT '权限序列化后存储',
  `createtime` int(11) unsigned NOT NULL,
  `cannotdel` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否可删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyo_admin
-- ----------------------------
INSERT INTO `tyo_admin` VALUES ('1', 'admin', 'administrator', 'e10adc3949ba59abbe56e057f20f883e', 'a:8:{i:0;s:13:\"SYSTEM_MANAGE\";i:1;s:11:\"NEWS_MANAGE\";i:2;s:11:\"INFO_MANAGE\";i:3;s:14:\"PRODUCT_MANAGE\";i:4;s:12:\"GROUP_MANAGE\";i:5;s:13:\"MEMBER_MANAGE\";i:6;s:10:\"ADS_MANAGE\";i:7;s:10:\"JOB_MANAGE\";}', '1427126400', '1');
INSERT INTO `tyo_admin` VALUES ('2', 'test', 'test', '46f94c8de14fb36680850768ff1b7f2a', 'a:3:{i:0;s:11:\"INFO_MANAGE\";i:1;s:14:\"PRODUCT_MANAGE\";i:2;s:12:\"GROUP_MANAGE\";}', '1429528218', '0');

-- ----------------------------
-- Table structure for `tyo_auth`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_auth`;
CREATE TABLE `tyo_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authkey` varchar(20) DEFAULT NULL COMMENT '随机数',
  `authcode` varchar(10) NOT NULL COMMENT '验证码',
  `expire` int(11) unsigned NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tyo_banner`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_banner`;
CREATE TABLE `tyo_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL COMMENT '对应的链接，可以为空。',
  `key` enum('index','about','product','news','vip','info','job','online') NOT NULL COMMENT 'Banner key值',
  `listorder` smallint(5) unsigned DEFAULT '0' COMMENT '数值越大越靠前',
  `width` smallint(5) NOT NULL,
  `height` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyo_banner
-- ----------------------------
INSERT INTO `tyo_banner` VALUES ('1', 'Home', 'uploads/image/20150608/banner-01.jpg', '', 'index', '0', '1600', '415');
INSERT INTO `tyo_banner` VALUES ('2', 'Home', 'uploads/image/20150608/banner-02.jpg', null, 'index', '0', '1600', '415');
INSERT INTO `tyo_banner` VALUES ('3', 'Home', 'uploads/image/20150608/banner-03.jpg', null, 'index', '0', '1600', '415');
INSERT INTO `tyo_banner` VALUES ('4', 'About us', 'uploads/image/20150608/banner-in.jpg', null, 'about', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('5', 'Product & Service', 'uploads/image/20150608/banner-in.jpg', null, 'product', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('6', 'News', 'uploads/image/20150608/banner-in.jpg', null, 'news', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('7', 'Members area', 'uploads/image/20150608/banner-in.jpg', null, 'vip', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('8', 'Information', 'uploads/image/20150608/banner-in.jpg', null, 'info', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('9', 'Join us', 'uploads/image/20150608/banner-in.jpg', null, 'job', '0', '1194', '183');
INSERT INTO `tyo_banner` VALUES ('10', 'On-line testing', 'uploads/image/20150608/banner-in.jpg', null, 'online', '0', '1194', '183');

-- ----------------------------
-- Table structure for `tyo_config`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_config`;
CREATE TABLE `tyo_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型，1:文本，2:数组（序列化后存储）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyo_config
-- ----------------------------
INSERT INTO `tyo_config` VALUES ('1', 'service_email', 'sebastianlan.original@gmail.com', 'Support', '1');

-- ----------------------------
-- Table structure for `tyo_group`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_group`;
CREATE TABLE `tyo_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` smallint(5) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数值越大越靠前',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除，1:删除，0未删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Partner（合作伙伴）';


-- ----------------------------
-- Table structure for `tyo_group_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_group_cate`;
CREATE TABLE `tyo_group_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数值越大越靠前',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Partner（合作伙伴）分类';

-- ----------------------------
-- Records of tyo_group_cate
-- ----------------------------
INSERT INTO `tyo_group_cate` VALUES ('1', 'group-category-01', '1', '0', '0');
INSERT INTO `tyo_group_cate` VALUES ('2', 'group-category-02', '1', '0', '0');
INSERT INTO `tyo_group_cate` VALUES ('3', 'group-category-03', '1', '0', '0');
INSERT INTO `tyo_group_cate` VALUES ('4', 'group-category-04', '1', '0', '0');

-- ----------------------------
-- Table structure for `tyo_info`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_info`;
CREATE TABLE `tyo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `cateid` smallint(5) unsigned NOT NULL,
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `desc` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `attach` varchar(250) DEFAULT NULL COMMENT '附件',
  `createtime` int(11) unsigned NOT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除，1删除，0未删除',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序，数值越大越靠前',
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效，默认为1有效，0无效',
  `pageview` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='资讯';


-- ----------------------------
-- Table structure for `tyo_info_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_info_cate`;
CREATE TABLE `tyo_info_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序，数值越大越靠前',
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效，默认为1，有效；无效0',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除，默认为0未删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='资讯 分类';

-- ----------------------------
-- Records of tyo_info_cate
-- ----------------------------
INSERT INTO `tyo_info_cate` VALUES ('1', 'info-category-01', '1', '1', '0');
INSERT INTO `tyo_info_cate` VALUES ('2', 'info-category-02', '1', '1', '0');

-- ----------------------------
-- Table structure for `tyo_job`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_job`;
CREATE TABLE `tyo_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `area` varchar(100) NOT NULL COMMENT '工作地点',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `desc` varchar(1000) DEFAULT '' COMMENT '简介',
  `content` text COMMENT '正文',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数值越大越靠前',
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='招聘模块';


-- ----------------------------
-- Table structure for `tyo_job_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_job_cate`;
CREATE TABLE `tyo_job_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数值越大越靠前',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='招聘模块 分类';

-- ----------------------------
-- Records of tyo_job_cate
-- ----------------------------
INSERT INTO `tyo_job_cate` VALUES ('1', 'Why do you choose us', '1', '0', '0');
INSERT INTO `tyo_job_cate` VALUES ('2', 'About our team', '1', '0', '0');
INSERT INTO `tyo_job_cate` VALUES ('3', 'Position request', '1', '0', '0');

-- ----------------------------
-- Table structure for `tyo_member`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_member`;
CREATE TABLE `tyo_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcard` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `password` varchar(32) NOT NULL COMMENT '32位md5',
  `mobile` varchar(13) DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别，0:未知，1:男，2:女',
  `age` tinyint(2) unsigned DEFAULT '0' COMMENT '年龄',
  `createtime` int(11) unsigned NOT NULL COMMENT '注册时间',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除；0:未删除，1:已删除',
  `autocode` varchar(50) DEFAULT NULL COMMENT '自动登录验证码',
  `autoexpire` int(11) unsigned DEFAULT NULL COMMENT '自动登录过期时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='会员表';


-- ----------------------------
-- Table structure for `tyo_member_product`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_member_product`;
CREATE TABLE `tyo_member_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL COMMENT '会员ID',
  `product_id` int(11) unsigned NOT NULL COMMENT '产品ID',
  `type` tinyint(1) unsigned NOT NULL COMMENT '付款方式',
  `buytime` int(11) NOT NULL COMMENT '购买时间，默认为当天',
  `buymoney` int(11) unsigned NOT NULL COMMENT '购买金额，单位元',
  `tplname` varchar(200) NOT NULL COMMENT '模板名称',
  `earn` float(5,1) unsigned NOT NULL COMMENT '利率',
  `overtime` smallint(5) unsigned NOT NULL COMMENT '时限，单位：月',
  `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '总收益',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tyo_member_tpldetail`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_member_tpldetail`;
CREATE TABLE `tyo_member_tpldetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tplid` int(11) unsigned NOT NULL COMMENT '产品模版ID；对应th_member_product',
  `time` int(11) NOT NULL COMMENT '付款时间',
  `money` int(11) unsigned DEFAULT NULL COMMENT '付款金额',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否付清',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tyo_news`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_news`;
CREATE TABLE `tyo_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `pic` varchar(250) DEFAULT NULL COMMENT '新闻图片',
  `cateid` smallint(5) NOT NULL,
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `desc` varchar(250) NOT NULL COMMENT '摘要',
  `content` text NOT NULL COMMENT '正文',
  `createtime` int(11) unsigned NOT NULL COMMENT '发布时间',
  `updatetime` int(11) unsigned DEFAULT NULL COMMENT '最新更新时间',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除，1删除，0未删除',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序，数值越大越靠前',
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效，默认为1，有效。无效0',
  `pageview` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='新闻';


-- ----------------------------
-- Table structure for `tyo_news_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_news_cate`;
CREATE TABLE `tyo_news_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '分类名称',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐排序，数值越大越靠前',
  `isvalid` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效，默认为1有效，无效0',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除，默认为0，未删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='新闻 分类';

-- ----------------------------
-- Records of tyo_news_cate
-- ----------------------------
INSERT INTO `tyo_news_cate` VALUES ('1', 'news-category-01', '4', '1', '0');
INSERT INTO `tyo_news_cate` VALUES ('2', 'news-category-02', '3', '1', '0');
INSERT INTO `tyo_news_cate` VALUES ('3', 'news-category-03', '2', '1', '0');
INSERT INTO `tyo_news_cate` VALUES ('4', 'news-category-04', '1', '1', '0');

-- ----------------------------
-- Table structure for `tyo_online_survey`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_online_survey`;
CREATE TABLE `tyo_online_survey` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL COMMENT '序列化后的结果',
  `createtime` int(11) unsigned NOT NULL COMMENT '提交时间',
  `isdeal` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否处理，1:已处理，0未处理',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT '1:Online Risk Test; 2:Online Asset Allocation; 3:Online Booking',
  `html` text COMMENT '生成的html，供发送邮件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='在线服务结果';


-- ----------------------------
-- Table structure for `tyo_order`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_order`;
CREATE TABLE `tyo_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL COMMENT '产品ID',
  `name` varchar(100) NOT NULL,
  `contact` varchar(250) NOT NULL COMMENT '联系方式，电话，邮箱等',
  `isdeal` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否处理;0未处理，1已处理',
  `createtime` int(11) unsigned NOT NULL COMMENT '下单时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='订单';


-- ----------------------------
-- Table structure for `tyo_power`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_power`;
CREATE TABLE `tyo_power` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL COMMENT '权限值',
  `name` varchar(200) NOT NULL COMMENT '权限名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyo_power
-- ----------------------------
INSERT INTO `tyo_power` VALUES ('1', 'SYSTEM_MANAGE', 'System');
INSERT INTO `tyo_power` VALUES ('2', 'NEWS_MANAGE', 'News');
INSERT INTO `tyo_power` VALUES ('3', 'INFO_MANAGE', 'Info');
INSERT INTO `tyo_power` VALUES ('4', 'PRODUCT_MANAGE', 'Product');
INSERT INTO `tyo_power` VALUES ('5', 'GROUP_MANAGE', 'Partner');
INSERT INTO `tyo_power` VALUES ('6', 'MEMBER_MANAGE', 'Member');
INSERT INTO `tyo_power` VALUES ('7', 'ADS_MANAGE', 'Banner');
INSERT INTO `tyo_power` VALUES ('8', 'JOB_MANAGE', 'Job');

-- ----------------------------
-- Table structure for `tyo_product`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_product`;
CREATE TABLE `tyo_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL COMMENT '产品名称',
  `keywords` varchar(100) DEFAULT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `product_desc` varchar(100) DEFAULT NULL COMMENT '简短描述',
  `product_baseinfo` text,
  `product_detail` text COMMENT '产品详情',
  `cateid` smallint(5) unsigned NOT NULL COMMENT '产品分类ID',
  `group_id` smallint(5) DEFAULT NULL COMMENT 'Panter ID',
  `faxing_time` int(11) unsigned DEFAULT NULL COMMENT '发行时间',
  `earn_min` float(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '最小收益',
  `earn_max` float(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '最大收益，冗余字段，用来排序',
  `deadline` smallint(5) unsigned DEFAULT NULL COMMENT '时限，以月为单位',
  `buy_min` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '起购点，默认为0无限制，单位万元',
  `total_money` int(10) unsigned DEFAULT NULL COMMENT '总金额，单位万元',
  `invest_id` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '领域',
  `invest_way` text COMMENT '用途',
  `earn_time` tinyint(1) unsigned DEFAULT NULL COMMENT '分配',
  `earn_type` varchar(100) NOT NULL COMMENT '收益类型；手写',
  `earn_desc` varchar(1000) DEFAULT NULL COMMENT '收益说明',
  `way` text COMMENT '风控措施',
  `remark` text COMMENT '补充说明',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '产品状态；1:预热；2:热销；3:售罄',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除，1:删除，0未删除',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序数值越大越靠前',
  `pageview` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `ordernum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '订单量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='产品表';


-- ----------------------------
-- Table structure for `tyo_product_attach`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_product_attach`;
CREATE TABLE `tyo_product_attach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL COMMENT '文件名',
  `filepath` varchar(250) NOT NULL COMMENT '存储路径',
  `ext` varchar(10) NOT NULL COMMENT '文件后缀名',
  `size` float(10,1) NOT NULL DEFAULT '0.0' COMMENT '文件大小，KB',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tyo_product_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_product_cate`;
CREATE TABLE `tyo_product_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` text COMMENT '产品分类介绍',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数值越大越靠前',
  `isvalid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyo_product_cate
-- ----------------------------
INSERT INTO `tyo_product_cate` VALUES ('1', 'product-category-01', null, '1', '1', '0');
INSERT INTO `tyo_product_cate` VALUES ('2', 'product-category-02', null, '0', '1', '0');
INSERT INTO `tyo_product_cate` VALUES ('3', 'product-category-03', null, '3', '1', '0');
INSERT INTO `tyo_product_cate` VALUES ('4', 'product-category-04', null, '0', '1', '0');

-- ----------------------------
-- Table structure for `tyo_product_earn`
-- ----------------------------
DROP TABLE IF EXISTS `tyo_product_earn`;
CREATE TABLE `tyo_product_earn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `time` smallint(5) unsigned NOT NULL COMMENT '时间',
  `money` varchar(50) NOT NULL COMMENT '资金描述',
  `earn` float(5,1) unsigned NOT NULL COMMENT '收益，x100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='产品收益明细，多维度';

