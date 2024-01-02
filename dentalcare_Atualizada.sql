-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Jan-2024 às 14:26
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
('administrador', '1', 1702079747),
('medico', '9', 1703353863),
('utente', '10', 1703360767),
('utente', '11', 1704199135);

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
('addCarrinho', 2, 'Adicionar ao carrinho de compras', NULL, NULL, 1702079747, 1702079747),
('addEmpresa', 2, 'Adicionar dados empresa', NULL, NULL, 1702079747, 1702079747),
('addEstadoClinico', 2, 'Adicionar estado Clinico', NULL, NULL, 1702079747, 1702079747),
('administrador', 1, NULL, NULL, NULL, 1702079747, 1702079747),
('createAdministrador', 2, 'Create Administrador', NULL, NULL, 1702079747, 1702079747),
('createCategorias', 2, 'Create Categorias', NULL, NULL, 1702079747, 1702079747),
('createConsulta', 2, 'Create Consulta', NULL, NULL, 1702079747, 1702079747),
('createFaturas', 2, 'Criar Faturas', NULL, NULL, 1702079747, 1702079747),
('createFuncionario', 2, 'Create Funcionario', NULL, NULL, 1702079747, 1702079747),
('createIva', 2, 'Create Iva', NULL, NULL, 1702079747, 1702079747),
('createMedico', 2, 'Create Medico', NULL, NULL, 1702079747, 1702079747),
('createProdutos', 2, 'Create Produtos', NULL, NULL, 1702079747, 1702079747),
('createServicos', 2, 'Create Servicos', NULL, NULL, 1702079747, 1702079747),
('createUtilizador', 2, 'Create Utilizador', NULL, NULL, 1702079747, 1702079747),
('deleteCarrinho', 2, 'Elimiar  artigos do carrinho ', NULL, NULL, 1702079747, 1702079747),
('deleteCategorias', 2, 'Delete dados Categorias', NULL, NULL, 1702079747, 1702079747),
('deleteProdutos', 2, 'Delete dados Produtos', NULL, NULL, 1702079747, 1702079747),
('deleteServicos', 2, 'Delete dados Servicos', NULL, NULL, 1702079747, 1702079747),
('desmarcarConsulta', 2, 'Desmarcar Consultas', NULL, NULL, 1702079747, 1702079747),
('disableFaturas', 2, 'Desativar Faturas', NULL, NULL, 1702079747, 1702079747),
('disableIva', 2, 'Disable dados Iva', NULL, NULL, 1702079747, 1702079747),
('disableUtilizador', 2, 'Disable Utilizador', NULL, NULL, 1702079747, 1702079747),
('doLogout', 2, 'Fazer Logout', NULL, NULL, 1702079747, 1702079747),
('funcionario', 1, NULL, NULL, NULL, 1702079747, 1702079747),
('medico', 1, NULL, NULL, NULL, 1702079747, 1702079747),
('readCarrinho', 2, 'Ver carrinho compras', NULL, NULL, 1702079747, 1702079747),
('readCategorias', 2, 'Ver Categorias ', NULL, NULL, 1702079747, 1702079747),
('readConsulta', 2, 'Ver dados Consulta', NULL, NULL, 1702079747, 1702079747),
('readEmpresa', 2, 'Ver dados empresa', NULL, NULL, 1702079747, 1702079747),
('readEstadoClinico', 2, 'Ver estados Clinicos', NULL, NULL, 1702079747, 1702079747),
('readFaturas', 2, 'Ver dados Faturas', NULL, NULL, 1702079747, 1702079747),
('readIva', 2, 'Ver dados Iva', NULL, NULL, 1702079747, 1702079747),
('readProdutos', 2, 'Ver Produtos ', NULL, NULL, 1702079747, 1702079747),
('readServicos', 2, 'Ver Servicos ', NULL, NULL, 1702079747, 1702079747),
('readUtilizador', 2, 'Ler dados', NULL, NULL, 1702079747, 1702079747),
('updateCarrinho', 2, 'Atualizar artigos carrinho', NULL, NULL, 1702079747, 1702079747),
('updateCategorias', 2, 'Update dados Categorias', NULL, NULL, 1702079747, 1702079747),
('updateConsulta', 2, 'Update dados Consulta', NULL, NULL, 1702079747, 1702079747),
('updateEmpresa', 2, 'Atualizar dados empresa', NULL, NULL, 1702079747, 1702079747),
('updateEstadoClinico', 2, 'Atualizar dados Clinicos', NULL, NULL, 1702079747, 1702079747),
('updateFaturas', 2, 'Update Faturas', NULL, NULL, 1702079747, 1702079747),
('updateIva', 2, 'Update dados Iva', NULL, NULL, 1702079747, 1702079747),
('updateProdutos', 2, 'Update dados Produtos', NULL, NULL, 1702079747, 1702079747),
('updateServicos', 2, 'Update dados Servicos', NULL, NULL, 1702079747, 1702079747),
('updateUtilizador', 2, 'Update Utilizador', NULL, NULL, 1702079747, 1702079747),
('utente', 1, NULL, NULL, NULL, 1702079747, 1702079747),
('viewLoginBo', 2, 'Fazer Login BO', NULL, NULL, 1702079747, 1702079747);

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
('administrador', 'createAdministrador'),
('funcionario', 'createCategorias'),
('funcionario', 'createConsulta'),
('utente', 'createConsulta'),
('funcionario', 'createFaturas'),
('administrador', 'createFuncionario'),
('funcionario', 'createIva'),
('administrador', 'createMedico'),
('funcionario', 'createProdutos'),
('funcionario', 'createServicos'),
('funcionario', 'createUtilizador'),
('utente', 'deleteCarrinho'),
('funcionario', 'deleteCategorias'),
('funcionario', 'deleteProdutos'),
('funcionario', 'deleteServicos'),
('funcionario', 'desmarcarConsulta'),
('utente', 'desmarcarConsulta'),
('funcionario', 'disableFaturas'),
('funcionario', 'disableIva'),
('funcionario', 'disableUtilizador'),
('funcionario', 'doLogout'),
('utente', 'doLogout'),
('administrador', 'funcionario'),
('utente', 'readCarrinho'),
('funcionario', 'readCategorias'),
('funcionario', 'readConsulta'),
('utente', 'readConsulta'),
('administrador', 'readEmpresa'),
('medico', 'readEstadoClinico'),
('utente', 'readEstadoClinico'),
('funcionario', 'readFaturas'),
('funcionario', 'readIva'),
('funcionario', 'readProdutos'),
('utente', 'readProdutos'),
('funcionario', 'readServicos'),
('funcionario', 'readUtilizador'),
('utente', 'updateCarrinho'),
('funcionario', 'updateCategorias'),
('funcionario', 'updateConsulta'),
('utente', 'updateConsulta'),
('administrador', 'updateEmpresa'),
('medico', 'updateEstadoClinico'),
('funcionario', 'updateFaturas'),
('funcionario', 'updateIva'),
('funcionario', 'updateProdutos'),
('funcionario', 'updateServicos'),
('funcionario', 'updateUtilizador'),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(1, 'asdasdsad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('Realizado','Por Realizar','Cancelado','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile_id` int DEFAULT NULL,
  `servico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `descricao`, `data`, `hora`, `estado`, `profile_id`, `servico_id`) VALUES
