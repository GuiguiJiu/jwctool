/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : jwc

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/05/2019 10:51:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jxnu_colleges
-- ----------------------------
DROP TABLE IF EXISTS `jxnu_colleges`;
CREATE TABLE `jxnu_colleges`  (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jxnu_colleges_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jxnu_colleges
-- ----------------------------
INSERT INTO `jxnu_colleges` VALUES ('37000', '军事教研部（武装部）', 1);
INSERT INTO `jxnu_colleges` VALUES ('450', '继续教育学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('46000', '马克思主义学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('48000', '地理与环境学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('49000', '心理学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('50000', '教育学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('51000', '文学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('52000', '外国语学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('53000', '音乐学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('54000', '商学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('55000', '数学与信息科学学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('56000', '体育学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('57000', '公费师范生院', 1);
INSERT INTO `jxnu_colleges` VALUES ('58000', '历史文化与旅游学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('59000', '政法学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('60000', '物理与通信电子学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('61000', '化学化工学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('62000', '计算机信息工程学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('63000', '城市建设学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('64000', '新闻与传播学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('65000', '美术学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('66000', '生命科学学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('67000', '软件学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('68000', '财政金融学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('69000', '国际教育学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('81000', '科学技术学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('82000', '初等教育学院', 1);
INSERT INTO `jxnu_colleges` VALUES ('jwc', '教务处', 1);

SET FOREIGN_KEY_CHECKS = 1;
