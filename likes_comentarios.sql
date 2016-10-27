-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 06:32 PM
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
-- Table structure for table `likes_comentarios`
--

CREATE TABLE `likes_comentarios` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likesComentarios_idx` (`idComentario`),
  ADD KEY `likesUsuario_idx` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes_comentarios`
--
ALTER TABLE `likes_comentarios`
  ADD CONSTRAINT `likesComentario` FOREIGN KEY (`idComentario`) REFERENCES `comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `likesUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
