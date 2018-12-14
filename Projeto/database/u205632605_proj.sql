-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2018 at 12:16 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u205632605_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `atividades`
--

CREATE TABLE `atividades` (
  `id_atividade` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao_atividade` varchar(220) CHARACTER SET utf8 NOT NULL,
  `data_hora_criacao` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `id_projeto`, `id_usuario`, `descricao_atividade`, `data_hora_criacao`) VALUES
(38, 1, 27, 'teste atividade com id do usuário logado', '2018-12-13 21:02:12'),
(39, 2, 27, 'aaaaaaaaaa teste', '2018-12-13 21:07:05'),
(40, 3, 27, 'bbbbbbbbb teste', '2018-12-13 21:07:15'),
(41, 3, 27, 'aaaaaaaaaaa teste 002', '2018-12-13 21:07:34'),
(42, 3, 27, 'ssssssssss teste 003', '2018-12-13 21:08:21'),
(43, 7, 27, 'teste sappp', '2018-12-13 21:08:39'),
(44, 7, 27, 'teste sappp 2222', '2018-12-13 21:08:54'),
(45, 8, 30, 'Jogar na loteria', '2018-12-13 22:19:29'),
(46, 8, 30, 'Jogar na megasena da virada', '2018-12-13 22:19:47'),
(47, 8, 30, 'Trabalhar', '2018-12-13 22:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id_projeto` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `id_colaborador` varchar(220) NOT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colaboradores`
--

INSERT INTO `colaboradores` (`id_projeto`, `id_atividade`, `id_colaborador`, `data_hora`) VALUES
(2, 38, '29', '2018-12-13 21:03:53'),
(0, 41, '29', '2018-12-13 21:09:47'),
(0, 43, '29', '2018-12-13 21:13:38'),
(0, 46, '29', '2018-12-13 22:20:26'),
(0, 45, '28', '2018-12-13 22:20:43'),
(0, 47, '27', '2018-12-13 22:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `text_comentario` text CHARACTER SET utf8 NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `text_comentario`, `id_projeto`, `data_hora`) VALUES
(1, 28, 'organização em primeiro lugar, gostei ', 1, '2018-11-28 21:08:35'),
(2, 28, 'nuca mais vou precisar ficar gastando tempo e dinheiro pra comer um lanche, muito bom eu sou a favor.', 2, '2018-11-28 21:09:17'),
(3, 28, 'nossa, finalmente um projeto bom nessa empresa parabéns ', 1, '2018-11-28 21:12:13'),
(4, 28, 'eita, é agora que todo mundo vi ficar gordinho, gostei', 2, '2018-11-28 21:12:40'),
(5, 27, 'teste de comentario com o DropDown com os ids de projeto', 2, '2018-12-13 21:37:25'),
(6, 27, 'teste', 3, '2018-12-13 21:37:48'),
(7, 27, 'teste x', 1, '2018-12-13 21:43:27'),
(8, 27, 'ok, projeto muito bom.', 2, '2018-12-13 21:44:37'),
(9, 30, 'Por meios lícitos somente?', 8, '2018-12-13 22:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status_proj` text CHARACTER SET utf8 NOT NULL,
  `nome_projeto` varchar(220) CHARACTER SET utf8 NOT NULL,
  `descricao_projeto` varchar(220) CHARACTER SET utf8 NOT NULL,
  `horas_projeto` int(5) NOT NULL,
  `data_hora_criacao` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `id_usuario`, `status_proj`, `nome_projeto`, `descricao_projeto`, `horas_projeto`, `data_hora_criacao`) VALUES
(1, 27, 'Pendente', 'Projeto Social de Organização', 'projeto para ensinar técnicas de organização para os clientes, visando melhor rendimento do trabalho e maior resultado.', 345, '2018-11-28 21:05:30'),
(2, 27, 'Pendente', 'Projeto lache', 'contratar o serviço de um fornecedor para trazer alimentos para os funcionários possam comer a vontade na hora do cafe da manhã e da tarde', 300, '2018-11-28 21:07:22'),
(3, 27, 'Pendente', 'Projeto interno', 'projeto interno de compra de materiais.', 60, '2018-11-29 10:52:09'),
(4, 28, 'Pendente', 'Primeiro projeto do usuario 2019', 'descrição do primeiro projeto do usuario teste 2018', 23, '2018-11-29 11:18:32'),
(5, 28, 'Pendente', 'projeto 2', 'descrição do projeto 2', 30, '2018-11-29 11:19:31'),
(8, 30, 'Pendente', 'Virar milionário', 'Ganhar bastante dinheiro', 300, '2018-12-13 22:19:01'),
(7, 27, 'Pendente', 'Projeto SAP 2019', 'Implantar sap na empresa', 7500, '2018-12-06 21:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(220) NOT NULL,
  `email_usuario` varchar(220) NOT NULL,
  `apelido_usuario` varchar(220) NOT NULL,
  `senha_usuario` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `apelido_usuario`, `senha_usuario`) VALUES
(27, 'teste2018', 'teste2018@gmail.com', 'teste2018', '$2y$10$qBWfCmTHavqAm/n3.ygFn.hwmGVHrwtmRmfSk6HN3kJ1NtuzlJg5.'),
(28, 'teste2019', 'teste2019@gmail.com', 'teste2019', '$2y$10$6cjIXqXLilHg/Y10BRdGa.GlrVuIdCK5reCi5JPp7sKMcYV1s55cm'),
(29, 'Rodrigo Estevan', 'rodrigo@gmail.com', 'Rodrigo', '$2y$10$jC8ymc01/0zgw.yH9z33IuzZzOdRRCqYqShVhO9m/TUSfebbbq7iG'),
(30, 'prof', 'prof@mackenzie.br', 'prof', '$2y$10$LQp01KJl2/NMpJLZ7fBVs.nQf4BVS6e/.sw1yM/m5TI4Lh4CKUhca'),
(31, 'adriana', 'adri_nv@outlook.com', 'adri', '$2y$10$sfCp8OTd7P6ZYfpybvkFweV/nIsgCKmz.PsjsFfsKmzW6tDC2m0Au');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id_atividade`,`id_projeto`) USING BTREE;

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id_projeto`,`id_atividade`,`id_colaborador`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`,`id_usuario`,`id_projeto`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`,`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id_atividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
