-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2024 às 22:16
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `controle`
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
-- Extraindo dados da tabela `controle`
--

INSERT INTO `controle` (`idcontrole`, `personaid`, `equipamentoid`, `protocolo`, `observacion`, `datecreated`, `status`) VALUES
(1, 1497, 4, '', '', '2024-05-28 13:05:06', 1),
(5, 1500, 7, '', '', '2024-06-03 10:19:32', 1),
(6, 1501, 8, 'nathalia.jpg', '', '2024-06-03 12:33:55', 1),
(7, 1498, 2, '', '', '2024-06-03 13:56:17', 1),
(8, 1503, 11, 'paloma.jpg', '', '2024-06-03 16:07:21', 1),
(9, 1504, 12, 'gustavo.jpg', '', '2024-06-03 16:38:02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `idequipamento` bigint(20) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `marca` varchar(55) NOT NULL,
  `codigo` varchar(55) DEFAULT NULL,
  `lacre` varchar(10) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `codigoruta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`idequipamento`, `nombre`, `marca`, `codigo`, `lacre`, `datecreated`, `status`, `codigoruta`) VALUES
(1, 'Fone', 'Topuse', 'G57969', '0000151', '2024-05-27 17:03:02', 1, 444),
(2, 'Fone', 'Unixtron', '180600062', '0000423', '2024-05-28 09:36:54', 2, 444),
(3, 'Fone', 'Plantronics', '', '0000394', '2024-05-28 09:54:54', 1, 444),
(4, 'Fone', 'Paltronics', '', '0000220', '2024-05-28 12:04:54', 2, 444),
(7, 'Fone Monitoria', 'Unixtron', '240500883', '7900375', '2024-06-03 10:16:12', 2, 444),
(8, 'Fone', 'Paltronics', '', '0000404', '2024-06-03 12:33:29', 2, 444),
(11, 'Fone', 'Plantronics', '', '0003349', '2024-06-03 16:06:17', 2, 444),
(12, 'Fone', 'TopUse', '', '0000320', '2024-06-03 16:30:35', 2, 444);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard controleMast', 1),
(2, 'Usuários', 'Usuários controleMast', 1),
(3, 'Líderes', 'Líderes controleMast', 1),
(4, 'Operação', 'Operação controleMast', 1),
(5, 'Equipamentos', 'Equipamentos controleMast', 1),
(6, 'Rutas', 'Rutas controleMast', 1),
(7, 'controle', 'controle de equipamentos globalcob', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permisos`
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
-- Extraindo dados da tabela `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(449, 3, 1, 0, 0, 0, 0),
(450, 3, 2, 0, 0, 0, 0),
(451, 3, 4, 1, 1, 0, 0),
(454, 3, 6, 0, 0, 0, 0),
(455, 4, 1, 0, 0, 0, 0),
(456, 4, 2, 0, 0, 0, 0),
(457, 4, 4, 0, 0, 0, 0),
(458, 4, 6, 0, 0, 0, 0),
(465, 1, 1, 1, 1, 1, 1),
(466, 1, 2, 1, 1, 1, 1),
(467, 1, 3, 1, 1, 1, 1),
(468, 1, 4, 1, 1, 1, 1),
(469, 1, 5, 1, 1, 1, 1),
(470, 1, 6, 1, 1, 1, 1),
(471, 1, 7, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `persona`
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
-- Extraindo dados da tabela `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `matricula`, `telefono`, `email_user`, `rolid`, `codigoruta`, `datecreated`, `status`) VALUES
(1, 'Miguel', 'Sarmiento', '1102387002', 2147483647, 'miguelmita03@gmail.com', 1, 444, '2022-11-12 00:00:00', 1),
(1493, 'Kylvyk Junior', 'Silva Ferreira', '011965', 37996639874, 'kylvyk.junior@globalcob.com.br', 3, 444, '2024-05-23 17:48:42', 1),
(1494, 'Larissa Kerolyn', 'Mendes Do Carmo', '017994', 37984262426, '', 3, 444, '2024-05-24 16:55:35', 1),
(1495, 'Ana Paula', 'Da Silva', '01685', 37984025197, '', 3, 444, '2024-05-24 16:56:41', 1),
(1497, 'Ana Alice', 'Miranda Basilio', '01624', 0, '', 4, 444, '2024-05-27 13:17:24', 1),
(1498, 'Anna Clara', 'Ribeiro De Oliveira', '01753', 0, '', 4, 444, '2024-05-27 13:19:30', 1),
(1500, 'Matheus Henrique', 'Alves Bispo', '110341', 37991492643, '', 3, 444, '2024-06-03 10:17:21', 1),
(1501, 'Nathalia Patricia', 'Alves', '13313', 0, '', 4, 444, '2024-06-03 12:30:20', 1),
(1502, 'Admin', 'Admin', '013301', 0, 'admin@cm.com', 1, 444, '2024-06-03 14:08:17', 1),
(1503, 'Paloma', 'Aparecida Nunes', '133333', 0, '', 4, 444, '2024-06-03 16:07:08', 1),
(1504, 'Gustavo Francisco', 'Da Silva', '13223', 0, '', 4, 444, '2024-06-03 16:29:45', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Extraindo dados da tabela `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Supervisor', 'Supervisor ControleMast', 1),
(3, 'Lider', 'Lider', 1),
(4, 'Operação', 'Operação', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ruta`
--

CREATE TABLE `ruta` (
  `idruta` bigint(20) NOT NULL,
  `codigo` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ruta`
--

INSERT INTO `ruta` (`idruta`, `codigo`, `nombre`, `datecreated`, `estado`) VALUES
(444, 9806, 'Globalcob', '2024-05-22 15:39:31', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`idcontrole`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `foneid` (`equipamentoid`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`idequipamento`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Índices para tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Índices para tabela `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Índices para tabela `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Índices para tabela `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Índices para tabela `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idruta`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `controle`
--
ALTER TABLE `controle`
  MODIFY `idcontrole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `idequipamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT de tabela `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1505;

--
-- AUTO_INCREMENT de tabela `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `ruta`
--
ALTER TABLE `ruta`
  MODIFY `idruta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `controle_ibfk_3` FOREIGN KEY (`equipamentoid`) REFERENCES `equipamento` (`idequipamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
