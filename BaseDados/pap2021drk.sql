/*
 Navicat Premium Data Transfer

 Source Server         : papjoao2021
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : pap2021drk

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 21/07/2021 23:19:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carrinhoprodutos
-- ----------------------------
DROP TABLE IF EXISTS `carrinhoprodutos`;
CREATE TABLE `carrinhoprodutos`  (
  `carrinhoProdutoCarrinhoId` int NOT NULL,
  `carrinhoProdutoProdutoId` int NOT NULL,
  `carrinhoProdutoQnt` int UNSIGNED NOT NULL DEFAULT 1,
  `carrinhoProdutoTam` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`carrinhoProdutoCarrinhoId`, `carrinhoProdutoProdutoId`) USING BTREE,
  INDEX `fk_carrinho_has_produtos_produtos1_idx`(`carrinhoProdutoProdutoId`) USING BTREE,
  INDEX `fk_carrinho_has_produtos_carrinho1_idx`(`carrinhoProdutoCarrinhoId`) USING BTREE,
  CONSTRAINT `fk_carrinho_has_produtos_carrinho1` FOREIGN KEY (`carrinhoProdutoCarrinhoId`) REFERENCES `carrinhos` (`carrinhoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_has_produtos_produtos1` FOREIGN KEY (`carrinhoProdutoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carrinhoprodutos
-- ----------------------------

-- ----------------------------
-- Table structure for carrinhos
-- ----------------------------
DROP TABLE IF EXISTS `carrinhos`;
CREATE TABLE `carrinhos`  (
  `carrinhoId` int NOT NULL AUTO_INCREMENT,
  `carrinhoPerfilId` int NOT NULL,
  PRIMARY KEY (`carrinhoId`, `carrinhoPerfilId`) USING BTREE,
  INDEX `fk_carrinho_perfis1_idx`(`carrinhoPerfilId`) USING BTREE,
  CONSTRAINT `fk_carrinho_perfis1` FOREIGN KEY (`carrinhoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carrinhos
-- ----------------------------

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `categoriaId` int NOT NULL AUTO_INCREMENT,
  `categoriaNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`categoriaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Adulto');
INSERT INTO `categorias` VALUES (2, 'Criança');
INSERT INTO `categorias` VALUES (3, 'Acessório');

-- ----------------------------
-- Table structure for encomendaprodutos
-- ----------------------------
DROP TABLE IF EXISTS `encomendaprodutos`;
CREATE TABLE `encomendaprodutos`  (
  `encomendaProdutoEncomendaId` int NOT NULL,
  `encomendaProdutoProdutoId` int NOT NULL,
  `encomendaProdutoQnt` int NOT NULL,
  `encomendaProdutoPrec` decimal(10, 2) NOT NULL,
  `encomendaProdutoTam` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`encomendaProdutoEncomendaId`, `encomendaProdutoProdutoId`) USING BTREE,
  INDEX `fk_encomendas_has_produtos_produtos1_idx`(`encomendaProdutoProdutoId`) USING BTREE,
  INDEX `fk_encomendas_has_produtos_encomendas1_idx`(`encomendaProdutoEncomendaId`) USING BTREE,
  CONSTRAINT `fk_encomendas_has_produtos_encomendas1` FOREIGN KEY (`encomendaProdutoEncomendaId`) REFERENCES `encomendas` (`encomendaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_encomendas_has_produtos_produtos1` FOREIGN KEY (`encomendaProdutoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of encomendaprodutos
-- ----------------------------
INSERT INTO `encomendaprodutos` VALUES (13, 14, 2, 196.00, 'S');
INSERT INTO `encomendaprodutos` VALUES (13, 16, 1, 41.00, 'L');
INSERT INTO `encomendaprodutos` VALUES (13, 39, 2, 38.70, '');

-- ----------------------------
-- Table structure for encomendas
-- ----------------------------
DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE `encomendas`  (
  `encomendaId` int NOT NULL AUTO_INCREMENT,
  `encomendaPerfilId` int NOT NULL,
  `encomendaNum` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaEstado` enum('Em Processamento','Enviada') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Em Processamento',
  `encomendaPagam` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaData` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `encomendaMorada` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaCodPostal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaLocal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaPrec` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`encomendaId`, `encomendaPerfilId`) USING BTREE,
  INDEX `fk_encomendas_perfis1_idx`(`encomendaPerfilId`) USING BTREE,
  CONSTRAINT `fk_encomendas_perfis1` FOREIGN KEY (`encomendaPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of encomendas
-- ----------------------------
INSERT INTO `encomendas` VALUES (13, 3, '2021300004\n', 'Em Processamento', 'Paypal', '2021-06-04 21:20:16.10', '3132', '23123', '32314', 510.40);

-- ----------------------------
-- Table structure for enderecos
-- ----------------------------
DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos`  (
  `enderecoId` int NOT NULL AUTO_INCREMENT,
  `enderecoMorada` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoCodPostal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoLocal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoPerfilId` int NOT NULL,
  PRIMARY KEY (`enderecoId`, `enderecoPerfilId`) USING BTREE,
  INDEX `fk_Enderecos_utilizadores1_idx`(`enderecoPerfilId`) USING BTREE,
  CONSTRAINT `fk_Enderecos_utilizadores1` FOREIGN KEY (`enderecoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enderecos
-- ----------------------------
INSERT INTO `enderecos` VALUES (1, '3132', '23123', '32314', 3);

-- ----------------------------
-- Table structure for favoritos
-- ----------------------------
DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos`  (
  `favoritoId` int NOT NULL AUTO_INCREMENT,
  `favoritoPerfilId` int NOT NULL,
  `favoritoProdutoId` int NOT NULL,
  PRIMARY KEY (`favoritoId`, `favoritoPerfilId`, `favoritoProdutoId`) USING BTREE,
  INDEX `fk_favoritos_utilizadores1_idx`(`favoritoPerfilId`) USING BTREE,
  INDEX `fk_favoritos_produtos1_idx`(`favoritoProdutoId`) USING BTREE,
  CONSTRAINT `fk_favoritos_produtos1` FOREIGN KEY (`favoritoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_favoritos_utilizadores1` FOREIGN KEY (`favoritoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favoritos
-- ----------------------------
INSERT INTO `favoritos` VALUES (3, 3, 31);
INSERT INTO `favoritos` VALUES (5, 3, 32);
INSERT INTO `favoritos` VALUES (6, 3, 41);

-- ----------------------------
-- Table structure for perfis
-- ----------------------------
DROP TABLE IF EXISTS `perfis`;
CREATE TABLE `perfis`  (
  `perfilId` int NOT NULL AUTO_INCREMENT,
  `perfilNome` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilEstado` enum('ativo','inativo','pendente') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilTele` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilAdmin` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`perfilId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfis
-- ----------------------------
INSERT INTO `perfis` VALUES (3, 'joaoAdmin', 'ativo', '65124124', 'sim');

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `produtoId` int NOT NULL AUTO_INCREMENT,
  `produtoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoPreco` decimal(10, 2) NOT NULL,
  `produtoDestaque` enum('Sim','Nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Nao',
  `produtoImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoTipoCategoriaCategoriaId` int NOT NULL,
  `produtoTipoCategoriaTipoId` int NOT NULL,
  `produtoGenero` enum('M','F','U') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'U',
  `produtoDescricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoDesconto` decimal(5, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`produtoId`) USING BTREE,
  INDEX `fk_produtos_tipoCategorias1_idx`(`produtoTipoCategoriaCategoriaId`, `produtoTipoCategoriaTipoId`) USING BTREE,
  CONSTRAINT `fk_produtos_tipoCategorias1` FOREIGN KEY (`produtoTipoCategoriaCategoriaId`, `produtoTipoCategoriaTipoId`) REFERENCES `tipocategorias` (`tipoCategoriaCategoriaId`, `tipoCategoriaTipoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (14, 'Mala2', 245.00, 'Sim', 'images/accessories-4.jpg', 3, 7, 'F', 'sdadas', 20.00);
INSERT INTO `produtos` VALUES (16, 'Carteira1', 41.00, 'Sim', 'images/accessories-5.jpg', 3, 8, 'M', '', 0.00);
INSERT INTO `produtos` VALUES (31, 'Carteira2', 31.00, 'Sim', 'images/accessories-6.jpg', 3, 8, 'M', '', 0.00);
INSERT INTO `produtos` VALUES (32, 'Óculos1', 76.00, 'Sim', 'images/accessories-7.jpg', 3, 13, 'M', '', 0.00);
INSERT INTO `produtos` VALUES (35, 'Óculos2', 67.00, 'Nao', 'images/accessories-8.jpg', 3, 13, 'U', '', 0.00);
INSERT INTO `produtos` VALUES (39, 'Camisola1', 43.00, 'Nao', 'images/product-2.jpg', 1, 3, 'F', '', 10.00);
INSERT INTO `produtos` VALUES (40, 'Vestido1', 43.00, 'Sim', 'images/product-3.jpg', 1, 4, 'F', '', 25.00);
INSERT INTO `produtos` VALUES (41, 'CalçasCria1', 21.00, 'Nao', 'images/calcas-em-felpa.jpg', 2, 1, 'M', '', 0.00);
INSERT INTO `produtos` VALUES (42, 'Camisa1', 29.00, 'Nao', 'images/1585824666_55871bbaf47d8adae240bd9fff61d5bb.jpg', 1, 6, 'M', '', 0.00);
INSERT INTO `produtos` VALUES (49, 'Camisola', 23.00, 'Nao', 'images/camisola-vermelha-costas.jpg', 1, 3, 'M', 'sdadas3', 15.00);
INSERT INTO `produtos` VALUES (50, 'Carteira 3', 20.00, 'Sim', 'images/1615399162_89383733f3c20e4f91caf8aab0590747.jpg', 3, 8, 'M', 'Carteira de couro', 10.00);
INSERT INTO `produtos` VALUES (51, 'Carteira 4', 25.00, 'Sim', 'images/none_992252f93f948d5a683bbf150c97fb3e_992252f.jpg', 3, 7, 'M', 'Carteira de azul', 0.00);

-- ----------------------------
-- Table structure for produtotamanhos
-- ----------------------------
DROP TABLE IF EXISTS `produtotamanhos`;
CREATE TABLE `produtotamanhos`  (
  `produtoTamanhoProdutoId` int NOT NULL,
  `produtoTamanhoTamanhoId` int NOT NULL,
  PRIMARY KEY (`produtoTamanhoProdutoId`, `produtoTamanhoTamanhoId`) USING BTREE,
  INDEX `fk_produtos_has_tamanho_tamanho1_idx`(`produtoTamanhoTamanhoId`) USING BTREE,
  INDEX `fk_produtos_has_tamanho_produtos1_idx`(`produtoTamanhoProdutoId`) USING BTREE,
  CONSTRAINT `fk_produtos_has_tamanho_produtos1` FOREIGN KEY (`produtoTamanhoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_tamanho_tamanho1` FOREIGN KEY (`produtoTamanhoTamanhoId`) REFERENCES `tamanhos` (`tamanhoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtotamanhos
-- ----------------------------
INSERT INTO `produtotamanhos` VALUES (14, 8);
INSERT INTO `produtotamanhos` VALUES (14, 11);
INSERT INTO `produtotamanhos` VALUES (16, 8);
INSERT INTO `produtotamanhos` VALUES (16, 9);
INSERT INTO `produtotamanhos` VALUES (16, 10);
INSERT INTO `produtotamanhos` VALUES (16, 14);
INSERT INTO `produtotamanhos` VALUES (49, 8);
INSERT INTO `produtotamanhos` VALUES (49, 9);
INSERT INTO `produtotamanhos` VALUES (49, 10);

-- ----------------------------
-- Table structure for promocaoprodutos
-- ----------------------------
DROP TABLE IF EXISTS `promocaoprodutos`;
CREATE TABLE `promocaoprodutos`  (
  `promocaoProdutoPromocaoId` int NOT NULL,
  `promocaoProdutoProdutoId` int NOT NULL,
  PRIMARY KEY (`promocaoProdutoPromocaoId`, `promocaoProdutoProdutoId`) USING BTREE,
  INDEX `fk_promocoes_has_produtos_produtos1_idx`(`promocaoProdutoProdutoId`) USING BTREE,
  INDEX `fk_promocoes_has_produtos_promocoes1_idx`(`promocaoProdutoPromocaoId`) USING BTREE,
  CONSTRAINT `fk_promocoes_has_produtos_produtos1` FOREIGN KEY (`promocaoProdutoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promocoes_has_produtos_promocoes1` FOREIGN KEY (`promocaoProdutoPromocaoId`) REFERENCES `promocoes` (`promocaoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of promocaoprodutos
-- ----------------------------

-- ----------------------------
-- Table structure for promocoes
-- ----------------------------
DROP TABLE IF EXISTS `promocoes`;
CREATE TABLE `promocoes`  (
  `promocaoId` int NOT NULL AUTO_INCREMENT,
  `promocaoNome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `promocaoDesconto` decimal(5, 2) NOT NULL,
  PRIMARY KEY (`promocaoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of promocoes
-- ----------------------------

-- ----------------------------
-- Table structure for slideshowimagens
-- ----------------------------
DROP TABLE IF EXISTS `slideshowimagens`;
CREATE TABLE `slideshowimagens`  (
  `slideshowImagemId` int NOT NULL AUTO_INCREMENT,
  `slideshowImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemTexto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemCat` int NOT NULL,
  `slideshowImagemGen` enum('M','F','U','T') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemOrd` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`slideshowImagemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of slideshowimagens
-- ----------------------------
INSERT INTO `slideshowimagens` VALUES (10, 'images/slider-1.jpg', 'Veja os nossos produtos', 1, 'T', 1);
INSERT INTO `slideshowimagens` VALUES (11, 'images/slider-2.jpg', 'Para Homem', 1, 'M', 3);
INSERT INTO `slideshowimagens` VALUES (12, 'images/slider-3.jpg', 'Para Mulher', 1, 'F', 2);

-- ----------------------------
-- Table structure for tamanhos
-- ----------------------------
DROP TABLE IF EXISTS `tamanhos`;
CREATE TABLE `tamanhos`  (
  `tamanhoId` int NOT NULL AUTO_INCREMENT,
  `tamanhoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tamanhoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tamanhos
-- ----------------------------
INSERT INTO `tamanhos` VALUES (8, 'S');
INSERT INTO `tamanhos` VALUES (9, 'M');
INSERT INTO `tamanhos` VALUES (10, 'L');
INSERT INTO `tamanhos` VALUES (11, 'XL');
INSERT INTO `tamanhos` VALUES (14, '4-7');
INSERT INTO `tamanhos` VALUES (15, '8-11');
INSERT INTO `tamanhos` VALUES (16, '12-15');

-- ----------------------------
-- Table structure for tipocategorias
-- ----------------------------
DROP TABLE IF EXISTS `tipocategorias`;
CREATE TABLE `tipocategorias`  (
  `tipoCategoriaCategoriaId` int NOT NULL,
  `tipoCategoriaTipoId` int NOT NULL,
  PRIMARY KEY (`tipoCategoriaCategoriaId`, `tipoCategoriaTipoId`) USING BTREE,
  INDEX `fk_categorias_has_subcategorias_subcategorias1_idx`(`tipoCategoriaTipoId`) USING BTREE,
  INDEX `fk_categorias_has_subcategorias_categorias_idx`(`tipoCategoriaCategoriaId`) USING BTREE,
  CONSTRAINT `fk_categorias_has_subcategorias_categorias` FOREIGN KEY (`tipoCategoriaCategoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorias_has_subcategorias_subcategorias1` FOREIGN KEY (`tipoCategoriaTipoId`) REFERENCES `tipos` (`tipoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipocategorias
-- ----------------------------
INSERT INTO `tipocategorias` VALUES (1, 1);
INSERT INTO `tipocategorias` VALUES (1, 3);
INSERT INTO `tipocategorias` VALUES (1, 4);
INSERT INTO `tipocategorias` VALUES (1, 6);
INSERT INTO `tipocategorias` VALUES (2, 1);
INSERT INTO `tipocategorias` VALUES (2, 3);
INSERT INTO `tipocategorias` VALUES (2, 4);
INSERT INTO `tipocategorias` VALUES (2, 6);
INSERT INTO `tipocategorias` VALUES (3, 7);
INSERT INTO `tipocategorias` VALUES (3, 8);
INSERT INTO `tipocategorias` VALUES (3, 11);
INSERT INTO `tipocategorias` VALUES (3, 13);

-- ----------------------------
-- Table structure for tipos
-- ----------------------------
DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos`  (
  `tipoId` int NOT NULL AUTO_INCREMENT,
  `tipoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tipoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Calças');
INSERT INTO `tipos` VALUES (3, 'Camisolas');
INSERT INTO `tipos` VALUES (4, 'Vestidos');
INSERT INTO `tipos` VALUES (6, 'Camisas');
INSERT INTO `tipos` VALUES (7, 'Malas');
INSERT INTO `tipos` VALUES (8, 'Carteiras');
INSERT INTO `tipos` VALUES (11, 'Colares');
INSERT INTO `tipos` VALUES (13, 'Óculos');

-- ----------------------------
-- Table structure for utilizadores
-- ----------------------------
DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE `utilizadores`  (
  `utilizadorId` int NOT NULL AUTO_INCREMENT,
  `utilizadorEmail` varchar(95) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorPass` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorPerfilId` int NOT NULL,
  PRIMARY KEY (`utilizadorId`, `utilizadorPerfilId`) USING BTREE,
  UNIQUE INDEX `utilizadorEmail_UNIQUE`(`utilizadorEmail`) USING BTREE,
  INDEX `fk_utilizadores_perfis1_idx`(`utilizadorPerfilId`) USING BTREE,
  CONSTRAINT `fk_utilizadores_perfis1` FOREIGN KEY (`utilizadorPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of utilizadores
-- ----------------------------
INSERT INTO `utilizadores` VALUES (1, 'j@gmail.com', '12', 3);

SET FOREIGN_KEY_CHECKS = 1;