(1, 'Visualização de Análises', '2023-12-30', '17:00:00', 'Por Realizar', 10, 1),
(2, 'dd', '2023-12-13', '09:00:00', 'Realizado', 10, 7),
(3, '22', '2023-12-30', '11:00:00', 'Cancelado', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnosticos`
--

DROP TABLE IF EXISTS `diagnosticos`;
CREATE TABLE IF NOT EXISTS `diagnosticos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time NOT NULL,
  `profile_id` int DEFAULT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `descricao`, `data`, `hora`, `profile_id`, `consulta_id`) VALUES
(8, 'Tem cancro no lis', '2024-01-02', '13:30:37', 11, 1),
(9, 'ola', '0000-00-00', '00:00:00', 10, 1),
(10, 'ola11', '2023-12-26', '18:45:00', 10, 1),
(11, 'cabra', '2023-12-26', '18:43:52', 10, 1),
(12, 'ola', '2023-12-26', '18:44:04', 10, 1),
(13, 'ee', '2023-12-26', '22:26:53', 9, 2),
(14, 'Alzeimer', '2023-12-24', '00:00:00', 10, 1),
(15, 'ola', '2023-12-26', '18:08:33', 10, 1),
(16, 'lis', '2023-12-26', '23:04:41', 10, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'Dental Care Entreprise', 'dentalcare@medic.com', '236001000', '921231231', 'Morada Dental Care ', '2310-300', 'Leiria', 200000);

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
  `filename` varchar(2000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `produto_id` int DEFAULT NULL,
  `servico_id` int DEFAULT NULL,
  `diagnostico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  KEY `servico_id` (`servico_id`,`diagnostico_id`),
  KEY `diagnostico_id` (`diagnostico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `filename`, `produto_id`, `servico_id`, `diagnostico_id`) VALUES
