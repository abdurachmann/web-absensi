/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : absensi

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 28/04/2019 21:25:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for infoabsensi
-- ----------------------------
DROP TABLE IF EXISTS `infoabsensi`;
CREATE TABLE `infoabsensi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `idpegawai` int(11) NULL DEFAULT NULL,
  `absenmasuk` time(0) NULL DEFAULT NULL,
  `absenkeluar` time(0) NULL DEFAULT NULL,
  `macaddress` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `latitude` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of infoabsensi
-- ----------------------------
INSERT INTO `infoabsensi` VALUES (1, '2019-04-28', 1, '20:40:05', '20:40:10', '28:28:s8:92:2o', '24.9384739848394', '-934.83849834', 'Terlambat', '1');
INSERT INTO `infoabsensi` VALUES (2, '2019-04-28', 2, '20:40:08', '20:40:12', '9f:7d:9h:24:56', '24.9384739848394', '-934.83849834', 'Tepat Waktu', '1');

-- ----------------------------
-- Table structure for mpegawai
-- ----------------------------
DROP TABLE IF EXISTS `mpegawai`;
CREATE TABLE `mpegawai`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `macaddress` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mpegawai
-- ----------------------------
INSERT INTO `mpegawai` VALUES (1, 'P0001', 'Budi', 'Jl. Samudra', '28:28:s8:92:2o', 'budi', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `mpegawai` VALUES (2, 'P0002', 'Rangga', 'Jl. Cikutra', '9f:7d:9h:24:56', 'rangga', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- ----------------------------
-- Table structure for mperusahaan
-- ----------------------------
DROP TABLE IF EXISTS `mperusahaan`;
CREATE TABLE `mperusahaan`  (
  `id` int(11) NOT NULL,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `latitude` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mperusahaan
-- ----------------------------
INSERT INTO `mperusahaan` VALUES (0, 'PT DINUS CIPTA MANDIRI', 'Jl. Holis, Caringin, Bandung Kulon, Kota Bandung, Jawa Barat, Indonesia', '-6.932276371608801', '107.57246031481941');

-- ----------------------------
-- Table structure for muser
-- ----------------------------
DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of muser
-- ----------------------------
INSERT INTO `muser` VALUES (1, NULL, 'Gunali Rezqi Mauludi', 'gunalirezqi', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `muser` VALUES (2, NULL, 'Abdu R Ruchendar', 'abdu', 'e10adc3949ba59abbe56e057f20f883e', '1');

SET FOREIGN_KEY_CHECKS = 1;
