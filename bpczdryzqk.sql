/*
 Navicat Premium Data Transfer

 Source Server         : mysql_tms
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : 128.199.80.221:3306
 Source Schema         : bpczdryzqk

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 09/05/2022 21:08:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hs_code` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double NOT NULL,
  `height` double NOT NULL,
  `depth` double NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cargos_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES (1, 1, 'Cocos (Keeling) Islands', '29049184', 'CI', 83, 63, 9, 53, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `cargos` VALUES (2, 1, 'Gambia', '68680243', 'AD', 65, 34, 34, 52, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `cargos` VALUES (3, 1, 'Gabon', '34296259', 'NL', 98, 31, 39, 98, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `cargos` VALUES (4, 1, 'Somalia', '81522921', 'AZ', 12, 63, 52, 58, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `cargos` VALUES (5, 1, 'Cuba', '60841476', 'BR', 93, 80, 62, 59, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `cargos` VALUES (6, 3, 'Keyboard', '1111.11.11', 'General Cargo', 100, 200, 300, 100, '2022-04-15 06:01:56', '2022-04-15 06:01:56');

-- ----------------------------
-- Table structure for consignees
-- ----------------------------
DROP TABLE IF EXISTS `consignees`;
CREATE TABLE `consignees`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `consignee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `consignees_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of consignees
-- ----------------------------
INSERT INTO `consignees` VALUES (1, 1, 'PT Djarum Indonesia', 'Indonesia', 'Jakarta', 'Jln serayu', 'PT Djarum', '021 4657433', 'mail@emal.om', '-', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `consignees` VALUES (2, 1, 'PT Gangnam Style', 'Indonesia', 'Surabaya', 'Jln salakaso', 'Gang Naam', '021 58689493', 'email@mailer.com', '-', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `consignees` VALUES (3, 3, 'Consignee 1', 'Indonesia', 'Jakarta Utara', 'Address 2', 'PIC Consignee', '082082082082', 'consignee1@gmail.com', '-', '2022-04-15 06:04:43', '2022-04-15 06:04:43');

-- ----------------------------
-- Table structure for depots
-- ----------------------------
DROP TABLE IF EXISTS `depots`;
CREATE TABLE `depots`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `depots_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of depots
-- ----------------------------
INSERT INTO `depots` VALUES (1, 1, 'DEPO SPIL MARUNDA', 'Jakarta', 'Jln KBN Marunda', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `depots` VALUES (2, 1, 'DEPO UCLA MARUNDA', 'Jakarta', 'Jln KBN Marunda', '2022-04-14 15:13:51', '2022-04-14 15:13:51');

-- ----------------------------
-- Table structure for draft_document_histories
-- ----------------------------
DROP TABLE IF EXISTS `draft_document_histories`;
CREATE TABLE `draft_document_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT 0,
  `is_update` tinyint NOT NULL DEFAULT 0,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `draft_document_histories_fcl_id_index`(`fcl_id` ASC) USING BTREE,
  INDEX `draft_document_histories_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of draft_document_histories
-- ----------------------------
INSERT INTO `draft_document_histories` VALUES (1, 34, 3, 0, 0, '{\"id\":1,\"fcl_id\":34,\"is_final\":0,\"si_number\":\"BJJ3123432DW2222\",\"bl_number\":null,\"airway_bill_number\":null,\"airway_bill_no\":null,\"draft_type\":\"BL\",\"doc_at\":null,\"doc_place\":null,\"handling_information\":null,\"first_carrier\":null,\"flight_date\":null,\"freight\":\"Prepaid\",\"freight_bl_type\":\"3 (THREE) ORIGINAL\",\"freight_remark\":\"dwadwa\",\"origin_printed_as\":\"Pool Marunda\",\"destination_printed_as\":\"Pabrik BMJ\",\"port_id\":null,\"port_printed_as\":null,\"shipper_id\":3,\"consignee_id\":3,\"notifi_id\":null,\"attachments\":null,\"goods_description\":\"DfG\",\"is_admin_approve\":0,\"created_at\":\"2022-04-27T09:43:19.000000Z\",\"updated_at\":\"2022-04-27T09:43:19.000000Z\",\"is_onboard\":0}', '2022-04-27 09:43:46', '2022-04-27 09:43:46');

-- ----------------------------
-- Table structure for export_directs
-- ----------------------------
DROP TABLE IF EXISTS `export_directs`;
CREATE TABLE `export_directs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voyage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stf_cls` date NULL DEFAULT NULL,
  `etd_origin` date NULL DEFAULT NULL,
  `eta_destination` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of export_directs
-- ----------------------------

-- ----------------------------
-- Table structure for export_transits
-- ----------------------------
DROP TABLE IF EXISTS `export_transits`;
CREATE TABLE `export_transits`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voyage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stf_cls` date NULL DEFAULT NULL,
  `etd_origin` date NULL DEFAULT NULL,
  `ves_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `voy_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eta_destination` date NULL DEFAULT NULL,
  `city_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `etd_destination` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of export_transits
-- ----------------------------

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for fcl_cargos
-- ----------------------------
DROP TABLE IF EXISTS `fcl_cargos`;
CREATE TABLE `fcl_cargos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `cargo_id` bigint UNSIGNED NULL DEFAULT NULL,
  `cargo_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cargo_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cargo_hs_code` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cargo_length` double NULL DEFAULT NULL,
  `cargo_height` double NULL DEFAULT NULL,
  `cargo_depth` double NULL DEFAULT NULL,
  `cargo_weight` double NULL DEFAULT NULL,
  `cargo_volume` double NULL DEFAULT NULL,
  `cargo_total_weight` double NULL DEFAULT NULL,
  `cargo_total_unit` double NULL DEFAULT NULL,
  `file_msds` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `file_cargo_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cargo_package_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `marks_numbers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_volume` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fcl_cargos_fcl_id_index`(`fcl_id` ASC) USING BTREE,
  INDEX `fcl_cargos_cargo_id_index`(`cargo_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fcl_cargos
-- ----------------------------
INSERT INTO `fcl_cargos` VALUES (1, 3, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-14 23:14:47', '2022-04-14 23:14:47');
INSERT INTO `fcl_cargos` VALUES (2, 1, 4, 'Somalia', 'AZ', '81522921', 12, 63, 52, 58, 0.078624, 116, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 03:24:41', '2022-04-15 03:24:41');
INSERT INTO `fcl_cargos` VALUES (3, 7, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 03:32:33', '2022-04-15 03:32:33');
INSERT INTO `fcl_cargos` VALUES (4, 8, 2, 'Gambia', 'AD', '68680243', 65, 34, 34, 52, 0.15028, 104, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 03:44:47', '2022-04-15 03:44:47');
INSERT INTO `fcl_cargos` VALUES (5, 9, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 06:02:09', '2022-04-15 06:02:09');
INSERT INTO `fcl_cargos` VALUES (6, 11, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 6, 100, 1, NULL, NULL, NULL, NULL, 0, '2022-04-15 08:43:18', '2022-04-15 08:43:18');
INSERT INTO `fcl_cargos` VALUES (7, 13, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 13:58:11', '2022-04-15 13:58:11');
INSERT INTO `fcl_cargos` VALUES (8, 12, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-15 14:26:21', '2022-04-15 14:26:21');
INSERT INTO `fcl_cargos` VALUES (9, 10, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-16 02:16:39', '2022-04-16 02:16:39');
INSERT INTO `fcl_cargos` VALUES (10, 14, 3, 'Gabon', 'NL', '34296259', 98, 31, 39, 98, 0.236964, 196, 2, NULL, NULL, NULL, NULL, 0, '2022-04-18 09:25:30', '2022-04-18 09:25:30');
INSERT INTO `fcl_cargos` VALUES (11, 4, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-21 14:27:11', '2022-04-21 14:27:11');
INSERT INTO `fcl_cargos` VALUES (12, 16, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 02:03:21', '2022-04-22 02:03:21');
INSERT INTO `fcl_cargos` VALUES (13, 20, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 02:45:05', '2022-04-22 02:45:05');
INSERT INTO `fcl_cargos` VALUES (14, 19, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 02:49:35', '2022-04-22 02:49:35');
INSERT INTO `fcl_cargos` VALUES (15, 22, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 02:58:38', '2022-04-22 02:58:38');
INSERT INTO `fcl_cargos` VALUES (16, 21, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 03:28:17', '2022-04-22 03:28:17');
INSERT INTO `fcl_cargos` VALUES (17, 23, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 04:11:12', '2022-04-22 04:11:12');
INSERT INTO `fcl_cargos` VALUES (18, 26, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-22 04:17:49', '2022-04-22 04:17:49');
INSERT INTO `fcl_cargos` VALUES (19, 24, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-25 02:31:57', '2022-04-25 02:31:57');
INSERT INTO `fcl_cargos` VALUES (20, 28, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-26 04:25:21', '2022-04-26 04:25:21');
INSERT INTO `fcl_cargos` VALUES (21, 30, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-26 04:29:17', '2022-04-26 04:29:17');
INSERT INTO `fcl_cargos` VALUES (22, 31, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-26 10:19:36', '2022-04-26 10:19:36');
INSERT INTO `fcl_cargos` VALUES (23, 29, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-27 02:19:03', '2022-04-27 02:19:03');
INSERT INTO `fcl_cargos` VALUES (24, 34, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-27 02:34:21', '2022-04-27 02:34:21');
INSERT INTO `fcl_cargos` VALUES (25, 35, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-28 01:28:50', '2022-04-28 01:28:50');
INSERT INTO `fcl_cargos` VALUES (26, 33, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-28 01:37:40', '2022-04-28 01:37:40');
INSERT INTO `fcl_cargos` VALUES (27, 37, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 18, 300, 3, NULL, NULL, NULL, NULL, 0, '2022-04-28 03:30:49', '2022-04-28 03:30:49');
INSERT INTO `fcl_cargos` VALUES (28, 38, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-28 04:03:04', '2022-04-28 04:03:04');
INSERT INTO `fcl_cargos` VALUES (29, 39, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 300, 100, 12, 200, 2, NULL, NULL, NULL, NULL, 0, '2022-04-29 02:54:02', '2022-04-29 02:54:02');
INSERT INTO `fcl_cargos` VALUES (30, 27, 5, 'Cuba', 'BR', '60841476', 93, 80, 62, 59, 0.92256, 118, 2, NULL, NULL, NULL, NULL, 0, '2022-05-06 09:48:02', '2022-05-06 09:48:02');
INSERT INTO `fcl_cargos` VALUES (31, 40, 1, 'Cocos (Keeling) Islands', 'CI', '29049184', 83, 63, 9, 53, 0.094122, 106, 2, NULL, NULL, NULL, NULL, 0, '2022-05-09 07:46:43', '2022-05-09 07:46:43');
INSERT INTO `fcl_cargos` VALUES (32, 41, 1, 'Cocos (Keeling) Islands', 'CI', '29049184', 83, 63, 9, 53, 0.094122, 106, 2, NULL, NULL, NULL, NULL, 0, '2022-05-09 10:23:20', '2022-05-09 10:23:20');
INSERT INTO `fcl_cargos` VALUES (34, 42, 6, 'Keyboard', 'General Cargo', '1111.11.11', 100, 200, 301, 100, 6.02, 100, 1, NULL, NULL, NULL, NULL, 0, '2022-05-09 10:40:51', '2022-05-09 10:40:51');

-- ----------------------------
-- Table structure for fcl_containers
-- ----------------------------
DROP TABLE IF EXISTS `fcl_containers`;
CREATE TABLE `fcl_containers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `size` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `containers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fcl_containers_fcl_id_index`(`fcl_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fcl_containers
-- ----------------------------
INSERT INTO `fcl_containers` VALUES (2, 1, '20', 'GP', 2, NULL, '2022-04-15 03:27:38', '2022-04-15 03:27:38');
INSERT INTO `fcl_containers` VALUES (4, 7, '40', 'GP', 1, NULL, '2022-04-15 03:32:33', '2022-04-15 03:32:33');
INSERT INTO `fcl_containers` VALUES (6, 8, '20', 'GP', 2, NULL, '2022-04-15 03:44:47', '2022-04-15 03:44:47');
INSERT INTO `fcl_containers` VALUES (8, 9, '20', 'GP', 1, NULL, '2022-04-15 06:02:09', '2022-04-15 06:02:09');
INSERT INTO `fcl_containers` VALUES (11, 12, '20', 'GP', 2, NULL, '2022-04-15 14:26:21', '2022-04-15 14:26:21');
INSERT INTO `fcl_containers` VALUES (15, 10, '20', 'GP', 2, NULL, '2022-04-16 02:16:39', '2022-04-16 02:16:39');
INSERT INTO `fcl_containers` VALUES (18, 14, '20', 'GP', 2, NULL, '2022-04-18 09:25:30', '2022-04-18 09:25:30');
INSERT INTO `fcl_containers` VALUES (20, 16, '20', 'GP', 2, NULL, '2022-04-22 02:03:21', '2022-04-22 02:03:21');
INSERT INTO `fcl_containers` VALUES (21, 19, '20', 'GP', 2, NULL, '2022-04-22 02:49:35', '2022-04-22 02:49:35');
INSERT INTO `fcl_containers` VALUES (24, 23, '20', 'GP', 1, NULL, '2022-04-22 04:11:12', '2022-04-22 04:11:12');
INSERT INTO `fcl_containers` VALUES (27, 24, '20', 'GP', 2, NULL, '2022-04-25 02:31:57', '2022-04-25 02:31:57');
INSERT INTO `fcl_containers` VALUES (28, 21, '20', 'GP', 2, NULL, '2022-04-26 02:48:16', '2022-04-26 02:48:16');
INSERT INTO `fcl_containers` VALUES (58, 30, '20', 'GP', 2, NULL, '2022-04-26 10:17:47', '2022-04-26 10:17:47');
INSERT INTO `fcl_containers` VALUES (59, 28, '20', 'GP', 2, NULL, '2022-04-26 10:18:36', '2022-04-26 10:18:36');
INSERT INTO `fcl_containers` VALUES (78, 31, '20', 'GP', 2, NULL, '2022-04-27 02:17:27', '2022-04-27 02:17:27');
INSERT INTO `fcl_containers` VALUES (80, 33, '20', 'GP', 2, NULL, '2022-04-28 01:37:40', '2022-04-28 01:37:40');
INSERT INTO `fcl_containers` VALUES (81, 37, '20', 'GP', 2, NULL, '2022-04-28 03:30:49', '2022-04-28 03:30:49');
INSERT INTO `fcl_containers` VALUES (82, 39, '20', 'GP', 2, NULL, '2022-04-29 02:54:02', '2022-04-29 02:54:02');
INSERT INTO `fcl_containers` VALUES (92, 27, '20', 'GP', 2, NULL, '2022-05-06 09:48:02', '2022-05-06 09:48:02');
INSERT INTO `fcl_containers` VALUES (95, 40, '20', 'GP', 1, NULL, '2022-05-09 07:46:43', '2022-05-09 07:46:43');
INSERT INTO `fcl_containers` VALUES (98, 41, '20', 'GP', 1, NULL, '2022-05-09 10:23:20', '2022-05-09 10:23:20');
INSERT INTO `fcl_containers` VALUES (100, 42, '20', 'GP', 2, NULL, '2022-05-09 10:44:01', '2022-05-09 10:44:01');

-- ----------------------------
-- Table structure for fcl_draft_documents
-- ----------------------------
DROP TABLE IF EXISTS `fcl_draft_documents`;
CREATE TABLE `fcl_draft_documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `is_final` tinyint NOT NULL DEFAULT 0,
  `si_number` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bl_number` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `airway_bill_number` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `airway_bill_no` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `draft_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `doc_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `handling_information` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `first_carrier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `flight_date` timestamp NULL DEFAULT NULL,
  `freight` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight_bl_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight_remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `origin_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `destination_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `port_id` bigint UNSIGNED NULL DEFAULT NULL,
  `port_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipper_id` bigint UNSIGNED NOT NULL,
  `consignee_id` bigint UNSIGNED NOT NULL,
  `notifi_id` bigint UNSIGNED NULL DEFAULT NULL,
  `attachments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `goods_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_admin_approve` smallint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_onboard` tinyint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fcl_draft_documents_fcl_id_index`(`fcl_id` ASC) USING BTREE,
  INDEX `fcl_draft_documents_port_id_index`(`port_id` ASC) USING BTREE,
  INDEX `fcl_draft_documents_shipper_id_index`(`shipper_id` ASC) USING BTREE,
  INDEX `fcl_draft_documents_consignee_id_index`(`consignee_id` ASC) USING BTREE,
  INDEX `fcl_draft_documents_notifi_id_index`(`notifi_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fcl_draft_documents
-- ----------------------------
INSERT INTO `fcl_draft_documents` VALUES (1, 34, 0, 'BJJ3123432DW2222', NULL, NULL, NULL, 'BL', NULL, NULL, NULL, NULL, NULL, 'Prepaid', '3 (THREE) ORIGINAL', 'dwadwa', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'DfG', 0, '2022-04-27 09:43:19', '2022-04-27 09:43:19', 0);

-- ----------------------------
-- Table structure for fcl_invoicings
-- ----------------------------
DROP TABLE IF EXISTS `fcl_invoicings`;
CREATE TABLE `fcl_invoicings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `invrule_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C' COMMENT 'P, T, C',
  `status_flag` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_attachments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fcl_invoicings_fcl_id_index`(`fcl_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fcl_invoicings
-- ----------------------------

-- ----------------------------
-- Table structure for fcl_shipping_instructions
-- ----------------------------
DROP TABLE IF EXISTS `fcl_shipping_instructions`;
CREATE TABLE `fcl_shipping_instructions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `si_number` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight_bl_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight_remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `origin_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `destination_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `port_id` bigint UNSIGNED NULL DEFAULT NULL,
  `port_printed_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipper_id` bigint UNSIGNED NOT NULL,
  `consignee_id` bigint UNSIGNED NOT NULL,
  `notifi_id` bigint UNSIGNED NULL DEFAULT NULL,
  `attachments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `goods_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_admin_approve` smallint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fcl_shipping_instructions_fcl_id_index`(`fcl_id` ASC) USING BTREE,
  INDEX `fcl_shipping_instructions_port_id_index`(`port_id` ASC) USING BTREE,
  INDEX `fcl_shipping_instructions_shipper_id_index`(`shipper_id` ASC) USING BTREE,
  INDEX `fcl_shipping_instructions_consignee_id_index`(`consignee_id` ASC) USING BTREE,
  INDEX `fcl_shipping_instructions_notifi_id_index`(`notifi_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fcl_shipping_instructions
-- ----------------------------
INSERT INTO `fcl_shipping_instructions` VALUES (48, 30, 'SI7218181fesf', 'Prepaid', '3 (THREE) ORIGINAL', 'fesf', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'esfe', 0, '2022-04-26 10:13:31', '2022-04-26 10:13:31');
INSERT INTO `fcl_shipping_instructions` VALUES (49, 28, 'SI7218181332222', 'Prepaid', '3 (THREE) ORIGINAL', 'fwef', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, NULL, 0, '2022-04-26 10:18:36', '2022-04-26 10:18:36');
INSERT INTO `fcl_shipping_instructions` VALUES (66, 31, 'SI721818123343', 'Prepaid', '3 (THREE) ORIGINAL', 'fsefs', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'fesfe', 0, '2022-04-27 02:13:33', '2022-04-27 02:17:27');
INSERT INTO `fcl_shipping_instructions` VALUES (69, 29, 'BJJ312343efwfew', 'Prepaid', '3 (THREE) ORIGINAL', 'fwef', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'fwefwea', 0, '2022-04-27 02:24:37', '2022-04-27 02:31:02');
INSERT INTO `fcl_shipping_instructions` VALUES (70, 34, 'BJJ3123432DW2222', 'Prepaid', '3 (THREE) ORIGINAL', 'dwadwa', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'DfG', 0, '2022-04-27 02:35:35', '2022-04-27 02:35:35');
INSERT INTO `fcl_shipping_instructions` VALUES (88, 35, 'SI7218181ewew', 'Prepaid', '3 (THREE) ORIGINAL', 'cdscs', 'Pool Marunda', 'Pabrik BMJ', NULL, NULL, 3, 3, NULL, NULL, 'dcscds', 0, '2022-04-28 06:54:31', '2022-04-28 06:54:31');
INSERT INTO `fcl_shipping_instructions` VALUES (93, 38, 'SI7218181ee', 'Prepaid', '3 (THREE) ORIGINAL', 'ves', 'Pool Marunda', 'Port Klang', NULL, NULL, 3, 3, NULL, NULL, 'seves', 0, '2022-04-28 21:54:59', '2022-04-28 21:54:59');

-- ----------------------------
-- Table structure for full_container_loads
-- ----------------------------
DROP TABLE IF EXISTS `full_container_loads`;
CREATE TABLE `full_container_loads`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `quote_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipment_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `trade_type` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `incoterm` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipment_type` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `npe_number` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_pickup` datetime NULL DEFAULT NULL,
  `date_unloading` datetime NULL DEFAULT NULL,
  `date_est_shipment` datetime NULL DEFAULT NULL,
  `origin_id` bigint UNSIGNED NULL DEFAULT NULL,
  `destination_id` bigint UNSIGNED NULL DEFAULT NULL,
  `depot_id` bigint UNSIGNED NULL DEFAULT NULL,
  `date_depo_pickup` datetime NULL DEFAULT NULL,
  `date_depo_delivery` datetime NULL DEFAULT NULL,
  `originport_id` bigint UNSIGNED NULL DEFAULT NULL,
  `destiport_id` bigint UNSIGNED NULL DEFAULT NULL,
  `date_max_delivery` datetime NULL DEFAULT NULL,
  `truck_id` bigint UNSIGNED NULL DEFAULT NULL,
  `qty_unit` int NULL DEFAULT NULL,
  `vessel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `voyage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_documents` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_temp` tinyint NOT NULL DEFAULT 1,
  `is_custom_clearance` tinyint NULL DEFAULT NULL,
  `is_request_cert_origin` tinyint NULL DEFAULT NULL,
  `is_pickup` tinyint NULL DEFAULT NULL,
  `is_delivery` tinyint NULL DEFAULT NULL,
  `is_lolo_charge` tinyint NULL DEFAULT NULL,
  `insurance_cur` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `insurance_amount` double NULL DEFAULT NULL,
  `cargo_cur` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cargo_amount` double NULL DEFAULT NULL,
  `freight_cur` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `freight_amount` double NULL DEFAULT NULL,
  `issued_at` datetime NULL DEFAULT NULL,
  `issued_status` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'null = new/pending; PRO = On Progress; COMP = Complete; REJ = Reject; CNL = Cancel',
  `issued_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `delivery_id` bigint UNSIGNED NULL DEFAULT NULL,
  `pickup_id` bigint UNSIGNED NULL DEFAULT NULL,
  `file_performa_invoice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pi_value` double NULL DEFAULT NULL,
  `pi_currency` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pi_status` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WR' COMMENT 'WR, OK, RJ',
  `pi_upload_at` timestamp NULL DEFAULT NULL,
  `pi_valid_until` timestamp NULL DEFAULT NULL,
  `quote_type` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `admin_update` timestamp NULL DEFAULT NULL,
  `addres_delivery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fleet_category` varchar(112) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fleet_type` varchar(112) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `full_container_loads_quote_no_unique`(`quote_no` ASC) USING BTREE,
  UNIQUE INDEX `full_container_loads_shipment_no_unique`(`shipment_no` ASC) USING BTREE,
  INDEX `full_container_loads_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `full_container_loads_origin_id_index`(`origin_id` ASC) USING BTREE,
  INDEX `full_container_loads_destination_id_index`(`destination_id` ASC) USING BTREE,
  INDEX `full_container_loads_depot_id_index`(`depot_id` ASC) USING BTREE,
  INDEX `full_container_loads_originport_id_index`(`originport_id` ASC) USING BTREE,
  INDEX `full_container_loads_destiport_id_index`(`destiport_id` ASC) USING BTREE,
  INDEX `full_container_loads_truck_id_index`(`truck_id` ASC) USING BTREE,
  INDEX `full_container_loads_delivery_id_index`(`delivery_id` ASC) USING BTREE,
  INDEX `full_container_loads_pickup_id_index`(`pickup_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of full_container_loads
-- ----------------------------
INSERT INTO `full_container_loads` VALUES (1, 1, 'QN-15042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-15 12:00:00', NULL, '2022-04-22 03:27:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/AdrXcqJfnnzog7TJmYRwVjMg2QNLtzJ8Lq0hiKOl.jpg\",\"file_packaging_list\":\"fclfiles\\/Ogx5SnTVp8pqN4SBoUiLonD9zDHJIR1FRnJMmTCB.jpg\",\"file_others\":\"fclfiles\\/25SwQPjDK5NujwCqICOSDQzRuffG6P7ycjVLoUrN.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 6, 'fclfiles/OJQFdsXECdjNqdIOC318Wk1tWI7ZrabWb6B65NJW.jpg', 940000, 'IDR', 'OK', '2022-04-15 03:28:50', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-14 20:38:07', '2022-04-15 03:28:59');
INSERT INTO `full_container_loads` VALUES (2, 1, NULL, NULL, 'EX', NULL, 'PTP', 'ABCD1234554', '2022-04-15 12:00:00', NULL, NULL, 6, NULL, 1, '2022-04-15 12:00:00', NULL, 2, NULL, '2022-04-22 12:00:00', NULL, NULL, 'RIO GRANDE', '2109S', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'ftl', NULL, NULL, NULL, NULL, '2022-04-14 23:13:42', '2022-04-15 03:31:36');
INSERT INTO `full_container_loads` VALUES (3, 1, 'QN-14042022-0001', NULL, 'EX', 'FCA', 'DTP', NULL, NULL, NULL, '2022-04-22 23:14:00', 6, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/VPoacA6mDEIkIpzBLsLhXQgqVRvPJv4GTEAeNfHB.jpg\",\"file_packaging_list\":\"fclfiles\\/qvrOjNZ7pkLgdoxeNlGL3mVvYBJ4Qin0g7E7wSuf.jpg\",\"file_others\":\"fclfiles\\/kxb7gW8x4AwHiUL8L9SYAgVtzo2bMTLr8ltpwhA2.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fclfiles/sUaaffoz0abZkcLJ0Pyq3vFJjVG3FA1HFlIv7TB6.jpg', 890000, 'IDR', 'OK', '2022-04-14 23:17:16', '2022-04-22 12:00:00', 'air-freight', NULL, NULL, NULL, NULL, '2022-04-14 23:14:26', '2022-04-14 23:17:35');
INSERT INTO `full_container_loads` VALUES (4, 1, 'QN-21042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-28 12:00:00', NULL, '2022-04-22 14:27:00', NULL, NULL, NULL, NULL, NULL, 3, 7, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/txdV4iAtUvEfh7IMtJDXr2JZWjtTNTv28pAj7Tr7.jpg\",\"file_packaging_list\":\"fclfiles\\/YRjPurhQMLpDAms51zRkDgKAmXUbiDLn6hufMdx0.jpg\",\"file_others\":\"fclfiles\\/8C0Qf9CpMq34QqMZAlUWms7eRLjjZjkXBTejROuU.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 10, 'fclfiles/UlXGFNGQMf42eqwSATf5AcgY2RTYftMxCsvyiyCL.jpg', 32222, 'IDR', 'OK', '2022-04-21 14:27:51', '2022-04-22 12:00:00', 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-04-14 23:16:21', '2022-04-21 14:28:01');
INSERT INTO `full_container_loads` VALUES (5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'breakbulk', NULL, NULL, NULL, NULL, '2022-04-14 23:16:23', '2022-04-14 23:16:23');
INSERT INTO `full_container_loads` VALUES (6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'air-freight', NULL, NULL, NULL, NULL, '2022-04-14 23:16:25', '2022-04-14 23:16:25');
INSERT INTO `full_container_loads` VALUES (7, 1, 'QN-15042022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-16 12:00:00', NULL, '2022-04-22 03:32:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/An61GujfzS4b3tOqz5kQjiXBmSHUYfs7EpoiowSY.jpg\",\"file_packaging_list\":\"fclfiles\\/Lakp6kdf3aSlHGLQIgE0k4SOkLknMkkgBXM8ea75.jpg\",\"file_others\":\"fclfiles\\/URLOMl56t0rV81zukA072H0qPGwCby9YWh445ZVx.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 6, 'fclfiles/fYlCJmxcItX1epmmqjcBJpOZ1ssLKVLNC2PfhCDC.jpg', 8000000, 'IDR', 'OK', '2022-04-15 03:33:05', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'Trailer', 'Container 20 FT', '2022-04-15 03:31:25', '2022-04-15 03:33:13');
INSERT INTO `full_container_loads` VALUES (8, 1, 'QN-15042022-0003', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-22 12:00:00', NULL, '2022-04-22 03:44:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/Y8JIOKNcpcbGtA5a0CxNlKtMajzxOSsSHcHufYZ0.jpg\",\"file_packaging_list\":\"fclfiles\\/TqZhn6LxT82xqUgWGYQuckCZFdy4ns8d2R8reHQj.jpg\",\"file_others\":\"fclfiles\\/E6CXLpfIoS0Mder22umrwwL5EshQhhfDlIne21au.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 6, 'fclfiles/9HOy1xj4xPICacFI1xSFhcUXQRPqwpuAhnxhkE0W.jpg', 7600000, 'IDR', 'OK', '2022-04-15 03:45:56', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'CDD', 'Container 20 FT', '2022-04-15 03:35:25', '2022-04-15 03:46:04');
INSERT INTO `full_container_loads` VALUES (9, 3, 'QN-15042022-0004', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-22 12:00:00', NULL, '2022-04-16 06:01:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/jWYNhShBf5BjXeuge0Z5sBofj5BpKujUSzFzbj1i.jpg\",\"file_packaging_list\":\"fclfiles\\/NBTzfc5f4SzVCx7HPUKcjWWM6En3ezjjILyPIq20.jpg\",\"file_others\":\"fclfiles\\/bpGop4grDpCvGFd9cGssPjnZTxouK6RyZp5peCM5.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/NMqjHU4KEMEdJ6EaPNvbzVSzb0wEv8YOioiHeLhf.jpg', 8700000, 'IDR', 'OK', '2022-04-15 06:02:59', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-15 06:00:38', '2022-04-15 06:03:06');
INSERT INTO `full_container_loads` VALUES (10, 3, 'QN-16042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-16 12:00:00', NULL, '2022-04-17 02:16:00', NULL, NULL, NULL, NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/UggCGaexK685XtiQiLuzdoxw9WZnTijygZGQZafX.jpg\",\"file_packaging_list\":\"fclfiles\\/ipn24ZMgcoC1IW2gmYDMMK9g31dEYC6rSRvFQoIi.jpg\",\"file_others\":\"fclfiles\\/ecCBDACtVSymx03NIhgdx25bzubOrQTyCwxiTz62.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/x0WxbYH9YMVXST43UYXTbi3sZFPfOHspxZrwYApB.jpg', 789000, 'IDR', 'OK', '2022-04-16 02:17:46', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-15 06:06:29', '2022-04-16 02:17:54');
INSERT INTO `full_container_loads` VALUES (11, 3, 'QN-15042022-0005', NULL, 'EX', 'FCA', 'DTP', NULL, NULL, NULL, '2022-04-15 08:43:00', 9, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/QrQh8NCEoy69LXHZuu9sR6jMzRw1zGYZntu5Lx0p.jpg\",\"file_packaging_list\":\"fclfiles\\/gQtEXSWRpVQ5upAIKN1PxNEFQj5IT4JqeWXF3DCo.jpg\",\"file_others\":\"fclfiles\\/zWenCqTQR6HCYuFCLPeB3qJUkHzLf9oFrOGYNz45.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fclfiles/EVOypu9A3eRq7iyZSDnqyTIL052GQxXzsPDWlOyn.jpg', 7800000, 'IDR', 'OK', '2022-04-15 08:44:00', '2022-04-16 12:00:00', 'air-freight', NULL, NULL, NULL, NULL, '2022-04-15 08:42:50', '2022-04-15 08:44:10');
INSERT INTO `full_container_loads` VALUES (12, 1, 'QN-15042022-0008', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-16 12:00:00', NULL, '2022-04-16 14:26:00', NULL, NULL, NULL, NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/fnsxiSR2yfKD2DsXMarAV2KUCN9Fea3tom5XWsFm.jpg\",\"file_packaging_list\":\"fclfiles\\/3T7BIyXDBouNInHtiI94uqFB7gHdFpmr9vH6zsj9.jpg\",\"file_others\":\"fclfiles\\/JwMmXIVRgoEApOCPOQjXBDtS3Tvb5hsQJ7tDa5Y2.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 11, 'fclfiles/WQbzYxFlCKevUu8mt4KagLB9MpFnKACiSfPqQMZZ.jpg', 5434444, 'IDR', 'OK', '2022-04-15 14:27:01', '2022-04-22 12:00:00', 'fcl', NULL, NULL, 'Trailer', 'Container 20 FT', '2022-04-15 13:34:04', '2022-04-15 14:27:07');
INSERT INTO `full_container_loads` VALUES (13, 3, 'QN-15042022-0007', NULL, 'DOM', 'FOB', 'DTD', NULL, '2022-04-16 12:00:00', NULL, '2022-04-16 14:02:00', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/DxZg8ip0OZJayNGvGMcBd8j6hlsDWg56sgrA2Anb.jpg\",\"file_packaging_list\":\"fclfiles\\/6nTta4bH4RKDmgSyb8quEemxkd1e6iAejVV7xGih.jpg\",\"file_others\":\"fclfiles\\/hWLEBRQ3Nhe8LXPqUKCx7g0Ldi7i6AuInbeurePu.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/ULK30eVakNTCXLAOUyqaYMaDEMTQU8kxGNrT0AdF.jpg', 5434333, 'IDR', 'OK', '2022-04-15 13:59:40', '2022-04-22 12:00:00', 'lcl', NULL, NULL, 'Trailer', 'Container 20 FT', '2022-04-15 13:57:17', '2022-04-15 14:02:50');
INSERT INTO `full_container_loads` VALUES (14, 1, 'QN-18042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-18 12:00:00', NULL, '2022-04-18 09:25:00', NULL, NULL, NULL, NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/MVnirjk0sZIFwuHtscJqNow2dZH23jV2jWlNEho8.jpg\",\"file_packaging_list\":\"fclfiles\\/dNBTpsRThNZAV49bFnPt7ta498thB3C2xGKROwPm.jpg\",\"file_others\":\"fclfiles\\/6wuf7vdHO0BsNuy11iOefhphAFlYMDNY3yOgkJ14.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 10, 'fclfiles/m98aleFeUh8UY8vS0wqlbHi069Q9ejHrFdMuIpdw.jpg', 7500000, 'IDR', 'OK', '2022-04-18 09:26:23', '2022-04-19 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-16 02:11:07', '2022-04-18 09:26:36');
INSERT INTO `full_container_loads` VALUES (15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'air-freight', NULL, NULL, NULL, NULL, '2022-04-18 01:35:41', '2022-04-18 01:35:41');
INSERT INTO `full_container_loads` VALUES (16, 1, 'QN-22042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-23 02:03:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/kE00m4LxC2IhNKR2eD9lzsnrCwZxKJ8woZfSf93E.jpg\",\"file_packaging_list\":\"fclfiles\\/mTy25Ay983X0UUBXtDt0atjUjDmhsNaZaGrnjZ4I.jpg\",\"file_others\":\"fclfiles\\/C1OLGqBWYwVHKNuS7Q1fGOQ8aWeV0VBhb4upiUEj.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-04-18 20:19:51', '2022-04-22 02:03:38');
INSERT INTO `full_container_loads` VALUES (17, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'ltl', NULL, NULL, NULL, NULL, '2022-04-18 20:21:15', '2022-04-18 20:21:15');
INSERT INTO `full_container_loads` VALUES (18, 1, NULL, NULL, 'EX', NULL, 'SEA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'ccl', NULL, NULL, NULL, NULL, '2022-04-18 20:21:18', '2022-04-19 04:31:27');
INSERT INTO `full_container_loads` VALUES (19, 1, 'QN-22042022-0003', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-23 02:49:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/WyoQiPWzm1ZlZDRvP7qGfHxd3ugoX4SkpX1GfTpR.jpg\",\"file_packaging_list\":\"fclfiles\\/6qrUZr1cBWx33aYAuxYOOpvuv7rp9dg75LDTuwiG.jpg\",\"file_others\":\"fclfiles\\/BrFBNwLl61Je61zrXoCjHqRPZDbORDE74Ndk24OW.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-04-22 02:15:22', '2022-04-22 02:49:49');
INSERT INTO `full_container_loads` VALUES (20, 1, 'QN-22042022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-23 02:44:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/gfT3FJpFTWDTRawtFgNXtII3ax1OFdzDg8kJZMaT.jpg\",\"file_packaging_list\":\"fclfiles\\/D8uYzH7NHK1s8Kikx73iJS2xBJRIdizo4FKJfLO2.jpg\",\"file_others\":\"fclfiles\\/iIUM342eZYsJeH1cVW87wU2dQn1QQhjEvKpU9U1Y.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fclfiles/AapCAB5rjXLpOEQc4DvlvQuKZ2hZAwkNcyeHBaEd.jpg', 0, 'IDR', 'WR', '2022-04-22 03:46:58', '2022-04-29 12:00:00', 'lcl', NULL, NULL, NULL, NULL, '2022-04-22 02:15:40', '2022-04-22 03:46:58');
INSERT INTO `full_container_loads` VALUES (21, 1, 'QN-26042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-26 12:00:00', NULL, '2022-04-26 02:48:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/CD2KazOXCF7aan4VPg7mP2QpNrm1w1RzgljrvdqK.jpg\",\"file_packaging_list\":\"fclfiles\\/E2w7Iopyc2oTjDdEBSe3riqZamgP0rD0N2ENfxV0.jpg\",\"file_others\":\"fclfiles\\/RLFEJLpkoK6ZTTXBUQ9O42Dp9dRY2aAC8XFacgt6.jpg\"}', 0, NULL, 1, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 10, 'fclfiles/twc1P0YwWfQiOPKGj4dhdEbkfum1yjzDKXdUPNW3.jpg', 980000, 'IDR', 'OK', '2022-04-26 03:00:43', '2022-04-27 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-22 02:58:09', '2022-04-26 03:01:10');
INSERT INTO `full_container_loads` VALUES (22, 1, NULL, NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-23 02:47:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/ewj860RUzdYJdWicTQJhPEE9eoFr8CssnP8apCSy.jpg\"}', 1, NULL, 1, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'lcl', NULL, NULL, NULL, NULL, '2022-04-22 02:58:11', '2022-04-26 02:47:35');
INSERT INTO `full_container_loads` VALUES (23, 3, 'QN-22042022-0004', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-23 12:00:00', NULL, '2022-04-23 04:11:00', NULL, NULL, NULL, NULL, NULL, 3, 8, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/1wROjBRGYlD0QcmXTx8Lm64sH0qNPBAieyRT0Vri.jpg\",\"file_packaging_list\":\"fclfiles\\/vcBTG13HlI5soT7hquYFbFwWfCUXMc02Bg8XEuvJ.jpg\",\"file_others\":\"fclfiles\\/OMy1VliyX8576tGiSJVXvOR2BqHHxmC0xgDJQmmM.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/BsP4lWEXA3iyUasTtcqwuCSPhQazZtBksmMmKpCL.jpg', 654444, 'IDR', 'OK', '2022-04-22 04:13:47', '2022-04-29 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-22 04:07:34', '2022-04-22 04:14:00');
INSERT INTO `full_container_loads` VALUES (24, 3, 'QN-25042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-26 02:31:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/ywm3eLootOrjAhA2uC2fodGDGt3Tc0XBGeRdgezd.jpg\",\"file_packaging_list\":\"fclfiles\\/gkgYeUokPtqGyiHlywBIsQvozDaWJsBnNAud13T6.jpg\",\"file_others\":\"fclfiles\\/TKJXbIa2C85oWSHOIISrKatKitB0IEQXh7ugfiOt.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-04-22 04:17:08', '2022-04-25 02:32:25');
INSERT INTO `full_container_loads` VALUES (25, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'breakbulk', NULL, NULL, NULL, NULL, '2022-04-22 04:17:11', '2022-04-22 04:17:11');
INSERT INTO `full_container_loads` VALUES (26, 3, 'QN-22042022-0005', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-29 12:00:00', NULL, '2022-04-29 04:17:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/q5vF1GtX8CEEZyfPjbg9FSNwXpoewu4cjlPQkOoL.jpg\",\"file_packaging_list\":\"fclfiles\\/qxVrK7seFcSAqzDIB1ly3PNm6EuU8KS7XIg9Yhrd.jpg\",\"file_others\":\"fclfiles\\/cBJ9BjRZ9HEpR3Y6Gl59K89t4P2hB1Ym23KSn1CK.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/0l2QsSOvS1voOZndv8gZyPIPGXfsqJduvt5zK8wR.jpg', 241421, 'IDR', 'OK', '2022-04-22 04:18:26', '2022-04-29 12:00:00', 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-04-22 04:17:12', '2022-04-22 04:18:34');
INSERT INTO `full_container_loads` VALUES (27, 1, 'QN-06052022-0003', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-05-07 09:47:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/tDTbXT9n70czlyJ1b9YiJLLiQl7LgfAeRf63KXW2.pdf\",\"file_packaging_list\":\"fclfiles\\/fZFBcMnjBnRHtkW4EF1e2VmmWlPTWlH6Kc16BYk8.pdf\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-04-26 02:49:26', '2022-05-06 10:14:34');
INSERT INTO `full_container_loads` VALUES (28, 3, 'QN-26042022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-26 04:25:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/v9JZfMLhIUu0zHZ3eghvNpAr8wJrm6reAs8snpcY.jpg\",\"file_packaging_list\":\"fclfiles\\/xm8P3QXxnCCRO0gWXFGkJPBTRewhhZtj4gQXeQh8.jpg\",\"file_others\":\"fclfiles\\/w1CRFG76MBbWDz4M2BcALiH7z9xPyZpKzu4ur9YJ.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fclfiles/yFCXwiGCDfQGxYsanOvpdh9myuHC6brB25ho4zli.jpg', 5474444, 'IDR', 'OK', '2022-04-26 04:26:22', '2022-04-27 12:00:00', 'fcl', NULL, NULL, NULL, NULL, '2022-04-26 04:23:31', '2022-04-26 04:26:34');
INSERT INTO `full_container_loads` VALUES (29, 3, 'QN-27042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-28 12:00:00', NULL, '2022-04-28 02:18:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/q48A6LdwjIoIoDcrDjCMKchxoHuGpMaIdO0PZidS.jpg\",\"file_packaging_list\":\"fclfiles\\/U4vP8uuQpJOwYFpeb5TmmYjmBhHYwPYxia1j8cTv.jpg\",\"file_others\":\"fclfiles\\/yBu8xqIU3fduvsOHVmeKFyrQnBQxtsW5AUPsKmvv.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/bR3foIScTx2kuLrZE14As0SoNQe7neIBvOloBOfW.jpg', 9800000, 'IDR', 'OK', '2022-04-27 02:20:12', '2022-04-28 12:00:00', 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-04-26 04:23:35', '2022-04-27 02:20:22');
INSERT INTO `full_container_loads` VALUES (30, 3, 'QN-26042022-0003', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-27 12:00:00', NULL, '2022-04-27 04:29:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/rG69wKQm2MFvhor00s76CiRllaJIf7AHN3p3HiO8.jpg\",\"file_packaging_list\":\"fclfiles\\/DF92un6UCKmkgfZC6UWchLax5izKgPslLZU6zDWz.jpg\",\"file_others\":\"fclfiles\\/gfbQodfSeh4OzZfsG6f17UjyrrWJrQrKw0svOM98.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/5KWjnZykUjlRUW6rAnpPaijdM5SKt9mtJokeoj6d.jpg', 9700000, 'IDR', 'OK', '2022-04-26 04:29:59', '2022-04-28 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-26 04:28:33', '2022-04-26 04:30:11');
INSERT INTO `full_container_loads` VALUES (31, 3, 'QN-26042022-0004', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-27 12:00:00', NULL, '2022-04-27 10:19:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/43DloRfzCQSHnMNXzgyc1lCtoWlGrgLwYP1QMHYd.jpg\",\"file_packaging_list\":\"fclfiles\\/Mtr0YeMb9lPmkCkzJXoFCFMXz289txTnZwli2SYp.jpg\",\"file_others\":\"fclfiles\\/IVyv6UZccLxb6HIqDWTNndUUNv7lbU84q5eSWbRO.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/uWFvOp45AX8FwxPTqyxl5M5zRPm5WcaUM2gRJwa4.jpg', 2121221, 'IDR', 'OK', '2022-04-26 10:20:10', '2022-04-28 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-26 10:18:59', '2022-04-26 10:20:17');
INSERT INTO `full_container_loads` VALUES (32, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'ftl', NULL, NULL, NULL, NULL, '2022-04-26 13:25:31', '2022-04-26 13:25:31');
INSERT INTO `full_container_loads` VALUES (33, 3, 'QN-28042022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-29 12:00:00', NULL, '2022-04-29 01:37:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/7xdygJVkaGQQmgLo9kltdToFRpkvCK3UdgPaA68y.jpg\",\"file_packaging_list\":\"fclfiles\\/x6TV3piIbpOGaa2SdeXP7kWuUMrTZttDJpwqEVls.jpg\",\"file_others\":\"fclfiles\\/ihBXFG4JxfFPgahPQ4aX31JXWi1nF0h9wpVlAaYr.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-27 02:18:11', '2022-04-28 01:37:56');
INSERT INTO `full_container_loads` VALUES (34, 3, 'QN-27042022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-28 12:00:00', NULL, '2022-04-28 02:34:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/IRfrikkSnxjdsifc1SDtg1RKwSA9WOUYwsTbhtSG.jpg\",\"file_packaging_list\":\"fclfiles\\/npOPeORgCjLGRXDzngHgQy5KWUum8DFpkDB0ocyT.jpg\",\"file_others\":\"fclfiles\\/H6eDmHAkuMp2fj7zLdrJbDd17p55tevvnT2PET8U.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/mdLYbqfSl10vh8BYm0noa7YhrGBQO5WD1mOJa5MN.jpg', 52432, 'IDR', 'OK', '2022-04-27 02:34:52', '2022-04-28 12:00:00', 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-04-27 02:33:37', '2022-04-27 02:35:00');
INSERT INTO `full_container_loads` VALUES (35, 3, 'QN-28042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-29 12:00:00', NULL, '2022-04-29 01:28:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/L3rKM4E6hhw1npi1dYbrur5Nf5TO2UkGzoQQk0tW.jpg\",\"file_packaging_list\":\"fclfiles\\/A91uMy0GyuxA67shijSTE65nWNf9j1dYMBKESAGT.jpg\",\"file_others\":\"fclfiles\\/ZMgKJG7BXRrWKLXeWYQr9m9GwSQEG2UzZZjt4ujA.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/VL7KmXskrBjyDyjm53zSAbsMOsdMovrPMsxwTTYY.jpg', 6500000, 'IDR', 'OK', '2022-04-28 02:03:05', '2022-04-29 12:00:00', 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-04-27 09:44:11', '2022-04-28 02:03:13');
INSERT INTO `full_container_loads` VALUES (36, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'ltl', NULL, NULL, NULL, NULL, '2022-04-27 09:44:20', '2022-04-27 09:44:20');
INSERT INTO `full_container_loads` VALUES (37, 3, 'QN-28042022-0003', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-29 03:30:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/nZ6sZ6FlDtgzIPhxwUpjcjFdP5Wd4IlJLYPESgxa.jpg\",\"file_packaging_list\":\"fclfiles\\/AOJ937wNVN7054EY6dXKtw5IUxgB9vSQY8zlPl5I.jpg\",\"file_others\":\"fclfiles\\/EKb1dAbbYwyn80OKPIMCXaOT0Iz4OV9STtthbHqv.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 500000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-04-28 03:29:59', '2022-04-28 03:31:08');
INSERT INTO `full_container_loads` VALUES (38, 3, 'QN-28042022-0004', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-04-29 04:02:00', NULL, NULL, NULL, NULL, NULL, 8, 1, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/nsDutLWw5ii0wbPrcxgUAhxTmfKixl2RSJMcP5qX.jpg\",\"file_packaging_list\":\"fclfiles\\/nclmTj27Y7lbQmCEOLZ6g91gVjp4dsN9Jpwytey7.jpg\",\"file_others\":\"fclfiles\\/qhOoGYxPlWEYquclqirrYbNaWkAstIyrW7PsVkdE.jpg\"}', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 2000000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fclfiles/kc3NTWoTJpXkfCjeEoyTIea4AB1DfpcyPo1h9pEp.jpg', 212121, 'IDR', 'OK', '2022-04-28 07:03:30', '2022-04-29 12:00:00', 'lcl', NULL, NULL, NULL, NULL, '2022-04-28 04:02:43', '2022-04-28 07:03:38');
INSERT INTO `full_container_loads` VALUES (39, 3, 'QN-29042022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, '2022-04-30 12:00:00', NULL, '2022-04-30 02:53:00', NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, '{\"file_invoice\":\"fclfiles\\/zUqlNmUsQ22Fv6F0N2HXTl5n5xm56qFaypT1BYYP.jpg\",\"file_packaging_list\":\"fclfiles\\/qw428ue6DKo9ONnMVmTkCh1UMAOn58LaNzGglZKS.jpg\",\"file_others\":\"fclfiles\\/peVp4x5kBlLeVBnhC4M0otXi6OVPccLMNzwNPm0v.jpg\"}', 0, NULL, NULL, 1, NULL, NULL, 'IDR', 2000000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 9, 'fclfiles/XK5IrIsH9ckaQrjGprPvKAJ3lkxEEZ9yYN0F8gHx.jpg', 9700000, 'IDR', 'OK', '2022-04-29 02:55:41', '2022-04-30 12:00:00', 'fcl', NULL, NULL, 'CDD', 'CDD', '2022-04-29 02:52:33', '2022-04-29 02:55:48');
INSERT INTO `full_container_loads` VALUES (40, 1, 'QN-09052022-0001', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-05-16 07:45:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '[]', 0, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-05-09 07:43:51', '2022-05-09 07:47:00');
INSERT INTO `full_container_loads` VALUES (41, 1, 'QN-09052022-0002', NULL, 'EX', 'FOB', 'PTP', NULL, NULL, NULL, '2022-05-09 10:22:00', NULL, NULL, NULL, NULL, NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, '[]', 0, NULL, NULL, NULL, NULL, NULL, 'IDR', 50000, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, NULL, NULL, '2022-05-09 08:05:31', '2022-05-09 10:23:52');
INSERT INTO `full_container_loads` VALUES (42, 3, 'QN-09052022-0003', NULL, 'EX', 'DDP', 'PTD', NULL, '2022-05-09 12:00:00', NULL, '2022-05-09 10:43:00', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '[]', 0, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, 'WR', NULL, NULL, 'fcl', NULL, NULL, 'CDE', 'CDE', '2022-05-09 09:49:25', '2022-05-09 10:44:18');
INSERT INTO `full_container_loads` VALUES (43, 3, NULL, NULL, 'EX', 'FOB', 'PTP', NULL, '2022-05-10 12:00:00', NULL, '2022-05-09 10:28:00', NULL, NULL, NULL, NULL, NULL, 3, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, 'WR', NULL, NULL, 'lcl', NULL, NULL, 'CDD', 'CDD', '2022-05-09 10:26:57', '2022-05-09 10:28:42');

-- ----------------------------
-- Table structure for import_directs
-- ----------------------------
DROP TABLE IF EXISTS `import_directs`;
CREATE TABLE `import_directs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voyage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stf_cls` date NULL DEFAULT NULL,
  `etd_origin` date NULL DEFAULT NULL,
  `eta_destination` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of import_directs
-- ----------------------------

-- ----------------------------
-- Table structure for import_transits
-- ----------------------------
DROP TABLE IF EXISTS `import_transits`;
CREATE TABLE `import_transits`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voyage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stf_cls` date NULL DEFAULT NULL,
  `etd_origin` date NULL DEFAULT NULL,
  `ves_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `voy_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eta_destination` date NULL DEFAULT NULL,
  `city_connecting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `etd_destination` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of import_transits
-- ----------------------------

-- ----------------------------
-- Table structure for invoicing_histories
-- ----------------------------
DROP TABLE IF EXISTS `invoicing_histories`;
CREATE TABLE `invoicing_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fcl_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT 0,
  `is_update` tinyint NOT NULL DEFAULT 0,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoicing_histories_fcl_id_index`(`fcl_id` ASC) USING BTREE,
  INDEX `invoicing_histories_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoicing_histories
-- ----------------------------

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `locations_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (7, 3, 'Gudang Nissan', 'Indonesia', 'IND', 'Bekasi', 'Gudang Nissin Kawasan Kitic Kav.3A,, Nagasari, Kec. Serang Baru, Kabupaten Bekasi, Jawa Barat 17330', '-6.3903767', '107.1640684', '2022-04-15 05:59:20', '2022-04-15 05:59:20');
INSERT INTO `locations` VALUES (8, 3, 'Gudang Nufarm', 'Indonesia', 'IND', 'Serang', 'PT. Nufarm Indonesia, Jalan Penggoreng, Mangunreja, Kabupaten Serang, Banten, Indonesia', '-5.889101200000001', '106.071605', '2022-04-15 06:00:02', '2022-04-15 06:00:02');
INSERT INTO `locations` VALUES (9, 3, 'Gudang Nissin', 'Indonesia', 'IND', 'Bekasi', 'Gudang Nissin Kawasan Kitic Kav.3A,, Nagasari, Kec. Serang Baru, Kabupaten Bekasi, Jawa Barat 17330', '-6.3903767', '107.1640684', '2022-04-15 06:00:33', '2022-04-15 06:00:33');
INSERT INTO `locations` VALUES (10, 1, 'Pabrik Advik', 'Indonesia', 'IND', 'Bekasi', 'PT. Advik Indonesia, Cicau, Kabupaten Bekasi, Jawa Barat, Indonesia', '-6.3739227', '107.1574852', '2022-04-15 14:10:35', '2022-04-15 14:10:35');
INSERT INTO `locations` VALUES (11, 1, 'Pabrik Actem', 'Indonesia', 'IND', 'Tangerang', 'PT actem Jl. Raya Mohamad Toha Km 1 Karawaci Kota Tangerang 15114, RT.001/RW.005, Koang Jaya, Karawaci Sub-District, Tangerang City, Banten 15112', '-6.1613219', '106.5991516', '2022-04-15 14:11:09', '2022-04-15 14:11:09');

-- ----------------------------
-- Table structure for master_ports
-- ----------------------------
DROP TABLE IF EXISTS `master_ports`;
CREATE TABLE `master_ports`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SEA' COMMENT 'AIR/SEA',
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `master_ports_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_ports
-- ----------------------------
INSERT INTO `master_ports` VALUES (1, 1, 'Port Klang', 'SEA', 'Malaysia', 'Malaysia', 'Kuala Lumpur', 'Port Klang', '0', '0', '2022-04-14 15:13:51', '2022-04-14 23:20:01');
INSERT INTO `master_ports` VALUES (2, 1, 'Port of Tanjung Priok', 'SEA', 'Indonesia', 'Indonesia', 'Jakarta Utara', 'Port of Tanjung Priok', '0', '0', '2022-04-14 15:13:51', '2022-04-14 23:20:10');
INSERT INTO `master_ports` VALUES (3, 2, 'Pabrik BMJ', 'SEA', 'Malaysa', 'MY', 'Karawang', 'PT Bukit Muria Jaya, Jl. Karawang, Purwadana, Kabupaten Karawang, Jawa Barat, Indonesia', '-6.2994683', '107.2760764', '2022-04-15 14:14:12', '2022-04-22 04:16:54');
INSERT INTO `master_ports` VALUES (4, 2, 'Pabrik Centex', 'SEA', 'Indonesia', 'IND', 'Jakarta Timur', 'PT Centex Jl. Raya Centex Gg. Mandiri, RT.2/RW.10, no33, Kec. Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13740', '-6.3255266', '106.876954', '2022-04-15 14:14:45', '2022-04-15 14:14:45');
INSERT INTO `master_ports` VALUES (5, 2, 'Pabrik BICC Berca Balaraja', 'SEA', 'Malaysa', 'MY', 'Kuala Lumpur', 'PT.BICC BERCA CABLES, Balaraja, Kabupaten Tangerang, Banten, Indonesia', '-6.224836400000001', '106.4317507', '2022-04-15 14:25:25', '2022-04-15 14:25:25');
INSERT INTO `master_ports` VALUES (6, 2, 'Gudang Bumi Wira', 'SEA', 'Indonesia', 'IND', 'Jakarta Utara', 'PT. Bumi Wirastaraya Sejahtera, RT.008/RW.009, Pejuang, Kota Bekasi, Jawa Barat, Indonesia', '-6.187310699999999', '106.9858693', '2022-04-21 14:21:54', '2022-04-21 14:21:54');
INSERT INTO `master_ports` VALUES (7, 2, 'Gudang Brothersindo', 'SEA', 'Thailand', 'THA', 'Bangkok', 'Bangkok Hanoi', '13.7563309', '100.5017651', '2022-04-21 14:23:55', '2022-04-21 14:23:55');
INSERT INTO `master_ports` VALUES (8, 2, 'Pool Marunda', 'SEA', 'Indonesia', 'IND', 'Kuala Lumpur', 'Kuala Lumpur', '3.139003', '101.686855', '2022-04-22 04:08:43', '2022-04-22 04:17:05');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_12_11_235429_create_teams_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_12_12_003729_create_cargos_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_12_12_042344_create_locations_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_12_12_085124_create_roles_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_12_15_154829_create_size_containers_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_12_15_161440_create_type_containers_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_12_16_150220_create_depots_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_12_16_150242_create_trucks_table', 1);
INSERT INTO `migrations` VALUES (13, '2021_12_17_143737_create_import_directs_table', 1);
INSERT INTO `migrations` VALUES (14, '2021_12_17_154419_create_import_transits_table', 1);
INSERT INTO `migrations` VALUES (15, '2021_12_18_101515_create_export_directs_table', 1);
INSERT INTO `migrations` VALUES (16, '2021_12_18_101603_create_export_transits_table', 1);
INSERT INTO `migrations` VALUES (17, '2021_12_22_152425_create_banners_table', 1);
INSERT INTO `migrations` VALUES (18, '2021_12_28_143225_create_full_container_loads_table', 1);
INSERT INTO `migrations` VALUES (19, '2021_12_28_143857_create_fcl_containers_table', 1);
INSERT INTO `migrations` VALUES (20, '2021_12_28_144113_create_fcl_cargos_table', 1);
INSERT INTO `migrations` VALUES (21, '2022_01_04_051117_create_master_ports_table', 1);
INSERT INTO `migrations` VALUES (22, '2022_01_05_074510_create_sequences_table', 1);
INSERT INTO `migrations` VALUES (23, '2022_01_17_162509_create_shippers_table', 1);
INSERT INTO `migrations` VALUES (24, '2022_01_17_165532_create_consignees_table', 1);
INSERT INTO `migrations` VALUES (25, '2022_01_17_181812_create_notifi_parties_table', 1);
INSERT INTO `migrations` VALUES (26, '2022_01_19_030414_create_tickets_table', 1);
INSERT INTO `migrations` VALUES (27, '2022_01_20_123610_create_trackings_table', 1);
INSERT INTO `migrations` VALUES (28, '2022_01_27_015706_create_fcl_shipping_instructions_table', 1);
INSERT INTO `migrations` VALUES (29, '2022_02_12_085247_create_fcl_draft_documents_table', 1);
INSERT INTO `migrations` VALUES (30, '2022_02_13_035135_create_fcl_invoicings_table', 1);
INSERT INTO `migrations` VALUES (31, '2022_02_14_143146_create_draft_document_histories_table', 1);
INSERT INTO `migrations` VALUES (32, '2022_02_14_143652_create_invoicing_histories_table', 1);
INSERT INTO `migrations` VALUES (33, '2022_02_18_021505_create_selling_prices_table', 1);
INSERT INTO `migrations` VALUES (34, '2022_02_28_004916_alter_draftdoc_add_is_onboard', 1);
INSERT INTO `migrations` VALUES (35, '2022_03_01_145015_create_notifications_table', 1);
INSERT INTO `migrations` VALUES (36, '2022_04_20_211300_create_ticket_replies_table', 2);

-- ----------------------------
-- Table structure for notifi_parties
-- ----------------------------
DROP TABLE IF EXISTS `notifi_parties`;
CREATE TABLE `notifi_parties`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `notifi_party` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifi_parties_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifi_parties
-- ----------------------------

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type` ASC, `notifiable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('0f34f3db-fc51-4ad6-bb7d-b57717b835d0', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":9,\"quote_no\":\"QN-15042022-0004\",\"upload_at\":\"2022-04-15T06:02:59.122790Z\"}', NULL, '2022-04-15 06:02:59', '2022-04-15 06:02:59');
INSERT INTO `notifications` VALUES ('11f352b6-6907-48f9-ba3e-e9758b160c06', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":20,\"quote_no\":\"QN-22042022-0002\",\"upload_at\":\"2022-04-22T03:46:59.004445Z\"}', NULL, '2022-04-22 03:46:59', '2022-04-22 03:46:59');
INSERT INTO `notifications` VALUES ('1233a168-823d-4337-8160-532b83ce7cc0', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":3,\"quote_no\":\"QN-14042022-0001\",\"upload_at\":\"2022-04-14T23:17:16.871159Z\"}', NULL, '2022-04-14 23:17:16', '2022-04-14 23:17:16');
INSERT INTO `notifications` VALUES ('1263fc4b-dd1d-4fa1-9fc6-38c9556aa9a8', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":28,\"quote_no\":\"QN-26042022-0002\",\"upload_at\":\"2022-04-26T04:26:22.026599Z\"}', NULL, '2022-04-26 04:26:22', '2022-04-26 04:26:22');
INSERT INTO `notifications` VALUES ('240267f4-e567-4bcb-9c65-09d8c1813cd3', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":34,\"quote_no\":\"QN-27042022-0002\",\"upload_at\":\"2022-04-27T02:34:52.924309Z\"}', NULL, '2022-04-27 02:34:52', '2022-04-27 02:34:52');
INSERT INTO `notifications` VALUES ('2e183f32-9ea8-418b-b4dd-06369d068f3b', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":29,\"quote_no\":\"QN-27042022-0001\",\"upload_at\":\"2022-04-27T02:20:12.856277Z\"}', NULL, '2022-04-27 02:20:12', '2022-04-27 02:20:12');
INSERT INTO `notifications` VALUES ('3b701bbf-2fb1-493b-9515-70e8910ed51b', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":10,\"quote_no\":\"QN-16042022-0001\",\"upload_at\":\"2022-04-16T02:17:46.136885Z\"}', NULL, '2022-04-16 02:17:46', '2022-04-16 02:17:46');
INSERT INTO `notifications` VALUES ('41cd00f1-1050-4e20-bcdd-d1e94a2bc726', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":1,\"quote_no\":\"QN-15042022-0001\",\"upload_at\":\"2022-04-15T03:28:50.230237Z\"}', NULL, '2022-04-15 03:28:50', '2022-04-15 03:28:50');
INSERT INTO `notifications` VALUES ('4b7f4b17-577d-4c54-961c-9b334a145e0e', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":31,\"quote_no\":\"QN-26042022-0004\",\"upload_at\":\"2022-04-26T10:20:10.274455Z\"}', NULL, '2022-04-26 10:20:10', '2022-04-26 10:20:10');
INSERT INTO `notifications` VALUES ('608f81f7-ebf6-48cb-b185-b2bccd2f2882', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":7,\"quote_no\":\"QN-15042022-0002\",\"upload_at\":\"2022-04-15T03:33:05.640884Z\"}', NULL, '2022-04-15 03:33:05', '2022-04-15 03:33:05');
INSERT INTO `notifications` VALUES ('61812aaa-5b4e-4d7f-8b08-f4eea2772b6d', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":11,\"quote_no\":\"QN-15042022-0005\",\"upload_at\":\"2022-04-15T08:44:00.226680Z\"}', NULL, '2022-04-15 08:44:00', '2022-04-15 08:44:00');
INSERT INTO `notifications` VALUES ('6e33250c-a37d-43d0-8b41-acfa81551f30', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":21,\"quote_no\":\"QN-26042022-0001\",\"upload_at\":\"2022-04-26T03:00:43.701267Z\"}', NULL, '2022-04-26 03:00:43', '2022-04-26 03:00:43');
INSERT INTO `notifications` VALUES ('8dc3a0ed-98c0-49f8-8d28-c7666eaa9791', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":30,\"quote_no\":\"QN-26042022-0003\",\"upload_at\":\"2022-04-26T04:29:59.103093Z\"}', NULL, '2022-04-26 04:29:59', '2022-04-26 04:29:59');
INSERT INTO `notifications` VALUES ('9f7d302e-e1c5-4693-8ef0-6e9f82f7feed', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":35,\"quote_no\":\"QN-28042022-0001\",\"upload_at\":\"2022-04-28T02:03:05.364139Z\"}', NULL, '2022-04-28 02:03:05', '2022-04-28 02:03:05');
INSERT INTO `notifications` VALUES ('b08d517d-5227-4b5a-9809-577d3c7053cd', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":8,\"quote_no\":\"QN-15042022-0003\",\"upload_at\":\"2022-04-15T03:45:56.376837Z\"}', NULL, '2022-04-15 03:45:56', '2022-04-15 03:45:56');
INSERT INTO `notifications` VALUES ('b9c76454-4e5a-4048-87bc-a0252aba26b9', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":26,\"quote_no\":\"QN-22042022-0005\",\"upload_at\":\"2022-04-22T04:18:26.338720Z\"}', NULL, '2022-04-22 04:18:26', '2022-04-22 04:18:26');
INSERT INTO `notifications` VALUES ('c5632113-2100-4fa6-8db0-923d0da6927c', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":38,\"quote_no\":\"QN-28042022-0004\",\"upload_at\":\"2022-04-28T07:03:30.258998Z\"}', NULL, '2022-04-28 07:03:30', '2022-04-28 07:03:30');
INSERT INTO `notifications` VALUES ('c98e0a6f-85e8-415d-8efb-176ee74b8023', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":4,\"quote_no\":\"QN-21042022-0001\",\"upload_at\":\"2022-04-21T14:27:51.737629Z\"}', NULL, '2022-04-21 14:27:51', '2022-04-21 14:27:51');
INSERT INTO `notifications` VALUES ('cae0b2c2-e225-49af-962a-cd2837a3a5dc', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":12,\"quote_no\":\"QN-15042022-0008\",\"upload_at\":\"2022-04-15T14:27:01.731029Z\"}', NULL, '2022-04-15 14:27:01', '2022-04-15 14:27:01');
INSERT INTO `notifications` VALUES ('cca030ae-b3cf-4edf-b63b-ef63e74550fa', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":39,\"quote_no\":\"QN-29042022-0001\",\"upload_at\":\"2022-04-29T02:55:41.275084Z\"}', NULL, '2022-04-29 02:55:41', '2022-04-29 02:55:41');
INSERT INTO `notifications` VALUES ('d6e1411d-0cee-4538-90d6-789f6c491b99', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 1, '{\"fcl_id\":14,\"quote_no\":\"QN-18042022-0001\",\"upload_at\":\"2022-04-18T09:26:23.673549Z\"}', NULL, '2022-04-18 09:26:23', '2022-04-18 09:26:23');
INSERT INTO `notifications` VALUES ('dc19c2a2-789c-403f-aea9-ef7e60de9d1e', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":13,\"quote_no\":\"QN-15042022-0007\",\"upload_at\":\"2022-04-15T13:59:16.667560Z\"}', NULL, '2022-04-15 13:59:16', '2022-04-15 13:59:16');
INSERT INTO `notifications` VALUES ('f73c376d-fc7d-4cd5-acf4-a498ef44467e', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":13,\"quote_no\":\"QN-15042022-0007\",\"upload_at\":\"2022-04-15T13:59:40.142963Z\"}', NULL, '2022-04-15 13:59:40', '2022-04-15 13:59:40');
INSERT INTO `notifications` VALUES ('ff42972a-1b4a-4188-9df1-6831f75d9e2c', 'App\\Notifications\\AdminHasUploadProforma', 'App\\Models\\User', 3, '{\"fcl_id\":23,\"quote_no\":\"QN-22042022-0004\",\"upload_at\":\"2022-04-22T04:13:47.516634Z\"}', NULL, '2022-04-22 04:13:47', '2022-04-22 04:13:47');

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
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint UNSIGNED NOT NULL,
  `tcode` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_view` int NOT NULL DEFAULT 0,
  `can_create` int NOT NULL DEFAULT 0,
  `can_edit` int NOT NULL DEFAULT 0,
  `can_delete` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `roles_team_id_index`(`team_id` ASC) USING BTREE,
  INDEX `roles_tcode_index`(`tcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 2, 'D001', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (2, 2, 'M001', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (3, 2, 'M002', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (4, 2, 'M003', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (5, 2, 'M004', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (6, 2, 'M005', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (7, 2, 'M006', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (8, 2, 'SC01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (9, 2, 'RQ01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (10, 2, 'RQ02', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (11, 2, 'RQ03', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (12, 2, 'RQ04', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (13, 2, 'RQ05', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (14, 2, 'RQ06', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (15, 2, 'RQ07', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (16, 2, 'RQ08', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (17, 2, 'EQ01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (18, 2, 'EQ02', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (19, 2, 'MS01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (20, 2, 'MS02', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (21, 2, 'TX01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (22, 2, 'DD01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (23, 2, 'DD02', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (24, 2, 'DD03', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (25, 2, 'DD04', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (26, 2, 'DD05', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (27, 2, 'IV01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (28, 2, 'OT01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `roles` VALUES (29, 2, 'TU01', 1, 0, 0, 0, '2022-04-14 15:13:51', '2022-04-14 15:13:51');

-- ----------------------------
-- Table structure for selling_prices
-- ----------------------------
DROP TABLE IF EXISTS `selling_prices`;
CREATE TABLE `selling_prices`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quote_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemSevice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` double NOT NULL,
  `unitPrice` double NOT NULL,
  `price` double NOT NULL,
  `condition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of selling_prices
-- ----------------------------

-- ----------------------------
-- Table structure for sequences
-- ----------------------------
DROP TABLE IF EXISTS `sequences`;
CREATE TABLE `sequences`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `prefix` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` bigint UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sequences_prefix_unique`(`prefix` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sequences
-- ----------------------------
INSERT INTO `sequences` VALUES (1, 'QN-14042022-', 1, '2022-04-14 23:15:06', '2022-04-14 23:15:06');
INSERT INTO `sequences` VALUES (2, 'QN-15042022-', 8, '2022-04-15 03:27:54', '2022-04-15 14:26:38');
INSERT INTO `sequences` VALUES (3, 'QN-16042022-', 1, '2022-04-16 02:16:56', '2022-04-16 02:16:56');
INSERT INTO `sequences` VALUES (4, 'QN-18042022-', 1, '2022-04-18 09:25:46', '2022-04-18 09:25:46');
INSERT INTO `sequences` VALUES (5, 'QN-21042022-', 1, '2022-04-21 14:27:29', '2022-04-21 14:27:29');
INSERT INTO `sequences` VALUES (6, 'QN-22042022-', 5, '2022-04-22 02:03:38', '2022-04-22 04:18:05');
INSERT INTO `sequences` VALUES (7, 'QN-25042022-', 1, '2022-04-25 02:32:25', '2022-04-25 02:32:25');
INSERT INTO `sequences` VALUES (8, 'QN-26042022-', 4, '2022-04-26 02:48:34', '2022-04-26 10:19:53');
INSERT INTO `sequences` VALUES (9, 'QN-27042022-', 2, '2022-04-27 02:19:21', '2022-04-27 02:34:36');
INSERT INTO `sequences` VALUES (10, 'QN-28042022-', 4, '2022-04-28 01:29:08', '2022-04-28 04:03:54');
INSERT INTO `sequences` VALUES (11, 'QN-29042022-', 1, '2022-04-29 02:54:19', '2022-04-29 02:54:19');
INSERT INTO `sequences` VALUES (12, 'QN-06052022-', 3, '2022-05-06 10:14:32', '2022-05-06 10:14:34');
INSERT INTO `sequences` VALUES (13, 'QN-09052022-', 3, '2022-05-09 07:47:00', '2022-05-09 10:44:18');

-- ----------------------------
-- Table structure for shippers
-- ----------------------------
DROP TABLE IF EXISTS `shippers`;
CREATE TABLE `shippers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `shipper_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `shippers_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shippers
-- ----------------------------
INSERT INTO `shippers` VALUES (1, 1, 'SITC Indonesia', 'Indonesia', 'Jakarta', 'Jln serayu', 'PT Djarum', '021 4657433', 'mail@emal.om', '-', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `shippers` VALUES (2, 1, 'SOFAST SHL', 'Indonesia', 'Surabaya', 'Jln salakaso', 'Gang Naam', '021 58689493', 'email@mailer.com', '-', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `shippers` VALUES (3, 3, 'Shipper 1', 'Indonesia', 'Jakarta Utara', 'Aaddress', 'PIC Shipper', '081081081081', 'shipper@gmail.com', '-', '2022-04-15 06:04:02', '2022-04-15 06:04:02');

-- ----------------------------
-- Table structure for size_containers
-- ----------------------------
DROP TABLE IF EXISTS `size_containers`;
CREATE TABLE `size_containers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of size_containers
-- ----------------------------
INSERT INTO `size_containers` VALUES (1, '20', '20ft', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `size_containers` VALUES (2, '40', '40ft', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `size_containers` VALUES (3, '45', '45ft', '2022-04-14 15:13:51', '2022-04-14 15:13:51');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 'ADM', 'Admin', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `teams` VALUES (2, 'REG', 'Regular', '2022-04-14 15:13:51', '2022-04-14 15:13:51');

-- ----------------------------
-- Table structure for ticket_replies
-- ----------------------------
DROP TABLE IF EXISTS `ticket_replies`;
CREATE TABLE `ticket_replies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` int NOT NULL COMMENT '1= admin, 2=user, 3=ticket owner',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ticket_replies_ticket_id_index`(`ticket_id` ASC) USING BTREE,
  INDEX `ticket_replies_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket_replies
-- ----------------------------
INSERT INTO `ticket_replies` VALUES (1, 2, 1, 3, 'ftftf', '2022-04-22 02:10:26', '2022-04-22 02:10:26');
INSERT INTO `ticket_replies` VALUES (2, 2, 2, 1, 'Reply 2 3 4', '2022-04-26 14:18:45', '2022-04-26 14:18:45');
INSERT INTO `ticket_replies` VALUES (3, 2, 2, 1, 'dawdwa', '2022-04-26 14:18:51', '2022-04-26 14:18:51');

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticketable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ticketable_id` bigint UNSIGNED NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'usr who create ticket',
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_publish` tinyint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (1, NULL, NULL, 1, 'PEB CENTEX', 'Document PEB dmn?', 'O', NULL, 1, '2022-04-19 04:33:02', '2022-04-19 04:33:02');
INSERT INTO `tickets` VALUES (2, NULL, NULL, 1, 'Please Cancel Quotation', 'ABCD', 'O', 'ticket/Maumt3h7UqMKzjIKwgqdYAdp3InsqfqGD2M9pofI.jpg', 1, '2022-04-22 02:10:14', '2022-04-22 02:10:14');

-- ----------------------------
-- Table structure for trackings
-- ----------------------------
DROP TABLE IF EXISTS `trackings`;
CREATE TABLE `trackings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `trackingable_id` bigint UNSIGNED NOT NULL,
  `trackingable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipment_date` datetime NULL DEFAULT NULL,
  `is_publish` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `trackings_trackingable_id_index`(`trackingable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trackings
-- ----------------------------

-- ----------------------------
-- Table structure for trucks
-- ----------------------------
DROP TABLE IF EXISTS `trucks`;
CREATE TABLE `trucks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `trucks_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trucks
-- ----------------------------

-- ----------------------------
-- Table structure for type_containers
-- ----------------------------
DROP TABLE IF EXISTS `type_containers`;
CREATE TABLE `type_containers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type_containers
-- ----------------------------
INSERT INTO `type_containers` VALUES (1, 'GP', 'General Purpose', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `type_containers` VALUES (2, 'HC', 'High Cube', '2022-04-14 15:13:51', '2022-04-14 15:13:51');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint UNSIGNED NOT NULL DEFAULT 2,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nib` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_legality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `file_npwp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `users_team_id_index`(`team_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 2, 'FMS Testing', NULL, 'fms-testing@gmail.com', NULL, NULL, '$2y$10$3djImBodfReF6PRCPQxh0u7LrHGmn59ewxgHw4f9Djeo5VuTwBefy', 'FMS Testing', NULL, NULL, NULL, NULL, NULL, 'iaJF2byfOn1Y6rHTTBNO3XO2nLntfvDIHMYKEETdqRFTHqKLR39PVOtlqLS2', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `users` VALUES (2, 1, 'FMS Testing', NULL, 'fms-admin@gmail.com', NULL, NULL, '$2y$10$R/i1eydPWL.qhzOlrfEF0.G0v7Pcbpzkf/eLxVcybDtO/xfHXNo8O', 'FMS Testing', NULL, NULL, NULL, NULL, NULL, 'Nfs96eQLJyAeKbuxWpeTyQiFw7wTjoJVyeNFx3dQ1X4XDF1glPogeCGZxp9Q', '2022-04-14 15:13:51', '2022-04-14 15:13:51');
INSERT INTO `users` VALUES (3, 2, 'PT BMJ', NULL, 'pt-bmj@gmail.com', NULL, NULL, '$2y$10$81UuZRZNi235A.c7YzxC1.9RY63HQjtin.a6ownx2CDBGMWgYyD76', 'PIC PT BMJ', NULL, NULL, 'legality/ef5NKELNNlwocQG1TU7bWCpwkIiwag14nm4AjYKQ.jpg', 'npwp/PQy2TojYxhwFESrS8NgynVwYVHjKJMJjvm7Xx0wa.jpg', NULL, 'DioYcr1FKcUndfplfQVqxxYpcuw3y28ZX44caUU0fbF1EyzbaiaYzskdbMPZ', '2022-04-15 05:57:57', '2022-04-15 05:57:57');

SET FOREIGN_KEY_CHECKS = 1;
