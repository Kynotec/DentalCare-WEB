-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Nov-2023 às 16:25
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
  `medico_id` int NOT NULL,
  `funcionario_id` int NOT NULL,
  `utente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `servico_id` (`servico_id`),
  KEY `medico_id` (`medico_id`),
  KEY `funcionario_id` (`funcionario_id`),
  KEY `utente_id` (`utente_id`)
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
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
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
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`)
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
-- Estrutura da tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utentes`
--

DROP TABLE IF EXISTS `utentes`;
CREATE TABLE IF NOT EXISTS `utentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`),
  ADD CONSTRAINT `consultas_ibfk_4` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`),
  ADD CONSTRAINT `consultas_ibfk_5` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

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
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

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
