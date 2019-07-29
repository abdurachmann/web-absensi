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

 Date: 29/07/2019 07:48:34
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
  `keteranganmasuk` varchar(150) DEFAULT NULL,
  `keterangankeluar` varchar(150) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`tanggal`,`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of infoabsensi
-- ----------------------------
BEGIN;
INSERT INTO `infoabsensi` VALUES ('2019-07-18', 'P0001', '06:35:33', '16:48:30', '00:00:00:00:00:00', '-6.90779940225184', '107.74408643133938', '-', '-', '1');
INSERT INTO `infoabsensi` VALUES ('2019-07-19', 'P0001', '07:48:19', '13:37:09', '00:00:00:00:00:00', '-6.90779940225184', '107.74408643133938', '-', 'Pulang Cepat', '1');
INSERT INTO `infoabsensi` VALUES ('2019-07-23', 'P0002', '08:15:42', '17:15:46', NULL, NULL, NULL, NULL, NULL, '1');
COMMIT;

-- ----------------------------
-- Table structure for mpegawai
-- ----------------------------
DROP TABLE IF EXISTS `mpegawai`;
CREATE TABLE `mpegawai` (
  `nik` varchar(25) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text,
  `tanggallahir` date DEFAULT NULL,
  `jabatan` enum('Sopir','Helper','Satpam','Ka.Gudang','Finance','Adm','Adm Sales','RSM','ASM','HRD') DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `macaddress` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mpegawai
-- ----------------------------
BEGIN;
INSERT INTO `mpegawai` VALUES ('P0001', 'Budi', 'Jl. Samudra', '2019-06-16', 'Adm', 'e10adc3949ba59abbe56e057f20f883e', '28:28:s8:92:2o', '1');
INSERT INTO `mpegawai` VALUES ('P0002', 'Rangga', 'Jl. Cikutra', '2019-06-03', 'HRD', 'e10adc3949ba59abbe56e057f20f883e', '9f:7d:9h:24:56', '1');
INSERT INTO `mpegawai` VALUES ('P0003', 'Hilman', 'Jl. Sadang Serang', '2019-07-29', 'Satpam', 'e10adc3949ba59abbe56e057f20f883e', '3z:1o:1h:82:11', '1');
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
INSERT INTO `mperusahaan` VALUES (0, 'PT DINUS CIPTA MANDIRI', 'Jl. Holis, Caringin, Bandung Kulon, Kota Bandung, Jawa Barat, Indonesia', '-6.907805353403091', '107.74406279437244');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
