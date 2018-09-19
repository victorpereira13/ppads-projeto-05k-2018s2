-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Set-2018 às 22:08
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

DROP TABLE IF EXISTS `projetos`;
CREATE TABLE IF NOT EXISTS `projetos` (
  `idprojeto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeprojeto` varchar(220) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(220) CHARACTER SET utf8 NOT NULL,
  `horas` int(5) NOT NULL,
  PRIMARY KEY (`idprojeto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(10, 'Victor Cardoso', 'victor.pereira123213@hotmail.com', 'p1234', '$2y$10$9miLdCH3Iml1VLMbTmRc.uz8jmzUddeG0vnQHjKDFgU1eduAeZ1Gi'),
(7, 'Victor Pereira', 'victor.pereira13@hotmail.com', 'pereira', '$2y$10$p5PLu7zg182bvMDqjfum2uEbAeu6CDDTQ8lOYolaNeknnc2ZeTCR2'),
(9, 'Victor Azevedo', 'victor.pereira321@hotmail.com', 'pereiravpca', '$2y$10$8zqI4PZsnoWSn2YOawiYnu4T4ygvFzTmfzVviqaTUgGQUQdsK88vu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