(1, '68C95CE7-CE4F-4DE0-A048-2CD948118C77.png', 4, NULL, NULL),
(2, '65813B2A-ED59-485C-8C53-B3FC036A6BDB.png', 5, NULL, NULL),
(3, 'BB3F398E-980C-4E69-80AD-1F4ED9863989.png', 6, NULL, NULL),
(4, '37F532E5-DDA3-495B-BC73-D2B40D84BF13.png', 7, NULL, NULL),
(5, '2EA1D8DC-8640-4A69-B8B1-6737E445F95A.png', 8, NULL, NULL),
(6, '4A246FC8-1866-4748-88BD-5DE362DDC9BB.jfif', 9, NULL, NULL),
(7, '247F6F68-0D3A-4A27-B459-8FAF8DF017C5.jfif', 10, NULL, NULL),
(8, '6B4B0B51-3EFC-45B3-A525-A40A32880050.png', 1, NULL, NULL),
(9, 'FF50594C-09AB-4089-AF7A-58E099D42B90.png', 1, NULL, NULL),
(10, 'F4740E57-CDC0-4266-9E08-2118E17D7E64.jfif', 10, NULL, NULL),
(11, 'AB6C8867-9AED-45F8-9799-891310D546C5.png', 1, NULL, NULL),
(12, 'C60C78CC-D85F-4DC7-A6FD-757888DB6CF9.jpg', NULL, 1, NULL),
(13, '59CB2D73-841F-4AFA-B763-137CEA37A3AE.jpg', NULL, 2, NULL),
(14, '2A84EED7-8C16-4833-A09B-41EF93A8AD84.jpg', NULL, 3, NULL),
(15, 'E03F217A-AB3F-4C60-B3D9-3D2D33BC0B4E.jpg', NULL, 4, NULL),
(16, 'FE8817A8-9718-486B-839A-596BB9DB3346.jpg', 11, NULL, NULL),
(17, '4B2AA62A-B582-4E33-B7A8-893E92C042D4.jpg', NULL, 5, NULL),
(18, '4BBB4D4F-8DA9-461A-83FE-F92386010101.jpg', NULL, 6, NULL),
(19, 'C021FD83-8CB7-4DE6-8CD4-E948AB09E43A.png', NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` varchar(2) DEFAULT NULL,
  `descricao` varchar(20) DEFAULT NULL,
  `emvigor` smallint NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(1, '12', 'sadad', 9),
(2, '21', 'asdads', 10);

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
  `nome` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descricao` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `precounitario` double DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `ativo`, `nome`, `descricao`, `precounitario`, `stock`, `iva_id`, `categoria_id`) VALUES
