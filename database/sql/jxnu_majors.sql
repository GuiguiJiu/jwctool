/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/05/2019 00:04:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jxnu_majors
-- ----------------------------
DROP TABLE IF EXISTS `jxnu_majors`;
CREATE TABLE `jxnu_majors`  (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `college_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jxnu_majors_name_unique`(`name`) USING BTREE,
  INDEX `jxnu_majors_college_id_foreign`(`college_id`) USING BTREE,
  CONSTRAINT `jxnu_majors_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `jxnu_colleges` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jxnu_majors
-- ----------------------------
INSERT INTO `jxnu_majors` VALUES ('020101fb', '经济学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020101sb', '经济学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020101sx', '经济学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020102fb', '国际经济与贸易（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020102fz', '国际经济与贸易（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020102sb', '国际经济与贸易（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020102sx', '国际经济与贸易（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020104fb', '金融学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020104fz', '金融学（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020104sb', '金融学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020104sx', '金融学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('020301K', '金融学', '68000', 1);
INSERT INTO `jxnu_majors` VALUES ('020301KS', '金融学（国际商务英语）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('020301KW', '金融学（国际金融）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('030101fb', '法学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('030101k', '法学', '59000', 1);
INSERT INTO `jxnu_majors` VALUES ('030101sb', '法学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('030101sx', '法学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('030404fb', '思想政治教育（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040102fb', '学前教育（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040102fz', '学前教育（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040104fb', '教育技术学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040107WE', '小学教育（英语）', '82000', 1);
INSERT INTO `jxnu_majors` VALUES ('040107WS', '小学教育（数学）', '82000', 1);
INSERT INTO `jxnu_majors` VALUES ('040107WY', '小学教育（语文）', '82000', 1);
INSERT INTO `jxnu_majors` VALUES ('040201sb', '体育教育（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040202K', '运动训练', '56000', 1);
INSERT INTO `jxnu_majors` VALUES ('040203K', '社会体育', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('040204K', '武术与民族传统体育', '56000', 1);
INSERT INTO `jxnu_majors` VALUES ('041102sx', '应用心理学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050101fz', '汉语言文学（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050101sb', '汉语言文学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050101sx', '汉语言文学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050101sy', '汉语言文学（卓越语文教师实验班）', '51000', 1);
INSERT INTO `jxnu_majors` VALUES ('050103fb', '对外汉语（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050103K', '对外汉语', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201fz', '英语（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201sb', '英语（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201sx', '英语（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WA', '英语（国际商务）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WB', '英语（国际会计）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WC', '英语（国际传播）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WD', '英语（国际金融）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WE', '英语（财务管理）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WF', '英语（涉外旅游）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050201WG', '英语（国际工商管理）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WH', '英语（跨文化交际）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050201WI', '英语（国际广告）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WJ', '英语（国际经济法）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WK', '英语（国际新闻）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050201WL', '英语（国际市场营销）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050207sx', '日语（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050207W', '日语（国际商务）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050262A', '商务英语（国际金融）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050262B', '商务英语（国际会计）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050262C', '商务英语（跨国商务）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('050301A', '金牌评论记者', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050302K', '广播电视新闻学', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050303sb', '广告学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050305fb', '传播学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050401sb', '音乐学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050406sb', '美术学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050406SY', '美术学（实验班）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050408fz', '艺术设计（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050408I', '艺术设计（数字媒体）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050408sb', '艺术设计（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('050418W', '动画（动漫插画）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('060101sx', '历史学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('060104W', '博物馆学', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('070101sb', '数学与应用数学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('070201A', '物理学（学术型）', '60000', 1);
INSERT INTO `jxnu_majors` VALUES ('070401fb', '生物科学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('071501fb', '心理学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('071501fz', '心理学（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('071501sx', '心理学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080605A', '计算机科学与技术（学术型）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080605fb', '计算机科学与技术（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080605Q', '计算机科学与技术（嵌入式系统）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080605R', '计算机科学与技术（软件服务外包）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080605sb', '计算机科学与技术（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611fb', '软件工程（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611RW', '软件工程（文科专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611sb', '软件工程（理科专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611W1', '软件工程（软件技术）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611W2', '软件工程（移动终端软件开发）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611W3', '软件工程（嵌入式技术）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611W4', '软件工程（多媒体应用与开发）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611W5', '软件工程（软件测试）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611W6', '软件工程（商务软件应用与开发）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611W7', '软件工程（动漫设计与创意）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080611W8', '软件工程（大数据技术方向）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('080611WW', '软件工程（文科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080613fb', '网络工程（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080613W1', '网络工程（网络方向）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080613W2', '网络工程（物联网方向）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080902W', '软件工程', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('080910T', '数据科学与大数据技术', '62000', 1);
INSERT INTO `jxnu_majors` VALUES ('10101', '哲学', '59000', 1);
INSERT INTO `jxnu_majors` VALUES ('110104sx', '工程管理（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110201fb', '工商管理（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110201fz', '工商管理（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110201sb', '工商管理（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110201sx', '工商管理（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110203FB', '会计学（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110203sb', '会计学（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110203sx', '会计学（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110204FB', '财务管理（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110204sb', '财务管理（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110204sx', '财务管理（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110205fb', '人力资源管理（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110205sb', '人力资源管理（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110205sx', '人力资源管理（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110206fz', '旅游管理（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110206J', '金牌讲解', '58000', 1);
INSERT INTO `jxnu_majors` VALUES ('110206sb', '旅游管理（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110209sb', '电子商务（专升本）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110209sx', '电子商务（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110301sx', '行政管理（双专业）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110302fb', '公共事业管理（辅修本科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('110302fz', '公共事业管理（辅修专科）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('120102', '信息管理与信息系统', '55000', 1);
INSERT INTO `jxnu_majors` VALUES ('120103', '工程管理', '63000', 1);
INSERT INTO `jxnu_majors` VALUES ('120104', '房地产开发与管理', '63000', 1);
INSERT INTO `jxnu_majors` VALUES ('120201C', '工商管理（创业应用型）', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('120201K', '工商管理', '54000', 1);
INSERT INTO `jxnu_majors` VALUES ('120201KW', '工商管理（国际商务英语）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('120202', '市场营销', '54000', 1);
INSERT INTO `jxnu_majors` VALUES ('120202W', '市场营销（国际商务英语）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('120203AC', '会计学(ACCA)', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('120203K', '会计学', '68000', 1);
INSERT INTO `jxnu_majors` VALUES ('120203KW', '会计学（国际商务英语）', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('120204', '财务管理', '68000', 1);
INSERT INTO `jxnu_majors` VALUES ('120206', '人力资源管理', '54000', 1);
INSERT INTO `jxnu_majors` VALUES ('120210', '文化产业管理', '58000', 1);
INSERT INTO `jxnu_majors` VALUES ('120401', '公共事业管理', '50000', 1);
INSERT INTO `jxnu_majors` VALUES ('120402', '行政管理', '59000', 1);
INSERT INTO `jxnu_majors` VALUES ('120403', '劳动与社会保障', '59000', 1);
INSERT INTO `jxnu_majors` VALUES ('120801', '电子商务', '54000', 1);
INSERT INTO `jxnu_majors` VALUES ('120901K', '旅游管理', '58000', 1);
INSERT INTO `jxnu_majors` VALUES ('130101W', '表演（戏剧影视）', '53000', 1);
INSERT INTO `jxnu_majors` VALUES ('130201', '音乐表演', '53000', 1);
INSERT INTO `jxnu_majors` VALUES ('130202', '音乐学', '53000', 1);
INSERT INTO `jxnu_majors` VALUES ('130204', '舞蹈表演', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('130205', '舞蹈学', '53000', 1);
INSERT INTO `jxnu_majors` VALUES ('130301', '表演', '56000', 1);
INSERT INTO `jxnu_majors` VALUES ('130304', '戏剧影视文学', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('130305', '广播电视编导', '64000', 1);
INSERT INTO `jxnu_majors` VALUES ('130309', '播音与主持艺术', '53000', 1);
INSERT INTO `jxnu_majors` VALUES ('130310', '动画', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130401', '美术学', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130402', '绘画', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130502', '视觉传达设计', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130503', '环境设计', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130504', '产品设计', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('130505', '服装与服饰设计', '65000', 1);
INSERT INTO `jxnu_majors` VALUES ('20101', '经济学', '68000', 1);
INSERT INTO `jxnu_majors` VALUES ('20102', '经济统计学', '55000', 1);
INSERT INTO `jxnu_majors` VALUES ('20401', '国际经济与贸易', '54000', 1);
INSERT INTO `jxnu_majors` VALUES ('30302', '社会工作', '59000', 1);
INSERT INTO `jxnu_majors` VALUES ('30503', '思想政治教育', '46000', 1);
INSERT INTO `jxnu_majors` VALUES ('35001', '教师教育', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35406', '职教·人力资源管理人员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35407', '职教·电子商务师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35408', '职教·营销师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35609', '职教·体育康乐服务员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35610', '职教·保健按摩师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35611', '职教·社会体育指导员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35812', '职教·导游', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35902', '职教·法律工作者', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('35903', '职教·公务员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36213', '职教·计算机软件开发师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36214', '职教·数据库应用开发师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36215', '职教·Web服务和组件开发人员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36216', '职教·计算机网络管理员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36217', '职教·办公自动化应用人员', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('36218', '职教·电子商务应用程序开发师', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('37004', '职教·剑桥秘书', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('37005', '职教·国家秘书', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('40101', '教育学', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('40102', '科学教育', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('40104', '教育技术学', '64000', 1);
INSERT INTO `jxnu_majors` VALUES ('40106', '学前教育', '50000', 1);
INSERT INTO `jxnu_majors` VALUES ('40107', '小学教育（综合）', '50000', 1);
INSERT INTO `jxnu_majors` VALUES ('40108', '特殊教育', '50000', 1);
INSERT INTO `jxnu_majors` VALUES ('40201', '体育教育', '56000', 1);
INSERT INTO `jxnu_majors` VALUES ('40203', '社会体育指导与管理', '56000', 1);
INSERT INTO `jxnu_majors` VALUES ('40205', '民族传统体育', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('50101', '汉语言文学', '51000', 1);
INSERT INTO `jxnu_majors` VALUES ('50102', '汉语言', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('50103', '汉语国际教育', '51000', 1);
INSERT INTO `jxnu_majors` VALUES ('50201', '英语', '52000', 1);
INSERT INTO `jxnu_majors` VALUES ('50204', '法语', '52000', 1);
INSERT INTO `jxnu_majors` VALUES ('50207', '日语', '52000', 1);
INSERT INTO `jxnu_majors` VALUES ('50209', '朝鲜语', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('50261', '翻译', '52000', 1);
INSERT INTO `jxnu_majors` VALUES ('50262', '商务英语', '69000', 1);
INSERT INTO `jxnu_majors` VALUES ('50301', '新闻学', '64000', 1);
INSERT INTO `jxnu_majors` VALUES ('50302', '广播电视学', '64000', 1);
INSERT INTO `jxnu_majors` VALUES ('50303', '广告学', '64000', 1);
INSERT INTO `jxnu_majors` VALUES ('50304', '传播学', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('50408', '艺术设计', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('60101', '历史学', '58000', 1);
INSERT INTO `jxnu_majors` VALUES ('60104', '文物与博物馆学', '58000', 1);
INSERT INTO `jxnu_majors` VALUES ('70101', '数学与应用数学', '55000', 1);
INSERT INTO `jxnu_majors` VALUES ('70102', '信息与计算科学', '55000', 1);
INSERT INTO `jxnu_majors` VALUES ('70201', '物理学（应用型）', '60000', 1);
INSERT INTO `jxnu_majors` VALUES ('70301', '化学', '61000', 1);
INSERT INTO `jxnu_majors` VALUES ('70302', '应用化学', '61000', 1);
INSERT INTO `jxnu_majors` VALUES ('70501', '地理科学', '48000', 1);
INSERT INTO `jxnu_majors` VALUES ('70502', '自然地理与资源环境', '48000', 1);
INSERT INTO `jxnu_majors` VALUES ('70504', '地理信息科学', '48000', 1);
INSERT INTO `jxnu_majors` VALUES ('70703', '地理信息系统', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('71001', '生物科学', '66000', 1);
INSERT INTO `jxnu_majors` VALUES ('71002', '生物技术', '66000', 1);
INSERT INTO `jxnu_majors` VALUES ('71101', '心理学', '49000', 1);
INSERT INTO `jxnu_majors` VALUES ('71102', '应用心理学', '49000', 1);
INSERT INTO `jxnu_majors` VALUES ('71201', '统计学', '55000', 1);
INSERT INTO `jxnu_majors` VALUES ('80403', '材料化学', '61000', 1);
INSERT INTO `jxnu_majors` VALUES ('80605', '计算机科学与技术（师范）', '62000', 1);
INSERT INTO `jxnu_majors` VALUES ('80701', '电子信息工程', '60000', 1);
INSERT INTO `jxnu_majors` VALUES ('80702', '城市规划', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('80703', '通信工程', '60000', 1);
INSERT INTO `jxnu_majors` VALUES ('80705', '光电信息科学与工程', '60000', 1);
INSERT INTO `jxnu_majors` VALUES ('80901', '计算机科学与技术（综合型）', '62000', 1);
INSERT INTO `jxnu_majors` VALUES ('80902', '软件工程（虚拟现实与动漫）', '67000', 1);
INSERT INTO `jxnu_majors` VALUES ('80903', '网络工程', '62000', 1);
INSERT INTO `jxnu_majors` VALUES ('80905', '物联网工程', '62000', 1);
INSERT INTO `jxnu_majors` VALUES ('81301', '化学工程与工艺', '61000', 1);
INSERT INTO `jxnu_majors` VALUES ('82801', '建筑学', '63000', 1);
INSERT INTO `jxnu_majors` VALUES ('82802', '城乡规划', '63000', 1);
INSERT INTO `jxnu_majors` VALUES ('82803', '风景园林', NULL, 0);
INSERT INTO `jxnu_majors` VALUES ('83001', '生物工程', '66000', 1);
INSERT INTO `jxnu_majors` VALUES ('jwc', '教务处', 'jwc', 1);
INSERT INTO `jxnu_majors` VALUES ('xlsyb', '计量心理学拔尖人才实验班', '49000', 1);

SET FOREIGN_KEY_CHECKS = 1;
