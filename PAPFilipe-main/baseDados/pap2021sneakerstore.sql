/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : pap2021sneakerstore

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 09/03/2021 17:53:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for imagens
-- ----------------------------
DROP TABLE IF EXISTS `imagens`;
CREATE TABLE `imagens`  (
  `imagemId` int(11) NOT NULL,
  `imagemNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imagemURL` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imagemProdutoId` int(11) NOT NULL,
  `imagemDestaque` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`imagemId`) USING BTREE,
  INDEX `fk_imagens_produtos1_idx`(`imagemProdutoId`) USING BTREE,
  CONSTRAINT `fk_imagens_produtos1` FOREIGN KEY (`imagemProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imagens
-- ----------------------------

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas`  (
  `marcaId` int(11) NOT NULL AUTO_INCREMENT,
  `marcaNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marcaLogoURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`marcaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES (6, '', 'images/');
INSERT INTO `marcas` VALUES (7, '', 'images/');

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `produtoId` int(11) NOT NULL AUTO_INCREMENT,
  `produtoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoDescricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoPreco` decimal(10, 2) NOT NULL,
  `produtoMarcaId` int(11) NOT NULL,
  PRIMARY KEY (`produtoId`) USING BTREE,
  INDEX `fk_produtos_marcas_idx`(`produtoMarcaId`) USING BTREE,
  CONSTRAINT `fk_produtos_marcas` FOREIGN KEY (`produtoMarcaId`) REFERENCES `marcas` (`marcaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
