-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Nov-2023 às 22:47
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dentalcare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', 1700614633),
('funcionario', '12', 1700779436),
('funcionario', '9', 1700778923),
('medico', '13', 1700779573),
('medico', '7', 1700776888),
('utente', '10', 1700779215),
('utente', '11', 1700779398),
('utente', '6', 1700685859),
('utente', '8', 1700777082);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('addCarrinho', 2, 'Adicionar ao carrinho de compras', NULL, NULL, 1700614632, 1700614632),
('addEmpresa', 2, 'Adicionar dados empresa', NULL, NULL, 1700614632, 1700614632),
('addEstadoClinico', 2, 'Adicionar estado Clinico', NULL, NULL, 1700614632, 1700614632),
('administrador', 1, NULL, NULL, NULL, 1700614633, 1700614633),
('createConsulta', 2, 'Create Consulta', NULL, NULL, 1700614632, 1700614632),
('createFaturas', 2, 'Criar Faturas', NULL, NULL, 1700614632, 1700614632),
('createFuncionario', 2, 'Create Funcionario', NULL, NULL, 1700614632, 1700614632),
('createIva', 2, 'Create Iva', NULL, NULL, 1700614632, 1700614632),
('createMedico', 2, 'Create Medico', NULL, NULL, 1700614632, 1700614632),
('createProdutos', 2, 'Create Produtos', NULL, NULL, 1700614632, 1700614632),
('createUtilizador', 2, 'Create Utilizador', NULL, NULL, 1700614632, 1700614632),
('deleteCarrinho', 2, 'Elimiar  artigos do carrinho ', NULL, NULL, 1700614632, 1700614632),
('deleteProdutos', 2, 'Delete dados Produtos', NULL, NULL, 1700614632, 1700614632),
('desmarcarConsulta', 2, 'Desmarcar Consultas', NULL, NULL, 1700614632, 1700614632),
('disableFaturas', 2, 'Desativar Faturas', NULL, NULL, 1700614632, 1700614632),
('disableIva', 2, 'Disable dados Iva', NULL, NULL, 1700614632, 1700614632),
('disableUtilizador', 2, 'Disable Utilizador', NULL, NULL, 1700614632, 1700614632),
('doLogout', 2, 'Fazer Logout', NULL, NULL, 1700614632, 1700614632),
('funcionario', 1, NULL, NULL, NULL, 1700614632, 1700614632),
('medico', 1, NULL, NULL, NULL, 1700614632, 1700614632),
('readCarrinho', 2, 'Ver carrinho compras', NULL, NULL, 1700614632, 1700614632),
('readConsulta', 2, 'Ver dados Consulta', NULL, NULL, 1700614632, 1700614632),
('readEmpresa', 2, 'Ver dados empresa', NULL, NULL, 1700614632, 1700614632),
('readEstadoClinico', 2, 'Ver estados Clinicos', NULL, NULL, 1700614632, 1700614632),
('readFaturas', 2, 'Ver dados Faturas', NULL, NULL, 1700614632, 1700614632),
('readIva', 2, 'Ver dados Iva', NULL, NULL, 1700614632, 1700614632),
('readProdutos', 2, 'Ver Produtos ', NULL, NULL, 1700614632, 1700614632),
('readUtilizador', 2, 'Ler dados', NULL, NULL, 1700614632, 1700614632),
('updateCarrinho', 2, 'Atualizar artigos carrinho', NULL, NULL, 1700614632, 1700614632),
('updateConsulta', 2, 'Update dados Consulta', NULL, NULL, 1700614632, 1700614632),
('updateEmpresa', 2, 'Atualizar dados empresa', NULL, NULL, 1700614632, 1700614632),
('updateEstadoClinico', 2, 'Atualizar dados Clinicos', NULL, NULL, 1700614632, 1700614632),
('updateFaturas', 2, 'Update Faturas', NULL, NULL, 1700614632, 1700614632),
('updateIva', 2, 'Update dados Iva', NULL, NULL, 1700614632, 1700614632),
('updateProdutos', 2, 'Update dados Produtos', NULL, NULL, 1700614632, 1700614632),
('updateUtilizador', 2, 'Update Utilizador', NULL, NULL, 1700614632, 1700614632),
('utente', 1, NULL, NULL, NULL, 1700614632, 1700614632),
('viewLoginBo', 2, 'Fazer Login BO', NULL, NULL, 1700614632, 1700614632);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('utente', 'addCarrinho'),
('administrador', 'addEmpresa'),
('medico', 'addEstadoClinico'),
('funcionario', 'createConsulta'),
('utente', 'createConsulta'),
('administrador', 'createFuncionario'),
('funcionario', 'createIva'),
('administrador', 'createMedico'),
('funcionario', 'createProdutos'),
('funcionario', 'createUtilizador'),
('utente', 'deleteCarrinho'),
('funcionario', 'deleteProdutos'),
('funcionario', 'desmarcarConsulta'),
('utente', 'desmarcarConsulta'),
('funcionario', 'disableIva'),
('administrador', 'disableUtilizador'),
('funcionario', 'disableUtilizador'),
('funcionario', 'doLogout'),
('utente', 'doLogout'),
('administrador', 'funcionario'),
('utente', 'readCarrinho'),
('funcionario', 'readConsulta'),
('utente', 'readConsulta'),
('administrador', 'readEmpresa'),
('medico', 'readEstadoClinico'),
('utente', 'readEstadoClinico'),
('funcionario', 'readIva'),
('funcionario', 'readProdutos'),
('utente', 'readProdutos'),
('funcionario', 'readUtilizador'),
('utente', 'readUtilizador'),
('utente', 'updateCarrinho'),
('funcionario', 'updateConsulta'),
('utente', 'updateConsulta'),
('administrador', 'updateEmpresa'),
('medico', 'updateEstadoClinico'),
('funcionario', 'updateIva'),
('funcionario', 'updateProdutos'),
('funcionario', 'updateUtilizador'),
('utente', 'updateUtilizador'),
('medico', 'utente'),
('funcionario', 'viewLoginBo'),
('medico', 'viewLoginBo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinhos`
--

DROP TABLE IF EXISTS `carrinhos`;
CREATE TABLE IF NOT EXISTS `carrinhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  `profile_id` int DEFAULT NULL,
  `servico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnosticos`
--

DROP TABLE IF EXISTS `diagnosticos`;
CREATE TABLE IF NOT EXISTS `diagnosticos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `profile_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefone` varchar(9) DEFAULT NULL,
  `nif` varchar(9) DEFAULT NULL,
  `morada` varchar(40) DEFAULT NULL,
  `codigopostal` varchar(8) DEFAULT NULL,
  `localidade` varchar(40) DEFAULT NULL,
  `capitalsocial` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  `ivatotal` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `profile_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `produto_id` int NOT NULL,
  `servico_id` int NOT NULL,
  `diagnostico_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  KEY `servico_id` (`servico_id`,`diagnostico_id`),
  KEY `diagnostico_id` (`diagnostico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` varchar(2) DEFAULT NULL,
  `descricao` varchar(20) DEFAULT NULL,
  `emvigor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_carrinhos`
--

DROP TABLE IF EXISTS `linha_carrinhos`;
CREATE TABLE IF NOT EXISTS `linha_carrinhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(10,2) DEFAULT NULL,
  `valorunitario` double DEFAULT NULL,
  `valoriva` double DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  `carrinho_id` int DEFAULT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carrinho_id` (`carrinho_id`),
  KEY `produto_id` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_faturas`
--

DROP TABLE IF EXISTS `linha_faturas`;
CREATE TABLE IF NOT EXISTS `linha_faturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(10,2) DEFAULT NULL,
  `valorunitario` double DEFAULT NULL,
  `valoriva` double DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  `fatura_id` int DEFAULT NULL,
  `produto_id` int DEFAULT NULL,
  `servico_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fatura_id` (`fatura_id`),
  KEY `produto_id` (`produto_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `precounitario` double DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` char(9) DEFAULT NULL,
  `morada` varchar(25) DEFAULT NULL,
  `nif` char(9) DEFAULT NULL,
  `codigopostal` varchar(9) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `nome`, `telefone`, `morada`, `nif`, `codigopostal`, `user_id`) VALUES
(11, 'Utente', '912235435', 'utente', '984938271', '3100-111', 11),
(12, 'Funcionario', '949593928', 'funcionario', '949302930', '3100-123', 12),
(13, 'Médico', '904930293', 'medico', '930293940', '3100-000', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(45) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '7pSZ4x53kHoWAgWyWWzyoVnocAQKIexN', '$2y$13$iaPF0tih3m1uqCUR//35duXBAe3S.AJgSn4hudSb9CN6wFy/b2Y3.', NULL, 'admin@gmail.com', 10, 1700498962, 1700498962, 'GWr2Z-ELPiSWpVZfFRIZIcB0Ja-4j77P_1700498962'),
(11, 'Utente', 'FVLVKqBEci7xm6WNr-6AaweG6GLQe_oM', '$2y$13$XSIXKu2R80odoOi0/4v2pucxafYK4u3LAo8Dt0wLOS9rHiK2O0W7K', NULL, 'utente@gmail.com', 10, 1700779398, 1700779398, NULL),
(12, 'funcionario', '4ejwy0V8QStbXiEA4eWZNQDCzmrdvON1', '$2y$13$oO1D4Qng8GmTkwHe2c/5tOifU0iv82.Sw26ybNKaYo5PGuviyU/o6', NULL, 'funcionario@gmail.com', 10, 1700779436, 1700779436, NULL),
(13, 'medico', 'NKnjltO7qC8l4OqkIeJeqOM-lVYReJuI', '$2y$13$ykf3WrZwUxUgYA23d2YUXOcKMVG5U.pCc9FLfZFIB7OLq/sQlU/AK', NULL, 'medico@gmail.com', 10, 1700779573, 1700779573, NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);

--
-- Limitadores para a tabela `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `diagnosticos_ibfk_2` FOREIGN KEY (`consulta_id`) REFERENCES `consultas` (`id`);

--
-- Limitadores para a tabela `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `faturas_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `imagens_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `imagens_ibfk_3` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`);

--
-- Limitadores para a tabela `linha_carrinhos`
--
ALTER TABLE `linha_carrinhos`
  ADD CONSTRAINT `linha_carrinhos_ibfk_1` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`id`),
  ADD CONSTRAINT `linha_carrinhos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `linha_faturas`
--
ALTER TABLE `linha_faturas`
  ADD CONSTRAINT `linha_faturas_ibfk_1` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`),
  ADD CONSTRAINT `linha_faturas_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `linha_faturas_ibfk_3` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
