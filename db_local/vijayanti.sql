/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : localhost:3306
 Source Schema         : vijayanti

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 24/06/2020 23:35:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for assignments
-- ----------------------------
DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `checker_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES (10, 'SK/1593012280/3', 3, 7, 6, 2020, 1, '2020-06-24 15:24:40', '2020-06-24 15:52:50');

-- ----------------------------
-- Table structure for checkers
-- ----------------------------
DROP TABLE IF EXISTS `checkers`;
CREATE TABLE `checkers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checkers
-- ----------------------------
INSERT INTO `checkers` VALUES (3, 9, 'NAZMUDIN', '1996-05-31', 'alkhamilnaz@gmail.com', '088781728', 0, '2020-06-20 15:43:20', '2020-06-24 15:52:50');
INSERT INTO `checkers` VALUES (4, 10, 'ROCHMAN', '1997-09-23', 'rochma@email.com', '081928192', 0, '2020-06-20 16:04:24', '2020-06-20 16:10:31');
INSERT INTO `checkers` VALUES (5, 11, 'SAMSUDIN', '2020-06-02', 'admin@email.com', '233343434', 0, '2020-06-20 18:25:02', '2020-06-21 11:49:49');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_standing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (6, 7, 'PT. WIJAYA ABADI', '2016-06-20', '012677267', 'wa@email.com', 'huhuhu', 'Bekasi', 0, '2020-06-20 15:31:52', '2020-06-24 12:06:40');
INSERT INTO `companies` VALUES (7, 8, 'PT. JAYA ABADI', '2017-05-23', '01277267', 'ja@email.com', 'huhu', 'Bekasi', 0, '2020-06-20 15:42:24', '2020-06-24 15:52:50');

-- ----------------------------
-- Table structure for criterias
-- ----------------------------
DROP TABLE IF EXISTS `criterias`;
CREATE TABLE `criterias`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dimension_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of criterias
-- ----------------------------
INSERT INTO `criterias` VALUES (2, 3, 'K1', 'Kepuasan terhadap kesesuaian Harga yang di jual di Kuningan Mega Bangunan', '2020-06-20 17:27:16', '2020-06-20 17:27:16');
INSERT INTO `criterias` VALUES (3, 3, 'K2', 'Kepuasan terhadap keramahan pegawai Kuningan Mega Bangunan', '2020-06-20 17:27:28', '2020-06-20 17:27:28');
INSERT INTO `criterias` VALUES (4, 3, 'K3', 'Kepuasan Karyawan dalam memberikan layanan tepat pada waktunya.', '2020-06-20 17:27:41', '2020-06-20 17:27:41');
INSERT INTO `criterias` VALUES (5, 3, 'K4', 'Pelayanan pengaduan cepat dan handal', '2020-06-20 17:27:52', '2020-06-20 17:27:52');
INSERT INTO `criterias` VALUES (6, 4, 'K5', 'Karyawan menginformasikan kepada pelanggan tentang produk-produknya', '2020-06-20 17:28:05', '2020-06-20 17:28:05');
INSERT INTO `criterias` VALUES (7, 4, 'K6', 'Kepuasan terhadap kecepatan dan ketepatan dalam melayani pelanggan', '2020-06-20 17:28:17', '2020-06-20 17:28:17');

-- ----------------------------
-- Table structure for dimensions
-- ----------------------------
DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE `dimensions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dimensions
-- ----------------------------
INSERT INTO `dimensions` VALUES (3, 'D1', 'Reliability', 'Reliabilitas / Keandalan', '2020-06-20 17:26:38', '2020-06-20 17:26:38');
INSERT INTO `dimensions` VALUES (4, 'D2', 'Responsiveness', 'Daya Tanggap', '2020-06-20 17:26:56', '2020-06-20 17:26:56');

-- ----------------------------
-- Table structure for kuisioners
-- ----------------------------
DROP TABLE IF EXISTS `kuisioners`;
CREATE TABLE `kuisioners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `assignment_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `kenyataan` int(11) NOT NULL,
  `harapan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuisioners
