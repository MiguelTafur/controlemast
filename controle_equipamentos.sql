-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 21:45:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controle_equipamentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anotaciones`
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
-- Volcado de datos para la tabla `anotaciones`
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
(84, 63, 1, 'Fone trocado pela líder Regiane. Líder manifestou mau contato do fone', '', '2024-06-12 15:09:45', 1, 8),
(85, 62, 1, 'Entregue para a líder Ana', '', '2024-06-12 16:42:22', 1, 8),
(86, 64, 1, 'Fone trocado pala operadora(), ela relata que o cliente reclama do microfone.', 'b7554a85602367565617f8111300424a.jpg', '2024-06-13 12:00:49', 1, 8),
(87, 19, 1, 'Operadora pediu conta no começo da semana', '', '2024-06-14 08:19:35', 1, 8),
(88, 62, 1, 'Fone entregado dia 13 de Junho', '7bcfdb523d0f1eb6648ca9373192cece.jpg', '2024-06-14 09:30:03', 2, 8),
(89, 65, 1, 'Fone recebido sem lacre. Operador: Jose Inacio Camargos Fonseca - 01419 (Home Office). Fone não funciona', 'Josetroca(0001233).jpeg', '2024-06-14 09:45:23', 3, 8),
(90, 63, 1, 'Entrega Novata', '8951fda9047e221e71fe63b73bc440f2.jpg', '2024-06-14 11:58:20', 2, 8),
(91, 4, 1, 'Fone apresenta avaria (amostra os fios do cabo)', 'da348ce32ce999e6926e2fae0ea118e9.jpg', '2024-06-14 15:17:01', 3, 8),
(92, 48, 1, '', 'de2385410cbc86e11f906afb99577f56.jpg', '2024-06-14 15:18:21', 2, 8),
(93, 66, 1, 'Operadora desligada (CINTIA - 01762)', '593b750660d1da169e98f60a0ff6617b.jpg', '2024-06-14 16:08:50', 1, 8),
(94, 64, 1, 'Microfone com problemas', '', '2024-06-14 16:12:07', 3, 8),
(95, 19, 1, 'Entrega na quinta-feira dia 13 de Junho de 2024', 'bd245bd0bc04c9aa274c98046372a420.jpg', '2024-06-17 10:16:02', 2, 8),
(96, 48, 1, 'Operadora relata que o som do fone é miuto baixo, porém, não escuta o cliente.', '', '2024-06-17 10:24:42', 1, 8),
(97, 49, 1, '', 'e399715cd562d3e8dbc9b9e22500f069.jpg', '2024-06-17 10:27:27', 2, 8),
(98, 36, 1, 'Entregue para o DP', '', '2024-06-17 11:45:12', 3, 8),
(99, 36, 1, 'Entregue para o entregador Marcial', '', '2024-06-17 11:45:38', 3, 8),
(100, 67, 1, 'Equipamento adicionado', '', '2024-06-17 12:00:47', 1, 9),
(104, 67, 1, 'anotacion 1 mouse', '', '2024-06-17 12:06:43', 1, 9),
(106, 67, 1, 'Alteração dos dados do Equipamento', '', '2024-06-17 12:12:44', 1, 9),
(107, 67, 1, 'teste estado', '', '2024-06-17 12:14:38', 3, 9),
(108, 68, 1, 'Equipamento adicionado', '', '2024-06-17 13:46:24', 1, 10),
(109, 68, 1, 'Alteração de dados do Equipamento', '', '2024-06-17 13:46:52', 1, 10),
(110, 68, 1, 'teste estado teclado', '', '2024-06-17 13:47:20', 3, 10),
(111, 68, 1, 'Entregue para o DP', '', '2024-06-17 13:47:44', 3, 10),
(112, 69, 1, 'Equipamento adicionado', '', '2024-06-17 13:54:58', 1, 11),
(113, 69, 1, 'Alteração de dados do Equipamento', '', '2024-06-17 13:55:19', 1, 11),
(114, 69, 1, 'teste estado tela', '', '2024-06-17 13:55:35', 3, 11),
(115, 69, 1, 'Entregue para o DP', '', '2024-06-17 13:55:59', 3, 11),
(116, 37, 1, 'Entregue para o DP', '', '2024-06-17 14:48:32', 3, 8),
(117, 38, 1, 'Entregue para o DP', '', '2024-06-17 14:51:35', 3, 8),
(118, 30, 1, 'Entregue para o DP', '', '2024-06-17 14:52:42', 3, 8),
(119, 53, 1, 'Controle de comandos solto. Entregue para o DP', '', '2024-06-17 15:03:39', 3, 8),
(120, 4, 1, 'Entregue para o DP', '', '2024-06-17 15:03:56', 3, 8),
(121, 59, 1, 'Entregue para o DP', '', '2024-06-17 15:05:42', 3, 8),
(122, 39, 1, 'Entregue para o DP', '', '2024-06-17 15:06:03', 3, 8),
(123, 8, 1, 'Fone apresenta mau contato. Entregue para o DP', '', '2024-06-17 15:08:00', 3, 8),
(124, 15, 1, 'Entregue para o DP', '', '2024-06-17 15:08:43', 3, 8),
(125, 64, 1, 'Entregue para o DP', '', '2024-06-17 15:10:28', 3, 8),
(126, 65, 1, 'Entregue para o DP', '', '2024-06-17 15:11:31', 3, 8),
(127, 70, 1, 'Fona epresenta Avaria no cabo. Fone da Ana Goes(01638). Operadora relata mau contato. Entregue para o DP', '', '2024-06-17 15:24:29', 3, 8),
(128, 48, 1, 'Entrega', '73dd0ac2a03ea59815c009a520c74cd1.jpg', '2024-06-17 15:41:22', 2, 8),
(129, 71, 1, 'Equipamento adicionado', '', '2024-06-18 08:58:41', 1, 8),
(130, 71, 1, 'Entrega sem protocolo', '86c68459c2d7c9e08c72bdceab27e66e.jpg', '2024-06-18 09:04:06', 2, 8),
(132, 45, 1, 'Entrega novato', '68aae0703e482cf67e897acad3997aaa.jpg', '2024-06-18 10:10:52', 2, 8),
(133, 73, 1, 'Equipamento adicionado', '', '2024-06-18 10:29:37', 1, 8),
(134, 74, 1, 'Equipamento adicionado', '', '2024-06-18 10:30:25', 1, 8),
(135, 75, 1, 'Equipamento adicionado', '', '2024-06-18 10:31:02', 1, 8),
(136, 76, 1, 'Equipamento adicionado', '', '2024-06-18 10:32:20', 1, 8),
(137, 77, 1, 'Equipamento adicionado', '', '2024-06-18 10:32:46', 1, 8),
(138, 78, 1, 'Equipamento adicionado', '', '2024-06-18 10:33:26', 1, 8),
(139, 79, 1, 'Fone de escuta', '', '2024-06-18 10:43:25', 1, 8),
(140, 80, 1, 'Equipamento adicionado', '', '2024-06-18 10:44:51', 1, 8),
(141, 81, 1, 'Equipamento adicionado', '', '2024-06-18 10:45:59', 1, 8),
(142, 82, 1, 'Equipamento adicionado', '', '2024-06-18 10:46:38', 1, 8),
(143, 83, 1, 'Equipamento adicionado', '', '2024-06-18 10:47:58', 1, 8),
(144, 84, 1, 'Equipamento adicionado', '', '2024-06-18 10:51:38', 1, 8),
(145, 85, 1, 'Microfone não funciona', '', '2024-06-18 11:20:53', 3, 8),
(146, 73, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 11:47:55', 1, 8),
(147, 74, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 11:48:22', 1, 8),
(148, 77, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 11:48:47', 1, 8),
(149, 81, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 11:49:18', 1, 8),
(150, 86, 1, 'Equipamento adicionado', '', '2024-06-18 11:52:59', 1, 8),
(151, 87, 1, 'Equipamento adicionado', '', '2024-06-18 11:53:30', 1, 8),
(152, 88, 1, 'Equipamento adicionado', '', '2024-06-18 11:53:57', 1, 8),
(153, 89, 1, 'Equipamento adicionado', '', '2024-06-18 11:54:34', 1, 8),
(154, 45, 1, 'Fone apresenta mau contato', '', '2024-06-18 12:04:40', 3, 8),
(155, 47, 1, 'Equipamento entregue', 'fb80550060275a56ba5c201851d30967.jpg', '2024-06-18 12:06:14', 2, 8),
(156, 66, 1, 'Equipamento entregue', '27b0e3c40a8d13ee7111bd1178add507.jpg', '2024-06-18 12:14:27', 2, 8),
(157, 90, 1, 'Equipamento adicionado', '', '2024-06-18 12:19:40', 1, 8),
(158, 90, 1, 'Entrega no dia 24 de Maio de 2024', 'b6935c329a4ecdaf55a0b2c09ac44f34.jpg', '2024-06-18 12:22:03', 2, 8),
(159, 81, 1, 'Entregue no dia 12 de Abril de 2024', 'cdfc187298a3f7113d787fb10174f5d0.jpg', '2024-06-18 12:34:02', 2, 8),
(160, 83, 1, 'Entregue no dia 12 de Abril de 2024', 'e20eb50d7c34a76a71efc9bc962c67a7.jpg', '2024-06-18 12:36:14', 2, 8),
(161, 76, 1, 'Entregue no dia 09 de Abril de 2024', '857aaecbc7de07759980bab35167feca.jpg', '2024-06-18 12:39:03', 2, 8),
(162, 80, 1, 'Entregue no dia 05 de Abril de 2024', '05f67a419158cb66dce47ad9a526f31a.jpg', '2024-06-18 12:42:03', 2, 8),
(163, 77, 1, 'Entregue no dia 18 de Março de 2024', '4102894b8a3f3973a34c0134b1a31019.jpg', '2024-06-18 12:48:50', 2, 8),
(171, 73, 1, 'Entrega sem Protocolo', '60f43d8f759cb48e90d3404b68c5973a.jpg', '2024-06-19 12:30:50', 2, 8),
(172, 74, 1, 'Alteração de dados do Equipamento', '', '2024-06-19 12:33:30', 1, 8),
(173, 74, 1, 'Entrega sem protocolo', '83c0003376e9cc6415ac57ac1b2e5f06.jpg', '2024-06-19 12:34:05', 2, 8),
(174, 75, 1, 'Entrega sem protocolo', 'ba42f6bb9c3b6b719d7e6c1b4e70ec4a.jpg', '2024-06-19 12:35:15', 2, 8),
(175, 7, 1, 'Protocolo da Entrega alterado', '9e32586dacbf90436ec209b1cabdbb75.jpg', '2024-06-19 14:00:12', 2, 8),
(176, 7, 1, 'Protocolo da Entrega alterado', 'cf724b674e04096164ecc38c25588e12.jpg', '2024-06-19 14:00:52', 2, 8),
(177, 7, 1, 'Protocolo da Entrega alterado', 'c4325eae05094b7778e591b51e3c0c4b.jpg', '2024-06-19 14:01:28', 2, 8),
(178, 84, 1, 'Entrega sem Protocolo', 'bf0db8710164900996d0d3b53862d49b.jpg', '2024-06-19 14:05:34', 2, 8),
(179, 86, 1, 'Entrega sem protocolo registrado', 'e7d1cfe25182163ee7915a0378eec041.jpg', '2024-06-19 14:08:33', 2, 8),
(180, 87, 1, 'Entrega sem Protocolo', '45fd6585c623be09eac473b799b1c9e8.jpg', '2024-06-19 14:10:05', 2, 8),
(181, 88, 1, 'Entrega sem Protocolo', '2d57833fd6c179fedb58ef076a521b95.jpg', '2024-06-19 14:10:41', 2, 8),
(182, 89, 1, 'Entrega sem Protocolo', '11d049e01493076976e0a2475bc73dd7.jpg', '2024-06-19 14:12:28', 2, 8),
(183, 63, 1, 'Operadora relata que o cliente não ouve ela. Várias ligações com inteferência', '', '2024-06-19 14:57:26', 1, 8),
(184, 43, 1, 'Equipamento entregue', '1711a49656acb900231acd24c5cb5b67.jpg', '2024-06-19 14:59:36', 2, 8),
(185, 91, 1, 'Recebido pela operadora Élida(010543). Avaria no cabo. Botão \"mute\" não funciona', 'cd491bfbe98221dc1b9d2e002caaecc7.jpg', '2024-06-19 15:20:55', 3, 8),
(186, 46, 1, 'Equipamento entregue', '9fe201b0a97192dc6b2e8fd059b99181.jpg', '2024-06-19 15:23:05', 2, 8),
(187, 21, 1, 'Alteração de dados do Equipamento', '', '2024-06-19 15:27:56', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controle`
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
-- Volcado de datos para la tabla `controle`
--

