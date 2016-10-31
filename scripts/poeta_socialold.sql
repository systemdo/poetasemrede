-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 06:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
  `comentarios` longtext,
  `resposta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `poesia` int(11) DEFAULT NULL,
  `dataInserido` date DEFAULT NULL,
  `dataUpdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poesia`
--

CREATE TABLE `poesia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `corpo` longtext NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataCriacao` date NOT NULL,
  `dataAtualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relacionamento`
--

CREATE TABLE `relacionamento` (
  `id` int(11) NOT NULL,
  `IdUsuarioPrimeiro` int(11) NOT NULL,
  `idUsuarioSegundo` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `dataCriacao` timestamp NULL DEFAULT NULL,
  `IdSolicitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioComentario_idx` (`usuario`),
  ADD KEY `poesiaComentario_idx` (`poesia`),
  ADD KEY `resposta` (`resposta`);

--
-- Indexes for table `poesia`
--
ALTER TABLE `poesia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsuarioCriador_idx` (`idUsuario`),
  ADD KEY `poesiaStatus_idx` (`status`);

--
-- Indexes for table `relacionamento`
--
ALTER TABLE `relacionamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `primeiroUsuario_idx` (`IdUsuarioPrimeiro`),
  ADD KEY `segundoUsuario_idx` (`idUsuarioSegundo`),
  ADD KEY `statusRelacionamento_idx` (`status`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poesia`
--
ALTER TABLE `poesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relacionamento`
--
ALTER TABLE `relacionamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `poesiaComentario` FOREIGN KEY (`poesia`) REFERENCES `poesia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respostaComentario` FOREIGN KEY (`resposta`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `usuarioComentario` FOREIGN KEY (`usuario`) REFERENCES `comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poesia`
--
ALTER TABLE `poesia`
  ADD CONSTRAINT `UsuarioCriador` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `poesiaStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `statusUsuario` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