-- ----------------------------
INSERT INTO `kuisioners` VALUES (55, '10', 3, 7, 2, 1, 2, '2020-06-24 15:48:32', '2020-06-24 15:48:32');
INSERT INTO `kuisioners` VALUES (56, '10', 3, 7, 3, 2, 2, '2020-06-24 15:48:32', '2020-06-24 15:48:32');
INSERT INTO `kuisioners` VALUES (57, '10', 3, 7, 4, 1, 2, '2020-06-24 15:48:32', '2020-06-24 15:48:32');
INSERT INTO `kuisioners` VALUES (58, '10', 3, 7, 5, 1, 2, '2020-06-24 15:48:32', '2020-06-24 15:48:32');
INSERT INTO `kuisioners` VALUES (59, '10', 3, 7, 6, 1, 3, '2020-06-24 15:48:32', '2020-06-24 15:48:32');
INSERT INTO `kuisioners` VALUES (60, '10', 3, 7, 7, 1, 3, '2020-06-24 15:48:32', '2020-06-24 15:48:32');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_06_13_064335_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_06_20_124241_create_companies_table', 2);
INSERT INTO `migrations` VALUES (6, '2020_06_20_124620_create_dimensions_table', 3);
INSERT INTO `migrations` VALUES (7, '2020_06_20_124745_create_criterias_table', 4);
INSERT INTO `migrations` VALUES (8, '2020_06_20_124937_create_kuisioners_table', 5);
INSERT INTO `migrations` VALUES (9, '2020_06_20_143024_create_checkers_table', 6);
INSERT INTO `migrations` VALUES (10, '2020_06_20_143238_create_assignments_table', 7);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'KORWIL', '2020-06-13 13:44:36', '2020-06-13 13:44:39');
INSERT INTO `roles` VALUES (2, 'CHECKER', '2020-06-13 13:44:52', '2020-06-13 13:44:55');
INSERT INTO `roles` VALUES (3, 'COMPANY', '2020-06-20 19:53:28', '2020-06-20 19:53:31');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'korwil', 'korwil@email.com', '$2y$10$QVwALM/A0wV.ZKAdlIBcmO9KuW0HYkOL.0dd0UAdbq.jgMDByeEZG', '2020-06-13 13:47:25', '2020-06-13 13:47:28');
INSERT INTO `users` VALUES (7, 3, 'PT120062016', 'wa@email.com', '$2y$10$VKVbzA28bdoub8Bjsc2sF.CoZc4//OQvtvHbEVxium9mVq59fyQxi', '2020-06-20 15:31:52', '2020-06-20 15:31:52');
INSERT INTO `users` VALUES (8, 3, 'PT223052017', 'ja@email.com', '$2y$10$3OBAGvU.CulONVtwyJeuu.JztT/CWJo/BEf6NCBuLVS8Ibw/tsv32', '2020-06-20 15:42:24', '2020-06-20 15:42:24');
INSERT INTO `users` VALUES (9, 2, 'CK131051996', 'alkhamilnaz@gmail.com', '$2y$10$6/VknKHvprI8hQS/wnUhxescg6cbwSN/LOx5VUhV/7wEPEMFib1F2', '2020-06-20 15:43:20', '2020-06-20 15:43:20');
INSERT INTO `users` VALUES (10, 2, 'CK223091997', 'rochma@email.com', '$2y$10$Bi6ifkG6yB2lXbHbLVpi4uBX5awihUrDwxjLwDE4DGcH0waBWiVM.', '2020-06-20 16:04:24', '2020-06-20 16:04:24');
INSERT INTO `users` VALUES (11, 2, 'CK302062020', 'admin@email.com', '$2y$10$.hpUUA1RkVdnl8XcRg4P0uaRhPID2j5KXmJR2aWD6YxZUIBa.HMEG', '2020-06-20 18:25:02', '2020-06-20 18:25:02');

SET FOREIGN_KEY_CHECKS = 1;
