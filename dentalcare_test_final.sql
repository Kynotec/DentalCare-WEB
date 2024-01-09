-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Jan-2024 às 05:53
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
create database dentalcare_test;
use dentalcare_test;
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
('administrador', '1', 1704770619),
('funcionario', '6', 1704775453),
('funcionario', '7', 1704775501),
('medico', '4', 1704775305),
('medico', '5', 1704775351),
('utente', '2', 1704772119),
('utente', '3', 1704772297);

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
('addCarrinho', 2, 'Adicionar ao carrinho de compras', NULL, NULL, 1704770619, 1704770619),
('addEmpresa', 2, 'Adicionar dados empresa', NULL, NULL, 1704770619, 1704770619),
('addEstadoClinico', 2, 'Adicionar estado Clinico', NULL, NULL, 1704770619, 1704770619),
('administrador', 1, NULL, NULL, NULL, 1704770619, 1704770619),
('createAdministrador', 2, 'Create Administrador', NULL, NULL, 1704770619, 1704770619),
('createCategorias', 2, 'Create Categorias', NULL, NULL, 1704770619, 1704770619),
('createConsulta', 2, 'Create Consulta', NULL, NULL, 1704770619, 1704770619),
('createFaturas', 2, 'Criar Faturas', NULL, NULL, 1704770619, 1704770619),
('createFuncionario', 2, 'Create Funcionario', NULL, NULL, 1704770619, 1704770619),
('createIva', 2, 'Create Iva', NULL, NULL, 1704770619, 1704770619),
('createMedico', 2, 'Create Medico', NULL, NULL, 1704770619, 1704770619),
('createProdutos', 2, 'Create Produtos', NULL, NULL, 1704770619, 1704770619),
('createServicos', 2, 'Create Servicos', NULL, NULL, 1704770619, 1704770619),
('createUtilizador', 2, 'Create Utilizador', NULL, NULL, 1704770619, 1704770619),
('deleteCarrinho', 2, 'Elimiar  artigos do carrinho ', NULL, NULL, 1704770619, 1704770619),
('deleteCategorias', 2, 'Delete dados Categorias', NULL, NULL, 1704770619, 1704770619),
('deleteProdutos', 2, 'Delete dados Produtos', NULL, NULL, 1704770619, 1704770619),
('deleteServicos', 2, 'Delete dados Servicos', NULL, NULL, 1704770619, 1704770619),
('desmarcarConsulta', 2, 'Desmarcar Consultas', NULL, NULL, 1704770619, 1704770619),
('disableFaturas', 2, 'Desativar Faturas', NULL, NULL, 1704770619, 1704770619),
('disableIva', 2, 'Disable dados Iva', NULL, NULL, 1704770619, 1704770619),
('disableUtilizador', 2, 'Disable Utilizador', NULL, NULL, 1704770619, 1704770619),
('doLogout', 2, 'Fazer Logout', NULL, NULL, 1704770619, 1704770619),
('funcionario', 1, NULL, NULL, NULL, 1704770619, 1704770619),
('medico', 1, NULL, NULL, NULL, 1704770619, 1704770619),
('readCarrinho', 2, 'Ver carrinho compras', NULL, NULL, 1704770619, 1704770619),
('readCategorias', 2, 'Ver Categorias ', NULL, NULL, 1704770619, 1704770619),
('readConsulta', 2, 'Ver dados Consulta', NULL, NULL, 1704770619, 1704770619),
('readEmpresa', 2, 'Ver dados empresa', NULL, NULL, 1704770619, 1704770619),
('readEstadoClinico', 2, 'Ver estados Clinicos', NULL, NULL, 1704770619, 1704770619),
('readFaturas', 2, 'Ver dados Faturas', NULL, NULL, 1704770619, 1704770619),
('readIva', 2, 'Ver dados Iva', NULL, NULL, 1704770619, 1704770619),
('readProdutos', 2, 'Ver Produtos ', NULL, NULL, 1704770619, 1704770619),
('readServicos', 2, 'Ver Servicos ', NULL, NULL, 1704770619, 1704770619),
('readUtilizador', 2, 'Ler dados', NULL, NULL, 1704770619, 1704770619),
('updateCarrinho', 2, 'Atualizar artigos carrinho', NULL, NULL, 1704770619, 1704770619),
('updateCategorias', 2, 'Update dados Categorias', NULL, NULL, 1704770619, 1704770619),
('updateConsulta', 2, 'Update dados Consulta', NULL, NULL, 1704770619, 1704770619),
('updateEmpresa', 2, 'Atualizar dados empresa', NULL, NULL, 1704770619, 1704770619),
('updateEstadoClinico', 2, 'Atualizar dados Clinicos', NULL, NULL, 1704770619, 1704770619),
('updateFaturas', 2, 'Update Faturas', NULL, NULL, 1704770619, 1704770619),
('updateIva', 2, 'Update dados Iva', NULL, NULL, 1704770619, 1704770619),
('updateProdutos', 2, 'Update dados Produtos', NULL, NULL, 1704770619, 1704770619),
('updateServicos', 2, 'Update dados Servicos', NULL, NULL, 1704770619, 1704770619),
('updateUtilizador', 2, 'Update Utilizador', NULL, NULL, 1704770619, 1704770619),
('utente', 1, NULL, NULL, NULL, 1704770619, 1704770619),
('viewLoginBo', 2, 'Fazer Login BO', NULL, NULL, 1704770619, 1704770619);

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
('utente', 'readFaturas'),
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
  `valortotal` decimal(10,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(1, 'Dentes'),
(2, 'Próteses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time NOT NULL,
  `estado` enum('Realizado','Por Realizar','Pago','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile_id` int DEFAULT NULL,
  `servico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `descricao`, `data`, `hora`, `estado`, `profile_id`, `servico_id`) VALUES
(1, 'Dor no Dente', '2024-01-26', '12:00:00', 'Realizado', 3, 2),
(5, 'Consulta de Rotina', '2024-02-09', '10:00:00', 'Pago', 2, 3),
(7, 'Colocar os Dentes claros', '2024-02-09', '11:00:00', 'Por Realizar', 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `descricao`, `data`, `hora`, `profile_id`, `consulta_id`) VALUES
(1, 'Maxilar em Esforço ', '2024-01-09', '05:48:48', 2, 5),
(2, 'Dente Partido', '2024-01-09', '05:49:45', 3, 1);

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
(1, 'Dental Care Entreprise', 'dentalcare@medic.com', '236001000', '921231231', 'Rua Antiga de Leiria', '2425-122', 'Monte Real', 200000);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `faturas`
--

INSERT INTO `faturas` (`id`, `data`, `valortotal`, `ivatotal`, `subtotal`, `estado`, `profile_id`) VALUES
(1, '2024-01-09 05:19:11', '48.60', '3.60', '45.00', 'Pago', 2),
(2, '2024-01-09 05:30:33', '7.38', '1.38', '6.00', 'Pago', 2),
(3, '2024-01-09 05:32:29', '110.84', '9.04', '101.80', 'Pago', 2),
(4, '2024-01-09 05:38:02', '77.76', '5.76', '72.00', 'Pago', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `filename`, `produto_id`, `servico_id`, `diagnostico_id`) VALUES
(1, 'D0561ADA-E974-4FC9-B97F-76569EAC027E.png', 1, NULL, NULL),
(2, '4BD7B6A7-88AE-4F72-85FB-9DAEB7E58485.png', 2, NULL, NULL),
(3, '920B8F26-EA7F-406A-829B-608B8B55C7F3.png', 3, NULL, NULL),
(4, 'B99D6088-F2A0-4794-8C15-3AE9F0F5E373.png', 4, NULL, NULL),
(5, '412DB9E1-9FD8-4FD8-BA57-DFC8BE579942.png', 5, NULL, NULL),
(6, '937E6EAC-7751-4007-949A-6BDAE68BC5C3.png', NULL, 1, NULL),
(7, 'E3DACAC4-043F-465B-BDF6-B90DE586A684.png', 6, NULL, NULL),
(8, '0CA28786-37B2-4C2F-AAE9-54545B431213.png', NULL, 2, NULL),
(9, 'E45BE2E7-F529-4BAF-AECB-A4B4185E8D47.png', NULL, 3, NULL),
(10, '5FC5B13D-BE1C-468F-9553-F495CB097F36.png', NULL, 4, NULL),
(11, '3B04E1C2-C6BE-44E9-ABD6-88AFB2A877AF.jpg', NULL, 5, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(1, '8', 'Taxa Reduzida', 10),
(2, '0', 'Taxa Nula', 9),
(3, '23', 'Taxa Normal', 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `servico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fatura_id` (`fatura_id`),
  KEY `produto_id` (`produto_id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linha_faturas`
--

INSERT INTO `linha_faturas` (`id`, `quantidade`, `valorunitario`, `valoriva`, `valortotal`, `fatura_id`, `produto_id`, `servico_id`) VALUES
(1, '1.00', 45, 3.6, '48.60', 1, NULL, 3),
(2, '2.00', 3, 1.38, '7.38', 2, 1, NULL),
(3, '2.00', 3, 1.38, '7.38', 3, 1, NULL),
(4, '1.00', 95.8, 7.664, '103.46', 3, 6, NULL),
(5, '10.00', 7.2, 5.76, '77.76', 4, 5, NULL);

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
  `descricao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `precounitario` double DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `ativo`, `nome`, `descricao`, `precounitario`, `stock`, `iva_id`, `categoria_id`) VALUES
(1, 10, 'Pasta de Dentes', 'A pasta de dentes permite ajudar a remover a placa bacteriana e restos de alimentos. ', 3, 10, 3, 1),
(2, 9, 'Escova de Dentes', 'A escova de dentes como o nome indica, é o que permite escovar os dentes.', 2, 32, 1, 1),
(3, 10, 'Escova de Dentes Elétrica', 'A escova de dentes elétrica trabalha a base de pilhas, ou de carregamento através de bateria. Esta simplifica o escovar dos dentes do dia a dia de todos os utentes.', 38, 18, 3, 1),
(4, 10, 'Listerine - Elixir Bucal', 'LISTERINE® Proteção Dentes & Gengivas: proporciona uma proteção para dentes e gengivas mais saudáveis e uma sensação de limpeza 3x mais duradoura do que apenas a escovagem. Para dentes mais fortes e gengivas mais saudáveis em 2 semanas.', 3.5, 47, 3, 1),
(5, 10, 'Fio Dentário', 'O uso do fio dental remove a placa bacteriana e os alimentos nos lugares onde a escova não consegue chegar facilmente.', 7.2, 24, 1, 1),
(6, 10, 'Goteira', 'A Goteira evita uma regressão do alinhamento dentário, principalmente durante a noite.', 95.8, 24, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `morada` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nif` char(9) DEFAULT NULL,
  `codigopostal` varchar(9) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `nome`, `telefone`, `morada`, `nif`, `codigopostal`, `user_id`) VALUES
(1, 'Admin', '123456789', 'Rua do admin', '123456787', '2400-555', 1),
(2, 'João Pereira', '925847878', 'Rua de Almeiriga, Matosinhos', '954878458', '4455-417', 2),
(3, 'Manuela Jordão', '913547878', 'Rua de Leiria, Casal de Cambra, Lisboa', '998754823', '2605-798', 3),
(4, 'Medico 1', '244547877', 'Leiria', '998758748', '2400-777', 4),
(5, 'Medico 2', '244536987', 'Leiria', '123659878', '2400-777', 5),
(6, 'Funcionario 1', '244787474', 'Leiria', '658784589', '2400-777', 6),
(7, 'Funcionario 2', '965487987', 'Leiria', '999888748', '2400-777', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(45) DEFAULT NULL,
  `nome` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `preco` double DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `iva_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `nome`, `descricao`, `preco`, `ativo`, `iva_id`) VALUES
(1, '1', 'Colocação de Aparelho Dentário', 'Os aparelhos dentários são dispositivos utilizados pelos médicos dentistas para fazer a correção dentária ou correção da posição dos maxilares. Deve ser sempre colocado após avaliação de um Médico dentista ortodontista.', 3151, 10, 1),
(2, '2', 'Branqueamento', 'Um branqueamento dentário externo em clínica consiste na aplicação de um agente branqueador sobre os dentes. ', 278, 10, 3),
(3, '3', 'Destartarização', 'A destartarização é um procedimento rápido, simples e bastante comum. Para além de ser indolor, ajuda a reforçar a saúde oral ao remover o tártaro, uma das principais causas de vários problemas dentários e gengivais.', 45, 10, 1),
(4, '4', 'Implante Dentário', 'A colocação de implantes unitários e parciais permite a recuperação das perdas de peças dentárias, evitando o agravar de problemas como dentes que se deslocam por falta de oponente ou perda de osso.', 1040, 10, 1),
(5, '5', 'Odontopediatria', 'A Odontopediatria (ou dentista infantil) é a área da medicina dentária que estuda a saúde oral de bebés, crianças e adolescentes (até aos 15 anos)', 40, 9, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '136yBDeVPoz224zK7IRMZQTQowGTjOTj', '$2y$13$czRpV54ITimYkKigWaWsVu9rrTWQAWby87kHHIiUPvPa9bWj9PjzG', NULL, 'admin@gmail.com', 10, 1700790298, 1700790298, 'oj11mLYW28XTumQQPJnxnM2IyZzZkMaw_1700790298'),
(2, 'utente1', 'GssR_ikCaTKuMvX1tUcXurdFvWUgwm5I', '$2y$13$DLnIl/AJuodUa.YfrPQV7eIpAIQQCfrI2dr5lpM1JhhbR7HxT4lJG', NULL, 'utente1@gmail.com', 10, 1704772119, 1704772119, 'fvQQhA-tiWfPhWPMy2kAgwN1ajb7KJxy_1704772119'),
(3, 'utente2', 't_5EoLcnc23hqgPahirVcTI1NfSr6XPR', '$2y$13$CezF3jP0OEIU1G3iJbhf7ODqadmvNVmuxxE.bmbwIFv94.xLExZnC', NULL, 'utente2@gmail.com', 10, 1704772297, 1704772297, 'u3vvD1RV1vTvXRJ-Wp9cMiOjFAQQyOix_1704772297'),
(4, 'medico1', 'dXVclxa5l1KCQWPiVywq6RmX8HLuiHdf', '$2y$13$OHjVasPtuz351ssm3LfsK.RU14f3Cbfhtqg4w4pdgStrXdnjqg8Em', NULL, 'medico1@gmail.com', 9, 1704775305, 1704775305, NULL),
(5, 'medico2', 'NTX4MuPDQdS6q5MIZdo4R50mozAkJXSE', '$2y$13$gCeOJU/gJjrJ45GCatO.eelBLY96FbzBUvEDsGnSHWORF653zWypy', NULL, 'medico2@gmail.com', 10, 1704775351, 1704775351, NULL),
(6, 'funcionario1', 'QeWb-aRwxksN3LxOpd8PHQo3xw30w8-1', '$2y$13$3nhl6oamBozxuaaMK5eQyOII0UoliaeU0ctyYIAV/PW7lABKGMLAW', NULL, 'funcionario1@gmail.com', 10, 1704775453, 1704775453, NULL),
(7, 'funcionario2', 'ia7H0orbjABLLHUMmu_ZyMTv_RAfNjbF', '$2y$13$hxgxmiZ6MOFgofPNd/jsI.KynFoGTHocZjS2SeMPAn4jgbaO6lITG', NULL, 'funcionario2@gmail.com', 9, 1704775501, 1704775501, NULL);

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
-- Limitadores para a tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD CONSTRAINT `carrinhos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `linha_carrinhos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `linha_carrinhos_ibfk_3` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`id`);

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
