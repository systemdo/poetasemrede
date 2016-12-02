-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2016 at 11:01 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `resposta`, `idUsuario`, `idPoesia`, `dataCriacao`, `dataUpdate`) VALUES
(1, 'hhhh', 0, 4, 4, '2016-10-31 02:07:37', NULL),
(2, 'Comentario vida de Programador', 0, 4, 2, '2016-10-31 02:46:04', NULL),
(3, 'hello', 0, 4, 4, '2016-11-01 10:25:21', NULL),
(4, 'lucas comentarios ', 0, 4, 4, '2016-11-01 10:32:34', NULL),
(5, 'lucas ', 0, 4, 4, '2016-11-01 11:01:16', NULL),
(6, 'helo mundo', 0, 4, 4, '2016-11-01 11:02:25', NULL),
(7, 'helo mundo', 0, 4, 4, '2016-11-01 11:03:10', NULL),
(8, 'huuuuuuu', 0, 4, 3, '2016-11-01 11:05:48', NULL),
(9, 'helo', 0, 4, 4, '2016-11-01 11:06:01', NULL),
(10, 'mais ', 0, 4, 4, '2016-11-01 11:06:09', NULL),
(11, 'mam mia ', 0, 4, 3, '2016-11-01 11:08:02', NULL),
(13, 'comoe', 0, 4, 4, '2016-11-02 04:07:28', NULL),
(14, 'helo', 0, 4, 3, '2016-11-03 12:54:22', NULL),
(15, '', 0, 4, 4, '2016-11-05 08:49:48', NULL),
(16, 'pobre de marre', 0, 4, 6, '2016-11-05 09:57:03', NULL),
(18, 'o gato', 0, 4, 7, '2016-11-06 12:06:40', NULL),
(19, 'lucas', 0, 4, 4, '2016-11-06 04:07:39', NULL),
(20, 'lucas', 0, 4, 4, '2016-11-06 04:07:42', NULL),
(22, 'helo', 0, 4, 8, '2016-11-06 04:10:32', NULL),
(23, 'helo2', 0, 4, 8, '2016-11-06 04:10:56', NULL),
(25, 'helo teste1', 0, 4, 4, '2016-11-06 04:16:09', NULL),
(26, 'computer', 0, 4, 8, '2016-11-06 04:16:34', NULL),
(27, 'lucas', 0, 4, 8, '2016-11-06 04:18:04', NULL),
(28, 'verde com vermelho morando  é o sabor da preta ', 0, 4, 6, '2016-11-06 04:18:38', NULL),
(29, 'comntar ehelo ', 0, 4, 3, '2016-11-06 04:27:19', NULL),
(31, 'ver testo +1', 0, 4, 2, '2016-11-06 04:33:17', NULL),
(33, '5 comentrio ', 0, 4, 2, '2016-11-06 04:35:20', NULL),
(34, 'hello vida ', 0, 3, 9, '2016-11-08 03:36:10', NULL),
(35, 'helo', 0, 3, 9, '2016-11-08 03:38:16', NULL),
(36, 'hhh', 0, 3, 9, '2016-11-08 03:38:57', NULL),
(37, 'lucas', 0, 3, 10, '2016-12-02 09:56:34', NULL),
(38, 'lucas\n', 0, 3, 9, '2016-12-02 09:57:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes_comentarios`
--

CREATE TABLE `likes_comentarios` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_comentarios`
--

INSERT INTO `likes_comentarios` (`id`, `idComentario`, `idUsuario`, `dataLike`) VALUES
(1, 9, 4, NULL),
(2, 9, 4, NULL),
(3, 9, 4, NULL),
(4, 9, 4, NULL),
(5, 9, 4, NULL),
(6, 9, 4, NULL),
(7, 10, 4, NULL),
(8, 10, 4, NULL),
(9, 10, 4, NULL),
(10, 9, 4, NULL),
(11, 7, 4, NULL),
(12, 1, 4, NULL),
(13, 1, 4, NULL),
(14, 1, 4, NULL),
(15, 1, 4, NULL),
(16, 1, 4, NULL),
(17, 34, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes_poesia`
--

CREATE TABLE `likes_poesia` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPoesia` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_poesia`
--

INSERT INTO `likes_poesia` (`id`, `idUsuario`, `idPoesia`, `dataLike`) VALUES
(6, 4, 3, NULL),
(7, 4, 2, NULL),
(9, 4, 4, NULL),
(10, 4, 2, NULL),
(12, 4, 7, NULL),
(13, 4, 7, NULL),
(15, 4, 7, '2016-12-02 04:35:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poesias`
--

INSERT INTO `poesias` (`id`, `titulo`, `corpo`, `idUsuario`, `dataCriacao`, `dataAtualizacao`, `status`) VALUES
(2, 'Vida de Programador3', 'Escreva algo', 4, '2016-10-29 04:43:31', '2016-10-29 17:37:49', NULL),
(3, 'Helo', 'Escreva algo', 4, '2016-10-29 07:41:43', '2016-10-29 17:41:43', 2),
(4, 'valei', 'Escreva algo', 4, '2016-10-29 07:41:56', '2016-10-29 17:41:56', 2),
(6, 'nova poesias ', '<p><u><strong>Um nova poesia,&nbsp;</strong></u></p>\r\n\r\n<p><span style="color:#00ff00"><span style="font-size:9px"><span style="font-family:Courier New,Courier,monospace"><u><strong><span style="background-color:#ff0000">Um novo mundo para o mundo&nbsp;</span></strong></u></span></span></span></p>\r\n', 4, '2016-11-05 09:56:35', '2016-11-05 22:20:27', NULL),
(7, 'O gato', '<p>O gato caiu do telhado&nbsp;</p>\r\n\r\n<p>porque n&atilde;o viu o telhado&nbsp;<br />\r\n&nbsp;</p>\r\n', 4, '2016-11-05 10:56:23', '2016-11-05 22:18:38', NULL),
(8, 'Vida de Programador', '<p>Vida dura de Programador <br />\r\n <br />\r\n Vida dura de Trabalhor <br />\r\n <br />\r\n No qual seu amor <br />\r\n <br />\r\n São os código que saem <br />\r\n <br />\r\n Do seu computador</p>\r\n', 4, '2016-11-05 11:13:25', '2016-11-05 22:17:14', NULL),
(9, 'Nova Vida', '<p>Nova vida&nbsp;</p>\r\n\r\n<p>Vida nova&nbsp;</p>\r\n\r\n<p>De que me vale a nova</p>\r\n\r\n<p>se n&atilde;o existe a vida.</p>\r\n', 3, '2016-11-08 03:34:42', '2016-11-08 14:34:42', 2),
(10, 'Eu sou o rei ', '<p>Eu sou rei do mar</p>\r\n\r\n<p>Da minh cidade natal</p>\r\n', 3, '2016-11-14 06:17:37', '2016-11-14 17:17:37', 2),
(11, 'poema ', '<p>poema Juvenil</p>\r\n', 3, '2016-11-22 10:15:04', '2016-11-22 09:15:04', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relacionamentos`
--

INSERT INTO `relacionamentos` (`id`, `IdUsuarioPrimeiro`, `idUsuarioSegundo`, `status`, `dataCriacao`, `IdConvidador`, `idConvidado`) VALUES
(7, 3, 4, 4, NULL, 4, 3);

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
(3, 'lukinhas mad mad ', 'marcos silva ', 'lukinhasmad@gmail.com', NULL, '1986-02-21', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 2, 'lukinhasmad'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `poesias`
--
ALTER TABLE `poesias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `relacionamentos_ibfk_1` FOREIGN KEY (`IdConvidador`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relacionamentos_ibfk_2` FOREIGN KEY (`idConvidado`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relacionamentos_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `statusUsuario` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