(1, 10, 'diogo o pato', 'gigigigigiig', 3, 32, 1, 1),
(2, 10, 'ahdahdh', 'dhahdhah', 2313, 1, 1, 1),
(3, 10, 'dadad', '12weqe', 123, 12313, 1, 1),
(4, 10, 'ahdahdhasasasasaaa', 'dadadda', 3, 3, 1, 1),
(5, 10, 'ahdahdhasasasasaaa', 'dadad', 2, 1, 1, 1),
(6, 10, 'dhahdha', 'dagdgag', 22, 3, 1, 1),
(7, 10, 'ahgdahdg', 'dhadhgagdg', 16263, 2, 1, 1),
(8, 10, 'dahdgagd', 'dadad', 2, 1, 1, 1),
(9, 10, 'dada', 'dadad', 1, 3, 1, 1),
(10, 10, 'gigigiig', '1dadad', 2, 12313, 1, 1),
(11, 10, 'ooo', 'gfhj', 5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `morada` varchar(25) DEFAULT NULL,
  `nif` char(9) DEFAULT NULL,
  `codigopostal` varchar(9) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `nome`, `telefone`, `morada`, `nif`, `codigopostal`, `user_id`) VALUES
(1, 'Admin', '123456789', 'Rua do admin', '999999999', '2400-555', 1),
(8, 'Admin1', '123556789', 'Rua do admin1', '999999999', '2000-555', 8),
(9, 'Medico 1', '98758748', 'Leiria', '998877889', '2400-777', 9),
(10, 'Utente 1', '98758748', 'Leiria', '998877889', '2400-777', 10),
(11, 'Utente List', '987878578', 'lll', '999999999', '3100-888', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(45) DEFAULT NULL,
  `nome` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descricao` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `preco` double DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `nome`, `descricao`, `preco`, `ativo`, `iva_id`) VALUES
(1, '2', '', 'ColocaÃ§Ã£o aparelho DentÃ¡rio', 50, 10, 2),
(2, '1', '', 'ColocaÃ§Ã£o aparelho DentÃ¡rio', 2, 9, 2),
(3, '22', '', 'ddd', 1, 10, 1),
(4, '6', '', 'hh', 50, 10, 1),
(5, '6', '', 'hh', 50, 10, 1),
(6, '6', '', 'Carecadas', 502, 10, 1),
(7, '6', '', 'Carecadasfff', 502, 10, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '136yBDeVPoz224zK7IRMZQTQowGTjOTj', '$2y$13$czRpV54ITimYkKigWaWsVu9rrTWQAWby87kHHIiUPvPa9bWj9PjzG', NULL, 'admin@gmail.com', 10, 1700790298, 1700790298, 'oj11mLYW28XTumQQPJnxnM2IyZzZkMaw_1700790298'),
(8, 'admin1', 'osVFDTj_Mr4C77Dxc8tuA_NU97OYu3F-', '$2y$13$rku.ZcKHkHq8/T/TUc3Yeu7x8nLTF1mbn0M5Ih7HWPlDFiiBpbkqK', NULL, 'admin1@gmail.com', 10, 1701190204, 1701190204, NULL),
(9, 'medico1', 'vmP12k-gZtPi5k0z25DvfoNbBdcZRYGL', '$2y$13$X1WYglTS2uJW/Ecv2hAuz.pXH/MSKYrwbG1jDOWXWOqxfBm7Dpqli', NULL, 'medico1@gmail.com', 10, 1703353863, 1703353863, NULL),
(10, 'utente1', '6CyI8qPk8tZCns-B_cUFaE8cgcESnKhZ', '$2y$13$lUSx0Eh4ymXE2Rk42Tp8d.KAm2.WiOQioSeoNrROUKVZpY802sniO', NULL, 'utente1@gmail.com', 10, 1703360767, 1703360767, NULL),
(11, 'Utente Lis', 'gfRP6Uz8B864Qr-BksrakwHXY7mNbfqA', '$2y$13$8rGtV7nGuDJDVgkUYWMPZeWG8vLxlHlGLl0sqoDeKtsfBmsqLKPRO', NULL, 'utetnelis@gmail.com', 10, 1704199135, 1704199135, NULL);

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
