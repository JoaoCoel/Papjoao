/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : pap2021drk

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 21/07/2021 14:37:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carrinhoprodutos
-- ----------------------------
DROP TABLE IF EXISTS `carrinhoprodutos`;
CREATE TABLE `carrinhoprodutos`  (
  `carrinhoProdutoCarrinhoId` int(11) NOT NULL,
  `carrinhoProdutoProdutoId` int(11) NOT NULL,
  `carrinhoProdutoQnt` int(10) UNSIGNED NOT NULL DEFAULT 1,
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
INSERT INTO `carrinhoprodutos` VALUES (1, 3, 1, '');

-- ----------------------------
-- Table structure for carrinhos
-- ----------------------------
DROP TABLE IF EXISTS `carrinhos`;
CREATE TABLE `carrinhos`  (
  `carrinhoId` int(11) NOT NULL AUTO_INCREMENT,
  `carrinhoPerfilId` int(11) NOT NULL,
  PRIMARY KEY (`carrinhoId`, `carrinhoPerfilId`) USING BTREE,
  INDEX `fk_carrinho_perfis1_idx`(`carrinhoPerfilId`) USING BTREE,
  CONSTRAINT `fk_carrinho_perfis1` FOREIGN KEY (`carrinhoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carrinhos
-- ----------------------------
INSERT INTO `carrinhos` VALUES (1, 2);

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`categoriaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `encomendaProdutoEncomendaId` int(11) NOT NULL,
  `encomendaProdutoProdutoId` int(11) NOT NULL,
  `encomendaProdutoQnt` int(11) NOT NULL,
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
INSERT INTO `encomendaprodutos` VALUES (1, 2, 1, 21.25, 'S');
INSERT INTO `encomendaprodutos` VALUES (1, 8, 1, 15.00, 'M');

-- ----------------------------
-- Table structure for encomendas
-- ----------------------------
DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE `encomendas`  (
  `encomendaId` int(11) NOT NULL AUTO_INCREMENT,
  `encomendaPerfilId` int(11) NOT NULL,
  `encomendaNum` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaEstado` enum('Em Processamento','Enviada') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Em Processamento',
  `encomendaPagam` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaData` timestamp(2) NOT NULL,
  `encomendaMorada` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaCodPostal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaLocal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `encomendaPrec` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`encomendaId`, `encomendaPerfilId`) USING BTREE,
  INDEX `fk_encomendas_perfis1_idx`(`encomendaPerfilId`) USING BTREE,
  CONSTRAINT `fk_encomendas_perfis1` FOREIGN KEY (`encomendaPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of encomendas
-- ----------------------------
INSERT INTO `encomendas` VALUES (1, 2, '2021200001\n', 'Em Processamento', 'Paypal', '2021-06-08 09:53:09.00', '133223', '2323', '3213213', '41.25');

-- ----------------------------
-- Table structure for enderecos
-- ----------------------------
DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos`  (
  `enderecoId` int(11) NOT NULL AUTO_INCREMENT,
  `enderecoMorada` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoCodPostal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoLocal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enderecoPerfilId` int(11) NOT NULL,
  PRIMARY KEY (`enderecoId`, `enderecoPerfilId`) USING BTREE,
  INDEX `fk_Enderecos_utilizadores1_idx`(`enderecoPerfilId`) USING BTREE,
  CONSTRAINT `fk_Enderecos_utilizadores1` FOREIGN KEY (`enderecoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enderecos
-- ----------------------------
INSERT INTO `enderecos` VALUES (1, '133223', '2323', '3213213', 2);

-- ----------------------------
-- Table structure for favoritos
-- ----------------------------
DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos`  (
  `favoritoId` int(11) NOT NULL AUTO_INCREMENT,
  `favoritoPerfilId` int(11) NOT NULL,
  `favoritoProdutoId` int(11) NOT NULL,
  PRIMARY KEY (`favoritoId`, `favoritoPerfilId`, `favoritoProdutoId`) USING BTREE,
  INDEX `fk_favoritos_utilizadores1_idx`(`favoritoPerfilId`) USING BTREE,
  INDEX `fk_favoritos_produtos1_idx`(`favoritoProdutoId`) USING BTREE,
  CONSTRAINT `fk_favoritos_produtos1` FOREIGN KEY (`favoritoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_favoritos_utilizadores1` FOREIGN KEY (`favoritoPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favoritos
-- ----------------------------
INSERT INTO `favoritos` VALUES (2, 2, 8);
INSERT INTO `favoritos` VALUES (3, 2, 2);

-- ----------------------------
-- Table structure for perfis
-- ----------------------------
DROP TABLE IF EXISTS `perfis`;
CREATE TABLE `perfis`  (
  `perfilId` int(11) NOT NULL AUTO_INCREMENT,
  `perfilNome` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilEstado` enum('ativo','inativo','pendente') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilTele` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilAdmin` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`perfilId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfis
-- ----------------------------
INSERT INTO `perfis` VALUES (1, 'Jao Coelho', 'inativo', '3123213213', 'sim');
INSERT INTO `perfis` VALUES (2, 'jj', 'ativo', '1232313213', 'sim');
INSERT INTO `perfis` VALUES (3, 'jj12', 'ativo', '123231321331', 'nao');

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `produtoId` int(11) NOT NULL AUTO_INCREMENT,
  `produtoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoPreco` decimal(10, 2) NOT NULL,
  `produtoDestaque` enum('Sim','Nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Nao',
  `produtoImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoTipoCategoriaCategoriaId` int(11) NOT NULL,
  `produtoTipoCategoriaTipoId` int(11) NOT NULL,
  `produtoGenero` enum('M','F','U') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'U',
  `produtoDescricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoDesconto` decimal(5, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`produtoId`) USING BTREE,
  INDEX `fk_produtos_tipoCategorias1_idx`(`produtoTipoCategoriaCategoriaId`, `produtoTipoCategoriaTipoId`) USING BTREE,
  CONSTRAINT `fk_produtos_tipoCategorias1` FOREIGN KEY (`produtoTipoCategoriaCategoriaId`, `produtoTipoCategoriaTipoId`) REFERENCES `tipocategorias` (`tipoCategoriaCategoriaId`, `tipoCategoriaTipoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (2, 'vestido1', 25.00, 'Sim', 'images/product-3.jpg', 1, 1, 'F', 'vestido com 1 a frente', 15.00);
INSERT INTO `produtos` VALUES (3, 'calças1', 10.00, 'Sim', 'images/calcas-em-felpa.jpg', 2, 1, 'M', 'calças com 1 a frente', 10.00);
INSERT INTO `produtos` VALUES (6, 'carteira1', 8.00, 'Nao', 'images/accessories-6.jpg', 3, 4, 'U', 'carteira com 1 a frente', 0.00);
INSERT INTO `produtos` VALUES (7, 'óculos1', 20.00, 'Sim', 'images/accessories-7.jpg', 3, 4, 'U', 'oculos com 1 a frente', 25.00);
INSERT INTO `produtos` VALUES (8, 'camisola1', 15.00, 'Sim', 'images/product-9.jpg', 1, 2, 'F', 'camisola com 1 a frente', 0.00);
INSERT INTO `produtos` VALUES (10, 'vestido2', 15.00, 'Nao', 'images/product-1.jpg', 1, 3, 'F', 'vestido com 2 a frente', 0.00);
INSERT INTO `produtos` VALUES (11, 'camisola2', 30.00, 'Nao', 'images/product-4.jpg', 1, 2, 'F', 'camisola com 2 a frente', 0.00);

-- ----------------------------
-- Table structure for produtotamanhos
-- ----------------------------
DROP TABLE IF EXISTS `produtotamanhos`;
CREATE TABLE `produtotamanhos`  (
  `produtoTamanhoProdutoId` int(11) NOT NULL,
  `produtoTamanhoTamanhoId` int(11) NOT NULL,
  PRIMARY KEY (`produtoTamanhoProdutoId`, `produtoTamanhoTamanhoId`) USING BTREE,
  INDEX `fk_produtos_has_tamanho_tamanho1_idx`(`produtoTamanhoTamanhoId`) USING BTREE,
  INDEX `fk_produtos_has_tamanho_produtos1_idx`(`produtoTamanhoProdutoId`) USING BTREE,
  CONSTRAINT `fk_produtos_has_tamanho_produtos1` FOREIGN KEY (`produtoTamanhoProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_tamanho_tamanho1` FOREIGN KEY (`produtoTamanhoTamanhoId`) REFERENCES `tamanhos` (`tamanhoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtotamanhos
-- ----------------------------
INSERT INTO `produtotamanhos` VALUES (2, 1);
INSERT INTO `produtotamanhos` VALUES (6, 1);
INSERT INTO `produtotamanhos` VALUES (8, 1);
INSERT INTO `produtotamanhos` VALUES (2, 2);
INSERT INTO `produtotamanhos` VALUES (6, 2);
INSERT INTO `produtotamanhos` VALUES (8, 2);
INSERT INTO `produtotamanhos` VALUES (10, 2);
INSERT INTO `produtotamanhos` VALUES (11, 2);
INSERT INTO `produtotamanhos` VALUES (2, 3);
INSERT INTO `produtotamanhos` VALUES (8, 3);
INSERT INTO `produtotamanhos` VALUES (10, 3);
INSERT INTO `produtotamanhos` VALUES (11, 3);
INSERT INTO `produtotamanhos` VALUES (11, 4);
INSERT INTO `produtotamanhos` VALUES (3, 5);
INSERT INTO `produtotamanhos` VALUES (3, 6);

-- ----------------------------
-- Table structure for promocaoprodutos
-- ----------------------------
DROP TABLE IF EXISTS `promocaoprodutos`;
CREATE TABLE `promocaoprodutos`  (
  `promocaoProdutoPromocaoId` int(11) NOT NULL,
  `promocaoProdutoProdutoId` int(11) NOT NULL,
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
  `promocaoId` int(11) NOT NULL AUTO_INCREMENT,
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
  `slideshowImagemId` int(11) NOT NULL AUTO_INCREMENT,
  `slideshowImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemTexto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemCat` int(11) NOT NULL,
  `slideshowImagemGen` enum('M','F','U','T') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slideshowImagemOrd` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`slideshowImagemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of slideshowimagens
-- ----------------------------
INSERT INTO `slideshowimagens` VALUES (11, 'images/slider-1.jpg', 'Veja os nossos produtos', 1, 'T', 1);
INSERT INTO `slideshowimagens` VALUES (12, 'images/slider-2.jpg', 'Para Homem', 1, 'M', 2);
INSERT INTO `slideshowimagens` VALUES (13, 'images/slider-3.jpg', 'Para Mulher', 1, 'F', 3);

-- ----------------------------
-- Table structure for tamanhos
-- ----------------------------
DROP TABLE IF EXISTS `tamanhos`;
CREATE TABLE `tamanhos`  (
  `tamanhoId` int(11) NOT NULL AUTO_INCREMENT,
  `tamanhoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tamanhoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tamanhos
-- ----------------------------
INSERT INTO `tamanhos` VALUES (1, 'S');
INSERT INTO `tamanhos` VALUES (2, 'M');
INSERT INTO `tamanhos` VALUES (3, 'L');
INSERT INTO `tamanhos` VALUES (4, 'XL');
INSERT INTO `tamanhos` VALUES (5, '4-7');
INSERT INTO `tamanhos` VALUES (6, '8-11');
INSERT INTO `tamanhos` VALUES (7, '12-15');

-- ----------------------------
-- Table structure for tipocategorias
-- ----------------------------
DROP TABLE IF EXISTS `tipocategorias`;
CREATE TABLE `tipocategorias`  (
  `tipoCategoriaCategoriaId` int(11) NOT NULL,
  `tipoCategoriaTipoId` int(11) NOT NULL,
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
INSERT INTO `tipocategorias` VALUES (2, 1);
INSERT INTO `tipocategorias` VALUES (1, 2);
INSERT INTO `tipocategorias` VALUES (2, 2);
INSERT INTO `tipocategorias` VALUES (1, 3);
INSERT INTO `tipocategorias` VALUES (2, 3);
INSERT INTO `tipocategorias` VALUES (3, 4);
INSERT INTO `tipocategorias` VALUES (3, 5);
INSERT INTO `tipocategorias` VALUES (3, 8);
INSERT INTO `tipocategorias` VALUES (1, 9);
INSERT INTO `tipocategorias` VALUES (2, 9);

-- ----------------------------
-- Table structure for tipos
-- ----------------------------
DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos`  (
  `tipoId` int(11) NOT NULL AUTO_INCREMENT,
  `tipoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tipoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Calças');
INSERT INTO `tipos` VALUES (2, 'Camisolas');
INSERT INTO `tipos` VALUES (3, 'Vestidos');
INSERT INTO `tipos` VALUES (4, 'Carteiras');
INSERT INTO `tipos` VALUES (5, 'Malas');
INSERT INTO `tipos` VALUES (8, 'Óculos');
INSERT INTO `tipos` VALUES (9, 'Saias');

-- ----------------------------
-- Table structure for utilizadores
-- ----------------------------
DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE `utilizadores`  (
  `utilizadorId` int(11) NOT NULL AUTO_INCREMENT,
  `utilizadorEmail` varchar(95) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorPass` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorPerfilId` int(11) NOT NULL,
  PRIMARY KEY (`utilizadorId`, `utilizadorPerfilId`) USING BTREE,
  UNIQUE INDEX `utilizadorEmail_UNIQUE`(`utilizadorEmail`) USING BTREE,
  INDEX `fk_utilizadores_perfis1_idx`(`utilizadorPerfilId`) USING BTREE,
  CONSTRAINT `fk_utilizadores_perfis1` FOREIGN KEY (`utilizadorPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of utilizadores
-- ----------------------------
INSERT INTO `utilizadores` VALUES (1, 'tuamae', '12', 1);
INSERT INTO `utilizadores` VALUES (2, 'suc', '1', 2);
INSERT INTO `utilizadores` VALUES (3, 'suc1', '12', 3);

SET FOREIGN_KEY_CHECKS = 1;
