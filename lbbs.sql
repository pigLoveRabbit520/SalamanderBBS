/*
Navicat MySQL Data Transfer

Source Server         : xampp local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lbbs

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-28 11:29:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `stb_comments`
-- ----------------------------
DROP TABLE IF EXISTS `stb_comments`;
CREATE TABLE `stb_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `replytime` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`topic_id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_favorites`
-- ----------------------------
DROP TABLE IF EXISTS `stb_favorites`;
CREATE TABLE `stb_favorites` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_favorites
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_links`
-- ----------------------------
DROP TABLE IF EXISTS `stb_links`;
CREATE TABLE `stb_links` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_links
-- ----------------------------
INSERT INTO `stb_links` VALUES ('1', 'StartBBS', 'http://www.startbbs.com', '', '0');

-- ----------------------------
-- Table structure for `stb_message`
-- ----------------------------
DROP TABLE IF EXISTS `stb_message`;
CREATE TABLE `stb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dialog_id` int(11) NOT NULL,
  `sender_uid` int(11) NOT NULL,
  `receiver_uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dialog_id` (`dialog_id`),
  KEY `sender_uid` (`sender_uid`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_message
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_message_dialog`
-- ----------------------------
DROP TABLE IF EXISTS `stb_message_dialog`;
CREATE TABLE `stb_message_dialog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_uid` int(11) NOT NULL,
  `receiver_uid` int(11) NOT NULL,
  `last_content` text NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  `sender_remove` tinyint(1) NOT NULL DEFAULT '0',
  `receiver_remove` tinyint(1) NOT NULL DEFAULT '0',
  `sender_read` tinyint(1) NOT NULL DEFAULT '1',
  `receiver_read` tinyint(1) NOT NULL DEFAULT '0',
  `messages` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`sender_uid`,`receiver_uid`),
  KEY `update_time` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_message_dialog
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_nodes`
-- ----------------------------
DROP TABLE IF EXISTS `stb_nodes`;
CREATE TABLE `stb_nodes` (
  `node_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) NOT NULL DEFAULT '0',
  `cname` varchar(30) DEFAULT NULL COMMENT '分类名称',
  `content` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `ico` varchar(128) NOT NULL DEFAULT 'uploads/ico/default.png',
  `master` varchar(100) NOT NULL,
  `permit` varchar(255) DEFAULT NULL,
  `listnum` mediumint(8) unsigned DEFAULT '0',
  `clevel` varchar(25) DEFAULT NULL,
  `cord` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`node_id`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_nodes
-- ----------------------------
INSERT INTO `stb_nodes` VALUES ('1', '0', '移动医疗', '', '移动，健康', 'uploads/ico/default.png', '', null, '9', null, null);
INSERT INTO `stb_nodes` VALUES ('2', '0', 'VR', '', '好好学习哈', 'uploads/ico/default.png', '', null, '1', null, null);

-- ----------------------------
-- Table structure for `stb_notifications`
-- ----------------------------
DROP TABLE IF EXISTS `stb_notifications`;
CREATE TABLE `stb_notifications` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL,
  `suid` int(11) DEFAULT NULL,
  `nuid` int(11) NOT NULL DEFAULT '0',
  `ntype` tinyint(1) DEFAULT NULL,
  `ntime` int(10) DEFAULT NULL,
  PRIMARY KEY (`nid`,`nuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_notifications
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_page`
-- ----------------------------
DROP TABLE IF EXISTS `stb_page`;
CREATE TABLE `stb_page` (
  `pid` tinyint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `go_url` varchar(100) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `is_hidden` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_page
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_settings`
-- ----------------------------
DROP TABLE IF EXISTS `stb_settings`;
CREATE TABLE `stb_settings` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `type` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`title`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_settings
-- ----------------------------
INSERT INTO `stb_settings` VALUES ('1', 'site_name', '孟子', '0');
INSERT INTO `stb_settings` VALUES ('2', 'welcome_tip', '欢迎访问Startbbs开源微社区', '0');
INSERT INTO `stb_settings` VALUES ('3', 'short_intro', '新一代简洁社区软件', '0');
INSERT INTO `stb_settings` VALUES ('4', 'show_captcha', 'on', '0');
INSERT INTO `stb_settings` VALUES ('5', 'site_run', '0', '0');
INSERT INTO `stb_settings` VALUES ('6', 'site_stats', '统计代码																																																																																																																																					', '0');
INSERT INTO `stb_settings` VALUES ('7', 'site_keywords', '轻量 •  易用  •  社区系统', '0');
INSERT INTO `stb_settings` VALUES ('8', 'site_description', 'Startbbs', '0');
INSERT INTO `stb_settings` VALUES ('9', 'money_title', '银币', '0');
INSERT INTO `stb_settings` VALUES ('10', 'per_page_num', '20', '0');
INSERT INTO `stb_settings` VALUES ('11', 'is_rewrite', 'off', '0');
INSERT INTO `stb_settings` VALUES ('12', 'show_editor', 'on', '0');
INSERT INTO `stb_settings` VALUES ('13', 'comment_order', 'desc', '0');

-- ----------------------------
-- Table structure for `stb_site_stats`
-- ----------------------------
DROP TABLE IF EXISTS `stb_site_stats`;
CREATE TABLE `stb_site_stats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(20) NOT NULL,
  `value` int(10) DEFAULT '0',
  `update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_site_stats
-- ----------------------------
INSERT INTO `stb_site_stats` VALUES ('1', 'last_uid', '3', null);
INSERT INTO `stb_site_stats` VALUES ('2', 'total_users', '3', null);
INSERT INTO `stb_site_stats` VALUES ('3', 'today_topics', '9', '1468888509');
INSERT INTO `stb_site_stats` VALUES ('4', 'yesterday_topics', '1', '1468888072');
INSERT INTO `stb_site_stats` VALUES ('5', 'total_topics', '10', null);
INSERT INTO `stb_site_stats` VALUES ('6', 'total_comments', '0', null);
INSERT INTO `stb_site_stats` VALUES ('7', 'total_nodes', '0', null);
INSERT INTO `stb_site_stats` VALUES ('8', 'total_tags', '0', null);

-- ----------------------------
-- Table structure for `stb_tags`
-- ----------------------------
DROP TABLE IF EXISTS `stb_tags`;
CREATE TABLE `stb_tags` (
  `tag_id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(30) NOT NULL,
  `topics` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag_title` (`tag_title`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_tags
-- ----------------------------
INSERT INTO `stb_tags` VALUES ('1', '第三方', '1');
INSERT INTO `stb_tags` VALUES ('2', '士大夫', '1');
INSERT INTO `stb_tags` VALUES ('3', '土耳其', '1');
INSERT INTO `stb_tags` VALUES ('4', '发言人', '1');
INSERT INTO `stb_tags` VALUES ('5', '国家', '1');
INSERT INTO `stb_tags` VALUES ('6', '德国', '1');
INSERT INTO `stb_tags` VALUES ('7', '法律', '1');
INSERT INTO `stb_tags` VALUES ('8', '国土资源部', '2');
INSERT INTO `stb_tags` VALUES ('9', '江苏省', '2');
INSERT INTO `stb_tags` VALUES ('10', '江西赣州', '2');
INSERT INTO `stb_tags` VALUES ('11', '徐州市', '1');
INSERT INTO `stb_tags` VALUES ('12', '不动产', '1');
INSERT INTO `stb_tags` VALUES ('13', 'library', '2');
INSERT INTO `stb_tags` VALUES ('14', '中国大陆', '1');
INSERT INTO `stb_tags` VALUES ('15', '用户', '1');
INSERT INTO `stb_tags` VALUES ('16', '知识', '1');
INSERT INTO `stb_tags` VALUES ('17', 'example', '1');
INSERT INTO `stb_tags` VALUES ('18', '排行榜', '1');
INSERT INTO `stb_tags` VALUES ('19', '精灵', '1');
INSERT INTO `stb_tags` VALUES ('20', '分辨率', '1');
INSERT INTO `stb_tags` VALUES ('21', '玩游戏', '1');
INSERT INTO `stb_tags` VALUES ('22', '索尼', '1');
INSERT INTO `stb_tags` VALUES ('23', '天天向上', '1');
INSERT INTO `stb_tags` VALUES ('24', '德云社', '1');
INSERT INTO `stb_tags` VALUES ('25', '郭德纲', '1');
INSERT INTO `stb_tags` VALUES ('26', '表达方式', '1');
INSERT INTO `stb_tags` VALUES ('27', '主持人', '1');
INSERT INTO `stb_tags` VALUES ('28', '青岛市', '1');
INSERT INTO `stb_tags` VALUES ('29', '山东省', '1');
INSERT INTO `stb_tags` VALUES ('30', '中国代表团', '1');
INSERT INTO `stb_tags` VALUES ('31', '里约热内卢', '1');
INSERT INTO `stb_tags` VALUES ('32', '北京奥运会', '1');
INSERT INTO `stb_tags` VALUES ('33', '奥林匹克', '1');
INSERT INTO `stb_tags` VALUES ('34', '奥运会冠军', '1');

-- ----------------------------
-- Table structure for `stb_tags_relation`
-- ----------------------------
DROP TABLE IF EXISTS `stb_tags_relation`;
CREATE TABLE `stb_tags_relation` (
  `tag_id` int(10) NOT NULL DEFAULT '0',
  `topic_id` int(10) DEFAULT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `fid` (`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_tags_relation
-- ----------------------------
INSERT INTO `stb_tags_relation` VALUES ('1', '1');
INSERT INTO `stb_tags_relation` VALUES ('2', '1');
INSERT INTO `stb_tags_relation` VALUES ('3', '2');
INSERT INTO `stb_tags_relation` VALUES ('4', '2');
INSERT INTO `stb_tags_relation` VALUES ('5', '2');
INSERT INTO `stb_tags_relation` VALUES ('6', '2');
INSERT INTO `stb_tags_relation` VALUES ('7', '2');
INSERT INTO `stb_tags_relation` VALUES ('8', '3');
INSERT INTO `stb_tags_relation` VALUES ('9', '3');
INSERT INTO `stb_tags_relation` VALUES ('10', '3');
INSERT INTO `stb_tags_relation` VALUES ('11', '3');
INSERT INTO `stb_tags_relation` VALUES ('12', '3');
INSERT INTO `stb_tags_relation` VALUES ('13', '4');
INSERT INTO `stb_tags_relation` VALUES ('14', '5');
INSERT INTO `stb_tags_relation` VALUES ('15', '5');
INSERT INTO `stb_tags_relation` VALUES ('16', '5');
INSERT INTO `stb_tags_relation` VALUES ('13', '6');
INSERT INTO `stb_tags_relation` VALUES ('17', '6');
INSERT INTO `stb_tags_relation` VALUES ('18', '6');
INSERT INTO `stb_tags_relation` VALUES ('19', '6');
INSERT INTO `stb_tags_relation` VALUES ('20', '7');
INSERT INTO `stb_tags_relation` VALUES ('21', '7');
INSERT INTO `stb_tags_relation` VALUES ('22', '7');
INSERT INTO `stb_tags_relation` VALUES ('23', '8');
INSERT INTO `stb_tags_relation` VALUES ('24', '8');
INSERT INTO `stb_tags_relation` VALUES ('25', '8');
INSERT INTO `stb_tags_relation` VALUES ('26', '8');
INSERT INTO `stb_tags_relation` VALUES ('27', '8');
INSERT INTO `stb_tags_relation` VALUES ('8', '9');
INSERT INTO `stb_tags_relation` VALUES ('9', '9');
INSERT INTO `stb_tags_relation` VALUES ('10', '9');
INSERT INTO `stb_tags_relation` VALUES ('28', '9');
INSERT INTO `stb_tags_relation` VALUES ('29', '9');
INSERT INTO `stb_tags_relation` VALUES ('30', '10');
INSERT INTO `stb_tags_relation` VALUES ('31', '10');
INSERT INTO `stb_tags_relation` VALUES ('32', '10');
INSERT INTO `stb_tags_relation` VALUES ('33', '10');
INSERT INTO `stb_tags_relation` VALUES ('34', '10');

-- ----------------------------
-- Table structure for `stb_topics`
-- ----------------------------
DROP TABLE IF EXISTS `stb_topics`;
CREATE TABLE `stb_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` smallint(5) NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `ruid` mediumint(8) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `content` text,
  `addtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `lastreply` int(10) DEFAULT NULL,
  `views` int(10) DEFAULT '0',
  `comments` smallint(8) DEFAULT '0',
  `favorites` int(10) unsigned DEFAULT '0',
  `closecomment` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) NOT NULL DEFAULT '0',
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `ord` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`,`node_id`,`uid`),
  KEY `updatetime` (`updatetime`),
  KEY `ord` (`ord`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_topics
-- ----------------------------
INSERT INTO `stb_topics` VALUES ('1', '1', '1', null, '孟航的演说', '第三方,士大夫', '吃的第三方士大夫是', '1468845396', '1468845396', '1468845396', '8', '0', '0', null, '0', '0', '1468845396');
INSERT INTO `stb_topics` VALUES ('2', '1', '1', null, '孟子', '土耳其,发言人,国家,德国,法律', '莫盖里尼在7月18日的发言中指出：“没有实行死刑的国家才能成为欧盟成员，这是我们的法律规定的。”同时，德国政府发言人斯特芬·塞伯特表示，如果土耳其将实行死刑，那么它加入欧盟的问题将自动关闭。', '1468888072', '1468888072', '1468888072', '1', '0', '0', null, '0', '0', '1468888072');
INSERT INTO `stb_topics` VALUES ('3', '1', '1', null, '全国30个省份发不动产权证书', '国土资源部,江苏省,江西赣州,徐州市,不动产', '2015年3月1日，《不动产登记暂行条例》正式实施。国土资源部部长姜大明当天上午在江苏省徐州市为申请领证的市民颁发了全国第一本不动产权证书。与此同时，江西赣州、四川泸州等地也颁发了省内首本不动产权证书。这标志着不动产统一登记制度的落地，预示着我国土地和房屋由不同部门登记发证的时代即将终结。', '1468888108', '1468888108', '1468888108', '1', '0', '0', null, '0', '0', '1468888108');
INSERT INTO `stb_topics` VALUES ('4', '1', '1', null, 'CodeIgniter 3.0 新手折腾笔记（五）', 'library', '$this-&gt;load-&gt;library(\'pagination\');<br />\r\n$config[\'base_url\'] = \'http://example.com/index.php/test/page/\';<br />\r\n$config[\'total_rows\'] = 200;<br />\r\n$config[\'per_page\'] = 20;<br />\r\n$this-&gt;pagination-&gt;initialize($config);//序列化<br />\r\necho $this-&gt;pagination-&gt;create_links();//生成分页导航', '1468888161', '1468888161', '1468888161', '1', '0', '0', null, '0', '0', '1468888161');
INSERT INTO `stb_topics` VALUES ('5', '1', '1', null, '你想要给每一个链接添加 CSS 类', '中国大陆,用户,知识', '除特别说明外，用户内容均采用 知识共享署名-相同方式共享 3.0 中国大陆许可协议 进行许可<br />\r\n本站由 又拍云 提供 CDN 存储服务', '1468888188', '1468888207', '1468888188', '3', '0', '0', null, '0', '0', '1468888188');
INSERT INTO `stb_topics` VALUES ('6', '2', '1', null, 'Pokemon go精灵稀有程度排行榜 哪些精灵最稀有', 'library,example,排行榜,精灵', '2015年7月21日 - $this-&gt;load-&gt;library(\'pagination\'); $config[\'base_url\'] = \'http://example...爱生活,爱coding 个人coding历程,开始于今天 em0t 作者 关注专栏 系...', '1468888265', '1468888265', '1468888265', '1', '0', '0', null, '0', '0', '1468888265');
INSERT INTO `stb_topics` VALUES ('7', '1', '1', null, '用干货塞满四公主吧！PS4上必玩游戏神作TOP14', '分辨率,玩游戏,索尼', '如今“PS4.5”的消息也算传的沸沸扬扬了，且不说索尼的这种做法对玩家们有多大冲击，单就游戏层面来讲，谣言中的PS4.5对会VR全面支持，另外还将支持4K的分辨率，将拥有更强的机能，这无疑是一件好事！<br />\r\n<br />\r\n　　那么，在PS4.5降临之前，你是否已经体验过PS4上面所有的大作了呢？或者如果你有意入手神机的话，不妨来看看猫车给大家推荐的PS4必玩游戏TOP14吧！', '1468888297', '1468888297', '1468888297', '2', '0', '0', null, '0', '0', '1468888297');
INSERT INTO `stb_topics` VALUES ('8', '1', '1', null, '欧弟', '天天向上,德云社,郭德纲,表达方式,主持人', '主持人欧弟离开《天天向上》后竟要转行做相声演员了，还是德云社的班主郭德纲亲自保驾护航的那种！据说，郭德纲的小儿子和欧弟的女儿早已订下亲事。郭老板啊，“两年红过岳云鹏”的保证真的不是对亲家的私心吗？<br />\r\n　　在上周六播出的《花样男团》中，在被问到“为什么不跟郭老板学两段相声”时，徒弟欧弟感慨：“相声太难了！”郭德纲解释起相声这个行业：“在中国啊，专业从事相声行业的艺人，从艺三十年以上的的，100人里面有70个得劝退。都干了三十年了你还得劝他‘你别干这个你干不了’，对外行，难了，最难的就是——相声无章可循。”说罢，还向徒弟传授起自己从艺多年的经验之谈：“嘴笨没事儿，不会唱没事儿，不会方言没事儿，这些都不耽误成为艺术家，如果没有脑子，不行。其实说相声拼的是智力，因为他对幽默的理解和表达方式与众不同，只有这个人一生出来就是说相声材料才行，只是说着‘我努力’、‘我早上起来跑步’、‘我找名师教我’......一点用也没有。”', '1468888431', '1468888431', '1468888431', '1', '0', '0', null, '0', '0', '1468888431');
INSERT INTO `stb_topics` VALUES ('9', '1', '1', null, '尼玛', '国土资源部,江苏省,江西赣州,青岛市,山东省', '2015年3月1日，《不动产登记暂行条例》正式实施。国土资源部部长姜大明当天上午在江苏省徐州市为申请领证的市民颁发了全国第一本不动产权证书。与此同时，江西赣州、四川泸州等地也颁发了省内首本不动产权证书。这标志着不动产统一登记制度的落地，预示着我国土地和房屋由不同部门登记发证的时代即将终结。<br />\r\n2015年3月2日，重庆市、山东省、广西自治区第一本不动产权证书分别在长寿湖镇、青岛市和南宁市发放。', '1468888453', '1468888453', '1468888453', '1', '0', '0', null, '0', '0', '1468888453');
INSERT INTO `stb_topics` VALUES ('10', '1', '1', null, '我416名健儿征战里约奥运', '中国代表团,里约热内卢,北京奥运会,奥林匹克,奥运会冠军', '记者 王笑笑昨天下午，参加里约热内卢奥运会的中国体育代表团在人民大会堂成立。本届中国体育代表团总人数为711人，其中运动员416人，为我国境外参赛代表团规模最大的一届，仅次于北京奥运会的参赛规模。本届奥运会共设28个大项、306个小项，中国代表团将参加除橄榄球和手球外的其余26个大项，共210个小项的比赛。里约奥运会将于当地时间8月5日至8月21日举行。境外参赛规模创新高35名奥运会冠军领衔里约奥运会是我国自1984年以来第九次参加夏季奥林匹克奥运会。在本次的416名运动员中，有来自12个项目的35名奥运会冠军。其中，杜丽、朱启南、吴敏霞3名老将早在2004年便已登上奥运巅峰，何雯娜、龙清泉等北京奥运会冠军期待卷土重来，孙杨、张继科、李晓霞等则将首次打响卫冕战。值得一提的是，吴敏霞若在本届比赛中再夺一金，将以5枚金牌追平邹凯的奥运金牌数，并列成为中国奥运史上金牌数“第一人”。游泳名将孙杨若能在报名参加的3个项目中全部夺金，也可能创造历史。和杜丽、朱启南、吴敏霞一样，陈颖、林丹、易建联等也将第四次踏上奥运征程，他们都是代表团参加', '1468888509', '1468888509', '1468888509', '2', '0', '0', null, '0', '0', '1468888509');

-- ----------------------------
-- Table structure for `stb_users`
-- ----------------------------
DROP TABLE IF EXISTS `stb_users`;
CREATE TABLE `stb_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `salt` char(6) DEFAULT NULL COMMENT '混淆码',
  `openid` char(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'uploads/avatar/default/',
  `homepage` varchar(50) DEFAULT NULL,
  `money` int(11) DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '100',
  `signature` text,
  `topics` int(11) DEFAULT '0',
  `replies` int(11) DEFAULT '0',
  `notices` smallint(5) DEFAULT '0',
  `follows` int(11) NOT NULL DEFAULT '0',
  `favorites` int(11) DEFAULT '0',
  `messages_unread` int(11) DEFAULT '0',
  `reg_time` int(10) DEFAULT NULL,
  `lastlogin` int(10) DEFAULT NULL,
  `lastpost` int(10) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `gid` tinyint(3) NOT NULL DEFAULT '3',
  `ip` char(15) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `introduction` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_users
-- ----------------------------
INSERT INTO `stb_users` VALUES ('1', 'admin', 'eec84e95de84693427e871af23b8c0c6', 'a00dfc', null, 'startbbs@126.com', '/uploads/avatar/default/', null, '0', '126', null, '10', '0', '0', '0', '0', '0', '1467634842', '1468821505', '1468888509', null, '1', '60.183.117.108', null, null, '1');
INSERT INTO `stb_users` VALUES ('2', 'fg', '5860f5db49a71803b7e1133f3c63ab6f', '7078d0', null, '1906747819@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469188551', '1470291114', null, null, '3', '183.144.166.81', null, null, '1');
INSERT INTO `stb_users` VALUES ('3', 'hdfsdkjf', '31fbfc649be3e863166387f5be640cf7', '2d6aa9', null, '1906747818@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469188962', null, null, null, '3', '183.144.166.81', null, null, '1');
INSERT INTO `stb_users` VALUES ('5', '孟子', 'a27a6ac43a360a205e8c118eb14d1894', 'QjbKu5', null, '83893@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469255146', null, null, null, '3', '60.183.143.115', null, null, '1');
INSERT INTO `stb_users` VALUES ('6', 'dfd', '02ebe942929da166866e0ce42ed42ecb', 'ngntsi', null, 'dsfd@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469257576', null, null, null, '3', '60.183.143.115', null, null, '1');
INSERT INTO `stb_users` VALUES ('7', '恢复可广泛', '05b58fd6e77526b93d0e5700310cf398', 'yxevzb', null, 'sfdf@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469258633', null, null, null, '3', '60.183.143.115', null, null, '1');
INSERT INTO `stb_users` VALUES ('8', 'fdsfhdf', '7a873f579834903271f05182d0bf5f7c', 'dcnuoa', null, 'fdfd@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469258677', null, null, null, '3', '60.183.143.115', null, null, '1');
INSERT INTO `stb_users` VALUES ('9', 'game4让', '9643eeff6a18531489535f77c688c024', 'wxnpnn', null, '839@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469279676', null, null, null, '3', '60.183.143.115', null, null, '1');
INSERT INTO `stb_users` VALUES ('10', '孟号号', '42fd87c8a4edfd0cd0921613d07c4209', '547pc0', null, '84894@164.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469323560', null, null, null, '3', '60.183.133.210', null, null, '1');
INSERT INTO `stb_users` VALUES ('11', '火蜥蜴', '8e10eeb0f83b4a322075c979f6a04499', 'vozpww', null, '7494@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469323616', null, null, null, '3', '60.183.133.210', null, null, '1');
INSERT INTO `stb_users` VALUES ('12', '飞龙', '6ad41fb86916c01322abb0ae5ec446d4', 'ip6djs', null, 'fertre@qq.com', '/uploads/avatar/default/', null, '0', '300', null, '0', '0', '0', '0', '0', '0', '1469345778', null, null, null, '3', '60.183.131.224', null, null, '1');

-- ----------------------------
-- Table structure for `stb_user_follow`
-- ----------------------------
DROP TABLE IF EXISTS `stb_user_follow`;
CREATE TABLE `stb_user_follow` (
  `follow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `follow_uid` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`,`uid`,`follow_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_user_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `stb_user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `stb_user_groups`;
CREATE TABLE `stb_user_groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group_type` tinyint(3) NOT NULL DEFAULT '0',
  `group_name` varchar(50) DEFAULT NULL,
  `usernum` int(11) DEFAULT '0',
  PRIMARY KEY (`gid`,`group_type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stb_user_groups
-- ----------------------------
INSERT INTO `stb_user_groups` VALUES ('1', '0', '管理员', '1');
INSERT INTO `stb_user_groups` VALUES ('2', '1', '版主', '0');
INSERT INTO `stb_user_groups` VALUES ('3', '2', '普通会员', '0');
