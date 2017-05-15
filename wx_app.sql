/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : wx_app

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-15 15:39:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `baijiacms_base_member`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_base_member`;
CREATE TABLE `baijiacms_base_member` (
  `status` int(2) NOT NULL,
  `beid` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `dingtalk_openid` varchar(50) DEFAULT NULL,
  `qq_openid` varchar(50) DEFAULT NULL,
  `weixin_openid` varchar(50) DEFAULT NULL,
  `isblack` int(2) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_base_member
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_config`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_config`;
CREATE TABLE `baijiacms_config` (
  `group` varchar(10) NOT NULL,
  `beid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '配置名称',
  `value` text NOT NULL,
  PRIMARY KEY (`group`,`beid`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_config
-- ----------------------------
INSERT INTO `baijiacms_config` VALUES ('commission', '1', 'system_config_cache', 'a:0:{}');
INSERT INTO `baijiacms_config` VALUES ('sale', '1', 'system_config_cache', 'a:0:{}');
INSERT INTO `baijiacms_config` VALUES ('shop', '1', 'name', '默认店铺');
INSERT INTO `baijiacms_config` VALUES ('shop', '1', 'system_config_cache', 'a:1:{s:4:\"name\";s:12:\"默认店铺\";}');
INSERT INTO `baijiacms_config` VALUES ('weixin', '1', 'system_config_cache', 'a:0:{}');

-- ----------------------------
-- Table structure for `baijiacms_core_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_core_attachment`;
CREATE TABLE `baijiacms_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_core_attachment
-- ----------------------------
INSERT INTO `baijiacms_core_attachment` VALUES ('6', '1', '1', '', 'jpg/2017/05/O0rzcLC0sEL8e07.jpg', '1', '1494773896');
INSERT INTO `baijiacms_core_attachment` VALUES ('7', '1', '1', '', 'jpg/2017/05/ydFZQIJKFup3Uu5.jpg', '1', '1494773937');
INSERT INTO `baijiacms_core_attachment` VALUES ('8', '1', '1', '', 'jpg/2017/05/RvHvp97hh3c09eZ.jpg', '1', '1494828533');
INSERT INTO `baijiacms_core_attachment` VALUES ('9', '1', '1', '', 'jpg/2017/05/PS7eK4028Sz8vvV.jpg', '1', '1494828614');
INSERT INTO `baijiacms_core_attachment` VALUES ('10', '1', '1', '', 'jpg/2017/05/m1184Dd4U1yZNN0.jpg', '1', '1494828628');
INSERT INTO `baijiacms_core_attachment` VALUES ('11', '1', '1', '', 'jpg/2017/05/LCmAaT72j3nCfIA.jpg', '1', '1494828717');
INSERT INTO `baijiacms_core_attachment` VALUES ('12', '1', '1', '', 'jpg/2017/05/TEE1IhP8DWo9P05.jpg', '1', '1494828770');
INSERT INTO `baijiacms_core_attachment` VALUES ('13', '1', '1', '', 'jpg/2017/05/hbt66LtIkbBlVtO.jpg', '1', '1494828776');
INSERT INTO `baijiacms_core_attachment` VALUES ('14', '1', '1', '', 'jpg/2017/05/pme5CP75l2Tvbwl.jpg', '1', '1494828790');
INSERT INTO `baijiacms_core_attachment` VALUES ('15', '1', '1', '', 'jpg/2017/05/PwS9xF7V7Wv2jv9.jpg', '1', '1494828790');
INSERT INTO `baijiacms_core_attachment` VALUES ('16', '1', '1', '', 'jpg/2017/05/kpaq4PLPD2228z2.jpg', '1', '1494828897');
INSERT INTO `baijiacms_core_attachment` VALUES ('17', '1', '1', '', 'jpg/2017/05/N2zCv0w0Ff2Wr2D.jpg', '1', '1494829117');
INSERT INTO `baijiacms_core_attachment` VALUES ('18', '1', '1', '', 'jpg/2017/05/iiPuyWPQdvYqDDq.jpg', '1', '1494829342');
INSERT INTO `baijiacms_core_attachment` VALUES ('19', '1', '1', '', 'jpg/2017/05/tsD95xSKCs5BTMk.jpg', '1', '1494829423');
INSERT INTO `baijiacms_core_attachment` VALUES ('20', '1', '1', '', 'jpg/2017/05/fp7CbFcfZYPZC7c.jpg', '1', '1494829707');
INSERT INTO `baijiacms_core_attachment` VALUES ('21', '1', '1', '', 'jpg/2017/05/K3l2LZ2Sr1hGiOl.jpg', '1', '1494829790');
INSERT INTO `baijiacms_core_attachment` VALUES ('22', '1', '1', '', 'jpg/2017/05/Z7c5oh797CwDEj3.jpg', '1', '1494829871');
INSERT INTO `baijiacms_core_attachment` VALUES ('23', '1', '1', '', 'jpg/2017/05/mvLfCF2fCzQYdzs.jpg', '1', '1494831842');
INSERT INTO `baijiacms_core_attachment` VALUES ('24', '1', '1', '', 'jpg/2017/05/yz2fiF01xGFc2Pc.jpg', '1', '1494832071');
INSERT INTO `baijiacms_core_attachment` VALUES ('25', '1', '1', '', 'jpg/2017/05/aqcZY4suQadZ7ps.jpg', '1', '1494832095');
INSERT INTO `baijiacms_core_attachment` VALUES ('26', '1', '1', '', 'jpg/2017/05/w4acsC2cfFz4pp4.jpg', '1', '1494832669');
INSERT INTO `baijiacms_core_attachment` VALUES ('27', '1', '1', '', 'jpg/2017/05/J3CMvlidgQ774X2.jpg', '1', '1494832781');
INSERT INTO `baijiacms_core_attachment` VALUES ('28', '1', '1', '', 'jpg/2017/05/Lhri400HEPjH0dL.jpg', '1', '1494832870');
INSERT INTO `baijiacms_core_attachment` VALUES ('29', '1', '1', '', 'jpg/2017/05/W5m75GTtm4GG4ll.jpg', '1', '1494832935');
INSERT INTO `baijiacms_core_attachment` VALUES ('30', '1', '1', '', 'jpg/2017/05/k05P2qnz4wF4qey.jpg', '1', '1494833080');
INSERT INTO `baijiacms_core_attachment` VALUES ('31', '1', '1', '', 'jpg/2017/05/R4hR44v44RV9H4j.jpg', '1', '1494833180');
INSERT INTO `baijiacms_core_attachment` VALUES ('32', '1', '1', '', 'jpg/2017/05/vHOx9YxopiP2f3H.jpg', '1', '1494833376');

-- ----------------------------
-- Table structure for `baijiacms_core_paylog`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_core_paylog`;
CREATE TABLE `baijiacms_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL,
  `openid` varchar(40) NOT NULL DEFAULT '',
  `tid` varchar(64) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `module` varchar(50) NOT NULL DEFAULT '',
  `tag` varchar(2000) NOT NULL DEFAULT '',
  `acid` int(10) unsigned NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  `createtime` varchar(64) NOT NULL,
  `eso_tag` varchar(2000) NOT NULL DEFAULT '',
  `uniontid` varchar(64) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_core_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_article`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_article`;
CREATE TABLE `baijiacms_eshop_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL DEFAULT '',
  `resp_desc` text NOT NULL,
  `resp_img` text NOT NULL,
  `article_content` longtext,
  `article_category` int(11) NOT NULL DEFAULT '0',
  `article_date_v` varchar(20) NOT NULL DEFAULT '',
  `article_date` varchar(20) NOT NULL DEFAULT '',
  `article_mp` varchar(50) NOT NULL DEFAULT '',
  `article_author` varchar(20) NOT NULL DEFAULT '',
  `article_readnum_v` int(11) NOT NULL DEFAULT '0',
  `article_readnum` int(11) NOT NULL DEFAULT '0',
  `article_likenum_v` int(11) NOT NULL DEFAULT '0',
  `article_likenum` int(11) NOT NULL DEFAULT '0',
  `article_linkurl` varchar(300) NOT NULL DEFAULT '',
  `article_rule_daynum` int(11) NOT NULL DEFAULT '0',
  `article_rule_allnum` int(11) NOT NULL DEFAULT '0',
  `article_rule_credit` int(11) NOT NULL DEFAULT '0',
  `article_rule_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `page_set_option_nocopy` int(1) NOT NULL DEFAULT '0',
  `page_set_option_noshare_tl` int(1) NOT NULL DEFAULT '0',
  `page_set_option_noshare_msg` int(1) NOT NULL DEFAULT '0',
  `article_keyword` varchar(255) NOT NULL DEFAULT '',
  `article_report` int(1) NOT NULL DEFAULT '0',
  `product_advs_type` int(1) NOT NULL DEFAULT '0',
  `product_advs_title` varchar(255) NOT NULL DEFAULT '',
  `product_advs_more` varchar(255) NOT NULL DEFAULT '',
  `product_advs_link` varchar(255) NOT NULL DEFAULT '',
  `product_advs` text NOT NULL,
  `article_state` int(1) NOT NULL DEFAULT '0',
  `network_attachment` varchar(255) DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `article_rule_credittotal` int(11) DEFAULT '0',
  `article_rule_moneytotal` decimal(10,2) DEFAULT '0.00',
  `article_rule_credit2` int(11) NOT NULL DEFAULT '0',
  `article_rule_money2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_rule_creditm` int(11) NOT NULL DEFAULT '0',
  `article_rule_moneym` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_rule_creditm2` int(11) NOT NULL DEFAULT '0',
  `article_rule_moneym2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_readtime` int(11) DEFAULT '0',
  `article_areas` varchar(255) DEFAULT '',
  `article_endtime` int(11) DEFAULT '0',
  `article_hasendtime` tinyint(3) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `article_keyword2` varchar(255) NOT NULL DEFAULT '',
  `article_advance` int(11) DEFAULT '0',
  `article_virtualadd` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_article_title` (`article_title`),
  KEY `idx_article_content` (`article_content`(10)),
  KEY `idx_article_keyword` (`article_keyword`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_article
-- ----------------------------
INSERT INTO `baijiacms_eshop_article` VALUES ('1', '城里网携手崔永元为大连社区百姓送健康', '城里网5月9日讯   昨日下午，城里网社区特约记者代表30余人来到璞谷塘崔永元食品文化交流俱乐部，与崔永元老师见面，分享食品安全知识。中', 'jpg/2017/05/N2zCv0w0Ff2Wr2D.jpg', '<div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\"><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F50915012KO.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 400px;\"/></span><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;城里网5月9日讯 &nbsp; 昨日下午，城里网社区特约记者代表30余人来到璞谷塘崔永元食品文化交流俱乐部，与崔永元老师见面，分享食品安全知识。中国农业大学食品科学与营养工程学院副教授朱毅老师、城里网总经理张涵迪先生、大连宫氏摸骨顺经非遗传承人宫国江先生等一同参加了本次活动。</span><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\"><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F50915025HS.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 400px;\"/><br style=\"padding: 0px; margin: 0px;\"/><br style=\"padding: 0px; margin: 0px;\"/><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F509150330535.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 361px;\"/></span></div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp; 现场崔永元老师就中国现在的食品安全问题进行剖析，由于环境污染、黑心商家等多方面因素影响，发生很多食品安全事件。现在如何吃到安全健康的食品成为我们百姓最关心的问题。崔永元老师通过对食品安全的了解、真相的探知、实地的考察，决定用自己的名誉创办企业，在全球范围内寻找安全健康食品，为百姓吃上安全食品保驾护航。</span><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F509150351944.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 390px;\"/><br style=\"padding: 0px; margin: 0px;\"/><br style=\"padding: 0px; margin: 0px;\"/><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F509150422635.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 398px;\"/><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;互动环节中，朱毅老师针对特约记者提出的大米如何鉴别、自己菜园子种的菜是否安全等问题进行解答。崔永元老师现场为大家举例演示什么是转基因食品，转基因食品有什么危害。</span><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\"><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F509150445305.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 355px;\"/><br style=\"padding: 0px; margin: 0px;\"/><br style=\"padding: 0px; margin: 0px;\"/><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170509/65-1F509150504457.jpg\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 338px;\"/></span><br style=\"padding: 0px; margin: 0px;\"/>&nbsp;</div><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp; 崔永元老师长期关注食品安全问题，致力于打造诚信食品，建设诚信体系。城里网作为大连本土民生新闻门户网站，致力于带领社区百姓守住健康，打造快乐。本次见面会是双方深入合作的开端，城里网将携手崔永元及其团队进社区为大连百姓送健康，传播“食品安全知识”，筛选放心食品，为食品安全保驾护航。</span></div><p><br/></p>', '3', '2017-05-15', '2017-05-15 14:18:39', '', '', '12', '0', '12', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('2', '兴利社区第二届“幸福邻里节”益互联便民大集', '天上午在兴利社区广场启动了益互联便民大集。很多公益活动乐坏了兴利社区居民。', 'jpg/2017/05/iiPuyWPQdvYqDDq.jpg', '<p>天上午在兴利社区广场启动了益互联便民大集。很多公益活动乐坏了兴利社区居民。</p><p>更有社区舞蹈队、老年健身队的表演使气氛非常火爆。请分享。</p><p><br/></p>', '3', '2017-05-15', '2017-05-15 14:22:24', '', '阿里', '11', '0', '11', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('3', '跨界合作，强强联合，城里网与合众人寿达成战略合作', '4月28日，城里网与合众人寿举行战略合作见面洽谈会，双方达成跨界战略合作共识，充分共享优势资源，实现保险服务与新媒体的深度融合，建立起长期、全面的战略合作关系，实现强强联手', 'jpg/2017/05/tsD95xSKCs5BTMk.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;4月28日，城里网与合众人寿举行战略合作见面洽谈会，双方达成跨界战略合作共识，充分共享优势资源，实现保险服务与新媒体的深度融合，建立起长期、全面的战略合作关系，实现强强联手、合作共赢。</span></p>', '3', '2017-05-15', '2017-05-15 14:24:05', '', '笑江湖', '44', '0', '3', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('4', '连山社区开展“人人爱护绿地，共建美好家园”活动', '5月9日,连山社区组织辖区党员志愿者、楼长及辖区企业工作人员共计58人，开展了清理花坛、绿地栽植花草和居民认养绿地活动。', 'jpg/2017/05/mvLfCF2fCzQYdzs.jpg', '<p>5月9日,连山社区组织辖区党员志愿者、楼长及辖区企业工作人员共计58人，开展了清理花坛、绿地栽植花草和居民认养绿地活动。<br/><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\">为了让居民拥有一个干净整洁的环境，连山社区工作人员组织大家对小区内的杂草进行清除。按照花坛包片，分工负责。清理完花坛，社区工作人员、志愿者和园艺师相互配合，在辖区18个花坛上种了1200多棵月季、7000多棵宿根花卉、丁香和迎春花300多棵，原本杂乱的花坛以及空地变得整齐有序。</span></span><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\"><br style=\"word-wrap: break-word; margin: 0px auto;\"/></span></span><br style=\"word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"/></p><div align=\"center\" style=\"word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><ignore_js_op style=\"word-wrap: break-word; margin: 0px auto;\"><img id=\"aimg_250809\" aid=\"250809\" src=\"http://www.chengliwang.com/data/attachment/forum/201705/11/171241qizglz6yxysvxzw5.jpg\" zoomfile=\"data/attachment/forum/201705/11/171241qizglz6yxysvxzw5.jpg\" file=\"data/attachment/forum/201705/11/171241qizglz6yxysvxzw5.jpg\" class=\"zoom\" width=\"400\" inpost=\"1\" initialized=\"true\" style=\"word-wrap: break-word; margin: 0px auto; cursor: pointer; max-width: 600px; height: auto;\"/></ignore_js_op></div><p><br/></p>', '4', '2017-05-15', '2017-05-15 15:04:15', '', '阿里', '12', '0', '33', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('5', '凌海社区组织部分党员、楼长及居民代表郊游', '城里网4月21日讯（图/文 王淑英）4月21日由凌海社区组识、人寿保险公司贊助，部分党员、楼长及居民代表参加了此次棠梨湖、西郊园艺花卉超市的郊游活动。', 'jpg/2017/05/yz2fiF01xGFc2Pc.jpg', '<p>&nbsp;城里网4月21日讯（图/文 王淑英）4月21日由凌海社区组识、人寿保险公司贊助，部分党员、楼长及居民代表参加了此次棠梨湖、西郊园艺花卉超市的郊游活动。</p><p><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\"><span style=\"word-wrap: break-word; margin: 0px auto; font-weight: 700;\">城里网4月21日讯（图/文 王淑英）</span>4月21日由凌海社区组识、人寿保险公司贊助，部分党员、楼长及居民代表参加了此次棠梨湖、西郊园艺花卉超市的郊游活动。<br style=\"word-wrap: break-word; margin: 0px auto;\"/><br style=\"word-wrap: break-word; margin: 0px auto;\"/>&nbsp; &nbsp; 首先，是趣味运动会</span></span><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\">第一项趣味活动是投沙包。</span></span><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\">每人投五次，累计八人投进次數排名次。<br style=\"word-wrap: break-word; margin: 0px auto;\"/><br style=\"word-wrap: break-word; margin: 0px auto;\"/></span></span></p><div align=\"center\" style=\"word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto;\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\"><ignore_js_op style=\"word-wrap: break-word; margin: 0px auto;\"><img id=\"aimg_249828\" aid=\"249828\" src=\"http://www.chengliwang.com/data/attachment/forum/201704/24/140407bbkq0b09k9e0k0z0.jpg\" zoomfile=\"data/attachment/forum/201704/24/140407bbkq0b09k9e0k0z0.jpg\" file=\"data/attachment/forum/201704/24/140407bbkq0b09k9e0k0z0.jpg\" class=\"zoom\" width=\"750\" inpost=\"1\" initialized=\"true\" style=\"word-wrap: break-word; margin: 0px auto; cursor: pointer; max-width: 600px; height: auto;\"/></ignore_js_op></span></span></div><div><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto;\"><span style=\"font-size:18px;word-wrap: break-word; margin: 0px auto;\"><ignore_js_op style=\"word-wrap: break-word; margin: 0px auto;\"><br/></ignore_js_op></span></span></div><p><span style=\"font-family:宋体;word-wrap: break-word; margin: 0px auto; color: rgb(68, 68, 68); font-size: 14px; white-space: normal; background-color: rgb(245, 245, 245);\"></span></p><p><br/></p>', '4', '2017-05-15', '2017-05-15 15:07:52', '', '小兔子', '2', '0', '2', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('6', '栾金蓝海社区乐泉艺术团9周年庆', '城里网4月27日讯（图/文 韩新国）栾金蓝海社区乐泉艺术团今天迎来了建团后第九个生日，乐泉艺术团今天欢聚在阳光居酒店，大家载歌载舞，用丰富多彩的艺术表演形式歌颂祖国，歌唱美满的幸福生活', 'jpg/2017/05/aqcZY4suQadZ7ps.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: large; background-color: rgb(245, 245, 245);\">&nbsp;</span><span style=\"word-wrap: break-word; margin: 0px auto; font-weight: 700; color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: large; background-color: rgb(245, 245, 245);\">城里网4月27日讯（图/文 韩新国）</span><span style=\"color: rgb(68, 68, 68); font-family: Tahoma, \"Microsoft Yahei\", Simsun; font-size: large; background-color: rgb(245, 245, 245);\">栾金蓝海社区乐泉艺术团今天迎来了建团后第九个生日，乐泉艺术团今天欢聚在阳光居酒店，大家载歌载舞，用丰富多彩的艺术表演形式歌颂祖国，歌唱美满的幸福生活</span></p>', '4', '2017-05-15', '2017-05-15 15:10:13', '', '', '12', '0', '12', '0', 'http://www.chengliwang.com/forum.php?mod=viewthread&tid=323034&extra=page%3D1', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('7', '纽约时尚“老妖精”空降大连 《激发你的形象力》高峰论坛举行', '月13日，《激发你的影响力》2017形象力高峰论坛在大连达沃斯会议中心成功举办，纽约时尚达人萨博瑞·所罗门、AICI CIP国际认证形象专家（国内第一人）梁艳、国际广播电台主任播音员王浩瑜三位特邀嘉宾专程赴会，并在会上做主题演讲。此外，来自台北、上海、成都、长春、南京……等地的众多国际形象顾问，以及大连时尚界名人和追求美好的众多人士齐聚大连，共赏了一场关于形象与时尚的交流盛宴。', 'jpg/2017/05/w4acsC2cfFz4pp4.jpg', '<p>月13日，《激发你的影响力》2017形象力高峰论坛在大连达沃斯会议中心成功举办，纽约时尚达人萨博瑞·所罗门、AICI CIP国际认证形象专家（国内第一人）梁艳、国际广播电台主任播音员王浩瑜三位特邀嘉宾专程赴会，并在会上做主题演讲。此外，来自台北、上海、成都、长春、南京……等地的众多国际形象顾问，以及大连时尚界名人和追求美好的众多人士齐聚大连，共赏了一场关于形象与时尚的交流盛宴。<br/><span style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; background-color: rgb(255, 255, 255);\">2008年成立至今，横跨中美两地，纽约、上海、大连， 服务客户包括中国福布斯前10精英、央视、东方卫视名主播、主持人、500强企业CEO高管等。</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><div style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"padding: 0px; margin: 0px; font-size: 16px;\"><img alt=\"\" src=\"http://www.chengliwang.com/clxw/uploads/allimg/170513/64-1F5131H232Q3.JPG\" style=\"padding: 0px; margin: 0px; border: none; width: 600px; height: 400px;\"/></span></div><p><br/></p>', '1', '2017-05-15', '2017-05-15 15:17:51', '', '小杜', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('8', '中央环保督察组进驻辽宁 大连已问责94人', '中央环保督察组进驻辽宁 大连已问责94人', 'jpg/2017/05/J3CMvlidgQ774X2.jpg', '<p><span style=\"padding: 0px; margin: 0px; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; line-height: 28px;\"><strong style=\"padding: 0px; margin: 0px;\">8批案件中问责35个案件94人&nbsp;</strong></span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"padding: 0px; margin: 0px; white-space: normal; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; font-size: 14px; line-height: 28px;\"/><span style=\"padding: 0px; margin: 0px; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; line-height: 28px;\">&nbsp;&nbsp;&nbsp;&nbsp;市纪委、市委组织部牵头的问责组全面加强中央环保督察期间环境违法案件问责工作，明确突破重点和主攻方向，打出环境违纪违法问责的“组合拳”。&nbsp;</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"padding: 0px; margin: 0px; white-space: normal; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; font-size: 14px; line-height: 28px;\"/><span style=\"padding: 0px; margin: 0px; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; line-height: 28px;\">&nbsp;&nbsp;&nbsp;&nbsp;为强化问责、精准问责，市工作领导小组问责组一是做实做细问责基础工作，印发了《关于接受和配合做好中央环保督察期间违反工作纪律实施问责的通知》，明确了督察期间的纪律要求和问责规定，并成立了15个问责组，确保督察问责工作全面覆盖；二是建立健全问责工作机制，建立“分级管理统一交办”、“集中审核上下联动”、“一案三查同步推进”、“典型通报问责公开”等工作机制，保证问责工作高质高效、全面提速；三是加大违法违纪情况问责力度，坚持“问题不查清不放过、整改不到位不放过、责任不落实不放过、群众不满意不放过”，从严、从细、从快、从实配合中央环保督察工作；四是坚持依法查办和交流沟通并举，对因失职失责而受到问责的干部，既依法处理，同时也做好思想工作，让一线工作的党员干部放下包袱，轻装上阵。&nbsp;</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"padding: 0px; margin: 0px; white-space: normal; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; font-size: 14px; line-height: 28px;\"/><span style=\"padding: 0px; margin: 0px; background-color: rgb(255, 255, 255); color: rgb(61, 61, 61); font-family: 微软雅黑; line-height: 28px;\">&nbsp;&nbsp;&nbsp;&nbsp;截至5月9日10时，本市已对转办的前8批案件中35个案件进行问责，共问责94人，其中给予党纪处分4人，组织处理3人，通报23人，约谈49人，诫勉13人，移送司法机关2人。<br style=\"padding: 0px; margin: 0px;\"/><br style=\"padding: 0px; margin: 0px;\"/><strong style=\"padding: 0px; margin: 0px;\">大力宣传用信息公开取信于民&nbsp;</strong></span></p>', '1', '2017-05-15', '2017-05-15 15:19:45', '', '', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('9', '亚马逊一日游', '亚马逊一日游', 'jpg/2017/05/Lhri400HEPjH0dL.jpg', '<p>亚马逊一日游</p>', '6', '2017-05-15', '2017-05-15 15:21:12', '', '百度', '0', '0', '0', '0', 'http://www.chengliwang.com/clxw/a/tengfeiaixin/2017/0510/2207.html', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('10', '马雅山冬季游', '', 'jpg/2017/05/W5m75GTtm4GG4ll.jpg', '<p>马雅山冬季游</p>', '6', '2017-05-15', '2017-05-15 15:22:16', '', '小柳', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('11', '中山公园街道落实中元节文明祭祀工作', '中元节祭祀是中华民族的传统习俗，在这个充满对故人哀思日子里，大家通过各类形式缅怀故人。中山公园街道召开专门', 'jpg/2017/05/k05P2qnz4wF4qey.jpg', '<ul style=\"margin-right: auto; margin-left: auto; font-family: Simsun; font-size: medium; white-space: normal; background-color: rgb(253, 252, 245);\"><li style=\"margin: 0px auto; list-style: none;\"><h4 style=\"margin: 0px auto;\"><a href=\"http://www.chengliwang.com/forum.php?mod=viewthread&tid=315054&extra=page%3D1\" target=\"_blank\" style=\"margin: 0px auto; color: rgb(51, 51, 51); text-decoration: none;\">中山公园街道落实中元节文明祭祀工作</a></h4></li><li style=\"margin: 0px auto; list-style: none;\"><p><span style=\"margin: 0px auto; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;中元节祭祀是中华民族的传统习俗，在这个充满对故人哀思日子里，大家通过各类形式缅怀故人。中山公园街道召开专门</span><a href=\"http://www.chengliwang.com/forum.php?mod=viewthread&tid=315054&extra=page%3D1\" target=\"_blank\" class=\"ck\" style=\"margin: 0px auto; color: rgb(255, 48, 0); text-decoration: none; font-size: 13px;\">[查看原文]</a></p></li></ul><p><br/></p>', '5', '2017-05-15', '2017-05-15 15:24:42', '', '小康', '0', '0', '0', '0', 'http://www.chengliwang.com/ztweb/community.php?mb_id=1188', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('12', '中山公园街道居家养老服务中心示范店开', '中山公园街道居家养老服务中心示范店开', 'jpg/2017/05/R4hR44v44RV9H4j.jpg', '<p>中山公园街道居家养老服务中心示范店开</p>', '5', '2017-05-15', '2017-05-15 15:26:22', '', '杏东', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('13', '社区十五年给你美好时光', '社区十五年给你美好时光', 'jpg/2017/05/Lhri400HEPjH0dL.jpg', '<p>社区十五年给你美好时光</p>', '5', '2017-05-15', '2017-05-15 15:27:14', '', '小布', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('14', '2017最大连活动开始', '2017最大连活动开始2017最大连活动开始2017最大连活动开始', 'jpg/2017/05/vHOx9YxopiP2f3H.jpg', '<p>2017最大连活动开始</p>', '4', '2017-05-15', '2017-05-15 15:30:01', '', '阿里', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('15', '社区居家养老服务中心建在南山', '社区居家养老服务中心建在南山', 'jpg/2017/05/k05P2qnz4wF4qey.jpg', '<p>社区居家养老服务中心建在南山</p>', '4', '2017-05-15', '2017-05-15 15:31:16', '', 'baili', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('16', '中山公园街道居家养老服务中心示范店开', '中山公园街道居家养老服务中心示范店开', 'jpg/2017/05/RvHvp97hh3c09eZ.jpg', '<p>中山公园街道居家养老服务中心示范店开</p>', '4', '2017-05-15', '2017-05-15 15:31:46', '', '', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');
INSERT INTO `baijiacms_eshop_article` VALUES ('17', '凤凰网活动招募', '', 'jpg/2017/05/K3l2LZ2Sr1hGiOl.jpg', '<p>凤凰网活动招募</p>', '4', '2017-05-15', '2017-05-15 15:32:40', '', 'xiaoli', '0', '0', '0', '0', '', '0', '0', '0', '0.00', '0', '0', '0', '', '0', '0', '', '', '', '', '1', '', '1', '0', '0.00', '0', '0.00', '0', '0.00', '0', '0.00', '0', '', '0', '0', '0', '', '0', '0');

-- ----------------------------
-- Table structure for `baijiacms_eshop_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_article_category`;
CREATE TABLE `baijiacms_eshop_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_article_category
-- ----------------------------
INSERT INTO `baijiacms_eshop_article_category` VALUES ('1', '城里新闻', '1', '1', '1');
INSERT INTO `baijiacms_eshop_article_category` VALUES ('2', '专题活动', '1', '2', '1');
INSERT INTO `baijiacms_eshop_article_category` VALUES ('3', '首页轮播', '1', '3', '1');
INSERT INTO `baijiacms_eshop_article_category` VALUES ('4', '活动报名', '1', '4', '1');
INSERT INTO `baijiacms_eshop_article_category` VALUES ('5', '社区生活', '1', '5', '1');
INSERT INTO `baijiacms_eshop_article_category` VALUES ('6', '主题旅游', '1', '6', '1');

-- ----------------------------
-- Table structure for `baijiacms_eshop_category`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_category`;
CREATE TABLE `baijiacms_eshop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '分类图片',
  `parentid` int(11) DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '是否开启',
  `ishome` tinyint(3) DEFAULT '0',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_ishome` (`ishome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_category
-- ----------------------------
INSERT INTO `baijiacms_eshop_category` VALUES ('1', '1', '城里网商品', '', '0', '0', '美食美天', '0', '1', '0', '', '', '1');
INSERT INTO `baijiacms_eshop_category` VALUES ('2', '1', '美食美天', '', '1', '0', '', '0', '1', '0', '', '', '2');

-- ----------------------------
-- Table structure for `baijiacms_eshop_commission_apply`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_commission_apply`;
CREATE TABLE `baijiacms_eshop_commission_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyno` varchar(255) DEFAULT '',
  `mid` int(11) DEFAULT '0' COMMENT '会员ID',
  `type` tinyint(3) DEFAULT '0' COMMENT '0 余额 1 微信',
  `orderids` text,
  `commission` decimal(10,2) DEFAULT '0.00',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `content` text,
  `status` tinyint(3) DEFAULT '0' COMMENT '-1 无效 0 未知 1 正在申请 2 审核通过 3 已经打款',
  `applytime` int(11) DEFAULT '0',
  `checktime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `invalidtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_checktime` (`checktime`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_applytime` (`applytime`),
  KEY `idx_status` (`status`),
  KEY `idx_invalidtime` (`invalidtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_commission_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_commission_clickcount`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_commission_clickcount`;
CREATE TABLE `baijiacms_eshop_commission_clickcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `clicktime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_from_openid` (`from_openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_commission_clickcount
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_commission_level`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_commission_level`;
CREATE TABLE `baijiacms_eshop_commission_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `commission1` decimal(10,2) DEFAULT '0.00',
  `commission2` decimal(10,2) DEFAULT '0.00',
  `commission3` decimal(10,2) DEFAULT '0.00',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(11) DEFAULT '0',
  `ordercount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_commission_level
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_commission_log`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_commission_log`;
CREATE TABLE `baijiacms_eshop_commission_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `commission` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_applyid` (`applyid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_commission_log
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_commission_shop`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_commission_shop`;
CREATE TABLE `baijiacms_eshop_commission_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT '',
  `selectgoods` tinyint(3) DEFAULT '0',
  `selectcategory` tinyint(3) DEFAULT '0',
  `goodsids` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_commission_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_coupon`;
CREATE TABLE `baijiacms_eshop_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `couponname` varchar(255) DEFAULT '',
  `gettype` tinyint(3) DEFAULT '0',
  `getmax` int(11) DEFAULT '0',
  `usetype` tinyint(3) DEFAULT '0' COMMENT '消费方式 0 付款使用 1 下单使用',
  `returntype` tinyint(3) DEFAULT '0' COMMENT '退回方式 0 不可退回 1 取消订单(未付款) 2.退款可以退回',
  `bgcolor` varchar(255) DEFAULT '',
  `enough` decimal(10,2) DEFAULT '0.00',
  `timelimit` tinyint(3) DEFAULT '0' COMMENT '0 领取后几天有效 1 时间范围',
  `coupontype` tinyint(3) DEFAULT '0' COMMENT '0 优惠券 1 充值券',
  `timedays` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00' COMMENT '折扣',
  `deduct` decimal(10,2) DEFAULT '0.00' COMMENT '抵扣',
  `backtype` tinyint(3) DEFAULT '0',
  `backmoney` varchar(50) DEFAULT '' COMMENT '返现',
  `backcredit` varchar(50) DEFAULT '' COMMENT '返积分',
  `backredpack` varchar(50) DEFAULT '',
  `backwhen` tinyint(3) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `desc` text,
  `createtime` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0' COMMENT '数量 -1 不限制',
  `status` tinyint(3) DEFAULT '0' COMMENT '可用',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '购买价格',
  `respdesc` text COMMENT '推送描述',
  `respthumb` varchar(255) DEFAULT '' COMMENT '推送图片',
  `resptitle` varchar(255) DEFAULT '' COMMENT '推送标题',
  `respurl` varchar(255) DEFAULT '',
  `credit` int(11) DEFAULT '0',
  `usecredit2` tinyint(3) DEFAULT '0',
  `remark` varchar(1000) DEFAULT '',
  `descnoset` tinyint(3) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_coupontype` (`coupontype`),
  KEY `idx_timestart` (`timestart`),
  KEY `idx_timeend` (`timeend`),
  KEY `idx_timelimit` (`timelimit`),
  KEY `idx_status` (`status`),
  KEY `idx_givetype` (`backtype`),
  KEY `idx_catid` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_coupon_category`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_coupon_category`;
CREATE TABLE `baijiacms_eshop_coupon_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_coupon_category
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_coupon_data`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_coupon_data`;
CREATE TABLE `baijiacms_eshop_coupon_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `gettype` tinyint(3) DEFAULT '0' COMMENT '获取方式 0 发放 1 领取 2 积分商城',
  `used` int(11) DEFAULT '0',
  `usetime` int(11) DEFAULT '0',
  `gettime` int(11) DEFAULT '0' COMMENT '获取时间',
  `senduid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `back` tinyint(3) DEFAULT '0',
  `backtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_gettype` (`gettype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_coupon_data
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_coupon_log`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_coupon_log`;
CREATE TABLE `baijiacms_eshop_coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `logno` varchar(255) DEFAULT '',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `paystatus` tinyint(3) DEFAULT '0',
  `creditstatus` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `paytype` tinyint(3) DEFAULT '0',
  `getfrom` tinyint(3) DEFAULT '0' COMMENT '0 发放 1 中心 2 积分兑换',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_status` (`status`),
  KEY `idx_paystatus` (`paystatus`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_getfrom` (`getfrom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_coupon_log
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_designer`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_designer`;
CREATE TABLE `baijiacms_eshop_designer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '公众号',
  `pagename` varchar(255) NOT NULL DEFAULT '' COMMENT '页面名称',
  `pagetype` tinyint(3) NOT NULL DEFAULT '0' COMMENT '页面类型',
  `pageinfo` text NOT NULL,
  `createtime` varchar(255) NOT NULL DEFAULT '' COMMENT '页面创建时间',
  `keyword` varchar(255) DEFAULT '',
  `savetime` varchar(255) NOT NULL DEFAULT '' COMMENT '页面最后保存时间',
  `setdefault` tinyint(3) NOT NULL DEFAULT '0' COMMENT '默认页面',
  `datas` text NOT NULL COMMENT '数据',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pagetype` (`pagetype`),
  FULLTEXT KEY `idx_keyword` (`keyword`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_eshop_designer
-- ----------------------------
INSERT INTO `baijiacms_eshop_designer` VALUES ('1', '1', 'demo', '1', 'a:9:{s:4:\"type\";s:1:\"2\";s:5:\"title\";s:12:\"商城首页\";s:4:\"name\";s:4:\"demo\";s:4:\"desc\";s:0:\"\";s:4:\"icon\";s:0:\"\";s:7:\"keyword\";s:0:\"\";s:10:\"background\";s:7:\"#fafafa\";s:7:\"diymenu\";s:1:\"0\";s:8:\"pagetype\";s:1:\"1\";}', '2017-05-14 16:55:02', '', '2017-05-14 16:55:02', '1', '{\"page\":{\"type\":\"2\",\"title\":\"\\u5546\\u57ce\\u9996\\u9875\",\"name\":\"demo\",\"desc\":\"\",\"icon\":\"\",\"keyword\":\"\",\"background\":\"#fafafa\",\"diymenu\":\"0\",\"pagetype\":\"1\"},\"items\":{\"M1494751940461\":{\"style\":{\"dotstyle\":\"rectangle\",\"dotalign\":\"left\",\"background\":\"#ffffff\",\"leftright\":\"5\",\"bottom\":\"5\",\"opacity\":\"0.8\"},\"data\":{\"C1494751940461\":{\"imgurl\":\"http:\\/\\/admin.dev\\/assets\\/eshop\\/static\\/images\\/default\\/banner-1.jpg\",\"linkurl\":\"\"},\"C1494751940462\":{\"imgurl\":\"http:\\/\\/admin.dev\\/assets\\/eshop\\/static\\/images\\/default\\/banner-2.jpg\",\"linkurl\":\"\"}},\"id\":\"banner\"},\"M1494752010298\":{\"params\":{\"placeholder\":\"\\u8bf7\\u8f93\\u5165\\u5173\\u952e\\u5b57\\u8fdb\\u884c\\u641c\\u7d22\"},\"style\":{\"inputbackground\":\"#ffffff\",\"background\":\"#f1f1f2\",\"iconcolor\":\"#b4b4b4\",\"color\":\"#999999\",\"paddingtop\":\"10\",\"paddingleft\":\"10\",\"textalign\":\"left\",\"searchstyle\":\"\"},\"id\":\"search\"}}}');

-- ----------------------------
-- Table structure for `baijiacms_eshop_designer_menu`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_designer_menu`;
CREATE TABLE `baijiacms_eshop_designer_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `menuname` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `menus` text,
  `params` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_designer_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_dispatch`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_dispatch`;
CREATE TABLE `baijiacms_eshop_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `dispatchname` varchar(50) DEFAULT '',
  `dispatchtype` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `firstprice` decimal(10,2) DEFAULT '0.00',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` varchar(250) DEFAULT '',
  `areas` text,
  `carriers` text,
  `enabled` int(11) DEFAULT '0',
  `calculatetype` tinyint(1) DEFAULT '0',
  `firstnum` int(11) DEFAULT '0',
  `secondnum` int(11) DEFAULT '0',
  `firstnumprice` decimal(10,2) DEFAULT '0.00',
  `secondnumprice` decimal(10,2) DEFAULT '0.00',
  `isdefault` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_goods`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_goods`;
CREATE TABLE `baijiacms_eshop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `pcate` int(11) DEFAULT '0',
  `ccate` int(11) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1' COMMENT '1为实体，2为虚拟',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `unit` varchar(5) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `content` text,
  `goodssn` varchar(50) DEFAULT '',
  `productsn` varchar(50) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `originalprice` decimal(10,2) DEFAULT '0.00' COMMENT '原价',
  `total` int(10) DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0' COMMENT '0 拍下减库存 1 付款减库存 2 永久不减',
  `sales` int(11) DEFAULT '0',
  `salesreal` int(11) DEFAULT '0',
  `spec` varchar(5000) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `credit` varchar(255) DEFAULT NULL,
  `maxbuy` int(11) DEFAULT '0',
  `usermaxbuy` int(11) DEFAULT '0',
  `hasoption` int(11) DEFAULT '0',
  `dispatch` int(11) DEFAULT '0',
  `thumb_url` text,
  `isindex` tinyint(1) DEFAULT NULL,
  `isnew` tinyint(1) DEFAULT '0',
  `ishot` tinyint(1) DEFAULT '0',
  `isdiscount` tinyint(1) DEFAULT '0',
  `isrecommand` tinyint(1) DEFAULT '0',
  `issendfree` tinyint(1) DEFAULT '0',
  `istime` tinyint(1) DEFAULT '0',
  `iscomment` tinyint(1) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `hascommission` tinyint(3) DEFAULT '0',
  `commission1_rate` decimal(10,2) DEFAULT '0.00',
  `commission1_pay` decimal(10,2) DEFAULT '0.00',
  `commission2_rate` decimal(10,2) DEFAULT '0.00',
  `commission2_pay` decimal(10,2) DEFAULT '0.00',
  `commission3_rate` decimal(10,2) DEFAULT '0.00',
  `commission3_pay` decimal(10,2) DEFAULT '0.00',
  `score` decimal(10,2) DEFAULT '0.00',
  `updatetime` int(11) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `cash` tinyint(3) DEFAULT '0',
  `commission_thumb` varchar(255) DEFAULT '',
  `isnodiscount` tinyint(3) DEFAULT '0',
  `showlevels` text,
  `buylevels` text,
  `showgroups` text,
  `buygroups` text,
  `isverify` tinyint(3) DEFAULT '0',
  `storeids` text,
  `noticeopenid` text,
  `tcate` int(11) DEFAULT '0',
  `noticetype` text,
  `needfollow` tinyint(3) DEFAULT '0',
  `followtip` varchar(255) DEFAULT '',
  `followurl` varchar(255) DEFAULT '',
  `deduct` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `ccates` text,
  `discounts` text,
  `nocommission` tinyint(3) DEFAULT '0',
  `hidecommission` tinyint(3) DEFAULT '0',
  `pcates` text,
  `tcates` text,
  `artid` int(11) DEFAULT '0',
  `deduct2` decimal(10,2) DEFAULT '0.00',
  `ednum` int(11) DEFAULT '0',
  `edmoney` decimal(10,2) DEFAULT '0.00',
  `edareas` text,
  `cates` text,
  `dispatchtype` tinyint(1) DEFAULT '0',
  `dispatchid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `manydeduct` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pcate` (`pcate`),
  KEY `idx_ccate` (`ccate`),
  KEY `idx_isnew` (`isnew`),
  KEY `idx_ishot` (`ishot`),
  KEY `idx_isdiscount` (`isdiscount`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_iscomment` (`iscomment`),
  KEY `idx_issendfree` (`issendfree`),
  KEY `idx_istime` (`istime`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_tcate` (`tcate`),
  FULLTEXT KEY `idx_buylevels` (`buylevels`),
  FULLTEXT KEY `idx_showgroups` (`showgroups`),
  FULLTEXT KEY `idx_buygroups` (`buygroups`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_eshop_goods
-- ----------------------------
INSERT INTO `baijiacms_eshop_goods` VALUES ('1', '1', '1', '2', '1', '1', '1', '新疆羊肉', 'jpg/2017/05/ydFZQIJKFup3Uu5.jpg', '件', '', '', '09999999', '', '0.00', '120.00', '0.00', '0.00', '20', '0', '0', '0', '', '1494770377', '120.00', '', '0', '0', '0', '0', 'a:0:{}', '1', '0', '0', '0', '0', '0', '0', '0', '1494770220', '1494770220', '1', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '2', '{\"default\":\"\"}', '0', '0', '1', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('2', '1', '1', '2', '1', '1', '2', '大连正宗羊排', 'jpg/2017/05/O0rzcLC0sEL8e07.jpg', '/包', '', '', '', '', '0.00', '356.00', '0.00', '0.00', '20', '0', '0', '0', '', '1494772594', '30.00', '', '0', '0', '0', '0', 'a:0:{}', '1', '0', '0', '0', '1', '0', '0', '0', '1494772500', '1494772500', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '0.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('3', '1', '1', '2', '1', '1', '3', '鲜香滋味，搞定萌娃', 'jpg/2017/05/RvHvp97hh3c09eZ.jpg', '件', '', '', '', '', '0.00', '45.00', '0.00', '0.00', '23', '0', '0', '0', '', '1494828554', '12.00', '', '12', '0', '0', '0', 'a:0:{}', '1', '1', '0', '0', '0', '0', '0', '0', '1494828360', '1494828360', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '0.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('4', '1', '1', '2', '1', '1', '4', '西餐盘里的香草和香料', 'jpg/2017/05/PS7eK4028Sz8vvV.jpg', '包', '', '', '00002934444', '', '0.00', '321.00', '0.00', '0.00', '45', '0', '0', '0', '', '1494828649', '13.00', '', '0', '0', '0', '0', 'a:1:{i:0;s:31:\"jpg/2017/05/m1184Dd4U1yZNN0.jpg\";}', '1', '1', '0', '0', '0', '0', '0', '0', '1494828540', '1494828540', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '2', '{\"default\":\"\"}', '0', '0', '1', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('5', '1', '1', '2', '1', '1', '5', '吃面姿势不正确引发糖尿病', 'jpg/2017/05/LCmAaT72j3nCfIA.jpg', '个', '', '', '', '', '0.00', '678.00', '0.00', '0.00', '15', '0', '12', '0', '', '1494828733', '45.00', '', '0', '0', '0', '0', 'a:0:{}', '0', '0', '0', '0', '0', '0', '0', '0', '1494828660', '1494828660', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('6', '1', '1', '2', '1', '1', '6', '如何避免菜刀切到手', 'jpg/2017/05/TEE1IhP8DWo9P05.jpg', '件', '', '', '', '', '0.00', '146.00', '0.00', '0.00', '400', '0', '0', '0', '', '1494828823', '34.00', '', '0', '0', '0', '0', 'a:3:{i:0;s:31:\"jpg/2017/05/hbt66LtIkbBlVtO.jpg\";i:1;s:31:\"jpg/2017/05/pme5CP75l2Tvbwl.jpg\";i:2;s:31:\"jpg/2017/05/PwS9xF7V7Wv2jv9.jpg\";}', '1', '1', '0', '0', '0', '0', '0', '0', '1494828720', '1494828720', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('7', '1', '1', '2', '1', '1', '7', '苏泊尔《我是大厨师》', 'jpg/2017/05/kpaq4PLPD2228z2.jpg', '件', '', '', '', '', '0.00', '690.00', '0.00', '0.00', '300', '0', '0', '0', '', '1494828923', '29.00', '', '0', '0', '0', '0', 'a:0:{}', '1', '0', '0', '0', '1', '0', '0', '0', '1494828840', '1494828840', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '2', '{\"default\":\"\"}', '0', '0', '1', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('8', '1', '1', '2', '1', '1', '7', '美食达人版块全新改版', 'jpg/2017/05/fp7CbFcfZYPZC7c.jpg', '个', '', '', '', '', '0.00', '70.00', '0.00', '0.00', '500', '0', '0', '0', '', '1494829724', '12.00', '', '0', '0', '0', '0', 'a:0:{}', '0', '0', '0', '1', '0', '0', '0', '0', '1494829620', '1496212020', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('9', '1', '1', '2', '1', '1', '9', '品鱼滋味 悟鲜之道', 'jpg/2017/05/K3l2LZ2Sr1hGiOl.jpg', '包', '', '', '', '', '0.00', '600.00', '0.00', '0.00', '300', '0', '0', '0', '', '1494829803', '340.00', '', '0', '0', '0', '0', 'a:0:{}', '1', '0', '0', '1', '0', '0', '0', '0', '1493706540', '1499927340', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');
INSERT INTO `baijiacms_eshop_goods` VALUES ('10', '1', '1', '2', '1', '1', '10', '“多喝热水“直男拯救大法', 'jpg/2017/05/Z7c5oh797CwDEj3.jpg', '件', '', '', '', '', '0.00', '59.00', '0.00', '0.00', '10', '0', '0', '0', '', '1494829890', '190.00', '', '0', '0', '0', '0', 'a:0:{}', '1', '0', '0', '1', '0', '0', '0', '0', '1494829800', '1507789800', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0', '', '0', '', '', '', '', '1', '', '', '0', '', '0', '', '', '0.00', '0', '', '{\"default\":\"\"}', '0', '0', '', '', '0', '0.00', '0', '0.00', '', null, '1', '0', '10.00', '0');

-- ----------------------------
-- Table structure for `baijiacms_eshop_goods_comment`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_goods_comment`;
CREATE TABLE `baijiacms_eshop_goods_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_goods_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_goods_option`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_goods_option`;
CREATE TABLE `baijiacms_eshop_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_goods_option
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_goods_spec`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_goods_spec`;
CREATE TABLE `baijiacms_eshop_goods_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `displaytype` tinyint(3) DEFAULT '0',
  `content` text,
  `displayorder` int(11) DEFAULT '0',
  `propId` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_goods_spec
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_goods_spec_item`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_goods_spec_item`;
CREATE TABLE `baijiacms_eshop_goods_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `valueId` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_specid` (`specid`),
  KEY `idx_show` (`show`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_goods_spec_item
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member`;
CREATE TABLE `baijiacms_eshop_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `groupid` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `agentid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `weixin` varchar(100) DEFAULT '',
  `content` text,
  `createtime` int(10) DEFAULT '0',
  `agenttime` int(10) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `isagent` tinyint(1) DEFAULT '0',
  `clickcount` int(11) DEFAULT '0',
  `agentlevel` int(11) DEFAULT '0',
  `noticeset` text,
  `nickname` varchar(255) DEFAULT '',
  `credit1` int(11) DEFAULT '0',
  `experience` int(11) DEFAULT NULL,
  `credit2` decimal(10,2) DEFAULT '0.00',
  `birthyear` varchar(255) DEFAULT '',
  `birthmonth` varchar(255) DEFAULT '',
  `birthday` varchar(255) DEFAULT '',
  `gender` tinyint(3) DEFAULT '0',
  `avatar` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `area` varchar(255) DEFAULT '',
  `childtime` int(11) DEFAULT '0',
  `inviter` int(11) DEFAULT '0',
  `agentnotupgrade` tinyint(3) DEFAULT '0',
  `agentselectgoods` tinyint(3) DEFAULT '0',
  `agentblack` tinyint(3) DEFAULT '0',
  `fixagentid` tinyint(3) DEFAULT '0',
  `commission` decimal(10,2) DEFAULT '0.00',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `isblack` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_status` (`status`),
  KEY `idx_agenttime` (`agenttime`),
  KEY `idx_isagent` (`isagent`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_address`;
CREATE TABLE `baijiacms_eshop_member_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `address` varchar(300) DEFAULT '',
  `isdefault` tinyint(1) DEFAULT '0',
  `zipcode` varchar(255) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_cart`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_cart`;
CREATE TABLE `baijiacms_eshop_member_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(100) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  `optionid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_favorite`;
CREATE TABLE `baijiacms_eshop_member_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_group`;
CREATE TABLE `baijiacms_eshop_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `groupname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_group
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_history`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_history`;
CREATE TABLE `baijiacms_eshop_member_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_history
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_level`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_level`;
CREATE TABLE `baijiacms_eshop_member_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `level` int(11) DEFAULT '0',
  `levelname` varchar(50) DEFAULT '',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(10) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_log`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_log`;
CREATE TABLE `baijiacms_eshop_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paytype` tinyint(3) DEFAULT NULL,
  `isgive` int(1) DEFAULT NULL,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT NULL COMMENT '0 充值 1 提现',
  `logno` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0' COMMENT '0 生成 1 成功 2 失败',
  `money` decimal(10,2) DEFAULT '0.00',
  `rechargetype` varchar(255) DEFAULT '' COMMENT '充值类型',
  `gives` decimal(10,2) DEFAULT NULL,
  `couponid` int(11) DEFAULT '0',
  `transid` varchar(64) DEFAULT '0' COMMENT '微信支付单号',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_type` (`type`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_log
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_member_paylog`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_member_paylog`;
CREATE TABLE `baijiacms_eshop_member_paylog` (
  `beid` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `type` varchar(30) NOT NULL COMMENT 'usegold使用金额 addgold充值金额 usecredit使用积分 addcredit充值积分',
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_fee` decimal(10,2) NOT NULL COMMENT '账户剩余积分或余额',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_member_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_notice`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_notice`;
CREATE TABLE `baijiacms_eshop_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_order`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_order`;
CREATE TABLE `baijiacms_eshop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `agentid` int(11) DEFAULT '0',
  `ordersn` varchar(20) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `discountprice` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(4) DEFAULT '0' COMMENT '-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `paytype` tinyint(3) DEFAULT '0' COMMENT '1为余额，2为在线，3为到付',
  `transid` varchar(64) DEFAULT '0' COMMENT '微信支付单号',
  `remark` varchar(1000) DEFAULT '',
  `addressid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatchid` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT NULL,
  `dispatchtype` tinyint(3) DEFAULT '0',
  `carrier` text,
  `refundid` int(11) DEFAULT '0',
  `iscomment` tinyint(3) DEFAULT '0',
  `creditadd` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `userdeleted` tinyint(3) DEFAULT '0',
  `finishtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `expresscom` varchar(30) NOT NULL DEFAULT '',
  `expresssn` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(255) DEFAULT '',
  `sendtime` int(11) DEFAULT '0',
  `fetchtime` int(11) DEFAULT '0',
  `cash` tinyint(3) DEFAULT '0',
  `canceltime` int(11) DEFAULT NULL,
  `cancelpaytime` int(11) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verified` tinyint(3) DEFAULT '0',
  `verifyopenid` varchar(255) DEFAULT '',
  `verifycode` text,
  `verifytime` int(11) DEFAULT '0',
  `verifystoreid` int(11) DEFAULT '0',
  `deductprice` decimal(10,2) DEFAULT '0.00',
  `deductcredit` int(11) DEFAULT '0',
  `deductcredit2` decimal(10,2) DEFAULT '0.00',
  `deductenough` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `virtual_info` text,
  `virtual_str` text,
  `address` text,
  `sysdeleted` tinyint(3) DEFAULT '0',
  `ordersn2` int(11) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `changedispatchprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `olddispatchprice` decimal(10,2) DEFAULT '0.00',
  `isvirtual` tinyint(3) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `couponprice` decimal(10,2) DEFAULT '0.00',
  `address_send` text,
  `storeid` int(11) DEFAULT '0',
  `printstate2` tinyint(1) DEFAULT '0',
  `printstate` tinyint(1) DEFAULT '0',
  `refundstate` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_status` (`status`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_refundid` (`refundid`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_finishtime` (`finishtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_order
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_order_comment`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_order_comment`;
CREATE TABLE `baijiacms_eshop_order_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  `content` varchar(255) DEFAULT '',
  `images` text,
  `createtime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `append_content` varchar(255) DEFAULT '',
  `append_images` text,
  `reply_content` varchar(255) DEFAULT '',
  `reply_images` text,
  `append_reply_content` varchar(255) DEFAULT '',
  `append_reply_images` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_order_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_order_goods`;
CREATE TABLE `baijiacms_eshop_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `optionname` text,
  `commission1` text COMMENT '0',
  `applytime1` int(11) DEFAULT '0',
  `checktime1` int(10) DEFAULT '0',
  `paytime1` int(11) DEFAULT '0',
  `invalidtime1` int(11) DEFAULT '0',
  `deletetime1` int(11) DEFAULT '0',
  `status1` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content1` text,
  `commission2` text,
  `applytime2` int(11) DEFAULT '0',
  `checktime2` int(10) DEFAULT '0',
  `paytime2` int(11) DEFAULT '0',
  `invalidtime2` int(11) DEFAULT '0',
  `deletetime2` int(11) DEFAULT '0',
  `status2` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content2` text,
  `commission3` text,
  `applytime3` int(11) DEFAULT '0',
  `checktime3` int(10) DEFAULT '0',
  `paytime3` int(11) DEFAULT '0',
  `invalidtime3` int(11) DEFAULT '0',
  `deletetime3` int(11) DEFAULT '0',
  `status3` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content3` text,
  `realprice` decimal(10,2) DEFAULT '0.00',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `nocommission` tinyint(3) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `commissions` text,
  `openid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_orderid` (`orderid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_applytime1` (`applytime1`),
  KEY `idx_checktime1` (`checktime1`),
  KEY `idx_status1` (`status1`),
  KEY `idx_applytime2` (`applytime2`),
  KEY `idx_checktime2` (`checktime2`),
  KEY `idx_status2` (`status2`),
  KEY `idx_applytime3` (`applytime3`),
  KEY `idx_invalidtime1` (`invalidtime1`),
  KEY `idx_checktime3` (`checktime3`),
  KEY `idx_invalidtime2` (`invalidtime2`),
  KEY `idx_invalidtime3` (`invalidtime3`),
  KEY `idx_status3` (`status3`),
  KEY `idx_paytime1` (`paytime1`),
  KEY `idx_paytime2` (`paytime2`),
  KEY `idx_paytime3` (`paytime3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_order_refund`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_order_refund`;
CREATE TABLE `baijiacms_eshop_order_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `refundno` varchar(255) DEFAULT '',
  `price` varchar(255) DEFAULT '',
  `reason` varchar(255) DEFAULT '',
  `images` text,
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0' COMMENT '0申请 1 通过 2 驳回',
  `reply` text,
  `refundtype` tinyint(3) DEFAULT '0',
  `orderprice` decimal(10,2) DEFAULT '0.00',
  `applyprice` decimal(10,2) DEFAULT '0.00',
  `imgs` text,
  `rtype` tinyint(3) DEFAULT '0',
  `refundaddress` text,
  `message` text,
  `express` varchar(100) DEFAULT '',
  `expresscom` varchar(100) DEFAULT '',
  `expresssn` varchar(100) DEFAULT '',
  `operatetime` int(11) DEFAULT '0',
  `sendtime` int(11) DEFAULT '0',
  `returntime` int(11) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `rexpress` varchar(100) DEFAULT '',
  `rexpresscom` varchar(100) DEFAULT '',
  `rexpresssn` varchar(100) DEFAULT '',
  `refundaddressid` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_order_refund
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_poster`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_poster`;
CREATE TABLE `baijiacms_eshop_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0' COMMENT '1 首页 2 小店 3 商城 4 自定义',
  `title` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `isopen` tinyint(3) DEFAULT NULL,
  `times` int(11) DEFAULT '0',
  `follows` int(11) DEFAULT '0',
  `isdefault` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `waittext` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_times` (`times`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_poster
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_poster_log`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_poster_log`;
CREATE TABLE `baijiacms_eshop_poster_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `from_openid` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_posterid` (`posterid`),
  FULLTEXT KEY `idx_from_openid` (`from_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_eshop_poster_log
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_poster_qr`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_poster_qr`;
CREATE TABLE `baijiacms_eshop_poster_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `sceneid` int(11) DEFAULT '0',
  `mediaid` varchar(255) DEFAULT '',
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `qrimg` varchar(1000) DEFAULT '',
  `scenestr` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_acid` (`acid`),
  KEY `idx_sceneid` (`sceneid`),
  KEY `idx_type` (`type`),
  FULLTEXT KEY `idx_openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_eshop_poster_qr
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_poster_scan`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_poster_scan`;
CREATE TABLE `baijiacms_eshop_poster_scan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `posterid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `scantime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_posterid` (`posterid`),
  KEY `idx_scantime` (`scantime`),
  FULLTEXT KEY `idx_openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_eshop_poster_scan
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_saler`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_saler`;
CREATE TABLE `baijiacms_eshop_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `salername` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_saler
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_store`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_store`;
CREATE TABLE `baijiacms_eshop_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storename` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_store
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_virtual_category`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_virtual_category`;
CREATE TABLE `baijiacms_eshop_virtual_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_virtual_category
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_virtual_data`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_virtual_data`;
CREATE TABLE `baijiacms_eshop_virtual_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0' COMMENT '类型id',
  `pvalue` varchar(255) DEFAULT '' COMMENT '主键键值',
  `fields` text NOT NULL COMMENT '字符集',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT '使用者openid',
  `usetime` int(11) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `orderid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_typeid` (`typeid`),
  KEY `idx_usetime` (`usetime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_virtual_data
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_eshop_virtual_type`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_eshop_virtual_type`;
CREATE TABLE `baijiacms_eshop_virtual_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `fields` text NOT NULL COMMENT '字段集',
  `usedata` int(11) NOT NULL DEFAULT '0' COMMENT '已用数据',
  `alldata` int(11) NOT NULL DEFAULT '0' COMMENT '全部数据',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cate` (`cate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_eshop_virtual_type
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_key_exchange`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_key_exchange`;
CREATE TABLE `baijiacms_key_exchange` (
  `createtime` int(10) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `beid` int(10) NOT NULL,
  `ekey` varchar(100) NOT NULL COMMENT '配置名称',
  `evalue` text NOT NULL,
  PRIMARY KEY (`beid`,`ekey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_key_exchange
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_modules`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_modules`;
CREATE TABLE `baijiacms_modules` (
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(30) NOT NULL,
  `group` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` decimal(5,2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isdisable` int(1) DEFAULT '0' COMMENT '模块是否禁用',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_modules
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_modules_menu`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_modules_menu`;
CREATE TABLE `baijiacms_modules_menu` (
  `href` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_modules_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_paylog`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_paylog`;
CREATE TABLE `baijiacms_paylog` (
  `beid` int(10) NOT NULL,
  `paytype` varchar(30) NOT NULL,
  `pdate` text NOT NULL,
  `ptype` varchar(10) NOT NULL,
  `typename` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_payment`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_payment`;
CREATE TABLE `baijiacms_payment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iscod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `beid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_rule`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rule`;
CREATE TABLE `baijiacms_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL DEFAULT '',
  `keyword` varchar(30) DEFAULT NULL,
  `module` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_rule_basic_reply`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rule_basic_reply`;
CREATE TABLE `baijiacms_rule_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_rule_basic_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_rule_entry_reply`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rule_entry_reply`;
CREATE TABLE `baijiacms_rule_entry_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL DEFAULT '',
  `do` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_rule_entry_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_rule_news_reply`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rule_news_reply`;
CREATE TABLE `baijiacms_rule_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(64) NOT NULL,
  `createtime` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_rule_news_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_sms_cache`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_sms_cache`;
CREATE TABLE `baijiacms_sms_cache` (
  `beid` int(10) NOT NULL,
  `cachetime` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `checkcount` int(3) NOT NULL,
  `smstype` varchar(50) DEFAULT NULL,
  `tell` varchar(50) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `vcode` varchar(50) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_sms_cache
-- ----------------------------

-- ----------------------------
-- Table structure for `baijiacms_system_config`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_system_config`;
CREATE TABLE `baijiacms_system_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(100) NOT NULL COMMENT '配置名称',
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_system_config
-- ----------------------------
INSERT INTO `baijiacms_system_config` VALUES ('1', 'system_website', 'users.chengliwang.com');
INSERT INTO `baijiacms_system_config` VALUES ('2', 'system_version', '20170105');
INSERT INTO `baijiacms_system_config` VALUES ('3', 'system_config_cache', 'a:21:{s:14:\"system_website\";s:9:\"admin.dev\";s:14:\"system_version\";s:8:\"20170105\";s:19:\"system_config_cache\";s:0:\"\";s:20:\"image_compress_scale\";s:1:\"0\";s:24:\"image_compress_openscale\";s:1:\"0\";s:18:\"system_isnetattach\";s:1:\"0\";s:21:\"system_base_attachurl\";s:0:\"\";s:13:\"system_ftp_ip\";s:0:\"\";s:15:\"system_ftp_port\";s:0:\"\";s:14:\"system_ftp_ssl\";s:1:\"0\";s:18:\"system_ftp_timeout\";s:1:\"0\";s:15:\"system_ftp_pasv\";s:1:\"0\";s:20:\"system_ftp_attachurl\";s:0:\"\";s:19:\"system_ftp_username\";s:0:\"\";s:17:\"system_ftp_passwd\";s:0:\"\";s:18:\"system_ftp_ftproot\";s:0:\"\";s:20:\"system_oss_attachurl\";s:0:\"\";s:20:\"system_oss_access_id\";s:0:\"\";s:21:\"system_oss_access_key\";s:0:\"\";s:17:\"system_oss_bucket\";s:0:\"\";s:19:\"system_oss_endpoint\";s:28:\"oss-cn-hangzhou.aliyuncs.com\";}');
INSERT INTO `baijiacms_system_config` VALUES ('4', 'image_compress_scale', '0');
INSERT INTO `baijiacms_system_config` VALUES ('5', 'image_compress_openscale', '0');
INSERT INTO `baijiacms_system_config` VALUES ('6', 'system_isnetattach', '0');
INSERT INTO `baijiacms_system_config` VALUES ('7', 'system_base_attachurl', '');
INSERT INTO `baijiacms_system_config` VALUES ('8', 'system_ftp_ip', '');
INSERT INTO `baijiacms_system_config` VALUES ('9', 'system_ftp_port', '');
INSERT INTO `baijiacms_system_config` VALUES ('10', 'system_ftp_ssl', '0');
INSERT INTO `baijiacms_system_config` VALUES ('11', 'system_ftp_timeout', '0');
INSERT INTO `baijiacms_system_config` VALUES ('12', 'system_ftp_pasv', '0');
INSERT INTO `baijiacms_system_config` VALUES ('13', 'system_ftp_attachurl', '');
INSERT INTO `baijiacms_system_config` VALUES ('14', 'system_ftp_username', '');
INSERT INTO `baijiacms_system_config` VALUES ('15', 'system_ftp_passwd', '');
INSERT INTO `baijiacms_system_config` VALUES ('16', 'system_ftp_ftproot', '');
INSERT INTO `baijiacms_system_config` VALUES ('17', 'system_oss_attachurl', '');
INSERT INTO `baijiacms_system_config` VALUES ('18', 'system_oss_access_id', '');
INSERT INTO `baijiacms_system_config` VALUES ('19', 'system_oss_access_key', '');
INSERT INTO `baijiacms_system_config` VALUES ('20', 'system_oss_bucket', '');
INSERT INTO `baijiacms_system_config` VALUES ('21', 'system_oss_endpoint', 'oss-cn-hangzhou.aliyuncs.com');

-- ----------------------------
-- Table structure for `baijiacms_system_store`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_system_store`;
CREATE TABLE `baijiacms_system_store` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `compid` int(11) NOT NULL,
  `saleid` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `logo` varchar(1000) DEFAULT NULL,
  `sname` varchar(100) NOT NULL,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `isclose` int(1) NOT NULL,
  `fullwebsite` varchar(200) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_system_store
-- ----------------------------
INSERT INTO `baijiacms_system_store` VALUES ('1', '0', '0', '1494750216', '0', null, '默认店铺', '0', '0', 'http://admin.dev/', 'users.chengliwang.com');

-- ----------------------------
-- Table structure for `baijiacms_user`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_user`;
CREATE TABLE `baijiacms_user` (
  `loginkey` varchar(20) NOT NULL,
  `beid` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0' COMMENT '1管理员0普用户',
  `username` varchar(50) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_user
-- ----------------------------
INSERT INTO `baijiacms_user` VALUES ('20170514232520762865', '0', '1494750215', '0192023a7bbd73250516f069df18b500', '1', 'admin', '1');

-- ----------------------------
-- Table structure for `baijiacms_weixin_fans`
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_weixin_fans`;
CREATE TABLE `baijiacms_weixin_fans` (
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `weixin_openid` varchar(50) NOT NULL DEFAULT '',
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nickname` varchar(50) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`weixin_openid`),
  KEY `uniacid` (`uniacid`),
  KEY `updatetime` (`updatetime`),
  KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_weixin_fans
-- ----------------------------
