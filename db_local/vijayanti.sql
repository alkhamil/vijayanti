/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : vijayanti

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 25/06/2020 17:09:41
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
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES (13, 'SK/1593059034/1', 6, 9, 6, 2020, 1, '2020-06-25 04:23:54', '2020-06-25 04:26:20');
INSERT INTO `assignments` VALUES (15, 'SK/1593060339/2', 7, 9, 6, 2020, 1, '2020-06-25 04:45:39', '2020-06-25 04:55:38');
INSERT INTO `assignments` VALUES (16, 'SK/1593070913/3', 6, 10, 6, 2020, 1, '2020-06-25 07:41:53', '2020-06-25 09:02:19');
INSERT INTO `assignments` VALUES (17, 'SK/1593075921/4', 6, 11, 6, 2020, 1, '2020-06-25 09:05:21', '2020-06-25 09:06:25');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checkers
-- ----------------------------
INSERT INTO `checkers` VALUES (6, 12, 'FADLI', '1996-05-31', 'fadli@email.com', '081266277367', 0, '2020-06-25 03:31:00', '2020-06-25 09:06:25');
INSERT INTO `checkers` VALUES (7, 13, 'RANDI', '1998-12-20', 'randi@email.com', '02188278378', 0, '2020-06-25 04:19:32', '2020-06-25 04:55:38');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (9, 'PT. MAILMO SEJAHTERA', '02177782787', 'bintang.aksesoris2020@gmail.com', 'Jalan raya bekasi', 'Bekasi', 0, '2020-06-25 03:29:33', '2020-06-25 04:55:38');
INSERT INTO `companies` VALUES (10, 'PT. RAKSANA', '02178387879', 'alkhamilnaz@gmail.com', 'Cibeber', 'Bekasi', 0, '2020-06-25 07:41:42', '2020-06-25 09:02:19');
INSERT INTO `companies` VALUES (11, 'PT. RAGABUANA', '02188378378', 'irhamfad12@gmail.com', 'Bekasi', 'Bekasi', 0, '2020-06-25 09:05:04', '2020-06-25 09:06:25');

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
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuisioners
-- ----------------------------
INSERT INTO `kuisioners` VALUES (73, '13', 6, 9, 2, 5, 4, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (74, '13', 6, 9, 3, 4, 4, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (75, '13', 6, 9, 4, 3, 4, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (76, '13', 6, 9, 5, 4, 2, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (77, '13', 6, 9, 6, 5, 5, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (78, '13', 6, 9, 7, 4, 4, '2020-06-25 04:25:32', '2020-06-25 04:25:32');
INSERT INTO `kuisioners` VALUES (79, '15', 7, 9, 2, 5, 5, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (80, '15', 7, 9, 3, 5, 4, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (81, '15', 7, 9, 4, 5, 5, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (82, '15', 7, 9, 5, 5, 4, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (83, '15', 7, 9, 6, 4, 5, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (84, '15', 7, 9, 7, 4, 4, '2020-06-25 04:48:18', '2020-06-25 04:48:18');
INSERT INTO `kuisioners` VALUES (85, '16', 6, 10, 2, 5, 5, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (86, '16', 6, 10, 3, 5, 5, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (87, '16', 6, 10, 4, 4, 5, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (88, '16', 6, 10, 5, 5, 5, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (89, '16', 6, 10, 6, 5, 4, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (90, '16', 6, 10, 7, 4, 2, '2020-06-25 07:42:34', '2020-06-25 07:42:34');
INSERT INTO `kuisioners` VALUES (91, '17', 6, 11, 2, 4, 5, '2020-06-25 09:06:03', '2020-06-25 09:06:03');
INSERT INTO `kuisioners` VALUES (92, '17', 6, 11, 3, 4, 5, '2020-06-25 09:06:03', '2020-06-25 09:06:03');
INSERT INTO `kuisioners` VALUES (93, '17', 6, 11, 4, 4, 5, '2020-06-25 09:06:03', '2020-06-25 09:06:03');
INSERT INTO `kuisioners` VALUES (94, '17', 6, 11, 5, 4, 5, '2020-06-25 09:06:03', '2020-06-25 09:06:03');
INSERT INTO `kuisioners` VALUES (95, '17', 6, 11, 6, 5, 4, '2020-06-25 09:06:03', '2020-06-25 09:06:03');
INSERT INTO `kuisioners` VALUES (96, '17', 6, 11, 7, 5, 4, '2020-06-25 09:06:03', '2020-06-25 09:06:03');

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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'korwil', 'korwil@email.com', '$2y$10$QVwALM/A0wV.ZKAdlIBcmO9KuW0HYkOL.0dd0UAdbq.jgMDByeEZG', '2020-06-13 13:47:25', '2020-06-13 13:47:28');
INSERT INTO `users` VALUES (12, 2, 'CK131051996', 'fadli@email.com', '$2y$10$4OZc00t6HIgqQEBZP9TTFOBlKN1gEuGqije6aQy17PRv0oDBFyKsa', '2020-06-25 03:31:00', '2020-06-25 03:31:00');
INSERT INTO `users` VALUES (13, 2, 'CK220121998', 'randi@email.com', '$2y$10$8wplu7M8qN5bqzGL1ecXTexc6bTfjnO2Y8vs6ejbjxNFWlTOkrPxy', '2020-06-25 04:19:32', '2020-06-25 04:19:32');

SET FOREIGN_KEY_CHECKS = 1;
