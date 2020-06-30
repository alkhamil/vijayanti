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

 Date: 30/06/2020 22:53:24
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
  `saran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES (27, 'SK/1593531331/1', 12, 13, 6, 2020, 1, 'Di mohon untuk ditingkatkan kualitas produknya', '2020-06-30 15:35:31', '2020-06-30 15:38:36');
INSERT INTO `assignments` VALUES (28, 'SK/1593531344/2', 13, 14, 6, 2020, 1, 'Mantap Betullll', '2020-06-30 15:35:44', '2020-06-30 15:51:44');
INSERT INTO `assignments` VALUES (29, 'SK/1593532079/3', 12, 13, 7, 2020, 1, 'Mohon di pertahankan kualitasnya ya', '2020-06-30 15:47:59', '2020-06-30 15:49:37');

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checkers
-- ----------------------------
INSERT INTO `checkers` VALUES (12, 18, 'AHMAD', '1998-05-20', 'ahmad@email.com', '08988878782', 0, '2020-06-30 15:32:53', '2020-06-30 15:49:37');
INSERT INTO `checkers` VALUES (13, 19, 'BENY', '1997-07-12', 'beny@email.com', '08987888278', 0, '2020-06-30 15:33:21', '2020-06-30 15:51:44');
INSERT INTO `checkers` VALUES (14, 20, 'RANGGA', '1998-05-30', 'ranga@email.com', '08988772878', 0, '2020-06-30 15:33:45', '2020-06-30 15:33:45');

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (13, 'PT. JAYA ABADI', '081287738878', 'alkhamilnaz@gmail.com', 'jalan raya bekasi barat no 34', 'Bekasi', 0, '2020-06-30 15:34:38', '2020-06-30 15:49:37');
INSERT INTO `companies` VALUES (14, 'PT. BAKTI RAHAYU', '081256367787', 'bintang.aksesoris2020@gmail.com', 'Jalan raya duren bekasi barat no 12', 'Bekasi Barat', 0, '2020-06-30 15:35:21', '2020-06-30 15:51:44');

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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of criterias
-- ----------------------------
INSERT INTO `criterias` VALUES (11, 7, 'K1', 'Kemampuan operator dalam menggunakan alat dan mesin', '2020-06-30 15:28:59', '2020-06-30 15:28:59');
INSERT INTO `criterias` VALUES (12, 7, 'K2', 'Proses produksi yang dilaksanakan tepat waktu', '2020-06-30 15:29:07', '2020-06-30 15:29:07');
INSERT INTO `criterias` VALUES (13, 7, 'K3', 'Proses produksi tabung lpg sesuai dengan prosedur (SOP)', '2020-06-30 15:29:16', '2020-06-30 15:29:16');
INSERT INTO `criterias` VALUES (14, 7, 'K4', 'Hasil produksi yang diberikan sesuai dengan standar yang sudah ada', '2020-06-30 15:29:24', '2020-06-30 15:29:24');
INSERT INTO `criterias` VALUES (15, 8, 'K5', 'Keluhan terhadap penyedia jasa cepat dan tanggap', '2020-06-30 15:29:35', '2020-06-30 15:29:35');
INSERT INTO `criterias` VALUES (16, 8, 'K6', 'Daya tanggap petugas operator dalam melaksanakan produksi', '2020-06-30 15:29:47', '2020-06-30 15:29:47');
INSERT INTO `criterias` VALUES (17, 9, 'K7', 'Adanya pemberian ganti rugi apabila tabung Lpg mengalami kerusakan', '2020-06-30 15:30:08', '2020-06-30 15:30:08');
INSERT INTO `criterias` VALUES (18, 9, 'K8', 'Hasil kualitas tabung Lpg baik dan aman', '2020-06-30 15:30:19', '2020-06-30 15:30:19');
INSERT INTO `criterias` VALUES (19, 9, 'K9', 'Tidak ada gangguan dalam pelaksanaan produksi', '2020-06-30 15:30:29', '2020-06-30 15:30:29');
INSERT INTO `criterias` VALUES (20, 9, 'K10', 'Target produksi yang dilaksanakan tepat waktu', '2020-06-30 15:30:42', '2020-06-30 15:30:42');
INSERT INTO `criterias` VALUES (21, 10, 'K11', 'Tanggung jawab operator terhadap alat produksi', '2020-06-30 15:30:53', '2020-06-30 15:30:53');
INSERT INTO `criterias` VALUES (22, 10, 'K12', 'Profesionalisme operator dalam  menjalankan tugas', '2020-06-30 15:31:04', '2020-06-30 15:31:04');
INSERT INTO `criterias` VALUES (23, 11, 'K13', 'Kebersihan workshop', '2020-06-30 15:31:14', '2020-06-30 15:31:14');
INSERT INTO `criterias` VALUES (24, 11, 'K14', 'Fasilitas workshop', '2020-06-30 15:31:24', '2020-06-30 15:31:24');
INSERT INTO `criterias` VALUES (25, 11, 'K15', 'Petugas operator menggunakan APD lengkap dan aman', '2020-06-30 15:31:31', '2020-06-30 15:31:31');
INSERT INTO `criterias` VALUES (26, 11, 'K16', 'Peralatan dan mesin yang mendukung operasional berfungsi dengan baik', '2020-06-30 15:31:43', '2020-06-30 15:31:43');
INSERT INTO `criterias` VALUES (27, 11, 'K17', 'Ketersediaan alat pemadam ketika terjadi kebakaran', '2020-06-30 15:31:52', '2020-06-30 15:31:52');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dimensions
-- ----------------------------
INSERT INTO `dimensions` VALUES (7, 'D1', 'Reliability', 'Reliabilitas/Keandalan', '2020-06-30 15:27:37', '2020-06-30 15:27:37');
INSERT INTO `dimensions` VALUES (8, 'D2', 'Responsiveness', 'Daya Tanggap', '2020-06-30 15:27:53', '2020-06-30 15:27:53');
INSERT INTO `dimensions` VALUES (9, 'D3', 'Dimensi Assurance', 'Jaminan', '2020-06-30 15:28:09', '2020-06-30 15:28:09');
INSERT INTO `dimensions` VALUES (10, 'D4', 'Empathy', 'Empati', '2020-06-30 15:28:23', '2020-06-30 15:28:23');
INSERT INTO `dimensions` VALUES (11, 'D5', 'Tanggibles', 'Bukti Fisik', '2020-06-30 15:28:38', '2020-06-30 15:28:38');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 196 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuisioners
-- ----------------------------
INSERT INTO `kuisioners` VALUES (145, '27', 12, 13, 11, 5, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (146, '27', 12, 13, 12, 4, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (147, '27', 12, 13, 13, 5, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (148, '27', 12, 13, 14, 5, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (149, '27', 12, 13, 15, 4, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (150, '27', 12, 13, 16, 5, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (151, '27', 12, 13, 17, 4, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (152, '27', 12, 13, 18, 4, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (153, '27', 12, 13, 19, 5, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (154, '27', 12, 13, 20, 5, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (155, '27', 12, 13, 21, 4, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (156, '27', 12, 13, 22, 5, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (157, '27', 12, 13, 23, 4, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (158, '27', 12, 13, 24, 5, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (159, '27', 12, 13, 25, 4, 3, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (160, '27', 12, 13, 26, 3, 5, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (161, '27', 12, 13, 27, 5, 4, '2020-06-30 15:37:24', '2020-06-30 15:37:24');
INSERT INTO `kuisioners` VALUES (162, '29', 12, 13, 11, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (163, '29', 12, 13, 12, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (164, '29', 12, 13, 13, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (165, '29', 12, 13, 14, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (166, '29', 12, 13, 15, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (167, '29', 12, 13, 16, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (168, '29', 12, 13, 17, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (169, '29', 12, 13, 18, 4, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (170, '29', 12, 13, 19, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (171, '29', 12, 13, 20, 4, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (172, '29', 12, 13, 21, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (173, '29', 12, 13, 22, 5, 4, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (174, '29', 12, 13, 23, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (175, '29', 12, 13, 24, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (176, '29', 12, 13, 25, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (177, '29', 12, 13, 26, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (178, '29', 12, 13, 27, 5, 5, '2020-06-30 15:49:19', '2020-06-30 15:49:19');
INSERT INTO `kuisioners` VALUES (179, '28', 13, 14, 11, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (180, '28', 13, 14, 12, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (181, '28', 13, 14, 13, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (182, '28', 13, 14, 14, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (183, '28', 13, 14, 15, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (184, '28', 13, 14, 16, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (185, '28', 13, 14, 17, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (186, '28', 13, 14, 18, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (187, '28', 13, 14, 19, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (188, '28', 13, 14, 20, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (189, '28', 13, 14, 21, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (190, '28', 13, 14, 22, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (191, '28', 13, 14, 23, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (192, '28', 13, 14, 24, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (193, '28', 13, 14, 25, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (194, '28', 13, 14, 26, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');
INSERT INTO `kuisioners` VALUES (195, '28', 13, 14, 27, 4, 3, '2020-06-30 15:51:29', '2020-06-30 15:51:29');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `migrations` VALUES (11, '2020_06_25_184803_create_jobs_table', 8);

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'korwil', 'korwil@email.com', '$2y$10$QVwALM/A0wV.ZKAdlIBcmO9KuW0HYkOL.0dd0UAdbq.jgMDByeEZG', '2020-06-13 13:47:25', '2020-06-13 13:47:28');
INSERT INTO `users` VALUES (18, 2, 'CK120051998', 'ahmad@email.com', '$2y$10$YOSFWSPlBb4UrGkVPtzjoOecICmTub6xBLKqefgfIwnMr12DfOjjq', '2020-06-30 15:32:53', '2020-06-30 15:32:53');
INSERT INTO `users` VALUES (19, 2, 'CK212071997', 'beny@email.com', '$2y$10$xZaWxt/IPNhf8DNLUQBMr.b7EkJypnyP0Wahy1VC7m9o8ayyQqq5S', '2020-06-30 15:33:21', '2020-06-30 15:33:21');
INSERT INTO `users` VALUES (20, 2, 'CK330051998', 'ranga@email.com', '$2y$10$D8MKZaoTijtPaUwKXTGUkeW2ProGuD6PuHmhpSJFDtc0Jfc3XQuY.', '2020-06-30 15:33:45', '2020-06-30 15:33:45');

SET FOREIGN_KEY_CHECKS = 1;
