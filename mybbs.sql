/*
Navicat MySQL Data Transfer

Source Server         : 本地服务器
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mybbs

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-28 20:29:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bbs_cate
-- ----------------------------
DROP TABLE IF EXISTS `bbs_cate`;
CREATE TABLE `bbs_cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(10) unsigned NOT NULL COMMENT '所属分区的id',
  `cname` varchar(255) NOT NULL COMMENT '板块的名称',
  `uid` int(11) NOT NULL COMMENT '版主的用户id',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cname` (`cname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_cate
-- ----------------------------
INSERT INTO `bbs_cate` VALUES ('27', '13', 'CCTV-5', '25');
INSERT INTO `bbs_cate` VALUES ('28', '8', '英雄归来', '25');
INSERT INTO `bbs_cate` VALUES ('29', '14', '三生三世', '25');
INSERT INTO `bbs_cate` VALUES ('30', '14', '香蜜沉沉烬如霜', '25');
INSERT INTO `bbs_cate` VALUES ('31', '8', '我不是药神', '25');
INSERT INTO `bbs_cate` VALUES ('32', '15', '借我', '25');
INSERT INTO `bbs_cate` VALUES ('33', '15', '无所求必满载而归', '25');

-- ----------------------------
-- Table structure for bbs_part
-- ----------------------------
DROP TABLE IF EXISTS `bbs_part`;
CREATE TABLE `bbs_part` (
  `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '分区id',
  `pname` varchar(255) NOT NULL COMMENT '分区名称',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pname` (`pname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_part
-- ----------------------------
INSERT INTO `bbs_part` VALUES ('13', '体育123');
INSERT INTO `bbs_part` VALUES ('8', '电影');
INSERT INTO `bbs_part` VALUES ('14', '电视剧');
INSERT INTO `bbs_part` VALUES ('15', '音乐');

-- ----------------------------
-- Table structure for bbs_post
-- ----------------------------
DROP TABLE IF EXISTS `bbs_post`;
CREATE TABLE `bbs_post` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `uid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `rep_cnt` int(10) unsigned NOT NULL DEFAULT '0',
  `view_cnt` int(10) unsigned NOT NULL DEFAULT '0',
  `is_jing` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_top` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` int(10) unsigned DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_post
-- ----------------------------
INSERT INTO `bbs_post` VALUES ('1', '哈哈哈', '旋涡鸣人', '33', '1', '0', '0', '0', '0', '1', '1555060388', '1555060388');
INSERT INTO `bbs_post` VALUES ('2', '1', '1', '33', '1', '0', '0', '0', '0', '1', '1555069894', '1555069894');
INSERT INTO `bbs_post` VALUES ('3', '杨幂', '好看', '33', '1', '0', '0', '0', '0', '1', '1555070913', '1555070913');
INSERT INTO `bbs_post` VALUES ('4', '', null, '33', '1', '0', '0', '0', '0', '1', '1555071514', '1555071514');
INSERT INTO `bbs_post` VALUES ('5', '徐峥', '真厉害', '33', '1', '0', '0', '0', '0', '1', '1555071536', '1555071536');
INSERT INTO `bbs_post` VALUES ('6', '邓论', '真好看', '33', '1', '0', '0', '0', '0', '1', '1555072524', '1555072524');
INSERT INTO `bbs_post` VALUES ('7', '谢春花', '好看', '33', '1', '0', '0', '0', '0', '1', '1555072605', '1555072605');
INSERT INTO `bbs_post` VALUES ('8', '', '', '33', '1', '0', '0', '0', '0', '1', '1555073037', '1555073037');
INSERT INTO `bbs_post` VALUES ('9', '', '', '33', '1', '0', '0', '0', '0', '1', '1555073109', '1555073109');
INSERT INTO `bbs_post` VALUES ('10', '', '', '35', '1', '0', '0', '0', '0', '1', '1555292181', '1555292181');
INSERT INTO `bbs_post` VALUES ('11', '', '', '35', '1', '0', '0', '0', '0', '1', '1555292719', '1555292719');
INSERT INTO `bbs_post` VALUES ('12', '111', '123456', '35', '1', '0', '0', '0', '0', '1', '1555292949', '1555292949');
INSERT INTO `bbs_post` VALUES ('13', '1', 'qqqqq', '35', '1', '0', '0', '0', '0', '1', '1555293250', '1555293250');
INSERT INTO `bbs_post` VALUES ('14', 'hahahahah', 'hahahahahahahahahha', '35', '1', '0', '0', '0', '0', '1', '1555293352', '1555293352');
INSERT INTO `bbs_post` VALUES ('15', '陈粒', '好听', '33', '1', '0', '0', '0', '0', '1', '1555297186', '1555297186');
INSERT INTO `bbs_post` VALUES ('16', '', '', '35', '1', '0', '0', '0', '0', '1', '1555298054', '1555298054');
INSERT INTO `bbs_post` VALUES ('17', '', '', '35', '1', '0', '0', '0', '0', '1', '1555298786', '1555298786');
INSERT INTO `bbs_post` VALUES ('18', '', '', '35', '1', '0', '0', '0', '0', '1', '1555298965', '1555298965');
INSERT INTO `bbs_post` VALUES ('19', 'wahahaha', '234', '35', '1', '0', '0', '0', '0', '1', '1555298975', '1555298975');
INSERT INTO `bbs_post` VALUES ('20', '123', '789456', '33', '1', '0', '0', '0', '0', '1', '1555299033', '1555299033');
INSERT INTO `bbs_post` VALUES ('21', '111', '222', '33', '1', '0', '0', '0', '0', '1', '1555308565', '1555308565');
INSERT INTO `bbs_post` VALUES ('22', '英雄', '英雄归来', '26', '1', '0', '25', '0', '0', '1', '1555374930', '1555396401');
INSERT INTO `bbs_post` VALUES ('23', 'qqqq', 'wwwwwwwwwwwwwwwww', '33', '1', '0', '0', '0', '0', '1', '1555395392', '1555395392');
INSERT INTO `bbs_post` VALUES ('24', 'zzzzzzzzzzz', 'eeeeeeeeeeeee', '33', '1', '0', '0', '0', '0', '1', '1555395405', '1555395405');
INSERT INTO `bbs_post` VALUES ('25', '恰恰恰', '123456', '33', '1', '0', '1', '0', '0', '1', '1555397036', '1555397036');
INSERT INTO `bbs_post` VALUES ('26', '8520', '0258', '33', '1', '0', '0', '0', '0', '1', '1555397067', '1555397067');
INSERT INTO `bbs_post` VALUES ('27', '', '', '33', '1', '0', '0', '0', '0', '1', '1555397090', '1555397090');
INSERT INTO `bbs_post` VALUES ('28', '1111', '2222', '33', '1', '0', '0', '0', '0', '1', '1555397250', '1555397250');
INSERT INTO `bbs_post` VALUES ('29', '第一个吧', '还好吧', '33', '1', '0', '1', '0', '0', '1', '1555397584', '1555397584');
INSERT INTO `bbs_post` VALUES ('30', '555', '666', '33', '1', '0', '0', '0', '0', '1', '1555401190', '1555401190');
INSERT INTO `bbs_post` VALUES ('31', '8888', '8888', '33', '1', '0', '2', '0', '0', '1', '1555401526', '1555401526');
INSERT INTO `bbs_post` VALUES ('32', '李卉雨', '哈哈哈哈', '33', '33', '0', '1', '0', '0', '1', '1555401855', '1555401855');
INSERT INTO `bbs_post` VALUES ('33', '吞吞吐吐拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖', '达到滴滴滴多多多多多多多多多多多多', '33', '27', '0', '2', '0', '0', '1', '1555402081', '1555402115');
INSERT INTO `bbs_post` VALUES ('34', 'hahahha', '123456', '33', '27', '0', '2', '0', '0', '1', '1555463034', '1555463074');
INSERT INTO `bbs_post` VALUES ('35', '英雄', '好的呢', '33', '28', '0', '2', '0', '0', '1', '1555463104', '1555463104');
INSERT INTO `bbs_post` VALUES ('36', '今天星期三', '真好', '26', '27', '0', '5', '0', '0', '1', '1555472637', '1555482103');
INSERT INTO `bbs_post` VALUES ('37', '归来', '哈哈哈哈', '26', '28', '0', '1', '0', '0', '1', '1555472678', '1555472678');
INSERT INTO `bbs_post` VALUES ('38', '今天是中', '恰恰恰', '37', '28', '0', '6', '0', '0', '1', '1555481983', '1555482018');
INSERT INTO `bbs_post` VALUES ('39', 'xxxxx', 'xxxxx', '29', '27', '0', '0', '0', '0', '1', '1556434572', '1556434572');

-- ----------------------------
-- Table structure for bbs_reply
-- ----------------------------
DROP TABLE IF EXISTS `bbs_reply`;
CREATE TABLE `bbs_reply` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rcontent` text,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_reply
-- ----------------------------
INSERT INTO `bbs_reply` VALUES ('17', '哈哈哈哈1123', '33', '33', '1555402115');
INSERT INTO `bbs_reply` VALUES ('18', '123456', '33', '34', '1555463074');
INSERT INTO `bbs_reply` VALUES ('19', '好复活草的不是发恶女', '37', '38', '1555482018');
INSERT INTO `bbs_reply` VALUES ('20', '哈哈哈', '37', '36', '1555482103');

-- ----------------------------
-- Table structure for bbs_user
-- ----------------------------
DROP TABLE IF EXISTS `bbs_user`;
CREATE TABLE `bbs_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uname` varchar(255) NOT NULL COMMENT '用户名称',
  `upwd` char(80) NOT NULL,
  `auth` int(10) unsigned NOT NULL DEFAULT '3' COMMENT '用户权限 1超级管理员 2管理员 3普通会员',
  `uface` varchar(255) DEFAULT NULL,
  `sex` enum('x','m','w') DEFAULT 'w',
  `tel` varchar(20) DEFAULT '' COMMENT '手机号码',
  `created_at` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_user
-- ----------------------------
INSERT INTO `bbs_user` VALUES ('25', 'q', '$2y$10$WRkYqdhySiEf3Gcr4opW9.WjUd1jC1r9nIrFGbFx8Dq6c8gDNmKzC', '0', 'Public/Uploads/20190410/5cad9d9e3b1c4.jpg', 'w', null, '1554881950');
INSERT INTO `bbs_user` VALUES ('26', '李卉雨', '$2y$10$25siEn.i3CvcbLNpDiTRhOYXg5K/5DMmSQZxmLVE54P5xIGtQMZLu', '0', 'Public/Uploads/20190417/5cb6a0e4101a9.jpg', 'm', '13504495246', '1554881959');
INSERT INTO `bbs_user` VALUES ('27', '222', '$2y$10$g2g6zEIUoe7bvDoEo/IYLeB9CcOePYiujoASK9XNrOWzZbIFRg/kK', '0', 'Public/Uploads/20190410/5cad9e81cd45f.jpg', 'w', null, '1554882177');
INSERT INTO `bbs_user` VALUES ('28', 'q', '$2y$10$zsnzFxrra7cQCYQmSClZduHKuK23cRMo70hRK7/zqr0LH5tNAbtzG', '0', 'Public/Uploads/20190410/5cad9f9953a78.jpg', 'm', null, '1554882457');
INSERT INTO `bbs_user` VALUES ('29', '1', '$2y$10$Hto9Ocsy5Bd31fkpTrbose/OT8sUiI3Ih2Jp02Qyml.D.Zo7C/nV.', '0', 'Public/Uploads/20190410/5cada22c839f1.jpg', 'w', null, '1554883116');
INSERT INTO `bbs_user` VALUES ('30', '1', '', '0', 'Public/Uploads/20190410/5cada37501e99.jpg', 'm', null, '1554883444');
INSERT INTO `bbs_user` VALUES ('31', '1', '1', '0', 'Public/Uploads/20190410/5cada96165edd.jpg', 'm', null, '1554884961');
INSERT INTO `bbs_user` VALUES ('32', 'ccc', '$2y$10$sFiQbDREM5aVA/iDosgXDuS5Dve5PMBgJUKJDZmwgUgROMnH9r1B.', '0', 'Public/Uploads/20190411/5caefa5a0145e.jpg', 'w', null, '1554971225');
INSERT INTO `bbs_user` VALUES ('33', '895', '$2y$10$5WQ3kopcnZk1dVtUqr3M.uJnhchKoiZHZWVaKb.ZS419Fu2pJUv.O', '3', 'Public/Uploads/20190417/5cb69e1cabdde.jpg', 'w', '12345678999', '1555055772');
INSERT INTO `bbs_user` VALUES ('34', '111', '$2y$10$r15dKmgT1DyBw37M9Kx3Uumo2gTOyDrytnmVkl4PBGPrMJElO9FJu', '3', null, 'w', '111', '1555055828');
INSERT INTO `bbs_user` VALUES ('35', '', '$2y$10$q9RipaCA39XJGRYKjKACROW7zjOgNTHwWgZW9241yKRKEczq5bH5m', '3', null, 'w', '', '1555291842');
INSERT INTO `bbs_user` VALUES ('37', 'qqqq', '$2y$10$qU8zj/7BxKUP/X.HUNJuYOrLKQhAetM/NHRjhGxCHHufxoQlccnvG', '3', 'Public/Uploads/20190417/5cb6c5c7f2856.jpg', 'w', '123545679964', '1555481955');
