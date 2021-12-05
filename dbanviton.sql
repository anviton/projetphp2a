-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Décembre 2021 à 11:49
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbanviton`
--
CREATE DATABASE IF NOT EXISTS `dbanviton` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbanviton`;

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

CREATE TABLE `flux` (
  `idFlux` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `dateDerMaj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `flux`
--

INSERT INTO `flux` (`idFlux`, `nom`, `dateDerMaj`) VALUES
(2, 'https://www.linternaute.com/rss/', '2021-11-18');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `idNews` int(11) NOT NULL,
  `heure` date NOT NULL,
  `titre` varchar(200) NOT NULL,
  `site` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `fkIdFlux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`idNews`, `heure`, `titre`, `site`, `description`, `fkIdFlux`) VALUES
(1, '2021-11-24', 'tets', 'internaute', 'Nouveau test de News', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `flux`
--
ALTER TABLE `flux`
  ADD PRIMARY KEY (`idFlux`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`),
  ADD UNIQUE KEY `titre` (`titre`),
  ADD UNIQUE KEY `IDNews` (`idNews`),
  ADD UNIQUE KEY `IDNews_2` (`idNews`),
  ADD KEY `fkIdFlux` (`fkIdFlux`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `flux`
--
ALTER TABLE `flux`
  MODIFY `idFlux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`fkIdFlux`) REFERENCES `flux` (`idFlux`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
