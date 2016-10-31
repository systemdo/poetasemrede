-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 31, 2016 at 02:09 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poeta_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` longtext,
  `resposta` int(2) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPoesia` int(11) DEFAULT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  `dataUpdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `resposta`, `idUsuario`, `idPoesia`, `dataCriacao`, `dataUpdate`) VALUES
(1, 'hhhh', 0, 4, 4, '2016-10-31 02:07:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes_comentarios`
--

CREATE TABLE `likes_comentarios` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes_poesia`
--

CREATE TABLE `likes_poesia` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPoesia` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_poesia`
--

INSERT INTO `likes_poesia` (`id`, `idUsuario`, `idPoesia`, `dataLike`) VALUES
(6, 4, 3, NULL),
(7, 4, 2, NULL),
(9, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poesias`
--

CREATE TABLE `poesias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `corpo` longtext NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataAtualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poesias`
--

INSERT INTO `poesias` (`id`, `titulo`, `corpo`, `idUsuario`, `dataCriacao`, `dataAtualizacao`, `status`) VALUES
(2, 'Vida de Programador3', 'Escreva algo', 4, '2016-10-29 04:43:31', '2016-10-29 17:37:49', NULL),
(3, 'Helo', 'Escreva algo', 4, '2016-10-29 07:41:43', '2016-10-29 17:41:43', 2),
(4, 'valei', 'Escreva algo', 4, '2016-10-29 07:41:56', '2016-10-29 17:41:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `relacionamentos`
--

CREATE TABLE `relacionamentos` (
  `id` int(11) NOT NULL,
  `IdUsuarioPrimeiro` int(11) NOT NULL,
  `idUsuarioSegundo` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `dataCriacao` timestamp NULL DEFAULT NULL,
  `IdConvidador` int(11) NOT NULL,
  `idConvidado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Inativo'),
(2, 'Ativo'),
(3, 'Enviado'),
(4, 'Aceito');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `nascimento` date NOT NULL,
  `descricao` longtext,
  `dataRegistro` timestamp NULL DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `pseudonimo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `imagem`, `nascimento`, `descricao`, `dataRegistro`, `senha`, `status`, `pseudonimo`) VALUES
(3, 'lucas', 'Silverio marques', 'jjj@gmail.com', NULL, '1986-02-21', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Eu sou eu mais eu '),
(4, 'lucas', 'Silverio marques', 'lsilveriomarques@gmail.com', NULL, '1986-02-21', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Eu sou eu mais eu ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioComentario_idx` (`idUsuario`),
  ADD KEY `poesiaComentario_idx` (`idPoesia`),
  ADD KEY `resposta` (`resposta`);

--
-- Indexes for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likesComentarios_idx` (`idComentario`),
  ADD KEY `likesUsuario_idx` (`idUsuario`);

--
-- Indexes for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likePoesia_idx` (`idPoesia`),
  ADD KEY `likeUsuario_idx` (`idUsuario`);

--
-- Indexes for table `poesias`
--
ALTER TABLE `poesias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsuarioCriador_idx` (`idUsuario`),
  ADD KEY `poesiaStatus_idx` (`status`);

--
-- Indexes for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `primeiroUsuario_idx` (`IdUsuarioPrimeiro`),
  ADD KEY `segundoUsuario_idx` (`idUsuarioSegundo`),
  ADD KEY `statusRelacionamento_idx` (`status`),
  ADD KEY `IdConvidador` (`IdConvidador`),
  ADD KEY `idConvidado` (`idConvidado`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `statusUsuario_idx` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `poesias`
--
ALTER TABLE `poesias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idPoesia`) REFERENCES `poesias` (`id`);

--
-- Constraints for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  ADD CONSTRAINT `likesComentario` FOREIGN KEY (`idComentario`) REFERENCES `comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `likesUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  ADD CONSTRAINT `likes_poesia_ibfk_1` FOREIGN KEY (`idPoesia`) REFERENCES `poesias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `likes_poesia_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `poesias`
--
ALTER TABLE `poesias`
  ADD CONSTRAINT `poesiaStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UsuarioCriador` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD CONSTRAINT `relacionamentos_ibfk_2` FOREIGN KEY (`idConvidado`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relacionamentos_ibfk_1` FOREIGN KEY (`IdConvidador`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relacionamentos_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `statusUsuario` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