INSERT INTO `controle` (`idcontrole`, `personaid`, `equipamentoid`, `protocolo`, `observacion`, `datecreated`, `status`) VALUES
(1, 1497, 4, '', '', '2024-05-28 13:05:06', 0),
(5, 1500, 7, 'c4325eae05094b7778e591b51e3c0c4b.jpg', '', '2024-06-03 10:19:32', 1),
(6, 1501, 8, 'nathalia.jpg', '', '2024-06-03 12:33:55', 0),
(7, 1498, 2, '', '', '2024-06-03 13:56:17', 0),
(8, 1503, 11, 'paloma.jpg', '', '2024-06-03 16:07:21', 1),
(9, 1504, 12, 'gustavo.jpg', '', '2024-06-03 16:38:02', 1),
(13, 1511, 20, '29ed06cf933a78cecf0a0ea34ccda76d.jpg', '', '2024-06-06 12:08:32', 1),
(14, 1506, 14, 'd7e61bdfc1de9fa91492dc4f819b5907.jpg', '', '2024-06-06 12:13:51', 1),
(15, 1505, 13, 'd293d2ff3646a55e116ac150ff7481cb.jpg', '', '2024-06-06 12:14:02', 1),
(18, 1512, 19, '5894ae87fb09ec4a4d07d82057cbb338.jpg', '', '2024-06-06 15:10:45', 0),
(19, 1513, 21, '8bb27f37a16c9b1f793aa03e5e5d118d.jpg', '', '2024-06-06 17:43:10', 1),
(20, 1501, 8, '', 'Fone apresenta mau contato', '2024-06-07 17:35:34', 2),
(21, 1501, 23, 'cd06760fa16f764182392e04df6746af.jpg', '', '2024-06-07 17:38:04', 1),
(34, 1514, 28, 'f977fbaa8bff243575c674607bd715f7.jpg', 'Fone recebido e entregado no mesmo dia', '2024-06-10 12:33:58', 1),
(40, 1515, 31, '208ab674afa57007fda0ffa794dfb192.jpg', '', '2024-06-11 10:19:00', 1),
(41, 1516, 32, 'df3b06a5eda49db044f0254b76dcbfbb.jpg', 'Entrega novato', '2024-06-11 10:20:48', 1),
(45, 1498, 2, '', 'Operadora sem renovação do contrato', '2024-06-12 13:55:53', 3),
(46, 1512, 19, '', 'Operadora pediu conta no começo da semana', '2024-06-14 08:19:35', 4),
(47, 1520, 62, '7bcfdb523d0f1eb6648ca9373192cece.jpg', 'Fone entregado dia 13 de Junho', '2024-06-14 09:30:03', 1),
(48, 1522, 63, '8951fda9047e221e71fe63b73bc440f2.jpg', 'Entrega Novata', '2024-06-14 11:58:20', 0),
(49, 1497, 4, 'da348ce32ce999e6926e2fae0ea118e9.jpg', 'Fone apresenta avaria(amostra nos fios do cabo)', '2024-06-14 15:17:01', 2),
(50, 1497, 48, 'de2385410cbc86e11f906afb99577f56.jpg', '', '2024-06-14 15:18:21', 0),
(51, 1525, 19, 'bd245bd0bc04c9aa274c98046372a420.jpg', 'Entrega na quinta-feira dia 13 de Junho de 2024', '2024-06-17 10:16:02', 1),
(52, 1497, 48, '', 'Operadora relata que o som do fone é miuto baixo, porém, não escuta o cliente.', '2024-06-17 10:24:42', 2),
(53, 1497, 49, 'e399715cd562d3e8dbc9b9e22500f069.jpg', '', '2024-06-17 10:27:27', 1),
(54, 1527, 48, '73dd0ac2a03ea59815c009a520c74cd1.jpg', 'Entrega', '2024-06-17 15:41:22', 1),
(55, 1528, 71, '0bd09fdf936b6bdc062df773afb52a9d.jpg', 'Entrega sem protocolo', '2024-06-18 09:04:06', 1),
(56, 1549, 45, '68aae0703e482cf67e897acad3997aaa.jpg', 'Entrega novato', '2024-06-18 10:10:52', 0),
(57, 1549, 45, '', 'Fone apresenta mau contato', '2024-06-18 12:04:40', 2),
(58, 1549, 47, 'fb80550060275a56ba5c201851d30967.jpg', '', '2024-06-18 12:06:14', 1),
(59, 1551, 66, '27b0e3c40a8d13ee7111bd1178add507.jpg', '', '2024-06-18 12:14:27', 1),
(60, 1547, 90, 'b6935c329a4ecdaf55a0b2c09ac44f34.jpg', 'Entrega no dia 24 de Maio de 2024', '2024-06-18 12:22:02', 1),
(61, 1538, 81, 'cdfc187298a3f7113d787fb10174f5d0.jpg', 'Entregue no dia 12 de Abril de 2024', '2024-06-18 12:34:02', 1),
(62, 1541, 83, 'e20eb50d7c34a76a71efc9bc962c67a7.jpg', 'Entregue no dia 12 de Abril de 2024', '2024-06-18 12:36:14', 1),
(63, 1532, 76, '857aaecbc7de07759980bab35167feca.jpg', 'Entregue no dia 09 de Abril de 2024', '2024-06-18 12:39:03', 1),
(64, 1537, 80, '05f67a419158cb66dce47ad9a526f31a.jpg', 'Entregue no dia 05 de Abril de 2024', '2024-06-18 12:42:03', 1),
(65, 1533, 77, '4102894b8a3f3973a34c0134b1a31019.jpg', 'Entregue no dia 18 de Março de 2024', '2024-06-18 12:48:50', 1),
(66, 1529, 73, '60f43d8f759cb48e90d3404b68c5973a.jpg', 'Entrega sem Protocolo', '2024-06-19 12:30:50', 1),
(67, 1530, 74, '83c0003376e9cc6415ac57ac1b2e5f06.jpg', 'Entrega sem protocolo', '2024-06-19 12:34:05', 1),
(68, 1531, 75, 'ba42f6bb9c3b6b719d7e6c1b4e70ec4a.jpg', 'Entrega sem protocolo', '2024-06-19 12:35:15', 1),
(69, 1550, 84, 'bf0db8710164900996d0d3b53862d49b.jpg', 'Entrega sem Protocolo', '2024-06-19 14:05:34', 1),
(70, 1542, 86, 'e7d1cfe25182163ee7915a0378eec041.jpg', 'Entrega sem protocolo registrado', '2024-06-19 14:08:33', 1),
(71, 1543, 87, '45fd6585c623be09eac473b799b1c9e8.jpg', 'Entrega sem Protocolo', '2024-06-19 14:10:05', 1),
(72, 1545, 88, '2d57833fd6c179fedb58ef076a521b95.jpg', 'Entrega sem Protocolo', '2024-06-19 14:10:41', 1),
(73, 1546, 89, '11d049e01493076976e0a2475bc73dd7.jpg', 'Entrega sem Protocolo', '2024-06-19 14:12:28', 1),
(74, 1522, 63, '', 'Operadora relata que o cliente não ouve ela. Várias ligações com inteferência', '2024-06-19 14:57:26', 2),
(75, 1522, 43, '1711a49656acb900231acd24c5cb5b67.jpg', '', '2024-06-19 14:59:36', 1),
(76, 1552, 46, '9fe201b0a97192dc6b2e8fd059b99181.jpg', '', '2024-06-19 15:23:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamento`
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
-- Volcado de datos para la tabla `equipamento`
--

INSERT INTO `equipamento` (`idequipamento`, `marca`, `codigo`, `lacre`, `datecreated`, `status`, `tipo`, `codigoruta`) VALUES
(1, 'Topuse', 'G57969', '0000151', '2024-05-27 17:03:02', 1, 8, 444),
(2, 'Unixtron', '180600062', '0000423', '2024-05-28 09:36:54', 1, 8, 444),
(4, 'Paltronics', '', '0000220', '2024-05-28 12:04:54', 3, 8, 444),
(7, 'Unixtron', '240500883', '7900375', '2024-06-03 10:16:12', 2, 8, 444),
(8, 'Paltronics', '', '0000404', '2024-06-03 12:33:29', 3, 8, 444),
(11, 'Plantronics', '', '0003349', '2024-06-03 16:06:17', 2, 8, 444),
(12, 'TopUse', '', '0000320', '2024-06-03 16:30:35', 2, 8, 444),
(13, 'Unixtron', '177388', '0000915', '2024-06-05 08:59:45', 2, 8, 444),
(14, 'Unixtron', '201206438', '18281', '2024-06-05 09:00:13', 2, 8, 444),
(15, 'Unixtrom', '', '23917', '2024-06-05 12:03:09', 3, 8, 444),
(19, 'Paltronics', '', '18263', '2024-06-06 11:07:41', 2, 8, 444),
(20, 'Paltronics', '', '1208', '2024-06-06 12:05:04', 2, 8, 444),
(21, 'Paltronics', '', '0000394', '2024-06-06 17:42:05', 2, 8, 444),
(23, 'Paltronics', '', '0000447', '2024-06-07 17:36:58', 2, 8, 444),
(27, 'Unixtrom', '210707023', '0000228', '2024-06-10 10:33:44', 1, 8, 444),
(28, 'Paltronics', '', '0000353', '2024-06-10 11:43:11', 2, 8, 444),
(30, 'TopUse', 'G09494', '0000357', '2024-06-11 10:08:59', 3, 8, 444),
(31, 'Paltronics', '', '0003326', '2024-06-11 10:16:00', 2, 8, 444),
(32, 'Unixtrom', '176601', '0000080', '2024-06-11 10:18:26', 2, 8, 444),
(36, 'Teste Cuatro', 'teste cuatro', '9803', '2024-06-11 15:53:01', 3, 8, 444),
(37, 'Paltronics', '', '0000529', '2024-06-12 09:46:53', 3, 8, 444),
(38, 'Unixtrom', '176928', '0003359', '2024-06-12 09:49:43', 3, 8, 444),
(39, 'Unixtrom', '210702364', '0003375', '2024-06-12 09:56:20', 3, 8, 444),
(43, 'Paltronics', '', '0000400', '2024-06-12 13:46:47', 2, 8, 444),
(44, 'Paltronics', '', '18295', '2024-06-12 13:47:23', 1, 8, 444),
(45, 'Paltronics', '', '0023982', '2024-06-12 13:48:12', 3, 8, 444),
(46, 'Paltronics', '', '0001192', '2024-06-12 13:48:52', 2, 8, 444),
(47, 'Paltronics', '', '0000454', '2024-06-12 13:49:24', 2, 8, 444),
(48, 'Paltronics', '', '0009884', '2024-06-12 13:49:54', 2, 8, 444),
(49, 'Paltronics', '', '0000268', '2024-06-12 13:50:36', 2, 8, 444),
(50, 'Unixtrom', 'F14428', '0000221', '2024-06-12 13:51:39', 1, 8, 444),
(51, 'Unixtrom', '', '0009806', '2024-06-12 13:57:29', 1, 8, 444),
(52, 'Unixtrom', '177335', '000794', '2024-06-12 13:57:56', 1, 8, 444),
(53, 'Paltronics', '', '0000500', '2024-06-12 13:59:27', 3, 8, 444),
(54, 'Unixtrom', '177349', '0000727', '2024-06-12 14:01:08', 1, 8, 444),
(55, 'Unixtrom', '180600062', '0000982', '2024-06-12 14:02:40', 1, 8, 444),
(56, 'Unixtrom', '210702723', '0003378', '2024-06-12 14:04:35', 1, 8, 444),
(57, 'Unixtrom', '176468', '0000499', '2024-06-12 14:06:31', 1, 8, 444),
(58, 'Unixtrom', '180600565', '0001082', '2024-06-12 14:07:41', 1, 8, 444),
(59, 'Paltronics', '', '0000555', '2024-06-12 14:36:55', 3, 8, 444),
(60, 'TopUse', '57968', '0000362', '2024-06-12 14:40:52', 1, 8, 444),
(61, 'Paltronics', '', '0000955', '2024-06-12 15:06:23', 1, 8, 444),
(62, 'Paltronics', '', '0000299', '2024-06-12 15:08:08', 2, 8, 444),
(63, 'Paltronics', '', '0000349', '2024-06-12 15:09:45', 1, 8, 444),
(64, 'TopUse', 'B08197', '0003379', '2024-06-13 12:00:49', 3, 8, 444),
(65, 'Unixtron', '180600505', '0001233', '2024-06-14 09:45:23', 3, 8, 444),
(66, 'Paltronics', '', '0000251', '2024-06-14 16:08:50', 2, 8, 444),
(67, 'Teste Mouse', '', '36', '2024-06-17 12:00:47', 3, 9, 444),
(68, 'Teclado', 'teste teclado', '221', '2024-06-17 13:46:24', 3, 10, 444),
(69, 'Samsumg', 'teste', '321', '2024-06-17 13:54:58', 3, 11, 444),
(70, 'TopUse', 'F06457', '0023988', '2024-06-17 15:24:29', 3, 8, 444),
(71, 'Paltronics', '', '0000456', '2024-06-18 08:58:41', 2, 8, 444),
(73, 'TopUse', 'F06477', '0000946', '2024-06-18 10:29:37', 2, 8, 444),
(74, 'Unixtron', '180600562', '0000371', '2024-06-18 10:30:25', 2, 8, 444),
(75, 'Unixtron', '', '0000461', '2024-06-18 10:31:01', 2, 8, 444),
(76, 'Unixtron', '', '0000387', '2024-06-18 10:32:20', 2, 8, 444),
(77, 'Unixtron', '471468', '0001162', '2024-06-18 10:32:46', 2, 8, 444),
(78, 'Unixtron', '', '0018289', '2024-06-18 10:33:26', 1, 8, 444),
(79, 'TopUse', 'F16335', '0009830', '2024-06-18 10:43:25', 1, 8, 444),
(80, 'Paltronics', '', '0001365', '2024-06-18 10:44:51', 2, 8, 444),
(81, 'TopUse', '370044', '0003356', '2024-06-18 10:45:59', 2, 8, 444),
(82, 'Unixtron', '', '0001315', '2024-06-18 10:46:38', 1, 8, 444),
(83, 'Paltronics', '', '0000335', '2024-06-18 10:47:58', 2, 8, 444),
(84, 'Paltronics', '', '0001198', '2024-06-18 10:51:38', 2, 8, 444),
(85, 'Unixtron', '177314', '0000792', '2024-06-18 11:20:53', 3, 8, 444),
(86, 'Paltronics', '', '0000444', '2024-06-18 11:52:59', 2, 8, 444),
(87, 'TopUse', '', '0000249', '2024-06-18 11:53:30', 2, 8, 444),
(88, 'TopUse', 'F06475', '0001348', '2024-06-18 11:53:57', 2, 8, 444),
(89, 'TopUse', 'A72890', '0000229', '2024-06-18 11:54:34', 2, 8, 444),
(90, 'Paltronics', '', '0023934', '2024-06-18 12:19:40', 2, 8, 444),
(91, 'Unixtron', '220103161', '000437', '2024-06-19 15:20:55', 3, 8, 444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
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
(12, 'controle', 'Controle controleMast', 1),
(13, 'Aprendiz', 'Aprendiz controleMast', 1),
(14, 'Supervisor', 'Supervisor controleMast', 1),
(15, 'Monitor', 'Monitor controleMast', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
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
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(484, 1, 1, 1, 1, 1, 1),
(485, 1, 2, 1, 1, 1, 1),
(486, 1, 3, 1, 1, 1, 1),
(487, 1, 4, 1, 1, 1, 1),
(488, 1, 5, 1, 1, 1, 1),
(489, 1, 6, 1, 1, 1, 1),
(490, 1, 7, 1, 1, 1, 1),
(491, 1, 8, 1, 1, 1, 1),
(492, 1, 9, 1, 1, 1, 1),
(493, 1, 10, 1, 1, 1, 1),
(494, 1, 11, 1, 1, 1, 1),
(495, 1, 12, 1, 1, 1, 1),
(496, 1, 13, 1, 1, 1, 1),
(497, 1, 14, 1, 1, 1, 1),
(498, 1, 15, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
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
  `modelo` int(2) NOT NULL DEFAULT 1,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `matricula`, `telefono`, `email_user`, `rolid`, `codigoruta`, `modelo`, `datecreated`, `status`) VALUES
(1, 'Miguel', 'Tafur', '1102387002', 2147483647, 'miguelmita03@gmail.com', 1, 444, 1, '2022-11-12 00:00:00', 1),
(1493, 'Kylvyk Junior', 'Silva Ferreira', '011965', 37996639874, 'kylvyk.junior@globalcob.com.br', 4, 444, 1, '2024-05-23 17:48:42', 1),
(1494, 'Larissa Kerolyn', 'Mendes Do Carmo', '017994', 37984262426, '', 4, 444, 1, '2024-05-24 16:55:35', 1),
(1495, 'Ana Paula', 'Da Silva', '01685', 37984025197, '', 4, 444, 1, '2024-05-24 16:56:41', 1),
(1497, 'Ana Alice', 'Miranda Basilio', '01624', 0, '', 5, 444, 1, '2024-05-27 13:17:24', 1),
(1498, 'Anna Clara', 'Ribeiro De Oliveira', '01753', 0, '', 5, 444, 1, '2024-05-27 13:19:30', 0),
(1500, 'Matheus Henrique', 'Alves Bispo', '010341', 0, '', 4, 444, 1, '2024-06-03 10:17:21', 1),
(1501, 'Nathalia Patricia', 'Alves', '013313', 0, '', 5, 444, 1, '2024-06-03 12:30:20', 1),
(1502, 'Admin', 'Admin', '013301', 0, 'admin@cm.com', 1, 444, 1, '2024-06-03 14:08:17', 1),
(1503, 'Paloma', 'Aparecida Nunes', '013333', 0, '', 5, 444, 1, '2024-06-03 16:07:08', 1),
(1504, 'Gustavo Francisco', 'Da Silva', '013223', 0, '', 5, 444, 1, '2024-06-03 16:29:45', 1),
(1505, 'PATRICIA GABRIELA', 'CARDOSO', '01819', 0, '', 5, 444, 1, '2024-06-05 09:01:10', 1),
(1506, 'KARINA', 'PEREIRA DE OLIVEIRA', '013339', 0, '', 5, 444, 1, '2024-06-05 09:01:50', 1),
(1510, 'TATIANE MEIRIANE', 'AMARO', '01731', 0, '', 4, 444, 1, '2024-06-05 16:25:17', 1),
(1511, 'LORENA GOMES', 'PEREIRA', '01776', 0, '', 5, 444, 1, '2024-06-06 12:05:51', 1),
(1512, 'NATALIA', 'REIS DE AQUINO', '01818', 0, '', 5, 444, 1, '2024-06-06 15:10:25', 0),
(1513, 'Regiane', 'Alves De Souza', '011920', 0, '', 5, 444, 1, '2024-06-06 17:41:50', 1),
(1514, 'LUANA', 'MARTINS', '01828', 0, '', 5, 444, 1, '2024-06-10 11:44:29', 1),
(1515, 'NAZIK', 'DINIZ', '012773', 0, '', 5, 444, 1, '2024-06-11 10:14:02', 1),
(1516, 'AIRTON', 'DE PAULO JUNIOR', '013340', 0, '', 5, 444, 1, '2024-06-11 10:15:11', 1),
(1519, 'Alvaro', 'L', '66544', 0, '', 2, 444, 1, '2024-06-13 17:29:43', 1),
(1520, 'Jose Inacio', 'Camargos Fonseca', '01419', 0, '', 5, 444, 2, '2024-06-14 09:28:34', 1),
(1522, 'GISLENE MARIA', 'DOS SANTOS MARRA', '01929', 0, '', 5, 444, 1, '2024-06-14 11:56:44', 1),
(1525, 'BRUNA RAFAELA', 'DA SILVA', '011013', 0, '', 5, 444, 1, '2024-06-17 10:10:47', 1),
(1526, 'Samara', 'L', '98789', 0, '', 3, 444, 1, '2024-06-17 14:04:42', 1),
(1527, 'ANA LUIZA', 'GONCALVEZ GOES', '01638', 0, '', 5, 444, 1, '2024-06-17 15:38:46', 1),
(1528, 'ANA LAURA', 'GOMES NEVES', '01589', 0, '', 5, 444, 1, '2024-06-17 17:26:01', 1),
(1529, 'CAMILA IOLANDA', 'GUALBERTO DINIZ', '01727', 0, '', 5, 444, 1, '2024-06-17 17:27:34', 1),
(1530, 'CAROLINA LUIS', 'DOS SANTOS', '01622', 0, '', 5, 444, 1, '2024-06-17 17:28:37', 1),
(1531, 'DANYELA CARLA', 'DE OLIVEIRA NASCIMENTO SILVA', '013141', 0, '', 5, 444, 1, '2024-06-17 17:29:11', 1),
(1532, 'EDUARDA VITORIA', 'ALVES', '013331', 0, '', 5, 444, 1, '2024-06-17 17:29:39', 1),
(1533, 'FREDERICO', 'CUNHA DE SOUZA', '013322', 0, '', 5, 444, 1, '2024-06-17 17:30:02', 1),
(1534, 'GESSICA', 'RODRIGUES DE SOUSA', '013286', 0, '', 5, 444, 2, '2024-06-17 17:30:23', 1),
(1535, 'GLADIS CRISTINA', 'DE SOUZA SANTOS', '012878', 0, '', 5, 444, 1, '2024-06-17 17:30:45', 1),
(1536, 'GRAZIELE MARIA', 'DE PADUA VIEIRA', '015234', 0, '', 4, 444, 1, '2024-06-17 17:32:11', 1),
(1537, 'JORDANIA', 'APARECIDA ALVES', '014334', 0, '', 5, 444, 1, '2024-06-17 17:33:12', 1),
(1538, 'JORDANIA', 'VIRGILIO DA SILVA', '01769', 0, '', 5, 444, 1, '2024-06-17 17:33:38', 1),
(1539, 'JULIA', 'SOUSA SANTOS', '013013', 0, '', 5, 444, 1, '2024-06-17 17:34:00', 1),
(1540, 'MARAIZA CRISTIANE', 'ROCHA', '01744', 0, '', 5, 444, 1, '2024-06-17 17:36:11', 1),
(1541, 'MARIA EDUARDA', 'DE CASSIA COUTO', '01616', 0, '', 5, 444, 1, '2024-06-17 17:36:37', 1),
(1542, 'RAFAELA CARLA', 'LACERDA SILVA', '01647', 0, '', 5, 444, 1, '2024-06-17 17:39:33', 1),
(1543, 'RHAYANNE ISABELLE', 'COUTINHO ALVES', '013218', 0, '', 5, 444, 1, '2024-06-17 17:40:10', 1),
(1544, 'RITA DAIANE', 'DE MORAIS SILVA', '013279', 0, '', 5, 444, 2, '2024-06-17 17:40:32', 1),
(1545, 'ROSALINA ANTONIA', 'PINTO', '0132', 0, '', 5, 444, 1, '2024-06-17 17:41:11', 1),
(1546, 'ROSANE', 'ANDRADE DA SILVA', '012164', 0, '', 5, 444, 1, '2024-06-17 17:41:36', 1),
(1547, 'SHIRLEY', 'MACEDO VIEITAS', '01710', 0, '', 5, 444, 1, '2024-06-17 17:42:03', 1),
(1548, 'VALDIRENE', 'VAQUEIRO ALVES', '013131', 0, '', 5, 444, 2, '2024-06-17 17:42:46', 1),
(1549, 'ANGELICA', 'APARECIDA DE OLIVEIRA', '01839', 0, '', 5, 444, 1, '2024-06-18 10:07:27', 1),
(1550, 'NATHALIA', 'GOMES ROCHA', '018287', 0, '', 4, 444, 1, '2024-06-18 10:38:22', 1),
(1551, 'MARIA GABRIELA', 'MAIA BOMFIM', '013147', 0, '', 5, 444, 1, '2024-06-18 12:14:02', 1),
(1552, 'ELIDA CRISTINA', 'DE PAULA', '010543', 0, '', 5, 444, 2, '2024-06-19 15:22:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Gerente', 'Gerente ControleMast', 1),
(3, 'Coordinador', 'Coordinador controlMast', 1),
(4, 'Lider', 'Lider', 1),
(5, 'Operação', 'Operação', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `idruta` bigint(20) NOT NULL,
  `codigo` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`idruta`, `codigo`, `nombre`, `datecreated`, `estado`) VALUES
(444, 9806, 'Globalcob', '2024-05-22 15:39:31', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD PRIMARY KEY (`idanotacion`),
  ADD KEY `equipamentoid` (`equipamentoid`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`idcontrole`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `foneid` (`equipamentoid`);

--
-- Indices de la tabla `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`idequipamento`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `rutaid` (`codigoruta`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idruta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  MODIFY `idanotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `controle`
--
ALTER TABLE `controle`
  MODIFY `idcontrole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `idequipamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1553;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `idruta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD CONSTRAINT `anotaciones_ibfk_1` FOREIGN KEY (`equipamentoid`) REFERENCES `equipamento` (`idequipamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anotaciones_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `controle_ibfk_3` FOREIGN KEY (`equipamentoid`) REFERENCES `equipamento` (`idequipamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`codigoruta`) REFERENCES `ruta` (`idruta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
