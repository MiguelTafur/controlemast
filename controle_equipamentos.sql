-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2024 às 21:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_equipamentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anotaciones`
--

CREATE TABLE `anotaciones` (
  `idanotacion` int(11) NOT NULL,
  `equipamentoid` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `anotacion` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anotaciones`
--

INSERT INTO `anotaciones` (`idanotacion`, `equipamentoid`, `personaid`, `anotacion`, `imagen`, `datecreated`, `status`, `tipo`) VALUES
(1, 15, 1, 'Fone chegou de BH com mau contato', '165180ca0fd951d263d9c3300a3beab5.jpg', '2024-06-07 12:02:10', 3, 8),
(10, 27, 1, 'Fone Recebido do DP. Fone estava no armário de um operador(THALYTA SOARES VENTO - 013253).', 'd0dfbbe7ebe29601e5ab067ad8562fda.jpg', '2024-06-10 10:33:44', 1, 8),
(15, 28, 1, 'Fone recebido da SAMARA(Coordenadora). Fone estava no nome da POLLYANA ALVEZ CHAGAS(01773)', '', '2024-06-10 11:43:11', 1, 8),
(16, 28, 1, 'Fone recebido e entregado no mesmo dia', 'f977fbaa8bff243575c674607bd715f7.jpg', '2024-06-10 12:33:58', 2, 8),
(25, 30, 1, 'Fone no nome da Nazik - 012773 Microfone não funciona', '9cc6a30eca00674e1131ff120cee927e.jpg', '2024-06-11 10:08:59', 3, 8),
(26, 32, 1, 'Recebido do DP o dia 07 de junho de 2024', '', '2024-06-11 10:18:26', 1, 8),
(27, 31, 1, '', '208ab674afa57007fda0ffa794dfb192.jpg', '2024-06-11 10:19:00', 2, 8),
(28, 32, 1, 'Entrega novato', 'df3b06a5eda49db044f0254b76dcbfbb.jpg', '2024-06-11 10:20:48', 2, 8),
(39, 36, 1502, 'Fone adicionado', '', '2024-06-11 15:53:01', 3, 8),
(40, 36, 1502, 'Teste disponible', '', '2024-06-11 16:10:08', 1, 8),
(45, 37, 1, 'Fone não funciona', '572c52b84616e612cfc6111b7285f5f2.jpg', '2024-06-12 09:46:53', 3, 8),
(46, 38, 1, 'Fone não funciona', '764e35004d5549511b571e6952a5afc5.jpg', '2024-06-12 09:49:44', 3, 8),
(47, 39, 1, 'Fone funciona normal, porém, o arco soltou.', 'eacc9e9d553a37fa47f62aa6f421965c.jpg', '2024-06-12 09:56:20', 3, 8),
(63, 43, 1, 'Fone adicionado', '', '2024-06-12 13:46:47', 1, 8),
(64, 44, 1, 'Fone adicionado', '', '2024-06-12 13:47:23', 1, 8),
(65, 45, 1, 'Fone adicionado', '', '2024-06-12 13:48:13', 1, 8),
(66, 46, 1, 'Fone adicionado', '', '2024-06-12 13:48:52', 1, 8),
(67, 47, 1, 'Fone adicionado', '', '2024-06-12 13:49:24', 1, 8),
(68, 48, 1, 'Fone adicionado', '', '2024-06-12 13:49:54', 1, 8),
(69, 49, 1, 'Fone adicionado', '', '2024-06-12 13:50:36', 1, 8),
(70, 50, 1, 'Fone adicionado', '', '2024-06-12 13:51:39', 1, 8),
(71, 2, 1, 'Operadora sem renovação do contrato', '', '2024-06-12 13:55:53', 1, 8),
(72, 51, 1, 'Fone adicionado', '', '2024-06-12 13:57:29', 1, 8),
(73, 52, 1, 'Fone adicionado', '', '2024-06-12 13:57:56', 1, 8),
(74, 53, 1, 'Fone adicionado', '', '2024-06-12 13:59:27', 1, 8),
(75, 54, 1, 'Fone adicionado', '', '2024-06-12 14:01:08', 1, 8),
(76, 55, 1, 'Fone adicionado', '', '2024-06-12 14:02:40', 1, 8),
(77, 56, 1, 'Fone adicionado', '', '2024-06-12 14:04:35', 1, 8),
(78, 57, 1, 'Fone adicionado', '', '2024-06-12 14:06:31', 1, 8),
(79, 58, 1, 'Fone adicionado', '', '2024-06-12 14:07:41', 1, 8),
(80, 59, 1, 'Fone funciona normal, porém, o arco está quebrado.', '65c6db67d83400f954d58d8b66588939.jpg', '2024-06-12 14:36:55', 3, 8),
(81, 60, 1, 'Fone Zero bala', '', '2024-06-12 14:40:52', 1, 8),
(82, 61, 1, 'Cabo do fone ruim', '5aa221cafebc8f9daa244916e30bf40c.jpg', '2024-06-12 15:06:23', 1, 8),
(83, 62, 1, 'Fone adicionado', '', '2024-06-12 15:08:08', 1, 8),
(84, 63, 1, 'Fone trocado pela líder Regiane. Líder manifestou mau contato do fone', '', '2024-06-12 15:09:45', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `controle`
--

CREATE TABLE `controle` (
  `idcontrole` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `equipamentoid` bigint(20) NOT NULL,
  `protocolo` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `controle`
--

INSERT INTO `controle` (`idcontrole`, `personaid`, `equipamentoid`, `protocolo`, `observacion`, `datecreated`, `status`) VALUES
(1, 1497, 4, '', '', '2024-05-28 13:05:06', 1),
(5, 1500, 7, '', '', '2024-06-03 10:19:32', 1),
(6, 1501, 8, 'nathalia.jpg', '', '2024-06-03 12:33:55', 0),
(7, 1498, 2, '', '', '2024-06-03 13:56:17', 0),
(8, 1503, 11, 'paloma.jpg', '', '2024-06-03 16:07:21', 1),
(9, 1504, 12, 'gustavo.jpg', '', '2024-06-03 16:38:02', 1),
(13, 1511, 20, '29ed06cf933a78cecf0a0ea34ccda76d.jpg', '', '2024-06-06 12:08:32', 1),
(14, 1506, 14, 'd7e61bdfc1de9fa91492dc4f819b5907.jpg', '', '2024-06-06 12:13:51', 1),
(15, 1505, 13, 'd293d2ff3646a55e116ac150ff7481cb.jpg', '', '2024-06-06 12:14:02', 1),
(18, 1512, 19, '5894ae87fb09ec4a4d07d82057cbb338.jpg', '', '2024-06-06 15:10:45', 1),
(19, 1513, 21, '8bb27f37a16c9b1f793aa03e5e5d118d.jpg', '', '2024-06-06 17:43:10', 1),
(20, 1501, 8, '', 'Fone apresenta mau contato', '2024-06-07 17:35:34', 2),
(21, 1501, 23, 'cd06760fa16f764182392e04df6746af.jpg', '', '2024-06-07 17:38:04', 1),
(34, 1514, 28, 'f977fbaa8bff243575c674607bd715f7.jpg', 'Fone recebido e entregado no mesmo dia', '2024-06-10 12:33:58', 1),
(40, 1515, 31, '208ab674afa57007fda0ffa794dfb192.jpg', '', '2024-06-11 10:19:00', 1),
(41, 1516, 32, 'df3b06a5eda49db044f0254b76dcbfbb.jpg', 'Entrega novato', '2024-06-11 10:20:48', 1),
(45, 1498, 2, '', 'Operadora sem renovação do contrato', '2024-06-12 13:55:53', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `idequipamento` bigint(20) NOT NULL,
  `marca` varchar(55) NOT NULL,
  `codigo` varchar(55) DEFAULT NULL,
  `lacre` varchar(10) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1,
  `tipo` int(2) NOT NULL,
  `codigoruta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamento`
--

INSERT INTO `equipamento` (`idequipamento`, `marca`, `codigo`, `lacre`, `datecreated`, `status`, `tipo`, `codigoruta`) VALUES
(1, 'Topuse', 'G57969', '0000151', '2024-05-27 17:03:02', 1, 8, 444),
(2, 'Unixtron', '180600062', '0000423', '2024-05-28 09:36:54', 1, 8, 444),
(3, 'Plantronics', '', '0000394', '2024-05-28 09:54:54', 1, 8, 444),
(4, 'Paltronics', '', '0000220', '2024-05-28 12:04:54', 2, 8, 444),
(7, 'Unixtron', '240500883', '7900375', '2024-06-03 10:16:12', 2, 8, 444),
(8, 'Paltronics', '', '0000404', '2024-06-03 12:33:29', 3, 8, 444),
(11, 'Plantronics', '', '0003349', '2024-06-03 16:06:17', 2, 8, 444),
(12, 'TopUse', '', '0000320', '2024-06-03 16:30:35', 2, 8, 444),
(13, 'Unixtron', '177388', '0000915', '2024-06-05 08:59:45', 2, 8, 444),
(14, 'Unixtron', '201206438', '18281', '2024-06-05 09:00:13', 2, 8, 444),
(15, 'Unixtrom', '', '23917', '2024-06-05 12:03:09', 3, 8, 444),
(19, 'Paltronics', '', '18263', '2024-06-06 11:07:41', 2, 8, 444),
(20, 'Paltronics', '', '1208', '2024-06-06 12:05:04', 2, 8, 444),
(21, 'Paltronics', '', '394', '2024-06-06 17:42:05', 2, 8, 444),
(23, 'Paltronics', '', '0000447', '2024-06-07 17:36:58', 2, 8, 444),
(27, 'Unixtrom', '210707023', '0000228', '2024-06-10 10:33:44', 1, 8, 444),
(28, 'Paltronics', '', '0000353', '2024-06-10 11:43:11', 2, 8, 444),
(30, 'TopUse', 'G09494', '0000357', '2024-06-11 10:08:59', 3, 8, 444),
(31, 'Paltronics', '', '0003326', '2024-06-11 10:16:00', 2, 8, 444),
(32, 'Unixtrom', '176601', '0000080', '2024-06-11 10:18:26', 2, 8, 444),
(36, 'Teste Cuatro', 'teste cuatro', '9803', '2024-06-11 15:53:01', 1, 8, 444),
(37, 'Paltronics', '', '0000529', '2024-06-12 09:46:53', 3, 8, 444),
(38, 'Unixtrom', '176928', '0003359', '2024-06-12 09:49:43', 3, 8, 444),
(39, 'Unixtrom', '210702364', '0003375', '2024-06-12 09:56:20', 3, 8, 444),
(43, 'Paltronics', '', '0000400', '2024-06-12 13:46:47', 1, 8, 444),
(44, 'Paltronics', '', '18295', '2024-06-12 13:47:23', 1, 8, 444),
(45, 'Paltronics', '', '0023982', '2024-06-12 13:48:12', 1, 8, 444),
(46, 'Paltronics', '', '0001192', '2024-06-12 13:48:52', 1, 8, 444),
(47, 'Paltronics', '', '0000454', '2024-06-12 13:49:24', 1, 8, 444),
(48, 'Paltronics', '', '0009884', '2024-06-12 13:49:54', 1, 8, 444),
(49, 'Paltronics', '', '0000268', '2024-06-12 13:50:36', 1, 8, 444),
(50, 'Unixtrom', 'F14428', '0000221', '2024-06-12 13:51:39', 1, 8, 444),
(51, 'Unixtrom', '', '0009806', '2024-06-12 13:57:29', 1, 8, 444),
(52, 'Unixtrom', '177335', '000794', '2024-06-12 13:57:56', 1, 8, 444),
(53, 'Paltronics', '', '0000500', '2024-06-12 13:59:27', 1, 8, 444),
(54, 'Unixtrom', '177349', '0000727', '2024-06-12 14:01:08', 1, 8, 444),
(55, 'Unixtrom', '180600062', '0000982', '2024-06-12 14:02:40', 1, 8, 444),
(56, 'Unixtrom', '210702723', '0003378', '2024-06-12 14:04:35', 1, 8, 444),
(57, 'Unixtrom', '176468', '0000499', '2024-06-12 14:06:31', 1, 8, 444),
(58, 'Unixtrom', '180600565', '0001082', '2024-06-12 14:07:41', 1, 8, 444),
(59, 'Paltronics', '', '0000555', '2024-06-12 14:36:55', 3, 8, 444),
(60, 'TopUse', '57968', '0000362', '2024-06-12 14:40:52', 1, 8, 444),
(61, 'Paltronics', '', '0000955', '2024-06-12 15:06:23', 1, 8, 444),
(62, 'Paltronics', '', '0000299', '2024-06-12 15:08:08', 1, 8, 444),
(63, 'Paltronics', '', '0000349', '2024-06-12 15:09:45', 1, 8, 444);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Rutas', 'Rutas controleMast', 1),
(2, 'Dashboard', 'Dashboard controleMast', 1),
(3, 'Usuário', 'Usuários controleMast', 1),
(4, 'Gerente', 'Gerente controleMast', 1),
(5, 'Coordinador', 'Coordinador controleMast', 1),
(6, 'Líder', 'Líderes controleMast', 1),
(7, 'Operador', 'Operação controleMast', 1),
(8, 'Fone', 'Fone controleMast', 1),
(9, 'Mouse', 'Mouse controleMast', 1),
(10, 'Teclado', 'Teclado controleMast', 1),
(11, 'Tela', 'Tela controleMast', 1),
(12, 'controle', 'Controle controleMast', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(472, 1, 1, 1, 1, 1, 1),
(473, 1, 2, 1, 1, 1, 1),
(474, 1, 3, 1, 1, 1, 1),
(475, 1, 4, 1, 1, 1, 1),
(476, 1, 5, 1, 1, 1, 1),
(477, 1, 6, 1, 1, 1, 1),
(478, 1, 7, 1, 1, 1, 1),
(479, 1, 8, 1, 1, 1, 1),
(480, 1, 9, 1, 1, 1, 1),
(481, 1, 10, 1, 1, 1, 1),
(482, 1, 11, 1, 1, 1, 1),
(483, 1, 12, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `rolid` bigint(20) NOT NULL,
  `codigoruta` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `matricula`, `telefono`, `email_user`, `rolid`, `codigoruta`, `datecreated`, `status`) VALUES
(1, 'Miguel', 'Tafur', '1102387002', 2147483647, 'miguelmita03@gmail.com', 1, 444, '2022-11-12 00:00:00', 1),
(1493, 'Kylvyk Junior', 'Silva Ferreira', '011965', 37996639874, 'kylvyk.junior@globalcob.com.br', 4, 444, '2024-05-23 17:48:42', 1),
(1494, 'Larissa Kerolyn', 'Mendes Do Carmo', '017994', 37984262426, '', 4, 444, '2024-05-24 16:55:35', 1),
(1495, 'Ana Paula', 'Da Silva', '01685', 37984025197, '', 4, 444, '2024-05-24 16:56:41', 1),
(1497, 'Ana Alice', 'Miranda Basilio', '01624', 0, '', 5, 444, '2024-05-27 13:17:24', 1),
(1498, 'Anna Clara', 'Ribeiro De Oliveira', '01753', 0, '', 5, 444, '2024-05-27 13:19:30', 1),
(1500, 'Matheus Henrique', 'Alves Bispo', '110341', 37991492643, '', 4, 444, '2024-06-03 10:17:21', 1),
(1501, 'Nathalia Patricia', 'Alves', '013313', 0, '', 5, 444, '2024-06-03 12:30:20', 1),
(1502, 'Admin', 'Admin', '013301', 0, 'admin@cm.com', 1, 444, '2024-06-03 14:08:17', 1),
(1503, 'Paloma', 'Aparecida Nunes', '013333', 0, '', 5, 444, '2024-06-03 16:07:08', 1),
(1504, 'Gustavo Francisco', 'Da Silva', '013223', 0, '', 5, 444, '2024-06-03 16:29:45', 1),
(1505, 'PATRICIA GABRIELA', 'CARDOSO', '01819', 0, '', 5, 444, '2024-06-05 09:01:10', 1),
(1506, 'KARINA', 'PEREIRA DE OLIVEIRA', '013339', 0, '', 5, 444, '2024-06-05 09:01:50', 1),
(1510, 'TATIANE MEIRIANE', 'AMARO', '1731', 31991360778, '', 4, 444, '2024-06-05 16:25:17', 1),
(1511, 'LORENA GOMES', 'PEREIRA', '01776', 0, '', 5, 444, '2024-06-06 12:05:51', 1),
(1512, 'NATALIA', 'REIS DE AQUINO', '01818', 0, '', 5, 444, '2024-06-06 15:10:25', 1),
(1513, 'Regiane', 'Alves De Souza', '011920', 0, '', 5, 444, '2024-06-06 17:41:50', 1),
(1514, 'LUANA', 'MARTINS', '01828', 0, '', 5, 444, '2024-06-10 11:44:29', 1),
(1515, 'NAZIK', 'DINIZ', '012773', 0, '', 5, 444, '2024-06-11 10:14:02', 1),
(1516, 'AIRTON', 'DE PAULO JUNIOR', '013340', 0, '', 5, 444, '2024-06-11 10:15:11', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Gerente', 'Gerente ControleMast', 1),
(3, 'Coordinador', 'Coordinador controlMast', 1),
(4, 'Lider', 'Lider', 1),
(5, 'Operação', 'Operação', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ruta`
--

CREATE TABLE `ruta` (
  `idruta` bigint(20) NOT NULL,
  `codigo` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ruta`
--

INSERT INTO `ruta` (`idruta`, `codigo`, `nombre`, `datecreated`, `estado`) VALUES
(444, 9806, 'Globalcob', '2024-05-22 15:39:31', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD PRIMARY KEY (`idanotacion`),
  ADD KEY `equipamentoid` (`equipamentoid`),
  ADD KEY `personaid` (`personaid`);

--
-- Índices de tabela `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`idcontrole`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `foneid` (`equipamentoid`);

--
-- Índices de tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`idequipamento`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Índices de tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Índices de tabela `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Índices de tabela `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Índices de tabela `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Índices de tabela `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idruta`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotaciones`
--
ALTER TABLE `anotaciones`
  MODIFY `idanotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `controle`
--
ALTER TABLE `controle`
  MODIFY `idcontrole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `idequipamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT de tabela `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1517;

--
-- AUTO_INCREMENT de tabela `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `ruta`
--
ALTER TABLE `ruta`
  MODIFY `idruta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD CONSTRAINT `anotaciones_ibfk_1` FOREIGN KEY (`equipamentoid`) REFERENCES `equipamento` (`idequipamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anotaciones_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `controle_ibfk_3` FOREIGN KEY (`equipamentoid`) REFERENCES `equipamento` (`idequipamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
