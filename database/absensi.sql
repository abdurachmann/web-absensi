/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50725
 Source Host           : localhost:3306
 Source Schema         : absensi

 Target Server Type    : MySQL
 Target Server Version : 50725
 File Encoding         : 65001

 Date: 14/06/2019 20:32:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for infoabsensi
-- ----------------------------
DROP TABLE IF EXISTS `infoabsensi`;
CREATE TABLE `infoabsensi` (
  `tanggal` date NOT NULL,
  `nik` varchar(25) NOT NULL,
  `absenmasuk` time DEFAULT NULL,
  `absenkeluar` time DEFAULT NULL,
  `macaddress` varchar(25) DEFAULT NULL,
  `latitude` varchar(250) DEFAULT NULL,
  `longitude` varchar(250) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`tanggal`,`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of infoabsensi
-- ----------------------------
BEGIN;
INSERT INTO `infoabsensi` VALUES ('2019-06-14', 'P0001', '08:00:00', NULL, 'd7:66:37:d8:92', '1.928738792', '9.7637783983', '-', '1');
COMMIT;

-- ----------------------------
-- Table structure for mpegawai
-- ----------------------------
DROP TABLE IF EXISTS `mpegawai`;
CREATE TABLE `mpegawai` (
  `nik` varchar(25) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text,
  `password` varchar(25) DEFAULT NULL,
  `macaddress` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mpegawai
-- ----------------------------
BEGIN;
INSERT INTO `mpegawai` VALUES ('P0001', 'Budi', 'Jl. Samudra', '2019-06-14', '28:28:s8:92:2o', '1');
INSERT INTO `mpegawai` VALUES ('P0002', 'Rangga', 'Jl. Cikutra', '2019-06-10', '9f:7d:9h:24:56', '1');
COMMIT;

-- ----------------------------
-- Table structure for mperusahaan
-- ----------------------------
DROP TABLE IF EXISTS `mperusahaan`;
CREATE TABLE `mperusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text,
  `latitude` varchar(250) DEFAULT NULL,
  `longitude` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mperusahaan
-- ----------------------------
BEGIN;
INSERT INTO `mperusahaan` VALUES (0, 'PT DINUS CIPTA MANDIRI', 'Jl. Holis, Caringin, Bandung Kulon, Kota Bandung, Jawa Barat, Indonesia', '-6.932276371608801', '107.57246031481941');
COMMIT;

-- ----------------------------
-- Table structure for muser
-- ----------------------------
DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) DEFAULT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of muser
-- ----------------------------
BEGIN;
INSERT INTO `muser` VALUES (1, NULL, 'Gunali Rezqi Mauludi', 'gunalirezqi', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `muser` VALUES (2, NULL, 'Abdu R Ruchendar', 'abdu', 'e10adc3949ba59abbe56e057f20f883e', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
