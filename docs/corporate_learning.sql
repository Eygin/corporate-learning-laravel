/*
 Navicat Premium Data Transfer

 Source Server         : Mysql Local
 Source Server Type    : MySQL
 Source Server Version : 80034 (8.0.34)
 Source Host           : localhost:3306
 Source Schema         : corporate_learning

 Target Server Type    : MySQL
 Target Server Version : 80034 (8.0.34)
 File Encoding         : 65001

 Date: 23/10/2023 17:52:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '01e7d7be-9287-4c37-ac4a-9a9d7c420751', 'Web Programming', '2023-10-23 06:36:28', '2023-10-23 07:26:30');
INSERT INTO `category` VALUES (2, '019bfbfe-f4ef-4d58-94ef-3b05cc68bb69', 'Content Creator', '2023-10-23 07:27:18', '2023-10-23 07:27:18');
INSERT INTO `category` VALUES (3, '8a06c062-7d22-4a2c-b1e1-866385b9d931', 'Digital Graphic Design', '2023-10-23 07:28:31', '2023-10-23 07:28:31');
INSERT INTO `category` VALUES (4, 'd2392e48-7962-4438-8b0b-ab05c87ad8f5', 'Network Administration', '2023-10-23 07:29:08', '2023-10-23 07:29:08');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for materi
-- ----------------------------
DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `materi_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi
-- ----------------------------
INSERT INTO `materi` VALUES (5, '0dfbabaf-28c2-49d6-9b18-61c368ce014f', 'web programming 1', '01e7d7be-9287-4c37-ac4a-9a9d7c420751', '2023-10-23 09:12:41', '2023-10-23 09:24:43');
INSERT INTO `materi` VALUES (6, '708a70cc-50aa-4e48-927e-f0633e847e6b', 'judul materinya', '019bfbfe-f4ef-4d58-94ef-3b05cc68bb69', '2023-10-23 10:41:07', '2023-10-23 10:41:07');

-- ----------------------------
-- Table structure for materi_file
-- ----------------------------
DROP TABLE IF EXISTS `materi_file`;
CREATE TABLE `materi_file`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `materi_file_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi_file
-- ----------------------------
INSERT INTO `materi_file` VALUES (4, '46b59c50-cdb8-4df7-ba90-a3f39f9424c5', '0dfbabaf-28c2-49d6-9b18-61c368ce014f', '4708290001698052361.pdf', '2023-10-23 09:12:41', '2023-10-23 09:12:41');
INSERT INTO `materi_file` VALUES (5, '40331d46-b238-4cf0-950e-5936317d360f', '0dfbabaf-28c2-49d6-9b18-61c368ce014f', '8319896731698056929.pdf', '2023-10-23 10:28:49', '2023-10-23 10:28:49');
INSERT INTO `materi_file` VALUES (6, '34541883-485f-46f9-bb09-3d6081f53e38', '0dfbabaf-28c2-49d6-9b18-61c368ce014f', '6006301151698056929.pdf', '2023-10-23 10:28:49', '2023-10-23 10:28:49');
INSERT INTO `materi_file` VALUES (7, '9d0165b5-067b-4bfe-a7c3-f51290933e3e', '0dfbabaf-28c2-49d6-9b18-61c368ce014f', '184610191698056929.pdf', '2023-10-23 10:28:49', '2023-10-23 10:28:49');
INSERT INTO `materi_file` VALUES (8, '56984cee-4e4e-4864-a025-5103c0d4e66b', '708a70cc-50aa-4e48-927e-f0633e847e6b', '19003685601698057667.pdf', '2023-10-23 10:41:07', '2023-10-23 10:41:07');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2023_10_22_205104_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (5, '2023_10_22_223205_create_table_category', 2);
INSERT INTO `migrations` VALUES (7, '2023_10_23_053244_add_column_in_user', 3);
INSERT INTO `migrations` VALUES (8, '2023_10_23_083205_create_table_materi', 4);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 6);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 7);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 8);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 10);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 11);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 12);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 13);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 14);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 16);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 17);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 18);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 19);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 20);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 22);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 23);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 24);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'super admin', 'web', '2023-10-22 22:40:26', '2023-10-22 22:40:26');
INSERT INTO `roles` VALUES (2, 'member', 'web', '2023-10-22 22:41:05', '2023-10-22 22:41:05');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'Super Admin', 'super@admin.com', NULL, '$2y$10$Vcr3gJ4zID8p2vi/nxfOEu1wzIAuX2o14qiuGzspFjpTsf9AYrEtm', 'u2c4KqqsbKBzhPvHgldOILbMhiptOeEn0kB4tKtX72u5gkcBt1vvsToBEMWa', '2023-10-22 22:45:25', '2023-10-23 04:53:46', NULL);
INSERT INTO `users` VALUES (20, 'member', 'member@web.com', NULL, '$2y$10$EmoyEAyHOarphkjw.6vUxe6emv4AaHJ266diNZ2i9IPIns50vbnWG', NULL, '2023-10-23 07:37:22', '2023-10-23 10:42:45', '019bfbfe-f4ef-4d58-94ef-3b05cc68bb69');
INSERT INTO `users` VALUES (22, 'member3', 'member3@web.com', NULL, '$2y$10$lY.7c0bt3IUhbER3TT7PTO/pIa7oUeaVqnAl/8KqCKlJl6XWV.7EW', NULL, '2023-10-23 07:39:56', '2023-10-23 07:39:56', '8a06c062-7d22-4a2c-b1e1-866385b9d931');
INSERT INTO `users` VALUES (23, 'member asli', 'member@gmail.com', NULL, '$2y$10$ZM.8L7SElpKpoNYvew5EN.sf3MLK3et5FFmB0woS1E6.UlhWnN8U6', '6nE6BAYkuM9BK561mGR0hQ2MZ7uYxpjOYh5HQRkQItXrdHcJP0tcZpX1fgX5', '2023-10-23 10:33:25', '2023-10-23 10:33:25', '01e7d7be-9287-4c37-ac4a-9a9d7c420751');
INSERT INTO `users` VALUES (24, 'member lain', 'member_lain@gmail.com', NULL, '$2y$10$I4NWbqi44Cfg6vMRfxFLFeNdviWonSD1jQ/SLc9ttQQ8XphTH0MR2', '4ogdJw2LlFfWJTpciHdCIbxYKZTJzpfiNzkjlIfqkht8NqP2Vfy4RhYtgloB', '2023-10-23 10:34:07', '2023-10-23 10:34:07', 'd2392e48-7962-4438-8b0b-ab05c87ad8f5');

SET FOREIGN_KEY_CHECKS = 1;
