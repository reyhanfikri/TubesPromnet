/*
 Navicat Premium Data Transfer

 Source Server         : MysqlKonek
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : db_bengkel_v2

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 26/06/2018 10:35:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_detail_trans_part
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_trans_part`;
CREATE TABLE `t_detail_trans_part`  (
  `id_detail_trans_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans_part` int(11) NOT NULL,
  `id_part_jasa` int(11) NOT NULL,
  `jumlah_part` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_trans_part`) USING BTREE,
  INDEX `fkdtp1`(`id_trans_part`) USING BTREE,
  INDEX `fkdtp2`(`id_part_jasa`) USING BTREE,
  CONSTRAINT `fkdtp1` FOREIGN KEY (`id_trans_part`) REFERENCES `t_trans_part` (`id_trans_part`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fkdtp2` FOREIGN KEY (`id_part_jasa`) REFERENCES `t_part_jasa` (`id_part_jasa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_detail_trans_service
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_trans_service`;
CREATE TABLE `t_detail_trans_service`  (
  `id_detail_trans_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans_service` int(11) NOT NULL,
  `id_part_jasa` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_trans_service`) USING BTREE,
  INDEX `fkdts1`(`id_trans_service`) USING BTREE,
  INDEX `fkdts2`(`id_part_jasa`) USING BTREE,
  CONSTRAINT `fkdts1` FOREIGN KEY (`id_trans_service`) REFERENCES `t_trans_service` (`id_trans_service`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fkdts2` FOREIGN KEY (`id_part_jasa`) REFERENCES `t_part_jasa` (`id_part_jasa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_detail_trans_service
-- ----------------------------
INSERT INTO `t_detail_trans_service` VALUES (1, 1, 1002, 1, 899000);
INSERT INTO `t_detail_trans_service` VALUES (2, 1, 314, 5, 12000);

-- ----------------------------
-- Table structure for t_mekanik
-- ----------------------------
DROP TABLE IF EXISTS `t_mekanik`;
CREATE TABLE `t_mekanik`  (
  `id_mekanik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mekanik` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_mekanik` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_telepon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_mekanik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_mekanik
-- ----------------------------
INSERT INTO `t_mekanik` VALUES (1, 'Budi Budianto', 'Geger Kalong', '085111222123');

-- ----------------------------
-- Table structure for t_part_jasa
-- ----------------------------
DROP TABLE IF EXISTS `t_part_jasa`;
CREATE TABLE `t_part_jasa`  (
  `id_part_jasa` int(11) NOT NULL AUTO_INCREMENT,
  `no_part_jasa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_part_jasa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_jual_part_jasa` int(11) NOT NULL,
  `harga_beli_part` int(11) NULL DEFAULT NULL,
  `stok_part` int(11) NULL DEFAULT NULL,
  `tipe` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_part_jasa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1007 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_part_jasa
-- ----------------------------
INSERT INTO `t_part_jasa` VALUES (1, 'SP000001', 'BATTERY CHARGER MF', 1200000, 1080000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (2, 'SP000002', 'HOLDER,NEEDLE JET', 83000, 74700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (3, 'SP000003', 'PIPE,RR', 1126000, 1013400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (4, 'SP000004', 'SCREW PAN 6X12', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (5, 'SP000005', 'STAY RADIATOR LOWER', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (6, 'SP000006', 'BOLT ADAPTOR', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (7, 'SP000007', '88120KTM000FMB', 45000, 40500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (8, 'SP000008', 'STRIPE RED L', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (9, 'SP000009', 'SPG,DRUM STOPPER', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (10, 'SP000010', 'CYLDR.SB.AS.FR.BK.MT', 853500, 768150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (11, 'SP000011', 'BOLT,STUD CYLN', 24100, 21690, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (12, 'SP000012', 'RING SET (0.25)', 238000, 214200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (13, 'SP000013', 'HEAD CYLINDER ASSY', 490000, 441000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (14, 'SP000014', 'MUDGUARD RR', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (15, 'SP000015', 'SEAL, GASKET', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (16, 'SP000016', 'BOLT FLANGE 8X28', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (17, 'SP000017', 'SWITCH,LIGHT', 1005000, 904500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (18, 'SP000018', 'SOCKET HEADLIGHT ASSY', 48000, 43200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (19, 'SP000019', 'HEADLIGHT ASSY', 165000, 148500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (20, 'SP000020', '53205KPH730FMB', 72300, 65070, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (21, 'SP000021', 'CABLE,FR BRAKE', 18400, 16560, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (22, 'SP000022', 'COVER L RR ASSY', 57500, 51750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (23, 'SP000023', 'HOLDER,L STEP', 139000, 125100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (24, 'SP000024', 'SWINGARM RR ASSY', 370000, 333000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (25, 'SP000025', 'WASHER SCREEN SET', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (26, 'SP000026', 'TUBE,DRAIN', 9000, 8100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (27, 'SP000027', 'FRAME BODY COMP(SH SL MT)', 4767000, 4290300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (28, 'SP000028', 'CASE  L FR BOTTOM', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (29, 'SP000029', 'CAP L. COVER', 9500, 8550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (30, 'SP000030', 'PAD SPRING', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (31, 'SP000031', 'CAP,RR GRIP', 800, 720, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (32, 'SP000032', 'FLNG.CM.FINAL', 415000, 373500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (33, 'SP000033', 'COVER UNDER R SD(BLK)', 117000, 105300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (34, 'SP000034', 'HORN COMP,R', 600000, 540000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (35, 'SP000035', 'FENDER A FR(IL SV MT)', 124000, 111600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (36, 'SP000036', 'T SHIRT BEAT BIRU HIJAU', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (37, 'SP000037', 'BAJU PEML WNT A (L)', 150000, 135000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (38, 'SP000038', 'OFFSET WR', 3800, 3420, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (39, 'SP000039', 'PISTON KIT (0.25)', 130000, 117000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (40, 'SP000040', 'SCREW,TAPPING,5X8', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (41, 'SP000041', 'BOSS,DRIVE FACE', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (42, 'SP000042', 'BAR COMP STEP', 80000, 72000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (43, 'SP000043', 'FENDER FR(WITHOUT PNT)', 113000, 101700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (44, 'SP000044', 'HOSE WATER ASSY', 26000, 23400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (45, 'SP000045', '1136AKWB920', 15200, 13680, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (46, 'SP000046', 'CHAIN,DRIVE (RK)', 1004100, 903690, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (47, 'SP000047', '28110KGH910', 90500, 81450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (48, 'SP000048', 'COVER L BODY(CN SC RD)', 249000, 224100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (49, 'SP000049', '34901KFVB51', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (50, 'SP000050', 'COVER R BODY(WITHOUT PNT)', 68000, 61200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (51, 'SP000051', '22630GB2001', 130800, 117720, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (52, 'SP000052', 'STAY COMP,IGN.COIL', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (53, 'SP000053', 'PIN CRANK', 172900, 155610, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (54, 'SP000054', 'COVER  FR TOP (DL BL MT)', 74000, 66600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (55, 'SP000055', 'FUEL UNIT', 453000, 407700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (56, 'SP000056', 'BASE COMP', 75000, 67500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (57, 'SP000057', 'MOTOR ASSY,FAN', 534000, 480600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (58, 'SP000058', 'PLATE COMP,SHIFT DRM STOP', 71900, 64710, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (59, 'SP000059', 'COVER SEAT', 72000, 64800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (60, 'SP000060', 'SHIELD,R LEG(STR SL MET)', 173000, 155700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (61, 'SP000061', 'COWL UNDER(CN SC RD)', 109000, 98100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (62, 'SP000062', 'BOLT,FLANGE 6X24', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (63, 'SP000063', 'HOUSING UN.THROTTLE', 35100, 31590, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (64, 'SP000064', '90485040001', 10200, 9180, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (65, 'SP000065', '37750KPH701', 62000, 55800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (66, 'SP000066', 'RECEIVER,CLUTCH', 25900, 23310, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (67, 'SP000067', '13105KWN903', 203000, 182700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (68, 'SP000068', 'COVER,L SIDE', 295000, 265500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (69, 'SP000069', 'GASKET KIT A', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (70, 'SP000070', 'COWL,L SIDE INNER', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (71, 'SP000071', 'WEIGHT A STRG HDL', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (72, 'SP000072', 'SEAT,DOUBLE', 442900, 398610, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (73, 'SP000073', 'COVER R M/P(PRL BRL ORG)', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (74, 'SP000074', 'MUFF,PROTEC(SP BL MT)', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (75, 'SP000075', 'PACKING,PROTECTOR', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (76, 'SP000076', 'PLATE COMP DRIVE', 128500, 115650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (77, 'SP000077', 'TOOL SET', 72000, 64800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (78, 'SP000078', 'SET ILLUST,REAR COV T-1', 92300, 83070, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (79, 'SP000079', 'WASHER,TONGUED', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (80, 'SP000080', 'HORN COMP', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (81, 'SP000081', 'COVER L BODY(CN SC MT)', 227000, 204300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (82, 'SP000082', 'CASE R FR BOTTOM', 140000, 126000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (83, 'SP000083', 'SWING ARM SET', 754200, 678780, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (84, 'SP000084', '871X0KEV640ZD', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (85, 'SP000085', 'TIRE, FR (2.50-18 SU261)', 143000, 128700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (86, 'SP000086', 'STRIPE SILVER BLACK L & R', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (87, 'SP000087', 'BOLT,FLANGE 6X16', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (88, 'SP000088', 'THROTTLE BODY ASSY', 421500, 379350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (89, 'SP000089', 'FENDER FR(PL FD WH)', 183000, 164700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (90, 'SP000090', 'WEIGHT ASS STRHDL(Y)', 18300, 16470, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (91, 'SP000091', 'PLATE 200 X 200 X 20', 742500, 668250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (92, 'SP000092', 'SPRING, STOP SWITCH', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (93, 'SP000093', 'STRIPE BLACK BLUE  L & R', 62000, 55800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (94, 'SP000094', 'PISTON  (0.75)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (95, 'SP000095', 'JET,SLOW 38', 76000, 68400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (96, 'SP000096', 'DISK CLUTCH FRICTION', 53000, 47700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (97, 'SP000097', 'CIRCLIP, INTERNAL, 40MM', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (98, 'SP000098', 'MUFFLER ASSY EXH', 245000, 220500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (99, 'SP000099', 'EMBLEM SET HONDA', 82000, 73800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (100, 'SP000100', 'RR GRIP ACCESORIES', 98000, 88200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (101, 'SP000101', 'BATTERY GTZ5S GS', 224000, 201600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (102, 'SP000102', '15100-KG2-010', 718100, 646290, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (103, 'SP000103', 'PISTON  (0.50)', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (104, 'SP000104', 'BOLT,FLANGE 6X16', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (105, 'SP000105', 'OILSL,12X18X5', 36000, 32400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (106, 'SP000106', 'RUBBER,HORN', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (107, 'SP000107', 'CASE BATTERY', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (108, 'SP000108', 'KEY SEAT LOCK', 55000, 49500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (109, 'SP000109', 'WASHER SEALING', 14200, 12780, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (110, 'SP000110', 'SPROCKET CAM', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (111, 'SP000111', 'CHAMBER SET, FLOAT', 535000, 481500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (112, 'SP000112', 'MOTOR ASSY START', 330000, 297000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (113, 'SP000113', 'HORN COMP (LOW)', 38000, 34200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (114, 'SP000114', 'SWINGARM SUB ASSY,RR', 1535000, 1381500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (115, 'SP000115', 'WINKER ASSY', 31000, 27900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (116, 'SP000116', 'KEY SET', 1902800, 1712520, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (117, 'SP000117', 'FENDER FR(PL FD WH)', 142000, 127800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (118, 'SP000118', 'PUMP ASSY,OIL', 870000, 783000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (119, 'SP000119', 'AC GENERATOR ASSY', 416500, 374850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (120, 'SP000120', 'BALANCER,WHEEL', 34500, 31050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (121, 'SP000121', 'STAY SET FR TOP COVER', 34500, 31050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (122, 'SP000122', 'MUFFLER ASSY EXH', 1430000, 1287000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (123, 'SP000123', 'STRIPE BLACK RED L & R', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (124, 'SP000124', 'SHROUD,R.RADIATORR263', 236100, 212490, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (125, 'SP000125', 'CABLE COMP B,THRO', 38000, 34200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (126, 'SP000126', 'BOX ASSY LUGGAGE', 70500, 63450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (127, 'SP000127', 'ST ILL CVR RR PR HIM WH', 176000, 158400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (128, 'SP000128', 'COVER R BODY(NI OR)', 187000, 168300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (129, 'SP000129', 'RING SET (0.25)', 337000, 303300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (130, 'SP000130', 'OUTER COMP CLUTCH', 200000, 180000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (131, 'SP000131', 'SWINGARM ASSY REAR SET', 500000, 450000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (132, 'SP000132', 'LIGHT ASSY HEAD', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (133, 'SP000133', 'CABLE COMP A THROT', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (134, 'SP000134', 'ARM,FRONT BRAKE', 73900, 66510, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (135, 'SP000135', 'SHIM,TAPPET (1.700)', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (136, 'SP000136', 'CABLE COMP B THROT', 23000, 20700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (137, 'SP000137', 'OIL PUMP ASSY', 36500, 32850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (138, 'SP000138', 'FENDER FR(PL TW BL)', 275000, 247500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (139, 'SP000139', 'SHIELD R LEG(SH PRL BLUE)', 173000, 155700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (140, 'SP000140', 'COVER,RUBBER', 19000, 17100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (141, 'SP000141', 'CORD COMP.,L FR.W', 43000, 38700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (142, 'SP000142', 'CASE L FR BOTTOM', 142000, 127800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (143, 'SP000143', 'RING SET (STD)', 281000, 252900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (144, 'SP000144', 'SHIELD R LEG(PRL FD WH)', 167000, 150300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (145, 'SP000145', '16100KEG900', 1330980, 1197882, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (146, 'SP000146', 'OIL SEAL,12X18X4', 33500, 30150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (147, 'SP000147', 'CYLINDER COMP', 325000, 292500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (148, 'SP000148', 'BOLT,FLANGE 8X95', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (149, 'SP000149', 'STRIPE BLUE BLACK L', 65000, 58500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (150, 'SP000150', 'RUBBER MUFFLER MOUNT', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (151, 'SP000151', 'BUSH,RUBBER', 3900, 3510, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (152, 'SP000152', 'BRKT,FR MAIN', 48000, 43200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (153, 'SP000153', 'CUSHION ASSY RR', 189000, 170100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (154, 'SP000154', '91252030003', 10500, 9450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (155, 'SP000155', 'THROTTLE BODY ASSY', 889000, 800100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (156, 'SP000156', 'FORK ASSY R FR', 308000, 277200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (157, 'SP000157', 'GARNISH L HDL(WN RD)', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (158, 'SP000158', 'SEAT COMP DOUBLE', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (159, 'SP000159', 'STRIPE GREY SILVER L', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (160, 'SP000160', 'CASE,BATTERY', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (161, 'SP000161', 'RUBBER, MOUNTING', 66500, 59850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (162, 'SP000162', 'GEAR,M SHAFT 5TH', 420000, 378000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (163, 'SP000163', 'COVER FR TOP (CRBLU)', 91000, 81900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (164, 'SP000164', 'RING SET (0.75)', 368000, 331200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (165, 'SP000165', 'COVER SPDMTR(PL FD WH)R', 42000, 37800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (166, 'SP000166', 'COVER HDL TOP(DG SL MT)', 82000, 73800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (167, 'SP000167', 'WASHER 18.2X45X1.0', 18000, 16200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (168, 'SP000168', 'RUBBER,MOUNTING', 22000, 19800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (169, 'SP000169', 'PISTON  (0.50)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (170, 'SP000170', 'PLATE SKID', 17500, 15750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (171, 'SP000171', 'BOLT FLANGE 6X20', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (172, 'SP000172', 'CONTACT,NEUTRAL', 55000, 49500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (173, 'SP000173', 'WHEEL SET, RR.BLACK', 2587000, 2328300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (174, 'SP000174', '32411253000', 8500, 7650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (175, 'SP000175', 'HOSE,RR M/C', 28000, 25200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (176, 'SP000176', 'PLATE BEARING HOLD', 8500, 7650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (177, 'SP000177', 'STAY FR.FENDER', 30500, 27450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (178, 'SP000178', 'CLAMPER,F/FEED', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (179, 'SP000179', 'WASHER 14 MM', 29000, 26100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (180, 'SP000180', 'BAR COMP,SIDE STAND', 83000, 74700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (181, 'SP000181', 'COVER SEAT /1', 90000, 81000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (182, 'SP000182', 'SPRING,FR FORK', 56000, 50400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (183, 'SP000183', 'PAD B', 278500, 250650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (184, 'SP000184', 'DUST SEAL FR FORK', 19500, 17550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (185, 'SP000185', 'STR.B,R.LOW.CWL.T2', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (186, 'SP000186', 'STRIPE POWDER BLACK L & R', 245000, 220500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (187, 'SP000187', 'FENDER RR ASSY(A)', 94000, 84600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (188, 'SP000188', 'ARM RR BRK STPR', 15500, 13950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (189, 'SP000189', 'O RING 13.8 X 2.5', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (190, 'SP000190', 'COIL,IGNITION', 576400, 518760, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (191, 'SP000191', 'COVER INNER(TI BE MT)', 525000, 472500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (192, 'SP000192', 'COVER L BODY(WITHOUT PNT)', 106000, 95400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (193, 'SP000193', 'COVER COMP,CYLINDER HEAD', 168000, 151200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (194, 'SP000194', 'COVER R BODY(BLK)', 275000, 247500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (195, 'SP000195', 'COVER R BODY(CN SC RD)', 269000, 242100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (196, 'SP000196', 'COVER ASSY HDL RR', 23000, 20700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (197, 'SP000197', 'SUB HARNESS SPEEDOMETER', 178500, 160650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (198, 'SP000198', 'CAST,FR WH(MAT AXGRY-A)', 657000, 591300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (199, 'SP000199', 'STRIPE RED BLACK R', 110000, 99000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (200, 'SP000200', 'CUSHION,SIDE COVR', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (201, 'SP000201', 'STRIPE SILVER BLACK L & R', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (202, 'SP000202', 'COVER,FR(PRL FD WHT)', 105000, 94500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (203, 'SP000203', 'PISTON  (0.50)', 62000, 55800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (204, 'SP000204', 'SOCKET COMP HEADLIGHT', 18000, 16200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (205, 'SP000205', 'HOSE,WATER', 42000, 37800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (206, 'SP000206', 'BRACKET,L BRAKE LEVER', 198000, 178200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (207, 'SP000207', 'SLIDER, CHAIN', 39000, 35100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (208, 'SP000208', 'CASE COMP THERMOSTAT', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (209, 'SP000209', 'M.TONE MIRROR POLISH', 415000, 373500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (210, 'SP000210', 'ELEMENT ASV A/C', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (211, 'SP000211', 'Mr. HGP Shirt, MEDIUM', 111000, 99900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (212, 'SP000212', 'SPEEDOMETER ASSY', 452000, 406800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (213, 'SP000213', 'PISTON  (1.00)', 138500, 124650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (214, 'SP000214', 'COWL L FR SD(VO SL MT)', 49000, 44100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (215, 'SP000215', 'SLIDER CHAIN', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (216, 'SP000216', 'CLIP,WIRE HARNESS', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (217, 'SP000217', 'MIRROR ASSY L BACK', 26000, 23400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (218, 'SP000218', 'NUT HEX 8MM', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (219, 'SP000219', 'CASE,AIR CLN HALF', 12700, 11430, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (220, 'SP000220', 'HARNESS,INSPECTION', 418000, 376200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (221, 'SP000221', 'PLATE,DIAPHRAGM', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (222, 'SP000222', 'SHIELD L LEG(BLK)', 141000, 126900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (223, 'SP000223', 'GROMMET HEADLIGHT', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (224, 'SP000224', 'MARK, L. FUEL TANK TYPE2', 13400, 12060, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (225, 'SP000225', 'STRIPE ARCTIC WHITE L & R', 195000, 175500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (226, 'SP000226', 'BOLT SPECIAL,6X16', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (227, 'SP000227', '24630KPH901', 174800, 157320, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (228, 'SP000228', 'FENDER FR.(VD BL MT)', 181000, 162900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (229, 'SP000229', '2430AKFM900', 181100, 162990, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (230, 'SP000230', 'BASE COMP., RR.', 50200, 45180, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (231, 'SP000231', 'PLATE CLUTCH SIDE', 28000, 25200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (232, 'SP000232', 'SWITCH ASSY RR STOP', 54000, 48600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (233, 'SP000233', 'FRAME BODY', 1070000, 963000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (234, 'SP000234', '90701KFM900', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (235, 'SP000235', 'BOLT STUD 8X40', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (236, 'SP000236', 'FENDER A FR(WITHOUT PNT)', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (237, 'SP000237', 'Green Blink', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (238, 'SP000238', 'SPRING FR FORK', 14000, 12600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (239, 'SP000239', 'BEARING BALL 6302RS', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (240, 'SP000240', 'BOLT.HEX,CAP 8X8', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (241, 'SP000241', 'BASE COMP TAILLIGHT', 95000, 85500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (242, 'SP000242', 'LEVER COMP.,CLUTC', 217000, 195300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (243, 'SP000243', 'BOX ASSY LUGGAGE', 68500, 61650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (244, 'SP000244', 'STRIPE LASER RED R', 130000, 117000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (245, 'SP000245', 'Sunset Orange (U/C)', 250000, 225000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (246, 'SP000246', 'REMOVER,SHAFT,BRG.', 76000, 68400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (247, 'SP000247', 'PIPE,R STRG HANDL', 327200, 294480, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (248, 'SP000248', 'BOOT HEADLIGHT', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (249, 'SP000249', 'COVER COMP L RR', 43000, 38700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (250, 'SP000250', 'SPRING,VALVE IN', 28000, 25200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (251, 'SP000251', 'COVER FR(WITHOUT PNT)', 87000, 78300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (252, 'SP000252', 'UNIT COMP PGM-FI/IGN', 690000, 621000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (253, 'SP000253', 'BOLT FLANGE 6X30', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (254, 'SP000254', 'SCREW TAPPING 5X25', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (255, 'SP000255', 'STRIPE BLACK YELLOW L & R', 190000, 171000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (256, 'SP000256', 'PIPE COMP STRG HANDLE', 127000, 114300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (257, 'SP000257', 'SPRING BRAKE ROD', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (258, 'SP000258', 'M.TONE RED BROWN', 210000, 189000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (259, 'SP000259', 'ARM SET,PUMP', 465000, 418500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (260, 'SP000260', 'PEDAL COMP., BRAKE', 82700, 74430, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (261, 'SP000261', 'SHAFT GEAR SHIFT FORK', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (262, 'SP000262', 'FUEL TANK', 291000, 261900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (263, 'SP000263', 'ELEMENT COMP., AIR CLEANER', 45000, 40500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (264, 'SP000264', 'LENS L.FR.WINKER', 55000, 49500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (265, 'SP000265', 'CAP MIRROR STAY', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (266, 'SP000266', 'CASE,FUSE', 205000, 184500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (267, 'SP000267', 'PISTON (0.50)', 443000, 398700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (268, 'SP000268', 'BRAKE SHOE (NA)', 58500, 52650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (269, 'SP000269', 'SENSOR ASSY,BANK ANGLE', 83000, 74700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (270, 'SP000270', 'ARM COMP, CAM CHN TNS', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (271, 'SP000271', 'O-RING,8X1.7', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (272, 'SP000272', 'VALVE,THROTTLE', 465000, 418500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (273, 'SP000273', 'FILTER SET', 183000, 164700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (274, 'SP000274', 'BRACKET FR CALIPR', 149000, 134100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (275, 'SP000275', 'RUBBER STEP', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (276, 'SP000276', 'BOLT SWINGARM PIVOT', 22500, 20250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (277, 'SP000277', 'COWL RR L', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (278, 'SP000278', '91101GB2001', 11200, 10080, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (279, 'SP000279', 'FUSE 15A', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (280, 'SP000280', 'PLATE FRAME', 28000, 25200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (281, 'SP000281', 'BOLTBREAK OFF', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (282, 'SP000282', 'RIM,RR.WHEEL', 208400, 187560, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (283, 'SP000283', '14546KPP901', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (284, 'SP000284', 'CAP ACG', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (285, 'SP000285', 'WASHER,PLAIN 8MM', 2700, 2430, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (286, 'SP000286', 'RING,PISTON', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (287, 'SP000287', 'KEY SEAT LOCK', 375000, 337500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (288, 'SP000288', 'SW.ASSY START', 397000, 357300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (289, 'SP000289', 'COVER CENTER', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (290, 'SP000290', 'SCREW TAPPING 5X12', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (291, 'SP000291', 'WASHER 8.5X26X2.3', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (292, 'SP000292', 'BOLT, SOCKET, 4X21', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (293, 'SP000293', 'CONTACT ASSY NEUTRAL SW', 64000, 57600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (294, 'SP000294', 'DISK FR BRAKE', 180000, 162000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (295, 'SP000295', 'STATOR COMP', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (296, 'SP000296', 'BEARING,BALL', 24000, 21600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (297, 'SP000297', 'GASKET,CYLINDER', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (298, 'SP000298', 'RUBBER,P.STEP', 27800, 25020, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (299, 'SP000299', 'BOLT WASHER 6X16', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (300, 'SP000300', 'MUFFLER COMP, EXHAUST', 300000, 270000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (301, 'SP000301', 'COVER SEAT', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (302, 'SP000302', '6431AKTM850', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (303, 'SP000303', 'FENDER FR (CN SC RD)', 209000, 188100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (304, 'SP000304', 'SETTING SET(TIGER)', 75000, 67500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (305, 'SP000305', 'CLAMPER OVER FLOW', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (306, 'SP000306', 'COWL RR CNTR (BLK)', 44000, 39600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (307, 'SP000307', 'CLAMPER B BRK HOSE', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (308, 'SP000308', 'SLEEVE, RR. WHEEL', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (309, 'SP000309', 'STAY AICV', 7500, 6750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (310, 'SP000310', 'ROD,CLUTCH LIFTER', 25100, 22590, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (311, 'SP000311', 'LIGHT ASSY RR COMB', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (312, 'SP000312', 'COVER R M/P SD(PL FD WH)', 299000, 269100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (313, 'SP000313', 'SHAFT EX ROCKER ARM', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (314, 'SP000314', 'PIN,KNOCK,8X140', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (315, 'SP000315', 'CRANK CASE COMP,R', 2670000, 2403000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (316, 'SP000316', 'BEARING,RADIAL', 95000, 85500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (317, 'SP000317', 'COLLAR FR FENDER', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (318, 'SP000318', 'COVER HDL FR(BLK)', 75000, 67500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (319, 'SP000319', 'Starlight Silver', 1000000, 900000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (320, 'SP000320', 'GEAR,PRIMARY DRIVEN', 86500, 77850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (321, 'SP000321', 'COWL L RR(CN PM RD)', 164000, 147600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (322, 'SP000322', 'SPRING, CLUTCH LEVER', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (323, 'SP000323', 'STEM COMP,STRG', 836900, 753210, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (324, 'SP000324', 'TUBE,VINYL 11X1M', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (325, 'SP000325', 'VALVE SET', 53500, 48150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (326, 'SP000326', 'BOLT,FR TOPCOVER', 19000, 17100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (327, 'SP000327', 'FORK ASSY L FR (SLV)', 283000, 254700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (328, 'SP000328', 'KIT, CTR CVR GAR WHI', 66000, 59400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (329, 'SP000329', 'TIRE, RR (140/70-17 T/L)', 620000, 558000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (330, 'SP000330', 'ARM ASSY IN VALVE ROCKER', 110000, 99000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (331, 'SP000331', 'NUT,RR AXLE 14MM', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (332, 'SP000332', 'PISTON', 208000, 187200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (333, 'SP000333', 'HARNESS WIRE', 580000, 522000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (334, 'SP000334', 'TUBE, BREATHER', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (335, 'SP000335', 'COVER FR TOP(BK)', 143000, 128700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (336, 'SP000336', 'SHIM,TAPPET (1.425)', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (337, 'SP000337', 'PLT.ASSY REFCT.', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (338, 'SP000338', 'ARM AS.KICK S.', 777100, 699390, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (339, 'SP000339', 'MARK CBR250R', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (340, 'SP000340', 'MARK HECS.', 2800, 2520, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (341, 'SP000341', 'PANEL,FR BRAKE /5', 257000, 231300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (342, 'SP000342', 'WASHER SEAT LOCK', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (343, 'SP000343', 'REGULATOR REC COMP', 385000, 346500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (344, 'SP000344', 'COVER RR B(ARED)', 22000, 19800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (345, 'SP000345', 'PIN MAIN STEP BAR JOINT', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (346, 'SP000346', '1860AKEH600', 10500, 9450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (347, 'SP000347', 'SEAL, INNER COVER', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (348, 'SP000348', 'COVER L BODY (MA AX GY)', 157000, 141300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (349, 'SP000349', 'BOLT,FL SH 6X22.3', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (350, 'SP000350', 'GEAR,M-3/M-4', 637000, 573300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (351, 'SP000351', 'NUT,SPEED 3MM', 13500, 12150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (352, 'SP000352', 'NUT,FLANGE 10MM', 7400, 6660, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (353, 'SP000353', '*BIT LONG NO 2', 1100, 990, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (354, 'SP000354', 'COVER L BODY (BLK)', 219000, 197100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (355, 'SP000355', '9500202071', 2900, 2610, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (356, 'SP000356', 'COVER,BACK REST', 29000, 26100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (357, 'SP000357', 'STRIPE SILVER BLUE L', 110000, 99000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (358, 'SP000358', 'SET ILLUST,R RDTR SHR.T-2', 249900, 224910, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (359, 'SP000359', 'GEAR COMP,START', 449000, 404100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (360, 'SP000360', 'COVER METER B(MT BK)', 67000, 60300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (361, 'SP000361', 'O2 SENSOR WRENCH', 80000, 72000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (362, 'SP000362', 'SPACY POLO SHIRT RED W-M', 80000, 72000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (363, 'SP000363', 'RELAY START ASSY', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (364, 'SP000364', 'STRP D, R.LWR COWL LID (3', 19300, 17370, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (365, 'SP000365', 'BODY, OIL PUMP', 40300, 36270, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (366, 'SP000366', 'PLUG BEARING PUSH', 5500, 4950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (367, 'SP000367', 'SHIELD SET LEG(SLV)', 251000, 225900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (368, 'SP000368', 'CAST, WHEEL FR (RO WH)', 500000, 450000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (369, 'SP000369', 'RUBBER A RR FENDER', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (370, 'SP000370', 'PLATE SET', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (371, 'SP000371', 'WRENCH, PLUG 16', 7500, 6750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (372, 'SP000372', 'SCREW, PAN, 5X32', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (373, 'SP000373', 'FENDER FR(SL BL MT)', 193000, 173700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (374, 'SP000374', 'SCREW-WASH.,5X14', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (375, 'SP000375', 'CLAMPER B SPDMT CORD', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (376, 'SP000376', 'CLAMP BRAKE HOSE', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (377, 'SP000377', 'PAD SET, RR.', 249000, 224100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (378, 'SP000378', 'COLLAR 5X2.0', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (379, 'SP000379', 'PISTON  (1.00)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (380, 'SP000380', 'SHROUD L YLW(NO STRP)', 75000, 67500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (381, 'SP000381', 'HELMET SPEED RIDER BLACK', 180000, 162000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (382, 'SP000382', 'PIPE,INLET', 275000, 247500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (383, 'SP000383', 'BELT DRIVE', 130000, 117000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (384, 'SP000384', 'PLATE DRUM LOCK', 9000, 8100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (385, 'SP000385', 'STRIPE BLUE WHITE L & R', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (386, 'SP000386', 'HARNESS WIRE', 230000, 207000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (387, 'SP000387', 'STAY,RADIATOR LOWER', 5600, 5040, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (388, 'SP000388', 'SPEEDOMETER ASSY', 357000, 321300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (389, 'SP000389', 'STRIPE BLACK SILVER R', 115000, 103500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (390, 'SP000390', 'CLAMPER,SPD SENSO(550)', 23000, 20700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (391, 'SP000391', 'VISOR', 72500, 65250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (392, 'SP000392', 'WASHER,SWITCH BOS', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (393, 'SP000393', 'CABLE COMP, THROT', 19000, 17100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (394, 'SP000394', 'PACKING WINKER LENS', 5600, 5040, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (395, 'SP000395', 'LENS WINKER R FR', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (396, 'SP000396', 'HEAD COMP., CYLINDER', 835000, 751500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (397, 'SP000397', 'SEAL 25X47X5', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (398, 'SP000398', 'WASHER,6X12', 12500, 11250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (399, 'SP000399', 'PIECE OIL LOCK', 35300, 31770, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (400, 'SP000400', 'BOLT,FLANGE 6X18', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (401, 'SP000401', 'SENSOR ASSY,TW', 290000, 261000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (402, 'SP000402', 'BOLT,ONE-WAY 8MM', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (403, 'SP000403', 'COVER INNER LOWER ASSY', 70000, 63000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (404, 'SP000404', 'CLAMP B,WATERHOSE', 43500, 39150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (405, 'SP000405', 'PIN DOWEL 8X16', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (406, 'SP000406', 'BOX, BATTERY', 30100, 27090, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (407, 'SP000407', 'PANEL L SHRD(AF BK MT)', 42000, 37800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (408, 'SP000408', 'CAP LUGGAGE BOX', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (409, 'SP000409', 'ARM REAR BRAKE STOPPER', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (410, 'SP000410', 'FENDER RR ASSY', 93000, 83700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (411, 'SP000411', 'TUBE', 55000, 49500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (412, 'SP000412', 'LENS WINKER R FR', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (413, 'SP000413', 'CABLE COMP THROTTLE', 191900, 172710, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (414, 'SP000414', 'STRIPE WHITE RED L', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (415, 'SP000415', 'FENDER FR(STR SLV MET)', 188000, 169200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (416, 'SP000416', 'GEAR,M SHAFT 2ND', 196500, 176850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (417, 'SP000417', 'OUTER COMP CLUTCH', 200000, 180000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (418, 'SP000418', 'HINGE,SEAT', 15800, 14220, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (419, 'SP000419', 'WHEEL SET,FR.FIGHTING RED', 3270400, 2943360, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (420, 'SP000420', 'PISTON (0.50)', 610000, 549000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (421, 'SP000421', 'SCREW WASHER 5X10', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (422, 'SP000422', 'LABEL, OILMIXPROHIBITION', 1700, 1530, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (423, 'SP000423', 'UNIT ASSY,CDI', 218500, 196650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (424, 'SP000424', 'CRANKSHAFT COMP', 1920500, 1728450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (425, 'SP000425', 'STRIPE EMERALD GREEN L &R', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (426, 'SP000426', 'COVER UTI LID(DB GL MT)', 41000, 36900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (427, 'SP000427', 'CASE COPM L FR BOTTOM', 128000, 115200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (428, 'SP000428', 'CLIP B12,TUBE', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (429, 'SP000429', 'JOINT THREE WAY HOUSE', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (430, 'SP000430', 'FLYWHEEL COMP', 265000, 238500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (431, 'SP000431', 'PIECE SLIDE', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (432, 'SP000432', 'CABLE COMP,SPDMT', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (433, 'SP000433', 'VARIO T-SHIRT 1 BLUE W-S', 65000, 58500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (434, 'SP000434', 'CDI UNIT', 309000, 278100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (435, 'SP000435', 'OIL SEAL 12X20X5', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (436, 'SP000436', 'SLIDER CHAIN', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (437, 'SP000437', 'GUIDE OIL SEAL', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (438, 'SP000438', 'PACKING', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (439, 'SP000439', 'CASE, METER UPPER', 284800, 256320, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (440, 'SP000440', 'NUT,CAP 6MM', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (441, 'SP000441', 'COVER INNER (PL FD WH)', 246000, 221400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (442, 'SP000442', 'BOLT HEAD COVER', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (443, 'SP000443', 'GARNISH FAN RED', 70000, 63000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (444, 'SP000444', 'STRIPE RED SILVER R', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (445, 'SP000445', 'UNIT COMP,PGM-FI/N', 1582000, 1423800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (446, 'SP000446', 'SPANN.PIN SWICTH', 8750, 7875, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (447, 'SP000447', 'PISTON  (0.25)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (448, 'SP000448', 'ROD ASSY CONNECTING', 230000, 207000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (449, 'SP000449', 'WASHER,SPRING 5MM', 2700, 2430, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (450, 'SP000450', 'SHIFT,FORK GUIDE', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (451, 'SP000451', 'RING SET (0.75)', 135800, 122220, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (452, 'SP000452', 'SDD 21X35X7', 7500, 6750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (453, 'SP000453', 'GASKET,COVER', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (454, 'SP000454', 'LENS R. WINKER', 24000, 21600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (455, 'SP000455', 'COVER,FR TP(WHT)', 20300, 18270, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (456, 'SP000456', 'TUBE A SUB AIR CLEANER A', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (457, 'SP000457', 'FORK ASSY R FR', 391000, 351900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (458, 'SP000458', 'HOLDER NEEDLE(K6)', 140500, 126450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (459, 'SP000459', 'BALL ASSY,8X18', 69500, 62550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (460, 'SP000460', 'STAY HORN', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (461, 'SP000461', 'HORN COMP,L', 349000, 314100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (462, 'SP000462', 'PACKING FUEL FILL', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (463, 'SP000463', 'CABLE,SPEEDOMTR', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (464, 'SP000464', 'SOCKET,STR.STEM', 750000, 675000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (465, 'SP000465', '11200-KC6-960', 35600, 32040, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (466, 'SP000466', 'GEAR,C SHAFT 2ND', 313000, 281700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (467, 'SP000467', '90107KW7901', 3900, 3510, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (468, 'SP000468', 'SOCKET COMP', 41000, 36900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (469, 'SP000469', 'HEADLIGHT UNIT', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (470, 'SP000470', 'PLATE COMP,CLUTCH', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (471, 'SP000471', 'COLLAR,STARTER', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (472, 'SP000472', 'SPROCKET DRIVEN', 155000, 139500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (473, 'SP000473', 'TUBE,BATTERY BREA', 64500, 58050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (474, 'SP000474', 'BEARING,BALL', 14500, 13050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (475, 'SP000475', 'LENS, R FR WINKER', 6800, 6120, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (476, 'SP000476', 'SHIELD R LEG TPBL', 183000, 164700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (477, 'SP000477', 'BOLT,FLANGE 10X65', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (478, 'SP000478', 'SPRING, FR. FORK', 213000, 191700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (479, 'SP000479', 'CENTER,CLUTCH', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (480, 'SP000480', 'STRIPE WHITE L', 68000, 61200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (481, 'SP000481', 'RING SET, PISTON (0,75)', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (482, 'SP000482', 'PISTON  (0.75)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (483, 'SP000483', 'COLLAR,SPLINE 23M', 127000, 114300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (484, 'SP000484', 'CAP ASSY,RES TANK', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (485, 'SP000485', 'CALIPER SUB ASSY', 1267300, 1140570, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (486, 'SP000486', 'CASE DR.CHN.UP.NH364', 280000, 252000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (487, 'SP000487', 'GUIDE,RR BRK HOSE', 42000, 37800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (488, 'SP000488', 'TUBE,8X770', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (489, 'SP000489', '22810KTL740', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (490, 'SP000490', 'SWITCH UNIT DIMMER', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (491, 'SP000491', 'COWL L RR SLV(SH SL MT)', 109000, 98100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (492, 'SP000492', 'REFLE,L.RFLX.', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (493, 'SP000493', 'FLYWHEEL COMP', 165000, 148500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (494, 'SP000494', 'FENDER RR ASSY', 113000, 101700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (495, 'SP000495', 'SHIM B', 53000, 47700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (496, 'SP000496', 'FORK ASSY L FR', 289000, 260100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (497, 'SP000497', 'JOINT, KICK ARM', 139200, 125280, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (498, 'SP000498', 'TUBE,CONNECTING', 194000, 174600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (499, 'SP000499', 'PACKING', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (500, 'SP000500', 'UNIT COMP PGM-FI/IGN', 537000, 483300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (501, 'SP000501', 'COVER RR CTR LWR(W.O.PNT)', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (502, 'SP000502', 'O-RING 1,3X4,3', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (503, 'SP000503', 'STRIPE WHITE R', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (504, 'SP000504', 'CLMPER, FR. BRAKE HOSE', 8400, 7560, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (505, 'SP000505', 'ADJUSTER R CHAIN ASSY', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (506, 'SP000506', 'METER COMP.,FUEL&TEMP.', 592500, 533250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (507, 'SP000507', 'ELEMENT,CLEANER', 90000, 81000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (508, 'SP000508', 'CHAIN CAM', 33500, 30150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (509, 'SP000509', 'SHROUD,L.RADIATORY165P', 236100, 212490, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (510, 'SP000510', 'LIGHT ASSY HEAD', 350000, 315000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (511, 'SP000511', '90003MN4001', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (512, 'SP000512', 'ARM DRUM STOP', 72000, 64800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (513, 'SP000513', 'SPEEDOMETER ASSY', 482000, 433800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (514, 'SP000514', 'RUBBER,BUSH', 28800, 25920, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (515, 'SP000515', 'CLUTCH ASSY', 1250000, 1125000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (516, 'SP000516', 'RING SET (0.50)', 350000, 315000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (517, 'SP000517', 'GEAR C,PRIM.DRIVE', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (518, 'SP000518', 'RR COWL  R SD (SILV)', 154000, 138600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (519, 'SP000519', 'STRIPE BLACK BLUE L & R', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (520, 'SP000520', 'BOLT HEX 8X25', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (521, 'SP000521', 'PLATE, FR. WINKER', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (522, 'SP000522', 'SHIELD R LEG(PRP)', 161000, 144900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (523, 'SP000523', 'WASHER,SEALING A', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (524, 'SP000524', 'NUT,FIXING', 22300, 20070, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (525, 'SP000525', 'SPRING VALVE OUTER', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (526, 'SP000526', 'OIL SEAL, 19X30X5', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (527, 'SP000527', 'SPG,COMPRESSION COIL', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (528, 'SP000528', 'COVER HDL FR(SLV)', 181000, 162900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (529, 'SP000529', 'SPROCKET TIMING', 22000, 19800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (530, 'SP000530', 'CRANK SHAFT COMP,RIGHT', 292100, 262890, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (531, 'SP000531', 'CAP,ROTOR FILTER', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (532, 'SP000532', 'BAR, L P STEP SET', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (533, 'SP000533', 'CLAMPER FUEL TUBE', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (534, 'SP000534', 'STRIPE, L.SIDE COVER (3)', 105300, 94770, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (535, 'SP000535', 'COVER R BODY(SL BL MT)', 259000, 233100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (536, 'SP000536', 'GASKET CRANKCASE', 20500, 18450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (537, 'SP000537', 'RAIL RR GRAB', 111000, 99900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (538, 'SP000538', 'STRIPE LEGENDA L & R', 90000, 81000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (539, 'SP000539', 'PIPE COMP,DOWN PIPE', 53000, 47700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (540, 'SP000540', 'COVER HDL FR(VO SL MT)', 111000, 99900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (541, 'SP000541', 'COVER,L RR CR(BLK', 36000, 32400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (542, 'SP000542', 'SPARK PLUG DP8EA-9 (NG)', 12400, 11160, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (543, 'SP000543', 'BRKT, R P STEP', 152800, 137520, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (544, 'SP000544', 'COWL RR CTR BLU(NO STRP)', 49000, 44100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (545, 'SP000545', 'CHAIN CAM', 34000, 30600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (546, 'SP000546', 'RUBBER STARTER PINION', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (547, 'SP000547', 'COVER UNDER (WHT MET)', 38000, 34200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (548, 'SP000548', 'SPRING, REBOUND', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (549, 'SP000549', 'LIGHT REAR COMB SET', 180000, 162000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (550, 'SP000550', 'AXLE FR WHEEL', 18000, 16200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (551, 'SP000551', 'GEAR, C-5 26T', 450000, 405000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (552, 'SP000552', 'E-RING,SPECIAL', 9300, 8370, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (553, 'SP000553', 'Muffler End Cov Pol. Slv', 128000, 115200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (554, 'SP000554', '9390325380', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (555, 'SP000555', 'FUEL UNIT', 76000, 68400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (556, 'SP000556', 'SOCKET COMP HEADLIGHT', 41000, 36900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (557, 'SP000557', 'STAY COMP L. FLOOR', 90000, 81000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (558, 'SP000558', 'COVER,R (GRN)', 31300, 28170, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (559, 'SP000559', '44650KYJ901ZA', 1828000, 1645200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (560, 'SP000560', 'CUSHION ASSY RR (CN BZ O)', 180000, 162000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (561, 'SP000561', 'SCREW WASHER 3X22', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (562, 'SP000562', 'CLAMPER B FR BRK HOSE', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (563, 'SP000563', 'MARK,SIDE TYPE1', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (564, 'SP000564', 'STRIPE SPRTY BLUE MT L &R', 140000, 126000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (565, 'SP000565', 'GRIP L HDL', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (566, 'SP000566', 'CLAMPERWIRE HARNESS', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (567, 'SP000567', 'WINKER UNIT R FR', 22000, 19800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (568, 'SP000568', 'SET ILLUST,UNDER COWL T-1', 263800, 237420, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (569, 'SP000569', 'COVER R BODY(AF BK MT)', 202000, 181800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (570, 'SP000570', 'WASHER SPG 6MM', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (571, 'SP000571', 'COLLAR B RR WHL DISTANCE', 22000, 19800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (572, 'SP000572', 'SET ILL FR UPPER(AST BLK MT)', 270000, 243000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (573, 'SP000573', 'CABLE COMP FR BRK', 27500, 24750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (574, 'SP000574', 'COVER FR TOP(BR LM GR)', 366000, 329400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (575, 'SP000575', 'SPINDLE COMP GEAR SHIFT', 70500, 63450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (576, 'SP000576', 'SET NUT', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (577, 'SP000577', '23471GN5912', 143800, 129420, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (578, 'SP000578', 'COVER COMP,R CRANK CASE', 950000, 855000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (579, 'SP000579', 'STRIPE 3 RED', 113000, 101700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (580, 'SP000580', 'SCREEN WIND', 337000, 303300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (581, 'SP000581', 'WINKER ASSY.,R FR', 248000, 223200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (582, 'SP000582', 'PLUG,BEARING PUSH', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (583, 'SP000583', 'KEY SET', 206000, 185400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (584, 'SP000584', 'CARBURETOR ASSY', 918000, 826200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (585, 'SP000585', 'SPROCKET DRIVEN', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (586, 'SP000586', 'RUBBER,SEAT CUSH', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (587, 'SP000587', 'RUBBER,R COVER', 46200, 41580, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (588, 'SP000588', 'STRIPE BLUE L & R', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (589, 'SP000589', 'COVER RR CTR(TH BL MT)', 177000, 159300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (590, 'SP000590', 'COVER HDL FR(MRED MET)', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (591, 'SP000591', 'CYLINDER COMP', 415500, 373950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (592, 'SP000592', 'PAKET B BEAT PNK', 421000, 378900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (593, 'SP000593', 'WASHER 6.2X19X2.3', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (594, 'SP000594', 'PIN A,BOLT', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (595, 'SP000595', 'SHIELD R LEG(WN RD-A)', 131000, 117900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (596, 'SP000596', 'BULB HEADLIGHT (12V 25/25W)', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (597, 'SP000597', 'WASHER CHAIN CASE', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (598, 'SP000598', 'RUBBER CHANGE PEDAL', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (599, 'SP000599', 'O-RING,75X2.5', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (600, 'SP000600', 'STRIPE  NEON GREEN R', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (601, 'SP000601', 'STRIPE WHITE SILVER  L', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (602, 'SP000602', 'WEIGHT B,HANDLE', 54000, 48600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (603, 'SP000603', 'CB150R JACKET BLACK-M', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (604, 'SP000604', 'SPEEDOMETER COMP.', 621200, 559080, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (605, 'SP000605', 'COLLAR,MUFF MOUNT', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (606, 'SP000606', 'SPROCKET DRIVEN', 89000, 80100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (607, 'SP000607', 'COVER R FR LWR', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (608, 'SP000608', 'SHIELD,L LEG(BLK)', 173000, 155700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (609, 'SP000609', 'M.TONE BRILLIANT SILVER', 250000, 225000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (610, 'SP000610', 'BOLT HEX 6X10', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (611, 'SP000611', 'TUBE RES.TANK BREATHER', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (612, 'SP000612', 'TIRE, FR (275-18 NF25)', 195000, 175500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (613, 'SP000613', 'STRIPE A,R RDTR SHRD T3', 42500, 38250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (614, 'SP000614', 'PIPE COMP STRG HANDLE', 95000, 85500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (615, 'SP000615', 'SEAT VALVE SPRING', 5500, 4950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (616, 'SP000616', 'CABLE COMP,CLUTCH', 34000, 30600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (617, 'SP000617', 'SCREW,PAN 5X6', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (618, 'SP000618', 'WASHER,SPRING', 28000, 25200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (619, 'SP000619', 'PACKING LENS', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (620, 'SP000620', 'ARM ASSY KICK STARTER', 68500, 61650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (621, 'SP000621', 'STR.LOW.CWL.LID T2', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (622, 'SP000622', 'SPRING START /M', 10500, 9450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (623, 'SP000623', 'CABLE COMP SPEEDO', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (624, 'SP000624', 'CORD R WINKER', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (625, 'SP000625', 'CASE ASSY', 32500, 29250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (626, 'SP000626', 'LENS WINKER R RR', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (627, 'SP000627', 'LID SET,L.LOW.COWL(WL)TP1', 328700, 295830, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (628, 'SP000628', 'RING SET (0.25)', 368000, 331200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (629, 'SP000629', 'BRACKET RR WINKER', 11500, 10350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (630, 'SP000630', 'KEYWOODRUFF 4MM', 6500, 5850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (631, 'SP000631', 'BAR COMP STEP', 77000, 69300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (632, 'SP000632', '53205KPH730FMH', 72300, 65070, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (633, 'SP000633', 'CASE,FUSE', 6500, 5850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (634, 'SP000634', 'SCREW,BEAM ADJUST', 3200, 2880, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (635, 'SP000635', 'O-RING,9.4X2.4', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (636, 'SP000636', 'STRIPE GREY SILVER R', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (637, 'SP000637', 'CLAMPER B FR BRK HOSE', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (638, 'SP000638', 'STRIPE WHITE RED L', 135000, 121500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (639, 'SP000639', 'COLLAR R RR WHEEL SIDE', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (640, 'SP000640', 'SCREW SET', 88000, 79200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (641, 'SP000641', 'HOSE B RADIATOR', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (642, 'SP000642', 'JOINT,OIL TUBE', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (643, 'SP000643', '9501554000', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (644, 'SP000644', 'OUTER COMP CLUTCH', 200000, 180000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (645, 'SP000645', 'STRIPE GARNET RED L & R', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (646, 'SP000646', 'COVER L BODY(WITHOUT PNT)', 77700, 69930, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (647, 'SP000647', 'PLATE,DRUM LOCK', 44200, 39780, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (648, 'SP000648', 'WASHER SPLINE 17MM', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (649, 'SP000649', 'COVER M/P UPPER(PB ORG)', 109000, 98100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (650, 'SP000650', 'AC GENERATOR ASSY', 416500, 374850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (651, 'SP000651', 'SHIELD R LEG(BLK)', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (652, 'SP000652', 'KEY SET', 500000, 450000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (653, 'SP000653', 'PEDAL,GEAR /K', 38400, 34560, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (654, 'SP000654', 'HARNESS WIRE', 200000, 180000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (655, 'SP000655', 'KEY SET', 1510200, 1359180, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (656, 'SP000656', 'COVER L BODY(CN SC RD)', 322000, 289800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (657, 'SP000657', 'OIL SEAL, 6.5X14.5', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (658, 'SP000658', 'ARM RR BRAKE', 13500, 12150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (659, 'SP000659', 'AHM SHIRT RED, MEDIUM', 111000, 99900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (660, 'SP000660', 'FORK ASY.L FR.', 1795000, 1615500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (661, 'SP000661', 'LEVER,L,HANDLE', 116000, 104400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (662, 'SP000662', 'COVER HDL FR(BLK)', 131000, 117900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (663, 'SP000663', 'HEADLIGHT ASSY', 452000, 406800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (664, 'SP000664', 'SOCKET CP R WINKER', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (665, 'SP000665', 'COVER FR TOP(PL FD WH)', 132000, 118800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (666, 'SP000666', 'CABLE COMP, THROT', 22500, 20250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (667, 'SP000667', 'SCREW SET', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (668, 'SP000668', 'STRIPE BLACK R', 80000, 72000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (669, 'SP000669', 'COVER R BODY(AS BL MT)', 236000, 212400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (670, 'SP000670', 'BOLT FLANGE 6X40', 5500, 4950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (671, 'SP000671', 'BOLT A,RR ENGINE', 52000, 46800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (672, 'SP000672', 'COVER R BODY(PD PK MT)', 225000, 202500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (673, 'SP000673', 'PEDAL ASSY GEAR CHANGE', 57500, 51750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (674, 'SP000674', 'SCREW,6X25', 5700, 5130, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (675, 'SP000675', 'PLT.M.STEP LWR.', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (676, 'SP000676', 'COLLAR START REDUCTION', 62500, 56250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (677, 'SP000677', 'COVER A/C OUTLET(PR OD VL)', 69000, 62100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (678, 'SP000678', 'CLAMPER COMP., THROTTLE CABLE', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (679, 'SP000679', 'PISTON (0.50)', 39100, 35190, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (680, 'SP000680', 'MAIN SHAFT COMP', 769800, 692820, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (681, 'SP000681', 'STRIPE,R FRONT', 2600, 2340, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (682, 'SP000682', 'COVER, R.MIRROR', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (683, 'SP000683', 'WASHER SEAL 7MM', 9000, 8100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (684, 'SP000684', 'COVER HDL FR(BLK)', 95000, 85500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (685, 'SP000685', 'NEW HELMET (BLACK)', 135000, 121500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (686, 'SP000686', 'INSULATOR, THROTTLE BODY', 82000, 73800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (687, 'SP000687', 'TUBE 5.3X700 ASSY', 12500, 11250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (688, 'SP000688', 'VALVE COMP.,FLOAT', 128000, 115200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (689, 'SP000689', 'STRIPE BLACK R', 65000, 58500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (690, 'SP000690', 'RING SET, PISTON (STD)', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (691, 'SP000691', 'COVER COMP L RR', 69500, 62550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (692, 'SP000692', 'ROD CONNECTING', 450000, 405000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (693, 'SP000693', 'BOLT,FLANGE 6X60', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (694, 'SP000694', 'BOLT,HEX 6X12', 1900, 1710, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (695, 'SP000695', 'Lembayung Blue', 125000, 112500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (696, 'SP000696', 'CVR R RR(MILL RED)', 140000, 126000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (697, 'SP000697', 'AKSESORIS KIT BEAT MERAH', 344000, 309600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (698, 'SP000698', 'RETAINER,KICK SPR', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (699, 'SP000699', 'FENDER FR(PL FD WH)', 107000, 96300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (700, 'SP000700', 'SHIM,TAPPET (2.700)', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (701, 'SP000701', 'OIL SEAL,12X20X5', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (702, 'SP000702', 'CLAMPER B BRAKE HOS', 9500, 8550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (703, 'SP000703', 'SEAT IN VALVE', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (704, 'SP000704', 'COLLAR,25X28X10', 64000, 57600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (705, 'SP000705', 'COVER L BODY(BLK)', 143000, 128700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (706, 'SP000706', 'COTTER,VALVE', 23000, 20700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (707, 'SP000707', 'ELMNT COMP., AIR CLEANER', 119000, 107100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (708, 'SP000708', 'SWITCH KIT (MK)', 1130000, 1017000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (709, 'SP000709', 'SPRING,CLUTCH', 19700, 17730, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (710, 'SP000710', 'TUBE AIR OPENING', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (711, 'SP000711', 'WASHER THRUST 6MM', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (712, 'SP000712', 'GASKET KIT B', 26000, 23400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (713, 'SP000713', 'SEAT, VALVE SPRING', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (714, 'SP000714', 'INDICATOR BRAKE', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (715, 'SP000715', 'SEAL A A/C', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (716, 'SP000716', 'PLATE CLUTCH LIFTER', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (717, 'SP000717', 'CATCH COMP. SEAT', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (718, 'SP000718', 'SOCKET COMP HEADLIGHT', 46500, 41850, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (719, 'SP000719', 'COVER TAIL(BLK)', 27000, 24300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (720, 'SP000720', 'SI Washing Thinner 1 lt', 25000, 22500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (721, 'SP000721', 'TOOL SET', 58500, 52650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (722, 'SP000722', 'MUFFLER ASSY EXH', 460000, 414000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (723, 'SP000723', 'HELMET SP WHITE BLUE', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (724, 'SP000724', 'FNDR, FR CNDY TAHITIAN BLUE', 262000, 235800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (725, 'SP000725', 'COVER L FR PRL HM WHT', 333000, 299700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (726, 'SP000726', 'BOLT BODY COVER SET', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (727, 'SP000727', '45126-KCJ-761', 91200, 82080, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (728, 'SP000728', 'HOSE B WATER', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (729, 'SP000729', '14566086031', 9000, 8100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (730, 'SP000730', 'WASHER,WAVE,10MM', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (731, 'SP000731', 'HOLDER COMP CAMSHAFT', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (732, 'SP000732', 'CENTER CLUTCH', 39500, 35550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (733, 'SP000733', 'TOOL SET', 193000, 173700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (734, 'SP000734', 'STRIPE A,R RDTR SHRD T2', 42500, 38250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (735, 'SP000735', 'DUCT,INLET', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (736, 'SP000736', 'RAIL RR.GRAB.', 479000, 431100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (737, 'SP000737', '23422GB4771', 56000, 50400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (738, 'SP000738', 'WASHER,SEALING 10MM', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (739, 'SP000739', 'BOLT SL 6X20', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (740, 'SP000740', 'SOCKET COMP POSITION LAMP', 12500, 11250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (741, 'SP000741', 'SUB HARNESS BATTERY', 110000, 99000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (742, 'SP000742', 'COVER UNDER(SP BL MT)', 97000, 87300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (743, 'SP000743', 'TANK, FUEL RED (NO STRIPE', 273000, 245700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (744, 'SP000744', 'TIRE, RR (100/90-18 NR25)', 311000, 279900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (745, 'SP000745', 'COVER MUFFLER', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (746, 'SP000746', 'LENS, LICENSE', 5900, 5310, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (747, 'SP000747', '9501542000', 6100, 5490, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (748, 'SP000748', 'COVER FR TOP(WITHOUT PNT)', 39000, 35100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (749, 'SP000749', 'COVER  FR TOP (PL FD WH)', 264000, 237600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (750, 'SP000750', 'GEAR,C-3', 483000, 434700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (751, 'SP000751', 'MIRROR COMP R', 91000, 81900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (752, 'SP000752', 'CYLINDER COMP /3', 1481600, 1333440, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (753, 'SP000753', 'RELAY ASSY WINKER', 35500, 31950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (754, 'SP000754', 'COVER L M/P(BLK)', 131000, 117900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (755, 'SP000755', 'PIN MAIN STEP BAR', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (756, 'SP000756', 'TUBE,AIR CLEANER', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (757, 'SP000757', 'CASE UN.CHAIN', 268000, 241200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (758, 'SP000758', 'PIN SPLIT', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (759, 'SP000759', 'FENDER A FR(SP BL MT-A)', 206000, 185400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (760, 'SP000760', 'CASE METER UPPER', 87000, 78300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (761, 'SP000761', 'SHFT.RR.BRK.PI.', 45000, 40500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (762, 'SP000762', 'COWL RR CTR MRD(NO STRP)', 70000, 63000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (763, 'SP000763', 'COVER L M/P SD(BR LM GR)', 358000, 322200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (764, 'SP000764', 'MUFFLER ASSY EXH', 1180000, 1062000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (765, 'SP000765', 'RUBBER PROTECTOR MOUNT', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (766, 'SP000766', 'CRANKCASE COMP L', 295000, 265500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (767, 'SP000767', 'STR.B,R.FR.UP CWL.T2', 103300, 92970, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (768, 'SP000768', 'SHROUD,L.RADIATORPB305P', 236100, 212490, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (769, 'SP000769', 'STATOR COMP', 202500, 182250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (770, 'SP000770', 'BAG,SERVICE BOOK', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (771, 'SP000771', '12000KC6306', 2050900, 1845810, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (772, 'SP000772', 'GEAR,C SHAFT 2ND', 238700, 214830, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (773, 'SP000773', 'UNIT ASSY FUEL PUMP', 1680000, 1512000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (774, 'SP000774', 'DUST SEAL 21 X 37 X 7', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (775, 'SP000775', 'NUT,FRONT AXLE', 2200, 1980, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (776, 'SP000776', 'BOLT FLANGE 6X25', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (777, 'SP000777', 'STRIPE BLACK R', 115000, 103500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (778, 'SP000778', 'PROTECTOR,FR COV', 27500, 24750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (779, 'SP000779', 'FR.FENDER R127', 392000, 352800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (780, 'SP000780', 'STR.A,L.SIDE COV.T1', 70000, 63000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (781, 'SP000781', 'TIRE, RR (100/90-17 NR25)', 255000, 229500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (782, 'SP000782', 'PISTON (1,00)', 51000, 45900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (783, 'SP000783', 'LENS L WINKER', 39000, 35100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (784, 'SP000784', 'DOWEL PIN,SPL 6.3X10X30', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (785, 'SP000785', 'MIRROR L BACK', 26000, 23400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (786, 'SP000786', 'PLIER 200', 131000, 117900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (787, 'SP000787', 'STRIPE R MIDDLE C TOP', 250000, 225000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (788, 'SP000788', 'PACK. SET OLD BL PUMP', 391400, 352260, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (789, 'SP000789', 'HARNESS,WIRE', 137500, 123750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (790, 'SP000790', 'REDUCER,MOTOR 8', 302500, 272250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (791, 'SP000791', 'SHAFT ROCKER ARM', 10500, 9450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (792, 'SP000792', 'Hndl Cov Garnish Pol. Red', 83000, 74700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (793, 'SP000793', 'SET ILL R REAR(HM WH)', 153000, 137700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (794, 'SP000794', 'MUFFLER ASSY EXH', 450000, 405000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (795, 'SP000795', 'CVR,FR TOP SET(JZ GN MT)', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (796, 'SP000796', 'HOLDER L MAIN STEP', 71500, 64350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (797, 'SP000797', 'ARM ASSY  KICK STARTER', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (798, 'SP000798', 'FENDER FR.B154', 479300, 431370, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (799, 'SP000799', '90112KVB900', 1200, 1080, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (800, 'SP000800', 'BOLT,STUD 2,10X25', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (801, 'SP000801', 'GUIDE,L. WIREHARNESS', 11200, 10080, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (802, 'SP000802', 'STOPPER COMP GEAR SHIFT DRUM', 9500, 8550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (803, 'SP000803', 'WASHER LOCK 20MM', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (804, 'SP000804', 'HELMET PEARL WHITE', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (805, 'SP000805', 'STRIPE BLACK BLUE L & R', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (806, 'SP000806', 'BOX ASSY LUGGAGE', 68000, 61200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (807, 'SP000807', 'SPG,BRG PUSH', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (808, 'SP000808', 'COVER,CALIPER', 125000, 112500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (809, 'SP000809', 'JOINT,BRK ROD', 36000, 32400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (810, 'SP000810', 'COVER R BODY (BR LM GR)', 255000, 229500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (811, 'SP000811', 'BOLT FLANGE 6X10', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (812, 'SP000812', 'COVER R SD BLK(NO STRP)', 52000, 46800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (813, 'SP000813', 'KEY,SET', 1053000, 947700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (814, 'SP000814', '13000KYJ902', 1628000, 1465200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (815, 'SP000815', 'TUBE SET PB(ASV)', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (816, 'SP000816', 'CUSHION ASSY RR.', 200000, 180000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (817, 'SP000817', 'BOLT,FLANGE,NSHF,', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (818, 'SP000818', 'CASE ASSY.', 80000, 72000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (819, 'SP000819', 'FRAME BODY', 1018000, 916200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (820, 'SP000820', 'SHIELD R LEG TPBL(Y)', 166000, 149400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (821, 'SP000821', 'ACC KIT SCOOPY FI GOLD', 340000, 306000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (822, 'SP000822', 'JACKET HRC BIRU', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (823, 'SP000823', 'COVER L BODY (CN SC RD)', 297000, 267300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (824, 'SP000824', 'TUBE A AI', 7500, 6750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (825, 'SP000825', '934020801600', 3600, 3240, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (826, 'SP000826', 'SUB CORD, NEUTRAL', 32900, 29610, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (827, 'SP000827', 'CLIP,COUPLER   L4,V6', 164000, 147600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (828, 'SP000828', 'COVER R SD(BLK)', 67000, 60300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (829, 'SP000829', 'BOLT SPECIAL FLANGE 8X38', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (830, 'SP000830', 'O-RING,2.4X9.4', 11000, 9900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (831, 'SP000831', 'WASHER B (L)', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (832, 'SP000832', 'COVER, BATTERY', 10000, 9000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (833, 'SP000833', 'BOLT,FLANGE10X110', 45000, 40500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (834, 'SP000834', 'GEAR C-3', 46000, 41400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (835, 'SP000835', 'TANK CM.FUEL B154M', 3622000, 3259800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (836, 'SP000836', 'COVER HDL FR(ARED)', 118000, 106200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (837, 'SP000837', 'HALF, UPPER COMP', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (838, 'SP000838', 'FUEL TANK (PAINT)', 265000, 238500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (839, 'SP000839', 'LENS L.RR.W/K.', 27000, 24300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (840, 'SP000840', 'MARK,HONDA 75 MM', 2500, 2250, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (841, 'SP000841', 'STR.A,R.FR.UP.CWL.T3', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (842, 'SP000842', 'HORN COMP (LOW)', 40500, 36450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (843, 'SP000843', 'STRIPE BLACK BLUE R', 115000, 103500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (844, 'SP000844', 'M.TONE LEMON YELLOW', 210000, 189000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (845, 'SP000845', 'GRIP L HDL', 15500, 13950, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (846, 'SP000846', 'STRIPE A,R MIDDLE COWL T2', 183000, 164700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (847, 'SP000847', 'CAP FUEL FILLER', 246000, 221400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (848, 'SP000848', 'STRIPE BLACK GREEN L', 115000, 103500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (849, 'SP000849', 'WASHER,17X23X3', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (850, 'SP000850', '06455-KW6-841', 16800, 15120, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (851, 'SP000851', 'STATOR COMP', 520000, 468000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (852, 'SP000852', 'CABLE CM.SPEEDOMETER', 98000, 88200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (853, 'SP000853', 'STEP BAR ASSY', 145000, 130500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (854, 'SP000854', 'FORK L,GEAR SHIFT', 342000, 307800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (855, 'SP000855', 'PEDAL COMP., GEAR CHANGE', 90000, 81000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (856, 'SP000856', 'BOLT HEX 5X16', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (857, 'SP000857', 'SHIM,TAPPET (1.375)', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (858, 'SP000858', 'THROTTLE CABLE', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (859, 'SP000859', 'STRIPE WHITE BLUE R', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (860, 'SP000860', 'GROMMET,PAD', 25800, 23220, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (861, 'SP000861', 'COVER R SD A(BLK)', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (862, 'SP000862', 'O-RING,FR FORK', 3800, 3420, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (863, 'SP000863', 'CARBURETOR ASSY', 1090200, 981180, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (864, 'SP000864', 'METER ASSY.,COMBINATION', 1611100, 1449990, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (865, 'SP000865', 'SPRING,KICK START', 60000, 54000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (866, 'SP000866', 'COLLAR L RR.', 29600, 26640, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (867, 'SP000867', 'KIT MUFFLER GARN GUN MET', 215000, 193500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (868, 'SP000868', 'PISTON KIT (STD)', 143000, 128700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (869, 'SP000869', 'SHROUD L SLV(NO STRP)', 97000, 87300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (870, 'SP000870', 'BRACKET,R', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (871, 'SP000871', 'AXLE RR WHEEL', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (872, 'SP000872', 'STRIPE B, R.FUELTANK (2)', 17600, 15840, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (873, 'SP000873', 'COVER L BODY(ARED)', 187000, 168300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (874, 'SP000874', 'O-RING,23X2.8', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (875, 'SP000875', 'SCREW,PAN 4X10', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (876, 'SP000876', 'NUT,FLANGE CAP', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (877, 'SP000877', 'WIRE,HELMET SET', 19000, 17100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (878, 'SP000878', 'SUB COAD STARTER MOTOR', 42000, 37800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (879, 'SP000879', 'BOLT,FLANGE', 13600, 12240, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (880, 'SP000880', 'STRIPE BLACK RED L', 110000, 99000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (881, 'SP000881', 'SET IL,R LEG SHIELD(BK-GN', 49000, 44100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (882, 'SP000882', 'CASE ASSY., UPPER', 775000, 697500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (883, 'SP000883', 'COVER R BODY SD', 57000, 51300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (884, 'SP000884', 'SEAT DOUBLE', 197000, 177300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (885, 'SP000885', 'COVER B R SD RD(NO STRP)', 32000, 28800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (886, 'SP000886', 'COVER L M/P(PL TW BL)', 139000, 125100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (887, 'SP000887', 'PIPE,SEAT', 107000, 96300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (888, 'SP000888', 'COVER R CRANK CASE', 330000, 297000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (889, 'SP000889', 'COVER L BODY(TH BL MT)', 176000, 158400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (890, 'SP000890', 'COVER UNDER L SD(PL ML CR)', 91000, 81900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (891, 'SP000891', 'GRIP R HDL', 10500, 9450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (892, 'SP000892', 'PUMP ASSY OIL', 46000, 41400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (893, 'SP000893', 'PISTON  STD', 48000, 43200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (894, 'SP000894', 'STRIPE SLVR BLK RED L & R', 175000, 157500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (895, 'SP000895', 'LENS WINKER L FR', 8500, 7650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (896, 'SP000896', 'COVER R BODY(PL FD WH)', 242000, 217800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (897, 'SP000897', 'COWL L MIDLE(BLK)', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (898, 'SP000898', 'BOLT,HEX.,6X40', 4000, 3600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (899, 'SP000899', 'SUSPENSION ENGINE CONTROL', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (900, 'SP000900', 'SPROCKET CAM', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (901, 'SP000901', 'SPINDLE,GEARSHIFT', 355000, 319500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (902, 'SP000902', 'LABEL VISOR CAUTION', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (903, 'SP000903', 'COVER RR CTR(PL FD WH)', 27000, 24300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (904, 'SP000904', 'PAD SET', 48500, 43650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (905, 'SP000905', 'SCREW,TAPPING 3X6', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (906, 'SP000906', 'COVER HDL FR(CAND WBLU)', 125000, 112500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (907, 'SP000907', 'SET ILLUST TANK P20P', 2989000, 2690100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (908, 'SP000908', 'GSKT,CLUTCH OUT', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (909, 'SP000909', 'COWL RR.NH196', 160000, 144000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (910, 'SP000910', 'WEIGHT B ASSY STRG HDL(Y)', 15000, 13500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (911, 'SP000911', 'AIR CLEANER SET', 237000, 213300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (912, 'SP000912', 'SPRING PRIMARY CLUTCH', 3500, 3150, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (913, 'SP000913', 'SHAFT,FLAP VALVE', 165000, 148500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (914, 'SP000914', 'CARRIER FR.', 165000, 148500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (915, 'SP000915', 'BOLT FLANGE 6X105', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (916, 'SP000916', 'BOLT SWINGARM', 19500, 17550, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (917, 'SP000917', 'LENS WINKER L RR', 7000, 6300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (918, 'SP000918', 'LENS TAILLIGHT', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (919, 'SP000919', 'BOLT, FLANGE, 8X45', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (920, 'SP000920', 'PIPE COMP FR FORK', 238000, 214200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (921, 'SP000921', 'COVER L CRANK CASE', 270000, 243000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (922, 'SP000922', 'WASHER, RR. AXLE', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (923, 'SP000923', 'CABLE ASSY,SPDMT', 91000, 81900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (924, 'SP000924', 'PANEL TAIL R158', 118100, 106290, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (925, 'SP000925', 'WASHER,THRUST', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (926, 'SP000926', 'SEAT LOCK COMP', 20000, 18000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (927, 'SP000927', 'COVER R M/P SD(DG SL MT)', 161000, 144900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (928, 'SP000928', 'GEAR M-4', 57000, 51300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (929, 'SP000929', 'BOLT HS 6MM', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (930, 'SP000930', 'HARNESS WIRE', 350000, 315000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (931, 'SP000931', 'ARM RR BRAKE', 13000, 11700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (932, 'SP000932', 'FORK ASSY R FR (DK)', 384000, 345600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (933, 'SP000933', 'CARBURETOR ASSY', 1100000, 990000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (934, 'SP000934', 'WINKER ASSY L FR', 40000, 36000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (935, 'SP000935', 'COVER INR RACK(PL ML CR)', 144000, 129600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (936, 'SP000936', 'WRENCH,BOX P18X19', 50000, 45000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (937, 'SP000937', 'STRIPE BLUE L', 100000, 90000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (938, 'SP000938', 'CAP BLEEDER', 17000, 15300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (939, 'SP000939', 'KEY SEAT LOCK', 98000, 88200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (940, 'SP000940', 'STRIPE CN SC RED L & R', 180000, 162000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (941, 'SP000941', 'SPEEDOMETER COMP', 242000, 217800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (942, 'SP000942', '11393107010', 14200, 12780, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (943, 'SP000943', 'BOLT,SOCKET 6X16', 2700, 2430, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (944, 'SP000944', 'GASKET,FUEL PUMP', 95000, 85500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (945, 'SP000945', 'RING SET, PISTON(0.75)', 58000, 52200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (946, 'SP000946', 'COVER,R BODY(PLS)', 50500, 45450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (947, 'SP000947', 'COTTER,VALVE', 13200, 11880, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (948, 'SP000948', 'SPROCKET DRIVEN', 134000, 120600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (949, 'SP000949', 'LEVER SET,CHOKE', 185000, 166500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (950, 'SP000950', 'PISTON  (0.50)', 65000, 58500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (951, 'SP000951', 'BOOT,L LEVER', 16000, 14400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (952, 'SP000952', 'CASE  L FR BOTTOM', 150000, 135000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (953, 'SP000953', 'SWINGARM ASSY REAR SET', 620000, 558000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (954, 'SP000954', 'SCREW,TAPP 5X12', 500, 450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (955, 'SP000955', 'COV.L.CR/CS', 871000, 783900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (956, 'SP000956', 'STRIPE BLACK YELLOW L & R', 170000, 153000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (957, 'SP000957', 'GEAR,C.SHAFT THIRD(23T)', 47000, 42300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (958, 'SP000958', 'BODY,FR CALIPER', 1218000, 1096200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (959, 'SP000959', 'COLLAR SPRING', 2000, 1800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (960, 'SP000960', 'TUBE A/C CONNECTING', 8500, 7650, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (961, 'SP000961', 'NUT,FLANGE,4MM', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (962, 'SP000962', 'T-BOX 14 MM', 119000, 107100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (963, 'SP000963', 'DRIVER,OU.22 X 24MM', 226000, 203400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (964, 'SP000964', 'DLC SHORT CONNECTOR', 146000, 131400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (965, 'SP000965', 'LID,PLUG MAINTENANCE', 12000, 10800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (966, 'SP000966', 'GAUGE ASSY OIL LEVEL', 7500, 6750, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (967, 'SP000967', 'SEALING CAP,CABLE', 52000, 46800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (968, 'SP000968', 'GEAR A,PRIM DRIVE', 503300, 452970, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (969, 'SP000969', 'COVER L RR CRANK CASE', 74000, 66600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (970, 'SP000970', 'HONDA RC211V - TU.03', 41000, 36900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (971, 'SP000971', 'TOOL SET', 270000, 243000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (972, 'SP000972', 'TANK,FUEL (BLK)/4', 324900, 292410, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (973, 'SP000973', 'COVER FR(AF BK MT)', 271000, 243900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (974, 'SP000974', 'PAD SET, RR', 800000, 720000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (975, 'SP000975', 'SWITCH ASSY RR STOP', 44500, 40050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (976, 'SP000976', 'PIPE SEAT', 30000, 27000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (977, 'SP000977', 'VALVE,SET FLOAT', 115000, 103500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (978, 'SP000978', 'COVER,DUCT', 1500, 1350, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (979, 'SP000979', 'HARNESS, WIRE', 689000, 620100, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (980, 'SP000980', 'BOLT FLANGE 10X40', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (981, 'SP000981', 'FENDER RR INNER ASSY', 21000, 18900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (982, 'SP000982', 'BOLT FLANGE SH 6X12', 6000, 5400, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (983, 'SP000983', '957010602200', 1000, 900, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (984, 'SP000984', 'LENS L.RR.WINKER', 37000, 33300, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (985, 'SP000985', 'COVER L BODY(IL SV MT)', 234000, 210600, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (986, 'SP000986', 'BAJU SK CADANG PRIA B (L)', 150000, 135000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (987, 'SP000987', 'CAP 14MM', 4500, 4050, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (988, 'SP000988', 'COVER FR TOP(BLK)', 108000, 97200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (989, 'SP000989', 'TUBE COMP,AIR VENT', 30500, 27450, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (990, 'SP000990', 'BAJU PEML PRIA B (S)', 150000, 135000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (991, 'SP000991', 'WINKER ASSY L FR', 35000, 31500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (992, 'SP000992', 'SPRING, KICK RETURN', 5000, 4500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (993, 'SP000993', 'BOLT A STUD 7X193.5', 8000, 7200, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (994, 'SP000994', 'STRIPE SILVER L & R', 120000, 108000, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (995, 'SP000995', 'LOUVER R', 53000, 47700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (996, 'SP000996', 'ELEMENT,CLEANER', 85000, 76500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (997, 'SP000997', 'CUSHION ASSY RR', 285000, 256500, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (998, 'SP000998', 'Fan Cover Pol. Pnk', 73000, 65700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (999, 'SP000999', 'COVER L M/P SD(DG SL MT)', 382000, 343800, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (1000, 'SP001000', 'BULB W BASE (T10 12V1.7W)', 3000, 2700, 20, 'Sparepart');
INSERT INTO `t_part_jasa` VALUES (1001, 'JS001', 'Service A', 1000000, NULL, NULL, 'Jasa');
INSERT INTO `t_part_jasa` VALUES (1002, 'JS002', 'Service B', 899000, NULL, NULL, 'Jasa');
INSERT INTO `t_part_jasa` VALUES (1003, 'JS003', 'Service C', 450000, NULL, NULL, 'Jasa');
INSERT INTO `t_part_jasa` VALUES (1004, 'JS004', 'Service D', 420000, NULL, NULL, 'Jasa');
INSERT INTO `t_part_jasa` VALUES (1005, 'JS005', 'Service E', 200000, NULL, NULL, 'Jasa');
INSERT INTO `t_part_jasa` VALUES (1006, 'JS006', 'Service F', 40000, NULL, NULL, 'Jasa');

-- ----------------------------
-- Table structure for t_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `t_pelanggan`;
CREATE TABLE `t_pelanggan`  (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_polisi` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_pelanggan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `merk_type_kendaraan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kendaraan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isi_silinder` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_rangka` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_mesin` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bahan_bakar` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_pelanggan
-- ----------------------------
INSERT INTO `t_pelanggan` VALUES (1, 'D 1111 ZZ', 'Dudung Ramdani', 'KP Griya Bandung Asri II RT 01 RW 10 blok A 77', 'Honda NF 11B1D M/T', 'Sepeda Motor', '110 CC', 'MH1JBC121A', 'JBC1E21C2C3C', 'Bensin');

-- ----------------------------
-- Table structure for t_temp_trans_part
-- ----------------------------
DROP TABLE IF EXISTS `t_temp_trans_part`;
CREATE TABLE `t_temp_trans_part`  (
  `id_temp_trans_part` int(11) NOT NULL AUTO_INCREMENT,
  `no_part` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `id_part_jasa` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_temp_trans_part`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_temp_trans_part
-- ----------------------------
INSERT INTO `t_temp_trans_part` VALUES (1, 'SP000057', '2018-06-26 04:47:51', 57, 1, 534000);

-- ----------------------------
-- Table structure for t_temp_trans_service
-- ----------------------------
DROP TABLE IF EXISTS `t_temp_trans_service`;
CREATE TABLE `t_temp_trans_service`  (
  `id_temp_trans_service` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kwitansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `id_part_jasa` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_temp_trans_service`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_trans_part
-- ----------------------------
DROP TABLE IF EXISTS `t_trans_part`;
CREATE TABLE `t_trans_part`  (
  `id_trans_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal_trans_part` datetime(0) NOT NULL,
  PRIMARY KEY (`id_trans_part`) USING BTREE,
  INDEX `fkk1`(`id_user`) USING BTREE,
  CONSTRAINT `fkk1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_trans_part
-- ----------------------------
INSERT INTO `t_trans_part` VALUES (1, 1, '2018-06-26 07:29:23');

-- ----------------------------
-- Table structure for t_trans_service
-- ----------------------------
DROP TABLE IF EXISTS `t_trans_service`;
CREATE TABLE `t_trans_service`  (
  `id_trans_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_kwitansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_trans_service` datetime(0) NOT NULL,
  PRIMARY KEY (`id_trans_service`) USING BTREE,
  UNIQUE INDEX `nomor_transaksi`(`nomor_kwitansi`) USING BTREE,
  INDEX `fkts1`(`id_pelanggan`) USING BTREE,
  INDEX `fkk2`(`id_user`) USING BTREE,
  CONSTRAINT `fkk2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fkts1` FOREIGN KEY (`id_pelanggan`) REFERENCES `t_pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_trans_service
-- ----------------------------
INSERT INTO `t_trans_service` VALUES (1, 1, 1, 'T0001', '2018-06-26 05:28:47');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (1, 'admin', 'admin123');

SET FOREIGN_KEY_CHECKS = 1;
