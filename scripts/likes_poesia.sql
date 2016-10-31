/*ALTER TABLE `poesia` CHANGE `dataCriacao` `dataCriacao` DATETIME NOT NULL;
ALTER TABLE poesia RENAME poesias;
ALTER TABLE relacionamento RENAME relacionamentos;
ALTER TABLE `relacionamentos` ADD `idConvidado` INT NOT NULL AFTER `IdSolicitante`;
ALTER TABLE `relacionamentos` CHANGE `IdSolicitante` `IdConvidador` INT(11) NOT NULL;
ALTER TABLE `relacionamentos` ADD INDEX(`IdConvidador`);
ALTER TABLE `relacionamentos` ADD INDEX(`idConvidado`);
ALTER TABLE `relacionamentos` ADD FOREIGN KEY (`IdConvidador`) REFERENCES `poeta_social`.`usuarios`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `relacionamentos` ADD FOREIGN KEY (`idConvidado`) REFERENCES `poeta_social`.`usuarios`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `relacionamentos` ADD FOREIGN KEY (`status`) REFERENCES `poeta_social`.`status`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
*/






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
-- Table structure for table `likes_poesia`
--

CREATE TABLE `likes_poesia` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPoesia` int(11) DEFAULT NULL,
  `dataLike` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likePoesia_idx` (`idPoesia`),
  ADD KEY `likeUsuario_idx` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes_poesia`
--
ALTER TABLE `likes_poesia`
  ADD CONSTRAINT `likePoesia` FOREIGN KEY (`idPoesia`) REFERENCES `poesia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `likeUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
