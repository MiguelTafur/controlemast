-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 22:44
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
(1, 15, 1, 'Fone chegou de BH com mau contato', '165180ca0fd951d263d9c3300a3beab5.jpg', '2024-06-07 00:00:00', 3, 8),
(10, 27, 1, 'Fone Recebido do DP. Fone estava no armário de um operador(THALYTA SOARES VENTO - 013253).', 'd0dfbbe7ebe29601e5ab067ad8562fda.jpg', '2024-06-10 00:00:00', 1, 8),
(15, 28, 1, 'Fone recebido da SAMARA(Coordenadora). Fone estava no nome da POLLYANA ALVEZ CHAGAS(01773)', '', '2024-06-10 00:00:00', 1, 8),
(16, 28, 1, 'Fone recebido e entregado no mesmo dia', 'f977fbaa8bff243575c674607bd715f7.jpg', '2024-06-10 00:00:00', 2, 8),
(25, 30, 1, 'Fone no nome da Nazik - 012773 Microfone não funciona', '9cc6a30eca00674e1131ff120cee927e.jpg', '2024-06-11 00:00:00', 3, 8),
(26, 32, 1, 'Recebido do DP o dia 07 de junho de 2024', '', '2024-06-11 00:00:00', 1, 8),
(27, 31, 1, '', '208ab674afa57007fda0ffa794dfb192.jpg', '2024-06-11 00:00:00', 2, 8),
(28, 32, 1, 'Entrega novato', 'df3b06a5eda49db044f0254b76dcbfbb.jpg', '2024-06-11 00:00:00', 2, 8),
(39, 36, 1502, 'Fone adicionado', '', '2024-06-11 00:00:00', 3, 8),
(40, 36, 1502, 'Teste disponible', '', '2024-06-11 00:00:00', 1, 8),
(45, 37, 1, 'Fone não funciona', '572c52b84616e612cfc6111b7285f5f2.jpg', '2024-06-12 00:00:00', 3, 8),
(46, 38, 1, 'Fone não funciona', '764e35004d5549511b571e6952a5afc5.jpg', '2024-06-12 00:00:00', 3, 8),
(47, 39, 1, 'Fone funciona normal, porém, o arco soltou.', 'eacc9e9d553a37fa47f62aa6f421965c.jpg', '2024-06-12 00:00:00', 3, 8),
(63, 43, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(64, 44, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(65, 45, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(66, 46, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(67, 47, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(68, 48, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(69, 49, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(70, 50, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(71, 2, 1, 'Operadora sem renovação do contrato', '', '2024-06-12 00:00:00', 1, 8),
(72, 51, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(73, 52, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(74, 53, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(75, 54, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(76, 55, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(77, 56, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(78, 57, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(79, 58, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(80, 59, 1, 'Fone funciona normal, porém, o arco está quebrado.', '65c6db67d83400f954d58d8b66588939.jpg', '2024-06-12 00:00:00', 3, 8),
(81, 60, 1, 'Fone Zero bala', '', '2024-06-12 00:00:00', 1, 8),
(82, 61, 1, 'Cabo do fone ruim', '5aa221cafebc8f9daa244916e30bf40c.jpg', '2024-06-12 00:00:00', 1, 8),
(83, 62, 1, 'Fone adicionado', '', '2024-06-12 00:00:00', 1, 8),
(84, 63, 1, 'Fone trocado pela líder Regiane. Líder manifestou mau contato do fone', '', '2024-06-12 00:00:00', 1, 8),
(85, 62, 1, 'Entregue para a líder Ana', '', '2024-06-12 00:00:00', 1, 8),
(86, 64, 1, 'Fone trocado pala operadora(), ela relata que o cliente reclama do microfone.', 'b7554a85602367565617f8111300424a.jpg', '2024-06-13 00:00:00', 1, 8),
(87, 19, 1, 'Operadora pediu conta no começo da semana', '', '2024-06-14 00:00:00', 1, 8),
(88, 62, 1, 'Fone entregado dia 13 de Junho', '7bcfdb523d0f1eb6648ca9373192cece.jpg', '2024-06-14 00:00:00', 2, 8),
(89, 65, 1, 'Fone recebido sem lacre. Operador: Jose Inacio Camargos Fonseca - 01419 (Home Office). Fone não funciona', 'Josetroca(0001233).jpeg', '2024-06-14 00:00:00', 3, 8),
(90, 63, 1, 'Entrega Novata', '8951fda9047e221e71fe63b73bc440f2.jpg', '2024-06-14 00:00:00', 2, 8),
(91, 4, 1, 'Fone apresenta avaria (amostra os fios do cabo)', 'da348ce32ce999e6926e2fae0ea118e9.jpg', '2024-06-14 00:00:00', 3, 8),
(92, 48, 1, '', 'de2385410cbc86e11f906afb99577f56.jpg', '2024-06-14 00:00:00', 2, 8),
(93, 66, 1, 'Operadora desligada (CINTIA - 01762)', '593b750660d1da169e98f60a0ff6617b.jpg', '2024-06-14 00:00:00', 1, 8),
(94, 64, 1, 'Microfone com problemas', '', '2024-06-14 00:00:00', 3, 8),
(95, 19, 1, 'Entrega na quinta-feira dia 13 de Junho de 2024', 'bd245bd0bc04c9aa274c98046372a420.jpg', '2024-06-17 00:00:00', 2, 8),
(96, 48, 1, 'Operadora relata que o som do fone é miuto baixo, porém, não escuta o cliente.', '', '2024-06-17 00:00:00', 1, 8),
(97, 49, 1, '', 'e399715cd562d3e8dbc9b9e22500f069.jpg', '2024-06-17 00:00:00', 2, 8),
(98, 36, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(99, 36, 1, 'Entregue para o entregador Marcial', '', '2024-06-17 00:00:00', 3, 8),
(100, 67, 1, 'Equipamento adicionado', '', '2024-06-17 00:00:00', 1, 9),
(104, 67, 1, 'anotacion 1 mouse', '', '2024-06-17 00:00:00', 1, 9),
(106, 67, 1, 'Alteração dos dados do Equipamento', '', '2024-06-17 00:00:00', 1, 9),
(107, 67, 1, 'teste estado', '', '2024-06-17 00:00:00', 3, 9),
(108, 68, 1, 'Equipamento adicionado', '', '2024-06-17 00:00:00', 1, 10),
(109, 68, 1, 'Alteração de dados do Equipamento', '', '2024-06-17 00:00:00', 1, 10),
(110, 68, 1, 'teste estado teclado', '', '2024-06-17 00:00:00', 3, 10),
(111, 68, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 10),
(116, 37, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(117, 38, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(118, 30, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(119, 53, 1, 'Controle de comandos solto. Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(120, 4, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(121, 59, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(122, 39, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(123, 8, 1, 'Fone apresenta mau contato. Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(124, 15, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(125, 64, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(126, 65, 1, 'Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(127, 70, 1, 'Fona epresenta Avaria no cabo. Fone da Ana Goes(01638). Operadora relata mau contato. Entregue para o DP', '', '2024-06-17 00:00:00', 3, 8),
(128, 48, 1, 'Entrega', '73dd0ac2a03ea59815c009a520c74cd1.jpg', '2024-06-17 00:00:00', 2, 8),
(129, 71, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(130, 71, 1, 'Entrega sem protocolo', '86c68459c2d7c9e08c72bdceab27e66e.jpg', '2024-06-18 00:00:00', 2, 8),
(132, 45, 1, 'Entrega novato', '68aae0703e482cf67e897acad3997aaa.jpg', '2024-06-18 00:00:00', 2, 8),
(133, 73, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(134, 74, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(135, 75, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(136, 76, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(137, 77, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(138, 78, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(139, 79, 1, 'Fone de escuta', '', '2024-06-18 00:00:00', 1, 8),
(140, 80, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(141, 81, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(142, 82, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(143, 83, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(144, 84, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(145, 85, 1, 'Microfone não funciona', '', '2024-06-18 00:00:00', 3, 8),
(146, 73, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 00:00:00', 1, 8),
(147, 74, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 00:00:00', 1, 8),
(148, 77, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 00:00:00', 1, 8),
(149, 81, 1, 'Alteração de dados do Equipamento', '', '2024-06-18 00:00:00', 1, 8),
(150, 86, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(151, 87, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(152, 88, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(153, 89, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(154, 45, 1, 'Fone apresenta mau contato', '', '2024-06-18 00:00:00', 3, 8),
(155, 47, 1, 'Equipamento entregue', 'fb80550060275a56ba5c201851d30967.jpg', '2024-06-18 00:00:00', 2, 8),
(156, 66, 1, 'Equipamento entregue', '27b0e3c40a8d13ee7111bd1178add507.jpg', '2024-06-18 00:00:00', 2, 8),
(157, 90, 1, 'Equipamento adicionado', '', '2024-06-18 00:00:00', 1, 8),
(158, 90, 1, 'Entrega no dia 24 de Maio de 2024', 'b6935c329a4ecdaf55a0b2c09ac44f34.jpg', '2024-06-18 00:00:00', 2, 8),
(159, 81, 1, 'Entregue no dia 12 de Abril de 2024', 'cdfc187298a3f7113d787fb10174f5d0.jpg', '2024-06-18 00:00:00', 2, 8),
(160, 83, 1, 'Entregue no dia 12 de Abril de 2024', 'e20eb50d7c34a76a71efc9bc962c67a7.jpg', '2024-06-18 00:00:00', 2, 8),
(161, 76, 1, 'Entregue no dia 09 de Abril de 2024', '857aaecbc7de07759980bab35167feca.jpg', '2024-06-18 00:00:00', 2, 8),
(162, 80, 1, 'Entregue no dia 05 de Abril de 2024', '05f67a419158cb66dce47ad9a526f31a.jpg', '2024-06-18 00:00:00', 2, 8),
(163, 77, 1, 'Entregue no dia 18 de Março de 2024', '4102894b8a3f3973a34c0134b1a31019.jpg', '2024-06-18 00:00:00', 2, 8),
(171, 73, 1, 'Entrega sem Protocolo', '60f43d8f759cb48e90d3404b68c5973a.jpg', '2024-06-19 00:00:00', 2, 8),
(172, 74, 1, 'Alteração de dados do Equipamento', '', '2024-06-19 00:00:00', 1, 8),
(173, 74, 1, 'Entrega sem protocolo', '83c0003376e9cc6415ac57ac1b2e5f06.jpg', '2024-06-19 00:00:00', 2, 8),
(174, 75, 1, 'Entrega sem protocolo', 'ba42f6bb9c3b6b719d7e6c1b4e70ec4a.jpg', '2024-06-19 00:00:00', 2, 8),
(175, 7, 1, 'Protocolo da Entrega alterado', '9e32586dacbf90436ec209b1cabdbb75.jpg', '2024-06-19 00:00:00', 2, 8),
(176, 7, 1, 'Protocolo da Entrega alterado', 'cf724b674e04096164ecc38c25588e12.jpg', '2024-06-19 00:00:00', 2, 8),
(177, 7, 1, 'Protocolo da Entrega alterado', 'c4325eae05094b7778e591b51e3c0c4b.jpg', '2024-06-19 00:00:00', 2, 8),
(178, 84, 1, 'Entrega sem Protocolo', 'bf0db8710164900996d0d3b53862d49b.jpg', '2024-06-19 00:00:00', 2, 8),
(179, 86, 1, 'Entrega sem protocolo registrado', 'e7d1cfe25182163ee7915a0378eec041.jpg', '2024-06-19 00:00:00', 2, 8),
(180, 87, 1, 'Entrega sem Protocolo', '45fd6585c623be09eac473b799b1c9e8.jpg', '2024-06-19 00:00:00', 2, 8),
(181, 88, 1, 'Entrega sem Protocolo', '2d57833fd6c179fedb58ef076a521b95.jpg', '2024-06-19 00:00:00', 2, 8),
(182, 89, 1, 'Entrega sem Protocolo', '11d049e01493076976e0a2475bc73dd7.jpg', '2024-06-19 00:00:00', 2, 8),
(183, 63, 1, 'Operadora relata que o cliente não ouve ela. Várias ligações com inteferência', '', '2024-06-19 00:00:00', 1, 8),
(184, 43, 1, 'Equipamento entregue', '1711a49656acb900231acd24c5cb5b67.jpg', '2024-06-19 00:00:00', 2, 8),
(185, 91, 1, 'Recebido pela operadora Élida(010543). Avaria no cabo. Botão \"mute\" não funciona', 'cd491bfbe98221dc1b9d2e002caaecc7.jpg', '2024-06-19 00:00:00', 3, 8),
(186, 46, 1, 'Equipamento entregue', '9fe201b0a97192dc6b2e8fd059b99181.jpg', '2024-06-19 00:00:00', 2, 8),
(187, 21, 1, 'Alteração de dados do Equipamento', '', '2024-06-19 00:00:00', 2, 8),
(188, 92, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 8),
(189, 92, 1, 'Entrega no dia 28 de março de 2024', '28148d2470e5e9b50c3a4a027d423afe.jpg', '2024-06-20 00:00:00', 2, 8),
(190, 83, 1, 'Fone apresenta Avaria no cabo', '2e2e4905e4115cf7e01aa3a0426f1ba5.jpg', '2024-06-20 00:00:00', 3, 8),
(191, 58, 1, 'Controle de comandos quebrado', 'ca00289ad9bffebf306b2d49cb12c8f9.jpg', '2024-06-20 00:00:00', 2, 8),
(198, 94, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(199, 95, 1, 'Operadora(ROBERTA ALANNA OLIVEIRA SILVA - 01632) não voltou mais para a empresa.', '', '2024-06-20 00:00:00', 1, 8),
(200, 96, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(201, 97, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(202, 98, 1, 'Operadora relata que o som do fone é miuto baixo. O arco do fone está solto', 'acdea4c2521881e3c9465fcb1530edfb.jpg', '2024-06-20 00:00:00', 3, 8),
(203, 2, 1, 'Equipamento entregue', 'e3b4e508020f44121f5eba4e8ec8ec30.jpg', '2024-06-20 00:00:00', 2, 8),
(204, 99, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(205, 100, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(206, 101, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(207, 102, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(208, 103, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(209, 104, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(210, 105, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(211, 106, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(212, 107, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(213, 108, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(214, 109, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(215, 110, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(216, 111, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(217, 112, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(218, 113, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(219, 114, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(220, 115, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(221, 116, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(222, 117, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(223, 118, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(224, 119, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(225, 120, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(226, 121, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(227, 122, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(228, 123, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(229, 124, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(230, 125, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(231, 126, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(232, 127, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(233, 128, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(234, 129, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(235, 130, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(236, 131, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(237, 132, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(238, 132, 1, 'Alteração de dados do Equipamento', '', '2024-06-20 00:00:00', 1, 11),
(239, 133, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(240, 134, 1, 'Botão de power quebrado', '0ee3b03c0dd54cc1f64473df4d81389d.jpg', '2024-06-20 00:00:00', 1, 11),
(241, 135, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(242, 136, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(243, 137, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(244, 138, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(245, 139, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(246, 140, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(247, 141, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(248, 142, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(249, 143, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(250, 144, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(251, 145, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(252, 146, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(253, 147, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(254, 148, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(255, 149, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(256, 150, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(257, 151, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(258, 152, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(259, 153, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(260, 154, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(261, 155, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(262, 156, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(263, 157, 1, 'Equipamento adicionado', '', '2024-06-20 00:00:00', 1, 11),
(264, 158, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(265, 159, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(266, 160, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(267, 161, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(268, 162, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(269, 163, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(270, 164, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(271, 165, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(272, 166, 1, 'Patrimônio TK', '', '2024-06-21 00:00:00', 1, 16),
(273, 167, 1, 'Patrimônio TK', '', '2024-06-21 00:00:00', 1, 16),
(274, 168, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(275, 169, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(276, 170, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(277, 171, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(278, 172, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(279, 173, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(280, 174, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(281, 175, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(282, 176, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(283, 177, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(284, 178, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(285, 179, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(286, 180, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(287, 181, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(288, 182, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(289, 183, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(290, 184, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(291, 185, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(292, 186, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(293, 187, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(294, 188, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(295, 189, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(296, 190, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(297, 90, 1, 'Microfone chiando, Avaria no cabo e voz robotizada', '', '2024-06-21 00:00:00', 3, 8),
(299, 192, 1, 'Fone entregue no dia 28 de Fevereiro de 2024. Microfone falhando', 'Deborah(0000240).jpg', '2024-06-21 00:00:00', 3, 8),
(300, 27, 1, 'Equipamento entregue', 'fe89e2f05a5d8e102e9c5af9578dbe6b.jpg', '2024-06-21 00:00:00', 2, 8),
(301, 193, 1, 'Equipamento adicionado', '', '2024-06-21 00:00:00', 1, 16),
(302, 194, 1, 'Fone apresenta avaria no cabo', '3ea1da6786e138248bf4cf3d973ff131.jpg', '2024-06-24 00:00:00', 3, 8),
(303, 194, 1, 'Alteração de dados do Equipamento', '', '2024-06-24 00:00:00', 3, 8),
(304, 194, 1, 'Responsável do fone: SIRLEN MARCIA BORGES - 012783', '', '2024-06-24 00:00:00', 3, 8),
(305, 95, 1, 'Equipamento entregue', '2223e3758c4b26706cd9b6376733c7c7.jpg', '2024-06-24 00:00:00', 2, 8),
(306, 13, 1, 'Operadora pediu conta', '', '2024-06-24 00:00:00', 1, 8),
(307, 44, 1, 'Equipamento entregue', 'dab16b6e5a72fa1f20d47a5b958bd066.jpg', '2024-06-24 00:00:00', 2, 8),
(308, 84, 1, 'Microfone não funciona', '', '2024-06-25 00:00:00', 3, 8),
(309, 60, 1, 'Equipamento entregue', '93c0772c8770db3d44307ca05479fddd.jpg', '2024-06-25 00:00:00', 2, 8),
(310, 61, 1, 'Cabo solto', '', '2024-06-25 00:00:00', 3, 8),
(311, 57, 1, 'Entrega novata', '3c47311acd8c2bcc63fa611e697c2fa6.jpg', '2024-06-25 00:00:00', 2, 8),
(312, 56, 1, 'Entrega novata', 'dffd262c24e06e4f483bfcf934ee4899.jpg', '2024-06-25 00:00:00', 2, 8),
(313, 195, 1, 'Fone novo enviado de BH', '066832e7d6cd19d0b29cbd43402bd46b.jpg', '2024-06-26 00:00:00', 1, 8),
(314, 196, 1, 'Fone novo enviado de BH', '2f0be3574c9f13a968ac47a905ceeea3.jpg', '2024-06-26 00:00:00', 1, 8),
(315, 197, 1, 'Fone novo enviado de BH', 'c225681b598074164d9f38c5780605f6.jpg', '2024-06-26 00:00:00', 1, 8),
(316, 198, 1, 'Fone novo enviado de BH', '026c395d8f11bdfecdefddf32d6486e5.jpg', '2024-06-26 00:00:00', 1, 8),
(317, 199, 1, 'Fone novo enviado de BH', '0909de25dd5fee4f329d1f2be6357d14.jpg', '2024-06-26 00:00:00', 1, 8),
(318, 200, 1, 'Fone novo enviado de BH', 'abe1eb16afb0220f74812b9bff017e92.jpg', '2024-06-26 00:00:00', 1, 8),
(319, 201, 1, 'Fone novo enviado BH', 'f23c152580e3cfc66a74d0e28820d971.jpg', '2024-06-26 00:00:00', 1, 8),
(320, 202, 1, 'Fone novo enviado de BH', 'e7143f0a604661ffebe54fa2e6050548.jpg', '2024-06-26 00:00:00', 1, 8),
(321, 202, 1, 'Entrega novata', 'c35f3a8653b98d625a08cb8d175468a2.jpg', '2024-06-27 00:00:00', 2, 8),
(322, 203, 1, 'Fone no nome do operador Pierre(01799)... Microfone não funciona e apresenta avaria no cabo', 'pierre18288.jpg', '2024-06-27 00:00:00', 3, 8),
(323, 201, 1, 'Equipamento entregue', '52a24e953ae3d67077105aa5201e3d3b.jpg', '2024-06-27 00:00:00', 2, 8),
(324, 28, 1, 'Operadora manifesta que o som é miuto baixo', '', '2024-06-27 00:00:00', 1, 8),
(325, 50, 1, 'Equipamento entregue', 'fc79f5c4addd80d3c45cff6f1f7d10db.jpg', '2024-06-27 00:00:00', 2, 8),
(326, 204, 1, 'Fone recebido do Operador(CHARLES - 01425). Manifestou mau contato.', '02763a3d24e6fea9d28b1d979c4dc0a4.jpg', '2024-06-27 00:00:00', 1, 8),
(327, 200, 1, 'Equipamento entregue', '90bf0d5ab0f8bae8eb62d7f550a63334.jpg', '2024-06-27 00:00:00', 2, 8),
(328, 95, 1, 'Rescisão indireta', '', '2024-06-28 00:00:00', 1, 8);

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
  `datecreated` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `controle`
--

INSERT INTO `controle` (`idcontrole`, `personaid`, `equipamentoid`, `protocolo`, `observacion`, `datecreated`, `status`) VALUES
(1, 1497, 4, '', '', '2024-05-28', 0),
(5, 1500, 7, 'c4325eae05094b7778e591b51e3c0c4b.jpg', '', '2024-06-03', 1),
(6, 1501, 8, 'nathalia.jpg', '', '2024-06-03', 0),
(7, 1498, 2, '', '', '2024-06-03', 0),
(8, 1503, 11, 'paloma.jpg', '', '2024-06-03', 1),
(9, 1504, 12, 'gustavo.jpg', '', '2024-06-03', 1),
(13, 1511, 20, '29ed06cf933a78cecf0a0ea34ccda76d.jpg', '', '2024-06-06', 1),
(14, 1506, 14, 'd7e61bdfc1de9fa91492dc4f819b5907.jpg', '', '2024-06-06', 1),
(15, 1505, 13, 'd293d2ff3646a55e116ac150ff7481cb.jpg', '', '2024-06-06', 0),
(18, 1512, 19, '5894ae87fb09ec4a4d07d82057cbb338.jpg', '', '2024-06-06', 0),
(19, 1513, 21, '8bb27f37a16c9b1f793aa03e5e5d118d.jpg', '', '2024-06-06', 1),
(20, 1501, 8, '', 'Fone apresenta mau contato', '2024-06-07', 2),
(21, 1501, 23, 'cd06760fa16f764182392e04df6746af.jpg', '', '2024-06-07', 1),
(34, 1514, 28, 'f977fbaa8bff243575c674607bd715f7.jpg', 'Fone recebido e entregado no mesmo dia', '2024-06-10', 0),
(40, 1515, 31, '208ab674afa57007fda0ffa794dfb192.jpg', '', '2024-06-11', 1),
(41, 1516, 32, 'df3b06a5eda49db044f0254b76dcbfbb.jpg', 'Entrega novato', '2024-06-11', 1),
(45, 1498, 2, '', 'Operadora sem renovação do contrato', '2024-06-12', 3),
(46, 1512, 19, '', 'Operadora pediu conta no começo da semana', '2024-06-14', 4),
(47, 1520, 62, '7bcfdb523d0f1eb6648ca9373192cece.jpg', 'Fone entregado dia 13 de Junho', '2024-06-14', 1),
(48, 1522, 63, '8951fda9047e221e71fe63b73bc440f2.jpg', 'Entrega Novata', '2024-06-14', 0),
(49, 1497, 4, 'da348ce32ce999e6926e2fae0ea118e9.jpg', 'Fone apresenta avaria(amostra nos fios do cabo)', '2024-06-14', 2),
(50, 1497, 48, 'de2385410cbc86e11f906afb99577f56.jpg', '', '2024-06-14', 0),
(51, 1525, 19, 'bd245bd0bc04c9aa274c98046372a420.jpg', 'Entrega na quinta-feira dia 13 de Junho de 2024', '2024-06-17', 1),
(52, 1497, 48, '', 'Operadora relata que o som do fone é miuto baixo, porém, não escuta o cliente.', '2024-06-17', 2),
(53, 1497, 49, 'e399715cd562d3e8dbc9b9e22500f069.jpg', '', '2024-06-17', 1),
(54, 1527, 48, '73dd0ac2a03ea59815c009a520c74cd1.jpg', 'Entrega', '2024-06-17', 1),
(55, 1528, 71, '0bd09fdf936b6bdc062df773afb52a9d.jpg', 'Entrega sem protocolo', '2024-06-18', 1),
(56, 1549, 45, '68aae0703e482cf67e897acad3997aaa.jpg', 'Entrega novato', '2024-06-18', 0),
(57, 1549, 45, '', 'Fone apresenta mau contato', '2024-06-18', 2),
(58, 1549, 47, 'fb80550060275a56ba5c201851d30967.jpg', '', '2024-06-18', 1),
(59, 1551, 66, '27b0e3c40a8d13ee7111bd1178add507.jpg', '', '2024-06-18', 1),
(60, 1547, 90, 'b6935c329a4ecdaf55a0b2c09ac44f34.jpg', 'Entrega no dia 24 de Maio de 2024', '2024-06-18', 0),
(61, 1538, 81, 'cdfc187298a3f7113d787fb10174f5d0.jpg', 'Entregue no dia 12 de Abril de 2024', '2024-06-18', 1),
(62, 1541, 83, 'e20eb50d7c34a76a71efc9bc962c67a7.jpg', 'Entregue no dia 12 de Abril de 2024', '2024-06-18', 0),
(63, 1532, 76, '857aaecbc7de07759980bab35167feca.jpg', 'Entregue no dia 09 de Abril de 2024', '2024-06-18', 1),
(64, 1537, 80, '05f67a419158cb66dce47ad9a526f31a.jpg', 'Entregue no dia 05 de Abril de 2024', '2024-06-18', 1),
(65, 1533, 77, '4102894b8a3f3973a34c0134b1a31019.jpg', 'Entregue no dia 18 de Março de 2024', '2024-06-18', 1),
(66, 1529, 73, '60f43d8f759cb48e90d3404b68c5973a.jpg', 'Entrega sem Protocolo', '2024-06-19', 1),
(67, 1530, 74, '83c0003376e9cc6415ac57ac1b2e5f06.jpg', 'Entrega sem protocolo', '2024-06-19', 1),
(68, 1531, 75, 'ba42f6bb9c3b6b719d7e6c1b4e70ec4a.jpg', 'Entrega sem protocolo', '2024-06-19', 1),
(69, 1550, 84, 'bf0db8710164900996d0d3b53862d49b.jpg', 'Entrega sem Protocolo', '2024-06-19', 0),
(70, 1542, 86, 'e7d1cfe25182163ee7915a0378eec041.jpg', 'Entrega sem protocolo registrado', '2024-06-19', 1),
(71, 1543, 87, '45fd6585c623be09eac473b799b1c9e8.jpg', 'Entrega sem Protocolo', '2024-06-19', 1),
(72, 1545, 88, '2d57833fd6c179fedb58ef076a521b95.jpg', 'Entrega sem Protocolo', '2024-06-19', 1),
(73, 1546, 89, '11d049e01493076976e0a2475bc73dd7.jpg', 'Entrega sem Protocolo', '2024-06-19', 1),
(74, 1522, 63, '', 'Operadora relata que o cliente não ouve ela. Várias ligações com inteferência', '2024-06-19', 2),
(75, 1522, 43, '1711a49656acb900231acd24c5cb5b67.jpg', '', '2024-06-19', 1),
(76, 1552, 46, '9fe201b0a97192dc6b2e8fd059b99181.jpg', '', '2024-06-19', 1),
(77, 1556, 92, '28148d2470e5e9b50c3a4a027d423afe.jpg', 'Entrega no dia 28 de março de 2024', '2024-06-20', 1),
(78, 1541, 83, '2e2e4905e4115cf7e01aa3a0426f1ba5.jpg', 'Fone apresenta Avaria no cabo', '2024-06-20', 2),
(79, 1541, 58, 'ca00289ad9bffebf306b2d49cb12c8f9.jpg', 'Controle de comandos quebrado', '2024-06-20', 1),
(80, 1559, 2, 'e3b4e508020f44121f5eba4e8ec8ec30.jpg', '', '2024-06-20', 1),
(81, 1547, 90, '', 'Microfone chiando, Avaria no cabo e voz robotizada', '2024-06-21', 2),
(82, 1560, 27, 'fe89e2f05a5d8e102e9c5af9578dbe6b.jpg', '', '2024-06-21', 1),
(83, 1561, 95, '2223e3758c4b26706cd9b6376733c7c7.jpg', '', '2024-06-24', 0),
(84, 1505, 13, '', 'Operadora pediu conta', '2024-06-24', 4),
(85, 1547, 44, 'dab16b6e5a72fa1f20d47a5b958bd066.jpg', '', '2024-06-24', 1),
(86, 1550, 84, '', 'Microfone não funciona', '2024-06-25', 2),
(87, 1550, 60, '93c0772c8770db3d44307ca05479fddd.jpg', '', '2024-06-25', 1),
(88, 1563, 57, '3c47311acd8c2bcc63fa611e697c2fa6.jpg', 'Entrega novata', '2024-06-25', 1),
(89, 1562, 56, 'dffd262c24e06e4f483bfcf934ee4899.jpg', 'Entrega novata', '2024-06-25', 1),
(90, 1564, 202, 'c35f3a8653b98d625a08cb8d175468a2.jpg', 'Entrega novata', '2024-06-27', 1),
(91, 1565, 201, '52a24e953ae3d67077105aa5201e3d3b.jpg', '', '2024-06-27', 1),
(92, 1514, 28, '', 'Operadora manifesta que o som é miuto baixo', '2024-06-27', 2),
(93, 1514, 50, 'fc79f5c4addd80d3c45cff6f1f7d10db.jpg', '', '2024-06-27', 1),
(94, 1566, 200, '90bf0d5ab0f8bae8eb62d7f550a63334.jpg', '', '2024-06-27', 1),
(95, 1561, 95, '', 'Rescisão indireta', '2024-06-28', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `idequipamento` bigint(20) NOT NULL,
  `marca` varchar(55) NOT NULL,
  `codigo` varchar(55) DEFAULT NULL,
  `lacre` varchar(10) DEFAULT NULL,
  `datecreated` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `tipo` int(2) NOT NULL,
  `codigoruta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamento`
--

INSERT INTO `equipamento` (`idequipamento`, `marca`, `codigo`, `lacre`, `datecreated`, `status`, `tipo`, `codigoruta`) VALUES
(1, 'Topuse', 'G57969', '0000151', '2024-05-27', 1, 8, 444),
(2, 'Unixtron', '180600062', '0000423', '2024-05-28', 2, 8, 444),
(4, 'Paltronics', '', '0000220', '2024-05-28', 3, 8, 444),
(7, 'Unixtron', '240500883', '7900375', '2024-06-03', 2, 8, 444),
(8, 'Paltronics', '', '0000404', '2024-06-03', 3, 8, 444),
(11, 'Plantronics', '', '0003349', '2024-06-03', 2, 8, 444),
(12, 'TopUse', '', '0000320', '2024-06-03', 2, 8, 444),
(13, 'Unixtron', '177388', '0000915', '2024-06-05', 1, 8, 444),
(14, 'Unixtron', '201206438', '18281', '2024-06-05', 2, 8, 444),
(15, 'Unixtrom', '', '23917', '2024-06-05', 3, 8, 444),
(19, 'Paltronics', '', '18263', '2024-06-06', 2, 8, 444),
(20, 'Paltronics', '', '1208', '2024-06-06', 2, 8, 444),
(21, 'Paltronics', '', '0000394', '2024-06-06', 2, 8, 444),
(23, 'Paltronics', '', '0000447', '2024-06-07', 2, 8, 444),
(27, 'Unixtrom', '210707023', '0000228', '2024-06-10', 2, 8, 444),
(28, 'Paltronics', '', '0000353', '2024-06-10', 1, 8, 444),
(30, 'TopUse', 'G09494', '0000357', '2024-06-11', 3, 8, 444),
(31, 'Paltronics', '', '0003326', '2024-06-11', 2, 8, 444),
(32, 'Unixtrom', '176601', '0000080', '2024-06-11', 2, 8, 444),
(36, 'Teste Cuatro', 'teste cuatro', '9803', '2024-06-11', 3, 8, 444),
(37, 'Paltronics', '', '0000529', '2024-06-12', 3, 8, 444),
(38, 'Unixtrom', '176928', '0003359', '2024-06-12', 3, 8, 444),
(39, 'Unixtrom', '210702364', '0003375', '2024-06-12', 3, 8, 444),
(43, 'Paltronics', '', '0000400', '2024-06-12', 2, 8, 444),
(44, 'Paltronics', '', '18295', '2024-06-12', 2, 8, 444),
(45, 'Paltronics', '', '0023982', '2024-06-12', 3, 8, 444),
(46, 'Paltronics', '', '0001192', '2024-06-12', 2, 8, 444),
(47, 'Paltronics', '', '0000454', '2024-06-12', 2, 8, 444),
(48, 'Paltronics', '', '0009884', '2024-06-12', 2, 8, 444),
(49, 'Paltronics', '', '0000268', '2024-06-12', 2, 8, 444),
(50, 'Unixtrom', 'F14428', '0000221', '2024-06-12', 2, 8, 444),
(51, 'Unixtrom', '', '0009806', '2024-06-12', 1, 8, 444),
(52, 'Unixtrom', '177335', '000794', '2024-06-12', 1, 8, 444),
(53, 'Paltronics', '', '0000500', '2024-06-12', 3, 8, 444),
(54, 'Unixtrom', '177349', '0000727', '2024-06-12', 1, 8, 444),
(55, 'Unixtrom', '180600062', '0000982', '2024-06-12', 1, 8, 444),
(56, 'Unixtrom', '210702723', '0003378', '2024-06-12', 2, 8, 444),
(57, 'Unixtrom', '176468', '0000499', '2024-06-12', 2, 8, 444),
(58, 'Unixtrom', '180600565', '0001082', '2024-06-12', 2, 8, 444),
(59, 'Paltronics', '', '0000555', '2024-06-12', 3, 8, 444),
(60, 'TopUse', '57968', '0000362', '2024-06-12', 2, 8, 444),
(61, 'Paltronics', '', '0000955', '2024-06-12', 3, 8, 444),
(62, 'Paltronics', '', '0000299', '2024-06-12', 2, 8, 444),
(63, 'Paltronics', '', '0000349', '2024-06-12', 1, 8, 444),
(64, 'TopUse', 'B08197', '0003379', '2024-06-13', 3, 8, 444),
(65, 'Unixtron', '180600505', '0001233', '2024-06-14', 3, 8, 444),
(66, 'Paltronics', '', '0000251', '2024-06-14', 2, 8, 444),
(67, 'Teste Mouse', '', '36', '2024-06-17', 3, 9, 444),
(68, 'Teclado', 'teste teclado', '221', '2024-06-17', 3, 10, 444),
(70, 'TopUse', 'F06457', '0023988', '2024-06-17', 3, 8, 444),
(71, 'Paltronics', '', '0000456', '2024-06-18', 2, 8, 444),
(73, 'TopUse', 'F06477', '0000946', '2024-06-18', 2, 8, 444),
(74, 'Unixtron', '180600562', '0000371', '2024-06-18', 2, 8, 444),
(75, 'Unixtron', '', '0000461', '2024-06-18', 2, 8, 444),
(76, 'Unixtron', '', '0000387', '2024-06-18', 2, 8, 444),
(77, 'Unixtron', '471468', '0001162', '2024-06-18', 2, 8, 444),
(78, 'Unixtron', '', '0018289', '2024-06-18', 1, 8, 444),
(79, 'TopUse', 'F16335', '0009830', '2024-06-18', 1, 8, 444),
(80, 'Paltronics', '', '0001365', '2024-06-18', 2, 8, 444),
(81, 'TopUse', '370044', '0003356', '2024-06-18', 2, 8, 444),
(82, 'Unixtron', '', '0001315', '2024-06-18', 1, 8, 444),
(83, 'Paltronics', '', '0000335', '2024-06-18', 3, 8, 444),
(84, 'Paltronics', '', '0001198', '2024-06-18', 3, 8, 444),
(85, 'Unixtron', '177314', '0000792', '2024-06-18', 3, 8, 444),
(86, 'Paltronics', '', '0000444', '2024-06-18', 2, 8, 444),
(87, 'TopUse', '', '0000249', '2024-06-18', 2, 8, 444),
(88, 'TopUse', 'F06475', '0001348', '2024-06-18', 2, 8, 444),
(89, 'TopUse', 'A72890', '0000229', '2024-06-18', 2, 8, 444),
(90, 'Paltronics', '', '0023934', '2024-06-18', 3, 8, 444),
(91, 'Unixtron', '220103161', '000437', '2024-06-19', 3, 8, 444),
(92, 'Unixtron', '201206422', '0018286', '2024-06-20', 2, 8, 444),
(94, 'LG', '109SP2K35693', '003885', '2024-06-20', 1, 11, 444),
(95, 'TopUse', 'F07664', '0009840', '2024-06-20', 1, 8, 444),
(96, 'LG', '110SPLC3072', '004217', '2024-06-20', 1, 11, 444),
(97, 'LG', '110SPXV2G778', '004414', '2024-06-20', 1, 11, 444),
(98, 'Unixtron', '210805899', '0000270', '2024-06-20', 3, 8, 444),
(99, 'LG', '109SPMZ35771', '004036', '2024-06-20', 1, 11, 444),
(100, 'LG', '109PHG35809', '004598', '2024-06-20', 1, 11, 444),
(101, 'LG', '110SPVH2G735', '003934', '2024-06-20', 1, 11, 444),
(102, 'LG', '109SPRW35734', '003882', '2024-06-20', 1, 11, 444),
(103, 'LG', '110SPED13052', '004000', '2024-06-20', 1, 11, 444),
(104, 'LG', '109SPXV35826', '005347', '2024-06-20', 1, 11, 444),
(105, 'LG', '004SPDTG2930', '001264', '2024-06-20', 1, 11, 444),
(106, 'LG', '110SPTM2G697', '004031', '2024-06-20', 1, 11, 444),
(107, 'LG', '111SPQJ1S284', '002443', '2024-06-20', 1, 11, 444),
(108, 'LG', '111SPED1S292', '002451', '2024-06-20', 1, 11, 444),
(109, 'LG', '110SPFX12723', '003920', '2024-06-20', 1, 11, 444),
(110, 'LG', '109SPMZ35747', '004012', '2024-06-20', 1, 11, 444),
(111, 'LG', '110SPMZ13075', '003933', '2024-06-20', 1, 11, 444),
(112, 'LG', '110SPFX13155', '004435', '2024-06-20', 1, 11, 444),
(113, 'LG', '112SPYR0Z354', '001087', '2024-06-20', 1, 11, 444),
(114, 'LG', '111SPBF1S205', '002452', '2024-06-20', 1, 11, 444),
(115, 'LG', '001SPVHH8055', '001347', '2024-06-20', 1, 11, 444),
(116, 'Acer', 'ETLTY0800911206C3D4200', '004623', '2024-06-20', 1, 11, 444),
(117, 'Acer', 'ETLTJ0D0091120B1548500', '005146', '2024-06-20', 1, 11, 444),
(118, 'Acer', 'ETLBF08011028008F49800', '005367', '2024-06-20', 1, 11, 444),
(119, 'Acer', 'ETLTY08009112071FE4200', '004648', '2024-06-20', 1, 11, 444),
(120, 'Acer', 'ETLTY0800911206BDB4200', '004615', '2024-06-20', 1, 11, 444),
(121, 'Acer', 'ETLTY080091120D8764200', '005152', '2024-06-20', 1, 11, 444),
(122, 'Acer', 'ETLTY0D0091120B0DC8500', '004018', '2024-06-20', 1, 11, 444),
(123, 'Acer', 'ETLBF08011023001C619800', '005399', '2024-06-20', 1, 11, 444),
(124, 'Acer', 'ETLTJ0D00911200B1D08500', '005157', '2024-06-20', 1, 11, 444),
(125, 'Acer', 'ETLTY080091120D86E4200', '004640', '2024-06-20', 1, 11, 444),
(126, 'Acer', 'ETLTJ0D0091120B1E98500', '005153', '2024-06-20', 1, 11, 444),
(127, 'Acer', 'ETLBF0801102301B589800', '005698', '2024-06-20', 1, 11, 444),
(128, 'Acer', 'ETLBF0801102301C7B9800', '004829', '2024-06-20', 1, 11, 444),
(129, 'Acer', 'ETLTY080091120D8394200', '005155', '2024-06-20', 1, 11, 444),
(130, 'Acer', 'ETLTY0800911206C414200', '005148', '2024-06-20', 1, 11, 444),
(131, 'Acer', 'ETLBF08011008015E49800', '004422', '2024-06-20', 1, 11, 444),
(132, 'Acer', 'ETLTY0D0091120B0F08500', '004042', '2024-06-20', 1, 11, 444),
(133, 'DELL', 'BR0D644F075918BB2D1M', '003908', '2024-06-20', 1, 11, 444),
(134, 'DELL', 'BR0D644F0759189C03YM', '005145', '2024-06-20', 1, 11, 444),
(135, 'KMEX', '05A010008274', '005252', '2024-06-20', 1, 11, 444),
(136, 'KMEX', '05A010008303', '000189', '2024-06-20', 1, 11, 444),
(137, 'BRAWIEW', '7898441086041', '000575', '2024-06-20', 1, 11, 444),
(138, 'BENQ', 'ETR5B02246SL0', '004197', '2024-06-20', 1, 11, 444),
(139, 'BENQ', 'ETR5B02298SL0', '004024', '2024-06-20', 1, 11, 444),
(140, 'SAMSUMG', 'CM16HXIS302010F', '001448', '2024-06-20', 1, 11, 444),
(141, 'SAMSUMG', 'CM16HXIS302175J', '08609', '2024-06-20', 1, 11, 444),
(142, 'SAMSUMG', 'PU16HXJB205090T', '005820', '2024-06-20', 1, 11, 444),
(143, 'SAMSUMG', 'CM16HXGS301857Y', '000250', '2024-06-20', 1, 11, 444),
(144, 'SAMSUMG', 'PU16HXKB207336N', '004669', '2024-06-20', 1, 11, 444),
(145, 'SAMSUMG', 'CM16HXHS301852L', '005830', '2024-06-20', 1, 11, 444),
(146, 'SAMSUMG', 'CM16HXGS301736R', '005078', '2024-06-20', 1, 11, 444),
(147, 'SAMSUMG', 'PU16HXKB211794F', '000921', '2024-06-20', 1, 11, 444),
(148, 'SAMSUMG', 'CM16HXGS300165Y', '001223', '2024-06-20', 1, 11, 444),
(149, 'SAMSUMG', 'CM16HXHS301289M', '08615', '2024-06-20', 1, 11, 444),
(150, 'SAMSUMG', 'CM16HXGS302168B', '001410', '2024-06-20', 1, 11, 444),
(151, 'SAMSUMG', 'CM16HXHS300143X', '08604', '2024-06-20', 1, 11, 444),
(152, 'SAMSUMG', 'CM16HXGS301856Z', '000370', '2024-06-20', 1, 11, 444),
(153, 'SAMSUMG', 'CM16HXIS300230A', '005374', '2024-06-20', 1, 11, 444),
(154, 'SAMSUMG', 'CM16HXIS300218T', '005381', '2024-06-20', 1, 11, 444),
(155, 'SAMSUMG', 'CM16HXGS302139F', '001293', '2024-06-20', 1, 11, 444),
(156, 'SAMSUMG', 'CM16HXGS300058H', '03098', '2024-06-20', 1, 11, 444),
(157, 'SAMSUMG', 'CM16HXIS301852L', '06425', '2024-06-20', 1, 11, 444),
(158, 'DELL', '00186715322588', '009100', '2024-06-21', 1, 16, 444),
(159, 'Lenovo', '00180832137293', '008671', '2024-06-21', 1, 16, 444),
(160, 'Lenovo', '', '008814', '2024-06-21', 1, 16, 444),
(161, 'Lenovo', '00180832137379', '008787', '2024-06-21', 1, 16, 444),
(162, 'Lenovo', '00180832137292', '008692', '2024-06-21', 1, 16, 444),
(163, 'Lenovo', '00180832137211', '008723', '2024-06-21', 1, 16, 444),
(164, 'DELL', '', '003983', '2024-06-21', 1, 16, 444),
(165, 'DELL', '00186715289967', '008984', '2024-06-21', 1, 16, 444),
(166, 'Hp', 'BRJ509M57C', '2646', '2024-06-21', 1, 16, 444),
(167, 'Hp', 'BRJ133FJFL', '2937', '2024-06-21', 1, 16, 444),
(168, 'DELL', '00186715289952', '008983', '2024-06-21', 1, 16, 444),
(169, 'KMEX', '7898426845762', '000410', '2024-06-21', 1, 16, 444),
(170, 'Nenhuma', 'GBD0047CK003333', '000182', '2024-06-21', 1, 16, 444),
(171, 'Nenhuma', '', '004717', '2024-06-21', 1, 16, 444),
(172, 'KMEX', '', '002361', '2024-06-21', 1, 16, 444),
(173, 'Nenhuma', '', '004134', '2024-06-21', 1, 16, 444),
(174, 'Nenhuma', '', '004881', '2024-06-21', 1, 16, 444),
(175, 'Nenhuma', '', '004125', '2024-06-21', 1, 16, 444),
(176, 'Nenhuma', '', '000973', '2024-06-21', 1, 16, 444),
(177, 'Nenhuma', '', '005109', '2024-06-21', 1, 16, 444),
(178, 'Nenhuma', '', '004872', '2024-06-21', 1, 16, 444),
(179, 'Nenhuma', '', '0907', '2024-06-21', 1, 16, 444),
(180, 'Nenhuma', '', '004158', '2024-06-21', 1, 16, 444),
(181, 'Nenhuma', '', '003808', '2024-06-21', 1, 16, 444),
(182, 'Nenhuma', '', '003987', '2024-06-21', 1, 16, 444),
(183, 'Nenhuma', '', '003984', '2024-06-21', 1, 16, 444),
(184, 'Nenhuma', '', '004112', '2024-06-21', 1, 16, 444),
(185, 'Hp', '00186721306810', '010056', '2024-06-21', 1, 16, 444),
(186, 'Nenhuma', '', '004476', '2024-06-21', 1, 16, 444),
(187, 'Hp', '00186721877406', '011070', '2024-06-21', 1, 16, 444),
(188, 'Hp', '', '010067', '2024-06-21', 1, 16, 444),
(189, 'Hp', '', '010072', '2024-06-21', 1, 16, 444),
(190, 'Hp', '', '010064', '2024-06-21', 1, 16, 444),
(192, 'TopUse', 'B99307', '0000240', '2024-06-21', 3, 8, 444),
(193, 'Lenovo', '', '8917', '2024-06-21', 1, 16, 444),
(194, 'Paltronics', '', '0001355', '2024-06-24', 3, 8, 444),
(195, 'Unixtron', '240502183', '7900332', '2024-06-26', 1, 8, 444),
(196, 'Unixtron', '240502164', '7900381', '2024-06-26', 1, 8, 444),
(197, 'Unixtron', '240502195', '7900311', '2024-06-26', 1, 8, 444),
(198, 'Unixtron', '240502187', '7900321', '2024-06-26', 1, 8, 444),
(199, 'Unixtron', '240502163', '7900353', '2024-06-26', 1, 8, 444),
(200, 'Unixtron', '240502109', '7900359', '2024-06-26', 2, 8, 444),
(201, 'Unixtron', '240502120', '7900335', '2024-06-26', 2, 8, 444),
(202, 'Unixtron', '240502192', '7900350', '2024-06-26', 2, 8, 444),
(203, 'Unixtron', '201207278', '0018288', '2024-06-27', 3, 8, 444),
(204, 'Paltronics', '', '0000376', '2024-06-27', 1, 8, 444);

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
(12, 'controle', 'Controle controleMast', 1),
(13, 'Aprendiz', 'Aprendiz controleMast', 1),
(14, 'Supervisor', 'Supervisor controleMast', 1),
(15, 'Gestor', 'Monitor controleMast', 1),
(16, 'Computador', 'Computador controleMast', 1);

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
(499, 1, 1, 1, 1, 1, 1),
(500, 1, 2, 1, 1, 1, 1),
(501, 1, 3, 1, 1, 1, 1),
(502, 1, 4, 1, 1, 1, 1),
(503, 1, 5, 1, 1, 1, 1),
(504, 1, 6, 1, 1, 1, 1),
(505, 1, 7, 1, 1, 1, 1),
(506, 1, 8, 1, 1, 1, 1),
(507, 1, 9, 1, 1, 1, 1),
(508, 1, 10, 1, 1, 1, 1),
(509, 1, 11, 1, 1, 1, 1),
(510, 1, 12, 1, 1, 1, 1),
(511, 1, 13, 1, 1, 1, 1),
(512, 1, 14, 1, 1, 1, 1),
(513, 1, 15, 1, 1, 1, 1),
(514, 1, 16, 1, 1, 1, 1),
(515, 2, 1, 0, 0, 0, 0),
(516, 2, 2, 1, 1, 1, 0),
(517, 2, 3, 0, 0, 0, 0),
(518, 2, 4, 1, 1, 1, 0),
(519, 2, 5, 1, 1, 1, 0),
(520, 2, 6, 1, 1, 1, 0),
(521, 2, 7, 1, 1, 1, 0),
(522, 2, 8, 1, 1, 1, 0),
(523, 2, 9, 1, 1, 1, 0),
(524, 2, 10, 1, 1, 1, 0),
(525, 2, 11, 1, 1, 1, 0),
(526, 2, 12, 1, 1, 1, 0),
(527, 2, 13, 1, 1, 1, 0),
(528, 2, 14, 1, 1, 1, 0),
(529, 2, 15, 1, 1, 1, 0),
(530, 2, 16, 1, 1, 1, 0);

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
  `modelo` int(2) NOT NULL DEFAULT 1,
  `datecreated` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `matricula`, `telefono`, `email_user`, `rolid`, `codigoruta`, `modelo`, `datecreated`, `status`) VALUES
(1, 'Miguel', 'Tafur', '1102387002', 2147483647, 'miguelmita03@gmail.com', 1, 444, 1, '2022-11-12', 1),
(1493, 'Kylvyk Junior', 'Silva Ferreira', '011965', 37996639874, 'kylvyk.junior@globalcob.com.br', 3, 444, 1, '2024-05-23', 1),
(1494, 'Larissa Kerolyn', 'Mendes Do Carmo', '017994', 37984262426, '', 4, 444, 1, '2024-05-24', 1),
(1495, 'Ana Paula', 'Da Silva', '01685', 37984025197, '', 4, 444, 1, '2024-05-24', 1),
(1497, 'Ana Alice', 'Miranda Basilio', '01624', 0, '', 5, 444, 1, '2024-05-27', 1),
(1498, 'Anna Clara', 'Ribeiro De Oliveira', '01753', 0, '', 5, 444, 1, '2024-05-27', 0),
(1500, 'Matheus Henrique', 'Alves Bispo', '010341', 0, '', 3, 444, 1, '2024-06-03', 1),
(1501, 'Nathalia Patricia', 'Alves', '013313', 0, '', 5, 444, 1, '2024-06-03', 1),
(1502, 'Admin', 'Admin', '013301', 0, 'admin@cm.com', 1, 444, 1, '2024-06-03', 1),
(1503, 'Paloma', 'Aparecida Nunes', '013333', 0, '', 5, 444, 1, '2024-06-03', 1),
(1504, 'Gustavo Francisco', 'Da Silva', '013223', 0, '', 5, 444, 1, '2024-06-03', 1),
(1505, 'PATRICIA GABRIELA', 'CARDOSO', '01819', 0, '', 5, 444, 1, '2024-06-05', 0),
(1506, 'KARINA', 'PEREIRA DE OLIVEIRA', '013339', 0, '', 5, 444, 1, '2024-06-05', 1),
(1510, 'TATIANE MEIRIANE', 'AMARO', '01731', 0, '', 4, 444, 1, '2024-06-05', 1),
(1511, 'LORENA GOMES', 'PEREIRA', '01776', 0, '', 5, 444, 1, '2024-06-06', 1),
(1512, 'NATALIA', 'REIS DE AQUINO', '01818', 0, '', 5, 444, 1, '2024-06-06', 0),
(1513, 'Regiane', 'Alves De Souza', '011920', 0, '', 5, 444, 1, '2024-06-06', 1),
(1514, 'LUANA KATHERINE', 'DIOGO MARTINS', '01828', 0, '', 5, 444, 1, '2024-06-10', 1),
(1515, 'NAZIK', 'DINIZ', '012773', 0, '', 5, 444, 1, '2024-06-11', 1),
(1516, 'AIRTON', 'DE PAULO JUNIOR', '013340', 0, '', 5, 444, 1, '2024-06-11', 1),
(1519, 'Alvaro', 'Felizardo', '66544', 0, 'alvaro.felizardo@globalcob.com.br', 2, 444, 1, '2024-06-13', 1),
(1520, 'Jose Inacio', 'Camargos Fonseca', '01419', 0, '', 5, 444, 2, '2024-06-14', 1),
(1522, 'GISLENE MARIA', 'DOS SANTOS MARRA', '01929', 0, '', 5, 444, 1, '2024-06-14', 1),
(1525, 'BRUNA RAFAELA', 'DA SILVA', '011013', 0, '', 5, 444, 1, '2024-06-17', 1),
(1526, 'Samara', 'Aa', '98789', 0, '', 7, 444, 1, '2024-06-17', 1),
(1527, 'ANA LUIZA', 'GONCALVEZ GOES', '01638', 0, '', 5, 444, 1, '2024-06-17', 1),
(1528, 'ANA LAURA', 'GOMES NEVES', '01589', 0, '', 5, 444, 1, '2024-06-17', 1),
(1529, 'CAMILA IOLANDA', 'GUALBERTO DINIZ', '01727', 0, '', 5, 444, 1, '2024-06-17', 1),
(1530, 'CAROLINA LUIS', 'DOS SANTOS', '01622', 0, '', 5, 444, 1, '2024-06-17', 1),
(1531, 'DANYELA CARLA', 'DE OLIVEIRA NASCIMENTO SILVA', '013141', 0, '', 5, 444, 1, '2024-06-17', 1),
(1532, 'EDUARDA VITORIA', 'ALVES', '013331', 0, '', 5, 444, 1, '2024-06-17', 1),
(1533, 'FREDERICO', 'CUNHA DE SOUZA', '013322', 0, '', 5, 444, 1, '2024-06-17', 1),
(1534, 'GESSICA', 'RODRIGUES DE SOUSA', '013286', 0, '', 5, 444, 2, '2024-06-17', 1),
(1535, 'GLADIS CRISTINA', 'DE SOUZA SANTOS', '012878', 0, '', 5, 444, 1, '2024-06-17', 1),
(1536, 'GRAZIELE MARIA', 'DE PADUA VIEIRA', '015234', 0, '', 8, 444, 1, '2024-06-17', 1),
(1537, 'JORDANIA', 'APARECIDA ALVES', '014334', 0, '', 5, 444, 1, '2024-06-17', 1),
(1538, 'JORDANIA', 'VIRGILIO DA SILVA', '01769', 0, '', 5, 444, 1, '2024-06-17', 1),
(1539, 'JULIA', 'SOUSA SANTOS', '013013', 0, '', 5, 444, 1, '2024-06-17', 1),
(1540, 'MARAIZA CRISTIANE', 'ROCHA', '01744', 0, '', 5, 444, 1, '2024-06-17', 1),
(1541, 'MARIA EDUARDA', 'DE CASSIA COUTO', '01616', 0, '', 5, 444, 1, '2024-06-17', 1),
(1542, 'RAFAELA CARLA', 'LACERDA SILVA', '01647', 0, '', 5, 444, 1, '2024-06-17', 1),
(1543, 'RHAYANNE ISABELLE', 'COUTINHO ALVES', '013218', 0, '', 5, 444, 1, '2024-06-17', 1),
(1544, 'RITA DAIANE', 'DE MORAIS SILVA', '013279', 0, '', 5, 444, 2, '2024-06-17', 1),
(1545, 'ROSALINA ANTONIA', 'PINTO', '0132', 0, '', 5, 444, 1, '2024-06-17', 1),
(1546, 'ROSANE', 'ANDRADE DA SILVA', '012164', 0, '', 5, 444, 1, '2024-06-17', 1),
(1547, 'SHIRLEY', 'MACEDO VIEITAS', '01710', 0, '', 5, 444, 1, '2024-06-17', 1),
(1548, 'VALDIRENE', 'VAQUEIRO ALVES', '013131', 0, '', 5, 444, 2, '2024-06-17', 1),
(1549, 'ANGELICA', 'APARECIDA DE OLIVEIRA', '01839', 0, '', 5, 444, 1, '2024-06-18', 1),
(1550, 'NATHALIA', 'GOMES ROCHA', '018287', 0, '', 4, 444, 1, '2024-06-18', 1),
(1551, 'MARIA GABRIELA', 'MAIA BOMFIM', '013147', 0, '', 5, 444, 1, '2024-06-18', 1),
(1552, 'ELIDA CRISTINA', 'DE PAULA', '010543', 0, '', 5, 444, 2, '2024-06-19', 1),
(1556, 'YURY ALEXANDRE', 'PEREIRA DA SILVA VAZ', '013323', 0, '', 6, 444, 1, '2024-06-20', 1),
(1559, 'CAROLINE', 'DE CASTRO CESARIO', '013125', 0, '', 5, 444, 1, '2024-06-20', 1),
(1560, 'DEBORAH VERONICA', 'ALMEIDA SILVA', '012911', 0, '', 5, 444, 1, '2024-06-21', 1),
(1561, 'SIRLEN MARCIA', 'BORGES', '012783', 0, '', 5, 444, 2, '2024-06-24', 0),
(1562, 'BARBARA LUCIA', 'DA SILVA BOTELHO', '01837', 0, '', 5, 444, 1, '2024-06-25', 1),
(1563, 'STHEFANE', 'ARAUJO MELO', '01838', 0, '', 5, 444, 1, '2024-06-25', 1),
(1564, 'MARIANY', 'DE SOUZA MORAIS', '01840', 0, '', 5, 444, 1, '2024-06-27', 1),
(1565, 'PIERRE', 'SILVA RIBEIRO DIAS', '01799', 0, '', 5, 444, 1, '2024-06-27', 1),
(1566, 'CHARLES', 'PEREIRA DOS SANTOS', '01425', 0, '', 5, 444, 1, '2024-06-27', 1);

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
(5, 'Operação', 'Operação', 1),
(6, 'Aprendiz', 'Aprendiz', 1),
(7, 'Supervisor', 'Supervisor', 1),
(8, 'Gestor de Qualidade', 'Gestor de Qualidade', 1);

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
  MODIFY `idanotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT de tabela `controle`
--
ALTER TABLE `controle`
  MODIFY `idcontrole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `idequipamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT de tabela `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1568;

--
-- AUTO_INCREMENT de tabela `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

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
